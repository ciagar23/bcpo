<?php


if (!defined('WEB_ROOT')) {
	exit;
}

$error = isset($_GET['error']) ? $_GET['error'] : '';
$rowsPerPage = 10;


$field = isset($_GET['field']) ? $_GET['field'] : 'user_name';
$search = isset($_GET['search']) ? $_GET['search'] : '';

if($station == 'Administrator')
{
$query= " where ".$field ." like '%".$search."%'";
require_once 'search.php';
}

else
{
$query ="where user_station ='$station'";
}


$sql = "SELECT user_id, user_name, user_regdate, user_station, user_last_login, user_admin, user_fullname
        FROM tbl_user $query
		ORDER BY user_name";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');

?> 
<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">

	<article class="module width_full">
		<header><h3 class="tabs_involved">User , <?php echo $pagingLink;?></h3>
		</header>

		<div class="tab_container">
        
			<table class="tablesorter" cellspacing="0"> 
  <thead>
  <tr align="center"  class="entryTable"> 
   <th >Name</td>
   <th >User Name</td>
   <th >Department</td>
   <th >Authorize by:</td>
   
   <?
   if ($station == 'Administrator')
   {
   ?>
   
   <th >Modify</td>
   <th width="70">Delete</td>
  </tr>
  
  <? } else {} ?>
<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	if ($i%2) {
		$class = 'row1';
	} else {
		$class = 'row2';
	}
	
	$i += 1;
	
	$sql1 = "SELECT user_station, user_level, user_name
        FROM tbl_user where user_name='$session'";
		$result1 = mysql_query($sql1);
		$row1 = mysql_fetch_array($result1);	
		$station= $row1['user_station'];	
		$level= $row1['user_level'];
		$username= $row1['user_name'];
		
	if($station == 'Administrator' )
	{
		$delete ='<a href="javascript:deleteUser('.$user_id.');">';	
	}
	else
	{
	$delete ='<a href="index.php?view=list&error=1">';
	}
		$sql1 = "SELECT user_fullname
        FROM tbl_user where user_name='$user_admin'";
		$result1 = mysql_query($sql1);
		$row1 = mysql_fetch_array($result1);	
		$authorized= $row1['user_fullname'];	
	
	
?>
</thead>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $user_fullname; ?></td>
   <td><?php echo $user_name; ?></td>
   <td><?php echo $user_station; ?></td>
   <td><?php echo $user_admin; ?></td>
   
      <?
   if ($station == 'Administrator')
   {
   ?>
   <td><a href="index.php?view=modify&userId=<?php echo $user_id; ?>&department=<?php echo $user_station; ?>">Modify</a></td>
   <td width="70"><? echo $delete;?>Delete</a></td>
   
   <? }else {}?>
  </tr>
<?php
} // end while


   if ($station == 'Administrator')
   {
   ?>
   <table>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="Add User" class="box" onClick="addUser()"></td>
  </tr>
   <? }else {}?>
 </table>
 <p>&nbsp;</p>
</form>
<?
	if($error ==1)
	{
	echo '<script> alert("You Are not Authorize to Delete this Account");
			window.location="index.php" </script>';
			}
		if($error ==2)
	{
	echo '<script> alert("Only '.$authorized.' can delete this account");
			window.location="index.php" </script>';
			}
			?>
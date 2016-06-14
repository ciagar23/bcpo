<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
	if ($errorMessage == '')
{
$errorMessage = '';
}
else
{
$errorMessage ='<script> alert("'.$errorMessage.'") </script>';
}

$rowsPerPage = 10;
$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);	
		$station= $row['user_station'];
		
$sql = "SELECT h_id, h_date, h_user, h_action, h_link, h_station
        FROM tbl_history
		WHERE h_category = '$view'
		ORDER BY h_date desc";

$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');

?> 

	<article class="module width_full">
		<header><h3 class="tabs_involved"><?php echo $value;?> History: <?php echo $pagingLink;?></h3>
		</header>

		<div class="tab_container">

	
			<table class="tablesorter" cellspacing="0"> 
  <thead>
	<form action="processBlotter.php?action=addBlotter" method="post"  name="frmListBlotter" id="frmListBlotter">
    
		<tr align="center"  class="entryTable"> 
			<th class="entryTable">Date</td>
  			<th class="entryTable" align="center">User</td>
  			<th class="entryTable" align="center">Station</td>
			<th class="entryTable" align="center">Action</td>
  		</tr>
        </thead>
  <?php
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
			
		
		if ($i%2) 
			{
			$class = 'row1';
			} 
			
		else 
			{
			$class = 'row2';
			}
			
		if ($h_link=='')
		{
		$view='';
		}
		else
		{
		$view='(<a href='.WEB_ROOT.$h_link.'>View</a>)';
		}

		$i += 1;
?>
	<tr class="<?php echo $class; ?>"> 
   		<td><?php echo $h_date; ?></td>
   		<td align="center"><?php echo $h_user; ?></td>
   		<td align="center"><?php echo $h_station; ?></td>
   		<td align="center"><?php echo $h_action; ?><?php echo $view;?> </td>
  	</tr>
  <?php
	} // end while
	
} else {
?>
  	<tr> 
  		 <td colspan="5" align="center">No Records Yet</td>
  	</tr>
  <?php
}
?>

</table>
 <p>&nbsp;</p>
</form>
<? echo $errorMessage;?>
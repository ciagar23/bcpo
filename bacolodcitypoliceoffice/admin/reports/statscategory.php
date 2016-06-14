<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	$investigator = (isset($_GET['investigator']) && $_GET['investigator'] != '') ? $_GET['investigator'] : '';
	$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
	if ($errorMessage == '')
{
$errorMessage = '';
}
else
{
$errorMessage ='<script> alert("'.$errorMessage.'") </script>';
}

$rowsPerPage = 20;
$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);	
		$station= $row['user_station'];
		 
		
$sql = "SELECT c_id, c_parent_id, c_name
        FROM tbl_crime
		where c_parent_id = 0";

//to count the number of blotted		
$resultcount = mysql_query($sql);
$total = mysql_num_rows($resultcount);
//
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');
?> 


		<div valign="top" style="color:#F61610;font-size:14px;font-family:Geneva, Arial, Helvetica, sans-serif;"> Total Blotted: <?php echo $total; ?></div>

	<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text" id="blotterView">
		
	<tr>
	<td>
	<form action="processBlotter.php?action=addBlotter" method="post"  name="frmListBlotter" id="frmListBlotter">
		<tr align="center"  class="entryTable"> 
			<th class="entryTable">Statistic Category</td>
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


		$i += 1;
?>
	<tr class="<?php echo $class; ?>"> 
   		<td align="left"><a href="index.php?view=statsdetail&stats=<? echo $c_id;?>"><?php echo $c_name; ?></a></td>
  	</tr>
  <?php
	} // end while
?>
	<tr> 
  	 	<td colspan="5" align="center" class="next"><?php echo $pagingLink;?></td>
  	</tr>
<?php	
} else {
?>
  	<tr> 
  		 <td colspan="5" align="center">No Records Yet</td>
  	</tr>
  <?php
}
?>

</table>
 <p>
   <input name="btnAddUser" type="button" id="btnAddUser" value="Back" class="box" onclick="window.history.back();" />
 </p>
</form>
<? echo $errorMessage;?>
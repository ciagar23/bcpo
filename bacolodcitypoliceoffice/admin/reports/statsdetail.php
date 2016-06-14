<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	$stats = (isset($_GET['stats']) && $_GET['stats'] != '') ? $_GET['stats'] : '';
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
		
$sqlsearch   = "SELECT *
        FROM tbl_search_reports";
		$resultsearch = mysql_query($sqlsearch);
		$rowsearch = mysql_fetch_array($resultsearch);	
		$from= $rowsearch['s_from'];	
		$to= $rowsearch['s_to']; 
		
$sql = "SELECT c_id, c_parent_id, c_name
        FROM tbl_crime
		where c_parent_id = $stats";

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
			<th class="entryTable" colspan="2">Statistic Detail 
		</td>
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
			
$sql1 = "SELECT *
        FROM tbl_blotter where bl_station ='$station' and bl_crime = '$c_name' and bl_date >= '$from' and bl_date <= '$to' ";
		$result1 = mysql_query($sql1);
		$rows1 = mysql_num_rows($result1);

		$i += 1;
?>
	<tr class="<?php echo $class; ?>"> 
   		<td align="left" width="50%"><?php echo $c_name; ?>: 
		<td width="50%"><? echo $rows1;?></td>
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
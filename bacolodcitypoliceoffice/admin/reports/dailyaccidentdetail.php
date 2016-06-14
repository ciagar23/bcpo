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



$month = isset($_GET['month']) ? $_GET['month'] : '';
$officer = isset($_GET['officer']) ? $_GET['officer'] : '';
$rowsPerPage = 100;
$sql = "SELECT bl_id, bl_date, bl_crime, bl_reportedby, bl_cname, bl_caddress, bl_ccomplaint, bl_clocation, 
bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rlicnr, bl_rinsurance, 
bl_rcontact, bl_rinjury, bl_copy, bl_new
        FROM tbl_blotter
		WHERE bl_reportedby='$officer' and bl_date like '$month%'
		ORDER BY bl_ccomplaint";
//
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');

echo 'Month: '.$month;
echo '<br>Officer: '.$officer; 
?> 


	<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text" id="blotterView">
		
	<tr>
	<td>
	<form action="processBlotter.php?action=addBlotter" method="post"  name="frmListBlotter" id="frmListBlotter">
		<tr align="center"  class="entryTable"> 
			<th class="entryTable">Complaint</td>
  			<th class="entryTable">Location</td>
  		</tr>
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
   		<td><a href=/bcpo/admin/blotter/index.php?view=detail&policeId=<? echo $bl_id;?>><?php echo $bl_ccomplaint; ?></a></td>
   		<td align="center"><?php echo $bl_clocation; ?></td>
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
 <p>&nbsp;</p>
</form>
<? echo $errorMessage;?>
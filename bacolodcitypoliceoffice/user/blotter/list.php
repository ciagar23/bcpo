<?php
if (!defined('WEB_ROOT')) {
	exit;
}



$rowsPerPage = 5;
$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);	
		$station= $row['user_station'];
		
$sql = "SELECT bl_id, bl_date, bl_reportedby, bl_cfname, bl_clname, bl_cmname, bl_caddress, bl_ccomplaint, bl_clocation, bl_crefferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rfname, bl_rlname, bl_rmname, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury
        FROM tbl_blotter
		WHERE bl_station='$station'
		ORDER BY bl_id desc";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');


?> 
<form action="processBlotter.php?action=addBlotter" method="post"  name="frmListBlotter" id="frmListBlotter">
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="text">
	<tr>

 	</tr>
</table>
<br>
	<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
		<tr align="center"  class="entryTable"> 
			<td id="entryTableHeader">Complaint</td>
  			<td id="entryTableHeader">Date</td>
			<td width="70" id="entryTableHeader">Modify</td>
   			<td width="70" id="entryTableHeader">Delete</td>
  		</tr>
  <?php
$parentId = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
			
		
		if ($i%2) {
			$class = 'row1';
		} else {
			$class = 'row2';
		}
		
		$i += 1;
?>
	<tr class="<?php echo $class; ?>"> 
   		<td><a href="index.php?view=detail&policeId=<?php echo $bl_id; ?>"><?php echo $bl_ccomplaint; ?></a></td>
   		<td align="center"><a href="?c=<?php echo $cat_id; ?>"><?php echo $bl_date; ?></a></td>
   		<td width="70" align="center"><a href="javascript:modifyBlotter(<?php echo $bl_id; ?>);">Modify</a></td>
   		<td width="70" align="center"><a href="javascript:deleteBlotter(<?php echo $bl_id; ?>);">Delete</a></td>
  	</tr>
  <?php
	} // end while
?>
	<tr> 
  	 	<td colspan="5" align="center">
   <?php 
echo $pagingLink;
   ?></td>
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
  	<tr> 
   		<td colspan="5">&nbsp;</td>
 	</tr>
	
  	<tr> 
   		<td colspan="5" align="right"><input name="btnAddBlotter" type="button" id="btnAddBlotter" value="Add Blotter" onClick="window.location.href='index.php?view=add';" class="box"></td>
  	</tr>
	
</table>
 <p>&nbsp;</p>
</form>
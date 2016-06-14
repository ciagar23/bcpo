<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	
	$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';


$rowsPerPage = 10;
		
$sql = "SELECT ac_id, ac_date, ac_title, ac_content FROM tbl_activities
		ORDER BY ac_date desc";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');

?> 

<font color="#FF0000"><? echo $errorMessage;?></font>
<form action="processCrimereport.php?action=acrimereport" method="post"  name="frmListCrimereport" id="frmListCrimereport">

  <article class="module width_full">
			<header><h3>
			<?php echo $pagingLink;?></h3></header>
			<div class="module_content">

<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
	
	<!-- CRIME REPORT -->	
	<tr>
		<td id="date"> Date </td>
		<td id="sender"> Title </td>
		<? if($station =='PCR'){?>
		<td id="delete"> Delete </td>
		<? } else{}?>
	</tr>
  <?php
if (dbNumRows($result) > 0) 
	{
	$i = 0;
	
	while($row = dbFetchAssoc($result)) 
		{
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
   		<td><a href="index.php?view=detail&policeId=<? echo $ac_id;?>"><?php echo $ac_date; ?>&nbsp; </a></td>
   		<td><a href="index.php?view=detail&policeId=<? echo $ac_id;?>"><?php echo $ac_title; ?>&nbsp; </a></td>
		<? if($station =='PCR'){?>
   		<td width="75" align="center"><a href="javascript:deleteactivities(<?php echo $ac_id; ?>);">Delete</a></td>
		<? } else{}?>
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
<? if($station =='PCR'){?>
<input type="button" onclick='window.location="index.php?view=add";' value="Add Activity">
<? } else{}?>
 <p>&nbsp;</p>
</form>
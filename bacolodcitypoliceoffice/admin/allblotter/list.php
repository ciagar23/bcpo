<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';


$rowsPerPage = 10;
$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);	
		$station= $row['user_station'];
		
$field = (isset($_GET['field']) && $_GET['field'] != '') ? $_GET['field'] : 'bl_crime';
		$search = (isset($_GET['search']) && $_GET['search'] != '') ? $_GET['search'] : '';
		
$sql = "SELECT bl_id, bl_date, bl_crime, bl_reportedby, bl_cname, bl_caddress, bl_ccomplaint, bl_clocation, 
bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rlicnr, bl_rinsurance, 
bl_rcontact, bl_rinjury, bl_copy, bl_new, bl_station
        FROM tbl_blotter
		WHERE $field like '%$search%'
		ORDER BY bl_ccomplaint";

//to count the number of blotted	

$sql1   = "SELECT *
        FROM tbl_blotter WHERE $field like '%$search%' and bl_new='new'";		
$resultcount = mysql_query($sql1);
$total = mysql_num_rows($resultcount);
//
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');

if($errorMessage !='')
	{
	echo '<h4 class="alert_warning">'.$errorMessage.'</h4>';
	}
		else
		{
		}?> 


		<article class="module width_full">
		<header><h3 class="tabs_involved">Total Blotted: <?php echo $total; ?> , <?php echo $pagingLink;?></h3>
		</header>

		<div class="tab_container">
<? require_once 'search.php'; ?>

			<table class="tablesorter" cellspacing="0"> 
	<tr>
	<td>
	<form action="processBlotter.php?action=addBlotter" method="post"  name="frmListBlotter" id="frmListBlotter">
		<thead> <tr align="center"  class="entryTable"> 
			<th class="entryTable">Complaint</td>
  			<th class="entryTable" align="center">Location</td>
			<th class="entryTable"> Department</td>
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
			
		
		if ($bl_copy !=0)
			{
			$bl_copy = '-updated on '.$bl_date.' ('.$bl_copy.')';
			}
			
		else
			{
			$bl_copy ='';
			}
			
		if($bl_station == 'TMU')
		{
		$detailall = 'detailtmu';
		}
		else
		{
		$detailall = 'detail';
		}

		$i += 1;
?>
	<tr class="<?php echo $class; ?>"> 
   		<td><a href="index.php?view=<? echo $detailall;?>&policeId=<?php echo $bl_id; ?>"><?php echo $bl_ccomplaint; ?>&nbsp; </a><?php echo $bl_copy; ?></td>
   		<td align="center"><?php echo $bl_clocation; ?></td>
   		<td width="70" align="center"><? echo $bl_station;?>
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
</div></article>
</form>
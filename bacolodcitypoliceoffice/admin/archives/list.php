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
bl_rcontact, bl_rinjury, bl_copy, bl_new
        FROM tbl_blotter
		WHERE bl_station='$station' and $field like '%$search%' and bl_status = '1'
		ORDER BY bl_ccomplaint";

//to count the number of blotted	

$sql1   = "SELECT *
        FROM tbl_blotter WHERE bl_station='$station' and $field like '%$search%' and bl_new='new'";		
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
		}



?> 



<article class="module width_full">
		<header><h3 class="tabs_involved">Archives: ( <?php echo $total; ?> )  <?php echo $pagingLink;?></h3>
		</header>

		<div class="tab_container">
<? require_once 'search.php'; ?><br>


			<table class="tablesorter" cellspacing="0"> 

<form action="processBlotter.php?action=addBlotter" method="post"  name="frmListBlotter" id="frmListBlotter">
<thead>
	<tr align="center" > 
		<th class="entryTable"> Complaint</th>
		<th class="entryTable"> Location</th>
	</tr>
    </thead>
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
			
		if ($bl_copy !=0)
			{
			$bl_copy = '-updated on '.$bl_date.' ('.$bl_copy.')';
			}
			
			else
				{
				$bl_copy ='';
				}
			
		if ($bl_new == 'new')
			{
			$onclick = '<a href="index.php?view='.$modify.'&policeId='.$bl_id.'&crime='.$bl_crime.'">Recase<a>';
			}
			
			else
				{
				$onclick = '<a href="?error= This Blotter has been Recased. Please Recase the Latest Blotter">Recase<a>';
				}

		$i += 1;
?>
	<tr class="<?php echo $class; ?>"> 
		<td><a href="index.php?view=<? echo $detail;?>&policeId=<?php echo $bl_id; ?>"><?php echo $bl_ccomplaint; ?>&nbsp; </a><?php echo $bl_copy; ?></td>
		<td align="center"><?php echo $bl_clocation; ?></td>
	</tr>
  <?php
	} // end while

	
} else {
?>
  	<tr> 
  		 <td colspan="5" align="center"> No Records Yet </td>
  	</tr>
  <?php
}
?>

</table>
 <p>&nbsp;</p>
</form>
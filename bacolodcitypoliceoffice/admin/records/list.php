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
		
		$field = (isset($_GET['field']) && $_GET['field'] != '') ? $_GET['field'] : 'bl_crime';
		$search = (isset($_GET['search']) && $_GET['search'] != '') ? $_GET['search'] : '';
		$location = (isset($_GET['location']) && $_GET['location'] != '') ? $_GET['location'] : '';
		
$sql = "SELECT bl_id, bl_date, bl_crime, bl_reportedby, bl_cname, bl_caddress, bl_ccomplaint, bl_clocation, 
bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rlicnr, bl_rinsurance, 
bl_rcontact, bl_rinjury, bl_copy, bl_new, bl_station
        FROM tbl_blotter
		WHERE $field like '%$search%' and bl_station = '$location'
		ORDER BY bl_ccomplaint";

//to count the number of blotted	

$sql1   = "SELECT *
        FROM tbl_blotter WHERE $field like '%$search%'";		
$resultcount = mysql_query($sql1);
$total = mysql_num_rows($resultcount);
//
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');
?> 


<div valign="top" style="color:#F61610;font-size:16px;font-family:Geneva, Arial, Helvetica, sans-serif;"> Total Blotted: <?php echo $total; ?></div>
<? require_once 'search.php'; ?><br>

<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text" id="blotterView">

<form action="processBlotter.php?action=addBlotter" method="post"  name="frmListBlotter" id="frmListBlotter">
	<tr align="center"  class="entryTable"> 
		<th class="entryTable"> Complaint</th>
		<th class="entryTable"> Location</th>
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
			
		if ($bl_copy !=0)
			{
			$bl_copy = '-updated on '.$bl_date.' ('.$bl_copy.')';
			}
			
			else
				{
				$bl_copy ='';
				}
			
					
		
		if($bl_station =='TMU')
			{
			$detail= 'detailtmu';
			}
			
			else
				{
				
				$detail= 'detail';
				}
			

		$i += 1;
?>
	<tr class="<?php echo $class; ?>"> 
		<td><a href="index.php?view=<? echo $detail;?>&policeId=<?php echo $bl_id; ?>"><?php echo $bl_ccomplaint; ?>&nbsp; </a><?php echo $bl_copy; ?></td>
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
  		 <td colspan="5" align="center"> No Records Yet </td>
  	</tr>
  <?php
}
?>

</table>
 <p>&nbsp;</p>
</form>
<? echo $errorMessage;?>
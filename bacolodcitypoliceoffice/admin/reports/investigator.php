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

$rowsPerPage = 10;
$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);	
		$station= $row['user_station'];
		 
		
$sql = "SELECT bl_id, bl_date, bl_crime, bl_reportedby, bl_cname, bl_caddress, bl_ccomplaint, bl_clocation, 
bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rlicnr, bl_rinsurance, 
bl_rcontact, bl_rinjury, bl_copy, bl_new, bl_vehicle, bl_accident
        FROM tbl_blotter
		WHERE bl_station='$station' and bl_reportedby ='$investigator'
		ORDER BY bl_ccomplaint";

//to count the number of blotted		
$resultcount = mysql_query($sql);
$total = mysql_num_rows($resultcount);
//
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');
?> 


		<div valign="top" style="color:#F61610;font-size:14px;font-family:Geneva, Arial, Helvetica, sans-serif;">Investigator: <?php echo $investigator; ?></div>

	<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text" id="blotterView">
		
	<tr>
	<td>
	<form action="processBlotter.php?action=addBlotter" method="post"  name="frmListBlotter" id="frmListBlotter">
		<tr align="center"  class="entryTable"> 
			<th class="entryTable"> Date </td>
			<th class="entryTable"> Blotter No. </td>
			<th class="entryTable"> Location </td>
			<th class="entryTable"> Complainant </td>
			<th class="entryTable"> Respondent </td>
			<th class="entryTable"> Injuries </td>
			<th class="entryTable"> Type of Vehicle </td>
			<th class="entryTable"> Type of Accident </td>
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
			
		
		if ($bl_copy !=0)
			{
			$bl_copy = '-updated on '.$bl_date.' ('.$bl_copy.')';
			}
			
		else
			{
			$bl_copy ='';
			}
			
	// Accident
	if($bl_accident == 'DP')
		{
		$bl_accident = 'Damage of Property';
		}
	
	else if($bl_accident == 'PI')
		{
		$bl_accident = 'Physical injury';
		}
	
	else if($bl_accident == 'DPI')
		{
		$bl_accident = 'Damage to Property with Physical injury';
		}
	
	else if($bl_accident == 'H')
		{
		$bl_accident = 'Homicide';
		}
	
	else
		{
		$bl_accident='';
		}
			
// Vehicle
	if($bl_vehicle == 'pualone')
		{
		$bl_vehicle = 'PUB/PUJ Alone';
		}
	
	else if($bl_vehicle == 'pupedestrian')
		{
		$bl_vehicle = 'PUB/PUJ vs Pedestrian';
		}
	
	else if($bl_vehicle == 'puMC')
		{
		$bl_vehicle = 'PUB/PUJ vs Motorcycle';
		}
	
	else if($bl_vehicle == 'puTC')
		{
		$bl_vehicle = 'PUB/PUJ vs Tricycle';
		}
	
	else if($bl_vehicle == 'puPUB')
		{
		$bl_vehicle = 'PUB/PUJ vs PUB/PUJ';
		}
	
	else if($bl_vehicle == 'puprivate')
		{
		$bl_vehicle = 'PUB/PUJ vs Private';
		}
	
	else if($bl_vehicle == 'putruck')
		{
		$bl_vehicle = 'PUB/PUJ vs Truck';
		}

	// Private
	if($bl_vehicle == 'pralone')
		{
		$bl_vehicle = 'Private Alone';
		}
	
	else if($bl_vehicle == 'prpedestrian')
		{
		$bl_vehicle = 'Private vs Pedestrian';
		}
	
	else if($bl_vehicle == 'prMC')
		{
		$bl_vehicle = 'Private vs Motorcycle';
		}
	
	else if($bl_vehicle == 'prTC')
		{
		$bl_vehicle = 'Private vs Tricycle';
		}
	
	else if($bl_vehicle == 'prPUB')
		{
		$bl_vehicle = 'Private vs PUB/PUJ';
		}
	
	else if($bl_vehicle == 'prprivate')
		{
		$bl_vehicle = 'Private vs Private';
		}
	
	else if($bl_vehicle == 'prtruck')
		{
		$bl_vehicle = 'Private vs Truck';
		}

	// Motorcycle
	if($bl_vehicle == 'mcalone')
		{
		$bl_vehicle = 'Motorcycle Alone';
		}
	
	else if($bl_vehicle == 'mcpedestrian')
		{
		$bl_vehicle = 'Motorcycle vs Pedestrian';
		}
	
	else if($bl_vehicle == 'mcMC')
		{
		$bl_vehicle = 'Motorcycle vs Motorcycle';
		}
	
	else if($bl_vehicle == 'mcTC')
		{
		$bl_vehicle = 'Motorcycle vs Tricycle';
		}
	
	else if($bl_vehicle == 'mcPUB')
		{
		$bl_vehicle = 'Motorcycle vs PUB/PUJ';
		}
	
	else if($bl_vehicle == 'mcprivate')
		{
		$bl_vehicle = 'Motorcycle vs Private';
		}
	
	else if($bl_vehicle == 'mctruck')
		{
		$bl_vehicle = 'Motorcycle vs Truck';
		}
		
	// Tricycle
	if($bl_vehicle == 'tcalone')
		{
		$bl_vehicle = 'Tricycle Alone';
		}
	
	else if($bl_vehicle == 'tcpedestrian')
		{
		$bl_vehicle = 'Tricycle vs Pedestrian';
		}
	
	else if($bl_vehicle == 'tcMC')
		{
		$bl_vehicle = 'Tricycle vs Motorcycle';
		}
	
	else if($bl_vehicle == 'tcTC')
		{
		$bl_vehicle = 'Tricycle vs Tricycle';
		}
	
	else if($bl_vehicle == 'tcPUB')
		{
		$bl_vehicle = 'Tricycle vs PUB/PUJ';
		}
	
	else if($bl_vehicle == 'tcprivate')
		{
		$bl_vehicle = 'Tricycle vs Private';
		}
	
	else if($bl_vehicle == 'tctruck')
		{
		$bl_vehicle = 'Tricycle vs Truck';
		}
		


		$i += 1;
?>
	<tr class="<?php echo $class; ?>"> 
   		<td align="center"><?php echo $bl_date; ?><br><font color="#FF0000"><? echo $bl_copy;?></font></td>
   		<td align="center"><?php echo $bl_id; ?></td>
   		<td align="center"><?php echo $bl_clocation; ?></td>
   		<td align="center"><?php echo $bl_cname; ?></td>
   		<td align="center"><?php echo $bl_rname; ?></td>
   		<td align="center"><?php echo $bl_cinjury; ?></td>
   		<td align="center"><?php echo $bl_vehicle; ?></td>
		<td align="center"><?php echo $bl_accident; ?></td>
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
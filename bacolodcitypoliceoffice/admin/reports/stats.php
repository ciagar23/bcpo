<?php
if (!defined('WEB_ROOT')) {
	exit;
}
$sqlsearch   = "SELECT *
        FROM tbl_search_reports";
		$resultsearch = mysql_query($sqlsearch);
		$rowsearch = mysql_fetch_array($resultsearch);	
		$from= $rowsearch['s_from'];	
		$to= $rowsearch['s_to']; 

$sql = "SELECT *
        FROM tbl_blotter where bl_crime = 'Murder' and bl_date >= '$from' and bl_date <= '$to' ";
		$result = mysql_query($sql);
		$Murder = mysql_num_rows($result);
		$Murderr= $Murder+1;
		
$sql2 = "SELECT *
        FROM tbl_blotter where bl_crime = 'Physical Injury' and bl_date >= '$from' and bl_date <= '$to' ";
		$result2 = mysql_query($sql2);
		$Physical_Injury = mysql_num_rows($result2);
		$Physical_Injuryr =$Physical_Injury+1;
		
$sql3 = "SELECT *
        FROM tbl_blotter where bl_crime = 'Homicide' and bl_date >= '$from' and bl_date <= '$to' ";
		$result3 = mysql_query($sql3);
		$Homicide = mysql_num_rows($result3);
		$Homicider=$Homicide+1;
		
$sql4 = "SELECT *
        FROM tbl_blotter where bl_crime = 'Rape' and bl_date >= '$from' and bl_date <= '$to' ";
		$result4 = mysql_query($sql4);
		$Rape = mysql_num_rows($result4);
		$Raper=$Rape+1;
	

$totalperson = $Murderr + $Homicider + $Physical_Injuryr + $Raper;
	
$p_Murder = (($Murderr * 100)/$totalperson);	
$p_Homicide = (($Homicider * 100)/$totalperson);	
$p_Physical_Injury = (($Physical_Injuryr * 100)/$totalperson);	
$p_Rape = (($Raper * 100)/$totalperson);	
		

$sql5 = "SELECT *
        FROM tbl_blotter where bl_crime = 'Robbery' and bl_date >= '$from' and bl_date <= '$to' ";
		$result5 = mysql_query($sql5);
		$Robbery = mysql_num_rows($result5);
		$Robberyr=$Robbery+1;
		
$sql6 = "SELECT *
        FROM tbl_blotter where bl_crime = 'Theft' and bl_date >= '$from' and bl_date <= '$to' ";
		$result6 = mysql_query($sql6);
		$Theft = mysql_num_rows($result6);
		$Theftr=$Theft+1;
		
$sql7 = "SELECT *
        FROM tbl_blotter where bl_crime = 'Carnapping' and bl_date >= '$from' and bl_date <= '$to' ";
		$result7 = mysql_query($sql7);
		$Carnapping = mysql_num_rows($result7);
		$Carnappingr=$Carnapping+1;
		
$sql8 = "SELECT *
        FROM tbl_blotter where bl_crime = 'Cattle Rustling' and bl_date >= '$from' and bl_date <= '$to' ";
		$result8 = mysql_query($sql8);
		$Cattle_Rustling = mysql_num_rows($result8);
		$Cattle_Rustlingr=$Cattle_Rustling+1;

$totalproperty = $Robberyr + $Theftr + $Carnappingr + $Cattle_Rustlingr;
$p_Robbery = (($Robberyr * 100)/$totalproperty);	
$p_Theft = (($Theftr * 100)/$totalproperty);	
$p_Carnapping = (($Carnappingr * 100)/$totalproperty);	
$p_Cattle_Rustling = (($Cattle_Rustlingr * 100)/$totalproperty);	
$total = $totalperson + $totalproperty;

?>
<p>&nbsp;</p>
<form action="processRogue.php?action=addProduct" method="post" enctype="multipart/form-data" name="frmAddProduct" id="frmAddProduct">
  <table width="100%" height="100%" border="0" cellspacing="2">
  <tr class="entryTable">
    <td colspan="4">INDEX CRIMES (Period Covered: <? echo $from;?> - <? echo $to;?>) </td>
  </tr>
  <tr class='row1'>
    <td colspan="2">AGAINST PERSON </td>
    <td colspan="2">AGAINST PROPERTY </td>
  </tr>
  <tr class='row2'>
    <td width="15%">MURDER</td>
    <td width="35%">&nbsp;<? echo $Murder;?></td>
    <td width="25%">ROBBERY</td>
    <td width="25%">&nbsp;<? echo $Robbery;?></td>
  </tr>
  <tr class='row1'>
    <td>HOMICIDE</td>
    <td>&nbsp;<? echo $Homicide;?></td>
    <td>THEFT</td>
    <td>&nbsp;<? echo $Theft;?></td>
  </tr>
  <tr class='row2'>
    <td>PHYSICAL INJURY </td>
    <td>&nbsp;<? echo $Physical_Injury;?></td>
    <td>CARNAPPING</td>
    <td>&nbsp;<? echo $Carnapping;?></td>
  </tr>
  <tr class='row1'>
    <td>RAPE</td>
    <td>&nbsp;<? echo $Rape;?></td>
    <td>CATTLE RUSTLING </td>
    <td>&nbsp;<? echo $Cattle_Rustling;?></td>
  </tr>
  <tr class='row2'>
    <td>TOTAL</td>
    <td>&nbsp;<? echo $totalperson;?></td>
    <td>TOTAL</td>
    <td>&nbsp;<? echo $totalproperty;?></td>
  </tr>
  <tr class='row1'>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr class='row2'>
    <td>TOTAL INDEX CRIME </td>
    <td>&nbsp;<? echo $total;?></td>
    <td>TOTAL INDEX CRIME CLEARED </td>
    <td>&nbsp;</td>
  </tr>
  <tr class='row1'>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

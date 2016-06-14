<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}


$from = (isset($_GET['txtfrom4']) && $_GET['txtfrom4'] != '') ? $_GET['txtfrom4'] : '';
$case = (isset($_GET['txtcase2']) && $_GET['txtcase2'] != '') ? $_GET['txtcase2'] : '';
		$to = (isset($_GET['txtto4']) && $_GET['txtto4'] != '') ? $_GET['txtto4'] : '';
		$department = (isset($_GET['department1']) && $_GET['department1'] != '') ? $_GET['department1'] : '';
		
if($department == 'All')
{
$query ='';
}
else
{
$query ="BL_station='".$department."' and";
}

if($case == 'index')
{
$query2 = 'and bl_crime = "Snatching" or bl_crime = "Budol-Budol" or bl_crime = "Salisi" or bl_crime = "Pickpocket" or bl_crime = "Mauling" or bl_crime = "Stabbing" or bl_crime = "Shooting" or bl_crime = "Hold Up" or bl_crime = "Akyat Bahay" or bl_crime = "Estafa" or bl_crime = "Theft" or bl_crime = "Bukas Kotse" or bl_crime = "Shoplifting" or bl_crime = "homicide" or bl_crime = "Murder" or bl_crime = "Cellphone Snatching"  ';
}
else if($case == 'nonindex')
{
$query2 = 'and bl_crime = "Threat" or bl_crime = "Coercion" or bl_crime = "Abduction" or bl_crime = "Violation of Domicile" or bl_crime = "Oral Defamation" or bl_crime = "Alarm and Scandal" or bl_crime = "Slander by Deed" or bl_crime = "Libel" or bl_crime = "RA 9165 (Drugs)" or bl_crime = "RA 8294 (FA)" or bl_crime = "RA 9287 (Gambling)" or bl_crime = "RA 1619 (Rugby)" or bl_crime = "RA 6 (Deadly Weapon)" or bl_crime = "RA 9287 (Carnapping)" or bl_crime = "RA 8293 (Intel Prop)" or bl_crime = "Vagrancy (ART 202)" or bl_crime = "Porno Mat. (art 201)" or bl_crime = "Wanted Person"  ';
}
else
{
$query2='';
}

$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cname, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury, bl_crime,bl_blottedby, bl_station
        FROM tbl_blotter
		WHERE $query bl_date >= '$from' and bl_date <= '$to' $query2
		ORDER BY bl_date desc";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$count = mysql_num_rows($result);
$row = mysql_fetch_assoc($result);
if($count)
{
extract($row);
}
else
{
}
if($department == 'police station 1')
{
$population =67895;
}
else if($department == 'police station 2')
{
$population =41323;
}
else if($department == 'police station 3')
{
$population =80892;
}else if($department == 'police station 4')
{
$population =65520;
}else if($department == 'police station 5')
{
$population =25990;
}else if($department == 'police station 6')
{
$population =50008;
}else if($department == 'police station 7')
{
$population =75222;
}else if($department == 'police station 8')
{
$population =92232;
}else if($department == 'police station 9')
{
$population =28992;
}
else if($department == 'police station 10')
{
$population = 40300;
}
else if($department == 'All')
{
$population =570949;
}
else
{
$population=0;
}
if($population==0)
{
$answer= 'Population Return Zero Result';

}
else
{
$formula = ($count/$population)*100;
$answer ='
<table width="100%" border="1" align="center"  class="detail">
<tr class="entryTable">
<td>Crime
<td>Crime Volume
<td>Crime Rate
<td>Station
<tr class="entryTable">
<td>'.$case.'
<td> '.$count.'
<td>'.number_format($formula,4).'%
<td> '.$department.'
</table>';
}


?>
<p>&nbsp;</p>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
 <table width="100%" border="0" align="center"  class="detail">
  <tr class="entryTable"> 
   <td class="label2" colspan="2" width="187" ><? echo $answer;?></td>
 
 </table>
 <p align="center">
   <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.location.href='index.php';" class="box"></p>
</form>

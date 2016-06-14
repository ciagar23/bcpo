<h3><a href='<?php echo WEB_ROOT;?>website/crimeinfo/index.php?view=crimeincident'> Statistic</a> ||
 <a href='<?php echo WEB_ROOT;?>website/index.php?view=mostwantedall'>Most Wanted</a> ||
  <a href='<?php echo WEB_ROOT;?>website/index.php?view=missingall'>Missing Persons</a> ||
  <a href='<?php echo WEB_ROOT;?>website/crimeinfo/index.php?view=crimerate'>Crime Rate</a></h3>
<?php
$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;
$CrimeList = CrimeListOption($catId);

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
?>

<form action="index.php" method="get" enctype="multipart/form-data" name="frmAddarchives4" id="frmAddarchives4">
	<table border="0" align="center" cellpadding="5" cellspacing="1" class="searchreports">
<input name="view" type="hidden" value="crimerate" size="10">
  <tr>
    <td>Station
<td>
<select name="department1">
  <option>All</option>
  <option>police station 1</option>
  <option>police station 2</option>
  <option>police station 3</option>
  <option>police station 4</option>
  <option>police station 5</option>
  <option>police station 6</option>
  <option>police station 7</option>
  <option>police station 8</option>
  <option>police station 9</option>
  <option>police station 10</option>
</select>
  <td class="label" colspan="5">
  <select name="txtcase2" id="txtcase2" class="box">
     	<?php echo $CrimeList; ?>
		<option value="" selected>-- Choose Crime --</option> </select>
		<tr>
		<td> From
  <td class="content"><label>
  <input name="txtfrom4" type="text" size="10">
  <script language="JavaScript" src="<?php echo WEB_ROOT;?>tigra/calendar3.js"></script>  <a href="javascript:calf4.popup();"><img src="<?php echo WEB_ROOT;?>tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>
  <td class="label"> to
  <td class="content"><label>
  <input name="txtto4" type="text" size="10">
  <script language="JavaScript" src="/avrc<?php echo WEB_ROOT;?>tigra/calendar3.js"></script>  <a href="javascript:calt4.popup();"><img src="<?php echo WEB_ROOT;?>tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>
	<td class="label" align='center'><input name="btnAddarchives" type="button" id="btnAddarchives" value="OK" onClick="checkcrimerate2();" class="box" />
  </table>

 <script type="text/javascript">
function mySubmit() {
// document.edit.save.value = "yes";
document.edit.onsubmit(); // workaround browser bugs.
document.edit.submit();
};
</script>
</form>
<tr>
<td>
<td>
</table>

 <script language="JavaScript">
<!-- // create calendar object(s) just after form tag closed
	 // specify form element as the only parameter (document.forms['formname'].elements['inputname']);
	 // note: you can have as many calendar objects as you need for your application
	
	var calf4 = new calendar3(document.forms['frmAddarchives4'].elements['txtfrom4']);
	calf4.year_scroll = true;
	calf4.time_comp = false;
	
		var calt4 = new calendar3(document.forms['frmAddarchives4'].elements['txtto4']);
	calt4.year_scroll = true;
	calt4.time_comp = false;
	//-->
</script>

<?
		
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

$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cname, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury, bl_crime,bl_blottedby, bl_station
        FROM tbl_blotter
		WHERE $query bl_date >= '$from' and bl_date <= '$to' and bl_crime = '$case'
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
$population =40111;
}
else if($department == 'police station 2')
{
$population =30543;
}
else if($department == 'police station 3')
{
$population =21343;
}else if($department == 'police station 4')
{
$population =34532;
}else if($department == 'police station 5')
{
$population =45632;
}else if($department == 'police station 6')
{
$population =23123;
}else if($department == 'police station 7')
{
$population =21342;
}else if($department == 'police station 8')
{
$population =21234;
}else if($department == 'police station 9')
{
$population =12314;
}
else if($department == 'police station 10')
{
$population =43451;
}
else if($department == 'tmu')
{
$population =23312;
}
else if($department == 'All')
{
$population =1232353;
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
<script language="JavaScript">
<!-- // create calendar object(s) just after form tag closed
	 // specify form element as the only parameter (document.forms['formname'].elements['inputname']);
	 // note: you can have as many calendar objects as you need for your application
	var cal111 = new calendar3(document.forms['frmAddarchives2'].elements['txtfrom2']);
	cal111.year_scroll = true;
	cal111.time_comp = false;
	
		var cal222 = new calendar3(document.forms['frmAddarchives2'].elements['txtto2']);
	cal222.year_scroll = true;
	cal222.time_comp = false;
	
	//-->
</script>
<p>&nbsp;</p>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
 <table width="100%" border="0" align="center"  class="detail">
  <tr class="entryTable"> 
   <td class="label2" colspan="2" width="187" align="center" ><? echo $answer;?></td>
 
 </table>
 <p align="center">
   <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.history.back();" class="box"></p>
</form>
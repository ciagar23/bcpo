<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;
$CrimeList = CrimeListOption($catId);
?> 
<p>&nbsp;</p>
<form action="processCrimeinfo.php?action=report" method="post" enctype="multipart/form-data" name="frmReport" id="frmReport">

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="text">

	<tr class="row1" >
  		<td colspan="2" align="center"><h2>Report A Crime</h2></td>
  	</tr> 
	
    <tr>        
   		<td width="150">Type of Crime</td>
   		<td> <select name="txtcomplaint" id="cboCrime" class="box">
     	<?php echo $CrimeList; ?>
		<option value="" selected>-- Choose Crime --</option> </select>	</td>
	</tr>

  
  	<tr class="row2" > 
   		<td width="150" >Place of Incident</th>
   		<td> <input name="txtincidentplace" type="text" class="box" id="txtincidentplace" size="50" maxlength="100"></td>
  	</tr>
  
  	<tr class="row1" > 
   		<td width="150">Date of Incident</th>
   		<td> <input name="txtincidentdate" type="text" class="box" id="txtincidentdate" size="10" maxlength="100">
		<script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  
		<a href="javascript:calincident.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a></td>
  	</tr>
  
  	<tr class="row2" > 
	<td colspan="2" align="center"><h3>Report</th>   
    </h3>	</tr>
   
   	<tr class="row1" >
   		<td colspan="2"> <textarea name="txtreport" cols="80" rows="5" class="box" id="txtreport"></textarea></td>
  	</tr>
</table>

<p align="center"> 
<input name="btnreport" type="button" id="btnreport" value="Send" onClick="checkreportacrimeForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
</p>
</form>
<script language="JavaScript">
<!-- // create calendar object(s) just after form tag closed
	 // specify form element as the only parameter (document.forms['formname'].elements['inputname']);
	 // note: you can have as many calendar objects as you need for your applicati
	
	var calincident = new calendar3(document.forms['frmReport'].elements['txtincidentdate']);
	calincident.year_scroll = true;
	calincident.time_comp = false;
	
	//-->
</script>



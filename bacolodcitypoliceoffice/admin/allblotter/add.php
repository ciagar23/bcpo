<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;
$CrimeList = CrimeListOption($catId);
?> 
<p>&nbsp;</p>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">



  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="detail">
   <tr>
  <th colspan="2" align="center"><h3>Complainant</h3></td></tr>
  <tr> 
   <tr> 
   <th width="150" class="label">Type of Crime</td>
   <td class="content"> <select name="cboCrime" id="cboCrime" class="box">
     <option value="" selected>-- Choose Crime --</option>
<?php
	echo $CrimeList;
?>	 
    </select> <a href=../typeOfCrime/>Add Crime</a></td>
  </tr>
   <th width="150" class="label">Name</td>
   <td> <input name="txtcname" type="text" class="box" id="txtcname" size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <th width="150" class="label">Address</td>
   <td> <textarea name="txtaddress" cols="47" rows="3" class="box" id="txtaddress"></textarea></td>
  </tr>
  <tr> 
   <th width="150" class="label">Complaint</td>
   <td> <textarea name="txtcomplaint" cols="47" rows="3" class="box" id="txtcomplaint"></textarea></td>
  </tr>
  <tr> 
   <th width="150" class="label">Place of Incident</td>
   <td> <input name="txtlocation" type="text" class="box" id="txtlocation" size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <th width="150" class="label">Date of Incident</td>
   <td> <input name="txtdate" type="text" class="box" id="txtdate" size="10" maxlength="100"><script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script> <a href="javascript:cal11.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></td>
  </tr>
  <tr> 
   <th width="150" class="label">Contact Number</td>
   <td> <input name="txtcontact" type="text" class="box" id="txtcontact" size="25" maxlength="100"></td>
  </tr>
  <tr> 
   <th width="150" class="label">Reffered to:</td>
   <td> <input name="txtrefferedto" type="text" class="box" id="txtrefferedto" size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <th colspan="2" align="center"><h3>Brief Outline of the Case </h3></td>
   <tr>
   <td colspan="2"> <textarea name="txtoutline" cols="80" rows="5" class="box" id="txtoutline"></textarea></td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddBlotter" type="button" id="btnAddBlotter" value="Add Blotter" onClick="checkAddBlotterForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
 <script language="JavaScript">
<!-- // create calendar object(s) just after form tag closed
	 // specify form element as the only parameter (document.forms['formname'].elements['inputname']);
	 // note: you can have as many calendar objects as you need for your application
	 	var cal11 = new calendar3(document.forms['frmAddBlotter'].elements['txtdate']);
	cal11.year_scroll = true;
	cal11.time_comp = false;
	</script>
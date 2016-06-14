<?php
if (!defined('WEB_ROOT')) {
	exit;
}

?> 
<p>&nbsp;</p>
<form action="processMissing.php?action=addMissing" method="post" enctype="multipart/form-data" name="frmAddMissing" id="frmAddMissing">
<table width="848" border="0" align="center" class="text">
  
  <tr>
    <td width="838" id="entryTableHeader">PHOTO </td>
  </tr>
  <tr> 
   <td class="row1"> <input name="fleImage" type="file" id="fleImage" class="box"> 
    </td>
  
  <tr>
    <td class="row2">NAME: <input  name="txtname" type="text" class="box" id="txtname" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">MISSING DATE: <input  name="txtdate" type="text" class="box" id="txtdate" size="10"  />
    <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  
		 <a href="javascript:cal11.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a> </td>
  </tr>
  <tr>
    <td class="row2">DATE OF BIRTH: <input  name="txtbirthdate" type="text" class="box" id="txtbirthdate" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">PLACE OF BIRTH: <input  name="txtbirthplace" type="text" class="box" id="txtbirthplace" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">AGE: <input  name="txtage" type="text" class="box" id="txtage" size="50"  /> </td>
  </tr>
   <tr>
    <td class="row1">GENDER:
	
	<select  name="txtgender">
	<option> -select-</option>
	<option> Male </option>
	<option> Female </option>
	</select>
	</td>
  </tr>
  <tr>
    <td class="row2">ADDRESS: <input  name="txtaddress" type="text" class="box" id="txtaddress" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">CITIZENSHIP: <input  name="txtcitizenship" type="text" class="box" id="txtcitizenship" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">STATUS: <input  name="txtstatus" type="text" class="box" id="txtstatus" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">HEIGHT: <input  name="txtheight" type="text" class="box" id="txtheight" size="5"  /> </td>
  </tr>
  <tr>
    <td class="row1">WEIGHT: <input  name="txtweight" type="text" class="box" id="txtweight" size="5"  /> </td>
  </tr>
   <tr>
    <td class="row1">COMPLEXION: <input  name="txtcomplexion" type="text" class="box" id="txtcomplexion" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">EYE COLOR: <input  name="txteyes" type="text" class="box" id="txteyes" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">HAIR COLOR: <input  name="txthair" type="text" class="box" id="txthair" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">DISTINGUISHING MARK(s): <input  name="txtothers" type="text" class="box" id="txtothers" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">REWARD: <input  name="txtreward" type="text" class="box" id="txtreward" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">C0NTACT PERSON </td>
  </tr>
  <tr>
    <td class="row1">CONTACT NAME: 
      <input  name="txtcontact" type="text" class="box" id="txtcontact" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">CONTACT NUMBER: <input  name="txtcontactNum" type="text" class="box" id="txtcontactNum" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">ADDRESS: <input  name="txtcaddress" type="text" class="box" id="txtcaddress" size="50"  /> </td>
  </tr>
</table>
 
  <input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Missing Person" onClick="checkAddMissingForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
</form>

 <script language="JavaScript">
<!-- // create calendar object(s) just after form tag closed
	 // specify form element as the only parameter (document.forms['formname'].elements['inputname']);
	 // note: you can have as many calendar objects as you need for your application
	 	var cal11 = new calendar3(document.forms['frmAddMissing'].elements['txtdate']);
	cal11.year_scroll = true;
	cal11.time_comp = false;
	
	//-->
</script>
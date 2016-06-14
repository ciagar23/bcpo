<?php
if (!defined('WEB_ROOT')) {
	exit;
}

?> 
<p>&nbsp;</p>
<form action="processWanted.php?action=addWanted" method="post" enctype="multipart/form-data" name="frmAddWanted" id="frmAddWanted">

  <article class="module width_full">
			<header><h3>About PNP</h3></header>
			<div class="module_content">
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
    <td class="row2">DATE OF BIRTH: <input  name="txtbirthdate" type="text" class="box" id="txtbirthdate" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">PLACE OF BIRTH: <input  name="txtbirthplace" type="text" class="box" id="txtbirthplace" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">AGE: <input  name="txtage" type="text" class="box" id="txtage" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">ALIAS: <input  name="txtalias" type="text" class="box" id="txtalias" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">WARRANT NUMBER: <input  name="txtwarrant" type="text" class="box" id="txtwarrant" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">CASE NUMBER: <input  name="txtcasenumber" type="text" class="box" id="txtcasenumber" size="50"  /> </td>
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
    <td class="row2">HEIGHT: <input  name="txtheight" type="text" class="box" id="txtheight" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">WEIGHT: <input  name="txtweight" type="text" class="box" id="txtweight" size="50"  /> </td>
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
    <td class="row2">DISTINGUISHING MARK(s): <input  name="txtmark" type="text" class="box" id="txtmark" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">REWARD: <input  name="txtreward" type="text" class="box" id="txtreward" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">CAPTION: <input  name="txtcaption" type="text" class="box" id="txtcaption" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">CRIME: <input  name="txtcrime" type="text" class="box" id="txtcrime" size="50"  /> </td>
  </tr>
</table>
 
  <input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Wanted Person" onClick="checkAddWantedForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
</form>

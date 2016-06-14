<?php
if (!defined('WEB_ROOT')) {
	exit;
}

?> 
<p>&nbsp;</p>

  <article class="module width_full">
			<header><h3>Add Rogue Gallery</h3></header>
			<div class="module_content">



<form action="processRogue.php?action=addRogue" method="post" enctype="multipart/form-data" name="frmAddCrime" id="frmAddCrime">
<table width="848" border="0" align="center" class="text">
  
  <tr>
    <td width="838" id="entryTableHeader">PHOTO </td>
  </tr>
  <tr> 
   <td class="row1"> Front View <input name="fleImage" type="file" id="fleImage" class="box"> 
    </td>
  <tr> 
   <td class="row2"> Left View <input name="fleImage2" type="file" id="fleImage2" class="box"> 
    </td>
  <tr> 
   <td class="row1"> Right View <input name="fleImage3" type="file" id="fleImage3" class="box"> 
    </td>
  <tr>
    <td width="838" id="entryTableHeader">I. PERSONAL DATA </td>
  </tr>
  <tr>
    <td class="row2">
      NAME: <input  name="txtname" type="text" class="box" id="txtname" size="25"  /> 
      ALIAS:<input  name="txtalias" type="text" class="box" id="txtalias" size="25"  /></td>
  </tr>
  <tr>
    <td class="row1">AGE: 
    <input  name="txtage" type="text" class="box" id="txtage" onKeyUp="checkNumber(this);" size="4" maxlength="3"  /> 
    SEX: 
   Male<input name="txtsex" type="radio" value="MALE" /> Female<input name="txtsex" type="radio" value="FEMALE" /> 
    CITIZENSHIP: 
    <input  name="txtcitizenship" type="text" class="box" id="txtcitizenship"  /></td>
  </tr>
  <tr>
    <td class="row2">DOB: 
      <select name="Month">
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
      </select>
	  <select name="day">
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
	  </select>
	  <select name="year">
	  <? for ($x=1950;$x<=2009;$x++) {?>
        <option><? echo $x;?></option>
		<? } ?>
	  </select>
    POB: 
    <input  name="txtpob" type="text" class="box" id="txtpob"  /></td>
  </tr>
  <tr>
    <td class="row1">PREVIOUS ADDRESS: 
    <input  name="txtpaddress" type="text" class="box" id="txtpaddress" size="50"  /></td>
  </tr>
  <tr>
    <td class="row2">PRESENT ADDRESS: 
    <input  name="txtaddress" type="text" class="box" id="txtaddress" size="50"  /></td>
  </tr>
  <tr>
    <td class="row1">OCCUPATION: 
    <input  name="txtoccupation" type="text" class="box" id="txtoccupation"  /></td>
  </tr>
  <tr>
    <td class="row2">GROUP AFFILIATION: 
    <input  name="txtgaffilation" type="text" class="box" id="txtgaffilation"  /></td>
  </tr>
  <tr>
    <td class="row1">MODUS OPERANDI: 
    <input  name="txtmodus" type="text" class="box" id="txtmodus" size="50"  /></td>
  </tr>
  <tr>
    <td class="row2">AREA OF OPN: 
    <input  name="txtarea" type="text" class="box" id="txtarea" size="50"  /></td>
  </tr>
  <tr>
    <td class="row1">&nbsp;</td>
  </tr>
  <tr>
    <td class="row2" id="entryTableHeader">II. PHYSICAL DESCRIPTION </td>
  </tr>
  <tr>
    <td class="row1">HEIGHT: 
    <input  name="txtheight" type="text" class="box" id="txtheight" size="5"  /> 
    WEIGHT: 
    <input  name="txtweight" type="text" class="box" id="txtweight" size="5" /> 
    BUILD: 
    <input  name="txtbuild" type="text" class="box" id="txtbuild"  /></td>
  </tr>
  <tr>
    <td class="row2">COMPEXION:
    <input  name="txtcomplexion" type="text" class="box" id="txtcomplexion"  /> 
    HAIR:
    <input  name="txthair" type="text" class="box" id="txthair" /> 
    EYES:
    <input  name="txteyes" type="text" class="box" id="txteyes" /></td>
  </tr>
  <tr>
    <td class="row1">OTHER DISTINGUISHING MARKS: 
    <input  name="txtothers" type="text" class="box" id="txtothers" size="50" /></td>
  </tr>
  <tr>
    <td class="row2">&nbsp;</td>
  </tr>
  <tr>
    <td class="row1" id="entryTableHeader">III. MARITAL STATUS </td>
  </tr>
  <tr>
    <td class="row2">NAME OF SPOUSE: 
    <input  name="txtsname" type="text" class="box" id="txtsname" size="25"  /> 
    ALIAS: 
    <input  name="txtsalias" type="text" class="box" id="txtsalias"  /></td>
  </tr>
  <tr>
    <td class="row1">AGE:
      <input  name="txtsage" type="text" class="box" id="txtsage" onKeyUp="checkNumber(this);" size="4" maxlength="3"  />
SEX:
 Male<input name="txtssex" type="radio" value="MALE" /> Female<input name="txtssex" type="radio" value="FEMALE" /> 
CITIZENSHIP:
<input  name="txtscitizenship" type="text" class="box" id="txtscitizenship"  /></td>
  </tr>
  <tr>
    <td class="row2">DOB:
	      <select name="sMonth">
        <option value="01">January</option>
        <option value="02">February</option>
        <option value="03">March</option>
        <option value="04">April</option>
        <option value="05">May</option>
        <option value="06">June</option>
        <option value="07">July</option>
        <option value="08">August</option>
        <option value="09">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
      </select>
	  <select name="sday">
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
	  </select>
	  <select name="syear">
	  <? for ($x=1950;$x<=2009;$x++) {?>
        <option><? echo $x;?></option>
		<? } ?>
	  </select>
	  
POB:
<input  name="txtspob" type="text" class="box" id="txtspob" /></td>
  </tr>
  <tr>
    <td class="row1">PREVIOUS ADDRESS:
      <input  name="txtspaddress" type="text" class="box" id="txtspaddress" size="50"  /></td>
  </tr>
  <tr>
    <td class="row2">PRESENT ADDRESS:
      <input  name="txtsaddress" type="text" class="box" id="txtsaddress" size="50" /></td>
  </tr>
  <tr>
    <td class="row1">OCCUPATION:
      <input  name="txtsoccupation" type="text" class="box" id="txtsoccupation"  /></td>
  </tr>
  <tr>
    <td class="row2">GROUP AFFILIATION:
      <input  name="txtsgaffilation" type="text" class="box" id="txtsgaffilation"  /></td>
  </tr>
  <tr>
    <td class="row1">MODUS OPERANDI:
      <input  name="txtsmodus" type="text" class="box" id="txtsmodus" size="50" /></td>
  </tr>
  <tr>
    <td class="row2">AREA OF OPN:
      <input  name="txtsarea" type="text" class="box" id="txtsarea" size="50" /></td>
  </tr>
  
  <tr>
    <td class="row1">&nbsp;</td>
  </tr>
  <tr>
    <td class="row2" id="entryTableHeader">IV: FAMILY BACKGROUND </td>
  </tr>
  <tr>
    <td class="row1">NAME OF THE FATHER: 
    <input  name="txtfname" type="text" class="box" id="txtfname" /> 
    AGE:
    <input  name="txtfage" type="text" class="box" onKeyUp="checkNumber(this);" id="txtfage" size="4" maxlength="3" /></td>
  </tr>
  <tr>
    <td class="row2">OCCUPATION: 
    <input  name="txtfoccupation" type="text" class="box" id="txtfoccupation" /></td>
  </tr>
  <tr>
    <td class="row1">ADDRESS: 
    <input  name="txtfaddress" type="text" class="box" id="txtfaddress" size="50" /></td>
  </tr>
  <tr>
    <td class="row2">NAME OF THE MOTHER:
      <input  name="txtmname" type="text" class="box" id="txtmname" /> 
      AGE: 
      <input  name="txtmage" type="text" class="box" onKeyUp="checkNumber(this);" id="txtmage" size="4" maxlength="3" /></td>
  </tr>
  <tr>
    <td class="row1">OCCUPATION: 
    <input  name="txtmoccupation" type="text" class="box" id="txtmoccupation" /></td>
  </tr>
  <tr>
    <td class="row2">ADDRESS: 
    <input  name="txtmaddress" type="text" class="box" id="txtmaddress" size="50" /></td>
  </tr>
  <tr>
  
    <td class="row1">NAME OF SISTERS/ BROTHERS: </td>
  </tr>
  <tr>
  <td class="row2"><textarea name="txtsiblings" class="box" id="txtsiblings" cols="70" rows="10"></textarea>
      </tr>
  <tr>
  
    <td class="row1">CRIME: </td>
  </tr>
  <tr>
  <td class="row2"><textarea name="mtxCrime" class="box" id="mtxCrime" cols="70" rows="4"></textarea>
      </tr>
  <tr>
    <td class="row1">Date of Incident: 
    <input  name="txtcdate" type="text" class="box" id="txtcdate" size="50" /></td>
  </tr>
  <tr>
    <td class="row2">Place of Incident: 
    <input  name="txtcplace" type="text" class="box" id="txtcplace" size="50" /></td>
  </tr>
  <tr>
    <td class="row1">CC/IS NR: 
    <input  name="txtccisnr" type="text" class="box" id="txtccisnr" size="50" /></td>
  </tr>
  <tr>
    <td class="row1">STATUS: 
    <input  name="txtcstatus" type="text" class="box" id="txtcstatus" size="50" /></td>
  </tr>
</table>
 
  <input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Rogue Gallery" onClick="checkAddCrimeForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
</form>

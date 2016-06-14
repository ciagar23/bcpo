<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;

$categoryList = buildCategoryOptions($catId);
?> 
<p>&nbsp;</p>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr>
  <td colspan="2" id="entryTableHeader">Add Blotter Record</td></tr>
  <tr> 
   <td width="150" class="label">Reported By</td>
   <td class="label"> <input name="txtreportedby" type="text" class="box" id="txtreportedby" value="IN PERSON" size="50" maxlength="100"></td>
  </tr>
   <tr>
  <td colspan="2" class="label">Complainant</td></tr>
  <tr> 
   <td width="150" class="label">First Name</td>
   <td class="label"> <input name="txtcfname" type="text" class="box" id="txtcfname" size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Last Name</td>
   <td class="label"> <input name="txtclname" type="text" class="box" id="txtclname" size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Middle Name</td>
   <td class="label"> <input name="txtcmname" type="text" class="box" id="txtcmname" size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Address</td>
   <td class="label"> <textarea name="txtaddress" cols="47" rows="3" class="box" id="txtaddress"></textarea></td>
  </tr>
  <tr> 
   <td width="150" class="label">Complaint</td>
   <td class="label"> <textarea name="txtcomplaint" cols="47" rows="3" class="box" id="txtcomplaint"></textarea></td>
  </tr>
  <tr> 
   <td width="150" class="label">Location</td>
   <td class="label"> <input name="txtlocation" type="text" class="box" id="txtlocation" size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Reffered to:</td>
   <td class="label"> <input name="txtrefferedto" type="text" class="box" id="txtrefferedto" size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <td class="label" colspan="2">Brief Outline of Complain</td>
   <tr>
   <td class="label" colspan="2"> <textarea name="txtoutline" cols="80" rows="5" class="box" id="txtoutline"></textarea></td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddBlotter" type="button" id="btnAddBlotter" value="Add Blotter" onClick="checkAddBlotterForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>

<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['policeId']) && $_GET['policeId'] > 0) {
	$policeId = $_GET['policeId'];
} else {
	header('Location: index.php');
}

$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline,bl_investigator, bl_cfname, bl_clname, bl_cmname, bl_caddress, bl_ccomplaint, bl_clocation, 

bl_crefferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rfname, bl_rlname, bl_rmname, bl_rlicnr, bl_rinsurance, bl_rcontact, 

bl_rinjury
        FROM tbl_blotter
		WHERE bl_id = $policeId";
$result = mysql_query($sql) or die('Cannot get Blotter. ' . mysql_error());
$row    = mysql_fetch_assoc($result);
extract($row);

?> 
<form action="processBlotter.php?action=modifyBlotter&policeId=<?php echo $policeId; ?>" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
 <p align="center" class="formTitle">Modify Blotter</p>
 
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
<tr>
  <td colspan="2" id="entryTableHeader">Modify Blotter Record</td></tr>
  <tr> 
   <td width="150" class="label">Reported By</td>
   <td class="content"> <input name="txtreportedby" type="text" class="box" id="txtreportedby"  value="<?php echo $bl_reportedby;  ?>"  size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <td width="150" class="label">First Name</td>
   <td class="content"> <input name="txtcfname" type="text" class="box" id="txtcfname" value="<?php echo $bl_cfname;  ?>"  size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Last Name</td>
   <td class="content"> <input name="txtclname" type="text" class="box" id="txtclname" value="<?php echo $bl_clname;  ?>"  size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Middle Name</td>
   <td class="content"> <input name="txtcmname" type="text" class="box" id="txtcmname" value="<?php echo $bl_cmname;  ?>"  size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Address</td>
   <td class="content"> <input name="txtaddress" type="text" class="box" id="txtaddress" value="<?php echo $bl_caddress;  ?>"  size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Complaint</td>
   <td class="content"> <input name="txtcomplaint" type="text" class="box" id="txtcomplaint" value="<?php echo $bl_ccomplaint;  ?>"  size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Location</td>
   <td class="content"> <input name="txtlocation" type="text" class="box" id="txtlocation" value="<?php echo $bl_clocation;  ?>"  size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Reffered to:</td>
   <td class="content"> <input name="txtrefferedto" type="text" class="box" id="txtrefferedto" value="<?php echo $bl_crefferedto;  ?>"  size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Brief Outline of Complain</td>
   <td class="content"> <input name="txtoutline" type="text" class="box" id="txtoutline" value="<?php echo $bl_outline;  ?>"  size="50" maxlength="100"></td>
  </tr>
 
 </table>
 <p align="center"> 
  <input name="btnModifyBlotter" type="button" id="btnModifyBlotter" value="Modify Blotter" onClick="checkAddBlotterForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['policeId']) && $_GET['policeId'] > 0) {
	$policeId = $_GET['policeId'];
} else {
	header('Location: index.php');
}

$inv = (isset($_GET['inv']) && $_GET['inv'] != '') ? $_GET['inv'] : '';
$CaseList = CaselistOptions($inv);

$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline,bl_investigator, bl_cname, bl_caddress, bl_ccomplaint, bl_clocation, 

bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rlicnr, bl_rinsurance, bl_rcontact, 

bl_rinjury
        FROM tbl_blotter
		WHERE bl_id = $policeId";
$result = mysql_query($sql) or die('Cannot get Blotter. ' . mysql_error());
$row    = mysql_fetch_assoc($result);
extract($row);

?> 
<form action="processBlotter.php?action=modifyBlotter&policeId=<?php echo $policeId; ?>" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
 <p align="center" class="formTitle">Modify Blotter</p>
 
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="detail">
   <tr>
  <th colspan="2" align="center"><h3>Complainant</h3></td></tr>
  <tr> 
   <tr> 
   <th width="150" class="label">Investogator</td>
   <td class="content"> <select name="cboInvestigator" id="cboInvestigator" class="box">
     <option value="<? echo $bl_reportedby;?>" selected><? echo $bl_reportedby;?></option>
<?php
	echo $CaseList;
?>	 
   </td>
  </tr>
   <th width="150" class="label">Name</td>
   <td> <input name="txtcname" type="text" class="box" id="txtcname" value="<? echo $bl_cname;?>" size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <th width="150" class="label">Address</td>
   <td> <textarea name="txtaddress" cols="47" rows="3" class="box" id="txtaddress"><? echo $bl_caddress;?></textarea></td>
  </tr>
  <tr> 
   <th width="150" class="label">Complaint</td>
   <td> <textarea name="txtcomplaint" cols="47" rows="3" class="box" id="txtcomplaint"><? echo $bl_ccomplaint;?></textarea></td>
  </tr>
  <tr> 
   <th width="150" class="label">Place of Incident</td>
   <td> <input name="txtlocation" type="text" class="box" id="txtlocation"  value="<? echo $bl_clocation;?>"size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <th width="150" class="label">Contact Number</td>
   <td> <input name="txtcontact" type="text" class="box" id="txtcontact" value="<? echo $bl_ccontact;?>" size="25" maxlength="100"></td>
  </tr>
  <tr> 
   <th width="150" class="label">Reffered to:</td>
   <td> <input name="txtrefferedto" type="text" class="box" id="txtrefferedto" value="<? echo $bl_refferedto;?>" size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <th colspan="2" align="center"><h3>Brief Outline of the Case </h3></td>
   <tr>
   <td colspan="2"> <textarea name="txtoutline" cols="80" rows="5" class="box" id="txtoutline"><? echo $bl_outline;?></textarea></td>
  </tr>
 </table>
 
 

 <p align="center"> 
  <input name="btnModifyBlotter" type="button" id="btnModifyBlotter" value="Update Blotter" onClick="checkAddBlotterFormtmu();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
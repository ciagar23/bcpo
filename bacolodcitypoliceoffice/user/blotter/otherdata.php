<?php
if (!defined('WEB_ROOT')) {
	exit;
}

// make sure a Blotter id exists
if (isset($_GET['policeId']) && $_GET['policeId'] > 0) {
	$policeId = $_GET['policeId'];
} else {
	// redirect to index.php if Blotter id is not present
	header('Location: index.php');
}

$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline,bl_investigator, bl_cfname, bl_clname, bl_cmname, bl_caddress, bl_ccomplaint, bl_clocation, bl_crefferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rfname, bl_rlname, bl_rmname, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury
        FROM tbl_blotter
		WHERE bl_id = $policeId";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());

$row = mysql_fetch_assoc($result);
extract($row);

?>
<p>&nbsp;</p>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <td width="150" class="label" colspan="4" align="left">Date: <?php echo $bl_date; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label" colspan="2">Complainant</td>
   <td width="150" class="label" colspan="2">Respondents</td>
  </tr>
  <tr> 
   <td width="150" class="label">First name</td>
   <td class="content"> <?php echo $bl_cfname; ?></td>
   <td width="150" class="label">First name</td>
   <td class="content"> <?php echo $bl_rfname; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label">Last name</td>
   <td class="content"> <?php echo $bl_clname; ?></td>
   <td width="150" class="label">Last name</td>
   <td class="content"> <?php echo $bl_rlname; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label">Middle name</td>
   <td class="content"> <?php echo $bl_cmname; ?></td>
   <td width="150" class="label">Middle name</td>
   <td class="content"> <?php echo $bl_rmname; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label">Lic No</td>
   <td class="content"> <?php echo $bl_clicnr; ?></td>
   <td width="150" class="label">Lic No</td>
   <td class="content"> <?php echo $bl_rlicnr; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label">Insurrance</td>
   <td class="content"> <?php echo $bl_cinsurance; ?></td>
   <td width="150" class="label">Insurrance</td>
   <td class="content"> <?php echo $bl_rinsurance; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label">Contact</td>
   <td class="content"> <?php echo $bl_ccontact; ?></td>
   <td width="150" class="label">Contact</td>
   <td class="content"> <?php echo $bl_rcontact; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label">Injury</td>
   <td class="content"> <?php echo $bl_cinjury; ?></td>
   <td width="150" class="label">Injury</td>
   <td class="content"> <?php echo $bl_rinjury; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label" colspan=4 align="center">Investigator: <?php echo $bl_investigator; ?></td>
  </tr>

 </table>
 <p align="center"> 
  
  <input name="btnModifyBlotter" type="button" id="btnModifyBlotter" value="Modify Blotter" onClick="window.location.href='index.php?view=modify&policeId=<?php echo $policeId; ?>';" class="box">
  &nbsp;&nbsp;
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.history.back();" class="box">
 </p>
</form>

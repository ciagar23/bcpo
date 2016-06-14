<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

if (isset($_GET['policeId']) && $_GET['policeId'] > 0) {
	$policeId = $_GET['policeId'];
} else {
	header('Location: index.php');
}

$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cname, bl_cage, bl_cgender, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rage, bl_rgender, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury,bl_investigator, bl_dtg, bl_cnat, bl_rdrugs, bl_ralc, bl_runc, bl_rfa, bl_rnat, bl_brgy, bl_prosec, bl_court, bl_crime, bl_cstatus, bl_rstatus
        FROM tbl_blotter where bl_id='$policeId'";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);
if( $bl_rdrugs !=0)
{
$bl_rdrugs = 'checked="checked"';
}
else
{
$bl_rdrugs='';
}

if( $bl_ralc !=0)
{
$bl_ralc = 'checked="checked"';
}
else
{
$bl_ralc='';
}

if( $bl_rfa !=0)
{
$bl_rfa = 'checked="checked"';
}
else
{
$bl_rfa='';
}
if( $bl_runc !=0)
{
$bl_runc = 'checked="checked"';
}
else
{
$bl_runc='';
}

?>
<form action="processBlotter.php?action=addotherdatatmu&policeId=<?=$policeId;?>" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
<table width="100%"  border="0" align="center">
  <tr>
    <td align="center">
	<table width="401" border="0">
      <tr>
        <td colspan="2" class="entryTable">COMPLAINANT'S DATA: </td>
        </tr>
      <tr class="row1">
        <td> Name:</td>
        <td>&nbsp;<?php echo $bl_cname; ?>        </td>
      </tr>
      <tr class="row2">
        <td>Lic #. </td>
        <td><span class="label">
          <input name="txtclicnr" type="text" class="box" value="<?php echo $bl_clicnr; ?>" id="txtlicnr" size="30%" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row1">
        <td>Insurrance</td>
        <td><span class="label">
          <input name="txtcinsurance" type="text" class="box" value="<?php echo $bl_cinsurance; ?>" id="txtcinsurance" size="30%" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row2">
        <td>Contact</td>
        <td><span class="label">
          <input name="txtccontact" type="text" class="box" value="<?php echo $bl_ccontact; ?>" id="txtccontact" size="30%" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row1">
        <td>Injury</td>
        <td><span class="label">
          <input name="txtcinjury" type="text" class="box" value="<?php echo $bl_cinjury; ?>" id="txtcinjury" size="30%" maxlength="100" />
        </span></td>
      </tr>
    </table></td>
    <td align="center"><table width="401" border="0">
      <tr>
        <td colspan="2" class="entryTable">RESPONDENT'S DATA: </td>
      </tr>
      <tr class="row1">
        <td> Name:</td>
        <td>
          <input name="txtrname" type="text" class="box" value="<?php echo $bl_rname; ?>" id="txtrname" size="30%" maxlength="100" />
     </td>
      </tr>
      <tr class="row2">
        <td>Lic #. </td>
        <td><span class="label">
          <input name="txtrlicnr" type="text" class="box" value="<?php echo $bl_rlicnr; ?>" id="txtrlicnr" size="30%" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row1">
        <td>Insurrance</td>
        <td><span class="label">
          <input name="txtrinsurance" type="text" class="box" value="<?php echo $bl_rinsurance; ?>" id="txtrinsurance" size="30%" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row2">
        <td>Contact</td>
        <td><span class="label">
          <input name="txtrcontact" type="text" class="box" value="<?php echo $bl_rcontact; ?>" id="txtrcontact" size="30%" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row1">
        <td>Injury</td>
        <td><span class="label">
          <input name="txtrinjury" type="text" class="box" value="<?php echo $bl_rinjury; ?>" id="txtrinjury" size="30%" maxlength="100" />
        </span></td>
      </tr>
    </table></td>
  </tr>
</table>
  
 <p align="center"> 
  <input name="btnAddBlotter" type="button" id="btnAddBlotter" value="Add Blotter" onClick="checkAddotherdatatmuForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>

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
<p>&nbsp;</p>
<form action="processBlotter.php?action=addotherdata&policeId=<?=$policeId;?>" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">


 <table width="100%"  border="0" align="center">
  <tr>
    <td height="180" align="center">
	<table width="396" height="132" border="0">
	<tr>
	<td height="23" colspan="2" class="entryTable">	</tr>
      <tr class="row1">
        <td>DTG:</td>
        <td><span class="label">
          <input name="txtdtg" type="text" class="box" value=" <?php echo $bl_dtg; ?>" id="txtdtc" size="30%" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row2">
        <td>Place:</td>
        <td>&nbsp;<?php echo $bl_clocation; ?>
        </span></td>
      </tr>
      <tr class="row1">
        <td height="23">Law Violated: </td>
        <td> &nbsp;<?php echo $bl_crime; ?>
        </span></td>
      </tr>
    </table>
	</td>
    <td align="center">
	<table border="0">
      <tr>
        <td colspan="2" class="entryTable">&nbsp;</td>
        </tr>
      <tr class="row1">
        <td width="69">Brgy:</td>
        <td width="324"><span class="label">
          <input name="txtbrgy" type="text" class="box" value=" <?php echo $bl_brgy; ?>" id="txtbrgy" size="30%" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row2">
        <td>Prosecutor:</td>
        <td><span class="label">
          <input name="txtprosec" type="text" class="box" value=" <?php echo $bl_prosec; ?>" id="txtprosec" size="30%" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row1">
        <td height="61">Court:</td>
        <td><span class="label">
          <input name="txtcourt" type="text" class="box" value=" <?php echo $bl_court; ?>" id="txtcourt" size="30%" maxlength="100" />
        </span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center">
	<table width="401" border="0">
      <tr>
        <td colspan="2" class="entryTable">COMPLAINANT'S DATA: </td>
        </tr>
      <tr class="row1">
        <td> Name:</td>
        <td>&nbsp;<?php echo $bl_cname; ?>
        </td>
      </tr>
      <tr class="row2">
        <td>Age:</td>
        <td><span class="label">
          <input name="txtcage" type="text" class="box" value=" <?php echo $bl_cage; ?>" id="txtcage" size="5" maxlength="10" />
        </span></td>
      </tr>
      <tr class="row1">
        <td>Gender:</td>
        <td><span class="label">
          <input name="txtcgender" type="text" class="box" value=" <?php echo $bl_cgender; ?>" id="txtcsgender" size="30%" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row2">
        <td>Civil Status: </td>
        <td><span class="label">
          <input name="txtcstatus" type="text" class="box" value=" <?php echo $bl_cstatus; ?>" id="txtcstatus" size="30%" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row1">
        <td>Nationality: </td>
        <td><span class="label">
          <input name="txtcnat" type="text" class="box" value=" <?php echo $bl_cnat; ?>" id="txtcnat" size="30%" maxlength="100" />
        </span></td>
      </tr>
    </table></td>
    <td align="center"><table width="398" border="0">
      <tr>
        <td colspan="2" class="entryTable">RESPONDENT'S DATA:</td>
        </tr>
      <tr class="row1">
        <td>Name:</td>
        <td><span class="label">
          <input name="txtrname" type="text" class="box" value=" <?php echo $bl_rname; ?>" id="txtrname" size="30%" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row2">
        <td>Age:</td>
        <td><span class="label">
          <input name="txtrage" type="text" class="box" value=" <?php echo $bl_rage; ?>" id="txtrage" size="5" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row1">
        <td>Gender:</td>
        <td><span class="label">
          <input name="txtrgender" type="text" class="box" value=" <?php echo $bl_rgender; ?>" id="txtrgender" size="30%" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row2">
        <td>Civil Status: </td>
        <td><span class="label">
          <input name="txtrstatus" type="text" class="box" value=" <?php echo $bl_rstatus; ?>" id="txtrstatus" size="30%" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row1">
        <td >Nationality:</td>
        <td><span class="label">
          <input name="txtrnat" type="text" class="box" value=" <?php echo $bl_rnat; ?>" id="txtrnat" size="30%" maxlength="100" />
        </span></td>
      </tr>
      <tr class="row2">
        <td >Use of: </td>
        <td>
		<input type="checkbox" name="checkdrugs" id="checkdrugs" <?php echo $bl_rdrugs; ?> value="checkbox" />
          Drugs
          <input type="checkbox" name="checkalcohol" id="checkalcohol" <?php echo $bl_ralc; ?> value="checkbox" />
          Alcohol
          <input type="checkbox" name="checkunc" id="checkunc" <?php echo $bl_runc; ?> value="checkbox" />
          Unc
          <input type="checkbox" name="checkfa" id="checkfa" <?php echo $bl_rfa; ?> value="checkbox" />
          F/A
        </td>
      </tr>
    </table></td>
  </tr>
</table>
  
 <p align="center"> 
  <input name="btnAddBlotter" type="button" id="btnAddBlotter" value="Add Blotter" onClick="checkAddotherdataForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>

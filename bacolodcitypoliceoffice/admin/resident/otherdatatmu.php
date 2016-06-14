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

$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cname, bl_cage, bl_cgender, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rage, bl_rgender, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury,bl_investigator, bl_dtg, bl_cnat, bl_rdrugs, bl_ralc, bl_runc, bl_rfa, bl_rnat, bl_brgy, bl_prosec, bl_court, bl_crime, bl_cstatus, bl_rstatus, bl_tmupic1, bl_tmupic2,  bl_tmupic3, bl_tmupic4
        FROM tbl_blotter
		WHERE bl_id = $policeId";
		
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());

$row = mysql_fetch_assoc($result);
extract($row);
if( $bl_rdrugs !=0)
{
$bl_rdrugs = '* drugs <br>';
}
else
{
$bl_rdrugs='';
}

if( $bl_ralc !=0)
{
$bl_ralc = '* alcohol  <br>';
}
else
{
$bl_ralc='';
}

if( $bl_rfa !=0)
{
$bl_rfa = '* F/A  <br>';
}
else
{
$bl_rfa='';
}
if( $bl_runc !=0)
{
$bl_runc = '* UNC  <br>';
}
else
{
$bl_runc='';
}

if ($bl_tmupic1) {
	$bl_tmupic1 = WEB_ROOT . 'images/tmuphotos/' . $bl_tmupic1;
} else {
	$bl_tmupic1 = WEB_ROOT . 'images/no-image-large.png';
}


if ($bl_tmupic2) {
	$bl_tmupic2 = WEB_ROOT . 'images/tmuphotos/' . $bl_tmupic2;
} else {
	$bl_tmupic2 = WEB_ROOT . 'images/no-image-large.png';
}


if ($bl_tmupic3) {
	$bl_tmupic3 = WEB_ROOT . 'images/tmuphotos/' . $bl_tmupic3;
} else {
	$bl_tmupic3 = WEB_ROOT . 'images/no-image-large.png';
}


if ($bl_tmupic4) {
	$bl_tmupic4 = WEB_ROOT . 'images/tmuphotos/' . $bl_tmupic4;
} else {
	$bl_tmupic4 = WEB_ROOT . 'images/no-image-large.png';
}


$useof = $bl_rdrugs . $bl_ralc. $bl_runc . $bl_rfa;
?>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
  <table width="100%"  border="0" align="center">
    <tr>
      <td align="center"><table width="401" border="0">
          <tr>
            <td colspan="2" class="entryTable">COMPLAINANT'S DATA: </td>
          </tr>
          <tr class="row1">
            <td width="98"> Name:</td>
            <td width="293">&nbsp;<?php echo $bl_cname; ?> </td>
          </tr>
          <tr class="row2">
            <td>Lic #. </td>
            <td><?php echo $bl_clicnr; ?>
          </tr>
          <tr class="row1">
            <td>Insurrance</td>
            <td> <?php echo $bl_cinsurance; ?>
          </tr>
          <tr class="row2">
            <td>Contact</td>
            <td><?php echo $bl_ccontact; ?>
          </tr>
          <tr class="row1">
            <td>Injury</td>
            <td><?php echo $bl_cinjury; ?>
          </tr>
      </table></td>
      <td align="center"><table width="401" border="0">
          <tr>
            <td colspan="2" class="entryTable">RESPONDENT'S DATA: </td>
          </tr>
          <tr class="row1">
            <td width="104"> Name:</td>
            <td width="287"><?php echo $bl_rname; ?>          </tr>
          <tr class="row2">
            <td>Lic #. </td>
            <td><?php echo $bl_rlicnr; ?>
          </tr>
          <tr class="row1">
            <td>Insurrance</td>
            <td><?php echo $bl_rinsurance; ?>
          </tr>
          <tr class="row2">
            <td>Contact</td>
            <td><?php echo $bl_rcontact; ?>
          </tr>
          <tr class="row1">
            <td>Injury</td>
            <td><?php echo $bl_rinjury; ?>
            </span></td>
          </tr>
      </table></td>
    </tr>
</table>
<table align="center">
<tr>
<td><img src="<?php echo $bl_tmupic1; ?>" width="350">
<td><img src="<?php echo $bl_tmupic2; ?>" width="350">
<tr>
<td><img src="<?php echo $bl_tmupic3; ?>" width="350">
<td><img src="<?php echo $bl_tmupic4; ?>" width="350">
</table>
 <p align="center">&nbsp;&nbsp;
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.location.href='index.php?view=detail&policeId=<?php echo $policeId; ?>';" class="box">
 </p>
</form>

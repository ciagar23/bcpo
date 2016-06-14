<?php
if (!defined('WEB_ROOT')) {
	exit;
}

// make sure a product id exists
if (isset($_GET['policeId']) && $_GET['policeId'] > 0) {
	$policeId = $_GET['policeId'];
} else {
	// redirect to index.php if product id is not present
	header('Location: index.php');
}

$sql = "SELECT r_id, r_image, r_thumbnail, r_image2, r_thumbnail2, r_image3, r_thumbnail3, r_name, r_alias, r_age, r_sex, r_citizenship, r_dob, r_pob, r_p_address, r_address, r_occupation, r_g_affilation, r_modus, r_area_opn, r_height, r_weight, r_build, r_complexion, r_hair, r_eyes, r_others, r_s_name, r_s_alias, r_s_age, r_s_sex, r_s_citizenship, r_s_dob, r_s_pob, r_s_p_address, r_s_address, r_s_occupation, r_s_g_affilation, r_s_modus, r_f_name, r_f_age, r_f_occupation, r_f_address, r_m_name, r_m_age, r_m_occupation, r_s_area_opn, r_m_address, r_siblings FROM tbl_rogue_gallery
		WHERE r_id = $policeId";
$result = mysql_query($sql) or die('Cannot get product. ' . mysql_error());

$row = mysql_fetch_assoc($result);
extract($row);

if ($r_image) {
	$r_image = WEB_ROOT . 'images/rogue_gallery/' . $r_image;
	$r_thumbnail = WEB_ROOT . 'images/rogue_gallery/' . $r_thumbnail;
} else {
	$r_image = WEB_ROOT . 'images/no-image-large.png';
}

if ($r_image2) {
	$r_image2 = WEB_ROOT . 'images/rogue_gallery/' . $r_image2;
	$r_thumbnail2 = WEB_ROOT . 'images/rogue_gallery/' . $r_thumbnail2;
} else {
	$r_image2 = WEB_ROOT . 'images/no-image-large.png';
}

if ($r_image3) {
	$r_image3 = WEB_ROOT . 'images/rogue_gallery/' . $r_image3;
	$r_thumbnail3 = WEB_ROOT . 'images/rogue_gallery/' . $r_thumbnail3;
} else {
	$r_image3 = WEB_ROOT . 'images/no-image-large.png';
}


?>
<p>&nbsp;</p>
<form action="processRogue.php?action=addProduct" method="post" enctype="multipart/form-data" name="frmAddProduct" id="frmAddProduct">
 <table width="848" border="1" align="center"  class="detail">

  <tr>
    <td width="838" class="entryTable" colspan="3"><strong>I. PERSONAL DATA </strong></td>
  </tr>
  <tr class="row1">
    <td class="content" width="50%" colspan="2">
      <strong>NAME:</strong> <?php echo $r_name; ?> 
    <td class="content" width="50%">  <strong>ALIAS:</strong> <?php echo $r_alias; ?></td>
  </tr>
  <tr class="row1">
    <td class="content"><strong>AGE:</strong> <?php echo $r_age; ?> 
    <td class="content" width="30%"><strong>SEX:</strong> <?php echo $r_sex; ?>
    <td class="content" width="30%"><strong>CITIZENSHIP:</strong> <?php echo $r_citizenship; ?></td>
  </tr>
  <tr class="row2">
    <td class="content" width="50%" colspan="2"><strong>DOB:</strong> <?php echo $r_dob; ?>
    <td class="content" width="50%"><strong>POB: </strong> <?php echo $r_pob; ?></td>
  </tr>
  <tr class="row1">
    <td class="content" colspan="3"><strong>PREVIOUS ADDRESS:</strong> <?php echo $r_p_address; ?></td>
  </tr>
  <tr class="row2">
    <td class="content" colspan="3"><strong>PRESENT ADDRESS:</strong> <?php echo $r_address; ?></td>
  </tr>
  <tr class="row1">
    <td class="content" colspan="3"><strong>OCCUPATION:</strong> <?php echo $r_occupation; ?></td>
  </tr>
  <tr class="row2">
    <td class="content" colspan="3"><strong>GROUP AFFILIATION:</strong> <?php echo $r_g_affilation; ?></td>
  </tr>
  <tr class="row1">
    <td class="content" colspan="3"><strong>MODUS OPERANDI:</strong> <?php echo $r_modus; ?></td>
  </tr>
  <tr class="row2">
    <td class="content" colspan="3"><strong>AREA OF OPN:</strong> <?php echo $r_area_opn; ?></td>
  </tr>
  <tr>
    <td class="content" colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td class="entryTable" colspan="3"><strong>II. PHYSICAL DESCRIPTION </strong></td>
  </tr>
  <tr class="row1">
    <td class="content"><strong>HEIGHT: </strong><?php echo $r_height; ?>
    <td class="content"><strong>WEIGHT:</strong>  <?php echo $r_weight; ?>
    <td class="content"><strong>BUILD:</strong> <?php echo $r_build; ?></td>
  </tr>
  <tr class="row2">
    <td class="content"><strong>COMPEXION:</strong> <?php echo $r_complexion; ?> 
    <td class="content"><strong>HAIR:</strong> <?php echo $r_hair; ?>
    <td class="content"><strong>EYES:</strong> <?php echo $r_eyes; ?></td>
  </tr>
  <tr class="row1">
    <td class="content" colspan="3"><strong>OTHER DISTINGUISHING MARKS: </strong> <?php echo $r_others; ?></td>
  </tr>
  <tr>
    <td class="content" colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td class="entryTable" colspan="3"><strong>III. MARITAL STATUS </strong></td>
  </tr>
  <tr class="row1">
    <td class="content" colspan="2"><strong>NAME OF SPOUSE:</strong> <?php echo $r_s_name; ?>
    <td class="content"><strong>ALIAS:</strong>  <?php echo $r_s_alias; ?></td>
  </tr>
  <tr class="row2">
    <td class="content"><strong>AGE:</strong> <?php echo $r_s_age; ?>
	<td class="content"><strong>SEX:</strong> <?php echo $r_s_sex; ?>
	<td class="content"><strong>CITIZENSHIP:</strong><?php echo $r_s_citizenship; ?></td>
  </tr>
  <tr class="row1">
    <td class="content" colspan="2"><strong>DOB:</strong> <?php echo $r_s_dob; ?>
	<td class="content"><strong>POB:</strong> <?php echo $r_s_pob; ?></td>
  </tr>
  <tr class="row2">
    <td class="content" colspan="3"><strong>PREVIOUS ADDRESS:</strong> <?php echo $r_s_p_address; ?></td>
  </tr>
  <tr class="row1">
    <td class="content" colspan="3"><strong>PRESENT ADDRESS:</strong> <?php echo $r_s_address; ?></td>
  </tr>
  <tr class="row2">
    <td class="content" colspan="3"><strong>OCCUPATION:</strong> <?php echo $r_s_occupation; ?></td>
  </tr>
  <tr class="row1">
    <td class="content" colspan="3"><strong>GROUP AFFILIATION: </strong><?php echo $r_s_g_affilation; ?></td>
  </tr>
  <tr class="row2">
    <td class="content" colspan="3"><strong>MODUS OPERANDI:</strong> <?php echo $r_s_modus; ?></td>
  </tr>
  <tr class="row1">
    <td class="content" colspan="3"><strong>AREA OF OPN:</strong> <?php echo $r_s_area_opn; ?></td>
  </tr>
  
  <tr>
    <td class="content" colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td class="entryTable" colspan="3"><strong>IV: FAMILY BACKGROUND </strong></td>
  </tr>
  <tr class="row1">
    <td class="content" colspan="2"><strong>NAME OF THE FATHER: </strong> <?php echo $r_f_name; ?>
    <td class="content"><strong>AGE:</strong><?php echo $r_f_age; ?></td>
  </tr>
  <tr class="row2">
    <td class="content" colspan="3"><strong>OCCUPATION: </strong> <?php echo $r_f_occupation; ?></td>
  </tr>
  <tr class="row1">
    <td class="content" colspan="3"><strong>ADDRESS:</strong> <?php echo $r_f_address; ?></td>
  </tr>
  <tr class="row2">
    <td class="content" colspan="2"><strong>NAME OF THE MOTHER: </strong><?php echo $r_m_name; ?>
    <td class="content"><strong>AGE:</strong>  <?php echo $r_m_age; ?></td>
  </tr>
  <tr class="row1">
    <td class="content" colspan="3"><strong>OCCUPATION:</strong> <?php echo $r_m_occupation; ?></td>
  </tr>
  <tr class="row2">
    <td class="content" colspan="3"><strong>ADDRESS:</strong> <?php echo $r_m_address; ?></td>
  </tr>
  <tr class="row1">
  
    <td class="content" colspan="3"><strong>NAME OF SISTERS/ BROTHERS:</strong> </td>
  </tr>
  <tr class="row2">
  <td class="content" colspan="3"><?php echo nl2br($r_siblings); ?>
  </tr>
  <tr class="row1">
  
    <td class="content" colspan="3"><strong>THUMBMARK:</strong> </td>
  </tr>
  <tr class="row2">
  <td class="content" colspan="3" height="100">
  <table height="100%" width="100%" border="1">
  <tr>
  <td>&nbsp;
  <td>&nbsp;
  <td>&nbsp;
  <td>&nbsp;
  </table>
  </tr>
	<tr class="row1">
	<td class="content" colspan="3">
 

</form>
<? require_once 'roguelist.php'; ?>
</table>


<script language="javascript">

window.print()
window.close()
window.location ='index.php?view=detail&policeId=<? echo $policeId;?>';



</script>

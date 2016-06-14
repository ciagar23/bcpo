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

$sql = "SELECT w_id, w_name, w_alias, w_casenumber, w_dob, w_pob, w_height, w_weight, w_address, w_caption, w_gender, w_warrant, w_crime, w_age, w_captured, w_datenow, w_image, w_thumbnail, w_reward, w_citizenship, w_eyes, w_hair, w_complexion, w_mark
 FROM tbl_wanted
		WHERE w_id = $policeId";
$result = mysql_query($sql) or die('Cannot get. ' . mysql_error());

$row = mysql_fetch_assoc($result);
extract($row);

if ($w_image) {
	$w_image = WEB_ROOT . 'images/wanted/' . $w_image;
	$w_thumbnail = WEB_ROOT . 'images/wanted/' . $w_thumbnail;
} else {
	$w_image = WEB_ROOT . 'images/no-image-large.png';
}

?>
<p>&nbsp;</p>
 
 <table width="80%" border="1" cellspacing="2" align="center">
  <tr>
    <td rowspan="18" valign="top"><a href="<?php echo $w_image; ?>" rel="lightbox[roadtrip1]"><img src="<?php echo $w_image; ?>" width="365"  border="0"></a></td>
   <tr>
    <td width="50%" class="entryTable" colspan="2"><strong>PERSONAL DATA </strong><font color="#FF0000"></td>
  </tr>
  <tr class="row1">
    <td class="content" width="30%" colspan="2">
      <strong>NAME:</strong><font color="#FF0000"><font color="#FF0000"> <?php echo $w_name; ?> 
    </td>
  </tr>
  <tr class="row2">
    <td class="content" width="30%" colspan="2"><strong>AGE:</strong><font color="#FF0000"> <?php echo $w_age; ?> 
  </tr>
	 <tr class="row2">
    <td class="content"  width="30%" colspan="2"><strong>ALIAS:</strong><font color="#FF0000"> <?php echo $w_alias; ?></td>
  </tr>
	<tr class="row1">
    <td class="content" width="30%" colspan="2"><strong>GENDER:</strong><font color="#FF0000"> <?php echo $w_gender; ?></font>
	</tr>
	<tr class="row2">
    <td class="content" width="30%" colspan="2"><strong>CITIZENSHIP:</strong><font color="#FF0000"> <?php echo $w_citizenship; ?></td>
  </tr>
  <tr class="row1">
    <td class="content" width="30%" colspan="2"><strong>DATE OF BIRTH:</strong><font color="#FF0000"> <?php echo $w_dob; ?>
  </tr>
	<tr class="row2">
    <td class="content" width="30%" colspan="2"><strong>PLACE OF BIRTH: </strong><font color="#FF0000"> <?php echo $w_pob; ?></td>
  </tr>
  <tr class="row1">
    <td class="content"  width="30%" colspan="2" ><strong>ADDRESS:</strong><font color="#FF0000"> <?php echo $w_address; ?></td>
  </tr>
 <tr class="row2">
    <td class="content"  width="30%" colspan="2"><strong>WEIGHT:</strong><font color="#FF0000"> <?php echo $w_weight; ?></td>
  </tr>
 <tr class="row1">
    <td class="content"  width="30%" colspan="2"><strong>HEIGHT:</strong><font color="#FF0000"> <?php echo $w_height; ?></td>
  </tr>
  <tr class="row2">
    <td class="content"  width="30%" colspan="2"><strong>COMPLEXION:</strong><font color="#FF0000"> <?php echo $w_complexion; ?></td>
  </tr>
 <tr class="row1">
    <td class="content"  width="30%" colspan="2"><strong>EYE COLOR:</strong><font color="#FF0000"> <?php echo $w_eyes; ?></td>
  </tr>
 <tr class="row2">
    <td class="content"  width="30%" colspan="2"><strong>HAIR COLOR:</strong><font color="#FF0000"> <?php echo $w_hair; ?></td>
	 <tr>
	 <tr class="row1">
    <td class="content"  width="30%" colspan="2"><strong>DISTINGUISHING MARK(s):</strong><font color="#FF0000"> <?php echo $w_mark; ?></td>
	 <tr>
	 <tr class="row2">
    <td class="content"  width="30%" colspan="3"><strong>CRIME:</strong><font color="#FF0000"> <?php echo $w_crime; ?></td>
  </tr>
	 <tr class="row2">
    <td class="content"  width="30%" colspan="3"><strong>WARRANT NUMBER:</strong><font color="#FF0000"> <?php echo $w_warrant; ?></td>
  </tr>
	 <tr class="row2">
    <td class="content"  width="30%" colspan="3"><strong>CASE NUMBER:</strong><font color="#FF0000"> <?php echo $w_casenumber; ?></td>
  </tr>
	 <tr class="row2">
    <td class="content"  width="30%" colspan="3"><strong>REWARD:</strong><font color="#FF0000"> <?php echo $w_reward; ?></td>
  </tr>
 
</table>


 

</table>
 <p align="center"> 
  <input name="btnModify" type="button" id="btnModify" value="Modify" onClick="window.location.href='index.php?view=modify&policeId=<?php echo $policeId; ?>';" class="box">
  <input name="btnAddProduct" type="button" id="btnAddProduct" value="Print" class="box" onClick="window.location.href='printindex.php?view=printdetail&policeId=<?php echo $policeId; ?>';">
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.history.back();" class="box">
 </p>
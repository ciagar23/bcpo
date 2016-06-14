<h3><a href='<?php echo WEB_ROOT;?>website/crimeinfo/index.php?view=crimeincident'> Statistic</a> ||
 <a href='<?php echo WEB_ROOT;?>website/index.php?view=mostwantedall'>Most Wanted</a> ||
  <a href='<?php echo WEB_ROOT;?>website/index.php?view=missingall'>Missing Persons</a></h3><?php
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
 
 <table width="100%" border="0" bgcolor="#CC6633" cellspacing="2" align="center">
  <tr bgcolor='white'>
    <td rowspan="9" valign="top"><a href="<?php echo $w_image; ?>" rel="lightbox[roadtrip1]"><img src="<?php echo $w_image; ?>" width="195" height="199"  border="0"></a></td>
   <tr bgcolor='white'>
    <td width="50%" class="entryTable" colspan="2"><strong>PERSONAL DATA </strong></td>
  </tr>
  <tr bgcolor='white' >
    <td width="30%" colspan="2">
      <strong>NAME:</strong> <?php echo $w_name; ?> 
    </td>
  </tr>
  <tr bgcolor='white' >
    <td width="30%" colspan="2"><strong>AGE:</strong> <?php echo $w_age; ?> 
  </tr>
	 <tr bgcolor='white' >
    <td  width="30%" colspan="2"><strong>ALIAS:</strong> <?php echo $w_alias; ?></td>
  </tr>
	<tr bgcolor='white' >
    <td width="30%" colspan="2"><strong>GENDER:</strong> <?php echo $w_gender; ?></font>
	</tr>
	<tr bgcolor='white' >
    <td width="30%" colspan="2"><strong>CITIZENSHIP:</strong> <?php echo $w_citizenship; ?></td>
  </tr>
  <tr bgcolor='white' >
    <td width="30%" colspan="2"><strong>DATE OF BIRTH:</strong> <?php echo $w_dob; ?>
  </tr>
	<tr bgcolor='white' >
    <td width="30%" colspan="2"><strong>PLACE OF BIRTH: </strong> <?php echo $w_pob; ?></td>
  </tr>
  <tr bgcolor='white' >
    <td  width="30%" colspan="3" ><strong>ADDRESS:</strong> <?php echo $w_address; ?></td>
  </tr>
 <tr bgcolor='white' >
    <td  width="30%" colspan="3"><strong>WEIGHT:</strong> <?php echo $w_weight; ?></td>
  </tr>
 <tr bgcolor='white' >
    <td  width="30%" colspan="3"><strong>HEIGHT:</strong> <?php echo $w_height; ?></td>
  </tr>
  <tr bgcolor='white' >
    <td  width="30%" colspan="3"><strong>COMPLEXION:</strong> <?php echo $w_complexion; ?></td>
  </tr>
 <tr bgcolor='white' >
    <td  width="30%" colspan="3"><strong>EYE COLOR:</strong> <?php echo $w_eyes; ?></td>
  </tr>
 <tr bgcolor='white' >
    <td  width="30%" colspan="3"><strong>HAIR COLOR:</strong> <?php echo $w_hair; ?></td>
	 <tr bgcolor='white'>
	 <tr bgcolor='white' >
    <td  width="30%" colspan="3"><strong>DISTINGUISHING MARK(s):</strong> <?php echo $w_mark; ?></td>
	 <tr bgcolor='white'>
	 <tr bgcolor='white' >
    <td  width="30%" colspan="3"><strong>CRIME:</strong> <?php echo $w_crime; ?></td>
  </tr>
	 <tr bgcolor='white' >
    <td  width="30%" colspan="3"><strong>WARRANT NUMBER:</strong> <?php echo $w_warrant; ?></td>
  </tr>
	 <tr bgcolor='white' >
    <td  width="30%" colspan="3"><strong>CASE NUMBER:</strong> <?php echo $w_casenumber; ?></td>
  </tr>
	 <tr bgcolor='white' >
    <td  width="30%" colspan="3"><strong>REWARD:</strong> <?php echo $w_reward; ?></td>
  </tr>
 
</table>


 

</table>
 <p align="center">
   <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.history.back();" class="box">
 </p>
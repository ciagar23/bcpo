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

$sql = "SELECT m_id, m_name, m_date, m_birthdate, m_gender, m_reward, m_eyes,m_hair, m_height, m_weight,m_age, m_contact, m_contactNum, m_address, m_thumbnail, m_image, m_citizenship, m_birthplace, m_caddress, m_complexion, m_mark, m_status, m_found
 FROM tbl_missing
		WHERE m_id = $policeId";
$result = mysql_query($sql) or die('Cannot get product. ' . mysql_error());

$row = mysql_fetch_assoc($result);
extract($row);

if ($m_image) {
	$m_image = WEB_ROOT . 'images/missing/' . $m_image;
	$m_thumbnail = WEB_ROOT . 'images/missing/' . $m_thumbnail;
} else {
	$m_image = WEB_ROOT . 'images/no-image-large.png';
}

if($m_found=='yes')
		{
			$m_found ='<font color=green>(Found)</font>';
		}
		else
		{
			
			$m_found ='<font color=red>(Missing)</font>';
		}

?>
<p>&nbsp;</p>
 
 <table width="80%" border="1" cellspacing="2" align="center">
  <tr>
    <td rowspan="18" valign="top"><a href="<?php echo $m_image; ?>" rel="lightbox[roadtrip1]"><img src="<?php echo $m_image; ?>" width="371"  border="0"></a></td>
   <tr>
    <td width="50%" class="entryTable" colspan="2"><strong>PERSONAL DATA </strong></td>
  </tr>
  <tr class="row1">
    <td class="content" width="30%" colspan="2">
      <strong>NAME:</strong> <?php echo $m_name; ?> </font> <?php echo $m_found; ?> 
    </td>
  </tr>
  <tr class="row2">
    <td class="content" width="30%" colspan="2"><strong>AGE:</strong> <?php echo $m_age; ?> 
  </tr>
	<tr class="row1">
    <td class="content" width="30%" colspan="2"><strong>GENDER:</strong> <?php echo $m_gender; ?></font>
	</tr>
	<tr class="row2">
    <td class="content" width="30%" colspan="2"><strong>CITIZENSHIP:</strong> <?php echo $m_citizenship; ?></td>
  </tr>
  <tr class="row1">
    <td class="content" width="30%" colspan="2"><strong>DATE OF BIRTH:</strong> <?php echo $m_birthdate; ?>
  </tr>
	<tr class="row2">
    <td class="content" width="30%" colspan="2"><strong>PLACE OF BIRTH: </strong> <?php echo $m_birthplace; ?></td>
  </tr>
  <tr class="row1">
    <td class="content"  width="30%" colspan="2" ><strong>ADDRESS:</strong> <?php echo $m_address; ?></td>
  </tr>
 <tr class="row2">
    <td class="content"  width="30%" colspan="2"><strong>WEIGHT:</strong> <?php echo $m_weight; ?></td>
  </tr>
 <tr class="row1">
    <td class="content"  width="30%" colspan="2"><strong>HEIGHT:</strong> <?php echo $m_height; ?></td>
  </tr>
  <tr class="row2">
    <td class="content"  width="30%" colspan="2"><strong>COMPLEXION:</strong> <?php echo $m_complexion; ?></td>
  </tr>
 <tr class="row1">
    <td class="content"  width="30%" colspan="2"><strong>EYE COLOR:</strong> <?php echo $m_eyes; ?></td>
  </tr>
 <tr class="row2">
    <td class="content"  width="30%" colspan="2"><strong>HAIR COLOR:</strong> <?php echo $m_hair; ?></td>
	 <tr>
	 <tr class="row1">
    <td class="content"  width="30%" colspan="2"><strong>DISTINGUISHING MARK(s):</strong> <?php echo $m_mark; ?></td>
	 <tr>
	 <tr class="row2">
    <td class="content"  width="30%" colspan="2"><strong>REWARD:</strong> <?php echo $m_reward; ?></td>
  </tr>
    <td width="50%" class="entryTable" colspan="3"><strong>CONTACT PERSON </strong> (reporter) </td>
  </tr>
  </tr>
  <tr class="row2">
    <td class="content"  width="30%" colspan="3"><strong>NAME:</strong> <?php echo $m_contact; ?></td>
  </tr>
  <tr class="row1">
    <td  width="30%" colspan="3" class="content"><strong>ADDRESS:</strong> <?php echo $m_caddress; ?></td>
  </tr>
 <tr class="row2">
    <td class="content"  width="30%" colspan="3"><strong>CONTACT NUMBER:</strong> <?php echo $m_contactNum; ?></td>
  </tr>
 
</table>


 

</table>
 <p align="center"> 
  <input name="btnModify" type="button" id="btnModify" value="Modify" onClick="window.location.href='index.php?view=modify&policeId=<?php echo $policeId; ?>';" class="box">
  <input name="btnAddProduct" type="button" id="btnAddProduct" value="Print" class="box" onClick="window.location.href='printindex.php?view=printdetail&policeId=<?php echo $policeId; ?>';">
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.history.back();" class="box">
 </p>
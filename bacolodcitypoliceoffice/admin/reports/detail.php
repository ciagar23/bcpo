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

$sql = "SELECT r_id, r_image, r_thumbnail, r_name, r_alias, r_age, r_sex, r_citizenship, r_dob, r_pob, r_p_address, r_address, r_occupation, r_g_affilation, r_modus, r_area_opn, r_height, r_weight, r_build, r_complexion, r_hair, r_eyes, r_others, r_s_name, r_s_alias, r_s_age, r_s_sex, r_s_citizenship, r_s_dob, r_s_pob, r_s_p_address, r_s_address, r_s_occupation, r_s_g_affilation, r_s_modus, r_f_name, r_f_age, r_f_occupation, r_f_address, r_m_name, r_m_age, r_m_occupation, r_s_area_opn, r_m_address, r_siblings FROM tbl_rogue_gallery
		WHERE r_id = $policeId";
$result = mysql_query($sql) or die('Cannot get product. ' . mysql_error());

$row = mysql_fetch_assoc($result);
extract($row);

?>
<p>&nbsp;</p>
<form action="processRogue.php?action=addProduct" method="post" enctype="multipart/form-data" name="frmAddProduct" id="frmAddProduct">
  <table width="736" border="1" cellspacing="2">
    <tr>
      <th colspan="3">Crime Against Person
        </td>      </th>
    </tr>
    <tr>
      <td width="247">Murder</td>
      <td width="94">&nbsp;</td>
      <td width="373"><table width="100%" border="1" cellspacing="2">
          <tr>
            <td width="20%" class="full">&nbsp;</td>
            <td class="empty">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td>Homicide</td>
      <td>&nbsp;</td>
      <td><table width="100%" border="1" cellspacing="2">
          <tr>
            <td width="20%" class="full">&nbsp;</td>
            <td class="empty">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td>Physical Injury </td>
      <td>&nbsp;</td>
      <td><table width="100%" border="1" cellspacing="2">
          <tr>
            <td width="20%" class="full">&nbsp;</td>
            <td class="empty">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td>Rape</td>
      <td>&nbsp;</td>
      <td><table width="100%" border="1" cellspacing="2">
          <tr>
            <td width="20%" class="full">&nbsp;</td>
            <td class="empty">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td>Total</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <th colspan="3">Crime Against Property
        </td>      </th>
    </tr>
    <tr>
      <td>Robbery</td>
      <td>&nbsp;</td>
      <td><table width="100%" border="1" cellspacing="2">
          <tr>
            <td width="20%" class="full">&nbsp;</td>
            <td class="empty">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td>Theft</td>
      <td>&nbsp;</td>
      <td><table width="100%" border="1" cellspacing="2">
          <tr>
            <td width="20%" class="full">&nbsp;</td>
            <td class="empty">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td>Carnapping</td>
      <td>&nbsp;</td>
      <td><table width="100%" border="1" cellspacing="2">
          <tr>
            <td width="20%" class="full">&nbsp;</td>
            <td class="empty">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td>Cattle Rustling </td>
      <td>&nbsp;</td>
      <td><table width="100%" border="1" cellspacing="2">
          <tr>
            <td width="20%" class="full">&nbsp;</td>
            <td class="empty">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td>Total</td>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</form>
<p align="center"> 
  <input name="btnModify" type="button" id="btnModify" value="Modify" onClick="window.location.href='index.php?view=modify&policeId=<?php echo $policeId; ?>';" class="box">
  <input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Crime" class="box" onClick="window.location.href='index.php?view=addcrime&policeId=<?php echo $policeId; ?>';">
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.history.back();" class="box">
</p>
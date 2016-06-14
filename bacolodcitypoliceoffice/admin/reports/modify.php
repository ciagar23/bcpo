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

// get product info
$sql = "SELECT r_id, r_image, r_thumbnail, r_name, r_alias, r_age, r_sex, r_citizenship, r_dob, r_pob, r_p_address, r_address, r_occupation, r_g_affilation, r_modus, r_area_opn, r_height, r_weight, r_build, r_complexion, r_hair, r_eyes, r_others, r_s_name, r_s_alias, r_s_age, r_s_sex, r_s_citizenship, r_s_dob, r_s_pob, r_s_p_address, r_s_address, r_s_occupation, r_s_g_affilation, r_s_modus,r_s_area_opn, r_f_name, r_f_age, r_f_occupation, r_f_address, r_m_name, r_m_age, r_m_occupation, r_m_address, r_siblings FROM tbl_rogue_gallery
		WHERE r_id = $policeId";
$result = mysql_query($sql) or die('Cannot get product. ' . mysql_error());
$row    = mysql_fetch_assoc($result);
extract($row);

?> 
<form action="processRogue.php?action=modifyRogue&policeId=<?php echo $policeId; ?>" method="post" enctype="multipart/form-data" name="frmAddCrime" id="frmAddCrime">
 <p align="center" class="formTitle">Modify Product</p>
 
 <table width="848" border="0" align="center">
    <tr> 
   <td width="150" class="label">Image: <input name="fleImage" type="file" id="fleImage" class="box">
<?php
	if ($r_thumbnail != '') {
?>
    <br>
    <img src="<?php echo WEB_ROOT . ROGUE_IMAGE_DIR . $r_thumbnail; ?>"> &nbsp;&nbsp;<a href="javascript:deleteImage(<?php echo $policeId; ?>);">Delete 
    Image</a> 
    <?php
	}
?>    
    </td>
  </tr>
  <tr>
    <td width="838" id="entryTableHeader">I. PERSONAL DATA </td>
  </tr>
  <tr>
    <td class="content">
      NAME: <input  name="txtname" type="text" value="<? echo $r_name;?>" class="box" id="txtname" size="25"  /> 
      ALIAS:<input  name="txtalias" type="text" value="<? echo $r_alias;?>" class="box" id="txtalias" size="25"  /></td>
  </tr>
  <tr>
    <td class="content">AGE: 
    <input  name="txtage" type="text" value="<? echo $r_age;?>" class="box" id="txtage" size="4" maxlength="3"  /> 
    SEX: 
    <select  name="txtsex" class="box" id="txtsex">
      <option>-select-</option>
      <option>MALE</option>
      <option>FEMALE</option>
        </select>
    CITIZENSHIP: 
    <input  name="txtcitizenship" type="text" value="<? echo $r_citizenship;?>" class="box" id="txtcitizenship"  /></td>
  </tr>
  <tr>
    <td class="content">DOB: 
    <input  name="txtdob" type="text" value="<? echo $r_dob;?>" class="box" id="txtdob"  /> 
    POB: 
    <input  name="txtpob" type="text" value="<? echo $r_pob;?>" class="box" id="txtpob"  /></td>
  </tr>
  <tr>
    <td class="content">PREVIOUS ADDRESS: 
    <input  name="txtpaddress" type="text" value="<? echo $r_p_address;?>" class="box" id="txtpaddress" size="50"  /></td>
  </tr>
  <tr>
    <td class="content">PRESENT ADDRESS: 
    <input  name="txtaddress" type="text" value="<? echo $r_address;?>" class="box" id="txtaddress" size="50"  /></td>
  </tr>
  <tr>
    <td class="content">OCCUPATION: 
    <input  name="txtoccupation" type="text" value="<? echo $r_occupation;?>" class="box" id="txtoccupation"  /></td>
  </tr>
  <tr>
    <td class="content">GROUP AFFILIATION: 
    <input  name="txtgaffilation" type="text" value="<? echo $r_g_affilation;?>" class="box" id="txtgaffilation"  /></td>
  </tr>
  <tr>
    <td class="content">MODUS OPERANDI: 
    <input  name="txtmodus" type="text" value="<? echo $r_modus;?>" class="box" id="txtmodus" size="50"  /></td>
  </tr>
  <tr>
    <td class="content">AREA OF OPN: 
    <input  name="txtarea" type="text" value="<? echo $r_area_opn;?>" class="box" id="txtarea" size="50"  /></td>
  </tr>
  <tr>
    <td class="content">&nbsp;</td>
  </tr>
  <tr>
    <td class="content" id="entryTableHeader">II. PHYSICAL DESCRIPTION </td>
  </tr>
  <tr>
    <td class="content">HEIGHT: 
    <input  name="txtheight" type="text" value="<? echo $r_height;?>" class="box" id="txtheight" size="5"  /> 
    WEIGHT: 
    <input  name="txtweight" type="text" value="<? echo $r_weight;?>" class="box" id="txtweight" size="5" /> 
    BUILD: 
    <input  name="txtbuild" type="text" value="<? echo $r_build;?>" class="box" id="txtbuild"  /></td>
  </tr>
  <tr>
    <td class="content">COMPEXION:
    <input  name="txtcomplexion" type="text" value="<? echo $r_complexion;?>" class="box" id="txtcomplexion"  /> 
    HAIR:
    <input  name="txthair" type="text" value="<? echo $r_hair;?>" class="box" id="txthair" /> 
    EYES:
    <input  name="txteyes" type="text" value="<? echo $r_eyes;?>" class="box" id="txteyes" /></td>
  </tr>
  <tr>
    <td class="content">OTHER DISTINGUISHING MARKS: 
    <input  name="txtothers" type="text" value="<? echo $r_others;?>" class="box" id="txtothers" size="50" /></td>
  </tr>
  <tr>
    <td class="content">&nbsp;</td>
  </tr>
  <tr>
    <td class="content" id="entryTableHeader">III. MARITAL STATUS </td>
  </tr>
  <tr>
    <td class="content">NAME OF SPOUSE: 
    <input  name="txtsname" type="text" value="<? echo $r_s_name;?>" class="box" id="txtsname" size="25"  /> 
    ALIAS: 
    <input  name="txtsalias" type="text" value="<? echo $r_s_alias;?>" class="box" id="txtsalias"  /></td>
  </tr>
  <tr>
    <td class="content">AGE:
      <input  name="txtsage" type="text" value="<? echo $r_s_age;?>" class="box" id="txtsage" size="4" maxlength="3"  />
SEX:
<select   name="txtssex" class="box" id="txtssex" >
  <option>-select-</option>
  <option>MALE</option>
  <option>FEMALE</option>
</select>
CITIZENSHIP:
<input  name="txtscitizenship" type="text" value="<? echo $r_s_citizenship;?>" class="box" id="txtscitizenship"  /></td>
  </tr>
  <tr>
    <td class="content">DOB:
      <input  name="txtsdob" type="text" value="<? echo $r_s_dob;?>" class="box" id="txtsdob"  />
POB:
<input  name="txtspob" type="text" value="<? echo $r_s_pob;?>" class="box" id="txtspob" /></td>
  </tr>
  <tr>
    <td class="content">PREVIOUS ADDRESS:
      <input  name="txtspaddress" type="text" value="<? echo $r_s_p_address;?>" class="box" id="txtspaddress" size="50"  /></td>
  </tr>
  <tr>
    <td class="content">PRESENT ADDRESS:
      <input  name="txtsaddress" type="text" value="<? echo $r_s_address;?>" class="box" id="txtsaddress" size="50" /></td>
  </tr>
  <tr>
    <td class="content">OCCUPATION:
      <input  name="txtsoccupation" type="text" value="<? echo $r_s_occupation;?>" class="box" id="txtsoccupation"  /></td>
  </tr>
  <tr>
    <td class="content">GROUP AFFILIATION:
      <input  name="txtsgaffilation" type="text" value="<? echo $r_s_g_affilation;?>" class="box" id="txtsgaffilation"  /></td>
  </tr>
  <tr>
    <td class="content">MODUS OPERANDI:
      <input  name="txtsmodus" type="text" value="<? echo $r_s_modus;?>" class="box" id="txtsmodus" size="50" /></td>
  </tr>
  <tr>
    <td class="content">AREA OF OPN:
      <input  name="txtsarea" type="text" value="<? echo $r_s_area_opn;?>" class="box" id="txtsarea" size="50" /></td>
  </tr>
  
  <tr>
    <td class="content">&nbsp;</td>
  </tr>
  <tr>
    <td class="content" id="entryTableHeader">IV: FAMILY BACKGROUND </td>
  </tr>
  <tr>
    <td class="content">NAME OF THE FATHER: 
    <input  name="txtfname" type="text" value="<? echo $r_f_name;?>" class="box" id="txtfname" /> 
    AGE:
    <input  name="txtfage" type="text" value="<? echo $r_f_age;?>" class="box" id="txtfage" size="4" maxlength="3" /></td>
  </tr>
  <tr>
    <td class="content">OCCUPATION: 
    <input  name="txtfoccupation" type="text" value="<? echo $r_f_occupation;?>" class="box" id="txtfoccupation" /></td>
  </tr>
  <tr>
    <td class="content">ADDRESS: 
    <input  name="txtfaddress" type="text" value="<? echo $r_f_address;?>" class="box" id="txtfaddress" size="50" /></td>
  </tr>
  <tr>
    <td class="content">NAME OF THE MOTHER:
      <input  name="txtmname" type="text" value="<? echo $r_m_name;?>" class="box" id="txtmname" /> 
      AGE: 
      <input  name="txtmage" type="text" value="<? echo $r_m_age;?>" class="box" id="txtmage" size="4" maxlength="3" /></td>
  </tr>
  <tr>
    <td class="content">OCCUPATION: 
    <input  name="txtmoccupation" type="text" value="<? echo $r_m_occupation;?>" class="box" id="txtmoccupation" /></td>
  </tr>
  <tr>
    <td class="content">ADDRESS: 
    <input  name="txtmaddress" type="text" value="<? echo $r_m_address;?>" class="box" id="txtmaddress" size="50" /></td>
  </tr>
  <tr>
  
    <td class="content">NAME OF SISTERS/ BROTHERS: </td>
  </tr>
  <tr>
  <td class="content"><textarea name="txtsiblings" class="box" id="txtsiblings" cols="70" rows="10"><? echo $r_siblings;?></textarea>
      </tr>
  <tr>

 </table>
 <p align="center"> 
  <input name="btnModify" type="button" id="btnModify" value="Modify" onClick="checkAddCrimeForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
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
$sql = "SELECT r_id, r_image, r_thumbnail, r_image2, r_thumbnail2, r_image3, r_thumbnail3, r_name, r_alias, r_age, r_sex, r_citizenship, r_dob, r_pob, r_p_address, r_address, r_occupation, r_g_affilation, r_modus, r_area_opn, r_height, r_weight, r_build, r_complexion, r_hair, r_eyes, r_others, r_s_name, r_s_alias, r_s_age, r_s_sex, r_s_citizenship, r_s_dob, r_s_pob, r_s_p_address, r_s_address, r_s_occupation, r_s_g_affilation, r_s_modus,r_s_area_opn, r_f_name, r_f_age, r_f_occupation, r_f_address, r_m_name, r_m_age, r_m_occupation, r_m_address, r_siblings FROM tbl_rogue_gallery
		WHERE r_id = $policeId";
$result = mysql_query($sql) or die('Cannot get product. ' . mysql_error());
$row    = mysql_fetch_assoc($result);
extract($row);

if ($r_sex=='MALE'){$male = 'selected="selected"';}else{$male = '';}if ($r_sex=='FEMALE'){$fmale = 'selected="selected"';}else{$fmale = '';}
if ($r_s_sex=='MALE'){$smale = 'selected="selected"';}else{$smale = '';}if ($r_s_sex=='FEMALE'){$sfmale = 'selected="selected"';}else{$sfmale = '';}

?> 
<form action="processRogue.php?action=modifyRogue&policeId=<?php echo $policeId; ?>" method="post" enctype="multipart/form-data" name="frmAddCrime" id="frmAddCrime">
<h2>Modify Rogue Gallery</h2>
 
 <table width="848" border="0" align="center" class="text">
    <tr> 
   <td width="150" class="row1">Front View: <input name="fleImage" type="file" id="fleImage" class="box">
   <tr>
   <td width="150" class="row2">Left View: <input name="fleImage2" type="file" id="fleImage2" class="box">
   <tr>
   <td width="150" class="row1">Right View: <input name="fleImage3" type="file" id="fleImage3" class="box">
<?php
	if ($r_thumbnail != '') {
?>
    <br>
    <img src="<?php echo WEB_ROOT . ROGUE_IMAGE_DIR . $r_thumbnail; ?>"> 
    <img src="<?php echo WEB_ROOT . ROGUE_IMAGE_DIR . $r_thumbnail2; ?>"> 
    <img src="<?php echo WEB_ROOT . ROGUE_IMAGE_DIR . $r_thumbnail3; ?>"> &nbsp;&nbsp;<a href="javascript:deleteImage(<?php echo $policeId; ?>);">Delete 
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
    <td class="row2">
      NAME: <input  name="txtname" type="text" value="<? echo $r_name;?>" class="box" id="txtname" size="25"  /> 
      ALIAS:<input  name="txtalias" type="text" value="<? echo $r_alias;?>" class="box" id="txtalias" size="25"  /></td>
  </tr>
  <tr>
    <td class="row1">AGE: 
    <input  name="txtage" type="text" value="<? echo $r_age;?>" onKeyUp="checkNumber(this);" class="box" id="txtage" size="4" maxlength="3"  /> 
    SEX: 
    <select  name="txtsex" class="box" id="txtsex">
      <option>-select-</option>
      <option <? echo $male; ?> >MALE</option>
      <option <? echo $fmale; ?> >FEMALE</option>
        </select>
    CITIZENSHIP: 
    <input  name="txtcitizenship" type="text" value="<? echo $r_citizenship;?>" class="box" id="txtcitizenship"  /></td>
  </tr>
  <tr>
    <td class="row2">DOB: 
    <input  name="txtdob" type="text" value="<? echo $r_dob;?>" class="box" id="txtdob"  /> 
    POB: 
    <input  name="txtpob" type="text" value="<? echo $r_pob;?>" class="box" id="txtpob"  /></td>
  </tr>
  <tr>
    <td class="row1">PREVIOUS ADDRESS: 
    <input  name="txtpaddress" type="text" value="<? echo $r_p_address;?>" class="box" id="txtpaddress" size="50"  /></td>
  </tr>
  <tr>
    <td class="row2">PRESENT ADDRESS: 
    <input  name="txtaddress" type="text" value="<? echo $r_address;?>" class="box" id="txtaddress" size="50"  /></td>
  </tr>
  <tr>
    <td class="row1">OCCUPATION: 
    <input  name="txtoccupation" type="text" value="<? echo $r_occupation;?>" class="box" id="txtoccupation"  /></td>
  </tr>
  <tr>
    <td class="row2">GROUP AFFILIATION: 
    <input  name="txtgaffilation" type="text" value="<? echo $r_g_affilation;?>" class="box" id="txtgaffilation"  /></td>
  </tr>
  <tr>
    <td class="row1">MODUS OPERANDI: 
    <input  name="txtmodus" type="text" value="<? echo $r_modus;?>" class="box" id="txtmodus" size="50"  /></td>
  </tr>
  <tr>
    <td class="row2">AREA OF OPN: 
    <input  name="txtarea" type="text" value="<? echo $r_area_opn;?>" class="box" id="txtarea" size="50"  /></td>
  </tr>
  <tr>
    <td class="row1">&nbsp;</td>
  </tr>
  <tr>
    <td class="row2" id="entryTableHeader">II. PHYSICAL DESCRIPTION </td>
  </tr>
  <tr>
    <td class="row1">HEIGHT: 
    <input  name="txtheight" type="text" value="<? echo $r_height;?>" class="box" id="txtheight" size="5"  /> 
    WEIGHT: 
    <input  name="txtweight" type="text" value="<? echo $r_weight;?>" class="box" id="txtweight" size="5" /> 
    BUILD: 
    <input  name="txtbuild" type="text" value="<? echo $r_build;?>" class="box" id="txtbuild"  /></td>
  </tr>
  <tr>
    <td class="row2">COMPEXION:
    <input  name="txtcomplexion" type="text" value="<? echo $r_complexion;?>" class="box" id="txtcomplexion"  /> 
    HAIR:
    <input  name="txthair" type="text" value="<? echo $r_hair;?>" class="box" id="txthair" /> 
    EYES:
    <input  name="txteyes" type="text" value="<? echo $r_eyes;?>" class="box" id="txteyes" /></td>
  </tr>
  <tr>
    <td class="row1">OTHER DISTINGUISHING MARKS: 
    <input  name="txtothers" type="text" value="<? echo $r_others;?>" class="box" id="txtothers" size="50" /></td>
  </tr>
  <tr>
    <td class="row2">&nbsp;</td>
  </tr>
  <tr>
    <td class="row1" id="entryTableHeader">III. MARITAL STATUS </td>
  </tr>
  <tr>
    <td class="row2">NAME OF SPOUSE: 
    <input  name="txtsname" type="text" value="<? echo $r_s_name;?>" class="box" id="txtsname" size="25"  /> 
    ALIAS: 
    <input  name="txtsalias" type="text" value="<? echo $r_s_alias;?>" class="box" id="txtsalias"  /></td>
  </tr>
  <tr>
    <td class="row1">AGE:
      <input  name="txtsage" type="text" value="<? echo $r_s_age;?>" onKeyUp="checkNumber(this);" class="box" id="txtsage" size="4" maxlength="3"  />
SEX:
<select   name="txtssex" class="box" id="txtssex" >
  <option value="">-select-</option>
  <option <? echo $smale; ?> >MALE</option>
  <option <? echo $sfmale; ?> >FEMALE</option>
</select>
CITIZENSHIP:
<input  name="txtscitizenship" type="text" value="<? echo $r_s_citizenship;?>" class="box" id="txtscitizenship"  /></td>
  </tr>
  <tr>
    <td class="row2">DOB:
      <input  name="txtsdob" type="text" value="<? echo $r_s_dob;?>" class="box" id="txtsdob"  />
POB:
<input  name="txtspob" type="text" value="<? echo $r_s_pob;?>" class="box" id="txtspob" /></td>
  </tr>
  <tr>
    <td class="row1">PREVIOUS ADDRESS:
      <input  name="txtspaddress" type="text" value="<? echo $r_s_p_address;?>" class="box" id="txtspaddress" size="50"  /></td>
  </tr>
  <tr>
    <td class="row2">PRESENT ADDRESS:
      <input  name="txtsaddress" type="text" value="<? echo $r_s_address;?>" class="box" id="txtsaddress" size="50" /></td>
  </tr>
  <tr>
    <td class="row1">OCCUPATION:
      <input  name="txtsoccupation" type="text" value="<? echo $r_s_occupation;?>" class="box" id="txtsoccupation"  /></td>
  </tr>
  <tr>
    <td class="row2">GROUP AFFILIATION:
      <input  name="txtsgaffilation" type="text" value="<? echo $r_s_g_affilation;?>" class="box" id="txtsgaffilation"  /></td>
  </tr>
  <tr>
    <td class="row1">MODUS OPERANDI:
      <input  name="txtsmodus" type="text" value="<? echo $r_s_modus;?>" class="box" id="txtsmodus" size="50" /></td>
  </tr>
  <tr>
    <td class="row2">AREA OF OPN:
      <input  name="txtsarea" type="text" value="<? echo $r_s_area_opn;?>" class="box" id="txtsarea" size="50" /></td>
  </tr>
  
  <tr>
    <td class="row1">&nbsp;</td>
  </tr>
  <tr>
    <td class="row2" id="entryTableHeader">IV: FAMILY BACKGROUND </td>
  </tr>
  <tr>
    <td class="row1">NAME OF THE FATHER: 
    <input  name="txtfname" type="text" value="<? echo $r_f_name;?>" class="box" id="txtfname" /> 
    AGE:
    <input  name="txtfage" type="text" value="<? echo $r_f_age;?>" class="box" onKeyUp="checkNumber(this);" id="txtfage" size="4" maxlength="3" /></td>
  </tr>
  <tr>
    <td class="row2">OCCUPATION: 
    <input  name="txtfoccupation" type="text" value="<? echo $r_f_occupation;?>" class="box" id="txtfoccupation" /></td>
  </tr>
  <tr>
    <td class="row1">ADDRESS: 
    <input  name="txtfaddress" type="text" value="<? echo $r_f_address;?>" class="box" id="txtfaddress" size="50" /></td>
  </tr>
  <tr>
    <td class="row2">NAME OF THE MOTHER:
      <input  name="txtmname" type="text" value="<? echo $r_m_name;?>" class="box" id="txtmname" /> 
      AGE: 
      <input  name="txtmage" type="text" value="<? echo $r_m_age;?>" onKeyUp="checkNumber(this);" class="box" id="txtmage" size="4" maxlength="3" /></td>
  </tr>
  <tr>
    <td class="row1">OCCUPATION: 
    <input  name="txtmoccupation" type="text" value="<? echo $r_m_occupation;?>" class="box" id="txtmoccupation" /></td>
  </tr>
  <tr>
    <td class="row2">ADDRESS: 
    <input  name="txtmaddress" type="text" value="<? echo $r_m_address;?>" class="box" id="txtmaddress" size="50" /></td>
  </tr>
  <tr>
  
    <td class="row1">NAME OF SISTERS/ BROTHERS: </td>
  </tr>
  <tr>
  <td class="row2"><textarea name="txtsiblings" class="box" id="txtsiblings" cols="70" rows="10"><? echo $r_siblings;?></textarea>
      </tr>
  <tr>

 </table>
 <p align="center"> 
  <input name="btnModify" type="button" id="btnModify" value="Modify" onClick="checkmodifyCrimeForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
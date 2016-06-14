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
$sql = "SELECT w_id, w_name, w_alias, w_casenumber, w_dob, w_pob, w_height, w_weight, w_address, w_caption, w_gender, w_warrant, w_crime, w_age, w_captured, w_datenow, w_image, w_thumbnail, w_reward, w_citizenship, w_eyes, w_hair, w_complexion, w_mark
		From tbl_wanted
		WHERE w_id = $policeId";
$result = mysql_query($sql) or die('Cannot get Missing ' . mysql_error());
$row    = mysql_fetch_assoc($result);
extract($row);

if ($w_gender=='Male'){$male = 'selected="selected"'; $fmale ='';}else{$male = ''; $fmale = 'selected="selected"';}

?> 
<form action="processWanted.php?action=modifyWanted&policeId=<?php echo $policeId; ?>" method="post" enctype="multipart/form-data" name="frmAddWanted" id="frmAddWanted">
<h2>Modify Wanted Person</h2>
 
   
 <table width="848" border="0" align="center" class="text">
  
  <tr>
    <td width="838" id="entryTableHeader">PHOTO </td>
  </tr>
  <tr> 
   <td class="row1"> <input name="fleImage" type="file" id="fleImage" class="box"> 
   <?php
	if ($w_thumbnail != '') {
?>
    <br>
    <img src="<?php echo WEB_ROOT .'images/wanted/'. $w_thumbnail; ?>">  &nbsp;&nbsp;<a href="javascript:deleteWanted(<?php echo $policeId; ?>);">Delete 
    Image</a> 
    <?php
	}
?> 
    </td>
  
  <tr>
    <td class="row2">NAME: <input value="<? echo $w_name;?>"  name="txtname" type="text" class="box" id="txtname" size="50"  /> </td>
  </tr>

  <tr>
    <td class="row2">DATE OF BIRTH: <input value="<? echo $w_dob;?>"  name="txtbirthdate" type="text" class="box" id="txtbirthdate" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">PLACE OF BIRTH: <input value="<? echo $w_pob;?>"  name="txtbirthplace" type="text" class="box" id="txtbirthplace" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">AGE: <input value="<? echo $w_age;?>"  name="txtage" type="text" class="box" id="txtage" size="50"  /> </td>
  </tr><tr>
    <td class="row2">ALIAS: <input value="<? echo $w_alias?>"  name="txtalias" type="text" class="box" id="txtalias" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">WARRANT NUMBER: <input value="<? echo $w_warrant?>"  name="txtwarrant" type="text" class="box" id="txtwarrant" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">CASE NUMBER: <input value="<? echo $w_casenumber?>"  name="txtcasenumber" type="text" class="box" id="txtcasenumber" size="50"  /> </td>
  </tr>
   <tr>
    <td class="row1">GENDER:
	
	<select  name="txtgender">
	<option value=""> -select-</option>
	<option  <? echo $male;?>> Male </option>
	<option <? echo $fmale;?>> Female </option>
	</select>
	</td>
  </tr>
  <tr>
    <td class="row2">ADDRESS: <input value="<? echo $w_address;?>"  name="txtaddress" type="text" class="box" id="txtaddress" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">CITIZENSHIP: <input value="<? echo $w_citizenship;?>"  name="txtcitizenship" type="text" class="box" id="txtcitizenship" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">HEIGHT: <input value="<? echo $w_height;?>"  name="txtheight" type="text" class="box" id="txtheight" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">WEIGHT: <input value="<? echo $w_weight;?>"  name="txtweight" type="text" class="box" id="txtweight" size="50"  /> </td>
  </tr>
   <tr>
    <td class="row1">COMPLEXION: <input value="<? echo $w_complexion;?>"  name="txtcomplexion" type="text" class="box" id="txtcomplexion" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">EYE COLOR: <input value="<? echo $w_eyes;?>"  name="txteyes" type="text" class="box" id="txteyes" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">HAIR COLOR: <input value="<? echo $w_hair;?>"  name="txthair" type="text" class="box" id="txthair" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">DISTINGUISHING MARK(s): <input value="<? echo $w_mark;?>"  name="txtmark" type="text" class="box" id="txtmark" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">REWARD: <input value="<? echo $w_reward;?>"  name="txtreward" type="text" class="box" id="txtreward" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">CAPTION: <input value="<? echo $w_caption;?>"  name="txtcaption" type="text" class="box" id="txtcaption" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">CRIME: <input value="<? echo $w_crime;?>"  name="txtcrime" type="text" class="box" id="txtcrime" size="50"  /> </td>
  </tr>
</table>
 <p align="center"> 
  <input name="btnModify" type="button" id="btnModify" value="Modify"  onClick="checkAddWantedForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
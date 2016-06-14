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
$sql = "SELECT m_id, m_name, m_date, m_age, m_gender, m_citizenship, m_status, m_birthplace, m_birthdate, m_address, m_height, m_weight, m_complexion, m_hair, m_eyes, m_mark, m_reward, m_contact, m_contactNum, m_caddress, m_datenow, m_found, m_image, m_thumbnail
		From tbl_missing
		WHERE m_id = $policeId";
$result = mysql_query($sql) or die('Cannot get Missing ' . mysql_error());
$row    = mysql_fetch_assoc($result);
extract($row);

if ($m_gender=='Male'){$male = 'selected="selected"'; $fmale ='';}else{$male = ''; $fmale = 'selected="selected"';}

?> 
<form action="processMissing.php?action=modifyMissing&policeId=<?php echo $policeId; ?>" method="post" enctype="multipart/form-data" name="frmAddMissing" id="frmAddMissing">
<h2>Modify Rogue Gallery</h2>
 
   
 <table width="848" border="0" align="center" class="text">
  
  <tr>
    <td width="838" id="entryTableHeader">PHOTO </td>
  </tr>
  <tr> 
   <td class="row1"> <input name="fleImage" type="file" id="fleImage" class="box"> 
   <?php
	if ($m_thumbnail != '') {
?>
    <br>
    <img src="<?php echo WEB_ROOT .'images/missing/'. $m_thumbnail; ?>">  &nbsp;&nbsp;<a href="javascript:deleteMissing(<?php echo $policeId; ?>);">Delete 
    Image</a> 
    <?php
	}
?> 
    </td>
  
  <tr>
    <td class="row2">NAME: <input value="<? echo $m_name;?>"  name="txtname" type="text" class="box" id="txtname" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">MISSING DATE: <input  name="txtdate" value="<? echo $m_date;?>" type="text" class="box" id="txtdate" size="10"  />
    <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  
		 <a href="javascript:cal11.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a> </td>
  </tr>
  <tr>
    <td class="row2">DATE OF BIRTH: <input value="<? echo $m_birthdate;?>"  name="txtbirthdate" type="text" class="box" id="txtbirthdate" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">PLACE OF BIRTH: <input value="<? echo $m_birthplace;?>"  name="txtbirthplace" type="text" class="box" id="txtbirthplace" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">AGE: <input value="<? echo $m_age;?>"  name="txtage" type="text" class="box" id="txtage" size="50"  /> </td>
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
    <td class="row2">ADDRESS: <input value="<? echo $m_address;?>"  name="txtaddress" type="text" class="box" id="txtaddress" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">CITIZENSHIP: <input value="<? echo $m_citizenship;?>"  name="txtcitizenship" type="text" class="box" id="txtcitizenship" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">STATUS: <input value="<? echo $m_status;?>"  name="txtstatus" type="text" class="box" id="txtstatus" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">HEIGHT: <input value="<? echo $m_height;?>"  name="txtheight" type="text" class="box" id="txtheight" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">WEIGHT: <input value="<? echo $m_weight;?>"  name="txtweight" type="text" class="box" id="txtweight" size="50"  /> </td>
  </tr>
   <tr>
    <td class="row1">COMPLEXION: <input value="<? echo $m_complexion;?>"  name="txtcomplexion" type="text" class="box" id="txtcomplexion" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">EYE COLOR: <input value="<? echo $m_eyes;?>"  name="txteyes" type="text" class="box" id="txteyes" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">HAIR COLOR: <input value="<? echo $m_hair;?>"  name="txthair" type="text" class="box" id="txthair" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">DISTINGUISHING MARK(s): <input value="<? echo $m_mark;?>"  name="txtothers" type="text" class="box" id="txtothers" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">REWARD: <input value="<? echo $m_reward;?>"  name="txtreward" type="text" class="box" id="txtreward" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">C0NTACT PERSON </td>
  </tr>
  <tr>
    <td class="row1">CONTACT NAME: 
      <input value="<? echo $m_contact;?>"  name="txtcontact" type="text" class="box" id="txtcontact" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row2">CONTACT NUMBER: <input value="<? echo $m_contactNum;?>"  name="txtcontactNum" type="text" class="box" id="txtcontactNum" size="50"  /> </td>
  </tr>
  <tr>
    <td class="row1">ADDRESS: <input value="<? echo $m_caddress;?>"  name="txtcaddress" type="text" class="box" id="txtcaddress" size="50"  /> </td>
  </tr>
</table>
 <p align="center"> 
  <input name="btnModify" type="button" id="btnModify" value="Modify"  onClick="checkAddMissingForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
 <script language="JavaScript">
<!-- // create calendar object(s) just after form tag closed
	 // specify form element as the only parameter (document.forms['formname'].elements['inputname']);
	 // note: you can have as many calendar objects as you need for your application
	 	var cal11 = new calendar3(document.forms['frmAddMissing'].elements['txtdate']);
	cal11.year_scroll = true;
	cal11.time_comp = false;
	
	//-->
</script>
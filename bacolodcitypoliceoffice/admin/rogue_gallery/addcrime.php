<?php
if (!defined('WEB_ROOT')) {
	exit;
}
if (isset($_GET['policeId']) && $_GET['policeId'] > 0) {
	$policeId = $_GET['policeId'];
} else {
	// redirect to index.php if product id is not present
	header('Location: index.php');
}

$sql = "SELECT r_id, r_image, r_thumbnail, r_name, r_alias, r_age, r_sex, r_citizenship, r_dob, r_pob, r_p_address, r_address, r_occupation, r_g_affilation, r_modus, r_area_opn, r_height, r_weight, r_build, r_complexion, r_hair, r_eyes, r_others, r_s_name, r_s_alias, r_s_age, r_s_sex, r_s_citizenship, r_s_dob, r_s_pob, r_s_p_address, r_s_address, r_s_occupation, r_s_g_affilation, r_s_modus, r_f_name, r_f_age, r_f_occupation, r_f_address, r_m_name, r_m_age, r_m_occupation, r_m_address, r_siblings FROM tbl_rogue_gallery
		WHERE r_id = $policeId";
$result = mysql_query($sql) or die('error. ' . mysql_error());

$row = mysql_fetch_assoc($result);
extract($row);
?> 
<p>&nbsp;</p>
<form action="processRogue.php?action=addCrime2&policeId=<?php echo $policeId; ?>" method="post" enctype="multipart/form-data" name="frmAddCrime" id="frmAddCrime">
  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="text">
  <tr class="entryTable"><td colspan="2">Add Crime for <? echo $r_name;?></td></tr>
 
  <tr> 
   <td class="row1" colspan="2"> <textarea name="mtxCrime" cols="70" rows="4" class="box" id="mtxCrime"></textarea></td>
  </tr><td class="row2">Date of Incident: 
    <input  name="txtcdate" type="text" class="box" id="txtcdate" size="20" />
	<script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  
		 <a href="javascript:cal11.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a></td>
  </tr>
  <tr>
    <td class="row1">Place of Incident: 
    <input  name="txtcplace" type="text" class="box" id="txtcplace" size="50" /></td>
  </tr>
  <tr>
    <td class="row2">CC/IS NR: 
    <input  name="txtccisnr" type="text" class="box" id="txtccisnr" size="50" /></td>
  </tr>
  <tr>
    <td class="row2">STATUS: 
    <input  name="txtcstatus" type="text" class="box" id="txtcstatus" size="50" /></td>
 </table>
 <p align="center"> 
  <input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Crime" onClick="checkAddCrime();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
 <script language="JavaScript">
<!-- // create calendar object(s) just after form tag closed
	 // specify form element as the only parameter (document.forms['formname'].elements['inputname']);
	 // note: you can have as many calendar objects as you need for your application
	 	var cal11 = new calendar3(document.forms['frmAddCrime'].elements['txtcdate']);
	cal11.year_scroll = true;
	cal11.time_comp = false;
	
	//-->
</script>
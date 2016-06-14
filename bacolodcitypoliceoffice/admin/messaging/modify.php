<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['policeId']) && $_GET['policeId'] > 0) {
	$policeId = $_GET['policeId'];
} else {
	header('Location: index.php');
}

$sql = "SELECT ac_id, ac_title, ac_date, ac_content, ac_img1, ac_img2, ac_img3 FROM tbl_activities
		WHERE ac_id = $policeId";
$result = mysql_query($sql) or die('Cannot get Blotter. ' . mysql_error());
$row    = mysql_fetch_assoc($result);
extract($row);

?> 
<form action="processActivities.php?action=modifyActivities&policeId=<? echo $policeId;?>" method="post" enctype="multipart/form-data" name="frmAddActivities" id="frmAddActivities">

  <article class="module width_full">
			<header><h3> Modify Activities</h3></header>
			<div class="module_content">

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="text">

	<tr>
  		<td colspan="2" class="entryTable3"> Add Activities </td>
  	</tr> 
	
   	<tr class="row2" > 
   		<td width="150">Date of Activity </td>
   		<td><input name="txtdate" type="text" class="box" id="txtdate" size="10" value="<? echo $ac_date;?>" maxlength="100" />
          <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js" type="text/javascript"></script>
          <a href="javascript:cal11.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date" /></a></td>
	</tr>
	
	<tr class="row1" >
   		<td width="150">Title:
   		<td> <input name="txttitle" type="text" value="<? echo $ac_title;?>" class="box" id="txttitle" size="50" maxlength="100"></td>
  	</tr>
       <tr> 
   <td width="150" class="label">Image 1</td>
   <td class="content"> <input name="fleImage1" type="file" id="fleImage1" class="box">
   <?php
	if ($ac_img1 != '') {
?>
    <br>
    <img src="<?php echo WEB_ROOT . 'images/activities/' . $ac_img1; ?>" width="100">
    <?php
	}
?> 
   </td>
  </tr>
    <tr> 
   <td width="150" class="label">Image 2</td>
   <td class="content"> <input name="fleImage2" type="file" id="fleImage2" class="box">    <?php
	if ($ac_img2 != '') {
?>
    <br>
    <img src="<?php echo WEB_ROOT . 'images/activities/' . $ac_img2; ?>" width="100">
    <?php
	}
?> 
   </td>
  </tr>
    <tr> 
   <td width="150" class="label">Image 3</td>
   <td class="content"> <input name="fleImage3" type="file" id="fleImage3" class="box">   <?php
	if ($ac_img3 != '') {
?>
    <br>
    <img src="<?php echo WEB_ROOT . 'images/activities/' . $ac_img3; ?>" width="100">
    <?php
	}
?>  
   </td>
  </tr>
   
   	<tr class="row1" >
   		<td colspan="2" align="center">
		
			<table width="100" 
			style="border-top:1px solid #53667e;
			border-left:1px solid #53667e;
			border-bottom:1px solid #53667e;
			border-right:1px solid #53667e;
			width: 100;"> 
				<tr>
					<td><textarea name="txtcontent" cols="80" rows="5" class="box" id="txtcontent"><? echo $ac_content;?></textarea></td>
				</tr>
			</table>		</td>
  	</tr>
</table>
<p align="center"> 
<input name="btnAddBlotter" type="button" id="btnAddBlotter" value="Add Activity" onClick="checkAddactivityForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
</p>

</form>

 <script language="JavaScript">
<!-- // create calendar object(s) just after form tag closed
	 // specify form element as the only parameter (document.forms['formname'].elements['inputname']);
	 // note: you can have as many calendar objects as you need for your application
	 	var cal11 = new calendar3(document.forms['frmModifyActivities'].elements['txtdate']);
	cal11.year_scroll = true;
	cal11.time_comp = false;
	
	//-->
</script>
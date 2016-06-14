<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
if (!isset($_SESSION['website_id'])) {
         echo '<script> alert("Please log in first");
		 window.location="index.php" </script>';
		exit;
	}
	


$sql = "SELECT w_id,w_fname, w_mname, w_lname, w_username, w_password, w_question, w_answer, w_gender, w_month, w_day, w_year, w_street, w_brgy, w_city, w_contact, w_password,w_email
        FROM tbl_webuser
		WHERE w_username = '$user'";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);
?> 
<h2><? echo $w_fname;?> <? echo $w_lname;?>'s Profile</h2>
<form action="processRegister.php?action=Register" method="post" enctype="multipart/form-data" name="frmRegister" id="frmRegister">

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="text">

	<tr class="webtext">
   		<td width="150">First Name: <? echo $w_fname;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Middle Name: <? echo $w_mname;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Last Name: <? echo $w_lname;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Username: <? echo $w_username;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Security Question: <? echo $w_question;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Answer: <em>not shown</em></td>
  	</tr>

	<tr class="webtext">
   		<td width="150">Gender: <? echo $w_gender;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Birthday: <? echo $w_month;?>&nbsp;<? echo $w_day;?>, &nbsp;<? echo $w_year;?> </td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Street: <? echo $w_street;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Barangay: <? echo $w_brgy;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">City: <? echo $w_city;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Contact Number: <? echo $w_contact;?></td>
  	</tr>	<tr class="webtext">
   		<td width="150">Email Address: <? echo $w_email;?></td>
  	</tr>	
		
</table>

<p align="center"> 
<input name="btnCancel" type="button" id="btnCancel" value="Modify" onClick="window.location.href='index.php?view=modifyprofile&policeId=<? echo $w_id;?>&fname=<? echo $w_fname;?>&mname=<? echo $w_mname;?>&lname=<? echo $w_lname;?>&gender=<? echo $w_gender
	;?>&month=<? echo $w_month;?>&day=<? echo $w_day;?>&year=<? echo $w_day;?>&username=<? echo $w_username;?>&question=<? echo $w_question;?>&answer=<? echo $w_answer ;?>&street=<? echo $w_street ;?>&brgy=<? echo $w_brgy ;?>&city=<? echo $w_city ;?>&contact=<? echo $w_contact;?>&policeId=<? echo $w_id;?>&email=<? echo $w_email;?>';" class="box">  
<input name="btnCancel" type="button" id="btnCancel" value="Back" onClick="window.history.back();" class="box">  
</p>

</form>

<? echo $errorMessage;?>
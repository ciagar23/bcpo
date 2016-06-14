<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	
$user = (isset($_GET['user']) && $_GET['user'] != '') ? $_GET['user'] : '';

$sql = "SELECT w_fname, w_mname, w_lname, w_username, w_password, w_question, w_answer, w_gender, w_month, w_day, w_year, w_street, w_brgy, w_city, w_contact
        FROM tbl_webuser
		WHERE w_username = '$user'";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);
?> 

<article class="module width_full">
			<header><h3>
<? echo $w_fname;?> <? echo $w_lname;?>'s Profile</h3></header>
				<div class="module_content">
                
                
<form action="processRegister.php?action=Register" method="post" enctype="multipart/form-data" name="frmRegister" id="frmRegister">

<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="text">

	<tr class="webtext">
   		<td width="150">First Name: <td><? echo $w_fname;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Middle Name: <td><? echo $w_mname;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Last Name: <td><? echo $w_lname;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Username: <td><? echo $w_username;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Security Question: <td><? echo $w_question;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Answer: <td><em>not shown</em></td>
  	</tr>

	<tr class="webtext">
   		<td width="150">Gender: <td><? echo $w_gender;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Birthday: <td><? echo $w_month;?>&nbsp;<? echo $w_day;?>, &nbsp;<? echo $w_year;?> </td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Street: <td><? echo $w_street;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Barangay: <td><? echo $w_brgy;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">City: <td><? echo $w_city;?></td>
  	</tr>
	
	<tr class="webtext">
   		<td width="150">Contact Number: <td><? echo $w_contact;?></td>
  	</tr>	
		
</table>

<p align="center"> 
<input name="btnCancel" type="button" id="btnCancel" value="Back" onClick="window.history.back();" class="box">  
</p>

</form>

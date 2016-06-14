<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;

$errorMessage2 = (isset($_GET['error2']) && $_GET['error2'] != '') ? $_GET['error2'] : '';


$CrimeList = CrimeListOption($catId);
	
$policeId = (isset($_GET['policeId']) && $_GET['policeId'] != '') ? $_GET['policeId'] : '';
$fname = (isset($_GET['fname']) && $_GET['fname'] != '') ? $_GET['fname'] : '';
$mname = (isset($_GET['mname']) && $_GET['mname'] != '') ? $_GET['mname'] : '';
$lname = (isset($_GET['lname']) && $_GET['lname'] != '') ? $_GET['lname'] : '';
$gender = (isset($_GET['gender']) && $_GET['gender'] != '') ? $_GET['gender'] : '';
$month = (isset($_GET['month']) && $_GET['month'] != '') ? $_GET['month'] : '';
$day = (isset($_GET['day']) && $_GET['day'] != '') ? $_GET['day'] : '';
$year = (isset($_GET['year']) && $_GET['year'] != '') ? $_GET['year'] : '';
$street = (isset($_GET['street']) && $_GET['street'] != '') ? $_GET['street'] : '';
$brgy = (isset($_GET['brgy']) && $_GET['brgy'] != '') ? $_GET['brgy'] : '';
$city = (isset($_GET['city']) && $_GET['city'] != '') ? $_GET['city'] : '';
$contact = (isset($_GET['contact']) && $_GET['contact'] != '') ? $_GET['contact'] : '';
$email = (isset($_GET['email']) && $_GET['email'] != '') ? $_GET['email'] : '';
$username = (isset($_GET['username']) && $_GET['username'] != '') ? $_GET['username'] : '';
$question = (isset($_GET['question']) && $_GET['question'] != '') ? $_GET['question'] : '';
$answer = (isset($_GET['answer']) && $_GET['answer'] != '') ? $_GET['answer'] : '';

?> 
<font color="#FF0000"><? echo $errorMessage2;?></font>
<h2>Modify Profile</h2><br /><br />
<form action="processRegister.php?action=modifyprofile&policeId=<? echo $policeId;?>" method="get" enctype="multipart/form-data" name="frmRegister" id="frmRegister">
<input name="action" type="hidden" value="modifyprofile" size="10">
<input name="policeId" type="hidden" value="<? echo $policeId;?>" size="10">
<input name="username" type="hidden" value="<? echo $w_username;?>" size="10">
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="text">
	<tr class="webtext">
   		<td width="150"> First Name: <input name="txtfname" type="text" class="box" value='<? echo $fname;?>' id="txtfname" size="50" maxlength="100"></td>
  	</tr>
	<tr class="webtext">
   		<td width="150"> Middle Name: <input name="txtmname" type="text" class="box" value='<? echo $mname;?>' id="txtmname" size="50" maxlength="100"></td>
  	</tr>
	<tr class="webtext">
   		<td width="150"> Last Name: <input name="txtlname" type="text" class="box" value='<? echo $lname;?>' id="txtlname" size="50" maxlength="100"></td>
  	</tr>
		<tr class="webtext">
   		<td width="150"> Gender: 
   		  <select name="gender">
   		    <option value="">-choose gender-</option>
   		    <option>Male</option>
   		    <option>Female</option>
	      </select>
	    </td>
  	</tr>
	<tr class="webtext">
	  		<td width="150">
			<table>
			<tr><td>Birthday: <td><select name="month">
   		  <option value="">-Month-</option>
   		  <option>January</option>
   		  <option>February</option>
   		  <option>March</option>
   		  <option>April</option>
   		  <option>May</option>
   		  <option>June</option>
   		  <option>July</option>
   		  <option>August</option>
   		  <option>September</option>
   		  <option>October</option>
   		  <option>November</option>
   		  <option>December</option>
	      </select>
		  <td>
		  <select name="day">
   		  <option value="">-Day-</option>
		  <? for ($x=1;$x<=31;$x++){?>
   		  <option><? echo $x;?></option>
		  <? } ?>
	      </select>
		  <td>
		   <select name="year">
   		  <option value="">-Year-</option>
		  <? for ($x=1960;$x<=2010;$x++){?>
   		  <option><? echo $x;?></option>
		  <? } ?>
	      </select>
		  </table>
		  </td>
  	</tr>
	<tr class="webtext">
   		<td width="150"> Street: <input name="txtstreet" type="text" class="box" value='<? echo $street;?>' id="txtstreet" size="50" maxlength="100"></td>
  	</tr>
	<tr class="webtext">
   		<td width="150"> Barangay: <input name="txtbrgy" type="text" class="box" value='<? echo $brgy;?>' id="txtbrgy" size="50" maxlength="100"></td>
  	</tr>
	<tr class="webtext">
   		<td width="150"> City: <br><input name="txtcity" type="text" class="box" value='<? echo $city;?>' id="txtcity" size="50" maxlength="100"></td>
  	</tr>
	<tr class="webtext">
   		<td width="150"> Contact Number: <input name="txtcontact" type="text" value='<? echo $contact;?>' class="box" id="txtcontact" size="50" maxlength="100"></td>
  	</tr>	
	
	<tr class="webtext">
   		<td width="150"> E-mail Address: <input name="txtemail" type="text" class="box" value='<? echo $email;?>' id="txtemail" size="50" maxlength="100"></td>
  	</tr>
	<tr class="webtext">
   		<td width="150"> Password: <input name="txtpassword" type="password" class="box" id="txtpassword" size="50" maxlength="100"></td>
  	</tr>
	<tr class="webtext">
   		<td width="150"> Re-type Password: <input name="txtpassword2" type="password" class="box" id="txtpassword2" size="50" maxlength="100"></td>
  	</tr>
	<tr class="webtext">
   		<td width="150">Security Question
		<?
		if ($question=='What is the name of your pet?')
		{
		$pet = 'selected="selected"';
		$school ='';
		$maiden ='';
		$subject ='';
		$teacher='';
		}
		else if ($question=='what is the name of your first school?')
		{
		$pet = '';
		$school ='selected="selected"';
		$maiden ='';
		$subject ='';
		$teacher='';
		}
		
		else if ($question=='What is your mothers maiden name?')
		{
		$pet = '';
		$school ='';
		$maiden ='selected="selected"';
		$subject ='';
		$teacher='';
		}
		
		else if ($question=='What is your favorite subject??')
		{
		$pet = '';
		$school ='';
		$maiden ='';
		$subject ='selected="selected"';
		$teacher='';
		}
		
		else if ($question=='What is the name of your favorite teacher?')
		{
		$pet = '';
		$school ='';
		$maiden ='';
		$subject ='';
		$teacher='selected="selected"';
		}
		
		else
		{
		$pet = '';
		$school ='';
		$maiden ='';
		$subject ='';
		$teacher='';
		}
		?>
   		  <select name="question">
   		    <option value="">-Select Question-</option>
   		    <option <? echo $pet;?>>What is the name of your pet?</option> 
   		    <option <? echo $school;?>>what is the name of your first school?</option>
			<option <? echo $maiden;?>>What is your mothers maiden name?</option>
			<option <? echo $subject;?>>What is your favorite subject?</option>
			<option <? echo $teacher;?>>What is the name of your favorite teacher?</option>
	      </select>
	    </td>
  	</tr>
	<tr class="webtext">
   		<td width="150"> Answer: <input name="txtanswer" type="text" class="box" value='<? echo $answer;?>' id="txtanswer" size="50" maxlength="100"></td>
  	</tr>


 	
</table>

<p align="center"> 
<input name="btnRegister" type="button" id="btnRegister" value="Register" onClick="checkmodifyprofileForm();" class="box">
&nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
</p>

</form>


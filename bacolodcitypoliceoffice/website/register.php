<?php


	// Initialize a variable. THIS IS OBSOLETE AND ONLY USED TO PREVENT
	// NOTICES ON SOME SYSTEMS. :)
		$IMGVER_TempString="";
		
	// Now we generate a string that consists of 6 characters that are
	// generated randomly. I choose 6, because I didn´t want the user to
	// type forever. Of course, any other number would do as well. (NOTE,
	// THAT IF YOU USE ANOTHER NUMBER, YOU ALSO HAVE TO EDIT THE IMAGE 
	// CODE) --> Have a look at the GetRandomChar() function at the bottom
	// of this script!
		for ($i = 1; $i <= 6; $i++) {
	       $IMGVER_TempString .= GetRandomChar();
		}
		
	// Now we store the text in our session variable.
		$HTTP_SESSION_VARS["IMGVER_RndText"] = $IMGVER_TempString;


	function GetRandomChar() {
	// This function generates our random chars
		
	// Seed with microseconds since last "whole" second
		mt_srand((double)microtime()*1000000);
		
	// Create a random number between 1 and 3
		$IMGVER_RandVal = mt_rand(1,3);
		
	// If the random number was 1, we generate a lowercase
	// character, if it was 2, we generate a number and if
	// it was 3, we generate an uppercase character.
		
		switch ($IMGVER_RandVal) {
	    case 1:
	  	  // 97 to 122 are the ASCII codes for lower-
	  	  // case characters from a to z.
	        $IMGVER_RandVal = mt_rand(97, 122); 
	        break;
	    case 2:
	  	  // 48 to 57 are the ASCII codes for the 
	  	  // numbers from 0 to 9.
	        $IMGVER_RandVal = mt_rand(48, 57);
	        break;
	    case 3:
	  	  // 65 to 70 are the ASCII codes for upper-
	  	  // case characters from a to z.
	        $IMGVER_RandVal = mt_rand(65, 90);
	        break;
		}
		
	// Now we return the character, generated from the ASCII code
		return chr($IMGVER_RandVal);
	}

// BELOW THIS LINE YOU CAN WRITE HTML CODE OR ANYTHING ELSE.


if (!defined('WEB_ROOT')) 
	{
	exit;
	}

$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;

$errorMessage2 = (isset($_GET['error2']) && $_GET['error2'] != '') ? $_GET['error2'] : '';


$CrimeList = CrimeListOption($catId);
	
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
<h2>Registration Form</h2><br /><br />
<form action="processRegister.php?action=Register" method="post" enctype="multipart/form-data" name="frmRegister" id="frmRegister">
<input name="action" type="hidden" value="Register" size="10">
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
			<table><tr><td >Birthday: <td><select name="month">
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
   		<td width="150"> Barangay: <select name="txtbrgy">
   		  <option value=""> - Barangay - </option>
   		  <option>Barangay 1</option>
   		  <option>Barangay 2</option>
   		  <option>Barangay 3</option>
   		  <option>Barangay 4</option>
   		  <option>Barangay 5</option>
   		  <option>Barangay 6</option>
   		  <option>Barangay 7</option>
   		  <option>Barangay 8</option>
   		  <option>Barangay 9</option>
   		  <option>Barangay 10</option>
   		  <option>Barangay 11</option>
   		  <option>Barangay 12</option>
   		  <option>Barangay 13</option>
   		  <option>Barangay 14</option>
   		  <option>Barangay 15</option>
   		  <option>Barangay 16</option>
   		  <option>Barangay 17</option>
   		  <option>Barangay 18</option>
   		  <option>Barangay 19</option>
   		  <option>Barangay 20</option>
   		  <option>Barangay 21</option>
   		  <option>Barangay 22</option>
   		  <option>Barangay 23</option>
   		  <option>Barangay 24</option>
   		  <option>Barangay 25</option>
   		  <option>Barangay 26</option>
   		  <option>Barangay 27</option>
   		  <option>Barangay 28</option>
   		  <option>Barangay 29</option>
   		  <option>Barangay 30</option>
   		  <option>Barangay 31</option>
   		  <option>Barangay 32</option>
   		  <option>Barangay 33</option>
   		  <option>Barangay 34</option>
   		  <option>Barangay 35</option>
   		  <option>Barangay 36</option>
   		  <option>Barangay 37</option>
   		  <option>Barangay 38</option>
   		  <option>Barangay 40</option>
   		  <option>Barangay 41</option>
   		  <option>Barangay Estefania</option>
   		  <option>Barangay Feliza</option>
   		  <option>Barangay Mansilingan</option>
   		  <option>Barangay Vista Alegre</option>
   		  <option>Barangay Alangilan</option>
   		  <option>Barangay Taculing</option>
   		  <option>Barangay Monte Vista</option>
   		  <option>Barangay Alijis</option>
   		  <option>Barangay Handumanan</option>
   		  <option>Barangay Villamonte</option>
   		  <option>Barangay Granada</option>
   		  <option>Barangay Sum-ag</option>
   		  <option>Barangay Pahanocoy</option>
   		  <option>Barangay Punta Taytay</option>
   		  <option>Barangay Banago</option>
   		  <option>Barangay Bata</option>
   		  <option>Barangay Mandalagan</option>
   		  <option>Barangay Singcang</option>
   		  <option>Barangay Cabug</option>
   		  <option>Barangay Tangub</option>
	      </select>
        
        
        </td>
  	</tr>
	<tr class="webtext">
   		<td width="150"> City: <br><input name="txtcity" type="text" class="box" value='Bacolod Cty' id="txtcity" size="50" maxlength="100"></td>
  	</tr>
	<tr class="webtext">
   		<td width="150"> Contact Number: <input name="txtcontact" type="text" value='<? echo $contact;?>' class="box" id="txtcontact" size="50" maxlength="100"></td>
  	</tr>	
	
	<tr class="webtext">
   		<td width="150"> E-mail Address: <input name="txtemail" type="text" class="box" value='<? echo $email;?>' id="txtemail" size="50" maxlength="100"></td>
  	</tr>
	<tr class="webtext">
   		<td width="150"> Username: <input name="txtusername" type="text" class="box" value='<? echo $username;?>' id="txtusername" size="50" maxlength="100"></td>
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
	<tr>
	<td align="center">

<img src="/bacolodcitypoliceoffice/website/verifyimage/doimg.php?<?php echo SID ?>" /><br>
       Enter the code 
          here:
          <input name="txtCode" type="text" id="txtCode" size="30" />

 	
</table>

<p align="center"> 
<input name="btnRegister" type="button" id="btnRegister" value="Register" onClick="checkRegisterForm();" class="box">
&nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
</p>

</form>


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


$email = (isset($_GET['email']) && $_GET['email'] != '') ? $_GET['email'] : '';
$username = (isset($_GET['username']) && $_GET['username'] != '') ? $_GET['username'] : '';
$question = (isset($_GET['question']) && $_GET['question'] != '') ? $_GET['question'] : '';
$answer = (isset($_GET['answer']) && $_GET['answer'] != '') ? $_GET['answer'] : '';
?>
<font color="#FF0000"><? echo $errorMessage2;?></font>
<h2>Trouble Accessing Your Account?</h2><br /><br />
Forgot your password? Enter your login email below and fill the security check. Please type 
        the code you see in the image into the textfield below. If you cannot 
        read the code, just press &quot;<strong>Reload</strong>&quot; to generate 
        a new one.
<form action="processForgot.php?action=forgot" method="post" enctype="multipart/form-data" name="frmforgot" id="frmforgot">
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="text">
	
	<tr class="webtext">
   		<td width="150"> Username: <input name="txtusername" type="text" value="<? echo $username;?>" class="box" id="txtusername" size="50" maxlength="100"></td>
  	</tr>
	<tr class="webtext">
   		<td width="150"> Email Address: <input name="txtemail" type="text" value="<? echo $email;?>" class="box" id="txtemail" size="50" maxlength="100"></td>
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
   		    <option value="no answer">-Select Question-</option>
   		    <option <? echo $pet;?>>What is the name of your pet?</option> 
   		    <option <? echo $school;?>>what is the name of your first school?</option>
			<option <? echo $maiden;?>>What is your mothers maiden name?</option>
			<option <? echo $subject;?>>What is your favorite subject?</option>
			<option <? echo $teacher;?>>What is the name of your favorite teacher?</option>
	      </select>
	    </td>
  	</tr>
	<tr class="webtext">
   		<td width="150"> Answer: <input name="txtanswer" type="text" value="<? echo $answer;?>" class="box" id="txtanswer" size="50" maxlength="100"></td>
  	</tr>
	<tr>
	<td align="center">

<img src="/bacolodcitypoliceoffice/website/verifyimage/doimg.php?<?php echo SID ?>" /><br>
       Enter the code 
          here:
          <input name="txtCode" type="text" id="txtCode" size="30" />
 	
</table>

<p align="center"> 
<input name="btnRegister" type="button" id="btnRegister" value="Confirm" onClick="checkforgotForm();" class="box">
&nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
</p>

</form>


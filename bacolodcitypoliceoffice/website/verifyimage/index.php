<?php
/*
================================================================================
// Hello,
// 
//    This tutorial will show you how to make an image verification
// like they use (used?) on Yahoo or they still do on Planet Source 
// Code. It is quite useful in order to prevent users from writing 
// scripts that would do the voting, posting or whatever. Now, 
// whenever a user wants to vote for something, he gets an image 
// with a randomly generated string, that consists of uppercase and
// lowercase characters and numbers from 0 to 9.
//
//    He then has to enter the string he sees on the picture and only
// if the code is correct, he will be allowed to proceed.
//
//    I hope this code will help you. I admit, i took the idea from
// a recent post on Planet Source Code. But the method used was too
// unsecure and relied on posting variables. :)
//
//
//
// Tutorial, Comments and Code written by Alexander Graf
// AlexGraf@web.de, 04/10/02
//
//
// IMPORTANT NOTE
// there is no warranty, implied or otherwise with this software.
// 
//
// released under a public domain licence.
//
//   Alexander Graf
//   AlexGraf@web.de
//   http://www.iceandfire.net
//==============================================================================
*/

	// At first, we initialize a new session. The session will be used 
	// to store the randomly generated string, so that the user never 
	// sees it in the code.
		session_start();
		
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
?>







<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Here comes the HTML 
        code or any other code you want. Since we did NOT<br />
        write anything to the output yet, you might even use <strong>Header()</strong>;</font></p>
      <hr size="1" noshade="noshade" />
      <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Please type 
        the code you see in the image into the textfield below. If you cannot 
        read the code, just press &quot;<strong>Reload</strong>&quot; to generate 
        a new one.</font></p>
      <p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img src="doimg.php?<?php echo SID ?>" /></font></p>
      <form action="verificate.php" method="POST" name="frmImgVerific" target="_self" id="frmImgVerific">
        <p> <font size="2" face="Verdana, Arial, Helvetica, sans-serif">Enter the code 
          here: </font> 
          <input name="txtCode" type="text" id="txtCode" size="30" />
        </p>
        <p>
          <input type="submit" name="Submit" value="OK" />
        </p>
      </form>
      <p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
      	<B>Note:</b> The code you enter is case sensitive!
      </p>
    </td>
  </tr>
</table>



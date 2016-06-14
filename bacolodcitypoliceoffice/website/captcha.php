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
?>

<img src="/bacolodcitypoliceoffice/website/verifyimage/doimg.php?<?php echo SID ?>" />
 <input name="txtCode" type="text" id="txtCode" size="30" />

?>
<?php
	// At first we initialize our session again.
	session_start();
	
	// Then we get the Text entered by the user and 
	// the random generated text
	$IMGVER_EnteredText = $HTTP_POST_VARS["txtCode"];
	$IMGVER_RandomText = $HTTP_SESSION_VARS["IMGVER_RndText"];

	// Now we check, if the two strings are the same
	if ($IMGVER_EnteredText == $IMGVER_RandomText) {
		echo "Well, thank you. You have entered the code correctly. :)";
					/* ENTER YOUR MESSAGE ABOVE OR MAKE THIS FILE A FUNCTION
					** AND USE RETURN INSTEAD! */
	} else {
		echo "You haven´t entered the correct code. Please try again!";
					/* ENTER YOUR ERROR MESSAGE ABOVE OR MAKE THIS FILE A FUNCTION
					** AND USE RETURN INSTEAD! */
	}
	
	// Now we are ready and can unset and destroy our session
	session_unset();
	session_destroy();
?>

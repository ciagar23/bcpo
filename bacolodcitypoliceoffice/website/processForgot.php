<?php
require_once '../library/config.php';
require_once '../admin/library/functionsweb.php';


	// Then we get the Text entered by the user and 
	// the random generated text
	$IMGVER_EnteredText = $HTTP_POST_VARS["txtCode"];
	$IMGVER_RandomText = $HTTP_SESSION_VARS["IMGVER_RndText"];


	$username  = $_POST['txtusername'];
	$question  = $_POST['question'];
	$answer  = $_POST['txtanswer'];
	$email  = $_POST['txtemail'];
	
	$sql1 = "SELECT * FROM tbl_webuser WHERE w_username = '$username' ";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$w_username= $show['w_username'];	
		$w_question= $show['w_question'];	
		$w_answer= $show['w_answer'];	
		$w_email= $show['w_email'];
	
		$username_num= mysql_num_rows(mysql_query("SELECT * FROM tbl_webuser WHERE w_username = '$username'"));
		if ($username_num == 0)
		{
		header("Location: index.php?view=forgot&error2=This Username is not registered in the database&username=$username&question=$question&answer=$answer&email=$email");
		}
	else
	{
		if($question != $w_question)
		{
		header("Location: index.php?view=forgot&username=$username&question=$question&answer=$answer&email=$email&error2=Please Select a question you have choose when you register ");
		}
		else if($email != $w_email)
		{
		header("Location: index.php?view=forgot&username=$username&question=$question&answer=$answer&email=$email&error2=Incorrect Email address ");
		}
		else if($answer != $w_answer)
		{
		header("Location: index.php?view=forgot&username=$username&question=$question&answer=$answer&email=$email&error2=Incorrect answer ");
		}
		else if($IMGVER_EnteredText != $IMGVER_RandomText)
		{
		header("Location: index.php?view=forgot&username=$username&question=$question&answer=$answer&email=$email&error2=You have not entered the correct code. Please try again! ");
		}
		else 
		{

		header("Location: index.php?view=profile ");
		$_SESSION['website_id'] = $show['w_id'];
		}
	
	}
		// Now we are ready and can unset and destroy our session



?>
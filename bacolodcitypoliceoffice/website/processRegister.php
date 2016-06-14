<?php
require_once '../library/config.php';
require_once '../admin/library/functionsweb.php';

	$fname  = $_POST['txtfname'];
	$mname  = $_POST['txtmname'];
	$lname  = $_POST['txtlname'];
	$gender  = $_POST['gender'];
	$month  = $_POST['month'];
	$day  = $_POST['day'];
	$year  = $_POST['year'];
	$username  = $_POST['txtusername'];
	$password  = $_POST['txtpassword'];
	$password2  = $_POST['txtpassword2'];
	$question  = $_POST['question'];
	$answer  = $_POST['txtanswer'];
	$street  = $_POST['txtstreet'];
	$brgy  = $_POST['txtbrgy'];
	$city  = $_POST['txtcity'];
	$contact  = $_POST['txtcontact'];
	$email  = $_POST['txtemail'];
	$code  = $_POST['txtCode'];
	
	$nowyear= date('Y');
	$agecheck = $nowyear - $year;
	
	
		// Then we get the Text entered by the user and 
	// the random generated text
	$IMGVER_EnteredText = $HTTP_POST_VARS["txtCode"];
	$IMGVER_RandomText = $HTTP_SESSION_VARS["IMGVER_RndText"];
	
		$username_num= mysql_num_rows(mysql_query("SELECT * FROM tbl_webuser WHERE w_username = '$username'"));
		if ($username_num == 0)
		{
	
	if($password != $password2)
	{
	header("Location: index.php?view=register&fname=$fname&mname=$mname&lname=$lname&gender=$gender&month=$month&day=$day&year=$day&username=$username&question=$question&answer=$answer&street=$street&brgy=$brgy&city=$city&contact=$contact&email=$email&error2=Password Do Not Match");
	}
	else if($agecheck <= 18)
	{
	header("Location: index.php?view=register&fname=$fname&mname=$mname&lname=$lname&gender=$gender&month=$month&day=$day&year=$day&username=$username&question=$question&answer=$answer&street=$street&brgy=$brgy&city=$city&contact=$contact&email=$email&error2=Only 18 Years old and above can register");
	}
	else if($IMGVER_EnteredText != $IMGVER_RandomText)
		{
		header("Location:index.php?view=register&fname=$fname&mname=$mname&lname=$lname&gender=$gender&month=$month&day=$day&year=$day&username=$username&question=$question&answer=$answer&street=$street&brgy=$brgy&city=$city&contact=$contact&email=$email&error2=You have not entered the correct code. Please try again! ");
		}
		
	else 
	{
	
	$sql   = "INSERT INTO tbl_webuser (w_fname,w_lname, w_mname,w_question,w_answer, w_gender, w_day, w_month, w_year,w_street, w_brgy, w_city, w_contact, w_username, w_password, w_regdate,w_email)
	          VALUES ('$fname', '$lname', '$mname', '$question', '$answer', '$gender', '$day', '$month', '$year', '$street', '$brgy', '$city', '$contact', '$username', PASSWORD('$password'), NOW(),'$email')";

	$result = dbQuery($sql);
	$sql = "SELECT w_id
        FROM tbl_webuser ORDER BY w_id desc";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);	
		$w_id= $row['w_id'];
	header("Location: index.php?view=successful&policeId=$w_id");	
	}
	}
	else
	{
	
	header("Location: index.php?view=register&fname=$fname&mname=$mname&lname=$lname&gender=$gender
	&month=$month&day=$day&year=$day&username=$username&question=$question&answer=$answer
	&street=$street &brgy=$brgy &city=$city &contact=$contact &error2=Username Already Registered!");
	}


<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addUser();
		break;
		
	case 'modify' :
		modifyUser();
		break;
		
	case 'delete' :
		deleteUser();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}


function addUser()
{	
	$session = $_SESSION["username"];	
$sql1 = "SELECT user_fullname FROM tbl_user where user_name ='$session' ";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$userLogin= $show['user_fullname'];


$sql = "SELECT user_station FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);	
		$station= $row['user_station'];
	
	
	$adminName = $_GET['adminName'];
    $userName = $_POST['txtUserName'];
    $userFullName = $_POST['txtUserFullName'];
	$password = $_POST['txtPassword'];
	$password2 = $_POST['txtPassword2'];
	$dropstation = $_POST['dropstation'];	
	$droplevel = (isset($_POST['droplevel']) && $_POST['droplevel'] != '') ? $_POST['droplevel'] : 'Main';
	
	
		$one_admin = mysql_num_rows(mysql_query("SELECT user_station FROM tbl_user where user_station='Administrator'"));
		
	//ginkwa ko na lg ang isa lang ka administrator ah...
	
					if ($password != $password2)
					{
					header('Location: index.php?view=add&error=Do not match Password');
					
					}
					else
					{
					
					$sql = "SELECT user_name
							FROM tbl_user
							WHERE user_name = '$userName'";
					$result = dbQuery($sql);
					
					if (dbNumRows($result) == 1) {
						header('Location: index.php?view=add&error=' . urlencode('Username already taken. Choose another one'));	
					} else {			
						$sql   = "INSERT INTO tbl_user (user_fullname,user_name, user_password,user_station, user_regdate, user_admin, user_level)
								  VALUES ('$userFullName','$userName', PASSWORD('$password'),'$dropstation', NOW(), '$adminName', '$droplevel')";
					
						dbQuery($sql);
						
						$sql1 = "SELECT user_id
						FROM tbl_user order by user_id desc";
						$result1 = mysql_query($sql1);
						$show = mysql_fetch_array($result1);	
						$user_id= $show['user_id'];
						
						$sql   = "INSERT INTO tbl_history (h_date, h_user, h_action, h_station, h_category)
							  VALUES (NOW(), '$userLogin', 'Added  <b>$userFullName</b> to <b>$dropstation</b> as <b>$droplevel</b>', '$station', 'user')";
					dbQuery($sql);
						
						header('Location: index.php');	
					}
		
					
					}
				
}

/*
	Modify a user
*/
function modifyUser()
{	
$session = $_SESSION["username"];	
$sql1 = "SELECT user_fullname FROM tbl_user where user_name ='$session' ";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$userLogin= $show['user_fullname'];

$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);	
		$station= $row['user_station'];
	



	$userId = (int)$_GET['userId'];
	
	$sql = "SELECT user_fullname
        FROM tbl_user where user_id='$userId'";
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);	
		$userFullName=$row['user_fullname'];
	
	$password = $_POST['txtPassword'];
	$password2 = $_POST['txtPassword2'];
	$dropstation = $_POST['dropstation'];
	$droplevel = (isset($_POST['droplevel']) && $_POST['droplevel'] != '') ? $_POST['droplevel'] : 'Main';
	
	if ($password != $password2)
	{
	 header('Location: index.php?view=modify&userId='.$userId.'&error=Sorry, Password do not match');
	}
	else
	{
	$sql   = "UPDATE tbl_user 
	          SET user_password = PASSWORD('$password'), user_station ='$dropstation', user_level ='$droplevel'
			  WHERE user_id = $userId";
	dbQuery($sql);
	
	
	$sql   = "INSERT INTO tbl_history (h_date, h_user, h_action, h_station, h_category)
	          VALUES (NOW(), '$userLogin', 'Modify or Move <b>$userFullName</b> to <b>$dropstation</b> as <b>$droplevel</b>', '$station', 'user')";
	dbQuery($sql);
	
	header('Location: index.php');	
	}

}

/*
	Remove a user
*/
function deleteUser()
{
$session = $_SESSION["username"];	
$sql1 = "SELECT user_fullname FROM tbl_user where user_name ='$session' ";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$userLogin= $show['user_fullname'];

$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);	
		$station= $row['user_station'];
	

	if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
		$userId = (int)$_GET['userId'];
	} else {
		header('Location: index.php');
	}	
	$sql = "SELECT user_fullname, user_station, user_level
        FROM tbl_user where user_id='$userId'";
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);	
		$userFullName=$row['user_fullname'];
		$dropstation=$row['user_station'];
		$droplevel=$row['user_level'];
		
	$sql   = "INSERT INTO tbl_history (h_date, h_user, h_action, h_station, h_category)
	          VALUES (NOW(), '$userLogin', 'Deleted <b>$userFullName</b> from <b>$dropstation</b> as <b>$droplevel</b>', '$station', 'user')";
	dbQuery($sql);
	
	$sql = "DELETE FROM tbl_user 
	        WHERE user_id = '$userId'";
	dbQuery($sql);
	
	
	
	header('Location: index.php');
}
?>
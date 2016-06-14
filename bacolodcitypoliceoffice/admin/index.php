<?php
require_once '../library/config.php';
require_once './library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'profile' :
		$session = $_SESSION["username"];
		$content 	= 'profile.php';	
		$pageTitle 	= 'Police Record Management System';
		break;
	case 'missing' :
		$session = $_SESSION["username"];
		$content 	= 'missing.php';	
		$pageTitle 	= 'Police Record Management System';
		break;
	case 'mostwanted' :
		$session = $_SESSION["username"];
		$content 	= 'mostwanted.php';	
		$pageTitle 	= 'Police Record Management System';
		break;
	case 'newlyuploadedphotos' :
		$session = $_SESSION["username"];
		$content 	= 'newlyuploadedphotos.php';	
		$pageTitle 	= 'Police Record Management System';
		break;
	case 'crimereportdetail' :
		$session = $_SESSION["username"];
		$content 	= 'crimereportdetail.php';	
		$pageTitle 	= 'Police Record Management System';
		break;
	case 'crimereportreply' :
		$session = $_SESSION["username"];
		$content 	= 'crimereportreply.php';	
		$pageTitle 	= 'Police Record Management System';
		break;
	case 'crimereportaction' :
		$session = $_SESSION["username"];
		$content 	= 'crimereportaction.php';	
		$pageTitle 	= 'Police Record Management System';
		break;
	
	default :
		$session = $_SESSION["username"];
		$content 	= 'main.php';		
		$pageTitle 	= 'Police Record Management System';
}

$title ='Home';
$script    = array('police.js');

require_once 'include/template.php';


?>

<?php
require_once '../library/config.php';
require_once './library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'records' :
		$session = $_SESSION["username"];
		$content 	= 'main/records.php';	
		$pageTitle 	= 'Police Record Management System';
		break;

	case 'traffic' :
		$session = $_SESSION["username"];
		$content 	= 'main/traffic.php';	
		$pageTitle 	= 'Police Record Management System';
		break;

	case 'wcp' :
		$session = $_SESSION["username"];
		$content 	= 'main/wcp.php';
		$pageTitle 	= 'Police Record Management System';
		break;

	case 'police_station1' :
		$session = $_SESSION["username"];
		$content 	= 'main/police_station1.php';
		$pageTitle  = 'Police Record Management System';
		break;

	case 'police_station2' :
		$session = $_SESSION["username"];
		$content 	= 'main/police_station2.php';
		$pageTitle  = 'Police Record Management System';
		break;

	case 'police_station3' :
		$session = $_SESSION["username"];
		$content 	= 'main/police_station3.php';
		$pageTitle  = 'Police Record Management System';
		break;

	case 'police_station4' :
		$session = $_SESSION["username"];
		$content 	= 'main/police_station4.php';
		$pageTitle  = 'Police Record Management System';
		break;

	case 'police_station5' :
		$session = $_SESSION["username"];
		$content 	= 'main/police_station5.php';
		$pageTitle  = 'Police Record Management System';
		break;

	case 'police_station6' :
		$session = $_SESSION["username"];
		$content 	= 'main/police_station6.php';
		$pageTitle  = 'Police Record Management System';
		break;

	case 'police_station7' :
		$session = $_SESSION["username"];
		$content 	= 'main/police_station7.php';
		$pageTitle  = 'Police Record Management System';
		break;

	case 'police_station8' :
		$session = $_SESSION["username"];
		$content 	= 'main/police_station8.php';
		$pageTitle  = 'Police Record Management System';
		break;

	case 'police_station9' :
		$session = $_SESSION["username"];
		$content 	= 'main/police_station9.php';
		$pageTitle  = 'Police Record Management System';
		break;

	case 'police_station10' :
		$session = $_SESSION["username"];
		$content 	= 'main/police_station10.php';
		$pageTitle  = 'Police Record Management System';
		break;
		
	default :
		$session = $_SESSION["username"];
		$content 	= 'main/main.php';		
		$pageTitle 	= 'Police Record Management System';
}




$script    = array('product.js');

require_once 'include/template.php';
?>

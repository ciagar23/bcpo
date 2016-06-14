<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) 
	{
	case 'addtmu' :
		$content 	= 'addtmu.php';		
		$pageTitle 	= 'Police Record Management System';
		break;
 
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'Police Record Management System';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Police Record Management System';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= 'Police Record Management System';
		break;

	case 'modifytmu' :
		$content 	= 'modifytmu.php';		
		$pageTitle 	= 'Police Record Management System';
		break;

	case 'addotherdata' :
		$content    = 'addotherdata.php';
		$pageTitle  = 'Police Record Management System';
		break;

	case 'addrespondent' :
		$content    = 'addrespondent.php';
		$pageTitle  = 'Police Record Management System';
		break;

	case 'addotherdatatmu' :
		$content    = 'addotherdatatmu.php';
		$pageTitle  = 'Police Record Management System';
		break;

	case 'otherdatatmu' :
		$content    = 'otherdatatmu.php';
		$pageTitle  = 'Police Record Management System';
		break;

	case 'otherdata' :
		$content    = 'otherdata.php';
		$pageTitle  = 'Police Record Management System';
		break;

	case 'detail' :
		$content    = 'detail.php';
		$pageTitle  = 'Police Record Management System';
		break;

	case 'detailtmu' :
		$content    = 'detailtmu.php';
		$pageTitle  = 'Police Record Management System';
		break;
		
	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'Police Record Management System';
	}


$title ='Activities';
$session = $_SESSION["username"];
$script    = array('police.js');

require_once '../include/template.php';
?>

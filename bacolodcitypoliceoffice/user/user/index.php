<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
	$session = $_SESSION["username"];
		$content 	= 'list.php';		
		$pageTitle 	= 'Police Record Management System';
		break;

	case 'add' :
	$session = $_SESSION["username"];
		$content 	= 'add.php';		
		$pageTitle 	= 'Police Record Management System';
		break;

	case 'modify' :
	$session = $_SESSION["username"];
		$content 	= 'modify.php';		
		$pageTitle 	= 'Police Record Management System';
		break;

	default :
	$session = $_SESSION["username"];
		$content 	= 'list.php';		
		$pageTitle 	= 'Police Record Management System';
}

$script    = array('user.js');

require_once '../include/template.php';
?>

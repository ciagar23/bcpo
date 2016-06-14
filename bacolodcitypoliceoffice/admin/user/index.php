<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
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

	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'Police Record Management System';
}

$script    = array('user.js');

	$session = $_SESSION["username"];
$title ='User';
require_once '../include/template.php';
?>

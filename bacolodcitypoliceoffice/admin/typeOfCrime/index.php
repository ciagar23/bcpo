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
		$pageTitle 	= 'USLS Archives - View Category';
		break;

	case 'add' :
		$session = $_SESSION["username"];
		$content 	= 'add.php';		
		$pageTitle 	= 'USLS Archives - Add Category';
		break;

	case 'modify' :
		$session = $_SESSION["username"];
		$content 	= 'modify.php';		
		$pageTitle 	= 'USLS Archives - Modify Category';
		break;

	default :
		$session = $_SESSION["username"];
		$content 	= 'list.php';		
		$pageTitle 	= 'USLS Archives - View Category';
}

$title ='Type of Crime';
$script    = array('options.js');

require_once '../include/template.php';
?>

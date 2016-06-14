<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		break;
		
	case 'search' :
		$content 	= 'search.php';		
		break;
		
	case 'addcrime' :
		$content 	= 'addcrime.php';		
		break;

	case 'add' :
		$content 	= 'add.php';		
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		break;

	case 'detail' :
		$content    = 'detail.php';
		break;
		
	default :
		$content 	= 'list.php';		
}




$title ='Missing Persons';
		$pageTitle 	= 'BCPO';
	$session = $_SESSION["username"];
$script    = array('police.js');

require_once '../include/template.php';
?>

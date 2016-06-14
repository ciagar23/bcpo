<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) 
	{
	case 'blotter' :
		$content 	= 'list.php';		
		$pageTitle 	= 'Police Record Management System';
		$value = 'Blotter';
		break;
 
	case 'rogue_gallery' :
		$content 	= 'list.php';		
		$pageTitle 	= 'Police Record Management System';
		$value = 'Rogue Gallery';
		break;

	case 'user' :
		$content 	= 'list.php';		
		$pageTitle 	= 'Police Record Management System';
		$value = 'User';
		break;

		
	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'Police Record Management System';
	}


$title ='History';
$session = $_SESSION["username"];
$script    = array('police.js');

require_once '../include/template.php';
?>

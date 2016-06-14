<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) 
	{
	case 'organization' :
$title ='Blotter';
		$content 	= 'organization.php';		
		$pageTitle 	= 'Police Record Management System';
		break;
		
	case 'gethelp' :
$title ='Blotter';
		$content 	= 'gethelp.php';		
		$pageTitle 	= 'Police Record Management System';
		break;
		
	case 'aboutbacolodedit' :
$title ='Modify About Bacolod';
		$content 	= 'aboutbacolodedit.php';		
		$pageTitle 	= 'Police Record Management System';
		break;
		
	case 'aboutbacolod' :
$title ='About Bacolod';
		$content 	= 'aboutbacolod.php';		
		$pageTitle 	= 'Police Record Management System';
		break;
		
		case 'aboutpnpedit' :
$title ='Modify About PNP';
		$content 	= 'aboutpnpedit.php';		
		$pageTitle 	= 'Police Record Management System';
		break;
		
	case 'aboutpnp' :
$title ='About PNP';
		$content 	= 'aboutpnp.php';		
		$pageTitle 	= 'Police Record Management System';
		break;
		
	case 'aboutbcpoedit' :
$title ='Modify About BCPO';
		$content 	= 'aboutbcpoedit.php';		
		$pageTitle 	= 'Police Record Management System';
		break;
		
	case 'aboutbcpo' :
$title ='About BCPO';
		$content 	= 'aboutbcpo.php';		
		$pageTitle 	= 'Police Record Management System';
		break;
		
	case 'activities' :
$title ='Activites';
		$content 	= 'activities.php';		
		$pageTitle 	= 'Police Record Management System';
		break;
		
		case 'missing' :
$title ='Missing Persons';
		$content 	= 'missing.php';		
		$pageTitle 	= 'Police Record Management System';
		break;
		
		case 'wanted' :
$title ='Wanted Persons';
		$content 	= 'wanted.php';		
		$pageTitle 	= 'Police Record Management System';
		break;
		
	default :
$title ='Blotter';
		$content 	= 'aboutpnp.php';		
		$pageTitle 	= 'Police Record Management System';
	}


$session = $_SESSION["username"];
$script    = array('police.js');

require_once '../include/template.php';
?>

<?php
require_once '../../library/config.php';
require_once '../library/functions.php';


$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) 
	{
	case 'crimerate' :
		$content 	= 'crimerate.php';		
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebarblank.php';
		break;
	case 'crimeincident' :
		$content 	= 'crimeincident.php';		
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebarblank.php';
		break;
	case 'report' :
		$content 	= 'report.php';		
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebarblank.php';

		break;
	case 'reply' :
		$content 	= 'reply.php';		
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebarblank.php';
		break;
 
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;

	case 'modify' :
		$content 	= 'modify.php';		
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;

	case 'modifytmu' :
		$content 	= 'modifytmu.php';		
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;

	case 'addotherdata' :
		$content    = 'addotherdata.php';
		$pageTitle  = 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;

	case 'addotherdatatmu' :
		$content    = 'addotherdatatmu.php';
		$pageTitle  = 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;

	case 'otherdatatmu' :
		$content    = 'otherdatatmu.php';
		$pageTitle  = 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;

	case 'otherdata' :
		$content    = 'otherdata.php';
		$pageTitle  = 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;

	case 'detail' :
		$content    = 'detail.php';
		$pageTitle  = 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;

	case 'detailtmu' :
		$content    = 'detailtmu.php';
		$pageTitle  = 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
		
	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
	}


$title ='Blotter';

$session = $_SESSION["username"];
$script    = array('police.js');

require_once '../include/template.php';
?>


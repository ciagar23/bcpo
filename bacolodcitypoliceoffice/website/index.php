<?php
require_once '../library/config.php';
require_once '../admin/library/functionsweb.php';


$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'forgotsuccess' :
		$content 	= 'forgotsuccess.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
	case 'forgot' :
		$content 	= 'forgot.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
	case 'profile' :
		$content 	= 'profile.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
	case 'successful' :
		$content 	= 'successful.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
	case 'missingdetail' :
		$content 	= 'missingdetail.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebarblank.php';
		break;
	case 'wanteddetail' :
		$content 	= 'wanteddetail.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebarblank.php';
		break;
	case 'aboutus' :
		$content 	= 'aboutus.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
	case 'missingall' :
		$content 	= 'missingall.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
	case 'mostwantedall' :
		$content 	= 'mostwantedall.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
	case 'successfulmodify' :
		$content 	= 'successfulmodify.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
	case 'modifyprofile' :
		$content 	= 'modifyprofile.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
	case 'register' :
		$content 	= 'register.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
	case 'aboutbacolod' :
		$content 	= 'aboutbacolod.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
	case 'aboutpnp' :
		$content 	= 'aboutpnp.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
	case 'aboutbcpo' :
		$content 	= 'aboutbcpo.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
	case 'contactus' :
		$content 	= 'contactus.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
	case 'activitydetail' :
		$content 	= 'activitydetail.php';	
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
		break;
		
	default :
		$content 	= 'main.php';		
		$pageTitle 	= 'Police Record Management System';
		$sidebar ='sidebar.php';
}

$title ='Home';
$script    = array('police.js');
require_once '../admin/include/webtemplate.php';
?>

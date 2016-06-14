<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();


$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'investigator' :
		$content 	= 'investigator.php';		
		break;
	case 'casedetail' :
		$content 	= 'casedetail.php';		
		break;
		
	case 'crimeincident' :
		$content 	= 'crimeincident.php';		
		break;
	case 'crimeincidentbrgy' :
		$content 	= 'crimeincidentbrgy.php';		
		break;
		
	case 'crimerate' :
		$content 	= 'crimerate.php';		
		break;
		
	case 'list' :
		$content 	= 'list.php';		
		break;
		
		
	case 'listprint' :
		$content 	= 'listprint.php';		
		break;
		
	case 'public' :
		$content 	= 'public.php';		
		break;
		
	case 'private' :
		$content 	= 'private.php';		
		break;
		
	case 'tricycle' :
		$content 	= 'tricycle.php';		
		break;
		
	case 'motorcycle' :
		$content 	= 'motorcycle.php';		
		break;
				
		
	case 'dailytrafficaccidentcases1' :
		$content 	= 'dailytrafficaccidentcases1.php';		
		break;
		
	case 'dailytrafficaccidentcases2' :
		$content 	= 'dailytrafficaccidentcases2.php';		
		break;
		
	case 'dailytrafficaccidentcases3' :
		$content 	= 'dailytrafficaccidentcases3.php';		
		break;
		
	case 'dailytrafficaccidentcases4' :
		$content 	= 'dailytrafficaccidentcases4.php';		
		break;
		
	case 'dailytrafficaccidentcases5' :
		$content 	= 'dailytrafficaccidentcases5.php';		
		break;
				
	case 'statsdetail' :
		$content 	= 'statsdetail.php';		
		break;
		
		
	case 'statscategory' :
		$content 	= 'statscategory.php';		
		break;
		
	case 'search' :
		$content 	= 'search.php';		
		break;
		
	case 'addcrime' :
		$content 	= 'addcrime.php';		
		break;

	case 'maintmu' :
		$content 	= 'maintmu.php';		
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

	case 'dailyaccident' :
		$content    = 'dailyaccident.php';
		break;
		

	case 'dailyaccidentdetail' :
		$content    = 'dailyaccidentdetail.php';
		break;
		
	default :
		$content 	= 'main.php';		
}




$title ='Reports';
$pageTitle 	= 'BCPO';
$session = $_SESSION["username"];
$script    = array('police.js');

require_once '../include/template.php';
?>

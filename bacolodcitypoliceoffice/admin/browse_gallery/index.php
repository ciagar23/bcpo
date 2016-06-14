<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
		$content 	= 'list.php';		
$title ='Browse Rogue Gallery';
		$pageTitle 	= 'BCPO';
	$session = $_SESSION["username"];
$script    = array('police.js');

require_once '../include/template.php';
?>

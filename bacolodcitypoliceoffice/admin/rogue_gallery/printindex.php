<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

	
		$content 	= 'printdetail.php';		



$title ='';
		$pageTitle 	= '';
		$session = $_SESSION["username"];
$script    = array('police.js');

require_once '../include/templateblank.php';

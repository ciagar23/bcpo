<?php
$succes='';

        $station = $_GET['admin'];


	// create the parameters needed to connect to the mysql database server
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'db_bacolodcitypoliceoffice';
	$table_name='tbl_lesson';

	// create the connection; if an error occurs display the error
	$connection = mysql_connect($host, $username, $password) or die(mysql_error());

	// select the database to use; if an error occurs display the error
	//$db = mysql_select_db($db) or die(mysql_error());
	$db = mysql_select_db($db) or die("Could not open a connection to the database server");
	

 if ($station =='Administrator')
{
?>

<table width="100%">
<tr valign="top">
<td>
<a href="index.php?to=TMU">TMU</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='TMU' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=PCR">PCR</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='PCR' and r_read ='no'"));?>)
<td>
<a href="index.php?to=Operations">Operations</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Operations' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 1">Police Station 1</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 1' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 2">Police Station 2</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 2' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 3">Police Station 3</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 3' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 4">Police Station 4</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 4' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 5">Police Station 5</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 5' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 6">Police Station 6</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 6' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 7">Police Station 7</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 7' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 8">Police Station 8</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 8' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 9">Police Station 9</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 9' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 10">Police Station 10</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 10' and r_read ='no'"));?>)
</table>

<?
}
else if ($station =='police station 9')
{
?>

<table width="100%">
<tr valign="top">
<td>
<a href="index.php?to=Administrator">Administrator</a> 
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Administrator' and r_read ='no'"));?>)
<td>
<a href="index.php?to=TMU">TMU</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='TMU' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=PCR">PCR</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='PCR' and r_read ='no'"));?>)
<td>
<a href="index.php?to=Operations">Operations</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Operations' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 1">Police Station 1</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 1' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 2">Police Station 2</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 2' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 3">Police Station 3</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 3' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 4">Police Station 4</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 4' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 5">Police Station 5</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 5' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 6">Police Station 6</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 6' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 7">Police Station 7</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 7' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 8">Police Station 8</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 8' and r_read ='no'"));?>)
<tr valign="top">
<td>

<a href="index.php?to=police station 10">Police Station 10</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 10' and r_read ='no'"));?>)
</table>

<?
}
else if ($station =='police station 10')
{
?>

<table width="100%">
<tr valign="top">
<td>
<a href="index.php?to=TMU">TMU</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='TMU' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=PCR">PCR</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='PCR' and r_read ='no'"));?>)
<td>
<a href="index.php?to=Operations">Operations</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Operations' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 1">Police Station 1</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 1' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 2">Police Station 2</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 2' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 3">Police Station 3</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 3' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 4">Police Station 4</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 4' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 5">Police Station 5</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 5' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 6">Police Station 6</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 6' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 7">Police Station 7</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 7' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 8">Police Station 8</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 8' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 9">Police Station 9</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 9' and r_read ='no'"));?>)
<td>
</table>

<?
}
else if ($station =='TMU')
{
?>

<table width="100%">
<tr valign="top">
<td>
<a href="index.php?to=Administrator">Administrator</a> 
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Administrator' and r_read ='no'"));?>)
<td>
<a href="index.php?to=PCR">PCR</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='PCR' and r_read ='no'"));?>)
<td>
<a href="index.php?to=Operations">Operations</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Operations' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 1">Police Station 1</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 1' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 2">Police Station 2</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 2' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 3">Police Station 3</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 3' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 4">Police Station 4</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 4' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 5">Police Station 5</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 5' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 6">Police Station 6</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 6' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 7">Police Station 7</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 7' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 8">Police Station 8</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 8' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 9">Police Station 9</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 9' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 10">Police Station 10</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 10' and r_read ='no'"));?>)
</table>

<?
}
else if ($station =='PCR')
{
?>

<table width="100%">
<tr valign="top">
<td>
<a href="index.php?to=Administrator">Administrator</a> 
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Administrator' and r_read ='no'"));?>)
<td>
<a href="index.php?to=TMU">TMU</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='TMU' and r_read ='no'"));?>)
<tr valign="top">
<td>

<a href="index.php?to=Operations">Operations</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Operations' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 1">Police Station 1</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 1' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 2">Police Station 2</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 2' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 3">Police Station 3</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 3' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 4">Police Station 4</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 4' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 5">Police Station 5</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 5' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 6">Police Station 6</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 6' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 7">Police Station 7</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 7' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 8">Police Station 8</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 8' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 9">Police Station 9</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 9' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 10">Police Station 10</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 10' and r_read ='no'"));?>)
</table>

<?
}
else if ($station =='Operations')
{
?>

<table width="100%">
<tr valign="top">
<td>
<a href="index.php?to=Administrator">Administrator</a> 
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Administrator' and r_read ='no'"));?>)
<td>
<a href="index.php?to=TMU">TMU</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='TMU' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=PCR">PCR</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='PCR' and r_read ='no'"));?>)
<td>

<a href="index.php?to=police station 1">Police Station 1</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 1' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 2">Police Station 2</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 2' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 3">Police Station 3</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 3' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 4">Police Station 4</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 4' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 5">Police Station 5</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 5' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 6">Police Station 6</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 6' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 7">Police Station 7</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 7' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 8">Police Station 8</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 8' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 9">Police Station 9</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 9' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 10">Police Station 10</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 10' and r_read ='no'"));?>)
</table>

<?
}
else if ($station =='police station 1')
{
?>

<table width="100%">
<tr valign="top">
<td>
<a href="index.php?to=Administrator">Administrator</a> 
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Administrator' and r_read ='no'"));?>)
<td>
<a href="index.php?to=TMU">TMU</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='TMU' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=PCR">PCR</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='PCR' and r_read ='no'"));?>)
<td>
<a href="index.php?to=Operations">Operations</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Operations' and r_read ='no'"));?>)
<tr valign="top">
<td>

<a href="index.php?to=police station 2">Police Station 2</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 2' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 3">Police Station 3</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 3' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 4">Police Station 4</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 4' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 5">Police Station 5</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 5' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 6">Police Station 6</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 6' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 7">Police Station 7</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 7' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 8">Police Station 8</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 8' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 9">Police Station 9</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 9' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 10">Police Station 10</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 10' and r_read ='no'"));?>)
</table>

<?
}
else if ($station =='police station 2')
{
?>

<table width="100%">
<tr valign="top">
<td>
<a href="index.php?to=Administrator">Administrator</a> 
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Administrator' and r_read ='no'"));?>)
<td>
<a href="index.php?to=TMU">TMU</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='TMU' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=PCR">PCR</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='PCR' and r_read ='no'"));?>)
<td>
<a href="index.php?to=Operations">Operations</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Operations' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 1">Police Station 1</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 1' and r_read ='no'"));?>)
<td>

<a href="index.php?to=police station 3">Police Station 3</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 3' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 4">Police Station 4</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 4' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 5">Police Station 5</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 5' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 6">Police Station 6</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 6' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 7">Police Station 7</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 7' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 8">Police Station 8</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 8' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 9">Police Station 9</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 9' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 10">Police Station 10</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 10' and r_read ='no'"));?>)
</table>

<?
}
else if ($station =='police station 3')
{
?>

<table width="100%">
<tr valign="top">
<td>
<a href="index.php?to=Administrator">Administrator</a> 
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Administrator' and r_read ='no'"));?>)
<td>
<a href="index.php?to=TMU">TMU</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='TMU' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=PCR">PCR</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='PCR' and r_read ='no'"));?>)
<td>
<a href="index.php?to=Operations">Operations</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Operations' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 1">Police Station 1</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 1' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 2">Police Station 2</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 2' and r_read ='no'"));?>)
<tr valign="top">
<td>

<a href="index.php?to=police station 4">Police Station 4</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 4' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 5">Police Station 5</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 5' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 6">Police Station 6</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 6' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 7">Police Station 7</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 7' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 8">Police Station 8</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 8' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 9">Police Station 9</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 9' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 10">Police Station 10</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 10' and r_read ='no'"));?>)
</table>

<?
}
else if ($station =='police station 4')
{
?>

<table width="100%">
<tr valign="top">
<td>
<a href="index.php?to=Administrator">Administrator</a> 
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Administrator' and r_read ='no'"));?>)
<td>
<a href="index.php?to=TMU">TMU</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='TMU' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=PCR">PCR</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='PCR' and r_read ='no'"));?>)
<td>
<a href="index.php?to=Operations">Operations</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Operations' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 1">Police Station 1</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 1' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 2">Police Station 2</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 2' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 3">Police Station 3</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 3' and r_read ='no'"));?>)
<td>

<a href="index.php?to=police station 5">Police Station 5</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 5' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 6">Police Station 6</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 6' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 7">Police Station 7</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 7' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 8">Police Station 8</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 8' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 9">Police Station 9</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 9' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 10">Police Station 10</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 10' and r_read ='no'"));?>)
</table>

<?
}
else if ($station =='police station 5')
{
?>

<table width="100%">
<tr valign="top">
<td>
<a href="index.php?to=Administrator">Administrator</a> 
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Administrator' and r_read ='no'"));?>)
<td>
<a href="index.php?to=TMU">TMU</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='TMU' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=PCR">PCR</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='PCR' and r_read ='no'"));?>)
<td>
<a href="index.php?to=Operations">Operations</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Operations' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 1">Police Station 1</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 1' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 2">Police Station 2</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 2' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 3">Police Station 3</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 3' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 4">Police Station 4</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 4' and r_read ='no'"));?>)
<tr valign="top">
<td>

<a href="index.php?to=police station 6">Police Station 6</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 6' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 7">Police Station 7</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 7' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 8">Police Station 8</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 8' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 9">Police Station 9</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 9' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 10">Police Station 10</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 10' and r_read ='no'"));?>)
</table>

<?
}
else if ($station =='police station 6')
{
?>

<table width="100%">
<tr valign="top">
<td>
<a href="index.php?to=Administrator">Administrator</a> 
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Administrator' and r_read ='no'"));?>)
<td>
<a href="index.php?to=TMU">TMU</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='TMU' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=PCR">PCR</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='PCR' and r_read ='no'"));?>)
<td>
<a href="index.php?to=Operations">Operations</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Operations' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 1">Police Station 1</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 1' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 2">Police Station 2</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 2' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 3">Police Station 3</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 3' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 4">Police Station 4</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 4' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 5">Police Station 5</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 5' and r_read ='no'"));?>)
<td>

<a href="index.php?to=police station 7">Police Station 7</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 7' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 8">Police Station 8</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 8' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 9">Police Station 9</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 9' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 10">Police Station 10</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 10' and r_read ='no'"));?>)
</table>

<?
}
else if ($station =='police station 7')
{
?>

<table width="100%">
<tr valign="top">
<td>
<a href="index.php?to=Administrator">Administrator</a> 
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Administrator' and r_read ='no'"));?>)
<td>
<a href="index.php?to=TMU">TMU</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='TMU' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=PCR">PCR</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='PCR' and r_read ='no'"));?>)
<td>
<a href="index.php?to=Operations">Operations</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Operations' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 1">Police Station 1</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 1' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 2">Police Station 2</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 2' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 3">Police Station 3</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 3' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 4">Police Station 4</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 4' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 5">Police Station 5</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 5' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 6">Police Station 6</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 6' and r_read ='no'"));?>)
<tr valign="top">
<td>

<a href="index.php?to=police station 8">Police Station 8</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 8' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 9">Police Station 9</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 9' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 10">Police Station 10</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 10' and r_read ='no'"));?>)
</table>

<?
}
else if ($station =='police station 8')
{
?>

<table width="100%">
<tr valign="top">
<td>
<a href="index.php?to=Administrator">Administrator</a> 
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Administrator' and r_read ='no'"));?>)
<td>
<a href="index.php?to=TMU">TMU</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='TMU' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=PCR">PCR</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='PCR' and r_read ='no'"));?>)
<td>
<a href="index.php?to=Operations">Operations</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='Operations' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 1">Police Station 1</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 1' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 2">Police Station 2</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 2' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 3">Police Station 3</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 3' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 4">Police Station 4</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 4' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 5">Police Station 5</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 5' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 6">Police Station 6</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 6' and r_read ='no'"));?>)
<tr valign="top">
<td>
<a href="index.php?to=police station 7">Police Station 7</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 7' and r_read ='no'"));?>)
<td>

<a href="index.php?to=police station 9">Police Station 9</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 9' and r_read ='no'"));?>)
<td>
<a href="index.php?to=police station 10">Police Station 10</a>
(<?php echo  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_from='police station 10' and r_read ='no'"));?>)
</table>

<?
}
else 
{
}
?>
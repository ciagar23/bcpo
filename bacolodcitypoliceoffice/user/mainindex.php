<?php
require_once '../library/config.php';
require_once './library/functions.php';

checkUser();
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) {
	case 'sorry' :
		$errorentry 	= '<script> alert("You are not Authorize to view this page"); 
</script>';
		break;
	default :
		$errorentry 	= '';
}


$session = $_SESSION["username"];
$script = array();

if (!defined('WEB_ROOT')) {
	exit;
}

$self = WEB_ROOT . 'admin/index.php';
?>
<html>
<head>
<title>Police Record Management System</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?php echo WEB_ROOT;?>admin/include/admin.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>library/common.js"></script>

<?php
$n = count($script);
for ($i = 0; $i < $n; $i++) {
	if ($script[$i] != '') {
		echo '<script language="JavaScript" type="text/javascript" src="' . WEB_ROOT. 'admin/library/' . $script[$i]. '"></script>';
	}
}
$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);	
		$station= $row['user_station'];
		
		if ( $station == 'WCP')
		{
			$wcp='index.php?view=wcp';
		}
			else  
		{
			$wcp='mainindex.php?view=sorry';
		}
	 if ( $station == 'traffic')
		{
			$traffic='index.php?view=traffic';
		}
			else  
		{
			$traffic='mainindex.php?view=sorry';
		}
	 if ( $station == 'police station 1')
		{
			$police_station1='index.php?view=police_station1';
		}
			else  
		{
			$police_station1='mainindex.php?view=sorry';
		}
	if ( $station == 'police station 2')
		{
			$police_station2='index.php?view=police_station2';
		}
			else  
		{
			$police_station2='mainindex.php?view=sorry';
		}
	  if ( $station == 'police station 3')
		{
			$police_station3='index.php?view=police_station3';
		}
			else  
		{
			$police_station3='mainindex.php?view=sorry';
		}
	  if ( $station == 'police station 4')
		{
			$police_station4='index.php?view=police_station4';
		}
			else  
		{
			$police_station4='mainindex.php?view=sorry';
		}
	  if ( $station == 'police station 5')
		{
			$police_station5='index.php?view=police_station5';
		}
			else  
		{
			$police_station5='mainindex.php?view=sorry';
		}
	  if ( $station == 'police station 6')
		{
			$police_station6='index.php?view=police_station6';
		}
			else  
		{
			$police_station6='mainindex.php?view=sorry';
		}
	  if ( $station == 'police station 7')
		{
			$police_station7='index.php?view=police_station7';
		}
			else  
		{
			$police_station7='mainindex.php?view=sorry';
		}
	  if ( $station == 'police station 8')
		{
			$police_station8='index.php?view=police_station8';
		}
			else  
		{
			$police_station8='mainindex.php?view=sorry';
		}
	   if ( $station == 'police station 9')
		{
			$police_station9='index.php?view=police_station9';
		}
			else  
		{
			$police_station9='mainindex.php?view=sorry';
		}
	  if ( $station == 'police station 10')
		{
			$police_station10='index.php?view=police_station10';
		}
			else  
		{
			$police_station10='mainindex.php?view=sorry';
		}
	
		
		

?>





</head>
<body background="<?php echo WEB_ROOT;?>bg.jpg">
<table align="center" width="75%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
<tr>
  <td bgcolor="#999999"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">CURRENT USER: <B><?php echo $session; ?>!</b></font> (<?php echo $station; ?>)
  <td bgcolor="#999999" align="center"><a href="mainindex.php?logout">Logout</a>
<tr>
<td bgcolor="#CCCCCC" colspan="2">

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
  
        <tr height="400">
          <td valign="top">
<table width=100% height=100%>
	<tr>
<td class="departments"> <a href='<?=$wcp;?>'>WPC</a>
<td class="departments"> <a href='<?=$traffic;?>'> TRAFFIC</a>
<td class="departments"> <a href='<?=$police_station1;?>'> POLICE STATION 1</a>
	<tr>
<td class="departments"> <a href='<?=$police_station2;?>'> POLICE STATION 2</a>
<td class="departments"> <a href='<?=$police_station3;?>'> POLICE STATION 3</a>
<td class="departments"> <a href='<?=$police_station4;?>'> POLICE STATION 4</a>
	<tr>
<td class="departments"> <a href='<?=$police_station5;?>'> POLICE STATION 5</a>
<td class="departments"> <a href='<?=$police_station6;?>'> POLICE STATION 6</a>
<td class="departments">  <a href='<?=$police_station7;?>'>POLICE STATION 7</a>
	<tr>
<td class="departments"> <a href='<?=$police_station8;?>'> POLICE STATION 8</a>
<td class="departments"> <a href='<?=$police_station9;?>'> POLICE STATION 9</a>
<td class="departments"> <a href='<?=$police_station10;?>'> POLICE STATION 10</a>
</table>
          </td>
   
</table>
</table>
<p><?=$errorentry;?></p>
</body>
</html>

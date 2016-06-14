<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

		
$sql = "SELECT a_id, a_content
        FROM tbl_aboutpnp";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);

?>
<h3><a href='index.php?view=aboutbcpo'>About BCPO</a> || <a href='index.php?view=aboutbacolod'>About Bacolod</a> || <a href='index.php?view=aboutpnp'>About PNP</a></h3>
				<h2>About PNP</h2>
<? echo nl2br($a_content);?>
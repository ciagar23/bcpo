<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

$self = WEB_ROOT . 'admin/index.php';

$sql = "SELECT *
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$show = mysql_fetch_array($result);	
		$station= $show['user_station'];
		$level= $show['user_level'];
		$fullname = $show['user_fullname'];
?>
<html>
<head>
<title><?php echo $pageTitle; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>admin/include/design/emx_nav_left.css" type="text/css" />
<style> 


</style>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
  
        <tr>
          <td>
<?php
require_once $content;	 
?>
          </td>
   
</table>
</table>
<p>&nbsp;</p>
</body>
</html>

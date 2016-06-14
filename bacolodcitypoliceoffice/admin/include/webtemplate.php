<?php
checkUser();
$errorMessage = '&nbsp;';

if (isset($_POST['txtUserName'])) 
	{
	$result = doLogin();
	
	if ($result != '') 
		{
		$errorMessage = $result;
		}
	}


$loggedin = (isset($_SESSION['website_id']) && $_SESSION['website_id'] != '') ? $_SESSION['website_id'] : '';	
$sql = "SELECT w_username
		        FROM tbl_webuser 
				WHERE w_id = '$loggedin'";
		$result = dbQuery($sql);
		$row = dbFetchAssoc($result);
		$user=$row['w_username'];	
		$message = mysql_num_rows(mysql_query("select * from tbl_reportacrime where r_to = '$user' and r_read ='no'"));
		$inbox = mysql_num_rows(mysql_query("select * from tbl_reportacrime where r_to = '$user'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Bacolod City Police Office Official Website</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!-- end dropdown -->
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<head>
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>lightbox/css/lightbox.css" type="text/css" media="screen" />
	<script src="<?php echo WEB_ROOT;?>lightbox/js/prototype.js" type="text/javascript"></script>
	<script src="<?php echo WEB_ROOT;?>lightbox/js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="<?php echo WEB_ROOT;?>lightbox/js/lightbox.js" type="text/javascript"></script>
	
	
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>admin/include/default.css" type="text/css" />
<script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>library/common.js"></script>
<?php
$n = count($script);
for ($i = 0; $i < $n; $i++) 
	{
	if ($script[$i] != '') 
		{
		echo '<script language="JavaScript" type="text/javascript" src="' . WEB_ROOT. 'admin/library/' . $script[$i]. '"></script>';
		}
	}
	?>
</head>
<body>
<!-- start header -->
<div id="header">
	<div id="logo">
	  <img src="<?php echo WEB_ROOT;?>images/header.jpg"  />
	</div>

</div>
<!-- end header -->
<!-- star menu -->
<div id="menu">
	<ul>
		<li><a href="<?php echo WEB_ROOT;?>website/index.php"> Home</a></li>
		<li><a href="<?php echo WEB_ROOT;?>website/index.php?view=aboutbcpo">Organization </a></li>
		<li><a href="<?php echo WEB_ROOT;?>website/crimeinfo/">Report A Crime</a></li>
		 <li><a href="<?php echo WEB_ROOT;?>website/crimeinfo/index.php?view=crimeincident">Crime Information</a></li>
		<li><a href="<?php echo WEB_ROOT;?>website/index.php?view=contactus">Contact Us</a></li>
	
	</div>
	</ul>
</div>
<!-- end menu -->
<!-- start page -->
<div id="page">
	<!-- start ads -->
	<div id="ads">
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="160" height="600" id="Untitled-1" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="<?php echo WEB_ROOT;?>admin/include/flash.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" /><embed src="<?php echo WEB_ROOT;?>admin/include/flash.swf" quality="high" bgcolor="#ffffff" width="160" height="600" name="<?php echo WEB_ROOT;?>admin/include/flash" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
	
	</div>
   
	<!-- end ads -->
	<!-- start content -->
	<div id="content">
     <p style="color: red; font-weight: bold; font-size: 18px; background-color: yellow; width: 100%; padding-left: 10px">IN CASE OF EMERGENCY, PLEASE CALL 166 or 177<br> or text 092767981265 or 090394355711</p>
	<? require_once $content;?>	
	</div>
	<!-- end content -->
	<!-- start sidebar -->
<? require_once $sidebar;?>
	<!-- end sidebar -->
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	<p class="legal">
		&copy;2012 Bacolod City Police Office </p>
	</div>
<!-- end footer -->
</body>
</html>

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

<head>

<!--dropdown-->

<link rel="stylesheet" type="text/css" href="/bcpo/dropdownweb.css" />
<script type="text/javascript">

var menuids=["treemenu1"] 

function buildsubmenus_horizontal()
{
for (var i=0; i<menuids.length; i++)
  {
  var ultags=document.getElementById(menuids[i]).getElementsByTagName("ul")
    for (var t=0; t<ultags.length; t++)
	{
			if (ultags[t].parentNode.parentNode.id==menuids[i])
			{ //if this is a first level submenu
				ultags[t].style.top=ultags[t].parentNode.offsetHeight+"px" //dynamically position first level submenus to be height of main menu item
				ultags[t].parentNode.getElementsByTagName("a")[0].className="mainfoldericon"
			}
			else
			{ //else if this is a sub level menu (ul)
				ultags[t].style.left=ultags[t-1].getElementsByTagName("a")[0].offsetWidth+"px" //position menu to the right of menu item that activated it
				ultags[t].parentNode.getElementsByTagName("a")[0].className="subfoldericon"
			}
			
				ultags[t].parentNode.onmouseover=function()
				{
					this.getElementsByTagName("ul")[0].style.visibility="visible"
				}
				
				ultags[t].parentNode.onmouseout=function()
				{
					this.getElementsByTagName("ul")[0].style.visibility="hidden"
				}
    }
  }
}

if (window.addEventListener)
window.addEventListener("load", buildsubmenus_horizontal, false)
else if (window.attachEvent)
window.attachEvent("onload", buildsubmenus_horizontal)
</script>

<!-- end dropdown -->
<title>Bacolod City Police Office Official Website</title>
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
		  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" 
		  codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="456" height="105">
            <param name="movie" value="/bcpo/admin/include/heading.swf">
            <param name="quality" value="high">
            <embed src="/bcpo/admin/include/heading.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="456" height="105"></embed>
	      </object>
  </div>
	<!--<div id="search">
		<form id="searchform" method="get" action="">
			<fieldset>
				<input type="text" name="s" id="s" size="15" value="" />
				<input type="submit" id="x" value="Search" />
			</fieldset>
		</form>
	</div> -->
</div>
<!-- end header -->
<!-- star menu -->
<div class="suckertreemenu">
<ul id="treemenu1">
		<li><a href="<?php echo WEB_ROOT;?>website/index.php"> Home</a>
</li>
</li>
		<li><a href="" title="">Organization </a>
			<ul>
			  <li><a href="/bcpo/website/index.php?view=aboutpnp">About PNP</a></li>
			  <li><a href="/bcpo/website/index.php?view=aboutbacolod">About Bacolod City</a></li>
			  <li><a href="/bcpo/website/index.php?view=aboutbcpo">About BCPO</a></li>
			  </ul></li>
		<li><a href="#" title="">Crime Information </a>
		<ul>
			  <li><a href="/bcpo/website/crimeinfo/">Report A Crime</a></li>
			  <li><a href="/bcpo/website/crimeinfo/index.php?view=crimeincident">Statistics</a></li>
			  <li><a href="/bcpo/website/index.php?view=mostwantedall">Most Wanted</a></li>
			  </ul>
		</li>
		<li><a href="#" title="">Get Help</a></li>
	</ul>
</div>
<!-- end menu -->
<!-- start page -->
<div id="page">
	<!-- start ads -->
	<div id="ads"><a href="#">
	
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="160" height="600" id="Untitled-1" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="/bcpo/admin/include/flash.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" /><embed src="/bcpo/admin/include/flash.swf" quality="high" bgcolor="#ffffff" width="160" height="600" name="/bcpo/admin/include/flash" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
	
	</a></div>
	<!-- end ads -->
	<div id="content">
	<? require_once $content;?>
</div>
	<!-- end content -->
	
	<? require_once $sidebar;?>
</div>
<!-- end page -->
</div>
<!-- start footer -->
<div id="footer">
	<p class="legal">
		&copy;2009 Bacolod City Police Office. All Rights Reserved.
	</p>
</div>
<!-- end footer -->
</body>
</html>

<html>

	<head>
	<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$self = WEB_ROOT . 'admin/index.php';
?>

		<title><?php echo $pageTitle; ?></title>
		
		
<link href="<?php echo WEB_ROOT;?>admin/include/admin.css" rel="stylesheet" type="text/css">
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

//kwaon ta kung ano nga station...

$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);	
		$station= $row['user_station'];
		
		if ( $station == 'WCP')
		{
			$department='wcp';
		}
			else  
		
	 if ( $station == 'traffic')
		{
		$department='traffic';
		}
			else  
		
	 if ( $station == 'police station 1')
		{
		$department='police_station1';
		}
			else  
		
	if ( $station == 'police station 2')
		{
		$department='police_station2';
		}
			else  
		
	  if ( $station == 'police station 3')
		{
		$department='police_station3';
		}
			else  
	
	  if ( $station == 'police station 4')
		{
		$department='police_station4';
		}
			else  
		
	  if ( $station == 'police station 5')
		{
		$department='police_station5';
		}
			else  
		
	  if ( $station == 'police station 6')
		{
		$department='police_station6';
		}
			else  
		
	  if ( $station == 'police station 7')
		{
		$department='police_station7';
		}
			else  
		
	  if ( $station == 'police station 8')
		{
			$department='police_station8';
		}
			else  
		
	   if ( $station == 'police station 9')
		{
		$department='police_station9';
		}
			else  
		
	  if ( $station == 'police station 10')
		{
		$department='police_station10';
		}
			else  
		{
		$department='police_station10';
		}

?>

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

	</head>

	<body>
		<div id="container">
		
			<div id="head">
				<div id="myname">
				<a>Bacolod City Police Office</a>
				</div>
			</div>
			
		  <div class="suckertreemenu" align="center">
<ul id="treemenu1">
<li class="style1"><a href="<?php echo WEB_ROOT;?>admin/index.php?view=<?php echo $department; ?>" class="leftnav">Home</a>
  <ul>
  </ul>
</li>

<li class="style1"><a href="#">Blotter</a>
  <ul>
  <li><a href="<?php echo WEB_ROOT;?>admin/blotter/index.php?view=add">Add</a></li>
  <li><a href="<?php echo WEB_ROOT;?>admin/blotter/">View</a></li>
  </ul>
</li>

<li class="style1"><a href="<?php echo WEB_ROOT;?>admin/user/" class="leftnav">User</a> 
  <ul>
  </ul>
  
  <li class="style1"><a href="<?php echo WEB_ROOT;?>admin/index.php?logout" class="leftnav" target="_parent">Logout</a> 
  <ul>
  </ul>
  </div>
			
			  <div id="content">
			  <p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome: <?=$session;?>!</p>
<p>
<br/>
<br/>
<br/>

<? require_once $content; ?>


</p>
			
		  </div>
			   <div id="foot">
                	
               </div>
			
		</div>
            <div id="footer">
                <div id="copy_right">  
                  <div align="center">Copyright 2009 Bacolod City Police Office </div>
                </div>
                </div>
	</body>

</html>
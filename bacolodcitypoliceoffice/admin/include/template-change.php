<head>
<?php

	
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

$self = WEB_ROOT . 'admin/index.php';
?>


<title><?php echo $pageTitle; ?></title>

	<link rel="stylesheet" href="<?php echo WEB_ROOT;?>lightbox/css/lightbox.css" type="text/css" media="screen" />
	<script src="<?php echo WEB_ROOT;?>lightbox/js/prototype.js" type="text/javascript"></script>
	<script src="<?php echo WEB_ROOT;?>lightbox/js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="<?php echo WEB_ROOT;?>lightbox/js/lightbox.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>admin/include/design/emx_nav_left.css" type="text/css" />
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

$sql = "SELECT *
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$show = mysql_fetch_array($result);	
		$station= $show['user_station'];
		$level= $show['user_level'];
		$fullname = $show['user_fullname'];
		
		if($station == 'Administrator')
		
				$navigation = '<div class="suckertreemenu" align="center">
			<ul id="treemenu1">
			<li class="style1"><a href="'.WEB_ROOT.'admin/index.php">Home &nbsp;</a>
					  <ul>
					  
					  </ul>
			</li>
			
						
						<li class="style1"><a href=""> Reports &nbsp;</a>
						  <ul>
								<li><a href="'.WEB_ROOT.'admin/reports/index.php?view=main">Stations</a></li>
								 <li><a href="'.WEB_ROOT.'admin/reports/index.php?view=maintmu">TMU</a></li>
								</ul>
						</li>
			<li class="style1"><a href="'.WEB_ROOT.'admin/allblotter">All Botter &nbsp;</a>
					 <ul>
					  </ul>
					</li>
			<li class="style1"><a href="'.WEB_ROOT.'admin/rogue_gallery">Rogue Gallery &nbsp;</a>
								<ul>
								
								 
								</ul>
								</li>
						<li class="style1"><a href="'.WEB_ROOT.'admin/user"> User &nbsp;</a>
						  <ul>
						</ul>
						</li>
			
					<li class="style1"><a href="#"> History &nbsp;</a> 
			  <ul>
			  <li><a href="'.WEB_ROOT.'admin/history/index.php?view=blotter"> Blotter </a></li>
			  <li><a href="'.WEB_ROOT.'admin/history/index.php?view=rogue_gallery"> Rogue Gallery </a></li>
			  <li><a href="'.WEB_ROOT.'admin/history/index.php?view=user"> User </a></li>
			  </ul>			  
			
					<li class="style1"><a href="'.WEB_ROOT.'admin/index.php?logout"> Logout</a> 
					  <ul>
					  </ul>
					  
					  </div>';
					  
			else if($station == 'TMU')
			{
							$navigation = '<div class="suckertreemenu" align="center">
			<ul id="treemenu1">
			<li class="style1"><a href="'.WEB_ROOT.'admin/index.php">Home &nbsp;</a>
			  <ul>
			  <li><a href="'.WEB_ROOT.'admin/index.php?view=aboutus">AboutUs</a></li>
			  
			  </ul>
			</li>
			
			<li class="style1"><a href="'.WEB_ROOT.'admin/blotter"> Blotter &nbsp;</a>
			  <ul>
			  <li><a href="'.WEB_ROOT.'admin/blotter/index.php?view=addtmu">Add Blotter</a></li>
			</ul>
			</li>
			
			
			<li class="style1"><a href="'.WEB_ROOT.'admin/reports/index.php?view=maintmu"> Reports &nbsp;</a>
			  <ul>
			</ul>
			</li>
			<li class="style1"><a href="'.WEB_ROOT.'admin/allblotter">All Botter &nbsp;</a>
								<ul>
								</ul>
								</li>
			
			<li class="style1"><a href="'.WEB_ROOT.'admin/user"> User &nbsp;</a>
			  <ul>
			</ul>
			</li>
			
			<li class="style1"><a href="#"> History &nbsp;</a> 
			  <ul>
			  <li><a href="'.WEB_ROOT.'admin/history/index.php?view=blotter"> Blotter </a></li>
			  <li><a href="'.WEB_ROOT.'admin/history/index.php?view=rogue_gallery"> Rogue Gallery </a></li>
			  <li><a href="'.WEB_ROOT.'admin/history/index.php?view=user"> User </a></li>
			  </ul>
			  
			
			<li class="style1"><a href="'.WEB_ROOT.'admin/index.php?logout"> Logout</a> 
			  <ul>
			  </ul>
			  
			  </div>';
			
			}
			
			else if ($station == 'records')
		{
		$navigation = '<center><a href="index.php?view=main">Home</a> |
		 <a href="/bcpo/admin/records/index.php?view=list&location=police station 1">PS1</a> |
		  <a href="/bcpo/admin/records/index.php?view=list&location=police station 2">PS2</a> |
		   <a href="/bcpo/admin/records/index.php?view=list&location=police station 3">PS3 </a>|
		   <a href="/bcpo/admin/records/index.php?view=list&location=police station 4"> PS4 </a>|
			 <a href="/bcpo/admin/records/index.php?view=list&location=police station 5">PS5</a> |
			 <a href="/bcpo/admin/records/index.php?view=list&location=police station 6"> PS6 </a>|
			  <a href="/bcpo/admin/records/index.php?view=list&location=police station 7"> PS7</a> |
			   <a href="/bcpo/admin/records/index.php?view=list&location=police station 8"> PS8</a> |
				<a href="/bcpo/admin/records/index.php?view=list&location=police station 9"> PS9</a> |
				 <a href="/bcpo/admin/records/index.php?view=list&location=police station 1o"> PS10</a> |
				  <a href="/bcpo/admin/records/index.php?view=list&location=TMU"> TMU </a>|
				   <a href="/bcpo/admin/user"> User</a> |
					<a href="/bcpo/admin/records/index.php?logout"> Logout</a></center>';
		}
							else if ($station == 'PCR')
		{
		$navigation = '<div class="suckertreemenu" align="center">
			<ul id="treemenu1">
			<li class="style1"><a href="/bcpo/admin/">Home </a>
						 <ul>
					  	</ul>
			</li>
			<li class="style1"><a href="";>About Us</a>
						<ul>
					  	<li><a href="/bcpo/admin/pcr/index.php?view=aboutpnp">About PNP</a></li>
					  	<li><a href="/bcpo/admin/pcr/index.php?view=aboutbcpo">About BCPO</a></li>
					  	<li><a href="/bcpo/admin/pcr/index.php?view=aboutbacolod">About Bacolod</a></li>
					 	</ul>
			</li>
			<li class="style1"><a href="/bcpo/admin/activities">Activities</a>
				<ul>
				</ul>
			</li>
			<li class="style1"><a href="/bcpo/admin/missing">Missing Persons</a>
					  <ul>
					  </ul>
			</li>
			<li class="style1"><a href="/bcpo/admin/wanted">wanted Persons</a>
					  <ul>
					  </ul>
			</li>	

			<li class="style1"><a href="/bcpo/admin/user"> User</a>
					  <ul>
					  </ul>
			</li>
			<li class="style1"><a href="/bcpo/admin/records/index.php?logout"> Logout</a></center>
					  <ul>
					  </ul>
			</li>
			</div> ';
		
		
		

					
		}
		
		else if ($station == 'Operations')
		{
		
		$navigation = '<div class="suckertreemenu" align="center">
			<ul id="treemenu1">
			<li class="style1"><a href="'.WEB_ROOT.'admin/index.php">Home &nbsp;</a>
					  <ul>
					  
					  </ul>
			</li>
							
						<li class="style1"><a href=""> Reports &nbsp;</a>
						  <ul>
								<li><a href="'.WEB_ROOT.'admin/reports/index.php?view=main">Stations</a></li>
								 <li><a href="'.WEB_ROOT.'admin/reports/index.php?view=maintmu">TMU</a></li>
								</ul>
						</li>
							<li class="style1"><a href="'.WEB_ROOT.'admin/rogue_gallery">Rogue Gallery &nbsp;</a>
								<ul>
								
								</ul>
								</li>
						
						
			<li class="style1"><a href="'.WEB_ROOT.'admin/allblotter">All Botter &nbsp;</a>
					 <ul>
					
					  </ul>
					</li>
			
			
					<li class="style1"><a href="#"> History &nbsp;</a> 
					  <ul>
					  <li><a href="'.WEB_ROOT.'admin/history/index.php?view=blotter"> Blotter </a></li>
					  <li><a href="'.WEB_ROOT.'admin/history/index.php?view=rogue_gallery"> Rogue Gallery </a></li>
					  <li><a href="'.WEB_ROOT.'admin/history/index.php?view=user"> User </a></li>
					  </ul>
			  
			
					<li class="style1"><a href="'.WEB_ROOT.'admin/index.php?logout"> Logout</a> 
					  <ul>
					  </ul>
					  
					  </div>';
					  
		
		
		}
		
			else
							{
						
						$navigation = '<div class="suckertreemenu" align="center">
			<ul id="treemenu1">
			<li class="style1"><a href="'.WEB_ROOT.'admin/index.php">Home &nbsp;</a>
			  <ul>
			  
			  </ul>
			</li>
			
			<li class="style1"><a href="'.WEB_ROOT.'admin/blotter"> Blotter &nbsp;</a>
			  <ul>
			  <li><a href="'.WEB_ROOT.'admin/blotter/index.php?view=add">Add Blotter</a></li>
			</ul>
			</li>
			
			
			<li class="style1"><a href="'.WEB_ROOT.'admin/reports/index.php"> Reports &nbsp;</a>
			  <ul>
			</ul>
			</li>
			<li class="style1"><a href="'.WEB_ROOT.'admin/rogue_gallery">Rogue Gallery &nbsp;</a>
								<ul>
								
								 
								</ul>
								</li>
			<li class="style1"><a href="'.WEB_ROOT.'admin/allblotter">All Botter &nbsp;</a>
								 <ul>
					  </ul>
								</li>
			
			<li class="style1"><a href="'.WEB_ROOT.'admin/user"> User &nbsp;</a>
			  <ul>
			</ul>
			</li>
			
			<li class="style1"><a href="#"> History &nbsp;</a> 
			  <ul>
			  <li><a href="'.WEB_ROOT.'admin/history/index.php?view=blotter"> Blotter </a></li>
			  <li><a href="'.WEB_ROOT.'admin/history/index.php?view=rogue_gallery"> Rogue Gallery </a></li>
			  <li><a href="'.WEB_ROOT.'admin/history/index.php?view=user"> User </a></li>
			  </ul>
			  
			
			<li class="style1"><a href="'.WEB_ROOT.'admin/index.php?logout"> Logout</a> 
			  <ul>
			  </ul>
			  
			  </div>';
					 }
		
		
	

?>


<!--templates lang ni-->

<link rel="stylesheet" type="text/css" href="/bcpo/dropdowncss.css" />
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
<body onmousemove="closesubnav(event);">
<div class="skipLinks"> skip to: 
	<a href="#content"> page content </a> 
	<a href="#pageNav"> links on this page< /a>  
	<a href="#globalNav"> site navigation </a>  
	<a href="#siteInfo"> footer (site information) </a> </div>
<div id="masthead">
	<div id="headerpix"><img src="/bcpo/admin/include/design/header1.jpg"></div>
  		<div id="usernow"><span class="style1">User: </span>

<script language="JavaScript1.2">
var message="<? echo $fullname; ?>(<? echo $level;?>)"
var neonbasecolor="white"
var neontextcolor="#FA7906"
var flashspeed=100  //in milliseconds
///No need to edit below this line/////
var n=0
if (document.all||document.getElementById){
document.write('<font color="'+neonbasecolor+'">')
for (m=0;m<message.length;m++)
document.write('<span id="neonlight'+m+'">'+message.charAt(m)+'</span>')
document.write('</font>')
}
else
document.write(message)
function crossref(number){
var crossobj=document.all? eval("document.all.neonlight"+number) : document.getElementById("neonlight"+number)
return crossobj
}
function neon(){
//Change all letters to base color
if (n==0){
for (m=0;m<message.length;m++)
//eval("document.all.neonlight"+m).style.color=neonbasecolor
crossref(m).style.color=neonbasecolor
}
//cycle through and change individual letters to neon color
crossref(n).style.color=neontextcolor
if (n<message.length-1)
n++
else{
n=0
clearInterval(flashing)
setTimeout("beginneon()",1500)
return
}
}
function beginneon(){
if (document.all||document.getElementById)
flashing=setInterval("neon()",flashspeed)
}
beginneon()
</script>
			 
			hehehe<br>
			<span class="style1"> Department:</span> 
			<span class="style2"> <? echo strtoupper($station);?> </span> 
		</div>



<div id="navTable">	
<table border="0" align="center" width="100%" cellpadding="0" cellspacing="0">

	<tr id="navbg"><td><img src="<?php echo WEB_ROOT;?>admin/include/design/gblnav_left.gif">
		<td>
		
		<? echo $navigation; ?>
		
		<td align="right"><img src="<?php echo WEB_ROOT;?>admin/include/design/glbnav_right.gif"></td>
	</tr>
	
</table>
</div>

  </div>


<div id="titleTable">
<table border="0" width="95%" align="center" bgcolor="#FFFFFF" cellpadding="0" cellspacing="0">

	<tr>
		<td>
			
			<div id="title">
			<table border="0" width="100%" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top" ><img alt="small logo" src="<?php echo WEB_ROOT;?>admin/include/design/tl_curve_white.gif"></td>
					<td class="titleTd"><? echo $title;?></td>
					<td align="right"> <img alt="small logo" src="<?php echo WEB_ROOT;?>admin/include/design/bcp.png" height="59"/> </td>
					<td valign="top" align="right" ><img alt="small logo" src="<?php echo WEB_ROOT;?>admin/include/design/tr_curve_white.gif"></td>
				</tr>
			</table>
			</div>
			
		</td>
	</tr>
	
	<tr>
		<td colspan="3">
			<table align="center" border="0" id="contentTable">
				<tr>
					<td width='940'><? require_once $content; ?></td>
				</tr>
			</table>
			
		</td>
	</tr>
	
</table>

	<div id="footerTable">
	<table border="0" width="95%" align="center" bgcolor="#FFFFFF">
	
		<tr>
			<td> <div id="siteInfo">&copy;2009 Bacolod City Police Office </div> </td>
		</tr>
	
	</table>
	</div>

</div>


<!--end pagecell1-->
<br />
<script type="text/javascript">
    <!--
      var menuitem1 = new menu(7,1,"hidden");
			var menuitem2 = new menu(7,2,"hidden");
			var menuitem3 = new menu(7,3,"hidden");
			var menuitem4 = new menu(7,4,"hidden");
			var menuitem5 = new menu(7,5,"hidden");
			var menuitem6 = new menu(7,6,"hidden");
			var menuitem7 = new menu(7,7,"hidden");
    // -->
    </script>
</body>
</html>

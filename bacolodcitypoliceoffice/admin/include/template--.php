
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
		
		if($level == 'Administrator' || $level == 'Investigator')
			{
			$allblotter ='<a href="'.WEB_ROOT.'admin/allblotter" id="gl4" class="glink" onMouseOver="ehandler(event,menuitem5);">All Botter</a>';
			}
			
			else
				{
				$allblotter = '';
				}
		
		if($station == 'TMU')
			{
			$reports = 'index.php?view=maintmu';
			$roguegallery = '';
			}
			
	
	
				else
					{
					$reports = 'index.php';
					$roguegallery = '<a href="'.WEB_ROOT.'admin/rogue_gallery" id="gl4" class="glink" onMouseOver="ehandler(event,menuitem4);">Rogue Gallery</a>';
					}

?>


<!--templates lang ni-->

<script type="text/javascript">
<!--
var time = 3000;
var numofitems = 7;

//menu constructor
function menu(allitems,thisitem,startstate){ 
  callname= "gl"+thisitem;
  divname="subglobal"+thisitem;  
  this.numberofmenuitems = allitems;
  this.caller = document.getElementById(callname);
  this.thediv = document.getElementById(divname);
  this.thediv.style.visibility = startstate;
}

//menu methods
function ehandler(event,theobj){
  for (var i=1; i<= theobj.numberofmenuitems; i++){
    var shutdiv =eval( "menuitem"+i+".thediv");
    shutdiv.style.visibility="hidden";
  }
  theobj.thediv.style.visibility="visible";
}
				
function closesubnav(event){
  if ((event.clientY <48)||(event.clientY > 107)){
    for (var i=1; i<= numofitems; i++){
      var shutdiv =eval('menuitem'+i+'.thediv');
      shutdiv.style.visibility='hidden';
    }
  }
}
// -->
</script>
</head>
<body onmousemove="closesubnav(event);">
<div class="skipLinks">skip to: <a href="#content">page content</a> | <a href="#pageNav">links on this page</a> | <a href="#globalNav">site navigation</a> | <a href="#siteInfo">footer (site information)</a> </div>
<div id="masthead">
  <div id="headerpix"><img src="/bcpo/admin/include/design/header1.jpg"></div>
  <div id="usernow"> <span class="style1">User: </span>
  					 <span class="style2">

<script language="JavaScript1.2">
var message="<? echo $fullname; ?>(<? echo $level;?>)"
var neonbasecolor="white"
var neontextcolor="orange"
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
			 
	</span><br>
	<span class="style1">Department:</span> <span class="style2"> <? echo strtoupper($station);?> </span> </div>
				
<div id="globalNav"> <img alt="" src="<?php echo WEB_ROOT;?>admin/include/design/gblnav_left.gif" height="32" width="4" id="gnl" /> <img alt="" src="<?php echo WEB_ROOT;?>admin/include/design/glbnav_right.gif" height="32" width="4" id="gnr" />
   
    <div id="globalLink"> 
	<a href="<?php echo WEB_ROOT;?>admin/index.php" id="gl1" class="glink" onMouseOver="ehandler(event,menuitem1);"> Home </a>
	<a href="<?php echo WEB_ROOT;?>admin/blotter" id="gl2" class="glink" onMouseOver="ehandler(event,menuitem2);"> Blotter </a>
	<a href="<?php echo WEB_ROOT;?>admin/reports" id="gl3" class="glink" onMouseOver="ehandler(event,menuitem3);"> Reports </a>
	<? echo $roguegallery;?>
	<? echo $allblotter;?>
	<a href="<?php echo WEB_ROOT;?>admin/user" id="gl5" class="glink" onMouseOver="ehandler(event,menuitem6);"> User </a>
	<a href="<?php echo WEB_ROOT;?>admin/history" id="gl6" class="glink" onMouseOver="ehandler(event,menuitem7);"> History </a>
	<a href="<?php echo WEB_ROOT;?>admin/index.php?logout" id="gl7" class="glink" onMouseOver="ehandler(event,menuitem8);"> Logout </a> 
	</div>
    <!--end globalLinks-->

  </div>
  <!-- end globalNav -->
  <div id="subglobal1" class="subglobalNav"> 
  <a href="#"> History </a> | 
  <a href="#"> Police Activities </a> | 
  <a href="<?php echo WEB_ROOT;?>admin/index.php?view=mostwanted"> Most Wanted </a> |
  <a href="#"> Newly Uploaded Criminals </a> | </div>
  
  <div id="subglobal2" class="subglobalNav"> <a href="#">subglobal2 link</a> | <a href="#">subglobal2 link</a> | <a href="#">subglobal2 link</a> | <a href="#">subglobal2 link</a> | <a href="#">subglobal2 link</a> | <a href="#">subglobal2 link</a> | <a href="#">subglobal2 link</a> </div>
  
  <div id="subglobal3" class="subglobalNav"> <a href="#">subglobal3 link</a> | <a href="#">subglobal3 link</a> | <a href="#">subglobal3 link</a> | <a href="#">subglobal3 link</a> | <a href="#">subglobal3 link</a> | <a href="#">subglobal3 link</a> | <a href="#">subglobal3 link</a> </div>
  
  <div id="subglobal4" class="subglobalNav"> <a href="#">subglobal4 link</a> | <a href="#">subglobal4 link</a> | <a href="#">subglobal4 link</a> | <a href="#">subglobal4 link</a> | <a href="#">subglobal4 link</a> | <a href="#">subglobal4 link</a> | <a href="#">subglobal4 link</a> </div>
  
  <div id="subglobal5" class="subglobalNav"> <a href="#">subglobal5 link</a> | <a href="#">subglobal5 link</a> | <a href="#">subglobal5 link</a> | <a href="#">subglobal5 link</a> | <a href="#">subglobal5 link</a> | <a href="#">subglobal5 link</a> | <a href="#">subglobal5 link</a> </div>
  
  <div id="subglobal6" class="subglobalNav"> <a href="#">subglobal6 link</a> | <a href="#">subglobal6 link</a> | <a href="#">subglobal6 link</a> | <a href="#">subglobal6 link</a> | <a href="#">subglobal6 link</a> | <a href="#">subglobal6 link</a> | <a href="#">subglobal6 link</a> </div>
  
  <div id="subglobal7" class="subglobalNav"> <a href="#">subglobal7 link</a> | <a href="#">subglobal7 link</a> | <a href="#">subglobal7 link</a> | <a href="#">subglobal7 link</a> | <a href="#">subglobal7 link</a> | <a href="#">subglobal7 link</a> | <a href="#">subglobal7 link</a> </div>
  
  <div id="subglobal8" class="subglobalNav"> <a href="#">subglobal8 link</a> | <a href="#">subglobal8 link</a> | <a href="#">subglobal8 link</a> | <a href="#">subglobal8 link</a> | <a href="#">subglobal8 link</a> | <a href="#">subglobal8 link</a> | <a href="#">subglobal8 link</a> </div>
</div>

<!-- end masthead -->
<div id="pagecell1">
  <!--pagecell1-->
  <img alt="" src="<?php echo WEB_ROOT;?>admin/include/design/tl_curve_white.gif" height="6" width="6" id="tl" 
  <img alt="" src="<?php echo WEB_ROOT;?>admin/include/design/tr_curve_white.gif" height="6" width="6" id="tr" />
  <div id="breadCrumb"></div>
  
  <div id="pageName">
    <h2><? echo $title;?></h2>
    <img alt="small logo" src="<?php echo WEB_ROOT;?>admin/include/design/bcp.png" height="59"/> </div>

<!--page nav na di nayon-->

  <div id="content">
	<table align="center" border="0">
		<tr>
			<td width='900'>
			<? require_once $content; ?>
	</table>

  </div>
  <div id="siteInfo">&copy;2009 Bacolod City Police Office </div>
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

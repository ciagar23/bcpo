<!doctype html>
<html lang="en">

<head>
<?php

	
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

$self = WEB_ROOT . 'admin/index.php';

$n = count($script);
for ($i = 0; $i < $n; $i++) 
	{
	if ($script[$i] != '') 
		{
		echo '<script language="JavaScript" type="text/javascript" src="' . WEB_ROOT. 'admin/library/' . $script[$i]. '"></script>';
		}
	}


$sql = "SELECT *
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$show = mysql_fetch_array($result);	
		$station= $show['user_station'];
		$level= $show['user_level'];
		$fullname = $show['user_fullname'];
?>

	<meta charset="utf-8"/>
	<title><?php echo $pageTitle;?></title>
	
	<link rel="stylesheet" href="<?php echo WEB_ROOT;?>admin/include/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>library/common.js"></script>
    
    
  
	<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="<?php echo WEB_ROOT;?>admin/include/js/hideshow.js" type="text/javascript"></script>
	<script src="<?php echo WEB_ROOT;?>admin/include/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo WEB_ROOT;?>admin/include/js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>

<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="<?php echo WEB_ROOT;?>admin/index.php"><img src="<?php echo WEB_ROOT;?>admin/include/images/header1.jpg" width="210" height="40"></a></h1>
			<h2 class="section_title"><? echo strtoupper($station);?>, Records and Blotter System</h2><div class="btn_view_site"><a target="_blank" href="<?php echo WEB_ROOT;?>website">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><? echo $fullname; ?> (<? echo $level;?>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<!--<article class="breadcrumbs"><a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article> -->
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search"  action="<?php echo WEB_ROOT;?>admin/rogue_gallery/index.php?field=r_name">
			<input type="hidden" name="field" value="r_name">
			<input type="text" name="search" value="Search a Person" onFocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
        <?php if ($station != 'PCR')
		{
		}
        else
		{ ?>
        
        
		<h3>About Us</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="<?php echo WEB_ROOT;?>admin/pcr/index.php?view=aboutpnp">About PNP</a></li>
			<li class="icn_edit_article"><a href="<?php echo WEB_ROOT;?>admin/pcr/index.php?view=aboutbcpo">About BCPO</a></li>
			<li class="icn_categories"><a href="<?php echo WEB_ROOT;?>admin/pcr/index.php?view=aboutbacolod">About Bacolod</a></li>
		</ul>
		
        <?php 
		}
		 ?>
        
        <h3>Home</h3>
        <ul class="toggle">
			<li class="icn_new_article"><a href="<?php echo WEB_ROOT;?>admin/activities">Activities</a></li>
			<li class="icn_edit_article"><a href="<?php echo WEB_ROOT;?>admin/wanted">Most Wanted</a></li>
			<li class="icn_categories"><a href="<?php echo WEB_ROOT;?>admin/missing">Missing Person</a></li>
		</ul>
        <h3>blotter</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="<?php echo WEB_ROOT;?>admin/blotter">View Blotter</a></li>
            
            <?php
            if ($station == 'TMU')
			{
			?>
            
			<li class="icn_edit_article"><a href="<?php echo WEB_ROOT;?>admin/blotter/index.php?view=addtmu">Add Blotter</a></li>
            <?php 
			
			}
			
			else if ($station == 'Administrator' || $station =='PCR')
			{
			
			}
			
			
			else 
			{
			?>
            
			<li class="icn_edit_article"><a href="<?php echo WEB_ROOT;?>admin/blotter/index.php?view=add">Add Blotter</a></li>
            <?php 
			
			
			}
			
			
			
			?>
            
            
            
            
            
            
            
			<li class="icn_new_article"><a href="<?php echo WEB_ROOT;?>admin/allblotter">All Blotter</a></li>
		</ul>
        <h3>Reports</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="<?php echo WEB_ROOT;?>admin/reports">Police Stations</a></li>
			<li class="icn_new_article"><a href="<?php echo WEB_ROOT;?>admin/reports/index.php?view=maintmu">TMU</a></li>
		</ul>
		<h3>ROGUE GALLERY</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="<?php echo WEB_ROOT;?>admin/rogue_gallery/index.php?view=list">Rogue Gallery list</a></li>
			<li class="icn_folder"><a href="<?php echo WEB_ROOT;?>admin/rogue_gallery">View Rogue Gallery</a></li>
            
            <?php
			if ($station == 'Administrator')
			{
			
			}
			
			
			else 
			{
			?>
            
            
            
			<li class="icn_photo"><a href="<?php echo WEB_ROOT;?>admin/rogue_gallery/index.php?view=checkname">Add Rogue Gallery</a></li>
            <?php
			}
			?>
            
           <!-- js here -->
<script type="text/javascript">
 var xmlhttp1 = new XMLHttpRequest();
function liveChat2()
{
xmlhttp1.open("GET","<?php echo WEB_ROOT;?>admin/messaging/messaging.php?admin=<?php echo $station?>",true);
xmlhttp1.send(); 
 var live2 = setTimeout("liveAjax2()",1000);
 }
function liveAjax2()
{  
document.getElementById("phpChat2").innerHTML = xmlhttp1.responseText; 
var live3 = setTimeout("liveChat2()",1000);
}
 var live1 = setTimeout("liveChat2()",1000);
</script>
<!-- html here -->
            
            
		</ul>
		<h3>USER</h3>
		<ul class="toggle">
			<li class="icn_view_users"><a href="<?php echo WEB_ROOT;?>admin/user">View User</a></li>
			<li class="icn_view_users"><a href="<?php echo WEB_ROOT;?>admin/messaging/?view=detail">Messaging</a>  
         
<span border="1" id="phpChat2">
</span>
            
            
            </li>
			<li class="icn_view_users"><a href="<?php echo WEB_ROOT;?>admin/resident">View Registered Resident</a></li>
            
          <?php if ($station == 'Administrator')
			{
			?>
		
			<li class="icn_add_user"><a href="<?php echo WEB_ROOT;?>admin/user/index.php?view=add">Add User</a></li>	
            
            <?php
		
			}
			
			
			else 
			{
			}
			?>
            
            
            
            
			<li class="icn_jump_back"><a href="<?php echo WEB_ROOT;?>admin/index.php?logout">Logout</a></li>
		</ul>		
        <h3>HISTORY</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="<?php echo WEB_ROOT;?>admin/history/index.php?view=blotter">Blotter</a></li>
			<li class="icn_photo"><a href="<?php echo WEB_ROOT;?>admin/history/index.php?view=rogue_gallery">Rogue Gallery</a></li>
			<li class="icn_view_users"><a href="<?php echo WEB_ROOT;?>admin/history/index.php?view=user">User</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>�2012 Bacolod City Police Office</strong></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
	



					<? require_once $content; ?>

       
    
   
    
		<div class="spacer"></div>
	</section>


</body>

</html>
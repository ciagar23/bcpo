<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	
	$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
	$to = (isset($_GET['to']) && $_GET['to'] != '') ? $_GET['to'] : '';


?> 


<!-- js here -->
<script type="text/javascript">
 var xmlhttp = new XMLHttpRequest();
function liveChat1()
{
xmlhttp.open("GET","detail2.php?admin=<?php echo $station?>",true);
xmlhttp.send(); 
 var live2 = setTimeout("liveAjax1()",1000);
 }
function liveAjax1()
{  
document.getElementById("phpChat1").innerHTML = xmlhttp.responseText; 
var live3 = setTimeout("liveChat1()",1000);
}
 var live1 = setTimeout("liveChat1()",1000);
</script>
<!-- html here -->

<font color="#FF0000"><? echo $errorMessage;?></font>
<form action="processCrimereport.php?action=acrimereport" method="post"  name="frmListCrimereport" id="frmListCrimereport">

  <article class="module width_full">
			<header><h3> Select Thread </h3></header>
			<div class="module_content">
<h2>
<div>
<span border="1" id="phpChat1">
</span>
</div>

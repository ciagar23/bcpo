<article class="module width_full">
		<header><h3 class="tabs_involved">&nbsp;View # of cases for the month of
  </h3>
		</header>

		<div class="tab_container"><?
$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;
$CaseList = CaselistOptions($catId);
?>

<script type="text/JavaScript">
<!--

function MM_jumpMenu2(targ,selObj,restore){ //v3.0
  eval(targ+".location='index.php?view=investigator&investigator="+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

//-->
</script>
<table width="100%">
<tr>
<td class="entryTable">  
  <tr class="row1">
<td>
  <form method="get" action="index.php">
   <select name="view">
    <option value="dailyaccident">Daily Accident</option>
    <option  value="public">PUB/PUJ</option>
    <option value="private">Private Vehicle</option>
    <option value="tricycle">Tricyle</option>
    <option value="motorcyle">Motorcylce</option>
    <option value="dailytrafficaccidentcases1"> DP/PI/DPI/Homicide</option>
    </select>
  <select name="month">
    <option value=''>-Select Month-</option>
    <option value='01'>January</option>
    <option value='02'>February</option>
    <option value='03'>March</option>
    <option value='04'>April</option>
    <option value='05'>May</option>
    <option value='06'>June</option>
    <option value='07'>July</option>
    <option value='08'>August</option>
    <option value='09'>September</option>
    <option value='10'>October</option>
    <option value='11'>November</option>
    <option value='12'>December</option>
    </select>
	<select name='year'>
	<? $endyear= date('Y') + 10; for($x=2001;$x<=$endyear;$x++) {?>
	
    <option><? echo $x;?></option>
	<? } ?>
	</select>
	
	<input name="" type="submit" value="View" />
	 </form>
	


<tr>
<td class="entryTable"> 

<tr class="row1">
<td>View Investigator Records:
     <select name="menu2" onchange="MM_jumpMenu2('parent',this,0)">
     <option value="" selected>-- Choose Investigator --</option>
<?php
	echo $CaseList;
?>	 
    </select>
  <tr>
<td>
<td>
</table>

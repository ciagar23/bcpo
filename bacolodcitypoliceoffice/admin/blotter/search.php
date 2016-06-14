<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}


$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;

		
$sql2 = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result2 = mysql_query($sql2);
		$row2 = mysql_fetch_array($result2, MYSQL_ASSOC);	
		$station= $row2['user_station'];
		
		if($station =='TMU')
			{
			$link= 'index.php?view=addtmu';
			$detail= 'detailtmu';
			$modify= 'modifytmu';
			}
			
			else
				{
				
				$link= 'index.php?view=add';
				$detail= 'detail';
				$modify= 'modify';
				}

?> 


<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='?field="+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<body onLoad="document.frmsearch.txtsearch.focus();">
<form action="index.php?view=list" method="get" enctype="multipart/form-data" name="frmsearch" id="frmsearch">
<table border="0" cellspacing="2">

	<tr>
		<td>
		 <select name="field" class="box"  onChange="MM_jumpMenu('parent',this,0)">
			<option <? if ($field=='bl_complaint'){ echo 'selected'; } else {}?> value='bl_ccomplaint'> Complaint </option>
			<option <? if ($field=='bl_clocation'){ echo 'selected'; } else {}?> value='bl_clocation'> Location </option>
			<option <? if ($field=='bl_crime'){ echo 'selected'; } else {}?> value='bl_crime'> Type of Crime </option>
			<option <? if ($field=='bl_date'){ echo 'selected'; } else {}?> value='bl_date'> Blotter date </option>
			<option <? if ($field=='bl_blottedby'){ echo 'selected'; } else {}?> value='bl_blottedby'> Blotted by </option>
			<option <? if ($field=='bl_dateofincident'){ echo 'selected'; } else {}?> value='bl_dateofincident'> Date of Incident </option>
			<option <? if ($field=='bl_cname'){ echo 'selected'; } else {}?> value='bl_cname'> Complainant Name </option>
		 </select>
	 	</td>
	<? if ($field=='bl_date' || $field =='bl_dateofincident' ){ ?>
		<td><input name="search" type="text" class="box" id="txtsearch" size="10" maxlength="100">
		 <script language="JavaScript" src="/bcpo/tigra/calendar3.js"></script>  
		 <a href="javascript:cal11.popup();"><img src="/bcpo/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a></td>
		  <script language="JavaScript">
		 
<!-- // create calendar object(s) just after form tag closed
	 // specify form element as the only parameter (document.forms['formname'].elements['inputname']);
	 // note: you can have as many calendar objects as you need for your application
	 	var cal11 = new calendar3(document.forms['frmsearch'].elements['search']);
	cal11.year_scroll = true;
	cal11.time_comp = false;
	
	//-->
</script> <? } else {?>

		<td><input name="search" type="text" class="box" id="txtsearch" size="40" maxlength="100"></td>
		<? }?>
		
  		<td><input type="submit" value="Search" class="box"></td>
	</tr>
	
</table>

<script type="text/javascript">
function mySubmit() {
// document.edit.save.value = "yes";
document.edit.onsubmit(); // workaround browser bugs.
document.edit.submit();
};
</script>
</form>

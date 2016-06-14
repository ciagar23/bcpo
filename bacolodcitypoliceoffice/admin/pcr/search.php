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
<body onLoad="document.frmsearch.txtsearch.focus();">
<form action="index.php?view=list" method="get" enctype="multipart/form-data" name="frmsearch" id="frmsearch">
<table border="0" cellspacing="2">

	<tr>
		<td>
		 <select name="field" class="box" >
			<option value='bl_ccomplaint'> Complaint </option>
			<option value='bl_clocation'> Location </option>
			<option value='bl_crime'> Type of Crime </option>
			<option value='bl_date'> Blotter date </option>
			<option value='bl_blottedby'> Blotted by </option>
			<option value='bl_dateofincident'> Date of Incident </option>
			<option value='bl_cname'> Complainant Name </option>
		 </select>
	 	</td>
	

		<td><input name="search" type="text" class="box" id="txtsearch" size="40" maxlength="100"></td>
  		<td><input type="image" src='/bcpo/admin/include/design/search.gif' class="box"></td>
   		<td><a href="<? echo $link;?>"><img src='/bcpo/admin/include/design/addblotter.gif' border=0></a></td>
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

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

     <select name="field" class="box" >
				<option value='w_fname'>First Name</option>
				<option value='w_lname'>Last Name</option>
				<option value='w_mname'>Middle Name</option>
				<option value='w_fname'>First Name</option>
				<option value='w_street'>Street</option>
				<option value='w_brgy'>Barangay</option>
				<option value='w_city'>City</option>
     </select></label>
   
	<input name="search" type="text" class="box" id="txtsearch" size="40" maxlength="100">
  	<input type="submit" value="Search" class="box">
  	<script type="text/javascript">
function mySubmit() {
// document.edit.save.value = "yes";
document.edit.onsubmit(); // workaround browser bugs.
document.edit.submit();
};
</script>
</form>

<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

$error = isset($_GET['error']) ? $_GET['error'] : '';
$month = isset($_GET['month']) ? $_GET['month'] : '';
$rowsPerPage = 10;
$sql = "SELECT user_id, user_name, user_regdate, user_station, user_last_login, user_admin, user_fullname
        FROM tbl_user where user_station ='TMU'
		ORDER BY user_name";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');


if ($month == '01')
	{
	$monthof = 'January';
	}
	
else if ($month == '02')
	{
	$monthof = 'February';
	}

else if ($month == '03')
	{
	$monthof = 'March';
	}
	
else if ($month == '04')
	{
	$monthof = 'April';
	}
	
else if ($month == '05')
	{
	$monthof = 'May';
	}
	
else if ($month == '06')
	{
	$monthof = 'June';
	}
	
else if ($month == '07')
	{
	$monthof = 'July';
	}
	
else if ($month == '08')
	{
	$monthof = 'August';
	}
	
else if ($month == '09')
	{
	$monthof = 'September';
	}
	
else if ($month == '10')
	{
	$monthof = 'October';
	}
	
else if ($month == '11')
	{
	$monthof = 'November';
	}
	
else if ($month == '12')
	{
	$monthof = 'December';
	}

else 
	{
	$monthof = '<script> alert("Please Select Date");
				window.location="index.php?view=maintmu"; 
				 </script>';
	}
	
?> 
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
	<tr align="center"  class="entryTable"> 
		<td>Month of: <? echo $monthof;?></td>
		<td>Motorcycle Alone</td>
		<td>Motorcycle vs Pedestrian</td>
		<td>Motorcycle vs MC</td>
		<td>Motorcycle vs TC</td>
		<td>Motorcycle vs PUB/PUJ</td>
		<td>Motorcycle vs Private Vehicle</td>
		<td>Motorcycle vs Trucks</td>
		<td>Total</td>
  	</tr>
<?php
while($row = dbFetchAssoc($result)) 
	{
	extract($row);
	
	if ($i%2) 
		{
		$class = 'row1';
		}
		 
	else 
		{
		$class = 'row2';
		}
	
	$i += 1;

		//Motorcycle Alone
		$n1= date('Y').'-'.$month;
		$sql1 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n1%' and bl_vehicle='mcalone'";
		$result1 = mysql_query($sql1);
		$row1 = mysql_fetch_array($result1);
		$count1 = mysql_num_rows($result1);	
		
		//Motorcycle vs Pedestrian
		$n2= date('Y').'-'.$month;
		$sql2 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n1%' and bl_vehicle='mcpedestrian'";
		$result2 = mysql_query($sql2);
		$row2 = mysql_fetch_array($result2);
		$count2 = mysql_num_rows($result2);	
		
		//Motorcycle vs MC
		$n3= date('Y').'-'.$month;
		$sql3 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n1%' and bl_vehicle='mcMC'";
		$result3 = mysql_query($sql3);
		$row3 = mysql_fetch_array($result3);
		$count3 = mysql_num_rows($result3);	
		
		//Motorcycle vs TC
		$n4= date('Y').'-'.$month;
		$sql4 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n1%' and bl_vehicle='mcTC'";
		$result4 = mysql_query($sql4);
		$row4 = mysql_fetch_array($result4);
		$count4 = mysql_num_rows($result4);	
		
		//Motorcycle vs PUB/PUJ
		$n5= date('Y').'-'.$month;
		$sql5 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n1%' and bl_vehicle='mcPUB'";
		$result5 = mysql_query($sql5);
		$row5 = mysql_fetch_array($result5);
		$count5 = mysql_num_rows($result5);	
		
		//Motorcycle vs Private Vehicle
		$n6= date('Y').'-'.$month;
		$sql6 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n1%' and bl_vehicle='mcprivate'";
		$result6 = mysql_query($sql6);
		$row6 = mysql_fetch_array($result6);
		$count6 = mysql_num_rows($result6);	
		
		//Motorcycle vs Trucks
		$n7= date('Y').'-'.$month;
		$sql7 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n1%' and bl_vehicle='mctruck'";
		$result7 = mysql_query($sql7);
		$row7 = mysql_fetch_array($result7);
		$count7 = mysql_num_rows($result7);		
		
		$totalcount = $count1 + $count2 + $count3 + $count4 + $count5 + $count6 + $count7;
	
?>
	<tr class="<?php echo $class; ?>"> 
		<td><?php echo $user_fullname; ?></td>
   		<td>&nbsp;<? echo $count1;?></td>
    	<td>&nbsp;<? echo $count2;?></td>
		<td>&nbsp;<? echo $count3;?></td>
		<td>&nbsp;<? echo $count4;?></td>
		<td>&nbsp;<? echo $count5;?></td>
		<td>&nbsp;<? echo $count6;?></td>
		<td>&nbsp;<? echo $count7;?></td>
		<td>&nbsp;<font color="red"><? echo $totalcount;?></font></td>
	</tr>
  
<?php
	} // end while
?>

	<tr> 
   		<td colspan="33" align="center" class="next">
			<?php echo $pagingLink; ?>
		 </td>
  	</tr>
	
	<tr> 
   		<td colspan="33" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="BACK" class="box" onClick="window.history.back();"></td>
  	</tr>
	
</table>

<?php
if (!defined('WEB_ROOT')) {
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
		<td> Month: <? echo $monthof;?></td>
		<td> 1 </td>
		<td> 1 </td>
		<td> 1 </td>
		<td> 1 </td>
		<td> 2 </td>
		<td> 2 </td>
		<td> 2 </td>
		<td> 2 </td>
		<td> 3 </td>
		<td> 3 </td>
		<td> 3 </td>
		<td> 3 </td>
		<td> 4 </td>
		<td> 4 </td>
		<td> 4 </td>
		<td> 4 </td>
		<td> 5 </td>
		<td> 5 </td>
		<td> 5 </td>
		<td> 5 </td>
		<td> 6 </td>
		<td> 6 </td>
		<td> 6 </td>
		<td> 6 </td>
		<td> 7 </td>
		<td> 7 </td>
		<td> 7 </td>
		<td> 7 </td>
		<td> Total </td>
	</tr>
  
  	<tr> 
		<td> Year: </td>
		<td> DP </td>
		<td> PI </td>
		<td> DPI </td>
		<td> H </td>
		<td> DP </td>
		<td> PI </td>
		<td> DPI </td>
		<td> H </td>
		<td> DP </td>
		<td> PI </td>
		<td> DPI </td>
		<td> H </td>
		<td> DP </td>
		<td> PI </td>
		<td> DPI </td>
		<td> H </td>
		<td> DP </td>
		<td> PI </td>
		<td> DPI </td>
		<td> H </td>
		<td> DP </td>
		<td> PI </td>
		<td> DPI </td>
		<td> H </td>
		<td> DP </td>
		<td> PI </td>
		<td> DPI </td>
		<td> H </td>
		<td>&nbsp;  </td>
	</tr>
 
<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	if ($i%2) {
		$class = 'row1';
	} else {
		$class = 'row2';
	}
	
	$i += 1;

        // --1--- //
		//1 DP
		$n1= date('Y').'-'.$month.'-01';
		
		$sql1DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n1%' and bl_accident='DP'";
		$result1DP = mysql_query($sql1DP);
		$count1DP = mysql_num_rows($result1DP);	
		
		//1 PI
		$sql1PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n1%' and bl_accident='PI'";
		$result1PI = mysql_query($sql1PI);
		$count1PI = mysql_num_rows($result1PI);
		
		//1 DPI
		$sql1DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n1%' and bl_accident='DPI'";
		$result1DPI = mysql_query($sql1DPI);
		$count1DPI = mysql_num_rows($result1DPI);
		
		//1 H
		$sql1H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n1%' and bl_accident='H'";
		$result1H = mysql_query($sql1H);
		$count1H= mysql_num_rows($result1H);

		  // --2--- //
		//2 DP
		$n2= date('Y').'-'.$month.'-02';
		
		$sql2DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n2%' and bl_accident='DP'";
		$result2DP = mysql_query($sql2DP);
		$count2DP = mysql_num_rows($result2DP);	
		
		//2 PI
		$sql2PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n2%' and bl_accident='PI'";
		$result2PI = mysql_query($sql2PI);
		$count2PI = mysql_num_rows($result2PI);
		
		//2 DPI
		$sql2DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n2%' and bl_accident='DPI'";
		$result2DPI = mysql_query($sql2DPI);
		$count2DPI = mysql_num_rows($result2DPI);
		
		//2 H
		$sql2H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n2%' and bl_accident='H'";
		$result2H = mysql_query($sql2H);
		$count2H= mysql_num_rows($result2H);
		
		  // --3--- //
		//3 DP
		$n3= date('Y').'-'.$month.'-03';
		
		$sql3DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n3%' and bl_accident='DP'";
		$result3DP = mysql_query($sql3DP);
		$count3DP = mysql_num_rows($result3DP);	
		
		//3 PI
		$sql3PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n3%' and bl_accident='PI'";
		$result3PI = mysql_query($sql3PI);
		$count3PI = mysql_num_rows($result3PI);
		
		//3 DPI
		$sql3DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n3%' and bl_accident='DPI'";
		$result3DPI = mysql_query($sql3DPI);
		$count3DPI = mysql_num_rows($result3DPI);
		
		//3 H
		$sql3H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n3%' and bl_accident='H'";
		$result3H = mysql_query($sql3H);
		$count3H= mysql_num_rows($result3H);
		
		// --4--- //
		//4 DP
		$n4= date('Y').'-'.$month.'-04';
		
		$sql4DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n4%' and bl_accident='DP'";
		$result4DP = mysql_query($sql4DP);
		$count4DP = mysql_num_rows($result4DP);	
		
		//4 PI
		$sql4PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n4%' and bl_accident='PI'";
		$result4PI = mysql_query($sql4PI);
		$count4PI = mysql_num_rows($result4PI);
		
		//4 DPI
		$sql4DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n4%' and bl_accident='DPI'";
		$result4DPI = mysql_query($sql4DPI);
		$count4DPI = mysql_num_rows($result4DPI);
		
		//4 H
		$sql4H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n4%' and bl_accident='H'";
		$result4H = mysql_query($sql4H);
		$count4H= mysql_num_rows($result4H);
		
		// --5--- //
		//5 DP
		$n5= date('Y').'-'.$month.'-05';
		
		$sql5DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n5%' and bl_accident='DP'";
		$result5DP = mysql_query($sql5DP);
		$count5DP = mysql_num_rows($result5DP);	
		
		//5 PI
		$sql5PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n5%' and bl_accident='PI'";
		$result5PI = mysql_query($sql5PI);
		$count5PI = mysql_num_rows($result5PI);
		
		//5 DPI
		$sql5DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n5%' and bl_accident='DPI'";
		$result5DPI = mysql_query($sql5DPI);
		$count5DPI = mysql_num_rows($result5DPI);
		
		//5 H
		$sql5H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n5%' and bl_accident='H'";
		$result5H = mysql_query($sql5H);
		$count5H= mysql_num_rows($result5H);
		
		// --6--- //
		//6 DP
		$n6= date('Y').'-'.$month.'-06';
		
		$sql6DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n6%' and bl_accident='DP'";
		$result6DP = mysql_query($sql6DP);
		$count6DP = mysql_num_rows($result6DP);	
		
		//6 PI
		$sql6PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n6%' and bl_accident='PI'";
		$result6PI = mysql_query($sql6PI);
		$count6PI = mysql_num_rows($result6PI);
		
		//6 DPI
		$sql6DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n6%' and bl_accident='DPI'";
		$result6DPI = mysql_query($sql6DPI);
		$count6DPI = mysql_num_rows($result6DPI);
		
		//6 H
		$sql6H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n6%' and bl_accident='H'";
		$result6H = mysql_query($sql6H);
		$count6H= mysql_num_rows($result6H);

		// --7--- //
		//7 DP
		$n7= date('Y').'-'.$month.'-07';
		
		$sql7DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n7%' and bl_accident='DP'";
		$result7DP = mysql_query($sql7DP);
		$count7DP = mysql_num_rows($result7DP);	
		
		//7 PI
		$sql7PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n7%' and bl_accident='PI'";
		$result7PI = mysql_query($sql7PI);
		$count7PI = mysql_num_rows($result7PI);
		
		//7 DPI
		$sql7DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n7%' and bl_accident='DPI'";
		$result7DPI = mysql_query($sql7DPI);
		$count7DPI = mysql_num_rows($result7DPI);
		
		//7 H
		$sql7H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n7%' and bl_accident='H'";
		$result7H = mysql_query($sql7H);
		$count7H= mysql_num_rows($result7H);
		
	
	
	$totalcount = $count1DP + $count1PI + $count1DPI + $count1H + 
				  $count2DP + $count2PI + $count2DPI + $count2H + 
				  $count3DP + $count3PI + $count3DPI + $count3H + 
				  $count4DP + $count4PI + $count4DPI + $count4H + 
				  $count5DP + $count5PI + $count5DPI + $count5H + 
				  $count6DP + $count6PI + $count6DPI + $count6H + 
				  $count7DP + $count7PI + $count7DPI + $count7H;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $user_fullname; ?></td>
   <td>&nbsp;<? echo $count1DP;?></td>
   <td>&nbsp;<? echo $count1PI;?></td>
   <td>&nbsp;<? echo $count1DPI;?></td>
   <td>&nbsp;<? echo $count1H;?></td>
   <td>&nbsp;<? echo $count2DP;?></td>
   <td>&nbsp;<? echo $count2PI;?></td>
   <td>&nbsp;<? echo $count2DPI;?></td>
   <td>&nbsp;<? echo $count2H;?></td>
   <td>&nbsp;<? echo $count3DP;?></td>
   <td>&nbsp;<? echo $count3PI;?></td>
   <td>&nbsp;<? echo $count3DPI;?></td>
   <td>&nbsp;<? echo $count3H;?></td>
   <td>&nbsp;<? echo $count4DP;?></td>
   <td>&nbsp;<? echo $count4PI;?></td>
   <td>&nbsp;<? echo $count4DPI;?></td>
   <td>&nbsp;<? echo $count4H;?></td>
   <td>&nbsp;<? echo $count5DP;?></td>
   <td>&nbsp;<? echo $count5PI;?></td>
   <td>&nbsp;<? echo $count5DPI;?></td>
   <td>&nbsp;<? echo $count5H;?></td>
   <td>&nbsp;<? echo $count6DP;?></td>
   <td>&nbsp;<? echo $count6PI;?></td>
   <td>&nbsp;<? echo $count6DPI;?></td>
   <td>&nbsp;<? echo $count6H;?></td>
   <td>&nbsp;<? echo $count7DP;?></td>
   <td>&nbsp;<? echo $count7PI;?></td>
   <td>&nbsp;<? echo $count7DPI;?></td>
   <td>&nbsp;<? echo $count7H;?></td>
    <td>&nbsp;<font color="red"><? echo $totalcount;?></font></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="33" align="center" class="next">
   <?php 
echo $pagingLink;
   ?></td>
  </tr>
  <tr> 
   <td colspan="33" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="Back" class="box" onClick="window.history.back();"></td>
  </tr>
</table>
<p>Page <a href='index.php?view=dailytrafficaccidentcases1&month=<? echo $month;?>'> 1 </a>, 
		<a href='index.php?view=dailytrafficaccidentcases2&month=<? echo $month;?>'> 2 </a>, 
		<a href='index.php?view=dailytrafficaccidentcases3&month=<? echo $month;?>'> 3 </a>, 
		<a href='index.php?view=dailytrafficaccidentcases4&month=<? echo $month;?>'> 4 </a>,
		<a href='index.php?view=dailytrafficaccidentcases5&month=<? echo $month;?>'> 5 </a></p>


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
		<td> 8 </td>
		<td> 8 </td>
		<td> 8 </td>
		<td> 8 </td>
		<td> 9 </td>
		<td> 9 </td>
		<td> 9 </td>
		<td> 9 </td>
		<td> 10 </td>
		<td> 10 </td>
		<td> 10 </td>
		<td> 10 </td>
		<td> 11 </td>
		<td> 11 </td>
		<td> 11 </td>
		<td> 11 </td>
		<td> 12 </td>
		<td> 12 </td>
		<td> 12 </td>
		<td> 12 </td>
		<td> 13 </td>
		<td> 13 </td>
		<td> 13 </td>
		<td> 13 </td>
		<td> 14 </td>
		<td> 14 </td>
		<td> 14 </td>
		<td> 14 </td>
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
	
		// --8--- //
		//8 DP
		$n8= date('Y').'-'.$month.'-08';
		$sql8DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n8%' and bl_accident='DP'";
		$result8DP = mysql_query($sql8DP);
		$count8DP = mysql_num_rows($result8DP);	
		
		//8 PI
		$sql8PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n8%' and bl_accident='PI'";
		$result8PI = mysql_query($sql8PI);
		$count8PI = mysql_num_rows($result8PI);
		
		//8 DPI
		$sql8DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n8%' and bl_accident='DPI'";
		$result8DPI = mysql_query($sql8DPI);
		$count8DPI = mysql_num_rows($result8DPI);
		
		//8 H
		$sql8H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n8%' and bl_accident='H'";
		$result8H = mysql_query($sql8H);
		$count8H= mysql_num_rows($result8H);
  

		// --9--- //
		//9 DP
		$n9= date('Y').'-'.$month.'-09';
		$sql9DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n9%' and bl_accident='DP'";
		$result9DP = mysql_query($sql9DP);
		$count9DP = mysql_num_rows($result9DP);	
		
		//9 PI
		$sql9PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n9%' and bl_accident='PI'";
		$result9PI = mysql_query($sql9PI);
		$count9PI = mysql_num_rows($result9PI);
		
		//9 DPI
		$sql9DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n9%' and bl_accident='DPI'";
		$result9DPI = mysql_query($sql9DPI);
		$count9DPI = mysql_num_rows($result9DPI);
		
		//9 H
		$sql9H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n9%' and bl_accident='H'";
		$result9H = mysql_query($sql9H);
		$count9H= mysql_num_rows($result9H);
		
		// --10--- //
		//10 DP
		$n10= date('Y').'-'.$month.'-010';
		$sql10DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n10%' and bl_accident='DP'";
		$result10DP = mysql_query($sql10DP);
		$count10DP = mysql_num_rows($result10DP);	
		
		//10 PI
		$sql10PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n10%' and bl_accident='PI'";
		$result10PI = mysql_query($sql10PI);
		$count10PI = mysql_num_rows($result10PI);
		
		//10 DPI
		$sql10DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n10%' and bl_accident='DPI'";
		$result10DPI = mysql_query($sql10DPI);
		$count10DPI = mysql_num_rows($result10DPI);
		
		//10 H
		$sql10H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n10%' and bl_accident='H'";
		$result10H = mysql_query($sql10H);
		$count10H= mysql_num_rows($result10H);
		
		// --11--- //
		//11 DP
		$n11= date('Y').'-'.$month.'-011';
		$sql11DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n11%' and bl_accident='DP'";
		$result11DP = mysql_query($sql11DP);
		$count11DP = mysql_num_rows($result11DP);	
		
		//11 PI
		$sql11PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n11%' and bl_accident='PI'";
		$result11PI = mysql_query($sql11PI);
		$count11PI = mysql_num_rows($result11PI);
		
		//11 DPI
		$sql11DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n11%' and bl_accident='DPI'";
		$result11DPI = mysql_query($sql11DPI);
		$count11DPI = mysql_num_rows($result11DPI);
		
		//11 H
		$sql11H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n11%' and bl_accident='H'";
		$result11H = mysql_query($sql11H);
		$count11H= mysql_num_rows($result11H);
		
		// --12--- //
		//12 DP
		$n12= date('Y').'-'.$month.'-012';
		$sql12DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n12%' and bl_accident='DP'";
		$result12DP = mysql_query($sql12DP);
		$count12DP = mysql_num_rows($result12DP);	
		
		//12 PI
		$sql12PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n12%' and bl_accident='PI'";
		$result12PI = mysql_query($sql12PI);
		$count12PI = mysql_num_rows($result12PI);
		
		//12 DPI
		$sql12DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n12%' and bl_accident='DPI'";
		$result12DPI = mysql_query($sql12DPI);
		$count12DPI = mysql_num_rows($result12DPI);
		
		//12 H
		$sql12H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n12%' and bl_accident='H'";
		$result12H = mysql_query($sql12H);
		$count12H= mysql_num_rows($result12H);
		
		// --13--- //
		//13 DP
		$n13= date('Y').'-'.$month.'-013';
		$sql13DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n13%' and bl_accident='DP'";
		$result13DP = mysql_query($sql13DP);
		$count13DP = mysql_num_rows($result13DP);	
		
		//13 PI
		$sql13PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n13%' and bl_accident='PI'";
		$result13PI = mysql_query($sql13PI);
		$count13PI = mysql_num_rows($result13PI);
		
		//13 DPI
		$sql13DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n13%' and bl_accident='DPI'";
		$result13DPI = mysql_query($sql13DPI);
		$count13DPI = mysql_num_rows($result13DPI);
		
		//13 H
		$sql13H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n13%' and bl_accident='H'";
		$result13H = mysql_query($sql13H);
		$count13H= mysql_num_rows($result13H);

		// --14--- //
		//14 DP
		$n14= date('Y').'-'.$month.'-014';
		$sql14DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n14%' and bl_accident='DP'";
		$result14DP = mysql_query($sql14DP);
		$count14DP = mysql_num_rows($result14DP);	
		
		//14 PI
		$sql14PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n14%' and bl_accident='PI'";
		$result14PI = mysql_query($sql14PI);
		$count14PI = mysql_num_rows($result14PI);
		
		//14 DPI
		$sql14DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n14%' and bl_accident='DPI'";
		$result14DPI = mysql_query($sql14DPI);
		$count14DPI = mysql_num_rows($result14DPI);
		
		//14 H
		$sql14H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n14%' and bl_accident='H'";
		$result14H = mysql_query($sql14H);
		$count14H= mysql_num_rows($result14H);
		
	
	
	$totalcount = $count8DP + $count8PI + $count8DPI + $count8H + 
				  $count9DP + $count9PI + $count9DPI + $count9H + 
				  $count10DP + $count10PI + $count10DPI + $count10H + 
				  $count11DP + $count11PI + $count11DPI + $count11H + 
				  $count12DP + $count12PI + $count12DPI + $count12H + 
				  $count13DP + $count13PI + $count13DPI + $count13H + 
				  $count14DP + $count14PI + $count14DPI + $count14H;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $user_fullname; ?></td>
   <td>&nbsp;<? echo $count8DP;?></td>
   <td>&nbsp;<? echo $count8PI;?></td>
   <td>&nbsp;<? echo $count8DPI;?></td>
   <td>&nbsp;<? echo $count8H;?></td>
   <td>&nbsp;<? echo $count9DP;?></td>
   <td>&nbsp;<? echo $count9PI;?></td>
   <td>&nbsp;<? echo $count9DPI;?></td>
   <td>&nbsp;<? echo $count9H;?></td>
   <td>&nbsp;<? echo $count10DP;?></td>
   <td>&nbsp;<? echo $count10PI;?></td>
   <td>&nbsp;<? echo $count10DPI;?></td>
   <td>&nbsp;<? echo $count10H;?></td>
   <td>&nbsp;<? echo $count11DP;?></td>
   <td>&nbsp;<? echo $count11PI;?></td>
   <td>&nbsp;<? echo $count11DPI;?></td>
   <td>&nbsp;<? echo $count11H;?></td>
   <td>&nbsp;<? echo $count12DP;?></td>
   <td>&nbsp;<? echo $count12PI;?></td>
   <td>&nbsp;<? echo $count12DPI;?></td>
   <td>&nbsp;<? echo $count12H;?></td>
   <td>&nbsp;<? echo $count13DP;?></td>
   <td>&nbsp;<? echo $count13PI;?></td>
   <td>&nbsp;<? echo $count13DPI;?></td>
   <td>&nbsp;<? echo $count13H;?></td>
   <td>&nbsp;<? echo $count14DP;?></td>
   <td>&nbsp;<? echo $count14PI;?></td>
   <td>&nbsp;<? echo $count14DPI;?></td>
   <td>&nbsp;<? echo $count14H;?></td>
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


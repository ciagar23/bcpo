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
		<td> 29 </td>
		<td> 29 </td>
		<td> 29 </td>
		<td> 29 </td>
		<td> 30 </td>
		<td> 30 </td>
		<td> 30 </td>
		<td> 30 </td>
		<td> 31 </td>
		<td> 31 </td>
		<td> 31 </td>
		<td> 31 </td>
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
	
		// --29--- //
		//29 DP
		$n29= date('Y').'-'.$month.'-29';
		$sql29DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n29%' and bl_accident='DP'";
		$result29DP = mysql_query($sql29DP);
		$count29DP = mysql_num_rows($result29DP);	
		
		//29 PI
		$sql29PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n29%' and bl_accident='PI'";
		$result29PI = mysql_query($sql29PI);
		$count29PI = mysql_num_rows($result29PI);
		
		//29 DPI
		$sql29DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n29%' and bl_accident='DPI'";
		$result29DPI = mysql_query($sql29DPI);
		$count29DPI = mysql_num_rows($result29DPI);
		
		//29 H
		$sql29H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n29%' and bl_accident='H'";
		$result29H = mysql_query($sql29H);
		$count29H= mysql_num_rows($result29H);
		
		// --30--- //
		//30 DP
		$n30= date('Y').'-'.$month.'-30';
		$sql30DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n30%' and bl_accident='DP'";
		$result30DP = mysql_query($sql30DP);
		$count30DP = mysql_num_rows($result30DP);	
		
		//30 PI
		$sql30PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n30%' and bl_accident='PI'";
		$result30PI = mysql_query($sql30PI);
		$count30PI = mysql_num_rows($result30PI);
		
		//30 DPI
		$sql30DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n30%' and bl_accident='DPI'";
		$result30DPI = mysql_query($sql30DPI);
		$count30DPI = mysql_num_rows($result30DPI);
		
		//30 H
		$sql30H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n30%' and bl_accident='H'";
		$result30H = mysql_query($sql30H);
		$count30H= mysql_num_rows($result30H);
		
		// --31--- //
		//31 DP
		$n31= date('Y').'-'.$month.'-31';
		$sql31DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n31%' and bl_accident='DP'";
		$result31DP = mysql_query($sql31DP);
		$count31DP = mysql_num_rows($result31DP);	
		
		//31 PI
		$sql31PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n31%' and bl_accident='PI'";
		$result31PI = mysql_query($sql31PI);
		$count31PI = mysql_num_rows($result31PI);
		
		//31 DPI
		$sql31DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n31%' and bl_accident='DPI'";
		$result31DPI = mysql_query($sql31DPI);
		$count31DPI = mysql_num_rows($result31DPI);
		
		//31 H
		$sql31H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n31%' and bl_accident='H'";
		$result31H = mysql_query($sql31H);
		$count31H= mysql_num_rows($result31H);
  

		
		
	
	
	$totalcount = $count29DP + $count29PI + $count29DPI + $count29H + 
				  $count30DP + $count30PI + $count30DPI + $count30H +
				  $count31DP + $count31PI + $count31DPI + $count31H;
				 
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $user_fullname; ?></td>
   <td>&nbsp;<? echo $count29DP;?></td>
   <td>&nbsp;<? echo $count29PI;?></td>
   <td>&nbsp;<? echo $count29DPI;?></td>
   <td>&nbsp;<? echo $count29H;?></td>
   <td>&nbsp;<? echo $count30DP;?></td>
   <td>&nbsp;<? echo $count30PI;?></td>
   <td>&nbsp;<? echo $count30DPI;?></td>
   <td>&nbsp;<? echo $count30H;?></td>
   <td>&nbsp;<? echo $count31DP;?></td>
   <td>&nbsp;<? echo $count31PI;?></td>
   <td>&nbsp;<? echo $count31DPI;?></td>
   <td>&nbsp;<? echo $count31H;?></td>
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


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
		<td> 15 </td>
		<td> 15 </td>
		<td> 15 </td>
		<td> 15 </td>
		<td> 16 </td>
		<td> 16 </td>
		<td> 16 </td>
		<td> 16 </td>
		<td> 17 </td>
		<td> 17 </td>
		<td> 17 </td>
		<td> 17 </td>
		<td> 18 </td>
		<td> 18 </td>
		<td> 18 </td>
		<td> 18 </td>
		<td> 19 </td>
		<td> 19 </td>
		<td> 19 </td>
		<td> 19 </td>
		<td> 20 </td>
		<td> 20 </td>
		<td> 20 </td>
		<td> 20 </td>
		<td> 21 </td>
		<td> 21 </td>
		<td> 21 </td>
		<td> 21 </td>
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


        // --15--- //
		//15 DP
		$n15= date('Y').'-'.$month.'-15';
		
		$sql15DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n15%' and bl_accident='DP'";
		$result15DP = mysql_query($sql15DP);
		$count15DP = mysql_num_rows($result15DP);	
		
		//15 PI
		$sql15PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n15%' and bl_accident='PI'";
		$result15PI = mysql_query($sql15PI);
		$count15PI = mysql_num_rows($result15PI);
		
		//15 DPI
		$sql15DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n15%' and bl_accident='DPI'";
		$result15DPI = mysql_query($sql15DPI);
		$count15DPI = mysql_num_rows($result15DPI);
		
		//15 H
		$sql15H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n15%' and bl_accident='H'";
		$result15H = mysql_query($sql15H);
		$count15H= mysql_num_rows($result15H);


        // --16--- //
		//16 DP
		$n16= date('Y').'-'.$month.'-16';
		
		$sql16DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n16%' and bl_accident='DP'";
		$result16DP = mysql_query($sql16DP);
		$count16DP = mysql_num_rows($result16DP);	
		
		//16 PI
		$sql16PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n16%' and bl_accident='PI'";
		$result16PI = mysql_query($sql16PI);
		$count16PI = mysql_num_rows($result16PI);
		
		//16 DPI
		$sql16DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n16%' and bl_accident='DPI'";
		$result16DPI = mysql_query($sql16DPI);
		$count16DPI = mysql_num_rows($result16DPI);
		
		//16 H
		$sql16H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n16%' and bl_accident='H'";
		$result16H = mysql_query($sql16H);
		$count16H= mysql_num_rows($result16H);


        // --17--- //
		//17 DP
		$n17= date('Y').'-'.$month.'-17';
		
		$sql17DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n17%' and bl_accident='DP'";
		$result17DP = mysql_query($sql17DP);
		$count17DP = mysql_num_rows($result17DP);	
		
		//17 PI
		$sql17PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n17%' and bl_accident='PI'";
		$result17PI = mysql_query($sql17PI);
		$count17PI = mysql_num_rows($result17PI);
		
		//17 DPI
		$sql17DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n17%' and bl_accident='DPI'";
		$result17DPI = mysql_query($sql17DPI);
		$count17DPI = mysql_num_rows($result17DPI);
		
		//17 H
		$sql17H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n17%' and bl_accident='H'";
		$result17H = mysql_query($sql17H);
		$count17H= mysql_num_rows($result17H);


        // --18--- //
		//18 DP
		$n18= date('Y').'-'.$month.'-18';
		
		$sql18DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n18%' and bl_accident='DP'";
		$result18DP = mysql_query($sql18DP);
		$count18DP = mysql_num_rows($result18DP);	
		
		//18 PI
		$sql18PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n18%' and bl_accident='PI'";
		$result18PI = mysql_query($sql18PI);
		$count18PI = mysql_num_rows($result18PI);
		
		//18 DPI
		$sql18DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n18%' and bl_accident='DPI'";
		$result18DPI = mysql_query($sql18DPI);
		$count18DPI = mysql_num_rows($result18DPI);
		
		//18 H
		$sql18H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n18%' and bl_accident='H'";
		$result18H = mysql_query($sql18H);
		$count18H= mysql_num_rows($result18H);


        // --19--- //
		//19 DP
		$n19= date('Y').'-'.$month.'-19';
		
		$sql19DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n19%' and bl_accident='DP'";
		$result19DP = mysql_query($sql19DP);
		$count19DP = mysql_num_rows($result19DP);	
		
		//19 PI
		$sql19PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n19%' and bl_accident='PI'";
		$result19PI = mysql_query($sql19PI);
		$count19PI = mysql_num_rows($result19PI);
		
		//19 DPI
		$sql19DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n19%' and bl_accident='DPI'";
		$result19DPI = mysql_query($sql19DPI);
		$count19DPI = mysql_num_rows($result19DPI);
		
		//19 H
		$sql19H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n19%' and bl_accident='H'";
		$result19H = mysql_query($sql19H);
		$count19H= mysql_num_rows($result19H);


        // --20--- //
		//20 DP
		$n20= date('Y').'-'.$month.'-20';
		
		$sql20DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n20%' and bl_accident='DP'";
		$result20DP = mysql_query($sql20DP);
		$count20DP = mysql_num_rows($result20DP);	
		
		//20 PI
		$sql20PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n20%' and bl_accident='PI'";
		$result20PI = mysql_query($sql20PI);
		$count20PI = mysql_num_rows($result20PI);
		
		//20 DPI
		$sql20DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n20%' and bl_accident='DPI'";
		$result20DPI = mysql_query($sql20DPI);
		$count20DPI = mysql_num_rows($result20DPI);
		
		//20 H
		$sql20H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n20%' and bl_accident='H'";
		$result20H = mysql_query($sql20H);
		$count20H= mysql_num_rows($result20H);


        // --21--- //
		//21 DP
		$n21= date('Y').'-'.$month.'-21';
		
		$sql21DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n21%' and bl_accident='DP'";
		$result21DP = mysql_query($sql21DP);
		$count21DP = mysql_num_rows($result21DP);	
		
		//21 PI
		$sql21PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n21%' and bl_accident='PI'";
		$result21PI = mysql_query($sql21PI);
		$count21PI = mysql_num_rows($result21PI);
		
		//21 DPI
		$sql21DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n21%' and bl_accident='DPI'";
		$result21DPI = mysql_query($sql21DPI);
		$count21DPI = mysql_num_rows($result21DPI);
		
		//21 H
		$sql21H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n21%' and bl_accident='H'";
		$result21H = mysql_query($sql21H);
		$count21H= mysql_num_rows($result21H);

		
		
	
	
	$totalcount =    $count15DP + $count15PI + $count15DPI + $count15H + 
					 $count16DP + $count16PI + $count16DPI + $count16H + 
					 $count17DP + $count17PI + $count17DPI + $count17H + 
					 $count18DP + $count18PI + $count18DPI + $count18H + 
					 $count19DP + $count19PI + $count19DPI + $count19H + 
					 $count20DP + $count20PI + $count20DPI + $count20H + 
					 $count21DP + $count21PI + $count21DPI + $count21H;
					 ?>
	
	
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $user_fullname; ?></td>
   <td>&nbsp;<? echo $count15DP;?></td>
   <td>&nbsp;<? echo $count15PI;?></td>
   <td>&nbsp;<? echo $count15DPI;?></td>
   <td>&nbsp;<? echo $count15H;?></td>
   <td>&nbsp;<? echo $count16DP;?></td>
   <td>&nbsp;<? echo $count16PI;?></td>
   <td>&nbsp;<? echo $count16DPI;?></td>
   <td>&nbsp;<? echo $count16H;?></td>
   <td>&nbsp;<? echo $count17DP;?></td>
   <td>&nbsp;<? echo $count17PI;?></td>
   <td>&nbsp;<? echo $count17DPI;?></td>
   <td>&nbsp;<? echo $count17H;?></td>
   <td>&nbsp;<? echo $count18DP;?></td>
   <td>&nbsp;<? echo $count18PI;?></td>
   <td>&nbsp;<? echo $count18DPI;?></td>
   <td>&nbsp;<? echo $count18H;?></td>
   <td>&nbsp;<? echo $count19DP;?></td>
   <td>&nbsp;<? echo $count19PI;?></td>
   <td>&nbsp;<? echo $count19DPI;?></td>
   <td>&nbsp;<? echo $count19H;?></td>
   <td>&nbsp;<? echo $count20DP;?></td>
   <td>&nbsp;<? echo $count20PI;?></td>
   <td>&nbsp;<? echo $count20DPI;?></td>
   <td>&nbsp;<? echo $count20H;?></td>
   <td>&nbsp;<? echo $count21DP;?></td>
   <td>&nbsp;<? echo $count21PI;?></td>
   <td>&nbsp;<? echo $count21DPI;?></td>
   <td>&nbsp;<? echo $count21H;?></td>
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


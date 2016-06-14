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
		<td> 22 </td>
		<td> 22 </td>
		<td> 22 </td>
		<td> 22 </td>
		<td> 23 </td>
		<td> 23 </td>
		<td> 23 </td>
		<td> 23 </td>
		<td> 24 </td>
		<td> 24 </td>
		<td> 24 </td>
		<td> 24 </td>
		<td> 25 </td>
		<td> 25 </td>
		<td> 25 </td>
		<td> 25 </td>
		<td> 26 </td>
		<td> 26 </td>
		<td> 26 </td>
		<td> 26 </td>
		<td> 27 </td>
		<td> 27 </td>
		<td> 27 </td>
		<td> 27 </td>
		<td> 28 </td>
		<td> 28 </td>
		<td> 28 </td>
		<td> 28 </td>
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

        // --22--- //
		//22 DP
		$n22= date('Y').'-'.$month.'-22';
		$sql22DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n22%' and bl_accident='DP'";
		$result22DP = mysql_query($sql22DP);
		$count22DP = mysql_num_rows($result22DP);	
		
		//22 PI
		$sql22PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n22%' and bl_accident='PI'";
		$result22PI = mysql_query($sql22PI);
		$count22PI = mysql_num_rows($result22PI);
		
		//22 DPI
		$sql22DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n22%' and bl_accident='DPI'";
		$result22DPI = mysql_query($sql22DPI);
		$count22DPI = mysql_num_rows($result22DPI);
		
		//22 H
		$sql22H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n22%' and bl_accident='H'";
		$result22H = mysql_query($sql22H);
		$count22H= mysql_num_rows($result22H);
		
		// --23--- //
		//1 DP
		$n23= date('Y').'-'.$month.'-23';
		$sql23DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n23%' and bl_accident='DP'";
		$result23DP = mysql_query($sql23DP);
		$count23DP = mysql_num_rows($result23DP);	
		
		//23 PI
		$sql23PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n23%' and bl_accident='PI'";
		$result23PI = mysql_query($sql23PI);
		$count23PI = mysql_num_rows($result23PI);
		
		//23 DPI
		$sql23DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n23%' and bl_accident='DPI'";
		$result23DPI = mysql_query($sql23DPI);
		$count23DPI = mysql_num_rows($result23DPI);
		
		//23 H
		$sql23H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n23%' and bl_accident='H'";
		$result23H = mysql_query($sql23H);
		$count23H= mysql_num_rows($result23H);
		
		// --24--- //
		//24 DP
		$n24= date('Y').'-'.$month.'-24';
		$sql24DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n24%' and bl_accident='DP'";
		$result24DP = mysql_query($sql24DP);
		$count24DP = mysql_num_rows($result24DP);	
		
		//24 PI
		$sql24PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n24%' and bl_accident='PI'";
		$result24PI = mysql_query($sql24PI);
		$count24PI = mysql_num_rows($result24PI);
		
		//24 DPI
		$sql24DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n24%' and bl_accident='DPI'";
		$result24DPI = mysql_query($sql24DPI);
		$count24DPI = mysql_num_rows($result24DPI);
		
		//24 H
		$sql24H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n24%' and bl_accident='H'";
		$result24H = mysql_query($sql24H);
		$count24H= mysql_num_rows($result24H);
		
		// --25--- //
		//25 DP
		$n25= date('Y').'-'.$month.'-25';
		$sql25DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n25%' and bl_accident='DP'";
		$result25DP = mysql_query($sql25DP);
		$count25DP = mysql_num_rows($result25DP);	
		
		//25 PI
		$sql25PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n25%' and bl_accident='PI'";
		$result25PI = mysql_query($sql25PI);
		$count25PI = mysql_num_rows($result25PI);
		
		//25 DPI
		$sql25DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n25%' and bl_accident='DPI'";
		$result25DPI = mysql_query($sql25DPI);
		$count25DPI = mysql_num_rows($result25DPI);
		
		//25 H
		$sql25H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n25%' and bl_accident='H'";
		$result25H = mysql_query($sql25H);
		$count25H= mysql_num_rows($result25H);
		
		// --26--- //
		//26 DP
		$n26= date('Y').'-'.$month.'-26';
		$sql26DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n26%' and bl_accident='DP'";
		$result26DP = mysql_query($sql26DP);
		$count26DP = mysql_num_rows($result26DP);	
		
		//26 PI
		$sql26PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n26%' and bl_accident='PI'";
		$result26PI = mysql_query($sql26PI);
		$count26PI = mysql_num_rows($result26PI);
		
		//26 DPI
		$sql26DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n26%' and bl_accident='DPI'";
		$result26DPI = mysql_query($sql26DPI);
		$count26DPI = mysql_num_rows($result26DPI);
		
		//26 H
		$sql26H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n26%' and bl_accident='H'";
		$result26H = mysql_query($sql26H);
		$count26H= mysql_num_rows($result26H);
		
		// --27--- //
		//27 DP
		$n27= date('Y').'-'.$month.'-27';
		$sql27DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n27%' and bl_accident='DP'";
		$result27DP = mysql_query($sql27DP);
		$count27DP = mysql_num_rows($result27DP);	
		
		//27 PI
		$sql27PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n27%' and bl_accident='PI'";
		$result27PI = mysql_query($sql27PI);
		$count27PI = mysql_num_rows($result27PI);
		
		//27 DPI
		$sql27DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n27%' and bl_accident='DPI'";
		$result27DPI = mysql_query($sql27DPI);
		$count27DPI = mysql_num_rows($result27DPI);
		
		//27 H
		$sql27H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n27%' and bl_accident='H'";
		$result27H = mysql_query($sql27H);
		$count27H= mysql_num_rows($result27H);
		
		// --28--- //
		//28 DP
		$n28= date('Y').'-'.$month.'-28';
		$sql28DP = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n28%' and bl_accident='DP'";
		$result28DP = mysql_query($sql28DP);
		$count28DP = mysql_num_rows($result28DP);	
		
		//28 PI
		$sql28PI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n28%' and bl_accident='PI'";
		$result28PI = mysql_query($sql28PI);
		$count28PI = mysql_num_rows($result28PI);
		
		//28 DPI
		$sql28DPI = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n28%' and bl_accident='DPI'";
		$result28DPI = mysql_query($sql28DPI);
		$count28DPI = mysql_num_rows($result28DPI);
		
		//28 H
		$sql28H = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n28%' and bl_accident='H'";
		$result28H = mysql_query($sql28H);
		$count28H= mysql_num_rows($result28H);

		  
		
	
	
	$totalcount = $count22DP + $count22PI + $count22DPI + $count22H + 
				  $count23DP + $count23PI + $count23DPI + $count23H + 
				  $count24DP + $count24PI + $count24DPI + $count24H + 
				  $count25DP + $count25PI + $count25DPI + $count25H + 
				  $count26DP + $count26PI + $count26DPI + $count26H + 
				  $count27DP + $count27PI + $count27DPI + $count27H + 
				  $count28DP + $count28PI + $count28DPI + $count28H ;
				  
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $user_fullname; ?></td>
   <td>&nbsp;<? echo $count22DP;?></td>
   <td>&nbsp;<? echo $count22PI;?></td>
   <td>&nbsp;<? echo $count22DPI;?></td>
   <td>&nbsp;<? echo $count22H;?></td>
   <td>&nbsp;<? echo $count23DP;?></td>
   <td>&nbsp;<? echo $count23PI;?></td>
   <td>&nbsp;<? echo $count23DPI;?></td>
   <td>&nbsp;<? echo $count23H;?></td>
   <td>&nbsp;<? echo $count24DP;?></td>
   <td>&nbsp;<? echo $count24PI;?></td>
   <td>&nbsp;<? echo $count24DPI;?></td>
   <td>&nbsp;<? echo $count24H;?></td>
   <td>&nbsp;<? echo $count25DP;?></td>
   <td>&nbsp;<? echo $count25PI;?></td>
   <td>&nbsp;<? echo $count25DPI;?></td>
   <td>&nbsp;<? echo $count25H;?></td>
   <td>&nbsp;<? echo $count26DP;?></td>
   <td>&nbsp;<? echo $count26PI;?></td>
   <td>&nbsp;<? echo $count26DPI;?></td>
   <td>&nbsp;<? echo $count26H;?></td>
   <td>&nbsp;<? echo $count27DP;?></td>
   <td>&nbsp;<? echo $count27PI;?></td>
   <td>&nbsp;<? echo $count27DPI;?></td>
   <td>&nbsp;<? echo $count27H;?></td>
   <td>&nbsp;<? echo $count28DP;?></td>
   <td>&nbsp;<? echo $count28PI;?></td>
   <td>&nbsp;<? echo $count28DPI;?></td>
   <td>&nbsp;<? echo $count28H;?></td>
  
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


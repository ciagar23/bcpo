<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$error = isset($_GET['error']) ? $_GET['error'] : '';
$month = isset($_GET['month']) ? $_GET['month'] : '';
$year = isset($_GET['year']) ? $_GET['year'] : '';
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
  	<td>Month of: <? echo $monthof;?>, <? echo $year;?></td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
    <td>6</td>
    <td>7</td>
    <td>8</td>
    <td>9</td>
    <td>10</td>
    <td>11</td>
    <td>12</td>
    <td>13</td>
    <td>14</td>
    <td>15</td>
    <td>16</td>
    <td>17</td>
    <td>18</td>
    <td>19</td>
    <td>20</td>
    <td>21</td>
    <td>22</td>
    <td>23</td>
    <td>24</td>
    <td>25</td>
    <td>26</td>
    <td>27</td>
    <td>28</td>
    <td>29</td>
    <td>30</td>
    <td>31</td>
    <td>Total</td>
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


		//1
		$n1= $year.'-'.$month.'-01';
		$sql1 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n1%'";
		$result1 = mysql_query($sql1);
		$row1 = mysql_fetch_array($result1);
		$count1 = mysql_num_rows($result1);		
	

		//2
		$n2= $year.'-'.$month.'-02';
		$sql2 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n2%'";
		$result2 = mysql_query($sql2);
		$row2 = mysql_fetch_array($result2);
		$count2 = mysql_num_rows($result2);		
	

		//3
		$n3= $year.'-'.$month.'-03';
		$sql3 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n3%'";
		$result3 = mysql_query($sql3);
		$row3 = mysql_fetch_array($result3);
		$count3 = mysql_num_rows($result3);		
	

		//4
		$n4= $year.'-'.$month.'-04';
		$sql4 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n4%'";
		$result4 = mysql_query($sql4);
		$row4 = mysql_fetch_array($result4);
		$count4 = mysql_num_rows($result4);		
	

		//5
		$n5= $year.'-'.$month.'-05';
		$sql5 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n5%'";
		$result5 = mysql_query($sql5);
		$row5 = mysql_fetch_array($result5);
		$count5 = mysql_num_rows($result5);		
	

		//6
		$n6= $year.'-'.$month.'-06';
		$sql6 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n6%'";
		$result6 = mysql_query($sql6);
		$row6 = mysql_fetch_array($result6);
		$count6 = mysql_num_rows($result6);		
	

		//7
		$n7= $year.'-'.$month.'-07';
		$sql7 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n7%'";
		$result7 = mysql_query($sql7);
		$row7 = mysql_fetch_array($result7);
		$count7 = mysql_num_rows($result7);		
	

		//8
		$n8= $year.'-'.$month.'-08';
		$sql8 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n8%'";
		$result8 = mysql_query($sql8);
		$row8 = mysql_fetch_array($result8);
		$count8 = mysql_num_rows($result8);		
	

		//9
		$n9= $year.'-'.$month.'-09';
		$sql9 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n9%'";
		$result9 = mysql_query($sql9);
		$row9 = mysql_fetch_array($result9);
		$count9 = mysql_num_rows($result9);		
	

		//10
		$n10= $year.'-'.$month.'-10';
		$sql10 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n10%'";
		$result10 = mysql_query($sql10);
		$row10 = mysql_fetch_array($result10);
		$count10 = mysql_num_rows($result10);		
	

		//11
		$n11= $year.'-'.$month.'-11';
		$sql11 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n11%'";
		$result11 = mysql_query($sql11);
		$row11 = mysql_fetch_array($result11);
		$count11 = mysql_num_rows($result11);		
	

		//12
		$n12= $year.'-'.$month.'-12';
		$sql12 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n12%'";
		$result12 = mysql_query($sql12);
		$row12 = mysql_fetch_array($result12);
		$count12 = mysql_num_rows($result12);		
	

		//13
		$n13= $year.'-'.$month.'-13';
		$sql13 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n13%'";
		$result13 = mysql_query($sql13);
		$row13 = mysql_fetch_array($result13);
		$count13 = mysql_num_rows($result13);		
	

		//14
		$n14= $year.'-'.$month.'-14';
		$sql14 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n14%'";
		$result14 = mysql_query($sql14);
		$row14 = mysql_fetch_array($result14);
		$count14 = mysql_num_rows($result14);		
	

		//15
		$n15= $year.'-'.$month.'-15';
		$sql15 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n15%'";
		$result15 = mysql_query($sql15);
		$row15 = mysql_fetch_array($result15);
		$count15 = mysql_num_rows($result15);		
	

		//16
		$n16= $year.'-'.$month.'-16';
		$sql16 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n16%'";
		$result16 = mysql_query($sql16);
		$row16 = mysql_fetch_array($result16);
		$count16 = mysql_num_rows($result16);		
	

		//17
		$n17= $year.'-'.$month.'-17';
		$sql17 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n17%'";
		$result17 = mysql_query($sql17);
		$row17 = mysql_fetch_array($result17);
		$count17 = mysql_num_rows($result17);		
	

		//18
		$n18= $year.'-'.$month.'-18';
		$sql18 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n18%'";
		$result18 = mysql_query($sql18);
		$row18 = mysql_fetch_array($result18);
		$count18 = mysql_num_rows($result18);		
	

		//19
		$n19= $year.'-'.$month.'-19';
		$sql19 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n19%'";
		$result19 = mysql_query($sql19);
		$row19 = mysql_fetch_array($result19);
		$count19 = mysql_num_rows($result19);		
	

		//20
		$n20= $year.'-'.$month.'-20';
		$sql20 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n20%'";
		$result20 = mysql_query($sql20);
		$row20 = mysql_fetch_array($result20);
		$count20 = mysql_num_rows($result20);		
	

		//21
		$n21= $year.'-'.$month.'-21';
		$sql21 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n21%'";
		$result21 = mysql_query($sql21);
		$row21 = mysql_fetch_array($result21);
		$count21 = mysql_num_rows($result21);		
	

		//22
		$n22= $year.'-'.$month.'-22';
		$sql22 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n22%'";
		$result22 = mysql_query($sql22);
		$row22 = mysql_fetch_array($result22);
		$count22 = mysql_num_rows($result22);		
	

		//23
		$n23= $year.'-'.$month.'-23';
		$sql23 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n23%'";
		$result23 = mysql_query($sql23);
		$row23 = mysql_fetch_array($result23);
		$count23 = mysql_num_rows($result23);		
	

		//24
		$n24= $year.'-'.$month.'-24';
		$sql24 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n24%'";
		$result24 = mysql_query($sql24);
		$row24 = mysql_fetch_array($result24);
		$count24 = mysql_num_rows($result24);		
	

		//25
		$n25= $year.'-'.$month.'-25';
		$sql25 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n25%'";
		$result25 = mysql_query($sql25);
		$row25 = mysql_fetch_array($result25);
		$count25 = mysql_num_rows($result25);		
	

		//26
		$n26= $year.'-'.$month.'-26';
		$sql26 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n26%'";
		$result26 = mysql_query($sql26);
		$row26 = mysql_fetch_array($result26);
		$count26 = mysql_num_rows($result26);		
	

		//27
		$n27= $year.'-'.$month.'-27';
		$sql27 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n27%'";
		$result27 = mysql_query($sql27);
		$row27 = mysql_fetch_array($result27);
		$count27 = mysql_num_rows($result27);		
	

		//28
		$n28= $year.'-'.$month.'-28';
		$sql28 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n28%'";
		$result28 = mysql_query($sql28);
		$row28 = mysql_fetch_array($result28);
		$count28 = mysql_num_rows($result28);		
	

		//29
		$n29= $year.'-'.$month.'-29';
		$sql29 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n29%'";
		$result29 = mysql_query($sql29);
		$row29 = mysql_fetch_array($result29);
		$count29 = mysql_num_rows($result29);		
	

		//30
		$n30= $year.'-'.$month.'-30';
		$sql30 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n30%'";
		$result30 = mysql_query($sql30);
		$row30 = mysql_fetch_array($result30);
		$count30 = mysql_num_rows($result30);		
	

		//31
		$n31= $year.'-'.$month.'-31';
		$sql31 = "SELECT *
        FROM tbl_blotter where bl_reportedby='$user_fullname' and bl_date like '$n31%'";
		$result31 = mysql_query($sql31);
		$row31 = mysql_fetch_array($result31);
		$count31 = mysql_num_rows($result31);		
	
	$totalcount = $count1 + $count2 + $count3 + $count4 + $count5 + $count6 + $count7 + $count8 + $count9 + $count10 + $count11 + $count12 + $count13 + $count14 + $count15 + $count16 + $count17 + $count18 + $count19 + $count20 + $count21 + $count22 + $count23 + $count24 + $count25 + $count26 + $count27 + $count28 + $count29 + $count30 + $count31;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $user_fullname; ?></td>
   <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n1;?>'><? echo $count1;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n2;?>'><? echo $count2;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n3;?>'><? echo $count3;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n4;?>'><? echo $count4;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n5;?>'><? echo $count5;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n6;?>'><? echo $count6;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n7;?>'><? echo $count7;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n8;?>'><? echo $count8;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n9;?>'><? echo $count9;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n10;?>'><? echo $count10;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n11;?>'><? echo $count11;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n12;?>'><? echo $count12;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n13;?>'><? echo $count13;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n14;?>'><? echo $count14;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n15;?>'><? echo $count15;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n16;?>'><? echo $count16;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n17;?>'><? echo $count17;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n18;?>'><? echo $count18;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n19;?>'><? echo $count19;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n20;?>'><? echo $count20;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n21;?>'><? echo $count21;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n22;?>'><? echo $count22;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n23;?>'><? echo $count23;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n24;?>'><? echo $count24;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n25;?>'><? echo $count25;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n26;?>'><? echo $count26;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n27;?>'><? echo $count27;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n28;?>'><? echo $count28;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n29;?>'><? echo $count29;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n30;?>'><? echo $count30;?></a></td>
    <td>&nbsp;<a href='index.php?view=dailyaccidentdetail&officer=<? echo $user_fullname;?>&month=<? echo $n31;?>'><? echo $count31;?></a></td>
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
   <td colspan="33" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="Back" class="box" onclick="window.history.back();" />
    <input name="btnAddUser2" type="button" id="btnAddUser2" value="Print" class="box" onclick="window.location.href='printindex.php?view=dailyaccidentprint&policeId=<? echo $policeId;?>';" /></td>
  </tr>
 </table>

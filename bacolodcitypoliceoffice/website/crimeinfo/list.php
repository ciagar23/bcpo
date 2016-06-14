<?php


if (!isset($_SESSION['website_id'])) {
         echo '<script> alert("Please log in first");
		 window.location="../index.php" </script>';
		exit;
	}
	

if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';

$rowsPerPage = 10;
$sql3 = "SELECT *
		        FROM tbl_webuser 
				WHERE w_id = '$loggedin'";
		$result3 = mysql_query($sql3);
		$show = mysql_fetch_array($result3);	
		$username = $show['w_username'];
	$message = mysql_num_rows(mysql_query("select * from tbl_reportacrime where r_to = '$username' and r_read ='no'"));
		
$sql = "SELECT r_id,r_from,r_complaint, r_report, r_datetime, r_read, r_to
        FROM tbl_reportacrime
		WHERE r_to = '$username'
		ORDER BY r_id desc";

$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');
?> 

	<form action="processReportacrime.php?action=Reportacrime" method="post"  name="frmListReport" id="frmListReport">
<input type="button" value="Report" onclick="window.location='index.php?view=report'" > 
<h3 align="center"><font color="red"><? echo $errorMessage;?></font></h3>
	<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text" bgcolor="#FF6600">
		
	  <tr bgcolor="#69a2fe" align="center"  class="entryTable"> 
			<th><font color="white">Date/Time</td>
  			<th ><font color="white">Sender</td>
			<th width="70" ><font color="white">Subject</td>
			<th width="70" >&nbsp;</td>
	  </tr>
  <?php
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
			
		
		if ($i%2) 
			{
			$class = 'row1';
			} 
			
		else 
			{
			$class = 'row2';
			}
			if($r_read=='no')
			{
			$read ='<b>';
			}
			else
			{
			$read ='<i>';
			}
		
		$i += 1;
?>
	<tr bgcolor='white' class="<?php echo $class; ?>"> 
   		<td><? echo $read;?><a href="processCrimeinfo.php?action=read&policeId=<?php echo $r_id; ?>"><?php echo $r_datetime; ?>&nbsp; </a></td>
   		<td><? echo $read;?><a href="processCrimeinfo.php?action=read&policeId=<?php echo $r_id; ?>"><?php echo $r_from; ?>&nbsp; </a></td>
   		<td><? echo $read;?><a href="processCrimeinfo.php?action=read&policeId=<?php echo $r_id; ?>"><?php echo $r_complaint; ?>&nbsp; </a></td>
   <td width="75" align="center"><a href="javascript:deleteCrimeinfo(<?php echo $r_id; ?>);">Delete</a></td>
  	</tr>
  <?php
	} // end while
?>
	<tr bgcolor='white'> 
  	 	<td colspan="5" align="center" class="next"><?php echo $pagingLink;?></td>
  	</tr>
<?php	
} else {
?>
  	<tr bgcolor='white'> 
  		 <td colspan="5" align="center">No Records Yet</td>
  	</tr>
  <?php
}
?>

</table>
 <p>&nbsp;</p>
</form>
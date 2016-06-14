<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	
	$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
	

$rowsPerPage = 10;
		
$sql = "SELECT r_id,r_from,r_complaint, r_report, r_datetime, r_read, r_to
        FROM tbl_reportacrime
		WHERE r_to = '$station'
		ORDER BY r_id desc";
$message = mysql_num_rows(mysql_query("select * from tbl_reportacrime where r_to = '$station' and r_read ='no'"));
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');

if($message !=0)
	{
	echo '<h4 class="alert_warning">you have '.$message.' unread Message(s)</h4>';
	}
		else
		{
		}
		
if($errorMessage !='')
	{
	echo '<h4 class="alert_success">'.$errorMessage.'</h4>';
	}
		else
		{
		}
?> 



<article class="module width_full">
<header><h3 class="tabs_involved">Crime Reports: <?php echo $pagingLink;?></h3> </header>

<form action="processCrimereport.php?action=acrimereport" method="post"  name="frmListCrimereport" id="frmListCrimereport">
<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
            <thead>
            <tr>
		<th > Date/Time </td>
		<th > Sender </td>
		<th > Subject </td>
		<th > Delete </td>
	</tr>
    </thead>
  <?php
if (dbNumRows($result) > 0) 
	{
	$i = 0;
	
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
	<tr> 
   		<td><? echo $read;?><a href="processCrimereport.php?action=read&policeId=<?php echo $r_id; ?>"><?php echo $r_datetime; ?>&nbsp; </a></td>
   		<td><? echo $read;?><a href="processCrimereport.php?action=read&policeId=<?php echo $r_id; ?>"><?php echo $r_from; ?>&nbsp; </a></td>
   		<td><? echo $read;?><a href="processCrimereport.php?action=read&policeId=<?php echo $r_id; ?>"><?php echo $r_complaint; ?>&nbsp; </a></td>
   		<td width="75" align="center"><a href="javascript:deleteCrimereport(<?php echo $r_id; ?>);">Delete</a></td>
  	</tr>
  <?php
	} // end while

	
} else {
?>
  	<tr> 
  		 <td colspan="5" align="center"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="456" height="105">
           <param name="movie" value="/bacolodcitypoliceoffice/admin/include/heading.swf" />
           <param name="quality" value="high" />
           <embed src="/bacolodcitypoliceoffice/admin/include/heading.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="456" height="105"></embed>
	     </object></td>
  	</tr>
  <?php
}
?>

</table>

 <p>&nbsp;</p>
</form>

</article>
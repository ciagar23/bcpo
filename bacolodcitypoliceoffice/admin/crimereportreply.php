<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	if (isset($_GET['policeId']) && $_GET['policeId'] > 0) 
	{
	$policeId = $_GET['policeId'];
	} 
	
	else 
		{
		header('Location: index.php');
		}
		

$sql = "SELECT r_id,r_from,r_complaint, r_report, r_datetime,r_incidentdate,r_incidentplace, r_read, r_to
        FROM tbl_reportacrime
		WHERE r_to = '$station' and r_id = $policeId";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);

?> 
<form action="processCrimereport.php?action=reportreply&complainant=<? echo $r_from;?>" method="post" enctype="multipart/form-data" name="frmReport" id="frmReport">
 <article class="module width_full">
			<header><h3>Report A Crime Reply</h3></header>
				<div class="module_content">
             <fieldset>
             <label>Subject:</label>
   		<input name="txtcomplaint" type="text" value="RE: <? echo $r_complaint;?>" class="box" id="txtcomplaint" value="" size="47" /> </fieldset>
 <fieldset>
  <label>Message:</label>
   <textarea name="txtreport" cols="80" rows="5" class="box" id="txtreport"></textarea>
 </fieldset>
<input name="btnreport" type="button" id="btnreport" value="Send" onClick="checkreportreplyForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  

</form>

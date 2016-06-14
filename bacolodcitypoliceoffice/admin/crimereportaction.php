<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	
$complainant = (isset($_GET['complainant']) && $_GET['complainant'] != '') ? $_GET['complainant'] : '';	

$sql = "SELECT r_id,r_from,r_complaint, r_report, r_datetime,r_incidentdate,r_incidentplace, r_read, r_to
        FROM tbl_reportacrime
		WHERE r_to = '$station' and r_from = '$complainant' and r_status='report' order by r_id desc";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);

?> 
<form action="processCrimereport.php?action=reportaction&complainant=<? echo $r_from;?>" method="post" enctype="multipart/form-data" name="frmReport" id="frmReport">

  <article class="module width_full">
			<header><h3>Report A Crime Reply</h3></header>
				<div class="module_content"></h3>
  <table>
	
  	<tr class="row1" > 
   		<td width="150">From:</th>
   		<td><? echo $r_from;?></td>
  	</tr>
  	<tr class="row1" > 
   		<td width="150">Complaint:</th>
   		<td><? echo $r_complaint;?></td>
  	</tr>
  	<tr class="row1" > 
   		<td width="150">Place of Incident:</th>
   		<td><? echo $r_incidentplace;?></td>
  	</tr>
  	<tr class="row1" > 
   		<td width="150">Date of incident:</th>
   		<td><? echo $r_incidentdate;?></td>
  	</tr>
	<tr class="row1" > 
	<td width="150">Report:</th>
   		<td colspan="2"><? echo $r_report;?></td>
  	</tr>

		<tr class="row1" > 
	<td width="150">Reffer to:</th>
   		<td colspan="2"><select name="action">
   		  <option value="">-Select Station-</option>
   		  <option>TMU</option>
   		  <option>police station 1</option>
   		  <option>police station 2</option>
   		  <option>police station 3</option>
   		  <option>police station 4</option>
   		  <option>police station 5</option>
   		  <option>police station 6</option>
   		  <option>police station 7</option>
   		  <option>police station 8</option>
   		  <option>police station 9</option>
   		  <option>police station 10</option>
 		  </select>   		</td>
          </table>
  <fieldset>
 <label>  Brief Outline of Incident: </label>
	    <textarea name="outline" cols="100%" rows="4"></textarea>
</fieldset>

<p align="center"> 
<input name="btnreport" type="button" id="btnreport" value="Send" onClick="checkreportactionForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
</p>

</form>

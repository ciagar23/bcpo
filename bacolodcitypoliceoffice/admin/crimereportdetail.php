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
		

$sql = "SELECT r_id,r_from,r_complaint, r_report, r_datetime,r_incidentdate,r_incidentplace, r_read, r_to, r_status
        FROM tbl_reportacrime
		WHERE r_to = '$station' and r_id = $policeId";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);

?>

<article class="module width_full">
			<header><h3>Reported By: <?php echo $r_from; ?> <? if ($r_from =='Operations') {} else {?>
     <?php if ($r_status =='clear')
  {}
  else
  {?>
    <a href="index.php?view=profile&user=<?php echo $r_from; ?>">View Profile</a>
	<? } }?>
    
    </h3></header>
				<div class="module_content">
                
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
 <table width="100%" border="0" align="center"  class="detail">
  

  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Date Reported:</strong></td>
   <td class="content" width="1016"><?php echo $r_datetime; ?></td>
  </tr>
    
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Subject:</strong></td>
   <td class="content" width="1016"><?php echo $r_complaint; ?></td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Place of Incident:</strong></td>
   <td class="content" width="1016"><?php echo $r_incidentplace; ?></td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Date of Incident:</strong></td>
   <td class="content" width="1016"><?php echo $r_incidentdate; ?></td>
  </tr>
  
  <tr class='row1'> 
   <td class="label2" width="187"  colspan="2" align="center"><strong>Report</strong></td>
   <tr class='row1' height="100" valign="top">
   <td class="content" width="1016"  colspan="2" align="center"><?php echo $r_report; ?></td>
  </tr>
  
 </table>
 <p align="center">
 <? if($station =='Operations'){?>
  <input name="btnBack" type="button" id="btnBack" value=" Reply " onClick="window.location.href='index.php?view=crimereportreply&policeId=<?php echo $policeId; ?>';" class="box">
  
  <?php if ($r_status =='clear')
  {}
  else
  {?>
  <input name="btnBack" type="button" id="btnBack" value=" Action " onClick="window.location.href='index.php?view=crimereportaction&complainant=<? echo $r_from;?>';" class="box">
  <? } } else {
  ?>
  <input name="btnBack" type="button" id="btnBack" value=" Action " onClick="window.location.href='processCrimereport.php?action=policeaction&complainant=<? echo $r_from;?>';" class="box">
  
  
  <?php
  
   }?>
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.location.href='index.php';" class="box"></p>
</form>

</div>
</article>
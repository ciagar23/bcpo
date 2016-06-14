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
		
$sql = "SELECT r_id,r_from,r_complaint, r_report, r_datetime, r_read, r_to
        FROM tbl_reportacrime
		WHERE r_id = $policeId
		ORDER BY r_id desc"; 
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);

?>
<p>&nbsp;</p>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
 <table width="100%" border="0" align="center"  class="detail">
  <tr class="entryTable"> 
   <td class="label2" colspan="2" width="187" >&nbsp;</td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Reported By:</strong></td>
   <td class="content" width="1016"><?php echo $r_from; ?></td>
  </tr>

  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Date Reported:</strong></td>
   <td class="content" width="1016"><?php echo $r_datetime; ?></td>
  </tr>
    
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Subject:</strong></td>
   <td class="content" width="1016"><?php echo $r_complaint; ?></td>
  </tr>
  
  <tr class='row1'> 
   <td class="label2" width="187"  colspan="2" align="center"><strong>Report</strong></td>
   <tr class='row1' height="100" valign="top">
   <td class="content" width="1016"  colspan="2" align="center"><?php echo $r_report; ?></td>
  </tr>
  
 </table>
 <p align="center">
   <input name="btnBack" type="button" id="btnBack" value=" Reply " onClick="window.location.href='index.php?view=reply&policeId=<?php echo $policeId; ?>';" class="box">
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.location.href='index.php';" class="box"></p>
</form>

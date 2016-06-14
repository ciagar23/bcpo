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
		
$sql2 = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result2 = mysql_query($sql2);
		$row2 = mysql_fetch_array($result2, MYSQL_ASSOC);	
		$station= $row2['user_station'];
		
		if($station =='TMU')
		{
		$link= 'index.php?view=addotherdatatmu&policeId='.$policeId;
		}
		else
		{
		
		$link= 'index.php?view=addotherdata&policeId='.$policeId;
		}


$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cname, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury, bl_crime,bl_blottedby
        FROM tbl_blotter
		WHERE bl_id = $policeId";
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
   <td class="label2" width="187" ><strong>Date</strong></td>
   <td class="content" width="1016"><?php echo $bl_date; ?></td>
  </tr>
  <tr class='row2'> 
   <td class="label2"  colspan="2" align="center"><strong>Complainant</strong></td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Name</strong></td>
   <td class="content"> <?php echo $bl_cname; ?></td>
  </tr>
  <tr class='row2'> 
   <td class="label2" width="187" ><strong>Address</strong></td>
   <td class="content"> <?php echo $bl_caddress; ?></td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Type of Crime</strong></td>
   <td class="content"> <?php echo $bl_crime; ?></td>
  </tr>
  <tr class='row2'> 
   <td class="label2" width="187" ><strong>Complaint</strong></td>
   <td class="content"> <?php echo $bl_ccomplaint; ?></td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Place of Incident</strong></td>
   <td class="content"> <?php echo $bl_clocation; ?></td>
  </tr>
  <tr class='row2'> 
   <td class="label2" width="187" ><strong>Reffered to</strong></td>
   <td class="content"> <?php echo $bl_refferedto; ?></td>
  </tr>
  <tr class='row1'> 
   <td class="label2" colspan="2" align="center"><strong>Brief Outline of the Case</strong></td>
   <tr class='row2'>
   <td class="content"  colspan="2" ><div align="justify"> <?php echo nl2br($bl_outline); ?></div></td>
  </tr>
  <tr class='row1'> 
   <td  colspan="2">&nbsp;</td>
  </tr>
  <tr class='row2'> 
   <td class="content"  colspan="2"><strong>Desk Officer:</strong>&nbsp;<?php echo $bl_blottedby; ?></td>
  </tr><tr class="entryTable"> 
   <td class="label2" colspan="2" width="187" >&nbsp;</td>
  </tr>
 </table>
 <p align="center">
   <input name="btnAddBlotter" type="button" id="btnAddBlotter" value="View Other Data" onClick="window.location.href='index.php?view=otherdata&policeId=<? echo $policeId;?>';" class="box">
  <input name="btnBack" type="button" id="btnBack" value=" Print " onClick="window.location.href='printindex.php?view=detail&policeId=<?php echo $policeId; ?>';" class="box">
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.history.back();" class="box"></p>
</form>

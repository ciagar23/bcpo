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

$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cfname, bl_clname, bl_cmname, bl_caddress, bl_ccomplaint, bl_clocation, bl_crefferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rfname, bl_rlname, bl_rmname, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury
        FROM tbl_blotter
		WHERE bl_id = $policeId";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());

$row = mysql_fetch_assoc($result);
extract($row);

?>
<p>&nbsp;</p>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <td width="150" class="label">Date</td>
   <td class="content"><?php echo $bl_date; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label">Reported By:</td>
   <td class="content"> <?php echo $bl_reportedby; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label" colspan="2">Complainant</td>
  </tr>
  <tr> 
   <td width="150" class="label">First name</td>
   <td class="content"> <?php echo $bl_cfname; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label">Last name</td>
   <td class="content"> <?php echo $bl_clname; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label">Middle name</td>
   <td class="content"> <?php echo $bl_cmname; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label">Address</td>
   <td class="content"> <?php echo $bl_caddress; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label">Complaint</td>
   <td class="content"> <?php echo $bl_ccomplaint; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label">Location</td>
   <td class="content"> <?php echo $bl_clocation; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label">Reffered to</td>
   <td class="content"> <?php echo $bl_crefferedto; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label">Brief Outline of Complain</td>
   <td class="content"> <?php echo $bl_outline; ?></td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnotherData" type="button" id="btnotherData" value="OtherData" onClick="window.location.href='index.php?view=otherdata&policeId=<?php echo $policeId; ?>';" class="box">
  <input name="btnModifyBlotter" type="button" id="btnModifyBlotter" value="Modify Blotter" onClick="window.location.href='index.php?view=modify&policeId=<?php echo $policeId; ?>';" class="box">
  &nbsp;&nbsp;
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.history.back();" class="box">
 </p>
</form>

<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$sql = "SELECT a_id, a_content
        FROM tbl_aboutpnp";
$result = mysql_query($sql) or die('Cannot get Blotter. ' . mysql_error());
$row    = mysql_fetch_assoc($result);
extract($row);

?> 
<form action="processPCR.php?action=aboutpnp" method="post" enctype="multipart/form-data" name="frmaboutpnp" id="frmaboutpnp">
 <p align="center" class="entryTable">Content</p>
 
 <table width="80%" border="0" align="center" cellpadding="5" cellspacing="1" class="text">
   <tr class="row1">
  <td colspan="2" align="center"> <textarea name="txtaboutpnp" cols="100" rows="30" class="box" id="txtaboutpnp"><? echo $a_content;?></textarea></td>
  </tr>
 </table>
 
 

 <p align="center"> 
  <input name="btnModifyBlotter" type="button" id="btnModifyBlotter" value="Update About PNP" onClick="checkaboutpnpForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form> 
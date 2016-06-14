<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$sql = "SELECT a_id, a_content
        FROM tbl_gethelp";
$result = mysql_query($sql) or die('Cannot get Blotter. ' . mysql_error());
$row    = mysql_fetch_assoc($result);
extract($row);

?> 
<form action="processPCR.php?action=gethelp" method="post" enctype="multipart/form-data" name="frmgethelp" id="frmgethelp">
 <p align="center" class="entryTable">Content</p>
 
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="text">
   <tr class="row1">
  <td colspan="2" align="center"> <textarea name="txtgethelp" cols="150" rows="30" class="box" id="txtgethelp"><? echo $a_content;?></textarea></td>
  </tr>
 </table>
 
 

 <p align="center"> 
  <input name="btnModifyBlotter" type="button" id="btnModifyBlotter" value="Update About BCPO" onClick="checkgethelpForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form> 
<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$parentId = (isset($_GET['parentId']) && $_GET['parentId'] > 0) ? $_GET['parentId'] : 0;

?> 

<form action="processCrime.php?action=add" method="post" enctype="multipart/form-data" name="frmCategory" id="frmCategory">
 
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
  <tr class="entryTable"> 
  <td colspan="2" >Add Category
  <tr>
   <td width="150" class="label">Crime Name</td>
   <td class="content"> <input name="txtName" type="text" class="box" id="txtName" size="30" maxlength="50"></td>
    <input name="hidParentId" type="hidden" id="hidParentId" value="<?php echo $parentId; ?>"></td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddCategory" type="button" id="btnAddCategory" value="Add" onClick="checkCrimeForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php?catId=<?php echo $parentId; ?>';" class="box">  
 </p>
</form>
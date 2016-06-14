<?php
if (!defined('WEB_ROOT')) {
	exit;
}

// make sure a category id exists
if (isset($_GET['catId']) && (int)$_GET['catId'] > 0) {
	$catId = (int)$_GET['catId'];
} else {
	header('Location:index.php');
}	
	
$sql = "SELECT c_id, c_name, c_description
		FROM tbl_category
		WHERE c_id = $catId";
$result = dbQuery($sql);
$row = dbFetchAssoc($result);
extract($row);

?>
<p>&nbsp;</p>
<form action="processCategory.php?action=modify&catId=<?php echo $catId; ?>" method="post" enctype="multipart/form-data" name="frmCategory" id="frmCategory">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <td width="150" class="label">Category Name</td>
   <td class="content"><input name="txtName" type="text" class="box" id="txtName" value="<?php echo $c_name; ?>" size="30" maxlength="50"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Description</td>
   <td class="content"> <textarea name="mtxDescription" cols="50" rows="4" class="box" id="mtxDescription"><?php echo $c_description; ?></textarea></td>
  </tr>


 </table>
 <p align="center"> 
  <input name="btnModify" type="button" id="btnModify" value="Save Modification" onClick="checkCategoryForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">
 </p>
</form>
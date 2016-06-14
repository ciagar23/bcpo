<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['catId']) && (int)$_GET['catId'] >= 0) {
	$catId = (int)$_GET['catId'];
	$queryString = "&catId=$catId";
} else {
	$catId = 0;
	$queryString = '';
}
	
// for paging
// how many rows to show per page
$rowsPerPage = 5;

$sql = "SELECT c_id, c_parent_id, c_name, c_description
        FROM tbl_category
		WHERE c_parent_id = $catId
		ORDER BY c_name";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);
?>
<p>&nbsp;</p>
<form action="processCategory.php?action=addCategory" method="post"  name="frmListCategory" id="frmListCategory">
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Category Name</td>
   <td>Description</td>
   <td width="75">Modify</td>
   <td width="75">Delete</td>
  </tr>
  <?php
$c_parent_id = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
		
		if ($i%2) {
			$class = 'row1';
		} else {
			$class = 'row2';
		}
		
		$i += 1;
		
		if ($c_parent_id == 0) {
			$c_name = "<a href=\"index.php?catId=$c_id\">$c_name</a>";
		}
		
		if ($c_image) {
			$c_image = WEB_ROOT . 'images/category/' . $c_image;
		} else {
			$c_image = WEB_ROOT . 'images/no-image-small.png';
		}		
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo $c_name; ?></td>
   <td><?php echo nl2br($c_description); ?></td>
   <td width="75" align="center"><a href="javascript:modifyCategory(<?php echo $c_id; ?>);">Modify</a></td>
   <td width="75" align="center"><a href="javascript:deleteCategory(<?php echo $c_id; ?>);">Delete</a></td>
  </tr>
  <?php
	} // end while


?>
  <tr> 
   <td colspan="5" align="center">
   <?php 
   echo $pagingLink;
   ?></td>
  </tr>
<?php	
} else {
?>
  <tr> 
   <td colspan="5" align="center">No Categories Yet</td>
  </tr>
  <?php
}
?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"> <input name="btnAddCategory" type="button" id="btnAddCategory" value="Add Category" class="box" onClick="addCategory(<?php echo $catId; ?>)"> 
   </td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
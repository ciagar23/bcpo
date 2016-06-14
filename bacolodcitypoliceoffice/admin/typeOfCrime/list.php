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
        FROM tbl_crime
		WHERE c_parent_id = $catId
		ORDER BY c_name";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);
?>
<form action="processCrime.php?action=addCategory" method="post"  name="frmListCategory" id="frmListCategory">
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" class="entryTable"> 
   <td>Category Name</td>
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
		else
		{
			$c_name = "<a href=\"../archives/index.php?catId=$c_id\">$c_name</a>";
		}
		
			
?>
  <tr class="<?php echo $class; ?>"> 
   <td><b><?php echo $c_name; ?></b><br><?php echo nl2br($c_description); ?></td>
   <td width="75" align="center"><a href="javascript:modifyCrime(<?php echo $c_id; ?>);">Modify</a></td>
   <td width="75" align="center"><a href="javascript:deleteCrime(<?php echo $c_id; ?>);">Delete</a></td>
  </tr>
  <?php
	} // end while
	
$sql1 = "SELECT *
        FROM tbl_crime WHERE c_id = $catId ";
		$result1 = mysql_query($sql1);
		$rows1 = mysql_num_rows($result1); //to get the number of rows
		$row1 = mysql_fetch_array($result1);	
		$aa= $row1["c_name"];



if ($c_parent_id == 0) {
			$location = "";
		}
		else
		{
			$location = "<font size=2><a href=\"../typeOfCrime\">$aa</a></font>";
		}
?>
<p><?php echo $location; ?></p>
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
   <td colspan="5" align="right"> <input name="btnAddCategory" type="button" id="btnAddCategory" value="Add Crime" class="box" onClick="addCrime(<?php echo $catId; ?>)"> 
   </td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
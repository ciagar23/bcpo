<?php
if (!defined('WEB_ROOT')) {
	exit;
}


if (isset($_GET['catId']) && (int)$_GET['catId'] > 0) {
	$catId = (int)$_GET['catId'];
	$sql2 = " AND p.cat_id = $catId";
	$queryString = "catId=$catId";
} else {
	$catId = 0;
	$sql2  = '';
	$queryString = '';
}

// for paging
// how many rows to show per page
$rowsPerPage = 50;

$sql = "SELECT rl_id, r_id, rl_crime, rl_date, rl_place, rl_ccisnr, rl_branch, rl_status
        FROM  tbl_roguelist where r_id = $r_id
		ORDER BY rl_id desc";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, $queryString);

?> 
<form action="processRogue.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr> 
   <td  colspan="6" class="box"><strong>CRIME</strong></td>
  </tr>
  <tr  class="entryTable"> 
   <th align="left">Crime Commited</th>
   <th align="left">Date</th>
   <th align="left">Place</th>
   <th align="left">CC/IS NR</th>
   <th align="left">Branch</th>
   <th align="left">Status</th>
  </tr>
  <?php
$parentId = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);

		$i += 1;
?>
  <tr> 
   <td align="left"><?php echo $i; ?>.<font color="#FF0000"><?php echo $rl_crime; ?></td>
   <td align="left"><font color="#FF0000"><?php echo $rl_date; ?></td>
   <td align="left"><font color="#FF0000"><?php echo $rl_place; ?></td>
   <td align="left"><font color="#FF0000"><?php echo $rl_ccisnr; ?></td>
   <td align="left"><font color="#FF0000"><?php echo $rl_branch; ?></td>
   <td align="left"><font color="#FF0000"><?php echo $rl_status; ?></td>
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
   <td colspan="5" align="center">No crime Yet</td>
  </tr>
  <?php
}
?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
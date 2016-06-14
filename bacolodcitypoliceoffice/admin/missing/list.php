<?php
if (!defined('WEB_ROOT')) {
	exit;
}

require_once 'search.php';

if (isset($_GET['catId']) && (int)$_GET['catId'] > 0) {
	$catId = (int)$_GET['catId'];
	$sql2 = " AND p.cat_id = $catId";
	$queryString = "catId=$catId";
} else {
	$catId = 0;
	$sql2  = '';
	$queryString = '';
	
}
$field = (isset($_GET['field']) && $_GET['field'] != '') ? $_GET['field'] : 'm_id';
		$search = (isset($_GET['search']) && $_GET['search'] != '') ? $_GET['search'] : '';
// for paging
// how many rows to show per page
$rowsPerPage = 6;

$sql = "SELECT m_id, m_name, m_date, m_birthdate, m_gender, m_reward, m_eyes,m_hair, m_height, m_weight,m_age, m_contact, m_contactNum, m_address, m_thumbnail, m_image, m_citizenship, m_birthplace, m_caddress, m_complexion, m_mark, m_status, m_found
        FROM  tbl_missing where $field like '%$search%'
		ORDER BY m_id desc";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, $queryString);

?> 
<form action="processMissing.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">

<br>
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  
  <?php
$parentId = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
		
		if ($m_thumbnail) {
			$m_thumbnail = WEB_ROOT . 'images/missing/' . $m_thumbnail;
		} else {
			$m_thumbnail = WEB_ROOT . 'images/no-image-small.png';
		}	
		
		$i++;
		if($i%2)
		{
		$tr='<tr class="row1" valign="top"> ';
		}
		else
		{
		
		$tr=' ';
		}
		
		if($m_found=='yes')
		{
			$bg = WEB_ROOT . 'images/found.jpg';
		}
		else
		{
			$bg = '';
		}
		
		echo $tr;
?> 
  
   <td width="75" align="center"><img src="<?php echo $m_thumbnail; ?>" height="100"></td>
   <td>
   <table width="100%" background="<? echo $bg;?>">
   <tr>
   <td><strong>Name:</strong> <?php echo $m_name; ?>
   <tr>
   <td><strong>Missing Since:</strong> <?php echo $m_date; ?>
   <tr>
   <td><strong>Birthdate:</strong> <?php echo $m_birthdate; ?>
   <tr>
   <td><strong>Sex:</strong> <?php echo $m_gender; ?>
    <tr>
   <td><font color="#FF0000"><strong>REWARD:</strong></font> <?php echo $m_reward; ?>
   <tr>
   <td> <a href="index.php?view=detail&policeId=<?php echo $m_id; ?>">View Detail</a> 
   <? if($m_found=='no') {?>
   || <a href="processMissing.php?action=foundMissing&policeId=<?php echo $m_id; ?>">Found </a>
   <? }else{}?>

   </table>

  <?php

  
	} // end while
?>
  <tr> 
   <td colspan="5" align="center"  class="next">
   <?php 
echo $pagingLink;
   ?></td>
  </tr>
<?php	
} else {
?>
  <tr> 
   <td colspan="5" align="center">Missing Persons return zero result</td>
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
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
$field = (isset($_GET['field']) && $_GET['field'] != '') ? $_GET['field'] : 'w_id';
		$search = (isset($_GET['search']) && $_GET['search'] != '') ? $_GET['search'] : '';
// for paging
// how many rows to show per page
$rowsPerPage = 6;

$sql = "SELECT w_id, w_name, w_alias, w_casenumber, w_dob, w_pob, w_height, w_weight, w_address, w_caption, w_gender, w_warrant, w_crime, w_age, w_captured, w_datenow, w_image, w_thumbnail, w_reward
        FROM  tbl_wanted where $field like '%$search%'
		ORDER BY w_id desc";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, $queryString);

?> 

<br>

  <article class="module width_full">
			<header><h3>About PNP</h3></header>
			<div class="module_content">
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  
  <?php
$parentId = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
		
		if ($w_thumbnail) {
			$w_thumbnail = WEB_ROOT . 'images/wanted/' . $w_thumbnail;
		} else {
			$w_thumbnail = WEB_ROOT . 'images/no-image-small.png';
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
		echo $tr;
		if($w_captured=='yes')
		{
			$bg = WEB_ROOT . 'images/captured.jpg';
		}
		else
		{
			$bg = '';
		}
?> 
 
   <td width="75" align="center"><img src="<?php echo $w_thumbnail; ?>" height="100"></td>
   <td>
   <table width="100%" background="<? echo $bg;?>">
   <tr>
   <td><strong>Name:</strong> <?php echo $w_name; ?>
   <tr>
   <td><strong>Alias:</strong> <?php echo $w_alias; ?>
   <tr>
   <td><strong>Crime:</strong> <?php echo $w_crime; ?>
   <tr>
   <td><strong>Sex:</strong> <?php echo $w_gender; ?>
    <tr>
   <td><font color="#FF0000"><strong>REWARD:</strong></font> <?php echo $w_reward; ?>
   <tr>
   <td> <a href="index.php?view=detail&policeId=<?php echo $w_id; ?>">View Detail</a> 
    <? if($w_captured=='no') {?>
   || <a href="processWanted.php?action=capture&policeId=<?php echo $w_id; ?>">Captured</a>
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
   <td colspan="5" align="center">Wanted Persons return zero result</td>
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
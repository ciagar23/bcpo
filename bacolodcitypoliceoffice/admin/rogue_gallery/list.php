<?php
if (!defined('WEB_ROOT')) {
	exit;
}

?>

<article class="module width_full">
			<header><h3>Rogue Gallery</h3></header>
			<div class="module_content">
		
        
        
        	<?php
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
// for paging
// how many rows to show per page
$rowsPerPage = 5;
if ($field=='r_sex'){
$sql = "SELECT r_id, r_image, r_thumbnail, r_thumbnail2, r_thumbnail3, r_name, r_alias, r_age, r_sex, r_citizenship, r_dob, r_pob, r_p_address, r_address, r_occupation, r_g_affilation, r_modus, r_area_opn, r_height, r_weight, r_build, r_complexion, r_hair, r_eyes, r_others, r_s_name, r_s_alias, r_s_age, r_s_sex, r_s_citizenship, r_s_dob, r_s_pob, r_s_p_address, r_s_address, r_s_occupation, r_s_g_affilation, r_s_modus, r_f_name, r_f_age, r_f_occupation, r_f_address, r_m_name, r_m_age, r_m_occupation, r_m_address, r_siblings,r_mostwanted
        FROM  tbl_rogue_gallery where $field = '$search'
		ORDER BY r_id desc";

}
else
{
$sql = "SELECT r_id, r_image, r_thumbnail, r_thumbnail2, r_thumbnail3, r_name, r_alias, r_age, r_sex, r_citizenship, r_dob, r_pob, r_p_address, r_address, r_occupation, r_g_affilation, r_modus, r_area_opn, r_height, r_weight, r_build, r_complexion, r_hair, r_eyes, r_others, r_s_name, r_s_alias, r_s_age, r_s_sex, r_s_citizenship, r_s_dob, r_s_pob, r_s_p_address, r_s_address, r_s_occupation, r_s_g_affilation, r_s_modus, r_f_name, r_f_age, r_f_occupation, r_f_address, r_m_name, r_m_age, r_m_occupation, r_m_address, r_siblings,r_mostwanted
        FROM  tbl_rogue_gallery where $field like '%$search%'
		ORDER BY r_id desc";
}
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, $queryString);

?> 
<form action="processRogue.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">




 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  
  <?php
$parentId = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
		
		if ($r_thumbnail) {
			$r_thumbnail = WEB_ROOT . 'images/rogue_gallery/' . $r_thumbnail;
		} else {
			$r_thumbnail = WEB_ROOT . 'images/no-image-small.png';
		}	
		
		if ($r_thumbnail2) {
			$r_thumbnail2 = WEB_ROOT . 'images/rogue_gallery/' . $r_thumbnail2;
		} else {
			$r_thumbnail2 = WEB_ROOT . 'images/no-image-small.png';
		}	
		
		if ($r_thumbnail3) {
			$r_thumbnail3 = WEB_ROOT . 'images/rogue_gallery/' . $r_thumbnail3;
		} else {
			$r_thumbnail3 = WEB_ROOT . 'images/no-image-small.png';
		}	
		
		
		
		if ($i%2) {
			$class = 'row1';
		} else {
			$class = 'row2';
		}
		
		if($r_mostwanted == 'yes')
		{
		$r_mostwanted = '<font color=red>(Most Wanted)</font>';
		}
		else
		{
		$r_mostwanted = '';
		}
		
		$i += 1;
?> 

</table>
</div>
</article>


<article class="module width_full">
			<header><h3><?php echo $r_name; ?> AKA <?php echo $r_alias; ?></h3></header>
			<div class="module_content">
<table>
  <tr align="center" class="entryTable"> 
  <th>Front
  <th>Left
  <th>Right
  
  <tr class="row1" valign="top"> 
   <td width="75" align="center"><img src="<?php echo $r_thumbnail; ?>" height="100"></td>
   <td width="75" align="center"><img src="<?php echo $r_thumbnail2; ?>" height="100"></td>
   <td width="75" align="center"><img src="<?php echo $r_thumbnail3; ?>" height="100"></td>
   <td>
   
   <table width="100%">
   <tr class="row1">
   <td><strong>Name:</strong> <?php echo $r_name; ?>
   <tr class="row2">
   <td><strong>Alias:</strong> <?php echo $r_alias; ?>
   <tr class="row1">
   <td><strong>Age:</strong> <?php echo $r_age; ?>
   <tr class="row2">
   <td><strong>Sex:</strong> <?php echo $r_sex; ?>
   <tr class="row1">
   <td><strong>Modus Operandi: </strong><?php echo $r_modus; ?>
   <tr class="row1">
   <td> <a href="index.php?view=detail&policeId=<?php echo $r_id; ?>">View Detail</a>
   
   <? if($station !='Operations' && $level !='Desk Officer') {?>
    || <a href="javascript:addCrimeRogue(<?php echo $r_id; ?>);">Add Crime </a>
   <? } else {}?>
   <? if($station =='Administrator') {?>
    || <a href="javascript:modifyRogue(<?php echo $r_id; ?>);">Modify </a>
	<? } else {}?>
 
   
  </table>
  </div>
  </article>

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
   <td colspan="5" align="center">Rogue gallery returns zero result</td>
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
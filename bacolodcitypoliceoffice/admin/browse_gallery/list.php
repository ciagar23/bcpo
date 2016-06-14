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
$rowsPerPage = 1;

$sql = "SELECT r_id, r_image, r_image2, r_image3, r_thumbnail, r_thumbnail2, r_thumbnail3, r_name, r_alias, r_age, r_sex, r_citizenship, r_dob, r_pob, r_p_address, r_address, r_occupation, r_g_affilation, r_modus, r_area_opn, r_height, r_weight, r_build, r_complexion, r_hair, r_eyes, r_others, r_s_name, r_s_alias, r_s_age, r_s_sex, r_s_citizenship, r_s_dob, r_s_pob, r_s_p_address, r_s_address, r_s_occupation, r_s_g_affilation, r_s_modus, r_f_name, r_f_age, r_f_occupation, r_f_address, r_m_name, r_m_age, r_m_occupation, r_m_address, r_siblings
        FROM  tbl_rogue_gallery
		ORDER BY r_name";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, $queryString);

?> 
<form action="processRogue.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">

<br>

  <article class="module width_full">
			<header><h3><?php echo $pagingLink;?></h3></header>
			<div class="module_content">


 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text" bgcolor="#FFFFFF">
    <tr> 
   <td colspan="5" align="center">
   </td>
  </tr>
  <?php
$parentId = 0;
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
		extract($row);
		
		if ($r_image) {
			$r_image = WEB_ROOT . 'images/rogue_gallery/' . $r_image;
		} else {
			$r_image = WEB_ROOT . 'images/no-image-large.png';
		}	
		
		if ($r_image2) {
			$r_image2 = WEB_ROOT . 'images/rogue_gallery/' . $r_image2;
		} else {
			$r_image2 = WEB_ROOT . 'images/no-image-large.png';
		}	
		
		if ($r_image3) {
			$r_image3 = WEB_ROOT . 'images/rogue_gallery/' . $r_image3;
		} else {
			$r_image3 = WEB_ROOT . 'images/no-image-large.png';
		}	
		
		
		
		if ($i%2) {
			$class = 'row1';
		} else {
			$class = 'row2';
		}
		
		$i += 1;
?> 
  <tr align="center" class="entryTable"> 
  <th colspan="2">Image
  <tr valign="top"> 
   <td align="center" colspan="2"><a href="../rogue_gallery/index.php?view=detail&policeId=<?php echo $r_id; ?>"><img src="<?php echo $r_image; ?>" width="100%" border="0"></a></td>
   <tr>
   <tr>
   <td align="center" valign="top"><img src="<?php echo $r_image2; ?>" width="300"></td>
   <td align="center" valign="top"><img src="<?php echo $r_image3; ?>" width="300"></td>
<tr>
   <td colspan="2">
   <table width="100%">
   <tr class="row1">
   <td><strong>Name:</strong> <?php echo $r_name; ?>
   <tr class="row2">
   <td><strong>Alias:</strong><?php echo $r_alias; ?>
   <tr class="row1">
   <td><strong>Age:</strong><?php echo $r_age; ?>
   <tr class="row2">
   <td><strong>Sex:</strong><?php echo $r_sex; ?>
   <tr class="row1">
   <td><strong>Modus Operandi:</strong><?php echo $r_modus; ?>
   <tr class="row1">
   <td> <a href="../rogue_gallery/index.php?view=detail&policeId=<?php echo $r_id; ?>">View Detail</a> || <a href="javascript:modifyRogue(<?php echo $r_id; ?>);">Modify</a> || <a href="javascript:deleteRogue(<?php echo $r_id; ?>);">Delete</a>
   </table>
   
  <td>&nbsp;
  <?php

  
	} // end while
?>

<?php	
} else {
?>
  <tr> 
   <td colspan="5" align="center">Rogue gallery return zero result</td>
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
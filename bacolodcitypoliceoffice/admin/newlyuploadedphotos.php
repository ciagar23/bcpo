<?
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	
$rowsPerPage = 10;

//to count the number of blotted	

$sql = "SELECT r_id, r_image, r_thumbnail, r_thumbnail2, r_thumbnail3, r_name, r_alias, r_age, r_sex, r_citizenship, r_dob, r_pob, r_p_address, r_address, r_occupation, r_g_affilation, r_modus, r_area_opn, r_height, r_weight, r_build, r_complexion, r_hair, r_eyes, r_others, r_s_name, r_s_alias, r_s_age, r_s_sex, r_s_citizenship, r_s_dob, r_s_pob, r_s_p_address, r_s_address, r_s_occupation, r_s_g_affilation, r_s_modus, r_f_name, r_f_age, r_f_occupation, r_f_address, r_m_name, r_m_age, r_m_occupation, r_m_address, r_siblings,r_datewanted
        FROM  tbl_rogue_gallery where r_mostwanted='no'
		ORDER BY r_id desc";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);

?> 
<form action="processRogue.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">

<br>
<table border="0" align="center" cellpadding="2" cellspacing="1" class="text" width="70%">

	<tr>
		<td colspan="5" class="mstitle"> RECENTLY ADDED TO ROGUE GALLERY </td>
	</tr>

	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
  
  	<?php
	$parentId = 0;
	if (dbNumRows($result) > 0) 
		{
		$i = 0;
		
		while($row = dbFetchAssoc($result)) 
			{
			extract($row);
			
			if ($r_thumbnail) 
				{
				$r_thumbnail = WEB_ROOT . 'images/rogue_gallery/' . $r_thumbnail;
				$r_image = WEB_ROOT . 'images/rogue_gallery/' . $r_image;
				} 
				
				else 
					{
					$r_thumbnail = WEB_ROOT . 'images/no-image-small.png';
					$r_image = WEB_ROOT . 'images/no-image-large.png';
					}	
			
			if ($r_thumbnail2) 
				{
				$r_thumbnail2 = WEB_ROOT . 'images/rogue_gallery/' . $r_thumbnail2;
				} 
				
				else 
					{
					$r_thumbnail2 = WEB_ROOT . 'images/no-image-small.png';
					}	
			
			if ($r_thumbnail3) 
				{
				$r_thumbnail3 = WEB_ROOT . 'images/rogue_gallery/' . $r_thumbnail3;
				} 
				
				else 
					{
					$r_thumbnail3 = WEB_ROOT . 'images/no-image-small.png';
					}	
			
			
			
			if ($i%2) 
				{
				$class = 'row1';
				} 
				
				else 
					{
					$class = 'row2';
					}
	
			$i += 1;
			if ($i%5)
			
	{
	$enter= ' ';
	}
	
	else
		{
		$enter= '<tr>';
		}
	?> 
		<!--- PIX --->
		<td width="100" valign="top"><a href="<?php echo $r_image; ?>" rel="lightbox[roadtrip<? echo $i;?>]"><img src="<?php echo $r_thumbnail; ?>" class="mspix"></a><br>
		<a href=<? echo WEB_ROOT;?>admin/rogue_gallery/index.php?view=detail&policeId=<? echo $r_id;?>><div class="msname"><? echo $r_name;?></div></a></td>
   		<? echo $enter;?>

<?php

	} // end while
?>

	<!--- PAGE LINK --->
	<tr> 
   		<td colspan="5" align="center" class="next"><br><?php echo $pagingLink; ?></td>
  	</tr>
	
<?php	
	} 
	else 
	{
?>

  <?php
}
?>
  	<tr> 
   		<td colspan="5">&nbsp;</td>
  	</tr>
	
  	<tr> 
   		<td colspan="5" align="right"></td>
  	</tr>
	

			
		</td>
	</tr>
</table>
</form>
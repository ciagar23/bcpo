<?
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	
$rowsPerPage = 10;

//to count the number of blotted	



$sql = "SELECT m_id, m_name, m_date, m_birthdate, m_gender, m_reward, m_eyes,m_hair, m_height, m_weight,m_age, m_contact, m_contactNum, m_address, m_thumbnail, m_image, m_citizenship, m_birthplace, m_caddress, m_complexion, m_mark, m_status, m_found
        FROM  tbl_missing where m_found='no'
		ORDER BY m_id desc";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);

?> 
<form action="processRogue.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">

<br>
<table border="0" align="center" cellpadding="2" cellspacing="1" class="text" width="70%">

	<tr>
		<td colspan="5" class="mstitle"> Missing Person </td>
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
			
			if ($m_thumbnail) 
				{
				$m_thumbnail = WEB_ROOT . 'images/missing/' . $m_thumbnail;
				$m_image = WEB_ROOT . 'images/missing/' . $m_image;
				} 
				
				else 
					{
					$m_thumbnail = WEB_ROOT . 'images/no-image-small.png';
					$m_image = WEB_ROOT . 'images/no-image-large.png';
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
		<td width="100" valign="top"><a href="<?php echo $m_image; ?>" rel="lightbox[roadtrip<? echo $i;?>]"><img src="<?php echo $m_thumbnail; ?>" class="mspix"></a><br>
		<a href=<? echo WEB_ROOT;?>admin/missing/index.php?view=detail&policeId=<? echo $m_id;?>><div class="msname"><? echo $m_name;?></div></a></td>
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
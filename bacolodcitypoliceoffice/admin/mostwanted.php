<?
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	
$rowsPerPage = 10;

//to count the number of blotted	



$sql = "SELECT w_id, w_name, w_alias, w_casenumber, w_dob, w_pob, w_height, w_weight, w_address, w_caption, w_gender, w_warrant, w_crime, w_age, w_captured, w_datenow, w_image, w_thumbnail, w_reward, w_citizenship, w_eyes, w_hair, w_complexion, w_mark
        FROM  tbl_wanted
		ORDER BY w_id desc";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);

?> 
<form action="processRogue.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">

<br>
<table border="0" align="center" cellpadding="2" cellspacing="1" class="text" width="70%">

	<tr>
		<td colspan="5" class="mstitle"> MOST WANTED </td>
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
			
			if ($w_thumbnail) 
				{
				$w_thumbnail = WEB_ROOT . 'images/wanted/' . $w_thumbnail;
				$w_image = WEB_ROOT . 'images/wanted/' . $w_image;
				} 
				
				else 
					{
					$w_thumbnail = WEB_ROOT . 'images/no-image-small.png';
					$w_image = WEB_ROOT . 'images/no-image-large.png';
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
		<td width="100" valign="top"><a href="<?php echo $w_image; ?>" rel="lightbox[roadtrip<? echo $i;?>]"><img src="<?php echo $w_thumbnail; ?>" class="mspix"></a><br>
		<a href=<? echo WEB_ROOT;?>admin/wanted/index.php?view=detail&policeId=<? echo $w_id;?>><div class="msname"><? echo $w_name;?></div></a></td>
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
<div align="center">
<input name="btnCancel" type="button" id="btnCancel" value="Back" onClick="window.history.back();" class="box"> </div>

</form>
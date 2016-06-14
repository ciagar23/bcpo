<h3><a href='<?php echo WEB_ROOT;?>website/crimeinfo/index.php?view=crimeincident'> Statistic</a> ||
 <a href='<?php echo WEB_ROOT;?>website/index.php?view=mostwantedall'>Most Wanted</a> ||
  <a href='<?php echo WEB_ROOT;?>website/index.php?view=missingall'>Missing Persons</a> ||
  <a href='<?php echo WEB_ROOT;?>website/crimeinfo/index.php?view=crimerate'>Crime Rate</a></h3><?
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
$rowsPerPage = 50;

//to count the number of blotted	

$sql = "SELECT w_id, w_name, w_alias, w_casenumber, w_dob, w_pob, w_height, w_weight, w_address, w_caption, w_gender, w_warrant, w_crime, w_age, w_captured, w_datenow, w_image, w_thumbnail, w_reward, w_citizenship, w_eyes, w_hair, w_complexion, w_mark
        FROM  tbl_wanted
		ORDER BY w_id desc";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage);

?> 
<form action="processRogue.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">

<br>
<table border="0" cellpadding="2" cellspacing="1" class="text" bgcolor="#CC9900">

	<tr bgcolor="#FFFFFF">
		<td colspan="3" align="center"><h2> Most Wanted </h2></td>
	<tr bgcolor="#FFFFFF">
  
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
			if ($i%3)
			
		{
		$enter= ' ';
		}
	
else
	{
	$enter= '<tr bgcolor="#FFFFFF">';
	}
	?> 
	
	<td width="75" align="center"><a href="<?php echo $w_image; ?>" rel="lightbox[roadtrip<? echo $i;?>]"><img src="<?php echo $w_thumbnail; ?>" height="100"></a><br><a href="index.php?view=wanteddetail&policeId=<? echo $w_id;?>"><? echo $w_name;?></a></td>
   <? echo $enter;?>

  <?php

	} // end while

} 

	else 
		{
		?>
		  <tr> 
		   <td colspan="5" align="center"> No Wanted Person </td>
		  </tr>
		  <?php
		}
?>

	<tr bgcolor="#FFFFFF"> 
   		<td colspan="5">&nbsp;</td>
  	</tr>
  
  	<tr bgcolor="#FFFFFF"> 
   		<td colspan="5" align="right"></td>
  	</tr>
	
</table>
<p>&nbsp;</p>
</form>
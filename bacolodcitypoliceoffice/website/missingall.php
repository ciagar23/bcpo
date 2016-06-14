<h3><a href='<?php echo WEB_ROOT;?>website/crimeinfo/index.php?view=crimeincident'> Statistic</a> ||
 <a href='<?php echo WEB_ROOT;?>website/index.php?view=mostwantedall'>Most Wanted</a> ||
  <a href='<?php echo WEB_ROOT;?>website/index.php?view=missingall'>Missing Persons</a> ||
  <a href='<?php echo WEB_ROOT;?>website/crimeinfo/index.php?view=crimerate'>Crime Rate</a></h3>
  <?
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
$rowsPerPage = 50;

//to count the number of blotted	

$sql = "SELECT m_id, m_name, m_date, m_birthdate, m_gender, m_reward, m_eyes,m_hair, m_height, m_weight,m_age, m_contact, m_contactNum, m_address, m_thumbnail, m_image, m_citizenship, m_birthplace, m_caddress, m_complexion, m_mark, m_status, m_found
        FROM  tbl_missing where m_found='no'
		ORDER BY m_id desc";
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
			if ($i%3)
			
		{
		$enter= ' ';
		}
	
else
	{
	$enter= '<tr bgcolor="#FFFFFF">';
	}
	?> 
	
	<td width="75" align="center"><a href="<?php echo $m_image; ?>" rel="lightbox[roadtrip<? echo $i;?>]"><img src="<?php echo $m_thumbnail; ?>" height="100"></a><br><a href="index.php?view=missingdetail&policeId=<? echo $m_id;?>"><? echo $m_name;?></a></td>
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
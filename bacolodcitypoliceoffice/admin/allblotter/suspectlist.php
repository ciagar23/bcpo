<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	
	$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
	if ($errorMessage == '')
		{
		$errorMessage = '';
		}
		
		else
			{
			$errorMessage ='<script> alert("'.$errorMessage.'") </script>';
			}

$rowsPerPage = 10;

$sql = "SELECT of_id, of_bl_id, of_name, of_aka, of_alias, of_address, of_casestatus, of_gender, of_height, of_weight, of_birthplace, of_birthdate, of_haircolor, of_occupation, of_mark, of_gang, of_influence, of_disposition, of_nat
        FROM tbl_offender
		WHERE of_bl_id='$policeId'
		ORDER BY of_id";
	
$resultcount = mysql_query($sql);
$total = mysql_num_rows($resultcount);

$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');
?> 

<table width="100%"  class="smallfont"  border="0" align="center" cellspacing="2">
      <tr>
        <td class="tdcolor" valign="top"><font class="form">15. Number of Suspects:</font> <? echo $total;?> </td>
        <td class="tdcolor" >&nbsp;</td>
        </tr>
      <tr>
        <td class="tdcolor" colspan="2">
  <?php
if (dbNumRows($result) > 0) 
	{
	$i = 0;
	
	while($row = dbFetchAssoc($result)) 
		{
		extract($row);
			
		
		if ($i%2) 
			{
			$class = 'row1';
			} 
			
			else 
				{
				$class = 'row2';
				}
			
		$i += 1;
?>
	<table  class="smallfont"  border="0" align="center" cellspacing="2">
  <tr>
    <td class='tdcolor' width="174">&nbsp;</td>
    <td class='tdcolor' width="468"><font class="form">Address:</font> <br><? echo $of_address;?> </td>
    <td class='tdcolor' width="284"><font class="form">Birthplace:</font> <br><? echo $of_birthplace;?></td>
    <td class='tdcolor' width="264"><font class="form">Distinguishing Marks:</font>  <br><? echo $of_mark;?></td>
  </tr>
  <tr>
    <td class='tdcolor' rowspan="2"><font class="form">Name:</font><br><? echo $of_name;?><br><font class="form">A.K.A:</font><br><? echo $of_aka;?><br><font class="form">Alias:</font><br><? echo $of_alias;?> </td>
    <td class='tdcolor'><table width="100%"  class="smallfont" border="0" align="center" cellspacing="2">
      <tr>
        <td class='tdcolor' ><font class="form">Sex:</font>  <br><? echo $of_gender;?></td>
        <td class='tdcolor' ><font class="form">Height:</font>  <br><? echo $of_height;?></td>
        <td class='tdcolor' ><font class="form">Weight:</font>  <br><? echo $of_weight;?></td>
        <td class='tdcolor' ><font class="form">Birthplace:</font> <br><? echo $of_birthplace;?></td>
      </tr>
    </table></td>
    <td class='tdcolor'>
	<table width="100%"  class="smallfont"  border="0" align="center" cellspacing="2">
      <tr>
        <td class='tdcolor' ><font class="form">Hair Color:</font>  <br><? echo $of_haircolor;?></td>
        <td class='tdcolor' ><font class="form">Occupation:</font> <br><? echo $of_occupation;?> </td>
      </tr>
    </table></td>
    <td class='tdcolor'><font class="form">Nationality:</font> <br><? echo $of_nat;?> </td>
  </tr>
  <tr>
    <td class='tdcolor' height="36"><table width="100%"  class="smallfont"  border="0" align="center" cellspacing="2">
      <tr>
        <td class='tdcolor'  height="24"><font class="form">Gangs/Syndicate Con Previous Criminal Record:</font> <br><? echo $of_gang;?></td>
      </tr>
      <tr>
        <td class='tdcolor' align="left"><font class="form">Status:</font> <br><? echo $of_casestatus;?></td>
      </tr>
    </table></td>
    <td class='tdcolor' valign="top"><font class="form"> Drug Use/Influence of Alcohol:</font> <br>
    <? echo $of_influence;?> </td>
    <td class='tdcolor' valign="top"><font class="form">Disposition:</font> <br><? echo $of_disposition;?></td>
  </tr>
</table>
  <?php
	} // end while
?>
	<table><tr> 
  	 	<td class='tdcolor' colspan="5" align="center" class="next"><?php echo $pagingLink;?></td>
  	</tr>
<?php	
} else {
?>
  	<tr> 
  		 <td class='tdcolor' colspan="5" align="center"> No Suspect </td>
  	</tr>
  <?php
}
?>

</table>
 <p>&nbsp;</p>
</form>
<? echo $errorMessage;?>
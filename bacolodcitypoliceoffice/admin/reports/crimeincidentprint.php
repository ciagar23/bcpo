<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	$stats = (isset($_GET['stats']) && $_GET['stats'] != '') ? $_GET['stats'] : '';
	$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
	if ($errorMessage == '')
{
$errorMessage = '';
}
else
{
$errorMessage ='<script> alert("'.$errorMessage.'") </script>';
}

$rowsPerPage = 20;
$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);	
		$station= $row['user_station'];
		
$from = (isset($_GET['txtfrom2']) && $_GET['txtfrom2'] != '') ? $_GET['txtfrom2'] : '';
		$to = (isset($_GET['txtto2']) && $_GET['txtto2'] != '') ? $_GET['txtto2'] : '';
		
		$Murder = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Murder'"));		

		$Homicide = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Homicide'"));		

		$Mauling = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Mauling'"));		

		$Stabbing = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Stabbing'"));		

		$Shooting = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Shooting'"));		

		$Holdup = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Hold Up'"));		

		$Akyatbahay = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Akyat Bahay'"));		

		$Estafa = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Estafa'"));		

		$Theft = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Theft'"));		

		$Bukaskotse = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Bukas Kotse'"));		

		$Shoplifting = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Shoplifting'"));		

		$Pickpocket = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Pickpocket'"));		

		$Salisi = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Salisi'"));		

		$Budolbudol = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Budol-Budol'"));		

		$Snatching = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Snatching'"));		

		$Cellphone = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Cellphone Snatching'"));		
		
		$totalindex = $Murder + $Homicide + $Mauling + $Stabbing + $Shooting + $Holdup + $Akyatbahay + $Estafa + $Theft + $Bukaskotse + $Shoplifting + $Pickpocket + $Salisi + $Budolbudol + $Snatching + $Cellphone;

		$Threat = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Threat'"));		

		$Coercion = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Coercion'"));		

		$Abduction = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Abduction'"));		

		$Domicile = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Violation of Domicile'"));		

		$Defamation = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Oral Defamation'"));		

		$Alarm = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Alarm and Scandal'"));		

		$Slander = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Slander by Deed'"));		

		$Libel = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Libel'"));		

		$totalnonindex = $Threat + $Coercion + $Abduction + $Domicile + $Defamation + $Alarm + $Slander + $Libel;
		
		$Drugs = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='RA 9165 (Drugs)'"));		

		$FA = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='RA 8294 (FA)'"));		

		$Gambling = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='RA 9287 (Gambling)'"));		

		$Rugby = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='RA 1619 (Rugby)'"));		

		$Deadly = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='RA 6 (Deadly Weapon)'"));		

		$Carnapping = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='RA 9287 (Carnapping)'"));	
		
		$Intel = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='RA 8293 (Intel Prop)'"));	
		
		$Vagrancy = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Vagrancy (ART 202)'"));	
		
		$Porno = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Porno Mat. (art 201)'"));	
		
		$Wanted = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to' and bl_crime='Wanted Person'"));		
		
		$totalviolation = $Drugs + $FA + $Gambling + $Rugby + $Deadly + $Carnapping + $Intel + $Vagrancy + $Porno + $Wanted;

//to count the number of blotted		
$resultcount = mysql_query($sql);
$total = mysql_num_rows($resultcount);
//
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');
?> 
<table width="500" border="0" cellspacing="2" align="center" bgcolor="#FFFFFF">
  <tr>
    <td align="center">
	<strong>Crime Statistics </strong><br>
	<table width="500" border="0" cellspacing="2">
      <tr>
        <th align="right">Murder</th>
        <td>&nbsp;<? echo $Murder;?></td>
        <th align="right">Theft</th>
        <td>&nbsp;<? echo $Theft;?></td>
      </tr>
      <tr>
        <th align="right">Homicide</th>
        <td>&nbsp;<? echo $Homicide;?></td>
        <th align="right">Bukas Kotse </th>
        <td>&nbsp;<? echo $Bukaskotse;?></td>
      </tr>
      <tr>
        <th align="right">Mauling</th>
        <td>&nbsp;<? echo $Mauling;?></td>
        <th align="right">Shoplifting</th>
        <td>&nbsp;<? echo $Shoplifting;?></td>
      </tr>
      <tr>
        <th align="right">Stabbing</th>
        <td>&nbsp;<? echo $Stabbing;?></td>
        <th align="right">Pickpocket</th>
        <td>&nbsp;<? echo $Pickpocket;?></td>
      </tr>
      <tr>
        <th align="right">Shooting</th>
        <td>&nbsp;<? echo $Shooting;?></td>
        <th align="right">Salisi</th>
        <td>&nbsp;<? echo $Salisi;?></td>
      </tr>
      <tr>
        <th align="right">Hold-Up</th>
        <td>&nbsp;<? echo $Holdup;?></td>
        <th align="right">Budol-Budol</th>
        <td>&nbsp;<? echo $Budolbudol;?></td>
      </tr>
      <tr>
        <th align="right">Akyat Bahay </th>
        <td>&nbsp;<? echo $Akyatbahay;?></td>
        <th align="right">Snatching</th>
        <td>&nbsp;<? echo $Snatching;?></td>
      </tr>
      <tr>
        <th align="right">Estafa</th>
        <td>&nbsp;<? echo $Estafa;?></td>
        <th align="right">Cellphone Snatching </th>
        <td>&nbsp;<? echo $Cellphone;?></td>
      </tr>
      <tr>
        <th colspan="4">Total:<? echo $totalindex;?></th>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center">
	<strong>Non-Index Crime	</strong><br><table width="500" border="0" cellspacing="2">
      <tr>
        <th align="right">Threat</th>
        <td>&nbsp;<? echo $Threat;?></td>
        <th align="right">Oral Defamation </th>
        <td>&nbsp;<? echo $Defamation;?></td>
      </tr>
      <tr>
        <th align="right">Coercion</th>
        <td>&nbsp;<? echo $Coercion;?></td>
        <th align="right">Alarm/Scandal</th>
        <td>&nbsp;<? echo $Alarm;?></td>
      </tr>
      <tr>
        <th align="right">Abduction</th>
        <td>&nbsp;<? echo $Abduction;?></td>
        <th align="right">Slander by Deed </th>
        <td>&nbsp;<? echo $Slander;?></td>
      </tr>
      <tr>
        <th align="right">Viol. of Domicile </th>
        <td>&nbsp;<? echo $Domicile;?></td>
        <th align="right">Libel</th>
        <td>&nbsp;<? echo $Libel;?></td>
      </tr>
      <tr>
        <th colspan="4" align="center">Total:<? echo $totalnonindex;?></th>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center">
	<strong>Violation of Special Laws</strong><br>
	<table width="500" border="0" cellspacing="2">
      <tr>
        <th align="right">RA 9165 (Drugs) </th>
        <td>&nbsp;<? echo $Drugs;?></td>
        <th align="right">RA 9287 (Carnapping) </th>
        <td>&nbsp;<? echo $Carnapping;?></td>
      </tr>
      <tr>
        <th align="right">RA 8294 (FA) </th>
        <td>&nbsp;<? echo $FA;?></td>
        <th align="right">RA 8293 (Intel Prop) </th>
        <td>&nbsp;<? echo $Intel;?></td>
      </tr>
      <tr>
        <th align="right">RA 9287 (Gambling) </th>
        <td>&nbsp;<? echo $Gambling;?></td>
        <th align="right">Vagrancy (ART 202) </th>
        <td>&nbsp;<? echo $Vagrancy;?></td>
      </tr>
      <tr>
        <th align="right">RA 1619 (Rugby) </th>
        <td>&nbsp;<? echo $Rugby;?></td>
        <th align="right">Porno Mat. (art 201) </th>
        <td>&nbsp;<? echo $Porno;?></td>
      </tr>
      <tr>
        <th align="right">RA 6 (Deadly Weapon) </th>
        <td>&nbsp;<? echo $Deadly;?></td>
        <th align="right">Wanted Person </th>
        <td>&nbsp;<? echo $Wanted;?></td>
      </tr>
      <tr>
        <th colspan="4" align="center">Total:<? echo $totalviolation;?></th>
        </tr>
    </table></td>
  </tr>
</table>
 </p>
</form>
<script language="javascript">

window.print()
window.close()
window.location ='index.php?view=crimeincident&txtfrom2=<? echo $from;?>&txtto2=<? echo $to?>';


</script>
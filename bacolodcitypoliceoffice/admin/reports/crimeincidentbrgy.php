<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	$txtbrgy = (isset($_GET['txtbrgy']) && $_GET['txtbrgy'] != '') ? $_GET['txtbrgy'] : '';
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
		
$from = (isset($_GET['txtfrombr']) && $_GET['txtfrombr'] != '') ? $_GET['txtfrombr'] : '';
		$to = (isset($_GET['txttobr']) && $_GET['txttobr'] != '') ? $_GET['txttobr'] : '';
$department = (isset($_GET['department']) && $_GET['department'] != '') ? $_GET['department'] : '';
if($department == 'All')
{
$query ='';
}
else
{
$query ="bl_brgy='".$txtbrgy."' and";
}
		
		$Murder = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Murder'"));		

		$Homicide = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Homicide'"));		

		$Mauling = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Mauling'"));		

		$Stabbing = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Stabbing'"));		

		$Shooting = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Shooting'"));		

		$Holdup = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Hold Up'"));		

		$Akyatbahay = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Akyat Bahay'"));		

		$Estafa = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Estafa'"));		

		$Theft = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Theft'"));		

		$Bukaskotse = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Bukas Kotse'"));		

		$Shoplifting = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Shoplifting'"));		

		$Pickpocket = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Pickpocket'"));		

		$Salisi = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Salisi'"));		

		$Budolbudol = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Budol-Budol'"));		

		$Snatching = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Snatching'"));		

		$Cellphone = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Cellphone Snatching'"));		
		
		$totalindex = $Murder + $Homicide + $Mauling + $Stabbing + $Shooting + $Holdup + $Akyatbahay + $Estafa + $Theft + $Bukaskotse + $Shoplifting + $Pickpocket + $Salisi + $Budolbudol + $Snatching + $Cellphone;

		$Threat = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Threat'"));		

		$Coercion = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Coercion'"));		

		$Abduction = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Abduction'"));		

		$Domicile = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Violation of Domicile'"));		

		$Defamation = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Oral Defamation'"));		

		$Alarm = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Alarm and Scandal'"));		

		$Slander = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Slander by Deed'"));		

		$Libel = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Libel'"));		

		$totalnonindex = $Threat + $Coercion + $Abduction + $Domicile + $Defamation + $Alarm + $Slander + $Libel;
		
		$Drugs = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='RA 9165 (Drugs)'"));		

		$FA = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='RA 8294 (FA)'"));		

		$Gambling = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='RA 9287 (Gambling)'"));		

		$Rugby = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='RA 1619 (Rugby)'"));		

		$Deadly = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='RA 6 (Deadly Weapon)'"));		

		$Carnapping = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='RA 9287 (Carnapping)'"));	
		
		$Intel = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='RA 8293 (Intel Prop)'"));	
		
		$Vagrancy = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Vagrancy (ART 202)'"));	
		
		$Porno = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Porno Mat. (art 201)'"));	
		
		$Wanted = mysql_num_rows(mysql_query("SELECT * FROM tbl_blotter 
		where $query  bl_date >= '$from' and bl_date <= '$to' and bl_crime='Wanted Person'"));		
		
		$totalviolation = $Drugs + $FA + $Gambling + $Rugby + $Deadly + $Carnapping + $Intel + $Vagrancy + $Porno + $Wanted;

//to count the number of blotted		
$resultcount = mysql_query($sql);
$total = mysql_num_rows($resultcount);
//
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');
?> 

        <h1><center><?php echo $txtbrgy. ' Records from '.$from.' to '.$to;?></center></h1>
<article class="module width_full">
		<header><h3 class="tabs_involved">Crime Statistics / Index Crime | Total:<? echo $totalindex;?></h3>
		</header>

		<div class="tab_container">
    
    
	<table width="500" align="center" border="0" cellspacing="2">
      <tr>
        <th align="right">A. Murder </th>
        <td>&nbsp;<? echo $Murder;?></td>
        <th align="right">I. Theft </th>
        <td>&nbsp;<? echo $Theft;?></td>
      </tr>
      <tr>
        <th align="right">B. Homicide </th>
        <td>&nbsp;<? echo $Homicide;?></td>
        <th align="right">J. Bukas Kotse  </th>
        <td>&nbsp;<? echo $Bukaskotse;?></td>
      </tr>
      <tr>
        <th align="right">C. Mauling </th>
        <td>&nbsp;<? echo $Mauling;?></td>
        <th align="right">K. Shoplifting </th>
        <td>&nbsp;<? echo $Shoplifting;?></td>
      </tr>
      <tr>
        <th align="right">D. Stabbing </th>
        <td>&nbsp;<? echo $Stabbing;?></td>
        <th align="right">L. Pickpocket </th>
        <td>&nbsp;<? echo $Pickpocket;?></td>
      </tr>
      <tr>
        <th align="right">E. Shooting </th>
        <td>&nbsp;<? echo $Shooting;?></td>
        <th align="right">M. Salisi </th>
        <td>&nbsp;<? echo $Salisi;?></td>
      </tr>
      <tr>
        <th align="right">F. Hold-Up </th>
        <td>&nbsp;<? echo $Holdup;?></td>
        <th align="right">N. Budol-Budol </th>
        <td>&nbsp;<? echo $Budolbudol;?></td>
      </tr>
      <tr>
        <th align="right">G. Akyat Bahay  </th>
        <td>&nbsp;<? echo $Akyatbahay;?></td>
        <th align="right">O. Snatching </th>
        <td>&nbsp;<? echo $Snatching;?></td>
      </tr>
      <tr>
        <th align="right">H. Estafa </th>
        <td>&nbsp;<? echo $Estafa;?></td>
        <th align="right">P. Cellphone Snatching  </th>
        <td>&nbsp;<? echo $Cellphone;?></td>
      </tr>
      <tr>
        <th colspan="4">
    
    
    <!--<img src="<?php echo WEB_ROOT;?>admin/include/pie.php?data=4*4*4*4*4*4*4*4*4*4*4*6*4*4*10*6&label=Parking on reserved Area*Blocking the Driveway*Double Parking*Wrong Parking*Violating the Parking Sign*Reckless Driving" /> -->
<br>
<br>
    <img src="<?php echo WEB_ROOT;?>admin/include/bar.php?A=<? echo $Murder;?>&B=<? echo $Homicide;?>&C=<? echo $Mauling;?>&D=<? echo $Stabbing;?>&E=<? echo $Shooting;?>&F=<? echo $Holdup;?>&G=<? echo $Akyatbahay;?>&H=<? echo $Estafa;?>&I=<? echo $Theft;?>&J=<? echo $Bukaskotse;?>&K=<? echo $Shoplifting;?>&L=<? echo $Pickpocket;?>&M=<? echo $Salisi;?>&N=<? echo $Budolbudol;?>&O=<? echo $Snatching;?>&P=<? echo $Cellphone;?>" width=500>
    
    <br>
    <br>
    </th>
        </tr>
    </table>
    </div>
    </article>
    <article class="module width_full">
		<header><h3 class="tabs_involved">Non-Index Crime | Total:<? echo $totalnonindex;?></h3>
		</header>

		<div class="tab_container">
    
<table width="500" align="center" border="0" cellspacing="2">
      <tr>
        <th align="right">A. Threat</th>
        <td>&nbsp;<? echo $Threat;?></td>
        <th align="right">E. Oral Defamation </th>
        <td>&nbsp;<? echo $Defamation;?></td>
      </tr>
      <tr>
        <th align="right">B. Coercion</th>
        <td>&nbsp;<? echo $Coercion;?></td>
        <th align="right">F. Alarm/Scandal</th>
        <td>&nbsp;<? echo $Alarm;?></td>
      </tr>
      <tr>
        <th align="right">C. Abduction</th>
        <td>&nbsp;<? echo $Abduction;?></td>
        <th align="right">G. Slander by Deed </th>
        <td>&nbsp;<? echo $Slander;?></td>
      </tr>
      <tr>
        <th align="right">D. Viol. of Domicile </th>
        <td>&nbsp;<? echo $Domicile;?></td>
        <th align="right">H. Libel</th>
        <td>&nbsp;<? echo $Libel;?></td>
      </tr>
      <tr>
        <th colspan="4" align="center"></th>

      <tr>
        <th colspan="4" align="center">
        <br>
<br>
    <img src="<?php echo WEB_ROOT;?>admin/include/bar2.php?A=<? echo $Threat;?>&B=<? echo $Coercion;?>&C=<? echo $Abduction;?>&D=<? echo $Domicile;?>&E=<? echo $Defamation;?>&F=<? echo $Alarm;?>&G=<? echo $Slander;?>&H=<? echo $Libel;?>" width=500>
    
    <br>
    <br>
        </tr>
    </table></td>
    
    </div>
    </article>
    <article class="module width_full">
		<header><h3 class="tabs_involved">Violation of Special Laws | Total:<? echo $totalviolation;?></h3>
		</header>

		<div class="tab_container">
    
	<table width="500" align="center" border="0" cellspacing="2">
      <tr>
        <th align="right">A. RA 9165 (Drugs) </th>
        <td>&nbsp;<? echo $Drugs;?></td>
        <th align="right">F. RA 9287 (Carnapping) </th>
        <td>&nbsp;<? echo $Carnapping;?></td>
      </tr>
      <tr>
        <th align="right">B. RA 8294 (FA) </th>
        <td>&nbsp;<? echo $FA;?></td>
        <th align="right">G. RA 8293 (Intel Prop) </th>
        <td>&nbsp;<? echo $Intel;?></td>
      </tr>
      <tr>
        <th align="right">C. RA 9287 (Gambling) </th>
        <td>&nbsp;<? echo $Gambling;?></td>
        <th align="right">H. Vagrancy (ART 202) </th>
        <td>&nbsp;<? echo $Vagrancy;?></td>
      </tr>
      <tr>
        <th align="right">D. RA 1619 (Rugby) </th>
        <td>&nbsp;<? echo $Rugby;?></td>
        <th align="right">I. Porno Mat. (art 201) </th>
        <td>&nbsp;<? echo $Porno;?></td>
      </tr>
      <tr>
        <th align="right">E. RA 6 (Deadly Weapon) </th>
        <td>&nbsp;<? echo $Deadly;?></td>
        <th align="right">J. Wanted Person </th>
        <td>&nbsp;<? echo $Wanted;?></td>
      </tr>
      <tr>
        <th colspan="4" align="center"></th>
          <tr>
        <th colspan="4" align="center">
        <br>
<br>
    <img src="<?php echo WEB_ROOT;?>admin/include/bar3.php?A=<? echo $Drugs;?>&B=<? echo $FA;?>&C=<? echo $Gambling;?>&D=<? echo $Rugby;?>&E=<? echo $Deadly;?>&F=<? echo $Carnapping;?>&G=<? echo $Intel;?>&H=<? echo $Vagrancy;?>&I=<? echo $Porno;?>&J=<? echo $Wanted;?>" width=500>
    
    <br>
    <br>
        </tr>
    </table></td>
  </tr>
</table>
<div align="center">
   <input name="btnAddUser" type="button" id="btnAddUser" value="Back" class="box" onclick="window.history.back();" />
   <input name="btnAddUser" type="button" id="btnAddUser" value="Print" class="box" onclick="window.location='listnew.php?view=crimeincidentprint&txtfrom2=<? echo $from;?>&txtto2=<? echo $to?>';" />
</div>
</form>
<? echo $errorMessage;?>
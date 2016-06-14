<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

// make sure a Blotter id exists
if (isset($_GET['policeId']) && $_GET['policeId'] > 0) 
	{
	$policeId = $_GET['policeId'];
	} 
	
	else 
		{
		// redirect to index.php if Blotter id is not present
		header('Location: index.php');
		}
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
if ($error == '')
{
$error = '';
}
else
{
$error ='<script> alert("'.$error.'");
			window.location ="index.php?view=addrespondent&policeId='.$policeId.'"; </script>';
}		
	


$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cname, bl_cage, bl_cgender, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rage, bl_rgender, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury,bl_investigator, bl_dtg, bl_cnat, bl_rdrugs, bl_ralc, bl_runc, bl_rfa, bl_rnat, bl_brgy, bl_prosec, bl_court, bl_crime, bl_cstatus, bl_rstatus, bl_copy, bl_timeofincident, bl_dateofincident, bl_statusofcase, bl_rblunt, bl_rbladed, bl_rhands, bl_rpoison, bl_fakind, bl_famake, bl_facaliber, bl_faserial, bl_falicense, bl_trkind, bl_trmodel, bl_trplateno, bl_trmotorno, bl_trregno, bl_trchasisno, bl_trmakeyear, bl_calias, bl_coccupation, bl_cgender, bl_cbirthdate
        FROM tbl_blotter
		WHERE bl_id = $policeId";
		
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());

$row = mysql_fetch_assoc($result);
extract($row);
if( $bl_rdrugs !=0)
	{
	$bl_rdrugs = '* drugs <br>';
	}
	
	else
		{
		$bl_rdrugs='';
		}
if( $bl_rblunt !=0)
	{
	$bl_rblunt = '* Blunt Instrument  <br>';
	}
	
	else
		{
		$bl_rblunt='';
		}
if( $bl_rbladed !=0)
	{
	$bl_rbladed = '* Bladed Instrument <br>';
	}
	
	else
		{
		$bl_rbladed='';
		}
if( $bl_rhands !=0)
	{
	$bl_rhands = '* Hands/Feet/Fist <br>';
	}
	
	else
		{
		$bl_rhands='';
		}
if( $bl_rpoison !=0)
	{
	$bl_rpoison = '* Poison/Acid <br>';
	}
	
	else
		{
		$bl_rpoison='';
		}

if( $bl_ralc !=0)
	{
	$bl_ralc = '* alcohol  <br>';
	}
	
	else
		{
		$bl_ralc='';
		}

if( $bl_rfa !=0)
	{
	$bl_rfa = '* Fire Arms  <table class="smallfont" cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td class="tdcolor" rowspan=3>&nbsp;&nbsp;&nbsp;
    <td class="tdcolor"><font class="form">Kind:</font>'.$bl_fakind.'</td>
    <td class="tdcolor"><font class="form">Make:</font>'.$bl_famake.'</td>
  </tr>
  <tr>
    <td class="tdcolor"><font class="form">Caliber:</font>'.$bl_facaliber.'</td>
    <td class="tdcolor"><font class="form">Serial No:</font>'.$bl_faserial.'</td>
  </tr>
  <tr>
    <td class="tdcolor"><font class="form">License No:</font>'.$bl_falicense.'</td>
    <td class="tdcolor">&nbsp;</td>
  </tr>
</table>';
	
	
	
	}
	
	else
		{
		$bl_rfa='';
		}
		
if( $bl_runc !=0)
	{
	$bl_runc = '* UNC  <br>';
	}
	
	else
		{
		$bl_runc='';
		}

$useof = $bl_rblunt. $bl_rbladed . $bl_rhands . $bl_rpoison . $bl_rfa;

if($bl_copy==0)
{
$bl_copy='Initial Report(Original)';
}
else
{
$bl_copy ='Updated No. '.$bl_copy;
}

?>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
<table width="95%" height="30" border="0" align="center" class="smallfont">

  <tr>
    <td class="tdcolor"> <font class="form">NATIONAL CRIME REPORTING SYSTEM FORM 1</font> - <? echo $bl_copy;?></td>
  </tr>
  
</table><br>
<table width="95%" height="303" border="0" align="center" class="smallfont">

  <tr>
    <td class="tdcolor" rowspan="3"><font class="form">O<BR>F<BR>F<BR>E<BR>N<BR>S<BR>E
    <td class="tdcolor" ><font class="form"> 1. Case Report No:</font> <? echo $policeId;?> </td>
    <td class="tdcolor" ><font class="form"> 2. Reporting Unit:</font> <? echo strtoupper($station);?></td>
    <td class="tdcolor" ><font class="form"> 3. Time / Date of Commission:</font> <? echo $bl_dateofincident;?>, <? echo $bl_timeofincident;?></td>
    <td class="tdcolor"  colspan="3"><font class="form"> 4. Place of Commision:</font> <? echo $bl_clocation;?> </td>
  </tr>
  
  <tr>
    <td class="tdcolor" colspan="6"><font class="form">5. CLASSIFICATION OF OFFENSES:</font> <? echo $bl_crime;?> </td>
  </tr>
  
  <tr>
	<td class="tdcolor" colspan="6"><table  class="smallfont" width="100%" border="0" align="center">
		<tr valign="top">
			<td class="tdcolor"  height="30"><font class="form">6. Status of Case:</font> <? echo $bl_statusofcase;?></td>
			<td class="tdcolor" ><font class="form"> 7. Weapon(s) or Means used:</font><br> <? echo $useof;?></td>
			<td class="tdcolor" ><font class="form"> 8. Transport Used:</font> <br>
								<table class="smallfont" width="100%">
								<tr>
								<td class="tdcolor" rowspan=4>&nbsp;&nbsp;&nbsp;
								<td class="tdcolor"><font class="form">Kind:</font> <? echo $bl_trkind;?></td>
								<td class="tdcolor"><font class="form">Model:</font> <? echo $bl_trmodel;?></td>
							  </tr>
							  <tr>
								<td class="tdcolor"><font class="form">Plate No:</font> <? echo $bl_trplateno;?></td>
								<td class="tdcolor"><font class="form">Motor No:</font> <? echo $bl_trmotorno;?></td>
							  </tr>
							  <tr>
								<td class="tdcolor"><font class="form">Registration No:</font> <? echo $bl_trregno;?></td>
								<td class="tdcolor"><font class="form">Chasis No:</font> <? echo $bl_trchasisno;?></td>
							  </tr>
							  <tr>
								<td class="tdcolor"><font class="form">Make and Year:</font> <? echo $bl_trmakeyear;?></td>
								<td class="tdcolor">&nbsp;</td>
							  </tr>
							</table></td>
      	</tr>
    </table>	
	</td>
  </tr>
  
  <tr>
  <td class="tdcolor"><font class="form">V<BR>I<BR>C<BR>T<BR>I<BR>M<BR></font>
    <td class="tdcolor" colspan="6"><table  class="smallfont" width="1238" border="0" align="center">
      <tr>
        <td class="tdcolor" ><font class="form"> 9. Name:</font>  </td>
        <td class="tdcolor" ><font class="form"> 10. Alias:</font> </td>
        <td class="tdcolor" ><font class="form"> 11. Address:</font> </td>
        <td class="tdcolor" ><font class="form"> 12. Occupation:</font> </td>
        <td class="tdcolor" ><font class="form"> 13. Sex:</font> </td>
        <td class="tdcolor" ><font class="form"> 14. Birthdate:</font> </td>
      </tr>
	  
	  <tr>
        <td class="tdcolor" >&nbsp; <? echo $bl_cname;?>(Complainant)  </td>
        <td class="tdcolor" >&nbsp;  <? echo $bl_calias;?> </td>
        <td class="tdcolor" >&nbsp;  <? echo $bl_caddress;?> </td>
        <td class="tdcolor" >&nbsp;  <? echo $bl_coccupation;?> </td>
        <td class="tdcolor" >&nbsp;  <? echo $bl_cgender;?> </td>
        <td class="tdcolor" >&nbsp;  <? echo $bl_cbirthdate;?> </td>
      </tr>
    </table>	
	</td>
  </tr>
  
  <tr>
  <td class="tdcolor"><font class="form">S<BR>U<BR>S<BR>P<BR>E<BR>C<BR>T<BR></font>
    <td class="tdcolor" height="63" colspan="6">
	<? require_once 'suspectlist.php'; ?></td>
        </tr>
    </table> </td>
  </tr>
</table>
 <p align="center"> 
  
  <input name="btnModifyBlotter" type="button" id="btnModifyBlotter" value="Modify Data" onClick="window.location.href='index.php?view=addotherdata&policeId=<?php echo $policeId; ?>';" class="box">
  &nbsp;&nbsp;<input name="btnModifyBlotter" type="button" id="btnModifyBlotter" value="Add Offender" onClick="window.location.href='index.php?view=addrespondent&policeId=<?php echo $policeId; ?>';" class="box">
  &nbsp;&nbsp;
  &nbsp;&nbsp;<input name="btnModifyBlotter" type="button" id="btnModifyBlotter" value="Print" onClick="window.location.href='printindex.php?view=otherdataprint&policeId=<?php echo $policeId; ?>';" class="box">
  &nbsp;&nbsp;
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.location.href='index.php?view=detail&policeId=<?php echo $policeId; ?>';" class="box">
 </p>
</form>

<? echo $error;?>
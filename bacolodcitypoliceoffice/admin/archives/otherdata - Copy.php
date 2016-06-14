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
	


$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cname, bl_cage, bl_cgender, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rage, bl_rgender, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury,bl_investigator, bl_dtg, bl_cnat, bl_rdrugs, bl_ralc, bl_runc, bl_rfa, bl_rnat, bl_brgy, bl_prosec, bl_court, bl_crime, bl_cstatus, bl_rstatus
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
	$bl_rfa = '* F/A  <br>';
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

$useof = $bl_rdrugs . $bl_ralc. $bl_runc . $bl_rfa;
?>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
<table width="100%"  border="1" align="center">
	<tr>
		<td align="center">
		
			<table width="396" border="0">
				<tr>
					<td colspan="2" class="entryTable">	
				</tr>
				
		  		<tr class="row1">
					<td width="115">DTG:</td>
					<td width="271"><?php echo $bl_dtg; ?> 
				</tr>
				
			  	<tr class="row2">
						<td>Place:</td>
						<td>&nbsp;<?php echo $bl_clocation; ?></span></td>
			  	</tr>
				
			  	<tr class="row1">
						<td >Law Violated: </td>
						<td> &nbsp;<?php echo $bl_crime; ?></span></td>
			  	</tr>
			</table>
			
		</td>
		
		<td align="center">
			<table border="0">
				<tr>
					<td colspan="2" class="entryTable">&nbsp;</td>
				</tr>
				
			  	<tr class="row1">
					<td width="69">Brgy:</td>
					<td width="324"><?php echo $bl_brgy; ?>
			  	</tr>
				
			  	<tr class="row2">
					<td>Prosecutor:</td>
					<td><?php echo $bl_prosec; ?>
			  	</tr>
				
			 	<tr class="row1">
					<td>Court:</td>
					<td><?php echo $bl_court; ?>
			  	</tr>
			</table>
		</td>
		
		</tr>
	<tr>
		<td align="center">
		
			<table width="401" border="0">
			  	<tr>
					<td colspan="2" class="entryTable"> COMPLAINANT'S DATA: </td>
				</tr>
					
			  	<tr class="row1">
					<td width="105"> Name:</td>
					<td width="286">&nbsp;<?php echo $bl_cname; ?>        </td>
			  	</tr>
					
			  	<tr class="row2">
					<td> Age:</td>
					<td><?php echo $bl_cage; ?>
			  	</tr>
				
			  	<tr class="row1">
					<td> Gender:</td>
					<td><?php echo $bl_cgender; ?>
			  	</tr>
				
			  	<tr class="row2">
					<td> Civil Status: </td>
					<td><?php echo $bl_cstatus; ?>
			  	</tr>
				
			 	<tr class="row1">
					<td> Nationality: </td>
					<td><?php echo $bl_cnat; ?>
			  	</tr>	
			</table>
		</td>
		
		<td align="center">
		
			<table width="398" border="0">
				<tr>
					<td colspan="2" class="entryTable"> RESPONDENT'S DATA: </td>
				</tr>
				
				<tr class="row1">
					<td width="91">Name:</td>
					<td width="297"><?php echo $bl_rname; ?>      
				</tr>
				
				<tr class="row2">
					<td>Age:</td>
					<td><?php echo $bl_rage; ?>
				</tr>
				
				<tr class="row1">
					<td>Gender:</td>
					<td><?php echo $bl_rgender; ?>
				</tr>
				
				<tr class="row2">
					<td>Civil Status: </td>
					<td><?php echo $bl_rstatus; ?>
				</tr>
				
				<tr class="row1">
					<td >Nationality:</td>
					<td> <?php echo $bl_rnat; ?></td>
				</tr>
				
				<tr class="row2">
					<td >Use of: </td>
					<td><? echo $useof;?></td>
				</tr>
			</table>
			
		</td>
	</tr>
</table>
 <p align="center"> 
  
  <input name="btnModifyBlotter" type="button" id="btnModifyBlotter" value="Modify Data" onClick="window.location.href='index.php?view=addotherdata&policeId=<?php echo $policeId; ?>';" class="box">
  &nbsp;&nbsp;
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.location.href='index.php?view=detail&policeId=<?php echo $policeId; ?>';" class="box">
 </p>
</form>

<? echo $error;?>
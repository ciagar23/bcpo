<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

if (isset($_GET['policeId']) && $_GET['policeId'] > 0) 
	{
	$policeId = $_GET['policeId'];
	} 
	
	else 
		{
		header('Location: index.php');
		}

$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cname, bl_cage, bl_cgender, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rage, bl_rgender, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury,bl_investigator, bl_dtg, bl_cnat, bl_rdrugs, bl_ralc, bl_runc, bl_rfa, bl_rnat, bl_brgy, bl_prosec, bl_court, bl_crime, bl_cstatus, bl_rstatus
        FROM tbl_blotter where bl_id='$policeId'";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);
if( $bl_rdrugs !=0)
	{
	$bl_rdrugs = 'checked="checked"';
	}
	
	else
		{
		$bl_rdrugs='';
		}

if( $bl_ralc !=0)
		{
		$bl_ralc = 'checked="checked"';
		}
		
	else
		{
		$bl_ralc='';
		}

if( $bl_rfa !=0)
	{
	$bl_rfa = 'checked="checked"';
	}
	
	else
		{
		$bl_rfa='';
			}
			if( $bl_runc !=0)
			{
		$bl_runc = 'checked="checked"';
		}
		
else
	{
	$bl_runc='';
	}

?>
<form action="processBlotter.php?action=addotherdatatmu&policeId=<?=$policeId;?>" method="post" enctype="multipart/form-data" 
name="frmAddBlotter" id="frmAddBlotter">

<table width="100%"  border="0" cellpadding="6" align="center">

	<tr>
    	<td align="center">
		
			<table width="420" border="0">
			  	<tr>
					<td colspan="2" class="entryTable"> COMPLAINANT'S DATA: </td>
				</tr>
				
				<tr class="row1">
					<td> Name:</td>
					<td>&nbsp;<?php echo $bl_cname; ?>        </td>
				</tr>
	  
			  	<tr class="row2">
					<td>Lic #. </td>
					<td><span class="label">
				  	<input name="txtclicnr" type="text" class="box" value="<?php echo $bl_clicnr; ?>" id="txtlicnr" size="30%" maxlength="100" /></span></td>
			  	</tr>
	  
			  	<tr class="row1">
					<td>Insurrance</td>
					<td><span class="label">
				  	<input name="txtcinsurance" type="text" class="box" value="<?php echo $bl_cinsurance; ?>" id="txtcinsurance" size="30%" maxlength="100" />
					</span></td>
			  	</tr>
				
			  	<tr class="row2">
					<td>Contact</td>
					<td><span class="label">
				  	<input name="txtccontact" type="text" class="box" value="<?php echo $bl_ccontact; ?>" id="txtccontact" size="30%" maxlength="100" />
					</span></td>
			  	</tr>
				
			  	<tr class="row1">
					<td>Injury</td>
					<td><span class="label">
				  	<input name="txtcinjury" type="text" class="box" value="<?php echo $bl_cinjury; ?>" id="txtcinjury" size="30%" maxlength="100" />
					</span></td>
			  	</tr>
    		</table>
			
		</td>
		
		<td align="center">
		
			<table width="420" border="0">
				<tr>
					<td colspan="2" class="entryTable">RESPONDENT'S DATA: </td>
				</tr>
				
				<tr class="row1">
					<td> Name:</td>
					<td><input name="txtrname" type="text" class="box" value="<?php echo $bl_rname; ?>" id="txtrname" size="30%" maxlength="100" /></td>
				</tr>
				
				<tr class="row2">
					<td>Lic #. </td>
					<td><span class="label">
					<input name="txtrlicnr" type="text" class="box" value="<?php echo $bl_rlicnr; ?>" id="txtrlicnr" size="30%" maxlength="100" />
					</span></td>
				</tr>
				
				<tr class="row1">
					<td>Insurrance</td>
					<td><span class="label">
					<input name="txtrinsurance" type="text" class="box" value="<?php echo $bl_rinsurance; ?>" id="txtrinsurance" size="30%" maxlength="100" />
					</span></td>
				</tr>
		  
				<tr class="row2">
					<td>Contact</td>
					<td><span class="label">
					<input name="txtrcontact" type="text" class="box" value="<?php echo $bl_rcontact; ?>" id="txtrcontact" size="30%" maxlength="100" />
					</span></td>
				</tr>
		  
				<tr class="row1">
					<td>Injury</td>
					<td><span class="label">
					<input name="txtrinjury" type="text" class="box" value="<?php echo $bl_rinjury; ?>" id="txtrinjury" size="30%" maxlength="100" />
					</span></td>
				</tr>
			</table>
		
		</td>
  	</tr>
	
  	<tr>
		<td>
		
			<table width="420" align="center" border="0">
				<tr bgcolor="EAEAEA"> 
				   <td class="entryTable">&nbsp; </td>
				</tr>
				  
				<tr bgcolor="EAEAEA"> 
					<td class="content"> IMAGE 1 <input name="pic" type="file" id="pic" class="box"> </td>
				</tr>
				
				<tr bgcolor="EAEAEA"> 
					<td class="content"> IMAGE 2 <input name="pic2" type="file" id="pic2" class="box"> </td>
				</tr>
				
				<tr bgcolor="EAEAEA"> 
					<td class="content"> IMAGE 3<input name="pic3" type="file" id="pic3" class="box"> </td>
				</tr>
				
				<tr bgcolor="EAEAEA"> 
					<td class="content"> IMAGE 4 <input name="pic4" type="file" id="pic4" class="box"> </td>
				</tr>		
			</table>
			
		</td>


  	<td valign="top"> 
  
  		<table width="420" align="center" border="0">
			<tr bgcolor="EAEAEA"> 
   				<td class="entryTable" colspan="2">&nbsp; </td>
			</tr>
			
  			<tr bgcolor="EAEAEA"> 	
				<td> Type of Accident: </td>
				<td><select name="txtaccident">
					<option value="">-select-</option>
					<option value="DP">Damage of Property</option>
					<option value="PI">Physical Injuries</option>
					<option value="DPI">Damage of Property with Physical Injuries</option>
					<option value="H">Homicide</option>
					</select></td>

  			<tr bgcolor="EAEAEA"> 
				<td> Type of Vehicle: </td>
				<td><select name="txtvehicle">
					<option value="">-select-</option>
					<option value="pualone"> PUB/PUJ Alone</option>
					<option value="pupedestrian"> PUB/PUJ vs Pedestrian</option>
					<option value="puMC"> PUB/PUJ vs MC</option>
					<option value="puTC"> PUB/PUJ vs TC</option>
					<option value="puPUB"> PUB/PUJ vs PUB/PUJ</option>
					<option value="puprivate"> PUB/PUJ vs Private Vehicle</option>
					<option value="putruck"> PUB/PUJ vs Truck</option>
					
					<option value="pralone"> Private Alone</option>
					<option value="prPUB"> Private vs PUB/PUJ</option>
					<option value="prMC"> Private vs MC</option>
					<option value="prTC"> Private vs TC</option>
					<option value="prprivate"> Private vs Private</option>
					<option value="prtruck"> Private vs Truck</option>
					<option value="prpedestrian"> Private vs Pedestrian</option>
					
					<option value="mcalone"> MC Alone</option>
					<option value="mcPUB"> MC vs PUB/PUJ</option>
					<option value="mcMC"> MC vs MC</option>
					<option value="mcTC"> MC vs TC</option>
					<option value="mcprivate"> MC vs Private</option>
					<option value="mctruck"> MC vs Truck</option>
					<option value="mcpedestrian"> MC vs Pedestrian</option>
					
					<option value="tcalone"> TC Alone</option>
					<option value="tcPUB"> TC vs PUB/PUJ</option>
					<option value="tcMC"> TC vs MC</option>
					<option value="tcTC"> TC vs TC</option>
					<option value="tcprivate"> TC vs Private</option>
					<option value="tctruck"> TC vs Truck</option>
					<option value="tcpedestrian"> TC vs Pedestrian</option>
					</select></td>
		</table> 
</table>

  
 <p align="center"> 
  <input name="btnAddBlotter" type="button" id="btnAddBlotter" value="Add Blotter" onClick="checkAddotherdatatmuForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>

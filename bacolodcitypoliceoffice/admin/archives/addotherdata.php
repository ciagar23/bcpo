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
		
	
		

$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cname, bl_cage, bl_cgender, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rage, bl_rgender, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury,bl_investigator, 
bl_dtg, bl_cnat, bl_rdrugs, bl_ralc, bl_runc, bl_rfa, bl_rnat, bl_brgy, bl_prosec, bl_court, bl_crime, bl_cstatus, bl_rstatus, bl_rblunt, bl_calias, bl_coccupation, bl_rbladed, bl_rhands, bl_rpoison, bl_trkind, bl_trmodel, bl_trplateno, bl_trmotorno, bl_trregno, bl_trchasisno, bl_trmakeyear, bl_cbirthdate,bl_statusofcase, bl_fakind, bl_famake, bl_facaliber, bl_faserial, bl_falicense, bl_gang
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
		
if( $bl_rblunt !=0)
	{
	$bl_rblunt = 'checked="checked"';
	}
	
	else
		{
		$bl_rblunt='';
		}
		
if( $bl_rbladed !=0)
	{
	$bl_rbladed = 'checked="checked"';
	}
	
	else
		{
		$bl_rbladed='';
		}
		
if( $bl_rhands !=0)
	{
	$bl_rhands = 'checked="checked"';
	}
	
	else
		{
		$bl_rhands='';
		}
		
if( $bl_rpoison !=0)
	{
	$bl_rpoison = 'checked="checked"';
	}
	
	else
		{
		$bl_rpoison='';
		}

if( $bl_cgender == 'Male')
	{
	$male = 'Selected';
	$female = '';
	}
	
	else if( $bl_cgender == 'Female')
		{
	$male = '';
	$female = 'Selected';
		}
	else
		{
	$male = '';
	$female = '';
		}
		
		
if( $bl_cstatus == 'Single')
	{
	$married = '';
	$single = 'Selected';
	}
	
	else if( $bl_cstatus == 'Married')
		{
	$married = 'Selected';
	$single = '';
	}
	else
		{
	$married = '';
	$single = '';
		}

?> 
<form action="processBlotter.php?action=addotherdata&policeId=<?=$policeId;?>" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">


        
		<article class="module width_full">
			<header><h3>COMPLAINANT'S DATA: </h3></header>
				<div class="module_content">
        
			<table width="60%" border="0">
      		
				
      			<tr class="row1">
					<td width="20%" class="entryData"> Name:</td>
					<td width="80%">&nbsp;<?php echo $bl_cname; ?></td>
      			</tr>
				
      			<tr class="row2">
					<td class="entryData"> Age:</td>
					<td><span class="label">
					<input name="txtcage" type="text" class="box" value="<?php echo $bl_cage; ?>" id="txtcage" size="30%" maxlength="2" /></span></td>
      			</tr>
				
				<tr class="row1">
					<td class="entryData"> Alias: </td>
					<td><span class="label">
					<input name="txtcalias" type="text" class="box" value="<?php echo $bl_calias; ?>" id="txtcalias" size="30%" maxlength="100" /></span></td>
				</tr>
				
				<tr class="row2">
					<td class="entryData"> Birthdate: </td>
					<td><span class="label">
					<input name="txtcbirthdate" type="text" class="box" value="<?php echo $bl_cbirthdate; ?>" id="txtcbirthdate" size="30%" maxlength="100" />
					yyyy-mm-dd</span></td>
				</tr>
				
				
      			<tr class="row2">
					<td class="entryData"> Address:</td>
					<td><?php echo $bl_caddress; ?></td>
      			</tr>
				<tr class="row1">
					<td class="entryData"> Gender:</td>
					<td><span class="label">
					<select name="txtcgender">
					<option value="">-Select-</option>
					<option <? echo $male;?>>Male</option>
					<option <? echo $female;?>>Female</option>
				    </select>
					</span></td>
				</tr>
				
     			<tr class="row2">
					<td class="entryData"> Civil Status: </td>
					<td><span class="label">
					
					<select name="txtcstatus">
					<option value="">-Select-</option>
					<option <? echo $married;?>>Married</option>
					<option <? echo $single;?>>Single</option>
				    </select></span></td>
      			</tr>
				
      			<tr class="row1">
					<td class="entryData"> Nationality: </td>
					<td><span class="label">
					  <input name="txtcnat" type="text" class="box" value="<?php echo $bl_cnat; ?>" id="txtcnat" size="30%" maxlength="100" /></span></td>
      			</tr>
				
				<tr class="row2">
					<td class="entryData"> Occupation: </td>
					<td><span class="label">
					<input name="txtcoccupation" type="text" class="box" value="<?php echo $bl_coccupation; ?>" id="txtcoccupation" size="30%" 
					maxlength="100" /></span></td>
      			</tr>
				
				<tr>
					<td colspan="2">&nbsp;  </td>
				</tr>
				
			</table>
            </div>
            </article>
            
            
            <article class="module width_full">
			<header><h3>CASE INFORMATION </h3></header>
				<div class="module_content">
            
            <table>
				<tr>
					<td colspan="2">&nbsp;  </td>
				</tr>
				
				<tr>
					<td height="23" colspan="2" class="entryTable2">	OTHER DATA: </td>		
				</tr>
				
				<tr class="row1">
					<td height="23" class="entryData"> Place: </td>
					<td>&nbsp;<?php echo $bl_clocation; ?>
					</span></td>
				</tr>
	  

			  	<tr class="row2">
					<td width="126" class="entryData">Brgy:</td>
					<td width="560"><span class="label">
			  	  <input name="txtbrgy" type="text" class="box" value="<?php echo $bl_brgy; ?>" id="txtbrgy" size="30%" maxlength="100" /></span></td>
			 	</tr>
			  
			  	<tr class="row1">
					<td class="entryData"> Prosecutor: </td>
					<td><span class="label">
				  	<input name="txtprosec" type="text" class="box" value="<?php echo $bl_prosec; ?>" id="txtprosec" size="30%" maxlength="100" /></span></td>
			  	</tr>
			  
			  	<tr class="row2">
					<td height="26" class="entryData"> Court: </td>
					<td><span class="label">
				  	<input name="txtcourt" type="text" class="box" value="<?php echo $bl_court; ?>" id="txtcourt" size="30%" maxlength="100" /></span></td>
			  	</tr>
				
				
				<tr>
					<td colspan="2">&nbsp;  </td>
				</tr>
				<tr>
					<td colspan="2" class="entryTable2"> CLASSIFICATION OF OFFENSE: </td>
				</tr>
				
				<tr class="row1">
					<td height="23" class="entryData"> Law Violated: </td>
					<td> &nbsp;<?php echo $bl_crime; ?>
					</span></td>
				</tr>
		  
				<tr class="row2">
					<td class="entryData">Use of: </td>
					<td>
					<input type="checkbox" name="checkdrugs" id="checkdrugs" <?php echo $bl_rdrugs; ?> value="checkbox" /> Drugs
					<input type="checkbox" name="checkalcohol" id="checkalcohol" <?php echo $bl_ralc; ?> value="checkbox" /> Alcohol
					<input type="checkbox" name="checkunc" id="checkunc" <?php echo $bl_runc; ?> value="checkbox" /> Unc
					<input type="checkbox" name="checkfa" id="checkfa" <?php echo $bl_rfa; ?> value="checkbox" /> F/A 
					<input type="checkbox" name="checkblunt" id="checkblunt" <?php echo $bl_rblunt; ?> value="checkbox" /> Blunt Instrument <br>
					<input type="checkbox" name="checkbladed" id="checkbladed" <?php echo $bl_rbladed; ?> value="checkbox" /> Bladed Instrument 
					<input type="checkbox" name="checkhands" id="checkhands" <?php echo $bl_rhands; ?> value="checkbox" /> Hands/Feet/Fist
					<input type="checkbox" name="checkpoison" id="checkpoison" <?php echo $bl_rpoison; ?> value="checkbox" /> Poison/Acid </td>
				</tr>
		  
				<tr class="row1">
					<td class="entryData">Status of Case: </td>
					<td>
					
					<? if($bl_statusofcase == 'Pending Investigation')
					{$p='Selected'; $c=''; $f='';  $s='';  $r='';}
					else if($bl_statusofcase == 'Closed/Dropped')
					{$p=''; $c='Selected'; $f='';  $s='';  $r='';}
					else if($bl_statusofcase == 'Filed in Court')
					{$p=''; $c=''; $f='Selected';  $s='';  $r='';}
					else if($bl_statusofcase == 'Settled')
					{$p=''; $c=''; $f='';  $s='Selected';  $r='';}
					else if($bl_statusofcase == 'Referred')
					{$p=''; $c=''; $f='';  $s='';  $r='Selected';}
					else
					{$p=''; $c=''; $f='';  $s='';  $r='';}?>
					  <select name="txtstatusofcase">
					    <option value="">-Select-</option>
					    <option <? echo $p;?>>Pending Investigation</option>
					    <option <? echo $c;?>>Closed/Dropped</option>
					    <option <? echo $f;?>>Filed in Court</option>
					    <option <? echo $s;?>>Settled</option>
					    <option <? echo $r;?>>Referred</option>
				      </select></td>
				</tr>
				<tr class="row2">
					<td height="26" class="entryData"> Group/Affiliation: </td>
					<td><span class="label">
				  	<input name="txtgang" type="text" class="box" value="<?php echo $bl_gang; ?>" id="txtgang" size="30%" maxlength="100" /></span></td>
			  	</tr>
				
				<tr>
					<td colspan="2">&nbsp;  </td>
				</tr>

				<tr>
					<td colspan="2" class="entryTable2"> IF USED FIRE ARMS: </td>
				</tr>
				
				<tr class="row1">
					<td height="23" class="entryData"> Kind: </td>
					<td><input name="txtfakind" type="text" class="box" value="<?php echo $bl_fakind; ?>" id="txtfakind" size="30%" maxlength="100" />
					</span></td>
				</tr>
		  
				<tr class="row2">
					<td class="entryData">Make </td>
					<td><input name="txtfamake" type="text" class="box" value="<?php echo $bl_famake; ?>" id="txtfamake" size="30%" maxlength="100" />
					</td>
		  
				<tr class="row2">
					<td class="entryData">Caliber </td>
					<td><input name="txtfacaliber" type="text" class="box" value="<?php echo $bl_facaliber; ?>" id="txtfacaliber" size="30%" maxlength="100" />
					</td>
		  
				<tr class="row2">
					<td class="entryData">Serial No.</td>
					<td><input name="txtfaserial" type="text" class="box" value="<?php echo $bl_faserial; ?>" id="txtfaserial" size="30%" maxlength="100" />
					</td>
		  
				<tr class="row2">
					<td class="entryData">License No. </td>
					<td><input name="txtfalicense" type="text" class="box" value="<?php echo $bl_falicense; ?>" id="txtfalicense" size="30%" maxlength="100" />
					</td>
				</tr><tr>
					<td colspan="2">&nbsp;  </td>
				</tr>

				<tr>
					<td colspan="2" class="entryTable2"> TRANSPORT USED: </td>
				</tr>
				
				<tr class="row1">
					<td height="23" class="entryData"> Kind: </td>
					<td><input name="txttrkind" type="text" class="box" value="<?php echo $bl_trkind; ?>" id="txttrkind" size="30%" maxlength="100" />
					</span></td>
				</tr>
		  
				<tr class="row2">
					<td class="entryData">Model </td>
					<td><input name="txttrmodel" type="text" class="box" value="<?php echo $bl_trmodel; ?>" id="txttrmodel" size="30%" maxlength="100" />
					</td>
				</tr>
		  
				<tr class="row1">
					<td class="entryData">Plate No: </td>
					<td><input name="txttrplateno" type="text" class="box" value="<?php echo $bl_trplateno; ?>" id="txttrplateno" size="30%" maxlength="100" /></td>
				</tr>
		  
				<tr class="row1">
					<td class="entryData">Motor No: </td>
					<td><input name="txttrmotorno" type="text" class="box" value="<?php echo $bl_trmotorno; ?>" id="txttrmotorno" size="30%" maxlength="100" /></td>
				</tr>
		  
				<tr class="row1">
					<td class="entryData">Registration No: </td>
					<td><input name="txttrregno" type="text" class="box" value="<?php echo $bl_trregno; ?>" id="txttrregno" size="30%" maxlength="100" /></td>
				</tr>
		  
				<tr class="row1">
					<td class="entryData">Chasis No: </td>
					<td><input name="txttrchasisno" type="text" class="box" value="<?php echo $bl_trchasisno; ?>" id="txttrchasisno" size="30%" maxlength="100" /></td>
				</tr>
				
		  
				<tr class="row1">
					<td class="entryData">Make & Year: </td>
					<td><input name="txttrmakeyear" type="text" class="box" value="<?php echo $bl_trmakeyear; ?>" id="txttrmakeyear" size="30%" maxlength="100" /></td>
				</tr>
			</table>
			</table>
			
			
			
		</td>
   	</tr>
</table>
  
<p align="center"><input name="btnAddBlotter" type="button" id="btnAddBlotter" value="Add Blotter" onClick="checkAddotherdataForm();" class="box">
&nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
</p>
</form>

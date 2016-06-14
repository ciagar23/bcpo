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

?> 
<p>&nbsp;</p>
<form action="processBlotter.php?action=addrespondents&policeId=<?=$policeId;?>" method="post" enctype="multipart/form-data" name="frmAddRespondents" id="frmAddRespondents">


<article class="module width_full">
			<header><h3>RESPONDENTS DATA: </h3></header>
				<div class="module_content">
			<table width="60%" border="0">
		


			  	<tr class="row2">
					<td width="126" class="entryData">name:</td>
					<td width="560"><span class="label">
			  	  <input name="txtname" type="text" class="box" id="txtname" size="30%" maxlength="100" /></span></td>
			 	</tr>

			  	<tr class="row2">
					<td width="126" class="entryData">aka:</td>
					<td width="560"><span class="label">
			  	  <input name="txtaka" type="text" class="box"id="txtaka" size="30%" maxlength="100" /></span></td>
			 	</tr>

			  	<tr class="row2">
					<td width="126" class="entryData">age:</td>
					<td width="560"><span class="label">
			  	  <input name="txtage" type="text" class="box" id="txtage" size="2" maxlength="2" />
					</span></td>
			 	</tr>

			  	<tr class="row2">
					<td width="126" class="entryData">alias:</td>
					<td width="560"><span class="label">
			  	  <input name="txtalias" type="text" class="box" id="txtalias" size="30%" maxlength="100" /></span></td>
			 	</tr>

			  	<tr class="row2">
					<td width="126" class="entryData">address:</td>
					<td width="560"><span class="label">
			  	  <input name="txtaddress" type="text" class="box" id="txtaddress" size="30%" maxlength="100" /></span></td>
			 	</tr>

			  	<tr class="row2">
					<td width="126" class="entryData">casestatus:</td>
				  <td width="560"><select name="txtcasestatus">
				    <option value="">-Select-</option>
				    <option>Arrested</option>
				    <option>At Large</option>
				    <option>Under Custody</option>
				    </select>
				  </td>
			 	</tr>

			  	<tr class="row2">
					<td width="126" class="entryData">gender:</td>
					<td width="560"><select name="txtgender">
				    <option value="">-Select-</option>
				    <option>Male</option>
				    <option>Female</option>
				    </select></td>
			 	</tr>

			  	<tr class="row2">
					<td width="126" class="entryData">height:</td>
					<td width="560"><span class="label">
			  	  <input name="txtheight" type="text" class="box" id="txtheight" size="30%" maxlength="100" /></span></td>
			 	</tr>


			  	<tr class="row2">
					<td width="126" class="entryData">weight:</td>
					<td width="560"><span class="label">
			  	  <input name="txtweight" type="text" class="box"  id="txtweight" size="30%" maxlength="100" /></span></td>
			 	</tr>



			  	<tr class="row2">
					<td width="126" class="entryData">birthdate:</td>
					<td width="560"><span class="label">
			  	  <input name="txtbirthdate" type="text" class="box"  id="txtbirthdate" size="30%" maxlength="100" /></span></td>
			 	</tr>

			  	<tr class="row2">
					<td width="126" class="entryData">birthplace:</td>
					<td width="560"><span class="label">
			  	  <input name="txtbirthplace" type="text" class="box" id="txtbirthplace" size="30%" maxlength="100" /></span></td>
			 	</tr>

			  	<tr class="row2">
					<td width="126" class="entryData">haircolor:</td>
					<td width="560"><span class="label">
			  	  <input name="txthaircolor" type="text" class="box"  id="txthaircolor" size="30%" maxlength="100" /></span></td>
			 	</tr>

			  	<tr class="row2">
					<td width="126" class="entryData">occupation:</td>
					<td width="560"><span class="label">
			  	  <input name="txtoccupation" type="text" class="box"  id="txtoccupation" size="30%" maxlength="100" /></span></td>
			 	</tr>

			  	<tr class="row2">
					<td width="126" class="entryData">mark:</td>
					<td width="560"><span class="label">
			  	  <input name="txtmark" type="text" class="box" id="txtmark" size="30%" maxlength="100" /></span></td>
			 	</tr>

			  	<tr class="row2">
					<td width="126" class="entryData">gang:</td>
					<td width="560"><span class="label">
			  	  <input name="txtgang" type="text" class="box"  id="txtgang" size="30%" maxlength="100" /></span></td>
			 	</tr>

			  	<tr class="row2">
					<td width="126" class="entryData">influence:</td>
					<td width="560"><span class="label">
			  	  <input name="txtinfluence" type="text" class="box"  id="txtinfluence" size="30%" maxlength="100" /></span></td>
			 	</tr>

			  	<tr class="row2">
					<td width="126" class="entryData">disposition:</td>
					<td width="560"><span class="label">
			  	  <input name="txtdisposition" type="text" class="box"  id="txtdisposition" size="30%" maxlength="100" /></span></td>
			 	</tr>

			  	<tr class="row2">
					<td width="126" class="entryData">nat:</td>
					<td width="560"><span class="label">
			  	  <input name="txtnat" type="text" class="box"  id="txtnat" size="30%" maxlength="100" /></span></td>
			 	</tr>

	

   			</table>
			
		</td>
   	</tr>
	
  	<tr>
    	<td align="center" valign="top">
		
			
			</table>
			
			
			
		</td>
   	</tr>
</table>
  
<p align="center"><input name="btnAddBlotter" type="button" id="btnAddBlotter" value="Add" onClick="checkAddrespondentsForm();" class="box">
&nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
</p>
</form>

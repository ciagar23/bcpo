<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;
$CrimeList = CrimeListOption($catId);
?> 
<p>&nbsp;</p>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">

<article class="module width_full">
		<header><h3 class="tabs_involved"> Complainant <h3> </header>
        
   
            <fieldset>
    <label>	Brief Outline of the Case </label>
        
		<textarea name="txtoutline" cols="100" rows="15" class="box" id="txtoutline"></textarea></td>
	</fieldset>
<table>
<tr>
        
   		<td width="150">Type of Crime</td>
   		<td> <select name="cboCrime" id="cboCrime" class="box">
     	<?php echo $CrimeList; ?>
		<option value="" selected>-- Choose Crime --</option> </select>	</td>
	</tr>
	
	<tr class="row1" >
   		<td width="150">Name of Complainant</th>
   		<td> <input name="txtcname" type="text" class="box" id="txtcname" size="50" maxlength="100"></td>
  	</tr>
  
  	<tr class="row2" > 
   		<td width="150" >Address of Complainant</th>
   		<td> <textarea name="txtaddress" cols="47" rows="3" class="box" id="txtaddress"></textarea></td>
  	</tr>
	
  	<tr class="row1" > 
   		<td width="150">Complaint</th>
   		<td> <textarea name="txtcomplaint" cols="47" rows="3" class="box" id="txtcomplaint"></textarea></td>
  	</tr>
  
  	<tr class="row2" > 
   		<td width="150" >Place of Incident</th>
   		<td> <input name="txtlocation" type="text" class="box" id="txtlocation" size="50" maxlength="100"></td>
  	</tr>
  
  	<tr class="row1" > 
   		<td width="150">Date of Incident</th>
   		<td> <input name="txtdate" type="text" class="box" id="txtdate" size="10" maxlength="100">
		 <script language="JavaScript" src="/bcpo/tigra/calendar3.js"></script>  
		 <a href="javascript:cal11.popup();"><img src="/bcpo/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a></td>
  	</tr>
  
  	<tr class="row2" > 
   		<td width="150" >Contact Number</th>
   		<td> <input name="txtcontact" type="text" class="box" id="txtcontact" size="25" maxlength="100"></td>
  	</tr>
  
  	<tr class="row1" > 
   		<td width="150">Reffered to:</th>
   		<td>        	<select name="txtrefferedto" id="txtrefferedto" class="box">
        
			 <!-- add option reffered to: -->       
        
            <option value="">-- Select --</option> 
            <option value="">-- Select --</option> 
            </select>	
            </td>
  	</tr>
  
  	</table>

</table>
<p align="center"> 
<input name="btnAddBlotter" type="button" id="btnAddBlotter" value="Add Blotter" onClick="checkAddBlotterForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
</p>

</form>

 <script language="JavaScript">
<!-- // create calendar object(s) just after form tag closed
	 // specify form element as the only parameter (document.forms['formname'].elements['inputname']);
	 // note: you can have as many calendar objects as you need for your application
	 	var cal11 = new calendar3(document.forms['frmAddBlotter'].elements['txtdate']);
	cal11.year_scroll = true;
	cal11.time_comp = false;
	
	//-->
</script>
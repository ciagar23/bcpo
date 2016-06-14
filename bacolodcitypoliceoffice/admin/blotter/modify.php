<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['policeId']) && $_GET['policeId'] > 0) {
	$policeId = $_GET['policeId'];
} else {
	header('Location: index.php');
}

$crime = (isset($_GET['crime']) && $_GET['crime'] != '') ? $_GET['crime'] : '';
$CrimeList = CrimeListOption($crime);

$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline,bl_investigator, bl_cname, bl_caddress, bl_ccomplaint, bl_clocation, 

bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rlicnr, bl_rinsurance, bl_ccontact, 

bl_rinjury, bl_dateofincident
        FROM tbl_blotter
		WHERE bl_id = $policeId";
$result = mysql_query($sql) or die('Cannot get Blotter. ' . mysql_error());
$row    = mysql_fetch_assoc($result);
extract($row);

?> 
<form action="processBlotter.php?action=modifyBlotter&policeId=<?php echo $policeId; ?>" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">

<article class="module width_full">
<header><h3 class="tabs_involved">Recase Blotter form </h3> </header>
 
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="text">
   <tr class="row1">
  <td colspan="2" align="center"><h3>Complainant</h3></td></tr>
   <tr class="row2"> 
   <td width="150" >Type of Crime</td>
   <td > <select name="cboCrime" id="cboCrime" class="box">
     <option value="" selected>-- Choose Crime --</option>
<?php
	echo $CrimeList;
?>	 
    </select></td>
  </tr>
  <tr class="row1">
   <td width="150" >Name</td>
   <td> <input name="txtcname" type="text" class="box" id="txtcname" value="<? echo $bl_cname;?>" size="50" maxlength="100"></td>
  </tr>
  <tr class="row2"> 
   <td width="150" >Address</td>
   <td> <textarea name="txtaddress" cols="47" rows="3" class="box" id="txtaddress"><? echo $bl_caddress;?></textarea></td>
  </tr>
  <tr class="row1"> 
   <td width="150" >Complaint</td>
   <td> <textarea name="txtcomplaint" cols="47" rows="3" class="box" id="txtcomplaint"><? echo $bl_ccomplaint;?></textarea></td>
  </tr>
  <tr class="row2"> 
   <td width="150" >Place of Incident</td>
   <td> <input name="txtlocation" type="text" class="box" id="txtlocation"  value="<? echo $bl_clocation;?>" size="50" maxlength="100"></td>
  </tr>
    	<tr class="row1" > 
   		<td width="150">Date of Incident</th>
   		<td> <input name="txtdate" type="text" class="box" id="txtdate"  value="<? echo $bl_dateofincident;?>" size="10" maxlength="100">
		 <script language="JavaScript" src="/bcpo/tigra/calendar3.js"></script>  
		 <a href="javascript:cal11.popup();"><img src="/bcpo/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a></td>
  	</tr>
  <tr class="row1"> 
   <td width="150" >Contact Number</td>
   <td> <input name="txtcontact" type="text" class="box" id="txtcontact" value="<? echo $bl_ccontact;?>" size="25" maxlength="100"></td>
  </tr>
  <tr class="row2"> 
   <td width="150" >Reffered to:</td>
   <td> <input name="txtrefferedto" type="text" class="box" id="txtrefferedto" value="<? echo $bl_refferedto;?>" size="50" maxlength="100"></td>
  </tr>
  
  </table>
  
   <fieldset> 
   <label> Brief Outline of the Case  </label>
   <textarea name="txtoutline" cols="80" rows="5" class="box" id="txtoutline"><? echo $bl_outline;?></textarea></td>
  </fieldset>
 

 <p align="center"> 
  <input name="btnModifyBlotter" type="button" id="btnModifyBlotter" value="Update Blotter" onClick="checkAddBlotterForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form> <script language="JavaScript">
<!-- // create calendar object(s) just after form tag closed
	 // specify form element as the only parameter (document.forms['formname'].elements['inputname']);
	 // note: you can have as many calendar objects as you need for your application
	 	var cal11 = new calendar3(document.forms['frmAddBlotter'].elements['txtdate']);
	cal11.year_scroll = true;
	cal11.time_comp = false;
	
	//-->
</script>
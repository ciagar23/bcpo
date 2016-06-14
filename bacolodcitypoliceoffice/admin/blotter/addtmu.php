<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;
$CaseList = CaselistOptions($catId);
?> 
<p>&nbsp;</p>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">

<article class="module width_full">
		<header><h3 class="tabs_involved"> Traffic Management Unit <h3> </header>
        
   
            <fieldset>
    <label>	Brief Outline of the Case </label>
        
		 <textarea name="txtoutline" cols="100" rows="15" class="box" id="txtoutline"></textarea></td>
	</fieldset>



  <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="detail">

  <tr> 
   <tr> 
   <th width="150" class="label">Investigator<td class="content"> <select name="cboInvestigator" id="cboInvestigator" class="box">
     <option value="" selected>-- Choose Investigator --</option>
<?php
	echo $CaseList;
?>	 
    </select></td>
  </tr>
  <tr> 
   <th width="150" colspan="2" align='center' >Complainant</td>
  </tr>
   <th width="150" class="label">Name</td>
   <td> <input name="txtcname" type="text" class="box" id="txtcname" size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <th width="150" class="label">Address</td>
   <td> <textarea name="txtaddress" cols="47" rows="3" class="box" id="txtaddress"></textarea></td>
  </tr>
  <tr> 
   <th width="150" class="label">Complaint</td>
   <td> <textarea name="txtcomplaint" cols="47" rows="3" class="box" id="txtcomplaint"></textarea></td>
  </tr>
  <tr> 
   <th width="150" class="label">Place of Incident</td>
   <td> <input name="txtlocation" type="text" class="box" id="txtlocation" size="50" maxlength="100"></td>
  </tr>
  <tr> 
   <th width="150" class="label">Contact Number</td>
   <td> <input name="txtcontact" type="text" class="box" id="txtcontact" size="25" maxlength="100"></td>
  </tr>
  <tr> 
   <th width="150" class="label">Reffered to:</td>
   <td> <input name="txtrefferedto" type="text" class="box" id="txtrefferedto" size="50" maxlength="100"></td>
  </tr>

 </table>
 <p align="center"> 
  <input name="btnAddBlotter" type="button" id="btnAddBlotter" value="Add Blotter" onClick="checkAddBlotterFormtmu();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>

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
        
        </fieldset>
<table>
<tr>
		<td colspan="2"><textarea name="txtoutline" cols="88" rows="15" class="box" id="txtoutline"></textarea></td>
</tr>
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
   		<td>
        <select name="txtlocation">
   		  <option value=""> - Barangay - </option>
   		  <option>Barangay 1</option>
   		  <option>Barangay 2</option>
   		  <option>Barangay 3</option>
   		  <option>Barangay 4</option>
   		  <option>Barangay 5</option>
   		  <option>Barangay 6</option>
   		  <option>Barangay 7</option>
   		  <option>Barangay 8</option>
   		  <option>Barangay 9</option>
   		  <option>Barangay 10</option>
   		  <option>Barangay 11</option>
   		  <option>Barangay 12</option>
   		  <option>Barangay 13</option>
   		  <option>Barangay 14</option>
   		  <option>Barangay 15</option>
   		  <option>Barangay 16</option>
   		  <option>Barangay 17</option>
   		  <option>Barangay 18</option>
   		  <option>Barangay 19</option>
   		  <option>Barangay 20</option>
   		  <option>Barangay 21</option>
   		  <option>Barangay 22</option>
   		  <option>Barangay 23</option>
   		  <option>Barangay 24</option>
   		  <option>Barangay 25</option>
   		  <option>Barangay 26</option>
   		  <option>Barangay 27</option>
   		  <option>Barangay 28</option>
   		  <option>Barangay 29</option>
   		  <option>Barangay 30</option>
   		  <option>Barangay 31</option>
   		  <option>Barangay 32</option>
   		  <option>Barangay 33</option>
   		  <option>Barangay 34</option>
   		  <option>Barangay 35</option>
   		  <option>Barangay 36</option>
   		  <option>Barangay 37</option>
   		  <option>Barangay 38</option>
   		  <option>Barangay 40</option>
   		  <option>Barangay 41</option>
   		  <option>Barangay Estefania</option>
   		  <option>Barangay Feliza</option>
   		  <option>Barangay Mansilingan</option>
   		  <option>Barangay Vista Alegre</option>
   		  <option>Barangay Alangilan</option>
   		  <option>Barangay Taculing</option>
   		  <option>Barangay Monte Vista</option>
   		  <option>Barangay Alijis</option>
   		  <option>Barangay Handumanan</option>
   		  <option>Barangay Villamonte</option>
   		  <option>Barangay Granada</option>
   		  <option>Barangay Sum-ag</option>
   		  <option>Barangay Pahanocoy</option>
   		  <option>Barangay Punta Taytay</option>
   		  <option>Barangay Banago</option>
   		  <option>Barangay Bata</option>
   		  <option>Barangay Mandalagan</option>
   		  <option>Barangay Singcang</option>
   		  <option>Barangay Cabug</option>
   		  <option>Barangay Tangub</option>
	      </select>
        
        
        
        
        </td>
  	</tr>
  
  	<tr class="row1" > 
   		<td width="150">Date of Incident</th>
   		<td> <input name="txtdate" type="text" class="box" id="txtdate" size="10" maxlength="100">
		 <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  
		 <a href="javascript:cal11.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a></td>
  	</tr>
  
  	<tr class="row2" > 
   		<td width="150" >Contact Number</th>
   		<td> <input name="txtcontact" type="text" class="box" id="txtcontact" size="25" maxlength="100"></td>
  	</tr>
  
  <tr> 
   <th width="150" class="label">Reffered to:</td>
   <td> <input name="txtrefferedto" type="text" class="box" id="txtrefferedto" size="50" maxlength="100"></td>
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
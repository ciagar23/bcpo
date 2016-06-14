<article class="module width_full">
		<header><h4 class="tabs_involved">
  List of crime incident referred/processed by reporting PNP unit/Office</h4>
		</header>

		<div class="tab_container" align="center">
		<?
$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;
$CrimeList = CrimeListOption($catId);

?><table>
<tr>
<td class="entryTable" align="center">
<tr class="row1">
<td align="center">
<form action="listnew.php" name="frmAddarchives" id="frmAddarchives">
	<table border="0" align="center" cellpadding="5" cellspacing="1" class="searchreports">
<input name="view" type="hidden" value="list" size="10">
<tr>
<td>Station
<td>
<select name="department">
  <option value="">-select-</option>
  <option>All</option>
  <option>police station 1</option>
  <option>police station 2</option>
  <option>police station 3</option>
  <option>police station 4</option>
  <option>police station 5</option>
  <option>police station 6</option>
  <option>police station 7</option>
  <option>police station 8</option>
  <option>police station 9</option>
  <option>police station 10</option>
</select>
  <td class="label"> From
  <td class="content"><label>
  <input name="txtfrom" type="text" size="10">
  <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  <a href="javascript:cal11.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>
  <td class="label"> to
  <td class="content"><label>
  <input name="txtto" type="text" size="10">
  <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  <a href="javascript:cal22.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>

	<td class="label" align='center'><input type="button" value="OK" onClick="checkprintForm();"  class="box" />
  </table>
  </table>
  
  </div></article>
  <br>
  <br>
  <article class="module width_full">
		<header><h3 class="tabs_involved"> Crime Statistics</h3>
		</header>
	<div class="tab_container">

 <script type="text/javascript">
function mySubmit() {
// document.edit.save.value = "yes";
document.edit.onsubmit(); // workaround browser bugs.
document.edit.submit();
};
</script>
</form>
<tr class="row2">
<td>
 
<form action="index.php" method="get" enctype="multipart/form-data" name="frmAddarchives2" id="frmAddarchives2">
	<table border="0" align="center" cellpadding="5" cellspacing="1" class="searchreports">
<input name="view" type="hidden" value="crimeincident" size="10">
  <tr>
  <td>Station
<td>
<select name="department">
  <option value="">-select-</option>
  <option>All</option>
  <option>police station 1</option>
  <option>police station 2</option>
  <option>police station 3</option>
  <option>police station 4</option>
  <option>police station 5</option>
  <option>police station 6</option>
  <option>police station 7</option>
  <option>police station 8</option>
  <option>police station 9</option>
  <option>police station 10</option>
</select>
  <td class="label"> From
  <td class="content"><label>
  <input name="txtfrom2" type="text" size="10">
  <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  <a href="javascript:cal111.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>
  <td class="label"> to
  <td class="content"><label>
  <input name="txtto2" type="text" size="10">
  <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  <a href="javascript:cal222.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>

	<td class="label" align='center'><input name="btnAddarchives" type="button" id="btnAddarchives" value="OK" onClick="checkprintFormstats();" class="box" />
  </table>


  </div></article>
   <br>
  <br>
  <article class="module width_full">
		<header><h3 class="tabs_involved">Crime Statistics by Barangay</h3>
		</header>
	<div class="tab_container">

 <script type="text/javascript">
function mySubmit() {
// document.edit.save.value = "yes";
document.edit.onsubmit(); // workaround browser bugs.
document.edit.submit();
};
</script>
</form>
<tr class="row2">
<td>
 
<form action="index.php" method="get" enctype="multipart/form-data" name="frmAddarchivesbr" id="frmAddarchivesbr">
	<table border="0" align="center" cellpadding="5" cellspacing="1" class="searchreports">
<input name="view" type="hidden" value="crimeincidentbrgy" size="10">
  <tr>
  <td>Barangay
<td>
<select name="txtbrgy">
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
        
  <td class="label"> From
  <td class="content"><label>
  <input name="txtfrombr" type="text" size="10">
  <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  <a href="javascript:calbr.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>
  <td class="label"> to
  <td class="content"><label>
  <input name="txttobr" type="text" size="10">
  <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  <a href="javascript:calbr2.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>

	<td class="label" align='center'><input name="btnAddarchives" type="button" id="btnAddarchives" value="OK" onClick="checkprintFormstatsbrgy();" class="box" />
  </table>


  </div></article>
  
  <br>
  <br>
  <article class="module width_full">
		<header><h3 class="tabs_involved">Detailed Report</h3>
		</header>
	<div class="tab_container">


 <script type="text/javascript">
function mySubmit() {
// document.edit.save.value = "yes";
document.edit.onsubmit(); // workaround browser bugs.
document.edit.submit();
};
</script>
</form>

<tr class="row2">
<td>
 
<form action="index.php" method="get" enctype="multipart/form-data" name="frmAddarchives3" id="frmAddarchives3">
	<table border="0" align="center" cellpadding="5" cellspacing="1" class="searchreports">
<input name="view" type="hidden" value="casedetail" size="10">
  <tr>
    <td>Station
<td>
<select name="department">
  <option value="">-select-</option>
  <option>All</option>
  <option>police station 1</option>
  <option>police station 2</option>
  <option>police station 3</option>
  <option>police station 4</option>
  <option>police station 5</option>
  <option>police station 6</option>
  <option>police station 7</option>
  <option>police station 8</option>
  <option>police station 9</option>
  <option>police station 10</option>
</select>
  <td class="label">
  <select name="txtcase" id="txtcase" class="box">
     	<?php echo $CrimeList; ?>
		<option value="" selected>-- Choose Crime --</option> </select> From
  <td class="content"><label>
  <input name="txtfrom3" type="text" size="10">
  <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  <a href="javascript:cal1111.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>
  <td class="label"> to
  <td class="content"><label>
  <input name="txtto3" type="text" size="10">
  <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  <a href="javascript:cal2222.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>

	<td class="label" align='center'><input name="btnAddarchives" type="button" id="btnAddarchives" value="OK" onClick="checkprintFormstats2();" class="box" />
  </table>


  </div></article>
  <br>
  <br>
  <article class="module width_full">
		<header><h3 class="tabs_involved">
  Crime Rate</h3>
		</header>
	<div class="tab_container">
 <script type="text/javascript">
function mySubmit() {
// document.edit.save.value = "yes";
document.edit.onsubmit(); // workaround browser bugs.
document.edit.submit();
};
</script>
</form>
<tr class="row2">
<td>
 
<form action="index.php" method="get" enctype="multipart/form-data" name="frmAddarchives4" id="frmAddarchives4">
	<table border="0" align="center" cellpadding="5" cellspacing="1" class="searchreports">
<input name="view" type="hidden" value="crimerate" size="10">
  <tr>
    <td>Station
<td>
<select name="department1">
  <option value="">-select-</option>
  <option>All</option>
  <option>police station 1</option>
  <option>police station 2</option>
  <option>police station 3</option>
  <option>police station 4</option>
  <option>police station 5</option>
  <option>police station 6</option>
  <option>police station 7</option>
  <option>police station 8</option>
  <option>police station 9</option>
  <option>police station 10</option>
</select>
  <td class="label">
  <select name="txtcase2" id="txtcase2" class="box">
		<option value="" selected>-- Choose Crime --</option>
		<option value="nonindex" selected>Non-Index Crimes</option>
		<option value="index" selected>Index Crimes</option> 
		<option value="All" selected>ALL</option> 
		</select> From
  <td class="content"><label>
  <input name="txtfrom4" type="text" size="10">
  <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  <a href="javascript:calf4.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>
  <td class="label"> to
  <td class="content"><label>
  <input name="txtto4" type="text" size="10">
  <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  <a href="javascript:calt4.popup();"><img src="/bacolodcitypoliceoffice/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>

	<td class="label" align='center'><input name="btnAddarchives" type="button" id="btnAddarchives" value="OK" onClick="checkcrimerate();" class="box" />
  </table>

 <script type="text/javascript">
function mySubmit() {
// document.edit.save.value = "yes";
document.edit.onsubmit(); // workaround browser bugs.
document.edit.submit();
};
</script>
</form>
<tr>
<td>
<td>
</table>

 <script language="JavaScript">
<!-- // create calendar object(s) just after form tag closed
	 // specify form element as the only parameter (document.forms['formname'].elements['inputname']);
	 // note: you can have as many calendar objects as you need for your application
	 	var cal11 = new calendar3(document.forms['frmAddarchives'].elements['txtfrom']);
	cal11.year_scroll = true;
	cal11.time_comp = false;
	
		var cal22 = new calendar3(document.forms['frmAddarchives'].elements['txtto']);
	cal22.year_scroll = true;
	cal22.time_comp = false;
	
	var cal111 = new calendar3(document.forms['frmAddarchives2'].elements['txtfrom2']);
	cal111.year_scroll = true;
	cal111.time_comp = false;
	
		var cal222 = new calendar3(document.forms['frmAddarchives2'].elements['txtto2']);
	cal222.year_scroll = true;
	cal222.time_comp = false;
	
	var calbr = new calendar3(document.forms['frmAddarchivesbr'].elements['txtfrombr']);
	calbr.year_scroll = true;
	calbr.time_comp = false;
	
		var calbr2 = new calendar3(document.forms['frmAddarchivesbr'].elements['txttobr']);
	calbr2.year_scroll = true;
	calbr2.time_comp = false;
	
	var cal1111 = new calendar3(document.forms['frmAddarchives3'].elements['txtfrom3']);
	cal111.year_scroll = true;
	cal111.time_comp = false;
	
		var cal2222 = new calendar3(document.forms['frmAddarchives3'].elements['txtto3']);
	cal222.year_scroll = true;
	cal222.time_comp = false;
	
	var calf4 = new calendar3(document.forms['frmAddarchives4'].elements['txtfrom4']);
	calf4.year_scroll = true;
	calf4.time_comp = false;
	
		var calt4 = new calendar3(document.forms['frmAddarchives4'].elements['txtto4']);
	calt4.year_scroll = true;
	calt4.time_comp = false;
	//-->
</script>
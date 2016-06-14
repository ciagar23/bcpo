<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;
$sql2   = "SELECT *
        FROM tbl_search_blotter";
		$result2 = mysql_query($sql2);
		$row2 = mysql_fetch_array($result2);
		$blank= $row2['s_search'];
		
		if ($blank != '')
		{
		$button ='Browse All';
		}
		else
		{
		$button ='Search';
		}
?> 
 
<form action="processReports.php?action=listofcrime" method="post" enctype="multipart/form-data" name="frmAddarchives" id="frmAddarchives">
	<table border="0" align="center" cellpadding="5" cellspacing="1" class="searchreports">

  <tr>
  <td class="label"> From
  <td class="content"><label>
  <input name="txtfrom" type="text" size="10">
  <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  <a href="javascript:cal11.popup();"><img src="/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>
  <td class="label"> to
  <td class="content"><label>
  <input name="txtto" type="text" size="10">
  <script language="JavaScript" src="/bacolodcitypoliceoffice/tigra/calendar3.js"></script>  <a href="javascript:cal22.popup();"><img src="/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>

	<td class="label" align='center'><input name="btnAddarchives" type="button" id="btnAddarchives" value="OK" onClick="checkprintForm();" class="box" />
  </table>

 <script type="text/javascript">
function mySubmit() {
// document.edit.save.value = "yes";
document.edit.onsubmit(); // workaround browser bugs.
document.edit.submit();
};
</script>
</form>

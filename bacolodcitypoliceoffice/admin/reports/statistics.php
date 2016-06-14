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
 
<form action="processReports.php?action=statistics" method="post" enctype="multipart/form-data" name="frmAddarchives2" id="frmAddarchives2">
	<table border="0" align="center" cellpadding="5" cellspacing="1" class="searchreports">

  <tr>
  <td class="label"> From
  <td class="content"><label>
  <input name="txtfrom2" type="text" size="10">
  <script language="JavaScript" src="/bcpo/tigra/calendar3.js"></script>  <a href="javascript:cal111.popup();"><img src="/bcpo/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>
  <td class="label"> to
  <td class="content"><label>
  <input name="txtto2" type="text" size="10">
  <script language="JavaScript" src="/avrc/bcpo/tigra/calendar3.js"></script>  <a href="javascript:cal222.popup();"><img src="/bcpo/tigra/img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the date"></a>
  </label>

	<td class="label" align='center'><input name="btnAddarchives" type="button" id="btnAddarchives" value="OK" onClick="checkprintFormstats();" class="box" />
  </table>

 <script type="text/javascript">
function mySubmit() {
// document.edit.save.value = "yes";
document.edit.onsubmit(); // workaround browser bugs.
document.edit.submit();
};
</script>
</form>


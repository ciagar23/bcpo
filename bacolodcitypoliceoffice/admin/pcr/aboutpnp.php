<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

		
$sql = "SELECT a_id, a_content
        FROM tbl_aboutpnp";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);

?>
<p>&nbsp;</p>
  <article class="module width_full">
			<header><h3>About PNP</h3></header>
			<div class="module_content">
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
 <table width="100%" border="0" align="center"  class="detail">
  <tr> 
   <td colspan="2" width="187" ><div align="center"><? echo nl2br($a_content);?></div></td>

 </table>
 <p align="center">
   <input name="btnBack" type="button" id="btnBack" value=" Modify " onClick="window.location.href='index.php?view=aboutpnpedit';" class="box">
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.location.href='index.php';" class="box"></p>
</form>

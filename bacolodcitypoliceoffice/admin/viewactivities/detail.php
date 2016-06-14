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
		


$sql = "SELECT ac_id, ac_title, ac_content, ac_date
        FROM tbl_activities
		WHERE ac_id = $policeId";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);

?>
<p>&nbsp;</p>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
 <table width="100%" border="0" align="center"  class="detail">
  <tr class="entryTable"> 
   <td class="label2" colspan="2" width="187" >&nbsp;</td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Date</strong></td>
   <td class="content" width="1016"><?php echo $ac_date; ?></td>
  </tr>
  <tr class='row2'> 
   <td class="label2" width="187" ><strong>Title</strong></td>
   <td class="content"> <?php echo $ac_title; ?></td>
  </tr>
   <tr class='row2'>
   <td class="content"  colspan="2" ><div align="justify"> <?php echo nl2br($ac_content); ?></div></td>
  </tr>
  <tr class='row1'> 
   <td  colspan="2">&nbsp;</td>
  </tr>
  <tr class='row2'> 
   <td class="content"  colspan="2">&nbsp;</td>
  </tr><tr class="entryTable"> 
   <td class="label2" colspan="2" width="187" >&nbsp;</td>
  </tr>
 </table>
 <p align="center">
   <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.location.href='index.php';" class="box"></p>
</form>

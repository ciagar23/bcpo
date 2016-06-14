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
		


$sql = "SELECT ac_id, ac_title, ac_content, ac_date, ac_img1, ac_img2, ac_img3
        FROM tbl_activities
		WHERE ac_id = $policeId";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);




if ($ac_img1) {
	$ac_img1 = '<img src="'.WEB_ROOT . 'images/activities/' . $ac_img1.'" width=400>';
} else {
	$ac_img1 = '';
}

if ($ac_img2) {
	$ac_img2 = '<img src="'.WEB_ROOT . 'images/activities/' . $ac_img2.'" width=400>';
} else {
	$ac_img2 = '';
}

if ($ac_img3) {
	$ac_img3 = '<img src="'.WEB_ROOT . 'images/activities/' . $ac_img3.'" width=400>';
} else {
	$ac_img3 = '';
}


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
   <td class="content" colspan="2"> <?php echo $ac_img1; ?></td>
  </tr>
  <tr class='row2'> 
   <td class="content" colspan="2"> <?php echo $ac_img2; ?></td>
  </tr>
  <tr class='row2'> 
   <td class="content" colspan="2"> <?php echo $ac_img3; ?></td>
  </tr>
  <tr class='row1'><h2> Activity</h2></td>
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
  
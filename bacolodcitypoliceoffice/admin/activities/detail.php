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
	$ac_img1 = '<img src="'.WEB_ROOT . 'images/activities/' . $ac_img1.'" >';
} else {
	$ac_img1 = '';
}

if ($ac_img2) {
	$ac_img2 = '<img src="'.WEB_ROOT . 'images/activities/' . $ac_img2.'" >';
} else {
	$ac_img2 = '';
}

if ($ac_img3) {
	$ac_img3 = '<img src="'.WEB_ROOT . 'images/activities/' . $ac_img3.'" >';
} else {
	$ac_img3 = '';
}

?>
<article class="module width_full">
		<header><h3 class="tabs_involved"> <?php echo $ac_title; ?>, <?php echo $ac_date; ?></h3>
		</header>

		<div class="tab_container">
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
 <table width="100%" border="0" align="center"  class="detail">
  </tr>
   <tr class='row1'>
   <td class="content"  colspan="2" >\<?php echo $ac_img1;?><br> <?php echo $ac_img2;?> <br> <?php echo $ac_img3;?> </td>
  </tr>
   </tr>
   <tr class='row1'>
   <td class="content"  colspan="2" ><div align="justify"> <?php echo nl2br($ac_content); ?></div></td>
  </tr>
 
 </table>
 <p align="center"> 
  <? if($station =='PCR'){?>
 <input name="btnAddBlotter" type="button" id="btnAddBlotter" value="Modify" onClick="window.location.href='index.php?view=modify&policeId=<? echo $ac_id;?>';" class="box">
 <? } else{}?>
 <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.location.href='index.php';" class="box"></p>
</form>

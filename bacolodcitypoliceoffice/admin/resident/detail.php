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
		
$sql2 = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result2 = mysql_query($sql2);
		$row2 = mysql_fetch_array($result2, MYSQL_ASSOC);	
		$station= $row2['user_station'];
		
		if($station =='TMU')
		{
		$link= 'index.php?view=addotherdatatmu&policeId='.$policeId;
		}
		else
		{
		
		$link= 'index.php?view=addotherdata&policeId='.$policeId;
		}


$sql = "SELECT w_id, w_lname, w_fname, w_mname, w_question, w_answer, w_gender, w_day, w_month, w_year, w_street, w_brgy, w_city, w_contact, w_username, w_email, w_regdate, w_logindate from tbl_webuser where w_id=$policeId
		ORDER BY w_regdate";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);

?>
<p>&nbsp;</p>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">

<article class="module width_full">
			<header><h3>Registered Resident</h3></header>
				<div class="module_content">

 <table width="100%" border="0" align="center"  class="detail">
  <tr class="entryTable"> 
   <td class="label2" colspan="2" width="187" >&nbsp;</td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Name</strong></td>
   <td class="content" width="1016"><?php echo $w_fname; ?> <?php echo $w_mname; ?> <?php echo $w_lname; ?> </td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Gender</strong></td>
   <td class="content" width="1016"><?php echo $w_gender; ?></td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Birth Date</strong></td>
   <td class="content" width="1016"><?php echo $w_month; ?> <?php echo $w_day; ?> <?php echo $w_year; ?></td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Street</strong></td>
   <td class="content" width="1016"><?php echo $w_street; ?></td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Baranggay</strong></td>
   <td class="content" width="1016"><?php echo $w_brgy; ?></td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>City</strong></td>
   <td class="content" width="1016"><?php echo $w_city; ?></td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Contact Number</strong></td>
   <td class="content" width="1016"><?php echo $w_contact; ?></td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>E-mail Address</strong></td>
   <td class="content" width="1016"><?php echo $w_email; ?></td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Date Registered</strong></td>
   <td class="content" width="1016"><?php echo $w_regdate; ?></td>
  </tr>
  <tr class='row1'> 
   <td class="label2" width="187" ><strong>Last Log in</strong></td>
   <td class="content" width="1016"><?php echo $w_logindate; ?></td>
  </tr>

 </table>
 <p align="center"> 
  
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.location.href='index.php';" class="box"></p>
</form>

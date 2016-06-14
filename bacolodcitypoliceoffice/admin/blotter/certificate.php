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


$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cname, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury, bl_crime,bl_blottedby, bl_station
        FROM tbl_blotter
		WHERE bl_id = $policeId";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);

?>
<p>&nbsp;</p>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">

<article class="module width_full">
			<header><h3>Certificate</h3></header>
				<div class="module_content">

 <table width="100%" border="0" align="center"  class="detail">
  <tr class="entryTable"> 
   <td class="label2" colspan="2" width="187" >
   
   <table width="100%" align="center">
   <tr>
   <td align="center"><img src="<?php echo WEB_ROOT;?>images/pnp.png" width="100" />
   <td align="center">   
   <p align="center"><em>Republic  of the Philippines</em><br />
    <strong>NATIONAL POLICE COMMISSION</strong><br />
    <strong>PHILIPPINE NATIONAL POLICE</strong><br />
    <strong>Bacolod city police office</strong><br />
    <strong><?php echo $bl_station;?></strong><br />
  19th  lacson st., Bacolod city<br />
  Tel. no. 434-8177</p>
  <td align="center"><img src="<?php echo WEB_ROOT;?>images/bcp.png" width="100" />
  </table>
  
  
  
  
<p align="right"><?php echo date('M d, Y');?><br />
   <p align="center"> <strong><u>CERTIFICATION</u></strong></p>
<p><u>TO WHOM IT MAY CONCERN:</u></p>
<p>&nbsp;</p>
<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<strong>THIS IS TO CERTIFY</strong> that based on available  data recorded in the police blotter of this station volume 2 series of <?php echo date('Y');?> docketed under entry no. <?php echo $bl_id;?> dated <?php echo date('M d, Y');?> the  following acts and circumstances.<br />
    <p align="center"><strong><?php echo $bl_crime;?></strong></p>

 <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <?php echo $bl_outline;?></p>
 <br>
<p align="justify">Disposition: For Record<br />
  Recorded by: <strong><?php echo $bl_blottedby;?></strong></p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

This  certification is issued upon the request of <?php echo $bl_cname;?> for whatever legal  purpose it may serve her.</p>
<p>&nbsp;</p><br>
<p align="right"><strong>ROBERTO R. DEJUCOS</strong><br />
  Police inspector<br />
  Deputy Chief of police</p>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   </td>
  </tr>
 </table>
 <p align="center"> 
  
 <input name="btnAddBlotter" type="button" id="btnAddBlotter" value="Add Other Data" onClick="window.location.href='<? echo $link;?>';" class="box">
 <input name="btnAddBlotter" type="button" id="btnAddBlotter" value="View Other Data" onClick="window.location.href='index.php?view=otherdata&policeId=<? echo $policeId;?>';" class="box">
  <input name="btnBack" type="button" id="btnBack" value=" Print " onClick="window.location.href='printindex.php?view=certificate&policeId=<? echo $policeId;?>'" class="box">
  <input name="btnBack" type="button" id="btnBack" value=" Back " onClick="window.location.href='index.php';" class="box"></p>
</form>

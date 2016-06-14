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


$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cname, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury, bl_crime,bl_blottedby
        FROM tbl_blotter
		WHERE bl_id = $policeId";
$result = mysql_query($sql) or die('Cannot get records. ' . mysql_error());
$row = mysql_fetch_assoc($result);
extract($row);

?>
<p>&nbsp;</p>
<form action="processBlotter.php?action=addBlotter" method="post" enctype="multipart/form-data" name="frmAddBlotter" id="frmAddBlotter">
  <table width="100%" height="100%" border="0" cellspacing="2">
    <tr>
      <td height="371" valign="top"><table width="100%" border="0" align="center" cellspacing="2">
          <tr>
            <td width="50%"><strong>BACOLOD CITY POLICE OFFICE<br>                
              <? echo strtoupper($station);?><br />
            BACOLOD CITY</strong></td>
            <td width="50%" valign="top"><strong>Date/Time:</strong> <?php echo $bl_date; ?></td>
          </tr>
          <tr>
            <td colspan="2"><strong>Name of the Complainant:</strong> <?php echo $bl_cname; ?> <br />
              <strong>Address of the Complainant:</strong> <?php echo $bl_caddress; ?><br />
              <strong>Nature of Complaint:</strong> <?php echo $bl_crime; ?><br />
              <strong>Place of Incident: </strong><?php echo $bl_clocation; ?><br />
              <strong>Contact Number: </strong><?php echo $bl_ccontact; ?> <br></td>
          </tr>
          <tr>
            <td colspan="2" align="center"><br><strong>BRIEF OUTLINE OF THE CASE </strong><br /><br />            </td>
          </tr>
          <tr>
            <td height="76" colspan="2" align="justify"><?php echo $bl_outline; ?></td>
          </tr>
          <tr>
            <td> <br><strong>DESK OFFICER:</strong> <?php echo $bl_blottedby; ?> </td>
            <td align="center" valign="bottom" > ___________________ </td>
          </tr>
        <tr>
            <td> <strong>REFERRED TO </strong>:<?php echo $bl_refferedto ; ?> </td>
          <td align="center" valign="top"><strong>Complainant </strong></td>
        </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td height="55">
    <tr>
      <td><table width="100%" border="0" align="center" cellspacing="2">
        <tr>
          <td width="50%"><strong>BACOLOD CITY POLICE OFFICE<br />              
              <? echo strtoupper($station);?><br />
            BACOLOD CITY</strong></td>
          <td width="50%" valign="top"><strong>Date/Time: </strong><?php echo $bl_date; ?></td>
        </tr>
        <tr>
          <td colspan="2"><strong>Name of the Complainant: </strong><?php echo $bl_cname; ?> <br />
            <strong>Address of the Complainant: </strong><?php echo $bl_caddress; ?><br />
            <strong>Nature of Complaint: </strong><?php echo $bl_crime; ?><br />
            <strong>Place of Incident: </strong><?php echo $bl_clocation; ?><br />
            <strong>Contact Number:</strong> <?php echo $bl_ccontact; ?> <br></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><br><strong>BRIEF OUTLINE OF THE CASE </strong><br><br>          </td>
        </tr>
        <tr>
          <td height="87" colspan="2" align="justify"><?php echo $bl_outline; ?></td>
        </tr>
        <tr>
          <td><br> <strong>DESK OFFICER:</strong> <?php echo $bl_blottedby; ?> </td>
          <td align="center" valign="bottom" > ___________________ </td>
        </tr>
        <tr>
          <td> <strong>REFERRED TO </strong>:<?php echo $bl_refferedto; ?> </td>
          <td align="center" valign="top"><strong>Complainant </strong></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
<script language="javascript">
<!--
	window.print()
	window.close()
	window.location = "index.php?view=detail&policeId=<?php echo $policeId; ?>";
//-->
</script>
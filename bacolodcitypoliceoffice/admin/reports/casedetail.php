<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

if (isset($_GET['catId']) && (int)$_GET['catId'] > 0) 
	{
	$catId = (int)$_GET['catId'];
	$sql2 = " AND p.cat_id = $catId";
	$queryString = "catId=$catId";
	} 
	
	else 
		{
		$catId = 0;
		$sql2  = '';
		$queryString = '';
		}

$rowsPerPage = 20;

$department = (isset($_GET['department']) && $_GET['department'] != '') ? $_GET['department'] : '';
if($department == 'All')
{
$query ='';
}
else
{
$query ="BL_station='".$department."' and";
}

$sql = "SELECT user_station
        FROM tbl_user where user_name='$department'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);	
		$station= $row['user_station'];
		

$from = (isset($_GET['txtfrom3']) && $_GET['txtfrom3'] != '') ? $_GET['txtfrom3'] : '';
$case = (isset($_GET['txtcase']) && $_GET['txtcase'] != '') ? $_GET['txtcase'] : '';
		$to = (isset($_GET['txtto3']) && $_GET['txtto3'] != '') ? $_GET['txtto3'] : '';
		
/*$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cname, bl_cage, bl_cgender, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rage, bl_rgender, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury,bl_investigator, bl_dtg, bl_cnat, bl_rdrugs, bl_ralc, bl_runc, bl_rfa, bl_rnat, bl_brgy, bl_prosec, bl_court, bl_crime, bl_cstatus, bl_rstatus
        FROM tbl_blotter
		WHERE bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to'
		ORDER BY bl_id desc";*/

	
$sql = "SELECT bl_id, bl_cname, bl_date, bl_caddress, bl_gang, bl_date, bl_clocation, bl_statusofcase
        FROM tbl_blotter
		WHERE $query bl_date >= '$from' and bl_date <= '$to' and bl_crime = '$case'
		ORDER BY bl_date desc";
		
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, $queryString);

?>
<style>

.heading
	{
	text-align: center;
	background-color: #A9B4B8;
	font-size: 15px;
	font-weight: 800;
	}
	
.listContent
	{
	text-align: left;
	background-color: ;
	font-size: 13px;
	font-weight: 500;
	}
	
.row1
	{
	background-color:#E4E5E7;
	}

.row2
	{
	background-color:#CACBCB;
	}
	
	
</style> 
<form action="processRogue.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">

<p align="center"><strong>DETAILED REPORTS ON <? echo strtoupper($case);?> CASES</strong><br/>
Period Covered:<?php echo $from; ?> - <?php echo $to; ?><br>
Department: <? echo strtoupper($department);?></p>

<table border="1" align="center">
  <tr>
    <td width="60"><div align="center">Address</div></td>
    <td width="82"><div align="center">Name of Victim(s)  </div></td>
    <td width="101"><div align="center">Name of Suspect(s) </div></td>
    <td width="97"><div align="center">Group Affiliation &amp; Classification </div></td>
    <td width="67"><div align="center">Date/Time of Incident </div></td>
    <td width="103"><div align="center">
      <div align="center">Place of Incident </div>
    </div></td>
    <td width="137"><div align="center">Status of Case </div></td>
  </tr>
  
<?php
$parentId = 0;
if (dbNumRows($result) > 0) 
	{
	$i = 0;
	
	while($row = dbFetchAssoc($result)) 
		{
		extract($row);
		
		
if ($i%2) 
		{
		$class = 'row1';
		} 
			
		else 
			{
			$class = 'row2';
			}
		
		$i += 1;
?> 
 
	<tr class="<?php echo $class; ?>"> 
    <td valign="top" width="25%"><? echo $bl_caddress;?>&nbsp;</td>
    <td valign="top"><? echo $bl_cname;?>&nbsp;</td>
    <td valign="top" width="20%"><? include 'casedetailsub.php';?>&nbsp;</td>
    <td valign="top"><? echo $bl_gang;?>&nbsp;</td>
    <td valign="top"><? echo $bl_date;?>&nbsp;</td>
    <td valign="top"><? echo $bl_clocation;?>&nbsp;</td>
    <td valign="top"><? echo $bl_statusofcase;?>&nbsp;</td>
 
 
  <?php
	} // end while
?>
	<tr> 
   		<td colspan="22" align="center"><?php echo $pagingLink; ?></td>
  	</tr>
<?php	
} 
else 
	{
?>
  	<tr> 
   		<td colspan="22" align="center">Detailed reports  return zero result</td>
  	</tr>
  <?php
}
?>

</table>
<p>&nbsp;</p>
<div align="center">
<input type="button" value="Back" onclick="window.history.back();" /></div>


</form>
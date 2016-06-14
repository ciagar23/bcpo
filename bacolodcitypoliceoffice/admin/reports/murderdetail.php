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

$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);	
		$station= $row['user_station'];
		

$from = (isset($_GET['txtfrom3']) && $_GET['txtfrom3'] != '') ? $_GET['txtfrom3'] : '';
		$to = (isset($_GET['txtto3']) && $_GET['txtto3'] != '') ? $_GET['txtto3'] : '';
		
/*$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cname, bl_cage, bl_cgender, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rage, bl_rgender, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury,bl_investigator, bl_dtg, bl_cnat, bl_rdrugs, bl_ralc, bl_runc, bl_rfa, bl_rnat, bl_brgy, bl_prosec, bl_court, bl_crime, bl_cstatus, bl_rstatus
        FROM tbl_blotter
		WHERE bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to'
		ORDER BY bl_id desc";*/

	
$sql = "SELECT of_id, of_bl_id, bl_clocation, of_name, of_aka, of_alias, of_address, of_casestatus, of_gender, of_height, of_weight, of_birthplace, of_birthdate, of_haircolor, of_occupation, of_mark, of_gang, of_influence, of_disposition, of_nat, of_age, of_datetime, of_casestatus, bl_cstatus, bl_statusofcase
        FROM tbl_offender o, tbl_blotter b
		WHERE of_station='$station' and of_datetime >= '$from' and of_datetime <= '$to' and o.of_bl_id = b.bl_id and bl_crime = 'Murder'
		ORDER BY of_datetime desc";
		
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

<p align="center"><strong>DETAILED REPORTS ON MURDER CASES</strong><br/>
Period Covered:<?php echo $from; ?> - <?php echo $to; ?></p>

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
    <td width="137"><div align="center">Status of Victim(s) </div></td>
    <td width="137"><div align="center">Status of Suspect(s) </div></td>
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
		
$sql1 = "SELECT *
        FROM tbl_blotter where bl_id =$of_bl_id ";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$bl_cname= $show['bl_cname'];
		$bl_caddress= $show['bl_caddress'];
		
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
    <td><? echo $bl_caddress;?>&nbsp;</td>
    <td><? echo $bl_cname;?>&nbsp;</td>
    <td><? echo $of_name;?>&nbsp;</td>
    <td><? echo $of_gang;?>&nbsp;</td>
    <td><? echo $of_datetime;?>&nbsp;</td>
    <td><? echo $bl_clocation;?>&nbsp;</td>
    <td><? echo $bl_cstatus;?>&nbsp;</td>
    <td><? echo $of_casestatus;?>&nbsp;</td>
    <td><? echo $bl_statusofcase;?>&nbsp;</td>
 
 
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
   		<td colspan="22" align="center">Rogue gallery return zero result</td>
  	</tr>
  <?php
}
?>

</table>
<p>&nbsp;</p>
</form>
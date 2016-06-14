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
		

$from = (isset($_GET['txtfrom']) && $_GET['txtfrom'] != '') ? $_GET['txtfrom'] : '';
		$to = (isset($_GET['txtto']) && $_GET['txtto'] != '') ? $_GET['txtto'] : '';
		
/*$sql = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cname, bl_cage, bl_cgender, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rage, bl_rgender, bl_rlicnr, bl_rinsurance, bl_rcontact, bl_rinjury,bl_investigator, bl_dtg, bl_cnat, bl_rdrugs, bl_ralc, bl_runc, bl_rfa, bl_rnat, bl_brgy, bl_prosec, bl_court, bl_crime, bl_cstatus, bl_rstatus
        FROM tbl_blotter
		WHERE bl_station='$station' and bl_new ='new' and bl_date >= '$from' and bl_date <= '$to'
		ORDER BY bl_id desc";*/

	
$sql = "SELECT of_id, of_bl_id, of_name, of_aka, of_alias, of_address, of_casestatus, of_gender, of_height, of_weight, of_birthplace, of_birthdate, of_haircolor, of_occupation, of_mark, of_gang, of_influence, of_disposition, of_nat,of_age
        FROM tbl_offender
		WHERE of_station='$station' and of_datetime >= '$from' and of_datetime <= '$to'
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

<center><h2>List of crime incident referred/processed by reporting PNP unit/Office<br>Period Covered: <?php echo $from; ?> - <?php echo $to; ?></h2>
<table width="100%" height="250" border="0" class="entryTable">

	<tr class='heading'>
		<td width=100 rowspan=3> BLOTTER <br> ENTRY NUMBER </td>
		<td width=80 rowspan=3> PLACE </td>
		<td width=84 rowspan=3><center> LAW <br> VIOLATED </center> </td>
		<td colspan=5> VICTIM'S DATA </td>
		<td colspan=9> SUSPECT'S DATA </td>
		<td colspan=3> ACTIONS TAKEN </td>
	
	<tr  class='heading'>
		<td width=100 rowspan=2> NAME </td>
		<td width=43 rowspan=2> AGE </td>
		<td width=38 rowspan=2> SEX </td>
		<td width=73 rowspan=2> STATUS </td>
		<td width=43 rowspan=2> NAT </td>
		<td width=60 rowspan=2> NAME </td>
		<td colspan=4> USE OF </td>
		<td width=43 rowspan=2> AGE </td>
		<td width=38 rowspan=2> SEX </td>
		<td width=43 rowspan=2> NAT </td>
		<td width=73 rowspan=2> STATUS </td>
		<td width=108 rowspan=2> BARANGAY </td>
		<td width=129 rowspan=2> PORSECUTOR </td>
		<td width=70 rowspan=2> COURT </td>
		
	<tr  class='heading'>
		<td width=57 > DRUG </td>
		<td width=43 > ALC </td>
		<td width=44 > UNC </td>
		<td width=33 > F/A </td>
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
		$bl_rdrugs= $show['bl_rdrugs'];
		$bl_ralc= $show['bl_ralc'];
		$bl_rfa= $show['bl_rfa'];
		$bl_runc= $show['bl_runc'];
		$bl_brgy= $show['bl_brgy'];
		$bl_prosec= $show['bl_prosec'];
		$bl_court= $show['bl_court'];
		
if( $bl_rdrugs !=0)
	{
	$bl_rdrugs ='<img src="'.WEB_ROOT . 'images/check.png">';
	}
	
	else
		{
		$bl_rdrugs='';
		}

if( $bl_ralc !=0)
	{
	$bl_ralc ='<img src="'.WEB_ROOT . 'images/check.png">';
	}
	
	else
		{
		$bl_ralc='';
		}

if( $bl_rfa !=0)
	{
	$bl_rfa = '<img src="'.WEB_ROOT . 'images/check.png">';
	}
	
	else
		{
		$bl_rfa='';
		}
		
if( $bl_runc !=0)
	{
	$bl_runc ='<img src="'.WEB_ROOT . 'images/check.png">';
	}
	
	else
		{
		$bl_runc='';
		}

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
		<td valign=top class="listContent">&nbsp;<?php echo $of_bl_id; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $show['bl_clocation']; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $show['bl_crime']; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $show['bl_cname']; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $show['bl_cage']; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $show['bl_cgender']; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $show['bl_cstatus']; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $show['bl_cnat']; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $of_name; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $bl_rdrugs; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $bl_ralc; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $bl_runc; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $bl_rfa; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $of_age; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $of_gender; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $of_nat; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $of_casestatus; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $bl_brgy; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $bl_prosec; ?></td>
		<td valign=top class="listContent">&nbsp;<?php echo $bl_court; ?></td>
 
 
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
<script language="javascript">

window.print()
window.close()
window.location ='listnew.php?view=list&txtfrom=<? echo $from;?>&txtto=<? echo $to?>';


</script>

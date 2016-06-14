<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';


$rowsPerPage = 10;
$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);	
		$station= $row['user_station'];
		
$field = (isset($_GET['field']) && $_GET['field'] != '') ? $_GET['field'] : 'w_lname';
		$search = (isset($_GET['search']) && $_GET['search'] != '') ? $_GET['search'] : '';
		
$sql = "SELECT w_id, w_lname, w_fname, w_mname, w_question, w_answer, w_gender, w_day, w_month, w_year, w_street, w_brgy, w_city, w_contact, w_username, w_email, w_regdate, w_logindate from tbl_webuser where $field like '%$search%'
		ORDER BY w_regdate";

//to count the number of blotted	

$sql1   = "SELECT *
        FROM tbl_webuser WHERE $field like '%$search%'";		
$resultcount = mysql_query($sql1);
$total = mysql_num_rows($resultcount);
//
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');

if($errorMessage !='')
	{
	echo '<h4 class="alert_warning">'.$errorMessage.'</h4>';
	}
		else
		{
		}?> 


		<article class="module width_full">
		<header><h3 class="tabs_involved">Total: <?php echo $total; ?> , <?php echo $pagingLink;?></h3>
		</header>

		<div class="tab_container">
<? require_once 'search.php'; ?>

			<table class="tablesorter" cellspacing="0"> 
	<tr>
	<td>
	<form action="processBlotter.php?action=addBlotter" method="post"  name="frmListBlotter" id="frmListBlotter">
		<thead> <tr align="center"  class="entryTable"> 
			<th class="entryTable">Name</td>
  			<th class="entryTable" align="center">Baranggay</td>
			<th class="entryTable"> Last Log in</td>
  		</tr>
        </thead>
  <?php
if (dbNumRows($result) > 0) {
	$i = 0;
	
	while($row = dbFetchAssoc($result)) {
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
   		<td><a href="index.php?view=detail&policeId=<?php echo $w_id; ?>"><?php echo $w_fname; ?> <?php echo $w_lname; ?>&nbsp; </a></td>
   		<td align="center"><?php echo $w_brgy; ?></td>
   		<td width="70" align="center"><? echo $w_logindate;?>
  	</tr>
  <?php
	} // end while
	
} else {
?>
  	<tr> 
  		 <td colspan="5" align="center">No Records Yet</td>
  	</tr>
  <?php
}
?>

</table>
</div></article>
</form>
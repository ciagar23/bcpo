<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	
	$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
	$to = (isset($_GET['to']) && $_GET['to'] != '') ? $_GET['to'] : '';


$rowsPerPage = 100;
		
$sql = "SELECT r_from, r_to, r_message,r_user, r_datetime FROM tbl_messaging where r_from ='$station' and r_to ='$to' or r_from ='$to' and r_to ='$station'
		ORDER BY r_datetime";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');

	$sql2   = "UPDATE tbl_messaging SET r_read='yes' 
	where 
	 r_to = '$station' and r_from='$to' and r_read ='no'
	 ";
	
	$result2 = dbQuery($sql2);




?> 

<font color="#FF0000"><? echo $errorMessage;?></font>
<form action="processCrimereport.php?action=acrimereport" method="post"  name="frmListCrimereport" id="frmListCrimereport">

  <article class="module width_full">
			<header><h3> Conversation Between You and <?php echo $to;?> 
			<?php echo $pagingLink;?></h3></header>
			<div class="module_content">

  <?php
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
<fieldset>
          
            <b><?php echo $r_from; ?></b> (<?php echo $r_user;?>): &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
            <?php echo $r_message; ?>  &nbsp; 
  	</fieldset>
  <?php
	} // end while
	
} else {
?>
  	<fieldset>
            <label>No Chat Yet</label></fieldset>
  <?php
}
?>

</form>

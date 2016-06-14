<?

	
$sql1 = "SELECT of_name, of_bl_id, of_casestatus
        FROM tbl_offender
		WHERE of_bl_id = '$bl_id'
		ORDER BY of_name";
		
$result1     = dbQuery(getPagingQuery($sql1, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, $queryString);

?>

<form action="processRogue.php?action=addProduct" method="post"  name="frmListProduct" id="frmListProduct">

  
<?php
$parentId = 0;
if (dbNumRows($result1) > 0) 
	{
	$N = 0;
	
	while($row1 = dbFetchAssoc($result1)) 
		{
		extract($row1);
		
		
		
		$N += 1;

echo $N.'. ';
echo $of_name.' ('.$of_casestatus.')';
echo '<br>';
	} // end while
	
} 
else 
	{
echo 'No suspect';
}
?>

</form>
<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {

	case 'search' :
		search();
		break;


	default :
	    // if action is not defined or unknown
		// move to main product page
		header('Location: index.php');
}

function search()
{

    $name = $_POST['txtsearch'];


	$sql = "SELECT * FROM tbl_rogue_gallery WHERE r_name = '$name'";
	$result = mysql_query($sql);
	$numrows = mysql_num_rows($result);
	while($row = mysql_fetch_assoc($result))
	{
		extract($row);

	}
	if($numrows > 0)
	{
		header("Location: index.php?view=detail&policeId=$r_id;");
	}
	else
	{
		header("Location: index.php?view=add");
	}



	//header("Location: index.php?view=list");
}





?>
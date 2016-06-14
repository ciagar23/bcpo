<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) 
	{
	case 'addBlotter' :
		addBlotter();
		break;
		
	case 'modifyBlotter' :
		modifyBlotter();
		break;
		
	case 'deleteBlotter' :
		deleteBlotter();
		break;
	
	default :
		header('Location: index.php');
	}


function addBlotter()
{

$session = $_SESSION["username"];

$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);	
		$station= $row['user_station'];
		
    $reportedby       = $_POST['txtreportedby'];
    $cfname       = $_POST['txtcfname'];
    $clname       = $_POST['txtclname'];
    $cmname       = $_POST['txtcmname'];
    $address       = $_POST['txtaddress'];
    $complaint       = $_POST['txtcomplaint'];
    $location       = $_POST['txtlocation'];
    $refferedto       = $_POST['txtrefferedto'];
    $outline       = $_POST['txtoutline'];
	$sql   = "INSERT INTO tbl_blotter (bl_date, bl_reportedby, bl_cfname, bl_clname, bl_cmname, bl_caddress, bl_ccomplaint, bl_clocation, bl_crefferedto, bl_outline, bl_station)
	          VALUES (NOW(), '$reportedby', '$cfname', '$clname', '$cmname', '$address', '$complaint', '$location', '$refferedto', '$outline', '$station')";

	$result = dbQuery($sql);
	
	header("Location: index.php");	
}

function modifyBlotter()
{
	$policeId   = (int)$_GET['policeId'];	
    $reportedby       = $_POST['txtreportedby'];
    $cfname       = $_POST['txtcfname'];
    $clname       = $_POST['txtclname'];
    $cmname       = $_POST['txtcmname'];
    $caddress       = $_POST['txtaddress'];
    $ccomplaint       = $_POST['txtcomplaint'];
    $clocation       = $_POST['txtlocation'];
    $crefferedto       = $_POST['txtrefferedto'];
    $outline       = $_POST['txtoutline'];
	$sql   = "UPDATE tbl_blotter SET bl_reportedby = '$reportedby', bl_cfname = '$cfname', bl_clname = '$clname', bl_cmname = '$cmname', bl_caddress = '$caddress', bl_ccomplaint = '$ccomplaint', bl_clocation = '$clocation', bl_crefferedto = '$crefferedto', bl_outline = '$outline'
	where bl_id='$policeId' ";
	$result = dbQuery($sql);
	
	header('Location: index.php');			  
}


function deleteBlotter()
{
	if (isset($_GET['policeId']) && (int)$_GET['policeId'] > 0) {
		$policeId = (int)$_GET['policeId'];
	} else {
		header('Location: index.php');
	}
	
	$sql = "DELETE FROM tbl_blotter 
	        WHERE bl_id = $policeId";
	dbQuery($sql);
	
	header('Location: index.php');
}

?>
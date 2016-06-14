<?php
require_once '../library/config.php';
require_once '../admin/library/functionsweb.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) 
	{
		case 'search' :
		search();
		break;
		
	case 'reportreply' :
		reportreply();
		break;
		
	case 'reportaction' :
		reportaction();
		break;
	case 'policeaction' :
		policeaction();
		break;
		
	case 'deleteReport' :
		deleteReport();
		break;
		
	case 'confirm' :
		confirm();
		break;
		
	case 'addotherdatatmu' :
		addotherdatatmu();
		break;
		
	case 'modifyBlotter' :
		modifyBlotter();
		break;
		
	case 'read' :
		read();
		break;
	
	default :
		header('Location: index.php');
	}

function search()
{
	
    $field        = $_POST['txtfield'];
    $search        = $_POST['txtsearch'];
	
	
	$sql   = "UPDATE tbl_search_blotter 
	          SET s_field = '$field', s_search='$search'";  
	$result = dbQuery($sql);
	
	header("Location: index.php?view=list");	
}


function reportreply()
{

$session = $_SESSION["username"];	
$sql1 = "SELECT user_station FROM tbl_user where user_name ='$session' ";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$station= $show['user_station'];
		

    $to       = $_GET['complainant'];
    $complaint       = $_POST['txtcomplaint'];
    $report       = $_POST['txtreport'];
	$sql   = "INSERT INTO tbl_reportacrime (r_from, r_complaint, r_report, r_read, r_to, r_datetime)
	          VALUES ('$station','$complaint', '$report', 'no', '$to', NOW())";

	$result = dbQuery($sql);
	
	header("Location: index.php?error=Message Successfully Sent");	
}

function confirm()
{

$session = $_SESSION["username"];	
$sql1 = "SELECT user_station FROM tbl_user where user_name ='$session' ";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$station= $show['user_station'];
		

    $to       = $_GET['complainant'];
    $complaint       = $_POST['txtcomplaint'];
    $report       = $_POST['txtreport'];
	$sql   = "INSERT INTO tbl_reportacrime (r_from, r_complaint, r_report, r_read, r_to, r_datetime)
	          VALUES ('$station','Confirmation Message from $station', 'This is to confirm that $station has been responded to your complaint', 'no', 'Operations', NOW())";

	$result = dbQuery($sql);
	
	header("Location: index.php?error=Message Successfully Sent");	
}

function policeaction()
{
$session = $_SESSION["username"];	
$sql2 = "SELECT user_station FROM tbl_user where user_name ='$session' ";
		$result2 = mysql_query($sql2);
		$show = mysql_fetch_array($result2);	
		$station= $show['user_station'];
		
	$sql   = "INSERT INTO tbl_reportacrime (r_from, r_complaint, r_report, r_read, r_to, r_datetime,r_status)
	          VALUES ('$station','Done', 'this complaint has been taken an action', 'no', 'Operations', NOW(),'clear')";

	$result = dbQuery($sql);

	header("Location: index.php?error=Message Successfully Sent");	
}




function reportaction()
{
$session = $_SESSION["username"];	
$sql2 = "SELECT user_station FROM tbl_user where user_name ='$session' ";
		$result2 = mysql_query($sql2);
		$show = mysql_fetch_array($result2);	
		$station= $show['user_station'];
		
		 $complainant       = $_GET['complainant'];
$sql1 = "SELECT r_id,r_from,r_complaint, r_report, r_datetime,r_incidentdate,r_incidentplace, r_read, r_to
        FROM tbl_reportacrime
		WHERE r_to = '$station' and r_from = '$complainant' and r_status='report' order by r_id desc ";
		$result1 = mysql_query($sql1) or die('Cannot get records. ' . mysql_error());
$row1 = mysql_fetch_assoc($result1);
extract($row1);
		
    $action       = $_POST['action'];
    $outline       = $_POST['outline'];
	$sql   = "INSERT INTO tbl_reportacrime (r_from, r_complaint, r_report, r_read, r_to, r_datetime,r_status, r_incidentdate, r_incidentplace)
	          VALUES ('Operations','Please Respond to this complaint', '$outline', 'no', '$action', NOW(),'action','$r_incidentdate','$r_incidentplace')";

	$result = dbQuery($sql);
	$sql3   = "INSERT INTO tbl_reportacrime (r_from, r_complaint, r_report, r_read, r_to, r_datetime,r_status)
	          VALUES ('Operations','Your Report has been confirmed by $action', 'Thank you for using Bacolod City Police Office Online Cime Reporting,<br>The message has been confirmed by the station.<br><br>This Online system is monitored continuosly, and an officer incharge or the $action will respond to your report immediately.<br><br>All information provide by the BCPO Online Crime Reporting will ensure its validity, the information provided is ASIS while efforts has been made, make this information helpful and accurate.<br><br><B>important Note: Making false reports to law enforcement is a CRIME!</B>', 'no', '$r_from', NOW(),'action')";

	$result3 = dbQuery($sql3);
	
	header("Location: index.php?error=Message Successfully Sent");	
}

function modifyBlotter()
{
$session = $_SESSION["username"];

$sql1 = "SELECT user_fullname FROM tbl_user where user_name ='$session' ";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$blottedby= $show['user_fullname'];

$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);	
		$station= $row['user_station'];

	$policeId   = (int)$_GET['policeId'];	
	
	
	$sql2 = "SELECT bl_id, bl_date, bl_reportedby,bl_outline, bl_cname, bl_cage, bl_cgender, bl_cstatus, bl_cnat, bl_crime, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rage, bl_rgender, bl_rstatus,bl_rdrugs, bl_ralc, bl_rfa, bl_runc, bl_rnat, bl_rlicnr, bl_rinsurance, bl_rcontact, 
bl_rinjury, bl_copy, bl_brgy, bl_prosec, bl_court, bl_dtg
        FROM tbl_blotter
		WHERE bl_id = $policeId";
$result2 = mysql_query($sql2) or die('Cannot get Blotter. ' . mysql_error());
$row2    = mysql_fetch_assoc($result2);
extract($row2);
		$bl_copy = $bl_copy + 1;
	
   	$crime = (isset($_POST['cboCrime']) && $_POST['cboCrime'] != '') ? $_POST['cboCrime'] : '';
	$Investigator = (isset($_POST['cboInvestigator']) && $_POST['cboInvestigator'] != '') ? $_POST['cboInvestigator'] : '';
    $cname       = $_POST['txtcname'];
    $address       = $_POST['txtaddress'];
    $complaint       = $_POST['txtcomplaint'];
    $location       = $_POST['txtlocation'];
    $refferedto       = $_POST['txtrefferedto'];
    $outline       = $_POST['txtoutline'];
	$sql   = "INSERT INTO tbl_blotter 
	(bl_date, bl_cname, bl_caddress, bl_ccomplaint, bl_clocation, bl_refferedto, bl_outline, bl_station, bl_crime, bl_copy, bl_blottedby, bl_reportedby, bl_cage, bl_cgender, bl_cstatus, bl_cnat, bl_clicnr, bl_cinsurance, bl_ccontact, bl_cinjury, bl_rname, bl_rage, bl_rgender, bl_rstatus,bl_rdrugs, bl_ralc, bl_rfa, bl_runc, bl_rnat, bl_rlicnr, bl_rinsurance, bl_rcontact, 
bl_rinjury, bl_brgy, bl_prosec, bl_court, bl_dtg)
	          VALUES 
	(NOW(), '$cname', '$address', '$complaint', '$location', '$refferedto', '$outline', '$station','$crime','$bl_copy','$blottedby', '$Investigator', '$bl_cage', '$bl_cgender', '$bl_cstatus', '$bl_cnat', '$bl_clicnr', '$bl_cinsurance', '$bl_ccontact', '$bl_cinjury', '$bl_rname', '$bl_rage', '$bl_rgender', '$bl_rstatus', '$bl_rdrugs', '$bl_ralc', '$bl_rfa', '$bl_runc', '$bl_rnat', '$bl_rlicnr', '$bl_rinsurance', '$bl_rcontact', '$bl_rinjury', '$bl_brgy', '$bl_prosec', '$bl_court', '$bl_dtg')";

	$result = dbQuery($sql);
	$sql   = "UPDATE tbl_blotter SET bl_new = 'old'
	where bl_id='$policeId' ";
	$result = dbQuery($sql);

	
	$sql   = "INSERT INTO tbl_history (h_date, h_user, h_action, h_station, h_link)
	          VALUES (NOW(), '$blottedby', 'Recase Blotter no. $bl_id', '$station','/bacolodcitypoliceoffice/admin/blotter/index.php?view=detail&policeId=$policeId')";
	dbQuery($sql);
	
	header("Location: index.php");		  
}


function addotherdata()
{
	$policeId   = (int)$_GET['policeId'];	

$dtg = $_POST['txtdtg'];
$brgy= $_POST['txtbrgy'];
$prosec = $_POST['txtprosec'];
$court= $_POST['txtcourt'];
$cage = $_POST['txtcage'];
$cgender= $_POST['txtcgender'];
$cstatus= $_POST['txtcstatus'];
$cnat= $_POST['txtcnat'];
$rname= $_POST['txtrname'];
$rage = $_POST['txtrage'];
$rgender= $_POST['txtrgender'];
$rstatus= $_POST['txtrstatus'];
$rnat= $_POST['txtrnat'];

$drugs = (isset($_POST['checkdrugs']) && $_POST['checkdrugs'] != '') ? $_POST['checkdrugs'] : '';
$alc = (isset($_POST['checkalcohol']) && $_POST['checkalcohol'] != '') ? $_POST['checkalcohol'] : '';
$unc = (isset($_POST['checkunc']) && $_POST['checkunc'] != '') ? $_POST['checkunc'] : '';
$fa = (isset($_POST['checkfa']) && $_POST['checkfa'] != '') ? $_POST['checkfa'] : '';

if( $drugs !='')
{
$drugs = 1;
}
else
{
$drugs=0;
}

if( $alc !='')
{
$alc = 1;
}
else
{
$alc=0;
}

if( $fa !='')
{
$fa = 1;
}
else
{
$fa=0;
}
if( $unc !='')
{
$unc = 1;
}
else
{
$unc=0;
}


	$sql   = "UPDATE tbl_blotter SET bl_dtg = '$dtg', bl_brgy = '$brgy', bl_prosec='$prosec', bl_court='$court', bl_cage='$cage', bl_cgender='$cgender', bl_cstatus='$cstatus', bl_cnat='$cnat', bl_rname='$rname', bl_rage='$rage', bl_rgender='$rgender', bl_rstatus='$rstatus', bl_rnat='$rnat', bl_rdrugs ='$drugs', bl_rfa ='$fa', bl_ralc ='$alc', bl_ralc ='$alc', bl_runc ='$unc', bl_rfa='$fa'
	where bl_id='$policeId' ";
	$result = dbQuery($sql);
	header("Location: index.php?view=otherdata&policeId=$policeId");			  
}


function addotherdatatmu()
{
	$policeId   = (int)$_GET['policeId'];	

$accident = $_POST['txtaccident'];
$vehicle = $_POST['txtvehicle'];
$rname = $_POST['txtrname'];
$clicnr = $_POST['txtclicnr'];
$cinsurance= $_POST['txtcinsurance'];
$ccontact= $_POST['txtccontact'];
$cinjury= $_POST['txtcinjury'];
$rlicnr = $_POST['txtrlicnr'];
$rinsurance= $_POST['txtrinsurance'];
$rcontact= $_POST['txtrcontact'];
$rinjury= $_POST['txtrinjury'];

	$images = uploadTmuImage('pic', SRV_ROOT . 'images/tmuphotos/');
	$images2 = uploadTmuImage('pic2', SRV_ROOT . 'images/tmuphotos/');
	$images3 = uploadTmuImage('pic3', SRV_ROOT . 'images/tmuphotos/');
	$images4 = uploadTmuImage('pic4', SRV_ROOT . 'images/tmuphotos/');

	$mainImage = $images['image'];
	$mainImage2 = $images2['image'];
	$mainImage3 = $images3['image'];
	$mainImage4 = $images4['image'];
	
		// if uploading a new image
	// remove old image
	if ($mainImage != '' || $mainImage2 != '' || $mainImage3 != '' || $mainImage4 != '') {
		_deleteImage($policeId);
		
		$mainImage = "'$mainImage'";
		$mainImage2 = "'$mainImage2'";
		$mainImage3 = "'$mainImage3'";
		$mainImage4 = "'$mainImage4'";
	}  else {
		// if we're not updating the image
		// make sure the old path remain the same
		// in the database
		$mainImage = 'bl_tmupic1';
		$mainImage2 = 'bl_tmupic2';
		$mainImage3 = 'bl_tmupic3';
		$mainImage4 = 'bl_tmupic4';
	}
	

	$sql   = "UPDATE tbl_blotter SET bl_rname='$rname', bl_clicnr='$clicnr', bl_cinsurance = '$cinsurance', bl_ccontact ='$ccontact', bl_cinjury='$cinjury',
	bl_rlicnr='$rlicnr', bl_rinsurance = '$rinsurance', bl_rcontact ='$rcontact', bl_rinjury='$rinjury', bl_tmupic1=$mainImage, bl_tmupic2=$mainImage2, bl_tmupic3=$mainImage3, bl_tmupic4=$mainImage4, bl_accident='$accident', bl_vehicle='$vehicle'
	where bl_id='$policeId' ";
	$result = dbQuery($sql);
	
	header("Location: index.php?view=otherdatatmu&policeId=$policeId");			  
}

function uploadTmuImage($inputName, $uploadDir)
{
	$image     = $_FILES[$inputName];
	$imagePath = '';
	$thumbnailPath = '';
	
	// if a file is given
	if (trim($image['tmp_name']) != '') {
		$ext = substr(strrchr($image['name'], "."), 1); //$extensions[$image['type']];

		// generate a random new file name to avoid name conflict
		$imagePath = rand() * time() . ".$ext";
		
		list($width, $height, $type, $attr) = getimagesize($image['tmp_name']); 

		// make sure the image width does not exceed the
		// maximum allowed width
		if (LIMIT_ROGUE_WIDTH && $width > MAX_ROGUE_IMAGE_WIDTH) {
			$result    = createThumbnail($image['tmp_name'], $uploadDir . $imagePath, MAX_ROGUE_IMAGE_WIDTH);
			$imagePath = $result;
		} else {
			$result = move_uploaded_file($image['tmp_name'], $uploadDir . $imagePath);
		}	
		
	}

	
	return array('image' => $imagePath, 'thumbnail' => $thumbnailPath);
}


function deleteReport()
{
	if (isset($_GET['policeId']) && (int)$_GET['policeId'] > 0) {
		$policeId = (int)$_GET['policeId'];
	} else {
		header('Location: index.php');
	}
	
	$sql = "DELETE FROM tbl_reportacrime 
	        WHERE r_id = $policeId";
	dbQuery($sql);
	
	header('Location: index.php');
}

function read()
{
	if (isset($_GET['policeId']) && (int)$_GET['policeId'] > 0) {
		$policeId = (int)$_GET['policeId'];
	} else {
		header('Location: index.php');
	}
	
	$sql = "UPDATE tbl_reportacrime set r_read = 'yes' 
	        WHERE r_id = $policeId";
	dbQuery($sql);
	
	header('Location: index.php?view=crimereportdetail&policeId='.$policeId);
}

function _deleteImage($policeId)
{
	// we will return the status
	// whether the image deleted successfully
	$deleted = false;
	
	$sql = "SELECT  bl_tmupic1 ,bl_tmupic2 ,bl_tmupic3 ,bl_tmupic4
	        FROM tbl_blotter
			WHERE bl_id = $policeId";
	$result = dbQuery($sql) or die('Cannot delete image. ' . mysql_error());
	
	if (dbNumRows($result)) {
		$row = dbFetchAssoc($result);
		extract($row);
		
		if ($bl_tmupic1) {
			// remove the image file
			$deleted = @unlink(SRV_ROOT . "images/tmuphotos/$bl_tmupic1");
		}		
		if ($bl_tmupic2) {
			// remove the image file
			$deleted = @unlink(SRV_ROOT . "images/tmuphotos/$bl_tmupic2");
		}		
		if ($bl_tmupic3) {
			// remove the image file
			$deleted = @unlink(SRV_ROOT . "images/tmuphotos/$bl_tmupic3");
		}		
		if ($bl_tmupic4) {
			// remove the image file
			$deleted = @unlink(SRV_ROOT . "images/tmuphotos/$bl_tmupic4");
		}
	}
	
	return $deleted;
}




?>
<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) 
	{
	
	case 'search' :
		search();
		break;
		
	case 'addBlotter' :
		addBlotter();
		break;
		
	case 'addotherdata' :
		addotherdata();
		break;
		
	case 'addotherdatatmu' :
		addotherdatatmu();
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

function search()
{
	
    $field        = $_POST['txtfield'];
    $search        = $_POST['txtsearch'];
	
	
	$sql   = "UPDATE tbl_search_blotter 
	          SET s_field = '$field', s_search='$search'";  

	$result = dbQuery($sql);
	
	header("Location: index.php?view=list");	
}


function addBlotter()
{

$session = $_SESSION["username"];

		
$sql1 = "SELECT user_fullname FROM tbl_user where user_name ='$session' ";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$blottedby= $show['user_fullname'];

$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);	
		$station= $row['user_station'];
		
	$crime = (isset($_POST['cboCrime']) && $_POST['cboCrime'] != '') ? $_POST['cboCrime'] : '';
	$Investigator = (isset($_POST['cboInvestigator']) && $_POST['cboInvestigator'] != '') ? $_POST['cboInvestigator'] : '';
    $contact       = $_POST['txtcontact'];
    $cname       = $_POST['txtcname'];
    $address       = $_POST['txtaddress'];
    $complaint       = $_POST['txtcomplaint'];
    $location       = $_POST['txtlocation'];
    $refferedto       = $_POST['txtrefferedto'];
    $date       = (isset($_POST['txtdate']) && $_POST['txtdate'] != '') ? $_POST['txtdate'] : '';
    $outline       = $_POST['txtoutline'];
	$sql   = "INSERT INTO tbl_blotter (bl_date, bl_ccontact, bl_cname, bl_caddress, bl_ccomplaint, bl_clocation,bl_dateofincident , bl_refferedto, bl_outline, bl_station, bl_crime, bl_blottedby, bl_reportedby)
	          VALUES (NOW(), '$contact', '$cname', '$address', '$complaint', '$location', '$date', '$refferedto', '$outline', '$station','$crime', '$blottedby', '$Investigator')";

	$result = dbQuery($sql);
	
	$sql1 = "SELECT bl_id
        FROM tbl_blotter order by bl_id desc";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$bl_id= $show['bl_id'];
	
	if ($station =='TMU')
	{
	
	header("Location: index.php?view=detailtmu&policeId=$bl_id");
	}
	else
	{
		
	header("Location: index.php?view=detail&policeId=$bl_id");	
	}
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
<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) 
	{
		case 'aboutbcpo' :
		aboutbcpo();
		break;
	
		case 'aboutbacolod' :
		aboutbacolod();
		break;
		
		case 'aboutpnp' :
		aboutpnp();
		break;
		
	case 'addBlotter' :
		addBlotter();
		break;
		
	case 'addotherdata' :
		addotherdata();
		break;
		
	case 'addrespondents' :
		addrespondents();
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

function addrespondents()
{$session = $_SESSION["username"];	

$sql = "SELECT user_station
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$row = mysql_fetch_array($result, MYSQL_ASSOC);	
		$station= $row['user_station'];
	
    $policeId        = $_GET['policeId'];
    $name        = $_POST['txtname'];
    $aka        = $_POST['txtaka'];
    $alias        = $_POST['txtalias'];
    $address        = $_POST['txtaddress'];
    $casestatus        = $_POST['txtcasestatus'];
    $gender        = $_POST['txtgender'];
    $height        = $_POST['txtheight'];
    $weight        = $_POST['txtweight'];
    $birthdate        = $_POST['txtbirthdate'];
    $birthplace        = $_POST['txtbirthplace'];
    $haircolor        = $_POST['txthaircolor'];
    $occupation        = $_POST['txtoccupation'];
    $mark        = $_POST['txtmark'];
    $gang        = $_POST['txtgang'];
    $influence        = $_POST['txtinfluence'];
    $disposition        = $_POST['txtdisposition'];
    $nat        = $_POST['txtnat'];
    $age        = $_POST['txtage'];
	
	
	$sql   = "INSERT INTO tbl_offender (of_bl_id, of_name, of_aka, of_alias, of_address, of_casestatus, of_gender, of_height, of_weight, of_birthdate, of_birthplace, of_haircolor, of_occupation, of_mark, of_gang, of_influence, of_disposition, of_nat, of_datetime,of_station,of_age)
	          VALUES ('$policeId', '$name', '$aka', '$alias', '$address', '$casestatus', '$gender', '$height', '$weight', '$birthdate', '$birthplace', '$haircolor', '$occupation', '$mark', '$gang', '$influence', '$disposition', '$nat', NOW(),'$station','$age')";
	dbQuery($sql);
	
	header("Location: index.php?view=otherdata&policeId=$policeId");	
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
		
		$sql   = "INSERT INTO tbl_history (h_date, h_user, h_action, h_station, h_link, h_category)
	          VALUES (NOW(), '$blottedby', 'Added Blotter no. $bl_id', '$station','/bcpo/admin/blotter/index.php?view=detail&policeId=$bl_id', 'blotter')";
	dbQuery($sql);
	
	if ($station =='TMU')
	{
	
	header("Location: index.php?view=detailtmu&policeId=$bl_id");
	}
	else
	{
		
	header("Location: index.php?view=detail&policeId=$bl_id");	
	}
}

function aboutbacolod()
{
    $content       = $_POST['txtaboutbacolod'];
	$sql   = "UPDATE tbl_aboutbacolod SET a_content = '$content'";
	$result = dbQuery($sql);

	header("Location: index.php?view=aboutbacolod");		  
}

function aboutpnp()
{
    $content       = $_POST['txtaboutpnp'];
	$sql   = "UPDATE tbl_aboutpnp SET a_content = '$content'";
	$result = dbQuery($sql);

	header("Location: index.php?view=aboutpnp");		  
}

function aboutbcpo()
{
    $content       = $_POST['txtaboutbcpo'];
	$sql   = "UPDATE tbl_aboutbcpo SET a_content = '$content'";
	$result = dbQuery($sql);

	header("Location: index.php?view=aboutbcpo");		  
}


function addotherdata()
{
	$policeId   = (int)$_GET['policeId'];	
$brgy= $_POST['txtbrgy'];
$prosec = $_POST['txtprosec'];
$court= $_POST['txtcourt'];
$cage = $_POST['txtcage'];
$calias = $_POST['txtcalias'];
$cbirthdate = $_POST['txtcbirthdate'];
$cgender= $_POST['txtcgender'];
$cstatus= $_POST['txtcstatus'];
$cnat= $_POST['txtcnat'];
$coccupation = $_POST['txtcoccupation'];
$statusofcase = $_POST['txtstatusofcase'];

$trkind = $_POST['txttrkind'];
$trmodel = $_POST['txttrmodel'];
$trplateno = $_POST['txttrplateno'];
$trmotorno = $_POST['txttrmotorno'];
$trregno = $_POST['txttrregno'];
$trchasisno = $_POST['txttrchasisno'];
$trmakeyear = $_POST['txttrmakeyear'];


$fakind = $_POST['txtfakind'];
$famake = $_POST['txtfamake'];
$facaliber = $_POST['txtfacaliber'];
$faserial = $_POST['txtfaserial'];
$falicense = $_POST['txtfalicense'];

$drugs = (isset($_POST['checkdrugs']) && $_POST['checkdrugs'] != '') ? $_POST['checkdrugs'] : '';
$alc = (isset($_POST['checkalcohol']) && $_POST['checkalcohol'] != '') ? $_POST['checkalcohol'] : '';
$unc = (isset($_POST['checkunc']) && $_POST['checkunc'] != '') ? $_POST['checkunc'] : '';
$fa = (isset($_POST['checkfa']) && $_POST['checkfa'] != '') ? $_POST['checkfa'] : '';
$blunt = (isset($_POST['checkblunt']) && $_POST['checkblunt'] != '') ? $_POST['checkblunt'] : '';
$bladed = (isset($_POST['checkbladed']) && $_POST['checkbladed'] != '') ? $_POST['checkbladed'] : '';
$hands = (isset($_POST['checkhands']) && $_POST['checkhands'] != '') ? $_POST['checkhands'] : '';
$poison = (isset($_POST['checkpoison']) && $_POST['checkpoison'] != '') ? $_POST['checkpoison'] : '';

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

if( $blunt !='')
{
$blunt = 1;
}
else
{
$blunt=0;
}

if( $bladed !='')
{
$bladed = 1;
}
else
{
$bladed=0;
}

if( $hands !='')
{
$hands = 1;
}
else
{
$hands=0;
}

if( $poison !='')
{
$poison = 1;
}
else
{
$poison=0;
}


	$sql   = "UPDATE tbl_blotter SET bl_brgy = '$brgy', bl_prosec='$prosec', bl_court='$court', bl_cage='$cage', bl_calias ='$calias', bl_cbirthdate ='$cbirthdate', bl_cgender='$cgender', bl_cstatus='$cstatus', bl_cnat='$cnat', bl_coccupation ='$coccupation', bl_rdrugs ='$drugs', bl_rfa ='$fa', bl_ralc ='$alc', bl_runc ='$unc', bl_rblunt = '$blunt', bl_rbladed = '$bladed', bl_rhands = '$hands', bl_rpoison = '$poison', bl_statusofcase ='$statusofcase', bl_trkind ='$trkind', bl_trmodel ='$trmodel', bl_trplateno ='$trplateno', bl_trmotorno ='$trmotorno', bl_trregno ='$trregno', bl_trchasisno ='$trchasisno', bl_trmakeyear ='$trmakeyear', bl_fakind='$fakind', bl_famake='$famake', bl_facaliber='$facaliber', bl_faserial='$faserial', bl_falicense='$falicense'
	where bl_id=$policeId";
	$result = dbQuery($sql);
	header("Location: index.php?view=addrespondent&policeId=$policeId");			  
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
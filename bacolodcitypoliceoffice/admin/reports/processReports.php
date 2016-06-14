<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'statistics' :
		statistics();
		break;
	
	case 'listofcrime' :
		listofcrime();
		break;
	
	case 'addRogue' :
		addRogue();
		break;
	
	case 'addCrime' :
		addCrime();
		break;
	
	case 'addCrime2' :
		addCrime2(); //para ni ya sa nakabutang na da modify at least naka agi na siya crime before
		break;
		
	case 'modifyRogue' :
		modifyRogue();
		break;
		
	case 'deleteRogue' :
		deleteRogue();
		break;
	
	case 'deleteImage' :
		deleteImage();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main product page
		header('Location: index.php');
}

function listofcrime()
{
	
    $from        = $_POST['txtfrom'];
    $to        = $_POST['txtto'];
	
	
	$sql   = "UPDATE tbl_search_reports 
	          SET s_from = '$from', s_to='$to'";  

	$result = dbQuery($sql);
	
	header("Location: index.php?view=list");	
}


function statistics()
{
	
    $from        = $_POST['txtfrom2'];
    $to        = $_POST['txtto2'];
	
	
	$sql   = "UPDATE tbl_search_reports 
	          SET s_from = '$from', s_to='$to'";  

	$result = dbQuery($sql);
	
	header("Location: index.php?view=crimeincident");	
}



function addRogue()
{
	$name        = $_POST['txtname'];
    $alias        = $_POST['txtalias'];
    $age        = $_POST['txtage'];
    $sex        = $_POST['txtsex'];
    $citizenship        = $_POST['txtcitizenship'];
    $dob        = $_POST['txtdob'];
    $pob        = $_POST['txtpob'];
    $p_address        = $_POST['txtpaddress'];
    $address        = $_POST['txtaddress'];
    $occupation        = $_POST['txtoccupation'];
    $g_affilation        = $_POST['txtgaffilation'];
    $modus        = $_POST['txtmodus'];
    $area_opn        = $_POST['txtarea'];
    $height        = $_POST['txtheight'];
    $weight        = $_POST['txtweight'];
    $build        = $_POST['txtbuild'];
    $complexion        = $_POST['txtcomplexion'];
    $hair        = $_POST['txthair'];
    $eyes        = $_POST['txteyes'];
    $others        = $_POST['txtothers'];
    $sname        = $_POST['txtsname'];
    $salias        = $_POST['txtsalias'];
    $sage        = $_POST['txtsage'];
    $ssex        = $_POST['txtssex'];
    $scitizenship        = $_POST['txtscitizenship'];
    $sdob        = $_POST['txtsdob'];
    $spob        = $_POST['txtspob'];
    $sp_address        = $_POST['txtspaddress'];
    $saddress        = $_POST['txtsaddress'];
    $soccupation        = $_POST['txtsoccupation'];
    $sg_affilation        = $_POST['txtsgaffilation'];
    $smodus        = $_POST['txtsmodus'];
    $sarea_opn        = $_POST['txtsarea'];
    $f_name        = $_POST['txtfname'];
    $f_age        = $_POST['txtfage'];
    $f_occupation        = $_POST['txtfoccupation'];
    $f_address        = $_POST['txtfaddress'];
    $m_name        = $_POST['txtmname'];
    $m_age        = $_POST['txtmage'];
    $m_occupation        = $_POST['txtmoccupation'];
    $m_address        = $_POST['txtmaddress'];
    $siblings        = $_POST['txtsiblings'];	
	
	$Crime = $_POST['mtxCrime'];
    $c_date        = $_POST['txtcdate'];
    $c_place        = $_POST['txtcplace'];
    $c_ccisnr        = $_POST['txtccisnr'];
    $c_branch        = $_POST['txtcbranch'];
    $c_status        = $_POST['txtcstatus'];
	
	$images = uploadRougeImage('fleImage', SRV_ROOT . 'images/rogue_gallery/');

	$mainImage = $images['image'];
	$thumbnail = $images['thumbnail'];
	
	$sql   = "INSERT INTO tbl_rogue_gallery (r_image, r_thumbnail, r_name, r_alias, r_age, r_sex, r_citizenship, r_dob, r_pob, r_p_address, r_address, r_occupation, r_g_affilation, r_modus, r_area_opn, r_height, r_weight, r_build, r_complexion, r_hair, r_eyes, r_others, r_s_name, r_s_alias, r_s_age, r_s_sex, r_s_citizenship, r_s_dob, r_s_pob, r_s_p_address, r_s_address, r_s_occupation, r_s_g_affilation, r_s_modus, r_s_area_opn, r_f_name, r_f_age, r_f_occupation, r_f_address, r_m_name, r_m_age, r_m_occupation, r_m_address, r_siblings)
	          VALUES ('$mainImage', '$thumbnail', '$name', '$alias', '$age', '$sex', '$citizenship', '$dob', '$pob', '$p_address', '$address', '$occupation', '$g_affilation', '$modus', '$area_opn', '$height', '$weight', '$build', '$complexion', '$hair', '$eyes', '$others', '$sname', '$salias', '$sage', '$ssex', '$scitizenship', '$sdob', '$spob', '$sp_address', '$saddress', '$soccupation', '$sg_affilation', '$smodus', '$sarea_opn', '$f_name', '$f_age', '$f_occupation', '$f_address', '$m_name', '$m_age', '$m_occupation', '$m_address', '$siblings')";

	$result = dbQuery($sql);
	
	$sql1 = "SELECT r_id
        FROM tbl_rogue_gallery order by r_id desc";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$rId= $show['r_id'];
		$sql   = "INSERT INTO tbl_roguelist (r_id, rl_crime, rl_date, rl_place, rl_ccisnr, rl_branch, rl_status)
	          VALUES ('$rId', '$Crime', '$c_date', '$c_place', '$c_ccisnr', '$c_branch', '$c_status')";

	$result = dbQuery($sql);
	
	header("Location: index.php");	
}


function addCrime()
{
	$policeId   = (int)$_GET['policeId'];
    $crime        = $_POST['mtxCrime'];	
	
	$sql1 = "SELECT r_id
        FROM tbl_rogue_gallery order by r_id desc";
		
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$rId= $show['r_id'];
		$sql   = "INSERT INTO tbl_roguelist (r_id, rl_crime)
	          VALUES ('$rId', '$crime')";

	$result = dbQuery($sql);
	
	header("Location: index.php?view=detail&policeId=$policeId");	
}
function addCrime2()
{
	$policeId   = (int)$_GET['policeId'];
    $crime        = $_POST['mtxCrime'];	
	
	$sql   = "INSERT INTO tbl_roguelist (r_id, rl_crime)
	          VALUES ('$policeId', '$crime')";

	$result = dbQuery($sql);
	
	header("Location: index.php?view=detail&policeId=$policeId");	
}

/*
	Upload an image and return the uploaded image name 
*/
function uploadRougeImage($inputName, $uploadDir)
{
	$image     = $_FILES[$inputName];
	$imagePath = '';
	$thumbnailPath = '';
	
	// if a file is given
	if (trim($image['tmp_name']) != '') {
		$ext = substr(strrchr($image['name'], "."), 1); //$extensions[$image['type']];

		// generate a random new file name to avoid name conflict
		$imagePath = md5(rand() * time()) . ".$ext";
		
		list($width, $height, $type, $attr) = getimagesize($image['tmp_name']); 

		// make sure the image width does not exceed the
		// maximum allowed width
		if (LIMIT_ROGUE_WIDTH && $width > MAX_ROGUE_IMAGE_WIDTH) {
			$result    = createThumbnail($image['tmp_name'], $uploadDir . $imagePath, MAX_ROGUE_IMAGE_WIDTH);
			$imagePath = $result;
		} else {
			$result = move_uploaded_file($image['tmp_name'], $uploadDir . $imagePath);
		}	
		
		if ($result) {
			// create thumbnail
			$thumbnailPath =  md5(rand() * time()) . ".$ext";
			$result = createThumbnail($uploadDir . $imagePath, $uploadDir . $thumbnailPath, THUMBNAIL_WIDTH);
			
			// create thumbnail failed, delete the image
			if (!$result) {
				unlink($uploadDir . $imagePath);
				$imagePath = $thumbnailPath = '';
			} else {
				$thumbnailPath = $result;
			}	
		} else {
			// the product cannot be upload / resized
			$imagePath = $thumbnailPath = '';
		}
		
	}

	
	return array('image' => $imagePath, 'thumbnail' => $thumbnailPath);
}

/*
	Modify a product
*/
function modifyRogue()
{
	$policeId   = (int)$_GET['policeId'];	
    $name        = $_POST['txtname'];
    $alias        = $_POST['txtalias'];
    $age        = $_POST['txtage'];
    $sex        = $_POST['txtsex'];
    $citizenship        = $_POST['txtcitizenship'];
    $dob        = $_POST['txtdob'];
    $pob        = $_POST['txtpob'];
    $p_address        = $_POST['txtpaddress'];
    $address        = $_POST['txtaddress'];
    $occupation        = $_POST['txtoccupation'];
    $g_affilation        = $_POST['txtgaffilation'];
    $modus        = $_POST['txtmodus'];
    $area_opn        = $_POST['txtarea'];
    $height        = $_POST['txtheight'];
    $weight        = $_POST['txtweight'];
    $build        = $_POST['txtbuild'];
    $complexion        = $_POST['txtcomplexion'];
    $hair        = $_POST['txthair'];
    $eyes        = $_POST['txteyes'];
    $others        = $_POST['txtothers'];
    $sname        = $_POST['txtsname'];
    $salias        = $_POST['txtsalias'];
    $sage        = $_POST['txtsage'];
    $ssex        = $_POST['txtssex'];
    $scitizenship        = $_POST['txtscitizenship'];
    $sdob        = $_POST['txtsdob'];
    $spob        = $_POST['txtspob'];
    $sp_address        = $_POST['txtspaddress'];
    $saddress        = $_POST['txtsaddress'];
    $soccupation        = $_POST['txtsoccupation'];
    $sg_affilation        = $_POST['txtsgaffilation'];
    $smodus        = $_POST['txtsmodus'];
    $sarea_opn        = $_POST['txtsarea'];
    $f_name        = $_POST['txtfname'];
    $f_age        = $_POST['txtfage'];
    $f_occupation        = $_POST['txtfoccupation'];
    $f_address        = $_POST['txtfaddress'];
    $m_name        = $_POST['txtmname'];
    $m_age        = $_POST['txtmage'];
    $m_occupation        = $_POST['txtmoccupation'];
    $m_address        = $_POST['txtmaddress'];
    $siblings        = $_POST['txtsiblings'];
	
	$images = uploadRougeImage('fleImage', SRV_ROOT . 'images/rogue_gallery/');

	$mainImage = $images['image'];
	$thumbnail = $images['thumbnail'];

	// if uploading a new image
	// remove old image
	if ($mainImage != '') {
		_deleteImage($policeId);
		
		$mainImage = "'$mainImage'";
		$thumbnail = "'$thumbnail'";
	} else {
		// if we're not updating the image
		// make sure the old path remain the same
		// in the database
		$mainImage = 'r_image';
		$thumbnail = 'r_thumbnail';
	}
			
	$sql   = "UPDATE tbl_rogue_gallery 
	          SET  r_image = $mainImage, r_thumbnail = $thumbnail, r_name = '$name', r_alias = '$alias', r_age = '$age', r_sex = '$sex', r_citizenship = '$citizenship', r_dob = '$dob', r_pob = '$pob', r_p_address = '$p_address', r_address = '$address', r_occupation = '$occupation', r_g_affilation = '$g_affilation', r_modus = '$modus', r_area_opn = '$area_opn', r_height = '$height', r_weight = '$weight', r_build = '$build', r_complexion = '$complexion', r_hair = '$hair', r_eyes = '$eyes', r_others = '$others', r_s_name = '$sname', r_s_alias = '$salias', r_s_age = '$sage', r_s_sex = '$ssex', r_s_citizenship = '$scitizenship', r_s_dob = '$sdob', r_s_pob = '$spob', r_s_p_address = '$sp_address', r_s_address = '$saddress', r_s_occupation = '$soccupation', r_s_g_affilation = '$sg_affilation', r_s_modus= '$smodus',r_s_area_opn = '$sarea_opn', r_f_name = '$f_name', r_f_age = '$f_age', r_f_occupation = '$f_occupation', r_f_address = '$f_address', r_m_name = '$m_name', r_m_age = '$m_age', r_m_occupation = '$m_occupation', r_m_address = '$m_address', r_siblings = '$siblings'
			   
			  WHERE r_id = $policeId";  

	$result = dbQuery($sql);
	
	header('Location: index.php');			  
}

/*
	Remove a product
*/
function deleteRogue()
{
	if (isset($_GET['policeId']) && (int)$_GET['policeId'] > 0) {
		$policeId = (int)$_GET['policeId'];
	} else {
		header('Location: index.php');
	}
			
	// get the image name and thumbnail
	$sql = "SELECT r_image, r_thumbnail
	        FROM tbl_rogue_gallery
			WHERE r_id = $policeId";
			
	$result = dbQuery($sql);
	$row    = dbFetchAssoc($result);
	
	// remove the product image and thumbnail
	if ($row['r_image']) {
		unlink(SRV_ROOT . 'images/rogue_gallery/' . $row['r_image']);
		unlink(SRV_ROOT . 'images/rogue_gallery/' . $row['r_thumbnail']);
	}
	
	// remove the product from database;
	$sql = "DELETE FROM tbl_rogue_gallery 
	        WHERE r_id = $policeId";
	dbQuery($sql);
	
		// remove the product from database;
	$sql = "DELETE FROM tbl_roguelist
	        WHERE r_id = $policeId";
	dbQuery($sql);
	
	header('Location: index.php');
}


/*
	Remove a product image
*/
function deleteImage()
{
	if (isset($_GET['policeId']) && (int)$_GET['policeId'] > 0) {
		$policeId = (int)$_GET['policeId'];
	} else {
		header('Location: index.php');
	}
	
	$deleted = _deleteImage($policeId);

	// update the image and thumbnail name in the database
	$sql = "UPDATE tbl_rogue_gallery
			SET r_image = '', r_thumbnail = ''
			WHERE r_id = $policeId";
	dbQuery($sql);		

	header("Location: index.php?view=modify&policeId=$policeId");
}

function _deleteImage($policeId)
{
	// we will return the status
	// whether the image deleted successfully
	$deleted = false;
	
	$sql = "SELECT r_image, r_thumbnail 
	        FROM tbl_rogue_gallery
			WHERE r_id = $policeId";
	$result = dbQuery($sql) or die('Cannot delete product image. ' . mysql_error());
	
	if (dbNumRows($result)) {
		$row = dbFetchAssoc($result);
		extract($row);
		
		if ($r_image && $r_thumbnail) {
			// remove the image file
			$deleted = @unlink(SRV_ROOT . "images/rogue_gallery/$r_image");
			$deleted = @unlink(SRV_ROOT . "images/rogue_gallery/$r_thumbnail");
		}
	}
	
	return $deleted;
}




?>
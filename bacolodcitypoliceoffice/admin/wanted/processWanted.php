<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'search' :
		search();
		break;

	case 'addWanted' :
		addWanted();
		break;
	
		
	case 'modifyWanted' :
		modifyWanted();
		break;
		
	
	case 'capture' :
		capture();
		break;
	case 'deleteImage' :
		deleteImage();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main product page
		header('Location: index.php');
}

function search()
{
	
    $field        = $_POST['txtfield'];
    $search        = $_POST['txtsearch'];
	
	
	$sql   = "UPDATE tbl_search_rogue_gallery 
	          SET s_field = '$field', s_search='$search'";  

	$result = dbQuery($sql);
	
	header("Location: index.php?view=list");	
}


function addWanted()
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
		
		
	$name        = $_POST['txtname'];
	$alias        = $_POST['txtalias'];
	$warrant        = $_POST['txtwarrant'];
	$casenumber       = $_POST['txtcasenumber'];
    $age        = $_POST['txtage'];
    $sex        = $_POST['txtgender'];
    $citizenship        = $_POST['txtcitizenship'];
    $dob        = $_POST['txtbirthdate'];
    $pob        = $_POST['txtbirthplace'];
    $address        = $_POST['txtaddress'];
    $height        = $_POST['txtheight'];
    $weight        = $_POST['txtweight'];
    $complexion        = $_POST['txtcomplexion'];
    $hair        = $_POST['txthair'];
    $eyes        = $_POST['txteyes'];
    $mark        = $_POST['txtmark'];
    $reward      = $_POST['txtreward'];    
    $caption      = $_POST['txtcaption'];    
    $crime      = $_POST['txtcrime'];    
	
	$images = uploadWantedImage('fleImage', SRV_ROOT . 'images/Wanted/');

	$mainImage = $images['image'];
	$thumbnail = $images['thumbnail'];
	
	$sql   = "INSERT INTO tbl_Wanted (w_name, w_alias, w_casenumber, w_dob, w_pob, w_height, w_weight, w_address, w_caption, w_gender, w_warrant, w_crime, w_age, w_captured, w_datenow, w_image, w_thumbnail, w_reward, w_citizenship, w_eyes, w_hair, w_complexion, w_mark)
	          VALUES ('$name', '$alias', '$casenumber', '$dob', '$pob', '$height', '$weight', '$address', '$caption', '$sex', '$warrant', '$crime', '$age', 'no', NOW(), '$mainImage', '$thumbnail', '$reward', '$citizenship', '$eyes', '$hair', '$complexion', '$mark')";

	$result = dbQuery($sql);
	
	$sql1 = "SELECT w_id
        FROM tbl_Wanted order by w_id desc";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$wId= $show['w_id'];
	
		$sql   = "INSERT INTO tbl_history (h_date, h_user, h_action, h_station, h_link, h_category)
	          VALUES (NOW(), '$blottedby', 'Added Wanted no. $wId', '$station','/bcpo/admin/Wanted/index.php?view=detail&policeId=$wId','Wanted')";
	dbQuery($sql);
	header("Location: index.php");	
}

function capture()
{
	if (isset($_GET['policeId']) && (int)$_GET['policeId'] > 0) {
		$policeId = (int)$_GET['policeId'];
	} else {
		header('Location: index.php');
	}
		
	
		// remove the product from database;
	$sql = "UPDATE tbl_wanted set w_captured='yes'
	        WHERE w_id = $policeId";
	dbQuery($sql);
	
	header('Location: index.php');
}

/*
	Upload an image and return the uploaded image name 
*/
function uploadWantedImage($inputName, $uploadDir)
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
function modifyWanted()
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
		
		$policeId = $_GET['policeId'];
		$name        = $_POST['txtname'];
	$alias        = $_POST['txtalias'];
	$warrant        = $_POST['txtwarrant'];
	$casenumber       = $_POST['txtcasenumber'];
    $age        = $_POST['txtage'];
    $sex        = $_POST['txtgender'];
    $citizenship        = $_POST['txtcitizenship'];
    $dob        = $_POST['txtbirthdate'];
    $pob        = $_POST['txtbirthplace'];
    $address        = $_POST['txtaddress'];
    $height        = $_POST['txtheight'];
    $weight        = $_POST['txtweight'];
    $complexion        = $_POST['txtcomplexion'];
    $hair        = $_POST['txthair'];
    $eyes        = $_POST['txteyes'];
    $mark        = $_POST['txtmark'];
    $reward      = $_POST['txtreward'];    
    $caption      = $_POST['txtcaption'];    
    $crime      = $_POST['txtcrime'];   

		$images = uploadWantedImage('fleImage', SRV_ROOT . 'images/Wanted/');

	$mainImage = $images['image'];
	$thumbnail = $images['thumbnail'];

	// if uploading a new image
	// remove old image
	if ($mainImage != '') {
		_deleteImage($policeId);
		
		$mainImage = "'$mainImage'";
		$thumbnail = "'$thumbnail'";
	}  else {
		// if we're not updating the image
		// make sure the old path remain the same
		// in the database
		$mainImage = 'w_image';
		$thumbnail = 'w_thumbnail';
	}
	
	
	
	//indi ma modify ang picture   

			
	$sql   = "UPDATE tbl_Wanted 
	          SET w_name='$name', w_alias='$alias', w_casenumber='$casenumber', w_dob='$dob', w_pob='$pob', w_height='$height', w_weight='$weight', w_address='$address', w_caption='$caption', w_gender='$sex', w_warrant='$warrant', w_crime='$crime', w_age='$age', w_image=$mainImage, w_thumbnail=$thumbnail, w_reward='$reward', w_citizenship='$citizenship', w_eyes='$eyes', w_hair='$hair', w_complexion='$complexion', w_mark='$mark'
			  WHERE w_id = $policeId";  

	$result = dbQuery($sql);
	
	$sql   = "INSERT INTO tbl_history (h_date, h_user, h_action, h_station, h_link, h_category)
	          VALUES (NOW(), '$blottedby', 'Modify to Wanted Person no. $policeId', '$station','/bcpo/admin/wanted/index.php?view=detail&policeId=$policeId','wanted')";
	dbQuery($sql);
	
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
	$sql = "SELECT r_image, r_thumbnail, r_image2, r_thumbnail2, r_image3, r_thumbnail3
	        FROM tbl_rogue_gallery
			WHERE r_id = $policeId";
			
	$result = dbQuery($sql);
	$row    = dbFetchAssoc($result);
	
	// remove the product image and thumbnail
	if ($row['r_image']) {
		unlink(SRV_ROOT . 'images/rogue_gallery/' . $row['r_image']);
		unlink(SRV_ROOT . 'images/rogue_gallery/' . $row['r_thumbnail']);
	}
	// remove the product image and thumbnail
	if ($row['r_image2']) {
		unlink(SRV_ROOT . 'images/rogue_gallery/' . $row['r_image2']);
		unlink(SRV_ROOT . 'images/rogue_gallery/' . $row['r_thumbnail2']);
	}
	// remove the product image and thumbnail
	if ($row['r_image3']) {
		unlink(SRV_ROOT . 'images/rogue_gallery/' . $row['r_image3']);
		unlink(SRV_ROOT . 'images/rogue_gallery/' . $row['r_thumbnail3']);
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
function mostwanted()
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
		
	if (isset($_GET['policeId']) && (int)$_GET['policeId'] > 0) {
		$policeId = (int)$_GET['policeId'];
	} else {
		header('Location: index.php');
	}

	$sql = "SELECT *
        FROM tbl_rogue_gallery where r_id = $policeId ";
		$result = mysql_query($sql);
		$rows = mysql_num_rows($result);
		$show = mysql_fetch_array($result);	
		$wanted= $show['r_mostwanted'];

	if($wanted == 'yes')
	{
	$mostwanted = 'no';
	}
	else
	{
	$mostwanted = 'yes';
	}
	
	// update the image and thumbnail name in the database
	$sql = "UPDATE tbl_rogue_gallery
			SET r_mostwanted = '$mostwanted',r_datewanted=NOW()
			WHERE r_id = $policeId";
	dbQuery($sql);		

    	$sql   = "INSERT INTO tbl_history (h_date, h_user, h_action, h_station, h_link, h_category)
	          VALUES (NOW(), '$blottedby', 'Mark A Most Wanted Person to Rouge Gallery no. $policeId', '$station','/bcpo/admin/rogue_gallery/index.php?view=detail&policeId=$policeId', 'rogue_gallery')";
	dbQuery($sql);
	
	header("Location: index.php");
}
function deleteImage()
{
	if (isset($_GET['policeId']) && (int)$_GET['policeId'] > 0) {
		$policeId = (int)$_GET['policeId'];
	} else {
		header('Location: index.php');
	}
	
	$deleted = _deleteImage($policeId);

	// update the image and thumbnail name in the database
	$sql = "UPDATE tbl_Wanted
			SET w_image = '', w_thumbnail = ''
			WHERE w_id = $policeId";
	dbQuery($sql);		

	header("Location: index.php?view=modify&policeId=$policeId");
}

function _deleteImage($policeId)
{
	// we will return the status
	// whether the image deleted successfully
	$deleted = false;
	
	$sql = "SELECT w_image, w_thumbnail
	        FROM tbl_Wanted
			WHERE w_id = $policeId";
	$result = dbQuery($sql) or die('Cannot delete image. ' . mysql_error());
	
	if (dbNumRows($result)) {
		$row = dbFetchAssoc($result);
		extract($row);
		
		if ($w_image && $w_thumbnail) {
			// remove the image file
			$deleted = @unlink(SRV_ROOT . "images/Wanted/$w_image");
			$deleted = @unlink(SRV_ROOT . "images/Wanted/$w_thumbnail");
		}		
	}
	
	return $deleted;
}




?>
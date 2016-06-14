<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'search' :
		search();
		break;

	case 'addMissing' :
		addMissing();
		break;
	
		
	case 'foundMissing' :
		foundMissing();
		break;
	case 'modifyMissing' :
		modifyMissing();
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


function addMissing()
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
    $age        = $_POST['txtage'];
    $sex        = $_POST['txtgender'];
    $citizenship        = $_POST['txtcitizenship'];
    $status        = $_POST['txtstatus'];
    $dob        = $_POST['txtbirthdate'];
    $pob        = $_POST['txtbirthplace'];
    $address        = $_POST['txtaddress'];
    $height        = $_POST['txtheight'];
    $weight        = $_POST['txtweight'];
    $complexion        = $_POST['txtcomplexion'];
    $hair        = $_POST['txthair'];
    $eyes        = $_POST['txteyes'];
    $others        = $_POST['txtothers'];
    $reward      = $_POST['txtreward'];
	$contact      = $_POST['txtcontact'];
	$num      = $_POST['txtcontactNum'];
	$caddress      = $_POST['txtcaddress'];
	$date      = $_POST['txtdate'];
    
	
	$images = uploadMissingImage('fleImage', SRV_ROOT . 'images/missing/');

	$mainImage = $images['image'];
	$thumbnail = $images['thumbnail'];
	
	$sql   = "INSERT INTO tbl_missing (m_name, m_date, m_age, m_gender, m_citizenship, m_status, m_birthplace, m_birthdate, m_address, m_height, m_weight, m_complexion, m_hair, m_eyes, m_mark, m_reward, m_contact, m_contactNum, m_caddress, m_datenow, m_found, m_image, m_thumbnail)
	          VALUES ('$name', '$date', '$age', '$sex', '$citizenship', '$status', '$pob', '$dob', '$address', '$height', '$weight', '$complexion', '$hair', '$eyes', '$others', '$reward', '$contact', '$num', '$caddress', NOW(), 'no','$mainImage','$thumbnail')";

	$result = dbQuery($sql);
	
	$sql1 = "SELECT m_id
        FROM tbl_missing order by m_id desc";
		$result1 = mysql_query($sql1);
		$show = mysql_fetch_array($result1);	
		$mId= $show['m_id'];
	
		$sql   = "INSERT INTO tbl_history (h_date, h_user, h_action, h_station, h_link, h_category)
	          VALUES (NOW(), '$blottedby', 'Added Missing no. $mId', '$station','/bcpo/admin/missing/index.php?view=detail&policeId=$mId','missing')";
	dbQuery($sql);
	header("Location: index.php");	
}

/*
	Upload an image and return the uploaded image name 
*/
function uploadMissingImage($inputName, $uploadDir)
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
function modifyMissing()
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
    $age        = $_POST['txtage'];
    $sex        = $_POST['txtgender'];
    $citizenship        = $_POST['txtcitizenship'];
    $status        = $_POST['txtstatus'];
    $dob        = $_POST['txtbirthdate'];
    $pob        = $_POST['txtbirthplace'];
    $address        = $_POST['txtaddress'];
    $height        = $_POST['txtheight'];
    $weight        = $_POST['txtweight'];
    $complexion        = $_POST['txtcomplexion'];
    $hair        = $_POST['txthair'];
    $eyes        = $_POST['txteyes'];
    $others        = $_POST['txtothers'];
    $reward      = $_POST['txtreward'];
	$contact      = $_POST['txtcontact'];
	$num      = $_POST['txtcontactNum'];
	$caddress      = $_POST['txtcaddress'];
	$date      = $_POST['txtdate'];

		$images = uploadMissingImage('fleImage', SRV_ROOT . 'images/missing/');

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
		$mainImage = 'm_image';
		$thumbnail = 'm_thumbnail';
	}
	
	
	
	//indi ma modify ang picture   

			
	$sql   = "UPDATE tbl_missing 
	          SET m_image=$mainImage, m_thumbnail=$thumbnail, m_name='$name', m_date='$date', m_age='$age', m_gender='$sex', m_citizenship='$citizenship', m_status='$status', m_birthplace='$pob', m_birthdate='$dob', m_address='$address', m_height='$height', m_weight='$weight', m_complexion='$complexion', m_hair='$hair', m_eyes='$eyes', m_mark='$others', m_reward='$reward', m_contact='$contact', m_contactNum='$num', m_caddress='$caddress',  m_datenow=NOW()
			  WHERE m_id = $policeId";  

	$result = dbQuery($sql);
	
	$sql   = "INSERT INTO tbl_history (h_date, h_user, h_action, h_station, h_link, h_category)
	          VALUES (NOW(), '$blottedby', 'Modify to Rouge Gallery no. $policeId', '$station','/bcpo/admin/rogue_gallery/index.php?view=detail&policeId=$policeId','rogue_gallery')";
	dbQuery($sql);
	
	header('Location: index.php');			  
}

/*
	Remove a product
*/
function foundMissing()
{
	if (isset($_GET['policeId']) && (int)$_GET['policeId'] > 0) {
		$policeId = (int)$_GET['policeId'];
	} else {
		header('Location: index.php');
	}
		
	
		// remove the product from database;
	$sql = "UPDATE tbl_missing set m_found='yes'
	        WHERE m_id = $policeId";
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
	$sql = "UPDATE tbl_missing
			SET m_image = '', m_thumbnail = ''
			WHERE m_id = $policeId";
	dbQuery($sql);		

	header("Location: index.php?view=modify&policeId=$policeId");
}

function _deleteImage($policeId)
{
	// we will return the status
	// whether the image deleted successfully
	$deleted = false;
	
	$sql = "SELECT m_image, m_thumbnail
	        FROM tbl_missing
			WHERE m_id = $policeId";
	$result = dbQuery($sql) or die('Cannot delete image. ' . mysql_error());
	
	if (dbNumRows($result)) {
		$row = dbFetchAssoc($result);
		extract($row);
		
		if ($m_image && $m_thumbnail) {
			// remove the image file
			$deleted = @unlink(SRV_ROOT . "images/missing/$m_image");
			$deleted = @unlink(SRV_ROOT . "images/missing/$m_thumbnail");
		}		
	}
	
	return $deleted;
}




?>
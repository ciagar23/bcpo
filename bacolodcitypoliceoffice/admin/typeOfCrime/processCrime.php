<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';
switch ($action) {
	
    case 'add' :
        addCrime();
        break;
      
    case 'modify' :
        modifyCrime();
        break;
        
    case 'delete' :
        deleteCrime();
        break;
    
	   
    default :
        // if action is not defined or unknown
        // move to main Crime page
        header('Location: index.php');
}


/*
    Add a Crime
*/
function addCrime()
{
    $name        = $_POST['txtName'];
    $parentId    = $_POST['hidParentId'];
    
    $sql   = "INSERT INTO tbl_crime (c_parent_id, c_name) 
              VALUES ($parentId, '$name')";
    $result = dbQuery($sql) or die('Cannot add Crime' . mysql_error());
    
    header('Location: index.php?catId=' . $parentId);              
}

/*
    Modify a Crime
*/
function modifyCrime()
{
    $catId       = (int)$_GET['catId'];
    $name        = $_POST['txtName'];
    $description = $_POST['mtxDescription'];
     
    $sql    = "UPDATE tbl_crime 
               SET c_name = '$name', c_description = '$description'
               WHERE c_id = $catId";
           
    $result = dbQuery($sql) or die('Cannot update Crime. ' . mysql_error());
    header('Location: index.php');              
}

/*
    Remove a Crime
*/
function deleteCrime()
{
    if (isset($_GET['catId']) && (int)$_GET['catId'] > 0) {
        $catId = (int)$_GET['catId'];
    } else {
        header('Location: index.php');
    }
	
	// find all the children categories
	$children = getChildren($catId);
	
	// make an array containing this Crime and all it's children
	$categories  = array_merge($children, array($catId));
	$numCrime = count($categories);

    // finally remove the Crime from database;
    $sql = "DELETE FROM tbl_crime 
            WHERE c_id IN (" . implode(',', $categories) . ")";
    dbQuery($sql);
    
    header('Location: index.php?catId='.$catId);
}


/*
	Recursively find all children of $catId
*/
function getChildren($catId)
{
    $sql = "SELECT c_id ".
           "FROM tbl_crime ".
           "WHERE c_parent_id = $catId ";
    $result = dbQuery($sql);
    
	$cat = array();
	if (dbNumRows($result) > 0) {
		while ($row = dbFetchRow($result)) {
			$cat[] = $row[0];
			
			// call this function again to find the children
			$cat  = array_merge($cat, getChildren($row[0]));
		}
    }

    return $cat;
}

?>
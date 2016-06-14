<head>
<?php

	
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

$self = WEB_ROOT . 'admin/index.php';
?>


<title>&nbsp;</title>

<link rel="stylesheet" href="<?php echo WEB_ROOT;?>admin/include/design/emx_nav_left.css" type="text/css" />
<?
$sql = "SELECT *
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$show = mysql_fetch_array($result);	
		$station= $show['user_station'];
		$level= $show['user_level'];
		$fullname = $show['user_fullname'];
		
		if($level == 'Administrator' || $level == 'Investigator')
			{
			$allblotter ='<li class="style1"><a href="'.WEB_ROOT.'admin/allblotter">All Botter &nbsp;</a>
  					<ul>
					</ul>
					</li>
			';
			}
			
			else
				{
				$allblotter = '';
				}
		
		if($station == 'TMU')
			{
			$reports = 'index.php?view=maintmu';
			$roguegallery = '';
			}

			else
				{
				$reports = 'index.php';
				$roguegallery = '<li class="style1"><a href="'.WEB_ROOT.'admin/rogue_gallery">Rogue Gallery &nbsp;</a>
  					<ul>
  					<li><a href="'.WEB_ROOT.'admin/browse_gallery/index.php">Browse All</a></li>
 					 <li><a href="'.WEB_ROOT.'admin/rogue_gallery/index.php?view=add">Add to Rogue Gallery</a></li>
					</ul>
					</li>';
				}

?>

<? require_once $content; ?>
</body>
</html>

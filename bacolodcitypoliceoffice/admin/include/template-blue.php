<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$self = WEB_ROOT . 'admin/index.php';

?>

<html>
<head>
<title><?php echo $pageTitle; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?php echo WEB_ROOT;?>admin/include/admin.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>library/common.js"></script>
<script type="text/javascript" src="clock.js"> </script>
<script type="text/javascript" src="<? echo WEB_ROOT; ?>admin/include/roundedCorners.js"></script>
<?php
$n = count($script);
for ($i = 0; $i < $n; $i++) {
	if ($script[$i] != '') {
		echo '<script language="JavaScript" type="text/javascript" src="' . WEB_ROOT. 'admin/library/' . $script[$i]. '"></script>';
	}
}

//kwaon ta kung ano nga station...

$sql = "SELECT *
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$show = mysql_fetch_array($result);	
		$station= $show['user_station'];
		$level= $show['user_level'];
		$fullname = $show['user_fullname'];
		
		if($level == 'Administrator')
			{
			$allblotter ='<td class="navText" align="center" nowrap="nowrap"><a href="'.WEB_ROOT.'admin/allblotter">ALL BLOTTER</a></td>';
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
					$roguegallery = '<td class="navText" align="center" nowrap="nowrap"><a href="'.WEB_ROOT.'admin/rogue_gallery">ROGUE GALLERY</a></td>';
					}

?>
	<link rel="stylesheet" href="<?php echo WEB_ROOT;?>lightbox/css/lightbox.css" type="text/css" media="screen" />
	
	<script src="<?php echo WEB_ROOT;?>lightbox/js/prototype.js" type="text/javascript"></script>
	<script src="<?php echo WEB_ROOT;?>lightbox/js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="<?php echo WEB_ROOT;?>lightbox/js/lightbox.js" type="text/javascript"></script>


</head>
<body>
<table border="0" width="100%" cellpadding="0" cellspacing="0" align="left" height="100%">

<tr>
	<td width="27%" align="center" valign="top">
	
	<img src="<?php echo WEB_ROOT;?>admin/include/logo.jpg"><br><br>	
	<table border="0" bgcolor="">
	
		<tr align="left">
			<td><span class="style1">User: </span><span class="style2"> <? echo $fullname; ?> </span><br>
				<span class="style3">(<? echo $level;?>)</span><br> 
				<span class="style1">Department:</span> <span class="style2"> <? echo strtoupper($station);?> </span><br>
			<td> 
		</tr>
			
	</table>
	<br>
	  		<table border="0" cellpadding="0" cellspacing="0" id="navigation" align="center">
					<tr>
						<td class="navText" align="center" nowrap="nowrap"><a href="<?php echo WEB_ROOT;?>admin/index.php">HOME</a></td><tr>
					  	<td class="navText" align="center" nowrap="nowrap"><a href="<?php echo WEB_ROOT;?>admin/blotter">BLOTTER</a></td><tr>
					  	<td class="navText" align="center" nowrap="nowrap"><a href="<?php echo WEB_ROOT;?>admin/reports/<? echo $reports;?>">REPORTS</a></td><tr>
					  
					  	<? echo $roguegallery;?><tr>
					  	<? echo $allblotter;?><tr>
					  	<td class="navText" align="center" nowrap="nowrap"><a href="<?php echo WEB_ROOT;?>admin/user">USER</a></td><tr>
					  	<td class="navText" align="center" nowrap="nowrap"><a href="<?php echo WEB_ROOT;?>admin/history">HISTORY</a></td><tr>
					  	<td class="navText" align="center" nowrap="nowrap"><a href="<?php echo WEB_ROOT;?>admin/index.php?logout">LOGOUT</a></td>
					</tr>
	  </table>
	<td width="73%" valign="top">
		<table border="0" width="90%" align="center">
		<tr>
			<td valign="top">
				<?php
					require_once $content;
				?>
			</td>
		</tr>
		</table>
	</td>
</tr>
</table>
<p align="center"><font color="#FFFFFF" face="Arial">Copyright &copy; 2009 - <?php echo date('Y'); ?> &nbsp;&nbsp; Bacolod City Police Office </font></a></p>
</body>
</html>

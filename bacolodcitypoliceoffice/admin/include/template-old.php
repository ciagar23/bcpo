
<html>
<head>
<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

$self = WEB_ROOT . 'admin/index.php';
?>


<title><?php echo $pageTitle; ?></title>


<link rel="stylesheet" href="<?php echo WEB_ROOT;?>admin/include/style/style.css" type="text/css" media="screen">
<script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>library/common.js"></script>
<?php
$n = count($script);
for ($i = 0; $i < $n; $i++) 
	{
	if ($script[$i] != '') 
		{
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

</head>
<body bgcolor="#64748B">
<div id="user">

	<table border="0">
	
		<tr align="left">
			<td><span class="style1">User: </span><span class="style2"> <? echo $fullname; ?> </span><br>
				<span class="style3">(<? echo $level;?>)</span><br> 
				<span class="style1">Department:</span> <span class="style2"> <? echo strtoupper($station);?> </span><br>
			<td> 
		</tr>
			
	</table>
		
</div>

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	
		<tr bgcolor="#26354A">
			<td height="70" colspan="2" class="logo" nowrap="nowrap" align="center"><SPAN id="theTicker"></SPAN>
			<SCRIPT src="<?php echo WEB_ROOT;?>admin/include/heading.js"></SCRIPT>  <br>
			<span class="tagline"> RECORDS MANAGEMENT AND INFORMATION SYSTEM </span></td>
		</tr>

		<tr bgcolor="#FF6600">
			<td colspan="2"><img src="<?php echo WEB_ROOT;?>admin/include/style/mm_spacer.gif" alt="" width="1" height="4" border="0" /></td>
		</tr>

		<tr bgcolor="#D3DCE6">
			<td colspan="2"><img src="<?php echo WEB_ROOT;?>admin/include/style/mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
		</tr>

		<tr bgcolor="#FFCC00">
			<td height="24" colspan="2" nowrap="nowrap">
			
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
				
		  	</td>
		</tr>

		<tr bgcolor="#D3DCE6">
			<td colspan="2"><img src="<?php echo WEB_ROOT;?>admin/include/style/mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
		</tr>
	
		<tr bgcolor="#FF6600">
			<td colspan="2"><img src="<?php echo WEB_ROOT;?>admin/include/style/mm_spacer.gif" alt="" width="1" height="4" border="0" /></td>
		</tr>
	
		<tr bgcolor="#D3DCE6">
			<td colspan="2"><img src="<?php echo WEB_ROOT;?>admin/include/style/mm_spacer.gif" alt="" width="1" height="1" border="0" /></td>
		</tr>
	
		<tr class="background">
			<td valign="top"><img src="<?php echo WEB_ROOT;?>admin/include/style/mm_spacer.gif" alt="" width="35" height="1" border="0" /><br /><br />
			
				<table border="0" cellspacing="0" cellpadding="2" width="700" align="center">
					<tr>
					  <td class="pageName"><? echo $title;?>&nbsp;</td>
					</tr>
				</table>
				
	<table align="center" height="500"  width="75%">
	
	<tr>
	<td valign="top" class="main">
	<? require_once $content; ?>
	</table>
	<br>
	<br>

	</table>
	
	<tr>
    	<td width="710">&nbsp;</td>
		<td width="100%">&nbsp;</td>
  	</tr>
	
	</table>
	
<br>
</body>
</html>

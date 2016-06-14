<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}
	
$sql = "SELECT user_id, user_station,user_level
        FROM tbl_user where user_name='$session'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);	
		$level= $row['user_level'];	
		$station= $row['user_station'];	
		$user_id= $row['user_id'];
		


if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) 
	{
	$userId = (int)$_GET['userId'];
	} 
	
	else 
		{
		header('Location: index.php');
		}

		if ( $station == 'Administrator')
		{

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '';
if ($errorMessage == '')
	{
	$errorMessage='';
	}
	
		else
		{
		$errorMessage ='<script> alert("'.$errorMessage.'")</script>';
		}
		
$sql = "SELECT user_name,user_id, user_fullname
        FROM tbl_user
        WHERE user_id = $userId";
$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


$department = (isset($_GET['department']) && $_GET['department'] != '') ? $_GET['department'] : '';
switch ($department) {
	case 'Administrator' :
		$Administrator 	= 'Selected'; $TMU ='';	 $records ='';	$PCR ='';	 
		$Operations ='';	 $PS1 ='';	 $PS2 ='';	 $PS3 ='';	 $PS4 ='';	 
		$PS5 ='';	 $PS6 ='';	 $PS7 ='';	 $PS8 ='';	 $PS9 ='';	 $PS10='';
		$accesslevel='';
		break;
	case 'TMU' :
		$Administrator 	= ''; $TMU ='Selected';	 $records ='';	$PCR ='';	 
		$Operations ='';	 $PS1 ='';	 $PS2 ='';	 $PS3 ='';	 $PS4 ='';	 
		$PS5 ='';	 $PS6 ='';	 $PS7 ='';	 $PS8 ='';	 $PS9 ='';	 $PS10='';
		$accesslevel='<tr class="row1"> 
   <td width="150" >Access Level</td>
   <td ><label>
     <select name="droplevel">
       <option value="">-select Level-</option>
       <option>Investigator</option>
       <option>Desk Officer</option>
     </select>
   </label></td>
  </tr>';
		break;
	case 'records' :
		$Administrator 	= ''; $TMU ='';	 $records ='Selected';	$PCR ='';	 
		$Operations ='';	 $PS1 ='';	 $PS2 ='';	 $PS3 ='';	 $PS4 ='';	 
		$PS5 ='';	 $PS6 ='';	 $PS7 ='';	 $PS8 ='';	 $PS9 ='';	 $PS10='';	
		$accesslevel='';
		break;
	case 'PCR' :
		$Administrator 	= ''; $TMU ='';	 $records ='';	$PCR ='Selected';	 
		$Operations ='';	 $PS1 ='';	 $PS2 ='';	 $PS3 ='';	 $PS4 ='';	 
		$PS5 ='';	 $PS6 ='';	 $PS7 ='';	 $PS8 ='';	 $PS9 ='';	 $PS10='';	
		$accesslevel='';
		break;
	case 'Operations' :
		$Administrator 	= ''; $TMU ='';	 $records ='';	$PCR ='';	 
		$Operations ='Selected';	 $PS1 ='';	 $PS2 ='';	 $PS3 ='';	 $PS4 ='';	 
		$PS5 ='';	 $PS6 ='';	 $PS7 ='';	 $PS8 ='';	 $PS9 ='';	 $PS10='';	
		$accesslevel='';		
		break;
	case 'police station 1' :
		$Administrator 	= ''; $TMU ='';	 $records ='';	$PCR ='';	 
		$Operations ='';	 $PS1 ='Selected';	 $PS2 ='';	 $PS3 ='';	 $PS4 ='';	 
		$PS5 ='';	 $PS6 ='';	 $PS7 ='';	 $PS8 ='';	 $PS9 ='';	 $PS10='';	
		$accesslevel='<tr class="row1"> 
   <td width="150" >Access Level</td>
   <td ><label>
     <select name="droplevel">
       <option value="">-select Level-</option>
       <option>Investigator</option>
       <option>Desk Officer</option>
     </select>
   </label></td>
  </tr>';		
		break;
	case 'police station 2' :
		$Administrator 	= ''; $TMU ='';	 $records ='';	$PCR ='';	 
		$Operations ='';	 $PS1 ='';	 $PS2 ='Selected';	 $PS3 ='';	 $PS4 ='';	 
		$PS5 ='';	 $PS6 ='';	 $PS7 ='';	 $PS8 ='';	 $PS9 ='';	 $PS10='';	$accesslevel='<tr class="row1"> 
   <td width="150" >Access Level</td>
   <td ><label>
     <select name="droplevel">
       <option value="">-select Level-</option>
       <option>Investigator</option>
       <option>Desk Officer</option>
     </select>
   </label></td>
  </tr>';		
		break;
	case 'police station 3' :
		$Administrator 	= ''; $TMU ='';	 $records ='';	$PCR ='';	 
		$Operations ='';	 $PS1 ='';	 $PS2 ='';	 $PS3 ='Selected';	 $PS4 ='';	 
		$PS5 ='';	 $PS6 ='';	 $PS7 ='';	 $PS8 ='';	 $PS9 ='';	 $PS10='';	$accesslevel='<tr class="row1"> 
   <td width="150" >Access Level</td>
   <td ><label>
     <select name="droplevel">
       <option value="">-select Level-</option>
       <option>Investigator</option>
       <option>Desk Officer</option>
     </select>
   </label></td>
  </tr>';		
		break;
	case 'police station 4' :
		$Administrator 	= ''; $TMU ='';	 $records ='';	$PCR ='';	 
		$Operations ='';	 $PS1 ='';	 $PS2 ='';	 $PS3 ='';	 $PS4 ='Selected';	 
		$PS5 ='';	 $PS6 ='';	 $PS7 ='';	 $PS8 ='';	 $PS9 ='';	 $PS10='';	$accesslevel='<tr class="row1"> 
   <td width="150" >Access Level</td>
   <td ><label>
     <select name="droplevel">
       <option value="">-select Level-</option>
       <option>Investigator</option>
       <option>Desk Officer</option>
     </select>
   </label></td>
  </tr>';			
		break;
	case 'police station 5' :
		$PS5 	= 'Selected';		
		$Administrator 	= ''; $TMU ='';	 $records ='';	$PCR ='';	 
		$Operations ='';	 $PS1 ='';	 $PS2 ='';	 $PS3 ='';	 $PS4 ='';	 
		$PS5 ='Selected';	 $PS6 ='';	 $PS7 ='';	 $PS8 ='';	 $PS9 ='';	 $PS10=''; 
		$accesslevel='<tr class="row1"> 
   <td width="150" >Access Level</td>
   <td ><label>
     <select name="droplevel">
       <option value="">-select Level-</option>
       <option>Investigator</option>
       <option>Desk Officer</option>
     </select>
   </label></td>
  </tr>';
  	break;	
	case 'police station 6' :
		$Administrator 	= ''; $TMU ='';	 $records ='';	$PCR ='';	 
		$Operations ='';	 $PS1 ='';	 $PS2 ='';	 $PS3 ='';	 $PS4 ='';	 
		$PS5 ='';	 $PS6 ='';	 $PS7 ='Selected';	 $PS8 ='';	 $PS9 ='';	 $PS10='';	
		$accesslevel='<tr class="row1"> 
   <td width="150" >Access Level</td>
   <td ><label>
     <select name="droplevel">
       <option value="">-select Level-</option>
       <option>Investigator</option>
       <option>Desk Officer</option>
     </select>
   </label></td>
  </tr>';			
		break;

	case 'police station 7' :
		$Administrator 	= ''; $TMU ='';	 $records ='';	$PCR ='';	 
		$Operations ='';	 $PS1 ='';	 $PS2 ='';	 $PS3 ='';	 $PS4 ='';	 
		$PS5 ='';	 $PS6 ='';	 $PS7 ='Selected';	 $PS8 ='';	 $PS9 ='';	 $PS10='';	
		$accesslevel='<tr class="row1"> 
   <td width="150" >Access Level</td>
   <td ><label>
     <select name="droplevel">
       <option value="">-select Level-</option>
       <option>Investigator</option>
       <option>Desk Officer</option>
     </select>
   </label></td>
  </tr>';		
		break;

	case 'police station 8' :
		$Administrator 	= ''; $TMU ='';	 $records ='';	$PCR ='';	 
		$Operations ='';	 $PS1 ='';	 $PS2 ='';	 $PS3 ='';	 $PS4 ='';	 
		$PS5 ='';	 $PS6 ='';	 $PS7 ='';	 $PS8 ='Selected';	 $PS9 ='';	 $PS10='';	
		$accesslevel='<tr class="row1"> 
   <td width="150" >Access Level</td>
   <td ><label>
     <select name="droplevel">
       <option value="">-select Level-</option>
       <option>Investigator</option>
       <option>Desk Officer</option>
     </select>
   </label></td>
  </tr>';			
		break;

	case 'police station 9' :
		$Administrator 	= ''; $TMU ='';	 $records ='';	$PCR ='';	 
		$Operations ='';	 $PS1 ='';	 $PS2 ='';	 $PS3 ='';	 $PS4 ='';	 
		$PS5 ='';	 $PS6 ='';	 $PS7 ='';	 $PS8 ='';	 $PS9 ='Selected';	 $PS10='';	
		$accesslevel='<tr class="row1"> 
   <td width="150" >Access Level</td>
   <td ><label>
     <select name="droplevel">
       <option value="">-select Level-</option>
       <option>Investigator</option>
       <option>Desk Officer</option>
     </select>
   </label></td>
  </tr>';		
		break;

	case 'police station 10' :
		$Administrator 	= ''; $TMU ='';	 $records ='';	$PCR ='';	 
		$Operations ='';	 $PS1 ='';	 $PS2 ='';	 $PS3 ='';	 $PS4 ='';	 
		$PS5 ='';	 $PS6 ='';	 $PS7 ='';	 $PS8 ='';	 $PS9 ='';	 $PS10 = 'Selected';
		$accesslevel='<tr class="row1"> 
   <td width="150" >Access Level</td>
   <td ><label>
     <select name="droplevel">
       <option value="">-select Level-</option>
       <option>Investigator</option>
       <option>Desk Officer</option>
     </select>
   </label></td>
  </tr>';				
		break;

	default :
		$Administrator 	= ''; $TMU ='';	 $records ='';	$PCR ='';	 
		$Operations ='';	 $PS1 ='';	 $PS2 ='';	 $PS3 ='';	 $PS4 ='';	 
		$PS5 ='';	 $PS6 ='';	 $PS7 ='';	 $PS8 ='';	 $PS9 ='';	 $PS10='';	
		$accesslevel='';	
		break;
}


?>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='index.php?view=modify&userId=<?php echo $user_id; ?>&department="+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<form action="processUser.php?action=modify&userId=<?php echo $user_id; ?>" method="post" enctype="multipart/form-data" name="frmModifyUser" id="frmModifyUser">

 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="detail">
   
  <tr class="row1"> 
   <td width="150" >Department</td>
   <td ><select name="dropstation" onchange="MM_jumpMenu('parent',this,0)">
     <option value="">-Select Department-</option>
       <option <? echo $Administrator;?>>Administrator</option>
       <option <? echo $TMU;?>>TMU</option>
       <option <? echo $PCR;?>>PCR</option>
       <option <? echo $records;?>>records</option>
       <option <? echo $Operations;?>>Operations</option>
       <option <? echo $PS1;?> value="police station 1">police station 1</option>
       <option <? echo $PS2;?> value="police station 2">police station 2</option>
       <option <? echo $PS3;?> value="police station 3">police station 3</option>
       <option <? echo $PS4;?> value="police station 4">police station 4</option>
       <option <? echo $PS5;?> value="police station 5">police station 5</option>
       <option <? echo $PS6;?> value="police station 6">police station 6</option>
       <option <? echo $PS7;?> value="police station 7">police station 7</option>
       <option <? echo $PS8;?> value="police station 8">police station 8</option>
       <option <? echo $PS9;?> value="police station 9">police station 9</option>
       <option <? echo $PS10;?> value="police station 10">police station 10</option>
   </select></td>
  </tr>
    
  <? echo $accesslevel;?>
  <tr class="row1"> 
   <td width="150" >Name</td>
   <td ><?php echo $user_fullname; ?> </td>
  </tr>
  
  <tr class="row2"> 
   <td width="150" >User Name</td>
   <td ><?php echo $user_name; ?> </td>
  </tr>
  
  <tr class="row1"> 
   <td width="150" >Password</td>
   <td > <input name="txtPassword" type="password" class="box" id="txtPassword" size="20" maxlength="20"></td>
  </tr>
  
  <tr class="row2"> 
   <td width="150" >Retype Password</td>
   <td > <input name="txtPassword2" type="password" class="box" id="txtPassword2" size="20" maxlength="20"></td>
  </tr>

  
 </table>
 <p align="center"> 
  <input name="btnModifyUser" type="button" id="btnModifyUser" value="Modify User" onClick="checkModifyUserForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
<?
}
	else
	{
	echo '<script> alert("You are not allowed to modify");
				window.location="index.php" </script>';
			}
			?>
			
<?php echo $errorMessage; ?>
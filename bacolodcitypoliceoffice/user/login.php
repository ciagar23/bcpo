<?php
require_once '../library/config.php';
require_once './library/functions.php';

$errorMessage = '&nbsp;';

if (isset($_POST['txtUserName'])) 
	{
	$result = doLogin();
	
	if ($result != '') 
		{
		$errorMessage = $result;
		}
	}
?>

<html>
<head>
<title>Police Record Management System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="include/admin.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="document.frmLogin.txtUserName.focus();">

<br><br><br><br><br> 
<form method="post" name="frmLogin" id="frmLogin">
<p>&nbsp;</p>
<table align="center" class="loginTable"> 
	<tr class="loginTblTitle"> 
		<td class="loginTblTitle">:: Admin Login ::</td>
    </tr>
			
    <tr> 
   	  <td class="loginTblContent">
		
			<table class="tblContent" border="0">
			
        		<tr align="center">
					<td colspan="2" class="errorMessage"><?php echo $errorMessage; ?></td>
        		</tr>
					
        		<tr> 
           			<td class="loginTdContent">User Name :</td>
           			<td class="loginTdText"><input name="txtUserName" type="text" class="loginText" id="txtUserName" size="12" maxlength="15"></td>
           		</tr>
					
           		<tr> 
            		<td class="loginTdContent">Password :</td>
            		<td class="loginTdText"><input name="txtPassword" type="password" class="loginText" id="txtPassword" size="12"></td>
				</tr>
					
           		<tr> 
					<table width="160"  align="center">
						<tr>
           					<td class="loginTdButton"><input name="btnLogin" type="submit" class="loginButton" id="btnLogin" value="Login"></td>
            				<td class="loginTdButton"><input type="reset" class="loginButton"  name="reset"  value="Reset"></td>
						</tr>
					</table>
           		</tr>	
				
          	</table>
		</td>
	</tr>
</table>
<p>&nbsp;</p>
</form>
</body>
</html>

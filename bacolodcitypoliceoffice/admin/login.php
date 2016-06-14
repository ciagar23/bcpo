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
<link href="<?php echo WEB_ROOT;?>admin/include/style/style.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="document.frmLogin.txtUserName.focus();" style="background-image: url(<?php echo WEB_ROOT;?>images/background.jpg); background-repeat:no-repeat; background-color: #D4DCE7; ">

<br><br><br><br><br> 
<form method="post" name="frmLogin" id="frmLogin">
<p>&nbsp;</p><table align="center" class="loginTable" border="0"> 
		
	<tr>
		<td>
			<table class="loginContent" border="0">

				<tr>
					<td colspan="2" id="errorMessage">&nbsp;<?php echo $errorMessage; ?></td>
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
					<td id="forgetPassword" colspan="2"><a href="#" onClick="alert('Contact Your Administrator!')"> Forgot Password? </a></td>
				</tr>
				
				<tr>
           			<td class="loginButton1"><input name="submit" type="image" src='/bacolodcitypoliceoffice/images/loginButton.gif' value="Login"></td>
					</form>
					
					<form method="post" action="login.php">
            		<td class="loginButton2"><input name="submit" type="image" src='/bacolodcitypoliceoffice/images/resetButton.gif' value="Reset">
					</form></td>													                
				</tr>
			
			</table>
		</td>
	</tr>
	
</table>   

</body>
</html>

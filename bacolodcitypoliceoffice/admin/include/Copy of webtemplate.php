<?php
checkUser();
$errorMessage = '&nbsp;';

if (isset($_POST['txtUserName'])) 
	{
	$result = doLogin();
	
	if ($result != '') 
		{
		$errorMessage = $result;
		}
	}


$loggedin = (isset($_SESSION['website_id']) && $_SESSION['website_id'] != '') ? $_SESSION['website_id'] : '';	
$sql = "SELECT w_username
		        FROM tbl_webuser 
				WHERE w_id = '$loggedin'";
		$result = dbQuery($sql);
		$row = dbFetchAssoc($result);
		$user=$row['w_username'];	
		$message = mysql_num_rows(mysql_query("select * from tbl_reportacrime where r_to = '$user' and r_read ='no'"));
?>


<title><?php echo $pageTitle; ?></title>
<head>
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>lightbox/css/lightbox.css" type="text/css" media="screen" />
	<script src="<?php echo WEB_ROOT;?>lightbox/js/prototype.js" type="text/javascript"></script>
	<script src="<?php echo WEB_ROOT;?>lightbox/js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="<?php echo WEB_ROOT;?>lightbox/js/lightbox.js" type="text/javascript"></script>
	
	
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>admin/include/webstyle.css" type="text/css" />
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
	?>
</head>
<body>
<div id="main">
<!-- header begins -->

<!-- header ends -->
<!-- content begins -->
<div id="content_bg">
  <div id="content">
	<div id="right">
				<h2>&nbsp;</h2>
               <div class="rightbg">
				<div id="categoties">
         <ul>
					
       				
&nbsp;<?php echo $errorMessage; ?> 
<? 
if ($loggedin)
{

echo $user;
echo ' <a href="?logout">Logout</a><br>';
if($message !=0)
{
echo 'you have '.$message.' unread Message(s)';
}
else
{
}

}
else
{
?>
<form method="post" name="frmLogin" id="frmLogin">
  <label>
  User Name:<br><input name="txtUserName" type="text" class="loginText" id="txtUserName" size="12" maxlength="15">
  </label><br>
  <label>
 Password:<br><input name="txtPassword" type="password" class="loginText" id="txtPassword" size="12">
  </label>
  <br>
  <br>
  <input name="submit" type="submit" value="Login"><br>
  Not a Member yet? <a href='<?php echo WEB_ROOT;?>website/index.php?view=register'>Register</a>
</form>
<?
}
?>

                 </ul>


                </div>
               </div><div class="rightbot"></div>
                
                
                <div id="archives">
       
				<h2>Mission</h2>
                <div class="rightbg">
				<ul>
					"The PNP shall enforce the law, prevent and control crimes, maintain peace and order and ensure public safety and internal security with the active support of the community."
					
				</ul>
     			</div><div class="rightbot"></div>
                <h2>Vision</h2>
                <div class="rightbg">
				<ul>
					"We are committed to a vision of a professional Dynamic and highly motivated PNP, working partnership with the responsive community towards the attainment of the safe place in to live, work, invest and do business."
				</ul>
     			</div><div class="rightbot"></div>
         </div>
                
                
                
                
                
        </div>
          	<div id="left">
            
            <div id="header">
	
	<div id="logo">
	<h2><a href="">This is the Official Website of</a></h2>
	<script language="JavaScript1.2">
//configure message
message="Bacolod City Police Office"
//animate text in NS6? (0 will turn it off)
ns6switch=1

var ns6=document.getElementById&&!document.all
mes=new Array();
mes[0]=-1;
mes[1]=-4;
mes[2]=-7;mes[3]=-10;
mes[4]=-7;
mes[5]=-4;
mes[6]=-1;
num=0;
num2=0;
txt="";
function jump0(){
if (ns6&&!ns6switch){
jump.innerHTML=message
return
}
if(message.length > 6){
for(i=0; i != message.length;i++){
txt=txt+"<span style='position:relative;' id='n"+i+"'>"+message.charAt(i)+"</span>"};
jump.innerHTML=txt;
txt="";
jump1a()
}
else{
alert("Your message is to short")
}
}

function jump1a(){
nfinal=(document.getElementById)? document.getElementById("n0") : document.all.n0
nfinal.style.left=-num2;
if(num2 != 9){
num2=num2+3;
setTimeout("jump1a()",50)
}
else{
jump1b()
}
}

function jump1b(){
nfinal.style.left=-num2;
if(num2 != 0){num2=num2-3;
setTimeout("jump1b()",50)
}
else{
jump2()
}
}

function jump2(){
txt="";
for(i=0;i != message.length;i++){
if(i+num > -1 && i+num < 7){
txt=txt+"<span style='position:relative;top:"+mes[i+num]+"'>"+message.charAt(i)+"</span>"
}
else{txt=txt+"<span>"+message.charAt(i)+"</span>"}
}
jump.innerHTML=txt;
txt="";
if(num != (-message.length)){
num--;
setTimeout("jump2()",50)}
else{num=0;
setTimeout("jump0()",50)}}
</script>
</head>
<body>

<h2><div id="jumpx" style="color:white"></div></h2>
<script>
if (document.all||document.getElementById){
jump=(document.getElementById)? document.getElementById("jumpx") : document.all.jumpx
jump0()
}
else
document.write(message)
</script>
	
	
	
		</div>
        <div id="buttons">
		<ul>
			<li class="first"><a href="<?php echo WEB_ROOT;?>website/index.php"  title="">Home</a></li>
			<li><a href="<?php echo WEB_ROOT;?>website/crimeinfo" title="">Organization </a></li>
			<li><a href="#" title="">Crime Information </a></li>
			<li><a href="#" title="">Site Map </a></li>
			<li><a href="#" title="">Get Help </a></li>
		</ul></div>
	
</div> 		    
			
            <div id="leftbg">
            <div id="leftbgtop"></div>
            <div class="padding">
			<? require_once $content;?>
			           </div>
 </div><div id="leftbgbot"></div>
            
	</div>    
    </div>    

<!-- content ends -->
<!-- footer begins -->
<div id="footer">
  <p>Copyright  2009. Designed by <a href="http://www.metamorphozis.com/" title="Free Website Templates">Free Website Templates</a></p>
		<p><a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a> | <a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional"><abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> | <a href="http://jigsaw.w3.org/css-validator/check/referer" title="This page validates as CSS"><abbr title="Cascading Style Sheets">CSS</abbr></a></p></div>
<!-- footer ends -->
</div>
</div>
</body>
</html>
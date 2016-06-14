 <!-- start sidebar -->
	<div id="sidebar">
		<ul>
		&nbsp;<?php echo $errorMessage; ?> 
<? 
if ($loggedin)
{
?>

			<li id="categories">
				<h2>Welcome <? echo $user;?>!</h2>
				<ul>
					<li><a href="/bcpo/website/index.php?view=profile">View Profile</a></li>
					<li>Inbox(<a href="/bcpo/website/crimeinfo/"><? echo $inbox;?></a>)</li>
<?
if($message !=0)
{
echo '<li>you have <a href="/bcpo/website/crimeinfo/">'.$message.'</a> unread Message(s)</li>';
}
else
{
}
	
								
?>					
					<li><a href="?logout">Log Out</a></li>	
				</ul>
			</li>

<?

}
else
{
?>

<li id="categories">
				<h2>Log In</h2>
			<table><tr>
<form method="post" name="frmLogin" id="frmLogin">					
					<td>User Name: <td><input name="txtUserName" type="text" class="loginText" id="txtUserName" size="12" maxlength="15"><br>
				<tr><td>	 Password: <td><input name="txtPassword" type="password" class="loginText" id="txtPassword" size="12">
 					<tr><td colspan="2" align="center"> <input name="submit" type="submit" class="submit" value="Login"></li>
<tr><td colspan="2" align="center"> Not a Member yet? <a href='<?php echo WEB_ROOT;?>website/index.php?view=register'>Register</a>
</form>
</table>
<?
}
?>
		
		
			<li id="calendar">
				<h2>Calendar</h2>
				<div id="calendar_wrap">
					
					<script LANGUAGE="JavaScript">

<!-- Begin
monthnames = new Array(
"January",
"Februrary",
"March",
"April",
"May",
"June",
"July",
"August",
"September",
"October",
"November",
"Decemeber");
var linkcount=0;
function addlink(month, day, href) {
var entry = new Array(3);
entry[0] = month;
entry[1] = day;
entry[2] = href;
this[linkcount++] = entry;
}
Array.prototype.addlink = addlink;
linkdays = new Array();
monthdays = new Array(12);
monthdays[0]=31;
monthdays[1]=28;
monthdays[2]=31;
monthdays[3]=30;
monthdays[4]=31;
monthdays[5]=30;
monthdays[6]=31;
monthdays[7]=31;
monthdays[8]=30;
monthdays[9]=31;
monthdays[10]=30;
monthdays[11]=31;
todayDate=new Date();
thisday=todayDate.getDay();
thismonth=todayDate.getMonth();
thisdate=todayDate.getDate();
thisyear=todayDate.getYear();
thisyear = thisyear % 100;
thisyear = ((thisyear < 50) ? (2000 + thisyear) : (1900 + thisyear));
if (((thisyear % 4 == 0) 
&& !(thisyear % 100 == 0))
||(thisyear % 400 == 0)) monthdays[1]++;
startspaces=thisdate;
while (startspaces > 7) startspaces-=7;
startspaces = thisday - startspaces + 1;
if (startspaces < 0) startspaces+=7;
document.write("<table border=2 bgcolor=white ");
document.write("bordercolor=black><font color=black>");
document.write("<tr><td colspan=7><center><strong>" 
+ monthnames[thismonth] + " " + thisyear 
+ "</strong></center></font></td></tr>");
document.write("<tr>");
document.write("<td align=center>Su</td>");
document.write("<td align=center>M</td>");
document.write("<td align=center>Tu</td>");
document.write("<td align=center>W</td>");
document.write("<td align=center>Th</td>");
document.write("<td align=center>F</td>");
document.write("<td align=center>Sa</td>"); 
document.write("</tr>");
document.write("<tr>");
for (s=0;s<startspaces;s++) {
document.write("<td> </td>");
}
count=1;
while (count <= monthdays[thismonth]) {
for (b = startspaces;b<7;b++) {
linktrue=false;
document.write("<td>");
for (c=0;c<linkdays.length;c++) {
if (linkdays[c] != null) {
if ((linkdays[c][0]==thismonth + 1) && (linkdays[c][1]==count)) {
document.write("<a href=\"" + linkdays[c][2] + "\">");
linktrue=true;
      }
   }
}
if (count==thisdate) {
document.write("<font color='FF0000'><strong>");
}
if (count <= monthdays[thismonth]) {
document.write(count);
}
else {
document.write(" ");
}
if (count==thisdate) {
document.write("</strong></font>");
}
if (linktrue)
document.write("</a>");
document.write("</td>");
count++;
}
document.write("</tr>");
document.write("<tr>");
startspaces=0;
}
document.write("</table></p>");
// End -->
</script></div>
			</li>
			<li>
				<h2>Lastest Activities</h2>
				<ul>
					
					<?php

$rowsPerPage = 10;		
$sql = "SELECT ac_id, ac_date, ac_title, ac_content FROM tbl_activities
		ORDER BY ac_date desc";
$result     = dbQuery(getPagingQuery($sql, $rowsPerPage));
$pagingLink = getPagingLink($sql, $rowsPerPage, '');

if (dbNumRows($result) > 0) 
	{
	$i = 0;
	
	while($row = dbFetchAssoc($result)) 
		{
		extract($row);
		
		$i += 1;
?>
   		<li><a href="index.php?view=activitydetail&policeId=<? echo $ac_id;?>"><?php echo $ac_date; ?>&nbsp;<?php echo $ac_title; ?>&nbsp; </a></li>
  <?php
	} // end while
	
} else {
?>
  	<tr> 
  		 <td colspan="5" align="center">No Records Yet</td>
  	</tr>
  <?php
}
?>
		
					
					
					
					
					
				</ul>
			</li>
		</ul>
	</div>
	<!-- end sidebar -->
<?php
$succes='';

        $station = $_GET['admin'];


	// create the parameters needed to connect to the mysql database server
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'db_bacolodcitypoliceoffice';
	$table_name='tbl_lesson';

	// create the connection; if an error occurs display the error
	$connection = mysql_connect($host, $username, $password) or die(mysql_error());

	// select the database to use; if an error occurs display the error
	//$db = mysql_select_db($db) or die(mysql_error());
	$db = mysql_select_db($db) or die("Could not open a connection to the database server");
	
 $total =  mysql_num_rows(mysql_query("select * from tbl_messaging where r_to = '$station' and r_read ='no'"));
 

echo '('.$total.')';

 if ($total !=0)
 {
 ?>
 <embed hidden="true" src="/bacolodcitypoliceoffice/admin/messaging/sound_4.mp3">
 <?php 
 }
 else
 {
 }


 
 
 
 ?>
<!--<script type="text/javascript">

var sound1 = <?php echo $total;?>;


	var audio = document.createElement('audio');
	document.body.appendChild(audio);
	audio.src = '<?php echo WEB_ROOT;?>admin/messaging/sound_4.mp3';
	audio.play();



</script> -->
 
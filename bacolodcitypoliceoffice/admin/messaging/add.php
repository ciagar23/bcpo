
<?php  require_once 'list.php';?>

<?php
if (!defined('WEB_ROOT')) 
	{
	exit;
	}

?> 
<form action="processActivities.php?action=addactivities" method="post" enctype="multipart/form-data" name="frmAddActivities" id="frmAddActivities">
<input type="hidden" name="to" value="<?php echo $to;?>"  />
<input type="hidden" name="from" value="<?php echo $station;?>"  />
<input type="hidden" name="user" value="<?php echo $session;?>"  />
 <fieldset>
  <label>Message:</label>
   <textarea name="message" cols="80" rows="5" class="box" id="message"></textarea>
 </fieldset>
<input name="btnreport" type="submit" id="btnreport" value="Send" class="box">


</form>

<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;

?> 
<body onLoad="document.frmsearch.txtsearch.focus();">
<form action="index.php?view=list" method="get" enctype="multipart/form-data" name="frmsearch" id="frmsearch">

   
     <select name="field" class="box" >
				<option value='w_name'>Name</option>
				<option value='w_alias'>Alias</option>
				<option value='w_crime'>Crime</option>
				<option value='w_captured'>Captured</option>
				
     </select></label>
   
  <input name="search" type="text" class="box" size="35" maxlength="100"><input type="submit" value="search" class="box">
  &nbsp;<input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Wanted Person" class="box" onClick="window.location.href='index.php?view=add';">


 <script type="text/javascript">
function mySubmit() {
// document.edit.save.value = "yes";
document.edit.onsubmit(); // workaround browser bugs.
document.edit.submit();
};
</script>
</form>


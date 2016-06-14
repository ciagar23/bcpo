<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;

?> 
<body onLoad="document.frmsearch.txtsearch.focus();">
<form action="index.php?view=list" method="get" enctype="multipart/form-data" name="frmsearch" id="frmsearch">

   
     <select name="field" class="box" >
				<option value='m_name'>Name</option>
				<option value='m_age'>Age</option>
				<option value='m_gender'>Gender</option>
				<option value='m_date'>Missing Date</option>
				<option value='m_found'>Found</option>
				
     </select></label>
   
  <input name="search" type="text" class="box" size="35" maxlength="100"><input type="submit" value="search" class="box">
  &nbsp;<input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Missing Person" class="box" onClick="window.location.href='index.php?view=add';">


 <script type="text/javascript">
function mySubmit() {
// document.edit.save.value = "yes";
document.edit.onsubmit(); // workaround browser bugs.
document.edit.submit();
};
</script>
</form>


<?php
if (!defined('WEB_ROOT')) {
	exit;
}


$catId = (isset($_GET['catId']) && $_GET['catId'] > 0) ? $_GET['catId'] : 0;

$field = (isset($_GET['field']) && $_GET['field'] != '') ? $_GET['field'] : 'r_id';
		$search = (isset($_GET['search']) && $_GET['search'] != '') ? $_GET['search'] : '';
?>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='?field="+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<body onLoad="document.frmsearch.search.focus();">
<form action="index.php?view=list" method="get" enctype="multipart/form-data" name="frmsearch" id="frmsearch">


     <select name="field" class="box"  onChange="MM_jumpMenu('parent',this,0)">
				<option <? if ($field=='r_name'){ echo 'selected'; } else {}?> value='r_name'>Name</option>
				<option <? if ($field=='r_age'){ echo 'selected'; } else {}?> value='r_age'>Age</option>
				<option <? if ($field=='r_alias'){ echo 'selected'; } else {}?> value='r_alias'>Alias</option>
				<option <? if ($field=='r_sex'){ echo 'selected'; } else {}?> value='r_sex'>Gender</option>
				<option <? if ($field=='r_address'){ echo 'selected'; } else {}?> value='r_address'>Address</option>
     </select></label>


<? if ($field=='r_sex'){?>
			<input name="search" type="radio" value="Male"> Male <input name="search" type="radio" value="female"> Female
			<? } else {?>
			<input name="search" type="text" class="box" size="35" maxlength="100" onKeyDown="" >
			<? }?>
			
			
			
  <input type="submit" value="search" class="box">
  &nbsp;<input name="btnAddProduct" type="button" id="btnAddProduct" value="Browse All" class="box" onClick="window.location.href='../browse_gallery/index.php';">
  
  <? if($station !='Operations' && $level !='Desk Officer') {?>
  &nbsp;<input name="btnAddProduct" type="button" id="btnAddProduct" value="Add Rogue Gallery" class="box" onClick="window.location.href='index.php?view=checkname';">
  <? }else{}?>



 <script type="text/javascript">
function mySubmit() {
// document.edit.save.value = "yes";
document.edit.onsubmit(); // workaround browser bugs.
document.edit.submit();
};
</script>
</form>


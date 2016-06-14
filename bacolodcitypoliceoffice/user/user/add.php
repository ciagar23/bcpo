<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processUser.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <td width="150" class="label">User Name</td>
   <td class="content"> <input name="txtUserName" type="text" class="box" id="txtUserName" size="20" maxlength="20"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Password</td>
   <td class="content"> <input name="txtPassword" type="password" class="box" id="txtPassword" value="" size="20" maxlength="20"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Retype Password</td>
   <td class="content"> <input name="txtPassword2" type="password" class="box" id="txtPassword2" value="" size="20" maxlength="20"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Station</td>
   <td class="content"><label>
     <select name="dropstation">
       <option value="">-select station-</option>
       <option>WCP</option>
       <option>traffic</option>
       <option>police station 1</option>
       <option>police station 2</option>
       <option>police station 3</option>
       <option>police station 4</option>
       <option>police station 5</option>
       <option>police station 6</option>
       <option>police station 7</option>
       <option>police station 8</option>
       <option>police station 9</option>
       <option>police station 10</option>
     </select>
   </label></td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="button" id="btnAddUser" value="Add User" onClick="checkAddUserForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
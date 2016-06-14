// JavaScript Document
function checkAddUserForm()
{
	with (window.document.frmAddUser) {
		 if (isEmpty(dropstation, 'Please Select Station')) {
			return;
		} else if (isEmpty(txtUserFullName, 'Enter Name of the User')) {
			return;
		} else  if (isEmpty(txtUserName, 'Enter user name')) {
			return;
		} else if (isEmpty(txtPassword, 'Enter password')) {
			return;
		} else  if (isEmpty(txtPassword2, 'Retype password')) {
			return;
		} else   {
			submit();
		}
	}
}

function checkModifyUserForm()

{
	with (window.document.frmModifyUser)
	{
		if (isEmpty(txtPassword, 'Please Enter New Password'))
		{
			return;
		}
		else if (isEmpty(txtPassword2, 'Please Retype New Password'))
		{
			return;
		}
		else if (isEmpty(dropstation, 'Please Select Department'))
		{
			return;
		}
		else
		{
			submit();
		}
	}
}

function addUser()
{
	window.location.href = 'index.php?view=add';
}

function changePassword(userId)
{
	window.location.href = 'index.php?view=modify&userId=' + userId;
}

function deleteUser(userId)
{
	if (confirm('Delete this user?')) {
		window.location.href = 'processUser.php?action=delete&userId=' + userId;
	}
}


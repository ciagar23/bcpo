// JavaScript Document
function checkCrimeForm()
{
    with (window.document.frmCategory) {
		if (isEmpty(txtName, 'Enter Crime name')) {
			return;
		} else {
			submit();
		}
	}
}

function addCrime(parentId)
{
	targetUrl = 'index.php?view=add';
	if (parentId != 0) {
		targetUrl += '&parentId=' + parentId;
	}
	
	window.location.href = targetUrl;
}

function modifyCrime(catId)
{
	window.location.href = 'index.php?view=modify&catId=' + catId;
}

function deleteCrime(catId)
{
	if (confirm('Deleting Crime Category will also delete all crimes in it.\nContinue anyway?')) {
		window.location.href = 'processCrime.php?action=delete&catId=' + catId;
	}
}

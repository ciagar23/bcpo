

function checkAddBlotterForm()
{
	with (window.document.frmAddBlotter) {
		if (isEmpty(txtreportedby, 'Enter')) {
			return;
		} else if (isEmpty(txtcfname, 'Enter')) {
			return;
		} else if (isEmpty(txtclname, 'Enter')) {
			return;
		} else   if (isEmpty(txtcomplaint, 'Enter Complaint')) {
			return;
		} else {
			submit();
		}
	}
}

function modifyBlotter(policeId)
{
	window.location.href = 'index.php?view=modify&policeId=' + policeId;
}

function deleteBlotter(policeId)
{
	if (confirm('Delete this Blotter Record?')) {
		window.location.href = 'processBlotter.php?action=deleteBlotter&policeId=' + policeId;
	}
}

function deleteImage(policeId)
{
	if (confirm('Delete this image')) {
		window.location.href = 'processBlotter.php?action=deleteImage&policeId=' + policeId;
	}
}

function checkAddMissingForm()
{
	with (window.document.frmAddMissing) {
		if (isEmpty(txtname, 'Enter Name')) {
			return;
		} else if (isEmpty(txtdate, 'Enter Missing Date')) {
			return;
		} else if (isEmpty(txtbirthdate, 'Enter date of birth')) {
			return;
		} else if (isEmpty(txtage, 'Enter Age')) {
			return;
		} else if (isEmpty(txtgender, 'Enter gender')) {
			return;
		} else if (isEmpty(txtaddress, 'Enter Address')) {
			return;
		} else if (isEmpty(txtheight, 'Enter Height')) {
			return;
		} else if (isEmpty(txtweight, 'Enter weight')) {
			return;
		} else if (isEmpty(txtcomplexion, 'Enter Complexion')) {
			return;
		} else if (isEmpty(txteyes, 'Enter Eye color')) {
			return;
		} else if (isEmpty(txthair, 'Enter Hair Color')) {
			return;
		} else if (isEmpty(txtothers, 'Enter Distinguishing mark')) {
			return;
		} else if (isEmpty(txtcontact, 'Enter Contact person')) {
			return;
		} else if (isEmpty(txtcontactNum, 'Enter contact  person number')) {
			return;
		} else if (isEmpty(txtcaddress, 'Enter Contact Person address')) {
			return;
		} else {
			submit();
		}
	}
}

function checkAddWantedForm()
{
	with (window.document.frmAddWanted) {
		if (isEmpty(txtname, 'Enter Name')) {
			return;
		} else if (isEmpty(txtname, 'Enter Alias')) {
			return;
		} else  if (isEmpty(txtname, 'Enter Alias')) {
			return;
		} else if (isEmpty(txtbirthdate, 'Enter date of birth')) {
			return;
		} else if (isEmpty(txtage, 'Enter Age')) {
			return;
		} else if (isEmpty(txtgender, 'Enter gender')) {
			return;
		} else if (isEmpty(txtaddress, 'Enter Address')) {
			return;
		} else if (isEmpty(txtheight, 'Enter Height')) {
			return;
		} else if (isEmpty(txtweight, 'Enter weight')) {
			return;
		} else if (isEmpty(txtcomplexion, 'Enter Complexion')) {
			return;
		} else if (isEmpty(txteyes, 'Enter Eye color')) {
			return;
		} else if (isEmpty(txthair, 'Enter Hair Color')) {
			return;
		} else if (isEmpty(txtmark, 'Enter Distinguishing mark')) {
			return;
		} else {
			submit();
		}
	}
}



function checkreportacrimeForm()
{
	with (window.document.frmReport) {
		 if (isEmpty(txtcomplaint, 'Enter Complaint')) {
			return;
		} else  if (isEmpty(txtincidentplace, 'Enter Place of Incident')) {
			return;
		} else  if (isEmpty(txtincidentdate, 'Enter Date of Incident')) {
			return;
		} else   if (isEmpty(txtreport, 'Enter Report')) {
			return;
		} else {
			submit();
		}
	}
}

function checkaboutpnpForm()
{
	with (window.document.frmaboutpnp) {
		if (isEmpty(txtaboutpnp, 'Please Do not leave this page empty.')) {
			return;
		} else{
			submit();
		}
	}
}

function checkreportactionForm()
{
	with (window.document.frmReport) {
		if (isEmpty(action, 'Select Station.')) {
			return;
		} else if (isEmpty(outline, 'Please Make a brief Outline')) {
			return;
		} else{
			submit();
		}
	}
}


function checkAddactivityForm()
{
	with (window.document.frmAddActivities) {
		if (isEmpty(txtdate, 'Select Date of Activity')) {
			return;
		} else if (isEmpty(txttitle, 'Enter Title')) {
			return;
		} else  if (isEmpty(txtcontent, 'Enter Content of Activity')) {
			return;
		} else {
			submit();
		}
	}
}


function checkreportreplyForm()
{
	with (window.document.frmReport) {
		if (isEmpty(txtcomplaint, 'Please Enter Subject')) {
			return;
		} else if (isEmpty(txtreport, 'Enter Your Report')) {
			return;
		} else{
			submit();
		}
	}
}

function checkaboutbcpoForm()
{
	with (window.document.frmaboutbcpo) {
		if (isEmpty(txtaboutbcpo, 'Please Do not leave this page empty.')) {
			return;
		} else{
			submit();
		}
	}
}
function checkaboutbacolodForm()
{
	with (window.document.frmaboutbacolod) {
		if (isEmpty(txtaboutbacolod, 'Please Do not leave this page empty.')) {
			return;
		} else{
			submit();
		}
	}
}

function checkprintForm()
{
	with (window.document.frmAddarchives) {
		if (isEmpty(department, 'Select Department')) {
			return;
		} else if (isEmpty(txtfrom, 'Enter Start Date')) {
			return;
		} else if (isEmpty(txtto, 'Enter End Date')) {
			return;
		} else {
			submit();
		}
	}
}

function checkforgotForm()
{
	with (window.document.frmforgot) {
		if (isEmpty(txtusername, 'Enter User Name')) {
			return;
		} if (isEmpty(txtemail, 'Enter Email Address')) {
			return;
		} else  if (isEmpty(txtanswer, 'Select Answer')) {
			return;
		} else    if (isEmpty(txtCode, 'Please Enter the Code seen above')) {
			return;
		} else{
			submit();
		}
	}
}

function checkRegisterForm()
{
	with (window.document.frmRegister) {
		if (isEmpty(txtfname, 'Enter First Name')) {
			return;
		} else if (isEmpty(txtmname, 'Enter Middle Name')) {
			return;
		} else  if (isEmpty(txtlname, 'Enter Last Name')) {
			return;
		} else if (isEmpty(gender, 'Enter Male or Female')) {
			return;
		} else  if (isEmpty(month, 'Enter Month')) {
			return;
		} else  if (isEmpty(day, 'Enter day')) {
			return;
		} else  if (isEmpty(year, 'Enter Year')) {
			return;
		} else  if (isEmpty(txtstreet, 'Enter Street')) {
			return;
		} else  if (isEmpty(txtbrgy, 'Enter brgy')) {
			return;
		} else  if (isEmpty(txtcity, 'Enter City')) {
			return;
		} else  if (isEmpty(txtcontact, 'Enter Contact')) {
			return;
		} else  if (isEmpty(txtemail, 'Enter Email Address')) {
			return;
		} else   if (isEmpty(txtusername, 'Enter User Name')) {
			return;
		} else  if (isEmpty(txtpassword, 'Enter Password')) {
			return;
		} else    if (isEmpty(txtpassword2, 'Retype Password')) {
			return;
		} else    if (isEmpty(txtstreet, 'Select Street')) {
			return;
		} else    if (isEmpty(txtbrgy, 'Select Brgy')) {
			return;
		} else    if (isEmpty(txtcity, 'Enter City')) {
			return;
		} else    if (isEmpty(txtCode, 'Provide Code seen above')) {
			return;
		} else{
			submit();
		}
	}
}


function checkmodifyprofileForm()
{
	with (window.document.frmRegister) {
		if (isEmpty(txtfname, 'Enter First Name')) {
			return;
		} else if (isEmpty(txtmname, 'Enter Middle Name')) {
			return;
		} else  if (isEmpty(txtemail, 'Enter Email Address')) {
			return;x
		} else   if (isEmpty(txtlname, 'Enter Last Name')) {
			return;x
		} else  if (isEmpty(txtpassword, 'Enter Password')) {
			return;
		} else    if (isEmpty(txtpassword2, 'Retype Password')) {
			return;
		} else    if (isEmpty(txtstreet, 'Select Street')) {
			return;
		} else    if (isEmpty(txtbrgy, 'Select Brgy')) {
			return;
		} else    if (isEmpty(txtcity, 'Enter City')) {
			return;
		} else{
			submit();
		}
	}
}


function checkprintFormstats2()
{
	with (window.document.frmAddarchives3) {
		if (isEmpty(department, 'Select Department')) {
			return;
		} else if (isEmpty(txtfrom3, 'Enter Start Date')) {
			return;
		} else if (isEmpty(txtto3, 'Enter End Date')) {
			return;
		} else  if (isEmpty(txtcase, 'Please Select Case')) {
			return;
		} else {
			submit();
		}
	}
}


function checkprintFormstatsbrgy()
{
	with (window.document.frmAddarchivesbr) {
		if (isEmpty(txtbrgy, 'Select Barangay')) {
			return;
		} else if (isEmpty(txtfrombr, 'Enter Start Date')) {
			return;
		} else if (isEmpty(txttobr, 'Enter End Date')) {
			return;
		} else {
			submit();
		}
	}
}


function checkcrimerate()
{
	with (window.document.frmAddarchives4) {
		if (isEmpty(department1, 'Select Department')) {
			return;
		} else if (isEmpty(txtfrom4, 'Enter Start Date')) {
			return;
		} else if (isEmpty(txtto4, 'Enter End Date')) {
			return;
		} else  if (isEmpty(txtcase2, 'Please Select Case')) {
			return;
		} else {
			submit();
		}
	}
}


function checkcrimerate2()
{
	with (window.document.frmAddarchives4) {
		if (isEmpty(txtfrom4, 'Enter Start Date')) {
			return;
		} else if (isEmpty(txtto4, 'Enter End Date')) {
			return;
		} else  if (isEmpty(txtcase2, 'Please Select Case')) {
			return;
		} else {
			submit();
		}
	}
}

function checkstatistic()
{
	with (window.document.frmAddarchives2) {
		if (isEmpty(txtfrom2, 'Enter Start Date')) {
			return;
		} else if (isEmpty(txtto2, 'Enter End Date')) {
			return;
		} else {
			submit();
		}
	}
}

function checkprintFormstats()
{
	with (window.document.frmAddarchives2) {
		if (isEmpty(department, 'Select Department')) {
			return;
		} else if (isEmpty(txtfrom2, 'Enter Start Date')) {
			return;
		} else if (isEmpty(txtto2, 'Enter End Date')) {
			return;
		} else {
			submit();
		}
	}
}

function checkAddBlotterForm()
{
	with (window.document.frmAddBlotter) {
		if (isEmpty(txtcname, 'Enter Name of Complainant')) {
			return;
		} else   if (isEmpty(txtaddress, 'Enter Adress')) {
			return;
		} else  if (isEmpty(txtcomplaint, 'Enter Complaint')) {
			return;
		} else  if (isEmpty(txtlocation, 'Enter Location')) {
			return;
		} else   if (isEmpty(cboCrime, 'Please Select Type of Crime')) {
			return;
		} else if (isEmpty(txtoutline, 'Enter Brief outline of the complaint')) {
			return;
		} else   {
			submit();
		}
	}
}

function checkAddBlotterFormtmu()
{
	with (window.document.frmAddBlotter) {
		if (isEmpty(txtcname, 'Enter Name')) {
			return;
		} else   if (isEmpty(txtaddress, 'Enter Adress')) {
			return;
		} else  if (isEmpty(txtcomplaint, 'Enter Complaint')) {
			return;
		} else  if (isEmpty(txtlocation, 'Enter Location')) {
			return;
		} else   if (isEmpty(cboInvestigator, 'Please Select Investigator')) {
			return;
		} else if (isEmpty(txtoutline, 'Enter Brief outline of the complaint')) {
			return;
		} else   {
			submit();
		}
	}
}

function checkAddCrimeForm()
{
	with (window.document.frmAddCrime) {
		if (isEmpty(txtname, 'Enter Name')) {
			return;
		} else if (isEmpty(txtage, 'Enter Age')) {
			return;
		} else if (isEmpty(txtpob, 'Enter Place of birth')) {
			return;
		} else if (isEmpty(txtaddress, 'Enter address')) {
			return;
		} else if (isEmpty(txtmodus, 'Enter Modus Operandi')) {
			return;
		} else if (isEmpty(txtheight, 'Enter Height')) {
			return;
		} else if (isEmpty(txtweight, 'Enter Weight')) {
			return;
		} else if (isEmpty(txtcomplexion, 'Enter Complexion')) {
			return;
		} else if (isEmpty(txthair, 'Enter Hair description')) {
			return;
		} else if (isEmpty(txteyes, 'Enter Eyes Description')) {
			return;
		} else if (isEmpty(txtfname, 'Enter Name of the father')) {
			return;
		} else if (isEmpty(txtmname, 'Enter Name of the Mother')) {
			return;
		} else if (isEmpty(txtmaddress, 'Enter Adress of the Mother')) {
			return;
		} else if (isEmpty(txtfaddress, 'Enter Adress of the Father')) {
			return;
		} else if (isEmpty(mtxCrime, 'Enter Crime')) {
			return;
		} else if (isEmpty(txtcdate, 'Enter Date of Incident')) {
			return;
		} else if (isEmpty(txtcplace, 'Enter Place of Incident')) {
			return;
		} else if (isEmpty(txtcstatus, 'Enter Status')) {
			return;
		} else{
			submit();
		}
	}
}



function checkmodifyCrimeForm()
{
	with (window.document.frmAddCrime) {
		if (isEmpty(txtname, 'Enter Name')) {
			return;
		} else if (isEmpty(txtage, 'Enter Age')) {
			return;
		} else if (isEmpty(txtsex, 'Enter Sex')) {
			return;
		} else if (isEmpty(txtdob, 'Enter date of birth')) {
			return;
		} else if (isEmpty(txtpob, 'Enter Place of birth')) {
			return;
		} else if (isEmpty(txtaddress, 'Enter address')) {
			return;
		} else if (isEmpty(txtmodus, 'Enter Modus Operandi')) {
			return;
		} else if (isEmpty(txtheight, 'Enter Height')) {
			return;
		} else if (isEmpty(txtweight, 'Enter Weight')) {
			return;
		} else if (isEmpty(txtcomplexion, 'Enter Complexion')) {
			return;
		} else if (isEmpty(txthair, 'Enter Hair description')) {
			return;
		} else if (isEmpty(txteyes, 'Enter Eyes Description')) {
			return;
		} else if (isEmpty(txtfname, 'Enter Name of the father')) {
			return;
		} else if (isEmpty(txtmname, 'Enter Name of the Mother')) {
			return;
		} else if (isEmpty(txtmaddress, 'Enter Adress of the Mother')) {
			return;
		} else if (isEmpty(txtfaddress, 'Enter Adress of the Father')) {
			return;
		} else{
			submit();
		}
	}
}



function checkAddCrime()
{
	with (window.document.frmAddCrime) {
		if (isEmpty(mtxCrime, 'Enter Crime')) {
			return;
		} else if (isEmpty(txtcdate, 'Enter Date')) {
			return;
		} else if (isEmpty(txtcplace, 'Enter Place')) {
			return;
		} else if (isEmpty(txtcstatus, 'Enter Status')) {
			return;
		} else {
			submit();
		}
	}
}
function checkAddotherdataForm()
{
	with (window.document.frmAddBlotter) {
		if (isEmpty(txtcage, 'Please Enter the age of the complainant')) {
			return;
		} else if (isEmpty(txtcgender, 'Please select the gender of the complainant')) {
			return;
		} else if (isEmpty(txtcstatus, 'Please select the civil status of the complainant')) {
			return;
		} else  if (isEmpty(txtcnat, 'Please Enter the nationality of the complainant')) {
			return;
		} else if (isEmpty(txtstatusofcase, 'Please Select Status of Case')) {
			return;
		}else
			{
			submit();
		}
	}
}


function checkname()
{
	with (window.document.frm1) {
		if (isEmpty(txtsearch, 'Please Enter Name')) {
			return;
		}else
			{
			submit();
		}
	}
}


function checkAddrespondentsForm()
{
	with (window.document.frmAddRespondents) {
		if (isEmpty(txtname, 'Please Enter the Name of Respondents')) {
			return;
		} else
			{
			submit();
		}
	}
}

function checkAddotherdatatmuForm()
{
	with (window.document.frmAddBlotter) {
		if (isEmpty(txtrname, 'Please Enter Name of Respondent')) {
			return;
		} 
		else if (isEmpty(txtaccident, 'Please Select type of Accident')) {
			return;
		} 
		else if (isEmpty(txtvehicle, 'Please Select type of Vehicle')) {
			return;
		} else
			{
			submit();
		}
	}
}


function searchForm()
{
	with (window.document.frmAddBlotter) {
		if (isEmpty(txtsearch, 'Please dont leave the search box empty')) {
			return;
		} else {
			window.location.href = 'index.php&search=' + txtsearch;
		}
	}
}

function addCrimeRogue(policeId)
{
	window.location.href = 'index.php?view=addcrime&policeId=' + policeId;
}

function modifyRogue(policeId)
{
	window.location.href = 'index.php?view=modify&policeId=' + policeId;
}

function deleteRogue(policeId)
{
	if (confirm('Delete this Profile?')) {
		window.location.href = 'processRogue.php?action=deleteRogue&policeId=' + policeId;
	}
}

function foundMissing(policeId)
{
	if (confirm('This Missing person has been found?')) {
		window.location.href = 'processMissing.php?action=foundMissing&policeId=' + policeId;
	}
}

function deleteactivities(policeId)
{
	if (confirm('Delete this Activity?')) {
		window.location.href = 'processActivities.php?action=deleteActivities&policeId=' + policeId;
	}
}

function deleteCrimereport(policeId)
{
	if (confirm('Delete this Report?')) {
		window.location.href = 'processCrimereport.php?action=deleteReport&policeId=' + policeId;
	}
}

function deleteCrimeinfo(policeId)
{
	if (confirm('Delete this Message?')) {
		window.location.href = 'processCrimeinfo.php?action=deleteReport&policeId=' + policeId;
	}
}
function Mostwanted(policeId)
{
	if (confirm('Mark this as most wanted?')) {
		window.location.href = 'processRogue.php?action=mostwanted&policeId=' + policeId;
	}
}
function deleteBlotter(policeId)
{
	if (confirm('Delete this Blotter Record?')) {
		window.location.href = 'processBlotter.php?action=deleteBlotter&policeId=' + policeId;
	}
}

function MoveToArchive(policeId)
{
	if (confirm('Move this Blotter to Archive?')) {
		window.location.href = 'processBlotter.php?action=MoveToArchive&policeId=' + policeId;
	}
}

function deleteImage(policeId)
{
	if (confirm('Delete this image')) {
		window.location.href = 'processRogue.php?action=deleteImage&policeId=' + policeId;
	}
}
function deleteMissing(policeId)
{
	if (confirm('Delete this Image')) {
		window.location.href = 'processMissing.php?action=deleteImage&policeId=' + policeId;
	}
}
function deleteWanted(policeId)
{
	if (confirm('Delete this Image')) {
		window.location.href = 'processWanted.php?action=deleteImage&policeId=' + policeId;
	}
}
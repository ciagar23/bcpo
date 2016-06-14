<?
if (!defined('WEB_ROOT')) {
	exit;
}


?>



<html>
<head>
<body onload='window.document.frm1.txtsearch.focus();';>

<style type="text/css">


	.suggestionsBox {
		position: relative;
		left: 30px;
		margin: 10px 0px 0px 0px;
		width: 400px;
		background-color: white;
		-moz-border-radius: 7px;
		-webkit-border-radius: 7px;
		border: 2px solid #000;
		color: black;
	}

	.suggestionList {
		margin: 0px;
		padding: 0px;
	}

	.suggestionList li {

		margin: 0px 0px 3px 0px;
		padding: 3px;
		cursor: pointer;
	}

	.suggestionList li:hover {
		background-color: #659CD8;
	}
</style>

<script type="text/javascript" src="autocomplete.js"></script>
<script type="text/javascript">
	function lookup(inputString) {
		if(inputString.length == 0) {
			// Hide the suggestion box.
			$('#suggestions').hide();
		} else {
			$.post("rpc.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	} // lookup

	function fill(thisValue) {
		$('#inputString').val(thisValue);
		setTimeout("$('#suggestions').hide();", 200);
	}
</script>

</head>

</body>
<table width="100%" height="300">
<tr>
<td valign="top" align="center" colspan="2">
<form method="post" action="processCheckName.php?action=search" name='frm1'>
<input type="text" name="txtsearch" size="30" value="" id="inputString" onKeyUp="lookup(this.value);" onBlur="fill();" />
<input type="button" id="search-submit" value="Check Name"  onClick="checkname();" />
<tr>
<td width="25%">
<td align="left" valign="top">
<div class="suggestionsBox" id="suggestions" style="display: none;">
				<img src="upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="autoSuggestionsList">
					&nbsp;
				</div>
			</div>
	

</form>
</table>
</html>
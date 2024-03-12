$(document).ready(function(){
/*==============================================================================*/



/*==============================================================================
	Send ajax to server
==============================================================================*/


	// Send ajax data on click : button add
	jQuery("body").on("click", "button[class='addHint']", function(key) {
		var idChallengeH = jQuery("input[name='idChallengeH']").val();
		var hint = jQuery(".addHint > input[name='hint']").val();  // Utilisez '.addHint' au lieu de '.add'
		var formation = jQuery(".addHint > input[name='formation']").val();  // Utilisez '.addHint' au lieu de '.add'
		var challengeName = jQuery(".addHint > input[name='challengeName']").val();  // Utilisez '.addHint' au lieu de '.add'
		sendAjax("ajxAddHint.php", {idChallengeH: idChallengeH, hint: hint, formation: formation, challengeName: challengeName});
	});
	
	jQuery("body").on("keyup", "input[class='formation']", function(key) {
		var idChallengeH = jQuery("input[name='idChallengeH']").val();
		var hint = jQuery("input[name='hint']").val();  // Utilisez 'input[name='hint']' au lieu de '.add > input[name='hint']'
		var formation = jQuery(".addHint > input[name='formation']").val();  // Utilisez '.addHint' au lieu de '.add'
		var challengeName = jQuery(".addHint > input[name='challengeName']").val();  // Utilisez '.addHint' au lieu de '.add'
		if (key.which == 13) sendAjax("ajxAddHint.php", {idChallengeH: idChallengeH, hint: hint, formation: formation, challengeName: challengeName});
	});



/*==============================================================================
	Get ajax from server
==============================================================================*/

	// Get ajax data
	function getAjax(data) {
		if (defined(data['success'])) {
			jQuery("span[name='errorAddData']").hide()
			if (data['success']) window.location = "main.php";
			// Display errorMsg
			else jQuery("button[name='add']").after("<span class='errorMsg' name='errorAddData'>" + data['errorMsg'] + "</span>");
		}
  }






/*==============================================================================
	Ajax functions
==============================================================================*/

	// --- Send AJAX data to server
	function sendAjax(serverUrl, data) {
		jQuery.ajax({
			type: 'POST',
			url: serverUrl,
			dataType: 'json',
			data: { data: JSON.stringify(data) },  // Utilisez un objet pour envoyer des données au lieu de concaténer une chaîne
			success: function (data) {
				getAjax(data);
			}
		});
	}



	// --- Test whether a variable is defined or not
	function defined(myVar) {
		if (typeof myVar != 'undefined') return true;
		return false;
	}

	//==============================================================================
});

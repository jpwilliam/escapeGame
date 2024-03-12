$(document).ready(function(){
/*==============================================================================*/



/*==============================================================================
	Send ajax to server
==============================================================================*/


	// Send ajax data on click : button add
	jQuery("body").on("click", "button[class='add']", function(key) {
		var idChallenge = jQuery("input[name='idChallenge']").val();
		var flag = jQuery(".add > input[name='flag']").val();
		sendAjax("ajxAddData.php", {idChallenge: idChallenge, flag: flag});
	});

  jQuery("body").on("keyup", "input[class='dataToAdd']", function(key) {
 		var idChallenge = jQuery("input[name='idChallenge']").val();
		var flag = jQuery("input[name='flag']").val();
		if (key.which == 13)sendAjax("ajxAddData.php", {idChallenge: idChallenge, flag: flag});

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

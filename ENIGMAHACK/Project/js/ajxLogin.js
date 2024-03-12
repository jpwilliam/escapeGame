$(document).ready(function(){
//==============================================================================





/*==============================================================================
	Send ajax to server
==============================================================================*/


	// Send ajax data on click : submit button
	jQuery("body").on("click", "input[type='submit']", function(key) {
		var teamName = jQuery("input[name='teamName']").val();
		var pwd = jQuery("input[name='pwd']").val();
		sendAjax("ajxLogin.php", {teamName: teamName, pwd: pwd});
  });

	jQuery("body").on("keyup", "input[type='password']", function(key) {
		var teamName = jQuery("input[name='teamName']").val();
		var pwd = jQuery("input[name='pwd']").val();
		if (key.which == 13)sendAjax("ajxLogin.php", {teamName: teamName, pwd: pwd});
  });





/*==============================================================================
	Get ajax from server
==============================================================================*/

	// Get ajax data
	function getAjax(data) {
		if (defined(data['success'])) {
			if (data['success']) window.location = "main.php";
			else {
				jQuery("span[class='errorMsg']").hide()
				// Display errorMsg
				jQuery("input[name='pwd']").after("<span class='errorMsg'>" + data['errorMsg'] + "</span>");
			}
    }
}






/*==============================================================================
	Ajax functions
==============================================================================*/

	// --- Send AJAX data to server
	function sendAjax(serverUrl, data) {
		serializedData = JSON.stringify(data);
		jQuery.ajax({type: 'POST', url: serverUrl, dataType: 'json', data: "data=" + serializedData,
			success: function(data) {
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

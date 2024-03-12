$(document).ready(function(){
//==============================================================================





/*==============================================================================
	Send ajax to server
==============================================================================*/

	// Send ajax data on input and on pageLoad : input teamName
	jQuery("body").on("input", "input[name='teamName']", function(key) {
		var teamName = jQuery(this).val();
		sendAjax("ajxCheckIdA.php", {teamName: teamName});
	});
	var teamName = jQuery("input[name='teamName']").val();
	if (teamName != "") sendAjax("ajxCheckIdA.php", {teamName: teamName});




/*==============================================================================
	Get ajax from server
==============================================================================*/

	// Get ajax data
	function getAjax(data) {
		if (defined(data['success'])) {
			if (!data['success']) jQuery("input[type='submit']").addClass("hide");
			else jQuery("input[type='submit']").removeClass("hide");
		} else {
			jQuery("input[type='submit']").addClass("hide");
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

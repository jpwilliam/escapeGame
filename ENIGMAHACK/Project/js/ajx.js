$(document).ready(function(){
//==============================================================================





/*==============================================================================
	Send ajax to server
==============================================================================*/

	// Send ajax data every 60s
	window.setInterval(sendAjax, 60000, "ajxPage.php", {});



	// Send ajax data on keyup : input login
	jQuery("body").on("keyup", "input[name='login']", function(key) {
		var login = jQuery(this).val();
		if (key.which == 13) alert("Vous avez appuyé sur ENTREE : login=" + login);
		sendAjax("ajxPage.php", {login: login});
	});





/*==============================================================================
	Receive ajax from server
==============================================================================*/

	// Receive ajax data
	function receiveAjax(data) {
		// TODO
	}





/*==============================================================================
	Ajax functions
==============================================================================*/

	// --- Send AJAX data to server
	function sendAjax(serverUrl, data) {
		serializedData = JSON.stringify(data);
		jQuery.ajax({type: 'POST', url: serverUrl, dataType: 'json', data: "data=" + serializedData,
			success: function(data) {
				receiveAjax(data);
			}
		});
	}



	// --- Display standard json data with syntax :
	//     [
	//       {target:".htmlClass", html:"html"},
	//       {target:"htmlElement", html:"html", insert:"append"},
	//       {target:"htmlElement", removeClass:"cssRed", addClass:"cssGreen"},
	//       {target:"htmlElement", cssKey:"background-color", cssVal:"red"},
	//       {action:"reloadPage"}
	//     ]
	function displayAjax(data) {
		for (var val of data) {
			// Insert data into HTML (insert or replace)
			if (defined(val.target) && defined(val.html)) {
				if (val.insert == "prepend") {
					jQuery(val.target).prepend(val.html);
				} else if (val.insert == "append") {
					jQuery(val.target).append(val.html);
				} else {
					jQuery(val.target).html(val.html);
				}
			}

			// Update CSS property
			else if (defined(val.target) && defined(val.cssKey) && defined(val.cssVal)) {
				jQuery(val.target).css(val.cssKey, val.cssVal);
			}

			// Update CSS class
			else if (defined(val.target) && (defined(val.addClass) || defined(val.removeClass)) ) {
				jQuery(val.target).addClass(val.addClass).removeClass(val.removeClass);
			}

			// Reload page
			else if (val.action == "reloadPage") {
				location.reload();
			}
		}
	}



	// --- Test whether a variable is defined or not
	function defined(myVar) {
		if (typeof myVar != 'undefined') return true;
		return false;
	}

//==============================================================================
});

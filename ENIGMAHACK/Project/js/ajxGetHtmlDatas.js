$(document).ready(function(){
//==============================================================================




/*==============================================================================
	Send ajax to server
==============================================================================*/

	// Send ajax on pageLoad :
	sendAjax("ajxGetHtmlDatas.php", {});





/*==============================================================================
	Get ajax from server
==============================================================================*/

	// Get ajax data
	function getAjax(data) {
		if (defined(data['success']) && defined(data['html'])) {
      if (data['success']){
        jQuery("li[class='view']").after(data['html']);
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

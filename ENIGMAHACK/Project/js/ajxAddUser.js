$(document).ready(function () {
    //==============================================================================

    // Check pwd = pwdConfirm
    jQuery("body").on("input", "input[name='pwdConfirm']", function (key) {
        var pwd = jQuery("input[name='pwd']").val();
        var pwdConfirm = jQuery("input[name='pwdConfirm']").val();

        // Set isValid / isInvalid
        if (pwd == pwdConfirm) jQuery(this).removeClass("isInvalid").addClass("isValid");
        else jQuery(this).removeClass("isValid").addClass("isInvalid");
    });
    jQuery("body").on("input", "input[name='pwd']", function (key) {
        var pwd = jQuery("input[name='pwd']").val();
        var pwdConfirm = jQuery("input[name='pwdConfirm']").val();

        // Set isValid / isInvalid
        if (pwd == pwdConfirm) jQuery("input[name='pwdConfirm']").removeClass("isInvalid").addClass("isValid");
        else jQuery("input[name='pwdConfirm']").removeClass("isValid").addClass("isInvalid");
    });

    /*==============================================================================
    Send ajax to server
    ==============================================================================*/

    var formation; // Declare formation outside of the event handlers

    // Send ajax data on click : submit button
    jQuery("body").on("click", "input[type='submit']", function (key) {
        var teamName = jQuery("input[name='teamName']").val();
        formation = jQuery("input[name='formation']").val();
        var pwd = jQuery("input[name='pwd']").val();
        var pwdConfirm = jQuery("input[name='pwdConfirm']").val();

        // CHECK : pwd = pwdConfirm
        if (pwd != pwdConfirm) {
            // Handle the error or simply return to stop further execution
            return;
        }

        sendAjax("ajxAddUser.php", { teamName: teamName, formation: formation, pwd: pwd });
    });

    jQuery("body").on("keyup", "input[type='password']", function (key) {
        var teamName = jQuery("input[name='teamName']").val();
        var pwd = jQuery("input[name='pwd']").val();
        var pwdConfirm = jQuery("input[name='pwdConfirm']").val();

        // CHECK : pwd = pwdConfirm
        if (pwd != pwdConfirm) {
            // Handle the error or simply return to stop further execution
            return;
        }

        sendAjax("ajxAddUser.php", { teamName: teamName, formation: formation, pwd: pwd });
    });

    /*==============================================================================
    Get ajax from server
    ==============================================================================*/

	// Get ajax data
	function getAjax(data) {
		if (defined(data['success'])) {
			jQuery("span[name='errorAddData']").hide();
			if (data['success']) {
				window.location = "index.php";
			} else {
				jQuery("input[type='submit']").after("<span class='errorMsg' name='errorAddData'>" + data['errorMsg'] + "</span>");
			}
		}
	}

    /*==============================================================================
    Ajax functions
    ==============================================================================*/

    // --- Send AJAX data to server
    function sendAjax(serverUrl, data) {
        serializedData = JSON.stringify(data);
        jQuery.ajax({
            type: 'POST', url: serverUrl, dataType: 'json', data: "data=" + serializedData,
            success: function (data) {
                getAjax(data);
            }
        });
    }

    // --- Test whether a variable is defined or not
    function defined(myVar) {
        return typeof myVar !== 'undefined';
    }

    //==============================================================================
});

<?php
////////////////////////////////////////////////////////////////////////////////
// Utils library
////////////////////////////////////////////////////////////////////////////////



// SUCCESS function
function success($db=NULL, $result=NULL, $html=NULL) {
	// DB close
	if ($db != NULL) $db->close();

	// Result close
	if ($result != NULL) $result->close();

	// Data ajax to client
	echo json_encode(array("success"=>true, "html"=>$html));
	exit();
}

// SUCCESS function
function successData($db=NULL, $result=NULL, $data=NULL) {
	// DB close
	if ($db != NULL) $db->close();

	// Result close
	if ($result != NULL) $result->close();

	// Data ajax to client
	echo json_encode(array("success"=>true, "data"=>$data));
	exit();
}

// FAIL functions
function fail($db=NULL, $result=NULL, $errorMsg=NULL) {
	// DB close
	if ($db != NULL) $db->close();

	// Result close
	if ($result != NULL) $result->close();

	// Data ajax to client
	echo json_encode(array("success"=>false, "errorMsg"=>$errorMsg));
	exit();
}

?>

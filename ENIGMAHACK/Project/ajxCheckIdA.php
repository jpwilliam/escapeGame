<?php
	// Include libraries
	include_once("./utils.php");

	// DB open
	include_once("./dbConfig.php");
	$db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
	$db->set_charset("utf8");

	// Data ajax from client
	if (isset($_POST['data'])) $data = json_decode($_POST['data'], true);
	$teamName = NULL;
	if (preg_match("/.{1,15}$/", $data['teamName'])) $teamName = $db->real_escape_string($data['teamName']);

	// CHECK : client data
	if ($teamName == NULL) fail($db, NULL, "$teamName");

	// Select teamName from tblUsers
	$query = "SELECT teamName FROM team WHERE teamName ='$teamName';";
	$result = $db->query($query);
	$numRows = $result->num_rows;

	// CHECK : teamName not present
	if ($numRows != 0) fail($db, $result, "nom d'equipe existant.");

	// Data ajax to client
	success($db, $result);
?>

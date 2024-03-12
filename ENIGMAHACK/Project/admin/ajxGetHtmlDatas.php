<?php
	// Include libraries
	include_once("./utils.php");
	include_once("./user.php");

	// Data from session
	session_start();
	$idA = NULL;
	if (isset($_SESSION['idA'])) $idA = $_SESSION['idA'];
	$passA = NULL;
	if (isset($_SESSION['passA'])) $passA = $_SESSION['passA'];

	// Check
	if ($idA == NULL || $passA == NULL) fail(NULL, NULL, "Session invalide.");

	// DB open
	include_once("./dbConfig.php");
	$db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
	$db->set_charset("utf8");

	// Construct object user
	$getHtmlDatas= new User($idA, $passA);

	// Get all user datas (HTML format)
	$html = $getHtmlDatas->getHtmlDatas();

	// SUCCESS
	success($db, NULL, $html);
?>

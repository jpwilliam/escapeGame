<?php
    // Include libraries
    include_once("./utils.php");

    // Data from session
    session_start();
    $teamName = NULL;
    if (isset($_SESSION['teamName'])) $teamName = $_SESSION['teamName'];

    // Check
    if ($teamName == NULL ) header("Location: logout.php");

    // DB open
    include_once("./dbConfig.php");
    $db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
    $db->set_charset("utf8");

        // Data ajax from client
	if (isset($_POST['data'])) $data = json_decode($_POST['data'], true);
	$idChallengeH = NULL;
	if (preg_match("/.{1,15}$/", $data['idChallengeH'])) $idChallengeH = $db->real_escape_string($data['idChallengeH']);
    $challengeName = NULL;
	if (preg_match("/.{1,15}$/", $data['challengeName'])) $challengeName = $db->real_escape_string($data['challengeName']);
	$hint = NULL;
	if (preg_match("/.{1,30}$/", $data['hint'])) $hint = $db->real_escape_string($data['hint']);
    $formation = NULL;
	if (preg_match("/.{1,30}$/", $data['formation'])) $formation = $db->real_escape_string($data['formation']);



    // CHECK: client data
    if ($idChallengeH == NULL || $formation == NULL || $hint == NULL || $challengeName == NULL) fail($db, NULL, "Données invalides.");

    // DB insert
    $query = "INSERT INTO hint(id, idChallenge, formation, hint, challengeName) VALUES (NULL,'$idChallengeH','$formation','$hint', '$challengeName');";
    if (!$db->query($query)) fail($db);

    // Data ajax to client
    success($db);
?>

	


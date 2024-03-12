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
	$idChallenge = NULL;
	if (preg_match("/.{1,15}$/", $data['idChallenge'])) $idChallenge = $db->real_escape_string($data['idChallenge']);
	$flag = NULL;
	if (preg_match("/.{1,30}$/", $data['flag'])) $flag = $db->real_escape_string($data['flag']);

    // CHECK: client data
    if ($idChallenge == NULL || $flag == NULL) fail($db, NULL, "Données invalides.");

    // Hash flag
    $salt = "dK2mqlOs4dUibu8qHsmiOm6AqZs5DdkGN4KvghM3dqkfN5Dhqdm7hSazertyuiopqsdfghjkertyuioxcvbnertyuiiugfdfguytfvhytfvhiuyhjzoeiufouqsygdfoyuFG8Kgv9qmOOH5fsuG4Nvf98wGfD7YTdi03mLvXxzT29t7u"; // Define salt (length=100 for 64 chars hash)
    $flag = hash("sha256", $flag . $salt);

    // DB insert
    $query = "INSERT INTO `verifyChallenge`(`id`, `idChallenge`, `flagHash`) VALUES (NULL,'$idChallenge','$flag');";
    if (!$db->query($query)) fail($db);

    // Data ajax to client
    success($db);
?>

	


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
	$flag = NULL;
	if (preg_match("/.{1,30}$/", $data['flag'])) $flag = $db->real_escape_string($data['flag']);
	$idChallenge = NULL;
	if (preg_match("/.{1,30}$/", $data['idChallenge'])) $idChallenge = $db->real_escape_string($data['idChallenge']);

    // CHECK: client data
    if ($flag == NULL || $idChallenge == NULL) fail($db, NULL, "Données invalides.");

    // Hash flag
    $salt = "dK2mqlOs4dUibu8qHsmiOm6AqZs5DdkGN4KvghM3dqkfN5Dhqdm7hSazertyuiopqsdfghjkertyuioxcvbnertyuiiugfdfguytfvhytfvhiuyhjzoeiufouqsygdfoyuFG8Kgv9qmOOH5fsuG4Nvf98wGfD7YTdi03mLvXxzT29t7u"; // Define salt (length=100 for 64 chars hash)
    $flag = hash("sha256", $flag . $salt);
	
	// DB select
	$query = "SELECT flagHash FROM verifyChallenge WHERE idChallenge = '$idChallenge';";
	// echo $query;
	$result = $db->query($query);
	$numRows = $result->num_rows;

	// Check
	if ($numRows == 0) fail($db, $result, 'Id du challenge incorect');

	// Data from DB
	while ($row = $result->fetch_assoc()) {
		$flagHash = $row['flagHash'];
	}
	$result->close();

	// DB select
	$query = "SELECT id FROM team WHERE teamName='$teamName';";
	$result = $db->query($query);
	$numRows = $result->num_rows;

	// Check
	if ($numRows == 0) fail($db, $result,'nikel');

	// Data from DB
	while ($row = $result->fetch_assoc()) {
		$idTeam = $row['id'];
	}
	$result->close();


	if ($flag == $flagHash) {
		// DB update
		$query = "UPDATE challengeTeam SET isFinish='1', endTime=NOW() WHERE idTeam = '$idTeam' AND idChallenge = $idChallenge;";
		if (!$db->query($query)) {   
			echo 'Erreur lors de la mise à jour de la base de données : ' . $db->error;
			fail($db, $result);
		}else{
			success($db,NULL);
		}
	}
?>

	


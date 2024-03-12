<?php
	// Include libraries
	include_once("./utils.php");
	include_once("./user.php");

	// DB open
	include_once("./dbConfig.php");
	$db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
	$db->set_charset("utf8");

	// Data ajax from client
	if (isset($_POST['data'])) $data = json_decode($_POST['data'], true);
	$teamName = NULL;
	if (preg_match("/.{1,15}$/", $data['teamName'])) $teamName = $db->real_escape_string($data['teamName']);
	$formation = NULL;
	if (preg_match("/.{1,15}$/", $data['formation'])) $formation = $db->real_escape_string($data['formation']);
	$pwd = NULL;
	if (preg_match("/.{3,30}$/", $data['pwd'])) $pwd = $db->real_escape_string($data['pwd']);

	// CHECK : client data
	if ($pwd == NULL || $formation == NULL || $teamName == NULL) fail($db, NULL, "nom d'equipe ou mot de passe invalide.");

	if ($formation !='RT' || $formation != 'GEII' || $formation != 'GCCD')fail($db, NULL, "Nom de formation invalides.");
	
	// Hash pwd
	$salt = "dK2mqlOs4dUibu8qHsmiOm6AqZs5DdkGN4KvghM3dqkfN5Dhqdm7hSazertyuiopqsdfghjkertyuioxcvbnertyuiiugfdfguytfvhytfvhiuyhjzoeiufouqsygdfoyuFG8Kgv9qmOOH5fsuG4Nvf98wGfD7YTdi03mLvXxzT29t7u"; // Define salt (length=100 for 64 chars hash)
	$pwd = hash("sha256", $pwd . $salt);
	
	
	// DB insert
	$query = "INSERT INTO `team`(`id`, `formation`, `teamName`, `pwdHash`) VALUES (NULL,'$formation','$teamName','$pwd');";
	if (!$db->query($query)) fail($db, NULL,'tu es une merde');

	// Data ajax to client
	success($db);


?>

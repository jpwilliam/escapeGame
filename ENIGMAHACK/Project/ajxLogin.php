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
	$pwd = NULL;
	if (preg_match("/.{3,30}$/", $data['pwd'])) $pwd = $db->real_escape_string($data['pwd']);

	// CHECK : client data
	if ($teamName == NULL || $pwd == NULL) fail($db, NULL, "nom d'equipe ou mot de passe invalide.");

	// DB select
	$query = "SELECT formation, pwdHash FROM team WHERE teamName='$teamName';";
	$result = $db->query($query);
	$numRows = $result->num_rows;

	// CHECK : user exists
	if ($numRows != 1) fail($db, $result, "Nom d'equipe invalide.");

	// Data from DB
	while ($row = $result->fetch_assoc()) {
		$pwdConfirm = $row['pwdHash'];
		$formation = $row['formation'];
	}
	$salt = "dK2mqlOs4dUibu8qHsmiOm6AqZs5DdkGN4KvghM3dqkfN5Dhqdm7hSazertyuiopqsdfghjkertyuioxcvbnertyuiiugfdfguytfvhytfvhiuyhjzoeiufouqsygdfoyuFG8Kgv9qmOOH5fsuG4Nvf98wGfD7YTdi03mLvXxzT29t7u"; // Define salt (length=100 for 64 chars hash)
	// Hash user passA
	$userPassAHash = hash("sha256", $pwd . $salt);

	// CHECK passAHash = userPassAHash
	if($pwdConfirm != $userPassAHash) fail($db, $result, "nom d'equipe ou mot de passe invalide.");



	// DB select
    $query = "SELECT t.id, h.idChallenge FROM team AS t JOIN hint AS h ON t.formation = h.formation WHERE t.teamName = '$teamName' AND h.formation = '$formation';";
    $result = $db->query($query);
    $numRows = $result->num_rows;

    // Check
    if ($numRows == 0) fail($db, $result , "Aucun challenge pour votre formation n'a été crée.");

    while ($row = $result->fetch_assoc()) {
        $idTeam = $row['id'];

        for ($idChallenge = 1; $idChallenge <= 10; $idChallenge++) {
            // DB select
            $queryInner = "SELECT idTeam FROM challengeTeam WHERE idTeam = '$idTeam' AND idChallenge = '$idChallenge';";
            $resultInner = $db->query($queryInner);
            $numRowsInner = $resultInner->num_rows;

            // Check
            if ($numRowsInner == 0) {
                // DB insert
                $queryInsert = "INSERT INTO challengeTeam(id, idTeam, idChallenge, isFinish, beginTime) VALUES (NULL,'$idTeam','$idChallenge','2', NOW());";
                if (!$db->query($queryInsert)) {
                    fail($db , NULL , "Aucun challenge pour votre formation n'a été crée.");
                }
            }
        }

        // Data to session
        session_start();
        $_SESSION['teamName'] = $teamName;

        // Data ajax to client
        success($db, $result);
    }
?>

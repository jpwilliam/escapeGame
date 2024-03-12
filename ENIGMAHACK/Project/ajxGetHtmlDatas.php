<?php
    // Include libraries
    include_once("./utils.php");
    include_once("./user.php");

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

    // DB select
    $query = "SELECT id, formation FROM team WHERE teamName='$teamName';";
    $result = $db->query($query);
    $numRows = $result->num_rows;

    // Check
    if ($numRows == 0) fail($db, $result);

    // Data from DB
    while ($row = $result->fetch_assoc()) {
        $idTeam = $row['id'];
        $formation = $row['formation'];
    }
    $result->close();


    // DB select
    $query = "SELECT c.idTeam, c.isFinish, h.idChallenge, h.challengeName, h.hint FROM challengeTeam AS c JOIN team AS t ON c.idTeam = t.id JOIN hint AS h ON c.idChallenge= h.idChallenge WHERE t.teamName = '$teamName' AND h.formation = '$formation' AND c.isFinish = '2' ORDER BY c.isFinish DESC, h.idChallenge ASC LIMIT 1;";
    $result = $db->query($query);
    $numRows = $result->num_rows;

    // Check
    if ($numRows == 0) success($db, $result,"Vous avez gagné !!!!!!!!!!!!!!!!!!");

    // Generate HTML table
   // Generate HTML table
    $html = '<table border="1" class="user"> 
    <tr>
        <th>Challenge Name</th>
        <th>idChallenge</th>
        <th>Hint</th>
    </tr>';

    // Data from DB
    while ($row = $result->fetch_assoc()) {
    $idTeam = $row['idTeam'];
    $isFinish = $row['isFinish'];
    $idChallenge = $row['idChallenge'];
    $challengeName = $row['challengeName'];
    $hint = $row['hint'];

    // Add a new row to the HTML table
    $html .= '<tr>
    <td>'.$challengeName.'</td>
    <td>'.$idChallenge.'</td>
    <td>'.$hint.'</td>
    </tr>';
    }
    $html .= '</table>';


    $result->close();

    // SUCCESS
    success($db, NULL, $html);
?>

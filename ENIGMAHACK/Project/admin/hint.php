<?php
    // Include libraries
    include_once("./utils.php");

    // DB open
    include_once("./dbConfig.php");
    $db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
    $db->set_charset("utf8");

    // DB select
    $query = "SELECT `idChallenge`, `formation`, `hint` FROM `hint`;";
    $result = $db->query($query);
    $numRows = $result->num_rows;

    // CHECK : user exists
    if ($numRows < 1) {
        echo 'Aucun indice entré pour le moment';
    } else {
        // Start building HTML
        $html = '<html><head><title>INDICE</title></head><body>';
        $html .= '<h1>INDICE</h1>';
        $html .= '<table border="1"><tr><th>ID Challenge</th><th>Formation</th><th>Indice</th></tr>';

        // Data from DB
        while ($row = $result->fetch_assoc()) {
            $idChallenge = $row['idChallenge'];
            $formation = $row['formation'];
            $hint = $row['hint'];

            // Add row to HTML table
            $html .= "<tr><td>$idChallenge</td><td>$formation</td><td>$hint</td></tr>";
        }

        // Close HTML tags
        $html .= '</table></body></html>';

        // Output HTML
        echo $html;
    }

    // // Data ajax to client
    // success($db, $result);
?>
<section>
    <ul>
        <li><a href='logout.php'>Déconnexion</a></li>
    </ul>
    <ul>
        <li><a href='main.php'>retour</a></li>
    </ul>
</section>
</div>
</body>
</html>

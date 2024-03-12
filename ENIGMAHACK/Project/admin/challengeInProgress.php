<?php
    // Include libraries
    include_once("./utils.php");

    // DB open
    include_once("./dbConfig.php");
    $db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
    $db->set_charset("utf8");

        // DB select
        $query = "SELECT  idTeam, isFinish, beginTime, endTime FROM `challengeTeam`;";
        $result = $db->query($query);
        $numRows = $result->num_rows;

        // CHECK : user exists
        if ($numRows < 1) {
            echo "Aucun team n'a commencé l'escape game";
        } else {
            // Start building HTML
            $html = '<html><head><title>INDICE</title></head><body>';
            $html .= '<h1>Progression</h1>';
            $html .= '<table border="1"><tr><th>ID Challenge</th><th>Formation</th><th>Indice</th></tr>';

            // Data from DB
            while ($row = $result->fetch_assoc()) {
                $idTeam = $row['idTeam'];	
                $isFinish = $row['isFinish'];	
                $beginTime = $row['beginTime'];
                $endTime = $row['endTime'];

                if ($isFinish == 2){
                    $progress = "en cours";
                }else{
                    $progress = "fini";
                }

                $timeDifference = $endTime - $beginTime;
                // Convertir la différence en minutes (ou d'autres unités si nécessaire)
                $timeDifferenceInMinutes = round($timeDifference / 60);
                // Add row to HTML table
                $html .= "<tr><td>$idTeam</td><td>$progress</td><td>$timeDifferenceInMinutes</td></tr>";
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
        <li><a href='main.php'>retour</a></li>
    </ul>
</section>
</div>
</body>
</html>

<?php
// Data from session
session_start();
$teamName = NULL;
if (isset($_SESSION['teamName'])) $teamName = $_SESSION['teamName'];

// Check
if ($teamName == NULL ) header("Location: logout.php");

?>

<!DOCTYPE html>
<html>
	<!-- Head -->
	<head>
		<!-- CSS files -->
		<link rel='stylesheet' type='text/css' href='./css/web.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='./css/02_fonts.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='./css/03_icons.css' media='screen' />

		<link rel='stylesheet' type='text/css' href='./css/main.css' media='screen' />

		<!-- JS files -->
		<script type='text/javascript' src='./js/jquery-3.7.0.min.js'></script>
		<script type='text/javascript' src='./js/jquery-ui.min.js'></script>
		<!--flag="http://10.122.13.224/ENIGMAHACK/"-->
		<script type='text/javascript' src='./js/web.js'></script>
		<script type='text/javascript' src='./js/ajxAddData.js'></script>
		<script type='text/javascript' src='./js/ajxGetHtmlDatas.js'></script>

		<!-- UTF8 encoding -->
		<meta charset='UTF-8'>

		<!-- Prevent from zooming -->
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0,  shrink-to-fit=no"> -->

		<!-- Icon -->
		<link rel='icon' type='image/png' href='./design/favicon.png' />

		<!-- Title -->
		<title>ENIGMAHACK</title>
	</head>



	<!-- Body -->
	<body>
		<!-- Wrapper -->
		<div class='wrapper'>

			<header>
				<h1 class='typewriter'>ENIGMAHACK</h1>
			</header>

			<section>

				<h1>CodeGuardians - Mission CSG</h1>

				<p>
					Dans un futur proche, la société de cybersécurité renommée "GuardianTech" engage une équipe de hackers éthiques pour tester la robustesse de son nouveau système de sécurité, appelé le "CSG" (Cyber Security Guardian). L'objectif est de repérer les vulnérabilités potentielles avant son déploiement mondial.
				</p>

				<p>
					L'équipe de hackers éthiques, connue sous le nom de "CodeGuardians", se voit confier la mission de localiser et d'extraire des "flags" situés à des emplacements spécifiques dans le système. Ces "flags" sont des marqueurs virtuels représentant des failles potentielles dans la sécurité du CSG. Leur mission consiste à les récupérer sans causer de dommages au système.
				</p>

				<p>
					Les CodeGuardians, composés d'experts en cybersécurité aux compétences variées, se lancent dans cette aventure numérique. Chacun d'entre eux utilise ses compétences uniques pour résoudre des énigmes complexes, contourner des pare-feu sophistiqués et déjouer des mécanismes de sécurité avancés afin de collecter les "flags" nécessaires.
				</p>


				</ul>
			</section>

			<section>
				<h2>Entre le flag</h2>
				<ul>
					<li class='add'>
						<input type='text' name='flag' placeholder='flag' minlength='3' maxlength='100' required/>
						<input type='text' name='idChallenge' placeholder='idChallenge' minlength='0' maxlength='100' required/>
							<button type="button" class = 'add' name='add'>Envoyer</button>
					</li>
				</ul>
				<h2>    Challenge en cours</h2>
				<ul>
					<li class='view'>
					</li>
				</ul>
				<ul>
					<li><a href='logout.php'>Déconnexion</a></li>
				</ul>
			</section>

		</div>
	</body>
</html>

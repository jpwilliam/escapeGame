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
		<link rel='stylesheet' type='text/css' href='../css/web.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='../css/02_fonts.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='../css/03_icons.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='../css/webDesign4.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='../css/main.css' media='screen' />

		<!-- JS files -->
		<script type='text/javascript' src='../js/jquery-3.7.0.min.js'></script>
		<script type='text/javascript' src='../js/jquery-ui.min.js'></script>
		<!-- <script type='text/javascript' src='./js/webDesign4.js'></script> -->
		<script type='text/javascript' src='../js/web.js'></script>
		<script type='text/javascript' src='../js/ajxAddData.js'></script>
		<script type='text/javascript' src='../js/ajxAddHint.js'></script>
		<script type='text/javascript' src='../js/ajxGetHtmlDatas.js'></script>

		<!-- UTF8 encoding -->
		<meta charset='UTF-8'>

		<!-- Prevent from zooming -->
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0,  shrink-to-fit=no"> -->

		<!-- Icon -->
		<link rel='icon' type='image/png' href='../design/favicon.png' />

		<!-- Title -->
		<title>ENIGMAHACK</title>
	</head>
	<nav>
		<section>
		<ul>
			<li><a href='hint.php'>indice</a></li>
			<li><a href='challengeInProgress.php'>progress</a></li>
		</ul>
		</section>
	</nav>
	


	<!-- Body -->
	<body>
		<!-- Wrapper -->
		<div class='wrapper'>

			<section>
				<h1 class='typewriter'>ENIGMAHACK</h1>
			</section>

			<section>
				<h2>Ajout</h2>
				<ul>
					<li class='add'>
							<input type='text' name='idChallenge' placeholder='idChallenge' minlength='0' maxlength='100' required/>
							<input type='text' name='flag' class='dataToAdd' placeholder='flags' maxlength='1000' required/>
							<button type="button" class = 'add' name='add'>Ajouter</button>
					</li>
				</ul>
				<h2>Ajout indice</h2>
				<ul>
					<li class='addHint'>
							<input type='text' name='idChallengeH' placeholder='idChallenge' minlength='0' maxlength='100' required/>
							<input type='text' name='hint' class='hintToAdd' placeholder='indice' maxlength='1000' required/>
							<input type='text' name='challengeName' class='challengeName' placeholder='challengeName' maxlength='1000' required/>
							<input type='text' name='formation' class='formation' placeholder='formation' maxlength='1000' required/>
							<button type="button" class = 'addHint' name='addHint'>Ajouter</button>
					</li>
				</ul>

			</section>





			<section>
				<ul>
					<li><a href='logout.php'>Déconnexion</a></li>
				</ul>
			</section>

		</div>
	</body>
</html>

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
		<!-- <script flag='H7mL_I5_N0t3_53cUR3!!!'></script> -->
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
				<h2>Secret</h2>
				<img src="./design/rebus_1705597159.png">
					<li><a href='logout.php'>Déconnexion</a></li>
				</ul>
			</section>

		</div>
	</body>
</html>

<!DOCTYPE html>

<html>
	<!-- Head -->
	<head>
		<!-- CSS files -->
		<link rel='stylesheet' type='text/css' href='./css/web.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='./css/02_fonts.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='./css/03_icons.css' media='screen' />


		<!-- JS files -->
		<script type='text/javascript' src='./js/jquery-3.7.0.min.js'></script>
		<script type='text/javascript' src='./js/jquery-ui.min.js'></script>
		<script type='text/javascript' src='./js/webDesign4.js'></script>
		<script type='text/javascript' src='./js/ajxCheckIdA.js'></script>
		<script type='text/javascript' src='./js/ajxAddUser.js'></script>
		<script type='text/javascript' src='./js/web.js'></script>

		<!-- UTF8 encoding -->
		<meta charset='UTF-8'>

		<!-- Prevent from zooming -->
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0,  shrink-to-fit=no"> -->

		<!-- Icon -->
		<link rel='icon' type='image/png' href='./design/favicon.png' />

		<!-- Title -->
		<title>DataSec</title>
	</head>



	<!-- Body -->
	<body>
		<!-- Wrapper -->
		<div class='wrapper'>

			<header>
				<h1 class='typewriter'>Ajout d'utilisateur</h1>
			</header>


			<section>


				<ul>
					<li><input type='text' name='teamName' placeholder="Nom de l'équipe" pattern='.{15}' maxlength=15 required autofocus/></li>
					<li><input type='text' name='formation' placeholder='LYCEE' pattern='.{0,4}' required/></li>
					<li><input type='password' name='pwd' placeholder='Mot de passe' pattern='.{3,30}' required/></li>
					<li><input type='password' name='pwdConfirm' placeholder='Confirmation du mot de passe' pattern='.{3,30}' required/></li>
					<li><input type='submit' value='OK'/></li>
				</ul>

			</section>

			<nav>
				<ul>
					<li><a href='index.php'>Retour</a></li>
				</ul>
			</nav>



		</div>
	</body>
</html>

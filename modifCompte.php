<?php
	require_once('Fonction/connectToBdd.php');
	$log = true;
	$login = $_COOKIE['cookies_log'];
	$mdp = $_COOKIE['cookies_mdp'];
	$personne = login($bdd,$login, $mdp);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>WebTeck</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>
		<!-- Header -->
			<header id="header" class="alt">
				<h1><a href="index.php">WebTeck</a></h1>
				<a href="#nav">Menu</a>
			</header>

		<!-- Nav -->
		<?php require_once("nav.php") ?>

		<!-- Contact -->
		<section id="four" class="wrapper special">
			<div class="inner">
				<header class="major narrow">
					<h2>Modification de compte</h2>
					<p>Vous pouvez modifier les informations sur votre compte</p>
				</header>

				<p>Vous êtes <?php echo $personne[0];?></p>
				<form method="POST" href="#">
					<div class="container 75%">
						<div class="row uniform 50%">
							<div class="6u 12u$(xsmall)">
								<input name="nom" placeholder="Nom" type="text" value="<?php echo $personne[1];?>"/>
							</div>
							<div class="6u 12u$(xsmall)">
								<input name="Prenom" placeholder="Prenom" type="text" value="<?php echo $personne[2];?>"/>
							</div>
						</div>
					</div>
					<ul class="actions">
						<li><input type="submit" class="special" value="Envoyer" /></li>
						<li><input type="reset" class="alt" value="Réinitialiser" /></li>
					</ul>
				</form>
			</div>
		</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
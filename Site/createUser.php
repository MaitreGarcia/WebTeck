<?php
	require_once('Fonction/connectToBdd.php');
	$log = false;
 	if(isset($_POST['login']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mdp']) && isset($_POST['email']) && isset($_POST['statut']))
 	{
 	 	$login = $_POST['login'];
 		$nom = $_POST['nom'];
 		$prenom = $_POST['prenom'];
 		$mdp =  $_POST['mdp'];
 		$email =  $_POST['email'];
 		$status = $_POST['statut'];

 		createUser($bdd,$login,$nom,$prenom,$mdp,$email,$status);
 		header('Location: Connexion.php');
 	}
 	else
 	{

 	}
?>
<HTML>
	<head>
		<title>WebTeck</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="../assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="../assets/css/ie9.css" /><![endif]-->
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
					<h2>Se connecter</h2>
					<p>Créez vous un compte pour pouvoir demander ou proposé de l'aide</p>
				</header>
				<form method="post" action="createUser.php">
					<div class="container 75%">
						<div class="row uniform 50%">
							<div class="6u 12u$(xsmall)">
								<input name="nom" placeholder="Nom" type="text" />
							</div>
							<div class="6u 12u$(xsmall)">
								<input name="prenom" placeholder="Prénom" type="text" />
							</div>
							<div class="6u 12u$(xsmall)">
								<input name="login" placeholder="Identifiant" type="text" />
							</div>
							<div class="6u 12u$(xsmall)">
								<input name="email" placeholder="Email" type="email" />
							</div>
							<div class="6u 12u$(xsmall)">
								<input name="mdp" placeholder="Mot de passe" type="password" />
							</div>
							<div class="6u 12u$(xsmall)">
								<select name="statut" placeholder="Statut" />
									<option>
										Demandeur
									</option>
									<option>
										Bienfaiteur
									</option>
								</select>
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
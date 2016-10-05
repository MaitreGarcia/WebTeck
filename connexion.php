<?php
	require_once('Fonction/connectToBdd.php');
	$log = false;
	$fail = false;

	if(isset($_POST['login']) && isset($_POST['mdp']))
	{
		$login = $_POST['login'];
		$mdp = $_POST['mdp'];

		//On recupere la personne en BDD, si il n'y as personne, la fonction login renvoi Null	
		$personne = login($bdd,$login, $mdp);


		//Du coup on test si la fonction est null 
		if($personne != null)
		{
			//On crée les cookies pur facilité l'utilisation
			setcookie('cookies_log',$login,time() + 365 * 24 * 3600, null, null, false, true);
 			setcookie('cookies_mdp',$mdp,time() + 365 * 24 * 3600, null, null, false, true);
 			header('Location: index.php');
		}
		else
		{
			$fail = true;
		}
	}
	else
	{

	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php require_once('Modules/head.php') ?>
	</head>
	<body>

		<!-- Header -->
		<?php require_once('Modules/header.php') ?>

		<!-- Nav -->
		<?php require_once("nav.php") ?>

		<!-- Contact -->
		<section id="four" class="wrapper special">
			<div class="inner">
				<header class="major narrow">
					<h2>Connexion</h2>
					<p>Pour vous connecter, veuillez remplir les champs ci-dessous avec vos identifiants</p>
					<?php
						if($fail)
						{
							echo '<p style="color:red">Login ou mot de passe incorrect</p>';
						}
					?>
				</header>
				<form method="POST" href="#">
					<div class="container 75%">
						<div class="row uniform 50%">
							<div class="6u 12u$(xsmall)">
								<input name="login" placeholder="Identifiant" type="text" />
							</div>
							<div class="6u 12u$(xsmall)">
								<input name="mdp" placeholder="Mot de passe" type="password" />
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
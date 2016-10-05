<?php
	require_once('Fonction/connectToBdd.php');
	$log = true;
	$login = $_COOKIE['cookies_log'];
	$mdp = $_COOKIE['cookies_mdp'];
	$personne = login($bdd,$login, $mdp);
	$error = false;

	if(isset($_POST['categorie']) && isset($_POST['titre']) && isset($_POST['prix']) && isset($_POST['annonce']))
	{
		$categorie = $_POST['categorie'];
		$titre = $_POST['titre'];
		$prix = $_POST['prix'];
		$annonce = $_POST['annonce'];

		if(!insertAnnonce($bdd,$login,$annonce,$titre,$categorie,$prix))
		{
			header('Location: index.php');
		}
		else
		{
			header('Location: index.php');
			$error = true;
		}
 			
 			
	}
?>
<HTML>
	<head>
		<?php require_once("Modules/head.php") ?>
	</head>
	<body>

		<!-- Header -->
		<?php require_once("Modules/header.php") ?> 

		<!-- Nav -->
		<?php require_once("nav.php") ?>

		<!-- Contact -->
		<section id="four" class="wrapper special">
			<div class="inner">
				<header class="major narrow">
					<h2>Création d'annonce</h2>
					<p>Créez une annonce pour recevoir de l'aide</p>
				</header>
				<form method="post" action="creationAnnonce.php">
					<div class="container 75%">
						<div class="row uniform 50%">
							<div class="12u 12u$(xsmall)">
								<input name="titre" placeholder="Titre" type="text" />
							</div>
							<div class="6u 12u$(xsmall)">
								<select name="categorie"/>
									<option>Séléctionnez votre catégorie</option>
									<option>Tache menagères</option>
									<option>Courses</option>
									<option>Jardinage</option>
									<option>Informatique</option>
									<option>Santé</option>
								</select>
							</div>
							<div class="6u 12u$(xsmall)">
								<input name="prix" placeholder="Prix" type="text"/>
							</div>
							<div class="12u 12u$(xsmall)">
								<textarea name="annonce" id="editor1" rows="70" cols="80">
					       		</textarea>
					       	</div>	 

					        <script>
			                    CKEDITOR.editorConfig = function( config )
			                    {
			                        // misc options
			                        config.height = '350px';
			                    };
					            CKEDITOR.replace('editor1');
					        </script>
						</div>
					</div>
					<ul class="actions">
						<li><input type="submit" class="special" value="Envoyer" /></li>
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
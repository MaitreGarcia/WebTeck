<?php 
	require_once("Fonction/connectToBdd.php");

	//On regarde si jamais il y as des cookies
	if(isset($_COOKIE['cookies_log']) && isset($_COOKIE['cookies_mdp']))
	{
		$log;
		$personne = login($bdd,$_COOKIE['cookies_log'],$_COOKIE['cookies_mdp']);
		if($personne == null)
		{
			$log = false;
			echo $log;
		}
		else
		{
			$log = true;
		}	
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<?php require_once("Modules/head.php") ?>
	</head>
	<body class="landing">

		<!-- Header -->
		<?php require_once("Modules/header.php") ?>

		<!-- Nav -->
		<?php require_once("nav.php") ?>

		<!-- Two -->
		<section id="two" class="wrapper special">
			<div class="inner">
				<header class="major narrow">
					<h2>HELPenior</h2>
					<?php 
						if($log)
						{
							echo '<p>Bonjour '. $personne[2] .'</p>';
						}
						else
						{
							echo '<p>Site d\'annonces pour le troisième âge</p>';
						}
					?>
					
				</header>
				<?php
				if($log)
				{
					?>
					<div class="image-grid">
						<a href="creationAnnonce.php" class="image"><img src="images/pic04.png" alt="" /></a>
						<a href="#" class="image"><img src="images/pic05.png" alt="" /></a>
						<a href="#" class="image"><img src="images/pic06.png" alt="" /></a>
						<a href="#" class="image"><img src="images/pic07.png" alt="" /></a>
					</div>
					<?php
				}
				else
				{
					echo '<p>Site d\'annonces pour le troisième âge</p>';
				}
				?>
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
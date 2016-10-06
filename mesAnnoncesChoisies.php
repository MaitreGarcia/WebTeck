<?php
	require_once('Fonction/connectToBdd.php');
	$log = true;
	$login = $_COOKIE['cookies_log'];
	$mdp = $_COOKIE['cookies_mdp'];
	$personne = login($bdd,$login, $mdp);
?>
<HTML>
	<head>
		<?php require_once("Modules/head.php") ?>
	</head>
	<body>

		<!-- Header -->
		<?php require_once("Modules/header.php") ?> 

		<!-- Nav -->
		<?php
			if($log)
			{
				require_once("Modules/MenuLog.php");
			}
			else
			{
				require_once("Modules/MenuNonLog.php");
			}
		?>


		<!-- Contact -->
		<section id="four" class="wrapper special">
			<div class="inner">
				<header class="major narrow">
					<h2>Mes annonces</h2>
					<p>Les annonces que j'ai choisi</p>
					<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Retour à l'accueil</a>
				</header>
				<?php 
					$annonces = allBienfaiteurs($bdd,$login);
					
					for($i=0; $i < count($annonces) ; $i++)
					{
						echo '<h4><a class="btn" data-popup-open="popup-'.$i.'annonce" href="#">'.$annonces[$i][0].'</a></h4>';
					}

					//On crée le corps des popups
					for($i=0; $i < count($annonces); $i++)
					{
						echo '<div class="popup" data-popup="popup-'.$i.'annonce">';
						echo '<div class="popup-inner">';
						echo '<h3>'.$annonces[$i][0];
						echo '<a href="annulationAnnonce.php?id='.$annonces[$i][4].'" class="annulation"><i class="fa fa-times-circle" aria-hidden="true"></i>
 Je ne veux plus</a></h3>';
						echo '<h4>Catégorie : '.$annonces[$i][2].'</h4>';
						echo '<div class="Encadrement">';
						echo '<p>'.$annonces[$i][1].'</p>';
						echo '</div>';
						echo '<a data-popup-close="popup-'.$i.'annonce" href="#" class="btnClose">Close</a>';
						echo '<a class="popup-close" data-popup-close="popup-'.$i.'annonce" href="#">x</a>';
						echo '</div></div>';
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
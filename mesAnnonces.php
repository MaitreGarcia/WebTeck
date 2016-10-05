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
		<?php require_once("nav.php") ?>

		<!-- Contact -->
		<section id="four" class="wrapper special">
			<div class="inner">
				<header class="major narrow">
					<h2>Mes annonces</h2>
					<p>Visualisez vos différentes demandes, <?php echo $personne[0] ?></p>
				</header>
				<?php 
					$annonces = annoncesSelonUtilistateur($bdd,$personne[0]);
					
					for($i=0; $i < count($annonces); $i++)
					{
						echo '<p><a class="btn" data-popup-open="popup-'.$i.'annonce" href="#">'.$annonces[$i][0].'</a></p>';
					}

					//On crée le corps des popups
					for($i=0; $i < count($annonces); $i++)
					{
						echo '<div class="popup" data-popup="popup-'.$i.'annonce">';
						echo '<div class="popup-inner">';
						echo '<h3>'.$annonces[$i][0].'</h3>';
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
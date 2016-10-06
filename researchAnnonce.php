<?php
	require_once('Fonction/connectToBdd.php');
	session_start();
	if(isset($_SESSION['login']))
	{
		$login = $_SESSION['login'];
		$personne = recupPersonne($bdd,$login);
		$error = false;
		$log = true;
	}
	else
	{
		header('Location: connexion.php');
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
					<h2>Recherche d'annonce</h2>
					<p>Visualisez les demandes des autres utilisateurs</p>
					<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Retour à l'accueil</a>
				</header>
				<?php 
					$annoncesInformatique = allAnnonceInformatique($bdd);
					$annoncesMenage = allAnnonceMenage($bdd);
					$annoncesJardin = allAnnonceJardin($bdd);

				?>

				<div class="container 100%">
					<div class="6cu 12u$(xsmall)">
					<h3 class="groupe" id='menage'><i class="fa fa-paint-brush" aria-hidden="true"></i> Tache menagères</h3>
						<ul>
							<?php
								for($i=0; $i < count($annoncesMenage) ; $i++)
								{
									echo '<h4><a class="btn" data-popup-open="popup-menage'.$i.'annonce" href="#">- '.$annoncesMenage[$i][0].'</a></h4>';
								}
							?>
						</ul>
					</div>
					<div class="6cu 12u$(xsmall)">
					<h3 class="groupe" id='informatique'><i class="fa fa-laptop" aria-hidden="true"></i> Informatique</h3>
				<div class="informatique">
					<ul>
						<?php
							for($i=0; $i < count($annoncesInformatique) ; $i++)
							{
								echo '<h4><a class="btn" data-popup-open="popup-info'.$i.'annonce" href="#">- '.$annoncesInformatique[$i][0].'</a></h4>';
							}
						?>
					</ul>
				</div>

				</div>

				
				<div class="menage">

				</div>


				
				




				<!-- Les annonces informatiques -->
				<?php
					//On crée le corps des popups
					for($i=0; $i < count($annoncesInformatique); $i++)
					{
						echo '<div class="popup" data-popup="popup-info'.$i.'annonce">';
						echo '<div class="popup-inner">';
						echo '<h3>'.$annoncesInformatique[$i][0];
						echo '<a href="chooseAnnonce.php?id='.$annoncesInformatique[$i][4].'" class="add"><i class="fa fa-plus-circle" aria-hidden="true"></i> Choisir cette annonce</a></h3>';
						echo '<h4>Catégorie : '.$annoncesInformatique[$i][2].'</h4>';
						echo '<div class="Encadrement">';
						echo '<p>'.$annoncesInformatique[$i][1].'</p>';
						echo '</div>';
						echo '<a data-popup-close="popup-info'.$i.'annonce" href="#" class="btnClose">Close</a>';
						echo '<a class="popup-close" data-popup-close="popup-info'.$i.'annonce" href="#">x</a>';
						echo '</div></div>';
					}
				?>

				<!-- Les annonces Menages -->
				<?php
					//On crée le corps des popups
					for($i=0; $i < count($annoncesMenage); $i++)
					{
						echo '<div class="popup" data-popup="popup-menage'.$i.'annonce">';
						echo '<div class="popup-inner">';
						echo '<h3>'.$annoncesMenage[$i][0];
						echo '<a href="chooseAnnonce.php?id='.$annoncesMenage[$i][4].'" class="add"><i class="fa fa-plus-circle" aria-hidden="true"></i> Choisir cette annonce</a></h3>';
						echo '<h4>Catégorie : '.$annoncesMenage[$i][2].'</h4>';
						echo '<div class="Encadrement">';
						echo '<p>'.$annoncesMenage[$i][1].'</p>';
						echo '</div>';
						echo '<a data-popup-close="popup-menage'.$i.'annonce" href="#" class="btnClose">Close</a>';
						echo '<a class="popup-close" data-popup-close="popup-menage'.$i.'annonce" href="#">x</a>';
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
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
<HTML xmlns="http://www.w3.org/1999/html">
	<head>
		<?php require_once("Modules/head.php") ?>
	</head>
	<body class="landing">
		<div id="main">

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
						<h2>À propos de nous</h2>
						<h3>Helpenior c’est quoi ?</h3>
						<br>
						<p>
							Helpenior est le premier site d’entraide destiné au troisième âge et propose ses services
							principalement aux seniors. L’objectif étant de :
						</p>
						<hr/><p>les sortir de leur solitude ; <hr/></p>
						<p>les aider dans leurs tâches quotidiennes ;<hr/></p>
						<p>de les mettre en relation avec des bienfaiteurs qui leurs apportent leurs services au quotidien
							et à n’importe qu’elle moment.<hr/>
						</p>

						<br>
						<h3>Pourquoi choisir Helpenior ?</h3>
						<br>
						<p>
							Le sens du service et la priorité de notre site, les utilisateurs doivent s’y sentir à l’aise.
							Le site a été fait spécialement pour les personnes âgées avec des fonctionnalités simples et
							des caractères assez gros. L’ergonomie et la responsivité du site font qu’il peut être consulté
							sur toutes les plateformes.
						</p>
						<br>
						<h3>L’équipe d’Helpenior</h3>
						<br>

						<br>
						<p>Yvon Abale – chef de projet</p>
						<p>Guillaume Rodier – Développeur Front</p>
						<p>Léo Garcia Canelo – Développeur Back</p>
						<p>Idriss Drame – Responsable Marketing</p>

						<hr/>

						<a href="index.php" class="button special big"><i class="fa fa-home" aria-hidden="true"></i> Retour à l'accueil</a>
					</header>
				</div>
			</section>

			<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
		</div>
	</body>
	<!-- Footer -->
	<?php require_once("Modules/footer.php") ?>
</html>
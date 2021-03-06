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
<!DOCTYPE HTML>
<html>
	<head>
		<?php require_once('Modules/head.php') ?>
	</head>
	<body class="landing">
		<div id="main">
			<!-- Header -->
			<?php require_once('Modules/header.php') ?>

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
			<!-- Footer -->
		</div>s

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>

	<?php require_once("Modules/footer.php") ?>
</html>
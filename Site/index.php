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
		<title>WebTeck</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<h1><a href="index.php">WebTeck</a></h1>
				<a href="#nav">Menu</a>
			</header>

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
				<div class="image-grid">
					<a href="#" class="image"><img src="images/pic03.jpg" alt="" /></a>
					<a href="#" class="image"><img src="images/pic04.jpg" alt="" /></a>
					<a href="#" class="image"><img src="images/pic05.jpg" alt="" /></a>
					<a href="#" class="image"><img src="images/pic06.jpg" alt="" /></a>
					<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
					<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
					<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
					<a href="#" class="image"><img src="images/pic10.jpg" alt="" /></a>
				</div>
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
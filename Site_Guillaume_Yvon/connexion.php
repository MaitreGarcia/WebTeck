<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Generic - Retrospect by TEMPLATED</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<h1><a href="index.html">WebTeck</a></h1>
				<!--<a href="#nav">Menu</a>-->
			</header>

		<!-- Contact -->
		<section id="four" class="wrapper special">
			<div class="inner">
				<header class="major narrow">
					<h2>Connexion</h2>
					<p>Pour vous connecter, veuillez remplir les champs ci-dessous avec vos identifiants</p>
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


						<!-- Définition des cookies -->
						<?php
						session_start();
						if (!isset($_SESSION['login'])) {
							header ('Location: index.php');
							exit();
						}
						?>
					</div>

					<ul class="actions">
						<li><input type="submit" class="special" value="Envoyer" /></li>
						<li><input type="reset" class="alt" value="Réinitialiser" /></li>
					</ul>
				</form>
			</div>
		</section>

		<!-- Footer -->
			<footer id="footer">
				<!--<div class="inner">
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook">
							<span class="label">Facebook</span>
						</a></li>
						<li><a href="#" class="icon fa-twitter">
							<span class="label">Twitter</span>
						</a></li>
						<li><a href="#" class="icon fa-instagram">
							<span class="label">Instagram</span>
						</a></li>
						<li><a href="#" class="icon fa-linkedin">
							<span class="label">LinkedIn</span>
						</a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled.</li>
						<li>Images: <a href="http://unsplash.com">Unsplash</a>.</li>
						<li>Design: <a href="http://templated.co">TEMPLATED</a>.</li>
					</ul>
				</div>-->
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
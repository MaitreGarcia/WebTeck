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


		<!-- Two -->
		<?php
			if($log)
			{
				require_once("Modules/bodyLog.php");
			}
			else
			{
				require_once("Modules/bodyNonLog.php");
			}
		?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
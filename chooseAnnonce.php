<?php 
	require_once('Fonction/connectToBdd.php');
	if(isset($_GET['id']))
	{
	  	$id = $_GET['id'];
	  	$login = $_COOKIE['cookies_log'];
	  	chooseAnnonce($bdd,$login,$id);
	  	header('Location: mesAnnoncesChoisies.php');
	}
?>
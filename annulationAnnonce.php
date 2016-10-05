<?php 
	require_once('Fonction/connectToBdd.php');
	if(isset($_GET['id']))
	{
	  	$id = $_GET['id'];
	  	$login = $_COOKIE['cookies_log'];
	  	annulationAnnonce($bdd,$id);
	  	header('Location: mesAnnoncesChoisies.php');
	}
?>
<?php 
	require_once('Fonction/connectToBdd.php');
	if(isset($_GET['id']))
	{
	  	$id = $_GET['id'];
	  	$login = $_SESSION['login'];
	  	chooseAnnonce($bdd,$login,$id);
	  	header('Location: mesAnnoncesChoisies.php');
	}
?>
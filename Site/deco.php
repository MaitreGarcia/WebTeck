<?php 
	setcookie('cookies_log',' ',time() + 365 * 24 * 3600, null, null, false, true);
	setcookie('cookies_mdp',' ',time() + 365 * 24 * 3600, null, null, false, true);
	header('Location: index.php');
?>
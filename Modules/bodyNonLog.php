<section id="two" class="wrapper special">
	<div class="inner">
		<header class="major narrow">
			<h2>HELPenior</h2>
			<?php 
				if($log)
				{
					echo '<p>Bienvenue, '. $personne[0] .'</p>';
				}
			?>
		</header>
		<div class="image-grid2">
			<a href="connexion.php" class="image"><img src="images/seCo.png" alt="" /></a>
			<a href="createUser.php" class="image"><img src="images/createAccount.png" alt="" /></a>
		</div>
	</div>
</section>
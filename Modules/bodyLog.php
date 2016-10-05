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
		<?php 

			if($personne[4] == "Demandeur")
			{ //Quand la personne est un demandeur
				echo '<div class="image-grid2">';
				echo '<a href="creationAnnonce.php" class="image"><img src="images/postAnnonce.png" alt="" /></a>';
				echo '<a href="mesAnnonces.php" class="image"><img src="images/myAnnonce.png" alt="" /></a>';
				echo '<a href="demandeAide.php" class="image"><img src="images/help.png" alt="" /></a>';
				echo '<a href="deco.php" class="image"><img src="images/deco.png" alt="" /></a>';
				echo '</div>';
			}
			else
			{ //Quand la personne est un  bienfaiteur
				echo '<div class="image-grid2" algin="center">';
				echo '<a href="researchAnnonce.php" class="image"><img src="images/research.png" alt="" /></a>';
				echo '<a href="deco.php" class="image"><img src="images/deco.png" alt="" /></a>';
				echo '</div>';
			}
		?>
	</div>
</section>
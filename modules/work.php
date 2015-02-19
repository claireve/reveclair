<?php //content modules should not be accessed directly through a URL since they would then lack the HTML Template

//we'll see if a constant is defined (which should be included first thing in the index file, prior to including this page)
if (!defined('BASE_URL'))
{
  require('../includes/config.inc.php');
  $url = BASE_URL . 'work.php';
  header("Location:$url");
  exit;
}
 ?>
<div class="row">
	<div class="large-12 columns">
		<ul class="example-orbit" data-orbit>
			<li>
				<img src="ressources/images/ab.png" alt="slide 1" />
				<div class="orbit-caption"><h3>Site de recettes <small>olive-et-pistache.com</small></h3>
					<p>Construit sous Symfony 2.3, ce site permet de présenter une galerie de produits, avec une vente
						en ligne possible. Pour le gérant, le site permet aussi de gérer sa comptabilité avec diverses extractions possibles des données.
				</p>
				</div>
			</li>
			<li>
				<img src="ressources/images/op.png" alt="slide 1" />
				<div class="orbit-caption"><h3>Site de recettes <small>olive-et-pistache.com</small></h3>
					<p>Construit sous Symfony 2.3, ce site permet de trier et de chercher rapidement des recettes
					 selon des critères variés. Les informations nutritionnelles de chaque recette sont mises à jour avec la technologie Ajax.
					  Par ailleurs, pour l'administrateur du site, l'ajout de recettes se fait via une interface admin
						graphique et épurée.
				</p>
				</div>
			</li>
			<li class="active">
				<img src="ressources/images/vo.png" alt="slide 2" />
				<div class="orbit-caption"><h3>Showroom vélos <small>velo-occaz.com</small></h3>
				<p>Construit sous Django 1.7 (Python 3), ce site est un showroom agréable, rapide et simple à parcourir pour le client. 
					Les nombreuses photos se chargent rapidement grâce à l'utilisation d'Ajax.</p>
				</div>
			</li>
			<li>
				<img src="ressources/images/pot.png" alt="slide 3" />
				<div class="orbit-caption"><h3>Site d'information sur le potager <small>potager-et-co.fr</small></h3>
				<p>Construit avec Django 1.6.5</p>
				</div>
			</li>
		</ul>
	</div>
</div>
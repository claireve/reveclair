<?php //content modules should not be accessed directly through a URL since they would then lack the HTML Template

//we'll see if a constant is defined (which should be included first thing in the index file, prior to including this page)
if (!defined('BASE_URL'))
{
  require('../includes/config.inc.php');
  $url = BASE_URL . 'content.php';
  header("Location:$url");
  exit;
}
 ?>
<div class="row">
	<div class="large-12 columns">
		<div class="hide-for-small">
			<div id="featured">
				<h1 style="text-align:center;">Des sites modernes, propres et robustes. 
					<?php if (isset($_SESSION['email'])) {print '<p>Hello, ' . $_SESSION['email'] . '!</p>'; } ?></h1>
				<p><b>Créer</b> des sites propres correspondant à vos besoins selon les technologies et méthodes actuelles
				 les plus éprouvées : méthode de développement AGILE avec tests et mise en production rapide, frameworks Symfony 2 ou Django.</p>
			</div>
		</div> 
		<div class="row">
			<div class="small-12 show-for-small"><br>
				<img src="http://placehold.it/1000x600&amp;text=For%20Small%20Screens"></div>
		</div> 
	</div>
</div>
<div class="row">
	<div class="large-12 columns">
		<div class="row">
			<div class="large-3 small-6 columns">
				<img src="ressources/images/vo.png">
				<h6 class="panel radius">E-commerce pour vélos vintage</h6>
			</div>
			<div class="large-3 small-6 columns">
				<img src="ressources/images/ab.png">
				<h6 class="panel radius">E-commerce pour objets de luxe et oeuvres d'art</h6>
			</div>
			<div class="large-3 small-6 columns">
				<img src="ressources/images/op.png">
				<h6 class="panel radius">Site de cuisine</h6>
			</div>
			<div class="large-3 small-6 columns">
				<img src="ressources/images/pot.png">
				<h6 class="panel radius">Blog sur le potager</h6>
			</div> 
		</div>
	</div>
</div>

<div class="row">
	<div class="large-12 columns">
		<div class="row">
			<div class="large-8 columns ">
				<div class="panel radius border-panel">
					<div class="row">
						<div class="large-6 small-6 columns">
							<h4>Notre petite entreprise</h4>
							<hr>
							<p>Après des études à Centrale et Polytechnique et diverses expériences, nous (Claire et Victor) avons décidé de travailler à notre compte. <br/>
							Nous sommes maintenant un bureau indépendant de création de sites Web et nouvellement d'application iOS.
							Notre philosophie est de combiner la technique et le design pour une expérience utilsateur agréable et rapide et pour l'entreprise
							 de la performance.
							</p>
							<div class="show-for-small" style="text-align: center">
							<a class="small radius button" href="#">Contactez nous !</a><br>
							<a class="small radius button" href="#">Contactez nous !</a>
							</div>
						</div>
						<div class="large-6 small-6 columns">
							<p><b>Pourquoi travailler avec nous ?</b><br/>Vous avez besoin de créer un site facilement modulable pour représenter votre travail
						 ou gérer des données (type galerie de produits, recettes, articles ...) autrement qu'avec une simple plateforme de blog. Nous avons une passion commune pour l'informatique 
						 et une forte sensibilité pour la recherche de la solution la plus adaptée à un problème donné. 
						 Notre petite structure nous permet d'être très réactif, de faire un seul projet à la fois, de nous focaliser sur sa qualité et donc de le faire bien.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="large-4 columns hide-for-small">
				<div class="panel radius">
					<h4>Nos compétences</h4>
					<ul>
						<li>Programmation web et iOS</li>
						<li>Graphisme</li>
						<li>Management de projet</li>
						<li>Maintenance et administration</li>
					</ul>
<!-- 					<div class="row">
					  <div class="small-9 large-centered columns">
					  	<a href="#" data-reveal-id="firstModal" class="radius button">Plus de détails</a>
					  </div>
					</div> -->
				</div>
				<a href="/contact">
					<div class="panel radius callout" style="text-align: center">
						<strong>Contactez nous !</strong>
					</div>
				</a>
			</div> 
		</div>
	</div>
</div> 
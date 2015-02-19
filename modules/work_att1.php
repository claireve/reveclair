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
	<div class="large-10 columns">
		<h1>Notre travail</h1>

<div class="row">
	<div class="large-8 columns">
		<img src="ressources/images/op.png" alt="slide 1" />
		<div class="panel">
			<h3>Site de recettes <small>olive-et-pistache.com</small></h3>
			<p>Construit sous Symfony 2.3, ce site permet de trier et de chercher rapidement des recettes
			 selon des critères variés. Les informations nutritionnelles de chaque recette sont mises à jour avec la technologie Ajax.
			  Par ailleurs, pour l'administrateur du site, l'ajout de recettes se fait via une interface admin
				graphique et épurée.</p>
		</div>
	</div>
	<div class="large-4 columns">
		<div class="panel">
			<h3>Technologies utilisées</h3>
			<ul>
				<li>Symfony 2.3</li>
				<li>Ajax</li>
				<li>SOLR</li>
			</ul>
		</div>
		<div class="panel">
			<h3>Marketing</h3>
			<ul>
				<li>Twitter API</li>
				<li>Facebook API</li>
				<li>Instagram</li>
			</ul>
		</div>
	</div>
</div>
<hr/>
<div class="row">
	<div class="large-8 columns">
		<img src="ressources/images/vo.png" />
		<div class="panel">
			<h3>Showroom vélos <small>velo-occaz.com</small></h3>
			<p>Construit sous Symfony 2.3, ce site est un showroom agréable, rapide et simple à parcourir pour le client. 
				Les nombreuses photos se chargent rapidement grâce à l'utilisation d'Ajax.</p>
		</div>
		<div class="panel">
			<h3>Marketing</h3>
			<ul>
				<li>Twitter API</li>
				<li>Facebook API</li>
				<li>Instagram</li>
			</ul>
		</div>

	</div>
	<div class="large-4 columns">
		<div class="panel">
			<h3>Technologies utilisées</h3>
			<ul>
				<li>Symfony 2.3</li>
				<li>Ajax</li>
				<li>SOLR</li>
			</ul>
		</div>
			<div class="panel">
				<h3>( Autres livrables )</h3>
				<img src="ressources/images/vo_crtevisite.png" alt="slide 1" />
			</div>


	</div>

</div>
<hr/>

<div class="row">
	<div class="large-8 columns">
		<img src="ressources/images/ab.png" alt="slide 1" />
		<div class="panel">
			<h3>Site de recettes <small>olive-et-pistache.com</small></h3>
			<p>Construit sous Symfony 2.3, ce site permet de trier et de chercher rapidement des recettes
			 selon des critères variés. Les informations nutritionnelles de chaque recette sont mises à jour avec la technologie Ajax.
			  Par ailleurs, pour l'administrateur du site, l'ajout de recettes se fait via une interface admin
				graphique et épurée.</p>
		</div>
		<div class="panel">
			<h3>Marketing</h3>
			<ul>
				<li>Twitter API</li>
				<li>Facebook API</li>
				<li>Instagram</li>
			</ul>
		</div>

	</div>
	<div class="large-4 columns">
		<div class="panel">
			<h3>Technologies utilisées</h3>
			<ul>
				<li>Symfony 2.3</li>
				<li>Ajax</li>
				<li>SOLR</li>
			</ul>
		</div>
			<div class="panel">
				<h3>( Autres livrables )</h3>
				<img src="ressources/images/ab_crtevisite.png" alt="slide 1" />
			</div>


	</div>
	
</div>

<div class="row">
	<div class="large-8 columns">
		<img src="ressources/images/pot.png" alt="slide 1" />
		<div class="panel">
			<h3>Blog sur le jardinage<small>potager-et-co.fr</small></h3>
			<p>Construit sous Wordpress, ce site permet de trier et de chercher rapidement des recettes
			 selon des critères variés. Les informations nutritionnelles de chaque recette sont mises à jour avec la technologie Ajax.
			  Par ailleurs, pour l'administrateur du site, l'ajout de recettes se fait via une interface admin
				graphique et épurée.</p>
		</div>
	</div>
	<div class="large-4 columns">
		<div class="panel">
			<h3>Technologies utilisées</h3>
			<ul>
				<li>Symfony 2.3</li>
				<li>Ajax</li>
				<li>SOLR</li>
			</ul>
		</div>
		<div class="panel">
			<h3>Marketing</h3>
			<ul>
				<li>Liens Amazon</li>
				<li>Facebook API</li>
				<li>Instagram</li>
			</ul>
		</div>
	</div>
</div>

	</div>
</div>

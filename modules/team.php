<?php //content modules should not be accessed directly through a URL since they would then lack the HTML Template

//we'll see if a constant is defined (which should be included first thing in the index file, prior to including this page)
if (!defined('BASE_URL'))
{
  require('../includes/config.inc.php');
  $url = BASE_URL . 'team.php';
  header("Location:$url");
  exit;
}
 ?>
<div class="row">
 
<div class="large-9 push-3 columns panel">
<h3>Claire</h3>
<p>Ingénieur Centralienne, je suis passionnée par la puissance des nouvelles technologies, et de
façon générale par tout ce qui est de l'ordre de la créativité et de l'entreprenariat. Après avoir réalisé pour le compte de l'administration française,
une <em>application web</em> de gestion du personnel et travaillé dans une agence web, je réalise maintenant des projets informatiques de A jusqu'à Z.
<p>Ce qui me plaît le plus est de concevoir, m'investir dans un projet et de le rendre, pour l'utilisateur, fiable, rapide et presque indispensable !</p>
</div>
 
 
<div class="large-3 pull-9 columns">
<p><img src="ressources/images/claire.png"/></p>


</div>
</div>

<div class="row">
 
 
<div class="large-9 push-3 columns panel">
<h3>Victor</h3>
<p>Polytechnicien et ayant travaillé dans le domaine scientifique, j'ai développé de très solides compétences dans la création 
	d'algorithmes rapides et efficaces.</p>
<p>Dans un projet informatique, mis à part le design et l'expérience utilisateur, il est fondamental que le fonctionnement 
	repose sur un code propre, rapide, intelligent et facilement modulable.</p>
</div>
 
 
<div class="large-3 pull-9 columns">
<p><img src="ressources/images/victor.jpg"/></p>


</div>
</div>
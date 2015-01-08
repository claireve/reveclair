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
<h3>Claire <small> Responsable projets web</small></h3>
<p>Je suis passionnée par la puissance et la portée des nouvelles technologies, et de
façon générale par tout ce qui est de l'ordre de la créativité et de l'entreprenariat. 
Après avoir réalisé pour le compte de l'ambassade de France aux États-Unis,
une <em>application web</em> de gestion du personnel sur l'ensemble du continent Amérique du Nord et
 travaillé dans une agence web, je réalise maintenant des projets informatiques de A jusqu'à Z en collaboration avec Victor. Ma formation et mon diplôme d'ingénieure Centralienne
 (spécialités Informatique & Finance) me permettent de concevoir, de m'investir dans les différentes facettes d'un projet avec l'objectif de le rendre, pour l'utilisateur, fiable et agréable.</p>
</div>
 
 
<div class="large-3 pull-9 columns">
<p><img src="ressources/images/claire.png"/></p>


</div>
</div>

<div class="row">
 
<div class="large-9 push-3 columns panel">
<h3>Victor <small> Responsable projets iOS et expert technique</small></h3>
<p>Polytechnicien et ayant effectué un doctorat à l'École Normale Supérieure (ENS), j'ai acquis une expertise dans le développement d'algorithmes rapides et efficaces. 
Je m’intéresse en particulier aux questions de performance et de scalabilité. 
<p>Je garantis que les projets que nous traitons repose sur un code propre, rapide, intelligent et facilement modulable.</p>
</div>
 
 
<div class="large-3 pull-9 columns">
<p><img src="ressources/images/victor.jpg"/></p>


</div>
</div>
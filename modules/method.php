<?php //content modules should not be accessed directly through a URL since they would then lack the HTML Template

//we'll see if a constant is defined (which should be included first thing in the index file, prior to including this page)
if (!defined('BASE_URL'))
{
  require('../includes/config.inc.php');
  $url = BASE_URL . 'method.php';
  header("Location:$url");
  exit;
}
 ?>
<div class="path-container">
  <div class="row">
    <div class="large-12 columns">
      <h1>Nos méthodes</h1>
    </div>
  </div>
  <div class="row path-item">
    <div class="large-7 push-5 columns">
      <div class="circle circle-left "></div>
    </div>
    <div class="large-5 pull-7 columns path-text left">
      <h3>Ecoute de vos besoins et attentes</h3>
      <p>Notre petite structure nous permet d'être très réactif. Nous ne travaillons que sur un projet à la fois.
        Ce choix nous laisse la possibilité d'être plus attentif à la qualité, de peaufiner les détails et de délivrer le produit rapidement.</p>
    </div>
  </div>
  <div class="row path-item">
    <div class="large-7 columns">
      <div class="circle circle-right right"></div>
    </div>
    <div class="large-5 columns path-text right">
      <h3>Ebauche du projet et production rapide pour aucun malentendu</h3>
      <p>Nous suivons les principes AGILE pour le management de nos projets, cette méthode nous paraissant très cohérente et étant réputée extrêmement efficace.
      En quelques mots, cela consiste à une mise en production très rapide avec un feedback de votre part fréquent pour 
      un développement en complète cohérence avec vos attentes. </p>
    </div>
  </div>
  <div class="row get-feedback path-item">
    <div class="large-7 push-5 columns">
      <div class="circle circle-left"></div>
    </div>
    <div class="large-5 pull-7 columns path-text left">
      <h3>Tout au long du projet, rigueur et qualité du développement avec des tests fonctionnels</h3>
      <p>Nous aimons le travail bien fait, maintenable et facilement évolutif.
        Nous mettons un point d'orgue à un écrire du code propre, minimaliste, documenté et testé.</p>
    </div>
  </div>
  <div class="row land-job path-item">
    <div class="large-7 columns">
      <div class="circle circle-right right"></div>
    </div>
    <div class="large-5 columns path-text right">
      <h3>Stratégie SEO, graphisme et livraison finale</h3>
      <p></p>
    </div>
  </div>
  <span class="line hide-for-small"></span>
</div>
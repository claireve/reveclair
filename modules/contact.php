<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

 	$name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $from = 'From: TangledDemo'; 
    $to = 'contact@reveclair.fr'; 
    $subject = 'Hello';
    $company = $_POST['company'];
	$company_description = $_POST['company_description'];
    $human = $_POST['human'];
	$date_start = $_POST['date_start'];
	$date_stop = $_POST['date_stop'];
	$budget = $_POST['budget'];

    $body = "From: $name\n E-Mail: $email\n Projet:\n $message \n Entreprise:\n $company\n Description entreprise:\n $company_description \n Date début souhaitée:\n $date_start \n Date fin souhaitée:\n $date_stop \n Budget estimé:\n $budget";
				
    if ($_POST['submit'] && $human == '4') {				 
        if (mail ($to, $subject, $body, $from)) { 
	    echo '<p class="success">Merci pour votre message. Vous recevrez une réponse de notre part rapidement.</p>';
	} else { 
	    echo '<p>Something went wrong, go back and try again!</p>'; 
	} 
    } else if ($_POST['submit'] && $human != '4') {
	echo '<p>You answered the anti-spam question incorrectly!</p>';
    }
}

?> 

<div class="row">
<div class="large-9 columns panel">
<h3>Contactez-nous !</h3>
<p>N'hésitez pas à nous contacter, que ce soit pour un appel à projet, une simple question ou une remarque, ça nous fait toujours plaisir.</p>
<div class="section-container tabs" data-section>
<section class="section">
<h5 class="title">Contactez Reveclair</h5>
<div class="content" data-slug="panel1">
<form id="contactForm" method="post" target="index.php?p=contact" novalidate>
<div class="row collapse">
<div class="large-2 columns">
<label class="inline">Votre nom <small>Requis</small></label>
</div>
<div class="large-10 columns">
<input  required name="name" type="text" id="yourName" placeholder="Jean Dupont">
</div>
</div>
<div class="row collapse">
	<div class="large-2 columns">
		<label class="inline"> Votre Email <small>Requis</small></label>
	</div>
	<div class="large-10 columns">
		<input name="email"  required type="email" id="yourEmail" placeholder="jdupont@gmail.com">
	</div>
</div>
<div class="row collapse">
	<div class="large-2 columns">
		<label class="inline"> Votre entreprise</label>
	</div>
	<div class="large-10 columns">
		<input type="text" name="company" id="yourCompany">
	</div>
</div>

<label>Décrivez votre entreprise </label>
<textarea name="company_description" ></textarea>
<label>Décrivez le projet pour lequel vous nous contacter <small>Requis</small></label>
<textarea name="message"></textarea>
<div class="row collapse">
	<div class="large-6 columns">
		<label class="inline"> Quand voulez-vous commencer ?</label>
	</div>
	<div class="large-6 columns">
		<input name="date_start" type="text" id="date_start">
	</div>
</div>
<div class="row collapse">
	<div class="large-6 columns">
		<label class="inline"> Quand le projet doit être fini ?</label>
	</div>
	<div class="large-6 columns">
		<input name="date_stop" type="text" id="date_stop">
	</div>
</div>
<div class="row collapse">
	<div class="large-6 columns">
		<label class="inline"> Votre budget estimé</label>
	</div>
	<div class="large-5 columns">
		<input id="budget" name="budget" type="text">
	</div>
	<div class="small-1 columns">
          <span class="postfix">€</span>
        </div>
</div>
<div class="row collapse">
	<div class="large-2 columns">
<label>Somme de 2+2 ? (vérification anti-spam)</label>
	</div>
	<div class="large-10 columns">
<input name="human" placeholder="Résultat">
	</div>
</div>
<input type="submit" name="submit" type="submit" value="Envoyer" class="radius button" />
</form>
</div>
</section>
</div>
</div>
 
 
<div class="large-3 columns"> 
<!-- <p>
<a href="" data-reveal-id="mapModal"><img src="http://placehold.it/400x280"></a><br/>
<a href="" data-reveal-id="mapModal">View Map</a>
</p>
<p>
123 Awesome St.<br/>
Barsoom, MA 95155
</p> -->
</div>
 
</div>
<script>
$( document ).ready(function() {
$("#contactForm").validate({
	rules: {
		name: "required",
		email: {
			required: true,
			email: true
		},
		message: {
			required: true,
		},
		human: "required"
	},
	messages: {
		name: "Merci de renseigner votre nom.",
		email: {
			required: "Merci de renseigner votre email.",
			email: "Merci de renseigner une adresse email valide."
		},
		message: "Merci de décrire le projet pour lequel vous nous contactez.",
		human: "Merci de donner un résultat."
	}
});
$.datepicker.setDefaults($.datepicker.regional["fr"]);
$( "#date_start" ).datepicker({dateFormat: 'dd/mm/yy', minDate: 0}, $.datepicker.regional[ "fr" ]);
$( "#date_stop" ).datepicker({dateFormat: 'dd/mm/yy', minDate: 1}, $.datepicker.regional[ "fr" ]);
// $( "#date_start" ).mask('99/99/9999');
// $( "#date_begin" ).mask('99/99/9999');

});
</script>

 
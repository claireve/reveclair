<?php
define('TITLE', 'Login');
$loggedin = false;
$error = false;
?>
<div class="row">
<div class="large-9 columns panel">

<h1>Login</h1>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$problem = FALSE;
	//handle the form
	if ((!empty($_POST['email'])) && (!empty($_POST['password']))) 
	{ 
		if ((strtolower($_POST['email']) == 'me@example.com') && ($_POST ['password'] == 'testpass') ) {
			setcookie('Samuel', 'Clemens',time()+3600);
			$loggedin = true;
		} 
		else { // Incorrect! 
			$error = 'The submitted email address and password do not match those on file!';
		}
	}

	else {
		$problem = TRUE;
		print '<p class="error">vous avez oublie de remplir un champ</p>';
	}

if ($error) {
print '<p class="error">' .  $error . '</p>';}
}
if ($loggedin) {
	print '<p>You are now logged in!</p>';}
	 else {
	print '
<form action="index.php?p=login" method="post">
	<div class="row">
		<div class="small-8">
			<div class="row">
				<div class="small-3 columns">
					<label for="right-label" class="right">Email</label>
				</div>
				<div class="small-9 columns">
					<input type="text" name="email" id="right-label" 
					placeholder="Inline Text Input">
				</div>
			</div>
			<div class="row">
				<div class="small-3 columns">
					<label for="right-label" class="right">Mot de passe</label>
				</div>
				<div class="small-9 columns">
					<input type=password name="password" id="right-label" placeholder="Inline Text Input">
				</div>
			</div>
			<button type="submit" class="radius button">Envoyer</button>

		</div>
	</div>
</form>';} ?>

</div>
 
</div>
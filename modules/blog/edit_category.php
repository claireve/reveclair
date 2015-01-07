<?php // Script 13.9 -edit_quote.php
define('TITLE', 'Modifier une catégorie');
?>
  <div class="row">
    <div class="large-9 columns">
		<?php 
		print '<h2>Modification d\'une catégorie</h2>';
		//on verifie que l'user est bien authentifié
		if (!isset($_SESSION['valid_user'])){
			print 
			'<h2>Access Denied!</h2>
			<p class="error">You do not have permission to access this page.</p>'; 
			include('templates/footer.php');
			exit();
		}
		include(DB);
		if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0) ) {
			$query = "SELECT name, description FROM Category WHERE id={$_GET['id']}";
			if ($r = mysql_query($query, $dbc)) { $row = mysql_fetch_array($r);
			print 
				'<form accept-charset="UTF-8" action="index.php?p=edit_category" method="post">
				<p><label>Description <textarea name="description" rows="5" cols="30">' . htmlspecialchars($row['description'], ENT_QUOTES, "UTF-8") .  '</textarea></label></p>
				<p><label>Nom <input type="name" name="name" value="' .  htmlspecialchars($row['name'], ENT_QUOTES, "UTF-8") . '" /></label></p>
				<input type="hidden" name="id" value="' . $_GET['id'] . '" /> 
				<p><input type="submit" name="submit" value="Update This Category!" /></p>
				</form>';
		}
		else { // Couldn't get the information.
			print '<p class="error">Could not retrieve the category because:<br />'
			 . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
			}
		} 
		elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {
		 	$problem = FALSE;
			if ( !empty($_POST['title']) &&  !empty($_POST['entry']) ) {
				$title = mysql_real_escape_string(trim(strip_tags($_POST['title'])), $dbc);
				$entry = $_POST['entry'];
				$isPublic = $_POST['is_public'];
			}
			else {
				print '<p class="error">Please submit both a title and a content.</p>';
				$problem = TRUE;
			}
			if (!$problem) {
				$query = "UPDATE entries SET title='$title', entry='$entry' WHERE entry_id={$_POST['id']}";
				if ($r = mysql_query($query, $dbc)) {
					print '<p>The quotation has been updated.</p>'; }
				else { print '<p class="error">Could not update the quotation because:<br />' . mysql_error($dbc) . 
					'.</p><p>The query being run was: ' .  $query . '</p>';
				}
			} // No problem!
		} 
		else { // No ID set.
			print '<p class="error">This page has been accessed in error.</p>'; } // End of main IF.
		mysql_close($dbc); 
		?>
</div>
</div>
<?php // Script 13.9 -edit_quote.php
define('TITLE', 'Modifier un post');
include_once('includes/functions.php');
?>
  <div class="row">
    <div class="large-9 columns">
		<?php 
		print '<h2>Modification d\'un post</h2>';
		if (!isset($_SESSION['valid_user'])){
			print 
			'<h2>Access Denied!</h2>
			<p class="error">You do not have permission to access this page.</p>'; 
			include('templates/footer.php');
			exit();
		}
		include(DB);

		if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0) ) {
			$query = "SELECT title,entry,isPublic, slug FROM entries WHERE entry_id={$_GET['id']}";
			if ($r = mysqli_query($dbc, $query)) { 
				$row = mysqli_fetch_array($r);
			print 
				'<form accept-charset="UTF-8" action="index.php?p=edit_entry" method="post">
				<p><label>Contenu <textarea name="entry" rows="5" cols="30">' . htmlspecialchars($row['entry'], ENT_QUOTES, "UTF-8") .  '</textarea></label></p>
				<p><label>Titre <input type="title" name="title" value="' .  htmlspecialchars($row['title'], ENT_QUOTES, "UTF-8") . '" /></label></p>
				<p>Public ?';
				if ($row['isPublic'] == 1){
					print
				    	'<input type="radio" name="is_public" value="1" checked id="isPublicTrue"><label for="isPublicTrue">Oui</label>
				      	<input type="radio" name="is_public" value="0" id="isPublicFalse"><label for="isPublicFalse">Non</label>';
				}
				else {
					print
						'<input type="radio" name="is_public" value="1"  id="isPublicTrue"><label for="isPublicTrue">Oui</label>
						<input type="radio" name="is_public" value="0" checked id="isPublicFalse"><label for="isPublicFalse">Non</label>';
				}
			print '
			    </p>
				<input type="hidden" name="id" value="' . $_GET['id'] . '" /> 
				<p><input type="submit" name="submit" value="Update This Post!" /></p>
				</form>';
		}
		else { // Couldn't get the information.
			print '<p class="error">Could not retrieve the post because:<br />'
			 . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
			}
		} 
		elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {
		 	$problem = FALSE;
			if ( !empty($_POST['title']) &&  !empty($_POST['entry']) &&  !isset($_POST['isPublic']) ) {
				$title = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['title'])));
				if (!get_magic_quotes_gpc())
					{ $entry = addslashes($_POST['entry']); }
				else { $entry = $_POST['entry'];}
				$isPublic = $_POST['is_public'];
				$slug = slugify($title);
			}
			else {
				print '<p class="error">Please submit both a title and a content.</p>';
				$problem = TRUE;
			}
			if (!$problem) {
				$query = "UPDATE entries SET title='$title', entry='$entry', isPublic='$isPublic', slug = '$slug' WHERE entry_id={$_POST['id']}";
				if ($r = mysqli_query($dbc, $query)) {
					print '<p>The quotation has been updated.</p>';
					$url = BASE_URL . 'posts/'.$slug;
					header ("Location: $url");
					exit;

					 }
				else { print '<p class="error">Could not update the quotation because:<br />' . mysqli_error($dbc) . 
					'.</p><p>The query being run was: ' .  $query . '</p>';
				}
			} // No problem!
		} 
		else { // No ID set.
			print '<p class="error">This page has been accessed in error.</p>'; } // End of main IF.
		mysqli_close($dbc); 
?>
</div>
</div>

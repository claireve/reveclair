 <?php // Script 9.8 - logout.php
 /* This is the logout page. It
destroys the session information. */
// Define a page title and include the header:
define('TITLE', 'Add entry');
include_once('includes/functions.php');
?>
<div class="row">
	<div class="large-9 columns panel">
	<h1>Add a Blog Entry</h1>
		<?php 
		if (!isset($_SESSION['valid_user'])) {
			print '<h2>Access Denied!</h2>
					<p class="error">You do not have permission to access this page.</p>'; 
			include('templates/footer.php'); 
			exit();
		}
		else {
		 print "<em>Les articles de ce blog sont issus de notre expérience personnelle et d'ouvrages spécialisés.</em>";
		}
		?>
		<?php
		if ($_SERVER['REQUEST_METHOD'] ==  'POST') {
			$problem = FALSE;
			if (!empty($_POST['title']) && !empty($_POST['entry']) && !empty($_POST['category_id']) && isset($_POST['is_public'])) {
				include(DB);
				$title = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['title'])));
				if (!get_magic_quotes_gpc())
					{ $entry = addslashes($_POST['entry']); }
				else { $entry = $_POST['entry'];}
				$category_id = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['category_id'])));
				$isPublic = $_POST['is_public'];
				$slug = slugify($title);
				// echo $slug;
				// die();

			}
			else {
				print '<p class="error">Please submit both a title and an entry and public.</p>'; 
				$problem = TRUE;
			}
			if (!$problem) {
				$query = "INSERT INTO entries (entry_id, title, entry, category_id, isPublic, date_entered, slug) VALUES (0, '$title', '$entry', '$category_id', '$isPublic', NOW(), '$slug')";
			}
			if (@mysqli_query($dbc, $query)) { 
				print '<p>The blog entry has been added!</p>';
				$url = BASE_URL . 'index.php';
				header ("Location: $url");
				exit;
			} 
			else { 
				print ' <p style="color: red;"> Could not add the entry because:<br />' . mysqli_error($dbc) . '.</p>
						<p>The query being run 
						was: ' .  $query . '</p>';
			}
			// No problem!
			mysqli_close($dbc);
		}
		// End of form submission IF. 
		?>
		<form accept-charset="utf-8" action="/index.php?p=add_entry" method="post">
			<p>Entry Title: <input type="text" name="title" size="40" maxsize="100" /></p>
			<select name="category_id">;
			<?php
			 include(DB); 
			 //fetch nurse name
			 $query = "SELECT id,name FROM Category;";
			 $result = mysqli_query($dbc, $query) or die(mysqli_error()); //note: use mysql_error() for development only
			 //print results
			 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			 	echo '<option   value='.$row['id'].'>'.$row['name'].'</option>';
			 }
			 echo "</select>";
			?>
			<p>Entry Text: <textarea id="editor1" name="entry" cols="40" rows="5"></textarea></p>
			<p>Public ?
	      <input type="radio" name="is_public" value="1" id="isPublicTrue"><label for="isPublicTrue">Oui</label>
	      <input type="radio" name="is_public" value="0" id="isPublicFalse"><label for="isPublicFalse">Non</label>
	    </p>

			<input type="submit" name="submit" value="Post This Entry!" />
		</form>
	</div>
</div>

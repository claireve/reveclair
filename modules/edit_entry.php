<?php // Script 13.9 -edit_quote.php
define('TITLE', 'Modifier un post');?>

  <div class="row">
    <div class="large-9 columns">

<?php 

print '<h2>Modification d\'un post</h2>';

if (!is_administrator()) {
	print '<h2>Access Denied!</h2>
	<p class="error">You do not have permission to access this page.</p>'; 
	include('templates/footer.php');
	exit();
}
include('includes/mysql_connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0) ) 
{
	$query = "SELECT title,entry FROM entries WHERE entry_id={$_GET['id']}";
	if ($r = mysql_query($query, $dbc)) { $row = mysql_fetch_array($r);
	print 
		'<form action="index.php?p=edit_entry" method="post">
		<p><label>Contenu <textarea name="entry" rows="5" cols="30">' . htmlentities($row['entry']) .  '</textarea></label></p>
		<p><label>Titre <input type="title" name="title" value="' .  htmlentities($row['title']) . '" /></label></p>
		<input type="hidden" name="id" value="' . $_GET['id'] . '" /> 
		<p><input type="submit" name="submit" value="Update This Post!" /></p>
		</form>';
	}
else { // Couldn't get the information.
	print '<p class="error">Could not retrieve the post because:<br />'
	 . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}
} 
elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) {
 	$problem = FALSE;
	if ( !empty($_POST['title']) &&  !empty($_POST['entry']) ) {
		$title = mysql_real_escape_string(trim(strip_tags($_POST['title'])), $dbc);
		$entry = mysql_real_escape_string(trim(strip_tags($_POST['entry'])), $dbc);
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

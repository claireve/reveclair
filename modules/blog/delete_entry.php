<?php // Script 13.10 - delete_quote.php
/* This script deletes a quote. */
// Define a page title and include the header:
define('TITLE', 'Delete a Post');
?>
  <div class="row">
    <div class="large-9 columns">
	<h2>Delete a Post</h2>
<?php
// Restrict access to administrators only:
if (!isset($_SESSION['valid_user'])) {
	print 	'<h2>Access Denied!</h2>
			<p class="error">You do not have permission to access this page.</p>';
	include('templates/footer.html');
	exit();
}
 // Need the database connection:
include(DB);
if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0)) { 
	// Display the quote in a form
	// Define the query:
	$query = "SELECT title FROM entries WHERE entry_id={$_GET['id']}";
	if ($r = mysql_query($query, $dbc)) { // Run the query.
		$row = mysql_fetch_array($r); // Retrieve the information. 
		// Make the form:
		print 	'<form action="index.php?p=delete_entry" method="post">
				<p>Are you sure you want to delete this post?</p>
				<div><blockquote>' . $row['title'] . '</blockquote>';
				print '</div><br /><input type="hidden" name="id" value="' . $_GET['id'] . '" />
				<p><input type="submit" name="submit" value="Delete this Post!" /></p>
				</form>';
	}
	else { // Couldn't get the information.
		print '<p class="error">Could not retrieve the quote because:<br />' . mysql_error($dbc) .
		'.</p><p>The query being run was: ' . $query . '</p>';	
	}
}
elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0) ) { // Handle the form.
	// Define the query:
	$query = "DELETE FROM entries WHERE entry_id={$_POST['id']} LIMIT 1";
	$r = mysql_query($query, $dbc); // Execute the query. 51
	// Report on the result:
	if (mysql_affected_rows($dbc) == 1) {
		print '<p>The post has been deleted.</p>';	
	}
	else {
		print '<p class="error">Could not delete the blog entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}
}
else { // No ID received.
	print '<p class="error">This page has been accessed in error.</p>';
} // End of main IF.

mysql_close($dbc); // Close the connection. 64
?>
</div>
</div>
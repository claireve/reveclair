 <?php // Script 9.8 - logout.php
 /* This is the logout page. It
destroys the session information. */

// Define a page title and include the header:
define('TITLE', 'Blog');
include_once('includes/functions.php');
?>
<div class="row">
 <div class='large-9 columns'>
 	<h1>Blog</h1>
<?php 
if (is_administrator() ==false) 
{ 
	print '<h2>Access Denied!</h2>
	<p class="error">You do not have permission to access this page.</p>'; 
	include('templates/footer.php'); exit(); }
	else {
	 print "<em>Les articles de ce blog sont issus de notre expérience personnelle et d'ouvrages spécialisés.</em>";}?>
 

<?php
include(DB);
$query = 'SELECT * FROM entries ORDER BY date_entered DESC';
 if ($r = mysql_query($query,$dbc)) {

	while ($row = mysql_fetch_array($r)) {
		$entry = nl2br ($row['entry']);
		print "<div class='panel'><h3>{$row['title']}</h3> {$entry}<br />
		<a href=\"index.php?p=edit_entry&id={$row['entry_id']}\">Edit</a>
		<a href=\"delete_entry.php? id={$row['entry_id']}\">Delete</a></div>\n";
	}
} 
else { // Query didn't run. 
	print '<p style="color: red;"> Could not retrieve the data because:<br />' . mysql_error($dbc) . '.</p>
		<p>The query being run was: ' . $query . '</p>';
} // End of query IF.
?>
</div>
<div class="large-3 columns">
<?php include('templates/blog_sidenav.html'); ?>
</div>


</div>
<?php
mysql_close($dbc);
?>
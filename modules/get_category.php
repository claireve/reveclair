 <?php // Script 9.8 - logout.php
 /* This is the logout page. It
destroys the session information. */

// Define a page title and include the header:
define('TITLE', 'Blog');
include('includes/functions.php');
?>
<div class="row">
 <div class='large-9 columns'>
 	<h1>Blog</h1>
<?php if (! is_administrator() ) { 
	print '<h2>Access Denied!</h2>
	<p class="error">You do not have permission to access this page.</p>'; 
	include('templates/footer.php'); exit(); }
	else {
	 print "<em>Les articles de ce blog sont issus de notre expérience personnelle et d'ouvrages spécialisés.</em>";}?>
 

<?php
include('includes/mysql_connect.php');
$id_category = $_GET['id'];
echo $id_category;
$query = 'SELECT e.title, e.entry, e.entry_id, c.name FROM entries e LEFT JOIN Category c ON e.category_id = c.id WHERE c.id = ' . $id_category .' ORDER BY e.date_entered DESC';
 if ($r = mysql_query($query,$dbc)) {

	while ($row = mysql_fetch_array($r)) {
		$entry = nl2br ($row['entry']);
		print $row['name'];
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

<ul class="side-nav">
	<li><a href="index.php?p=get_category">Graphisme</a></li>
	<li><a href="#">Administration</a></li>
	<li><a href="#">Programmation</a></li>
	<li><a href="#">Marketing</a></li>
</ul>
</div>


</div>
<?php
mysql_close($dbc);
?>
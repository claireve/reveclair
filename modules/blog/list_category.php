 <?php // Script 9.8 - logout.php
 /* This is the logout page. It
destroys the session information. */

// Define a page title and include the header:
define('TITLE', 'Blog');
include(DB);
?>
<div class="row">
 <div class='large-9 columns aside'>
 	<h1 class="page-title">Blog - 
<?php

$q = "SELECT c.name, c.description, c.slug FROM Category c WHERE c.slug = '{$_GET['slug']}'";
if ($result= mysql_query($q,$dbc)) {
	$r1 = mysql_fetch_row($result);
	print $r1[0].'</h1>';
} ?><hr/>

<?php 
	echo '<p class="description">'.$r1[1].'</p><hr/>';
?>
<?php
$query = "SELECT e.title, e.entry, e.entry_id, e.slug, c.name FROM entries e LEFT JOIN Category c ON e.category_id = c.id WHERE c.slug = '{$_GET['slug']}' ORDER BY e.date_entered DESC";
 if ($r = mysql_query($query,$dbc)) {

	while ($row = mysql_fetch_array($r)) {
		$entry = nl2br ($row['entry']);
		print "<div class='panel'><h3><a href=\"/posts/{$row['slug']}\">{$row['title']}</a></h3> {$entry}<br />
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
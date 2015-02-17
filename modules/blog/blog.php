 <?php // Script 9.8 - logout.php
 /* This is the logout page. It
destroys the session information. */

// Define a page title and include the header:
define('TITLE', 'Blog');
include_once('includes/functions.php');
// use Michelf\Markdown;
require_once 'ressources/php_markdown_lib_1.4.1/Michelf/Markdown.inc.php';?>
<div class="wrapper">
<div class="row">
 <div class='large-9 columns aside'>
 	<h4 class="page-title">Blog</h4><hr/>

<?php
include(DB);
$query = 'SELECT e.title, e.entry, c.name, e.entry_id, e.isPublic, e.date_entered, e.slug FROM entries e LEFT JOIN Category c ON e.category_id = c.id ORDER BY e.date_entered DESC';
 if ($r = mysqli_query($dbc, $query)) {

	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		$name = strtoupper($row['name']);
		//si l'user est connecte, il a acces a tous les posts sans restriction
		if (isset($_SESSION['valid_user'])) {
			$entry = \Michelf\Markdown::defaultTransform($row['entry']);
			$format = 'Y-m-d H:i:s';
			$date_entry = date_create_from_format($format, $row['date_entered']);
			if (isset($row['name'])) echo "<div class='ribbon'><div class='ribbon-stitches-top'></div><strong class='ribbon-content'><h1>{$name}</h1></strong><div class='ribbon-stitches-bottom'></div></div>";
			print "
			<div class='panel multiple-post'>
					<h1>
						<a href=\"/posts/{$row['slug']}\">{$row['title']}</a>";
			print "</h1>".$date_entry->format('d/m/Y').$entry;
			if (isset($_SESSION['valid_user'])) {
				print "<a href=\"/index.php?p=edit_entry&id={$row['entry_id']}\">Edit</a>
					  <a href=\"/index.php?p=delete_entry&id={$row['entry_id']}\">Delete</a></div>\n";
			}
		}
		//sinon il n'a acces qu'aux posts publics
		else { 
			if ($row['isPublic'] == 1){
				$entry = \Michelf\Markdown::defaultTransform($row['entry']);
				$format = 'Y-m-d H:i:s';
				$date_entry = date_create_from_format($format, $row['date_entered']);
				if (isset($row['name'])) echo "<div class='ribbon'><div class='ribbon-stitches-top'></div><strong class='ribbon-content'><h1>{$name}</h1></strong><div class='ribbon-stitches-bottom'></div></div>";
				print "<div class='panel multiple-post'>
						<h3>
							<a href=\"/posts/{$row['slug']}\">{$row['title']}</a>";
				if ($row['isPublic'] == 0) echo ' PRIVE';
				print "</h3> {$entry}</div>\n";
			}
		}
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
<div class="push"></div>
</div>
<?php
mysqli_close($dbc);
?>
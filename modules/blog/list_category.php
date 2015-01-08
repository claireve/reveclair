 <?php // Script 9.8 - logout.php
 /* This is the logout page. It
destroys the session information. */

// Define a page title and include the header:
define('TITLE', 'Blog');
// use Michelf\Markdown;
require_once 'ressources/php_markdown_lib_1.4.1/Michelf/Markdown.inc.php';
include(DB);
?>
<div class="wrapper">
<div class="row">
 <div class='large-9 columns aside'>
 	<h1 class="page-title">Blog - 
<?php

$q = "SELECT c.name, c.description, c.slug, c.id FROM Category c WHERE c.slug = '{$_GET['slug']}'";
if ($result= mysql_query($q,$dbc)) {
	$r1 = mysql_fetch_row($result);
	print $r1[0].'</h1>';
} ?><hr/>

<?php 
	echo '<p class="description">'.$r1[1].'</p><hr/>';
?>
<?php
$query = "SELECT e.title, e.entry, e.entry_id, e.slug, e.isPublic, e.date_entered,c.name FROM entries e LEFT JOIN Category c ON e.category_id = c.id WHERE c.slug = '{$_GET['slug']}' ORDER BY e.date_entered DESC";
 if ($r = mysql_query($query,$dbc)) {

	while ($row = mysql_fetch_array($r)) {
		$name = strtoupper($row['name']);
		//si l'user est connecte, il a acces a tous les posts sans restriction
		if (isset($_SESSION['valid_user'])) {
			$entry = \Michelf\Markdown::defaultTransform($row['entry']);
			$format = 'Y-m-d H:i:s';
			$date_entry = date_create_from_format($format, $row['date_entered']);
			if (isset($row['name'])) echo "<div class='ribbon'><div class='ribbon-stitches-top'></div><strong class='ribbon-content'><h1>{$name}</h1></strong><div class='ribbon-stitches-bottom'></div></div>";
			print "
			<div class='panel multiple-post'>
					<h3>
						<a href=\"/posts/{$row['slug']}\">{$row['title']}</a>";
			print "</h3>".$date_entry->format('d/m/Y').$entry;
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
mysql_close($dbc);
?>
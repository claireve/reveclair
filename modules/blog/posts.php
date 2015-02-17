<?php
define('TITLE', 'Blog');
include_once('includes/functions.php');
require_once 'ressources/php_markdown_lib_1.4.1/Michelf/Markdown.inc.php';
?>

<div class="wrapper">
<div class="row">
 <div class='large-9 columns aside'>
 	<h4 class="page-title">Blog</h4><hr/>

<?php
include(DB);
$display = 1;
// Determine how many pages there are... 
if (isset($_GET['page']) && is_numeric($_GET ['page'])) {
	$pages = $_GET['page']; }
else { 
	$q = "SELECT COUNT(entry_id) FROM entries";
	$r = @mysqli_query($dbc, $q);
	$row = @mysqli_fetch_array($r, MYSQLI_NUM); $records = $row[0];
	if ($records > $display) {
		$pages = ceil($records/$display); 
	}
	else {
		$pages = 1;
	}
} 
// Determine where in the database to start returning results...
if (isset($_GET['s']) && is_numeric($_GET['s'])) {
	$start = $_GET['s'];
}
else {
	$start =0;
}

// Make the query:
$q = "SELECT e.title, e.entry, c.name, e.entry_id, e.isPublic, e.date_entered, e.slug FROM entries e LEFT JOIN Category c ON e.category_id = c.id ORDER BY e.date_entered DESC LIMIT $start, $display";
$r = @mysqli_query($dbc, $q);

// Fetch and print all the records.... 60
$bg = '#eeeeee'; // Set the initial background color.

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee'); // Switch the background color.
	echo '<tr bgcolor="' . $bg . '">
	<td align="left">' . $row['title'] . '</td>
	<td align="left">' . $row['name'] . '</td>
	<td align="left">' . $row['slug'] . '</td> </tr>
	';
}
// End of WHILE loop.
echo '</table>';
mysqli_free_result ($r);
mysqli_close($dbc);

if ($pages > 1) {
	echo '<br /><p>';
	$current_page = ($start/$display) + 1;
	if ($current_page != 1) {
		echo '<a href="/index.php?p=posts?s=' . ($start - $display) . '&page=' . $pages . '">Previous</a> ';
	}
	for ($i = 1; $i <= $pages; $i++) {
		if ($i != $current_page) {
			echo '<a href="/index.php?p=posts?s=' . (($display * ($i - 1))) . '&page=' .
			$pages . '">' . $i . '</a> ';
		}
		else {
			echo$i.''; 
		}
	}
	// If it's not the last page, make a Next button:
	if ($current_page != $pages) {
		echo '<a href="/index.php?p=posts?s=' . ($start + $display) . '&page=' . $pages . '">Next</a>';
	}
echo '</p>'; // Close the paragraph. 
}
// End of links section.
?>
</div>
<div class="large-3 columns">
<?php include('templates/blog_sidenav.html');
 ?>
</div>
</div>
<div class="push"></div>
</div>
<?php mysqli_close($dbc); ?>

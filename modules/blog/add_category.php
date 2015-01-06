 <?php // Script 9.8 - logout.php
 /* This is the logout page. It
destroys the session information. */

// Define a page title and include the header:
define('TITLE', 'Add category');
include_once('includes/functions.php');
?>
<div class="row">
 
<div class="large-9 columns panel">

<h1>Add a Category for this blog</h1>

<?php if (! is_administrator() ) { print '<h2>Access Denied!</h2>
<p class="error">You do not have permission to access this page.</p>'; 
include('templates/footer.php'); exit(); }


if ($_SERVER['REQUEST_METHOD'] ==  'POST') {
	$problem = FALSE;
	if (!empty($_POST['category_name']) && !empty($_POST['description'])) 
	{
		include(DB);
		$category_name = mysql_real_escape_string(trim(strip_tags($_POST['category_name'])), $dbc);
		$description = mysql_real_escape_string(trim(strip_tags($_POST['description'])), $dbc);
	}
	else 
	{
		print '<p style="color:red;">Please submit both a title and an entry.</p>'; 
		$problem = TRUE;
	}

	if (!$problem) {$query = "INSERT INTO Category (name, description) VALUES ('$category_name', '$description')";}
	
	if (@mysql_query($query, $dbc)) { print '<p>The category has been added!</p>';} 
	
	else { print '<p style="color: red;"> Could not add the category because:<br />' . mysql_error($dbc) . '.</p>
	<p>The query being run 
	was: ' .  $query . '</p>';} // No problem!
mysql_close($dbc);
} // End of form submission IF. ?>



<form accept-charset="utf-8" action="index.php?p=add_category" method="post">
<p>Category name: <input type="text" name="category_name" size="40" maxsize="100" /></p>
<p>Description: <textarea name="description" cols="40" rows="5"></textarea></p>
<input type="submit" name=  ̈"submit" value="Add this Category!" />
</form>
</div>
</div>
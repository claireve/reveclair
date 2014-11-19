 <?php // Script 9.8 - logout.php
 /* This is the logout page. It
destroys the session information. */

// Define a page title and include the header:
define('TITLE', 'Add entry');
?>
<div class="row">
 
 
<div class="large-9 columns panel">

<h1>Add a Blog Entry</h1>

<?php if (! is_administrator() ) { print '<h2>Access Denied!</h2>
<p class="error">You do not have permission to access this page.</p>'; 
include('templates/footer.php'); exit(); }
else {
	 print "<em>Les articles de ce blog sont issus de notre expérience personnelle et d'ouvrages spécialisés.</em>";}?>


<?php



if ($_SERVER['REQUEST_METHOD'] ==  'POST') {
	$problem = FALSE;
	if (!empty($_POST['title']) && !empty($_POST['entry']) && !empty($_POST['category_id'])) 
	{
		include('includes/mysql_connect.php');
		$title = mysql_real_escape_string(trim(strip_tags($_POST['title'])), $dbc);
		$entry = mysql_real_escape_string(trim(strip_tags($_POST['entry'])), $dbc);
		$category_id = mysql_real_escape_string(trim(strip_tags($_POST['category_id'])), $dbc);

	}
	else 
	{
		print '<p style="color:red;">Please submit both a title and an entry.</p>'; 
		$problem = TRUE;
	}

	if (!$problem) {$query = "INSERT INTO entries (entry_id, title, entry, category_id, date_entered) VALUES (0, '$title', '$entry', '$category_id', NOW())";}
	
	if (@mysql_query($query, $dbc)) { print '<p>The blog entry has been added!</p>';} 
	
	else { print '<p style="color: red;"> Could not add the entry because:<br />' . mysql_error($dbc) . '.</p>
	<p>The query being run 
	was: ' .  $query . '</p>';} // No problem!
mysql_close($dbc);
} // End of form submission IF. ?>

<form action="index.php?p=add_entry" method="post">
<p>Entry Title: <input type="text" name="title" size="40" maxsize="100" /></p>
<select name="category_id">;
<?php
 include('includes/mysql_connect.php'); 

 //fetch nurse name
 $query = "SELECT id,name FROM Category;";

 $result = mysql_query($query) or die(mysql_error()); //note: use mysql_error() for development only

 //print results
 while($row = mysql_fetch_assoc($result)) {
 echo '<option   value='.$row['id'].'>'.$row['name'].'</option>';
 }
 echo "</select>";


?>



<p>Entry Text: <textarea name="entry" cols="40" rows="5"></textarea></p>
<input type="submit" name=  ̈"submit" value="Post This Entry!" />
</form>
</div></div>

 <?php // Script 9.8 - logout.php
 /* This is the logout page. It
destroys the session information. */

// Define a page title and include the header:
define('Login', 'Blog');
include(DB);
if (isset($_POST['userid']) && isset($_POST['password']))
{
	// if the user has just tried to log in $userid = $_POST['userid'];
	$password = $_POST['password'];
	$userid = $_POST['userid'];
	if (mysqli_connect_errno()) {
		echo 'Connection to database failed:'.mysqli_connect_error(); exit();
	}
	$query = 'select * from authorized_users ' ."where name='$userid' "
	." and password=sha1('$password')";
	$result = mysql_query($query,$dbc); 
	if (($num_rows =mysql_num_rows($result)) == 1)
	{
		// if they are in the database register the user id
		$_SESSION['valid_user'] = $userid; }
		//$db_conn->close(); 
		mysql_close($dbc);
	}
?>
  <div class="row">
    <div class="large-9 columns">

<h1>Home page</h1> 
<?php
if (isset($_SESSION['valid_user'])) {
	echo 'You are logged in as: '.$_SESSION['valid_user'].' <br />';
	echo '<a href="/logout.php">Log out</a><br />'; 
}
else {
	if (isset($userid)) {
		// if they've tried and failed to log in
		echo 'Could not log you in.<br />'; 
	}
	else {
		// they have not tried to log in yet or have logged out
		echo 'You are not logged in.<br />'; }
		// provide form to log in
		echo '<form method="post" action="index.php?p=login">';
		echo '<table>';
		echo '<tr><td>Userid:</td>';
		echo '<td><input type="text" name="userid"></td></tr>';
		echo '<tr><td>Password:</td>';
		echo '<td><input type="password" name="password"></td></tr>'; echo '<tr><td colspan="2" align="center">';
		echo '<input type="submit" value="Log in"></td></tr>';
		echo '</table></form>';
	}
?>
<br />
<a href="/blog">Members section</a> 
</div>
</div>

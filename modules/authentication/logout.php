 <?php // Script 9.8 - logout.php
 /* This is the logout page. It
destroys the session information. */

// // Need the session:
// session_start();
// // Delete the session variable:
// unset($_SESSION);

// // Reset the session array:
// $_SESSION = array();

// Define a page title and include the header:
define('TITLE', 'Logout');
// store to test if they *were* logged in 
$old_user = $_SESSION['valid_user']; 
unset($_SESSION['valid_user']);
session_destroy();
?>
<h1>Log out</h1> 
<?php
if (!empty($old_user)) {
echo 'Logged out.<br />'; }
else {
// if they weren’t logged in but came to this page somehow
echo 'You were not logged in, and so have not been logged out.<br />'; }
?>
<a href="/index.php?p=login">Back to main page</a>
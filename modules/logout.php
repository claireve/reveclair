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

if (isset($_COOKIE['Samuel'])) { setcookie('Samuel', FALSE,time()-300);
}	

?>

<p>You are now logged out.</p>
<p>Thank you for using this site. We
hope that you liked it./p>


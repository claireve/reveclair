<?php #Script 2.1 - config.inc.php


$contact_email = "contact@reveclair.fr";


//determine whether the script is running on the live server or a test server
$host = substr($_SERVER['HTTP_HOST'], 0, 5);
if (in_array($host, array('local', '127.0', '192.1')))
{$local = true;}
else {$local = false;}
if ($local){
	$debug = true;
	//the BASE_URI is the absolute file system path to where the site's root folder is on the server
	define('BASE_URI', '/path/to/html/folder/');
	define('BASE_URL', 'http://local.reveclair.com/');
	//absolute path on the server to the mysql.inc.php file
	define('DB', '/Users/claireveiniere/Sites/reveclair/includes/mysql_connect.php');
}
else {
	//paths on remote server
define('BASE_URI', '/path/to/live/html/folder/');
define('BASE_URL', 'http://www.reveclair.fr/');
define('DB', '/home/claire/mysql_connect.php');
}
//debugging is disabled by default
if (!isset($debug)) {$debug = FALSE;}

//php allows you to define your own function for handling erros
function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars)
{
	global $debug, $contact_email;
	$message = "An error occurred in script '$e_file' on line $e_line: $e_message";
	$message .= print_r($e_vars, 1);
	if ($debug) { 
		echo '<div class="error">' . $message . '</div>';
		debug_print_backtrace();
	}
	//if debugging is turned off
	else 
	{
		error_log ($message, 1, $contact_email);
		//a strict error has the value of 2048 
		if ( ($e_number != E_NOTICE) && ($e_number < 2048)) {
	echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div>';
		}
	} 
} 
set_error_handler('my_error_handler');


?>

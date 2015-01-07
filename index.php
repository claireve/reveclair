<?php 
session_name('YourVisit');
session_start();

//the configuration file defines many important things so it should be included first
require("includes/config.inc.php");


//print '<h2>Welcome to the J.D.  ̈ Salinger Fan Club!</h2>'; print '<p>Hello, ' . $_SESSION['email'] . '!</p>';
error_reporting(E_ALL | E_STRICT);


define('MAIL_ADDRESS', 'contact@reveclair.fr');

//when the user clicks links, the value will be passed in the URL, when most forms are submitted the value will be sent in POST
if (isset($_GET['p'])) { $p = $_GET['p'];}
elseif (isset($_POST['p'])) { $p = $_POST['p'];}
else { $p = NULL;}
//echo $p;

//determines the file to include and the page title
switch ($p) {
	case 'contact':
	$page = 'contact.php';
	$page_title = 'Contact';
	break;
	case 'team':
	$page = 'team.php';
	$page_title = 'Equipe';
	break;
	case 'work':
	$page = 'work.php';
	$page_title = 'Nos travaux';
	break;
	case 'method':
	$page = 'method.php';
	$page_title = 'Nos méthodes';
	break;
	case 'post':
	$page = 'post.php';
	$page_title = 'Nouveau post';
	break;
	case 'login':
	$page = 'authentication/login.php';
	$page_title = 'Login';
	break;
	case 'logout':
	$page = 'authentication/logout.php';
	$page_title = 'Logout';
	break;
	case 'blog':
	$page = 'blog/blog.php';
	$page_title = 'Blog';
	break;
	//ENTRIES
	case 'add_entry':
	$page = 'blog/add_entry.php';
	$page_title = 'Ajouter un post';
	break;
	case 'edit_entry':
	$page = 'blog/edit_entry.php';
	$page_title = 'Modifier un post';
	break;
	case 'delete_entry':
	$page = 'blog/delete_entry.php';
	$page_title = 'Supprimer un post';
	break;
	case 'show_entry':
	$page = 'blog/show_entry.php';
	$page_title = 'Post';
	break;
	//CATEGORIES
	case 'add_category':
	$page = 'blog/add_category.php';
	$page_title = 'Ajouter une catégorie';
	break;
	case 'edit_category':
	$page = 'blog/edit_category.php';
	$page_title = 'Modifier une catégorie';
	break;
	case 'list_category':
	$page = 'blog/list_category.php';
	$page_title = 'Liste posts';
	break;
	default:
	$page = 'content.php';
	$page_title = 'Accueil';
	break;
}

if (!file_exists('./modules/'.$page)) {
	$page = 'content.php';
	$page_title = 'Accueil';
}


include("templates/header.php");

//page is determined from the above switch
include('modules/'.$page);

include("templates/footer.php"); 

?>



<?php ob_start(); 
header("Content-Type: text/html;charset=UTF-8");
include_once('includes/functions.php');
if (!isset($page_title)) $page_title = 'Reveclair';?>

<!DOCTYPE html>
<html> 

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $page_title; ?> | Reveclair </title>
<link rel="shortcut icon" type="image/x-icon" href="/ressources/images/favicon.ico" />
<link rel="stylesheet" href="/ressources/css/foundation.min.css">
<link rel="stylesheet" href="/ressources/css/foundation-icons.css">
<link href='http://fonts.googleapis.com/css?family=Pathway+Gothic+One|Marvel|Coda|Cookie|Wire+One|Rochester|Pompiere|Dosis|Roboto+Condensed|Roboto' rel='stylesheet' type='text/css'>
<link href="/ressources/css/sh/shCore.css" rel="stylesheet" type="text/css" />
<link href="/ressources/css/sh/shCoreRDark.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/ressources/css/main.css" type="text/css">
<link rel="stylesheet" href="/ressources/jquery-ui-1.11.2.custom/jquery-ui.min.css" type="text/css">
<script src="/ressources/js/vendor/modernizr.js"></script>
<script src="/ressources/js/vendor/jquery.js"></script>
<script src="/ressources/js/foundation.min.js"></script>
<script src="/ressources/ckeditor/ckeditor.js"></script>
<script src="/ressources/jquery-ui-1.11.2.custom/jquery-ui.min.js"></script>
<script src="/ressources/jquery-ui-1.11.2.custom/datepicker-fr.js"></script>
<script src="/ressources/js/jquery-maskedinput.1.4.0.min.js"></script>

</head>
<body>
	<div class="sticky">
		<nav class="top-bar" role="navigation" data-topbar data-options="sticky_on: large">
			<ul class="title-area">
				<li class="name">
					<h1><a href="/index.php"><img style="height:30px;margin-right:10px;margin-bottom:4px;"src="/ressources/images/lr1.png" alt="Example" />REVECLAIR</a></h1>
				</li>
				<li class="toggle-topbar menu-icon">
					<a href="#"><span>menu</span></a>
				</li>
			</ul>
			<section class="top-bar-section">
				<?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];?> 
				<ul class="left">
					<li>
					<a <?php if (false !== strpos($url,'team')) { print "class='active'"; 
					} ?> href="/team">Notre petite équipe</a>
					</li>
					<li>
					<a <?php if (false !== strpos($url,'method')) { print "class='active'"; 
					} ?> href="/method">Nos méthodes</a>
					</li>
					<li>
					<a <?php if (false !== strpos($url,'work')) { print "class='active'"; 
					} ?>href="/work">Notre travail</a>
					</li>
					<li><a href="/blog">Blog</a></li>
			<!-- if ( (is_administrator() && (basename($_SERVER['PHP_SELF']) != 'logout.php')) OR (isset($loggedin) &&  $loggedin) ) {print '<li>
			 -->
				</ul>
			    <!-- Right Nav Section -->
			    <ul class="right">
				 <li class="has-dropdown">
				        <a href="#">Admin</a>
				        <ul class="dropdown">
				          <li><a href="index.php?p=add_category">Ajouter une catégorie</a></li>
				          <li><a href="index.php?p=add_entry">Ajouter un post</a></li>
				          <?php if (isset($_GET['id']))
				           echo '<li><a href="index.php?p=edit_category">Modifier la catégorie</a></li>';
				           ?>
				        </ul>
				      </li>
			      <li class="active"><a class="contact" href="contact">Contactez-nous !</a></li>
			    </ul>
			</section>
</nav> 
</div>
<?php
/**
 * header.php - Primary Header
 *
 * Displays all of the <head> section and everything up till the end of #header
 *
 * @package REPLACE_ME Theme
 **/

?><!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php bloginfo('name'); ?><?php wp_title('|', true, 'left'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shortcut icon" href="<?php echo THEME_URL; ?>assets/images/favicon.ico" />

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div id="container">
	<div id="header">
		<h1><span><?php bloginfo('name'); ?></span></h1>
		<nav>
			<?php wp_nav_menu(array('theme_location' => 'main-menu', 'depth' => 1)); ?>
		</nav>
	</div>
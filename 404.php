<?php
/**
 * 404.php - Displays when content is not found
 *
 * @package REPLACE_ME Theme
 **/

get_header();

?>

<div id="main">

	<section class="not-found">
		<h1><?php _e('Content Not Found', THEME_NAME); ?></h1>
		<p><?php _e('The content requested could not be found on this site.  Please try searching using the form below.', THEME_NAME); ?></p>
		<p><?php get_search_form( true ); ?></p>
	</section>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?> 
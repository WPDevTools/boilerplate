<?php
/**
 * index.php - General Content Display routine
 *
 * Used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package REPLACE_ME Theme
 **/

get_header();

?>

<div id="main">

	<section class="posts">

		<?php while ( have_posts() ) : the_post(); ?>
	
			<?php get_template_part( 'content' ); ?>
		
		<?php endwhile; ?>
	
		<?php get_template_part( 'pagination' ); ?>

	</section>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?> 
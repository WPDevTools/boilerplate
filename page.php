<?php
/**
 * page.php - Display a single page with comments
 *
 * @package REPLACE_ME Theme
 **/

get_header();

?>

<div id="main">

	<section class="posts">

		<?php while ( have_posts() ) : the_post(); ?>
	
			<?php get_template_part( 'content', 'page' ); ?>

			<?php comments_template( '', true ); ?>
		
		<?php endwhile; ?>
	
	</section>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?> 
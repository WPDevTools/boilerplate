<?php
/**
 * single.php - Display a single post with comments
 *
 * @package REPLACE_ME Theme
 **/

get_header();

?>

<div id="main">

	<section class="posts">

		<?php while ( have_posts() ) : the_post(); ?>
	
			<?php get_template_part( 'content', 'single' ); ?>

			<?php comments_template( '', true ); ?>
		
		<?php endwhile; ?>
	
	</section>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?> 
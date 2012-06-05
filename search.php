<?php
/**
 * archive.php - Displays archive listings of posts based on category, tag, date, or author
 *
 * @package REPLACE_ME Theme
 **/

get_header();

?>

<div id="main">

	<section class="posts">
		<?php
			if ( have_posts() ) {

				echo('<header><h1>');

				printf( __( 'Search Results for "%s"', THEME_NAME ), get_search_query() );
				
				echo ('</h1></header>');
				
				while ( have_posts() ) {
					the_post();
					get_template_part( 'content' );
				}

				get_template_part( 'pagination' );

			}
		?>

	</section>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?> 
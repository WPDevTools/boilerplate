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

				if (is_author()) {
					printf( __( 'Blog Archives for %s', THEME_NAME ), get_the_author() );
				} elseif ( is_year() ) {
					printf( __( 'Blog Archives for %s', THEME_NAME ), get_the_date('Y') );
				} elseif ( is_month() ) {
					printf( __( 'Blog Archives for %s', THEME_NAME ), get_the_date('F, Y') );
				} elseif ( is_day() ) {
					printf( __( 'Blog Archives for %s', THEME_NAME ), get_the_date('l, F j, Y') );
				} else {
					_e( 'Blog Archives', THEME_NAME );
				}
				
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
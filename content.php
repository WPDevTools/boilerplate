<?php
/**
 * content.php
 *
 * Displays an excerpted post, usually inside an archive Loop
 *
 * @package REPLACE_ME Theme
 */

?>

<?php do_action( 'before_single' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php do_action( 'open_single' ); ?>

	<header>
		<h1 class="title"><a href="<?php the_permalink(); ?>" class="permalink"><?php the_title(); ?></a></h1>
	</header>

	<div class="thumbnail"><?php the_post_thumbnail('thumbnail'); ?></div>

	<div class="content">
		<?php 
			if ( is_archive() || is_search() ) {
				the_excerpt();
			} else {
				the_content( __( 'Read more...', THEME_NAME ) );
				wp_link_pages( array( 
					'before' => '<div class="page-link"><span>' . __( 'Pages:', THEME_NAME ) . '</span>',
					'after' => '</div>',
					'pagelink' => '%'
				) );
			}
		?>
	</div>
	
	<footer>
			<span class="meta">
			<?php
				// The author byline, internationalized
				printf( 
					__( 'Written by <a href="%1$s" rel="author">%2$s</a> on %3$s at %4$s', THEME_NAME ), 
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) , 
					get_the_author(),
					get_the_date(),
					get_the_time()
				);
			?>
			</span>

			<?php if ( have_comments() || comments_open() ) : ?>
			<span class="comment-count"><a href="<?php comments_link(); ?>"><?php comments_number( __( '0 Comments', THEME_NAME ), __( '1 Comment', THEME_NAME ), __( '% Comments', THEME_NAME ) ); ?></a></span>
			<?php endif; // have_comments() || comments_open ?>

		</ul>
	</footer>
	
	<?php do_action( 'close_single' ); ?>
	
</article>

<?php do_action( 'after_single' ); ?>
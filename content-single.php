<?php
/**
 * content-single.php
 *
 * Displays a full, single post entry
 *
 * @package REPLACE_ME Theme
 */

?>

<?php do_action( 'before_single' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php do_action( 'open_single' ); ?>

	<header>
		<h1 class="title"><?php the_title(); ?></h1>
	</header>
	
	<div class="content">
		<?php 
			the_content( __( 'Read more...', THEME_NAME ) );
			wp_link_pages( array( 
				'before' => '<div class="page-link"><span>' . __( 'Pages:', THEME_NAME ) . '</span>',
				'after' => '</div>',
				'pagelink' => '%'
			) );
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

			<?php if ( has_tag() ) : ?><span class="tags"><?php the_tags(); ?></span><?php endif; // has_tags ?>

		</ul>
	</footer>
	
	<?php do_action( 'close_single' ); ?>
	
</article>

<?php do_action( 'after_single' ); ?>

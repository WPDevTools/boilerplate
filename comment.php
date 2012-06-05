<?php
/**
 * comment.php
 *
 * Displays a single comment reply
 *
 * @package REPLACE_ME Theme
 */
 
?>
<li id="li-comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
	<article id="comment-<?php comment_ID(); ?>" class="comment">
		<div class="content">
			<div class="comment-content"><?php comment_text(); ?></div>
		</div>
		<div class="meta">
			<span class="author"><?php comment_author(); ?></span>
			<span class="date"><?php comment_date(); ?></span>
			<span class="time"><?php comment_time(); ?></span>
			<span class="reply">
				<?php comment_reply_link(array_merge( $args, array(
					'reply_text' => __( 'Reply to Comment', THEME_NAME ),
					'depth' => $depth, 
					'max_depth' => $args['max_depth']
				))) ?>
			</span>
		</div>
	</article>

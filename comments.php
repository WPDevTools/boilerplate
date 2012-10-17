<?php
/**
 * comments.php - Comments layout for posts and pages
 *
 * @package REPLACE_ME Theme
 */

global $req;
global $aria_req;

?>

<?php if ( comments_open() ) : ?>

<section id="comments" class="comments">

	<?php if ( have_comments() ) : ?>
		<header>
			<h2 class="title"><?php _e( 'Leave a Comment', THEME_NAME ); ?></h2>
		</header>

		<ol class="comment-list">
			<?php wp_list_comments(array(
				'callback' => array('Theme_Functions','call_comment'),
				'max_depth' => 5
			)); ?>
		</ol>

	<?php endif; // have_comments() ?>
	
	<?php //apply_filters( 'comment_form_default_fields', $fields ); ?>
	<?php $args = array(
		'title_reply' => __( 'Publish a Comment', THEME_NAME ),
		'label_submit' => __( 'Publish Comment', THEME_NAME ),
		'title_reply_to' => __( 'Reply to Comment', THEME_NAME ),
		'cancel_reply_link' => __( 'Cancel', THEME_NAME ),
		'fields' => array(
			'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', THEME_NAME ) . ( $req ? '<span class="required"> *</span>' : '' ) . '</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
			'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', THEME_NAME ) . ( $req ? '<span class="required"> *</span>' : '' ) . '</label> ' . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
			'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website', THEME_NAME ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'
		),
	); ?>

	<?php paginate_comments_links(); ?> 

	<div class="comment-form"><?php comment_form($args, get_the_ID()); ?></div>

</section>

<?php endif; // comments_open() ?>
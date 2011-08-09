<section id="comments">

	<?php /* Important, do not delete */ ?>
	<?php if ( post_password_required() ) : ?>
		<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'starkers' ); ?></p>
	<?php return; endif; ?>
	<?php /* You can edit after this comment */ ?>
	
	
	
	<?php if ( have_comments() ) : ?>
	
		<h3 id="comments-title">
			<?php printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'nakeme' ), number_format_i18n( get_comments_number() ), '' . get_the_title() . '' ); ?>
		</h3>
	
		<section id="comment-list">
			<?php wp_list_comments( array( 'style' => 'div', 'callback' => 'nakeme_comment', 'end-callback' => 'nakeme_comment_close' ) ); ?>
		</section>
	
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav>
			<?php previous_comments_link( __( '&larr; Older Comments', 'nakeme' ) ); ?>
			<?php next_comments_link( __( 'Newer Comments &rarr;', 'nakeme' ) ); ?>
		</nav>
		<?php endif; // check for comment navigation ?>
	
	<?php else : // or, if we don't have comments: ?>
	
		<?php	if ( ! comments_open() ) : ?>
			<p><?php _e( 'Comments are closed.', 'nakeme' ); ?></p>
		<?php endif; // end ! comments_open() ?>
	
	<?php endif; // end have_comments() ?>
	
	<?php comment_form(); ?>

</section>
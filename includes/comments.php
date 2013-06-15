<?php
/**
 * Shows the paginate links
 */
if (!function_exists('nakeme_comments')) : 
	function nakeme_comments($comment, $args, $depth)
	{	
		$GLOBALS['comment'] = $comment;
				extract($args, EXTR_SKIP);
		?>
		<li class="media" id="comment-<?php comment_ID() ?>">

		    <div class="pull-left">
		      <div class="media-object">
		      	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		      </div>
		    </div>
			    
			    
			<div class="media-body">
		      <h4 class="media-heading"><?php echo get_comment_author_link(); ?></h4>

			  <div class="content">

				<?php if ($comment->comment_approved == '0') : ?>
					<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
				<?php endif; ?>

				<?php comment_text() ?>

				<div class="reply">
					<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>

				<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a>
						<?php edit_comment_link(__('(Edit)'),'  ','' );
					?>
				</div>


			  </div>
		 
		    </div>

		</li>
		<?php
	}
endif;

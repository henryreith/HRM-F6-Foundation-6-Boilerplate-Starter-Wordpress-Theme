<?php
/*
Custom feedback comments
https://codex.wordpress.org/Function_Reference/wp_list_comments#Comments_Only_With_A_Custom_Comment_Display
Been a bit Lazy and just modified jointswp.com's until i do my own
*/

function hrm_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<div class="media-object">
			<div class="media-object-section">
				<div class="thumbnail">
					<?php echo get_avatar( $comment, 75 ); ?>
				</div>
			</div>
			<div class="media-object-section">
				<article id="comment-<?php comment_ID(); ?>" class="clearfix">
					<header class="comment-author">
						<?php
			  			// create variable
						$bgauthemail = get_comment_author_email();
						?>
						<?php printf(__('%s', 'hrm'), get_comment_author_link()) ?> on
						<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__(' F jS, Y - g:ia', 'hrm')); ?> </a></time>
						<?php edit_comment_link(__('(Edit)', 'hrm'),'  ','') ?>
					</header>
					<?php if ($comment->comment_approved == '0') : ?>
						<div class="alert alert-info">
							<p><?php _e('Your comment is awaiting moderation.', 'hrm') ?></p>
						</div>
					<?php endif; ?>
					<section class="comment_content clearfix">
						<?php comment_text() ?>
					</section>
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</article>
			</div>
		</div>
		<!-- </li> is added by WordPress automatically -->
		<?php
	}
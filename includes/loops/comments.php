<?php

// Do not delete this section
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
	die ('Please do not load this page directly. Thanks!'); }
	if ( post_password_required() ) { ?>
	<div class="callout warning">
		<?php _e('This post is password protected. Enter the password to view comments.', 'hrm'); ?>
	</div>
	<?php
	return; 
}
// End do not delete section

if (have_comments()) : ?>
<hr>
<h3><?php _e('Feedback', 'hrm'); ?></h3>
<p>
	<i class="fa fa-comment"></i>&nbsp; <?php _e('Comments', 'hrm');  ?>: <?php comments_number(__('None', 'hrm'), '1', '%'); ?>
</p>

<ol class="commentlist">
	<?php wp_list_comments('type=comment&callback=hrm_comment');?>
</ol>

<ul class="pagination">
	<li class="older"><?php previous_comments_link() ?></li>
	<li class="newer"><?php next_comments_link() ?></li>
</ul>

<?php
else :
	if (comments_open()) :
		echo "<hr>";
		echo "<div class='callout'><p>" . __('Be the first to write a comment.', 'hrm') . "</p></div>";
	else :
		echo "<div class='callout warning'><p>" . __('Comments are closed for this post.', 'hrm') . "</p></div>";
	endif;
	endif;
	?>

	<?php if (comments_open()) : ?>
		<section id="respond">
			<h3><?php comment_form_title(__('Your feedback', 'hrm'), __('Responses to %s', 'hrm')); ?></h3>
			<p><?php cancel_comment_reply_link(); ?></p>
			<?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
				<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'hrm'), wp_login_url(get_permalink())); ?></p>
			<?php else : ?>
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
					<?php if (is_user_logged_in()) : ?>
						<p>
							<?php printf(__('Logged in as', 'hrm') . ' <a href="%s/wp-admin/profile.php">%s</a>.', get_option('siteurl'), $user_identity); ?>
							<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'hrm'); ?>"><?php echo __('Log out', 'hrm') . ' <i class="fa fa-arrow-right"></i>'; ?></a>
						</p>
					<?php else : ?>
						<div class="input-group">
							<label for="author"><?php _e('Your name', 'hrm'); if ($req) echo ' <span class="">' . __('(required)', 'hrm') . '</span>'; ?></label>
							<input type="text" class="form-control" name="author" id="author" placeholder="<?php _e('Your name', 'hrm'); ?>" value="<?php echo esc_attr($comment_author); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
						</div>
						<div class="input-group">
							<label for="email"><?php _e('Your email address', 'hrm'); if ($req) echo ' <span class="">' . _e('(required, but will not be published)', 'hrm') . '</span>'; ?></label>
							<input type="email" class="form-control" name="email" id="email" placeholder="<?php _e('Your email address', 'hrm'); ?>" value="<?php echo esc_attr($comment_author_email); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
						</div>
						<div class="input-group">
							<label for="url"><?php echo __('Your website', 'hrm') . ' <span class="">' . __('if you have one (not required)', 'hrm') . '</span>'; ?></label>
							<input type="url" class="form-control" name="url" id="url" placeholder="<?php _e('Your website url', 'hrm'); ?>" value="<?php echo esc_attr($comment_author_url); ?>">
						</div>
					<?php endif; ?>
					<div class="input-group">
						<label for="comment"><?php _e('Your comment', 'hrm'); ?></label>
						<textarea name="comment" class="form-control" id="comment" placeholder="<?php _e('Your comment', 'hrm'); ?>" rows="8" aria-required="true"></textarea>
					</div>
					<p><input name="submit" class="button" type="submit" id="submit" value="<?php _e('Submit comment', 'hrm'); ?>"></p>
					<?php comment_id_fields(); ?>
					<?php do_action('comment_form', $post->ID); ?>
				</form>
			<?php endif; ?>
		</section>
	<?php endif; ?>
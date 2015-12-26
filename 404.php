<?php get_template_part('includes/header'); ?>

<div id="content-wrap" class="row">

	<div class="large-8 columns">
		<div id="content" role="main">
			<div class="callout alert">
				<h1><i class="glyphicon glyphicon-warning-sign"></i> <?php _e('Error', 'hrm'); ?> 404</h1>
				<p><?php _e('The page you were looking for does not exist.', 'hrm'); ?></p>
			</div>
		</div><!-- /#content -->
	</div>

	<div class="large-4 columns" id="sidebar" role="navigation">
		<?php get_template_part('includes/sidebar'); ?>
	</div>

</div><!-- /#content-wrap .row -->

<?php get_template_part('includes/footer'); ?>
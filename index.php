<?php get_template_part('includes/header'); ?>

<div id="content-wrap" class="row">

	<div class="large-8 columns">
		<div id="content" role="main">
			<?php get_template_part('includes/loops/content', get_post_format()); ?>
		</div><!-- /#content -->
	</div>

	<div class="large-4 columns" id="sidebar" role="navigation">
		<?php get_template_part('includes/sidebar'); ?>
	</div>

</div><!-- /#content-wrap .row -->

<?php get_template_part('includes/footer'); ?>
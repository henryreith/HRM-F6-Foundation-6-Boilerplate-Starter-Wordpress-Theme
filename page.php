<?php get_template_part('includes/header'); ?>

<div id="content-wrap" class="row">

	<div class="small-12 medium-offset-1 medium-10 large-offset-0 large-8 columns">
		<div id="content" role="main">
			<?php get_template_part('includes/loops/content', 'page'); ?>
		</div><!-- /#content -->
	</div>

	<div class="small-12 medium-offset-1 medium-10 large-offset-0 large-4 columns" id="sidebar" role="navigation">
		<?php get_template_part('includes/sidebar'); ?>
	</div>

</div><!-- /#content-wrap .row -->

<?php get_template_part('includes/footer'); ?>
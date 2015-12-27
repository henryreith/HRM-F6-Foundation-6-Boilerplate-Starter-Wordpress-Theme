<?php 

/**
 * Template Name: Simple Page
 */

get_template_part('includes/header-simple'); ?>

<div id="content-wrap" class="row">

	<div class="large-12 columns">
		<div id="content" role="main">
			<?php get_template_part('includes/loops/content', 'page'); ?>
		</div><!-- /#content -->
	</div>

</div><!-- /#content-wrap .row -->

<?php get_template_part('includes/footer-simple'); ?>
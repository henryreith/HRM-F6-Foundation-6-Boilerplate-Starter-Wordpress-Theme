<?php 

/**
 * Template Name: Simple Narrow Page
 */

get_template_part('includes/header-simple'); ?>

<div id="content-wrap" class="row align-center">

	<div class="small-12 medium-9 large-8 columns">
		<div id="content" role="main">
			<?php get_template_part('includes/loops/content', 'page'); ?>
		</div><!-- /#content -->
	</div>

</div><!-- /#content-wrap .row -->

<?php get_template_part('includes/footer-simple'); ?>
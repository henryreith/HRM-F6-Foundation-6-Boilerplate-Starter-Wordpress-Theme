<?php get_template_part('components/header/header'); ?>

<div id="content-wrap" class="grid-container grid-container-padded align-center">
	<div class="grid-x grid-padding-x">

		<div class="small-12 medium-10 large-8 cell">
			<div id="content" role="main">
				<h1>Category: <?php echo single_cat_title(); ?></h1>
				<hr>
				<?php get_template_part('components/loops/content', get_post_format()); ?>
			</div><!-- /#content -->
		</div>

		<div class="small-12 medium-10 large-4 cell" id="sidebar" role="navigation">
			<?php get_template_part('components/sidebar'); ?>
		</div>

	</div><!-- /.grid-x .grid-padding-x -->
</div><!-- /#content-wrap .grid-container grid-container-padded -->

<?php get_template_part('components/footer/footer'); ?>
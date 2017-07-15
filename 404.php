<?php get_template_part('components/header/header'); ?>

<div id="content-wrap" class="grid-container grid-container-padded align-center">
	<div class="grid-x grid-padding-x">

		<div class="small-12 medium-10 large-8 cell">
			<div id="content" role="main">
				<div class="callout alert">
					<h1><!---<i class="glyphicon glyphicon-warning-sign"></i>--> <?php _e('Error', 'hrm'); ?> 404</h1>
					<p><?php _e('The page you were looking for does not exist.', 'hrm'); ?></p>
				</div>
			</div><!-- /#content -->
		</div>

		<div class="small-12 medium-10 large-4 cell" id="sidebar" role="navigation">
			<?php get_template_part('components/sidebar'); ?>
		</div>

	</div><!-- /.grid-x .grid-padding-x -->
</div><!-- /#content-wrap .grid-container grid-container-padded -->

<?php get_template_part('components/footer/footer'); ?>
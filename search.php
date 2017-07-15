<?php get_template_part('components/header/header'); ?>

<div id="content-wrap" class="grid-container grid-container-padded align-center">
<div class="grid-x grid-padding-x">

		<div class="small-12 medium-10 large-8 cell">
			<div id="content" role="main">
				<h2><?php _e('Search Results for', 'hrm'); ?> &ldquo;<?php the_search_query(); ?>&rdquo;</h2>
				<hr/>
				<?php get_template_part('components/loops/content', 'search'); ?>
			</div><!-- /#content -->
		</div>

		<div class="small-12 medium-10 large-4 cell" id="sidebar" role="navigation">
			<?php get_template_part('components/sidebar'); ?>
		</div>
		
	</div><!-- /.grid-x .grid-padding-x -->
</div><!-- /#content-wrap .grid-container grid-container-padded -->

<?php get_template_part('components/footer/footer'); ?>
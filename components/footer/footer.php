<footer class="container site-footer">
	<hr/>
	<div class="grid-container grid-container-padded">
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell">
				<?php dynamic_sidebar('footer-widget-area'); ?>
			</div>
		</div>
	</div>
	<hr/>
	<div class="grid-container grid-container-padded">
		<div class="grid-x grid-padding-x">
			<div class="small-12 cell site-sub-footer">
				<p>&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></p>
			</div>
		</div>
	</div>
</footer>
<div class="js-off-canvas-exit"></div>
</div><!-- /.off-canvas-content -->
</div><!-- /.off-canvas-wrapper-inner -->
</div><!-- /.off-canvas-wrapper -->
<?php wp_footer(); ?>
</body>
</html>
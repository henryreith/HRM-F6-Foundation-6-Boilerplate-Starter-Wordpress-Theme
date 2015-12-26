<footer class="container site-footer">
	<hr/>
	<div class="row">
		<div class="small-12 columns">
			<?php dynamic_sidebar('footer-widget-area'); ?>
		</div>
	</div>
	<hr/>
	<div class="row">
		<div class="small-12 columns site-sub-footer">
			<p>&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></p>
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
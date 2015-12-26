<div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
	<a class="title-bar-title" href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a>
	<div class="title-bar-right">
		<button class="menu-icon" type="button" data-toggle></button>
	</div>
</div>

<div class="top-bar" id="main-menu">
	<div class="top-bar-left">
		<ul class="dropdown menu" data-dropdown-menu>
			<li class="menu-text"><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></li>
		</ul>
	</div>
	<div class="top-bar-right">

		<?php
		if ( has_nav_menu( 'top-bar-right' ) ) {
			wp_nav_menu( array(
				'theme_location'  => 'top-bar-right',
				'container'       => false,
				'depth'           => 0,
				'items_wrap'      => '<ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown">%3$s</ul>',
				'menu_class'        => 'top-bar-left',
				'walker'          => new hrm_walker_topbar( array(
					'in_top_bar'      => true,
					'item_type'       => 'li',
					'menu_type'       => 'main-menu'
					) ),
				) );
		} else {
			echo $link = '<ul class="dropdown menu"><li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu here</a></li></ul>';
		}
		?>
	</div>
</div>
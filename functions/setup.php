<?php

function hrm_setup() {
	// add_editor_style('css/editor-style.css');
	add_theme_support('post-thumbnails');
	update_option('thumbnail_size_w', 170);
	update_option('medium_size_w', 470);
	update_option('large_size_w', 970);
}
add_action('init', 'hrm_setup');

if (! isset($content_width))
	$content_width = 600;

function hrm_excerpt_readmore() {
	return '&nbsp; <a href="'. get_permalink() . '">' . '&hellip; ' . __('Read more', 'hrm') . ' <i class="glyphicon glyphicon-arrow-right"></i>' . '</a></p>';
}
add_filter('excerpt_more', 'hrm_excerpt_readmore');

// Add post formats support. See http://codex.wordpress.org/Post_Formats
add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

// Bootstrap pagination

if ( ! function_exists( 'hrm_pagination' ) ) {
	function hrm_pagination() {
		global $wp_query;
		$big = 999999999; // This needs to be an unlikely integer
		$translated = __( 'Page', 'hrm' ); // Supply translatable string
		// For more options and info view the docs for paginate_links()
		// http://codex.wordpress.org/Function_Reference/paginate_links
		$paginate_links = paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'mid_size' => 3,
			'prev_next' => True,
			'prev_text' => __('<i class="fa fa-chevron-left"></i> Previous <span class="show-for-sr">page</span>'),
			'next_text' => __('Next <i class="fa fa-chevron-right"></i><span class="show-for-sr">page</span>'),
			'type' => 'list',
			'before_page_number' => '<span class="show-for-sr">'.$translated.' </span>'
		) );
		$paginate_links = str_replace( "<ul class='page-numbers'>", "<ul class='pagination' role='navigation' aria-label='Pagination'>", $paginate_links );
		$paginate_links = str_replace( "<li><span class='page-numbers current'>", "<li class='current'><span class='show-for-sr'>You're on page </span>", $paginate_links );
		// $paginate_links = str_replace( "<li><span class=' dots'>…</span></li>", "<li class='ellipsis' aria-hidden='true'></li>", $paginate_links ); I can't get this working, however Wordpresses standard ... will be fine for now.
		$paginate_links = preg_replace( "/\s*page-numbers/", "", $paginate_links );
		// Display the pagination if more than one page is found
		if ( $paginate_links ) {
			echo $paginate_links;
		}
	}
}

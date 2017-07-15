<?php
/* Images Set Up */
// Image Widths
function hrm_img_setup() {
	// add_editor_style('css/editor-style.css');
	add_theme_support('post-thumbnails');
	update_option('thumbnail_size_w', 170);
	update_option('medium_size_w', 570);
	update_option('large_size_w', 1024);
}
add_action('init', 'hrm_img_setup');

/*  Image thumbnail sizes
/* ------------------------------------ */
function add_hrm_thumbnailsize(){
    add_image_size( 'full-hd', 1920, 9999 ); // Soft proprtional crop (16x10)
}
add_action( 'after_setup_theme', 'add_hrm_thumbnailsize' );

add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'full-hd' => __( 'HD+ Image Size Name' ),
		// 'half-hd' => __( 'HD+ Image Half Size Name' ),
    ) );
}

// Allow SVG to be added to the media uploader
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

if ( ! isset( $content_width ) ) {
	$content_width = 970;
}

function hrm_excerpt_readmore() {
	return '&nbsp; <a href="'. get_permalink() . '">' . '&hellip; ' . __('Read more', 'hrm') . ' <i class="fa fa-arrow-right"></i>' . '</a></p>';
}
add_filter('excerpt_more', 'hrm_excerpt_readmore');

// Add post formats support. See http://codex.wordpress.org/Post_Formats
// add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

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

// Allow HTML in Author Bio Area
remove_filter('pre_user_description', 'wp_filter_kses');

/* Highlight First Paragraph
function hrm_first_paragraph($content){
  // Testing to see if the content is a Page or Custom Post Type of school, if so, display the text normally (without the class = intro).
  if ( is_single() ) {
  	return preg_replace('/<p([^>]+)?>/', '<p$1 class="intro">', $content, 1);
  } else {
  	return preg_replace('/<p([^>]+)?>/', '<p$1>', $content, 1);
  }
}
add_filter('the_content', 'hrm_first_paragraph'); */
<?php

function hrm_enqueues() {
	
	wp_enqueue_script( 'jquery' );

	wp_register_style('master-css', get_template_directory_uri() . '/css/master.css', false, '6.3.0', null);
	wp_enqueue_style('master-css');

  wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr-custom.min.js', false, null, false);
	wp_enqueue_script('modernizr');

  wp_register_script('foundation-js', get_template_directory_uri() . '/js/foundation.min.js', false, null, true);
	wp_enqueue_script('foundation-js');

	wp_register_script('custom-js', get_template_directory_uri() . '/js/custom.js', false, null, true);
	wp_enqueue_script('custom-js');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'hrm_enqueues', 100);

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' ); // Not sure we need them on our site yet, so no need to load another JS file. 

// Init Foundation 6 Script
function init_foundation6_script_footer(){ ?>
<script>jQuery(function($) {$(document).foundation();});</script>
<?php } 
add_action('wp_footer', 'init_foundation6_script_footer',111);

// Fitvids Script
function add_fitvids_script_footer(){ ?>
<script>jQuery(function($) {$(".row").fitVids();});</script>
<?php } 
add_action('wp_footer', 'add_fitvids_script_footer',112);

// Modernizr Inilised Scripts (Mainly just to pollyfill Object-Fit)
function modernizr_script_footer(){ ?>
<script>
Modernizr.load([
  // Functional polyfills
  {
    // This just has to be truthy
    test : Modernizr.prefixed('objectFit'),
    // socket-io.js and json2.js
    nope : '<?php echo get_template_directory_uri() ?>/js/functional-polyfills.js',
    // You can also give arrays of resources to load.
    // both : [ 'app.js', 'extra.js' ],
    // complete : function () {
      // Run this after everything in this group has downloaded
      // and executed, as well everything in all previous groups
    // }
  }
]);
</script>
<?php } 
add_action('wp_footer', 'modernizr_script_footer',115);
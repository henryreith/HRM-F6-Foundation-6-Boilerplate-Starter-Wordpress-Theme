<?php
/*
The Page Service Loop
=============
*/
?>
<div class="row align-center">
<?php 
// WP_Query arguments
$args = array(
    'post_type'              => array( 'inf_services_used' ),
    'order'                  => 'DESC',
    'orderby'                => 'title',
);

// The Query
$hrm_service_query = new WP_Query( $args );

// The Loop
if ( $hrm_service_query->have_posts() ) {
    while ( $hrm_service_query->have_posts() ) {
        $hrm_service_query->the_post(); 

        $thumb_id = get_post_thumbnail_id();
        $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
        $thumb_url = $thumb_url_array[0];
        $thumb_alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
        $hrm_service_url = get_post_meta(get_the_ID(), '_hrm_inf_services_used_url', true);

        ?>
        <article class="small-6 medium-3 large-2 columns">
            <a href="<?php echo $hrm_service_url; ?>" title="<?php the_title()?>">
                <figure class="hrm-aspectbox hrm-ratio16_9 imgwrapper transition-default hrm-transform-scale">
                    <div class="hrm-ratio-content allimg">
                        <img class="lazy hrm-object-fit-cover" data-src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt; ?>">
                        <noscript><img src="<?php echo $thumb_url; ?>" alt="<?php echo $thumb_alt; ?>" /></noscript>
                    </div>
                </figure>
            </a>
        </article>
        <?php }
} else {
    // no posts found
}

// Restore original Post Data
wp_reset_postdata();
?>
</div>
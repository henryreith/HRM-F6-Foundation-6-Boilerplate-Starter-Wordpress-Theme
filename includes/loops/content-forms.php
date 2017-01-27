<?php
/*
Forms Loop
=============
*/
?>
<div class="row small-up-1 medium-up-2 large-up-3">
<?php 
// WP_Query arguments
$args = array(
    'post_type'              => array( 'inf_forms' ),
    'order'                  => 'DESC',
);

// The Query
$hrm_service_query = new WP_Query( $args );

// The Loop
if ( $hrm_service_query->have_posts() ) {
    while ( $hrm_service_query->have_posts() ) {
        $hrm_service_query->the_post(); 

        $hrm_form_title = get_post_meta(get_the_ID(), '_hrm_inf_form_title', true);
        $hrm_form_company = get_post_meta(get_the_ID(), '_hrm_inf_form_company', true);
        $hrm_form_description = get_post_meta(get_the_ID(), '_hrm_inf_form_description', true);
        $hrm_form_url = get_post_meta(get_the_ID(), '_hrm_inf_form_used_link', true);
        /* -- Company Logo's -- */
        // Infiniti Logo
        $hrm_option_inf_logo_img_id = get_option('hrm_inf_company_logo_inf');
        $hrm_option_inf_logo_img_url_array = wp_get_attachment_image_src($hrm_option_inf_logo_img_id, 'large', true);
        $hrm_option_inf_logo_url = $hrm_option_inf_logo_img_url_array[0];
        $hrm_option_inf_logo_alt = get_post_meta($hrm_option_inf_logo_img_id, '_wp_attachment_image_alt', true);

        // Simply Logo
        $hrm_option_sh_logo_img_id = get_option('hrm_inf_company_logo_sh');
        $hrm_option_sh_logo_img_url_array = wp_get_attachment_image_src($hrm_option_sh_logo_img_id, 'large', true);
        $hrm_option_sh_logo_url = $hrm_option_sh_logo_img_url_array[0];
        $hrm_option_sh_logo_alt = get_post_meta($hrm_option_sh_logo_img_id, '_wp_attachment_image_alt', true);

        // SpringCom Logo
        $hrm_option_sc_logo_img_id = get_option('hrm_inf_company_logo_sc');
        $hrm_option_sc_logo_img_url_array = wp_get_attachment_image_src($hrm_option_sc_logo_img_id, 'large', true);
        $hrm_option_sc_logo_url = $hrm_option_sc_logo_img_url_array[0];
        $hrm_option_sc_logo_alt = get_post_meta($hrm_option_sc_logo_img_id, '_wp_attachment_image_alt', true);

        // Define company logo used based on dropdown in form post
        if ($hrm_form_company == 'infiniti') {
            $hrm_form_company_logo_image_url = $hrm_option_inf_logo_url;
            $hrm_form_company_logo_image_alt = $hrm_option_inf_logo_alt;
        } elseif ($hrm_form_company == 'simplyheadsets') {
            $hrm_form_company_logo_image_url = $hrm_option_sh_logo_url;
            $hrm_form_company_logo_image_alt = $hrm_option_sh_logo_alt;
        } elseif ($hrm_form_company == 'springcom') {
            $hrm_form_company_logo_image_url = $hrm_option_sc_logo_url;
            $hrm_form_company_logo_image_alt = $hrm_option_sc_logo_alt;
        }

        ?>
        <a href="<?php echo $hrm_form_url; ?>" title="<?php echo $hrm_form_title; ?>" class="column transition-default hrm-transform-scale">
            <div class="card">
                <div class="row align-right">
                    <div class="small-4 medium-3 column">
                        <figure class="hrm-aspectbox imgwrapper">
                            <div class="hrm-ratio-content allimg">
                                <img class="lazy hrm-object-fit-cover" data-src="<?php echo $hrm_form_company_logo_image_url; ?>" alt="<?php echo $hrm_form_company_logo_image_alt; ?>">
                                <noscript><img src="<?php echo $hrm_form_company_logo_image_url; ?>" alt="<?php echo $hrm_form_company_logo_image_altt; ?>" /></noscript>
                            </div>
                        </figure>
                    </div>
                </div>
                <div class="card-section text-center">
                    <h3><?php echo $hrm_form_title; ?></h3>
                    <p><?php echo $hrm_form_description; ?></p>
                </div>
            </div>
        </a>
        <?php }
} else {
    // no posts found
}

// Restore original Post Data
wp_reset_postdata();
?>
</div>
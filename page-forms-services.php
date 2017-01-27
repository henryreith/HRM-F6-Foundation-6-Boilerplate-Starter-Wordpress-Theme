<?php 

/**
 * Template Name: Forms & Services We Use
 */

get_template_part('includes/header-simple'); ?>

<?php 
// Infiniti Logo
$hrm_option_inf_logo_img_id = get_option('hrm_inf_company_logo_inf');
$hrm_option_inf_logo_img_url_array = wp_get_attachment_image_src($hrm_option_inf_logo_img_id, 'large', true);
$hrm_option_inf_logo_url = $hrm_option_inf_logo_img_url_array[0];
$hrm_option_inf_logo_alt = get_post_meta($hrm_option_inf_logo_img_id, '_wp_attachment_image_alt', true);
?>

<div id="content-wrap" class="row align-center">

	<div class="small-12 columns">
		<div id="content" role="main">
			<div class="row align-center">
				<div class="small-5 medium-3 column s-section-margin-bottom">
					<figure class="hrm-aspectbox hrm-ratio16_9 imgwrapper">
						<div class="hrm-ratio-content allimg">
							<img class="lazy hrm-object-fit-cover" data-src="<?php echo $hrm_option_inf_logo_url; ?>" alt="<?php echo $hrm_option_inf_logo_alt; ?>">
							<noscript><img src="<?php echo $hrm_option_inf_logo_url; ?>" alt="<?php echo $hrm_option_inf_logo_alt; ?>" /></noscript>
						</div>
					</figure>
				</div>
			</div>
			<section class="text-center s-section-margin-bottom">
				<!-- Service Logo's -->
				<h2 class="text-center">Services We Used</h2>
				<?php get_template_part('includes/loops/content', 'services'); ?>
			</section>
			<section class="s-section-margin-bottom">
				<!-- Form's Info -->
				<h2 class="text-center">Forms We Use</h2>
				<?php get_template_part('includes/loops/content', 'forms'); ?>
			</section>
		</div><!-- /#content -->
	</div>

</div><!-- /#content-wrap .row -->

<?php get_template_part('includes/footer-simple'); ?>
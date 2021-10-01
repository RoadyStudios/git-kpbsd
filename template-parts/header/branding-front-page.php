<?php
/**
 * Template part for displaying the header branding
 *
 * @package kpbsd_codebase
 */

namespace WP_Rig\WP_Rig;

?>

<div class="site-branding header-bkgd-slider-wrapper">

	<div class="box-logo-slider-wrapper">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php the_custom_logo(); ?></a>
	</div>

	<div class="box-slider-wrapper">
		<?php echo do_shortcode( '[smartslider3 slider=4]' ); ?>
	</div>
</div><!-- .site-branding -->

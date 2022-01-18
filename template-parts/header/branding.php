<?php
/**
 * Template part for displaying the header branding
 *
 * @package kpbsd_codebase
 */

namespace WP_Rig\WP_Rig;

?>

<div class="site-branding header-bkgd-wrapper">
	<div class="box-logo-wrapper">
		<?php the_custom_logo(); ?>
	</div>

	<div class="box-title-wrapper">
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	</div>

	<div class="box-icon-wrapper">
		<div class="quick-icons">
			<a href="http://mail.g.kpbsd.org/"><img src="https://kpbsd.org/wp-content/uploads/quick-icons-gmail.png" alt="gmail icon"></a>
			<a href="http://drive.google.com/a/g.kpbsd.org/"><img src="https://kpbsd.org/wp-content/uploads/quick-icons-google-drive.png" alt="google drive icon"></a>
			<a href="https://www.instagram.com/kenaipeninsulaschools/"><img src="https://kpbsd.org/wp-content/uploads/quick-icons-instagram.png" alt="instagram icon"></a>
			<a href="http://www.facebook.com/kpbsd"><img src="https://kpbsd.org/wp-content/uploads/quick-icons-facebook.png" alt="facebook icon"></a>
			<a href="http://www.twitter.com/kpbsd"><img src="https://kpbsd.org/wp-content/uploads/quick-icons-twitter.png" alt="twitter icon"></a>
			<a href="https://www.youtube.com/KPBSDvideos"><img src="https://kpbsd.org/wp-content/uploads/quick-icons-youtube.png" alt="youtube icon"></a>
			<a href="https://kpbsd.zoom.us/"><img src="https://kpbsd.org/wp-content/uploads/quick-icons-zoom.png" alt="zoom icon"></a>
		</div>
	</div>
</div><!-- .site-branding -->
<div class="breadcrumb-wrapper">
	<?php echo do_shortcode( '[flexy_breadcrumb]' ); ?>
</div>

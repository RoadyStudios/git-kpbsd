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
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="Kenai Peninsula Borough School District Logo link" rel="home"><?php the_custom_logo(); ?></a>
	</div>

	<div class="box-title-wrapper">
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="Kenai Peninsula Borough School District link" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	</div>

	<div class="box-icon-wrapper">
		<div class="quick-icons">
			<a href="https://kpbsd.instructure.com/" target="_blank" aria-label="canvas icon link"><img src="https://kpbsd.org/wp-content/uploads/core-graphics/quick-icons-canvas.png" alt="canvas icon"></a>
			<a href="http://mail.g.kpbsd.org/" target="_blank" aria-label="gmail icon link"><img src="https://kpbsd.org/wp-content/uploads/core-graphics/quick-icons-gmail.png" alt="gmail icon"></a>
			<a href="http://drive.google.com/a/g.kpbsd.org/" target="_blank" aria-label="google drive icon link"><img src="https://kpbsd.org/wp-content/uploads/core-graphics/quick-icons-google-drive.png" alt="google drive icon"></a>
			<a href="https://kpbsd.org/students-parents/powerschool/" target="_blank" aria-label="powerschool icon link"><img src="https://kpbsd.org/wp-content/uploads/core-graphics/quick-icons-powerschool.png" alt="powerschool icon"></a>
			<a href="https://kpbsd.org/counselor-corner-and-onestop/" target="_blank" aria-label="onestop icon link"><img src="https://kpbsd.org/wp-content/uploads/core-graphics/quick-icons-onestop.png" alt="onestop icon"></a>
			<a href="https://kpbsd.zoom.us/" target="_blank" aria-label="zoom icon link"><img src="https://kpbsd.org/wp-content/uploads/core-graphics/quick-icons-zoom.png" alt="zoom icon"></a>
		</div>
	</div>
</div><!-- .site-branding -->
<div class="breadcrumb-wrapper">
	<?php echo do_shortcode( '[flexy_breadcrumb]' ); ?>
</div>

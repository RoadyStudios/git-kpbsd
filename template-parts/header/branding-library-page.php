<?php
/**
 * Template part for displaying the header branding
 *
 * @package kpbsd_codebase
 */

namespace WP_Rig\WP_Rig;

?>

<div class="site-branding header-library-wrapper">

	<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?> Library</a></h1>

</div><!-- .site-branding -->
<div class="breadcrumb-wrapper">
	<?php echo do_shortcode( '[flexy_breadcrumb]' ); ?>
</div>

<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kpbsd_codebase
 */

namespace WP_Rig\WP_Rig;

if ( ! kpbsd_codebase()->is_primary_sidebar_active() ) {
	return;
}

kpbsd_codebase()->print_styles( 'kpbsd-codebase-sidebar', 'kpbsd-codebase-widgets' );

?>
<aside id="secondary" class="primary-sidebar widget-area">
	<?php kpbsd_codebase()->display_primary_sidebar(); ?>
</aside><!-- #secondary -->

<?php
/**
 * Template part for displaying the footer widgetized area.
 *
 * @package kpbsd_codebase
 */

namespace WP_Rig\WP_Rig;

if ( ! kpbsd_codebase()->is_footer_widgets_active() ) {
	return;
}

kpbsd_codebase()->print_styles( 'kpbsd-codebase-footer-widgets', 'kpbsd-codebase-widgets' );

?>
<aside id="footer-widgets" class="footer-widgets-area widget-area">
	<?php kpbsd_codebase()->display_footer_widgets(); ?>
</aside><!-- footer-widgets -->

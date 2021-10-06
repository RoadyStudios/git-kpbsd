<?php
/**
 * Template part for displaying a post's footer
 *
 * @package kpbsd_codebase
 */

namespace WP_Rig\WP_Rig;

?>

<?php
	if ( ! is_front_page() ) {
		echo ( '<footer class="entry-footer">' );
		get_template_part( 'template-parts/content/entry_taxonomies', get_post_type() );

		get_template_part( 'template-parts/content/entry_actions', get_post_type() );
		echo ( '</footer><!-- .entry-footer -->' );
	}
?>

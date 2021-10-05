<?php
/**
 * Template part for displaying a post's header
 *
 * @package kpbsd_codebase
 */

namespace WP_Rig\WP_Rig;

?>

<?php

if ( ! is_search() ) {
	get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() );
}

if ( ! is_front_page() ) {
	echo ( '<header class="entry-header">' );
	get_template_part( 'template-parts/content/entry_title', get_post_type() );
}

if ( ! is_front_page() && ! is_page() ) {
	get_template_part( 'template-parts/content/entry_meta', get_post_type() );
}

echo ( '</header><!-- .entry-header -->' );

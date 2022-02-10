<?php
/**
 * Template part for displaying a post's header
 *
 * @package kpbsd_codebase
 */

namespace WP_Rig\WP_Rig;

?>

<?php

if ( ! is_front_page() ) {
	echo ( '<header class="entry-header">' );
	get_template_part( 'template-parts/content/entry_title', get_post_type() );
}

if ( ! is_front_page() && ! is_page() && ! is_category( '173' ) ) {
	get_template_part( 'template-parts/content/entry_meta', get_post_type() );
}

if ( is_category( '173' ) ) {
	echo ( '<div class="entry-meta"><strong>Expires On:</strong> ' );
	echo do_shortcode( '[postexpirator]' );
	echo ( '</div>' );
	echo ( '<div class="entry-content"><p><strong>Type:</strong> ' );
	the_field( 'Type' );
	echo ( '<br/><strong>Who:</strong> ' );
	the_field( 'Who' );
	echo ( '<br/><strong>Amount:</strong> ' );
	the_field( 'Amount' );
	echo ( '</p></div>' );
}

if ( ! is_search() ) {
	get_template_part( 'template-parts/content/entry_thumbnail', get_post_type() );
}

echo ( '</header><!-- .entry-header -->' );

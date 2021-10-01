<?php
/**
 * KPBSD CodeBase functions and definitions
 *
 * This file must be parseable by PHP 5.2.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kpbsd_codebase
 */

define( 'KPBSD_CODEBASE_MINIMUM_WP_VERSION', '4.5' );
define( 'KPBSD_CODEBASE_MINIMUM_PHP_VERSION', '7.0' );

// Bail if requirements are not met.
if ( version_compare( $GLOBALS['wp_version'], KPBSD_CODEBASE_MINIMUM_WP_VERSION, '<' ) || version_compare( phpversion(), KPBSD_CODEBASE_MINIMUM_PHP_VERSION, '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

// Include WordPress shims.
require get_template_directory() . '/inc/wordpress-shims.php';

// Setup autoloader (via Composer or custom).
if ( file_exists( get_template_directory() . '/vendor/autoload.php' ) ) {
	require get_template_directory() . '/vendor/autoload.php';
} else {
	/**
	 * Custom autoloader function for theme classes.
	 *
	 * @access private
	 *
	 * @param string $class_name Class name to load.
	 * @return bool True if the class was loaded, false otherwise.
	 */
	function _kpbsd_codebase_autoload( $class_name ) {
		$namespace = 'WP_Rig\WP_Rig';

		if ( strpos( $class_name, $namespace . '\\' ) !== 0 ) {
			return false;
		}

		$parts = explode( '\\', substr( $class_name, strlen( $namespace . '\\' ) ) );

		$path = get_template_directory() . '/inc';
		foreach ( $parts as $part ) {
			$path .= '/' . $part;
		}
		$path .= '.php';

		if ( ! file_exists( $path ) ) {
			return false;
		}

		require_once $path;

		return true;
	}
	spl_autoload_register( '_kpbsd_codebase_autoload' );
}

// Load the `kpbsd_codebase()` entry point function.
require get_template_directory() . '/inc/functions.php';

// Initialize the theme.
call_user_func( 'WP_Rig\WP_Rig\kpbsd_codebase' );

// create shortcode for emergency notification posts on top header
add_shortcode( 'categorypost', 'cat_post' );

function cat_post( $atts ) {

	// attributes for shortcode.
	if ( isset( $atts['cat'] ) ) {$cats = $atts['cat'];} else {return;}
	if ( isset( $atts['posts_per_page'] ) ) {
		$posts_per_page = $atts['posts_per_page'];
	} else {
		$posts_per_page = -1;
	}

	// get the category posts.
	$category = get_category_by_slug( $cats );
	if ( ! is_object( $category ) ) {
		return;
	}
	$args  = array(
		'cat'            => $category->term_id,
		'posts_per_page' => $posts_per_page,
	);
	$posts = get_posts( $args );

	// create the list output.
	if ( count( $posts ) > 0 ) {
		foreach ( $posts as $post ) {
			$link    = get_permalink( $post->ID );
			$title   = $post->post_title;
			$image   = get_post_thumbnail( $post->ID, 'thumbnail' );
			$output .= '<div id="postrow-'.$post->ID.'" class="postrow">';
			$output .= '<a class ="postlink" href="'.$link.'">' . $image;
			$output .= '<h5 class="posttitle">' .$title . '</h5></a></div>';
		}
	}
	return $output;
}

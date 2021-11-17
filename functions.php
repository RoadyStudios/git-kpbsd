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

// BoardDocs API call for Document Library.
if ( ! wp_next_scheduled( 'update_dlp_document_list' ) ) {
	wp_schedule_event( time(), 'weekly', 'get_boarddocs_from_api' );
}
add_action( 'wp_ajax_nopriv_get_boarddocs_from_api', 'get_boarddocs_from_api' );
add_action( 'wp_ajax_get_boarddocs_from_api', 'get_boarddocs_from_api' );
/** Creating our BoardDocs API function */
function get_boarddocs_from_api() {

	$boarddocs = [];

	$results = wp_remote_retrieve_body( wp_remote_get( 'https://api.kpbsd.k12.ak.us/boarddocs/v1/onlinepolicy/exhibits' ) );

	$results = json_decode( $results );

	if ( ! is_array( $results ) || empty( $results ) ) {
		return false;
	}

	$boarddocs[] = $results;

	foreach ( $boarddocs[0] as $dlp_document ) {

		$dlp_document_slug = sanitize_title( $dlp_document->number . '-' . $dlp_document->title );

		$dlp_document_title = ( $dlp_document->number . ' ' . $dlp_document->title );

		$existing_dlp_document = get_page_by_path( $dlp_document_slug, 'OBJECT', 'dlp_document' );

		if ( null === $existing_dlp_document ) {

			$inserted_dlp_document = wp_insert_post(
				[
					'post_name'   => $dlp_document_slug,
					'post_title'  => $dlp_document_title,
					'post_type'   => 'dlp_document',
					'post_status' => 'publish',
				]
			);

			wp_set_object_terms( $inserted_dlp_document, 'board-policy', 'doc_categories', false );

			if ( is_wp_error( $inserted_dlp_document ) ) {
				continue;
			}

			$fillable = [
				'field_6171a592587c7'  => 'id',
				'_dlp_direct_link_url' => 'link',
				'field_6171a637587c9'  => 'number',
				'field_6171a64a587ca'  => 'section',
				'field_6171a65a587cb'  => 'title',
				'field_6172de8c9928a'  => 'last_revised',
			];

			foreach ( $fillable as $key => $name ) {
				update_field( $key, $dlp_document->$name, $inserted_dlp_document );
			}
		}else {
			$existing_dlp_document_id        = $existing_dlp_document->ID;
			$existing_dlp_document_timestamp = get_field( 'last_revised', $existing_dlp_document_id );

			if ( $dlp_document->updated_at >= $existing_dlp_document_timestamp ) {
				$fillable = [
					'field_6171a592587c7'  => 'id',
					'_dlp_direct_link_url' => 'link',
					'field_6171a637587c9'  => 'number',
					'field_6171a64a587ca'  => 'section',
					'field_6171a65a587cb'  => 'title',
					'field_6172de8c9928a'  => 'last_revised',
				];

				foreach ( $fillable as $key => $name ) {
					update_field( $key, $dlp_document->$name, $existing_dlp_document_id );
				}
			}
		}

		update_post_meta( $inserted_dlp_document, '_dlp_document_link_type', 'url', 'none' );

	}

}

<?php
/**
 * Template part for displaying the page header of the currently displayed page
 *
 * @package kpbsd_codebase
 */

namespace WP_Rig\WP_Rig;

if ( is_404() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'kpbsd-codebase' ); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_home() && ! have_posts() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php esc_html_e( 'Nothing Found', 'kpbsd-codebase' ); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_home() && ! is_front_page() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php single_post_title(); ?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_search() ) {
	?>
	<header class="page-header">
		<h1 class="page-title">
			<?php
			printf(
				/* translators: %s: search query */
				esc_html__( 'Search Results for: %s', 'kpbsd-codebase' ),
				'<span>' . get_search_query() . '</span>'
			);
			?>
		</h1>
	</header><!-- .page-header -->
	<?php
} elseif ( is_category( '173' ) ) {
	?>
	<header class="page-header">
		<?php
			single_cat_title( '<h1 class="page-title">', '</h1>' );
		?>
		<h3>&nbsp;To have a scholarship opportunity added, please contact <a href="mailto:JTomrdle@kpbsd.k12.ak.us" alt="email Jackie Tomrdle">Jackie Tomrdle</a>.
		</h3>
	</header><!-- .page-header -->
	<?php
} elseif ( is_archive() ) {
	?>
	<header class="page-header">
		<?php
			single_cat_title( '<h1 class="page-title">', '</h1>' );
		?>
	</header><!-- .page-header -->
	<?php
}

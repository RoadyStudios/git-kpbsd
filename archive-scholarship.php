<?php
/**
 * The template for displaying category archives.
 *
 * When active, applies to all category archives.
 * To target a specific category, rename file to category-{slug/id}.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#category
 *
 * @package kpbsd_codebase
 */

namespace WP_Rig\WP_Rig;

get_header();

kpbsd_codebase()->print_styles( 'kpbsd-codebase-content' );

?>
	<main id="primary" class="site-main">
		<?php

		$myargs = array(
			'meta_key' => '_expiration-date',
			'orderby'  => 'meta_value',
			'order'    => 'ASC',
		);

		query_posts($myargs);

		if ( have_posts() ) {

			get_template_part( 'template-parts/content/page_header' );

			echo "<div class='category-grid'>";

			while ( have_posts() ) {
				the_post();
				?>

				<article aria-labelledby="post-<?php the_title(); ?>" id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

				<?php

				echo ( '<header class="entry-header">' );
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

				echo ( '<div class="entry-meta"><strong>Expires On:</strong> ' );
				echo do_shortcode( '[postexpirator]' );
				echo ( '</div>' );

				echo ( '</header><!-- .entry-header-->' );
				?>

				</article><!-- #post-<?php the_ID(); ?> -->
				<?php

			}

			echo '</div>';

			get_template_part( 'template-parts/content/pagination' );

		} else {

			get_template_part( 'template-parts/content/error' );

		}

		wp_reset_query();

		?>
	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();

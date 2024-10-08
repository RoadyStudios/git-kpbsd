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
	<header class='page-header'>
			<h1 class='page-title'>KPBSD Student Job Board</h1>
			<h3> To have a job opportunity added, please <a href='https://forms.office.com/r/8PhxqjcmHH' title='Submit a Job Listing'>Submit a Job Listing</a></h3>
		</header>

	<div class="wp-container-1 wp-block-group alignfull has-theme-white-background-color has-background">
		<div class="wp-block-group__inner-container">
			<div class="wp-block-columns alignfull">
				<div class="wp-block-column job-solo" style="flex-basis:80%">
					<?php
					if ( have_posts() ) {
							get_template_part( 'template-parts/content/page_header' );
							echo "<div class='custom-category-grid'>";
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
					?>
				</div>
			</div>
		</div>
	</div>

	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();

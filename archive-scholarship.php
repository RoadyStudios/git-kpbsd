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
			<h1 class='page-title'>KPBSD Scholarship Database</h1>
			<h3> To have a scholarship opportunity added, please <a href='https://kpbsd.org/scholarship-submission' title='Submit a Scholarship'>Submit a Scholarship</a></h3>
			<!--<p> If you have questions or need assistance, contact <a href='mailto:jtomrdle@kpbsd.k12.ak.us' title='email Jackie Tomrdle'>Jackie Tomrdle</a></p>-->
		</header>

	<div class="wp-container-1 wp-block-group alignfull has-theme-white-background-color has-background">
		<div class="wp-block-group__inner-container">
			<div class="wp-block-columns alignfull">
				<div class="wp-block-column z-filters" style="flex-basis:25%">
					<?php echo do_shortcode( '[fe_sort id="3"]' ); ?>
					<?php echo do_shortcode( '[fe_widget title="Scholarship Filters"]' ); ?>
				</div>
				<div class="wp-block-column z-solo" style="flex-basis:75%">
					<?php echo do_shortcode( '[fe_chips mobile="yes" title="Applied Filters"]' ); ?>
					<?php
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
					?>
				</div>
			</div>
		</div>
	</div>

	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();

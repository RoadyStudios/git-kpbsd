<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package kpbsd_codebase
 */

namespace WP_Rig\WP_Rig;

get_header();

kpbsd_codebase()->print_styles( 'kpbsd-codebase-content' );

?>
	<main id="primary" class="site-main">
		<p>
			&nbsp;&nbsp;Are you searching for Documents or Forms? For more focused results, try <a href="https://kpbsd.org/document-library/" title="Search Docs and Forms">searching within Docs &amp; Forms</a>.
		</p>
		<?php
		if ( have_posts() ) {

			get_template_part( 'template-parts/content/page_header' );
			echo "<div class='wp-block-columns'><div class='wp-block-column></div><div class='wp-block-column z-content'>";
			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/content/entry', get_post_type() );
			}
			echo "</div><div class='wp-block-column'></div></div>";
			get_template_part( 'template-parts/content/pagination' );
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();

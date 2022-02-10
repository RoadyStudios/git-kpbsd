<?php
/**
 * Template Name: Custom Post Template
 * Template Post Type: post
 *
 * When active, by adding the heading above and providing a custom name
 * this template becomes available in a drop-down panel in the editor.
 *
 * Filename can be anything.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/#creating-page-templates-for-specific-post-types
 *
 * @package kpbsd_codebase
 */

namespace WP_Rig\WP_Rig;

get_header();

kpbsd_codebase()->print_styles( 'kpbsd-codebase-content' );

?>
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) {
			the_post();
			?>

		<article aria-label="<?php the_ID(); ?>" id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

			<?php get_template_part( 'template-parts/content/entry_header', get_post_type() ); ?>

			<div class="entry-content">
				<p>	<strong>Expires On:</strong> <?php echo do_shortcode( '[postexpirator]' ); ?><br/>
					<strong>Type:</strong> <?php the_field( 'Type' ); ?><br/>
					<strong>Who:</strong> <?php the_field( 'Who' ); ?><br/>
					<strong>Amount:</strong> <?php the_field( 'Amount' ); ?><br/>
				</p>
			</div>

			<?php get_template_part( 'template-parts/content/entry_content', get_post_type() ); ?>

			<?php get_template_part( 'template-parts/content/entry_footer', get_post_type() ); ?>

		</article><!-- #post-<?php the_ID(); ?> -->

			<?php
			if ( is_singular( get_post_type() ) ) {
				// Show post navigation only when the post type is 'post' or has an archive.
				if ( 'post' === get_post_type() || get_post_type_object( get_post_type() )->has_archive ) {
					the_post_navigation(
						[
							'prev_text' => '<div class="post-navigation-sub"><span>' . esc_html__( 'Previous:', 'kpbsd-codebase' ) . '</span></div>%title',
							'next_text' => '<div class="post-navigation-sub"><span>' . esc_html__( 'Next:', 'kpbsd-codebase' ) . '</span></div>%title',
						]
					);
				}

				// Show comments only when the post type supports it and when comments are open or at least one comment exists.
				if ( post_type_supports( get_post_type(), 'comments' ) && ( comments_open() || get_comments_number() ) ) {
					comments_template();
				}
			}
		}
		?>
	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();

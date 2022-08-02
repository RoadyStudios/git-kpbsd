<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kpbsd_codebase
 */

namespace WP_Rig\WP_Rig;

?>

<?php if ( is_front_page() ) : ?>
	<div class="legacy-tab-wrapper">
		<?php echo do_shortcode( '[ctu_ultimate_oxi  id="2"]' ); ?>
	</div>

	<!--<div class="maps">
		<div class="schools-header">
			<h2>KPBSD School Locations</h2>
			<ul>
				<li><a href="https://kpbsd.org/schools">School List</a></li>
			</ul>
		</div>
		<div class="google-maps-schools">
			<div class="overlay" onClick="style.pointerEvents='none'"></div>
			<iframe defer title="Google Map with all KPBSD schools pinned" src="https://www.google.com/maps/d/embed?mid=1vWpuE74SBo9jh9mOSQIbdyimSYgOzIur" style="position:relative; top:-46px; border:none;" width="100%" height="450"></iframe>
		</div>
	</div>-->

	<div class="full-width-color-divider"></div>
<?php endif; ?>

	<footer id="colophon" class="site-footer">
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="mission-statement">
			<p>Our Mission: <em>Supporting students in life success</em></p>
		</div>
		<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>
		<?php get_template_part( 'template-parts/footer/info' ); ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script async src="https://siteimproveanalytics.com/js/siteanalyze_6014905.js"></script>

</body>
</html>

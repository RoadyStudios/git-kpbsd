<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kpbsd_codebase
 */

namespace WP_Rig\WP_Rig;

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php
	if ( ! kpbsd_codebase()->is_amp() ) {
		?>
		<script>document.documentElement.classList.remove( 'no-js' );</script>
		<?php
	}
	?>

	<?php wp_head(); ?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src=https://www.googletagmanager.com/gtag/js?id=G-908JKWR48R></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-908JKWR48R');
</script>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'kpbsd-codebase' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="announcement">
			<a href="https://www.kpbsd.k12.ak.us" title="KPBSD current site">
				<img src="https://kpbsd.org/wp-content/uploads/launch/21-0806_launch-banner_thank-you.jpg" alt="launch banner - thank you"></a>
				<p>
					Comments? Found a bug? Broken link? <a href="https://forms.office.com/r/D0hdz56pvJ" target="_blank" title="Comment box">Please let us know</a>.
				</p>
		</div>

		<?php get_template_part( 'template-parts/header/navigation' ); ?>

		<div class="emergencies">
			<?php query_posts('cat=91'); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
			<?php wp_reset_query(); ?>
		</div>

		<?php get_template_part( 'template-parts/header/custom_header' ); ?>

		<?php
		if ( is_front_page() ) {
			get_template_part( 'template-parts/header/branding-front-page', get_post_type() );
		} else {
			get_template_part( 'template-parts/header/branding', get_post_type() );
		}
		?>

	</header><!-- #masthead -->

<?php
/**
 * Template part for displaying a post's title
 *
 * @package kpbsd_codebase
 */

namespace WP_Rig\WP_Rig;

if ( is_singular( get_post_type() ) ) {
	the_title( '<h1 class="entry-title">', '</h1>' );
} else { ?>
<h2 class="entry-title" aria-label="<?php the_title_attribute(); ?>">
	<a href="<?php the_permalink(); ?>" rel="bookmark">
		<?php the_title(); ?>
	</a>
</h2>
	<?php
}

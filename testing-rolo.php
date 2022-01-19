<?php
/**
 * Template Name: Custom Page Template
 *
 * When active, by adding the heading above and providing a custom name
 * this template becomes available in a drop-down panel in the editor.
 *
 * Filename can be anything.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/#creating-custom-page-templates-for-global-use
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

			get_template_part( 'template-parts/content/entry', 'page' );
		}
		?>

		<form action="" method="post">
			<h2>Enter query:</h2>
			<p><em>Please enter at least three (3) characters to search for a first or last name</em></p>
			<input type="text" name="t1">
			<input type="submit" name="ame">
			<?php
			/**
			 * generate_before_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_before_main_content' );

			if(isset($_POST['ame'])){
				echo "good";
				$curl = curl_init();

				curl_setopt_array($curl, [
					CURLOPT_URL => "https://api.kpbsd.k12.ak.us/rolodex/v1/staff?name=".$_POST['t1'],
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "GET"
				]);

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				if ($err) {
					echo "cURL Error #:" . $err;
				} else {
					echo $response;
				}
			}
			?>
		</form>

	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();

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

		<form id="staff-finder-form">
			<h2>Enter query:</h2>
			<p><em>Please enter at least three (3) characters to search for a first or last name</em></p>
			<input type="search" id="name-search" name="name" placeholder="First Last"></input>

			<select id="select-departments" name="department">
				<option value="">School / Department</option>
			</select>

			<select id="select-position" name="employeeType">
				<option value="">Position</option>
			</select>

			<button type="button" id="submit-form">Search</button>
			<input type="reset" name="reset" id="reset">
		</form>

		<div id="results-wrapper">
			<h2><strong>Results shown here</strong></h2>
			<table id="results-table">
				<thead>
					<th>Name</th>
					<th>Position</th>
					<th>Department</th>
					<th>Email</th>
				</thead>
				<tbody id="staff-results">

				</tbody>
			</table>
		</div>

		<script>
			let userInput = "";
			$( "#results-wrapper" ).hide();

			$.ajax({
				url: 'https://api.kpbsd.k12.ak.us/rolodex/v1/departments'
			}).done(function(data) {
				let userDept = $('#select-departments');

				$(data).each(function (key, value) {
					$(userDept).append('<option value="' + value + '">' + value + '</option>');
				});
			});

			$.ajax({
				url: 'https://api.kpbsd.k12.ak.us/rolodex/v1/employeeTypes'
			}).done(function(data) {
				let userType = $('#select-position');

				$(data).each(function (key, value) {
					$(userType).append('<option value="' + value + '">' + value + '</option>');
				});
			});

			//start: ========= only needed for dev =========
			function showValues(){
				userInput = $('form').serialize();

				$( "#results" ).empty();
				$( "#results" ).append( userInput );
			}

			$("#name-search").on("change", showValues);
			$("select").on("change", showValues);
			showValues();
			//end: ========= only needed for dev =========

			$('#submit-form').click(()=>{ //this should end up being an on submit function not click
				var url = 'https://api.kpbsd.k12.ak.us/rolodex/v1/staff?' + userInput;
				$( "#results-wrapper" ).show();
				let staffTable = $('#staff-results');

				$(staffTable).find('tr').empty();
				$(staffTable).append('<tr><td colspan="4">Searching...</td></tr>');
				$.ajax({
					url: url
				})
				.done((res)=>{
					let found = res

					$(staffTable).find('tr').empty();
					if(res.length == 0){
						$(staffTable).append('<tr><td colspan="4">No results were returned.</td></tr>');
					}
					$.each(found, (i, e)=>{
						$(staffTable).append('<tr><td>' +e.fullName+ '</td><td>' +e.employeeType+ '</td><td>' +e.department+ '</td></tr>');
					})
				})

			});

			$('#reset').click(()=>{
				$( "#results" ).empty();
				$( "#staff-results" ).empty();
			})

		</script>

	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();

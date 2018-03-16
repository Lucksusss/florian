<?php
/**
 * Template Name: FrontPage
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HB_Education
 */

	get_header(); 
?>
<main id="main">
	<?php
		get_template_part( 'sections/section', 'carousel' );

		get_template_part( 'sections/section', 'feature' );

		get_template_part( 'sections/section', 'course' );

		get_template_part( 'sections/section', 'testimonial' );

		get_template_part( 'sections/section', 'teacher' );

		get_template_part( 'sections/section', 'activities' );
	?>
</main>
<?php
	get_footer();
?>
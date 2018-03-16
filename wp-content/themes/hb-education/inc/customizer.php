<?php
/**
 * HB Education Theme Customizer
 *
 * @package HB_Education
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hb_education_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* Load dropdown-category.php */
	require get_template_directory() . '/hummingbird/customizer/dropdown-category.php';

	/* Load sanitize.php */
	require get_template_directory() . '/hummingbird/customizer/sanitize.php';

	/* Load customizer-front.php */
	require get_template_directory() . '/hummingbird/customizer/customizer-front.php';

	/* Load customizer-header.php */
	require get_template_directory() . '/hummingbird/customizer/customizer-header.php';

	/* Load customizer-footer.php */
	require get_template_directory() . '/hummingbird/customizer/customizer-footer.php';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'hb_education_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'hb_education_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'hb_education_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function hb_education_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function hb_education_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hb_education_customize_preview_js() {
	wp_enqueue_script( 'hb-education-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'hb_education_customize_preview_js' );

<?php
$wp_customize->add_panel( 'hb_education_footer_options', array(
		'title'			=> esc_html__( 'HB Footer Options', 'hb-education' ),
		'description'	=> esc_html__( 'HB Footer Options', 'hb-education' ),
		'priority'		=> 40	
	) );

$wp_customize->add_section( 'hb_education_bottom_footer', array(
		'priority'		=> 20,
		'title'			=> esc_html__( 'Buttom Footer Options', 'hb-education' ),
		'description'	=> esc_html__( 'Copyright and Social', 'hb-education' ),
		'panel'			=> 'hb_education_footer_options'	
	) );

	$wp_customize->add_setting( 'hb_education_facebook_url', array(
		'sanitize_callback' => 'hb_education_sanitize_url',
		'capability'		=> 'edit_theme_options',
		'default' => ''
	) );

	$wp_customize->add_control( 'hb_education_facebook_url', array(
		'label'		=> esc_html__( 'Facebook URL', 'hb-education' ),
		'section'	=> 'hb_education_bottom_footer',
		'settings'	=> 'hb_education_facebook_url',
		'type'		=> 'text'
	) );
	$wp_customize->add_setting( 'hb_education_twitter_url', array(
		'sanitize_callback' => 'hb_education_sanitize_url',
		'capability'		=> 'edit_theme_options',
		'default' => ''
	) );

	$wp_customize->add_control( 'hb_education_twitter_url', array(
		'label'		=> esc_html__( 'Twitter URL', 'hb-education' ),
		'section'	=> 'hb_education_bottom_footer',
		'settings'	=> 'hb_education_twitter_url',
		'type'		=> 'text'
	) );

	$wp_customize->add_setting( 'hb_education_linkedin_url', array(
		'sanitize_callback' => 'hb_education_sanitize_url',
		'capability'		=> 'edit_theme_options',
		'default' => ''
	) );

	$wp_customize->add_control( 'hb_education_linkedin_url', array(
		'label'		=> esc_html__( 'Linked In URL', 'hb-education' ),
		'section'	=> 'hb_education_bottom_footer',
		'settings'	=> 'hb_education_linkedin_url',
		'type'		=> 'text'
	) );

	$wp_customize->add_setting( 'hb_education_google_url', array(
		'sanitize_callback' => 'hb_education_sanitize_url',
		'capability'		=> 'edit_theme_options',
		'default' => ''
	) );

	$wp_customize->add_control( 'hb_education_google_url', array(
		'label'		=> esc_html__( 'Google Plus URL', 'hb-education' ),
		'section'	=> 'hb_education_bottom_footer',
		'settings'	=> 'hb_education_google_url',
		'type'		=> 'text'
	) );

	$wp_customize->add_setting( 'hb_education_pinterest_url', array(
		'sanitize_callback' => 'hb_education_sanitize_url',
		'capability'		=> 'edit_theme_options',
		'default' => ''
	) );

	$wp_customize->add_control( 'hb_education_pinterest_url', array(
		'label'		=> esc_html__( 'Pinterest URL', 'hb-education' ),
		'section'	=> 'hb_education_bottom_footer',
		'settings'	=> 'hb_education_pinterest_url',
		'type'		=> 'text'
	) );
	
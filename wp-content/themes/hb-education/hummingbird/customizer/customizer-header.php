<?php
$wp_customize->add_panel( 'hb_education_header_options', array(
		'title'			=> esc_html__( 'HB Header Options', 'hb-education' ),
		'description'	=> esc_html__( 'HB Education Header Options', 'hb-education' ),
		'priority'		=> 30	
	) );

$wp_customize->add_section( 'hb_education_top_header', array(
		'priority'		=> 20,
		'title'			=> esc_html__( 'Top Left Announcement', 'hb-education' ),
		'description'	=> esc_html__( 'Top Left Announcement', 'hb-education' ),
		'panel'			=> 'hb_education_header_options'	
	) );


$wp_customize->add_setting( 'hb_education_notice_title', array(
		'sanitize_callback' => 'sanitize_text_field',
		'capability'		    => 'edit_theme_options',
		'default' => ''
	) );

	$wp_customize->add_control( 'hb_education_notice_title', array(
		'label'		=> esc_html__( 'Top Left Notice Title', 'hb-education' ),
		'section'	=> 'hb_education_top_header',
		'settings'	=> 'hb_education_notice_title',
		'type'		=> 'text'
	) );

	$wp_customize->add_setting('hb_education_notice_category',array(
		'sanitize_callback' => 'hb_education_sanitize_category',
		'capability'		    => 'edit_theme_options',
		'default' =>  '1',
	) );

	$wp_customize->add_control(
		new HB_Education_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'hb_education_notice_category', array(
		'label' => esc_html__('Choose Notice Category','hb-education'),
		'section' => 'hb_education_top_header',
		'settings' => 'hb_education_notice_category',
		'type'=> 'dropdown-taxonomies',
	) ) );

	$wp_customize->add_section( 'hb_education_top_right', array(
		'priority'		=> 20,
		'title'			=> esc_html__( 'Middle Header Address', 'hb-education' ),
		'description'	=> esc_html__( 'Middle Header Contact Address', 'hb-education' ),
		'panel'			=> 'hb_education_header_options'	
	) );

	$wp_customize->add_setting( 'hb_education_phone_number', array(
		'sanitize_callback' => 'sanitize_text_field',
		'capability'		    => 'edit_theme_options',
		'default' => ''
	) );

	$wp_customize->add_control( 'hb_education_phone_number', array(
		'label'		=> esc_html__( 'Top Right Phone Number', 'hb-education' ),
		'section'	=> 'hb_education_top_right',
		'settings'	=> 'hb_education_phone_number',
		'type'		=> 'text'
	) );


	$wp_customize->add_setting( 'hb_education_email_address', array(
		'sanitize_callback' => 'sanitize_text_field',
		'capability'		    => 'edit_theme_options',
		'default' => ''
	) );

	$wp_customize->add_control( 'hb_education_email_address', array(
		'label'		=> esc_html__( 'Top Right Email Address', 'hb-education' ),
		'section'	=> 'hb_education_top_right',
		'settings'	=> 'hb_education_email_address',
		'type'		=> 'text'
	) );

	$wp_customize->add_setting( 'hb_education_street_address', array(
		'sanitize_callback' => 'sanitize_text_field',
		'capability'		    => 'edit_theme_options',
		'default' => ''
	) );

	$wp_customize->add_control( 'hb_education_street_address', array(
		'label'		=> esc_html__( 'Top Right Street Address', 'hb-education' ),
		'section'	=> 'hb_education_top_right',
		'settings'	=> 'hb_education_street_address',
		'type'		=> 'text'
	) );
	$wp_customize->add_setting( 'hb_education_state_country', array(
		'sanitize_callback' => 'sanitize_text_field',
		'capability'		    => 'edit_theme_options',
		'default' => ''
	) );

	$wp_customize->add_control( 'hb_education_state_country', array(
		'label'		=> esc_html__( 'Top Right State & Country', 'hb-education' ),
		'section'	=> 'hb_education_top_right',
		'settings'	=> 'hb_education_state_country',
		'type'		=> 'text'
	) );


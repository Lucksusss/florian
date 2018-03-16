<?php
	$wp_customize->add_panel( 'hb_education_theme_options', array(
		'title'			=> esc_html__( 'HB Front Page Options', 'hb-education' ),
		'description'	=> esc_html__( 'HB Education Theme Customization Options', 'hb-education' ),
		'priority'		=> 10	
	) );

	/*-----------------------------------------
			Carousel Section Theme Option
	-----------------------------------------*/
	//About section enable disable



	$wp_customize->add_section( 'hb_education_carousel_section', array(
		'priority'		=> 20,
		'title'			=> esc_html__( 'Slider/Carousel Section', 'hb-education' ),
		'description'	=> esc_html__( 'Customization Options For Image Carousel', 'hb-education' ),
		'panel'			=> 'hb_education_theme_options'	
	) );


	$wp_customize->add_setting( 'hb_education_slider_section_enable', array(
	    'capability'		    => 'edit_theme_options',
	    'default'			    => 0,
	    'sanitize_callback'     => 'hb_education_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'hb_education_slider_section_enable', array(
	    'label'                 =>  __( 'Enable Slider Section', 'hb-education' ),
	    'section'               => 'hb_education_carousel_section',
	    'type'                  => 'checkbox',
	    'priority'              => 10,
	    'settings'              => 'hb_education_slider_section_enable',
	) );

	$wp_customize->add_setting('hb_education_carousel_category',array(
		'sanitize_callback' => 'hb_education_sanitize_select',
		'default' =>  '1',
	) );
	$wp_customize->add_control(
		new HB_Education_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'hb_education_carousel_category', array(
		'label' => esc_html__('Choose Category','hb-education'),
		'section' => 'hb_education_carousel_section',
		'settings' => 'hb_education_carousel_category',
		'type'=> 'dropdown-taxonomies',
	) ) );

	$wp_customize->add_setting( 'hb_education_carousel_no', array(
		'sanitize_callback'	=> 'hb_education_sanitize_number_absint',
		'default' => 3
	) );

	$wp_customize->add_control( 'hb_education_carousel_no', array(
		'label'			=> esc_html__( 'Number of Images', 'hb-education' ),
		'section'		=> 'hb_education_carousel_section',
		'type'			=> 'number',
		'input_attrs'     => array( 'min' => 1, 'max' => 5, 'step' => 1 ),
	) );


	/*-----------------------------------------
			Feature Section Theme Option
	-----------------------------------------*/

	$wp_customize->add_section( 'hb_education_feature_section', array(
    'capability'            => 'edit_theme_options',
    'priority'              => 30,
    'title'                 => __( 'Front Feature Section', 'hb-education' ),
    'description'           => __( 'Select pages for ColorFull Feature section, you can also change the icon per page', 'hb-education' ),
    'panel'				=> 'hb_education_theme_options'
	) );

	//About section enable disable

	$wp_customize->add_setting( 'hb_education_feature_section_enable', array(
	    'capability'		    => 'edit_theme_options',
	    'default'			    => 0,
	    'sanitize_callback'     => 'hb_education_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'hb_education_feature_section_enable', array(
	    'label'                 =>  __( 'Enable About Us', 'hb-education' ),
	    'section'               => 'hb_education_feature_section',
	    'type'                  => 'checkbox',
	    'priority'              => 10,
	    'settings'              => 'hb_education_feature_section_enable',
	) );

	// about Us page 1 and Icon 1

	$wp_customize->add_setting( 'hb_education_feature_page_1', array(
	    'capability'		    => 'edit_theme_options',
	    'default'			    => '',
	    'sanitize_callback'     => 'hb_education_sanitize_dropdown_pages'
	) );

	$wp_customize->add_control( 'hb_education_feature_page_1', array(
	    'label'                 =>  __( 'Select First Page', 'hb-education' ),
	    'section'               => 'hb_education_feature_section',
	    'type'                  => 'dropdown-pages',
	    'priority'              => 20,
	    'settings'              => 'hb_education_feature_page_1',
	) );

	$wp_customize->add_setting( 'hb_education_feature_icon_1', array(
	    'capability'		    => 'edit_theme_options',
	    'default'			    => '',
	    'sanitize_callback'     => 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'hb_education_feature_icon_1', array(
	    'label'                 =>  __( 'Icon For first Tab ', 'hb-education' ),
	    'description'           => sprintf( __( 'Use font awesome icon: Eg: %1$s See more here %2$s %3$s', 'hb-education' ), 'fa fa-user','<a href="'.esc_url('http://fontawesome.io/icons/').'" target="_blank">','</a>' ),
	    'section'               => 'hb_education_feature_section',
	    'type'                  => 'text',
	    'priority'              => 30,
	    'settings' => 'hb_education_feature_icon_1',
	) );

	//about us Second  page

	$wp_customize->add_setting( 'hb_education_feature_page_2', array(
	    'capability'		    => 'edit_theme_options',
	    'default'			    => '',
	    'sanitize_callback'     => 'hb_education_sanitize_dropdown_pages'
	) );

	$wp_customize->add_control( 'hb_education_feature_page_2', array(
	    'label'                 =>  __( 'Select Second Page ', 'hb-education' ),
	    'section'               => 'hb_education_feature_section',
	    'type'                  => 'dropdown-pages',
	    'priority'              => 40,
	    'settings'              => 'hb_education_feature_page_2',
	) );

	$wp_customize->add_setting( 'hb_education_feature_icon_2', array(
	    'capability'		    => 'edit_theme_options',
	    'default'			    => '',
	    'sanitize_callback'     => 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'hb_education_feature_icon_2', array(
	    'label'                 =>  __( 'Icon For Secont Tab', 'hb-education' ),
	    'description'           =>  __( 'Font awesome Icon Example fa fa-user', 'hb-education' ),
	    'section'               => 'hb_education_feature_section',
	    'type'                  => 'text',
	    'priority'              => 50,
	    'settings' => 'hb_education_feature_icon_2',
	) );

	//about us Third 
	$wp_customize->add_setting( 'hb_education_feature_page_3', array(
	    'capability'		    => 'edit_theme_options',
	    'default'			    => '',
	    'sanitize_callback'     => 'hb_education_sanitize_dropdown_pages'
	) );

	$wp_customize->add_control( 'hb_education_feature_page_3', array(
	    'label'                 =>  __( 'Select Third Page ', 'hb-education' ),
	    'section'               => 'hb_education_feature_section',
	    'type'                  => 'dropdown-pages',
	    'priority'              => 60,
	    'settings'              => 'hb_education_feature_page_3',
	) );

	$wp_customize->add_setting( 'hb_education_feature_icon_3', array(
	    'capability'		    => 'edit_theme_options',
	    'default'			    => '',
	    'sanitize_callback'     => 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'hb_education_feature_icon_3', array(
	    'label'                 =>  __( 'Icon For Third Tab', 'hb-education' ),
	    'description'           =>  __( 'Font awesome Icon example fa fa-question', 'hb-education' ),
	    'section'               => 'hb_education_feature_section',
	    'type'                  => 'text',
	    'priority'              => 70,
	    'settings' => 'hb_education_feature_icon_3',
	) );

	//about us Forth
	$wp_customize->add_setting( 'hb_education_feature_page_4', array(
	    'capability'		    => 'edit_theme_options',
	    'default'			    => '',
	    'sanitize_callback'     => 'hb_education_sanitize_dropdown_pages'
	) );

	$wp_customize->add_control( 'hb_education_feature_page_4', array(
	    'label'                 =>  __( 'Select Fourth Page ', 'hb-education' ),
	    'section'               => 'hb_education_feature_section',
	    'type'                  => 'dropdown-pages',
	    'priority'              => 80,
	    'settings'              => 'hb_education_feature_page_4',
	) );

	$wp_customize->add_setting( 'hb_education_feature_icon_4', array(
	    'capability'		    => 'edit_theme_options',
	    'default'			    => '',
	    'sanitize_callback'     => 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'hb_education_feature_icon_4', array(
	    'label'                 =>  __( 'Icon For Fourth Tab', 'hb-education' ),
	    'description'           =>  __( 'Font awesome Icon example fa fa-rocket', 'hb-education' ),
	    'section'               => 'hb_education_feature_section',
	    'type'                  => 'text',
	    'priority'              => 90,
	    'settings' => 'hb_education_feature_icon_4',
	) );


	/*-----------------------------------------
			Course Section Theme Option
	-----------------------------------------*/
	$wp_customize->add_section( 'hb_education_course_section', array(
		'priority'		=> 20,
		'title'			=> esc_html__( 'Course Section', 'hb-education' ),
		'description'	=> esc_html__( 'Customization Options For Course', 'hb-education' ),
		'panel'			=> 'hb_education_theme_options'	
	) );

	$wp_customize->add_setting( 'hb_education_course_title', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => ''
	) );

	$wp_customize->add_control( 'hb_education_course_title', array(
		'label'		=> esc_html__( 'Section Title', 'hb-education' ),
		'section'	=> 'hb_education_course_section',
		'settings'	=> 'hb_education_course_title',
		'type'		=> 'text'
	) );

	$wp_customize->add_setting('hb_education_course_category',array(
		'sanitize_callback' => 'hb_education_sanitize_category',
		'default' =>  '1',
	) );

	$wp_customize->add_control(
		new HB_Education_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'hb_education_course_category', array(
		'label' => esc_html__('Choose Category','hb-education'),
		'section' => 'hb_education_course_section',
		'settings' => 'hb_education_course_category',
		'type'=> 'dropdown-taxonomies',
	) ) );

	$wp_customize->add_setting( 'hb_education_course_no', array(
		'sanitize_callback'	=> 'hb_education_sanitize_number_absint',
		'default' => 3
	) );

	$wp_customize->add_control( 'hb_education_course_no', array(
		'label'			=> esc_html__( 'Number of Courses', 'hb-education' ),
		'section'		=> 'hb_education_course_section',
		'type'			=> 'number',
		'input_attrs'     => array( 'min' => 3, 'max' => 6, 'step' => 3 ),
	) );


	/*-----------------------------------------
			Testimonial Section Theme Option
	-----------------------------------------*/
	$wp_customize->add_section( 'hb_education_testimonial_section', array(
		'priority'		=> 20,
		'title'			=> esc_html__( 'Testimonial Section', 'hb-education' ),
		'description'	=> esc_html__( 'Customization Options For Testimonial', 'hb-education' ),
		'panel'			=> 'hb_education_theme_options'	
	) );

	$wp_customize->add_setting( 'hb_education_testimonial_title', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => ''
	) );

	$wp_customize->add_control( 'hb_education_testimonial_title', array(
		'label'		=> esc_html__( 'Section Title', 'hb-education' ),
		'section'	=> 'hb_education_testimonial_section',
		'settings'	=> 'hb_education_testimonial_title',
		'type'		=> 'text'
	) );

	$wp_customize->add_setting('hb_education_testimonial_category',array(
		'sanitize_callback' => 'hb_education_sanitize_category',
		'default' =>  '1',
	) );

	$wp_customize->add_control(
		new HB_Education_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'hb_education_testimonial_category', array(
		'label' => esc_html__('Choose Category','hb-education'),
		'section' => 'hb_education_testimonial_section',
		'settings' => 'hb_education_testimonial_category',
		'type'=> 'dropdown-taxonomies',
	) ) );

	$wp_customize->add_setting( 'hb_education_testimonial_no', array(
		'sanitize_callback'	=> 'hb_education_sanitize_number_absint',
		'default' => 1
	) );

	$wp_customize->add_control( 'hb_education_testimonial_no', array(
		'label'			=> esc_html__( 'Number of Testimonials', 'hb-education' ),
		'section'		=> 'hb_education_testimonial_section',
		'type'			=> 'number',
		'input_attrs'     => array( 'min' => 1, 'max' => 5, 'step' => 1 ),
	) );


	/*-----------------------------------------
			Teacher Section Theme Option
	-----------------------------------------*/
	$wp_customize->add_section( 'hb_education_teacher_section', array(
		'priority'		=> 20,
		'title'			=> esc_html__( 'Teacher Section', 'hb-education' ),
		'description'	=> esc_html__( 'Customization Options For Teacher', 'hb-education' ),
		'panel'			=> 'hb_education_theme_options'	
	) );

	$wp_customize->add_setting( 'hb_education_teacher_title', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => ''
	) );

	$wp_customize->add_control( 'hb_education_teacher_title', array(
		'label'		=> esc_html__( 'Section Title', 'hb-education' ),
		'section'	=> 'hb_education_teacher_section',
		'settings'	=> 'hb_education_teacher_title',
		'type'		=> 'text'
	) );

	$wp_customize->add_setting('hb_education_teacher_category',array(
		'sanitize_callback' => 'hb_education_sanitize_category',
		'default' =>  '1',
	) );

	$wp_customize->add_control(
		new HB_Education_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'hb_education_teacher_category', array(
		'label' => esc_html__('Choose Category','hb-education'),
		'section' => 'hb_education_teacher_section',
		'settings' => 'hb_education_teacher_category',
		'type'=> 'dropdown-taxonomies',
	) ) );

	$wp_customize->add_setting( 'hb_education_teacher_no', array(
		'sanitize_callback'	=> 'hb_education_sanitize_number_absint',
		'default' => 4
	) );

	$wp_customize->add_control( 'hb_education_teacher_no', array(
		'label'			=> esc_html__( 'Number of Teachers', 'hb-education' ),
		'section'		=> 'hb_education_teacher_section',
		'type'			=> 'number',
		'input_attrs'     => array( 'min' => 4, 'max' => 8, 'step' => 4 ),
	) );


	/*-----------------------------------------
			Blog Section Theme Option
	-----------------------------------------*/
	$wp_customize->add_section( 'hb_education_blog_section', array(
		'priority'		=> 20,
		'title'			=> esc_html__( 'Blog Section', 'hb-education' ),
		'description'	=> esc_html__( 'Customization Options For Blog', 'hb-education' ),
		'panel'			=> 'hb_education_theme_options'	
	) );

	$wp_customize->add_setting( 'hb_education_blog_title', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => ''
	) );

	$wp_customize->add_control( 'hb_education_blog_title', array(
		'label'		=> esc_html__( 'Section Title', 'hb-education' ),
		'section'	=> 'hb_education_blog_section',
		'settings'	=> 'hb_education_blog_title',
		'type'		=> 'text'
	) );

	$wp_customize->add_setting('hb_education_blog_category',array(
		'sanitize_callback' => 'hb_education_sanitize_category',
		'default' =>  '1',
	) );

	$wp_customize->add_control(
		new HB_Education_Theme_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'hb_education_blog_category', array(
		'label' => esc_html__('Choose Category','hb-education'),
		'section' => 'hb_education_blog_section',
		'settings' => 'hb_education_blog_category',
		'type'=> 'dropdown-taxonomies',
	) ) );

	$wp_customize->add_setting( 'hb_education_blog_no', array(
		'sanitize_callback'	=> 'hb_education_sanitize_number_absint',
		'default' => 3
	) );

	$wp_customize->add_control( 'hb_education_blog_no', array(
		'label'			=> esc_html__( 'Number of Blog Posts', 'hb-education' ),
		'section'		=> 'hb_education_blog_section',
		'type'			=> 'number',
		'input_attrs'     => array( 'min' => 3, 'max' => 6, 'step' => 3 ),
	) );
?>
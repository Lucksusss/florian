<?php
/**
 * About configuration
 *
 * @package CorporateX_Pro
 */

$config = array(
	'menu_name' => esc_html__( 'HB Education Setup', 'hb-education' ),
	'page_name' => esc_html__( 'HB Education Setup', 'hb-education' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'hb-education' ), 'HB Education' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'hb-education' ), 'HB Education' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','hb-education' ),
			'url'  => 'https://wpcodefactory.com/item/hb-education-wordpress-theme/',
			),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','hb-education' ),
			'url'  => 'http://demo.hummingbirdthemes.com/hb-education',
			),
		'documentation_url' => array(
			'text'   => esc_html__( 'Upgrade to Pro','hb-education' ),
			'url'    => 'https://wpcodefactory.com/item/hb-education-wordpress-theme/',
			'button' => 'primary',
			),
		),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'hb-education' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'hb-education' ),
		'support'             => esc_html__( 'Support', 'hb-education' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'hb-education' ),
			'text'                => esc_html__( 'Find step by step instructions to setup theme easily.', 'hb-education' ),
			'button_label'        => esc_html__( 'View documentation', 'hb-education' ),
			'button_link'         => 'https://wpcodefactory.com/item/hb-education-wordpress-theme/',
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'hb-education' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'hb-education' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'hb-education' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=hb-education-about&tab=recommended_actions' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'hb-education' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'hb-education' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'hb-education' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			
			'front-page' => array(
				'title'       => esc_html__( 'Setting Static Front Page','hb-education' ),
				'description' => esc_html__( 'Create a new page to display on front page ( Ex: Home ) and assign "Home" template. Select A static page then Front page and Posts page to display front page specific sections. Note: Static page will be set automatically when you import demo content.', 'hb-education' ),
				'id'          => 'front-page',
				'check'       => ( 'page' === get_option( 'show_on_front' ) ) ? true : false,
				'help'        => '<a href="' . esc_url( wp_customize_url() ) . '?autofocus[section]=static_front_page" class="button button-secondary">' . esc_html__( 'Static Front Page', 'hb-education' ) . '</a>',
			),

			'one-click-demo-import' => array(
				'title'       => esc_html__( 'One Click Demo Import', 'hb-education' ),
				'description' => esc_html__( 'Please install the One Click Demo Import plugin to import the demo content. After activation go to Appearance >> Import Demo Data and import it.', 'hb-education' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'one-click-demo-import',
				'id'          => 'one-click-demo-import',
			),
			
		),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'hb-education' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'hb-education' ),
			'button_label' => esc_html__( 'Contact Support', 'hb-education' ),
			'button_link'  => esc_url( 'https://wpcodefactory.com/item/hb-education-wordpress-theme/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'hb-education' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'hb-education' ),
			'button_label' => esc_html__( 'View Documentation', 'hb-education' ),
			'button_link'  => 'https://wpcodefactory.com/item/hb-education-wordpress-theme/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Customization Request', 'hb-education' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'This is 100% free theme and has premium version.Either Upgrade to Pro or  Feel free to contact us any time if you need any customization service.', 'hb-education' ),
			'button_label' => esc_html__( 'Upgrade to Pro', 'hb-education' ),
			'button_link'  => 'https://wpcodefactory.com/item/hb-education-wordpress-theme/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
	),


);
HB_Education_About::init( apply_filters( 'corporate_x_about_filter', $config ) );
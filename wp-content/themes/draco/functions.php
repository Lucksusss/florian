<?php
/**
 * Draco functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Draco
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function draco_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/draco
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'draco' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'draco', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'draco-featured-image', 2000, 1200, true );

	add_image_size( 'draco-thumbnail-avatar', 100, 100, true );

	// content width
	if ( ! isset( $content_width ) ) $content_width = 1099;

	$GLOBALS['content_width'] = $content_width;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'draco' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 150,
		'height'      => 150,
		'flex-width'  => true,
		'flex-height'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'style.css') );

}
add_action( 'after_setup_theme', 'draco_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function draco_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'draco' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'draco' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer top', 'draco' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'draco' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer bottom', 'draco' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'draco' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	

}
add_action( 'widgets_init', 'draco_widgets_init' );


function draco_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'draco_pingback_header' );

/**
 * Enqueue scripts and styles.
 */
function draco_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'draco-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery');
	wp_enqueue_script('draco-script', get_template_directory_uri().'/assets/js/draco.js', array( 'jquery' ));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'draco_scripts' );

/* customize */
function draco_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'header', array(
	  'title' => __( 'Header', 'draco' ),
	  'description' => __( 'Header options', 'draco' ),
	  'priority' => 160,
	  'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'header_image', array(
  	'default' => get_template_directory_uri().'/assets/img/header.jpeg',
  	'type' => 'theme_mod',
  	'sanitize_callback' => 'sanitize_file_name',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'header_image', array(
	  'label' => __( 'Home Header Image', 'draco' ),
	  'section' => 'header',
	  'mime_type' => 'image',
	) ) );

	$wp_customize->add_setting( 'archive_image', array(
  	'default' => get_template_directory_uri().'/assets/img/archive.jpeg',
  	'type' => 'theme_mod',
  	'sanitize_callback' => 'sanitize_file_name',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'archive_image', array(
	  'label' => __( 'Categories Header Image', 'draco' ),
	  'section' => 'header',
	  'mime_type' => 'image',
	) ) );

	$wp_customize->add_setting( 'single_image', array(
  	'default' => get_template_directory_uri().'/assets/img/single.jpeg',
  	'type' => 'theme_mod',
  	'sanitize_callback' => 'sanitize_file_name',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'single_image', array(
	  'label' => __( 'Post Header Image', 'draco' ),
	  'section' => 'header',
	  'mime_type' => 'image',
	) ) );

	$wp_customize->add_setting( 'page_image', array(
  	'default' => get_template_directory_uri().'/assets/img/page.jpeg',
  	'type' => 'theme_mod',
  	'sanitize_callback' => 'sanitize_file_name',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'page_image', array(
	  'label' => __( 'Page Header Image', 'draco' ),
	  'section' => 'header',
	  'mime_type' => 'image',
	) ) );

	$wp_customize->add_setting( 'search_image', array(
  	'default' => get_template_directory_uri().'/assets/img/search.jpeg',
  	'type' => 'theme_mod',
  	'sanitize_callback' => 'sanitize_file_name',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'search_image', array(
	  'label' => __( 'Search Header Image', 'draco' ),
	  'section' => 'header',
	  'mime_type' => 'image',
	) ) );

	// design options

	$wp_customize->add_section( 'design', array(
	  'title' => __( 'Design', 'draco' ),
	  'description' => __( 'Design options', 'draco' ),
	  'priority' => 160,
	  'capability' => 'edit_theme_options',
	) );


	$wp_customize->add_setting( 'font', array(
  	'default' => 'circular',
  	'type' => 'theme_mod',
  	'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'font', array(
	  'label' => __( 'Font family', 'draco' ),
	  'type' => 'text',
	  'section' => 'design',
	) );

	$wp_customize->add_setting( 'head_txt_color', array(
  	'default' => '#eee',
  	'type' => 'theme_mod',
  	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'head_txt_color', array(
	  'label' => __( 'Header text color', 'draco' ),
	  'section' => 'design',
	  'mime_type' => 'color',
	) ) );

	$wp_customize->add_setting( 'head_bg_color', array(
  	'default' => '#222',
  	'type' => 'theme_mod',
  	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'head_bg_color', array(
	  'label' => __( 'Header background color', 'draco' ),
	  'section' => 'design',
	  'mime_type' => 'color',
	) ) );

	$wp_customize->add_setting( 'body_txt_color', array(
  	'default' => '#777',
  	'type' => 'theme_mod',
  	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_txt_color', array(
	  'label' => __( 'Text color', 'draco' ),
	  'section' => 'design',
	  'mime_type' => 'color',
	) ) );

	$wp_customize->add_setting( 'body_a_color', array(
  	'default' => '#111',
  	'type' => 'theme_mod',
  	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_a_color', array(
	  'label' => __( 'Link text color', 'draco' ),
	  'section' => 'design',
	  'mime_type' => 'color',
	) ) );

	$wp_customize->add_setting( 'body_hover_color', array(
  	'default' => '#777',
  	'type' => 'theme_mod',
  	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_hover_color', array(
	  'label' => __( 'Link text hover color', 'draco' ),
	  'section' => 'design',
	  'mime_type' => 'color',
	) ) );

	$wp_customize->add_setting( 'body_bg_color', array(
  	'default' => '#fff',
  	'type' => 'theme_mod',
  	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_bg_color', array(
	  'label' => __( 'Content Background Color', 'draco' ),
	  'section' => 'design',
	  'mime_type' => 'color',
	) ) );

	$wp_customize->add_setting( 'footer_bg_color', array(
  	'default' => '#eee',
  	'type' => 'theme_mod',
  	'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
	  'label' => __( 'Footer Background Color', 'draco' ),
	  'section' => 'design',
	  'mime_type' => 'color',
	) ) );

}
add_action('customize_register','draco_customize_register');

include("custom_css.php");
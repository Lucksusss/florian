<?php
/**
 * HB Education functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package HB_Education
 */

if ( ! function_exists( 'hb_education_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function hb_education_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on HB Education, use a find and replace
         * to change 'hb-education' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'hb-education', get_template_directory() . '/languages' );

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

        // Thumbnail Sizes
        add_image_size( 'hb-education-thumbnail-slider', 1920, 800, true );
        add_image_size( 'hb-education-thumbnail-teacher', 262, 323, true );
        add_image_size( 'hb-education-thumbnail-activities', 292.5, 356, true );
        add_image_size( 'hb-education-thumbnail-testimonial', 180, 180, true );
        add_image_size( 'hb-education-thumbnail-1', 360, 292, true );
        add_image_size( 'hb-education-thumbnail-2', 360, 250, true );
        add_image_size( 'hb-education-thumbnail-3', 265, 315, true );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'hb-education' ),
            'secondary' => esc_html__( 'Top Menu', 'hb-education' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'hb_education_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 100,
            'width'       => 100,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
endif;
add_action( 'after_setup_theme', 'hb_education_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hb_education_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'hb_education_content_width', 640 );
}
add_action( 'after_setup_theme', 'hb_education_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hb_education_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'hb-education' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'hb-education' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer', 'hb-education' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add Upto 4 widgets here.', 'hb-education' ),
        'before_widget' => '<div class="col-sm-6 col-md-3"><div class="widget %1s">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<strong>',
        'after_title'   => '</strong>',
    ) );
}
add_action( 'widgets_init', 'hb_education_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hb_education_scripts() {
    wp_enqueue_style( 'hb-education-style', get_stylesheet_uri() );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/hummingbird/assets/css/bootstrap.css' );

    wp_enqueue_style( 'slick', get_template_directory_uri() . '/hummingbird/assets/css/slick.css' );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/hummingbird/assets/css/font-awesome.css' );

    wp_enqueue_style( 'noto', 'https://fonts.googleapis.com/css?family=Noto+Serif:400,400i,700,700i' );

    wp_enqueue_style( 'main', get_template_directory_uri() . '/hummingbird/assets/css/main.css' );

    wp_enqueue_script( 'hb-education-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/hummingbird/assets/js/bootstrap.js', array('jquery'), '20151215', true  );

    wp_enqueue_script( 'slick', get_template_directory_uri() . '/hummingbird/assets/js/slick.js', array('jquery'), '20151215', true  );

    wp_enqueue_script( 'main', get_template_directory_uri() . '/hummingbird/assets/js/main.js', array('jquery'), '20151215', true  );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'hb_education_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Hooks.
 */
require get_template_directory() . '/hummingbird/hooks.php';


/**
 * Load Theme Tags.
 */
require get_template_directory() . '/hummingbird/theme-tags.php';

/**
 * Load Bootstrap Navwalker.
 */
require get_template_directory() . '/hummingbird/third-party/wp-bootstrap-navwalker.php';

/**
 * Load Breadcrumbs.
 */
require get_template_directory() . '/hummingbird/third-party/breadcrumbs.php';

if ( is_admin() ) {
    // Load about.
    require_once trailingslashit( get_template_directory() ) . '/inc/theme-info/class-about.php';
    require_once trailingslashit( get_template_directory() ) . '/inc/theme-info/about.php';

    // Load demo.
    require_once trailingslashit( get_template_directory() ) . '/inc/demo/class-demo.php';
    require_once trailingslashit( get_template_directory() ) . '/inc/demo/demo.php';
}

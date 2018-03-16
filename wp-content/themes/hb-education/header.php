<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HB_Education
 */

?>
<?php
  /**
   * Hook - hb_education_doctype.
   *
   * @hooked hb_education_doctype_action - 10
   */
  do_action( 'hb_education_doctype' );
?>
<?php
  /**
   * Hook - hb_education_head.
   *
   * @hooked hb_education_head_action - 10
   */
  do_action( 'hb_education_head' );
?>

<body <?php body_class(); ?>>
	
	<div class="wrapper">
		<header id="header">
      <div class="top-header-wrapper">
        <div class="container">
            <?php
              /**
               * Hook - hb_education_announcement.
               *
               * @hooked hb_education_announcement_action - 10
               */
              do_action( 'hb_education_announcement' );
            ?>
          <div class="contact-block visible-xs visible-sm">
            <div class="container">
              <?php
                /**
                * Hook - hb_education_contact.
                *
                * @hooked hb_education_contact_action - 10
                */
                do_action( 'hb_education_contact' );
              ?>
            </div>
          </div>
          <div class="top-header hidden-xs hidden-sm">
            <?php
                /**
                * Hook - hb_education_top_menu.
                *
                * @hooked hb_education_top_menu_action - 10
                */
                do_action( 'hb_education_top_menu' );
              ?>
          </div>
        </div>
      </div>
      <div class="middle-header-wrapper hidden-sm hidden-xs">
        <div class="container">
          <div class="logo">

                  <?php if(has_custom_logo()): ?>
                    <div class="logoimg">
                      <?php the_custom_logo();  ?>
                    </div>
                    <?php endif; ?>
                     <div class="logotxt">
                <h1 class="site-title">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                </h1>
                <?php  $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
                <h5 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h5>
              <?php endif;?>
                </div>
              
              </div>
              <div class="contact-block">
                <?php
                /**
                * Hook - hb_education_middle_right_contact.
                *
                * @hooked hb_education_contact_action- 10
                */
                do_action( 'hb_education_contact' );
              ?>
              </div>
        </div>
      </div>
      <?php
        /**
         * Hook - hb_education_main_menu.
         *
         * @hooked hb_education_main_menu_action - 10
         */
        do_action( 'hb_education_main_menu' );
      ?>
      
    </header>

	
		<?php
			/**
			 * Hook - hb_education_breadcrumb.
			 *
			 * @hooked hb_education_breadcrumb_action - 10
			 */
			do_action( 'hb_education_breadcrumb' );
		?>
	

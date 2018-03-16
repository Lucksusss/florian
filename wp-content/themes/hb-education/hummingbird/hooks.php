<?php
/**
 * Load hooks.
 *
 * @package HB Education
 */

/*======================================================
			Doctype hook of the theme
======================================================*/
if( ! function_exists( 'hb_education_doctype_action' ) ) :
	/**
     * Doctype declaration of the theme.
     *
     * @since 1.0.0
     */
	function hb_education_doctype_action() {
	?>
		<!doctype html>
		<html <?php language_attributes(); ?>>
	<?php		
	}
endif;
add_action( 'hb_education_doctype', 'hb_education_doctype_action', 10 );


/*======================================================
			Head hook of the theme
======================================================*/
if( ! function_exists( 'hb_education_head_action' ) ) :
    /**
     * Head declaration of the theme.
     *
     * @since 1.0.0
     */
 	function hb_education_head_action() {
 	?>
 	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>
 	<?php	
 	}
endif;
add_action( 'hb_education_head', 'hb_education_head_action', 10 );


/*======================================================
			Announcement Hook of the theme
======================================================*/
if( ! function_exists( 'hb_education_announcement_action' ) ) :
    /**
     * Announcement declaration of the theme.
     *
     * @since 1.0.0
     */
 	function hb_education_announcement_action() {
 	?>
 		<div class="message-block">
	        <div class="announcement">
	        	<?php if(get_theme_mod('hb_education_notice_title')): ?>
	           		<span><?php echo esc_html(get_theme_mod('hb_education_notice_title')); ?></span>
	           	<?php else: ?>
	           		<span><?php echo esc_html_e('Announcement','hb-education'); ?></span>
	           	<?php endif; ?>

	        </div>
	        <div class="message">
	        	<?php
              $cat = get_theme_mod( 'hb_education_notice_category', '1' );
              
              $notice_args = array(
                  'post_type'     => 'post',
                  'cat'       => absint( $cat ),
                  'posts_per_page'  => 1
                );
              
              $notice_posts = new WP_Query( $notice_args );
              
              if( $notice_posts->have_posts() ) :
            while( $notice_posts->have_posts() ) : $notice_posts->the_post();
            ?>
	           	<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
	           <?php endwhile; endif; ?>
	        </div>
	    </div>
 	<?php	
 	}
endif;
add_action( 'hb_education_announcement', 'hb_education_announcement_action', 10 );


/*======================================================
			Top Menu Hook of the theme
======================================================*/
if( ! function_exists( 'hb_education_top_menu_action' ) ) :
    /**
     * Top Menu declaration of the theme.
     *
     * @since 1.0.0
     */
 	function hb_education_top_menu_action() {
 		if( has_nav_menu( 'secondary' ) ) :
			wp_nav_menu( array(
				'theme_location' 	=> 'secondary',
				'menu_class'		=> 'top-links',
			) );	
 		endif;
 	}
endif;
add_action( 'hb_education_top_menu', 'hb_education_top_menu_action', 10 );

/*======================================================
			Contact Hook of the theme
======================================================*/
if( ! function_exists( 'hb_education_contact_action' ) ) :
    /**
     * Contact declaration of the theme.
     *
     * @since 1.0.0
     */
 	function hb_education_contact_action() {
 	?>
 		<ul>
 			<?php if(get_theme_mod('hb_education_phone_number')|| get_theme_mod('hb_education_email_address')): ?>
	        <li>
	            <span class="fa fa-phone"></span>
	            <span><a href="tel:2342355645"><?php echo esc_html(get_theme_mod('hb_education_phone_number')); ?></a></span>
	            <br>
	            <span><a href="mailto:<?php echo esc_attr(get_theme_mod('hb_education_email_address')); ?>"><?php echo esc_attr(get_theme_mod('hb_education_email_address')); ?></a></span>
	        </li>
	    	<?php endif; ?>
	    	
	    	<?php if(get_theme_mod('hb_education_street_address')|| get_theme_mod('hb_education_street_address')): ?>
			<li>
			    <span class="fa fa-home"></span>
			    <address>
			        <span class="street"><?php echo esc_html(get_theme_mod('hb_education_street_address')); ?></span>
			        <br>
			        <span class="country"><?php echo esc_html(get_theme_mod('hb_education_state_country')); ?></span>
			    </address>
			</li>
		<?php endif; ?>
	    </ul>
 	<?php
 	}
endif;
add_action( 'hb_education_contact', 'hb_education_contact_action', 10 );


/*======================================================
			Main Menu Hook of the theme
======================================================*/
if( ! function_exists( 'hb_education_main_menu_action' ) ) :
    /**
     * Main Menu declaration of the theme.
     *
     * @since 1.0.0
     */
 	function hb_education_main_menu_action() {
 	?>
 	<div class="menu-header-wrapper clearfix">
        <nav class="navbar navbar-default main_navigation" role="navigation">
		  	<div class="container">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only"><?php esc_html_e('Toggle navigation','hb-education'); ?></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <div class="navbar-brand hidden-lg hidden-md">
			      	<h2 class="site-title">
			      		<a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
			                <?php esc_html(bloginfo('name')); ?>
			            </a>
			      	</h2>
			      </div>
			      
			    </div>

		        <?php
		            wp_nav_menu( array(
		                'theme_location'    => 'primary',
		                'depth'             => 2,
		                'container'         => 'div',
		                'container_class'   => 'collapse navbar-collapse',
		                'container_id'      => 'bs-example-navbar-collapse-1',
		                'menu_class'        => 'nav navbar-nav',
		                'fallback_cb'       => 'HB_Educatoin_WP_Bootstrap_Navwalker::fallback',
		                'walker'            => new HB_Education_WP_Bootstrap_Navwalker())
		            );
		        ?>
		    </div>
		</nav>
      </div>
 	<?php
 	}
endif;
add_action( 'hb_education_main_menu', 'hb_education_main_menu_action', 10 );


/*======================================================
			Breadcrumb Hook of the theme
======================================================*/
if( ! function_exists( 'hb_education_breadcrumb_action' ) ) :
    /**
     * Breadcrumb declaration of the theme.
     *
     * @since 1.0.0
     */
 	function hb_education_breadcrumb_action() {
 		if( !is_front_page() && !is_home() ) :
            if( has_header_image() ) :
	    ?>
	            <div class="bredcrumb_full" style="background-image: url( <?php header_image(); ?> )">
	    <?php
	            else :
	    ?>
	            <div class="bredcrumb_full">
	    <?php
	            endif;
	    ?>
	    			<div class="mask"></div>
	                <div class="container">
	                    <div class="row">
	                        <div class="col-md-12 breadcrum">
	                        <?php
	                            $breadcrumb_args = array(
	                                'show_browse' => false,
	                                'separator' => '&nbsp;',
	                                'post_taxonomy' => array(
	                                    'post' => 'category'
	                                )                        
	                            );
	                            hb_education_breadcrumb_trail( $breadcrumb_args );
	                        ?>
	                        </div>
	                    </div>
	                </div>

	            </div>
	    <?php
	        endif;
	    }
endif;
add_action( 'hb_education_breadcrumb', 'hb_education_breadcrumb_action', 10 );


/*======================================================
        Footer of the theme
======================================================*/
if( ! function_exists( 'hb_education_footer_action' ) ) :
    /**
     * Footer Declaration of the theme.
     *
     * @since 1.0.0
     */
    function hb_education_footer_action() { ?>

    <footer id="footer">
  	<?php if(is_active_sidebar( 'footer-1' )): ?>
      <div class="top_footer">
        <div class="container">
          <div class="row">
           <?php dynamic_sidebar( 'footer-1' ); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
      <div class="btn_footer">
        <div class="container">
          <div class="btn_footer_holder">
            <div class="copy_right_block">
            
              <p><?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'hb-education' ), 'HB Education', '<a href="http://hummingbirdthemes.com/">Hummingbird Themes</a>' );
			?></p>
			
            </div>
            <div class="social-footer">
              <ul>
              <?php if(get_theme_mod('hb_education_facebook_url')): ?>
		<li><a href="<?php echo esc_url(get_theme_mod('hb_education_facebook_url')); ?>"><span class="fa fa-facebook"></span></a></li>
                 <?php endif; ?>
                 <?php if(get_theme_mod('hb_education_twitter_url')): ?>
		<li><a href="<?php echo esc_url(get_theme_mod('hb_education_twitter_url')); ?>"><span class="fa fa-twitter"></span></a></li>
                 <?php endif; ?>
                 <?php if(get_theme_mod('hb_education_linkedin_url')): ?>
		<li><a href="<?php echo esc_url(get_theme_mod('hb_education_linkedin_url')); ?>"><span class="fa fa-linkedin"></span></a></li>
                 <?php endif; ?>
                 <?php if(get_theme_mod('hb_education_google_url')): ?>
		<li><a href="<?php echo esc_url(get_theme_mod('hb_education_google_url')); ?>"><span class="fa fa-google-plus"></span></a></li>
                 <?php endif; ?>
                 <?php if(get_theme_mod('hb_education_pinterest_url')): ?>
		<li><a href="<?php echo esc_url(get_theme_mod('hb_education_pinterest_url')); ?>"><span class="fa fa-pinterest"></span></a></li>
                 <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>

     <?php wp_footer();?>
    			</div>
            </body>
        </html>
    <?php
    }
endif;
add_action( 'hb_education_footer', 'hb_education_footer_action', 10 );




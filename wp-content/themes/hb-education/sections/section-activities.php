<?php
/**
 * Template part for displaying teacher section of front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HB_Education
 */
?>



<div class="event_block event">
        <div class="container">
          <?php
          $section_title = get_theme_mod( 'hb_education_blog_title', '' );
            if( ! empty( $section_title ) ) :
            ?>
          <h1 class="h1 text-center"><span><?php echo esc_html($section_title); ?></span></h1>
          <?php endif; ?>
          <div class="row">
            <?php
              $cat = get_theme_mod( 'hb_education_blog_category', '1' );
              $cat_no = get_theme_mod( 'hb_education_blog_no', 4 );
              
              $blog_args = array(
                  'post_type'     => 'post',
                  'cat'       => absint( $cat ),
                  'posts_per_page'  => absint( $cat_no )
                );
              
              $blog_posts = new WP_Query( $blog_args );
              
              if( $blog_posts->have_posts() ) :
              while( $blog_posts->have_posts() ) : $blog_posts->the_post();
            ?>
            <div class="col-sm-3">
              <div class="thumbnail">
                <div class="img-holder">
                  <?php
                    if( has_post_thumbnail() ) :
                         the_post_thumbnail( 'hb-education-thumbnail-activities' );
                           endif; ?>
                  <span class="date-holder">
                    <span class="month"><?php hb_education_posted_on(); ?></span>
                  </span>
                  <div class="caption">
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  </div>
                </div>
              </div>
            </div>
            <?php
        endwhile; endif;
        ?>
         
        </div>
      </div>
    </div>
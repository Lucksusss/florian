<?php
/**
 * Template part for displaying teacher section of front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HB_Education
 */
?>

<div class="teacher_block">
        <div class="container">
          <?php
          $section_title = get_theme_mod( 'hb_education_teacher_title', '' );
            if( ! empty( $section_title ) ) :
            ?>
          <h1 class="h1 text-center"><span><?php echo esc_html($section_title); ?></span></h1>
          <?php endif; ?>
          <div class="row">

            <?php
              $cat = get_theme_mod( 'hb_education_teacher_category', '1' );
              $cat_no = get_theme_mod( 'hb_education_teacher_no', 4 );
              
              $teacher_args = array(
                  'post_type'     => 'post',
                  'cat'       => absint( $cat ),
                  'posts_per_page'  => absint( $cat_no )
                );
              
              $teacher_posts = new WP_Query( $teacher_args );
              
              if( $teacher_posts->have_posts() ) :
            while( $teacher_posts->have_posts() ) : $teacher_posts->the_post();
            ?>
            <div class="col-sm-3">
              <div class="thumbnail">
                <div class="img-holder">
                  <?php
                    if( has_post_thumbnail() ) :
                         the_post_thumbnail( 'hb-education-thumbnail-teacher' );
                           endif; ?>
                  <div class="caption">
                    <div class="caption-wrap">
                      <span class="name_text"><h2><?php the_title(); ?></h2></span>
                      
                    </div>
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

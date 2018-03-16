<?php
/**
 * Template part for displaying course section of front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HB_Education
 */

$cat = get_theme_mod( 'hb_education_testimonial_category', '1' );
$cat_no = get_theme_mod( 'hb_education_testimonial_no', 3 );
$testimonial_args = array(
		'post_type'			=> 'post',
		'cat'				=> absint( $cat ),
		'posts_per_page'	=> absint( $cat_no )
	);
$testimonial_posts = new WP_Query( $testimonial_args );
if( $testimonial_posts->have_posts() ) :
?>
<div class="block testimonial_block bg_img">
    <div class="mask"></div>
    <div class="container">
    <?php
    	$section_title = get_theme_mod( 'hb_education_testimonial_title', '' );
 		if( ! empty( $section_title ) ) :
    ?>
        <h1 class="h1 text-center testimonial-title">
        	<span>
        		<?php
        			echo esc_html($section_title);
        		?>
        	</span>
        </h1>
	<?php
		endif;
	?>
        <div class="testimonial_holder">
           	<div class="testimonial_item">
              	<div class="thumbanail">
	                <div class="slider-nav">
	                	<?php
	              		while( $testimonial_posts->have_posts() ) :
	              			$testimonial_posts->the_post();
	                		if( has_post_thumbnail() ) :
	                	?>
	                  		<div class="img-holder">
	                  			<?php
	                  				the_post_thumbnail( 'hb-education-thumbnail-testimonial', array( 'class' => 'img-circle' ) );
	                  			?>
	                  		</div>
	                  	<?php
	                  		endif;
	                  	endwhile;
	            		wp_reset_postdata();
	                  	?>
	               	</div>
	            
	                <div class="slider-for">
	                <?php	            	
	            	while( $testimonial_posts->have_posts() ) :
              			$testimonial_posts->the_post();
              			if( has_post_thumbnail() ) :
	            	?>
	                  		<div class="caption">
	                    		<?php
	                    			the_content();
	                    		?>
	                    		<h4 class="testimonial-name"><?php the_title();?></h4>
	                  		</div>
		            <?php
		            	endif;
		            endwhile;
		            wp_reset_postdata();
		            ?>
		            </div>
              	</div><!--.thumbnail-->
            </div><!--.testimonial_item-->
        </div><!--.testimonial_holder-->
    </div><!--.container-->
</div><!--.block.testimonial_block.bs_img-->
<?php
endif;
?>

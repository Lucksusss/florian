<?php
/**
 * Template part for displaying carousel section of front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HB_Education
 */
if(get_theme_mod('hb_education_slider_section_enable')):
$cat = get_theme_mod( 'hb_education_carousel_category', '1' );
$cat_no = get_theme_mod( 'hb_education_carousel_no', 3 );
$carousel_args = array(
		'post_type'			=> 'post',
		'cat'				=> absint( $cat ),
		'posts_per_page'	=> absint( $cat_no )
	);
$carousel_posts = new WP_Query( $carousel_args );
if( $carousel_posts->have_posts() ) :
	$i = 1;
?>
<div class="banner">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <?php
        	while( $carousel_posts->have_posts() ) :

        		$carousel_posts->the_post();

        		if( has_post_thumbnail() ) :
        ?>
		            <div class="item <?php if( $i == 1 ) : echo esc_attr( 'active' ); endif;?>">
		              	<div class="bg_hover">
		              		<?php
		              			the_post_thumbnail( 'hb-education-thumbnail-slider', array( 'class' => 'img-responsive' ) );
		              		?>
		              	</div>
		              	<div class="carousel-caption">
		                	<h3 class="carousel-heading">
		                		<?php
		                			the_title();
		                		?>
		                	</h3>
		                	<?php
		                		the_content();
		                	?>
		              	</div>
		            </div>
		<?php
				endif;
				$i = $i + 1;
			endwhile;
			wp_reset_postdata();
		?>
        </div>
    </div>
</div>
<?php
endif; endif;
?>
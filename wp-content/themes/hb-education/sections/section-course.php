<?php
/**
 * Template part for displaying course section of front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HB_Education
 */

$cat = get_theme_mod( 'hb_education_course_category', '1' );
$cat_no = get_theme_mod( 'hb_education_course_no', 3 );
$course_args = array(
		'post_type'			=> 'post',
		'cat'				=> absint( $cat ),
		'posts_per_page'	=> absint( $cat_no )
	);
$course_posts = new WP_Query( $course_args );
if( $course_posts->have_posts() ) :
?>
<div class="block popular_courses_block">
    <div class="container">
    	<?php
    		$section_title = get_theme_mod( 'hb_education_course_title', '' );
 			if( ! empty( $section_title ) ) :
    	?>
        		<h1 class="h1 text-center"><span><?php echo esc_html($section_title); ?></span></h1>
        <?php
        	endif;
        ?>
        <div class="row">
        <?php
        	while( $course_posts->have_posts() ) :
        		$course_posts->the_post();
        ?>
	           	<div class="col-md-4 col-sm-6">
	              	<div class="thumbnail">
	              		<?php
		           			if( has_post_thumbnail() ) :
		           		?>
		                	<div class="img_bg">
		                  		<a href="<?php the_permalink(); ?>">
		                  			<?php
		                  				the_post_thumbnail( 'hb-education-thumbnail-2' );
		                  			?>
		                  		</a>
		                	</div>
		                <?php
		                	endif;
		                ?>
	                	<div class="caption">
	                  		<h3>
	                  			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	                  		</h3>
	                  		<?php
	                  			the_excerpt();
	                  		?>
	                	</div><!--.caption-->
	              	</div><!--.thumbnail-->
	            </div>
	    <?php
	    	endwhile;
	    	wp_reset_postdata();
	    ?>
        </div>
    </div><!--.container-->
</div><!--.block_popular_courses_block-->
<?php
endif;
?>
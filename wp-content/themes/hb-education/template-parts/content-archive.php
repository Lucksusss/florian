<?php
/**
 * Template part for displaying archive posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HB_Education
 */
?>

<div class="thumbnail">
    <div class="img-holder">
    	<?php
    		if ( has_post_thumbnail() ) :
    			the_post_thumbnail('hb-education-thumbnail-1', array( 'class' => 'img-responsive' ) );
    		else :
    		?>
    			<img src="<?php echo esc_url( get_template_directory_uri() . '/hummingbird/assets/images/no-image.jpg' ) ?>">
    		<?php
    		endif;
    	?>       
        <span class="date-holder">
            <span class="month">
            	<?php
				    echo esc_html( get_the_date( __( 'M', 'hb-education' ) ) );
				?>
            </span>
            <span class="date">
            	<?php
				    echo esc_html( get_the_date( __( 'd', 'hb-education' ) ) );
				?>
			</span>
        </span>
    </div>
    <div class="caption">
        <h3 class="post-title">
        	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="author-tag-comment">
            <?php

            	hb_education_get_author();

            	hb_education_get_categories();

            	hb_education_get_comments_no();

            ?>
                </a>
            </span>
        </div>
        <div class="post-content">
            <?php
            	the_excerpt();
            ?>
            <a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Read More', 'hb-education'); ?></a>
        </div>
    </div>
</div>
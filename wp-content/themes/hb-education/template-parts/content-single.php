<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HB_Education
 */

?>




   				<div class="post-title">
                	<h2><?php the_title(); ?></h2>
                </div>
                <div class="entry-meta">
                    <span class="posted-on"> 
                     
                        <time class="updated" datetime=""><?php
				    echo esc_html( get_the_date( __( 'M', 'hb-education' ) ) );
				?></time>
				<?php
				    echo esc_html( get_the_date( __( 'd', 'hb-education' ) ) );
				?>
                      
                    </span>
                    <span class="byline">  
                      <?php

            	hb_education_get_author();

            	hb_education_get_categories();

            	hb_education_get_comments_no();

            ?>
                    </span>         
                </div>
                <div class="post-image">
                	<?php
    		if ( has_post_thumbnail() ) :
    			the_post_thumbnail('full', array( 'class' => 'img-responsive' ) );
    		?>
    		<?php
    		endif;
    	?>    
                </div>
                <div class="post-detail">
                	<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hb-education' ),
				'after'  => '</div>',
			) );
		?>
                </div>
                <?php comments_template(); ?>
        

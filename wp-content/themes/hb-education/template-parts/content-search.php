<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HB_Education
 */

?>


<div class="thumbnail">
  
    <div class="caption">
        <h3 class="post-title">
        	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="post-content">
            <?php
            	the_excerpt();
            ?>
            <a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Read More', 'hb-education'); ?></a>
        </div>
    </div>
</div>

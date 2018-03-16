<?php
/**
 * Template part for displaying carousel section of front page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HB_Education
 */
?>
<?php if(get_theme_mod('hb_education_feature_section_enable')): ?>
<!-- oursevice_start -->
<div class="ourservice_block">
    <div class="container">
        <div class="row_service">

            <?php
                              $i=1;
                              $class[1]='bg_pink';
                              $class[2]='bg_yellow';
                              $class[3]='bg_red';
                              $class[4]='bg_sky';
                              
                              $feature[1] = get_theme_mod('hb_education_feature_page_1');
                              $feature[2] = get_theme_mod('hb_education_feature_page_2');
                              $feature[3] = get_theme_mod('hb_education_feature_page_3');
                              $feature[4] = get_theme_mod('hb_education_feature_page_4');
                              $featureicon[1] = get_theme_mod('hb_education_feature_icon_1');
                              $featureicon[2] = get_theme_mod('hb_education_feature_icon_2');
                              $featureicon[3] = get_theme_mod('hb_education_feature_icon_3');
                              $featureicon[4] = get_theme_mod('hb_education_feature_icon_4');

              
                                $args = array (
                                    'post_type' => 'page',
                                    'post_per_page' => 4,
                                    'post__in'         => $feature,
                                    'orderby'           =>'post__in',
                                  );

                                $featureloop = new WP_Query($args);

                                
                                if ($featureloop->have_posts()) :  while ($featureloop->have_posts()) : $featureloop->the_post(); ?>
                            <div class="col_service  <?php echo esc_attr($class[$i]); ?>">
                              	<div class="education_holder">
                                	<div class="thumbnail">
                                  		<div class="icon_wrap">
                                    		<i class="<?php echo esc_attr($featureicon[$i]); ?>"></i>
                                  		</div>
                	                  	<div class="caption">
                	                    	<h3><?php the_title(); ?></h3>
                	                    	<p><?php the_content(); ?> </p>
                	                  	</div>
                                	</div>
                              	</div>
                            </div>
                            <?php $i=$i+1;?> 
                            <?php  endwhile; endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>
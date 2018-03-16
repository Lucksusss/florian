<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package HB_Education
 */

get_header(); ?>



	
	<main id="main">
		<div class="block page_block">
        	<div class="container">
          		<div class="row">
            		<div class="col-md-8 col-sm-12">
            			<div class="page-holder">
            				<h1><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'hb-education' ), '<span>' . get_search_query() . '</span>' );
					?></h1>
            				<?php
            					if ( have_posts() ) :

            						/* Start the Loop */
									while ( have_posts() ) : the_post();

										/*
										 * Include the Post-Format-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
										 */
										get_template_part( 'template-parts/content', 'search' );

									endwhile;

									the_posts_navigation();
								else :

									get_template_part( 'template-parts/content', 'none' );

								endif;
            				?>
            			</div><!--.page-holder-->
            		</div>
            		<div class="col-md-4">
            			<?php get_sidebar(); ?>
            		</div>	
            	</div>
            </div><!--.container-->
        </div><!--.block.page_block-->
	</main><!--#main-->

<?php
	get_footer();

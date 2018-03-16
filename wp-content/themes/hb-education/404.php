<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'hb-education' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'hb-education' ); ?></p>

					<?php
						get_search_form();

					?>

				</div><!-- .page-content -->



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

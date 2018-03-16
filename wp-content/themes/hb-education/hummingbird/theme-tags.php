<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package HB_Education
 */

if( ! function_exists( 'hb_education_get_author' ) ) :

	function hb_education_get_author() {
		if ( 'post' === get_post_type() ) {
			printf(
				/* translators: %s: post author. */
				esc_html_x( ' %s', 'post author', 'hb-education' ),	'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);
		}

	}
endif;


if( ! function_exists( 'hb_education_get_categories' ) ) :

	function hb_education_get_categories() {

		//Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'hb-education' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				sprintf( '<span class="cat-links">' . esc_html__( 'Posted on %1$s', 'hb-education' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
		}
	}
endif;

if( ! function_exists( 'hb_education_get_comments_no' ) ) :

	function hb_education_get_comments_no() {

		// get_comments_number returns only a numeric value
		$num_comments = get_comments_number(); 

		if ( comments_open() ) {
			if ( $num_comments == 0 ) {
				/* translators: 1: no of comments. */
				sprintf( '<span class="comments-link"><a href="' . get_comments_link() .'">' . esc_html__( '%1$s Comment', 'hb-education' ) . '</span>', $num_comments );
			} elseif ( $num_comments > 1 ) {
				/* translators: 1: no of comments. */
				sprintf( '<span class="comments-link"><a href="' . get_comments_link() .'">' . esc_html__( '%1$s Comments', 'hb-education' ) . '</span>', $num_comments );
			} else {
				/* translators: 1: no of comments. */
				sprintf( '<span class="comments-link"><a href="' . get_comments_link() .'">' . esc_html__( '%1$s Comments', 'hb-education' ) . '</span>', $num_comments );
			}
		} else {
			echo esc_html__( 'Comment Closed', 'hb-education' );
		}

	}

endif;
?>
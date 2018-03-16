<?php

/* Add settings to css */
function draco_custom_css_output() {
  

  /* custom header */

  $header_image="";

	if (is_front_page()) {
    if(!$header_image=wp_get_attachment_url(get_theme_mod( 'header_image'))) $header_image=get_template_directory_uri().'/assets/img/header.jpeg';
  }
	else if(is_single() || is_page()) {
		if ( has_post_thumbnail() ) {
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large' );
			if ( ! empty( $large_image_url[0] ) ) $header_image=$large_image_url[0];
		}
    else if(is_single()) {
      if(!$header_image=wp_get_attachment_url(get_theme_mod( 'single_image'))) $header_image=get_template_directory_uri().'/assets/img/single.jpeg';
    }
    else if(is_page()) {
      if(!$header_image=wp_get_attachment_url(get_theme_mod( 'page_image'))) $header_image=get_template_directory_uri().'/assets/img/page.jpeg';
    }
	}
  else if(is_archive()) {
    if(!$header_image=wp_get_attachment_url(get_theme_mod( 'archive_image'))) $header_image=get_template_directory_uri().'/assets/img/archive.jpeg';
  }
  else if(is_search()) {
    if(!$header_image=wp_get_attachment_url(get_theme_mod( 'search_image'))) $header_image=get_template_directory_uri().'/assets/img/search.jpeg';
  }
  else if(is_404()) {
    $header_image=get_template_directory_uri().'/assets/img/404.jpeg';
  }
    ?>
  <style type="text/css" id="custom-theme-css">

  body {
    font-family: "<?php echo esc_html(get_theme_mod( 'font', 'circular')); ?>", sans-serif;
    font-style: normal;
    font-weight: 400;
    padding: 0;
    margin: 0;
    position: relative;
    color: <?php echo esc_html(get_theme_mod( 'body_txt_color', '#777')); ?>;
    -webkit-tap-highlight-color: transparent;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    -webkit-text-size-adjust: 100%;
  }

  a {
    color:<?php echo esc_html(get_theme_mod( 'body_a_color', '#111')); ?>;
  }

  a:hover {
    color:<?php echo esc_html(get_theme_mod( 'body_hover_color', '#777')); ?>;
  }


  .button:hover, button:hover {

    color: <?php echo esc_html(get_theme_mod( 'body_bg_color', '#fff')); ?>;
    background-color: <?php echo esc_html(get_theme_mod( 'body_hover_color', '#777')); ?>;
  }

  #start {
    background-color: <?php echo esc_html(get_theme_mod( 'body_bg_color', '#fff')); ?>;
  }

  footer {
    display: block;
    background-color: <?php echo esc_html(get_theme_mod( 'footer_bg_color', '#eee')); ?>;
    padding: 1em;
    border-top: 1px solid #ddd;

  }

  .header{
    position:relative;
    overflow:visible;
    display:-webkit-flex;
    -webkit-flex-wrap: wrap;
    justify-content: center;
    align-items: -webkit-flex-start;
    align-content: -webkit-flex-start;
    height: 700px;
    height: 100vh;
    max-height: 100%;
    min-height:200px;
    min-width:300px;
    color:<?php echo esc_html(get_theme_mod( 'head_txt_color', '#eee')); ?>;
  }

  #top-menu li:after {
    content: ""; /* This is necessary for the pseudo element to work. */ 
    display: block; /* This will put the pseudo element on its own line. */
    margin: 0 auto; /* This will center the border. */
    width: 30px; /* Change this to whatever width you want. */
    margin-bottom: 0.7em;
    margin-top: 0.7em;
   
  }

  .image-draco-header{
    width:100%;
    height:100%;
    position:fixed;
    top:0;
    left:0;

      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
      -webkit-transform: translateZ(0) scale(1.0, 1.0);
      transform: translateZ(0);
      -ms-transform: translateZ(0);

    <?php if($header_image!="") { ?>
    background:<?php echo esc_html(get_theme_mod( 'head_bg_color', '#222')); ?> url(<?php echo esc_url($header_image); ?>) center center no-repeat;
    <?php }

    else { ?>
      background:<?php echo esc_html(get_theme_mod( 'head_bg_color')); ?>;
      <?php } ?>

    background-size:cover;
    background-attachment:scroll;
    -webkit-animation: grow 60s  linear 10ms infinite;
    animation: grow 60s  linear 10ms infinite;

    -webkit-transition:all 0.2s ease-in-out;
    transition:all 0.2s ease-in-out;
    z-index:-2;
  }

  </style>
    <?php
}
add_action( 'wp_head', 'draco_custom_css_output');
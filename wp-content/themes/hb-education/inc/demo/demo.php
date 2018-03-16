<?php
/**
 * Demo configuration
 *
 * @package Corporate X
 */

$config = array(
	'static_page'    => 'home',
	'menu_locations' => array(
		'primary' 	=> 'primary',
		'secondary'	=>'secondary',
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Import HB Education Demo', 'hb-education' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/contents.xml',
      		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/widgets.json',
      		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/customizer.dat',
      		'import_notice'                => __( 'It will overwrite your settings', 'hb-education' ),
      		'preview_url'                  => 'http://demo.hummingbirdthemes.com/hb-education/',
		),
		
	),
);

HB_Education_Demo::init( apply_filters( 'hb_education_demo_filter', $config ) );
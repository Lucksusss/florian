<?php
/**
	Plugin Name: WordPress Exporter
	Plugin URI: http://www.ground6.com/wordpress-plugins/wordpress-exporter/
	Description: Export specific posts, pages, comments, custom fields, categories, tags and more to an export file.
	Author: zourbuth
	Version: 0.0.5
	Author URI: http://zourbuth.com
	License: Under GPL2
 
	Copyright 2016 zourbuth.com (email: zourbuth@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/**
 * Set constant
 * @since 0.0.5
 */
define( 'WP_EXPORTER_VERSION', '0.0.5' );
define( 'WP_EXPORTER_PATH', plugin_dir_path( __FILE__ ) );
define( 'WP_EXPORTER_URL', plugin_dir_url( __FILE__ ) );
define( 'WP_EXPORTER_TEXTDOMAIN', 'wp-exporter' );



/**
 * Plugins filters and actions
 */
add_action( 'plugins_loaded', 'wp_exporter_plugin_loaded' );


/**
 * Plugins loaded function
 * 
 * @since 0.0.1
 */	
function wp_exporter_plugin_loaded() {
	add_action( 'export_filters', 'wordpress_exporter_filters' );		
	add_action( 'wp_ajax_exportform', 'wordpress_exporter_form_ajax' );
	add_action( 'wp_exporter_form', 'wordpress_exporter_form' ); // custom action
	add_action( 'export_wp', 'export_wp_action' );
	add_filter( 'export_post_ids', 'wp_exporter_post_ids', 1, 2 ); // custom filter	
	
	remove_action( 'admin_head', 'export_add_js' );
    add_action( 'admin_head', 'wordpress_exporter_add_js', 99 );	
	
	require_once( WP_EXPORTER_PATH . 'utility.php' );
}


/**
 * Export posts id function
 * @param $post_ids (int) current posts ids
 * @param $args (array) query arguments
 * @since 0.0.1
 */	
function wp_exporter_post_ids( $post_ids, $args ) {
	
	if ( 'advanced' == $args['content'] && isset( $_GET['query'] ) ) {
		$query = esc_attr( $_GET['query'] );
		switch ( $query ) :
			case 'post' :
			case 'page' :
			case 'attachment' :
				if( isset( $_GET['post_ids'] ) )
					$post_ids = (array) $_GET['post_ids'];
			break;
		endswitch;
		
		$post_ids = apply_filters( 'wp_exporter_post_ids', $post_ids, $query, $args );
	}
	
	return $post_ids;
}


/**
 * Export action using custom query
 * @param $args (array) query arguments
 * @since 0.0.1
 */	
function export_wp_action( $args ) {
	if ( 'advanced' == $args['content'] ) {
		require_once( plugin_dir_path( __FILE__ ) . 'export.php' );
		
		// Don't use default WP export, instead set parameter for further use
		global $wp_query;
		$wp_query->wp_exporter = true; // @since 0.0.5	
		_export_wp( $args );
		die();
	}
}


/**
 * Export AJAX function
 * @param (none)
 * @since 0.0.1
 */
function wordpress_exporter_form_ajax() {
	if ( ! isset( $_POST['nonce'] ) || ! isset( $_POST['query'] ) || ! wp_verify_nonce( $_POST['nonce'], 'wp-exporter' ) )
		die();
		
	do_action( 'wp_exporter_form', esc_attr( $_POST['query'] ) );
	exit;
}


/**
 * Lists all posts/pages
 * @param $query (array) query argument
 * @since 0.0.1
 */
function wordpress_exporter_form( $query ) {
	if ( 'post' == $query || 'page' == $query || 'attachment' == $query ) {
		
		$posts = get_posts( array(
			'posts_per_page' => 9999,
			'post_type'	=> $query
		));
		
		echo "<label>". __( 'Select one or more posts','wp-exporter' ) ."<br />
			  <select name='post_ids[]' size='8' multiple='multiple'>";
			foreach( $posts as $post )
				echo "<option value='{$post->ID}'>{$post->post_title} ({$post->ID})</option>";
		echo "</select></label>";
	}
}


/**
 * Lists all posts/pages
 * @param $query (array) query argument
 * @since 0.0.1
 */
function wordpress_exporter_filters() {
	$export_queries = apply_filters( 'wp_exporter_queries', array(
		''			=> __( '-', 'wp-exporter' ),
		'post'		=> __( 'Post', 'wp-exporter' ),
		'page'		=> __( 'Page', 'wp-exporter' ),
		'attachment'	=> __( 'Media/attachment', 'wp-exporter' ),
	));
	?>
	<p><label><input type="radio" name="content" value="advanced" /> <?php _e( 'Custom Export', 'wp-exporter' ); ?></label></p>
	<div class="export-filters" id="advanced-filters" style="margin-left: 23px;">
		<p>
			<label for="query"><?php _e( 'Select query','wp-exporter' ); ?></label>
			<select class="smallfat" id="query" name="query" data-nonce="<?php echo wp_create_nonce( 'wp-exporter' ); ?>">
				<?php foreach ( $export_queries as $key => $query ) { ?>
					<option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $query ); ?></option>
				<?php } ?>
			</select>
			<span style="display: inline-block; vertical-align: middle;"><span class="spinner"></span></span>
		</p>
		<div><!-- custom form starts here --></div>
	</div>
	<?php
}


/**
 * Remove default WordPress export_js and replace with this
 * copy export_add_js() wp-admin\export.php line 24
 * @since 0.0.1
 */
function wordpress_exporter_add_js() {
?>
<script type="text/javascript">
//<![CDATA[
	jQuery(document).ready(function($){
 		var form = $('#export-filters'),
 			filters = form.find('.export-filters');
 		filters.hide();
 		form.find('input:radio').off('change').change(function() {
			filters.slideUp('fast');
			switch ( $(this).val() ) {
				case 'posts': $('#post-filters').slideDown(); break;
				case 'pages': $('#page-filters').slideDown(); break;			
				case 'advanced': $('#advanced-filters').slideDown(); break;
			}
 		});
		
		$("#query").on("change", function() {
			$('#advanced-filters > div').empty();
			$('#advanced-filters .spinner').css("visibility","visible");
			$.post( ajaxurl, { action: 'exportform', nonce: $(this).attr("data-nonce"), query : $(this).val() }, function(data){
				$('#advanced-filters .spinner').css("visibility","hidden");
				$('#advanced-filters > div').append( data );
			});
		});
	});
//]]>
</script>
<?php
}
<?php
/*
Plugin Name: Podcast Subscribe Buttons
Description: Custom Subscribe Buttons For Podcasts
Version: 1.1.0
Author: SecondLine Themes
Author URI: http://secondlinethemes.com
Author Email: support@secondlinethemes.com
License: GNU General Public License v3.0
Text Domain: secondline-psb-custom-buttons
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


define( 'SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_URL', plugins_url( '/', __FILE__ ) );
define( 'SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_PATH', plugin_dir_path( __FILE__ ) );


// Translation Setup
add_action('plugins_loaded', 'secondline_psb_theme_elements_buttons');
function secondline_psb_theme_elements_buttons() {
	load_plugin_textdomain( 'secondline-psb-elements-buttons', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

/**
 * Extend list of allowed protocols.
 *
 * @param array $protocols List of default protocols allowed by WordPress.
 *
 * @return array $protocols Updated list including new protocols.
 */
function wporg_extend_allowed_protocols( $protocols ){
    $protocols[] = 'spotify';
    //$protocols[] = 'skype'; // Add new services here
    return $protocols;
}
add_filter( 'kses_allowed_protocols' , 'wporg_extend_allowed_protocols' );



/**
 * Registering Custom Post Type
 */
add_action('init', 'secondline_psb_subscribe_custom_post_type_init');
function secondline_psb_subscribe_custom_post_type_init() {	
	
	register_post_type(
		'secondline_psb_post',
		array(
			'labels' => array(
				'name' => esc_html__( 'Subscribe Buttons', 'secondline-psb-custom-buttons' ),
				'singular_name' => esc_html__( 'Subscribe Button', 'secondline-psb-custom-buttons' )
			),
			'public' => true,
			'has_archive' => false,
			'menu_position' => 90,
			'menu_icon'   => 'dashicons-share',
			'supports' => array('title'),
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'can_export' => true,
		)
	);


}

/**
 * Registering Custom Shortcode
 */
function secondline_psb_custom_subscribe_shortcode() {
    add_shortcode( 'podcast_subscribe', 'secondline_psb_subscribe_shortcode' );
}
add_action( 'init', 'secondline_psb_custom_subscribe_shortcode' );

function secondline_psb_subscribe_shortcode( $atts ) {
    global $wp_query,
        $post;

    $atts = shortcode_atts( array(
        'id' => null,
		'type' => null,
    ), $atts );

    $secondline_psb_loop = new WP_Query( array(
        'post_type'         => 'secondline_psb_post',
		'posts_per_page'    => 1,
        'p'     => $atts['id'],        
    ) );

    if( ! $secondline_psb_loop->have_posts() ) {
        return false;
    }

    while( $secondline_psb_loop->have_posts() ) {
        $secondline_psb_loop->the_post();
		ob_start();        
		include SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_PATH . 'template-parts/subscribe-button.php';
		return ob_get_clean();
    }

    wp_reset_postdata();
}

/* Add Custom Culumns to the Post List */

add_filter('manage_edit-secondline_psb_post_columns', 'secondline_psb_subscribe_column');
function secondline_psb_subscribe_column($columns) {
    $columns['shortcode'] = 'Shortcode';
    return $columns;
}

add_action('manage_posts_custom_column',  'secondline_psb_show_subscribe_column');
function secondline_psb_show_subscribe_column($name) {
    global $post;
    switch ($name) {
        case 'shortcode':
            $shortcode = '[podcast_subscribe id="' . $post->ID .'"]';
            echo $shortcode;
    }
}


/* Add Shortcode Details after Post Title */
add_action( 'edit_form_after_title', 'secondline_psb_edit_form_after_title' );

function secondline_psb_edit_form_after_title() {
	global $post;
	if ( 'secondline_psb_post' == get_post_type() ) {	
		echo '<strong><p>'. esc_html__('Shortcode: ', 'secondline-psb-custom-buttons') .'</p></strong>';
		echo '<code>[podcast_subscribe id="' . $post->ID .'"]</code>';
	}
}

// Enqueue Script & Styles
function secondline_psb_button_scripts() {
    wp_register_style( 'secondline-psb-subscribe-button-styles',  SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_URL . 'assets/css/secondline-psb-styles.css' );
    wp_enqueue_style(  'secondline-psb-subscribe-button-styles' );
    wp_enqueue_script( 'secondline_psb_button_modal_script', SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_URL . 'assets/js/modal.min.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'secondline_psb_button_scripts' );


// Calling Custom Metaboxes (CMB2)
require_once SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_PATH.'includes/CMB2/cmb2-init.php';

// Calling Dismiss Notices 
require_once SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_PATH.'includes/dismiss-notices/dismiss-notices.php';


function secondline_psb_notice() {
	if( ! function_exists('secondline_powerpress_options') ) {
		if ( ! PAnD::is_admin_notice_active( 'disable-done-notice-forever' ) ) {
			return;
		}
		?>
		<div data-dismissible="disable-done-notice-forever" class="notice notice-info is-dismissible">
			<p><?php esc_html_e( 'Boost your Podcast Website with a dedicated', 'secondline-psb-custom-buttons' ); ?> <a href="https://secondlinethemes.com/themes/?utm_source=psb-plugin-notice" target="_blank"><?php esc_html_e( 'Podcast Theme.', 'secondline-psb-custom-buttons' );?></a> <?php esc_html_e( 'Brought to you by the creators of the Podcast Subscribe Buttons plugin!', 'secondline-psb-custom-buttons' ); ?></p>
		</div>
		<?php
	}
}
add_action( 'admin_notices', 'secondline_psb_notice' );
add_action( 'admin_init', array( 'PAnD', 'init' ) );

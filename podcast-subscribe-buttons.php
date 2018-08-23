<?php
/*
Plugin Name: Podcast Subscribe Buttons
Description: Custom Subscribe Buttons For Podcasts
Version: 1.0
Author: SecondLine Themes
Author URI: http://secondlinethemes.com
Author Email: support@secondlinethemes.com
License: GNU General Public License v3.0
Text Domain: secondline-custom-buttons
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.


define( 'SECONDLINE_SUBSCRIBE_ELEMENTS_URL', plugins_url( '/', __FILE__ ) );
define( 'SECONDLINE_SUBSCRIBE_ELEMENTS_PATH', plugin_dir_path( __FILE__ ) );


// Translation Setup
add_action('plugins_loaded', 'secondline_theme_elements_buttons');
function secondline_theme_elements_buttons() {
	load_plugin_textdomain( 'secondline-elements-buttons', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}

/**
 * Registering Custom Post Type
 */
add_action('init', 'secondline_subscribe_custom_post_type_init');
function secondline_subscribe_custom_post_type_init() {	
	
	register_post_type(
		'secondline_subscribe',
		array(
			'labels' => array(
				'name' => esc_html__( 'Subscribe Buttons', 'secondline-custom-buttons' ),
				'singular_name' => esc_html__( 'Subscribe Button', 'secondline-custom-buttons' )
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
function secondline_custom_subscribe_shortcode() {
    add_shortcode( 'podcast_subscribe', 'secondline_subscribe_shortcode' );
}
add_action( 'init', 'secondline_custom_subscribe_shortcode' );

function secondline_subscribe_shortcode( $atts ) {
    global $wp_query,
        $post;

    $atts = shortcode_atts( array(
        'id' => null,
    ), $atts );

    $secondline_loop = new WP_Query( array(
        'post_type'         => 'secondline_subscribe',
		'posts_per_page'    => 1,
        'p'     => $atts['id'],        
    ) );

    if( ! $secondline_loop->have_posts() ) {
        return false;
    }

    while( $secondline_loop->have_posts() ) {
        $secondline_loop->the_post();
		ob_start();        
		include SECONDLINE_SUBSCRIBE_ELEMENTS_PATH . 'template-parts/subscribe-button.php';
		return ob_get_clean();
    }

    wp_reset_postdata();
}

/* Add Custom Culumns to the Post List */

add_filter('manage_edit-secondline_subscribe_columns', 'secondline_subscribe_column');
function secondline_subscribe_column($columns) {
    $columns['shortcode'] = 'Shortcode';
    return $columns;
}

add_action('manage_posts_custom_column',  'secondline_show_subscribe_column');
function secondline_show_subscribe_column($name) {
    global $post;
    switch ($name) {
        case 'shortcode':
            $shortcode = '[podcast_subscribe id="' . $post->ID .'"]';
            echo $shortcode;
    }
}


/* Add Shortcode Details after Post Title */
add_action( 'edit_form_after_title', 'secondline_edit_form_after_title' );

function secondline_edit_form_after_title() {
	global $post;
	if ( 'secondline_subscribe' == get_post_type() ) {	
		echo '<strong><p>'. esc_html__('Shortcode: ', 'secondline-custom-buttons') .'</p></strong>';
		echo '<code>[podcast_subscribe id="' . $post->ID .'"]</code>';
	}
}

// Calling Custom Metaboxes (CMB2)
require_once SECONDLINE_SUBSCRIBE_ELEMENTS_PATH.'CMB2/cmb2-init.php';


// Enqueue Script & Styles
function secondline_button_scripts() {
    wp_register_style( 'secondline-subscribe-button-styles',  SECONDLINE_SUBSCRIBE_ELEMENTS_URL . 'assets/css/secondline-styles.css' );
    wp_enqueue_style(  'secondline-subscribe-button-styles' );
    wp_enqueue_script( 'secondline_button_modal_script', SECONDLINE_SUBSCRIBE_ELEMENTS_URL . 'assets/js/modal.min.js' );
	wp_enqueue_script( 'secondline_button_custom_scripts', SECONDLINE_SUBSCRIBE_ELEMENTS_URL . 'assets/js/secondline-modal.js' );
}
add_action( 'wp_enqueue_scripts', 'secondline_button_scripts' );

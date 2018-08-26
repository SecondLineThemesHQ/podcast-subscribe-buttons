<?php

// Check if CMB2 is already installed
if ( ! function_exists( 'cmb2_bootstrap' ) ) {	
	if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/cmb2/init.php';
	} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/CMB2/init.php';
	}
}


add_action( 'cmb2_admin_init', 'secondline_psb_index_subscribe_social_meta_box' );
function secondline_psb_index_subscribe_social_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'secondline_psb_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$secondline_psb_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_subscribe_btn',
		'title'         => esc_html__('Subscribe Links', 'secondline-psb-custom-buttons'),
		'object_types'  => array( 'secondline_psb_post' ), // Post type
	) );
	
	$secondline_psb_cmb_demo->add_field( array(
		'name'       => esc_html__('Button Text', 'secondline-psb-custom-buttons'),
		'default' 	 => 'Subscribe',
		'id'         => $prefix . 'text',
		'type'       => 'text',
	) );	
	
	$secondline_psb_cmb_demo->add_field( array(
		'name'       => esc_html__('Button Type', 'secondline-psb-custom-buttons'),
		'id'         => $prefix . 'select_type',
		'type'       => 'select',		
		'default'	 => 'modal',
		'options'     => array(
			'modal'   => esc_attr__( 'Modal / Pop-Up', 'secondline-psb-custom-buttons' ), // since version 1.1.4, {#} gets replaced by row number
			'inline'    => esc_attr__( 'Inline Buttons', 'secondline-psb-custom-buttons' ),
			'list' => esc_attr__( 'List of Buttons', 'secondline-psb-custom-buttons' ),
		),		
	) );	

	$secondline_psb_cmb_demo->add_field( array(
		'name'       => esc_html__('Button Style', 'secondline-psb-custom-buttons'),
		'id'         => $prefix . 'select_style',
		'type'       => 'select',
		'options'     => array(
			'square'   => esc_attr__( 'Square', 'secondline-psb-custom-buttons' ), // since version 1.1.4, {#} gets replaced by row number
			'radius'    => esc_attr__( 'Rounded Square', 'secondline-psb-custom-buttons' ),
			'round' => esc_attr__( 'Rounded', 'secondline-psb-custom-buttons' ),
		),		
	) );		
	
	$secondline_psb_cmb_demo->add_field( array(
		'name'       => esc_html__('Background Color', 'secondline-psb-custom-buttons'),
		'id'         => $prefix . 'background_color',
		'type'       => 'colorpicker',
		'default' => '#000000',
		'options' => array(
			'alpha' => true,
		),	
	) );

	$secondline_psb_cmb_demo->add_field( array(
		'name'       => esc_html__('Text Color', 'secondline-psb-custom-buttons'),
		'id'         => $prefix . 'text_color',
		'type'       => 'colorpicker',
		'default' => '#ffffff',
		'options' => array(
			'alpha' => true,
		),	
	) );	

	$secondline_psb_cmb_demo->add_field( array(
		'name'       => esc_html__('Hover Background Background', 'secondline-psb-custom-buttons'),
		'id'         => $prefix . 'background_color_hover',
		'type'       => 'colorpicker',
		'default' => '#2a2a2a',
		'options' => array(
			'alpha' => true,
		),	
	) );	
	
	$secondline_psb_cmb_demo->add_field( array(
		'name'       => esc_html__('Hover Text Color', 'secondline-psb-custom-buttons'),
		'id'         => $prefix . 'text_color_hover',
		'type'       => 'colorpicker',
		'default' => '#ffffff',
		'options' => array(
			'alpha' => true,
		),	
	) );	
	
	
	$slt_subscribe_group_field_id = $secondline_psb_cmb_demo->add_field( array(
		'id'          => $prefix . 'repeat_subscribe',
		'type'        => 'group',
		'description' => esc_attr__( 'Add Subscribe Button Links', 'secondline-psb-custom-buttons' ),
		// 'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'   => esc_attr__( 'Subscribe Link {#}', 'secondline-psb-custom-buttons' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => esc_attr__( 'Add Another Link', 'secondline-psb-custom-buttons' ),
			'remove_button' => esc_attr__( 'Remove Link', 'secondline-psb-custom-buttons' ),
			'sortable'      => true, // beta
			'closed'		=> true,
		),
	) );

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$secondline_psb_cmb_demo->add_group_field( $slt_subscribe_group_field_id, array(
		'name' => 'Subscribe Platform',
		'id'   => $prefix . 'subscribe_platform',
		'type' => 'select',
		'options'          => array(
			'Apple-Podcasts' => esc_attr__( 'Apple Podcasts', 'secondline-psb-custom-buttons' ),
			'Google-Podcasts' => esc_attr__( 'Google Podcasts', 'secondline-psb-custom-buttons' ),
			'iTunes' => esc_attr__( 'iTunes', 'secondline-psb-custom-buttons' ),			
			'Google-Play' => esc_attr__( 'Google Play', 'secondline-psb-custom-buttons' ),			
			'Stitcher' => esc_attr__( 'Stitcher', 'secondline-psb-custom-buttons' ),
			'RSS' => esc_attr__( 'RSS', 'secondline-psb-custom-buttons' ),
			'SoundCloud' => esc_attr__( 'SoundCloud', 'secondline-psb-custom-buttons' ),
			'Spotify' => esc_attr__( 'Spotify', 'secondline-psb-custom-buttons' ),
			'TuneIn' => esc_attr__( 'TuneIn', 'secondline-psb-custom-buttons' ),
			'Spreaker' => esc_attr__( 'Spreaker', 'secondline-psb-custom-buttons' ),
			'Miro' => esc_attr__( 'Miro', 'secondline-psb-custom-buttons' ),
			'iHeartRadio' => esc_attr__( 'iHeartRadio', 'secondline-psb-custom-buttons' ),
			'Blubrry' => esc_attr__( 'Blubrry', 'secondline-psb-custom-buttons' ),
			'Clammr' => esc_attr__( 'Clammr', 'secondline-psb-custom-buttons' ),
			'Castbox' => esc_attr__( 'Castbox', 'secondline-psb-custom-buttons' ),
			'Overcast' => esc_attr__( 'Overcast', 'secondline-psb-custom-buttons' ),
			'PocketCasts' => esc_attr__( 'PocketCasts', 'secondline-psb-custom-buttons' ),
			'Downcast' => esc_attr__( 'Downcast', 'secondline-psb-custom-buttons' ),
			'Deezer' => esc_attr__( 'Deezer', 'secondline-psb-custom-buttons' ),
			'Castro' => esc_attr__( 'Castro', 'secondline-psb-custom-buttons' ),
			'Libsyn' => esc_attr__( 'Libsyn', 'secondline-psb-custom-buttons' ),
			'MixCloud' => esc_attr__( 'MixCloud', 'secondline-psb-custom-buttons' ),
			'Podbean' => esc_attr__( 'Podbean', 'secondline-psb-custom-buttons' ),
			'Amazon-Alexa' => esc_attr__( 'Amazon Alexa', 'secondline-psb-custom-buttons' ),
		),		
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$secondline_psb_cmb_demo->add_group_field( $slt_subscribe_group_field_id, array(
		'name' => 'Link',
		'id'   => $prefix . 'subscribe_url',
		'type' => 'text_url',
	) );
	
	
}
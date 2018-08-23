<?php


if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}


add_action( 'cmb2_admin_init', 'secondline_themes_index_subscribe_social_meta_box' );
function secondline_themes_index_subscribe_social_meta_box() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'secondline_themes_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$secondline_themes_cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_subscribe_btn',
		'title'         => esc_html__('Subscribe Links', 'secondline-custom-buttons'),
		'object_types'  => array( 'secondline_subscribe' ), // Post type
	) );
	
	$secondline_themes_cmb_demo->add_field( array(
		'name'       => esc_html__('Button Text', 'secondline-custom-buttons'),
		'default' 	 => 'Subscribe',
		'id'         => $prefix . 'text',
		'type'       => 'text',
	) );	
	
	$secondline_themes_cmb_demo->add_field( array(
		'name'       => esc_html__('Button Type', 'secondline-custom-buttons'),
		'id'         => $prefix . 'select_type',
		'type'       => 'select',		
		'default'	 => 'modal',
		'options'     => array(
			'modal'   => esc_attr__( 'Modal / Pop-Up', 'secondline-custom-buttons' ), // since version 1.1.4, {#} gets replaced by row number
			'inline'    => esc_attr__( 'Inline Buttons', 'secondline-custom-buttons' ),
			'list' => esc_attr__( 'List of Buttons', 'secondline-custom-buttons' ),
		),		
	) );	

	$secondline_themes_cmb_demo->add_field( array(
		'name'       => esc_html__('Button Style', 'secondline-custom-buttons'),
		'id'         => $prefix . 'select_style',
		'type'       => 'select',
		'options'     => array(
			'square'   => esc_attr__( 'Square', 'secondline-custom-buttons' ), // since version 1.1.4, {#} gets replaced by row number
			'radius'    => esc_attr__( 'Rounded Square', 'secondline-custom-buttons' ),
			'round' => esc_attr__( 'Rounded', 'secondline-custom-buttons' ),
		),		
	) );		
	
	$secondline_themes_cmb_demo->add_field( array(
		'name'       => esc_html__('Background Color', 'secondline-custom-buttons'),
		'id'         => $prefix . 'background_color',
		'type'       => 'colorpicker',
		'default' => '#000000',
		'options' => array(
			'alpha' => true,
		),	
	) );

	$secondline_themes_cmb_demo->add_field( array(
		'name'       => esc_html__('Text Color', 'secondline-custom-buttons'),
		'id'         => $prefix . 'text_color',
		'type'       => 'colorpicker',
		'default' => '#ffffff',
		'options' => array(
			'alpha' => true,
		),	
	) );	

	$secondline_themes_cmb_demo->add_field( array(
		'name'       => esc_html__('Hover Background Background', 'secondline-custom-buttons'),
		'id'         => $prefix . 'background_color_hover',
		'type'       => 'colorpicker',
		'default' => '#2a2a2a',
		'options' => array(
			'alpha' => true,
		),	
	) );	
	
	$secondline_themes_cmb_demo->add_field( array(
		'name'       => esc_html__('Hover Text Color', 'secondline-custom-buttons'),
		'id'         => $prefix . 'text_color_hover',
		'type'       => 'colorpicker',
		'default' => '#ffffff',
		'options' => array(
			'alpha' => true,
		),	
	) );	
	
	
	$slt_subscribe_group_field_id = $secondline_themes_cmb_demo->add_field( array(
		'id'          => $prefix . 'repeat_subscribe',
		'type'        => 'group',
		'description' => esc_attr__( 'Add Subscribe Button Links', 'secondline-custom-buttons' ),
		// 'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'   => esc_attr__( 'Subscribe Link {#}', 'secondline-custom-buttons' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => esc_attr__( 'Add Another Link', 'secondline-custom-buttons' ),
			'remove_button' => esc_attr__( 'Remove Link', 'secondline-custom-buttons' ),
			'sortable'      => true, // beta
			'closed'		=> true,
		),
	) );

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$secondline_themes_cmb_demo->add_group_field( $slt_subscribe_group_field_id, array(
		'name' => 'Subscribe Platform',
		'id'   => $prefix . 'subscribe_platform',
		'type' => 'select',
		'options'          => array(
			'Apple-Podcasts' => esc_attr__( 'Apple Podcasts', 'secondline-custom-buttons' ),
			'Google-Podcasts' => esc_attr__( 'Google Podcasts', 'secondline-custom-buttons' ),
			'iTunes' => esc_attr__( 'iTunes', 'secondline-custom-buttons' ),			
			'Google-Play' => esc_attr__( 'Google Play', 'secondline-custom-buttons' ),			
			'Stitcher' => esc_attr__( 'Stitcher', 'secondline-custom-buttons' ),
			'RSS' => esc_attr__( 'RSS', 'secondline-custom-buttons' ),
			'SoundCloud' => esc_attr__( 'SoundCloud', 'secondline-custom-buttons' ),
			'Spotify' => esc_attr__( 'Spotify', 'secondline-custom-buttons' ),
			'TuneIn' => esc_attr__( 'TuneIn', 'secondline-custom-buttons' ),
			'Spreaker' => esc_attr__( 'Spreaker', 'secondline-custom-buttons' ),
			'Miro' => esc_attr__( 'Miro', 'secondline-custom-buttons' ),
			'iHeartRadio' => esc_attr__( 'iHeartRadio', 'secondline-custom-buttons' ),
			'Blubrry' => esc_attr__( 'Blubrry', 'secondline-custom-buttons' ),
			'Clammr' => esc_attr__( 'Clammr', 'secondline-custom-buttons' ),
			'Castbox' => esc_attr__( 'Castbox', 'secondline-custom-buttons' ),
			'Overcast' => esc_attr__( 'Overcast', 'secondline-custom-buttons' ),
			'PocketCasts' => esc_attr__( 'PocketCasts', 'secondline-custom-buttons' ),
			'Downcast' => esc_attr__( 'Downcast', 'secondline-custom-buttons' ),
			'Deezer' => esc_attr__( 'Deezer', 'secondline-custom-buttons' ),
			'Castro' => esc_attr__( 'Castro', 'secondline-custom-buttons' ),
			'Libsyn' => esc_attr__( 'Libsyn', 'secondline-custom-buttons' ),
			'MixCloud' => esc_attr__( 'MixCloud', 'secondline-custom-buttons' ),
			'Podbean' => esc_attr__( 'Podbean', 'secondline-custom-buttons' ),
			'Amazon-Alexa' => esc_attr__( 'Amazon Alexa', 'secondline-custom-buttons' ),
		),		
		//'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

	$secondline_themes_cmb_demo->add_group_field( $slt_subscribe_group_field_id, array(
		'name' => 'Link',
		'id'   => $prefix . 'subscribe_url',
		'type' => 'text_url',
	) );
	
	
}
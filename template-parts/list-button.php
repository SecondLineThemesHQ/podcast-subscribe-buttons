<?php
/**
 * @package slt
 */
?>


<div id="secondline-psb-button-list">
	<?php                  
		$secondline_psb_subscribe_entries = get_post_meta( get_the_ID(), 'secondline_psb_repeat_subscribe', true );

		if($secondline_psb_subscribe_entries != '') {
			echo '<div class="secondline-psb-subscribe-list"><ul>';
			foreach ( (array) $secondline_psb_subscribe_entries as $key => $entry ) {

				$secondline_psb_link = $secondline_psb_platform_slt = '';													

				if ( isset( $entry['secondline_psb_subscribe_platform'] ) ) {
					$secondline_psb_platform_slt = esc_html( $entry['secondline_psb_subscribe_platform'] );
					$secondline_psb_platform_text = str_replace("-", " ", $secondline_psb_platform_slt); 
				}
				if ( isset( $entry['secondline_psb_subscribe_url'] ) ) {
					$secondline_psb_link = esc_html( $entry['secondline_psb_subscribe_url'] );
				}
				if ( isset( $entry['secondline_psb_custom_link_label'] ) ) {
					$custom_label_secondline = esc_html( $entry['secondline_psb_custom_link_label'] );
				} else {
					$custom_label_secondline = $secondline_psb_link;
				}							
				if(($secondline_psb_link != '') && ($secondline_psb_platform_slt != '') && ($secondline_psb_platform_slt != 'custom') ) {
					echo '<li class="secondline-psb-subscribe-'.esc_attr($secondline_psb_platform_slt).'"><a onClick="window.open(`'. esc_url($secondline_psb_link) .'`, `_blank`)" onMouseOver="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_text_color_hover', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_background_color_hover', true )) .'`" onMouseOut="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_text_color', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_background_color', true )) .'`" style="color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_text_color', true )) .'; background-color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_background_color', true )) .'" class="button podcast-subscribe-button" href="' . esc_url($secondline_psb_link) . '" target="_blank"><img class="secondline-psb-subscribe-img" src="'. SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_URL .'assets/img/icons/' . esc_attr($secondline_psb_platform_slt) . '.png' .'" />' . esc_html($secondline_psb_platform_text) . '</a></li>';
				} elseif(($secondline_psb_link != '') && ($secondline_psb_platform_slt == 'custom') ) {
					echo '<li class="secondline-psb-subscribe-'.esc_attr($secondline_psb_platform_slt).'"><a onClick="window.open(`'. esc_url($secondline_psb_link) .'`, `_blank`)" onMouseOver="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_text_color_hover', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_background_color_hover', true )) .'`" onMouseOut="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_text_color', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_background_color', true )) .'`" style="color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_text_color', true )) .'; background-color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_background_color', true )) .'" class="button podcast-subscribe-button" href="' . esc_url($secondline_psb_link) . '" target="_blank"><img class="secondline-psb-subscribe-img" src="'. SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_URL .'assets/img/icons/' . esc_attr($secondline_psb_platform_slt) . '.png' .'" />' . esc_html($custom_label_secondline) . '</a></li>';
				}							
			}
			echo '</ul></div>'; //
		}
	;?>                                       
</div> 

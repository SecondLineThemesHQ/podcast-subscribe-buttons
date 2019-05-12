<?php
/**
 * @package slt
 */
?>
	
	<div id="podcast-subscribe-button-<?php echo $post->ID;?>" class="secondline-psb-<?php echo esc_html(get_post_meta($post->ID, 'secondline_psb_select_style', true));?>-style">				
		<?php
			if ($atts['type'] != null) {
				if($atts['type'] == 'modal') {
					include SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_PATH . 'template-parts/modal-button.php';
				} elseif($atts['type'] == 'inline') {
					include SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_PATH . 'template-parts/inline-button.php';
				} elseif($atts['type'] == 'list') {
					include SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_PATH . 'template-parts/list-button.php';
				}		
			} elseif((get_post_meta($post->ID, 'secondline_psb_select_type', true) == 'modal')) {
				include SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_PATH . 'template-parts/modal-button.php';
			} elseif(get_post_meta($post->ID, 'secondline_psb_select_type', true) == 'inline') {
				include SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_PATH . 'template-parts/inline-button.php';
			} elseif(get_post_meta($post->ID, 'secondline_psb_select_type', true) == 'list') {
				include SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_PATH . 'template-parts/list-button.php';
			};
			
			wp_reset_query();
			
		?>		
	</div>
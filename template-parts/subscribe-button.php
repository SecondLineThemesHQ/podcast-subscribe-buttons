<?php
/**
 * @package slt
 */
?>

	<div id="podcast-subscribe-button-<?php echo $post->ID;?>" class="secondline-psb-<?php echo esc_html(get_post_meta($post->ID, 'secondline_psb_select_style', true));?>-style">				
		<?php if(get_post_meta($post->ID, 'secondline_psb_select_type', true) == 'modal') :?>
			<a class="button podcast-subscribe-button" <?php echo 'onMouseOver="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_text_color_hover', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_background_color_hover', true )) .'`" onMouseOut="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_text_color', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_background_color', true )) .'`" style="color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_text_color', true )) .'; background-color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_background_color', true )) .'"';?> href="#!"><?php echo esc_html(get_post_meta($post->ID, 'secondline_psb_text', true));?></a>   
			<!-- Modal HTML embedded directly into document -->
			<div id="secondline-psb-subs-modal" class="modal">
				<?php                  
					$secondline_psb_subscribe_entries = get_post_meta( get_the_ID(), 'secondline_psb_repeat_subscribe', true );

					if($secondline_psb_subscribe_entries != '') {
						echo '<div class="secondline-psb-subscribe-modal"><ul>';
						foreach ( (array) $secondline_psb_subscribe_entries as $key => $entry ) {

							$secondline_psb_link = $secondline_psb_platform_slt = '';													

							if ( isset( $entry['secondline_psb_subscribe_platform'] ) ) {
								$secondline_psb_platform_slt = esc_html( $entry['secondline_psb_subscribe_platform'] );
								$secondline_psb_platform_text = str_replace("-", " ", $secondline_psb_platform_slt); 
							}

							if ( isset( $entry['secondline_psb_subscribe_url'] ) ) {
								$secondline_psb_link = esc_html( $entry['secondline_psb_subscribe_url'] );
							}
							if(($secondline_psb_link != '') && ($secondline_psb_platform_slt != '')) {
								echo '<li class="secondline-psb-subscribe-'.$secondline_psb_platform_slt.'"><a href="' . $secondline_psb_link . '" target="_blank"><img class="secondline-psb-subscribe-img" src="'. SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_URL .'assets/img/icons/' . $secondline_psb_platform_slt . '.png' .'" />' . $secondline_psb_platform_text . '</a></li>';
							}
						}
						echo '</ul></div>'; //
					}
				?>                                       
			</div>                                
		<?php elseif(get_post_meta($post->ID, 'secondline_psb_select_type', true) == 'inline') :?>    			  			
			<?php                  
				$secondline_psb_subscribe_entries = get_post_meta( get_the_ID(), 'secondline_psb_repeat_subscribe', true );

				if($secondline_psb_subscribe_entries != '') {
					echo '<div class="secondline-psb-subscribe-inline">';
					foreach ( (array) $secondline_psb_subscribe_entries as $key => $entry ) {

						$secondline_psb_link = $secondline_psb_platform_slt = '';													

						if ( isset( $entry['secondline_psb_subscribe_platform'] ) ) {
							$secondline_psb_platform_slt = esc_html( $entry['secondline_psb_subscribe_platform'] );
							$secondline_psb_platform_text = str_replace("-", " ", $secondline_psb_platform_slt); 
						}

						if ( isset( $entry['secondline_psb_subscribe_url'] ) ) {
							$secondline_psb_link = esc_html( $entry['secondline_psb_subscribe_url'] );
						}
						if(($secondline_psb_link != '') && ($secondline_psb_platform_slt != '')) {
							echo '<span class="secondline-psb-subscribe-'.$secondline_psb_platform_slt.'"><a onMouseOver="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_text_color_hover', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_background_color_hover', true )) .'`" onMouseOut="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_text_color', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_background_color', true )) .'`" style="color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_text_color', true )) .'; background-color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_background_color', true )) .'" class="button podcast-subscribe-button" href="' . $secondline_psb_link . '" target="_blank"><img class="secondline-psb-subscribe-img" src="'. SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_URL .'assets/img/icons/' . $secondline_psb_platform_slt . '.png' .'" />' . $secondline_psb_platform_text . '</a><span>';
						}
					}
					echo '</div>'; //
				}
			?>                                       
		<?php elseif(get_post_meta($post->ID, 'secondline_psb_select_type', true) == 'list') :?>   	  
			<!-- Modal HTML embedded directly into document -->
			<div id="secondline-psb-button-list"">
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
							if(($secondline_psb_link != '') && ($secondline_psb_platform_slt != '')) {
								echo '<li class="secondline-psb-subscribe-'.$secondline_psb_platform_slt.'"><a onMouseOver="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_text_color_hover', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_background_color_hover', true )) .'`" onMouseOut="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_text_color', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_background_color', true )) .'`" style="color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_text_color', true )) .'; background-color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_psb_background_color', true )) .'" class="button podcast-subscribe-button" href="' . $secondline_psb_link . '" target="_blank"><img class="secondline-psb-subscribe-img" src="'. SECONDLINE_PSB_SUBSCRIBE_ELEMENTS_URL .'assets/img/icons/' . $secondline_psb_platform_slt . '.png' .'" />' . $secondline_psb_platform_text . '</a></li>';
							}
						}
						echo '</ul></div>'; //
					}
				?>                                       
			</div>   
		<?php endif; ?>		
	</div>		
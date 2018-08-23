<?php
/**
 * @package slt
 */
?>

	<div id="podcast-subscribe-button-<?php echo $post->ID;?>" class="secondline-<?php echo esc_html(get_post_meta($post->ID, 'secondline_themes_select_style', true));?>-style">				
		<?php if(get_post_meta($post->ID, 'secondline_themes_select_type', true) == 'modal') :?>
			<a class="button podcast-subscribe-button" <?php echo 'onMouseOver="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_text_color_hover', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_background_color_hover', true )) .'`" onMouseOut="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_text_color', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_background_color', true )) .'`" style="color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_text_color', true )) .'; background-color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_background_color', true )) .'"';?> href="#!"><?php echo esc_html(get_post_meta($post->ID, 'secondline_themes_text', true));?></a>   
			<!-- Modal HTML embedded directly into document -->
			<div id="secondline-subs-modal" class="modal">
				<?php                  
					$secondline_subscribe_entries = get_post_meta( get_the_ID(), 'secondline_themes_repeat_subscribe', true );

					if($secondline_subscribe_entries != '') {
						echo '<div class="secondline-subscribe-modal"><ul>';
						foreach ( (array) $secondline_subscribe_entries as $key => $entry ) {

							$secondline_link = $secondline_platform_slt = '';													

							if ( isset( $entry['secondline_themes_subscribe_platform'] ) ) {
								$secondline_platform_slt = esc_html( $entry['secondline_themes_subscribe_platform'] );
								$secondline_platform_text = str_replace("-", " ", $secondline_platform_slt); 
							}

							if ( isset( $entry['secondline_themes_subscribe_url'] ) ) {
								$secondline_link = esc_html( $entry['secondline_themes_subscribe_url'] );
							}
							if(($secondline_link != '') && ($secondline_platform_slt != '')) {
								echo '<li class="secondline-subscribe-'.$secondline_platform_slt.'"><a href="' . $secondline_link . '" target="_blank"><img class="secondline-subscribe-img" src="'. SECONDLINE_SUBSCRIBE_ELEMENTS_URL .'assets/img/icons/' . $secondline_platform_slt . '.png' .'" />' . $secondline_platform_text . '</a></li>';
							}
						}
						echo '</ul></div>'; //
					}
				?>                                       
			</div>                                
		<?php elseif(get_post_meta($post->ID, 'secondline_themes_select_type', true) == 'inline') :?>    			  			
			<?php                  
				$secondline_subscribe_entries = get_post_meta( get_the_ID(), 'secondline_themes_repeat_subscribe', true );

				if($secondline_subscribe_entries != '') {
					echo '<div class="secondline-subscribe-inline">';
					foreach ( (array) $secondline_subscribe_entries as $key => $entry ) {

						$secondline_link = $secondline_platform_slt = '';													

						if ( isset( $entry['secondline_themes_subscribe_platform'] ) ) {
							$secondline_platform_slt = esc_html( $entry['secondline_themes_subscribe_platform'] );
							$secondline_platform_text = str_replace("-", " ", $secondline_platform_slt); 
						}

						if ( isset( $entry['secondline_themes_subscribe_url'] ) ) {
							$secondline_link = esc_html( $entry['secondline_themes_subscribe_url'] );
						}
						if(($secondline_link != '') && ($secondline_platform_slt != '')) {
							echo '<span class="secondline-subscribe-'.$secondline_platform_slt.'"><a onMouseOver="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_text_color_hover', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_background_color_hover', true )) .'`" onMouseOut="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_text_color', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_background_color', true )) .'`" style="color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_text_color', true )) .'; background-color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_background_color', true )) .'" class="button podcast-subscribe-button" href="' . $secondline_link . '" target="_blank"><img class="secondline-subscribe-img" src="'. SECONDLINE_SUBSCRIBE_ELEMENTS_URL .'assets/img/icons/' . $secondline_platform_slt . '.png' .'" />' . $secondline_platform_text . '</a><span>';
						}
					}
					echo '</div>'; //
				}
			?>                                       
		<?php elseif(get_post_meta($post->ID, 'secondline_themes_select_type', true) == 'list') :?>   	  
			<!-- Modal HTML embedded directly into document -->
			<div id="secondline-button-list"">
				<?php                  
					$secondline_subscribe_entries = get_post_meta( get_the_ID(), 'secondline_themes_repeat_subscribe', true );

					if($secondline_subscribe_entries != '') {
						echo '<div class="secondline-subscribe-list"><ul>';
						foreach ( (array) $secondline_subscribe_entries as $key => $entry ) {

							$secondline_link = $secondline_platform_slt = '';													

							if ( isset( $entry['secondline_themes_subscribe_platform'] ) ) {
								$secondline_platform_slt = esc_html( $entry['secondline_themes_subscribe_platform'] );
								$secondline_platform_text = str_replace("-", " ", $secondline_platform_slt); 
							}

							if ( isset( $entry['secondline_themes_subscribe_url'] ) ) {
								$secondline_link = esc_html( $entry['secondline_themes_subscribe_url'] );
							}
							if(($secondline_link != '') && ($secondline_platform_slt != '')) {
								echo '<li class="secondline-subscribe-'.$secondline_platform_slt.'"><a onMouseOver="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_text_color_hover', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_background_color_hover', true )) .'`" onMouseOut="this.style.color=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_text_color', true )) .'`; this.style.backgroundColor=`'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_background_color', true )) .'`" style="color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_text_color', true )) .'; background-color:'. esc_attr(get_post_meta( get_the_ID(), 'secondline_themes_background_color', true )) .'" class="button podcast-subscribe-button" href="' . $secondline_link . '" target="_blank"><img class="secondline-subscribe-img" src="'. SECONDLINE_SUBSCRIBE_ELEMENTS_URL .'assets/img/icons/' . $secondline_platform_slt . '.png' .'" />' . $secondline_platform_text . '</a></li>';
							}
						}
						echo '</ul></div>'; //
					}
				?>                                       
			</div>   
		<?php endif; ?>		
	</div>		
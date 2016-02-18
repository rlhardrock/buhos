<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*
*
*
** Name : Color styles
*/
$color_position = array(
	'Left',
	'Center',
	'Right'
);
$repeat_img = array(
	'no-repeat'	=> 'No repeat',
	'repeat' 	=> 'Tile',
	'repeat-x'	=> 'Tile Horizontally',
	'repeat-y'	=> 'Tile Vertically'
);
$attachament_img = array(
	'scroll' 	=> 'Scroll',
	'fixed'  	=> 'Fixed'
);
?>
<script type="text/javascript">
	jQuery(document).ready(function($){
		$("#restore_font").click(function(){
			var answer = confirm('Do you really want to reset all Colors settings?');
			return answer;
		});
	});
</script>
<section id="main_content">
	<?php
	if(isset($_REQUEST['all']))
	{
	/* all names settings */

	$cuckoo_style = array( 
	'subtitle-static' 			=> esc_attr( ($_POST['color_picker_color-1']) ) , 
	'subtitle-hover' 			=> esc_attr( ($_POST['color_picker_color-2']) ) , 
	'subtitle-visited' 			=> esc_attr( ($_POST['color_picker_color-3']) ) , 	
	'underline-static' 			=> esc_attr( ($_POST['color_picker_color-4']) ) , 
	'underline-hover' 			=> esc_attr( ($_POST['color_picker_color-5']) ) , 
	'underline-visited' 		=> esc_attr( ($_POST['color_picker_color-6']) ) , 
	'another-hover' 			=> esc_attr( ($_POST['color_picker_color-7']) ) , 
	'another-visited' 			=> esc_attr( ($_POST['color_picker_color-8']) ) , 
	'theme-primary-color' 		=> esc_attr( ($_POST['color_picker_color-9']) ) , 
	'theme-secondary-1-color' 	=> esc_attr( ($_POST['color_picker_color-10']) ) , 
	'theme-secondary-2-color' 	=> esc_attr( ($_POST['color_picker_color-11']) ) , 
	'theme-secondary-3-color' 	=> esc_attr( ($_POST['color_picker_color-12']) ) , 
	'selected-color' 			=> esc_attr( ($_POST['color_picker_color-13']) ) , 
	'ipad-shadow-color' 		=> esc_attr( ($_POST['color_picker_color-14']) ) , 
	'all-button-color' 			=> esc_attr( ($_POST['color_picker_color-15']) ) , 
	'map-button-color' 			=> esc_attr( ($_POST['color_picker_color-16']) ) , 
	'reply-button-color' 		=> esc_attr( ($_POST['color_picker_color-17']) ) ,
	'first-comment-color' 		=> esc_attr( ($_POST['color_picker_color-18']) ) , 
	'children-comment-color' 	=> esc_attr( ($_POST['color_picker_color-19']) ) , 
	'reply-block-color' 		=> esc_attr( ($_POST['color_picker_color-20']) ) , 
	'subtitle-line-color' 		=> esc_attr( ($_POST['color_picker_color-21']) ) , 
	'comment-line-color' 		=> esc_attr( ($_POST['color_picker_color-22']) ) , 
	'all-lines-color' 			=> esc_attr( ($_POST['color_picker_color-23']) ) , 
	'background-position' 		=> esc_attr( ($_POST['background-position']) ) , 
	'background-image' 			=> esc_attr( ($_POST['upload_image1']) ) , 
	'background-repeat' 		=> esc_attr( ($_POST['background-repeat']) ) , 
	'background-attachment' 	=> esc_attr( ($_POST['background-attachment']) ) , 	
	'background-color' 			=> esc_attr( ($_POST['color_picker_color-24']) ) , 
	'selected-font-color' 		=> esc_attr( ($_POST['color_picker_color-25']) ) , 
	'lightbox-color' 			=> esc_attr( ($_POST['color_picker_color-26']) ) , 
	'display_one_px_effect' 	=> esc_attr( ($_POST['display_one_px_effect']) ) ,
	'overlay_lines_slideshow' 	=> esc_attr( ($_POST['overlay_lines_slideshow']) ) ,
	'related-works-position' 	=> esc_attr( ($_POST['related-works-position']) ) , 
	'related-works-image' 		=> esc_attr( ($_POST['upload_image2']) ) , 
	'related-works-repeat' 		=> esc_attr( ($_POST['related-works-repeat']) ) , 
	'related-works-attachment' 	=> esc_attr( ($_POST['related-works-attachment']) ) , 
	'related-works-color' 		=> esc_attr( ($_POST['color_picker_color-27']) ) , 	
	'related-posts-position' 	=> esc_attr( ($_POST['related-posts-position']) ) , 
	'related-posts-image' 		=> esc_attr( ($_POST['upload_image3']) ) , 
	'related-posts-repeat' 		=> esc_attr( ($_POST['related-posts-repeat']) ) , 
	'related-posts-attachment' 	=> esc_attr( ($_POST['related-posts-attachment']) ) , 
	'related-posts-color' 		=> esc_attr( ($_POST['color_picker_color-28']) ) , 	
	'footer-position' 			=> esc_attr( ($_POST['footer-position']) ) , 
	'footer-image' 				=> esc_attr( ($_POST['upload_image4']) ) , 
	'footer-repeat' 			=> esc_attr( ($_POST['footer-repeat']) ) , 
	'footer-attachment' 		=> esc_attr( ($_POST['footer-attachment']) ) , 
	'footer-color' 				=> esc_attr( ($_POST['color_picker_color-29']) ) , 
	/* New elements Since 2.0 */
	'parallax' 					=> esc_attr($_POST['parallax-effect-1']), 
	'parallax-speed' 			=> $speed = ( esc_attr($_POST['parallax-speed-1']) == '' ? 10 : esc_attr($_POST['parallax-speed-1'])),	
	'parallax-related-works' 	=> esc_attr($_POST['parallax-effect-2']), 
	'parallax-speed-related-works' => $speedReW = ( esc_attr($_POST['parallax-speed-2']) == '' ? 10 : esc_attr($_POST['parallax-speed-2'])),	
	'parallax-related-post' 	=> esc_attr($_POST['parallax-effect-3']), 
	'parallax-speed-related-post' => $speedReP = ( esc_attr($_POST['parallax-speed-3']) == '' ? 10 : esc_attr($_POST['parallax-speed-3'])),	
	'parallax-footer' 			=> esc_attr($_POST['parallax-effect-4']), 
	'parallax-speed-footer' 	=> $speedFoo = ( esc_attr($_POST['parallax-speed-4']) == '' ? 10 : esc_attr($_POST['parallax-speed-4'])),
	/* New elements Since 2.5 */
	'logo-color' 				=> esc_attr( ($_POST['color_picker_color-30']) ) 
	);
	update_option( THEMEPREFIX . "_style_settings" , $cuckoo_style );
	?>
		<div id="save_upadate" class="updated"><?php _e('New settings saved!', THEMENAME); ?></div>
	<?php
	}
	
	if(isset($_REQUEST['restore'])){
		global $theme_style;
		/* General settings get style type */
		$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
		/* Deleted old settings */
		delete_option( THEMEPREFIX . "_style_settings" );
		/* Updated new style */
		update_option( THEMEPREFIX . "_style_settings" , $theme_style[$cuckoo_settings['theme-style']]['color_style_page'] );
		?>
			<div id="save_upadate" class="updated"><?php _e('New settings saved!', THEMENAME); ?></div>
		<?php
	}
	$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
	?>
		<?php cuckoo_framework_head( __('Color Settings', THEMENAME) ); ?>
		<form id="formId" method="POST" action="">
			<div id="general_settings">
				<div class="active_settings" style="display: block; border-top:0;">
					<div class="section_settings" style="color: #999999; border-bottom:4px solid #D6D6D6;">
						<?php _e('Choose which theme element group you want to customize.<br />
								Enter custom color number or click Select a Color button and choose color in a color picker panel.<br />
								Pick color you need and again click Select a Color button.<br /> 
								Click Save button after all settings are done.<br /> 
								Click Reset to Default Settings button to restore default color settings.', THEMENAME); ?>
					</div>
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Theme Elements Style', THEMENAME); ?></span>
					<input id="restore_font" class="active_input float_right" name='restore' style="border:1px solid #227399; color:white; " type="submit" value="<?php _e('Reset to Default Settings', THEMENAME); ?>" />
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<p>
							<label for="display_one_px_effect">
								<input type="checkbox" name="display_one_px_effect" id="display_one_px_effect" value="1" <?php echo ($cuckoo_style['display_one_px_effect'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e(' Display 1 px border on images, thumbnails, social media icons and other elements.', THEMENAME); ?>
							</label>
						</p>
						<p>
							<label for="overlay_lines_slideshow">
								<input type="checkbox" name="overlay_lines_slideshow" id="overlay_lines_slideshow" value="1" <?php echo ($cuckoo_style['overlay_lines_slideshow'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e(' Display Slideshow Overlay Effect.', THEMENAME); ?>
							</label>
						</p>
					</div>		
				</div>	
				<div class="general_title_active">
					<span class="float_left"><?php _e('Main Colors', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Primary Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-9" value="<?php echo $back = empty($cuckoo_style['theme-primary-color']) ? '#' : $cuckoo_style['theme-primary-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-9" style="background-color:<?php echo $cuckoo_style['theme-primary-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-9" />
								<div id="color_picker_color-9" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Secondary Color #1', THEMENAME); ?>
								</div>				
								<input type="text" id="color-10" value="<?php echo $back = empty($cuckoo_style['theme-secondary-1-color']) ? '#' : $cuckoo_style['theme-secondary-1-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-10" style="background-color:<?php echo $cuckoo_style['theme-secondary-1-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-10" />
								<div id="color_picker_color-10" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Secondary Color #2', THEMENAME); ?>
								</div>				
								<input type="text" id="color-11" value="<?php echo $back = empty($cuckoo_style['theme-secondary-2-color']) ? '#' : $cuckoo_style['theme-secondary-2-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-11" style="background-color:<?php echo $cuckoo_style['theme-secondary-2-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-11" />
								<div id="color_picker_color-11" class="colorPickerMain"></div>
							</div>	
						</div>
						<div style="width:100%; height:1px; border-bottom:1px solid #D6D6D6; clear:both; padding-top:29px;"></div>
						<div class="full-width">
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color padding-plus">
									<?php _e('Secondary Color #3', THEMENAME); ?>
								</div>				
								<input type="text" id="color-12" value="<?php echo $back = empty($cuckoo_style['theme-secondary-3-color']) ? '#' : $cuckoo_style['theme-secondary-3-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-12" style="background-color:<?php echo $cuckoo_style['theme-secondary-3-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-12" />
								<div id="color_picker_color-12" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color padding-plus">
									<?php _e('Selection Background Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-13" value="<?php echo $back = empty($cuckoo_style['selected-color']) ? '#' : $cuckoo_style['selected-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-13" style="background-color:<?php echo $cuckoo_style['selected-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-13" />
								<div id="color_picker_color-13" class="colorPickerMain"></div>
							</div>								
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color padding-plus">
									<?php _e('Selection Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-25" value="<?php echo $back = empty($cuckoo_style['selected-font-color']) ? '#' : $cuckoo_style['selected-font-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-25" style="background-color:<?php echo $cuckoo_style['selected-font-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-25" />
								<div id="color_picker_color-25" class="colorPickerMain"></div>
							</div>
						</div>
						<div style="width:100%; height:1px; border-bottom:1px solid #D6D6D6; clear:both; padding-top:29px;"></div>
						<div class="full-width">
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color" style="padding:20px 0 37px;">
									<?php _e('Logo Box Color', THEMENAME); ?>
								</div>	
								<input type="text" id="color-30" value="<?php echo $back = empty($cuckoo_style['logo-color']) ? '#' : $cuckoo_style['logo-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-30" style="background-color:<?php echo $cuckoo_style['logo-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-30" />
								<div id="color_picker_color-30" class="colorPickerMain"></div>
							</div>						
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color" style="padding:20px 0 0;">
									<?php _e('Logo Box Shadow Color', THEMENAME); ?>
								</div>	
								<span style="display:block; padding:5px 0 15px;"><?php _e('In Minimized Versions Only',THEMENAME); ?></span>
								<input type="text" id="color-14" value="<?php echo $back = empty($cuckoo_style['ipad-shadow-color']) ? '#' : $cuckoo_style['ipad-shadow-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-14" style="background-color:<?php echo $cuckoo_style['ipad-shadow-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-14" />
								<div id="color_picker_color-14" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color padding-plus" style="padding:20px 0 37px;">
									<?php _e('Lightbox Background Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-26" value="<?php echo $back = empty($cuckoo_style['lightbox-color']) ? '#' : $cuckoo_style['lightbox-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-26" style="background-color:<?php echo $cuckoo_style['lightbox-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-26" />
								<div id="color_picker_color-26" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>	
				<div class="general_title_active">
					<span class="float_left"><?php _e('Default Theme Background', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
								<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', THEMENAME); ?>
							</div>
							<div class="titleBackground">
								<b><?php _e('Background',THEMENAME); ?></b>
								<select id="parallax-effect-1" name="parallax-effect-1" class="background-select-parallax">
								<?php if($cuckoo_style['parallax'] == '1') :?>
									<option value="1" selected><?php _e('Parallax Background'); ?></option>
									<option value="2"><?php _e('Default Background'); ?></option>
								<?php else: ?>
									<option value="2" selected><?php _e('Default Background'); ?></option>
									<option value="1"><?php _e('Parallax Background'); ?></option>
								<?php endif; ?>
								</select>
							</div>
							<label for="upload_image1">
								<input id="image_url_input1" class="upload_image1 upLaoding" style="width:82%;" type="text" size="36" name="upload_image1" value="<?php echo $cuckoo_style['background-image'] ?>" />
								<input id="uploadId1" class="upload_button_color" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
							</label>
							<div class="col-1" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-1" class="radio_block parallax-settigs">
									<b style="padding-right:15px;"><?php _e('Position' , THEMENAME); ?></b>
									<?php foreach($color_position as $k=>$v): ?>
										<?php if( $v == $cuckoo_style['background-position'] ) : ?>
											<input type="radio" class="radio-position-clone" name="background-position" value="<?php echo $v; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-position-clone" name="background-position" value="<?php echo $v; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-reapet-1" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , THEMENAME); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-repeat'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="background-repeat" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="background-repeat" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-1" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , THEMENAME); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['background-attachment'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="background-attachment" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="background-attachment" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-1" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-1"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', THEMENAME); ?></b>
									</label>
									<input type="text" id="parallax-speed-1" class="parallax-speed" name="parallax-speed-1" value="<?php echo $cuckoo_style['parallax-speed']; ?>" />
								</div>
							</div>
							<div class="col-1 last" style="width:33%; padding-top:25px;">
								<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , THEMENAME); ?></b>
								<input type="text" id="color-24" value="<?php echo $back = empty($cuckoo_style['background-color']) ? '#' : $cuckoo_style['background-color']; ?>" class="colorInput" name="color_picker_color-24" style="background-color:<?php echo $cuckoo_style['background-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-24" />
								<div id="color_picker_color-24" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>	
				<div class="general_title_active">
					<span class="float_left"><?php _e('Button Color Settings', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Default Button Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-15" value="<?php echo $back = empty($cuckoo_style['all-button-color']) ? '#' : $cuckoo_style['all-button-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-15" style="background-color:<?php echo $cuckoo_style['all-button-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-15" />
								<div id="color_picker_color-15" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Map Button Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-16" value="<?php echo $back = empty($cuckoo_style['map-button-color']) ? '#' : $cuckoo_style['map-button-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-16" style="background-color:<?php echo $cuckoo_style['map-button-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-16" />
								<div id="color_picker_color-16" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Reply Button Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-17" value="<?php echo $back = empty($cuckoo_style['reply-button-color']) ? '#' : $cuckoo_style['reply-button-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-17" style="background-color:<?php echo $cuckoo_style['reply-button-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-17" />
								<div id="color_picker_color-17" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Comment Background Colors', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Comment Background Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-18" value="<?php echo $back = empty($cuckoo_style['first-comment-color']) ? '#' : $cuckoo_style['first-comment-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-18" style="background-color:<?php echo $cuckoo_style['first-comment-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-18" />
								<div id="color_picker_color-18" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Child Comment Background', THEMENAME); ?>
								</div>				
								<input type="text" id="color-19" value="<?php echo $back = empty($cuckoo_style['children-comment-color']) ? '#' : $cuckoo_style['children-comment-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-19" style="background-color:<?php echo $cuckoo_style['children-comment-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-19" />
								<div id="color_picker_color-19" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Reply Unit Background Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-20" value="<?php echo $back = empty($cuckoo_style['reply-block-color']) ? '#' : $cuckoo_style['reply-block-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-20" style="background-color:<?php echo $cuckoo_style['reply-block-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-20" />
								<div id="color_picker_color-20" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>	
				<div class="general_title_active">
					<span class="float_left"><?php _e('Line Colors', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Subtitle Box Line Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-21" value="<?php echo $back = empty($cuckoo_style['subtitle-line-color']) ? '#' : $cuckoo_style['subtitle-line-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-21" style="background-color:<?php echo $cuckoo_style['subtitle-line-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-21" />
								<div id="color_picker_color-21" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Comment Title Line Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-22" value="<?php echo $back = empty($cuckoo_style['comment-line-color']) ? '#' : $cuckoo_style['comment-line-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-22" style="background-color:<?php echo $cuckoo_style['comment-line-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-22" />
								<div id="color_picker_color-22" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Default Line Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-23" value="<?php echo $back = empty($cuckoo_style['all-lines-color']) ? '#' : $cuckoo_style['all-lines-color']; ?>" class="colorInput mini_select-color" name="color_picker_color-23" style="background-color:<?php echo $cuckoo_style['all-lines-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-23" />
								<div id="color_picker_color-23" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('White Link Colors', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">			
					<div class="section_settings">
						<div class="full-width">
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Static', THEMENAME); ?>
								</div>				
								<input type="text" id="color-1" value="<?php echo $back = empty($cuckoo_style['subtitle-static']) ? '#' : $cuckoo_style['subtitle-static']; ?>" class="colorInput mini_select-color" name="color_picker_color-1" style="background-color:<?php echo $cuckoo_style['subtitle-static']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-1" />
								<div id="color_picker_color-1" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Hover', THEMENAME); ?>
								</div>				
								<input type="text" id="color-2" value="<?php echo $back = empty($cuckoo_style['subtitle-hover']) ? '#' : $cuckoo_style['subtitle-hover']; ?>" class="colorInput mini_select-color" name="color_picker_color-2" style="background-color:<?php echo $cuckoo_style['subtitle-hover']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-2" />
								<div id="color_picker_color-2" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Visited', THEMENAME); ?>
								</div>				
								<input type="text" id="color-3" value="<?php echo $back = empty($cuckoo_style['subtitle-visited']) ? '#' : $cuckoo_style['subtitle-visited']; ?>" class="colorInput mini_select-color" name="color_picker_color-3" style="background-color:<?php echo $cuckoo_style['subtitle-visited']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-3" />
								<div id="color_picker_color-3" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>	
				<div class="general_title_active">
					<span class="float_left"><?php _e('Body Link Colors', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Static', THEMENAME); ?>
								</div>				
								<input type="text" id="color-4" value="<?php echo $back = empty($cuckoo_style['underline-static']) ? '#' : $cuckoo_style['underline-static']; ?>" class="colorInput mini_select-color" name="color_picker_color-4" style="background-color:<?php echo $cuckoo_style['underline-static']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-4" />
								<div id="color_picker_color-4" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Hover', THEMENAME); ?>
								</div>				
								<input type="text" id="color-5" value="<?php echo $back = empty($cuckoo_style['underline-hover']) ? '#' : $cuckoo_style['underline-hover']; ?>" class="colorInput mini_select-color" name="color_picker_color-5" style="background-color:<?php echo $cuckoo_style['underline-hover']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-5" />
								<div id="color_picker_color-5" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Visited', THEMENAME); ?>
								</div>				
								<input type="text" id="color-6" value="<?php echo $back = empty($cuckoo_style['underline-visited']) ? '#' : $cuckoo_style['underline-visited']; ?>" class="colorInput mini_select-color" name="color_picker_color-6" style="background-color:<?php echo $cuckoo_style['underline-visited']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-6" />
								<div id="color_picker_color-6" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>	
				<div class="general_title_active">
					<span class="float_left"><?php _e('Default Link Colors', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">						
							<div class="fonts_attr_bottom mar">
								<div class="font_description_mini_color">
									<?php _e('Hover', THEMENAME); ?>
								</div>				
								<input type="text" id="color-7" value="<?php echo $back = empty($cuckoo_style['another-hover']) ? '#' : $cuckoo_style['another-hover']; ?>" class="colorInput mini_select-color" name="color_picker_color-7" style="background-color:<?php echo $cuckoo_style['another-hover']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-7" />
								<div id="color_picker_color-7" class="colorPickerMain"></div>
							</div>							
							<div class="fonts_attr_bottom">
								<div class="font_description_mini_color">
									<?php _e('Visited', THEMENAME); ?>
								</div>				
								<input type="text" id="color-8" value="<?php echo $back = empty($cuckoo_style['another-visited']) ? '#' : $cuckoo_style['another-visited']; ?>" class="colorInput mini_select-color" name="color_picker_color-8" style="background-color:<?php echo $cuckoo_style['another-visited']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-btn btn-plus-class last" style="top:0!important;" id="colorPicker-8" />
								<div id="color_picker_color-8" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Related Works Background Settings', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
								<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', THEMENAME); ?>
							</div>
							<div class="titleBackground">
								<b><?php _e('Background',THEMENAME); ?></b>
								<select id="parallax-effect-2" name="parallax-effect-2" class="background-select-parallax">
								<?php if($cuckoo_style['parallax-related-works'] == '1') :?>
									<option value="1" selected><?php _e('Parallax Background'); ?></option>
									<option value="2"><?php _e('Default Background'); ?></option>
								<?php else: ?>
									<option value="2" selected><?php _e('Default Background'); ?></option>
									<option value="1"><?php _e('Parallax Background'); ?></option>
								<?php endif; ?>
								</select>
							</div>
							<label for="upload_image2">
								<input id="image_url_input2" class="upload_image2 upLaoding" style="width:82%;" type="text" size="36" name="upload_image2" value="<?php echo $cuckoo_style['related-works-image'] ?>" />
								<input id="uploadId2" class="upload_button_color" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
							</label>
							<div class="col-1" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-2" class="radio_block parallax-settigs">
									<b style="padding-right:15px;"><?php _e('Position' , THEMENAME); ?></b>
									<?php foreach($color_position as $k=>$v): ?>
										<?php if( $v == $cuckoo_style['related-works-position'] ) : ?>
											<input type="radio" class="radio-position-clone" name="related-works-position" value="<?php echo $v; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-position-clone" name="related-works-position" value="<?php echo $v; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-reapet-2" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , THEMENAME); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['related-works-repeat'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="related-works-repeat" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="related-works-repeat" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-2" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , THEMENAME); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['related-works-attachment'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="related-works-attachment" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="related-works-attachment" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-2" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-2"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', THEMENAME); ?></b>
									</label>
									<input type="text" id="parallax-speed-2" class="parallax-speed" name="parallax-speed-2" value="<?php echo $cuckoo_style['parallax-speed-related-works']; ?>" />
								</div>
							</div>
							<div class="col-1 last" style="width:33%; padding-top:25px;">
								<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , THEMENAME); ?></b>
								<input type="text" id="color-27" value="<?php echo $back = empty($cuckoo_style['related-works-color']) ? '#' : $cuckoo_style['related-works-color']; ?>" class="colorInput" name="color_picker_color-27" style="background-color:<?php echo $cuckoo_style['related-works-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-27" />
								<div id="color_picker_color-27" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Related Posts Background Settings', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="full-width">
							<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
								<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', THEMENAME); ?>
							</div>
							<div class="titleBackground">
								<b><?php _e('Background',THEMENAME); ?></b>
								<select id="parallax-effect-3" name="parallax-effect-3" class="background-select-parallax">
								<?php if($cuckoo_style['parallax-related-post'] == '1') :?>
									<option value="1" selected><?php _e('Parallax Background'); ?></option>
									<option value="2"><?php _e('Default Background'); ?></option>
								<?php else: ?>
									<option value="2" selected><?php _e('Default Background'); ?></option>
									<option value="1"><?php _e('Parallax Background'); ?></option>
								<?php endif; ?>
								</select>
							</div>
							<label for="upload_image3">
								<input id="image_url_input3" class="upload_image3 upLaoding" style="width:82%;" type="text" size="36" name="upload_image3" value="<?php echo $cuckoo_style['related-posts-image'] ?>" />
								<input id="uploadId3" class="upload_button_color" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
							</label>
							<div class="col-1" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-3" class="radio_block parallax-settigs">
									<b style="padding-right:15px;"><?php _e('Position' , THEMENAME); ?></b>
									<?php foreach($color_position as $k=>$v): ?>
										<?php if( $v == $cuckoo_style['related-posts-position'] ) : ?>
											<input type="radio" class="radio-position-clone" name="related-posts-position" value="<?php echo $v; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-position-clone" name="related-posts-position" value="<?php echo $v; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-reapet-3" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , THEMENAME); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['related-posts-repeat'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="related-posts-repeat" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="related-posts-repeat" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-3" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , THEMENAME); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['related-posts-attachment'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="related-posts-attachment" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="related-posts-attachment" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-3" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-3"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', THEMENAME); ?></b>
									</label>
									<input type="text" id="parallax-speed-3" class="parallax-speed" name="parallax-speed-3" value="<?php echo $cuckoo_style['parallax-speed-related-post']; ?>" />
								</div>
							</div>
							<div class="col-1 last" style="width:33%; padding-top:25px;">
								<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , THEMENAME); ?></b>
								<input type="text" id="color-28" value="<?php echo $back = empty($cuckoo_style['related-posts-color']) ? '#' : $cuckoo_style['related-posts-color']; ?>" class="colorInput" name="color_picker_color-28" style="background-color:<?php echo $cuckoo_style['related-posts-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-28" />
								<div id="color_picker_color-28" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Footer Background Settings', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings" style="border-bottom:0;">
						<div class="full-width">
							<div class="desc_bottom" style="padding-bottom:30px; padding-top:0;">
								<?php _e('Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed.', THEMENAME); ?>
							</div>
							<div class="titleBackground">
								<b><?php _e('Background',THEMENAME); ?></b>
								<select id="parallax-effect-4" name="parallax-effect-4" class="background-select-parallax">
								<?php if($cuckoo_style['parallax-footer'] == '1') :?>
									<option value="1" selected><?php _e('Parallax Background'); ?></option>
									<option value="2"><?php _e('Default Background'); ?></option>
								<?php else: ?>
									<option value="2" selected><?php _e('Default Background'); ?></option>
									<option value="1"><?php _e('Parallax Background'); ?></option>
								<?php endif; ?>
								</select>
							</div>
							<label for="upload_image4">
								<input id="image_url_input4" class="upload_image4 upLaoding" style="width:82%;" type="text" size="36" name="upload_image4" value="<?php echo $cuckoo_style['footer-image'] ?>" />
								<input id="uploadId4" class="upload_button_color" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
							</label>
							<div class="col-1" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-4" class="radio_block parallax-settigs">
									<b style="padding-right:15px;"><?php _e('Position' , THEMENAME); ?></b>
									<?php foreach($color_position as $k=>$v): ?>
										<?php if( $v == $cuckoo_style['footer-position'] ) : ?>
											<input type="radio" class="radio-position-clone" name="footer-position" value="<?php echo $v; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-position-clone" name="footer-position" value="<?php echo $v; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-reapet-4" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , THEMENAME); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['footer-repeat'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="footer-repeat" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="footer-repeat" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-4" class="radio_block parallax-settigs">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , THEMENAME); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_style['footer-attachment'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="footer-attachment" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="footer-attachment" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-4" class="radio_block parallax-settigs" style="padding:15px 0 0;">
									<label for="parallax-speed-4"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', THEMENAME); ?></b>
									</label>
									<input type="text" id="parallax-speed-4" class="parallax-speed" name="parallax-speed-4" value="<?php echo $cuckoo_style['parallax-speed-footer']; ?>" />
								</div>
							</div>
							<div class="col-1 last" style="width:33%; padding-top:25px;">
								<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , THEMENAME); ?></b>
								<input type="text" id="color-29" value="<?php echo $back = empty($cuckoo_style['footer-color']) ? '#' : $cuckoo_style['footer-color']; ?>" class="colorInput" name="color_picker_color-29" style="background-color:<?php echo $cuckoo_style['footer-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-29" />
								<div id="color_picker_color-29" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>				
				</div>
			</div>
			<p style="display:inline;">
				<input class="active_input" name='all' style="margin-right:20px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " type="submit" value="Save" />
			</p>
			<?php cuckoo_framework_footer(); ?>
		</form>
</section>
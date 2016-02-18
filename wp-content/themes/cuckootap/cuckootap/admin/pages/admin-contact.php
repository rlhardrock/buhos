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
** Name : contact settings
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

$cuckoo_contact = get_option( THEMEPREFIX . "_contact_settings" );
	?>
<section id="main_content">
	<?php
	if(isset($_REQUEST['all']))
	{
	
	// wpml cuckootap since 2.9
	if( function_exists('icl_register_string') ) :
		icl_register_string(THEMENAME.' Contact Information', 'Contact Unit Title', esc_attr( $_POST['contact_title'] ));
		icl_register_string(THEMENAME.' Contact Information', 'Address', esc_textarea( trim($_POST['contact_address']) ));
		icl_register_string(THEMENAME.' Contact Information', 'Contact Details', esc_textarea( trim($_POST['contact_details']) ));
		icl_register_string(THEMENAME.' Contact Information', 'Primary Email Address', esc_attr( $_POST['contact_primary_email'] ));
		icl_register_string(THEMENAME.' Contact Information', 'Contact Form Email Address', esc_attr( $_POST['contact_form_email'] ));
		icl_register_string(THEMENAME.' Contact Information', 'Website Address', esc_attr( $_POST['contact_web'] ));
		icl_register_string(THEMENAME.' Contact Information', 'Your Address Google Map', esc_attr( $_POST['google_properties'] ));
	endif;

	$cuckoo_contact = array( 
	'displayInHomepage' 	=> esc_attr( ($_POST['displayInHomepage']) ) , 
	'DisplayinLanding' 		=> esc_attr( ($_POST['DisplayinLanding']) ) , 
	'contact_title' 		=> esc_attr( ($_POST['contact_title']) ) , 
	'contact_address' 		=> esc_textarea( trim($_POST['contact_address']) ) ,
	'contact_details' 		=> esc_textarea( trim($_POST['contact_details']) ) ,
	'contact_primary_email'	=> esc_attr( $_POST['contact_primary_email'] ) ,
	'contact_form_email'	=> esc_attr( $_POST['contact_form_email'] ) ,
	'contact_web'			=> esc_attr( $_POST['contact_web'] ) ,
	'display_icon'			=> esc_attr( $_POST['on_off_button'] ) ,
	'google_properties'		=> esc_attr( $_POST['google_properties'] ) ,
	'google_zoom_level'		=> $zoom = ( esc_attr( $_POST['google_zoom_level'] ) == null || !is_numeric(esc_attr( $_POST['google_zoom_level'] ))  ? 15 : esc_attr( $_POST['google_zoom_level'] ) ),
	/* New elements Since 2.3 */
	'parallax'				=> esc_attr( $_POST['parallax-effect-1'] ) ,
	'img_url'				=> esc_attr( $_POST['upload_image1'] ) ,
	'imgPosition'			=> esc_attr( $_POST['radio_position-1'] ) ,
	'imgRepeat'				=> esc_attr( $_POST['radio_repeat-1'] ) ,
	'imgAttachment'			=> esc_attr( $_POST['radio_attachment-1'] ) ,
	'parallax-speed'		=> $speed = ( esc_attr($_POST['parallax-speed-1']) == '' ? 10 : esc_attr($_POST['parallax-speed-1'])) ,
	'backgroundColor'		=> esc_attr( $_POST['color_picker_color-1'] ) ,
	'map_show'				=> esc_attr( $_POST['map_show'] )
	);
	update_option( THEMEPREFIX . "_contact_settings" , $cuckoo_contact );
	?>
		<div id="save_upadate" class="updated"><?php _e('New settings saved!', THEMENAME); ?></div>
	<?php
	}
	?>
		<?php cuckoo_framework_head( __('Contact Information', THEMENAME) ); ?>
		<form id="formId" method="POST" action="">
			<div id="general_settings">
				<div class="general_title_active">
						<span class="float_left"><?php _e('Contact Unit Display Settings', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
					<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Enter Contact Unit Title', THEMENAME); ?>
							</div>
							<input type="text" name="contact_title" class="itemInputText" value="<?php echo $cuckoo_contact['contact_title']; ?>" />
							<span style="padding-top:10px; display:block;">
								<?php _e("Enter a Title for Contact Unit, if needed.", THEMENAME); ?>
							</span>
						</div>
						<div class="settings_left">
							<div class="contact-checkbox">
								<input type="checkbox" name="displayInHomepage" value="1" <?php echo ($cuckoo_contact['displayInHomepage'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e('Display in Homepage', THEMENAME); ?><br />
							</div>
							<div class="contact-checkbox">
								<input type="checkbox" name="DisplayinLanding" value="1" <?php echo ($cuckoo_contact['DisplayinLanding'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e('Display in Landing Pages', THEMENAME); ?>
							</div>
							<span style="padding-top:10px; display:block;">
								<?php _e("Check boxes if you want Contact Unit to be displayed in Homepage and in Landing Pages.", THEMENAME); ?>
							</span>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="general_title_active">
						<span class="float_left"><?php _e('Contact Information', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
					<!-- Address area -->
					<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Enter Address', THEMENAME); ?>
							</div>
							<textarea type="text" name="contact_address"><?php echo $cuckoo_contact['contact_address']; ?></textarea>
							<span style="padding-top:10px; display:block;"><?php _e('Enter your Address. It will be displayed in the Contact Unit of Homepage and Landing Pages.', THEMENAME); ?></span>
						</div>
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Enter Contact Details', THEMENAME); ?>
							</div>
							<textarea type="text" name="contact_details"><?php echo $cuckoo_contact['contact_details']; ?></textarea>
							<span style="padding-top:10px; display:block;"><?php _e('Enter your Phone, Mobile Phone and Fax Numbers. It will be displayed in the Contact Unit.', THEMENAME); ?></span>
						</div>
						<div class="clear"></div>
					</div>
					<!-- Email area -->
					<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Enter Primary Email Address', THEMENAME); ?>
							</div>
							<input type="text" name="contact_primary_email" class="itemInputText" value="<?php echo $cuckoo_contact['contact_primary_email']; ?>" />
							<span style="padding-top:10px; display:block;">
								<?php _e("Email address will be displayed in Contact Unit as your primary contact.", THEMENAME); ?>
							</span>
						</div>
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Enter Contact Form Email Address', THEMENAME); ?>
							</div>
							<input type="text" name="contact_form_email" class="itemInputText" value="<?php echo $cuckoo_contact['contact_form_email']; ?>" />
							<span style="padding-top:10px; display:block;">
								<?php _e("All messages sent using contact form in Contact Unit will be delivered to this email address. 
								If left blank, WordPress administrator's email address will be used.", THEMENAME); ?>
							</span>
						</div>
						<div class="clear"></div>
					</div>
					<!-- WEB area -->
					<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Enter Website Address', THEMENAME); ?>
							</div>
							<input type="text" name="contact_web" class="itemInputText" value="<?php echo $cuckoo_contact['contact_web']; ?>" />
							<span style="padding-top:10px; display:block;">
								<?php _e("Website address will be displayed in Contact Unit.", THEMENAME); ?>
							</span>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- Social media area -->
				<div class="general_title_active">
						<span class="float_left"><?php _e('Social Media', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<span style="font-size:15px; font-weight:bold; color:#333333; padding-right:65px;">
							<?php _e('Display Social Media Icons?', THEMENAME); ?>
						</span>
						<?php
						if($cuckoo_contact['display_icon'] == "Yes"){
						?>
							<input class="slider_front_page_active" type="button" name="on_off" value="<?php _e('Yes', THEMENAME); ?>" style="margin-right:20px;" />
							<input class="slider_front_page" type="button" name="on_off" value="<?php _e('No', THEMENAME); ?>" />
							<input type="hidden" name="on_off_button" value="Yes" />
						<?php
						}else{ 
						?>
							<input class="slider_front_page" type="button" name="on_off" value="<?php _e('Yes', THEMENAME); ?>" style="margin-right:25px;" />
							<input class="slider_front_page_active" type="button" name="on_off" value="<?php _e('No', THEMENAME); ?>" />
							<input type="hidden" name="on_off_button" value="No" />
						<?php
						}
						?>
						<div class="clear"></div>
						<div class="desc_bottom">
							<?php _e("Social Media Icons will be displayed in Contact Unit below contact information in the same sequence as they are set in Social Media section of the framework.", THEMENAME); ?>
						</div>
					</div>
				</div>
				<!-- Google map area -->
				<div class="general_title_active">
					<span class="float_left"><?php _e('Google Map', THEMENAME); ?></span>
					<span class="float_right" style="font-size:12px!important; font-weight:normal!important;"><input type="checkbox" name="map_show" value="1" <?php echo ($cuckoo_contact['map_show'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e('Display Google Map', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
					<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Enter Your Address', THEMENAME); ?>
							</div>
							<input type="text" name="google_properties" class="itemInputText" value="<?php echo $cuckoo_contact['google_properties']; ?>" />
							<span style="padding-top:10px; display:block;">
								<?php _e('Enter your address, and Google Map will be displayed in the Contact Unit. Example: "Minster Court, London SE1 7JB, United Kingdom".', THEMENAME); ?>
							</span>
						</div>
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Set Default Zoom Level', THEMENAME); ?>
							</div>
							<input type="text" name="google_zoom_level"  class="itemInputText" value="<?php echo $cuckoo_contact['google_zoom_level']; ?>" />
							<span style="padding-top:10px; display:block;">
								<?php _e("Recommended value ranges from 5 to 15. If left blank, default value will be set on 15.", THEMENAME); ?>
							</span>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<!-- Google map area -->
				<div class="general_title_active">
					<span class="float_left"><?php _e('Contact Unit Background', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
					<div class="section_settings" style="border:none;">
					<?php /* Background control */ ?>
						<div id="background-settings-1" class="background-setting" style="border-top:0 none; padding-top:0; margin-top:0;">
							<div class="titleBackground">
								<b><?php _e('Background',THEMENAME); ?></b>
								<select id="parallax-effect-1" name="parallax-effect-1" class="background-select-parallax">
									<?php if($cuckoo_contact['parallax'] == 1) :?>
										<option value="1" selected><?php _e('Parallax Background'); ?></option>
										<option value="0"><?php _e('Default Background'); ?></option>
									<?php else: ?>
										<option value="0" selected><?php _e('Default Background'); ?></option>
										<option value="1"><?php _e('Parallax Background'); ?></option>
									<?php endif; ?>
								</select>
							</div>
								<label for="upload_image1">
									<input id="image_url_input" class="upload_image1 upLaoding" style="width:82%;" type="text" size="36" name="upload_image1" value="<?php echo $cuckoo_contact['img_url'] ?>" />
									<input id="uploadId1" class="upload_image_button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
								</label>
							<div class="col-1 float_left" style="width:63%; padding-top:25px;">
								<div id="background-setting-position-1" class="radio_block parallax-settigs back-posi">
									<b style="padding-right:15px;"><?php _e('Position' , THEMENAME); ?></b>
									<?php foreach($color_position as $k=>$v): ?>
										<?php if( $v == $cuckoo_contact['imgPosition'] ) : ?>
											<input type="radio" class="radio-position-clone" name="radio_position-1" value="<?php echo $v; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-position-clone" name="radio_position-1" value="<?php echo $v; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-reapet-1" class="radio_block parallax-settigs back-repeat">
									<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , THEMENAME); ?></b>
									<?php foreach($repeat_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_contact['imgRepeat'] ) : ?>
											<input type="radio" class="radio-repeat-clone" name="radio_repeat-1" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-repeat-clone" name="radio_repeat-1" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>													
								<div id="background-setting-attach-1" class="radio_block parallax-settigs back-attach">
									<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , THEMENAME); ?></b>
									<?php foreach($attachament_img as $k=>$v): ?>
										<?php if( $k == $cuckoo_contact['imgAttachment'] ) : ?>
											<input type="radio" class="radio-attachment-clone" name="radio_attachment-1" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
										<?php else : ?>
											<input type="radio" class="radio-attachment-clone" name="radio_attachment-1" value="<?php echo $k; ?>" /><?php echo $v; ?>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
								<div id="background-setting-speed-1" class="radio_block parallax-settigs back-speed" style="padding:15px 0 0;">
									<label for="parallax-speed-1"> 
										<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', THEMENAME); ?></b>
									</label>
									<input type="text" id="parallax-speed-1" class="parallax-speed" name="parallax-speed-1" value="<?php echo $cuckoo_contact['parallax-speed']; ?>" />
								</div>
							</div>
							<div class="col-1 last float_right" style="width:33%; padding-top:25px;">
								<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , THEMENAME); ?></b>
								<input type="text" id="color-1" value="<?php echo $back = empty($cuckoo_contact['backgroundColor']) ? '#' : $cuckoo_contact['backgroundColor']; ?>" class="colorInput" name="color_picker_color-1" style="background-color:<?php echo $cuckoo_contact['backgroundColor']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-1" />
								<div id="color_picker_color-1" class="colorPickerMain"></div>
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
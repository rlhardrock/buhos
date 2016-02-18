<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/
 
$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
$theme_styles = array(
	'dark', 
	'light'
);
?>
<section id="main_content">
<?php
if(isset($_REQUEST['all']))
{
	if(esc_attr( $_POST['theme-style'] ) != $cuckoo_settings['theme-style']){
		global $theme_style;
		/* Updated new style */
		update_option( THEMEPREFIX . "_style_settings" , $theme_style[esc_attr( $_POST['theme-style'] )]['color_style_page'] );
		/* Updated new fonts */
		update_option( THEMEPREFIX . "_font_settings" , $theme_style[esc_attr( $_POST['theme-style'] )]['font_page'] );
	}
	
	// wpml cuckootap since 2.9
	if( function_exists('icl_register_string') ) :
		icl_register_string(THEMENAME.' Related Works Unit', 'Title', esc_attr( $_POST['related_work_title'] ));
		icl_register_string(THEMENAME.' Related Posts Unit', 'Title', esc_attr( $_POST['related_post_title'] ));
	endif;
	
	/* new values  from update */
	$cuckoo_settings = array(  
	'theme-style' => esc_attr( $_POST['theme-style'] ) ,
	'responsive' => esc_attr( $_POST['on_off_button'] ) ,
	'smooth' => esc_attr( $_POST['smooth'] ) ,
	'related_works' => esc_attr( $_POST['related_works'] ) ,
	'related_work_title' => esc_attr( $_POST['related_work_title'] ),
	'related_posts' => esc_attr( $_POST['related_posts'] ),
	'related_post_title' => esc_attr( $_POST['related_post_title'] ),
	'favicon_url' => $favicon_url = (esc_attr( $_POST['favicon_url'] ) == "") ? THEMEICONE : esc_attr( $_POST['favicon_url'] ),
	'tracking_code' => cuckoo_get_value($_POST['tracking_code'])
	);
	update_option( THEMEPREFIX . "_general_settings" , $cuckoo_settings );
?>
	<div id="save_upadate" class="updated"><?php _e('New settings saved!', THEMENAME); ?></div>
<?php
}
?>
	<?php cuckoo_framework_head( __('General Settings', THEMENAME) ); ?>
	<form id="formId" method="POST" action="">
		<div id="general_settings">
			<div class="general_title_active">
				<span class="float_left"><?php  _e('Theme Color Styles', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
					<div class="settings_left">
						<div class="settings_left_title">
							<?php  _e('Choose Theme Color Style', THEMENAME); ?>
						</div>
						<select name="theme-style">
							<?php 
								foreach ($theme_styles as $k=>$v) {
									if ($v == $cuckoo_settings['theme-style']) 
										echo "<option value='" . $v . "' selected>" . ucwords($v) . "</option>\n"; 
									else
										echo "<option value='" . $v . "'>" . ucwords($v) . "</option>\n"; 
								}
								?>
						</select>
					</div>
					<div class="settings_left">
						<div class="desc_bottom">
							<?php _e('Choose the style you want to use for this theme. After you choose, click Save button to activate new Style.
								Please remember that theme Color Style change will reset all your Google Fonts and Color Settings to default.', THEMENAME); ?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<!-- Responsive config's ------------------------->
			<div class="general_title_active">
				<span class="float_left"><?php _e('Responsivity Settings', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
					<span style="font-size:15px; font-weight:bold; color:#333333; padding-right:65px;">
						<?php _e('Activate Responsivity', THEMENAME); ?>
					</span>
					<?php if($cuckoo_settings['responsive'] == "Yes"){ ?>
						<input class="slider_front_page_active" type="button" name="on_off" value="<?php _e('Yes', THEMENAME); ?>" style="margin-right:20px;" />
						<input class="slider_front_page" type="button" name="on_off" value="<?php _e('No', THEMENAME); ?>" />
						<input type="hidden" name="on_off_button" value="Yes" />
					<?php }else{ ?>
						<input class="slider_front_page" type="button" name="on_off" value="<?php _e('Yes', THEMENAME); ?>" style="margin-right:25px;" />
						<input class="slider_front_page_active" type="button" name="on_off" value="<?php _e('No', THEMENAME); ?>" />
						<input type="hidden" name="on_off_button" value="No" />
					<?php } ?>
					<div class="clear"></div>
				</div>
			</div>
			<!-- Smooth Scroll Effect config's ------------------------->
			<div class="general_title_active">
				<span class="float_left"><?php _e('Smooth Scroll Effect', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
					<div class="contact-checkbox">
						<label for="smooth">
						<?php _e('Smooth Scroll is Activated', THEMENAME); ?>  <input type="checkbox" style="left: 10px; position: relative;" id="smooth" name="smooth" value="1" <?php echo ($cuckoo_settings['smooth'] == 1) ? 'checked="checked"' : ''; ?> />
						</label>
					</div>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Related Content', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
					<!-- Theme Related Works config's -------------------------------->
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Related Works', THEMENAME); ?>
						</div>
						<?php switch($cuckoo_settings['related_works'])
						{
							case 'display' : ?>
								<select name="related_works">
									<option value="display"><?php _e('Display Related Works', THEMENAME); ?></option>
									<option value="hide"><?php _e('Hide Related Works', THEMENAME); ?></option>
								</select>
							<?php break;
							case 'hide' : ?>
								<select name="related_works">
									<option value="hide"><?php _e('Hide Related Works', THEMENAME); ?></option>
									<option value="display"><?php _e('Display Related Works', THEMENAME); ?></option>
								</select>
							<?php break;
						} ?>
						<div class="desc_bottom">
							<?php _e('Related Works will be displayed below each work in a single work page.', THEMENAME); ?>
						</div>
					</div>
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Enter a Title for Related Works Unit', THEMENAME); ?>
						</div>
						<input type="text" name="related_work_title" class="itemInputText" value="<?php echo $cuckoo_settings['related_work_title']; ?>" />
					</div>
					<div class="clear"></div>
				</div>				
				<div class="section_settings">
					<!-- Theme Related Posts config's -------------------------------->
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Related Posts', THEMENAME); ?>
						</div>
						<?php switch($cuckoo_settings['related_posts'])
						{
							case 'display' : ?>
								<select name="related_posts">
									<option value="display"><?php _e('Display Related Posts', THEMENAME); ?></option>
									<option value="hide"><?php _e('Hide Related Posts', THEMENAME); ?></option>
								</select>
							<?php break;
							case 'hide' : ?>
								<select name="related_posts">
									<option value="hide"><?php _e('Hide Related Posts', THEMENAME); ?></option>
									<option value="display"><?php _e('Display Related Posts', THEMENAME); ?></option>
								</select>
							<?php break;
						} ?>
						<div class="desc_bottom">
							<?php _e('Related posts will be displayed below each post in a single post page.', THEMENAME); ?>
						</div>
					</div>
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Enter a Title for Related Posts Unit', THEMENAME); ?>
						</div>
						<input type="text" name="related_post_title" class="itemInputText" value="<?php echo $cuckoo_settings['related_post_title']; ?>" />
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<!-- Favicon config's ------------------------->
			<div class="general_title_active">
				<span class="float_left"><?php _e('Favicon', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
					<div class="float_left">
						<p style="margin:12px 0;">
							<th scope="row"></th>
							<td>
								<label for="upload_image">
									<input class="upload_image" type="text" size="36" name="favicon_url" value="<?php echo $cuckoo_settings['favicon_url']; ?>" />
									<p style=" height:20px;">
										<input id="uploadId1" class="upload_button" type="button" value="Upload Image" style="float:none;" />
									</p>
								</label>
							</td>
						</p>
						<div class="desc_bottom">
							<?php _e("Upload a 16 x 16 px *.png / *.gif / *.ico image that will be used as your website's favicon.", THEMENAME); ?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Tracking Code', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block; ">	
				<div class="section_settings" style="border:none;">
					<div class="settings_left">
						<textarea type="text" name="tracking_code"><?php echo $cuckoo_settings['tracking_code']; ?></textarea>
					</div>
					<div class="settings_left">
						<?php _e('Enter your Google Analytics (or other) tracking code here and get detailed statistics about the visitors of your website.', THEMENAME); ?>
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
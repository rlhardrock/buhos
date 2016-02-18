<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/
 
 $slider_elements = get_option( THEMEPREFIX . "_slidershow_settings" );
 $effects = array(
    'sliceDown',
    'sliceDownLeft',
    'sliceUp',
    'sliceUpLeft',
    'sliceUpDown',
    'sliceUpDownLeft',
    'fold',
    'fade',
    'random',
    'slideInRight',
    'slideInLeft',
    'boxRandom',
    'boxRain',
    'boxRainReverse',
	'boxRainGrow',
	'boxRainGrowReverse',
 );
 // since V2.7
 $sliders = array(
	'Nivo Slider',
	'Revolution Slider'
 );
 $radio = array(
	'Left',
	'Center',
	'Right',
 );
 $captionEffect = array(
	'slide',
	'fade',
	'none'
 );
?>
<section id="main_content">
<?php
if(isset($_REQUEST['all']))
{
	$r = 1;
	$items = $_POST['items'];
	$elements = array();
	$ItemsAll = array();
	$items_array = explode(',', $items);
	foreach($items_array as $key=>$item) 
	{ 
		$items = substr($item,4);
		if($items != '')
		$ItemsAll[$key] = $items;
		$keys = $key+$r;
		
		// wpml cuckootap since 2.9
		if( function_exists('icl_register_string') ) :
			icl_register_string(THEMENAME.' Homepage Nivo Slides nr-'.$items, 'Image Title', $_POST["img_title".$items]);
			icl_register_string(THEMENAME.' Homepage Nivo Slides nr-'.$items, 'Slide Title', unit_title_scan($_POST['slide_title'.$items]));
			icl_register_string(THEMENAME.' Homepage Nivo Slides nr-'.$items, 'Slide Subtitle', unit_title_scan($_POST['slide_subtitle'.$items]));
			icl_register_string(THEMENAME.' Homepage Nivo Slides nr-'.$items, 'Slide Button Title', unit_title_scan( $_POST["title_button_slides".$items] ));
		endif;
		
		$elements_insert = array( $keys => array( 
		'remove' 				=> $keys , 
		'img' 					=> esc_attr($_POST["upload_image".$items]), 
		'title' 				=> unit_title_scan($_POST["img_title".$items]),
		'slide_title' 			=> unit_title_scan($_POST["slide_title".$items]),
		'slide_subtitle' 		=> unit_title_scan($_POST["slide_subtitle".$items]),
		'title_button_slides'	=> unit_title_scan($_POST["title_button_slides".$items]),
		'url_button_slides'		=> esc_attr($_POST["url_button_slides".$items]),
		'title_aling'			=> $aling = ( esc_attr($_POST["radio_title".$items]) == null ? 'Left' : esc_attr($_POST["radio_title".$items]) )
		));
		if($elements_insert[$keys]['img'] == null ) 
		{ 
			unset($elements_insert[$keys]);
		}
		array_push($elements, $elements_insert);
		
	}
	$allElements = array( 'elements' => $elements );
	$settings = array( 
		'settings' => array(  
			'nivo_effect' 		=> esc_attr($_POST["nivo_effect"]),
			'caption_effect' 	=> esc_attr($_POST["caption_effect"]),
			'slider_timeout' 	=> esc_attr($_POST["slider_timeout"]),
			'slider_hover'		=> esc_attr($_POST["slideshow_hover"]),
			'animationspeed' 	=> $animationspeed = (esc_attr($_POST["slideshow_hover_time"]) == null ? 1000 : esc_attr($_POST["slideshow_hover_time"])),
			'box_rows' 	=> $box_rows = (esc_attr($_POST["box_rows"]) == null ? 4 : esc_attr($_POST["box_rows"])),
			'box_cols' 	=> $box_cols = (esc_attr($_POST["box_cols"]) == null ? 12 : esc_attr($_POST["box_cols"])),
			/* since V2.7 */
			'rev_alias' 		=> esc_attr($_POST["rev_alias"]),
			'homepage_slider'	=> esc_attr($_POST["homepage_slider"]),
			)
		);
	$slider_elements = array_merge($allElements, $settings);
	update_option( THEMEPREFIX . "_slidershow_settings", $slider_elements );
	?>
    <div id="save_upadate" class="updated"><?php _e('New settings saved!', THEMENAME); ?></div>
<?php
}
?>
	<?php cuckoo_framework_head( __('Slideshow Player', THEMENAME) ); ?>
	<script type="text/javascript">
		document.onselectstart = function () { return false; }
	</script>
	<form id="formId" method="POST" action="">
		<div id="general_settings">
		<div class="whit_click general_title_active">
			<span class="float_left"><?php _e('Homepage Slideshow Settings', THEMENAME); ?></span>
			<span class="float_right"><a href="#" class="click_gen general_onclick"></a></span>
		</div>
		<div class="active_settings" style="display:block;">
			<div class="section_settings" style="border-bottom:0;">
				<div class="settings_left">
					<div class="settings_left_title">
						<?php _e('Choose Homepage Slider', THEMENAME); ?>
					</div>
					<select id="homepage_slider" name="homepage_slider">
					<?php foreach($sliders as $k => $v) :
						if($slider_elements['settings']['homepage_slider'] == $v) { ?>
							<option value="<?php echo $v; ?>" selected ><?php echo $v; ?></option>
						<?php }else{ ?>
							<option value="<?php echo $v; ?>" ><?php echo $v; ?></option>
						<?php } ?>
					<?php endforeach; ?>
					</select>
					<div class="desc_bottom">
						<?php _e("", THEMENAME); ?>
					</div>
				</div>
				<div class="settings_left rev_set" style="padding:0; width:350px;">
					<div class="settings_left_title">
						<?php _e('Enter Revolution Slider Alias', THEMENAME); ?>
					</div>
					<input style="font-size:12px; width:100%; color:#333333;" type="text" name="rev_alias" value="<?php echo $slider_elements['settings']['rev_alias']; ?>" />
					<div class="desc_bottom">
						<?php _e("Enter Revolutions Slider Alias. It will be used for embedding the slider. Example: slider1", THEMENAME); ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	
	
	<div id="general_settings" class="nivo_general_settings">
		<div class="general_title whit_click">
			<span class="float_left"><?php _e('Nivo Slider Settings', THEMENAME); ?></span>
			<span class="float_right"><a href="#" class="click_gen general_click"></a></span>
		</div>
		<div class="active_settings">
			<div class="section_settings" style="">
				<div class="settings_left">
					<div class="settings_left_title">
						<?php _e('Choose Nivo Effect', THEMENAME); ?>
					</div>
					<select name="nivo_effect">
					<?php foreach($effects as $k => $v) :
						if($slider_elements['settings']['nivo_effect'] == $v) { ?>
							<option value="<?php echo $v; ?>" selected ><?php echo $v; ?></option>
						<?php }else{ ?>
							<option value="<?php echo $v; ?>" ><?php echo $v; ?></option>
						<?php } ?>
					<?php endforeach; ?>
					</select>
					<div class="desc_bottom">
						<?php _e("Choose Nivo Effect for your slideshow animation.", THEMENAME); ?>
					</div>
				</div>
				<div class="settings_left" style="padding:0; width:350px;">
					<div class="settings_left_title">
						<?php _e('Choose Title Effect', THEMENAME); ?>
					</div>
					<select name="caption_effect">
					<?php foreach($captionEffect as $k => $v) :
						if($slider_elements['settings']['caption_effect'] == $v) { ?>
							<option value="<?php echo $v; ?>" selected ><?php echo $v; ?></option>
						<?php }else{ ?>
							<option value="<?php echo $v; ?>" ><?php echo $v; ?></option>
						<?php } ?>
					<?php endforeach; ?>
					</select>
					<div class="desc_bottom">
						<?php _e("Choose animation effect for your Title Unit.", THEMENAME); ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="section_settings">
				<div class="settings_left">
					<span style="font-size:15px; font-weight:bold; color:#333333; padding-bottom:15px; display:block;">
						<?php _e('Slide Display Time', THEMENAME); ?>
					</span>
					<input style="text-align:center; font-size:12px; color:#333333;" size="6" type="text" name="slider_timeout" maxlength="5" value="<?php echo $slider_elements['settings']['slider_timeout']; ?>" />
					<span style="font-size:12px; color:#999999; width:250px; padding-left:20px; position:absolute;">
						<?php _e('Set time duration for moving to next slide. Default is set to 6000ms.', THEMENAME); ?>
					</span>
				</div>
				<div class="settings_left" style="padding:0; width:350px;">
					<div class="settings_left_title">
						<?php _e('Animation Speed', THEMENAME); ?>
					</div>
					<input type="text" name="slideshow_hover_time" style="text-align:center;" size="6" value="<?php echo $slider_elements['settings']['animationspeed']; ?>" />
					<span style="float:right; width: 257px; padding:0 0 0 20px;">
						<?php _e("Set slide transition speed. Default is set to 1000ms.", THEMENAME); ?>
					</span>
				</div>
				<div class="clear"></div>
			</div>
			<div class="section_settings" style="">
				<div class="settings_left">
					<span style="font-size:15px; font-weight:bold; color:#333333; padding-bottom:15px; display:block;">
						<?php _e('Box Cols', THEMENAME); ?>
					</span>
					<input style="text-align:center; font-size:12px; color:#333333;" size="6" type="text" name="box_cols" maxlength="5" value="<?php echo $slider_elements['settings']['box_cols']; ?>" />
					<span style="font-size:12px; color:#999999; width:250px; padding-left:20px; position:absolute;">
						<?php _e('Set box cols for box animations.', THEMENAME); ?>
					</span>
				</div>
				<div class="settings_left" style="padding:0; width:350px;">
					<span style="font-size:15px; font-weight:bold; color:#333333; padding-bottom:15px; display:block;">
						<?php _e('Box Rows', THEMENAME); ?>
					</span>
					<input style="text-align:center; font-size:12px; color:#333333;" size="6" type="text" name="box_rows" maxlength="5" value="<?php echo $slider_elements['settings']['box_rows']; ?>" />
					<span style="font-size:12px; color:#999999; width:250px; padding-left:20px; position:absolute;">
						<?php _e('Set box rows for box animations.', THEMENAME); ?>
					</span>
				</div>
				<div class="clear"></div>
			</div>
			<div class="section_settings" style="border-bottom:none;">
				<div class="settings_left">
					<div class="settings_left_title">
						<?php _e('Slideshow animation pause', THEMENAME); ?>
					</div>
					<select name="slideshow_hover">
					<?php switch($slider_elements['settings']['slider_hover'])
					{
						case 'true' : ?>
							<option value="true"><?php _e('Yes', THEMENAME); ?></option>
							<option value="false"><?php _e('No', THEMENAME); ?></option>
						<?php break;
						case 'false' : ?>
							<option value="false"><?php _e('No', THEMENAME); ?></option>
							<option value="true"><?php _e('Yes', THEMENAME); ?></option>
						<?php break;
					} ?>
					</select>
					<div class="desc_bottom">
						<?php _e("Select Yes if you want to pause slideshow animation when the mouse is over a slide.", THEMENAME); ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	
	<div id="general_settings_dubble" class="nivo_slides">
		<div class="general_title_dubble">
			<span class="float_left"><?php _e('Nivo Slides', THEMENAME); ?></span>
			<span class="float_right">
				<input id="add_elements" class="add_element" rel=".section" style="font-size:11px; font-weight:normal; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; " type="button" value="Add Slide" />
			</span>
		</div>
		<div class="active_settings_dubble">
		<div class="desc_bottom" style="padding:20px 0;">
			<?php _e("Click Add Slide button to add a new slide. 
			Upload new image or choose an existing one from the Media Gallery by clicking the Upload Image button. 
			Enter a Title for your slide (optional). When you have more than one slide, you can change slide sequence by dragging slides up or down. 
			You can also add a Title, Subtitle and Button for each slide and set an alignment for these element unit. 
			If you want to delete a slide, click Delete Slide button and then click Save button at the bottom of this framework page.<br /><br />

			The recommended minimal image size for slideshow images is 1224 x 660 pixels. 
			If you use smaller images than recommended, we suggest you to use images of the same size to make animation flow smoothly.", 
				THEMENAME); ?>
		</div>
			<div id="section_block">
				<?php
					foreach($slider_elements['elements'] as $keys=>$val)
					{
						foreach($val as $keys=>$values)
						{
							if(is_numeric($keys))
							{
							?>
							<div class="section" id="item<?php echo $keys; ?>">
								<div class="section_title">
									<span class="float_left">
										<input id="removeId<?php echo $keys; ?>" class="remove_block" type="button" value="Delete Slide" />
									</span>
									<span class="float_right">
										<div class="change_text"><?php _e('Change Sequence', THEMENAME); ?></div>
										<div class="section_change"></div>
									</span>
								</div>
								<div class="section_main">
									<div class="section_left">
										<img class="img_input" id="up_image<?php echo $keys; ?>" <?php if($values['img'] == "" or $values['img'] == get_template_directory_uri(). '/images/slideshow-default.jpg' ){ echo 'src="'.LOGOATTACH.'"';}else{ echo "src=".cuckoo_get_attachment_all_size( $values['img'] , 'admin-slide-show')."";} ?> />
									</div>
									<div class="section_right">
										<p style="padding-bottom:5px;">
											<b><?php _e('Title', THEMENAME); ?></b>
											<input class="width_input_title" name="img_title<?php echo $keys; ?>" type="text" maxlength="70" value="<?php echo $values['title']; ?>" />
										</p>
										<p>
											<th scope="row"></th>
											<td>
												<label class="up-img" for="upload_image<?php echo $keys; ?>">
													<b><?php _e('Image URL', THEMENAME); ?></b>
													<input id="image_url_input" class="upload_image<?php echo $keys; ?>" type="text" size="36" name="upload_image<?php echo $keys; ?>" value="<?php echo $values['img']; ?>" />
													<input id="uploadId<?php echo $keys; ?>" class="upload_image_button" type="button" value="Upload Image" />
												</label>
											</td>
										</p>
										<div class="desc_bottom" style="padding-top:0px;">
											<?php _e(esc_attr("Example: http://www.cuckoothemes.com"), THEMENAME); ?>
										</div>
									</div>
								</div>
								<div class="img_description">
									<div class="slide_title">
										<b><?php _e( "Enter Slide Title" , THEMENAME ); ?></b>
										<textarea name="slide_title<?php echo $keys; ?>" class="slide_title" id="slide_title<?php echo $keys; ?>" ><?php echo $values['slide_title']; ?></textarea>
									</div>
									<div class="slide_subtitle">
										<b><?php _e( "Enter Slide Subtitle" , THEMENAME ); ?></b>
										<textarea name="slide_subtitle<?php echo $keys; ?>" class="slide_subtitle" id="slide_subtitle<?php echo $keys; ?>"><?php echo $values['slide_subtitle']; ?></textarea>
									</div>
									<div class="slide_button">
										<b><?php _e( "Enter Button Title" , THEMENAME ); ?></b>
										<input type="text" style="margin-bottom:25px;" class="button-title-slide" name="title_button_slides<?php echo $keys; ?>" value="<?php echo $values['title_button_slides']; ?>" />
										<b><?php _e( "Enter Button URL" , THEMENAME ); ?></b>
										<input type="text" name="url_button_slides<?php echo $keys; ?>" class="button-url-slide" value="<?php echo $values['url_button_slides']; ?>" />
									</div>
								</div>
								<div class="img_description" style="padding-top:20px;">
									<div class="radio_title"><?php _e("Title Unit Alignment", THEMENAME); ?></div>
									<?php foreach( $radio as $k => $v ) : ?>
										<?php if( $v == $values['title_aling'] ) : ?>
											<div class="radio_value title-radio-value-<?php echo $v; ?> title-rad">
												<input type="radio" id="title-<?php echo $v; ?>-<?php echo $keys; ?>" name="radio_title<?php echo $keys; ?>" value="<?php echo $v; ?>" checked />
												<label class="title-radio-label-<?php echo $v; ?>" for="title-<?php echo $v; ?>-<?php echo $keys; ?>">Align <?php echo $v; ?></label>
											</div>
										<?php else : ?>
											<div class="radio_value title-radio-value-<?php echo $v; ?> title-rad">
												<input type="radio" id="title-<?php echo $v; ?>-<?php echo $keys; ?>" name="radio_title<?php echo $keys; ?>" value="<?php echo $v; ?>" />
												<label class="title-radio-label-<?php echo $v; ?>" for="title-<?php echo $v; ?>-<?php echo $keys; ?>">Align <?php echo $v; ?></label>
											</div>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>
							</div>
							<?php
							}
						}
					}
					if($slider_elements['elements'][0] == null)
					{
					?>
					
					<div class="section" id="item1">
								<div class="section_title">
									<span class="float_left">
										<input id="removeId1" class="remove_block" type="button" value="Delete Slide" />
									</span>
									<span class="float_right">
										<div class="change_text"><?php _e('Change Sequenece', THEMENAME); ?></div>
										<div class="section_change"></div>
									</span>
								</div>
								<div class="section_main">
									<div class="section_left">
										<img class="img_input" id="up_image1" src="" />
									</div>
									<div class="section_right">
										<p style="padding-bottom:5px;">
											<b><?php _e('Title', THEMENAME); ?></b>
											<input class="width_input_title" name="img_title1" type="text" maxlength="70" value="" />
										</p>
										<p>
											<th scope="row"></th>
											<td>
												<label class="up-img" for="upload_image1">
													<b><?php _e('Image URL', THEMENAME); ?></b>
													<input id="image_url_input" class="upload_image1" type="text" size="36" name="upload_image1" value="" />
													<input id="uploadId1" class="upload_image_button" type="button" value="Upload Image" />
												</label>
											</td>
										</p>
										<div class="desc_bottom" style="padding-top:0px;">
											<?php _e(esc_attr("Example: http://www.cuckoothemes.com"), THEMENAME); ?>
										</div>
									</div>
								</div>
								<div class="img_description">
									<div class="slide_title">
										<b><?php _e( "Enter Slide Title" , THEMENAME ); ?></b>
										<textarea name="slide_title1" id="slide_title1"></textarea>
									</div>
									<div class="slide_subtitle">
										<b><?php _e( "Enter Slide Subtitle" , THEMENAME ); ?></b>
										<textarea name="slide_subtitle1" id="slide_subtitle1"></textarea>
									</div>
									<div class="slide_button">
										<b><?php _e( "Enter Button Title" , THEMENAME ); ?></b>
										<input type="text" style="margin-bottom:25px;" name="title_button_slides1" value="" />
										<b><?php _e( "Enter Button URL" , THEMENAME ); ?></b>
										<input type="text" name="url_button_slides1" value="" />
									</div>
								</div>
								<div class="img_description" style="padding-top:20px;">
									<div class="radio_title"><?php _e("Title Unit Alignment", THEMENAME); ?></div>
									<?php foreach( $radio as $k => $v ) : ?>
										<?php if($v == "Left") : ?>
											<div class="radio_value title-radio-value-<?php echo $v; ?>">
												<input type="radio" name="radio_title1" value="<?php echo $v; ?>" checked /> Align <?php echo $v; ?>
											</div>
										<?php else : ?>
											<div class="radio_value title-radio-value-<?php echo $v; ?> title-rad">
												<input type="radio" name="radio_title1" value="<?php echo $v; ?>" /> Align <?php echo $v; ?>
											</div>
										<?php endif;?>
									<?php endforeach; ?>
								</div>
							</div>
							<input type="hidden" value="item1," name="items" />
						<?php
					}else{
						?>
				<input type="hidden" value="<?php foreach($slider_elements['elements'] as $keys=>$val) {  foreach($val as $keys=>$values) { echo "item".$keys.","; } } ?>" name="items" />
			<?php } ?>
			</div>
		</div>
	</div>
	<p style="display:inline;">
    <input class="active_input" name='all' style="margin-right:20px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " type="submit" value="Save" /> 
	</p>
	<?php cuckoo_framework_footer(); ?>
	</form>
</section>
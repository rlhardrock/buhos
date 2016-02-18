<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*
** Name: admin page in framework
*/
global $theme_style;
$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
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

$cuckoo_woocommerce = get_option( THEMEPREFIX . "_woocommerce_cuckoo" );

$google_array = google_font();
$default_array = default_font();
$flatIt_array = flatIt_font();
/* Styles Font's */
$font_style = array(
	'Normal' 	=> 'Normal',
	'Italic' 	=> 'Italic',
	'Oblique' 	=> 'Oblique'
);
/* Weight Font's */
$font_weight = array(
	'Normal' 	=> 'Normal',
	'Lighter' 	=> 'Lighter',
	'Bold'		=> 'Bold'
);
?>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$(".font_block").change(function () {
				var family = $(this).find("select.font_select option:selected").val();
				var fontSize = $(this).find("select.mini_last_select option:selected").val();
				var fontWeight = $(this).find("select.mini_select_first option:selected").val();
				var fontStyle = $(this).find("select.mini_select option:selected").val();
				var fontLine = $(this).find("input.mini_select-input").val();
				var fontColor = $(this).find("input.mini_select-input-color").val();
				var familyShow = (family == "Use Default Font" ? "<?php echo $theme_style[$cuckoo_settings['theme-style']]['theme_font']; ?>" : family);
				if(family != "Use Default Font") {
					$("head").append('<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='+familyShow+'">');
				}
				$(this).find(".font_preview").css('font-family', familyShow+" , sans-serif");
				$(this).find(".font_preview").css('font-style', fontStyle);
				$(this).find(".font_preview").css('font-weight', fontWeight);
				$(this).find(".font_preview").css('color', fontColor);
				if( fontSize > 0 ){
					$(this).find(".font_preview").css('font-size', fontSize+"px");
				}else{
					$(this).find(".font_preview").css('font-size', "13px");
				}
				if( fontLine > 0 ){
					$(this).find(".font_preview").css('line-height', fontLine);
				}
			}).trigger('change');
			
			$(".selectPicker").click(function(){
				var color = $(this).parent().find('.mini_select-input-color').val();
				$(this).parent().parent().parent().find(".font_preview").css('color', color);
			});
			
			$("#restore_font").click(function(){
				var answer = confirm('Do you really want to reset all fonts settings?');
				return answer;
			});
		});
	</script>
<section id="main_content">
<?php
if(isset($_REQUEST['all']))
{

$cuckoo_woocommerce = array(
	'single_page_title' 		=> $title = $_POST['single_page_title'] == '' ? 'Shop Product' : $_POST['single_page_title'],
	'single_page_subtitle' 		=> $_POST['single_page_subtitle'],
	'related_products' 			=> $_POST['related_products'],
	'parallax' 					=> $_POST['parallax-effect-1'],
	'img_url' 					=> $_POST['upload_image1'],
	'imgPosition' 				=> $_POST['radio_position-1'],
	'imgRepeat' 				=> $_POST['radio_repeat-1'],
	'imgAttachment' 			=> $_POST['radio_attachment-1'],
	'parallax-speed' 			=> $speed = $_POST['parallax-speed'] == '' ? 10 : $_POST['parallax-speed'],
	'backgroundColor' 			=> $_POST['color_picker_color-1'],
	'price_font' 				=> $_POST['price_font'],
	'price_weight' 				=> $_POST['price_weight'],
	'price_style' 				=> $_POST['price_style'],
	'price_size' 				=> $_POST['price_size'],
	'price_lheight' 			=> $_POST['price_lheight'],
	'price_color' 				=> $_POST['color_picker_color-2'],
	'regular_font' 				=> $_POST['regular_font'],
	'regular_weight' 			=> $_POST['regular_weight'],
	'regular_style' 			=> $_POST['regular_style'],
	'regular_size' 				=> $_POST['regular_size'],
	'regular_lheight' 			=> $_POST['regular_lheight'],
	'regular_color' 			=> $_POST['color_picker_color-3']
);

update_option( THEMEPREFIX . "_woocommerce_cuckoo" , $cuckoo_woocommerce );
?>
	<div id="save_upadate" class="updated"><?php _e('New settings saved!', THEMENAME); ?></div>
<?php
}
if(isset($_REQUEST['restore'])){

	$cuckoo_woocommerce = array(
	'single_page_title' 		=> $cuckoo_woocommerce['single_page_title'],
	'single_page_subtitle' 		=> $cuckoo_woocommerce['single_page_subtitle'],
	'related_products' 			=> $cuckoo_woocommerce['related_products'],
	'parallax' 					=> $cuckoo_woocommerce['parallax'],
	'img_url' 					=> $cuckoo_woocommerce['img_url'],
	'imgPosition' 				=> $cuckoo_woocommerce['imgPosition'],
	'imgRepeat' 				=> $cuckoo_woocommerce['imgRepeat'],
	'imgAttachment' 			=> $cuckoo_woocommerce['imgAttachment'],
	'parallax-speed' 			=> $cuckoo_woocommerce['parallax-speed'],
	'backgroundColor' 			=> $cuckoo_woocommerce['backgroundColor'],
	'price_font' 				=> $theme_style[$cuckoo_settings['theme-style']]['woocommerce_fonts']['price_font'],
	'price_weight' 				=> $theme_style[$cuckoo_settings['theme-style']]['woocommerce_fonts']['price_weight'],
	'price_style' 				=> $theme_style[$cuckoo_settings['theme-style']]['woocommerce_fonts']['price_style'],
	'price_size' 				=> $theme_style[$cuckoo_settings['theme-style']]['woocommerce_fonts']['price_size'],
	'price_lheight' 			=> $theme_style[$cuckoo_settings['theme-style']]['woocommerce_fonts']['price_lheight'],
	'price_color' 				=> $theme_style[$cuckoo_settings['theme-style']]['woocommerce_fonts']['price_color'],
	'regular_font' 				=> $theme_style[$cuckoo_settings['theme-style']]['woocommerce_fonts']['regular_font'],
	'regular_weight' 			=> $theme_style[$cuckoo_settings['theme-style']]['woocommerce_fonts']['regular_weight'],
	'regular_style' 			=> $theme_style[$cuckoo_settings['theme-style']]['woocommerce_fonts']['regular_style'],
	'regular_size' 				=> $theme_style[$cuckoo_settings['theme-style']]['woocommerce_fonts']['regular_size'],
	'regular_lheight' 			=> $theme_style[$cuckoo_settings['theme-style']]['woocommerce_fonts']['regular_lheight'],
	'regular_color' 			=> $theme_style[$cuckoo_settings['theme-style']]['woocommerce_fonts']['regular_color']
	);

update_option( THEMEPREFIX . "_woocommerce_cuckoo" , $cuckoo_woocommerce );
	/* Updated new fonts */
	update_option( THEMEPREFIX . "_font_settings" , $theme_style[$cuckoo_settings['theme-style']]['font_page'] );
	?>
		<div id="save_upadate" class="updated"><?php _e('New settings saved!', THEMENAME); ?></div>
	<?php
}
?>
	<?php cuckoo_framework_head( __('WooCommerce', THEMENAME) ); ?>
	<form id="formId" method="POST" action="">
		<div id="general_settings">
			<div class="general_title_active">
				<span class="float_left"><?php _e('eShop Single Page Header Settings', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings">
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('eShop Single Page Title', THEMENAME); ?>
						</div>
						<input type="text" name="single_page_title" size="60" value="<?php echo $cuckoo_woocommerce['single_page_title']; ?>" />
						<div class="desc_bottom">
							<?php _e("Enter a Title that will be displayed in each single eShop page. If left blank, default title will be displayed.", THEMENAME); ?>
						</div>
					</div>
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('eShop Single Page Subtitle', THEMENAME); ?>
						</div>
						<input type="text" name="single_page_subtitle" size="60" value="<?php echo $cuckoo_woocommerce['single_page_subtitle']; ?>" />
						<div class="desc_bottom">
							<?php _e("Enter a Subtitle that will be displayed in each single eShop page (optional).", THEMENAME); ?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Related Products', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings">
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Enter a Title for Related Products Unit', THEMENAME); ?>
						</div>
						<input type="text" name="related_products" size="60" value="<?php echo $cuckoo_woocommerce['related_products']; ?>" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="section_settings">
					<?php /* Background control */ ?>
					<div class="settings_left_title">
					<?php _e('Related Products Unit Background Settings', THEMENAME); ?>
					</div>
					<div class="desc_bottom" style="padding:10px 0 30px;">
						<?php _e("Upload custom background image, set display properties for it. Or leave it blank, and default theme background image will be displayed. ", THEMENAME); ?>
					</div>
					<div id="background-settings-1" class="background-setting" style="border-top:0 none; padding-top:0; margin-top:0;">
						<div class="titleBackground">
							<b><?php _e('Background',THEMENAME); ?></b>
							<select id="parallax-effect-1" name="parallax-effect-1" class="background-select-parallax">
								<?php if($cuckoo_woocommerce['parallax'] == 1) :?>
								<option value="1" selected><?php _e('Parallax Background'); ?></option>
								<option value="0"><?php _e('Default Background'); ?></option>
							<?php else: ?>
								<option value="0" selected><?php _e('Default Background'); ?></option>
								<option value="1"><?php _e('Parallax Background'); ?></option>
							<?php endif; ?>
							</select>
						</div>
						<label for="upload_image1">
							<input id="image_url_input" class="upload_image1 upLaoding" style="width:82%;" type="text" size="36" name="upload_image1" value="<?php echo $cuckoo_woocommerce['img_url'] ?>" />
							<input id="uploadId1" class="upload_image_button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
						</label>
						<div class="col-1 float_left" style="width:63%; padding-top:25px;">
							<div id="background-setting-position-1" class="radio_block parallax-settigs back-posi">
								<b style="padding-right:15px;"><?php _e('Position' , THEMENAME); ?></b>
								<?php foreach($color_position as $k=>$v): ?>
									<?php if( $v == $cuckoo_woocommerce['imgPosition'] ) : ?>
										<input type="radio" class="radio-position-clone" name="radio_position-1" value="<?php echo $v; ?>" checked="checked" /><?php echo $v; ?>
									<?php else : ?>
										<input type="radio" class="radio-position-clone" name="radio_position-1" value="<?php echo $v; ?>" /><?php echo $v; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>
							<div id="background-setting-reapet-1" class="radio_block parallax-settigs back-repeat">
								<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , THEMENAME); ?></b>
								<?php foreach($repeat_img as $k=>$v): ?>
									<?php if( $k == $cuckoo_woocommerce['imgRepeat'] ) : ?>
										<input type="radio" class="radio-repeat-clone" name="radio_repeat-1" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
									<?php else : ?>
										<input type="radio" class="radio-repeat-clone" name="radio_repeat-1" value="<?php echo $k; ?>" /><?php echo $v; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</div>													
							<div id="background-setting-attach-1" class="radio_block parallax-settigs back-attach">
								<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , THEMENAME); ?></b>
								<?php foreach($attachament_img as $k=>$v): ?>
									<?php if( $k == $cuckoo_woocommerce['imgAttachment'] ) : ?>
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
								<input type="text" id="parallax-speed-1" class="parallax-speed" name="parallax-speed" value="<?php echo $cuckoo_woocommerce['parallax-speed']; ?>" />
							</div>
						</div>
						<div class="col-1 last float_right" style="width:33%; padding-top:25px;">
							<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , THEMENAME); ?></b>
							<input type="text" id="color-1" value="<?php echo $back = empty($cuckoo_woocommerce['backgroundColor']) ? '#' : $cuckoo_woocommerce['backgroundColor']; ?>" class="colorInput" name="color_picker_color-1" style="background-color:<?php echo $cuckoo_woocommerce['backgroundColor']; ?>" />
							<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-1" />
							<div id="color_picker_color-1" class="colorPickerMain"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<?php /* Plain Text visible only if main dropdown selected */ ?>
			<section id="id_plain_text" class="no-bord" style="display:block;">
				<div class="general_title_active">
					<span class="float_left"><?php _e('Custom eShop Fonts', THEMENAME); ?></span>
					<input id="restore_font" class="active_input float_right" name='restore' style="border:1px solid #227399; color:white; " type="submit" value="<?php _e('Reset to Default Settings', THEMENAME); ?>" />
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="desc_bottom" style="padding:0;">
							<?php _e('CuckooTap theme provides you with +500 custom fonts from Google.<br /> 
								All these theme fonts can be managed using CuckooTap > Theme Fonts tab.<br />
								Here you can manage only the fonts that are used in Eshop only.<br />
								Click Reset to Default Settings button to restore default font settings.', THEMENAME); ?>
						</div>
						<div class="clear"></div>
					</div>
					<div class="section_settings font_block">
						<div class="settings_left_title">
							<?php _e('Sale Price Font', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="price_font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['price_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['price_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['price_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', THEMENAME); ?>
								</div>
								<select class="mini_select_first" name="price_weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_woocommerce['price_weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', THEMENAME); ?>
								</div>
								<select class="mini_select" name="price_style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_woocommerce['price_style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', THEMENAME); ?>
								</div>
								<select class="mini_last_select" name="price_size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_woocommerce['price_size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', THEMENAME); ?>
								</div>
								<input class="mini_select-input" type="text" name="price_lheight" value="<?php echo $cuckoo_woocommerce['price_lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-2" value="<?php echo $back = empty($cuckoo_woocommerce['price_color']) ? '#' : $cuckoo_woocommerce['price_color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-2" style="background-color:<?php echo $cuckoo_woocommerce['price_color']; ?> ; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-2" />
								<div id="color_picker_color-2" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								<h1><?php _e('Suspendisse convallis', THEMENAME); ?></h1>
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', THEMENAME); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="section_settings font_block" style="border:0;">
						<div class="settings_left_title">
							<?php _e('Regular Price Font', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="regular_font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['regular_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['regular_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_woocommerce['regular_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								?>
							</select>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Weight', THEMENAME); ?>
								</div>
								<select class="mini_select_first" name="regular_weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_woocommerce['regular_weight']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Style', THEMENAME); ?>
								</div>
								<select class="mini_select" name="regular_style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_woocommerce['regular_style']) 
											echo "<option value='" . $k . "' selected>" . $v . "</option>\n"; 
										else
											echo "<option value='" . $k . "'>" . $v . "</option>\n"; 
									}
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Size', THEMENAME); ?>
								</div>
								<select class="mini_last_select" name="regular_size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_woocommerce['regular_size'] == $i ) :
												echo "<option value='" . $i . "' selected>" . $i . "</option>\n";
											else :
												echo "<option value='" . $i . "'>" . $i . "</option>\n";
											endif;
										endfor;
									?>
								</select>
							</div>
							<div class="fonts_attr_bottom">
								<div class="font_description_mini">
									<?php _e('Line Height', THEMENAME); ?>
								</div>
								<input class="mini_select-input" type="text" name="regular_lheight" value="<?php echo $cuckoo_woocommerce['regular_lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-3" value="<?php echo $back = empty($cuckoo_woocommerce['regular_color']) ? '#' : $cuckoo_woocommerce['regular_color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-3" style="background-color:<?php echo $cuckoo_woocommerce['regular_color']; ?> ; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-3" />
								<div id="color_picker_color-3" class="colorPickerMain"></div>
							</div>
						</div>
						<div class="settings_left" style="padding-right: 0; width:370px;">
							<div class="font_preview">
								<h1><?php _e('Suspendisse convallis', THEMENAME); ?></h1>
								<p><?php _e('Suspendisse convallis nibh sed nulla scelerisque varius. Aliquam gravida fringilla ultrices. Etiam consectetur dui id lacus malesuada molestie.', THEMENAME); ?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</section>
		</div>
		<p style="display:inline;">
			<input class="active_input" name='all' style="margin-right:20px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " type="submit" value="Save" />
		</p>
		<?php cuckoo_framework_footer(); ?>
	</form>
</section>
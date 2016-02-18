<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/

$cuckoo_footer = get_option( THEMEPREFIX . "_header_footer_settings" );
$logo_setting = array(
	"Image Logo",
	"Plain Text Logo",
	"No Logo"
);
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
/* Weight Font's */
$headerArray = array(
	'Header Option 1',
	'Header Option 2',
	'Header Option 3',
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
				var familyShow = (family == "Use Default Font" ? "<?php echo THEMEFONT; ?>" : family);
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

	// wpml cuckootap since 2.9
	if( function_exists('icl_register_string') ) :
		icl_register_string(THEMENAME.' Header & Footer', 'Plain Text Logo Title', esc_attr( $_POST['plain_text_header'] ));
		icl_register_string(THEMENAME.' Header & Footer', 'Line 1', esc_attr( $_POST['line1'] ));
		icl_register_string(THEMENAME.' Header & Footer', 'Line 2', esc_attr( $_POST['line2'] ));
		icl_register_string(THEMENAME.' Header & Footer', 'Line 3', esc_attr( $_POST['line3'] ));
	endif;

	$cuckoo_footer = array( 
	'logo_setting' 		=> esc_attr( $_POST['logo_setting'] ),
	'plain_text_header' => esc_attr( $_POST['plain_text_header'] ),
	'title_font'		=> esc_attr( $font_show = $_POST['title_font'] == "Use Default Font" ? 'BebasNeue' : $_POST['title_font'] ),
	'title_font_weight'	=> esc_attr( $_POST['title_font_weight'] ),
	'title_font_style'	=> esc_attr( $_POST['title_font_style'] ),
	'title_font_size'	=> esc_attr( $font_show = $_POST['title_font_size'] == "" ? '27' : $_POST['title_font_size'] ),
	'title_font_lheight'=> esc_attr( $_POST['title_font_lheight'] ),
	'title_font_color'	=> esc_attr( $_POST['color_picker_color-1'] ) ,
	'image_url' 		=> esc_attr( $_POST['upload_image'] ),
	'image_title' 		=> esc_attr( $_POST['img_title'] ), 
	'line1' 			=> cuckoo_get_value( $_POST['line1'] ) ,
	'line2' 			=> cuckoo_get_value( $_POST['line2'] ) ,
	'line3' 			=> cuckoo_get_value( $_POST['line3'] ),
	/* New element since V2.7 */
	'header_type'		=> esc_attr( $_POST['header_type'] )
	);
	update_option( THEMEPREFIX . "_header_footer_settings", $cuckoo_footer );
	?>  
   <div id="save_upadate" class="updated"><?php _e('New settings saved!', THEMENAME); ?></div>
<?php
}
?>
	<?php cuckoo_framework_head( __('Header & Footer', THEMENAME) ); ?>
	<form method="POST" action="">
		<div id="general_settings">
			<?php /* Header settings */ ?>
			<?php /* Main dropdown to shose header content: text or image or nothing */ ?>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Header Settings', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_full">
								<div class="settings_left_title">
									<?php _e('Choose Header Style', THEMENAME); ?>
								</div>
								<select id="header_type" class="dropdown" name="header_type">
									<?php foreach( $headerArray as $k => $v ) : ?>
										<?php if( $cuckoo_footer['header_type'] == $k ): ?>
											<option value="<?php echo $k; ?>" selected ><?php echo $v; ?></option>
										<?php else : ?>
											<option value="<?php echo $k; ?>" ><?php echo $v; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="active_settings" style="display: block;">	
				<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_full">
								<div class="settings_left_title">
									<?php _e('General Settings', THEMENAME); ?>
								</div>
								<select id="logo_setting" class="dropdown" name="logo_setting">
									<?php foreach( $logo_setting as $k => $v ) : ?>
										<?php if( $cuckoo_footer['logo_setting'] == $v ): ?>
											<option value="<?php echo $v; ?>" selected ><?php echo $v; ?></option>
										<?php else : ?>
											<option value="<?php echo $v; ?>" ><?php echo $v; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="settings_left">
							<div class="desc_bottom">
								<?php _e('CuckooTap theme allows you to display an image or plain text logo. Choose what type of logo you want to display.', THEMENAME); ?>
							</div>
						</div>
					<div class="clear"></div>
				</div>
			</div>
			
			<?php /* Plain Text visible only if main dropdown selected */ ?>
			<section id="id_plain_text" class="no-bord">
				<div class="general_title_active">
					<span class="float_left"><?php _e('Plain Text Logo Settings', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
							<div class="settings_left">
								<div class="settings_left_full">
									<div class="settings_left_title">
										<?php _e('Enter a Title for Your Logo', THEMENAME); ?>
									</div>
									<input type="text" name="plain_text_header" size="60" value="<?php echo $cuckoo_footer['plain_text_header']; ?>" />
								</div>
							</div>
							<div class="settings_left">
								<div class="desc_bottom">
									<?php _e('Enter Your company name or any other word you like. Keep in mind that the logo area is limited up to 225 pixel width.', THEMENAME); ?>
								</div>
							</div>
						<div class="clear"></div>
					</div>
					<div class="section_settings font_block">
						<div class="settings_left_title">
							<?php _e('Choose Font for Your Logo', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="title_font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_footer['title_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_footer['title_font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_footer['title_font']) 
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
								<select class="mini_select_first" name="title_font_weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_footer['title_font_weight']) 
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
								<select class="mini_select" name="title_font_style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_footer['title_font_style']) 
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
								<select class="mini_last_select" name="title_font_size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_footer['title_font_size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="title_font_lheight" value="<?php echo $cuckoo_footer['title_font_lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-1" value="<?php echo $back = empty($cuckoo_footer['title_font_color']) ? '#' : $cuckoo_footer['title_font_color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-1" style="background-color:<?php echo $cuckoo_footer['title_font_color']; ?> ; top:-3px; position:relative;" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-1" />
								<div id="color_picker_color-1" class="colorPickerMain"></div>
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
			
			<?php /* Logo visible only if main dropdown selected */ ?>
			<section id="id_logo" class="no-bord">
				<div class="general_title_active">
					<span class="float_left"><?php _e('Image Logo', THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="section_main">
							<div class="section_left">
								<img class="img_input" id="up_image" src="<?php echo $show_image = ( $cuckoo_footer['image_url'] == null ) ? LOGOATTACH : cuckoo_get_attachment_tumb( $cuckoo_footer['image_url'] );?>" />
							</div>
							<div class="section_right">
								<p style="padding-bottom:5px;">
									<b><?php _e('Title', THEMENAME); ?></b>
									<input class="width_input_title" name="img_title" type="text" maxlength="70" value="<?php  echo $cuckoo_footer['image_title']; ?>" />
								</p>
								<p>
									<th scope="row"></th>
									<td>
										<label for="upload_image">
											<b><?php _e('Image URL', THEMENAME); ?></b>
											<input id="image_url_input" class="upload_image" type="text" size="36" name="upload_image" value="<?php echo $cuckoo_footer['image_url']; ?>" />
											<input class="upload-header" type="button" value="Upload Image" style="float: left; margin-top: 20px; position:relative!important; top:0!important; " />
										</label>
									</td>
								</p>
							</div>
							<input type="hidden" value="item1" name="items" />
						</div>
						<div class="desc_bottom" style="padding-top:20px;">
							<?php _e("Important! Upload custom logo or paste image URL. Header Option 1 and Header Option 2 logo area size is 225 x 70 pixels. Header Option 3 logo area size is 225 x 88 pixels. Larger images will be resized.", THEMENAME); ?>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</section>
			<?php /* Header settings END */ ?>
			<?php /* Footer settings */ ?>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Footer Settings', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings" style="position:relative; border-bottom:0; padding-bottom:0px;">
					<span style="font-size:12px; color:#999999;">
						<?php _e("Using Line 1, Line 2 and Line 3 form fields you can add some texts and links in the footer.<br /> 
						".esc_attr('Example: CuckooThemes | Copyright 2012 <a title="CuckooThemes.com" href="http://cuckoothemes.com">CuckooThemes.com</a>
							Powered by <a href="http://wordpress.org/">WordPress</a> | Created by <a href="http://cuckoothemes.com">CuckooThemes.com</a>'), THEMENAME); ?>
					</span>
				</div>
				<div class="section_settings" style="position:relative; padding-bottom:18px; border-bottom:0;">
						<p style="margin:0; display:inline-block;">
							<b style="padding:0 18px;"><?php _e('Line 1', THEMENAME); ?></b>
							<input class="width_input_title" style="width:670px;" name="line1" type="text" value="<?php echo esc_attr( $cuckoo_footer['line1'] ); ?>" />
						</p>
						<p style="margin:12px 0;">
							<b style="padding:0 18px;"><?php _e('Line 2', THEMENAME); ?></b>
							<input class="width_input_title" style="width:670px;" name="line2" type="text" value="<?php echo esc_attr( $cuckoo_footer['line2'] ); ?>" />
						</p>
						<p style="margin:12px 0;">
							<b style="padding:0 18px;"><?php _e('Line 3', THEMENAME); ?></b>
							<input class="width_input_title" style="width:670px;" name="line3" type="text" value="<?php echo esc_attr( $cuckoo_footer['line3'] ); ?>" />
						</p>
				</div>
			</div>
			<?php /* Footer settings END */ ?>
		</div>
		<p style="display:inline">
			<input type="submit" name="all" value="Save" style="margin-right:20px; position:relative; width:100px; height:30px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " /> 
		</p>
		<?php cuckoo_framework_footer(); ?>
	</form>
</section>
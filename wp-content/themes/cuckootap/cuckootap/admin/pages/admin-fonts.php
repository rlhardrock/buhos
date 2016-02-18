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
** Name : Font's
*/
global $theme_style;
$google_array = google_font();
$default_array = default_font();
$flatIt_array = flatIt_font();
$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
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
			$(".section_settings").change(function () {
				var family = $(this).find("select.font_select option:selected").val();
				var fontSize = $(this).find("select.mini_last_select option:selected").val();
				var fontWeight = $(this).find("select.mini_select_first option:selected").val();
				var fontStyle = $(this).find("select.mini_select option:selected").val();
				var fontLine = $(this).find("input.mini_select-input").val();
				var fontColor = $(this).find("input.mini_select-input-color").val();
				var familyShow = (family == "Use Default Font" ? "<?php echo $theme_style[$cuckoo_settings['theme-style']]['theme_font']; ?>" : family);
				
				$("head").append('<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='+familyShow+'">');
				$(this).find(".font_preview").css('font-family', familyShow+" , sans-serif");
				$(this).find(".font_preview").css('font-style', fontStyle);
				$(this).find(".font_preview").css('font-weight', fontWeight);
				$(this).find(".font_preview").css('color', fontColor);
				if( fontSize > 0 ){
					$(this).find(".font_preview").css('font-size', fontSize+"px");
				}else{
					$(this).find(".font_preview").css('font-size', "12px");
				}				
				if( fontLine > 0 ){
					$(this).find(".font_preview").css('line-height', fontLine);
				}else{
					$(this).find(".font_preview").css('line-height', "1.3");
				}
			}).trigger('change');
			$("#restore_font").click(function(){
				var answer = confirm('Do you really want to reset all fonts settings?');
				return answer;
			});
			$(".selectPicker").click(function(){
				var color = $(this).parent().find('.mini_select-input-color').val();
				$(this).parent().parent().parent().find(".font_preview").css('color', color);
			});
		});
	</script>
	<section id="main_content">
	<?php
	if(isset($_REQUEST['all']))
	{
	/* all names settings */

	$cuckoo_font = array( 
	/* Slideshow main title */
	'slideshow-title-font' 			=> $title = (esc_attr( $_POST['slideshow-title-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['slideshow-title-font'] )) , 
	'slideshow-title-weight' 		=> esc_attr( $_POST['slideshow-title-weight'] ) ,
	'slideshow-title-style' 		=> esc_attr( $_POST['slideshow-title-style'] ) ,
	'slideshow-title-size' 			=> $size = (esc_attr( $_POST['slideshow-title-size'] ) == "" ? '100' : esc_attr( $_POST['slideshow-title-size'] )) ,	
	'slideshow-title-lheight' 		=> esc_attr( $_POST['slideshow-title-lheight'] ) ,	
	'slideshow-title-color' 		=> esc_attr( $_POST['color_picker_color-1'] ) ,	
	
	/* Slideshow Subtitle */
	'slideshow-subtitle-font' 		=> $title = (esc_attr( $_POST['slideshow-subtitle-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['slideshow-subtitle-font'] )) , 
	'slideshow-subtitle-weight' 	=> esc_attr( $_POST['slideshow-subtitle-weight'] ) ,
	'slideshow-subtitle-style' 		=> esc_attr( $_POST['slideshow-subtitle-style'] ) ,
	'slideshow-subtitle-size' 		=> $size = (esc_attr( $_POST['slideshow-subtitle-size'] ) == "" ? '62' : esc_attr( $_POST['slideshow-subtitle-size'] )) ,	
	'slideshow-subtitle-lheight' 	=> esc_attr( $_POST['slideshow-subtitle-lheight'] ) ,	
	'slideshow-subtitle-color' 		=> esc_attr( $_POST['color_picker_color-2'] ) ,		
	
	/* Post, Work & Page Title */
	'pwp-title-font' 				=> $title = (esc_attr( $_POST['pwp-title-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['pwp-title-font'] )) , 
	'pwp-title-weight' 				=> esc_attr( $_POST['pwp-title-weight'] ) ,
	'pwp-title-style' 				=> esc_attr( $_POST['pwp-title-style'] ) ,
	'pwp-title-size' 				=> $size = (esc_attr( $_POST['pwp-title-size'] ) == "" ? '100' : esc_attr( $_POST['pwp-title-size'] )) ,	
	'pwp-title-lheight' 			=> esc_attr( $_POST['pwp-title-lheight'] ) ,	
	'pwp-title-color' 				=> esc_attr( $_POST['color_picker_color-3'] ) ,		
	
	/* Post, Work & Page Subtitle */
	'pwp-subtitle-font' 			=> $title = (esc_attr( $_POST['pwp-subtitle-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['pwp-subtitle-font'] )) , 
	'pwp-subtitle-weight' 			=> esc_attr( $_POST['pwp-subtitle-weight'] ) ,
	'pwp-subtitle-style' 			=> esc_attr( $_POST['pwp-subtitle-style'] ) ,
	'pwp-subtitle-size' 			=> $size = (esc_attr( $_POST['pwp-subtitle-size'] ) == "" ? '23' : esc_attr( $_POST['pwp-subtitle-size'] )) ,	
	'pwp-subtitle-lheight' 			=> esc_attr( $_POST['pwp-subtitle-lheight'] ) ,	
	'pwp-subtitle-color' 			=> esc_attr( $_POST['color_picker_color-4'] ) ,	
	
	/*  Page Title */
	'page-unit-title-font' 			=> $title = (esc_attr( $_POST['page-unit-title-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['page-unit-title-font'] )) , 
	'page-unit-title-weight' 		=> esc_attr( $_POST['page-unit-title-weight'] ) ,
	'page-unit-title-style' 		=> esc_attr( $_POST['page-unit-title-style'] ) ,
	'page-unit-title-size' 			=> $size = (esc_attr( $_POST['page-unit-title-size'] ) == "" ? '27' : esc_attr( $_POST['page-unit-title-size'] )) ,	
	'page-unit-title-lheight' 		=> esc_attr( $_POST['page-unit-title-lheight'] ) ,	
	'page-unit-title-color' 		=> esc_attr( $_POST['color_picker_color-5'] ) ,		
	
	/* Text Box & Testimonial Text */
	'text-box-testimonials-font' 	=> $title = (esc_attr( $_POST['text-box-testimonials-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['text-box-testimonials-font'] )) , 
	'text-box-testimonials-weight' 	=> esc_attr( $_POST['text-box-testimonials-weight'] ) ,
	'text-box-testimonials-style' 	=> esc_attr( $_POST['text-box-testimonials-style'] ) ,
	'text-box-testimonials-size' 	=> $size = (esc_attr( $_POST['text-box-testimonials-size'] ) == "" ? '62' : esc_attr( $_POST['text-box-testimonials-size'] )) ,	
	'text-box-testimonials-lheight' => esc_attr( $_POST['text-box-testimonials-lheight'] ) ,	
	'text-box-testimonials-color' 	=> esc_attr( $_POST['color_picker_color-6'] ) ,			
	
	/* Testimonial Author */
	'testimonial-author-font' 		=> $title = (esc_attr( $_POST['testimonial-author-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['testimonial-author-font'] )) , 
	'testimonial-author-weight' 	=> esc_attr( $_POST['testimonial-author-weight'] ) ,
	'testimonial-author-style' 		=> esc_attr( $_POST['testimonial-author-style'] ) ,
	'testimonial-author-size' 		=> $size = (esc_attr( $_POST['testimonial-author-size'] ) == "" ? '23' : esc_attr( $_POST['testimonial-author-size'] )) ,	
	'testimonial-author-lheight'	=> esc_attr( $_POST['testimonial-author-lheight'] ) ,	
	'testimonial-author-color' 		=> esc_attr( $_POST['color_picker_color-7'] ) ,		
	
	/* Menus */
	'menus-font' 					=> $title = (esc_attr( $_POST['menus-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['menus-font'] )) , 
	'menus-weight' 					=> esc_attr( $_POST['menus-weight'] ) ,
	'menus-style' 					=> esc_attr( $_POST['menus-style'] ) ,
	'menus-size' 					=> $size = (esc_attr( $_POST['menus-size'] ) == "" ? '23' : esc_attr( $_POST['menus-size'] )) ,	
	'menus-lheight' 				=> esc_attr( $_POST['menus-lheight'] ) ,	
	'menus-color' 					=> esc_attr( $_POST['color_picker_color-8'] ) ,	

	/* New elemet menu dropdown */
	'menus-dropdown-font' 					=> $title = (esc_attr( $_POST['menus-dropdown-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['menus-dropdown-font'] )) , 
	'menus-dropdown-weight' 				=> esc_attr( $_POST['menus-dropdown-weight'] ) ,
	'menus-dropdown-style' 					=> esc_attr( $_POST['menus-dropdown-style'] ) ,
	'menus-dropdown-size' 					=> $size = (esc_attr( $_POST['menus-dropdown-size'] ) == "" ? '20' : esc_attr( $_POST['menus-dropdown-size'] )) ,	
	'menus-dropdown-lheight' 				=> esc_attr( $_POST['menus-dropdown-lheight'] ) ,	
	'menus-dropdown-color' 					=> esc_attr( $_POST['color_picker_color-27'] ) ,	
	
	/* Button Title */
	'button-font' 					=> $title = (esc_attr( $_POST['button-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['button-font'] )) , 
	'button-weight' 				=> esc_attr( $_POST['button-weight'] ) ,
	'button-style' 					=> esc_attr( $_POST['button-style'] ) ,
	'button-size' 					=> $size = (esc_attr( $_POST['button-size'] ) == "" ? '23' : esc_attr( $_POST['button-size'] )) ,	
	'button-lheight' 				=> esc_attr( $_POST['button-lheight'] ) ,	
	'button-color' 					=> esc_attr( $_POST['color_picker_color-9'] ) ,		
	
	/* Body Font */
	'body-font' 					=> $title = (esc_attr( $_POST['body-font'] ) == "Use Default Font" ? THEMEFONT : esc_attr( $_POST['body-font'] )) , 
	'body-weight' 					=> esc_attr( $_POST['body-weight'] ) ,
	'body-style' 					=> esc_attr( $_POST['body-style'] ) ,
	'body-size' 					=> $size = (esc_attr( $_POST['body-size'] ) == "" ? '12' : esc_attr( $_POST['body-size'] )) ,	
	'body-lheight' 					=> esc_attr( $_POST['body-lheight'] ) ,	
	'body-color' 					=> esc_attr( $_POST['color_picker_color-10'] ) ,	
	
	/* Details Font */
	'details-font' 					=> $title = (esc_attr( $_POST['details-font'] ) == "Use Default Font" ? THEMEFONT : esc_attr( $_POST['details-font'] )) , 
	'details-weight' 				=> esc_attr( $_POST['details-weight'] ) ,
	'details-style' 				=> esc_attr( $_POST['details-style'] ) ,
	'details-size' 					=> $size = (esc_attr( $_POST['details-size'] ) == "" ? '11' : esc_attr( $_POST['details-size'] )) ,	
	'details-lheight' 				=> esc_attr( $_POST['details-lheight'] ) ,	
	'details-color' 				=> esc_attr( $_POST['color_picker_color-11'] ) ,		
	
	/* Alerts Font */
	'alerts-font' 					=> $title = (esc_attr( $_POST['alerts-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['alerts-font'] )) , 
	'alerts-weight' 				=> esc_attr( $_POST['alerts-weight'] ) ,
	'alerts-style' 					=> esc_attr( $_POST['alerts-style'] ) ,
	'alerts-size' 					=> esc_attr( $_POST['alerts-size'] ) ,	
	'alerts-lheight' 				=> esc_attr( $_POST['alerts-lheight'] ) ,	
	'alerts-color' 					=> esc_attr( $_POST['color_picker_color-12'] ) ,	
	
	/* Post And Team List Title Font */
	'ptl-title-font' 				=> $title = (esc_attr( $_POST['ptl-title-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['ptl-title-font'] )) , 
	'ptl-title-weight' 				=> esc_attr( $_POST['ptl-title-weight'] ) ,
	'ptl-title-style' 				=> esc_attr( $_POST['ptl-title-style'] ) ,
	'ptl-title-size' 				=> $size = (esc_attr( $_POST['ptl-title-size'] ) == "" ? '23' : esc_attr( $_POST['ptl-title-size'] )) ,	
	'ptl-title-lheight' 			=> esc_attr( $_POST['ptl-title-lheight'] ) ,	
	'ptl-title-color' 				=> esc_attr( $_POST['color_picker_color-13'] ) ,	
	
	/* Team List Occupation */
	'occupation-font' 				=> $title = (esc_attr( $_POST['occupation-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['occupation-font'] )) , 
	'occupation-weight' 			=> esc_attr( $_POST['occupation-weight'] ) ,
	'occupation-style' 				=> esc_attr( $_POST['occupation-style'] ) ,
	'occupation-size' 				=> $size = (esc_attr( $_POST['occupation-size'] ) == "" ? '20' : esc_attr( $_POST['occupation-size'] )) ,	
	'occupation-lheight' 			=> esc_attr( $_POST['occupation-lheight'] ) ,	
	'occupation-color' 				=> esc_attr( $_POST['color_picker_color-14'] ) ,	
	
	/* Team & Testimonial content text */
	'tt-content-font' 				=> $title = (esc_attr( $_POST['tt-content-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['tt-content-font'] )) , 
	'tt-content-weight' 			=> esc_attr( $_POST['tt-content-weight'] ) ,
	'tt-content-style' 				=> esc_attr( $_POST['tt-content-style'] ) ,
	'tt-content-size' 				=> $size = (esc_attr( $_POST['tt-content-size'] ) == "" ? '27' : esc_attr( $_POST['tt-content-size'] )) ,	
	'tt-content-lheight' 			=> esc_attr( $_POST['tt-content-lheight'] ) ,	
	'tt-content-color' 				=> esc_attr( $_POST['color_picker_color-15'] ) ,	
	
	/* Team Member "Follow Me" & Post Tags & testimonials company */
	'tm-tt-font' 				=> $title = (esc_attr( $_POST['tm-tt-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['tm-tt-font'] )) , 
	'tm-tt-weight' 				=> esc_attr( $_POST['tm-tt-weight'] ) ,
	'tm-tt-style' 				=> esc_attr( $_POST['tm-tt-style'] ) ,
	'tm-tt-size' 				=> $size = (esc_attr( $_POST['tm-tt-size'] ) == "" ? '27' : esc_attr( $_POST['tm-tt-size'] )) ,	
	'tm-tt-lheight' 			=> esc_attr( $_POST['tm-tt-lheight'] ) ,	
	'tm-tt-color' 				=> esc_attr( $_POST['color_picker_color-16'] ) ,	
	
	/* Work List title */
	'workl-title-font' 				=> $title = (esc_attr( $_POST['workl-title-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['workl-title-font'] )) , 
	'workl-title-weight' 			=> esc_attr( $_POST['workl-title-weight'] ) ,
	'workl-title-style' 			=> esc_attr( $_POST['workl-title-style'] ) ,
	'workl-title-size' 				=> $size = (esc_attr( $_POST['workl-title-size'] ) == "" ? '23' : esc_attr( $_POST['workl-title-size'] )) ,	
	'workl-title-lheight' 			=> esc_attr( $_POST['workl-title-lheight'] ) ,	
	'workl-title-color' 			=> esc_attr( $_POST['color_picker_color-17'] ) ,	
	
	/* Work List subtitle */
	'workl-subtitle-font' 			=> $title = (esc_attr( $_POST['workl-subtitle-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['workl-subtitle-font'] )) , 
	'workl-subtitle-weight' 		=> esc_attr( $_POST['workl-subtitle-weight'] ) ,
	'workl-subtitle-style' 			=> esc_attr( $_POST['workl-subtitle-style'] ) ,
	'workl-subtitle-size' 			=> $size = (esc_attr( $_POST['workl-subtitle-size'] ) == "" ? '20' : esc_attr( $_POST['workl-subtitle-size'] )) ,	
	'workl-subtitle-lheight' 		=> esc_attr( $_POST['workl-subtitle-lheight'] ) ,	
	'workl-subtitle-color' 			=> esc_attr( $_POST['color_picker_color-18'] ) ,	
	
	/* Comment Title */
	'comment-font' 					=> $title = (esc_attr( $_POST['comment-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['comment-font'] )) , 
	'comment-weight' 				=> esc_attr( $_POST['comment-weight'] ) ,
	'comment-style' 				=> esc_attr( $_POST['comment-style'] ) ,
	'comment-size' 					=> $size = (esc_attr( $_POST['comment-size'] ) == "" ? '32' : esc_attr( $_POST['comment-size'] )) ,	
	'comment-lheight' 				=> esc_attr( $_POST['comment-lheight'] ) ,	
	'comment-color' 				=> esc_attr( $_POST['color_picker_color-19'] ) ,	
	
	/* Leave a Reply */
	'reply-font' 					=> $title = (esc_attr( $_POST['reply-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['reply-font'] )) , 
	'reply-weight' 					=> esc_attr( $_POST['reply-weight'] ) ,
	'reply-style' 					=> esc_attr( $_POST['reply-style'] ) ,
	'reply-size' 					=> $size = (esc_attr( $_POST['reply-size'] ) == "" ? '27' : esc_attr( $_POST['reply-size'] )) ,	
	'reply-lheight' 				=> esc_attr( $_POST['reply-lheight'] ) ,	
	'reply-color' 					=> esc_attr( $_POST['color_picker_color-20'] ) ,	
	
	/* H1 */
	'h1-font' 						=> $title = (esc_attr( $_POST['h1-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['h1-font'] )) , 
	'h1-weight' 					=> esc_attr( $_POST['h1-weight'] ) ,
	'h1-style' 						=> esc_attr( $_POST['h1-style'] ) ,
	'h1-size' 						=> $size = (esc_attr( $_POST['h1-size'] ) == "" ? '62' : esc_attr( $_POST['h1-size'] )) ,	
	'h1-lheight' 					=> esc_attr( $_POST['h1-lheight'] ) ,	
	'h1-color' 						=> esc_attr( $_POST['color_picker_color-21'] ) ,	
	
	/* H2 */
	'h2-font' 						=> $title = (esc_attr( $_POST['h2-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['h2-font'] )) , 
	'h2-weight' 					=> esc_attr( $_POST['h2-weight'] ) ,
	'h2-style' 						=> esc_attr( $_POST['h2-style'] ) ,
	'h2-size' 						=> $size = (esc_attr( $_POST['h2-size'] ) == "" ? '32' : esc_attr( $_POST['h2-size'] )) ,	
	'h2-lheight' 					=> esc_attr( $_POST['h2-lheight'] ) ,	
	'h2-color' 						=> esc_attr( $_POST['color_picker_color-22'] ) ,	
	
	/* H3 */
	'h3-font' 						=> $title = (esc_attr( $_POST['h3-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['h3-font'] )) , 
	'h3-weight' 					=> esc_attr( $_POST['h3-weight'] ) ,
	'h3-style' 						=> esc_attr( $_POST['h3-style'] ) ,
	'h3-size' 						=> $size = (esc_attr( $_POST['h3-size'] ) == "" ? '27' : esc_attr( $_POST['h3-size'] )) ,	
	'h3-lheight' 					=> esc_attr( $_POST['h3-lheight'] ) ,	
	'h3-color' 						=> esc_attr( $_POST['color_picker_color-23'] ) ,	
	
	/* H4 */
	'h4-font' 						=> $title = (esc_attr( $_POST['h4-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['h4-font'] )) , 
	'h4-weight' 					=> esc_attr( $_POST['h4-weight'] ) ,
	'h4-style' 						=> esc_attr( $_POST['h4-style'] ) ,
	'h4-size' 						=> $size = (esc_attr( $_POST['h4-size'] ) == "" ? '23' : esc_attr( $_POST['h4-size'] )) ,	
	'h4-lheight' 					=> esc_attr( $_POST['h4-lheight'] ) ,	
	'h4-color' 						=> esc_attr( $_POST['color_picker_color-24'] ) ,	
	
	/* H5 */
	'h5-font' 						=> $title = (esc_attr( $_POST['h5-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['h5-font'] )) , 
	'h5-weight' 					=> esc_attr( $_POST['h5-weight'] ) ,
	'h5-style' 						=> esc_attr( $_POST['h5-style'] ) ,
	'h5-size' 						=> $size = (esc_attr( $_POST['h5-size'] ) == "" ? '20' : esc_attr( $_POST['h5-size'] )) ,	
	'h5-lheight' 					=> esc_attr( $_POST['h5-lheight'] ) ,	
	'h5-color' 						=> esc_attr( $_POST['color_picker_color-25'] ) ,	
	
	/* LightBox title */
	'lightbox-font' 				=> $title = (esc_attr( $_POST['lightbox-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['lightbox-font'] )) , 
	'lightbox-weight' 				=> esc_attr( $_POST['lightbox-weight'] ) ,
	'lightbox-style' 				=> esc_attr( $_POST['lightbox-style'] ) ,
	'lightbox-size' 				=> $size = (esc_attr( $_POST['lightbox-size'] ) == "" ? '12' : esc_attr( $_POST['lightbox-size'] )) ,	
	'lightbox-lheight' 				=> esc_attr( $_POST['lightbox-lheight'] ) ,	
	'lightbox-color' 				=> esc_attr( $_POST['color_picker_color-26'] ) ,	
	
	/* Footer Font */
	'footer-font' 					=> $title = (esc_attr( $_POST['footer-font'] ) == "Use Default Font" ? $theme_style[$cuckoo_settings['theme-style']]['theme_font'] : esc_attr( $_POST['footer-font'] )) , 
	'footer-weight' 				=> esc_attr( $_POST['footer-weight'] ) ,
	'footer-style' 					=> esc_attr( $_POST['footer-style'] ) ,
	'footer-size' 					=> $size = (esc_attr( $_POST['footer-size'] ) == "" ? '12' : esc_attr( $_POST['footer-size'] )) ,	
	'footer-lheight' 				=> esc_attr( $_POST['footer-lheight'] ) ,	
	'footer-color' 					=> esc_attr( $_POST['color_picker_color-28'] ) ,
	
	);
	update_option( THEMEPREFIX . "_font_settings" , $cuckoo_font );
	?>
		<div id="save_upadate" class="updated"><?php _e('New settings saved!', THEMENAME); ?></div>
	<?php
	}
	if(isset($_REQUEST['restore'])){
		/* Deleted old settings */
		delete_option( THEMEPREFIX . "_font_settings" );
		/* Updated new fonts */
		update_option( THEMEPREFIX . "_font_settings" , $theme_style[$cuckoo_settings['theme-style']]['font_page'] );
		?>
			<div id="save_upadate" class="updated"><?php _e('New settings saved!', THEMENAME); ?></div>
		<?php
	}
	$cuckoo_font = get_option( THEMEPREFIX . "_font_settings" );
	?>
		<?php cuckoo_framework_head( __('Theme Fonts', THEMENAME) ); ?>
		<form id="formId" method="POST" action="">
			<div id="general_settings">
				<div class="active_settings" style="display: block; border-top:0;">
					<div class="section_settings" style="color: #999999; border-bottom:4px solid #D6D6D6;">
						<?php _e('CuckooTap theme provides you with +500 custom fonts from Google.<br /> 
								You can also change a color for each font if needed.<br />
								Click Reset to Default Settings button to restore default font settings.', THEMENAME); ?>
					</div>
				</div>
				<div class="general_title_active">
					<span class="float_left"><?php _e('Custom Fonts', THEMENAME); ?></span>
					<input id="restore_font" class="active_input float_right" name='restore' style="border:1px solid #227399; color:white; " type="submit" value="<?php _e('Reset to Default Settings', THEMENAME); ?>" />
				</div>
				<div class="active_settings" style="display: block;">	
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Slideshow Title', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="slideshow-title-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['slideshow-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['slideshow-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['slideshow-title-font']) 
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
								<select class="mini_select_first" name="slideshow-title-weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['slideshow-title-weight']) 
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
								<select class="mini_select" name="slideshow-title-style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['slideshow-title-style']) 
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
								<select class="mini_last_select" name="slideshow-title-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['slideshow-title-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="slideshow-title-lheight" value="<?php echo $cuckoo_font['slideshow-title-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-1" value="<?php echo $back = empty($cuckoo_font['slideshow-title-color']) ? '#' : $cuckoo_font['slideshow-title-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-1" style="background-color:<?php echo $cuckoo_font['slideshow-title-color']; ?>; top:-3px; position:relative;" />
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
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Slideshow Subtitle', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="slideshow-subtitle-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['slideshow-subtitle-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['slideshow-subtitle-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['slideshow-subtitle-font']) 
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
								<select class="mini_select_first" name="slideshow-subtitle-weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['slideshow-subtitle-weight']) 
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
								<select class="mini_select" name="slideshow-subtitle-style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['slideshow-subtitle-style']) 
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
								<select class="mini_last_select" name="slideshow-subtitle-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['slideshow-subtitle-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="slideshow-subtitle-lheight" value="<?php echo $cuckoo_font['slideshow-subtitle-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-2" value="<?php echo $back = empty($cuckoo_font['slideshow-subtitle-color']) ? '#' : $cuckoo_font['slideshow-subtitle-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-2" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['slideshow-subtitle-color']; ?>" />
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
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Post, Work & Page Title', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="pwp-title-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['pwp-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['pwp-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['pwp-title-font']) 
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
								<select class="mini_select_first" name="pwp-title-weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['pwp-title-weight']) 
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
								<select class="mini_select" name="pwp-title-style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['pwp-title-style']) 
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
								<select class="mini_last_select" name="pwp-title-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['pwp-title-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="pwp-title-lheight" value="<?php echo $cuckoo_font['pwp-title-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-3" value="<?php echo $back = empty($cuckoo_font['pwp-title-color']) ? '#' : $cuckoo_font['pwp-title-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-3" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['pwp-title-color']; ?>" />
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
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Post, Work & Page Subtitle Line', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="pwp-subtitle-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['pwp-subtitle-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['pwp-subtitle-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['pwp-subtitle-font']) 
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
								<select class="mini_select_first" name="pwp-subtitle-weight">
									<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['pwp-subtitle-weight']) 
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
								<select class="mini_select" name="pwp-subtitle-style">
									<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['pwp-subtitle-style']) 
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
								<select class="mini_last_select" name="pwp-subtitle-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=50; $i++) :
											if ($cuckoo_font['pwp-subtitle-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="pwp-subtitle-lheight" value="<?php echo $cuckoo_font['pwp-subtitle-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-4" value="<?php echo $back = empty($cuckoo_font['pwp-subtitle-color']) ? '#' : $cuckoo_font['pwp-subtitle-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-4" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['pwp-subtitle-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-4" />
								<div id="color_picker_color-4" class="colorPickerMain"></div>
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
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Title of Homepage Builder Unit', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="page-unit-title-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['page-unit-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['page-unit-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['page-unit-title-font']) 
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
								<select class="mini_select_first" name="page-unit-title-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['page-unit-title-weight']) 
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
								<select class="mini_select" name="page-unit-title-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['page-unit-title-style']) 
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
								<select class="mini_last_select" name="page-unit-title-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['page-unit-title-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="page-unit-title-lheight" value="<?php echo $cuckoo_font['page-unit-title-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-5" value="<?php echo $back = empty($cuckoo_font['page-unit-title-color']) ? '#' : $cuckoo_font['page-unit-title-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-5" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['page-unit-title-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-5" />
								<div id="color_picker_color-5" class="colorPickerMain"></div>
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
	<!-- Testimonials & Text Box block -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Font of Text Box and Testimonial Unit', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="text-box-testimonials-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['text-box-testimonials-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['text-box-testimonials-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['text-box-testimonials-font']) 
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
								<select class="mini_select_first" name="text-box-testimonials-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['text-box-testimonials-weight']) 
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
								<select class="mini_select" name="text-box-testimonials-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['text-box-testimonials-style']) 
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
								<select class="mini_last_select" name="text-box-testimonials-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['text-box-testimonials-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="text-box-testimonials-lheight" value="<?php echo $cuckoo_font['text-box-testimonials-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-6" value="<?php echo $back = empty($cuckoo_font['text-box-testimonials-color']) ? '#' : $cuckoo_font['text-box-testimonials-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-6" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['text-box-testimonials-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-6" />
								<div id="color_picker_color-6" class="colorPickerMain"></div>
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
<!-- Testimonials Author -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Testimonial Author', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="testimonial-author-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['testimonial-author-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['testimonial-author-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['testimonial-author-font']) 
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
								<select class="mini_select_first" name="testimonial-author-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['testimonial-author-weight']) 
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
								<select class="mini_select" name="testimonial-author-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['testimonial-author-style']) 
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
								<select class="mini_last_select" name="testimonial-author-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=50; $i++) :
											if ($cuckoo_font['testimonial-author-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="testimonial-author-lheight" value="<?php echo $cuckoo_font['testimonial-author-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-7" value="<?php echo $back = empty($cuckoo_font['testimonial-author-color']) ? '#' : $cuckoo_font['testimonial-author-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-7" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['testimonial-author-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-7" />
								<div id="color_picker_color-7" class="colorPickerMain"></div>
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
	<!-- Menus -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Navigation Menus', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="menus-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['menus-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['menus-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['menus-font']) 
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
								<select class="mini_select_first" name="menus-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['menus-weight']) 
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
								<select class="mini_select" name="menus-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['menus-style']) 
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
								<select class="mini_last_select" name="menus-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['menus-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="menus-lheight" value="<?php echo $cuckoo_font['menus-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-8" value="<?php echo $back = empty($cuckoo_font['menus-color']) ? '#' : $cuckoo_font['menus-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-8" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['menus-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-8" />
								<div id="color_picker_color-8" class="colorPickerMain"></div>
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
	<!-- Menus Dropdown it's new element -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Dropdown Menus', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="menus-dropdown-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['menus-dropdown-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['menus-dropdown-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['menus-dropdown-font']) 
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
								<select class="mini_select_first" name="menus-dropdown-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['menus-dropdown-weight']) 
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
								<select class="mini_select" name="menus-dropdown-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['menus-dropdown-style']) 
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
								<select class="mini_last_select" name="menus-dropdown-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['menus-dropdown-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="menus-dropdown-lheight" value="<?php echo $cuckoo_font['menus-dropdown-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-27" value="<?php echo $back = empty($cuckoo_font['menus-dropdown-color']) ? '#' : $cuckoo_font['menus-dropdown-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-27" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['menus-dropdown-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-27" />
								<div id="color_picker_color-27" class="colorPickerMain"></div>
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
<!-- Buttons Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Button Title Font', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="button-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['button-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['button-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['button-font']) 
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
								<select class="mini_select_first" name="button-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['button-weight']) 
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
								<select class="mini_select" name="button-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['button-style']) 
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
								<select class="mini_last_select" name="button-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['button-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="button-lheight" value="<?php echo $cuckoo_font['button-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-9" value="<?php echo $back = empty($cuckoo_font['button-color']) ? '#' : $cuckoo_font['button-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-9" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['button-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-9" />
								<div id="color_picker_color-9" class="colorPickerMain"></div>
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
<!-- Body -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Body Font', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="body-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['body-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['body-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['body-font']) 
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
								<select class="mini_select_first" name="body-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['body-weight']) 
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
								<select class="mini_select" name="body-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['body-style']) 
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
								<select class="mini_last_select" name="body-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['body-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="body-lheight" value="<?php echo $cuckoo_font['body-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-10" value="<?php echo $back = empty($cuckoo_font['body-color']) ? '#' : $cuckoo_font['body-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-10" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['body-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-10" />
								<div id="color_picker_color-10" class="colorPickerMain"></div>
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
	<!-- Details -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Post and Work Details Font', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="details-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['details-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['details-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['details-font']) 
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
								<select class="mini_select_first" name="details-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['details-weight']) 
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
								<select class="mini_select" name="details-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['details-style']) 
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
								<select class="mini_last_select" name="details-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['details-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="details-lheight" value="<?php echo $cuckoo_font['details-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-11" value="<?php echo $back = empty($cuckoo_font['details-color']) ? '#' : $cuckoo_font['details-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-11" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['details-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-11" />
								<div id="color_picker_color-11" class="colorPickerMain"></div>
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
	<!-- Alerts -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Alerts Font', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="alerts-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['alerts-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['alerts-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['alerts-font']) 
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
								<select class="mini_select_first" name="alerts-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['alerts-weight']) 
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
								<select class="mini_select" name="alerts-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['alerts-style']) 
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
								<select class="mini_last_select" name="alerts-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['alerts-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="alerts-lheight" value="<?php echo $cuckoo_font['alerts-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-12" value="<?php echo $back = empty($cuckoo_font['alerts-color']) ? '#' : $cuckoo_font['alerts-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-12" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['alerts-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-12" />
								<div id="color_picker_color-12" class="colorPickerMain"></div>
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
<!-- Post And Team List Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Blog Post and Team Member Title', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="ptl-title-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['ptl-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['ptl-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['ptl-title-font']) 
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
								<select class="mini_select_first" name="ptl-title-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['ptl-title-weight']) 
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
								<select class="mini_select" name="ptl-title-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['ptl-title-style']) 
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
								<select class="mini_last_select" name="ptl-title-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['ptl-title-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="ptl-title-lheight" value="<?php echo $cuckoo_font['ptl-title-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-13" value="<?php echo $back = empty($cuckoo_font['ptl-title-color']) ? '#' : $cuckoo_font['ptl-title-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-13" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['ptl-title-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-13" />
								<div id="color_picker_color-13" class="colorPickerMain"></div>
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
<!-- Team Members Occupation -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e("Team Member's Occupation Title", THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="occupation-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['occupation-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['occupation-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['occupation-font']) 
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
								<select class="mini_select_first" name="occupation-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['occupation-weight']) 
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
								<select class="mini_select" name="occupation-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['occupation-style']) 
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
								<select class="mini_last_select" name="occupation-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['occupation-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="occupation-lheight" value="<?php echo $cuckoo_font['occupation-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-14" value="<?php echo $back = empty($cuckoo_font['occupation-color']) ? '#' : $cuckoo_font['occupation-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-14" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['occupation-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-14" />
								<div id="color_picker_color-14" class="colorPickerMain"></div>
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
<!-- Team & Testimonials Content Text -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Team & Testimonial Body Font', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="tt-content-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['tt-content-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['tt-content-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['tt-content-font']) 
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
								<select class="mini_select_first" name="tt-content-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['tt-content-weight']) 
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
								<select class="mini_select" name="tt-content-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['tt-content-style']) 
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
								<select class="mini_last_select" name="tt-content-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['tt-content-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="tt-content-lheight" value="<?php echo $cuckoo_font['tt-content-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-15" value="<?php echo $back = empty($cuckoo_font['tt-content-color']) ? '#' : $cuckoo_font['tt-content-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-15" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['tt-content-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-15" />
								<div id="color_picker_color-15" class="colorPickerMain"></div>
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
<!-- Team Follow & Post Tags & testimonials company -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Post Tags, Team Member "Follow Me", Testimonial "Company Name"', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="tm-tt-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['tm-tt-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['tm-tt-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['tm-tt-font']) 
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
								<select class="mini_select_first" name="tm-tt-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['tm-tt-weight']) 
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
								<select class="mini_select" name="tm-tt-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['tm-tt-style']) 
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
								<select class="mini_last_select" name="tm-tt-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['tm-tt-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="tm-tt-lheight" value="<?php echo $cuckoo_font['tm-tt-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-16" value="<?php echo $back = empty($cuckoo_font['tm-tt-color']) ? '#' : $cuckoo_font['tm-tt-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-16" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['tm-tt-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-16" />
								<div id="color_picker_color-16" class="colorPickerMain"></div>
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
<!-- Work list Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Work Thumbnail Title', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="workl-title-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['workl-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['workl-title-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['workl-title-font']) 
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
								<select class="mini_select_first" name="workl-title-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['workl-title-weight']) 
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
								<select class="mini_select" name="workl-title-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['workl-title-style']) 
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
								<select class="mini_last_select" name="workl-title-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['workl-title-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="workl-title-lheight" value="<?php echo $cuckoo_font['workl-title-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-17" value="<?php echo $back = empty($cuckoo_font['workl-title-color']) ? '#' : $cuckoo_font['workl-title-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-17" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['workl-title-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-17" />
								<div id="color_picker_color-17" class="colorPickerMain"></div>
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
<!-- Work list Subtitle -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Work Thumbnail Subtitle (Work Type)', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="workl-subtitle-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['workl-subtitle-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['workl-subtitle-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['workl-subtitle-font']) 
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
								<select class="mini_select_first" name="workl-subtitle-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['workl-subtitle-weight']) 
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
								<select class="mini_select" name="workl-subtitle-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['workl-subtitle-style']) 
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
								<select class="mini_last_select" name="workl-subtitle-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['workl-subtitle-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="workl-subtitle-lheight" value="<?php echo $cuckoo_font['workl-subtitle-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-18" value="<?php echo $back = empty($cuckoo_font['workl-subtitle-color']) ? '#' : $cuckoo_font['workl-subtitle-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-18" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['workl-subtitle-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-18" />
								<div id="color_picker_color-18" class="colorPickerMain"></div>
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
<!-- Comment Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Comments Unit Title', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="comment-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['comment-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['comment-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['comment-font']) 
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
								<select class="mini_select_first" name="comment-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['comment-weight']) 
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
								<select class="mini_select" name="comment-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['comment-style']) 
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
								<select class="mini_last_select" name="comment-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['comment-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="comment-lheight" value="<?php echo $cuckoo_font['comment-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-19" value="<?php echo $back = empty($cuckoo_font['comment-color']) ? '#' : $cuckoo_font['comment-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-19" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['comment-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-19" />
								<div id="color_picker_color-19" class="colorPickerMain"></div>
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
<!-- Leave a reply Title -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Reply Unit Title', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="reply-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['reply-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['reply-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['reply-font']) 
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
								<select class="mini_select_first" name="reply-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['reply-weight']) 
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
								<select class="mini_select" name="reply-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['reply-style']) 
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
								<select class="mini_last_select" name="reply-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['reply-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="reply-lheight" value="<?php echo $cuckoo_font['reply-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-20" value="<?php echo $back = empty($cuckoo_font['reply-color']) ? '#' : $cuckoo_font['reply-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-20" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['reply-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-20" />
								<div id="color_picker_color-20" class="colorPickerMain"></div>
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
	<!-- h1 -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Header 1', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="h1-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['h1-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['h1-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['h1-font']) 
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
								<select class="mini_select_first" name="h1-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['h1-weight']) 
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
								<select class="mini_select" name="h1-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['h1-style']) 
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
								<select class="mini_last_select" name="h1-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['h1-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="h1-lheight" value="<?php echo $cuckoo_font['h1-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-21" value="<?php echo $back = empty($cuckoo_font['h1-color']) ? '#' : $cuckoo_font['h1-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-21" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['h1-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-21" />
								<div id="color_picker_color-21" class="colorPickerMain"></div>
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
		<!-- h2 -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Header 2', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="h2-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['h2-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['h2-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['h2-font']) 
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
								<select class="mini_select_first" name="h2-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['h2-weight']) 
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
								<select class="mini_select" name="h2-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['h2-style']) 
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
								<select class="mini_last_select" name="h2-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['h2-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="h2-lheight" value="<?php echo $cuckoo_font['h2-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-22" value="<?php echo $back = empty($cuckoo_font['h2-color']) ? '#' : $cuckoo_font['h2-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-22" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['h2-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-22" />
								<div id="color_picker_color-22" class="colorPickerMain"></div>
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
		<!-- h3 -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Header 3', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="h3-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['h3-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['h3-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['h3-font']) 
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
								<select class="mini_select_first" name="h3-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['h3-weight']) 
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
								<select class="mini_select" name="h3-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['h3-style']) 
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
								<select class="mini_last_select" name="h3-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['h3-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="h3-lheight" value="<?php echo $cuckoo_font['h3-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-23" value="<?php echo $back = empty($cuckoo_font['h3-color']) ? '#' : $cuckoo_font['h3-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-23" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['h3-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-23" />
								<div id="color_picker_color-23" class="colorPickerMain"></div>
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
		<!-- h4 -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Header 4', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="h4-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['h4-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['h4-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['h4-font']) 
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
								<select class="mini_select_first" name="h4-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['h4-weight']) 
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
								<select class="mini_select" name="h4-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['h4-style']) 
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
								<select class="mini_last_select" name="h4-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['h4-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="h4-lheight" value="<?php echo $cuckoo_font['h4-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-24" value="<?php echo $back = empty($cuckoo_font['h4-color']) ? '#' : $cuckoo_font['h4-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-24" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['h4-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-24" />
								<div id="color_picker_color-24" class="colorPickerMain"></div>
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
		<!-- h5 -->
					<div class="section_settings">
						<div class="settings_left_title">
							<?php _e('Header 5', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="h5-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['h5-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['h5-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['h5-font']) 
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
								<select class="mini_select_first" name="h5-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['h5-weight']) 
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
								<select class="mini_select" name="h5-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['h5-style']) 
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
								<select class="mini_last_select" name="h5-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['h5-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="h5-lheight" value="<?php echo $cuckoo_font['h5-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-25" value="<?php echo $back = empty($cuckoo_font['h5-color']) ? '#' : $cuckoo_font['h5-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-25" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['h5-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-25" />
								<div id="color_picker_color-25" class="colorPickerMain"></div>
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
		<!-- Ligth Box -->
					<div class="section_settings" style="border-bottom:0;">
						<div class="settings_left_title">
							<?php _e('Lightbox Title Font', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="lightbox-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['lightbox-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['lightbox-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['lightbox-font']) 
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
								<select class="mini_select_first" name="lightbox-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['lightbox-weight']) 
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
								<select class="mini_select" name="lightbox-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['lightbox-style']) 
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
								<select class="mini_last_select" name="lightbox-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['lightbox-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="lightbox-lheight" value="<?php echo $cuckoo_font['lightbox-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-26" value="<?php echo $back = empty($cuckoo_font['lightbox-color']) ? '#' : $cuckoo_font['lightbox-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-26" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['lightbox-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-26" />
								<div id="color_picker_color-26" class="colorPickerMain"></div>
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
			<!-- Footer  -->
					<div class="section_settings" style="border-bottom:0;">
						<div class="settings_left_title">
							<?php _e('Footer Font', THEMENAME); ?>
						</div>
						<div class="settings_left">
							<div class="font_description">
								<?php _e('Font Family', THEMENAME); ?>
							</div>
							<select class="font_select" name="footer-font">
								<?php
								foreach ($default_array as $k=>$v) {
									if ($v == $cuckoo_font['footer-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Flat It Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($flatIt_array as $k=>$v) {
									if ($v == $cuckoo_font['footer-font']) 
										echo '<option value="' . $v . '" selected>' . $v . '</option>\n'; 
									else
										echo '<option value="' . $v . '">' . $v . '</option>\n'; 
								}
								echo '<option value="" disabled="disabled" >----</option>';
								echo '<option value="" disabled="disabled" class="option_title_dis">Google Font Family</option>';
								echo '<option value="" disabled="disabled" >----</option>';
								foreach ($google_array as $k=>$v) {
									if ($v == $cuckoo_font['footer-font']) 
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
								<select class="mini_select_first" name="footer-weight">
								<?php
									foreach ($font_weight as $k=>$v) {
										if ($k == $cuckoo_font['footer-weight']) 
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
								<select class="mini_select" name="footer-style">
								<?php
									foreach ($font_style as $k=>$v) {
										if ($k == $cuckoo_font['footer-style']) 
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
								<select class="mini_last_select" name="footer-size">
									<?php
											echo "<option value=''>Default</option>\n";
										for($i=3; $i<=150; $i++) :
											if ($cuckoo_font['footer-size'] == $i ) :
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
								<input class="mini_select-input" type="text" name="footer-lheight" value="<?php echo $cuckoo_font['footer-lheight'] ?>">
							</div>
							<div class="fonts_attr_bottom" style="margin-right: -4px;">
								<div class="font_description_mini">
									<?php _e('Font Color', THEMENAME); ?>
								</div>				
								<input type="text" id="color-28" value="<?php echo $back = empty($cuckoo_font['footer-color']) ? '#' : $cuckoo_font['footer-color']; ?>" class="colorInput mini_select-input-color" name="color_picker_color-28" style="top:-3px; position:relative; background-color:<?php echo $cuckoo_font['footer-color']; ?>" />
								<input type="button" value="Select a Color" class="selectPicker select-color-btn btn-plus-class last" id="colorPicker-28" />
								<div id="color_picker_color-28" class="colorPickerMain"></div>
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
			</div>
			<p style="display:inline;">
				<input class="active_input" name='all' style="margin-right:20px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " type="submit" value="Save" />
			</p>
			<?php cuckoo_framework_footer(); ?>
		</form>
	</section>
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
** Name : Tab shortcode
*/
function shortcode_slideshow($atts, $content = null) {
	extract(shortcode_atts(array(
		'id' => '1',
		'effect' => 'random',
		'pausetime' => '6000',
		'pauseonhover' => 'true',
		'animspeed' => '1000',
		'width'	=> '100%',
		'boxcols' => '8',
		'boxrows' => '4',
		'controlnav' => 'true',
		'directionnavhide' => 'false',
		'directionnav' => 'false',
		'align' => 'center'
    ), $atts));
	
	switch($align){
		case 'left':
			$align = 'alignleft';
		break;
		case 'right':
			$align = 'alignright';
		break;
		case 'center':
			$align = 'aligncenter';
		break;		
		case 'firstright':
			$align = 'alignfirstright';
		break;		
		case 'lastright':
			$align = 'alignlastright';
		break;		
		case 'firstleft':
			$align = 'alignfirstleft';
		break;		
		case 'lastleft':
			$align = 'alignlastleft';
		break;		
		case 'top':
			$align = 'aligntop';
		break;		
		case 'bottom':
			$align = 'alignbottom';
		break;
		default :
			$align = 'alignnone';
		break;
	}
	
	$pauseonhover = $pauseonhover == 'true' ? $pauseonhover : 'false';
	$controlnav = $controlnav == 'true' ? $controlnav : 'false';
	$directionnavhide = $directionnavhide == 'false' ? $directionnavhide : 'true';
	$style = 'style="width:'.$width.';"';
	$pageId = get_the_ID();
	$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
	if( $cuckoo_settings['theme-style'] == 'dark' ){
		$preoladColor = '#fff';
	}else{
		$preoladColor = '#000';
	}
	
	$slide_content = "";
	$slide_content .= '<div '.$style.' class="gallery-shortcode '.$align.'">';
	$slide_content .= '<script type="text/javascript">';
	$slide_content .= 'jQuery(document).ready(function(){ 
		jQuery("#slide-short-id-'.$id.'").css("height", (jQuery("#slide-short-id-'.$id.' img").first().height()) ); 
		var opts = {
			lines: 11,
			length: 3, 
			width: 4,
			radius: 9,
			corners: 1, 
			rotate: 0, 
			color: "'.$preoladColor.'",  
			speed: 1.3, 
			trail: 81,
			shadow: false,
			hwaccel: false,
			className: "spinner",
			zIndex: 2e9, 
			top: "auto",
			left: "auto" 
		};
		var Preloader = document.getElementById("preload-shortcode-'.$id.'-'.$pageId.'"),
			spinner = new Spinner(opts).spin(Preloader);
		});';
	$slide_content .= 'jQuery(window).load(function() {';
	$slide_content .= 'jQuery("#slide-short-id-'.$id.'").nivoSlider({';
		$slide_content .= ' effect: "' .$effect. '",';
		$slide_content .= '	pauseOnHover: ' .$pauseonhover. ',';
		$slide_content .= '	heightAuto: true, ';
		$slide_content .= ' animSpeed: '. $animspeed .',';
		$slide_content .= ' pauseTime: '. $pausetime .',';
		$slide_content .= '	boxCols: '. $boxcols .','; 
		$slide_content .= ' boxRows: '. $boxrows .',';
		$slide_content .= '	controlNav: '. $controlnav .',';
		$slide_content .= ' directionNavHide: '. $directionnavhide .',';
		$slide_content .= '	directionNav : '. $directionnav .',';
		$slide_content .= '	prevText: "",'; 
		$slide_content .= '	nextText: "",';
		$slide_content .= ' afterLoad: function(){ ';
		$slide_content .= ' jQuery(".slidePreloadImgGalleries").fadeOut(800);';
		$slide_content .= '	} ';
	$slide_content .= '	}); ';
	$slide_content .= '	var total = jQuery("#slide-short-id-'.$id.' img").length; ';
	$slide_content .= ' if( total <= 2 ){ ';
		$slide_content .= ' jQuery("#slide-short-id-'.$id.'").find(".nivo-controlNav").css("display", "none"); ';
		$slide_content .= '	jQuery(".slide-short").data("nivoslider").stop(); ';
	$slide_content .= '	}else{ ';
		$slide_content .= '	jQuery(".gallery-shortcode").addClass("gallery-format-not-one"); ';
	$slide_content .= '	} ';
	$slide_content .= ' }); ';
	$slide_content .= ' </script> ';
	$slide_content .= '	<article class="slideshow-content-shortcode"> ';
	$slide_content .= '	<div id="slide-short-id-'.$id.'" class="slide-short">'. do_shortcode($content) .'</div>';
	$slide_content .= ' <div class="slidePreloadImgGalleries"> ';
	$slide_content .= ' <div id="preload-shortcode-'.$id.'-'.$pageId.'" class="preloader-short"></div> ';
	$slide_content .= ' <div class="circle_preload"></div> ';
	$slide_content .= ' </div> ';
	$slide_content .= ' </article> ';
	$slide_content .= ' </div> ';
	
	return $slide_content;
}
add_shortcode('slide', 'shortcode_slideshow');

function shortcode_slideshow_image($atts, $content=null) {
	extract(shortcode_atts(array(
		'url' => '',
		'title' => '',
		'group' => 'gallery'
    ), $atts));
	
	$image = "";
	$image .= '<a class="titan-lb" data-titan-lightbox="on" data-titan-group="shortcode-'.$group.'" href="'. cuckoo_get_attachment_all_size($url) .'" title="'. $title .'">';
	$image .= '<img alt="'. $title .'" title="' .$title. '" src="'.cuckoo_get_attachment_all_size($url).'">';
	$image .= '</a>';
	
	return $image;
}
add_shortcode('slideimg', 'shortcode_slideshow_image');
?>
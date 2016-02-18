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
** Name : video shortcode
*/
function shortcode_video($atts, $content = null) {
	$id = $atts['id'];
	$width = isset($atts['width']) ? $atts['width'] : "100%";
	$video_code = getVideoCode($id);
	$code = "";
	switch(isset($atts["align"]) ? $atts["align"] : ''){
		case 'left':
			$align = 'alignleft';
		break;
		case 'right':
			$align = 'alignright';
		break;
		case 'center':
			$align = 'aligncenter';
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

	if(is_youtube($id)) {
		$code = '<div class="iframe_video ' .$align. '" style="width:'.$width.';"><iframe class="shortcode_map" src="http://www.youtube.com/embed/'.$video_code.'?wmode=transparent"></iframe></div>';
	}
	elseif(is_vimeo($id)) {
		$code = '<div class="iframe_video ' .$align. '" style="width:'.$width.';"><iframe class="shortcode_map" src="http://player.vimeo.com/video/'.$video_code.'?title=0&amp;byline=0&amp;portrait=0"></iframe></div>';
	}
	return $code;
}
add_shortcode("video", "shortcode_video");

function shortcode_video_light($atts, $content = null) {
	$id = $atts['id'];
	$width = isset($atts['width']) ? $atts['width'] : "100%";
	$video_code = getVideoCode($id);
	$lightboxImage = isset($atts['image']) ? $atts['image'] : '' ;
	$lightboxText = isset($atts['text']) ? $atts['text'] : '' ;
	$title = isset($atts['title']) ? $atts['title'] : '' ;
	$code = "";
	switch(isset($atts["align"]) ? $atts["align"] : ''){
		case 'left':
			$align = 'alignleft';
		break;
		case 'right':
			$align = 'alignright';
		break;
		case 'center':
			$align = 'aligncenter';
		break;
		default :
			$align = 'alignnone';
		break;
	}

	if( $lightboxImage ){
		$code = '<a class="titan-lb '.$align.'" href="'.$id.'" data-titan-lightbox="on" data-titan-width="'.$width.'" data-titan-width="'.$atts['height'].'" title="'. $title .'" ><img src="' .$lightboxImage. '" alt="'.$lightboxText.'"/></a>';
	}else{
		$code = '<a class="titan-lb '.$align.'" href="'.$id.'" data-titan-lightbox="on" data-titan-width="'.$width.'" data-titan-width="'.$atts['height'].'" title="'. $title .'" >'.$lightboxText.'</a>';
	}
	
	return $code;
}
add_shortcode("videolight", "shortcode_video_light");
?>
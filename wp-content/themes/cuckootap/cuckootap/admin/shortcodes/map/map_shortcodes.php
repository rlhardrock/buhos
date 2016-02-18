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
** Name : Google map shortcodes
*/
function shortcode_Maps($atts, $content = null) {
    extract(shortcode_atts(array(
        "width" => '100%',
        "height" => '475px',
        "location" => '',
		"zoom" => '15',
		"language" => ''
    ), $atts));
	$poput = isset( $atts["poput"] ) ? ( $atts["poput"] == 'yes' ? 'A' : 'B' ) : '';
	switch( isset($atts["align"]) ? $atts["align"] : '' ){
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
      return '<iframe class="shortcode_map ' .$align. '" style="width:'.$width.'; height:'.$height.'" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;iwloc=' . $poput . '&amp;hl='. $language .'&amp;q='.$location.'&amp;z='.$zoom.'&amp;ie=UTF8&amp;t=m&amp;output=embed"></iframe>';
}
add_shortcode("map", "shortcode_Maps");

function shortcode_Maps_widget($atts, $content = null) {
    extract(shortcode_atts(array(
		"width"	=> '100%',
        "height" => '400px',
        "location" => '',
		"zoom" => '12',
		"language" => ''
    ), $atts));
	$poput = isset( $atts["poput"] ) ? ( $atts["poput"] == 'yes' ? 'A' : 'B' ) : '';
	switch( isset($atts["align"]) ? $atts["align"] : '' ){
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
      return '<iframe class="'.$align. '" style="width:'.$width.'; height:'.$height.'" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;iwloc=' . $poput . '&amp;hl='. $language .'&amp;q='.$location.'&amp;z='.$zoom.'&amp;ie=UTF8&amp;t=m&amp;output=embed"></iframe>';
}
add_shortcode("map_widget", "shortcode_Maps_widget");

function shortcode_Maps_background($atts, $content = null) {
    extract(shortcode_atts(array(
		"width"	=> '100%',
        "height" => '400px',
        "location" => '',
		"zoom" => '12',
		"language" => ''
    ), $atts));
	$poput = isset( $atts["poput"] ) ? ( $atts["poput"] == 'yes' ? 'A' : 'B' ) : '';
      return '<iframe class="map-baqckground" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;iwloc=' . $poput . '&amp;hl='. $language .'&amp;q='.$location.'&amp;z='.$zoom.'&amp;ie=UTF8&amp;t=m&amp;output=embed"></iframe>';
}
add_shortcode("map_b", "shortcode_Maps_background");

function shortcode_Maps_light($atts, $content = null) {
    extract(shortcode_atts(array(
        "width" => '100%',
        "height" => '475px',
        "location" => '',
		"zoom" => '15',
		"language" => '',
		"image" => '',
		"text" => '',
		"title" => ''
    ), $atts));
	$poput = isset( $atts["poput"] ) ? ( $atts["poput"] == 'yes' ? 'A' : 'B' ) : '';
	switch( isset($atts["align"]) ? $atts["align"] : '' ){
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
	$url = 'http://maps.google.com/maps?f=q&amp;source=s_q&amp;iwloc=' . $poput . '&amp;hl='. $language .'&amp;q='.$location.'&amp;z='.$zoom.'&amp;ie=UTF8&amp;t=m&amp;output=embed';
    $code = "";
	if( $image ){
		$code =  '<a class="titan-lb '.$align.'" href="'.$url.'" data-titan-lightbox="on" data-titan-width="'.$width.'" data-titan-width="'.$height.'" title="'. $title .'"><img src="' .$image. '" alt="'.$text.'"/></a>';
	}else{
		$code =  '<a class="titan-lb" href="'.$url.'" data-titan-lightbox="on" data-titan-width="'.$width.'" data-titan-width="'.$height.'" title="'. $title .'">'.$text.'</a>';
	}
	return $code;
}
add_shortcode("maplight", "shortcode_Maps_light");
?>
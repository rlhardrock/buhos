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
*
*/
// Container
function shortcode_pricing($atts, $content = null) {
	$table = '<div class="pricing-table">'. do_shortcode($content) .'</div>';
	return $table;
}
add_shortcode('pri-table', 'shortcode_pricing');

// Header
function shortcode_pricing_header($atts, $content=null) {
	extract(shortcode_atts(array(
		'title' 		=> '',
		'titlecolor' 	=> '',
		'background'	=> '',
		'fontsize'		=> ''
    ), $atts));
	
	$background = $background == "" ? "" : 'background-color:'.$background.'!important;';
	$titlecolor = $titlecolor == "" ? "" : 'color:'.$titlecolor.'!important;';
	$fontsize = $fontsize == "" ? "" : 'font-size:'.$fontsize.'!important;';
	
	$style = 'style="'.$background.$titlecolor.$fontsize.'"';
	
	$header ='<div '.$style.' class="pricing-header">'.$title.'</div>';
	return $header;
}
add_shortcode('pri-header', 'shortcode_pricing_header');

//Price
function shortcode_pricing_price($atts, $content=null) {
	extract(shortcode_atts(array(
		'price' 		=> '',
		'titlecolor' 	=> '',
		'background'	=> '',
		'fontsize'		=> '',
		'del_price'		=> '',
		'del_font'		=> ''
    ), $atts));
	
	$background = $background == "" ? "" : 'background-color:'.$background.'!important;';
	$titlecolor = $titlecolor == "" ? "" : 'color:'.$titlecolor.'!important;';
	$fontsize = $fontsize == "" ? "" : 'font-size:'.$fontsize.'!important;';
	
	if($del_price != ""){
		if( $del_font != "" ){
			$del_font = ' style="font-size:'.$del_font.'!important;"';
		}
		$del_price = '<del'.$del_font.'>'.$del_price.'</del>';
	}

	$style = 'style="'.$background.$titlecolor.'"';
	
	$price_content ='<div '.$style.' class="pricing-price">'.$del_price.'<span style="'.$fontsize.'">'.$price.'</span></div>';
	return $price_content;
}
add_shortcode('pri-price', 'shortcode_pricing_price');

// Another Elements Box
function shortcode_pricing_box($atts, $content=null) {
	extract(shortcode_atts(array(
		'title' 		=> '',
		'titlecolor' 	=> '',
		'background'	=> '',
		'fontsize'		=> ''
    ), $atts));
	
	$background = $background == "" ? "" : 'background-color:'.$background.'!important;';
	$titlecolor = $titlecolor == "" ? "" : 'color:'.$titlecolor.'!important;';
	$fontsize = $fontsize == "" ? "" : 'font-size:'.$fontsize.'!important;';
	
	$style = 'style="'.$background.$titlecolor.$fontsize.'"';
	
	$box_content ='<div '.$style.' class="pricing-box">'.$title.'</div>';
	return $box_content;
}
add_shortcode('pri-box', 'shortcode_pricing_box');

// Link Box
function shortcode_pricing_link($atts, $content=null) {
	extract(shortcode_atts(array(
		'title' 		=> '',
		'url'			=> 'http://www.cuckoothemes.com',
		'target'		=> '',
		'titlecolor' 	=> '#ffffff',
		'background'	=> '',
		'fontsize'		=> ''
    ), $atts));
	
	$background = $background == "" ? "" : 'background-color:'.$background.';';
	$titlecolor = $titlecolor == "" ? "" : 'color:'.$titlecolor.'!important;';
	$fontsize = $fontsize == "" ? "" : 'font-size:'.$fontsize.'!important;';
	$target_show = $target == "" ? '' : 'target="'.$target.'"';
	
	$style = 'style="'.$background.$titlecolor.$fontsize.'"';
	
	$link_content ='<a '.$style.' class="pricing-link" href="'.$url.'" '.$target_show.' title="'.$title.'">'.$title.'</a>';
	return $link_content;
}
add_shortcode('pri-link', 'shortcode_pricing_link');
?>
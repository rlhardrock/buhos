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
** Name : Pin In Market
*/
function cuckoo_pinit_create_market($atts) {
	extract(shortcode_atts(array(
		"left"		=> '',
		"top"		=> '',
		"right"		=> '',
		"bottom"	=> ''
    ), $atts));
	
	$left = ($left == null ? '' : 'margin-left:'.$left.';');
	$right = ($right == null ? '' : 'margin-right:'.$right.';');
	$top = ($top == null ? '' : 'margin-top:'.$top.';');
	$bottom = ($bottom == null ? '' : 'margin-bottom:'.$bottom.';');
	$style = "";
	if( $left or $right or $top or $bottom ) {
		$style = 'style="' .$left.$right.$top.$bottom. '"';
	}
	
$code = wptexturize('<div class="social-short" '.$style.'><span class="pinterest-btn"><a href="javascript:exec_pinmarklet();" class="pin-it-btn" title="Pin It on Pinterest"></a></span></div>');
return  $code;
}

add_shortcode('pin-market', 'cuckoo_pinit_create_market');
?>
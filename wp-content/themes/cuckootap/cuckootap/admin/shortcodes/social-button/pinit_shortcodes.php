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
** Name : Pin It shortcode
*/
function cuckoo_pinit_create($atts) {
	extract(shortcode_atts(array(
        'description' => get_the_title(),
        'countbox' => 'none', // none, horizontal, vertical
		'left'	=> '',
		'top'	=> '',
		'right'	=> '',
		'bottom'=> ''
    ), $atts));
	
	$left = ($left == null ? '' :  ' margin-left:'.$left.';');
	$right = ($right == null ? '' : ' margin-right:'.$right.';');
	$top = ($top == null ? '' : ' margin-top:'.$top.';');
	$bottom = ($bottom == null ? '' : ' margin-bottom:'.$bottom.';');
	$style="";
	if( $left or $right or $top or $bottom ) {
		$style = 'style="' .$left.$right.$top.$bottom. '"';
	}
	$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'main-slideshow' );
	$image = $pinterestimage[0];
	$url = urlencode(get_permalink($post->ID));
    $code = '<div class="social-short" '. $style .'><a class="pin-it-button" 
	href="http://pinterest.com/pin/create/button/?url='.$url.'&media='.$image.'&description='.$description.' "  
	count-layout="'.$countbox.'">Pin It</a></div>';


return  $code;
}

add_shortcode('pin-create', 'cuckoo_pinit_create');
?>
<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*
** Name: Facebook Box shortcode
*/
function fb_box( $atts, $content=null ){

    extract(shortcode_atts(array(
            'user' => '',
            'appId' => '',
            'border_color' => '#E2E2E3',
            'background' => '#fff',
            'show_faces' => 'true',
            'show_stream' => 'true',
            'width' => '100%',
            'show_header' => 'true'
    ), $atts));
	
	$fb_like_code = "";
	
	$fb_like_code .= '<div class="cuckoo-fb-shortcode">
				<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId='.$appId.'";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, \'script\', \'facebook-jssdk\'));</script>';

    $fb_like_code .=   '<div class="fb-like-box cuckoo-fb" style="background-color:'. $background .'; width:'. $width .';" data-href="http://www.facebook.com/'. $user .'" data-show-faces="'. $show_faces .'" data-stream="'. $show_stream .'" data-header="'. $show_header .'" data-border-color="'. $border_color .'"></div></div>';
 
    return $fb_like_code;
}
add_shortcode('fb-box', 'fb_box');
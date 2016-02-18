<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*
** Name: Flick Shortcode
*/
function flickr_list( $atts, $content=null ){

    extract(shortcode_atts(array(
            'flickr_id' 		=> '',
			'count' 			=> 10,
			'width' 			=> '100%'
    ), $atts)); 
	
        $flickr_src  = "http://www.flickr.com/badge_code_v2.gne?count=".$count."&amp;display=latest&amp;size=s&amp;layout=y&amp;source=user&amp;user=".$flickr_id;
		
		$flickr = "";
		$flickr .= '<div id="flickr_wrapper" style="width:'. $width .'">
						<script type="text/javascript" src="'. $flickr_src .'"></script>
					</div>';
		return $flickr;	
}
add_shortcode('flickr', 'flickr_list');
?>
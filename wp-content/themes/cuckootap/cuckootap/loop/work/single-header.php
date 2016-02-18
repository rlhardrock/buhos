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
** Name: Single Work Header
*/
$previous = get_previous_post();
$next = get_next_post();
$titleNext = $next == "" ? "" : $next->post_title;
$titlePrew = $previous == "" ? "" : $previous->post_title;
$getURL = "";
$video = cuckoo_get_post_meta(get_the_ID(), "_work_video");
$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );

for( $i = 1; $i <= 10; $i++ )
{
	$images_url = cuckoo_get_post_meta(get_the_ID(), "_upload_image".$i);
	$url = ( $images_url == "Image URL" ) ? "" : $images_url;
	if( $url != null ) : 
		$getURL .= $url;
	endif;	
}


?>
<header id="item-header" class="works-header <?php if(!$video && !$getURL) : ?> padding-bottom-no<?php endif; ?><?php if($cuckoo_style['parallax'] == '1') : ?> parallax-background <?php endif; ?>"<?php if($cuckoo_style['parallax'] == '1') : ?> style="background-attachment:fixed!important;" data-type="background" data-speed="<?php echo $cuckoo_style['parallax-speed']; ?>"<?php endif; ?>>
	<div id="header-position" class="screen-large">
		<div class="title-block">
			<div class="header-prevous">
				<?php previous_post_link('%link', _x('<div class="prev-post-img" title="'.$titlePrew.'"></div>','', THEMENAME)); ?>
			</div>
			<h1><?php the_title(); ?></h1>
			<div class="header-next">
				<?php next_post_link('%link', _x('<div class="next-post-img" title="'.$titleNext.'"></div>','', THEMENAME)); ?>
			</div>
		</div>
		<div class="item-info-block">
			<div class="item-info-line one">
				<span class="item-info-list">
				<?php $categories = wp_get_object_terms( get_the_ID() , "types" );
					$ca ="";
					foreach($categories as $c) {
						$ca .= '<a title="'. $c->name .'" class="type-list" href="'.get_term_link($c->slug, 'types').'" >'. $c->name .'</a><span class="slash-to-element">/</span>';
					}
					echo $ca;
				?>
				</span>
			</div>
		</div>
	</div>
</header>
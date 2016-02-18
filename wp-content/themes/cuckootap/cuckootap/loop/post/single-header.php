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
** Name : Post header
*/
$previous = get_previous_post();
$next = get_next_post();
$titleNext = $next == "" ? "" : $next->post_title;
$titlePrew = $previous == "" ? "" : $previous->post_title;
$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
?>
<header id="item-header" class="works-header padding-bottom-no border-none<?php if($cuckoo_style['parallax'] == '1') : ?> parallax-background <?php endif; ?>"<?php if($cuckoo_style['parallax'] == '1') : ?> style="background-attachment:fixed!important;" data-type="background" data-speed="<?php echo $cuckoo_style['parallax-speed']; ?>"<?php endif; ?>>
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
					<?php cuckoo_posted_on(); ?>
				</span>
			</div>
		</div>
	</div>
</header>
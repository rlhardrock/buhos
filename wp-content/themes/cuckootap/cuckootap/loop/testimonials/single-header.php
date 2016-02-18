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
** Name: Testimonials Header
*/
$previous = get_previous_post();
$next = get_next_post();
$subtitle = cuckoo_get_post_meta(get_the_ID(), "-subtitle-meta-box");
$titleNext = $next == "" ? "" : $next->post_title;
$titlePrew = $previous == "" ? "" : $previous->post_title;
?>
<header id="item-header" class="works-header padding-bottom-no border-none">
	<div id="header-position" class="screen-large">
		<div class="title-block" <?php if(!$subtitle): ?>style="padding-bottom:40px;"<?php endif; ?>>
			<div class="header-prevous">
				<?php previous_post_link('%link', _x('<img src="'.get_template_directory_uri().'/images/slides_arrow_prev.png" title="'.$titlePrew.'" alt="Previous" />','', THEMENAME)); ?>
			</div>
			<h1><?php the_title(); ?></h1>
			<div class="header-next">
				<?php next_post_link('%link', _x('<img src="'.get_template_directory_uri().'/images/slides_arrow_next.png" title="'.$titleNext.'" alt="Next" />','', THEMENAME)); ?>
			</div>
		</div>
		<?php if($subtitle) : ?>
			<div class="item-info-block">
				<div class="item-info-line one">
					<span class="item-info-list">
					<?php echo $subtitle; ?>
					</span>
				</div>
			</div>
		<?php endif; ?>
	</div>
</header>

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
** Name : Member header
*/
$memberName = cuckoo_get_post_meta(get_the_ID(), "_team-member-name");
$memberOccupation = cuckoo_get_post_meta(get_the_ID(), "_team-member-occupation");
$previous = get_previous_post();
$next = get_next_post();
$idNext = $next == "" ? "" : $next->ID;
$idPrew = $previous == "" ? "" : $previous->ID;
?>
<header id="item-header" class="works-header padding-bottom-no border-none">
	<div id="header-position" class="screen-large">
		<div class="title-block" <?php if(!$memberOccupation): ?>style="padding-bottom:40px;"<?php endif; ?>>
			<div class="header-prevous">
				<?php previous_post_link('%link', _x('<div class="prev-post-img" title="'. cuckoo_get_post_meta($idPrew, "_team-member-name") .'"></div>','', THEMENAME)); ?>
			</div>
			<h1><?php echo $memberName; ?></h1>
			<div class="header-next">
				<?php next_post_link('%link', _x('<div class="next-post-img" title="'. cuckoo_get_post_meta($idNext, "_team-member-name") .'"></div>','', THEMENAME)); ?>
			</div>
		</div>
		<?php if($memberOccupation) : ?>
			<div class="item-info-block">
				<div class="item-info-line one">
					<span class="item-info-list">
					<?php echo $memberOccupation; ?>
					</span>
				</div>
			</div>
		<?php endif; ?>
	</div>
</header>
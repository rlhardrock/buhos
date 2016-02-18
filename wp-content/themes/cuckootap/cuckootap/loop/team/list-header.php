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
$memberName = cuckoo_get_post_meta(get_the_ID(), "_team-member-name");
$memberOccupation = cuckoo_get_post_meta(get_the_ID(), "_team-member-occupation");
$memberImage = cuckoo_get_post_meta(get_the_ID(), "_upload_image1");
?>
	<div class="team_header">
		<?php if ( $memberImage ) : ?>
			<div class="team_thumbnail">
				<a class="blog-thumb" href="<?php the_permalink(); ?>" title="<?php echo $memberName; ?>">
					<img width="225" height="225" alt="<?php echo $memberName; ?>" src="<?php echo cuckoo_get_attachment_all_size($memberImage , 'blog-thumb'); ?>" />
					<div class="team_hover_thumb"></div>
					<div class="border-img"></div>
				</a>
			</div>
		<?php endif; ?>
		<div class="member-title">
			<h3><a href="<?php the_permalink(); ?>" title="<?php echo $memberName; ?>" rel="bookmark"><?php echo $memberName; ?></a></h3>	
			<div class="member-occupation"><?php echo $memberOccupation; ?></div>
		</div>
	</div>
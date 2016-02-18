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
** Name: Template Header need to Testimonials, Team, Blog
*/
$subtitle = cuckoo_get_post_meta(get_the_ID(), "-subtitle-meta-box");
$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
?>
<header id="item-header" class="works-header padding-bottom-no border-none<?php if($cuckoo_style['parallax'] == '1') : ?> parallax-background <?php endif; ?>"<?php if($cuckoo_style['parallax'] == '1') : ?> style="background-attachment:fixed!important;" data-type="background" data-speed="<?php echo $cuckoo_style['parallax-speed']; ?>"<?php endif; ?>>
	<div id="header-position" class="screen-large">
		<div class="title-block" <?php if(!$subtitle): ?>style="padding-bottom:40px;"<?php endif; ?>>
			<h1><?php the_title(); ?></h1>
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

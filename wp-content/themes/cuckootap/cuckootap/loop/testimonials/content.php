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
** Name: Single testimonials
*/
?>
<?php
$excerpt = get_the_excerpt();
$company = cuckoo_get_post_meta(get_the_ID(), "_company");
$image_url = cuckoo_get_post_meta(get_the_ID(), "_testimonial_image_url");
$image_title = cuckoo_get_post_meta(get_the_ID(), "_testimonial_image_title");
$site_url = cuckoo_get_post_meta(get_the_ID(), "_testimonial_url_site");
if( $excerpt != '' )
	$excerpts = cuckoo_excerpt_testimonials( $excerpt );
?>
<article id="content-main" role="main">
	<div id="testimonials-content">
		<?php if($image_url) : ?>
		<div class="testimonial-logo">
			<div class="testimonial-image">
				<?php if($site_url): ?>
					<a title="<?php echo $image_title; ?>" href="<?php echo $site_url; ?>"><img title="<?php echo $image_title; ?>" alt="<?php echo $image_title; ?>" src="<?php echo cuckoo_get_attachment_all_size($image_url , 'blog-thumb'); ?>" /></a>
				<?php else : ?>
					<img title="<?php echo $image_title; ?>" alt="<?php echo $image_title; ?>" src="<?php echo cuckoo_get_attachment_all_size($image_url , 'blog-thumb'); ?>" />
				<?php endif; ?>
				<div class="border-img"></div>
			</div>
		</div>
		<?php endif; ?>
		<div class="testimonial-contest">
			<div class="qoute-exp" <?php if(!$company): ?> style="padding-bottom:0;" <?php endif; ?>>
				<div class="text-qoute"></div>
				<div class="testimonial-excerpt">
					<?php echo $excerpts; ?>
				</div>
			</div>
			<?php if($company): ?>
				<div class="test-company">
					<?php echo $company; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</article>
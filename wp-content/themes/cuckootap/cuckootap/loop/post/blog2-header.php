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

$format = get_post_format(); 
if ( false === $format ) :
	$format = 'standard';
endif; 
			
?>
	<div class="post_header">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post_thumbnail_blog2">
				<a class="blog-thumb" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', THEMENAME ), the_title_attribute( 'echo=0' ) ); ?>">
					<?php echo the_post_thumbnail( 'col-3' ,array( 'title' => the_title('', '', false) ) ); ?> 
					<div class="blog-thumb-hover-blog2">
						<?php 
						$format = get_post_format();
						if ( false === $format ) $format = 'standard'; ?>
						<span class="blog-format-<?php echo $format; ?>"></span>
					</div>
					<div class="border-img"></div>
				</a>
			</div>
		<?php endif; ?>
		<div class="post-title">
			<h3><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', THEMENAME ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<div class="format-blog">
				<div title="<?php echo ucwords($format); ?>" class="single-<?php echo $format; ?>"></div>
			</div>
			<div class="about_post">
				<?php cuckoo_posted_on(); ?> | <?php comments_popup_link(__('No Comments', THEMENAME), __('1 Comment',THEMENAME), __('% Comments',THEMENAME)); ?>
			</div>	
		</div>
	</div>
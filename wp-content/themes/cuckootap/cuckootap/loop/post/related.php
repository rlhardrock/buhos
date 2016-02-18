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
** Name: Related works
*/

$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
if( $cuckoo_settings['related_posts'] == "display" ) :
	$post_categories = wp_get_post_categories( get_the_ID() );
	$types = array();
		foreach($post_categories as $c) :  $cat = get_category( $c );
			$types[] = $cat->name;
		endforeach;

		$type_to_show = implode(',', $types);
		$args =  array(
		'category_name' 		=> $type_to_show,
		'post__not_in'			=> array($id),
		'orderby' 				=> 'rand',
		'posts_per_page' 		=> 4,
		'ignore_sticky_posts'	=> 1
		);
		$my_query = new wp_query($args);
		if($my_query->have_posts()):
		?>
		<section id="related-works" class="clearfix related-posts<?php if($cuckoo_style['parallax-related-post'] == '1') : ?> parallax-background <?php endif; ?>"<?php if($cuckoo_style['parallax-related-post'] == '1') : ?> style="background-attachment:fixed!important;" data-type="background" data-speed="<?php echo $cuckoo_style['parallax-speed-related-post']; ?>"<?php endif; ?>>
			<?php if($cuckoo_settings['related_post_title']) : ?>
				<header class="item-header-wrap">
					<div class="item-header screen-large">
						<div class="logo_content">
							<h2 class="logo"><?php cuckoo_echo_for_wpml(THEMENAME.' Related Posts Unit', 'Title', $cuckoo_settings['related_post_title']); ?></h2>
						</div>
						<div class="title-shadow"></div>
					</div>
				</header>
			<?php endif; ?>
			<article class="blog-content screen-large-blog" <?php if(!$cuckoo_settings['related_post_title']) : ?> style="padding-top:40px; margin-top:0" <?php endif; ?>>
				<?php 			
				if ( $my_query->have_posts() ):
				while ( $my_query->have_posts() ) : $my_query->the_post();	?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('blog-list'); ?>>
						<?php get_template_part( "loop/post/blog-header" ); ?>
						<div class="blog-content-text">
							<?php the_excerpt(); ?>
							<div class="reading-more"><a href="<?php  echo get_permalink(); ?>"><?php _e( 'Continue reading', THEMENAME ); ?></a></div>
						</div>
					</article>
				<?php endwhile; ?>
				<?php endif; ?>
			</article>
		</section>
	<?php endif; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>
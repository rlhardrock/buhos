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
** Name: Author
*/
get_header(); 
the_post();
?>
<section id="main-container">
	<header id="item-header" class="works-header padding-bottom-no border-none">
		<div id="header-position" class="screen-large">
			<div class="title-block">
				<h1><?php _e('Blog Post Archives', THEMENAME); ?></h1>
			</div>
			<div class="item-info-block">
				<div class="item-info-line one">
					<span class="item-info-list"><?php printf( __( 'All Posts by %s', THEMENAME ), '' . get_the_author() . '' ); ?></span>
				</div>
			</div>
		</div>
	</header>
	<?php rewind_posts(); ?>
	<?php get_template_part( 'loop/total/socialmedia-search' ); ?>
	<article id="author-list-item" class="blog-content-blog item-list-main screen-large-blog">
		<?php if(have_posts()) :
			while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('blog-list cuckoo-list'); ?>>
					<?php get_template_part( "loop/post/blog-header" ); ?>
					<div class="blog-content-text">
						<?php the_excerpt(); ?>
						<div class="reading-more"><a href="<?php  echo get_permalink(); ?>"><?php _e( 'Continue reading', THEMENAME ); ?></a></div>
					</div>
				</article>
			<?php endwhile; // End the loop. Whew. ?>
		<?php endif; ?>
	</article>
	<?php /* Load More button */ ?>
	<?php get_template_part( 'loop/total/load-more' ); ?>
</section>
<?php rewind_posts(); ?>
<?php get_map_landing(); ?>
<?php get_footer(); ?>
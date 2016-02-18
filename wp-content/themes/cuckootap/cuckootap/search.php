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
** Name: Search
*/
$seperator = ' , ';
$output ;
get_header(); ?>
<section id="main-container">
	<header id="item-header" class="works-header padding-bottom-no border-none">
		<div id="header-position" class="screen-large">
			<div class="title-block">
				<h1><?php _e('Search Results', THEMENAME); ?></h1>
			</div>
			<div class="item-info-block">
				<div class="item-info-line one">
					<span class="item-info-list"><?php printf( __( 'Search Results for: &ldquo;%s&rdquo;', THEMENAME ), '' . get_search_query() . '' ); ?></span>
				</div>
			</div>
		</div>
	</header>
	<?php get_template_part( 'loop/total/socialmedia-search' ); ?>
	<article id="search-list-item" class="blog-content-blog search-content screen-large">
		<?php if(have_posts()) :
			while ( have_posts() ) : the_post(); ?>
				<?php $get_post_types = get_post(get_the_ID()); ?>
				<article id="item-<?php the_ID(); ?>" <?php post_class('search-list cuckoo-list'); ?>>
					<h2 class="search-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', THEMENAME ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<div class="search-content-text">
						<?php if($get_post_types->post_type == 'works') : 
							$categories = wp_get_object_terms( get_the_ID(), "types" ); ?>
							<div class="item-elements"> 
								<?php _e('Posted in ', THEMENAME);
								foreach($categories as $cat) : 
									$output .= '<a class="" href="'. get_tag_link($cat->term_id). '">'. $cat->name .'</a>'. $seperator ;
									endforeach;
								echo trim($output, $seperator); ?>
							</div>
						<?php endif; ?>
						<?php if($get_post_types->post_type == 'post') : ?>
							<?php 
							$format = get_post_format();
							if ( false === $format ) $format = 'standard'; 
							?>
							<div class="item-elements-post">
								<div class="format-blog">
									<div title="<?php echo ucwords($format); ?>" class="single-<?php echo $format; ?>"></div>
								</div>
								<?php cuckoo_posted_on(); ?> | <?php comments_popup_link(__('No Comments', THEMENAME), __('1 Comment',THEMENAME), __('% Comments',THEMENAME)); ?>
							</div>
						<?php endif; ?>
						<?php if($get_post_types->post_type != 'product') : ?>
							<?php the_excerpt(); ?>
						<?php endif; ?>
						<div class="reading-more"><a href="<?php  echo get_permalink(); ?>"><?php _e( 'Continue reading', THEMENAME ); ?></a></div>
					</div>
				</article>
			<?php endwhile; // End the loop. Whew. ?>
		<?php else: ?>
			<?php get_template_part( 'loop/alert/no-search' ); ?>
		<?php endif; ?>
	</article>
	<?php /* Load More button */ ?>
	<?php get_template_part( 'loop/total/load-more' ); ?>
</section>
<?php // rewind_posts(); ?>
<?php get_map_landing(); ?>
<?php get_footer(); ?>
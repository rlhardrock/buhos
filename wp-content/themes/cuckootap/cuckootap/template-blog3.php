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
** Template Name: Blog Full Width Option 1
*/
$cuckoo_contact = get_option(THEMEPREFIX . "_contact_settings"); 

get_header(); ?>
	<section id="main-container">
	<?php	
		/* Post header block: Title, subtitle */
		get_template_part( 'loop/total/template-header' ); 
				
		/* Social Media Icones and Search */
		get_template_part( 'loop/total/socialmedia-search' ); 
		
		if ( !post_password_required() ) : 
			
			/* Post content block: content */
			?>
			<article class="blog-content-blog item-list-main screen-large-blog">
				<?php 
				if ( get_query_var('paged') ) {
					$paged = get_query_var('paged');
				} else if ( get_query_var('page') ) {
					$paged = get_query_var('page');
				} else {
					$paged = 1;
				}

				$args= array(
					'paged' 		=> $paged,
					'post_types' 	=> 'post'
				);
				query_posts($args);
						
				if(have_posts()) :
					while ( have_posts() ) : the_post(); 
						$format = get_post_format(); 
						if ( false === $format ) :
							$format = 'standard';
						endif;
									
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('search-list cuckoo-list'); ?>>
							<div class="post_container full_width_blog">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="post_thumbnail">
										<a class="blog-thumb" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', THEMENAME ), the_title_attribute( 'echo=0' ) ); ?>">
											<?php echo the_post_thumbnail( 'blog-thumb' ,array( 'title' => the_title('', '', false) ) ); ?> 
											<div class="blog-thumb-hover">
												<?php 
												$format = get_post_format();
												if ( false === $format ) $format = 'standard'; ?>
												<span class="blog-format-<?php echo $format; ?>"></span>
											</div>
											<div class="border-img"></div>
										</a>
									</div>
								<?php endif; ?>
								<div class="content-blog-full-width">
									<div class="post-title">
										<h3><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', THEMENAME ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
										<div class="format-blog">
											<div title="<?php echo ucwords($format); ?>" class="single-<?php echo $format; ?>"></div>
										</div>
										<div class="about_post">
											<?php cuckoo_posted_on(); ?> | <?php comments_popup_link(__('No Comments', THEMENAME), __('1 Comment',THEMENAME), __('% Comments',THEMENAME)); ?>
										</div>	
									</div>
									<div class="blog-content-text">
										<?php
										global $more;
											$more = 0;   ?>
										<?php  the_excerpt(); ?>
										<div class="reading-more"><a href="<?php  echo get_permalink(); ?>"><?php _e( 'Continue reading', THEMENAME ); ?></a></div> 
									</div>
								</div>
							</div>
						</article>
					<?php endwhile; // End the loop. Whew. ?>
				<?php endif; ?>
				<?php // wp_reset_query(); ?>
			</article>				
			<?php
			/* Load More button */
			get_template_part( 'loop/total/load-more' ); 
			
		else :
							
			/* If page have password need template */
			get_template_part( 'loop/alert/page-password' ); 
						
		endif;	
		?>
	</section>
<?php get_map_landing(); ?>
<?php get_footer(); ?>
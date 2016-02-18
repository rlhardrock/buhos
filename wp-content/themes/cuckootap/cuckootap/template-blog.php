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
** Template Name: Blog 4 Columns 
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
					while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('blog-list cuckoo-list'); ?>>
							<?php get_template_part( "loop/post/blog-header" ); ?>
							<div class="blog-content-text">
								<?php
								global $more;
									$more = 0;   ?>
								<?php  the_excerpt(); ?>
								<div class="reading-more"><a href="<?php  echo get_permalink(); ?>"><?php _e( 'Continue reading', THEMENAME ); ?></a></div> 
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
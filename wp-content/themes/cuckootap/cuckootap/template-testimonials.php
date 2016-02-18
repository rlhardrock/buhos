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
** Template Name: Testimonials 
*/
get_header(); ?>
	<section id="main-container">
	<?php	
		/* Testimonial header block: Title, subtitle */
		get_template_part( 'loop/total/template-header' ); 
				
		/* Social Media Icones and Search */
		get_template_part( 'loop/total/socialmedia-search' ); 
		
		if ( !post_password_required() ) : 
			
			/* Testimonial content block: image, content, company */
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			
			$args =  array( 
			'paged' 	=> $paged,
			'post_type' => 'testimonials',
			'orderby'	=> 'menu_order date'
			); ?>
			
			<article class="test-content item-list-main screen-large-blog">
			<?php query_posts( $args ); 
			if ( have_posts() ) while ( have_posts() ) : the_post(); 
				$company = cuckoo_get_post_meta(get_the_ID(), "_company");
				$image_url = cuckoo_get_post_meta(get_the_ID(), "_testimonial_image_url");
				$image_title = cuckoo_get_post_meta(get_the_ID(), "_testimonial_image_title");
				$site_url = cuckoo_get_post_meta(get_the_ID(), "_testimonial_url_site");
				$excerpt = get_the_excerpt();
				$excerpt = cuckoo_excerpt_testimonials( $excerpt ); ?>
				<article id="testimonial-<?php the_ID(); ?>" <?php post_class('test-list cuckoo-list'); ?>>
					<?php if ( $image_url ) : ?>
						<div class="test_thumbnail">
							<?php if($site_url) : ?>
								<a class="test-thumb" target="_blank" href="<?php echo $site_url; ?>" title="<?php echo $image_title; ?>">
									<img title="<?php echo $image_title; ?>" src="<?php echo cuckoo_get_attachment_all_size($image_url , 'blog-thumb'); ?>" alt="<?php echo $image_title; ?>" />
									<div class="test-thumb-hover">
										<span class="test-format-quote"></span>
									</div>
									<div class="border-img"></div>
								</a>
							<?php else : ?>
								<img title="<?php echo $image_title; ?>" src="<?php echo cuckoo_get_attachment_all_size($image_url , 'blog-thumb'); ?>" alt="<?php echo $image_title; ?>" />
								<div class="border-img"></div>
							<?php endif ?>
						</div>
					<?php endif; ?>
					<div class="test-title">
						<div class="testimonial-excerpt">
							<?php echo $excerpt; ?>
						</div>
					</div>
					<div class="test_about<?php echo $classmargin = !empty( $company ) ? " margin-company" : ""; ?>">
					<?php if($company): ?>
						<div class="test-quote-list"></div>
						<div class="test-company-list"><?php echo $company; ?></div>
					<?php endif; ?>
					</div>
				</article>
			<?php endwhile; ?>
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
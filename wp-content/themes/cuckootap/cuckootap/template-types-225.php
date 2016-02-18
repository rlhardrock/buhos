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
** Template Name: Portfolio 4 Columns by Work Type
*/

get_header(); ?>
<section id="main-container" class="work-template">
	<?php
		/* Porfolio header block: Title, Types */
		get_template_part( 'loop/work/by-types' , 'header' ); 
		
		if ( !post_password_required() ) : 
				
		/* Portfolio content all images */ ?>
		
		<article id="portfolio" class="clerfix-isotope screen-large-portfolio">
			<?php
			/* the same query need to continue */
			if ( have_posts() ):
				while ( have_posts() ) : the_post();
					$work_id = get_the_ID();
					$post_categories = wp_get_object_terms( $work_id, "types" );
					$video = cuckoo_get_post_meta(get_the_ID(), "_work_video");
					$gallerythumb = "";
					for( $i = 1; $i <= 10; $i++ ){
						$images_url_get = cuckoo_get_post_meta(get_the_ID(), "_upload_image".$i);
						$url = ( $images_url_get == "Image URL" ) ? "" : $images_url_get;
						if( $url ) {
							$gallerythumb .= 1;
						}		
					} 
					$cats ="element ";
					foreach($post_categories as $cat) {
						$cats .= $cat->slug.' ';
					} ?>
					<a class="<?php echo $cats; ?> portfolio-item-225 " href="<?php echo get_permalink(); ?>" title="<?php echo cuckoo_max_trim(the_title('', '', false), 70); ?>">
						<div class="fadeItems">
							<?php if( $video && !has_post_thumbnail()  ) : ?>
								<img class="item-group-0" src="<?php echo getVideoThumbnail($video, "thumbnail_medium"); ?>" width="225" height="225" alt="video" />
							<?php elseif ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'blog-thumb', array( 'title' => '', 'class' => 'item-group-0' ) ); ?>
							<?php elseif( $gallerythumb && !has_post_thumbnail() ): ?>
								<?php for( $i = 1; $i <= 10; $i++ ){
									$images_text = cuckoo_get_post_meta(get_the_ID(), "_upload_text".$i);
									$images_url = cuckoo_get_post_meta(get_the_ID(), "_upload_image".$i);
									$url = ( $images_url == "Image URL" ) ? "" : $images_url;
									$text = ( $images_text == "Add Title" ) ? "" : $images_text;
									if( $url != null ) : ?>
										<img class="item-group-<?php echo $i; ?>" width="225" height="225" alt="<?php echo $text; ?>" src="<?php echo cuckoo_get_attachment_all_size($url , 'blog-thumb'); ?>" />
									<?php endif;	
								} ?>
							<?php else : ?>
								<div class="no-thumbnail-225"></div>
							<?php endif; ?>
						</div>
						<div class="work-info">
							<div class="work-contur">
								<h4 class="work-thumb-title"><?php echo cuckoo_max_trim(the_title('', '', false), 70);  ?></h4>
								<?php $categories = wp_get_object_terms( $work_id, "types" );
								$ca ="";
								foreach($categories as $c) {
									$ca .= '<div class="work-type">'. $c->name .'</div>';
								}
								echo $ca; ?>
							</div>
							<span class="go-in-work"></span>
						</div>
						<div class="border-img"></div>
					</a>
				<?php endwhile; ?>
			<?php else : 
				get_template_part("loop/alert/no-works");
			endif; ?> 
			<?php wp_reset_query(); ?>
		</article>
	<?php else :
							
			/* If page have password need template */
			get_template_part( 'loop/alert/page-password' ); 
						
	endif;	?>
</section>
<?php get_map_landing(); ?>
<?php get_footer(); ?>
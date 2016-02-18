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
** Name: Archives
*/
get_header(); ?>
<section id="main-container">
	<header id="item-header" class="works-header <?php if(!is_tax('types')) : ?> padding-bottom-no border-none <?php else : ?> portfolio-header<?php endif; ?>">
		<div id="header-position" class="screen-large">
			<div class="title-block">
				<h1>
				<?php if(is_tax( 'types' )):
					_e('Works Archive', THEMENAME); 
				else :
					_e('Blog Post Archives', THEMENAME); 
				endif; ?>
				</h1>
			</div>
			<div class="item-info-block">
				<div class="item-info-line one">
					<span class="item-info-list">
						<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: %s', THEMENAME ), get_the_date() ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: %s', THEMENAME ), get_the_date('F Y') ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: %s', THEMENAME ), get_the_date('Y') ); ?>
						<?php elseif ( is_tax( 'types' ) ) : ?>
							<?php printf( __( 'Archives of &ldquo;%s&rdquo; Type', THEMENAME ), '' . single_cat_title( '', false ). '' ); ?>
						<?php endif; ?>
					</span>
				</div>
			</div>
		</div>
	</header>
	<?php rewind_posts(); ?>
	<?php if(!is_tax('types')) : get_template_part( 'loop/total/socialmedia-search' ); endif; ?>
	<article id="archive-list-item" class="item-list-main <?php if(is_tax('types')) : ?>work-content-work screen-large-portfolio<?php else: ?>blog-content-blog screen-large-blog<?php endif; ?>">
		<?php if(have_posts()) :
			while ( have_posts() ) : the_post(); ?>
				<?php if(is_tax( 'types' )) : 
					$work_id = get_the_ID();
					$post_categories = wp_get_object_terms( $work_id, "types" );
					$video = cuckoo_get_post_meta(get_the_ID(), "_work_video");
					$gallerythumb = "";
					for( $i = 1; $i <= 10; $i++ )
					{
						$images_url_get = cuckoo_get_post_meta(get_the_ID(), "_upload_image".$i);
						$url = ( $images_url_get == "Image URL" ) ? "" : $images_url_get;
						if( $url ) {
							$gallerythumb .= 1;
						}		
					} ?>
					<a id="post-<?php the_ID(); ?>" <?php post_class('work-item-225 cuckoo-list'); ?> href="<?php echo get_permalink(); ?>" title="<?php echo cuckoo_max_trim(the_title('', '', false), 70); ?>">
						<div class="fadeItems">
						<?php if( $video && !has_post_thumbnail()  ) : ?>
							<img class="item-group-0" src="<?php echo getVideoThumbnail($video, "thumbnail_medium"); ?>" width="225" height="225" alt="video" />
						<?php elseif ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'blog-thumb', array( 'title' => '', 'class' => 'item-group-0' ) ); ?>
						<?php elseif( $gallerythumb && !has_post_thumbnail() ): ?>
						<?php for( $i = 1; $i <= 10; $i++ )
							{
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
									echo $ca;
								?>
							</div>
							<span class="go-in-work"></span>
						</div>
						<div class="border-img"></div>
					</a>
				<?php else : ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('blog-list cuckoo-list'); ?>>
						<?php get_template_part( "loop/post/blog-header" ); ?>
						<div class="blog-content-text">
							<?php the_excerpt(); ?>
							<div class="reading-more"><a href="<?php  echo get_permalink(); ?>"><?php _e( 'Continue reading', THEMENAME ); ?></a></div>
						</div>
					</article>
				<?php endif; ?>
			<?php endwhile; // End the loop. Whew. ?>
		<?php endif; ?>
	</article>
	<?php /* Load More button */ ?>
	<?php //if(!is_tax('types')) : ?>
		<?php get_template_part( 'loop/total/load-more' ); ?>
	<?php //endif; ?>
</section>
<?php rewind_posts(); ?>
<?php get_map_landing(); ?>
<?php get_footer(); ?>
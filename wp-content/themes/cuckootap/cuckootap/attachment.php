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
** Name: Attachment
*/
$previous = get_previous_post();
$next = get_next_post();
get_header(); ?>
<section id="main-container">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<header id="item-header" class="works-header padding-bottom-no border-none">
		<div id="header-position" class="screen-large">
			<div class="title-block">
				<div class="header-prevous">
					<?php previous_image_link(false, '<img src="'.get_template_directory_uri().'/images/slides_arrow_prev.png" title="'.$previous->post_title.'" alt="Previous" />'); ?>
				</div>
				<h1><?php the_title(); ?></h1>
				<div class="header-next">
					<?php next_image_link(false, '<img src="'.get_template_directory_uri().'/images/slides_arrow_next.png" title="'.$next->post_title.'" alt="Next" />'); ?>
				</div>
			</div>
			<div class="item-info-block">
				<div class="item-info-line one">
					<span class="item-info-list">
					<?php printf( __('Published %2$s', THEMENAME ),
								'meta-prep meta-prep-entry-date',
								sprintf( '<span title="%1$s">%2$s</span>',
									esc_attr( get_the_time() ),
									get_the_date()
								)
							);
							printf(__(' by %2$s', THEMENAME ),
								'meta-prep meta-prep-author',
								sprintf( '<a class="url fn n" href="%1$s" title="%2$s">%3$s</a>',
									get_author_posts_url( get_the_author_meta( 'ID' ) ),
									sprintf( esc_attr__( 'View all posts by %s', THEMENAME ), get_the_author() ),
									get_the_author()
								)
							); 
							?> | <?php twentyten_posted_in(); ?> | <?php edit_post_link( __( 'Edit', THEMENAME ), '', '' ); ?>
					</span>
				</div>
			</div>
		</div>
	</header>
	<?php get_template_part( 'loop/total/socialmedia-search' ); ?>
	<?php /* Comments, Social template */ ?>
	<?php get_template_part( 'loop/total/comments-social-block' ); ?>
	<article id="attachment-<?php the_ID(); ?>" class="attachment-content page-content attachment-padding screen-large">
		<?php if ( wp_attachment_is_image() ) :
			$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
			foreach ( $attachments as $k => $attachment ) {
				if ( $attachment->ID == $post->ID )
					break;
			}
			$k++;
			// If there is more than 1 image attachment in a gallery
			$next_attachment_url = wp_get_attachment_url();
			 ?>
			<a href="<?php echo $next_attachment_url; ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php
				$attachment_size = apply_filters( 'twentyten_attachment_size', 960 );
				echo wp_get_attachment_image( $post->ID, 'post-gallery' ); ?>
			</a>
		<?php else : ?>
			<a href="<?php echo wp_get_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment"><?php echo basename( get_permalink() ); ?></a>
		<?php endif; ?>
	</article>
	<?php comments_template("", true); ?>
	<?php endwhile; // End the loop. Whew. ?>
	<?php endif; ?>
</section>
<?php rewind_posts(); ?>
<?php get_map_landing(); ?>
<?php get_footer(); ?>
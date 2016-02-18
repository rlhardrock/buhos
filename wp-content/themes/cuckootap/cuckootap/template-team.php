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
** Template Name: Team 
*/
get_header(); ?>
	<section id="main-container">
	<?php	
		/* Team header block: Title, subtitle */
		get_template_part( 'loop/total/template-header' ); 
				
		/* Social Media Icones and Search */
		get_template_part( 'loop/total/socialmedia-search' ); 
		
		if ( !post_password_required() ) : 
		
			/* Team content block: image, content, description, name, occupation  */
			?>
			<article class="team-content-team item-list-main screen-large-blog">
				<?php 
				if ( get_query_var('paged') ) {
					$paged = get_query_var('paged');
				} else if ( get_query_var('page') ) {
					$paged = get_query_var('page');
				} else {
					$paged = 1;
				}
				$team_args = array(
					'paged' 			=> $paged,
					'post_type' 		=> 'team',
					'orderby'			=> 'menu_order'
				);
				query_posts($team_args);
								
				if(have_posts()) :
					while ( have_posts() ) : the_post(); 
						$memberDesc = cuckoo_get_post_meta(get_the_ID(), "_member-desc");
						$socialFacebook = cuckoo_get_post_meta(get_the_ID(), "_social-facebook");
						$socialTwitter = cuckoo_get_post_meta(get_the_ID(), "_social-twitter"); 
						$socialGoogle = cuckoo_get_post_meta(get_the_ID(), "_social-google"); 
						$socialFlickr = cuckoo_get_post_meta(get_the_ID(), "_social-flickr"); 
						$socialPinterest = cuckoo_get_post_meta(get_the_ID(), "_social-pinterest"); 
						$socialDribble = cuckoo_get_post_meta(get_the_ID(), "_social-dribble"); 
						$socialInstagram = cuckoo_get_post_meta(get_the_ID(), "_social-instagram");
						$socialBehance = cuckoo_get_post_meta(get_the_ID(), "_social-behance"); 
						$socialYouTube = cuckoo_get_post_meta(get_the_ID(), "_social-youtube"); 
						$socialVimeo = cuckoo_get_post_meta(get_the_ID(), "_social-vimeo"); 
						$socialLinkedin = cuckoo_get_post_meta(get_the_ID(), "_social-linkedin"); 
						$socialEmail = cuckoo_get_post_meta(get_the_ID(), "_social-email"); 
						$socialRss = cuckoo_get_post_meta(get_the_ID(), "_social-rss"); 
						$margin = "";
						if($socialFacebook or $socialTwitter or $socialGoogle or $socialFlickr or $socialPinterest or $socialDribble or 
								$socialBehance or $socialYouTube or $socialVimeo or $socialLinkedin or $socialEmail or $socialRss) :
								$margin = " social-margin";
						endif;
						?>
						<article id="team-<?php the_ID(); ?>" <?php post_class('test-list cuckoo-list'); ?>>
							<?php get_template_part( "loop/team/list-header" ); ?>
							<div class="team-desc-bottom<?php echo $margin; ?>">
								<div class="team-description"><?php echo $memberDesc; ?></div>
								<?php if($socialFacebook): ?>
									<a class="facebook-small" target="_blank" href="http://facebook.com/<?php echo $socialFacebook; ?>" title="Facebook"></a>
								<?php endif; ?>
								<?php if($socialTwitter): ?>
									<a class="twitter-small" target="_blank" href="http://twitter.com/<?php echo $socialTwitter; ?>" title="Twitter"></a>
								<?php endif; ?>									
								<?php if($socialGoogle): ?>
									<a class="google-small" target="_blank" href="https://plus.google.com/<?php echo $socialGoogle; ?>" title="Google+"></a>
								<?php endif; ?>									
								<?php if($socialFlickr): ?>
									<a class="flickr-small" target="_blank" href="http://www.flickr.com/photos/<?php echo $socialFlickr; ?>" title="Flickr"></a>
								<?php endif; ?>	
								<?php if($socialInstagram): ?>
									<a class="instagram-small" target="_blank" href="<?php echo $socialInstagram; ?>" title="Instagram"></a>
								<?php endif; ?>	
								<?php if($socialPinterest): ?>
									<a class="pinterest-small" target="_blank" href="http://pinterest.com/<?php echo $socialPinterest; ?>" title="Pinterest"></a>
								<?php endif; ?>									
								<?php if($socialDribble): ?>
									<a class="dribble-small" target="_blank" href="http://dribble.com/<?php echo $socialDribble; ?>" title="Dribble"></a>
								<?php endif; ?>									
								<?php if($socialBehance): ?>
									<a class="behance-small" target="_blank" href="http://www.behance.net/<?php echo $socialBehance; ?>" title="Behance"></a>
								<?php endif; ?>									
								<?php if($socialYouTube): ?>
									<a class="youtube-small" target="_blank" href="http://www.youtube.com/<?php echo $socialYouTube; ?>" title="YouTube"></a>
								<?php endif; ?>									
								<?php if($socialVimeo): ?>
									<a class="vimeo-small" target="_blank" href="http://vimeo.com/<?php echo $socialVimeo; ?>" title="Vimeo"></a>
								<?php endif; ?>									
								<?php if($socialLinkedin): ?>
									<a class="linkendin-small" target="_blank" href="<?php echo $socialLinkedin; ?>" title="Linkedin"></a>
								<?php endif; ?>									
								<?php if($socialEmail): ?>
									<a class="email-small" href="mailto:<?php echo $socialEmail; ?>" title="Email"></a>
								<?php endif; ?>									
								<?php if($socialRss): ?>
									<a class="rss-small" target="_blank" href="<?php echo $socialRss; ?>" title="RSS"></a>
								<?php endif; ?>
							</div>
						</article>
					<?php endwhile; // End the loop. Whew. ?>
				<?php endif; ?>
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
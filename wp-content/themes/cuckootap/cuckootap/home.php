<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 **************/
$cuckoo_builder = get_option( THEMEPREFIX . "_builder_settings" );
$cuckoo_social = get_option( THEMEPREFIX . "_social_settings" );
$slider_elements = get_option( THEMEPREFIX . "_slidershow_settings" );
 
get_header(); 

/* SlideShow Template */
if( $slider_elements['settings']['homepage_slider'] == 'Nivo Slider' ){
	get_template_part("templates/main_slideshow");
}elseif( $slider_elements['settings']['homepage_slider'] == 'Revolution Slider' ){ ?>
	<div class="revolution_slider_homepage">
		<?php putRevSlider($slider_elements['settings']['rev_alias']); ?>
	</div>
<?php }else{
	get_template_part("templates/main_slideshow");
}
/* woocommerce */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	$wooActive = 1;
}else{
	$wooActive = 0;
}

if(!empty($cuckoo_builder)){
	foreach( $cuckoo_builder as $keys ){
		foreach( $keys as $key=>$content ){
			if(!empty($content)){
				$source 				= ( !empty($content['source']) ? $content['source'] : "" ); 
				$backgroundColor 		= ( !empty($content['backgroundColor']) ? 'background-color:'.$content['backgroundColor'].";" : cuckoo_chrome_parallax() );
				$backgroundImage 		= ( !empty($content['imgUrl']) ? "background-image:url('".$content['imgUrl']."');" : '' );
				$backgroundPosition 	= ( !empty($content['imgPosition']) ? 'background-position:'.$content['imgPosition'].';' : '' );
				$backgroundAttachment 	= ( !empty($content['imgAttachment']) ? 'background-attachment:'.$content['imgAttachment'].';' : '' );
				$backgroundRepeat	 	= ( !empty($content['imgRepeat']) ? 'background-repeat:'.$content['imgRepeat'].';': '' );
				$parallaxSpeed			= ( !empty($content['parallax-speed']) ? $content['parallax-speed'] : 10 );
				$backgroundSize 		= '';
				$backgroundClass 		= '';
				$paralax 				= $content['parallax'];
				if($content['imgRepeat'] == 'no-repeat'){
					$backgroundSize = 'background-size: 100% auto;';
					$backgroundClass = 'background-100';
				}
				if( $backgroundColor && !$backgroundImage ) :
					$backgroundImage = 'background-image:none;';
				endif;
				if(!$backgroundImage or $backgroundImage == 'background-image:none;' ) :
					$backgroundPosition = ''; $backgroundAttachment = ''; $backgroundRepeat = '';
				endif;
				if($paralax == 1) :
					$style = 'style="' . $backgroundColor . $backgroundImage . $backgroundRepeat . $backgroundSize . ' background-attachment:fixed" data-type="background" data-speed="'.$parallaxSpeed.'"';
				else :
					$style = 'style="' . $backgroundColor . $backgroundImage . $backgroundPosition . $backgroundAttachment . $backgroundRepeat . '"';
				endif;
				/* Testimonials  */
				if($source == 'Testimonials'){
				/* Preloader Image */
				 if( !$backgroundColor && !$backgroundImage ) : 
					$pre_style = 'style="background:url('. get_template_directory_uri() .'/images/slideshow_background.gif) repeat scroll 0 0 transparent;"';
				else :
					$pre_style = $style;
				endif; ?>
				<?php /* Slug - Since verson 1.7 */ 
					
				?>
				<section id="<?php echo $slug = $content['slug'] == '' ? make_ID_in_text($content['title']) : make_ID_in_text($content['slug']); ?>" class="testimonials-wrap clearfix parallax-background <?php echo $backgroundClass; ?>" <?php echo $style; ?>>
					<?php if( !$backgroundColor && !$backgroundImage ) : ?>
						<div class="testimonials-shadow"></div>
					<?php endif; ?>
					<div class="next-testimonial"></div>
					<article class="testimonials-content screen-large">
						<?php 
						$args =  array( 
						'post_type' => 'testimonials',
						'posts_per_page' 	=> $content['testimonialCount'],
						'orderby'			=> $content['testimonialsSorting']
						);
						query_posts( $args ); ?>
						<ul class="testimonials-list-homepage">
						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
							$company = cuckoo_get_post_meta(get_the_ID(), "_company");
							$excerpt = get_the_excerpt();
							$excerpt = cuckoo_excerpt_testimonials( $excerpt ); ?>
							<li class="testimonial-element screen-large">
								<?php if($excerpt) : ?>
									<div class="testimonials-excerpt">
										<div class="testimonials-left"></div>
										<div class="testimonials-center">
											<div class="testimonials-excerpt-text"><?php echo $excerpt; ?></div>
										</div>
										<div class="testimonials-right" <?php if($company && $excerpt) : ?> style="background-position: right 95%;"<?php endif; ?>></div>
									</div>
								<?php endif; ?>
								<?php if($company) : ?>
									<div class="testimonials-company"><?php echo $company; ?></div>
								<?php endif; ?>
							</li>
						<?php endwhile; ?>	
						</ul>
					</article>
					<div class="prev-testimonial"></div>
				</section>
				<?php wp_reset_query();
				}
				/* End testimonials */
				/* Team */
				if($source == 'Team'){ ?>
					<section id="<?php echo $slug = $content['slug'] == '' ? make_ID_in_text($content['title']) : make_ID_in_text($content['slug']); ?>" class="team-wrap clearfix section parallax-background <?php echo $backgroundClass; ?>" <?php echo $style; ?>>
						<header class="item-header-wrap">
							<div class="item-header-background"></div>
							<div class="item-header screen-large">
								<div class="logo_content">
									<h2 class="logo"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit nr-'.$key, 'Title', $content['title']); ?></h2>
								</div>
								<div class="title-shadow"></div>
							</div>
						</header>
						<article class="team-content screen-large-blog">
							<article class="team-wrapper-homepage">
							<?php 
							$team_args = array(
							'post_type' 		=> 'team',
							'posts_per_page' 	=> $content['teamCount'],
							'orderby'			=> $content['teamSorting']
							);
							query_posts($team_args);
							
							if(have_posts()) :
								while ( have_posts() ) : the_post(); 
								$memberDesc = cuckoo_get_post_meta(get_the_ID(), "_member-desc");
								$socialFacebook = cuckoo_get_post_meta(get_the_ID(), "_social-facebook");
								$socialTwitter = cuckoo_get_post_meta(get_the_ID(), "_social-twitter"); 
								$socialGoogle = cuckoo_get_post_meta(get_the_ID(), "_social-google"); 
								$socialFlickr = cuckoo_get_post_meta(get_the_ID(), "_social-flickr"); 
								$socialInstagram = cuckoo_get_post_meta(get_the_ID(), "_social-instagram"); 
								$socialPinterest = cuckoo_get_post_meta(get_the_ID(), "_social-pinterest"); 
								$socialDribble = cuckoo_get_post_meta(get_the_ID(), "_social-dribble"); 
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
									<article id="team-<?php the_ID(); ?>" <?php post_class('blog-list blog-home-list'); ?>>
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
							<?php wp_reset_query(); ?>
							</article>
						</article>
					</section>
				<?php }
				/* End Team */
				/* Blog */			
				if($source == 'Blog Posts'){
				?>
				<section id="<?php echo $slug = $content['slug'] == '' ? make_ID_in_text($content['title']) : make_ID_in_text($content['slug']); ?>" class="blog-wrap clearfix section parallax-background <?php echo $backgroundClass; ?>" <?php echo $style; ?>>
					<header class="item-header-wrap">
						<div class="item-header screen-large">
							<div class="logo_content">
								<h2 class="logo"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit nr-'.$key, 'Title', $content['title']); ?></h2>
							</div>
							<div class="title-shadow"></div>
						</div>
					</header>
					<article class="blog-content screen-large-blog blog-homepage">
							<?php 
							$args= array(
							'post_types' 		=> 'post',
							'posts_per_page' 	=> $content['blogCount'],
							'orderby'			=> $content['blogSorting'],
							'cat' 				=> $cat = $content['postContent'] == 0 ? $content['blogExclude'] : $content['postContent']
							);
							query_posts($args);
							
							if(have_posts()) :
								while ( have_posts() ) : the_post(); ?>
									<article id="post-<?php the_ID(); ?>" <?php post_class('blog-list blog-home-list'); ?>>
										<?php get_template_part( "loop/post/blog-header" ); ?>
										<div class="blog-content-text">
											<?php the_excerpt(); ?>
											<div class="reading-more"><a href="<?php  echo get_permalink(); ?>"><?php _e( 'Continue reading', THEMENAME ); ?></a></div>
										</div>
									</article>
								<?php endwhile; // End the loop. Whew. ?>
							<?php endif; ?>
							<?php wp_reset_query(); ?>
					</article>
				</section>
				<?php
				}
				/* End Blog */
				/*  Page */
				if($source == 'Page'){
					$my_id = url_to_postid($content['pageUrl']);
					$my_page = get_post($my_id);
					$page_content = $my_page->post_content;
					$page_content = apply_filters('the_content', $page_content);
					$page_content = str_replace(']]>', ']]>', $page_content);
					$margin_title = "";
				?>
				<section id="<?php echo $slug = $content['slug'] == '' ? make_ID_in_text($content['title']) : make_ID_in_text($content['slug']); ?>" class="page-wrap clearfix section parallax-background <?php echo $backgroundClass; ?>" <?php echo $style; ?>>
					<?php if( $content['pageTitle'] != 1 ) : ?>
					<header class="item-header-wrap">
						<div class="item-header screen-large">
							<div class="logo_content">
								<h2 class="logo"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit nr-'.$key, 'Title', $content['title']); ?></h2>
							</div>
							<div class="title-shadow"></div>
						</div>
					</header>
					<?php else : ?>
					<?php $margin_title = 'style="margin-top:30px!important;"'; ?>
					<div class="no-header-page"></div>
					<?php endif; ?>
					<article class="page-content screen-large" <?php echo $margin_title; ?>>
						<?php echo $page_content; ?>
					</article>
				</section>
				<?php
				}
				/* End Page */
				/* Works Gallery */
				if($source == 'Works Gallery'){ ?>
				<section id="<?php echo $slug = $content['slug'] == '' ? make_ID_in_text($content['title']) : make_ID_in_text($content['slug']); ?>" class="work-wrap clearfix section parallax-background <?php echo $backgroundClass; ?>" <?php echo $style; ?>>
					<header class="item-header-wrap">
						<div class="item-header screen-large">
							<div class="logo_content">
								<h2 class="logo"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit nr-'.$key, 'Title', $content['title']); ?></h2>
							</div>
							<div class="title-shadow"></div>
						</div>
					</header>
					<article class="work-content screen-large-portfolio">
						<?php 
						$term = get_term( $content['worksContent'], 'types' );
						$types = ( $content['worksContent'] == 0 ) ? cuckoo_list_taxha( 'types',  $content['worksExclude'] ) : $term->slug ;
						$args_works =  array(
						'types' 			=> $types,
						'orderby' 			=> $content['worksSorting'],
						'posts_per_page' 	=> $content['worksCount'],
						'post_type' 		=> 'works'
						);
						query_posts($args_works);
						
						if ( have_posts() ):
						while ( have_posts() ) : the_post();
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
				
								<a class="work-item-225" href="<?php echo get_permalink(); ?>" title="<?php echo cuckoo_max_trim(the_title('', '', false), 70); ?>">
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
						<?php endwhile; ?>
						<?php else: ?>
							<?php get_template_part("loop/alert/no-works"); ?>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
					</article>
				</section>
				<?php }
				/* Text box */
				if($source == 'Text Box'){ ?>
				<section id="<?php echo $slug = $content['slug'] == '' ? make_ID_in_text($content['title']) : make_ID_in_text($content['slug']); ?>" class="text-box-wrap clearfix parallax-background <?php echo $backgroundClass; ?>" <?php echo $style; ?>>
					<?php if( !$backgroundColor && !$backgroundImage ) : ?>
						<div class="text-box-shadow"></div>
					<?php endif; ?>
					<article class="text-box-content screen-large">
						<div class="text-box-box">
							<div class="text-box">
								<?php if( $content['textBoxText'] ) : ?>
									<div class="text-box-text"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit nr-'.$key, 'Text Box unit text', nl2br($content['textBoxText'])); ?></div>
								<?php endif; ?>
								<?php if( $content['textBoxUrl'] ) : ?>
									<a class="text-box-link" style="<?php echo $boxMargin = $content['textBoxText'] ? 'margin-top:30px;' : ''; ?>" href="<?php echo $content['textBoxUrl']; ?>" title="<?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit nr-'.$key, 'Text Box unit button title', nl2br($content['textBoxUrlTitle'])); ?>"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit nr-'.$key, 'Text Box unit button title', nl2br($content['textBoxUrlTitle'])); ?></a>
								<?php endif; ?>
							</div>
						</div>
					</article>
				</section>
				<?php }	
				/* Text box end */
				if($source == 'Social Media'){
				?>
				<section id="<?php echo $slug = $content['slug'] == '' ? make_ID_in_text($content['title']) : make_ID_in_text($content['slug']); ?>" class="social-media-wrap clearfix parallax-background <?php echo $backgroundClass; ?>" <?php echo $style; ?>>
					<?php if( !$backgroundColor && !$backgroundImage ) : ?>
						<div class="social-media-shadow"></div>
					<?php endif; ?>
					<article class="social-media-content screen-large">
						<div class="social-media-box">
							<div class="social-media">
								<?php if( $cuckoo_social['elements'] != null )
									{
										foreach($cuckoo_social['elements'] as $k=>$v)
										{
											foreach($v as $key=>$value)
											{ 
												if($value['values'] != null)
												{ 
													foreach( $content['socialMedia'] as $socialName=>$activateKey  ) {
														$socName = $socialName == 'Google' ? 'Google+' : $socialName;
														if( $socName == $value['name'] && $activateKey == 1 ) { ?>
														<a class="<?php echo $value['class'] ?>-large" title="<?php echo $value['name']; ?>" <?php if($value['name'] != 'Email') { ?> target="_blank" <?php } ?> href="<?php echo $value['link'].$value['values']; ?>"></a>
														<?php 
														}
													}
												}
											}
										}
									}
								?>
							</div>
						</div>
					</article>
				</section>
				<?php
				}
				/* Woocommerce */
				if($wooActive = 1){
					if($source == 'WooCommerce'){ ?>
					<section id="<?php echo $slug = $content['slug'] == '' ? make_ID_in_text($content['title']) : make_ID_in_text($content['slug']); ?>" class="work-wrap woo-cuckoo-active clearfix section parallax-background <?php echo $backgroundClass; ?>" <?php echo $style; ?>>
						<header class="item-header-wrap">
							<div class="item-header screen-large">
								<div class="logo_content">
									<h2 class="logo"><?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit nr-'.$key, 'Title', $content['title']); ?></h2>
								</div>
								<div class="title-shadow"></div>
							</div>
						</header>
						<?php if($content['cart_show'] == 1) : 
								global $woocommerce;
								$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
								$cart_url = $woocommerce->cart->get_cart_url();
								$checkout_url = $woocommerce->cart->get_checkout_url();
									
								$myaccount_page_url = "";
								if ( $myaccount_page_id ) {
								 $myaccount_page_url = get_permalink( $myaccount_page_id );
								} ?>
							<article class="woocoomerce-links-content page-content screen-large">
								<div class="cart-accuont-unit">
									<a class="woo-links" href="<?php echo $cart_url; ?>" title="<?php _e('Cart', THEMENAME); ?>"><span class="cart-show"></span><?php _e('Cart', THEMENAME); ?></a> | <div class="total-cart"><?php _e('Total', THEMENAME); ?> <span><?php echo $woocommerce->cart->get_cart_total(); ?></span></div> | <a class="woo-links" href="<?php echo $myaccount_page_url; ?>" title="<?php _e('My Account', THEMENAME); ?>"><?php _e('My Account', THEMENAME); ?></a> | <a class="woo-links" href="<?php echo $checkout_url; ?>" title="<?php _e('Checkout', THEMENAME); ?>"><?php _e('Checkout', THEMENAME); ?></a>
								</div>
							</article>
						<?php endif; ?>
						<article class="work-content screen-large-blog woo-cuckoo-homepage"<?php if($content['cart_show'] == 1) :?> style="margin:0 auto!important;"<?php endif; ?>>
							<?php if($content['wooSource'] == 'Products'){
								if( $content['productContent'] == '0' ){
									if($content['wooSorting'] == 'rand'){
										echo do_shortcode('[list_products per_page="'.$content['productsCount'].'" columns="4" orderby="'.$content['wooSorting'].'"]'); 
									}else{
										echo do_shortcode('[list_products per_page="'.$content['productsCount'].'" columns="4" orderby="'.$content['wooSorting'].'" order="'.$content['wooOrder'].'"]'); 
									}
								}else{
									$category = get_term( $content['productContent'], 'product_cat' );
									if($content['wooSorting'] == 'rand'){
										echo do_shortcode('[product_category category="'.$category->name.'" per_page="'.$content['productsCount'].'" columns="4" orderby="'.$content['wooSorting'].'"]'); 
									}else{
										echo do_shortcode('[product_category category="'.$category->name.'" per_page="'.$content['productsCount'].'" columns="4" orderby="'.$content['wooSorting'].'" order="'.$content['wooOrder'].'"]'); 
									}
								}
							}elseif($content['wooSource'] == 'Categories'){
								echo do_shortcode('[product_categories number="'.$content['productsCount'].'" columns="4" orderby="'.$content['wooSorting'].'" order="'.$content['wooOrder'].'"]'); 
							} ?>
						</article>
					</section>
					<?php 
					}
					/* Woo Navigation Bar */
					if($source == 'Woo Navigation Bar'){
						global $woocommerce;
						$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
						$cart_url = $woocommerce->cart->get_cart_url();
						$checkout_url = $woocommerce->cart->get_checkout_url();
						
						$myaccount_page_url = "";
						if ( $myaccount_page_id ) {
						  $myaccount_page_url = get_permalink( $myaccount_page_id );
						}
					?>
					<section id="<?php echo $slug = $content['slug'] == '' ? make_ID_in_text($content['title']) : make_ID_in_text($content['slug']); ?>" class="woocoomerce-links-wrap clearfix section parallax-background <?php echo $backgroundClass; ?>" <?php echo $style; ?>>
						<?php $fontSize = !empty($content['linksWooFontSize']) ? 'style="font-size:'.$content['linksWooFontSize'].'px;"' : ''; ?>
						<div class="text-box-shadow"></div>
						<article class="woocoomerce-links-content-unit page-content screen-large">
							<div class="cart-accuont-unit-home">
								<a href="<?php echo $cart_url; ?>" title="<?php _e('Cart', THEMENAME); ?>"><span class="cart-show"></span><?php _e('Cart', THEMENAME); ?></a> | 
								<div class="total-cart"><?php _e('Total', THEMENAME); ?> <span><?php echo $woocommerce->cart->get_cart_total(); ?></span></div> | 
								<a href="<?php echo $myaccount_page_url; ?>" title="<?php _e('My Account', THEMENAME); ?>"><?php _e('My Account', THEMENAME); ?></a> | 
								<a href="<?php echo $checkout_url; ?>" title="<?php _e('Checkout', THEMENAME); ?>"><?php _e('Checkout', THEMENAME); ?></a>
							</div>
						</article>
					</section>
					<?php
					}
				}
				/* HTML Since V2.7 */
				if($source == 'HTML Text'){ ?>
				<section id="<?php echo $slug = $content['slug'] == '' ? make_ID_in_text($content['title']) : make_ID_in_text($content['slug']); ?>" class="text-box-wrap clearfix parallax-background <?php echo $backgroundClass; ?>" <?php echo $style; ?>>
					<article class="image-unit-content page-content screen-large" style="padding-top:<?php echo $content['imageTopPadding']; ?>px; padding-bottom:<?php echo $content['imageBottomPadding']; ?>px;">
						<?php if(!empty($content['imageText'])) : ?>
							<?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Builder unit nr-'.$key, 'HTML unit text', cuckoo_decode($content['imageText'])); ?>
						<?php else : ?>
							&nbsp;
						<?php endif; ?>
					</article>
				</section>
				<?php }	
				/* HTML end */
				/* Slideshow Since V3.0 */
				if($source == 'Slideshow'){ ?>
					<section id="<?php echo $slug = $content['slug'] == '' ? make_ID_in_text($content['title']) : make_ID_in_text($content['slug']); ?>" class="text-box-wrap clearfix parallax-background <?php echo $backgroundClass; ?>" <?php echo $style; ?>>
						<article class="image-unit-content page-content" style="padding-top:<?php echo $content['slideTopPadding']; ?>px; padding-bottom:<?php echo $content['slideBottomPadding']; ?>px;">
							<?php if(!empty($content['slideShortcode'])) : ?>
								<?php echo do_shortcode($content['slideShortcode']); ?>
							<?php else : ?>
								&nbsp;
							<?php endif; ?>
						</article>
					</section>
				<?php }	
				/* Slideshow End */
			}
		}
	}
}
$cuckoo_contact = get_option(THEMEPREFIX . "_contact_settings"); 
 
 if( $cuckoo_contact['displayInHomepage'] == 1 ){
	get_template_part("templates/map");
 }
?>
<?php get_footer(); ?>
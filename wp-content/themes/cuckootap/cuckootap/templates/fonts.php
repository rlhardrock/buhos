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
** Name : Fonts
*/
$cuckoo_font = get_option( THEMEPREFIX . "_font_settings" );
$cuckoo_header = get_option( THEMEPREFIX . "_header_footer_settings" );
$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );

if(empty($cuckoo_style['background-color']) or $cuckoo_style['background-color'] == "#" ) : $backgroundColor = cuckoo_chrome_parallax(); else : $backgroundColor = 'background-color:'.$cuckoo_style['background-color'].";"; endif;
$backgroundImage 		= $cuckoo_style['background-image'] != "" ? "background-image:url('".$cuckoo_style['background-image']."');" : '';
$backgroundPosition 	= $cuckoo_style['background-position'] != "" ? 'background-position:'.$cuckoo_style['background-position'].';' : '';
$backgroundAttachment 	= $cuckoo_style['background-attachment'] != "" ? 'background-attachment:'.$cuckoo_style['background-attachment'].';' : '';
$backgroundRepeat	 	= $cuckoo_style['background-repeat'] != "" ? 'background-repeat:'.$cuckoo_style['background-repeat'].';': '';
if( $backgroundColor && !$backgroundImage ) :
	$backgroundImage = 'background-image:none;';
endif;
if(!$backgroundImage or $backgroundImage == 'background-image:none;' ) :
	$backgroundPosition = ''; $backgroundAttachment = ''; $backgroundRepeat = '';
endif;
	$style =   $backgroundColor . $backgroundImage . $backgroundPosition . $backgroundAttachment . $backgroundRepeat ;
?>
<?php echo cuckoo_get_all_fonts(); ?>
<style type="text/css">
	<?php if($cuckoo_settings['responsive'] == "Yes"){ ?>
		@media screen and (max-width: 480px) {
			html ,body { overflow-x: hidden;  position:static; }
		}
		@media screen and (max-width: 320px) {
			html ,body { overflow-x: hidden;  position:static; }
		}
		@media screen and (max-width: 240px) {
			html ,body { overflow-x: hidden; position:static; }
		}
	<?php }else{ ?>
		html { min-width: 980px; }
		@media only screen  and (max-width : 1024px) {
		div#header_content, #nav_wrap { <?php echo $color = $cuckoo_style['theme-secondary-1-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['theme-secondary-1-color'].';'; ?> }
	}
	<?php } ?>
<?php /* Links Color Settings */ ?>
<?php /* Post, Work & Page Subtitle Line Links Color */ ?>
	.item-info-list a { <?php echo $color = $cuckoo_style['subtitle-static'] == '#' ? '' : 'color:'.$cuckoo_style['subtitle-static'].';'; ?> }
	.item-info-list a:hover { <?php echo $color = $cuckoo_style['subtitle-hover'] == '#' ? '' : 'color:'.$cuckoo_style['subtitle-hover'].';'; ?> }
	.item-info-list a:visited { <?php echo $color = $cuckoo_style['subtitle-visited'] == '#' ? '' : 'color:'.$cuckoo_style['subtitle-visited'].';'; ?> }
<?php /* Underline Links Color */ ?>
	.post-title .about_post a, .footer-txt-line a, .contact-info-block a, #comments a , .item-elements a, .item-elements-post a , #content-main a, .page-content a, .container-woo-path #breadcrumb a, .cart-accuont a , .pagination-content  a, .summary a, div.product .woocommerce_tabs ul.tabs li.active, #content div.product .woocommerce_tabs ul.tabs li.active, #tab-description a  { <?php echo $color = $cuckoo_style['underline-static'] == '#' ? '' : 'color:'.$cuckoo_style['underline-static'].';'; ?> }
	.post-title .about_post a:hover, .footer-txt-line a:hover, .contact-info-block a:hover, #comments a:hover , .item-elements a:hover, .item-elements-post a:hover, #content-main a:hover, .page-content a:hover, .container-woo-path #breadcrumb a:hover, .cart-accuont a:hover, .pagination-content  a:hover, .summary a:hover, #tab-description a:hover  { <?php echo $color = $cuckoo_style['underline-hover'] == '#' ? '' : 'color:'.$cuckoo_style['underline-hover'].'!important;'; ?> }
	.post-title .about_post a:visited, .footer-txt-line a:visited, .contact-info-block a:visited, #comments a:visited, .item-elements a:visited, .item-elements-post a:visited, #content-main a:visited, .page-content a:visited, .container-woo-path #breadcrumb a:visited, .cart-accuont a:visited, .pagination-content  a:visited, .summary a:visited, #tab-description a:visited  { <?php echo $color = $cuckoo_style['underline-visited'] == '#' ? '' : 'color:'.$cuckoo_style['underline-visited'].'!important;'; ?> }
<?php /* Others Links hover & visited */ ?>
	div#header_nav nav ul li a:hover, li.tab-navig.active a, footer nav.footer-nav a:hover, .post-title h3 a:hover, .member-title h3 a:hover, .post-tags-list a.tags_post:hover, h1.search-title a:hover { <?php echo $color = $cuckoo_style['another-hover'] == '#' ? '' : 'color:'.$cuckoo_style['another-hover'].';'; ?> }
	div#header_nav  nav ul li a:visited, footer nav.footer-nav a:visited, .post-title h3 a:visited, .member-title h3 a:visited, .post-tags-list a.tags_post:visited, h1.search-title a:visited { <?php echo $color = $cuckoo_style['another-visited'] == '#' ? '' : 'color:'.$cuckoo_style['another-visited'].';'; ?> }	
	li.tab-navig a:hover, li.tab-navig.active a, .toggle_shortcode_title:hover h3 , div.product .woocommerce_tabs ul.tabs li a:hover, #content div.product .woocommerce_tabs ul.tabs li a:hover ,.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce-page div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce #content div.product .woocommerce-tabs ul.tabs li a:hover, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li a:hover { <?php echo $color = $cuckoo_style['another-hover'] == '#' ? '' : 'color:'.$cuckoo_style['another-hover'].'!important;'; ?> }
<?php /* Others links background */ ?>
	div#header_nav  nav ul li ul li a:hover { <?php echo $testimonials_author_color = $cuckoo_font['menus-dropdown-color'] == '#' ? '' : 'color:'.$cuckoo_font['menus-dropdown-color'].';'; ?><?php echo $color = $cuckoo_style['another-hover'] == '#' ? '' : 'background:'.$cuckoo_style['another-hover'].';'; ?> } 
	.text-box-link:hover, a.btn-short:hover, .reading-more:hover, a.pricing-link:hover, #submit-all:hover, .show-map:hover ,a.comment-reply-link:hover, a.comment-reply-login:hover, #submit:hover, a#cancel-comment-reply-link:hover ,.nivo-caption a:hover, ul.products li.product a.add_to_cart_button:hover, a.button:hover, button.button:hover, input.button:hover, #respond input#submit:hover, #content input.button:hover, button.single_add_to_cart_button.button:hover, .shipping_calculator h2 a.shipping-calculator-button:hover,.woocommerce a.button.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce #content input.button.alt:hover, .woocommerce-page #content input.button.alt:hover { <?php echo $color = $cuckoo_style['another-hover'] == '#' ? '' : 'background:'.$cuckoo_style['another-hover'].'!important;'; ?> }
	div#header_nav  nav ul li ul li a:visited , .text-box-link:visited, a.pricing-link:visited, .reading-more:visited, a.btn-short:visited, #submit-all:visited, .form-submit:visited, .show-map:visited , a.comment-reply-link:visited, a.comment-reply-login:visited, #submit:visited, a#cancel-comment-reply-link:visited ,.nivo-caption a:visited, ul.products li.product a.add_to_cart_button:visited, a.button:visited, button.button:visited, input.button:visited, #respond input#submit:visited, #content input.button:visited, button.single_add_to_cart_button.button:visited, .shipping_calculator h2 a.shipping-calculator-button:visited { <?php echo $color = $cuckoo_style['another-visited'] == '#' ? '' : 'background:'.$cuckoo_style['another-visited'].';'; ?> }
<?php /* Theme Color */ ?>
	.logo_content, .only-map, #item-alert-search, #item-alert, .password-box, span.onsale, li.product a span.onsale, #content-woo ul.products li.product span.onsale { <?php echo $color = $cuckoo_style['theme-primary-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['theme-primary-color'].'!important;'; ?> }
	#theme_logo .logo_content { <?php echo $color = $cuckoo_style['logo-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['logo-color'].'!important;'; ?> }
	div#header_nav nav, .nav-wrap-fixed, header.item-header-wrap, .back_to_top, .nivo-prevNav, .nivo-nextNav, #slider.main-slider, .slidePreloadImg , .circle_preload, .lightbox-next, .lightbox-prev , .prev-testimonial , .next-testimonial { <?php echo $color = $cuckoo_style['theme-secondary-1-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['theme-secondary-1-color'].'!important;'; ?> }
	.item-info-line.one .item-info-list, div#header_nav nav ul li ul li a, .navigation-wrapper, .slidePreloadImgGalleries { <?php echo $color = $cuckoo_style['theme-secondary-2-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['theme-secondary-2-color'].';'; ?> }
	#item-header { <?php echo $color = $cuckoo_style['theme-secondary-1-color'] == '#' ? '' : 'border-bottom-color:'.$cuckoo_style['theme-secondary-1-color'].';'; ?> } 
	#load-more-position, #social-search-block { <?php echo $color = $cuckoo_style['theme-secondary-3-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['theme-secondary-3-color'].';'; ?> }
	.prev-blog , .next-blog, .prev-team , .next-team { <?php echo $color = $cuckoo_style['theme-secondary-1-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['theme-secondary-1-color'].'!important;'; ?> }
<?php /* footer Color settings */ ?>
	<?php $footerColor = $cuckoo_style['footer-color'] == '#' ? '' : ' background-color:'.$cuckoo_style['footer-color']. ";" ; ?>
	<?php $footerPosition = $cuckoo_style['footer-position'] == '' ? '' : ' background-position:'.$cuckoo_style['footer-position']. ";" ; ?>
	<?php $footerRepeat = $cuckoo_style['footer-repeat'] == '#' ? '' : ' background-repeat:'.$cuckoo_style['footer-repeat']. ";" ; ?>
	<?php $footerAttachment = $cuckoo_style['footer-attachment'] == '#' ? '' : ' background-attachment:'.$cuckoo_style['footer-attachment']. ";" ; ?>
	#main-footer { <?php echo $footer = $cuckoo_style['footer-image'] == null ? $footerColor : 'background-image: url('.$cuckoo_style['footer-image']."); ". $footerAttachment . $footerRepeat . $footerPosition . $footerColor ?> }
<?php /* Related Posts Color settings */ ?>
	<?php $relatedPostsColor = $cuckoo_style['related-posts-color'] == '#' ? '' : ' background-color:'.$cuckoo_style['related-posts-color']. ";" ; ?>
	<?php $relatedPostsPosition = $cuckoo_style['related-posts-position'] == '' ? '' : ' background-position:'.$cuckoo_style['related-posts-position']. ";" ; ?>
	<?php $relatedPostsRepeat = $cuckoo_style['related-posts-repeat'] == '#' ? '' : ' background-repeat:'.$cuckoo_style['related-posts-repeat']. ";" ; ?>
	<?php $relatedPostsAttachment = $cuckoo_style['related-posts-attachment'] == '#' ? '' : ' background-attachment:'.$cuckoo_style['related-posts-attachment']. ";" ; ?>
	#related-works.related-posts { <?php echo $relatedPosts = $cuckoo_style['related-posts-image'] == null ? $relatedPostsColor : 'background-image: url('.$cuckoo_style['related-posts-image']."); ". $relatedPostsAttachment . $relatedPostsRepeat . $relatedPostsPosition . $relatedPostsColor ?> }
<?php /* Related Works Color settings */ ?>
	<?php $relatedWorksColor = $cuckoo_style['related-works-color'] == '#' ? '' : ' background-color:'.$cuckoo_style['related-works-color']. ";" ; ?>
	<?php $relatedWorksPosition = $cuckoo_style['related-works-position'] == '' ? '' : ' background-position:'.$cuckoo_style['related-works-position']. ";" ; ?>
	<?php $relatedWorksRepeat = $cuckoo_style['related-works-repeat'] == '#' ? '' : ' background-repeat:'.$cuckoo_style['related-works-repeat']. ";" ; ?>
	<?php $relatedWorksAttachment = $cuckoo_style['related-works-attachment'] == '#' ? '' : ' background-attachment:'.$cuckoo_style['related-works-attachment']. ";" ; ?>
	#related-works.related-works-wrap { <?php echo $relatedWorks = $cuckoo_style['related-works-image'] == null ? $relatedWorksColor : 'background-image: url('.$cuckoo_style['related-works-image']."); ". $relatedWorksAttachment . $relatedWorksRepeat . $relatedWorksPosition . $relatedWorksColor ?> }
<?php /* Woocommerce */ ?>
	<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
		<?php $cuckoo_woocommerce = get_option( THEMEPREFIX . "_woocommerce_cuckoo" ); ?>
		<?php $relatedProductColor = $cuckoo_woocommerce['backgroundColor'] == '#' ? '' : ' background-color:'.$cuckoo_woocommerce['backgroundColor']. ";" ; ?>
		<?php $relatedProductPosition = $cuckoo_woocommerce['imgPosition'] == '' ? '' : ' background-position:'.$cuckoo_woocommerce['imgPosition']. ";" ; ?>
		<?php $relatedProductRepeat = $cuckoo_woocommerce['imgRepeat'] == '#' ? '' : ' background-repeat:'.$cuckoo_woocommerce['imgRepeat']. ";" ; ?>
		<?php $relatedProductAttachment = $cuckoo_woocommerce['imgAttachment'] == '#' ? '' : ' background-attachment:'.$cuckoo_woocommerce['imgAttachment']. ";" ; ?>
		#related-products.related-posts { <?php echo $relatedProduct = $cuckoo_woocommerce['img_url'] == null ? $relatedProductColor : 'background-image: url('.$cuckoo_woocommerce['img_url']."); ". $relatedProductAttachment . $relatedProductRepeat . $relatedProductPosition . $relatedProductColor ?> }
		ul.products li.product .price, div.product p.price, div.single_variation span.price span.amount {
			font-family: '<?php echo $cuckoo_woocommerce['price_font']; ?>' , sans-serif!important;
			<?php echo $slideshow_title_weight = $cuckoo_woocommerce['price_weight'] == null ? '' : 'font-weight:'.$cuckoo_woocommerce['price_weight'].';'; ?>
			<?php echo $slideshow_title_style = $cuckoo_woocommerce['price_style'] == null ? '' : 'font-style:'.$cuckoo_woocommerce['price_style'].';'; ?>
			<?php echo $slideshow_title_size = $cuckoo_woocommerce['price_size'] == null ? '' : 'font-size:'.$cuckoo_woocommerce['price_size'].'px!important;'; ?>
			<?php echo $slideshow_title_lheight = $cuckoo_woocommerce['price_lheight'] == null ? '' : 'line-height:'.$cuckoo_woocommerce['price_lheight'].';'; ?>
			<?php echo $slideshow_title_color = $cuckoo_woocommerce['price_color'] == null ? '' : 'color:'.$cuckoo_woocommerce['price_color'].'!important;'; ?>
		}
		ul.products li.product .price del{
			font-family: '<?php echo $cuckoo_woocommerce['regular_font']; ?>' , sans-serif!important;
			<?php echo $slideshow_title_weight = $cuckoo_woocommerce['regular_weight'] == null ? '' : 'font-weight:'.$cuckoo_woocommerce['regular_weight'].';'; ?>
			<?php echo $slideshow_title_style = $cuckoo_woocommerce['regular_style'] == null ? '' : 'font-style:'.$cuckoo_woocommerce['regular_style'].';'; ?>
			<?php echo $slideshow_title_size = $cuckoo_woocommerce['regular_size'] == null ? '' : 'font-size:'.$cuckoo_woocommerce['regular_size'].'px!important;'; ?>
			<?php echo $slideshow_title_lheight = $cuckoo_woocommerce['regular_lheight'] == null ? '' : 'line-height:'.$cuckoo_woocommerce['regular_lheight'].';'; ?>
			<?php echo $slideshow_title_color = $cuckoo_woocommerce['regular_color'] == null ? '' : 'color:'.$cuckoo_woocommerce['regular_color'].'!important;'; ?>
		}
		.woocommerce div.container-woo-path nav.woocommerce-breadcrumb a, .woocommerce-page div.container-woo-path nav.woocommerce-breadcrumb a {  <?php echo $color = $cuckoo_style['underline-static'] == '#' ? '' : 'color:'.$cuckoo_style['underline-static'].';'; ?>  }
	<?php } ?>
<?php /* Media */ ?>
	@media only screen  and (max-width : 1024px) {
		div#theme_logo .shadow  { <?php echo $color = $cuckoo_style['ipad-shadow-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['ipad-shadow-color'].';'; ?> }
	}	
	@media only screen  and (min-width : 1025px) {
		div#theme_logo .shadow  { <?php echo $color = $cuckoo_style['theme-secondary-1-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['theme-secondary-1-color'].';'; ?> }
	}
	<?php if($cuckoo_settings['responsive'] == "Yes"){ ?>
		@media only screen  and (max-width : 768px) {
			.back_to_top , .nivo-prevNav, .nivo-nextNav, .slidePreloadImg, .circle_preload, .lightbox-next, .lightbox-prev, .prev-testimonial , .next-testimonial { <?php echo $color = $cuckoo_style['theme-secondary-1-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['theme-secondary-1-color'].'!important;'; ?> }
			div#header_nav nav ul li a:hover { <?php echo $color = $cuckoo_style['another-hover'] == '#' ? '' : 'background:'.$cuckoo_style['another-hover'].';'; ?> }
			div#header_nav nav ul li a:visited { <?php echo $color = $cuckoo_style['another-visited'] == '#' ? '' : 'background:'.$cuckoo_style['another-visited'].';'; ?> }
			div#header_nav nav ul li a{ 
			<?php echo $color = $cuckoo_style['theme-secondary-2-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['theme-secondary-2-color'].';'; ?> 
			font-family: '<?php echo $cuckoo_font['menus-dropdown-font']; ?>' , sans-serif!important;
			<?php echo $drop_weight = $cuckoo_font['menus-dropdown-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['menus-dropdown-weight'].'!important;'; ?>
			<?php echo $drop_style = $cuckoo_font['menus-dropdown-style'] == null ? '' : 'font-style:'.$cuckoo_font['menus-dropdown-style'].'!important;'; ?>
			<?php echo $drop_size = $cuckoo_font['menus-dropdown-size'] == null ? '' : 'font-size:'.$cuckoo_font['menus-dropdown-size'].'px!important;'; ?>
			<?php echo $drop_lheight = $cuckoo_font['menus-dropdown-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['menus-dropdown-lheight'].'!important;'; ?>
			<?php echo $drop_color = $cuckoo_font['menus-dropdown-color'] == null ? '' : 'color:'.$cuckoo_font['menus-dropdown-color'].'!important;'; ?>
			}
			div#header_nav nav ul li a:hover { <?php echo $drop_color = $cuckoo_font['menus-dropdown-color'] == null ? '' : 'color:'.$cuckoo_font['menus-dropdown-color'].'!important;'; ?> }
		}
	<?php } ?>
<?php /* Border secondary-1-color */ ?>
	.nav_end { <?php echo $color = $cuckoo_style['theme-secondary-1-color'] == '#' ? '' : 'border-top-color:'.$cuckoo_style['theme-secondary-1-color'].'!important;'; ?> }
	.nav_start { <?php echo $color = $cuckoo_style['theme-secondary-1-color'] == '#' ? '' : 'border-right-color:'.$cuckoo_style['theme-secondary-1-color'].'!important;'; /* border-right-color: */ ?> }
	.title-shadow { <?php echo $color = $cuckoo_style['theme-secondary-1-color'] == '#' ? '' : 'border-left-color:'.$cuckoo_style['theme-secondary-1-color'].'!important;'; ?> }
<?php /* Button colors */ ?>
	.reading-more, #submit, a#cancel-comment-reply-link, a.slide-button, .text-box-link, ul.products li.product a.add_to_cart_button, a.button, button.button, input.button, #respond input#submit, #content input.button, button.single_add_to_cart_button.button, .shipping_calculator h2 a.shipping-calculator-button, .woocommerce a.button.alt, .woocommerce-page a.button.alt, .woocommerce button.button.alt, .woocommerce-page button.button.alt, .woocommerce input.button.alt, .woocommerce-page input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce-page #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page #content input.button.alt { <?php echo $color = $cuckoo_style['all-button-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['all-button-color'].'!important;'; ?> }
	.show-map, #submit-all  { <?php echo $color = $cuckoo_style['map-button-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['map-button-color'].';'; ?> }
	a.comment-reply-link  { <?php echo $color = $cuckoo_style['reply-button-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['reply-button-color'].';'; ?> }
<?php /* Comments colors */ ?>
	#comments-title, .comment-elements li.depth-1  { <?php echo $color = $cuckoo_style['first-comment-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['first-comment-color'].';'; ?> }
	.comment-elements li.depth-2  { <?php echo $color = $cuckoo_style['children-comment-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['children-comment-color'].';'; ?> }
	.depth-2 .comment-body .comment-arrow  { <?php echo $color = $cuckoo_style['children-comment-color'] == '#' ? '' : 'border-bottom-color:'.$cuckoo_style['children-comment-color'].';'; ?> }
	#respond  { <?php echo $color = $cuckoo_style['reply-block-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['reply-block-color'].';'; ?> }
	#respond .respond-arrow { <?php echo $color = $cuckoo_style['reply-block-color'] == '#' ? '' : 'border-bottom-color:'.$cuckoo_style['reply-block-color'].';'; ?> }
<?php /* Lines colors */ ?>
	.item-info-line.one:before { <?php echo $color = $cuckoo_style['subtitle-line-color'] == '#' ? '' : 'border-top-color:'.$cuckoo_style['subtitle-line-color'].';'; ?> }
	.comment-elements li.depth-1:first-child .comment-body { <?php echo $color = $cuckoo_style['comment-line-color'] == '#' ? '' : 'border-top-color:'.$cuckoo_style['comment-line-color'].';'; ?> }
	.item-desc-bottom, .post-title h3, .member-title, .test-title{ <?php echo $color = $cuckoo_style['all-lines-color'] == '#' ? '' : 'border-bottom-color:'.$cuckoo_style['all-lines-color'].';'; ?> }
	.testimonials-line, .slide-title-line { <?php echo $color = $cuckoo_style['all-lines-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['all-lines-color'].';'; ?> }
<?php /* Selected colors */ ?>
	::-moz-selection {  <?php echo $color = $cuckoo_style['selected-color'] == '#' ? '' : 'background:'.$cuckoo_style['selected-color'].';'; echo $color = $cuckoo_style['selected-font-color'] == '#' ? '' : 'color:'.$cuckoo_style['selected-font-color'].';'; ?>}
	::selection {  <?php echo $color = $cuckoo_style['selected-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['selected-color'].';'; echo $color = $cuckoo_style['selected-font-color'] == '#' ? '' : 'color:'.$cuckoo_style['selected-font-color'].';'; ?> }
	::-webkit-selection { <?php echo $color = $cuckoo_style['selected-color'] == '#' ? '' : 'background:'.$cuckoo_style['selected-color'].';'; echo $color = $cuckoo_style['selected-font-color'] == '#' ? '' : 'color:'.$cuckoo_style['selected-font-color'].';'; ?> }
	.selected_text { <?php echo $color = $cuckoo_style['selected-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['selected-color'].';'; echo $color = $cuckoo_style['selected-font-color'] == '#' ? '' : 'color:'.$cuckoo_style['selected-font-color'].';'; ?> }
<?php /* Image background */ ?>
	.slidePreloadImg , .testimonials-wrap, .text-box-wrap, .social-media-wrap, #item-header, #slider.main-slider {  <?php echo $style; ?>}
<?php /* LightBox Color */ ?>
	.lightbox-skin {  <?php echo $color = $cuckoo_style['lightbox-color'] == '#' ? '' : 'background-color:'.$cuckoo_style['lightbox-color'].';';  ?>}
<?php /* Display 1px and another effects */ ?>
<?php if( $cuckoo_style['display_one_px_effect'] != 1 ) : ?>
	.logo_content .logo, .facebook-large, .twitter-large, .google-large, .flickr-large, .pinterest-large, .dribble-large, .behance-large, 
	.youtube-large, .vimeo-large, .linkendin-large, .email-large, .rss-large, .instagram-large , .form-submit, .show-map, #submit, #submit-all, .text-box-link, 
	.reading-more, a.comment-reply-link, #cancel-comment-reply-link, .slide-button, a.btn-short, .facebook-small, .twitter-small, 
	.google-small, .flickr-small, .pinterest-small, .dribble-small, .behance-small, .youtube-small, .vimeo-small, .linkendin-small, .email-small, .percent-bar 
	.rss-small, .instagram-small, span.onsale, button.single_add_to_cart_button.button
	{ border-right:0!important; }
	.border-img, .border-img-galleries { display:none!important; }
<?php endif; ?>
<?php if( $cuckoo_style['overlay_lines_slideshow'] != 1 ) : ?>
	.imgwrapper { display:none; }
<?php endif; ?>
<?php /* Fonts Admin Page Settings */ ?>
<?php /* Slideshow Title */ ?>
	.slide-title {
		font-family: '<?php echo $cuckoo_font['slideshow-title-font']; ?>' , sans-serif;
		<?php echo $slideshow_title_weight = $cuckoo_font['slideshow-title-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['slideshow-title-weight'].';'; ?>
		<?php echo $slideshow_title_style = $cuckoo_font['slideshow-title-style'] == null ? '' : 'font-style:'.$cuckoo_font['slideshow-title-style'].';'; ?>
		<?php echo $slideshow_title_size = $cuckoo_font['slideshow-title-size'] == null ? '' : 'font-size:'.$cuckoo_font['slideshow-title-size'].'px;'; ?>
		<?php echo $slideshow_title_lheight = $cuckoo_font['slideshow-title-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['slideshow-title-lheight'].';'; ?>
		<?php echo $slideshow_title_color = $cuckoo_font['slideshow-title-color'] == null ? '' : 'color:'.$cuckoo_font['slideshow-title-color'].';'; ?>
	}
<?php /* Slideshow Subtitle */ ?>
	.slide-subtitle {
		font-family: '<?php echo $cuckoo_font['slideshow-subtitle-font']; ?>' , sans-serif;
		<?php echo $slideshow_subtitle_weight = $cuckoo_font['slideshow-subtitle-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['slideshow-subtitle-weight'].';'; ?>
		<?php echo $slideshow_subtitle_style = $cuckoo_font['slideshow-subtitle-style'] == null ? '' : 'font-style:'.$cuckoo_font['slideshow-subtitle-style'].';'; ?>
		<?php echo $slideshow_subtitle_size = $cuckoo_font['slideshow-subtitle-size'] == null ? '' : 'font-size:'.$cuckoo_font['slideshow-subtitle-size'].'px;'; ?>
		<?php echo $slideshow_subtitle_lheight = $cuckoo_font['slideshow-subtitle-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['slideshow-subtitle-lheight'].';'; ?>
		<?php echo $slideshow_subtitle_color = $cuckoo_font['slideshow-subtitle-color'] == null ? '' : 'color:'.$cuckoo_font['slideshow-subtitle-color'].';'; ?>
	}	
<?php /* PWP Title */ ?>
	#header-position h1 {
		font-family: '<?php echo $cuckoo_font['pwp-title-font']; ?>' , sans-serif;
		<?php echo $pwp_title_weight = $cuckoo_font['pwp-title-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['pwp-title-weight'].';'; ?>
		<?php echo $pwp_title_style = $cuckoo_font['pwp-title-style'] == null ? '' : 'font-style:'.$cuckoo_font['pwp-title-style'].';'; ?>
		<?php echo $pwp_title_size = $cuckoo_font['pwp-title-size'] == null ? '' : 'font-size:'.$cuckoo_font['pwp-title-size'].'px;'; ?>
		<?php echo $pwp_title_lheight = $cuckoo_font['pwp-title-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['pwp-title-lheight'].';'; ?>
		<?php echo $pwp_title_color = $cuckoo_font['pwp-title-color'] == null ? '' : 'color:'.$cuckoo_font['pwp-title-color'].';'; ?>
	}
<?php /* PWP Subtitle */ ?>
	.item-info-line {
		font-family: '<?php echo $cuckoo_font['pwp-subtitle-font']; ?>' , sans-serif;
		<?php echo $pwp_subtitle_weight = $cuckoo_font['pwp-subtitle-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['pwp-subtitle-weight'].';'; ?>
		<?php echo $pwp_subtitle_style = $cuckoo_font['pwp-subtitle-style'] == null ? '' : 'font-style:'.$cuckoo_font['pwp-subtitle-style'].';'; ?>
		<?php echo $pwp_subtitle_size = $cuckoo_font['pwp-subtitle-size'] == null ? '' : 'font-size:'.$cuckoo_font['pwp-subtitle-size'].'px;'; ?>
		<?php echo $pwp_subtitle_lheight = $cuckoo_font['pwp-subtitle-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['pwp-subtitle-lheight'].';'; ?>
		<?php echo $pwp_subtitle_color = $cuckoo_font['pwp-subtitle-color'] == null ? '' : 'color:'.$cuckoo_font['pwp-subtitle-color'].';'; ?>
	}
	.item-info-list a {
		font-family: '<?php echo $cuckoo_font['pwp-subtitle-font']; ?>' , sans-serif;
		<?php echo $pwp_weight = $cuckoo_font['pwp-subtitle-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['pwp-subtitle-weight'].';'; ?>
		<?php echo $pwp_style = $cuckoo_font['pwp-subtitle-style'] == null ? '' : 'font-style:'.$cuckoo_font['pwp-subtitle-style'].';'; ?>
		<?php echo $pwp_size = $cuckoo_font['pwp-subtitle-size'] == null ? '' : 'font-size:'.$cuckoo_font['pwp-subtitle-size'].'px;'; ?>
		<?php echo $pwp_lheight = $cuckoo_font['pwp-subtitle-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['pwp-subtitle-lheight'].';'; ?>
	}
	.selected {
		<?php echo $selected_color = $cuckoo_font['pwp-subtitle-color'] == null ? '' : 'color:'.$cuckoo_font['pwp-subtitle-color'].'!important;'; ?>
	}
<?php /* Page Unit Title */ ?>
	.logo_content h2.logo  {
		font-family: '<?php echo $cuckoo_font['page-unit-title-font']; ?>' , sans-serif;
		<?php echo $unit_title_weight = $cuckoo_font['page-unit-title-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['page-unit-title-weight'].';'; ?>
		<?php echo $unit_title_style = $cuckoo_font['page-unit-title-style'] == null ? '' : 'font-style:'.$cuckoo_font['page-unit-title-style'].';'; ?>
		<?php echo $unit_title_size = $cuckoo_font['page-unit-title-size'] == null ? '' : 'font-size:'.$cuckoo_font['page-unit-title-size'].'px;'; ?>
		<?php echo $unit_title_lheight = $cuckoo_font['page-unit-title-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['page-unit-title-lheight'].';'; ?>
		<?php echo $unit_title_color = $cuckoo_font['page-unit-title-color'] == null ? '' : 'color:'.$cuckoo_font['page-unit-title-color'].';'; ?>
	}
<?php /* Text Box & Testimonial Text */ ?>
	.testimonials-excerpt-text, .text-box-text  {
		font-family: '<?php echo $cuckoo_font['text-box-testimonials-font']; ?>' , sans-serif;
		<?php echo $testimonials_weight = $cuckoo_font['text-box-testimonials-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['text-box-testimonials-weight'].';'; ?>
		<?php echo $testimonials_style = $cuckoo_font['text-box-testimonials-style'] == null ? '' : 'font-style:'.$cuckoo_font['text-box-testimonials-style'].';'; ?>
		<?php echo $testimonials_size = $cuckoo_font['text-box-testimonials-size'] == null ? '' : 'font-size:'.$cuckoo_font['text-box-testimonials-size'].'px;'; ?>
		<?php echo $testimonials_lheight = $cuckoo_font['text-box-testimonials-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['text-box-testimonials-lheight'].';'; ?>
		<?php echo $testimonials_color = $cuckoo_font['text-box-testimonials-color'] == null ? '' : 'color:'.$cuckoo_font['text-box-testimonials-color'].';'; ?>
	}
<?php /* Testimonial Author */ ?>
	.testimonials-company  {
		font-family: '<?php echo $cuckoo_font['testimonial-author-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['testimonial-author-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['testimonial-author-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['testimonial-author-style'] == null ? '' : 'font-style:'.$cuckoo_font['testimonial-author-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['testimonial-author-size'] == null ? '' : 'font-size:'.$cuckoo_font['testimonial-author-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['testimonial-author-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['testimonial-author-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['testimonial-author-color'] == null ? '' : 'color:'.$cuckoo_font['testimonial-author-color'].';'; ?>
	}
<?php /* Menus */ ?>
	div#header_nav nav ul li a, footer nav.footer-nav a, .nav-first-menu, .nav-close, .pricing-table {
		font-family: '<?php echo $cuckoo_font['menus-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['menus-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['menus-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['menus-style'] == null ? '' : 'font-style:'.$cuckoo_font['menus-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['menus-size'] == null ? '' : 'font-size:'.$cuckoo_font['menus-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['menus-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['menus-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['menus-color'] == null ? '' : 'color:'.$cuckoo_font['menus-color'].';'; ?>
	}
<?php /* Menus dropdown */ ?>
	div#header_nav nav ul li ul li a {
		font-family: '<?php echo $cuckoo_font['menus-dropdown-font']; ?>' , sans-serif;
		<?php echo $font_dropdown_weight = $cuckoo_font['menus-dropdown-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['menus-dropdown-weight'].';'; ?>
		<?php echo $font_dropdown_style = $cuckoo_font['menus-dropdown-style'] == null ? '' : 'font-style:'.$cuckoo_font['menus-dropdown-style'].';'; ?>
		<?php echo $font_dropdown_size = $cuckoo_font['menus-dropdown-size'] == null ? '' : 'font-size:'.$cuckoo_font['menus-dropdown-size'].'px!important;'; ?>
		<?php echo $font_dropdown_lheight = $cuckoo_font['menus-dropdown-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['menus-dropdown-lheight'].';'; ?>
		<?php echo $font_dropdown_color = $cuckoo_font['menus-dropdown-color'] == null ? '' : 'color:'.$cuckoo_font['menus-dropdown-color'].';'; ?>
	}
<?php /* Button Title */ ?>
	.form-submit, .show-map, #submit, .text-box-link, .reading-more, a.comment-reply-link, #cancel-comment-reply-link, 
	.slide-button, a.btn-short, .percent-text, #submit-all, ul.products li.product a.add_to_cart_button ,a.button, button.button, input.button, 
	#respond input#submit, #content input.button, span.onsale, button.single_add_to_cart_button.button, .shipping_calculator h2 a.shipping-calculator-button {
		font-family: '<?php echo $cuckoo_font['button-font']; ?>' , sans-serif!important;
		<?php echo $testimonials_author_weight = $cuckoo_font['button-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['button-weight'].'!important;'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['button-style'] == null ? '' : 'font-style:'.$cuckoo_font['button-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['button-size'] == null ? '' : 'font-size:'.$cuckoo_font['button-size'].'px!important;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['button-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['button-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['button-color'] == null ? '' : 'color:'.$cuckoo_font['button-color'].'!important;'; ?>
	}
<?php /* Body Font */ ?>
	body, a.cuckoo-love, #path-and-buy, #breadcrumb, .pagination-content span {
		font-family: '<?php echo $cuckoo_font['body-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['body-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['body-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['body-style'] == null ? '' : 'font-style:'.$cuckoo_font['body-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['body-size'] == null ? '' : 'font-size:'.$cuckoo_font['body-size'].'px!important;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['body-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['body-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['body-color'] == null ? '' : 'color:'.$cuckoo_font['body-color'].'!important;'; ?>
	}
<?php /* Details Font */ ?>
	.about_post, .about-comment {
		font-family: '<?php echo $cuckoo_font['details-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['details-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['details-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['details-style'] == null ? '' : 'font-style:'.$cuckoo_font['details-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['details-size'] == null ? '' : 'font-size:'.$cuckoo_font['details-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['details-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['details-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['details-color'] == null ? '' : 'color:'.$cuckoo_font['details-color'].';'; ?>
	}
<?php /* Alerts Font */ ?>
	#result p.error, #result p.success, #item-alert, .item-alert-text span, #error_page .error-text, .password_correct_text	{
		font-family: '<?php echo $cuckoo_font['alerts-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['alerts-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['alerts-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['alerts-style'] == null ? '' : 'font-style:'.$cuckoo_font['alerts-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['alerts-size'] == null ? '' : 'font-size:'.$cuckoo_font['alerts-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['alerts-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['alerts-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['alerts-color'] == null ? '' : 'color:'.$cuckoo_font['alerts-color'].';'; ?>
	}
<?php /* Post And Team List Title Font */ ?>
	.post-title h3 a , .member-title h3 a, ul.products li.product h3  { 
		font-family: '<?php echo $cuckoo_font['ptl-title-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['ptl-title-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['ptl-title-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['ptl-title-style'] == null ? '' : 'font-style:'.$cuckoo_font['ptl-title-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['ptl-title-size'] == null ? '' : 'font-size:'.$cuckoo_font['ptl-title-size'].'px!important;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['ptl-title-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['ptl-title-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['ptl-title-color'] == null ? '' : 'color:'.$cuckoo_font['ptl-title-color'].'!important;'; ?>
	}
<?php /* Team Occupation */ ?>
	.member-occupation  { 
		font-family: '<?php echo $cuckoo_font['occupation-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['occupation-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['occupation-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['occupation-style'] == null ? '' : 'font-style:'.$cuckoo_font['occupation-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['occupation-size'] == null ? '' : 'font-size:'.$cuckoo_font['occupation-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['occupation-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['occupation-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['occupation-color'] == null ? '' : 'color:'.$cuckoo_font['occupation-color'].';'; ?>
	}
<?php /* Team & testimonial content text */ ?>
	.team-desc-single, .testimonial-excerpt, .quote_shortcodes  { 
		font-family: '<?php echo $cuckoo_font['tt-content-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['tt-content-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['tt-content-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['tt-content-style'] == null ? '' : 'font-style:'.$cuckoo_font['tt-content-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['tt-content-size'] == null ? '' : 'font-size:'.$cuckoo_font['tt-content-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['tt-content-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['tt-content-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['tt-content-color'] == null ? '' : 'color:'.$cuckoo_font['tt-content-color'].';'; ?>
	}
<?php /* Team Member "Follow Me" & Post Tags & testimonials company */ ?>
	.post-tags-list a.tags_post, .post-tags-list, .test-company , .follow-text, .test-company-list,  .text_box_shortcodes .author-quote { 
		font-family: '<?php echo $cuckoo_font['tm-tt-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['tm-tt-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['tm-tt-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['tm-tt-style'] == null ? '' : 'font-style:'.$cuckoo_font['tm-tt-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['tm-tt-size'] == null ? '' : 'font-size:'.$cuckoo_font['tm-tt-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['tm-tt-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['tm-tt-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['tm-tt-color'] == null ? '' : 'color:'.$cuckoo_font['tm-tt-color'].';'; ?>
	}
<?php /* Work List Title */ ?>
	h4.work-thumb-title { 
		font-family: '<?php echo $cuckoo_font['workl-title-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['workl-title-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['workl-title-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['workl-title-style'] == null ? '' : 'font-style:'.$cuckoo_font['workl-title-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['workl-title-size'] == null ? '' : 'font-size:'.$cuckoo_font['workl-title-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['workl-title-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['workl-title-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['workl-title-color'] == null ? '' : 'color:'.$cuckoo_font['workl-title-color'].';'; ?>
	}
<?php /* Work List subtitle */ ?>
	.work-type { 
		font-family: '<?php echo $cuckoo_font['workl-subtitle-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['workl-subtitle-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['workl-subtitle-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['workl-subtitle-style'] == null ? '' : 'font-style:'.$cuckoo_font['workl-subtitle-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['workl-subtitle-size'] == null ? '' : 'font-size:'.$cuckoo_font['workl-subtitle-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['workl-subtitle-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['workl-subtitle-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['workl-subtitle-color'] == null ? '' : 'color:'.$cuckoo_font['workl-subtitle-color'].';'; ?>
	}
<?php /* Comment Title */ ?>
	.comments-title-area h2 { 
		font-family: '<?php echo $cuckoo_font['comment-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['comment-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['comment-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['comment-style'] == null ? '' : 'font-style:'.$cuckoo_font['comment-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['comment-size'] == null ? '' : 'font-size:'.$cuckoo_font['comment-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['comment-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['comment-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['comment-color'] == null ? '' : 'color:'.$cuckoo_font['comment-color'].';'; ?>
	}
<?php /* Leave a reply */ ?>
	.respond-column-1 h3 { 
		font-family: '<?php echo $cuckoo_font['reply-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['reply-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['reply-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['reply-style'] == null ? '' : 'font-style:'.$cuckoo_font['reply-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['reply-size'] == null ? '' : 'font-size:'.$cuckoo_font['reply-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['reply-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['reply-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['reply-color'] == null ? '' : 'color:'.$cuckoo_font['reply-color'].';'; ?>
	}
<?php /* h1 */ ?>
	h1 { 
		font-family: '<?php echo $cuckoo_font['h1-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['h1-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['h1-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['h1-style'] == null ? '' : 'font-style:'.$cuckoo_font['h1-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['h1-size'] == null ? '' : 'font-size:'.$cuckoo_font['h1-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['h1-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['h1-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['h1-color'] == null ? '' : 'color:'.$cuckoo_font['h1-color'].';'; ?>
	}
<?php /* h2 */ ?>
	h2 { 
		font-family: '<?php echo $cuckoo_font['h2-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['h2-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['h2-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['h2-style'] == null ? '' : 'font-style:'.$cuckoo_font['h2-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['h2-size'] == null ? '' : 'font-size:'.$cuckoo_font['h2-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['h2-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['h2-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['h2-color'] == null ? '' : 'color:'.$cuckoo_font['h2-color'].';'; ?>
	}
<?php /* h3 */ ?>
	h3, li.tab-navig a, .number-checked-box h3, div.product .woocommerce_tabs ul.tabs li a, #content div.product .woocommerce_tabs ul.tabs li a , #reviews #comments h2, .cart-collaterals .cart_totals h2,.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce-page div.product .woocommerce-tabs ul.tabs li, .woocommerce #content div.product .woocommerce-tabs ul.tabs li, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li { 
		font-family: '<?php echo $cuckoo_font['h3-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['h3-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['h3-weight'].'!important;'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['h3-style'] == null ? '' : 'font-style:'.$cuckoo_font['h3-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['h3-size'] == null ? '' : 'font-size:'.$cuckoo_font['h3-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['h3-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['h3-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['h3-color'] == null ? '' : 'color:'.$cuckoo_font['h3-color'].';'; ?>
	}
<?php /* h4 */ ?>
	h4 { 
		font-family: '<?php echo $cuckoo_font['h4-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['h4-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['h4-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['h4-style'] == null ? '' : 'font-style:'.$cuckoo_font['h4-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['h4-size'] == null ? '' : 'font-size:'.$cuckoo_font['h4-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['h4-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['h4-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['h4-color'] == null ? '' : 'color:'.$cuckoo_font['h4-color'].';'; ?>
	}
<?php /* h5 */ ?>
	h5 { 
		font-family: '<?php echo $cuckoo_font['h5-font']; ?>' , sans-serif;
		<?php echo $testimonials_author_weight = $cuckoo_font['h5-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['h5-weight'].';'; ?>
		<?php echo $testimonials_author_style = $cuckoo_font['h5-style'] == null ? '' : 'font-style:'.$cuckoo_font['h5-style'].';'; ?>
		<?php echo $testimonials_author_size = $cuckoo_font['h5-size'] == null ? '' : 'font-size:'.$cuckoo_font['h5-size'].'px;'; ?>
		<?php echo $testimonials_author_lheight = $cuckoo_font['h5-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['h5-lheight'].';'; ?>
		<?php echo $testimonials_author_color = $cuckoo_font['h5-color'] == null ? '' : 'color:'.$cuckoo_font['h5-color'].';'; ?>
	}
<?php /* Lightbox Title */ ?>
	.lightbox-title { 
		font-family: '<?php echo $cuckoo_font['lightbox-font']; ?>' , sans-serif;
		<?php echo $lightbox_weight = $cuckoo_font['lightbox-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['lightbox-weight'].';'; ?>
		<?php echo $lightbox_style = $cuckoo_font['lightbox-style'] == null ? '' : 'font-style:'.$cuckoo_font['lightbox-style'].';'; ?>
		<?php echo $lightbox_size = $cuckoo_font['lightbox-size'] == null ? '' : 'font-size:'.$cuckoo_font['lightbox-size'].'px;'; ?>
		<?php echo $lightbox_lheight = $cuckoo_font['lightbox-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['lightbox-lheight'].';'; ?>
		<?php echo $lightbox_color = $cuckoo_font['lightbox-color'] == null ? '' : 'color:'.$cuckoo_font['lightbox-color'].';'; ?>
	}
<?php /* Footer Font */ ?>
	.footer-txt-line { 
		font-family: '<?php echo $cuckoo_font['footer-font']; ?>' , sans-serif;
		<?php echo $lightbox_weight = $cuckoo_font['footer-weight'] == null ? '' : 'font-weight:'.$cuckoo_font['footer-weight'].';'; ?>
		<?php echo $lightbox_style = $cuckoo_font['footer-style'] == null ? '' : 'font-style:'.$cuckoo_font['footer-style'].';'; ?>
		<?php echo $lightbox_size = $cuckoo_font['footer-size'] == null ? '' : 'font-size:'.$cuckoo_font['footer-size'].'px;'; ?>
		<?php echo $lightbox_lheight = $cuckoo_font['footer-lheight'] == null ? '' : 'line-height:'.$cuckoo_font['footer-lheight'].';'; ?>
		<?php echo $lightbox_color = $cuckoo_font['footer-color'] == null ? '' : 'color:'.$cuckoo_font['footer-color'].';'; ?>
	}
<?php /* Logo title settings */ ?>
	.logo_content div.logo a {
		font-family: '<?php  echo $cuckoo_header['title_font'];  ?>' , sans-serif  ;
		<?php echo $title_weight = $cuckoo_header['title_font_weight'] == null ? '' :  'font-weight:'.$cuckoo_header['title_font_weight'].';'; ?>
		<?php echo $title_style = $cuckoo_header['title_font_style'] == null ? '' : 'font-style:'.$cuckoo_header['title_font_style'].';'; ?>
		<?php echo $title_size = $cuckoo_header['title_font_size'] == null ? '' : 'font-size:'.$cuckoo_header['title_font_size'].'px;'; ?>
		<?php echo $title_size = $cuckoo_header['title_font_lheight'] == null ? '' : 'line-height:'.$cuckoo_header['title_font_lheight'].';'; ?>
		<?php echo $title_size = $cuckoo_header['title_font_color'] == null ? '' : 'color:'.$cuckoo_header['title_font_color'].';'; ?>
	}
<?php /* Header settings ( since V2.7 )  */ ?>
<?php if( $cuckoo_header['header_type'] == 1 ): ?>
	.nav-wrap-fixed { display:block!important; }
<?php elseif( $cuckoo_header['header_type'] == 2 ): ?>
	@media screen and (min-width: 1024px) {
		.nav-wrap-fixed { display:block!important; height:88px!important; }
		.logo_content { max-height: 88px!important; min-height: 88px!important; height:88px!important; margin-top: 0!important; }
		.logo_content .logo { height: 88px!important; }
		.logo_content .logo a, div#theme_logo .logo_content .logo a img { max-height: 88px!important; }
		#header_nav nav { padding:0!important; }
		.ever-like-display { margin-top: 63px; }
	}
<?php endif; ?>
</style>
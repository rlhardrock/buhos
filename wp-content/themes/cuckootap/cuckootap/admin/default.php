<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/
 
/******************************************************************  Default settings  *****************************************/

//options names 
$builder 			= THEMEPREFIX . "_builder_settings";
$slider 			= THEMEPREFIX . "_slidershow_settings";
$footer 			= THEMEPREFIX . "_header_footer_settings";
$social 			= THEMEPREFIX . "_social_settings";
$general_settings 	= THEMEPREFIX . "_general_settings";
$gallery 			= THEMEPREFIX . "_gallery_settings";
$contact 			= THEMEPREFIX . "_contact_settings";
$fonts				= THEMEPREFIX . "_font_settings";
$color_styles		= THEMEPREFIX . "_style_settings";

// homepage builder 
$builder_default = get_option($builder);
if(!$builder_default){
	$builder_default = array( 
	0 => array(
		1 => array( 
			'remove' 				=> 1 , 
			'title' 				=> '',
			'slug' 					=> '', 
			'source' 				=> '',
			'backgroundColor' 		=> '#',
			'imgUrl' 				=> '',
			'imgAttachment' 		=> '',
			'imgRepeat' 			=> '',
			'imgPosition' 			=> '',
			'testimonialCount'		=> 1 ,
			'teamCount'				=> 4 ,
			'blogCount'				=> 4 ,
			'testimonialsSorting'	=> '',
			'teamSorting'			=> '',
			'blogSorting'			=> '',
			'postContent'			=> '',
			'blogExclude'			=> '',
			'blogExcludeElement'	=> '',
			'pageUrl'				=> '',
			'textBoxText'			=> '',
			'textBoxUrlTitle'		=> '',
			'textBoxUrl'			=> '',
			'socialMedia'			=> array('Facebook' => 0, 'Twitter' => 0, 'Google' => 0, 'Flickr' => 0, 'Pinterest' => 0, 'Dribbble' => 0, 'Behance' => 0, 'Youtube' => 0, 'Vimeo' => 0, 'Linkedin' 	=> 0, 'Email' => 0, 'RSS' => 0 ),
			/* New elements Since 2.0 */
			'parallax' 				=> 1,
			'parallax-speed' 		=> 10,
			'worksCount'			=> 4 ,
			'worksSorting'			=> '',
			'worksContent'			=> '',
			'worksExclude'			=> '',
			'worksExcludeElement'	=> '',
			/* New elements Since 2.4 */
			'wooSource'        		=> 'Categories',
			'productContent'        => '',
			'categoriesContent'     => '',
			'productsCount' 		=>  4 ,
			'wooSorting' 			=> '',
			'wooOrder' 				=> '',
			/* New elements Since 2.7 */
			'imageTopPadding' 		=> '',
			'imageBottomPadding' 	=> '',
			'imageText'				=> '',
			'linksWooTitle'			=> '',
			'cart_show'				=> ''
			)
		)
	);
	add_option( $builder , $builder_default);
}

//slideshow player default's
$slider_default = get_option($slider);
if(!$slider_default) :
	$elements = array( 'elements' => array( 
			0 => array( 1 => array( 'remove' => 1 , 'img' => get_template_directory_uri(). '/images/slideshow-default1.jpg', 'title' => 'CuckooTap', 'slide_title' => 'CuckooTap', 'slide_subtitle' => 'Fully Responsive<br>WordPress Theme', 'title_button_slides' => 'Theme Demo', 'url_button_slides' => 'http://www.demo.cuckoothemes.com/cuckootap', 'title_aling' => 'Left')),
			1 => array( 2 => array( 'remove' => 2 , 'img' => get_template_directory_uri(). '/images/slideshow-default2.jpg', 'title' => 'CuckooTap', 'slide_title' => 'CuckooTap', 'slide_subtitle' => 'Fully Responsive<br>WordPress Theme', 'title_button_slides' => 'Theme Demo', 'url_button_slides' => 'http://www.demo.cuckoothemes.com/cuckootap', 'title_aling' => 'Right'))
		));
	$settings = array( 'settings' => array(	'nivo_effect' => 'random', 'caption_effect' => 'slide', 'slider_timeout' => 6000, 'slider_hover' => 'true', 'animationspeed' =>  1000 , 'box_rows' => 4 , 'box_cols' => 12, 'rev_alias' => '', 'homepage_slider' => 'Nivo Slider' ));
	$slider_default = array_merge($elements, $settings);
	add_option( $slider , $slider_default);
endif;

//footer-header default's
$footer_default = get_option($footer);
if(!$footer_default) :

	$icone_default_attach = LOGOATTACH;
	$top_text_default = 'CuckooThemes | Copyright 2012 <a href="http://cuckoothemes.com">CuckooThemes.com</a>';
	$bottom_text_default = 'Powered by <a href="http://wordpress.org/">WordPress</a> | Created by <a href="http://cuckoothemes.com">CuckooThemes.com</a>';
	
	$footer_default = array(
	'logo_setting' 		=> 'Plain Text Logo',
	'plain_text_header' => 'CuckooTap',
	'title_font'		=> 'BebasNeue',
	'title_font_weight'	=> 'normal',
	'title_font_style'	=> '',
	'title_font_size'	=> 27,
	'title_font_lheight'=> 1.1,
	'title_font_color'	=> '' ,
	'image_url' 		=> '',
	'image_title' 		=> '', 
	'line1' 			=> $top_text_default ,
	'line2' 			=> $bottom_text_default ,
	'line3' 			=> '',
	'header_type'		=> 0
	);
	add_option( $footer , $footer_default);
	
endif;

//social media default's
$social_default = get_option($social);
if( !$social_default['elements'][1] ) :

	$social_default = array( 
		'elements' => array(
			'1' => array( '1' => array( 'id' => '1', 'name' => 'Facebook', 'class' => 'facebook', 'link' => '' , 'description' => 'Enter your Facebook URL.', 'values' => '' )),
			'2' => array( '2' => array( 'id' => '2' , 'name' => 'Twitter', 'class' => 'twitter', 'link' => '' , 'description' => 'Enter your Twitter URL.', 'values' => '' )),
			'3' => array( '3' => array( 'id' => '3', 'name' => 'Google+', 'class' => 'google' , 'link' => '' , 'description' => 'Enter your Google+ URL.', 'values' => '' )),
			'4' => array( '4' => array( 'id' => '4', 'name' => 'Flickr', 'class' => 'flickr' , 'link' => '' , 'description' => 'Enter your Flickr URL.', 'values' => '' )),
			'5' => array( '5' => array( 'id' => '5', 'name' => 'Instagram', 'class' => 'instagram' , 'link' => '' , 'description' => 'Enter your Instagram URL.', 'values' => '' )),
			'6' => array( '6' => array(  'id' => '6', 'name' => 'Pinterest', 'class' => 'pinterest' , 'link' => '' , 'description' => 'Enter your Pinterest URL.', 'values' => '' )),
			'7' => array( '7' => array( 'id' => '7', 'name' => 'Dribble', 'class' => 'dribble' , 'link' => '' , 'description' => 'Enter your Dribble URL.', 'values' => '' )),
			'8' => array( '8' => array( 'id' => '8', 'name' => 'Behance', 'class' => 'behance' , 'link' => '' , 'description' => 'Enter your Behance URL.', 'values' => '' )),
			'9' => array( '9' => array( 'id' => '9', 'name' => 'YouTube', 'class' => 'youtube' , 'link' => '' , 'description' => 'Enter your YouTube URL.', 'values' => '' )),
			'10' => array( '10' => array( 'id' => '10', 'name' => 'Vimeo', 'class' => 'vimeo' , 'link' => '' , 'description' => 'Enter your Vimeo URL.', 'values' => '' )),
			'11' => array( '11' => array( 'id' => '11', 'name' => 'Linkedin', 'class' => 'linkendin' , 'link' => '' , 'description' => 'Enter your Linkedin URL.', 'values' => '' )),
			'12' => array( '12' => array( 'id' => '12', 'name' => 'Email', 'class' => 'email' , 'link' => 'mailto:' , 'description' => 'Enter your contact Email Address.', 'values' => '' )),
			'13' => array( '13' => array( 'id' => '13', 'name' => 'RSS', 'class' => 'rss' , 'link' => '', 'description' => 'Enter the RSS feed URL.', 'values' => home_url( '/' )."feed/" ))
		),
		'settings' => array( 
			'post' => array(
				'post-facebook' 		=> '',
				'post-facebook-id' 		=> '',
				'post-twitter' 			=> '',
				'post-twitter-share' 	=> '',
				'post-google' 			=> '',
				'post-pinterest' 		=> '',
			), 
			'work' => array(
				'work-facebook' 		=> '',
				'work-facebook-id' 		=> '',
				'work-twitter' 			=> '',
				'work-twitter-share' 	=> '',
				'work-google' 			=> '',
				'work-pinterest' 		=> '',
			),
			'another' => array(
				'display_media_search' => 1
			)
		)
	);
	add_option( $social , $social_default);

endif;


// general settings default's
$default_settings = get_option($general_settings);

/* Default If first time */
if( !$default_settings ) :

$default_settings = array( 

'theme-style' 			=> 'dark',
'responsive' 			=> 'Yes',
'smooth' 				=> 1,
'related_works' 		=> 'display',
'related_work_title' 	=> 'Related Works',
'related_posts' 		=> 'display',
'related_post_title' 	=> 'Related Post',
'favicon_url' 			=> THEMEICONE ,
'tracking_code' 		=> ''
);

add_option( $general_settings , $default_settings);

endif;

/*-- If CuckooTap is a smaller version of the 1.6 --*/
if($default_settings['responsive'] == ""){
	$default_settings = array( 
	'theme-style' 			=> $default_settings['theme-style'],
	'responsive' 			=> 'Yes',
	'related_works' 		=> $default_settings['related_works'],
	'related_work_title' 	=> $default_settings['related_work_title'],
	'related_posts' 		=> $default_settings['related_posts'],
	'related_post_title' 	=> $default_settings['related_post_title'],
	'favicon_url' 			=> $default_settings['favicon_url'] ,
	'tracking_code' 		=> $default_settings['tracking_code']
	);
	update_option( $general_settings , $default_settings );
}

$default_css = get_option($color_styles);

if( !$default_css ) :

$default_css = array( 
	'subtitle-static' 			=> '#ffffff' , 
	'subtitle-hover' 			=> '#D9164E' , 
	'subtitle-visited' 			=> '#' , 	
	'underline-static' 			=> '#D9164E' , 
	'underline-hover' 			=> '#' , 
	'underline-visited' 		=> '#' , 
	'another-hover' 			=> '#D9164E' , 
	'another-visited' 			=> '#' , 
	'theme-primary-color' 		=> '#D9164E' , 
	'theme-secondary-1-color' 	=> '#000000' , 
	'theme-secondary-2-color' 	=> '#4F4F4F' , 
	'theme-secondary-3-color' 	=> '#EBEBEB' , 
	'selected-color' 			=> '#D9164E' , 
	'ipad-shadow-color' 		=> '#515151' , 
	'all-button-color' 			=> '#4A4A4A' , 
	'map-button-color' 			=> '#3878C7' , 
	'reply-button-color' 		=> '#B7B7B7' ,
	'first-comment-color' 		=> '#EBEBEB' , 
	'children-comment-color' 	=> '#ffffff' , 
	'reply-block-color' 		=> '#C1C1C1' , 
	'subtitle-line-color' 		=> '#A7A7A7' , 
	'comment-line-color' 		=> '#D4D1CE' , 
	'all-lines-color' 			=> '#D4D1CE' , 
	'background-position' 		=> '' , 
	'background-image' 			=> '' , 
	'background-repeat' 		=> '' , 
	'background-attachment' 	=> '' , 
	'background-color' 			=> '#',
	'selected-font-color' 		=> '#ffffff', 
	'lightbox-color' 			=> '#ffffff',
	'display_one_px_effect' 	=> 1,
	'overlay_lines_slideshow' 	=> 1,
	'related-works-position' 	=> '' , 
	'related-works-image' 		=> '' , 
	'related-works-repeat' 		=> '' , 
	'related-works-attachment' 	=> '' , 
	'related-works-color' 		=> '#' , 	
	'related-posts-position' 	=> '' , 
	'related-posts-image' 		=> '' , 
	'related-posts-repeat' 		=> '' , 
	'related-posts-attachment' 	=> '' , 
	'related-posts-color' 		=> '#ffffff' , 	
	'footer-position' 			=> '' , 
	'footer-image' 				=> '' , 
	'footer-repeat' 			=> '' , 
	'footer-attachment' 		=> '' , 
	'footer-color' 				=> '#000000' , 
		/* New elements Since 2.0 */
	'parallax' 					=> 2, 
	'parallax-speed' 			=> 10,	
	'parallax-related-works' 	=> 2, 
	'parallax-speed-related-works' => 10,	
	'parallax-related-post' 	=> 2, 
	'parallax-speed-related-post' => 10,	
	'parallax-footer' 			=> 2, 
	'parallax-speed-footer' 	=> 10,
);

	add_option( $color_styles , $default_css);

endif;

// gallery default's
$default_gallery = get_option($gallery);
if( !$default_gallery ) :

$default_gallery = array(
	'homepage'			=> '',
	'homepage_how'		=> 8,
	'portfolio'			=> '',
	'exclude_name'		=> '',
	'exclude'			=> '',
	'port_exclude_name'	=> '',
	'exclude_portfilio' => '',
	'homepage_sort'		=> 'rand',
	'portfolio_sort'	=> 'rand',
	'by_type_sort'		=> 'rand'
);

	add_option( $gallery , $default_gallery);

endif;

// contact default's
$default_contact = get_option($contact);
if( !$default_contact ) :
$default_contact = array(
	'displayInHomepage' 	=> 1 , 
	'DisplayinLanding' 		=> 1 , 
	'contact_title' 		=> 'Contact' , 
	'contact_address' 		=> '' ,
	'contact_details' 		=> '' ,
	'contact_primary_email'	=> '' ,
	'contact_form_email'	=> '' ,
	'contact_web'			=> '' ,
	'display_icon'			=> 'Yes' ,
	'google_properties'		=> 'london' ,
	'google_zoom_level'		=> 15 ,		
	/* New elements Since 2.3 */	
	'parallax'				=> 0 ,		
	'img_url'				=> '' ,		
	'imgPosition'			=> '' ,		
	'imgRepeat'				=> '' ,		
	'imgAttachment'			=> '' ,		
	'parallax-speed'		=> 10 ,		
	'backgroundColor'		=> '#' ,		
	'map_show'				=> 1
);
add_option( $contact , $default_contact);
endif;/*-- If CuckooTap is a smaller version of the 2.3 --*/
if( $default_contact['parallax'] == "" ) :
$default_contact = array(	
	'displayInHomepage' 	=> $default_contact['displayInHomepage'] , 	
	'DisplayinLanding' 		=> $default_contact['DisplayinLanding'] , 	
	'contact_title' 		=> $default_contact['contact_title'] , 	
	'contact_address' 		=> $default_contact['contact_address'] ,	
	'contact_details' 		=> $default_contact['contact_details'] ,	
	'contact_primary_email'	=> $default_contact['contact_primary_email']	,	
	'contact_form_email'	=> $default_contact['contact_form_email'] ,	
	'contact_web'			=> $default_contact['contact_web'] ,	
	'display_icon'			=> $default_contact['display_icon'] ,	
	'google_properties'		=> $default_contact['google_properties'] ,	
	'google_zoom_level'		=> $default_contact['google_zoom_level'] ,		
	'parallax'				=> 0 ,		
	'img_url'				=> '' ,		
	'imgPosition'			=> '' ,		
	'imgRepeat'				=> '' ,		
	'imgAttachment'			=> '' ,		
	'parallax-speed'		=> 10 ,		
	'backgroundColor'		=> '#' ,		
	'map_show'				=> 1
);	
update_option( $contact , $default_contact );endif;

// font default's

$default_fonts = get_option($fonts);
if( !$default_fonts ) :

$default_fonts = array(
	/* Slideshow main title */
	'slideshow-title-font' 			=> 'BebasNeue' , 
	'slideshow-title-weight' 		=> 'normal' ,
	'slideshow-title-style' 		=> 'normal' ,
	'slideshow-title-size' 			=> '100' ,	
	'slideshow-title-lheight' 		=> '1' ,	
	'slideshow-title-color' 		=> '' ,	
	/* Slideshow Subtitle */
	'slideshow-subtitle-font' 		=> 'BebasNeue' , 
	'slideshow-subtitle-weight' 	=> 'normal' ,
	'slideshow-subtitle-style' 		=> 'normal' ,
	'slideshow-subtitle-size' 		=> '62' ,	
	'slideshow-subtitle-lheight' 	=> '1.1' ,	
	'slideshow-subtitle-color' 		=> '' ,		
	/* Post, Work & Page Title */
	'pwp-title-font' 				=> 'BebasNeue' , 
	'pwp-title-weight' 				=> 'normal',
	'pwp-title-style' 				=> 'normal' ,
	'pwp-title-size' 				=> '100' ,	
	'pwp-title-lheight' 			=> '1.1' ,	
	'pwp-title-color' 				=> '' ,		
	/* Post, Work & Page Subtitle */
	'pwp-subtitle-font' 			=> 'BebasNeue' , 
	'pwp-subtitle-weight' 			=> 'normal' ,
	'pwp-subtitle-style' 			=> 'normal' ,
	'pwp-subtitle-size' 			=> '23' ,	
	'pwp-subtitle-lheight' 			=> '1.1' ,	
	'pwp-subtitle-color' 			=> '' ,	
	/* Unit page Title */
	'page-unit-title-font' 			=> 'BebasNeue' , 
	'page-unit-title-weight' 		=> 'normal' ,
	'page-unit-title-style' 		=> 'normal' ,
	'page-unit-title-size' 			=> '27' ,	
	'page-unit-title-lheight' 		=> '1.1' ,	
	'page-unit-title-color' 		=> '' ,		
	/* Text Box & Testimonial Text */
	'text-box-testimonials-font' 	=> 'BebasNeue' , 
	'text-box-testimonials-weight' 	=> 'normal' ,
	'text-box-testimonials-style' 	=> 'normal' ,
	'text-box-testimonials-size' 	=> '62' ,	
	'text-box-testimonials-lheight' => '1.1' ,	
	'text-box-testimonials-color' 	=> '' ,			
	/* Testimonial Author */
	'testimonial-author-font' 		=> 'BebasNeue' , 
	'testimonial-author-weight' 	=> 'normal' ,
	'testimonial-author-style' 		=> 'normal' ,
	'testimonial-author-size' 		=> '23' ,	
	'testimonial-author-lheight'	=> '' ,	
	'testimonial-author-color' 		=> '' ,		
	/* Menus */
	'menus-font' 					=> 'BebasNeue' , 
	'menus-weight' 					=> 'normal' ,
	'menus-style' 					=> 'normal' ,
	'menus-size' 					=> '23' ,	
	'menus-lheight' 				=> '1.1' ,	
	'menus-color' 					=> '' ,	
	/* Menus Dropdown */
	'menus-dropdown-font' 			=> 'BebasNeue' , 
	'menus-dropdown-weight' 		=> 'normal' ,
	'menus-dropdown-style' 			=> 'normal' ,
	'menus-dropdown-size' 			=> '20'  ,	
	'menus-dropdown-lheight' 		=> '1.1' ,	
	'menus-dropdown-color' 			=> '#ffffff' ,		
	/* Button Title */
	'button-font' 					=> 'BebasNeue', 
	'button-weight' 				=> 'normal' ,
	'button-style' 					=> 'normal' ,
	'button-size' 					=> '23' ,	
	'button-lheight' 				=> '1.1' ,	
	'button-color' 					=> '',		
	/* Body Font */
	'body-font' 					=> THEMEFONT , 
	'body-weight' 					=> 'normal' ,
	'body-style' 					=> 'normal' ,
	'body-size' 					=> '12' ,	
	'body-lheight' 					=> '1.5' ,	
	'body-color' 					=> '',	
	/* Details Font */
	'details-font' 					=> THEMEFONT , 
	'details-weight' 				=> 'normal' ,
	'details-style' 				=> 'normal' ,
	'details-size' 					=> '11' ,	
	'details-lheight' 				=> '' ,	
	'details-color' 				=> '',
	/* Alerts Font */
	'alerts-font' 					=> 'BebasNeue' , 
	'alerts-weight' 				=> 'normal' ,
	'alerts-style' 					=> 'normal' ,
	'alerts-size' 					=> '' ,	
	'alerts-lheight' 				=> '1.1' ,	
	'alerts-color' 					=> '' ,
	/* Post And Team List Title Font */
	'ptl-title-font' 				=> 'BebasNeue' , 
	'ptl-title-weight' 				=> 'lighter' ,
	'ptl-title-style' 				=> 'normal' ,
	'ptl-title-size' 				=> '27' ,	
	'ptl-title-lheight' 			=> '' ,	
	'ptl-title-color' 				=> '' ,	
	
	/* Team List Occupation */
	'occupation-font' 				=> 'BebasNeue' , 
	'occupation-weight' 			=> 'normal' ,
	'occupation-style' 				=> 'normal' ,
	'occupation-size' 				=> '20' ,	
	'occupation-lheight' 			=> '' ,	
	'occupation-color' 				=> '' ,	
	/* Team & Testimonial content text */
	'tt-content-font' 				=> 'BebasNeue' , 
	'tt-content-weight' 			=> 'normal' ,
	'tt-content-style' 				=> 'normal' ,
	'tt-content-size' 				=> '27' ,	
	'tt-content-lheight' 			=> '' ,	
	'tt-content-color' 				=> '' ,	
	/* Team Member "Follow Me" & Post Tags & testimonials company */
	'tm-tt-font' 					=> 'BebasNeue' , 
	'tm-tt-weight' 					=> 'normal' ,
	'tm-tt-style' 					=> 'normal' ,
	'tm-tt-size' 					=> '27' ,	
	'tm-tt-lheight' 				=> '' ,	
	'tm-tt-color' 					=> '' ,	
	/* Work List title */
	'workl-title-font' 				=> 'BebasNeue' , 
	'workl-title-weight' 			=> 'lighter' ,
	'workl-title-style' 			=> 'normal' ,
	'workl-title-size' 				=> '23' ,	
	'workl-title-lheight' 			=> '' ,	
	'workl-title-color' 			=> '' ,	
	/* Work List subtitle */
	'workl-subtitle-font' 			=> 'BebasNeue' , 
	'workl-subtitle-weight' 		=> 'normal' ,
	'workl-subtitle-style' 			=> 'normal' ,
	'workl-subtitle-size' 			=> '20' ,	
	'workl-subtitle-lheight' 		=> '' ,	
	'workl-subtitle-color' 			=> '' ,	
	/* Comment Title */
	'comment-font' 					=> 'BebasNeue' , 
	'comment-weight' 				=> 'normal' ,
	'comment-style' 				=> 'normal' ,
	'comment-size' 					=> '32' ,	
	'comment-lheight' 				=> '' ,	
	'comment-color' 				=> '' ,	
	/* Leave a Reply */
	'reply-font' 					=> 'BebasNeue' , 
	'reply-weight' 					=> 'normal' ,
	'reply-style' 					=> 'normal' ,
	'reply-size' 					=> '27' ,	
	'reply-lheight' 				=> '' ,	
	'reply-color' 					=> '' ,	
	/* H1 */
	'h1-font' 						=> 'BebasNeue' , 
	'h1-weight' 					=> 'normal' ,
	'h1-style' 						=> 'normal' ,
	'h1-size' 						=> '62' ,	
	'h1-lheight' 					=> '' ,	
	'h1-color' 						=> '' ,	
	/* H2 */
	'h2-font' 						=> 'BebasNeue' , 
	'h2-weight' 					=> 'normal',
	'h2-style' 						=> 'normal' ,
	'h2-size' 						=> '32' ,	
	'h2-lheight' 					=> '' ,	
	'h2-color' 						=> '' ,	
	/* H3 */
	'h3-font' 						=> 'BebasNeue' , 
	'h3-weight' 					=> 'normal' ,
	'h3-style' 						=> 'normal' ,
	'h3-size' 						=> '27' ,	
	'h3-lheight' 					=> '' ,	
	'h3-color' 						=> '' ,
	/* H4 */
	'h4-font' 						=> 'BebasNeue' , 
	'h4-weight' 					=> 'normal' ,
	'h4-style' 						=> 'normal' ,
	'h4-size' 						=> '23' ,	
	'h4-lheight' 					=> '' ,	
	'h4-color' 						=> '' ,
	/* H5 */
	'h5-font' 						=> 'BebasNeue' , 
	'h5-weight' 					=> 'normal' ,
	'h5-style' 						=> 'normal' ,
	'h5-size' 						=> '20' ,	
	'h5-lheight' 					=> '' ,	
	'h5-color' 						=> '' ,	
	/* lightbox title */
	'lightbox-font' 				=> THEMEFONT , 
	'lightbox-weight' 				=> 'Bold' ,
	'lightbox-style' 				=> 'normal' ,
	'lightbox-size' 				=> '12' ,	
	'lightbox-lheight' 				=> '1.5' ,	
	'lightbox-color' 				=> '' ,
	/* footer font */
	'footer-font' 					=> THEMEFONT , 
	'footer-weight' 				=> 'normal' ,
	'footer-style' 					=> 'normal' ,
	'footer-size' 					=> '12' ,	
	'footer-lheight' 				=> '1.5' ,	
	'footer-color' 					=> '' ,
);

	add_option( $fonts , $default_fonts);

endif;
?>
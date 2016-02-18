<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
**************
*
*/
$cuckoo_builder = get_option( THEMEPREFIX . "_builder_settings" );

/* woocommerce */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	$wooActive = 1;
	$template_list = array(
		'-- Select Source --',
		'Blog Posts',
		'Page',
		'Social Media',
		'Slideshow',
		'Team',	
		'Testimonials',	
		'Text Box',
		'Works Gallery',
		'WooCommerce',
		'HTML Text',
		'Woo Navigation Bar'
	);
}else{
	$wooActive = 0;
	$template_list = array(
		'-- Select Source --',
		'Blog Posts',
		'Page',
		'Social Media',
		'Slideshow',
		'Team',	
		'Testimonials',	
		'Text Box',
		'Works Gallery',
		'HTML Text'
	);
}

sort($template_list);
$socialMediaFirst = array(
	'Facebook' 	=> 0, 
	'Twitter' 	=> 0, 
	'Google' 	=> 0, 
	'Flickr' 	=> 0, 
	'Instagram' => 0, 
	'Pinterest' => 0, 
	'Dribbble' 	=> 0, 
	'Behance' 	=> 0, 
	'YouTube' 	=> 0, 
	'Vimeo' 	=> 0, 
	'Linkedin' 	=> 0, 
	'Email' 	=> 0, 
	'RSS'		=> 0 
);

$wooDescAsc = array(
	'asc' => 'Ascending Order',
	'desc' => 'Descending Order',
);

$sortableWoo = array(
	'title' => 'Title',
	'name' => 'Name',
	'date' => 'Date',
	'rand' => 'Random'
);

$color_position = array(
	'Left',
	'Center',
	'Right'
);
$repeat_img = array(
	'no-repeat'	=> 'No repeat',
	'repeat' 	=> 'Tile',
	'repeat-x'	=> 'Tile Horizontally',
	'repeat-y'	=> 'Tile Vertically'
);
$attachament_img = array(
	'scroll' 	=> 'Scroll',
	'fixed'  	=> 'Fixed'
);
$sorting_array = array(
	'rand' 		=> 'Random',
	'menu_order'=> 'Menu Order',
	'date'		=> 'By Date',
	'title'		=> 'By Title',
	'modified'	=> 'By Last Modified Date',
);
?>

<section id="main_content">
<?php

if(isset($_REQUEST['all']))
{
/* all names settings */
	$r = 1;
	$ItemsAll = array();
	$elements = array();
	$social_array = array();
	$items_array = explode(',', substr($_POST['items'], 0, -1));
	foreach($items_array as $key=>$item) 
	{ 
		$items = substr($item,5);
		if($items != '')
		$ItemsAll[$key] = $items;
		$keys = $key+$r;
		
		// wpml cuckootap since 2.9
		if( function_exists('icl_register_string') ) :
			icl_register_string(THEMENAME.' Homepage Builder unit nr-'.$items, 'Title', $_POST["title-".$items]);
			icl_register_string(THEMENAME.' Homepage Builder unit nr-'.$items, 'Text Box unit text', unit_title_scan($_POST['textBox-text-'.$items]));
			icl_register_string(THEMENAME.' Homepage Builder unit nr-'.$items, 'Text Box unit button title', unit_title_scan($_POST['textBoxUrlTitle-'.$items]));
			icl_register_string(THEMENAME.' Homepage Builder unit nr-'.$items, 'HTML unit text', cuckoo_get_value( $_POST["imageText-".$items] ));
		endif;
		
		
		$elements_insert = array( $keys => array( 
		'remove' 				=> $keys , 
		'title' 				=> unit_title_scan($_POST["title-".$items]),
		'slug' 					=> $slug = ( esc_attr($_POST["slug-".$items]) == null ? make_ID_in_text( esc_attr($_POST["title-".$items]) ) : esc_attr($_POST["slug-".$items]) ),
		'source' 				=> esc_attr($_POST["unit-source-".$items]),
		'backgroundColor' 		=> $backgoundColorHere = esc_attr($_POST["color_picker_color-".$items]) == "#" ? "" : esc_attr($_POST["color_picker_color-".$items]),
		'imgUrl' 				=> esc_attr($_POST["upload_image".$items]),
		'imgAttachment' 		=> esc_attr($_POST["radio_attachment-".$items]),
		'imgRepeat' 			=> esc_attr($_POST["radio_repeat-".$items]),
		'imgPosition' 			=> esc_attr($_POST["radio_position-".$items]),
		'testimonialCount'		=> $testimonialCount = esc_attr($_POST["testimonialCount-".$items]) == null ? 1 : esc_attr($_POST["testimonialCount-".$items]),
		'teamCount'				=> $teamCount = esc_attr($_POST["teamCount-".$items]) == null ? 4 : esc_attr($_POST["teamCount-".$items]),
		'blogCount'				=> $blogCount = esc_attr($_POST["blogCount-".$items]) == null ? 4 : esc_attr($_POST["blogCount-".$items]),
		'testimonialsSorting'	=> esc_attr($_POST["testimonialsSorting-".$items]),
		'teamSorting'			=> esc_attr($_POST["teamSorting-".$items]),
		'blogSorting'			=> esc_attr($_POST["blogSorting-".$items]),
		'postContent'			=> esc_attr($_POST["postContent-".$items]),
		'blogExclude'			=> cuckoo_exclude_from_categories($_POST['blogExclude-'.$items] , 'category'),
		'blogExcludeElement'	=> esc_attr($_POST['blogExclude-'.$items]),
		'pageUrl'				=> esc_attr($_POST['pageUrl-'.$items]),
		'pageTitle'				=> unit_title_scan($_POST['title-display-'.$items]),
		'textBoxText'			=> unit_title_scan($_POST['textBox-text-'.$items]),
		'textBoxUrlTitle'		=> unit_title_scan($_POST['textBoxUrlTitle-'.$items]),
		'textBoxUrl'			=> esc_attr($_POST['textBoxUrl-'.$items]),
		'socialMedia'			=> array('Facebook' => esc_attr($_POST["social-".$items."-Facebook"]),
										'Twitter' 	=> esc_attr($_POST["social-".$items."-Twitter"]),
										'Google' 	=> esc_attr($_POST["social-".$items."-Google"]),
										'Flickr' 	=> esc_attr($_POST["social-".$items."-Flickr"]),
										'Instagram' => esc_attr($_POST["social-".$items."-Instagram"]),
										'Pinterest' => esc_attr($_POST["social-".$items."-Pinterest"]),
										'Dribbble' 	=> esc_attr($_POST["social-".$items."-Dribbble"]),
										'Behance' 	=> esc_attr($_POST["social-".$items."-Behance"]),
										'YouTube' 	=> esc_attr($_POST["social-".$items."-YouTube"]),
										'Vimeo' 	=> esc_attr($_POST["social-".$items."-Vimeo"]),
										'Linkedin' 	=> esc_attr($_POST["social-".$items."-Linkedin"]),
										'Email' 	=> esc_attr($_POST["social-".$items."-Email"]),
										'RSS' 		=> esc_attr($_POST["social-".$items."-RSS"])
								),
		/* New elements Since 2.0 */
		'parallax' 				=> esc_attr($_POST['parallax-effect-'.$items]), 
		'parallax-speed' 		=> $speed = ( esc_attr($_POST['parallax-speed-'.$items]) == '' ? 10 : esc_attr($_POST['parallax-speed-'.$items])),
		'worksCount'			=> $worksCount = esc_attr($_POST["worksCount-".$items]) == null ? 4 : esc_attr($_POST["worksCount-".$items]),
		'worksSorting'			=> esc_attr($_POST["worksSorting-".$items]),
		'worksContent'			=> esc_attr($_POST["worksContent-".$items]),
		'worksExclude'			=> cuckoo_exclude_from_categories($_POST['worksExclude-'.$items] , 'types'),
		'worksExcludeElement'	=> esc_attr($_POST['worksExclude-'.$items]),
		/* New elements Since 2.4 */
		'wooSource'        		=> esc_attr($_POST["wooSource-".$items]),
		'productContent'        => esc_attr($_POST["productContent-".$items]),
		'categoriesContent'     => esc_attr($_POST["categoriesContent-".$items]),
		'productsCount' 		=> $productsCount = esc_attr($_POST["productsCount-".$items]) == null ? 4 : esc_attr($_POST["productsCount-".$items]),
		'wooSorting' 			=> esc_attr($_POST["wooSorting-".$items]),
		'wooOrder' 				=> esc_attr($_POST["wooOrder-".$items]),
		/* New elements Since 2.7 */
		'imageTopPadding' 		=> $imageTopPadding = esc_attr($_POST["imageTopPadding-".$items]) == null ? 30 : esc_attr($_POST["imageTopPadding-".$items]),
		'imageBottomPadding' 	=> $imageBottomPadding = esc_attr($_POST["imageBottomPadding-".$items]) == null ? 30 : esc_attr($_POST["imageBottomPadding-".$items]),
		'imageText'				=> cuckoo_get_value( $_POST["imageText-".$items] ),
		'linksWooFontSize'		=> esc_attr( $_POST["linksWooFontSize-".$items] ),
		'cart_show'				=> esc_attr($_POST["cart_show-".$items]),
		/* New elements Since 3.0 */
		'slideShortcode'		=> esc_attr($_POST["slideShortcode-".$items]),
		'slideTopPadding'		=> $padT = esc_attr($_POST["slideTopPadding-".$items]) ? esc_attr($_POST["slideTopPadding-".$items]) : 0 ,
		'slideBottomPadding'	=> $padB = esc_attr($_POST["slideBottomPadding-".$items]) ? esc_attr($_POST["slideBottomPadding-".$items]) : 0
		));
		if( empty($elements_insert[$keys]['title']) ) 
		{ 
			unset($elements_insert[$keys]);
		}		
		array_push($elements, $elements_insert);
		
	}
	ksort($elements);
	$cuckoo_builder = $elements;
	update_option( THEMEPREFIX . "_builder_settings", $cuckoo_builder );
	
	?>  
   <div id="save_upadate" class="updated"><?php _e('New settings saved!', THEMENAME); ?></div>
<?php
}
?>
	<?php cuckoo_framework_head( __('Homepage Builder', THEMENAME) ); ?>
	<script type="text/javascript">
		document.onselectstart = function () { return false; }
	</script>
	<form method="POST" action="">
		<div id="general_settings">
			<?php /* Builder */ ?>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Build Your Homepage', THEMENAME); ?></span>
				<span class="float_right">
					<input id="add_elements" class="builder" rel=".section" style="font-size:11px; font-weight:normal; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; " type="button" value="Add Unit" />
				</span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="desc_bottom" style="padding:20px 0;">
					<?php _e("Using CuckooTap WordPress Theme Homepage Builder you can build custom homepage layout. Add as many homepage units to your homepage as you want, they are unlimited. Drag any homepage unit to arrange the sequence as you wish. It is easy as 1-2-3!<br/><br/>
						To Add New Homepage Unit click Add Unit button and a new unit below all units will appear.<br /> 
						To change any floating unit position drag selected unit up or down by using Drag button.<br /> 
						If you want you can add a Custom Background Image or set Custom Color for this unit.<br /> 
						To delete unit click Delete button and then click Save button. ", THEMENAME); ?>
				</div>
				<div id="section_block" class="builder-container">
					<?php	$builderArray = empty($cuckoo_builder[0]) ? array(0=>array(0)) : $cuckoo_builder ; 
						foreach($builderArray as $keys=>$val)
						{
							foreach($val as $keys=>$values)
							{
								if(is_numeric($keys))
								{
								?>
									<div class="section" id="item-<?php echo $keys; ?>">
										<div class="drag-container-title">
											<span class="float_right">
												<div class="section_change" style="top:0; float:right;"></div>
												<input id="expand-item-<?php echo $keys; ?>" class="expand_button" style="float:left;" type="button" value="Expand" />
												<input id="remove-item-<?php echo $keys; ?>" class="remove_button" style="float:left;" type="button" value="Delete" />
											</span>
											<div class="float_left">
												<div id="unit-title-item-<?php echo $keys; ?>" class="title-item">
													<?php if( empty($values['title']) ) {
														_e("Unit Title",THEMENAME);
													}else{
														echo $values['title']; 
													} ?>
												</div>
											</div>
										</div>
										<div class="drag-container">
											<div class="itemtitleMain">
												<span class="itemTitle"><?php _e("Unit Title",THEMENAME); ?></span>
												<input type="text" id="unit-title-id-<?php echo $keys; ?>" class="unit-title-input itemInput" name="title-<?php echo $keys; ?>" value="<?php if( empty($values['title']) ) { _e("Unit Title",THEMENAME); }else{	echo $values['title']; } ?>"/>
											</div>
											<div class="col-1">
												<span class="itemTitle"><?php _e("Unit Slug",THEMENAME); ?></span>
												<input type="text" id="unit-slug-id-<?php echo $keys; ?>" class="unit-slug-input itemInput" name="slug-<?php echo $keys; ?>" value="<?php echo $slug_to_echo = ( $values['slug'] == null ? make_ID_in_text( $values['title'] ) : $values['slug'] ); ?>"/>
											</div>								
											<div class="col-1 last">
												<span class="itemTitle"><?php _e("Unit Source",THEMENAME); ?></span>
												<select name="unit-source-<?php echo $keys; ?>" id="unit-source-<?php echo $keys; ?>" class="unit-source-select itemInput">
													<?php foreach($template_list as $k => $v){ ?>
														<?php if($values['source'] == $v) { ?>
															<option value="<?php echo $v; ?>" selected><?php echo $v; ?></option>
														<?php } else { ?>
															<option value="<?php echo $v; ?>"><?php echo $v; ?></option>
														<?php } ?>
													<?php } ?>
												</select>
											</div>				
											<?php /* hidden object's */ ?>
											<!-- Testimonials -->
											<div id="testimonials-<?php echo $keys; ?>" class="setting-box testimonials-clone">							
												<div class="col-1">
													<span class="itemHiddenTitle"><?php _e("Enter Number of Testimonials to Display",THEMENAME); ?></span>
													<input type="text" id="testimonialCount-<?php echo $keys; ?>" class="itemCountInput" name="testimonialCount-<?php echo $keys; ?>" value="<?php echo $values['testimonialCount']; ?>"/>
												</div>	
												<div class="col-1 last">
													<span class="itemHiddenTitle"><?php _e("Choose Sorting",THEMENAME); ?></span>
													<select name="testimonialsSorting-<?php echo $keys; ?>" class="itemHiddenCelect">
														<?php foreach($sorting_array as $k => $v){ ?>
															<?php if($values['testimonialsSorting'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>
											</div>
											<!-- Team -->
											<div id="team-<?php echo $keys; ?>" class="setting-box team-clone">
												<div class="col-1">
													<span class="itemHiddenTitle"><?php _e("Enter Number of Team Members to Display",THEMENAME); ?></span>
													<input type="text" id="teamCount-<?php echo $keys; ?>" class="itemCountInput" name="teamCount-<?php echo $keys; ?>" value="<?php echo $values['teamCount']; ?>"/>
												</div>								
												<div class="col-1 last">
													<span class="itemHiddenTitle"><?php _e("Choose Sorting",THEMENAME); ?></span>
													<select name="teamSorting-<?php echo $keys; ?>" class="itemHiddenCelect">
														<?php foreach($sorting_array as $k => $v){ ?>
															<?php if($values['teamSorting'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>
											</div>
											<!-- Blog posts -->
											<div id="blog-post-<?php echo $keys; ?>"  class="setting-box blog-clone">												
												<div class="col-1">
													<span class="itemHiddenTitle"><?php _e("Choose Blog Posts Unit Content",THEMENAME); ?></span>
													<?php
														wp_dropdown_categories( array(
															'class' 			=> 'itemHiddenCelect',
															'name' 				=> 'postContent-'.$keys, 
															'show_option_all'	=> 'All Categories',
															'selected'			=> 	$values['postContent']
														));	
													?>
													<div class="desc_bottom" style="padding-top:15px;">
														<?php _e("Choose Posts Category to be displayed in Homepage Blog Posts Unit.", THEMENAME); ?>
													</div>
												</div>
												<div class="col-1 last">
													<span class="itemHiddenTitle"><?php _e("Exclude Posts Categories",THEMENAME); ?></span>
													<input type="text" id="blogExclude-<?php echo $keys; ?>" class="itemInputText" name="blogExclude-<?php echo $keys; ?>" value="<?php echo $values['blogExcludeElement']; ?>"/>
													<div class="desc_bottom" style="padding-top:15px;">
														<?php _e("Enter a comma-separated list of Posts Categories that you want to exclude from displaying in Homepage Blog Posts Unit. Example: Category1, Category2, Category3", THEMENAME); ?>
													</div>
												</div>
												<div class="col-1" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Enter Number of Posts to Display",THEMENAME); ?></span>
													<input type="text" id="blogCount-<?php echo $keys; ?>" class="itemCountInput" name="blogCount-<?php echo $keys; ?>" value="<?php echo $values['blogCount']; ?>"/>
												</div>								
												<div class="col-1 last" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose Sorting",THEMENAME); ?></span>
													<select name="blogSorting-<?php echo $keys; ?>" class="itemHiddenCelect">
														<?php foreach($sorting_array as $k => $v){ ?>
															<?php if($values['blogSorting'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>
											</div>
											<?php /* New element Since 2.0  */ ?>
											<!-- Works posts -->
											<div id="works-post-<?php echo $keys; ?>"  class="setting-box blog-clone works-unit-setings">											
												<div class="col-1">
													<span class="itemHiddenTitle"><?php _e("Choose Homepage Works Gallery Content",THEMENAME); ?></span>
													<?php
														wp_dropdown_categories( array(
															'class' 			=> 'itemHiddenCelect types-select',
															'name' 				=> 'worksContent-'.$keys, 
															'show_option_all'	=> 'All Types',
															'taxonomy'			=> 'types',
															'selected'			=> 	$values['worksContent']
														));	
													?>
													<div class="desc_bottom" style="padding-top:15px;">
														<?php _e("Choose Work Types to be displayed in Homepage Works Gallery Unit.", THEMENAME); ?>
													</div>
												</div>
												<div class="col-1 last">
													<span class="itemHiddenTitle"><?php _e("Exclude Works Types",THEMENAME); ?></span>
													<input type="text" id="worksExclude-<?php echo $keys; ?>" class="itemInputText works-exclude" name="worksExclude-<?php echo $keys; ?>" value="<?php echo $values['worksExcludeElement']; ?>"/>
													<div class="desc_bottom" style="padding-top:15px;">
														<?php _e("Enter a comma-separated list of Work Types that you want to exclude from displaying in Homepage Works Gallery Unit. Example: Type1, Type2, Type3.", THEMENAME); ?>
													</div>
												</div>
												<div class="col-1" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Enter Number of Works to Display",THEMENAME); ?></span>
													<input type="text" id="worksCount-<?php echo $keys; ?>" class="itemCountInput" name="worksCount-<?php echo $keys; ?>" value="<?php echo $values['worksCount']; ?>"/>
												</div>								
												<div class="col-1 last" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose Sorting",THEMENAME); ?></span>
													<select name="worksSorting-<?php echo $keys; ?>" class="itemHiddenCelect sorting-select">
														<?php foreach($sorting_array as $k => $v){ ?>
															<?php if($values['worksSorting'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>	
											</div>
											<!-- Page -->
											<div id="page-source-<?php echo $keys; ?>" class="setting-box page-clone">
												<div class="col-check">
													<input type="checkbox" class="socialMediaLists titlecheck social-1" id="title-display-<?php echo $keys; ?>" name="title-display-<?php echo $keys; ?>" value="1" <?php echo ($values['pageTitle'] == 1) ? 'checked="checked"' : ''; ?> />
													<label for="title-display-<?php echo $keys; ?>">Hide Title</label>
												</div>
												<div class="col-disc last">
													<div class="desc_bottom" style="padding-top:0; padding-bottom: 20px;">
														<?php _e("Page content will be displayed on a Homepage in Page Unit. <br />Enter Page URL. Example: http://www.cuckoothemes.com/page. <br />Important! Only parent site pages content will be displayed.", THEMENAME); ?>
													</div>
												</div>
												<input type="text" id="pageUrl-<?php echo $keys; ?>" class="itemInputText" name="pageUrl-<?php echo $keys; ?>" value="<?php echo $values['pageUrl']; ?>"/>
											</div>
											<!-- Text Box -->
											<div id="text-box-<?php echo $keys; ?>" class="setting-box text-box-clone">
												<div class="col-1" style="width:70%;">
													<span class="itemHiddenTitle"><?php _e("Enter Your Text" , THEMENAME); ?></span>
													<textarea id="textBox-text-<?php echo $keys; ?>" class="itemTextarea" name="textBox-text-<?php echo $keys; ?>"><?php echo $values['textBoxText']; ?></textarea>
												</div>								
												<div class="col-1 last" style="width:25%;">
													<span class="itemHiddenTitle"><?php _e("Enter Button Title", THEMENAME); ?></span>
													<input type="text" style="margin:0;" id="textBoxUrlTitle-<?php echo $keys; ?>" class="itemInputText urlTitle" name="textBoxUrlTitle-<?php echo $keys; ?>" value="<?php echo $values['textBoxUrlTitle']; ?>"/>
													<span class="itemHiddenTitle" style="padding-top:19px;"><?php _e("Enter Button URL", THEMENAME); ?></span>
													<input type="text" style="margin:0;" id="textBoxUrl-<?php echo $keys; ?>" class="itemInputText urlBox" name="textBoxUrl-<?php echo $keys; ?>" value="<?php echo $values['textBoxUrl']; ?>"/>
												</div>
											</div>
											<!-- Social Media -->
											<div id="socialMedia-<?php echo $keys; ?>" class="setting-box socialMedia-clone">
												<span class="itemHiddenTitle"><?php _e("Choose Social Media Icons to Display" , THEMENAME); ?></span>
												<ul class="socialMediaList">
													<?php $socArray = !empty( $values['socialMedia'] ) ? $values['socialMedia'] : $socialMediaFirst; ?>
													<?php foreach($socArray as $k=>$v): ?>
														<li>
															<input type="checkbox" class="socialMediaLists social-<?php echo $k; ?>" name="social-<?php echo $keys; ?>-<?php echo $k; ?>" value="1" <?php echo ($v == 1) ? 'checked="checked"' : ''; ?> /> <?php echo $showValues = $k == 'Google' ? $k."+" : $k ; ?>
														</li>
													<?php endforeach; ?>
												</ul>
											</div>
											<?php /* Since 2.4 */ ?>
											<!-- Woocommerce -->
											<div id="woocommerce-<?php echo $keys; ?>"  class="setting-box woocommerce-clone works-unit-setings">
												<div class="col-1">
													<span class="itemHiddenTitle"><?php _e("Choose WooCommerce Unit Content",THEMENAME); ?></span>
														<select id="wooSource-<?php echo $keys; ?>" name="wooSource-<?php echo $keys; ?>" class="itemHiddenCelect wooSource">
															<?php if($values['wooSource'] == 'Products') { ?>
																<option value="Products" selected>Products</option>
																<option value="Categories">Categories</option>
															<?php } else { ?>
																<option value="Categories" selected>Categories</option>
																<option value="Products">Products</option>
															<?php } ?>
													</select>
													<div class="desc_bottom" style="padding-top:15px;">
														<?php _e("Choose between Products or Categories to be displayed in Homepage WooCommerce Unit.", THEMENAME); ?>
													</div>
												</div>
												<div class="col-1 last product-source">
													<span class="itemHiddenTitle"><?php _e("Choose Product Category",THEMENAME); ?></span>
													<?php
														wp_dropdown_categories( array(
															'class' 			=> 'itemHiddenCelect product-source-select',
															'name' 				=> 'productContent-'.$keys,
															'show_option_all'	=> 'All Categories',
															'taxonomy'			=> 'product_cat',
															'selected'			=> 	$values['productContent']
														));	
													?>
													<div class="desc_bottom" style="padding-top:15px;">
														<?php _e("Choose Product Category to be displayed in Homepage WooCommerce Unit.", THEMENAME); ?>
													</div>
												</div>
												<div class="col-1" style="padding-top:25px;">
													<input type="checkbox" class="socialMediaLists titlecheck social-1" id="cart_show-<?php echo $keys; ?>" name="cart_show-<?php echo $keys; ?>" value="1" <?php echo ($values['cart_show'] == 1) ? 'checked="checked"' : ''; ?> />
													<label for="cart_show-<?php echo $keys; ?>"> Display Woo Navigation Bar</label>
												</div>
												<div class="col-1 last" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Enter Number of Products/Categories to Display",THEMENAME); ?></span>
													<input type="text" id="productsCount-<?php echo $keys; ?>" class="itemCountInput" name="productsCount-<?php echo $keys; ?>" value="<?php echo $values['productsCount']; ?>"/>
												</div>								
												<div class="col-1" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Choose Sorting",THEMENAME); ?></span>
													<select name="wooSorting-<?php echo $keys; ?>" class="itemHiddenCelect sorting-select">
														<?php foreach($sortableWoo as $k => $v){ ?>
															<?php if($values['wooSorting'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>												
												<div class="col-1 last" style="padding-top:25px;">
													<span class="itemHiddenTitle"><?php _e("Display Order",THEMENAME); ?></span>
													<select name="wooOrder-<?php echo $keys; ?>" class="itemHiddenCelect order-select">
														<?php foreach($wooDescAsc as $k => $v){ ?>
															<?php if($values['wooOrder'] == $k) { ?>
																<option value="<?php echo $k; ?>" selected><?php echo $v; ?></option>
															<?php } else { ?>
																<option value="<?php echo $k; ?>"><?php echo $v; ?></option>
															<?php } ?>
														<?php } ?>
													</select>
												</div>	
											</div>
											<!-- Image Since V2.7 -->
											<div id="image-source-<?php echo $keys; ?>" class="setting-box image-clone">
												<div class="col-1">
													<span class="itemHiddenTitle"><?php _e("Top Padding in Pixels",THEMENAME); ?></span>
													<input type="text" id="imageTopPadding-<?php echo $keys; ?>" class="itemCountInput topPaddingHTML" name="imageTopPadding-<?php echo $keys; ?>" value="<?php echo $values['imageTopPadding']; ?>"/>
												</div>												
												<div class="col-1 last">
													<span class="itemHiddenTitle"><?php _e("Bottom Padding in Pixels",THEMENAME); ?></span>
													<input type="text" id="imageBottomPadding-<?php echo $keys; ?>" class="itemCountInput bottomPaddingHTML" name="imageBottomPadding-<?php echo $keys; ?>" value="<?php echo $values['imageBottomPadding']; ?>"/>
												</div>
												<div class="itemInputText" style="padding-top:25px; float: left;">
													<span class="itemHiddenTitle"><?php _e("HTML Text",THEMENAME); ?></span>
													<textarea id="imageText-<?php echo $keys; ?>" class="itemTextarea HTMLuntitTextarea" name="imageText-<?php echo $keys; ?>"><?php echo esc_attr( $values['imageText'] ); ?></textarea>
												</div>
											</div>											
											<!-- Image Since V2.7 -->
											<div id="woocommerce-links-<?php echo $keys; ?>" class="setting-box woo-links-clone">
												<div class="col-1 last" style="padding:0!important;">
													<span class="itemHiddenTitle" style="display:inline-block!important; width: 60px; padding:0 10px 0 0!important;"><?php _e("Font Size",THEMENAME); ?></span>
													<input type="text" id="linksWooFontSize-<?php echo $keys; ?>" class="itemCountInput" name="linksWooFontSize-<?php echo $keys; ?>" value="<?php echo $values['linksWooFontSize']; ?>"/>
												</div>
											</div>
											<!-- Slideshow Since V3.0 -->
											<div id="slideshow-bilder-<?php echo $keys; ?>" class="setting-box slideshow-clone builder-visible-elements">
												<div class="col-1">
													<span class="itemHiddenTitle"><?php _e("Enter Revolution Shortcode", THEMENAME); ?></span>
													<input type="text" style="margin:0;" id="slideShortcode-<?php echo $keys; ?>" class="itemInputText slideShortcodeInput" name="slideShortcode-<?php echo $keys; ?>" value="<?php echo $values['slideShortcode']; ?>"/>
												</div>
												<div class="col-1" style="padding-top:20px;">
													<span class="itemHiddenTitle"><?php _e("Top Padding in Pixels",THEMENAME); ?></span>
													<input type="text" id="slideTopPadding-<?php echo $keys; ?>" class="itemCountInput slideTopPadding" name="slideTopPadding-<?php echo $keys; ?>" value="<?php echo $values['slideTopPadding']; ?>"/>
												</div>												
												<div class="col-1 last" style="padding-top:20px;">
													<span class="itemHiddenTitle"><?php _e("Bottom Padding in Pixels",THEMENAME); ?></span>
													<input type="text" id="slideBottomPadding-<?php echo $keys; ?>" class="itemCountInput slideBottomPadding" name="slideBottomPadding-<?php echo $keys; ?>" value="<?php echo $values['slideBottomPadding']; ?>"/>
												</div>
											</div>
											<?php /* Background control */ ?>
											<div id="background-settings-<?php echo $keys; ?>" class="background-setting">
												<div class="titleBackground">
													<b><?php _e('Background',THEMENAME); ?></b>
													<select id="parallax-effect-<?php echo $keys; ?>" name="parallax-effect-<?php echo $keys; ?>" class="background-select-parallax">
														<?php if($values['parallax'] == '1') :?>
															<option value="1" selected><?php _e('Parallax Background'); ?></option>
															<option value="2"><?php _e('Default Background'); ?></option>
														<?php else: ?>
															<option value="2" selected><?php _e('Default Background'); ?></option>
															<option value="1"><?php _e('Parallax Background'); ?></option>
														<?php endif; ?>
													</select>
												</div>
												<label for="upload_image<?php echo $keys; ?>">
													<input id="image_url_input" class="upload_image<?php echo $keys; ?> upLaoding" style="width:82%;" type="text" size="36" name="upload_image<?php echo $keys; ?>" value="<?php echo $values['imgUrl']; ?>" />
													<input id="uploadId<?php echo $keys; ?>" class="upload_image_button" style="position:relative!important; top:-4px!important;" type="button" value="Upload" />
												</label>
												<div class="col-1" style="width:63%; padding-top:35px;">
													<div id="background-setting-position-<?php echo $keys; ?>" class="radio_block parallax-settigs back-posi">
														<b style="padding-right:15px;"><?php _e('Position' , THEMENAME); ?></b>
														<?php foreach($color_position as $k=>$v): ?>
															<?php if( $v == $values['imgPosition'] ) : ?>
																<input type="radio" class="radio-position-clone" name="radio_position-<?php echo $keys; ?>" value="<?php echo $v; ?>" checked="checked" /><?php echo $v; ?>
															<?php else : ?>
																<input type="radio" class="radio-position-clone" name="radio_position-<?php echo $keys; ?>" value="<?php echo $v; ?>" /><?php echo $v; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</div>
													<div id="background-setting-reapet-<?php echo $keys; ?>" class="radio_block parallax-settigs back-repeat">
														<b style="padding:10px 15px 0 0;"><?php _e('Repeat' , THEMENAME); ?></b>
														<?php foreach($repeat_img as $k=>$v): ?>
															<?php if( $k == $values['imgRepeat'] ) : ?>
																<input type="radio" class="radio-repeat-clone" name="radio_repeat-<?php echo $keys; ?>" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
															<?php else : ?>
																<input type="radio" class="radio-repeat-clone" name="radio_repeat-<?php echo $keys; ?>" value="<?php echo $k; ?>" /><?php echo $v; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</div>													
													<div id="background-setting-attach-<?php echo $keys; ?>" class="radio_block parallax-settigs back-attach">
														<b style="padding:10px 15px 0 0;"><?php _e('Attachment' , THEMENAME); ?></b>
														<?php foreach($attachament_img as $k=>$v): ?>
															<?php if( $k == $values['imgAttachment'] ) : ?>
																<input type="radio" class="radio-attachment-clone" name="radio_attachment-<?php echo $keys; ?>" value="<?php echo $k; ?>" checked="checked" /><?php echo $v; ?>
															<?php else : ?>
																<input type="radio" class="radio-attachment-clone" name="radio_attachment-<?php echo $keys; ?>" value="<?php echo $k; ?>" /><?php echo $v; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													</div>
													<div id="background-setting-speed-<?php echo $keys; ?>" class="radio_block parallax-settigs back-speed" style="padding:15px 0 0;">
														<label for="parallax-speed-<?php echo $keys; ?>"> 
															<b style="padding:10px 15px 0 0;"><?php _e('Scrolling Speed', THEMENAME); ?></b>
														</label>
														<input type="text" id="parallax-speed-<?php echo $keys; ?>" class="parallax-speed" name="parallax-speed-<?php echo $keys; ?>" value="<?php echo $values['parallax-speed']; ?>" />
													</div>
												</div>
												<div class="col-1 last" style="width:33%; padding-top:25px;">
													<b style="display:block; padding-bottom:15px;"><?php _e('Background Color' , THEMENAME); ?></b>
													<input type="text" id="color-<?php echo $keys; ?>" value="<?php echo $back = empty($values['backgroundColor']) ? '#' : $values['backgroundColor']; ?>" class="colorInput" name="color_picker_color-<?php echo $keys; ?>" style="background-color:<?php echo $values['backgroundColor']; ?>" />
													<input type="button" value="Select a Color" class="selectPicker" id="colorPicker-<?php echo $keys; ?>" />
													<div id="color_picker_color-<?php echo $keys; ?>" class="colorPickerMain"></div>
												</div>
											</div>
											<div class="clear"></div>
										</div>
									</div>
								<?php
								}
							}
						} ?>
					<input type="hidden" value="<?php foreach($builderArray as $keys=>$val) {  foreach($val as $keys=>$values) { echo "item-".$keys.","; } } ?>" name="items" />
				<?php  ?>
				<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ){ ?>
					<input type="hidden" value="true" name="woocommerce-active-builder"/>
				<?php }else{ ?>
					<input type="hidden" value="false" name="woocommerce-active-builder"/>
				<?php } ?>
				</div>
			</div>	
			<div class="buttom_unit">
				<span class="float_right">
					<input id="add_elements-2" class="builder" rel=".section" style="font-size:11px; font-weight:normal; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; " type="button" value="Add Unit" />
				</span>
			</div>
		</div>
		<p style="display:inline">
			<input type="submit" name="all" value="Save" style="margin-right:20px; position:relative; width:100px; height:30px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " /> 
		</p>
		<?php cuckoo_framework_footer(); ?>
	</form>
</section>
<?php 
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/

 ########- Woocommerce -#########

/* Hooks */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

add_action('woocommerce_before_main_content', 'cuckoo_woo_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'cuckoo_woo_wrapper_end', 10);

/* Related */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);  
add_action( 'woocommerce_after_main_content', 'cuckoo_woo_related_products', 10);

/* Pagination */
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
add_action( 'woocommerce_after_main_content', 'woocommerce_pagination', 10);

/* Map */
add_action( 'woocommerce_after_main_content', 'get_map_landing', 10);

// Ensure cart contents update when products are added to the cart via AJAX
add_filter('add_to_cart_fragments', 'cuckoo_add_to_cart_fragment');

/* Add JS files */
add_action('wp_enqueue_scripts', 'cuckoo_woo_jquery');

/* Product title */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary','woocommerce_template_single_title', 5 ); 

function woocommerce_template_single_title(){ 
	?>
	<h2 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h2>
	<?php
}

function cuckoo_woo_related_products(){ 
	$cuckoo_woocommerce = get_option( THEMEPREFIX . "_woocommerce_cuckoo" );
	if(is_product()){ ?>
	<section id="related-products" class="clearfix related-posts<?php if($cuckoo_woocommerce['parallax'] == '1') : ?> parallax-background <?php endif; ?>"<?php if($cuckoo_woocommerce['parallax'] == '1') : ?> style="background-attachment:fixed!important;" data-type="background" data-speed="<?php echo $cuckoo_woocommerce['parallax-speed']; ?>"<?php endif; ?> <?php if($cuckoo_woocommerce['related_products'] == ''){ ?><?php } ?>>
		<?php if($cuckoo_woocommerce['related_products'] != ''){ ?>
		<header class="item-header-wrap">
			<div class="item-header screen-large">
				<div class="logo_content">
					<h2 class="logo"><?php echo $cuckoo_woocommerce['related_products']; ?></h2>
				</div>
				<div class="title-shadow"></div>
			</div>
		</header>
		<?php } ?>
		<?php  woocommerce_related_products( 4, 4 ); ?>
	</section>
	<?php
	}
}

function cuckoo_woo_wrapper_start() { 
	global $woocommerce;
	$cuckoo_style = get_option( THEMEPREFIX . "_style_settings" );
	$cuckoo_woocommerce = get_option( THEMEPREFIX . "_woocommerce_cuckoo" );
	$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
	$cart_url = $woocommerce->cart->get_cart_url();
	$checkout_url = $woocommerce->cart->get_checkout_url();
	
	$myaccount_page_url = "";
	if ( $myaccount_page_id ) {
	  $myaccount_page_url = get_permalink( $myaccount_page_id );
	}
?>
	<section id="main-container">
		<header id="item-header" class="works-header woocommerce-active padding-bottom-no border-none<?php if($cuckoo_style['parallax'] == '1') : ?> parallax-background <?php endif; ?>"<?php if($cuckoo_style['parallax'] == '1') : ?> style="background-attachment:fixed!important;" data-type="background" data-speed="<?php echo $cuckoo_style['parallax-speed']; ?>"<?php endif; ?>>
			<?php if(is_product()){ ?>
				<div id="header-position" class="screen-large">
					<div class="title-block">
						<h1><?php echo $cuckoo_woocommerce['single_page_title']; ?></h1>
					</div>
					<?php if( $cuckoo_woocommerce['single_page_subtitle'] != '' ){ ?>
					<div class="item-info-block">
						<div class="item-info-line one">
							<span class="item-info-list"><?php echo $cuckoo_woocommerce['single_page_subtitle']; ?></span>
						</div>
					</div>
					<?php } ?>
				</div>
			<?php } ?>
		</header>
		<?php get_template_part( 'loop/total/socialmedia-search' );  ?>
		<div id="path-and-buy">
			<div class="testimonials-shadow"></div>
			<div class="container-woo-path screen-large">
				<?php  echo woocommerce_breadcrumb(); ?>
				<div class="cart-accuont">
					<a href="<?php echo $cart_url; ?>" title="<?php _e('Cart', THEMENAME); ?>"><span class="cart-show"></span><?php _e('Cart', THEMENAME); ?></a> | 
					<div class="total-cart"><?php _e('Total', THEMENAME); ?> <span><?php echo $woocommerce->cart->get_cart_total(); ?></span></div> | 
					<a href="<?php echo $myaccount_page_url; ?>" title="<?php _e('My Account', THEMENAME); ?>"><?php _e('My Account', THEMENAME); ?></a> | 
					<a href="<?php echo $checkout_url; ?>" title="<?php _e('Checkout', THEMENAME); ?>"><?php _e('Checkout', THEMENAME); ?></a>
				</div>
			</div>
		</div>
		<article id="content-woo" role="main" class="<?php if(is_product()){ ?>screen-large cuckoo-single-element<?php }else{ ?>screen-large-portfolio cuckoo-not-single-element<?php } ?>">
  <?php
}

if ( ! function_exists( 'woocommerce_breadcrumb' ) ) {

	/**
	 * Output the WooCommerce Breadcrumb
	 *
	 * @access public
	 * @return void
	 */
	function woocommerce_breadcrumb( $args = array() ) {

		$defaults = apply_filters( 'woocommerce_breadcrumb_defaults', array(
			'delimiter'   => ' | ',
			'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
			'wrap_after'  => '</nav>',
			'before'      => '',
			'after'       => '',
			'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
		) );

		$args = wp_parse_args( $args, $defaults );

		woocommerce_get_template( 'shop/breadcrumb.php', $args );
	}
}

function cuckoo_woo_wrapper_end() {
  echo '</article></section>';
}

function cuckoo_add_to_cart_fragment( $fragments ) {
global $woocommerce;
ob_start();
?>
<div class="total-cart"><?php _e('Total', THEMENAME); ?> <span><?php echo $woocommerce->cart->get_cart_total(); ?></span></div>
<?php
$fragments['div.total-cart'] = ob_get_clean();
return $fragments;
}

/* Pagination */
function woocommerce_pagination() {
	global $wp_rewrite, $wp_query;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	if($wp_query->max_num_pages > 1 ){
	echo '<div id="pagination-woo">';
	echo '<div class="testimonials-shadow"></div>';
	echo '<div class="pagination-container screen-large">';
    $pagination = array(
        'base' => @add_query_arg('page','%#%'),
        'format' => '?paged=%#%',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => __('Previous'),
        'next_text' => __('Next'),
		'end_size'     => 2,
		'mid_size'     => 4,
        'show_all' => false,
        'type' => 'array'
    );
    if ( $wp_rewrite->using_permalinks() )
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
    if ( !empty( $wp_query->query_vars['s'] ) )
            $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
    $pages = paginate_links( $pagination );
    echo '<div class="pagination-content">';
    if ( $current == 1) echo '<span class="disabled prev">'.__('Previous', THEMENAME).'</span>';
	foreach ($pages as $page) :
		echo $page;
    endforeach;
    if ( $current == $wp_query->max_num_pages ) echo '<span class="disabled next">'.__('Next', THEMENAME).'</span>';
    echo '</div>';
	echo '</div>';
	echo '</div>';
	}
}


function cuckoo_woo_jquery(){
	wp_enqueue_script('cuckoo-woo-jquery', get_template_directory_uri() .'/admin/woo/js/jquery.woo.js', array('jquery'));
	wp_enqueue_script('cuckoo-woo-jquery');
}

function cuckoo_woo_loop_item_hover(){
	echo '<div class="item-hover-woo"></div>';
}


$style_woo = array(
	'light' => array( 
		'price_font' 		=> 'Titillium Web',
		'price_weight' 		=> 'normal',
		'price_style' 		=> 'normal',
		'price_size' 		=> '27',
		'price_lheight' 	=> '',
		'price_color' 		=> '#5595CE',
		'regular_font' 		=> 'Titillium Web',
		'regular_weight' 	=> 'normal',
		'regular_style' 	=> 'normal',
		'regular_size' 		=> '18',
		'regular_lheight' 	=> '',
		'regular_color' 	=> '#7F7F7F'
		),
	'dark' => array(
		'price_font' 		=> 'BebasNeue',
		'price_weight' 		=> 'normal',
		'price_style' 		=> 'normal',
		'price_size' 		=> '27',
		'price_lheight' 	=> '',
		'price_color' 		=> '#D9164E',
		'regular_font' 		=> 'BebasNeue',
		'regular_weight' 	=> 'normal',
		'regular_style' 	=> 'normal',
		'regular_size' 		=> '18',
		'regular_lheight' 	=> '',
		'regular_color' 	=> '#7F7F7F'
	)
);

/* Settings Woocommerce in to framework default */
$cuckoo_woocommerce = get_option( THEMEPREFIX . "_woocommerce_cuckoo" );
$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
if(!$cuckoo_woocommerce){
	$cuckoo_woocommerce = array(
	'single_page_title' 		=> 'Shop Product',
	'single_page_subtitle' 		=> '',
	'related_products' 			=> '',
	'parallax' 					=> '',
	'img_url' 					=> '',
	'imgPosition' 				=> '',
	'imgRepeat' 				=> '',
	'imgAttachment' 			=> '',
	'parallax-speed' 			=> 10,
	'backgroundColor' 			=> '#',
	'price_font' 				=> $style_woo[$cuckoo_settings['theme-style']]['price_font'],
	'price_weight' 				=> $style_woo[$cuckoo_settings['theme-style']]['price_weight'],
	'price_style' 				=> $style_woo[$cuckoo_settings['theme-style']]['price_style'],
	'price_size' 				=> $style_woo[$cuckoo_settings['theme-style']]['price_size'],
	'price_lheight' 			=> $style_woo[$cuckoo_settings['theme-style']]['price_lheight'],
	'price_color' 				=> $style_woo[$cuckoo_settings['theme-style']]['price_color'],
	'regular_font' 				=> $style_woo[$cuckoo_settings['theme-style']]['regular_font'],
	'regular_weight' 			=> $style_woo[$cuckoo_settings['theme-style']]['regular_weight'],
	'regular_style' 			=> $style_woo[$cuckoo_settings['theme-style']]['regular_style'],
	'regular_size' 				=> $style_woo[$cuckoo_settings['theme-style']]['regular_size'],
	'regular_lheight' 			=> $style_woo[$cuckoo_settings['theme-style']]['regular_lheight'],
	'regular_color' 			=> $style_woo[$cuckoo_settings['theme-style']]['regular_color']
);
	add_option(  THEMEPREFIX . "_woocommerce_cuckoo" , $cuckoo_woocommerce);
}

/**
* List all products.
*
*/
function woocommerce_list_products( $atts ){
global $woocommerce_loop;
 
extract( shortcode_atts( array(
	'per_page' => '12',
	'columns' => '4',
	'orderby' => 'title',
	'order' => 'asc'
	), $atts ) );
 
	$args = array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'ignore_sticky_posts' => 1,
		'orderby' => $orderby,
		'order' => $order,
		'posts_per_page' => $per_page,
		'meta_query' => array(
			array(
			'key' => '_visibility',
			'value' => array('catalog', 'visible'),
			'compare' => 'IN'
			),
			array(
			'key' => '_price',
			'value' => 0,
			'compare' => '>',
			'type' => 'NUMERIC'
			)
		)
	);
	 
	ob_start();
	 
	$products = new WP_Query( $args );
	 
	$woocommerce_loop['columns'] = $columns;
	 
	if ( $products->have_posts() ) : ?>
	 
		<ul class="products">
		 
			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
			 
			<?php woocommerce_get_template_part( 'content', 'product' ); ?>
			 
			<?php endwhile; // end of the loop. ?>
		 
		</ul>
	 
	<?php endif;
	 
	wp_reset_query();
	 
return ob_get_clean();
}
 
add_shortcode('list_products', 'woocommerce_list_products');

?>
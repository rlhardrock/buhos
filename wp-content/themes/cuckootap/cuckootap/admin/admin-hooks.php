<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/

// all settings pages
function cuckoo_admin_menus()
{
	add_menu_page( THEMENAME , THEMENAME , 'manage_options','framework', 'admin_framework_main', THEMEICONE , 50);
	add_submenu_page('framework', __( 'Homepage Builder', THEMENAME), __( 'Homepage Builder', THEMENAME),'manage_options', 'homepage', 'cuckoo_homepage_settings');
	add_submenu_page('framework', __( 'Header & Footer', THEMENAME), __( 'Header & Footer', THEMENAME),'manage_options', 'header-footer', 'cuckoo_header_footer_settings');
	add_submenu_page('framework', __( 'Color Settings', THEMENAME), __( 'Color Settings', THEMENAME),'manage_options', 'style', 'cuckoo_style_settings');
	add_submenu_page('framework', __( 'Theme Fonts', THEMENAME), __( 'Theme Fonts', THEMENAME),'manage_options', 'fonts', 'cuckoo_theme_font');
	add_submenu_page('framework', __( 'Slideshow Player', THEMENAME), __( 'Slideshow Player', THEMENAME),'manage_options', 'slider', 'cuckoo_slideshow_settings');
	add_submenu_page('framework', __( 'Portfolio Gallery', THEMENAME), __( 'Portfolio Gallery', THEMENAME),'manage_options', 'gallery', 'cuckoo_gallery_settings');
	//add_submenu_page('framework', __( 'Sidebars', THEMENAME), __( 'Sidebars', THEMENAME),'manage_options', 'sidebars', 'cuckoo_sidebars_settings');
	add_submenu_page('framework', __( 'Social Media', THEMENAME), __( 'Social Media', THEMENAME),'manage_options', 'social', 'cuckoo_social_settings');
	add_submenu_page('framework', __( 'Contact Information', THEMENAME), __( 'Contact Information', THEMENAME),'manage_options', 'contact', 'cuckoo_contact_settings');
	/*********************************** woocommerce ***************************************/
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		add_submenu_page('framework', __( 'WooCommerce', THEMENAME), __( 'WooCommerce', THEMENAME),'manage_options', 'cuckoo-woo', 'cuckoo_woocommerce');
	}
	add_submenu_page('framework', __( 'Our Themes', THEMENAME), __( 'Our Themes', THEMENAME),'manage_options', 'our-themes', 'cuckoo_themes_settings');
}


function update_in_dashport()
{
	$count = cuckoo_update_search() !=  false ? '<span class="update-plugins"><span class="update-count">'.cuckoo_update_search().'</span></span>' : '';
	add_dashboard_page(  __( 'Theme Update', THEMENAME ),  'Theme Update'.$count , 'manage_options', 'theme-update', 'cuckoo_theme_update');
}

add_action('admin_menu', 'update_in_dashport');



class Cuckoo_in_admin_bar {
  
  function Cuckoo_in_admin_bar()
  {
    add_action('admin_bar_menu', array($this, "cuckoo_links"), 70);
  }

  function add_root_menu($name, $id, $href = FALSE)
  {
    global $wp_admin_bar;
    if ( !is_super_admin() || !is_admin_bar_showing() )
      return;

    $wp_admin_bar->add_node( array(
    'id' => $id,
    'title' => $name,
    'href' => $href ) );
  }
  
  function add_sub_menu($id, $name, $link, $root_menu, $meta = FALSE)
  {
    global $wp_admin_bar;
    if ( !is_super_admin() || !is_admin_bar_showing() )
      return;
    
    $wp_admin_bar->add_node( array(
	'id' => $id,
    'parent' => $root_menu,
    'title' => $name,
    'href' => $link,
    'meta' => $meta) ); 
  }

  function cuckoo_links() { /* links theme navigation */
    $this->add_root_menu('<div class="admin_bar_icone"></div>', THEMENAME);
    $this->add_sub_menu( 'sub-framework' , THEMENAME , site_url()."/wp-admin/admin.php?page=framework", THEMENAME);
    $this->add_sub_menu( 'sub-homepage' , __("Homepage Builder", THEMENAME) , site_url()."/wp-admin/admin.php?page=homepage", THEMENAME);
	$this->add_sub_menu( 'sub-header-footer' , __("Header & Footer", THEMENAME), site_url()."/wp-admin/admin.php?page=header-footer", THEMENAME);
	$this->add_sub_menu( 'sub-styles' , __("Color Settings", THEMENAME), site_url()."/wp-admin/admin.php?page=style", THEMENAME);
	$this->add_sub_menu( 'sub-fonts' , __("Theme Fonts", THEMENAME), site_url()."/wp-admin/admin.php?page=fonts", THEMENAME);
    $this->add_sub_menu( 'sub-slider' , __("Slideshow Player", THEMENAME), site_url()."/wp-admin/admin.php?page=slider", THEMENAME);
	$this->add_sub_menu( 'sub-gallery' , __("Portfolio Gallery", THEMENAME), site_url()."/wp-admin/admin.php?page=gallery", THEMENAME);
	$this->add_sub_menu( 'sub-social' , __("Social Media", THEMENAME), site_url()."/wp-admin/admin.php?page=social", THEMENAME);
	$this->add_sub_menu( 'sub-contact' , __("Contact Information", THEMENAME), site_url()."/wp-admin/admin.php?page=contact", THEMENAME);
	/*********************************** woocommerce ***************************************/
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		$this->add_sub_menu( 'sub-woo-cuckoo' , __("WooCommerce", THEMENAME), site_url()."/wp-admin/admin.php?page=cuckoo-woo", THEMENAME);
	}
	$this->add_sub_menu( 'sub-our-themes' , __("Our Themes", THEMENAME), site_url()."/wp-admin/admin.php?page=our-themes", THEMENAME);
	
	if(cuckoo_update_search() !=  false){
		$count = '<span class="cuckoo_update_count">'.cuckoo_update_search().'</span>';
		$this->add_root_menu('Theme Update'.$count, 'update', site_url()."/wp-admin/admin.php?page=theme-update" );
	}	
	
	if(cuckoo_update_search_themes() !=  false){
		if( cuckoo_update_search_themes() == '1' ){
			$counts = '<span class="cuckoo_update_count_theme">'.cuckoo_update_search_themes().' New Theme!</span>';
		}else{
			$counts = '<span class="cuckoo_update_count_theme">'.cuckoo_update_search_themes().' New Themes!</span>';
		}
		$this->add_root_menu($counts, 'update', site_url()."/wp-admin/admin.php?page=our-themes" );
	}
  }

}

function CuckooMenuIn() {
    global $Cuckoo_in_admin_bar; $Cuckoo_in_admin_bar = new Cuckoo_in_admin_bar();
}

add_action("admin_menu", "cuckoo_admin_menus");
add_action("init", "CuckooMenuIn");

add_action('init', 'cuckoo_add_button_shortcodes');  

function cuckoo_add_button_shortcodes() {
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') ) :
     add_filter('mce_external_plugins', 'cuckoo_add_plugin_shortcodes');
     add_filter('mce_buttons', 'cuckoo_register_button_shortcodes');
   endif;
}

function cuckoo_register_button_shortcodes($buttons) {
	array_push($buttons, '|', "shortcodes");
    return $buttons;
}

function cuckoo_add_plugin_shortcodes($plugin_array) {
	$plugin_array['shortcodes'] = get_template_directory_uri(). '/admin/shortcodes/settings/shortcodes.js';
	return $plugin_array;
}

// pages wiht content to display
/* Main framework */
function admin_framework_main() { get_template_part( 'admin/pages/admin-framework' ); }
/* Homepage Builder */
function cuckoo_homepage_settings() { get_template_part( 'admin/pages/admin-builder' ); }
/* Color styles */
function cuckoo_style_settings() { get_template_part( 'admin/pages/admin-color_styles' ); }
/* Slideshow */
function cuckoo_slideshow_settings() { get_template_part( 'admin/pages/admin-slideshow' ); }
/* Header & Footer */
function cuckoo_header_footer_settings() { get_template_part( 'admin/font/google-fonts' ); get_template_part( 'admin/pages/admin-header_footer' ); }
/* Font */
function cuckoo_theme_font() { get_template_part( 'admin/font/google-fonts' ); get_template_part( 'admin/pages/admin-fonts' ); }
/* Gallery */
function cuckoo_gallery_settings() { get_template_part( 'admin/pages/admin-gallery' ); }
/* Sidebars */
// function cuckoo_sidebars_settings() { get_template_part( 'admin/pages/admin-sidebars' ); }
/* Social */
function cuckoo_social_settings() { get_template_part( 'admin/pages/admin-social' ); }
/* Contact */
function cuckoo_contact_settings() { get_template_part( 'admin/pages/admin-contact' ); }
/* Update */
function cuckoo_theme_update() { get_template_part( 'admin/pages/admin-update' ); }
/* Themes */
function cuckoo_themes_settings() { get_template_part( 'admin/pages/themes' ); }

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	function cuckoo_woocommerce() { get_template_part( 'admin/font/google-fonts' ); get_template_part( 'admin/woo/admin-page' ); }
}
?>
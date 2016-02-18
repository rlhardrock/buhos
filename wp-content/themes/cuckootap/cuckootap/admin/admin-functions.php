<?php

/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/
 

function replace_id_for_slug($option){

	$categories = get_terms("types", array( 'hide_empty' => 0 ));

	preg_match('/value="(\d*)"/', $option[0], $matches);

	$id = $matches[1];

	$slug = "";

	foreach($categories as $category){
		if($category->term_id == $id){
			$slug = $category->slug;
		}
	}

	return preg_replace("/value=\"(\d*)\"/", "value=\"$slug\"", $option[0]);
}

function unit_title_scan($str){
	$str = trim($str);
	$str = str_replace("\'", "&rsquo;", $str);
	$str = str_replace('\"', "&rdquo;", $str);
return $str;
}

function cuckoo_search_form() {
	?>
    <form role="search" <?php if(is_404()): ?>class="search-form-error"<?php endif; ?> method="get" id="searchform" action="<?php echo home_url( '/' ); ?> " >
    <div class="<?php if(is_404()): ?>search_form_values_404<?php else : ?>search_form_values<?php endif; ?>">
		<label class="screen-reader-text" for="s"></label>
		<input class="search-input" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
    </div>
	<input type="submit" id="searchsubmit" title="<?php _e('Search', THEMENAME); ?>" value="<?php _e('Search', THEMENAME); ?>" class="<?php if(is_404()): ?>search-submit-404<?php else : ?>search-submit-simple<?php endif; ?>" />
    </form>
   <?php return;
}

add_filter( 'get_search_form', 'cuckoo_search_form' );

function responsive_check($classes) {
	$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
	if($cuckoo_settings['responsive'] == "No"){
		$classes[] = 'cuckoo-not-responsive';
	}
	return $classes;
}

add_filter('body_class','responsive_check');
 
function make_ID_in_text($text)
{
	$text = strtolower(trim($text));
	$text = preg_replace('/[^a-z0-9-]/', '-', $text);
	$text = preg_replace('/-+/', "-", $text);
	return $text;
}
 
function array_not_unique( $a = array() )
{
  return array_diff_key( $a , array_unique( $a ) );
}

function cuckoo_get_attachment_tumb($image_src) 
{
	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
	$id = $wpdb->get_var($query);
	$img_url = wp_get_attachment_thumb_url( $id );
	( empty($img_url) ? $img_url = $image_src : $img_url );
	return $img_url;
}
 
/* This function for all images size where register in function.php */

function cuckoo_get_attachment_all_size( $image_src, $size=""  ) 
{
	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
	$id = $wpdb->get_var($query);
	$medium_array = image_downsize( $id, $size );
    $medium_path = $medium_array[0];
	(empty($medium_path) ? $medium_path = $image_src : $medium_path );

    return $medium_path;
}
 

function cuckoo_get_attachment( $image_src  ) 
{
	global $wpdb;
	$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
	$id = $wpdb->get_var($query);
	$img_url = wp_get_attachment_thumb_url( $id );
	return $img_url;
}
 


function cuckoo_get_post_meta($post_id, $key, $single=true)
{
	return get_post_meta($post_id, NOTCHANGEELEMENT.$key, $single);
}

/* This function returns string element1,element2, ....  , args need only category name or names like name1,name2,... */
function cuckoo_exclude_from_categories($cat_names, $taxonomy)
{
	$new_array = array();
	$text = trim($cat_names);
	$array = explode(',', $text);
		foreach($array as $k=>$v) :
			$v = trim($v);
			//$id = get_cat_id($v);
			$id = get_term_by( 'name', $v, $taxonomy );
			$id = $id->term_id;
			if($taxonomy == "category" && $cat_names != null) :
				$id = '-'.$id;
			endif;
			array_push($new_array, $id);
		endforeach;
	$get_exclude = implode(",", $new_array);
	$get_exclude = str_replace( ",0" , "" , $get_exclude);
return $get_exclude;
}

//this return works names like this name, name1, name2
function cuckoo_list_taxha( $taxonomies, $exclude )
{
$args = array( 'exclude'=> $exclude );
$result="";
 $terms = get_terms($taxonomies, $args );
 $count = count($terms);
 if ( $count > 0 ){
     foreach ( $terms as $term ) {
       $result .= $term->slug.', ';   
    } 
 }
return $result;
}

function cuckoo_list_taxha_array( $taxonomies, $exclude )
{
$args = array( 'exclude'=> $exclude );
 $terms = get_terms($taxonomies, $args );
 $count = count($terms);
 if ( $count > 0 ){
     foreach ( $terms as $term ) {
       $result = array( 'name' => $term->slug );   
    } 
 }
return $result;
}

class Browser
{
    private $props    = array("Version" => "0.0.0",
                                "Name" => "unknown",
                                "Agent" => "unknown") ;

    public function __Construct()
    {
        $browsers = array("firefox", "msie", "opera", "chrome", "safari",
                            "mozilla", "seamonkey",    "konqueror", "netscape",
                            "gecko", "navigator", "mosaic", "lynx", "amaya",
                            "omniweb", "avant", "camino", "flock", "aol");

        $this->Agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        foreach($browsers as $browser)
        {
            if (preg_match("#($browser)[/ ]?([0-9.]*)#", $this->Agent, $match))
            {
                $this->Name = $match[1] ;
                $this->Version = $match[2] ;
                break ;
            }
        }
    }

    public function __Get($name)
    {
        if (!array_key_exists($name, $this->props))
        {
            die ;
        }
        return $this->props[$name] ;
    }

    public function __Set($name, $val)
    {
        if (!array_key_exists($name, $this->props))
        {
            SimpleError("No such property or function.", "Failed to set $name", $this->props) ;
            die ;
        }
        $this->props[$name] = $val ;
    }

} 

function cuckoo_chrome_parallax(){
	
	$browser = new Browser ;
	if( $browser->Name == 'chrome' ){
		return 'background-color:white;';
	}else{
		return '';
	}
}

/* List categories all */
function cuckoo_list_categories($cat, $works, $type)
{
	switch($type)
	{
		case 'category' :
			$exclude = $cat;
			$option_none = __('<b>No Categories</b>', THEMENAME);
		break;
		case 'types' :
			$exclude = $works;
			$option_none = __('<b>No Types</b>', THEMENAME);
		break;
	}
	$args = array(
	'exclude'			 => $exclude,
    'orderby'            => 'name',
    'order'              => 'ASC',
	'title_li'			 => '',
	'show_option_none'   => $option_none,
	'hide_empty'         => 1,
    'taxonomy'           => $type);
	
return wp_list_categories( $args );
}

function cuckoo_get_value($value) {
	return htmlspecialchars(stripslashes($value), ENT_QUOTES);
}

function cuckoo_decode($str) {
return html_entity_decode($str, ENT_QUOTES);
}

function cuckoo_shortcodes_tags($str){
	$string = str_replace('/', '&#47;', $str);
	return esc_attr($string);
}

add_filter('bloginfo', 'tagline_settings', 1, 2);

function tagline_settings($result='', $show='') {
$cuckoo_footer = get_option("footer_settings_cuckoo");

        switch ($show) {
        case 'description':
                $result = cuckoo_get_value($cuckoo_footer['tagline']);
                break;
        default: 
        }
        return $result;
}

function cuckoo_max_trim($str, $n, $delim='...') {
   $len = strlen($str);
   if ($len > $n) {
       preg_match('/(.{' . $n . '}.*?)\b/', $str, $matches);
       return rtrim($matches[1]) . $delim;
   }
   else {
       return $str;
   }
}


function cuckoo_max_trim_no_crop($str,$n,$style='p')
{
	$str = trim($str);
	$len = strlen($str);
	 if ($n >= $len) :
		$text = '<'.$style.' style="line-height: 2.2;">'.$str.'</'.$style.'>';
		return $text;
	 else :
		$text = '<'.$style.'>'.$str.'</'.$style.'>';
		return $text;
	 endif;
}

// works admin page settings
add_action("manage_posts_custom_column",  "portfolio_custom_columns");
add_filter("manage_edit-works_columns", "portfolio_edit_columns");
 
function portfolio_edit_columns($columns){
  $columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "title" => "Work Title",
	"thumb" => "Featured Image",
	"types" => "Types",
	"comments" => '<img src="/wp-admin/images/comment-grey-bubble.png" alt="Comments">',
	"author" => "Author",
	"date" => "Date"
  );
 
  return $columns;
}
function portfolio_custom_columns($column){
  global $post;
 
  switch ($column) {
    case "types":
      echo get_the_term_list($post->ID, 'types', '', ', ','');
      break;
	 case "thumb":
		$thumb = the_post_thumbnail( 'mini-thumb' );
		echo $thumb;
	 break;
  }
}
// Team admin page settings
add_action("manage_posts_custom_column",  "team_custom_columns");
add_filter("manage_edit-team_columns", "team_edit_columns");
 
function team_edit_columns($columns){
  $columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "title" => "Member Title",
	"photo" => "Thumbnail",
	"member-name" => "Member's Name",
	"member-occu" => "Member's Occupation",
	"author" => "Author",
	"date" => "Date"
  );
 
  return $columns;
}
function team_custom_columns($column){
  global $post;
 
  switch ($column) {
	 case "photo":
		$photo = '<img alt="'.cuckoo_get_post_meta(get_the_ID(), "_team-member-name").'" src="'. cuckoo_get_attachment_all_size( cuckoo_get_post_meta(get_the_ID(), "_upload_image1") , 'mini-thumb') . '" />';
		echo $photo;
	 break;	 
	 case "member-name":
		$name = cuckoo_get_post_meta(get_the_ID(), "_team-member-name");
		echo $name;
	 break;	 
	 case "member-occu":
		$occupation = cuckoo_get_post_meta(get_the_ID(), "_team-member-occupation");
		echo $occupation;
	 break;
  }
}

// a foreach friendly version of array_rand
function Select_Random_Indices($source_array, $count = 1)
{
    if($count > 0)
    {
        if($count == 1)
        {
            $result = array(array_rand($source_array, $count));
        }
        else
        {
            $result = array_rand($source_array, $count);
        }
    }
    else
    {
        $result = array();
    }

    return $result;
}

// using the above function to pick random values instead of entries
function cuckoo_related_Random($source_array, $count = 1)
{
    $result = "";
    $index_array = Select_Random_Indices($source_array, $count);

    foreach($index_array as $index)
    {
        $result = $source_array[$index];
    }

    return $result;
}

/**  video bloks   **/

/**
 * Parses a query string into an array
 */
function parseQueryString($str) { 
	$op = array(); 
	$pairs = explode("&", $str); 
	foreach ($pairs as $pair) {
		if(empty($pair))
			continue;
		list($k, $v) = array_map("urldecode", explode("=", $pair)); 
		$op[$k] = $v; 
	}
	return $op; 
}

/**
 * Gets the code of a YouTube/Vimeo video
 */
function getVideoCode($url) {
	$tokens = parse_url($url);	
	$code = "";
	if(isset($tokens['query'])) {
		$params = parseQueryString($tokens['query']);
		if(isset($params['v']))
			$code = $params['v'];
	} else {
		$code = trim($tokens['path'], "/");
	}

	return $code;
}

/**
 * Gets the video thumbnail
 */
function getVideoThumbnail($video, $key="") {
	$thumbnail = "";
	$video_code = getVideoCode($video);

	if(is_vimeo($video)) {
		$url = "http://vimeo.com/api/v2/video/{$video_code}.php";

		$chss = curl_init(); 
        curl_setopt($chss, CURLOPT_URL, $url); 
        curl_setopt($chss, CURLOPT_RETURNTRANSFER, TRUE); 
        $head = unserialize(curl_exec($chss)); 
        curl_close($chss);

        $thumbnail = $head[0][$key];
	}
	if(is_youtube($video)) {
		$thumbnail = "http://img.youtube.com/vi/{$video_code}/hqdefault.jpg";
	}

	return $thumbnail;
}

/**
 * Checks if the element is a video
 */
function is_video($video) {
	return is_youtube($video) || is_vimeo($video);
}

/**
 * Checks if the video comes from YouTube
 */
function is_youtube($video) {
	return strpos($video, "youtu") !== false;
}

/**
 * Checks if the video comes from Vimeo
 */
function is_vimeo($video) {
	return strpos($video, "vimeo") !== false;
}

/*
** post password corect 
*/
function cuckoo_get_the_password_form( $string , $submit, $labelText='' ) {

	global $post;

	$label = 'pwbox-'.(empty($post->ID) ? rand() : $post->ID);

	$output = '<form id="password_form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post">

	<p class="password_correct_text">' . $string . '</p>
	<p class="password_input_area">
		<label class="pass-label" for="' . $label . '">' .$labelText. '</label>
		<input class="password_input" name="post_password" id="' . $label . '" type="password" size="20" />
		<input type="submit" id="submit" name="Submit" value="' . $submit . '" />
	</p>
	</form>

	';

	return apply_filters('the_password_form', $output);

}

function ajaxcontact_enqueuescripts(){
	wp_enqueue_script('ajaxcontact-cuckoo', get_template_directory_uri() .'/js/form-ajax.js', array('jquery'));
	// declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php)
	wp_localize_script( 'ajaxcontact-cuckoo', 'contactajaxcuckoo', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

add_action('wp_enqueue_scripts', 'ajaxcontact_enqueuescripts');

add_action('wp_ajax_contact_form', 'cuckoo_email_settings');
add_action('wp_ajax_nopriv_contact_form', 'cuckoo_email_settings');

function cuckoo_send_mail() {
	if(empty($_POST))
		return "";
	
	$cuckoo_contact = get_option(THEMEPREFIX . "_contact_settings");
	$contact_form_email = cuckoo_icl_t_for_wpml(THEMENAME.' Contact Information', 'Contact Form Email Address', $cuckoo_contact['contact_form_email']);	
	$result = array();
	
	$keys = array('contact_email', 'contact_name', 'contact_message');
	$result['contact_email'] = $_POST['contact_email'];
	$result['contact_name'] = $_POST['contact_name'];
	$result['contact_message'] = $_POST['contact_message'];
	$result['contact_url'] = $_POST['contact_url'];
	$result['contact_amount'] = $_POST['amount-checker'];

	foreach($keys as $key) {
		if(!isset($_POST[$key]) or trim($_POST[$key]) == "") {
			$result['type'] = 'error';
			$result['message'] = __("Please fill in all required fields!", THEMENAME);
			return $result;
		}
			
	}

	$email = $_POST['contact_email'];
	$name = $_POST['contact_name'];
	
	if( $contact_form_email != "" )
		$to = $contact_form_email;
	else
		$to = get_option('admin_email');
	
	$url = ($_POST['contact_url'] != null ? "\r\n Website : " .$_POST['contact_url']. "\r\r\n" : "\r\r\n" );
	$subject = get_bloginfo('contact_name');
	$message = strip_tags($_POST['contact_message']);
	$message_send = " Name : ". $name . "\r\n Email : " . $email.$url.$message;
	
	$headers = 'From: '.$name.' <'.$email.'>' . "\r\n";
	
	if(mail($to, $subject, $message_send, $headers)) {
		$result['type'] = 'success';
		$result['message'] = __("Your Message Sent Successfully!", THEMENAME);
	} else {
		$result['type'] = 'error';
		$result['message'] = __("An error has occurred while sending your email!", THEMENAME);
	}
	
	return $result;
}

function cuckoo_email_settings(){
	$mail_message = cuckoo_send_mail();
	if(!empty($mail_message)) : ?>
		<p class="<?php echo $mail_message['type']; ?>"><?php echo $mail_message['message']; ?></p>
		<?php die();
	endif;
}

function cuckoo_theme_changelog()
{ 	
	$changelog_url = CUCKOO_UPDATE_URL .'/'. make_ID_in_text( THEMENAME ) .'/updater.xml';
	$trans_key = 'cuckoo_latest_theme_version_'. make_ID_in_text( THEMENAME );
	if(CUCKOO_DEBUG) echo '<p>Changelog URL: '. $changelog_url .'</p>';
	
	if ( false === ( $cached_xml = get_transient( $trans_key ) ) ){
		if( function_exists('curl_init') ){
			$ch = curl_init($changelog_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
			$xml = curl_exec($ch);
			curl_close($ch);
		} else {
			$xml = file_get_contents($changelog_url);
		}
	
		if ($xml){
			set_transient( $trans_key, $xml, 1 );
		} else {
			return false;
		}
	} else {
		$xml = $cached_xml;
	}
	
	return @simplexml_load_string($xml);
}

/* Search update */
function cuckoo_update_search() {  

    if( $xml = cuckoo_theme_changelog() ) {
        
        if( function_exists( 'wp_get_theme' ) ) {
            if( is_child_theme() ) {
                $temp_obj = wp_get_theme();
                $theme_obj = wp_get_theme( $temp_obj->get('Template') );
            } else {
                $theme_obj = wp_get_theme();    
            }

            $theme_version = $theme_obj->get('Version');
            $theme_name = $theme_obj->get('Name');
        } else {
            $theme_data =  wp_get_theme(get_template_directory() .'/style.css');
            $theme_version = $theme_data['Version'];
            $theme_name = $theme_data['Name'];
        }

		if( version_compare( $theme_version, $xml->latest ) == -1 ) {
			$latest_count = str_replace('.', '', $xml->latest);
			$version_count = str_replace('.', '', $theme_version);
			$count = $latest_count-$version_count;
			return $count;
		}else{
			return false;
		}
	}
	
	return false;
}

/* Search update */
function cuckoo_update_search_themes() {  

    if( $xml = cuckoo_themes() ) {
		$update_count = get_option('our-themes');
		if( version_compare( $update_count, $xml->latest ) == -1 ) {
			$latest_count = str_replace('.', '', $xml->latest);
			$version_count = str_replace('.', '', $update_count);
			$count = $latest_count-$version_count;
			return $count;
		}else{
			return false;
		}
	}
	
	return false;
}

function cuckoo_themes()
{ 	
	$themes_url = CUCKOO_UPDATE_URL .'/themes/themes.xml';
	$trans_key = 'cuckoo_themes_'. make_ID_in_text( THEMENAME );
	if(CUCKOO_DEBUG) echo '<p>Changelog URL: '. $themes_url .'</p>';
	
	if ( false === ( $cached_xml = get_transient( $trans_key ) ) ){
		if( function_exists('curl_init') ){
			$ch = curl_init($themes_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
			$xml = curl_exec($ch);
			curl_close($ch);
		} else {
			$xml = file_get_contents($themes_url);
		}
	
		if ($xml){
			set_transient( $trans_key, $xml, 1 );
		} else {
			return false;
		}
	} else {
		$xml = $cached_xml;
	}
	
	return @simplexml_load_string($xml);
}

function cuckoo_get_all_fonts(){
	$cuckoo_font = get_option( THEMEPREFIX . "_font_settings" );
	$cuckoo_header = get_option( THEMEPREFIX . "_header_footer_settings" );
	$string = '';
	
	$array = array(
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_header['title_font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['slideshow-title-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['slideshow-subtitle-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['pwp-title-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['pwp-subtitle-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['page-unit-title-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['text-box-testimonials-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['testimonial-author-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['menus-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['menus-dropdown-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['button-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['body-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['details-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['alerts-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['ptl-title-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['occupation-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['tt-content-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['tm-tt-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['workl-title-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['workl-subtitle-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['comment-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['reply-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['h1-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['h2-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['h3-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['h4-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['h5-font']))),
		cuckoo_font_cheker(str_replace(" ", "+" , trim($cuckoo_font['footer-font']))),
	);
	
	foreach(array_filter(array_unique($array)) as $k=>$v):
		$string .= $v.'|';
	endforeach;
	
	$get = substr($string, 0, -1);
	$return_str = !empty($get) ? '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.$get.'&subset=all">' : '';
	
	return $return_str;
}

function cuckoo_font_cheker($font){
	if ( $font != 'Arial' && $font != 'BebasNeue' && $font != 'Georgia' ) : 
		return $font;
	endif;
}

// cuckoobizz for wpml plugin
function cuckoo_echo_for_wpml($context, $input ,$value){
	if( function_exists('icl_t') ) {
		echo icl_t($context, $input, $value); 
	}else{
		printf( __( '%s', THEMENAME ), $value );
	}
}
function cuckoo_icl_t_for_wpml($context, $input ,$value){
	if( function_exists('icl_t') ) {
		return icl_t($context, $input, $value); 
	}else{
		return $value;
	}
}
?>
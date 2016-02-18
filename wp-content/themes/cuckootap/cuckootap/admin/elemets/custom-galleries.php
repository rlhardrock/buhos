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
 * Cuctom galery template choose to page */
 
add_action( 'init', 'cuckoo_custom_gallery_taxonomy');

function cuckoo_custom_gallery_taxonomy() {
	if (!taxonomy_exists('custom_galleries')) {
	
		register_taxonomy( 'custom_galleries',
			array( 'custom_galleries' ),
			array(
				'public' => true,
				'labels' => array(
					'name' => __( 'Gallery by Type' , 'cuckoothemes' ),
					'singular_name' => __( 'Gallery by Type', 'cuckoothemes' ),
				),
				'hierarchical' => false,
				'query_var' => true,
				'show_tagcloud' => false,
				'rewrite' => array('slug' => 'custom_galleries'),
			)
		);
		wp_insert_term( 'None Works' , 'custom_galleries',  array( 'description'=> 'None works'  , 'slug' => 'none_works'));
	}	
	
}


function cuckoo_custom_gallery_display($post) {
	$custom_gallery = get_terms('types', array( 'hide_empty' => 0 ));
	$type_slug = get_post_meta($post->ID, NOTCHANGEELEMENT.'-by-type-box');
	
	wp_nonce_field( 'custom-gallery-'.$post->ID , 'taxonomy_custom_gallery' );
?>
<select name='custom_gallery' id='custom_gallery'>
	<!-- Display themes as options -->

        <?php
	foreach ($custom_gallery as $work) {
		if ($work->slug == $type_slug[0])
			echo "<option class='work-option' value='" . $work->slug . "' selected>" . $work->name . "</option>\n"; 
		else
			echo "<option class='work-option' value='" . $work->slug. "'>" . $work->name . "</option>\n"; 
	}
   ?>
</select>
<div class="description_admin_normal">
	<?php _e("When using Portfolio 2 Columns by Work Type template or Portfolio 4 Columns by Work Type template, choose Type of Work from Work Types dropdown menu.", 'cuckoothemes'); ?>
</div>
<?php 
}


function taxonomy_custom_gallery_save($post_id) {

	  // verify if this is an auto save routine. If it is our form has not been submitted, so we dont want to do anything
  	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
    	return $post_id;
	}
		
	// verify this came from our screen and with proper authorization.
	if ( empty($_POST) || !wp_verify_nonce($_POST['taxonomy_custom_gallery'], 'custom-gallery-'.$post_id) ){
		return $post_id;
	}

  	// Check permissions
  	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) )
     		return ;
  	} else {
		if ( !current_user_can( 'edit_post', $post_id ) )
			return ;
 	}
 
  	// OK, we're authenticated: we need to find and save the data
	$post = get_post($post_id);
	if (($post->post_type == 'page')) { 
		$work = $_POST['custom_gallery'];
		update_post_meta($post_id, NOTCHANGEELEMENT.'-by-type-box', $work);
        }
	return $work;
 
}

function add_custom_gallery_box() {
	add_meta_box('custom_box_gallery', __('Portfolio by Work Type', 'cuckoothemes'), 'cuckoo_custom_gallery_display', 'page', 'side', 'high');
}

add_action('add_meta_boxes', 'add_custom_gallery_box');
add_action('save_post', 'taxonomy_custom_gallery_save');
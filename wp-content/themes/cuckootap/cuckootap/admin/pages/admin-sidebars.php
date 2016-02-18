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
** Name : Sidebars page
*/

$sidebar = get_option( THEMEPREFIX . "_sidebars_settings");
?>
<section id="main_content">
<?php
if(isset($_REQUEST['all']))
{

	$items = substr($_POST['items'],0,-1);
	$custom_sidebars = array('Main Sidebar', 'No Sidebar');
	$dublicate = "";
	$elements = array();
	$ItemsAll = array();
	$delete_elements = $sidebar['delete_sidebars'];
	$items_array = explode(',', $items);
	foreach($items_array as $key=>$item) 
	{ 
		$items = substr($item,4);
		if($items != ''){
		$ItemsAll[$key] = $items;
		$elements_insert = esc_attr($_POST["sidebar_name".$items.""]);
		
		$dublicate = array_search( strtolower($elements_insert),array_map('strtolower',$elements) );
		
		if( $elements_insert != null ) :
			array_push($elements, $elements_insert);
			array_push($custom_sidebars, $elements_insert);
		endif;
		}
		
	}
	if(count($elements) == 0) :
		array_push($elements, '');
	endif;
	$elements = array_unique($elements);
	
	/* Term elements */
	foreach($elements as $k=>$val) :
		$key = array_search( strtolower($val),array_map('strtolower',$sidebar['sidebars_elements']) );
		$value = "";
		if( is_numeric($key) ) :
			$update_elements[] = $val;
			$update_elements = array_unique($update_elements);
		else :
			$new_elements[] = $val;
		endif;	
	endforeach;
	
	foreach($delete_elements as $ks=>$v ):
		$keys = array_search( strtolower($v),array_map('strtolower',$elements) );
		if( is_numeric($keys) ) :
			unset($delete_elements[$ks]);
		endif;
	endforeach;
	
	foreach($sidebar['sidebars_elements'] as $ks=>$v ):
		$keys = array_search( strtolower($v),array_map('strtolower',$elements) );
		if( !is_numeric($keys) ) :
			$delete_elements[] = $v;
		endif;
	endforeach;
	
	if( !is_numeric($dublicate) ) :
	
		/** Inserting, deleting, updateting  term  **/
		@cuckoo_term_sidebar_insert( $update_elements, $new_elements, $delete_elements );
		
			/* Update main options */
		$sidebar = array( 
		'global_position' => esc_attr( $_POST['global_position'] ),
		'custom_sidebars' => $custom_sidebars , 
		'sidebars_elements' => $elements ,
		'delete_sidebars' => $delete_elements,
		'blog_sidebar' => esc_attr( $_POST['blog_sidebar'] ),
		'works_sidebar' => esc_attr( $_POST['works_sidebar'] ), 
		'other_sidebar' => esc_attr( $_POST['other_sidebar'] ),
		'search_sidebar' => esc_attr( $_POST['search_sidebar'] )
		);
		update_option( THEMEPREFIX . "_sidebars_settings", $sidebar );

		?>
		<div id="save_upadate" class="updated"><?php _e('New settings saved!', THEMENAME); ?></div>
	<?php else : ?>
		<div id="message" class="error error_plius"><?php _e('Sidebar names must by Unique!', THEMENAME); ?></div>
	<?php endif;
}
?>
	<?php cuckoo_framework_head( __('Sidebars', THEMENAME) ); ?>
	<form id="formId" method="POST" action="">
	<!-- First block  -------------------------------------------------------------------------------------------->
	<div id="general_settings">
		<div class="general_title">
			<span class="float_left"><?php _e('General Settings', THEMENAME); ?></span>
			<span class="float_right"><a href="#" class="general_click"></a></span>
		</div>
		<div class="active_settings">
			<div class="section_settings">
				<div class="settings_left">
					<div class="settings_left_title">
						<?php _e('Useful Information', THEMENAME); ?>
					</div>
					<span>
						<?php _e('Main Sidebar is set by default for Blog, Works, Search Pages and Other Pages. 
						Here you can assign custom sidebar to each group of these pages. 
						Also you can create an unique sidebar and asign it to any page if needed. 
						This can be done in page or work or post editor page using our Choose Sidebar Panel.<br /><br />
						Important! If a sidebar is disabled for some pages group, a custom sidebar assigned for a single page from this pages group will not be displayed.
						', THEMENAME); ?>
					</span>
				</div>
				<div class="settings_left">
					<div class="settings_left_title">
						<?php _e('Choose Global Sidebar Positioning', THEMENAME); ?>
					</div>
					<select name="global_position">
						<?php switch($sidebar['global_position'])
						{
						case 'left' : ?>
							<option value="left"><?php _e('Align to the LEFT', THEMENAME); ?></option>
							<option value="right"><?php _e('Align to the RIGHT', THEMENAME); ?></option>
						<?php break;
						case 'right' : ?>
							<option value="right"><?php _e('Align to the RIGHT', THEMENAME); ?></option>
							<option value="left"><?php _e('Align to the LEFT', THEMENAME); ?></option>
						<?php break;
						} ?>
					</select>
					<div class="desc_bottom">
						<?php _e("Default sidebar positioning is set to the RIGHT.", THEMENAME); ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<!-- Choose Works & Blog Sidebar -->
			<div class="section_settings">
				<div class="settings_left">
					<div class="settings_left_title">
						<?php _e('Choose Blog Sidebar', THEMENAME); ?>
					</div>
					<select name="blog_sidebar">
						<?php foreach($sidebar['custom_sidebars'] as $key => $value ) : ?>
							<?php if( $sidebar['blog_sidebar'] == $value ) : ?>
									<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
						<?php foreach($sidebar['custom_sidebars'] as $key => $value ) : ?>
							<?php if( $sidebar['blog_sidebar'] != $value ) : ?>
								<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
					<div class="desc_bottom">
						<?php _e("Choose default sidebar to be displayed in Blog pages.", THEMENAME); ?>
					</div>
				</div>
				<div class="settings_left">
					<div class="settings_left_title">
						<?php _e('Choose Works Pages Sidebar', THEMENAME); ?>
					</div>
					<select name="works_sidebar">
						<?php foreach($sidebar['custom_sidebars'] as $key => $value ) : ?>
							<?php if( $sidebar['works_sidebar'] == $value ) : ?>
									<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
						<?php foreach($sidebar['custom_sidebars'] as $key => $value ) : ?>
							<?php if( $sidebar['works_sidebar'] != $value ) : ?>
								<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
					<div class="desc_bottom">
						<?php _e("Choose default sidebar to be displayed in Works pages.", THEMENAME); ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<!-- Choose Other & Search Pages Sidebar -->
			<div class="section_settings" style="border-bottom:none;">
				<div class="settings_left">
					<div class="settings_left_title">
						<?php _e('Choose Search Page Sidebar', THEMENAME); ?>
					</div>
					<select name="search_sidebar">
						<?php foreach($sidebar['custom_sidebars'] as $key => $value ) : ?>
							<?php if( $sidebar['search_sidebar'] == $value ) : ?>
									<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
						<?php foreach($sidebar['custom_sidebars'] as $key => $value ) : ?>
							<?php if( $sidebar['search_sidebar'] != $value ) : ?>
								<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
					<div class="desc_bottom">
						<?php _e("Choose default sidebar to be displayed in Search page.", THEMENAME); ?>
					</div>
				</div>
				<div class="settings_left">
					<div class="settings_left_title">
						<?php _e('Choose Other Pages Sidebar', THEMENAME); ?>
					</div>
					<select name="other_sidebar">
						<?php foreach($sidebar['custom_sidebars'] as $key => $value ) : ?>
							<?php if( $sidebar['other_sidebar'] == $value ) : ?>
									<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
						<?php foreach($sidebar['custom_sidebars'] as $key => $value ) : ?>
							<?php if( $sidebar['other_sidebar'] != $value ) : ?>
								<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
							<?php endif; ?>
						<?php endforeach; ?>
					</select>
					<div class="desc_bottom">
						<?php _e("Choose default sidebar to be displayed in other pages.", THEMENAME); ?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<!-- end firs block ------------------------------------------------------------------------------------------------->
	<!-- end Images uplouds block --------------------------------------------------------------------------------------->
	<div id="general_settings_dubble">
		<div class="general_title_dubble">
			<span class="float_left"><?php _e('Custom Sidebars', THEMENAME); ?></span>
			<span class="float_right">
				<div id="add_sidebar" class="add_sidebar" rel=".section" ><?php _e('Add Sidebar', THEMENAME); ?></div>
			</span>
		</div>
		<div class="active_settings_dubble">
			<div class="desc_bottom" style="padding:20px 0;">
				<?php _e("Important! All Custom Sidebars must have unique names.<br /> 
					When sidebar name is changed, all widget settings for this sidebar are cleared.", THEMENAME); ?>
			</div>
			<div id="section_block">
				<?php
					foreach($sidebar['sidebars_elements'] as $keys=>$value) { ?>
						<div class="section social_section" id="item<?php echo $keys; ?>" style="left: -1px; width: 683px;">
							<b><?php _e('Sidebar Name', THEMENAME); ?></b>
							<input class="sidebar_names" type="text" maxlength="70" name="sidebar_name<?php echo $keys; ?>" value="<?php echo $value; ?>" style="height:30px; margin:0 30px; width:383px;" />
							<span style="width:132px; top:-4px; padding:0;">
								<input id="removeId<?php echo $keys ?>" class="remove_sidebar" type="button" value="Delete Sidebar" style="top:0; width:130px;" />
							</span>
						</div>
				<?php } ?>
				<input type="hidden" value="<?php foreach($sidebar['sidebars_elements'] as $keys=>$val) { echo "item". $keys .","; }  ?>" name="items" />
			</div>
		</div> 
	</div>
	<p style="display:inline;">
		<input class="active_input" name='all' style="margin-right:20px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " type="submit" value="Save" /> 
	</p>
	<?php cuckoo_framework_footer(); ?>
</form>
</section>
<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 **************/

$cuckoo_social = get_option( THEMEPREFIX . "_social_settings" );
?>
<section id="main_content">
<?php
if(isset($_REQUEST['all']))
{
	$r = 1;
	$items = $_POST['items'];
	$elements = array();
	$ItemsAll = array();
	$all = array();
	$items_array = explode(',', $items);
	
	foreach($items_array as $key=>$item) 
	{ 
		$items = substr($item,4);
		if($items != '')
		{
			$ItemsAll[$key] = $items;
			$keys = $key+$r;
			$socialId = array( 'eile' => $keys , 'id' => $items );
			array_push($elements, $socialId);
		}
	}
	foreach($elements as $key=>$val)
	{
		if( $val['id'] == 1 )
		{
			$ele = array( $key => array( 'id' => '1', 'name' => 'Facebook', 'class' => 'facebook' , 'link' => '' , 'description' => 'Enter your Facebook URL.', 'values' => $_POST['Facebook'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 2 )
		{
			$ele = array( $key => array( 'id' => '2' , 'name' => 'Twitter', 'class' => 'twitter' , 'link' => '' , 'description' => 'Enter your Twitter URL.', 'values' => $_POST['Twitter'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 3 )
		{
			$ele = array( $key => array( 'id' => '3', 'name' => 'Google+', 'class' => 'google' , 'link' => '' , 'description' => 'Enter your Google+ URL.', 'values' => $_POST['Google+'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 4 )
		{
			$ele = array( $key => array( 'id' => '4', 'name' => 'Flickr', 'class' => 'flickr' , 'link' => '' , 'description' => 'Enter your Flickr URL.', 'values' => $_POST['Flickr'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 5 )
		{
			$ele = array( $key => array( 'id' => '5', 'name' => 'Instagram', 'class' => 'instagram' , 'link' => '' , 'description' => 'Enter your Instagram URL.', 'values' => $_POST['Instagram'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 6 )
		{
			$ele = array( $key => array( 'id' => '6', 'name' => 'Pinterest', 'class' => 'pinterest' , 'link' => '' , 'description' => 'Enter your Pinterest URL.', 'values' => $_POST['Pinterest'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 7 )
		{
			$ele = array( $key => array( 'id' => '7', 'name' => 'Dribbble', 'class' => 'dribble' , 'link' => '' , 'description' => 'Enter your Dribbble URL.', 'values' => $_POST['Dribbble'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 8 )
		{
			$ele = array( $key => array( 'id' => '8', 'name' => 'Behance', 'class' => 'behance' , 'link' => '' , 'description' => 'Enter your Behance URL.', 'values' => $_POST['Behance'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 9 )
		{
			$ele = array( $key => array( 'id' => '9', 'name' => 'YouTube', 'class' => 'youtube' , 'link' => '' , 'description' => 'Enter your YouTube URL.', 'values' => $_POST['YouTube'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 10 )
		{
			$ele = array( $key => array( 'id' => '10', 'name' => 'Vimeo', 'class' => 'vimeo' , 'link' => '' , 'description' => 'Enter your Vimeo URL.', 'values' => $_POST['Vimeo'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 11 )
		{
			$ele = array( $key => array( 'id' => '11', 'name' => 'Linkedin', 'class' => 'linkendin' , 'link' => '' , 'description' => 'Enter your Linkedin URL.', 'values' => $_POST['Linkedin'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 12 )
		{
			$ele = array( $key => array( 'id' => '12', 'name' => 'Email', 'class' => 'email' , 'link' => 'mailto:' , 'description' => 'Enter your contact Email Address.', 'values' => $_POST['Email'] ));
			array_push($all, $ele);
		}else if( $val['id'] == 13 )
		{
			$ele = array( $key => array( 'id' => '13', 'name' => 'RSS', 'class' => 'rss' , 'link' => '' , 'description' => 'Enter the RSS feed URL.', 'values' => $_POST['RSS'] ));
			array_push($all, $ele);
		}
	}
	$settingsContent = array( 
		'post' => array(
			'post-facebook' 		=> esc_attr( $_POST['post-facebook'] ),
			'post-facebook-id' 		=> esc_attr( $_POST['post-facebook-id'] ),
			'post-twitter' 			=> esc_attr( $_POST['post-twitter'] ),
			'post-twitter-share' 	=> esc_attr( $_POST['post-twitter-share'] ),
			'post-google' 			=> esc_attr( $_POST['post-google'] ),
			'post-pinterest' 		=> esc_attr( $_POST['post-pinterest'] ),
		), 
		'work' => array(
			'work-facebook' 		=> esc_attr( $_POST['work-facebook'] ),
			'work-facebook-id' 		=> esc_attr( $_POST['work-facebook-id'] ),
			'work-twitter' 			=> esc_attr( $_POST['work-twitter'] ),
			'work-twitter-share' 	=> esc_attr( $_POST['work-twitter-share'] ),
			'work-google' 			=> esc_attr( $_POST['work-google'] ),
			'work-pinterest' 		=> esc_attr( $_POST['work-pinterest'] ),
		),
		'another' => array(
			'display_media_search' => esc_attr( $_POST['display_media_search'] )
		)
	);
	
	$cuckoo_social = array( 'elements' => $all , 'settings' => $settingsContent );
	update_option( THEMEPREFIX . "_social_settings" , $cuckoo_social );
?>
	<div id="save_upadate" class="updated"><?php _e('New settings saved!', THEMENAME); ?></div>
<?php
}
?>
	<?php cuckoo_framework_head( __('Social Media', THEMENAME) ); ?>
	<script type="text/javascript">
		document.onselectstart = function () { return false; }
	</script>
	<form id="formId" method="POST" action="">
		<div id="general_settings">
			<div class="general_title_active">
				<span class="float_left"><?php _e('Social Media & Search Bar', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings">
					<label class="checkbox_form" for="display_media_search">
						<input type="checkbox" name="display_media_search" id="display_media_search" value="1" <?php echo ($cuckoo_social['settings']['another']['display_media_search'] == 1) ? 'checked="checked"' : ''; ?> /> <?php _e(' Display Social Media & Search Bar in Landing pages.', THEMENAME); ?>
					</label>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Share Your Content', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings">
					<div class="desc_bottom" style="padding-top:0; padding-bottom:30px;">
						<?php _e("Add Social Media functionality to your posts and works, and share your content in the most popular social networks. 
						Choose Social Media Networks where you want to share your content, and share buttons will be displayed in each blog post and work page.", THEMENAME); ?>
					</div>
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Share Your Posts', THEMENAME); ?>
						</div>
						<div class="contact-checkbox">
							<div class="add-element-input-1">
								<label for="post-facebook">
									<input type="checkbox" id="post-facebook" name="post-facebook" value="1" <?php echo ($cuckoo_social['settings']['post']['post-facebook'] == 1) ? 'checked="checked"' : ''; ?> />  Facebook
								</label>
							</div>
							<div class="add-element-input-2">
								<label class="item-desc" for="post-facebook-id">Enter Your Facebook ID</label>
								<input type="text" id="post-facebook-id" name="post-facebook-id" class="itemInputText" value="<?php echo $cuckoo_social['settings']['post']['post-facebook-id']; ?>" />
							</div>
						</div>
						<div class="contact-checkbox">
							<div class="add-element-input-1">
								<label for="post-twitter">
									<input type="checkbox" name="post-twitter" id="post-twitter" value="1" <?php echo ($cuckoo_social['settings']['post']['post-twitter'] == 1) ? 'checked="checked"' : ''; ?> /> Twitter
								</label>
							</div>
							<div class="add-element-input-2">
								<label class="item-desc" for="post-twitter-share">Your Share Text</label>
								<input type="text" id="post-twitter-share" name="post-twitter-share" class="itemInputText" value="<?php echo $cuckoo_social['settings']['post']['post-twitter-share']; ?>" />
							</div>
						</div>						
						<div class="contact-checkbox">
							<label for="post-google">
								<input type="checkbox" name="post-google" id="post-google" value="1" <?php echo ($cuckoo_social['settings']['post']['post-google'] == 1) ? 'checked="checked"' : ''; ?> /> Google+
							</label>
						</div>						
						<div class="contact-checkbox">
							<label for="post-pinterest">
								<input type="checkbox" name="post-pinterest" id="post-pinterest" value="1" <?php echo ($cuckoo_social['settings']['post']['post-pinterest'] == 1) ? 'checked="checked"' : ''; ?> /> Pinterest
							</label>
						</div>
					</div>
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Share Your Works', THEMENAME); ?>
						</div>
						<div class="contact-checkbox">
							<div class="add-element-input-1">
								<label for="work-facebook">
									<input type="checkbox" name="work-facebook" id="work-facebook" value="1" <?php echo ($cuckoo_social['settings']['work']['work-facebook'] == 1) ? 'checked="checked"' : ''; ?> /> Facebook
								</label>
							</div>
							<div class="add-element-input-2">
								<label class="item-desc" for="work-facebook-id">Enter Your Facebook ID</label>
								<input type="text" id="work-facebook-id" name="work-facebook-id" class="itemInputText" value="<?php echo $cuckoo_social['settings']['work']['work-facebook-id']; ?>" />
							</div>
						</div>
						<div class="contact-checkbox">
							<div class="add-element-input-1">
								<label for="work-twitter">
									<input type="checkbox" name="work-twitter" id="work-twitter" value="1" <?php echo ($cuckoo_social['settings']['work']['work-twitter'] == 1) ? 'checked="checked"' : ''; ?> /> Twitter
								</label>
							</div>
							<div class="add-element-input-2">
								<label class="item-desc" for="work-twitter-share">Your Share Text</label>
								<input type="text" id="work-twitter-share" name="work-twitter-share" class="itemInputText" value="<?php echo $cuckoo_social['settings']['work']['work-twitter-share']; ?>" />
							</div>
						</div>						
						<div class="contact-checkbox">
							<label for="work-google">
								<input type="checkbox" name="work-google" id="work-google" value="1" <?php echo ($cuckoo_social['settings']['work']['work-google'] == 1) ? 'checked="checked"' : ''; ?> /> Google+
							</label>
						</div>						
						<div class="contact-checkbox">
							<label for="work-pinterest">
								<input type="checkbox" name="work-pinterest" id="work-pinterest" value="1" <?php echo ($cuckoo_social['settings']['work']['work-pinterest'] == 1) ? 'checked="checked"' : ''; ?> /> Pinterest
							</label>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Link to Your Social Profiles', THEMENAME); ?></span>
			</div>
			<div id="social-sortable" class="active_settings" style="display: block; margin-bottom:40px;">
				<div class="section_settings" style="border-bottom:none; position:relative;">
					<div class="desc_bottom" style="padding-top:0;">
						<?php _e("Add URLs to your Social Media Profiles, and Icons will be displayed in Homepage Social Media Unit, Contact Unit, 
						and in the Header of all landing pages below the title area. All Icons will be arranged in the same sequence as they are displayed here. 
						You can change the sequence of the icons by dragging them up or down.", THEMENAME); ?>
					</div>
					<div class="clear"></div>
				</div>
				<?php
				foreach($cuckoo_social['elements'] as $k => $val)
				{
					foreach($val as $key => $value)
					{ ?>
						<div class="social_section" id="item<?php echo $value['id']; ?>">
							<b><?php echo $value['name']; ?></b>
							<input type="text" name="<?php echo $value['name']; ?>" value="<?php echo $value['values']; ?>" />
							<span><?php echo $value['description']; ?></span>
							<div class="section_change"></div>
						</div>
						<?php 
					}
				}	
				?>
				<input type="hidden" name="items" value="<?php foreach($cuckoo_social['elements'] as $k => $val){ foreach($val as $key => $value){ echo "item".$value['id'].","; } } ?>" />
			</div>
		</div>
		<p style="display:inline;">
			<input class="active_input" name='all' style="margin-right:20px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " type="submit" value="Save" />
		</p>
		<?php cuckoo_framework_footer(); ?>
	</form>
</section>
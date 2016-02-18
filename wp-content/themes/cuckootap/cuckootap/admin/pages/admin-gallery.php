<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/
 /*
 * Galerry page 
 */
$cuckoo_gallery = get_option( THEMEPREFIX . "_gallery_settings" );
?>
<section id="main_content">
<?php
if(isset($_REQUEST['all']))
{
$portfolio			= esc_attr( $_POST['portfolio_content'] );
$exclude			= esc_attr( $_POST['exclude'] );
$exclude_portfilio	= esc_attr ( $_POST['port_exclude_name'] );
$portfolio_sort		= esc_attr ( $_POST['portfolio_sort'] );
$by_type_sort		= esc_attr ( $_POST['by_type_sort'] );


$cuckoo_gallery = array(
'portfolio'			=> $portfolio,
'exclude_name'		=> $exclude,
'exclude'			=> cuckoo_exclude_from_categories($exclude , 'types'),
'port_exclude_name'	=> $exclude_portfilio,
'exclude_portfilio' => cuckoo_exclude_from_categories($exclude_portfilio , 'types'),
'portfolio_sort'	=> $portfolio_sort,
'by_type_sort'		=> $by_type_sort
);

update_option( THEMEPREFIX . "_gallery_settings" , $cuckoo_gallery );
?>
	<div id="save_upadate" class="updated"><?php _e('New settings saved!', THEMENAME); ?></div>
<?php
}
?>
	<?php cuckoo_framework_head( __('Portfolio Gallery', THEMENAME) ); ?>
	<form id="formId" method="POST" action="">
		<div id="general_settings">
			<div class="general_title_active">
				<span class="float_left"><?php _e('Portfolio Page Templates', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings">
					<div class="desc_bottom" style="padding-top:0;">
						<?php _e('The settings of this framework section will be applied to the following templates: Portfolio 2 Columns (thumbnail size 470x225 pixels) and Portfolio 4 Columns (thumbnail size 225x225 pixels).', THEMENAME); ?>
					</div>
				</div>
				<div class="section_settings">
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Choose Default Portfolio Page Content', THEMENAME); ?>
						</div>
						<?php	
						 wp_dropdown_categories( array(
							'class' 			=> 'dropdown',
							'name' 				=> 'portfolio_content', 
							'show_option_all'	=> 'All Types of Works',
							'taxonomy'			=> 'types',
							'selected'			=> 	$cuckoo_gallery['portfolio']
						));					 				 
						 ?>
						 <div class="desc_bottom">
							<?php _e('Choose Type of Works to be displayed in Portfolio Page Templates by default.', THEMENAME); ?>
						</div>
					</div>
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Exclude Types of Works', THEMENAME); ?>
						</div>
						<input type="text" name="port_exclude_name" size="60" value="<?php echo $cuckoo_gallery['port_exclude_name']; ?>" />
						<div class="desc_bottom">
							<?php _e("Enter a comma-separated list of Types of Works that you want to exclude from displaying in Portfolio Page Templates. Example: Type1, Type2, Type3 ", THEMENAME); ?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section_settings">
						<div class="settings_left">
							<div class="settings_left_title">
								<?php _e('Choose Sorting of Works', THEMENAME); ?>
							</div>
							<select name="portfolio_sort" class="dropdown">
								<?php switch($cuckoo_gallery['portfolio_sort']) { 
									case "date" : ?>
										<option value="date"><?php _e('By Date', THEMENAME); ?></option>
										<option value="rand"><?php _e('Random', THEMENAME); ?></option>
									<?php break;
									case "rand" : ?>
										<option value="rand"><?php _e('Random', THEMENAME); ?></option>
										<option value="date"><?php _e('By Date', THEMENAME); ?></option>
								<?php break;
								} ?>
							</select>
						</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="general_title_active">
				<span class="float_left"><?php _e('Portfolio Templates by Work Type ', THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
				<div class="section_settings">
					<div class="desc_bottom" style="padding-top:0;">
						<?php _e('The settings of this framework section will be applied to the following templates: 
						Portfolio 2 Columns by Work Type (thumbnail size 470x225 pixels) and Portfolio 4 Columns by Work Type (thumbnail size 225x225 pixels). Using these templates you can build portfolio pages for a single work type.', THEMENAME); ?>
					</div>
				</div>
				<div class="section_settings" style="border:none;">
					<div class="settings_left">
						<div class="settings_left_title">
							<?php _e('Choose Sorting of Works', THEMENAME); ?>
						</div>
						<select name="by_type_sort" class="dropdown">
							<?php switch($cuckoo_gallery['by_type_sort']) { 
								case "date" : ?>
									<option value="date"><?php _e('By Date', THEMENAME); ?></option>
									<option value="rand"><?php _e('Random', THEMENAME); ?></option>
								<?php break;
								case "rand" : ?>
									<option value="rand"><?php _e('Random', THEMENAME); ?></option>
									<option value="date"><?php _e('By Date', THEMENAME); ?></option>
							<?php break;
							} ?>
						</select>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<p style="display:inline;">
			<input class="active_input" name='all' style="margin-right:20px; border:1px solid #227399; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; color:white; " type="submit" value="Save" />
		</p>
		<?php cuckoo_framework_footer(); ?>
	</form>
</section>
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
** Name : Update theme
*/
	?>
	<section id="main_content">
		<?php cuckoo_framework_head( __('Theme Updates', THEMENAME) ); ?>
		<div id="general_settings">
			<?php 
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
				if( version_compare( $theme_version, $xml->latest ) == -1 ){
					?>
					<div class="general_title_active">
						<span class="float_left"><?php _e('New Theme Update' , THEMENAME); ?></span>
						<img class="float_right" style="position:relative; top:-15px; right: 5px;" alt="attention" src="<?php echo get_template_directory_uri() .'/images/attention.gif'; ?>">
					</div>
					<div class="active_settings" style="display: block;">
					<div class="section_settings">
						<div id="message" class="updated" style="margin:0 0 30px; text-align: center;">
							<p><?php echo '<strong>There is a new version of the '. $theme_name .' theme available.</strong> You have version '. $theme_version .' installed. Update to version '. $xml->latest .' .'; ?></p>
						</div>
						<img style="width:200px;float:left;margin:0 20px 20px 0;border:1px solid #ddd;" src="<?php echo get_template_directory_uri() .'/screenshot.png'; ?>" alt="" />
						<h3>Update Download and Instructions</h3>
						<p><strong>Important:</strong> make a backup of the <?php echo $theme_name; ?> theme inside your WordPress installation folder <code><?php echo str_replace( site_url(), '', get_template_directory_uri() ); ?></code> before attempting to update.</p>
						<p>To update the <?php echo $theme_name; ?> theme, login to your ThemeForest account, head over to your downloads section and re-download the theme as you did when you purchased it.</p>
						<p>Extract the zip's contents, find the extracted theme folder, and upload the new files using FTP to the <code><?php echo str_replace( site_url(), '', get_template_directory_uri() ); ?></code> folder. This will overwrite the old files and is why it's important to backup any changes you've made to the theme files beforehand.</p>
						<p>If you didn't make any changes to the theme files, you are free to overwrite them with the new files without risk of losing theme settings, pages, posts, etc, and backwards compatibility is guaranteed.</p>
						<p>If you have made changes to the theme files, you will need to compare your changed files to the new files listed in the changelog below and merge them together.</p><br />
					</div>
					<?php
				} else {
					?>
					<div class="general_title_active">
						<span class="float_left"><?php _e('Latest Version' , THEMENAME); ?></span>
					</div>
					<div class="active_settings" style="display: block; text-align:center;">
						<div class="section_settings" style="font-size:15px; font-weight:bold; color:#227399;">
							<p>The <?php echo $theme_name; ?> theme is currently up to date at version <?php echo $theme_version; ?></p>
						</div>
					<?php
				}
				?>
				</div>
				<div class="general_title_active">
						<span class="float_left"><?php _e('Changelog' , THEMENAME); ?></span>
				</div>
				<div class="active_settings" style="display: block;">
					<div class="section_settings" style="border:none;">
						<?php echo $xml->text; ?>
					</div>
				<?php

			} else { 
			?> 
			<div class="general_title_active">
				<span class="float_left"><?php _e('Not Connection!' , THEMENAME); ?></span>
			</div>
			<div class="active_settings" style="display: block;">
					<div class="section_settings" style="border:none; text-align:center;">
					<?php _e( '<p>Error: Unable to fetch the changelog.</p>', THEMENAME ); ?>
			
			<?php
			}

			?>
			</div>
		</div>
	</section>
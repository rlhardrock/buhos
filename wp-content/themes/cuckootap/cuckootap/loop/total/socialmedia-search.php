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
** Name : Social media & search block
*/
$cuckoo_social = get_option( THEMEPREFIX . "_social_settings" );
?>
<?php if($cuckoo_social['settings']['another']['display_media_search'] == 1) : ?>
	<section id="social-search-block">
		<div class="testimonials-shadow"></div>
		<div class="social-search-block-content screen-large">
			<div class="social-block-page">
				<div class="social-media-page">
					<?php if( $cuckoo_social['elements'] != null ){
							foreach($cuckoo_social['elements'] as $k=>$v){
								foreach($v as $key=>$value){ 
									if($value['values'] != null){ ?>
										<a class="<?php echo $value['class'] ?>-small" title="<?php echo $value['name']; ?>" <?php if($value['name'] != 'Email') { ?> target="_blank" <?php } ?> href="<?php echo $value['link'].$value['values']; ?>"></a>
									<?php }
								}
							}
						}?>
				</div>
			</div>
			<div class="search-form-display">
				<?php echo cuckoo_search_form(); ?>
			</div>
		</div>
	</section>
<?php endif; ?>
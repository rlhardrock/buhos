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
** Name : Google map Contact
*/
$cuckoo_contact = get_option(THEMEPREFIX . "_contact_settings");
$cuckoo_social = get_option(THEMEPREFIX . "_social_settings");
$google_properties = cuckoo_icl_t_for_wpml(THEMENAME.' Contact Information', 'Your Address Google Map', $cuckoo_contact['google_properties']);
$contact_primary_email = cuckoo_icl_t_for_wpml(THEMENAME.' Contact Information', 'Primary Email Address', $cuckoo_contact['contact_primary_email']);
$contact_web = cuckoo_icl_t_for_wpml(THEMENAME.' Contact Information', 'Website Address', $cuckoo_contact['contact_web']);
$margin_icones = "";
if( !empty( $cuckoo_contact['contact_address'] ) or
	!empty( $cuckoo_contact['contact_details'] ) or 
	!empty( $contact_primary_email ) or
	!empty( $contact_web ) ) :
		$margin_icones = 'style="margin-top: 15px;"';
endif;
?>
<section id="contact" class="clearfix">
	<?php if($cuckoo_contact['contact_title']): ?>
	<header class="item-header-wrap">
		<div class="item-header screen-large">
			<div class="logo_content">
				<h2 class="logo"><?php cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Contact Unit Title', $cuckoo_contact['contact_title']); ?></h2>
			</div>
			<div class="title-shadow"></div>
		</div>
	</header>
	<?php endif; ?>
	<?php if($cuckoo_contact['map_show'] == 1): ?>
		<?php echo '<iframe class="map-baqckground" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;iwloc=yes&amp;hl=en&amp;q='.$google_properties.'&amp;z='.$cuckoo_contact['google_zoom_level'].'&amp;ie=UTF8&amp;t=m&amp;output=embed"></iframe>' ?>
	<?php else : 
		$backgroundColor 		= ( !empty($cuckoo_contact['backgroundColor']) ? 'background-color:'.$cuckoo_contact['backgroundColor'].";" : cuckoo_chrome_parallax() );
		$backgroundImage 		= ( !empty($cuckoo_contact['img_url']) ? "background-image:url('".$cuckoo_contact['img_url']."');" : '' );
		$backgroundPosition 	= ( !empty($cuckoo_contact['imgPosition']) ? 'background-position:'.$cuckoo_contact['imgPosition'].';' : '' );
		$backgroundAttachment 	= ( !empty($cuckoo_contact['imgAttachment']) ? 'background-attachment:'.$cuckoo_contact['imgAttachment'].';' : '' );
		$backgroundRepeat	 	= ( !empty($cuckoo_contact['imgRepeat']) ? 'background-repeat:'.$cuckoo_contact['imgRepeat'].';': '' );
		$parallaxSpeed			= ( !empty($cuckoo_contact['parallax-speed']) ? $cuckoo_contact['parallax-speed'] : 10 );
		$backgroundSize 		= '';
		$backgroundClass 		= '';
		
		if( $backgroundColor && !$backgroundImage ) :
			$backgroundImage = 'background-image:none;';
		endif;
		
		if($cuckoo_contact['imgRepeat'] == 'no-repeat'){
			$backgroundSize = 'background-size: 100% auto;';
			$backgroundClass = 'background-100';
		}
		
		if(!$backgroundImage or $backgroundImage == 'background-image:none;' ) :
			$backgroundPosition = ''; $backgroundAttachment = ''; $backgroundRepeat = '';
		endif;
		
		if($cuckoo_contact['parallax'] == '1') :
			$style = 'style="' . $backgroundColor . $backgroundImage . $backgroundRepeat . $backgroundSize . ' background-attachment:fixed" data-type="background" data-speed="'.$parallaxSpeed.'"';
		else :
			$style = 'style="' . $backgroundColor . $backgroundImage . $backgroundPosition . $backgroundAttachment . $backgroundRepeat . '"';
		endif; ?>
		<div class="map-baqckground image-map parallax-background section-parallax <?php echo $backgroundClass; ?>" <?php echo $style; ?>></div>
	<?php endif; ?>
	<article class="contact-content screen-large">
		<?php get_template_part("templates/contact_form"); ?>
		<?php if( $cuckoo_contact['contact_address'] or 
				$cuckoo_contact['contact_details'] or 
				$contact_primary_email or 
				$contact_web or
				$cuckoo_social['elements'] ) :  
		?>
			<div class="contact-info-block">
				<?php if($cuckoo_contact['contact_address']): ?>
					<strong><?php cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Address', nl2br($cuckoo_contact['contact_address'])); ?></strong><br />
				<?php endif; ?>			
				<?php if($cuckoo_contact['contact_details']): ?>
					<span><?php cuckoo_echo_for_wpml(THEMENAME.' Contact Information', 'Contact Details', nl2br($cuckoo_contact['contact_details'])); ?></span><br />
				<?php endif; ?>			
				<?php echo $email = ($contact_primary_email != null ? '<a href="mailto:'.$contact_primary_email.'">'.$contact_primary_email.'</a><br />' : "");  ?>
				<?php echo $website = ($contact_web != null ? '<a target="_blank" href="http://'.$contact_web.'">'.$contact_web.'</a>' : "" );  ?>
				<?php if($cuckoo_contact['display_icon'] == "Yes") : ?>
					<div class="contact-social-media" <?php echo $margin_icones; ?>>
						<?php if( $cuckoo_social['elements'] != null )
							{
								foreach($cuckoo_social['elements'] as $k=>$v)
								{
									foreach($v as $key=>$value)
									{ 
										if($value['values'] != null)
										{  ?>
											<a class="<?php echo $value['class'] ?>-small" title="<?php echo $value['name']; ?>" <?php if($value['name'] != 'Email') { ?> target="_blank" <?php } ?> href="<?php echo $value['link'].$value['values']; ?>"></a>
										<?php 
										}
									}
								}
							} ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</article>
	<?php if($cuckoo_contact['map_show'] == 1): ?>
		<div class="show-map"><?php _e('Map On', THEMENAME); ?></div>
	<?php endif; ?>
	<div id="result"></div>
</section>
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
** Name: Work Gallery
*/
?>
<section id="work-gallery">
	<div id="gallery-container">
		<?php 
		$slider_elements = get_option( THEMEPREFIX . "_slidershow_settings"); 
		$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
		if( $cuckoo_settings['theme-style'] == 'dark' ){
			$preoladColor = '#fff';
		}else{
			$preoladColor = '#000';
		}
		?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				var opts = {
				  lines: 11, // The number of lines to draw
				  length: 3, // The length of each line
				  width: 4, // The line thickness
				  radius: 9, // The radius of the inner circle
				  corners: 1, // Corner roundness (0..1)
				  rotate: 0, // The rotation offset
				  color: '<?php echo $preoladColor; ?>', // #rgb or #rrggbb
				  speed: 1.3, // Rounds per second
				  trail: 81, // Afterglow percentage
				  shadow: false, // Whether to render a shadow
				  hwaccel: false, // Whether to use hardware acceleration
				  className: 'spinner', // The CSS class to assign to the spinner
				  zIndex: 2e9, // The z-index (defaults to 2000000000)
				  top: 'auto', // Top position relative to parent in px
				  left: 'auto' // Left position relative to parent in px
				};
				var gallerySlidePreloader = document.getElementById('sliderPreload-slide-gallery');
				var spinnerGallery = new Spinner(opts).spin(gallerySlidePreloader);
			});
		
			jQuery(window).load(function() {
				jQuery('#work-slides').nivoSlider({
					effect: '<?php echo $slider_elements['settings']['nivo_effect']; ?>',
					pauseOnHover: true,
					heightAuto: false,
					animSpeed: <?php echo $slider_elements['settings']['animationspeed']; ?>,
					pauseTime: <?php echo $slider_elements['settings']['slider_timeout']; ?>,
					boxCols: <?php echo $slider_elements['settings']['box_cols']; ?>, 
					boxRows: <?php echo $slider_elements['settings']['box_rows']; ?>,
					controlNav: true,
					directionNavHide: false,
					directionNav : false,
					afterLoad: function(){
						jQuery(".slidePreloadImgGalleries").fadeOut(800);
					}
				});
				
										/* Slideshow delete first element */
				var total = jQuery('#work-slides img').length;
				if( total <= 2 ){
					jQuery('.slideshow-content').find(".nivo-controlNav").css("display", "none");
					jQuery('#work-slides').data('nivoslider').stop();
					jQuery('.slideshow-content').addClass('one-img-gallery');
				}else{
					jQuery('#main-container').addClass('gallery-format-not-one');
				}
			});
		</script>
		<article class="slideshow-content">
			<div id="work-slides" class="work-nivo-slideshow">
			<?php for( $i = 1; $i <= 10; $i++ ) {
					$images_text = cuckoo_get_post_meta(get_the_ID(), "_upload_text".$i);
					$images_url = cuckoo_get_post_meta(get_the_ID(), "_upload_image".$i);
					$url = ( $images_url == "Image URL" ) ? "" : $images_url;
					$text = ( $images_text == "Add Title" ) ? "" : $images_text;
					if( $url != null ) : ?>
						<a class="titan-lb" data-titan-lightbox="on" data-titan-group="gallery" href="<?php echo cuckoo_get_attachment_all_size($url); ?>" title="<?php echo $text; ?>">
							<img alt="<?php echo $text; ?>" title="<?php echo $text; ?>" src="<?php echo cuckoo_get_attachment_all_size($url , 'work-gallery'); ?>">
						</a>
					<?php endif;	
				}
			?>
			</div>
			<div class="slidePreloadImgGalleries">
				<div id="sliderPreload-slide-gallery"></div>
				<div class="circle_preload"></div>
			</div>
		</article>
		<div class="border-img-galleries"></div>
	</div>
</section>
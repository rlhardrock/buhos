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
** Name : SlidesShow Nivo
*/
$slider_elements = get_option( THEMEPREFIX . "_slidershow_settings");
?>
	<script type="text/javascript">
		<?php 
		$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
		if( $cuckoo_settings['theme-style'] == 'dark' ){
			$preoladColor = '#fff';
		}else{
			$preoladColor = '#000';
		}
		?>
		jQuery(document).ready(function($){
			if($('#footer-container').width() == 225 ){
				$('.main-slider').css('height', 400);
			}else if($('#footer-container').width() == 470){
				$('.main-slider').css('height', 560);
			}else{
				$('.main-slider').css('height', 660);
			}
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
			var mainSlidePreloader = document.getElementById('sliderPreload-slide');
			var spinnerSS = new Spinner(opts).spin(mainSlidePreloader);
		});
		jQuery(window).load(function() {
			jQuery('#slider').nivoSlider({
				effect: '<?php echo $slider_elements['settings']['nivo_effect']; ?>',
				captionEffect: '<?php echo $slider_elements['settings']['caption_effect']; ?>',
				pauseOnHover: <?php echo $slider_elements['settings']['slider_hover']; ?>,
				animSpeed: <?php echo $slider_elements['settings']['animationspeed']; ?>,
				pauseTime: <?php echo $slider_elements['settings']['slider_timeout']; ?>,
				boxCols: <?php echo $slider_elements['settings']['box_cols']; ?>, 
				boxRows: <?php echo $slider_elements['settings']['box_rows']; ?>,
				controlNav: false,
				prevText: '', 
				nextText: '',
				directionNavHide: false,
				afterLoad: function(){
					var widthRight = jQuery('#slider').width();
					jQuery(".slidePreloadImg").fadeOut(800);
					if(jQuery('body.cuckoo-not-responsive').length == 0){
						jQuery(".nivo-caption").css({ width: jQuery(window).width()});
					}else{
						if( 960 > jQuery(window).width() ){
							jQuery(".nivo-caption").css({ width: 960});
						}else{
							jQuery(".nivo-caption").css({ width: jQuery(window).width()});
						}
					}
					<?php if($slider_elements['settings']['caption_effect'] == 'slide') : ?>
						jQuery(".nivo-caption").css({ right: "-"+widthRight+"px" });
						jQuery(".nivo-caption").animate({right:0}, { easing:"easeOutBack", duration: <?php echo $slider_elements['settings']['animationspeed']; ?> } )
					<?php elseif($slider_elements['settings']['caption_effect'] == 'fade') : ?>
						jQuery(".nivo-caption").css({ display: 'none' });
						jQuery(".nivo-caption").fadeIn(<?php echo $slider_elements['settings']['animationspeed']; ?>);
					<?php endif; ?>
					
				},
				beforeChange: function(){
					var widthRight = jQuery('#slider').width();
					if(jQuery('body.cuckoo-not-responsive').length == 0){
						jQuery(".nivo-caption").css({ width: jQuery(window).width()});
					}else{
						if( 960 > jQuery(window).width() ){
							jQuery(".nivo-caption").css({ width: 960});
						}else{
							jQuery(".nivo-caption").css({ width: jQuery(window).width()});
						}
					}
					jQuery(".nivo-caption").find(".title-content").css({ height: jQuery('#slider img.nivo-main-image').height() });
					<?php if($slider_elements['settings']['caption_effect'] == 'slide') : ?>
						jQuery(".nivo-caption").animate({right:"-"+widthRight+"px" }, { easing:"easeInBack", duration: <?php echo $slider_elements['settings']['animationspeed']; ?> } )
					<?php elseif($slider_elements['settings']['caption_effect'] == 'fade') : ?>
						jQuery(".nivo-caption").fadeOut(<?php echo $slider_elements['settings']['animationspeed']; ?>);
					<?php endif; ?>
				},
				afterChange: function(){
					var widthRight = jQuery('#slider').width();
					if(jQuery('body.cuckoo-not-responsive').length == 0){
						jQuery(".nivo-caption").css({ width: jQuery(window).width()});
					}else{
						if( 960 > jQuery(window).width() ){
							jQuery(".nivo-caption").css({ width: 960});
						}else{
							jQuery(".nivo-caption").css({ width: jQuery(window).width()});
						}
					}
					jQuery(".nivo-caption").find(".title-content").css({ height: jQuery('#slider img.nivo-main-image').height() });
					<?php if($slider_elements['settings']['caption_effect'] == 'slide') : ?>
						jQuery(".nivo-caption").animate({right:0}, { easing:"easeOutBack", duration: <?php echo $slider_elements['settings']['animationspeed']; ?> } )
					<?php elseif($slider_elements['settings']['caption_effect'] == 'fade') : ?>
						jQuery(".nivo-caption").fadeIn(<?php echo $slider_elements['settings']['animationspeed']; ?>);
					<?php endif; ?>
				}
			});
			
			var total = jQuery('#slider img').length;
			if( total <= 2 ){
				jQuery('#sliderWrappe').find(".nivo-directionNav").css("display", "none");
				jQuery('#slider').data('nivoslider').stop();
			}
		});
	</script>
		<section id="sliderWrappe" class="clearfix">
            <div id="slider" class="main-slider">
				<?php
					foreach( $slider_elements['elements'] as $keys ){
						foreach( $keys as $key=>$slider ){
							if($slider['img'] != null ){ ?>
								<img src="<?php echo cuckoo_get_attachment_all_size( $slider['img'] , 'main-slideshow'); ?>" alt="<?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Nivo Slides nr-'.$key, 'Image Title', cuckoo_max_trim( $slider['title'], 90 )); ?>" title="<?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Nivo Slides nr-'.$key, 'Image Title', cuckoo_max_trim( $slider['title'], 90 )); ?>" data-title="<?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Nivo Slides nr-'.$key, 'Slide Title', nl2br($slider['slide_title'])); ?>" data-subtitle="<?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Nivo Slides nr-'.$key, 'Slide Subtitle', nl2br($slider['slide_subtitle'])); ?>" data-aling-title="<?php echo $slider['title_aling'];?>" data-button-title="<?php cuckoo_echo_for_wpml(THEMENAME.' Homepage Nivo Slides nr-'.$key, 'Slide Button Title', $slider['title_button_slides']); ?>" data-button-url="<?php echo $slider['url_button_slides'];?>" >
							<?php }
						}
					}
				?>
			</div>
			<div class="imgwrapper"></div>
			<div class="slidePreloadImg">
				<div id="sliderPreload-slide"></div>
				<div class="circle_preload"></div>
			</div>
		</section>
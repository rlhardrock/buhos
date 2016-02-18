/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/
 
 
jQuery(document).ready(function($){
	$("#cuckoo-contact-form").submit(function() {
		var contactSubmit = $(this);
		if(typeof contactSubmit != "undefined"){
				var name = $(this).find(":input[type=text]#contact_name").val(),
					email = $(this).find(":input[type=email]#email_contact").val(),
					content = $(this).find("textarea#contact_message").val(),
					numbers = $(this).find(":input.amount-checker").val();
					preloderColor = $(this).find(":input[type=hidden][name=style-theme]").val();
					amount = $(this).find(":input[type=hidden][name=amount-cuckoo]").val();

				if( name == '') {
					$(this).find(":input[type=text]#contact_name").css("border", "1px solid red");
				}
				
				if( content == '' ) { 
					$(this).find("textarea#contact_message").css("border", "1px solid red");
				}
				
				if( email == '' ) {
					$(this).find(":input[type=email]#email_contact").css("border", "1px solid red");
				}
				
				if( name == '' || content == '' || email == '' ) {
					return false;
				}else{
					if(contactSubmit.find('#number_checked').css('display') == 'none'){
						var	heightNumbers = $('.map-baqckground').height()-$('#contact').find('.item-header-wrap').height(),
							widthNumbers = $('.contact-content').width();
							
						contactSubmit.find('#number_checked').css({'width': widthNumbers, 'height': heightNumbers}).fadeIn('slow');
						$('.show-map').css('z-index', 4);
						return false;
					}else{
						if( numbers == '' ) { 
							$(this).find(":input.amount-checker").css("border", "1px solid red");
							return false;
						}else{
							if( numbers == amount ){
								contactSubmit.find('#number_checked').fadeOut(800);
								var str = $(this).serialize(),
									heightPreload = $('.map-baqckground').height(),
									marginTop = $('#contact').find('.item-header-wrap').height(),
									opts = {
									  lines: 11, // The number of lines to draw
									  length: 3, // The length of each line
									  width: 4, // The line thickness
									  radius: 9, // The radius of the inner circle
									  corners: 1, // Corner roundness (0..1)
									  rotate: 0, // The rotation offset
									  color: preloderColor,// #rgb or #rrggbb
									  speed: 1.3, // Rounds per second
									  trail: 81, // Afterglow percentage
									  shadow: false, // Whether to render a shadow
									  hwaccel: false, // Whether to use hardware acceleration
									  className: 'spinner', // The CSS class to assign to the spinner
									  zIndex: 2e9, // The z-index (defaults to 2000000000)
									  top: 'auto', // Top position relative to parent in px
									  left: 'auto' // Left position relative to parent in px
									};
								contactSubmit.parent().parent().append('<div class="form-preload"><div id="preload-map"></div><div class="circle_preload"></div></div>').find(".form-preload").css({'height': heightPreload, 'margin-top': marginTop }).fadeIn();
									var mapPreloader = document.getElementById('preload-map'),
										spinner = new Spinner(opts).spin(mapPreloader);
								$.ajax({
									type: 'POST',
									url: contactajaxcuckoo.ajaxurl,
									data: 'action=contact_form&'+str,
									success: function(msg) {
										$("#result").ajaxComplete(function(event, request, settings){
											$('.form-preload').find('#preload-map').fadeOut('slow');
											$('.form-preload').find('.circle_preload').fadeOut('slow');
											if( msg == 0 ){
												$(this).append('<p class="error">An error has occurred while sending your email!</p>');
											}else{
												$(this).html(msg);
											}
											if($(this).css('display') == 'none'){
												$(this).fadeIn(800,function(){
													contactSubmit.find(":input[type=text]#contact_name").attr('value','');
													contactSubmit.find(":input[type=email]#email_contact").attr('value','');
													contactSubmit.find("textarea#contact_message").attr('value','');
													contactSubmit.find(":input[type=text].amount-checker").attr('value','');
													contactSubmit.find(".form_label_logs_name").css('top', 6);
													contactSubmit.find(".form_label_logs_email").css('top', 6);
													contactSubmit.find(".form_label_textarea").css('top', 6);
												}).delay(2000).fadeOut(800, function(){
													$('.form-preload').fadeOut('slow', function(){
														$('.show-map').css('z-index', 5);
														$(this).remove();
														$('#result').find('p').remove();
													});
												});
											}
										});
									}
								});
							}else{
								$(this).find(":input.amount-checker").css("border", "1px solid red");
								return false;
							}
						}
					}
				}
			}
			return false;
    });
});
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
**************
*
** Comments 
*/
jQuery(document).ready(function($) {
 // hides as soon as the DOM is ready
 $( 'div.section_body' ).hide();
 // shows on clicking the noted link
 $( 'h3' ).click(function() {
 $(this).toggleClass("open");
 $(this).next("div").slideToggle( '1000' );
 return false;
 });

});

jQuery(document).ready(function($){
	$("div#save_upadate").delay(3000).fadeOut(2000);

	/* Logo setings in header-footer page */
	$("#logo_setting").each(function(){
		var option = $("option:selected", this).val();
		if(option == "Image Logo"){
			$("#id_logo").css("display", "block");
		} else if(option == "Plain Text Logo"){
			$("#id_plain_text").css("display", "block");
		}
	});
	
	$("#logo_setting").change(function(event){
		$("option:selected", $(this)).each(function(){
			var option = document.getElementById('logo_setting').value;
			if(option == "Image Logo"){
				$("#id_plain_text").slideUp(500, function(){
					$("#id_logo").slideDown(500);
				});
			} else if(option == "Plain Text Logo"){
				$("#id_logo").slideUp(600, function(){
					$("#id_plain_text").slideDown(900);
				});
			} else {
				$("#id_logo").slideUp();
				$("#id_plain_text").slideUp();
			}
		});
	});
	/* Logo end */
	/* homepage builder */
	$(".expand_button").click(function(){
		var val = $(this).val();
		var id = $(this).attr("id").replace(/expand-item-/, '');
		var container = $( "#item-" + id ).find(".drag-container");
		if(val == "Expand" && container.css("display") == "none"){
			$(this).attr("value", "Collapse");
		}else{
			$(this).attr("value", "Expand");
		}
		container.toggle(1000);
	});
	
	$('.builder').relCopyBuilder();
	
	$("input.unit-title-input").keyup(function () {
		var value = $(this).val();
		var id = $(this).attr("id").replace(/unit-title-id-/, '');
		if(value == ""){
			$(this).css("box-shadow", "0px 0px 3px red");
			$("#unit-title-item-"+id).html('<span style="color:red;">Enter a Title or Delete this Unit.</span>');
		}else{
			$(this).css("box-shadow", "none");
			$("#unit-title-item-"+id).text(value);
		}
    }).keyup();

	$('.remove_button').click(function(){
		sect = $(".section").length;
		var id = $(this).attr('id').replace(/remove-item-/, '');
		var item = "item-"+id+",";
		var valueItem = $('#item-' +id).find(':input[type=text][name=title-'+ id +']').val();
		var nameSlides = $('#item-' +id).find(':input[type=text][name=title-'+ id +']').val();
		var showname = ( nameSlides > "" ? nameSlides : "No title" );
		if( valueItem.length > 0 ){
			if(confirm("You are about to delete \""+ showname +"\" unit?\nClick 'Cancel' to stop, 'OK' to continue.")){
				a = $('#section_block').find(':input[type=hidden][name=items]').val().replace(item, '');
				if( sect > 1 ) {
					$('#section_block').find(':input[type=hidden][name=items]').attr('value', a);
					$( '#item-' +id ).remove();
				}else{
					$('.section .section_main').find(':input[type=text][name=title-'+ id +']').attr('value', '' );
				}
				alert("Delete '"+ showname +"' unit!");
			}
		}else{
			a = $('#section_block').find(':input[type=hidden][name=items]').val().replace(item, '');
			if( sect > 1 ) {
				$('#section_block').find(':input[type=hidden][name=items]').attr('value', a);
				$( '#item-' +id ).remove();
			}
		}
		return false;
	});
	
	/* Color picker */
	$('.selectPicker').click(function(){
		var id = $(this).attr('id').replace(/colorPicker-/, '');
		$( '#color_picker_color-'+ id ).farbtastic( '#color-'+ id );
		$( '#color_picker_color-'+ id  ).toggle('slow');
	});
	
	
	
	
	
	$(".unit-source-select").each(function(){
		var id = $(this).attr('id').replace(/unit-source-/, '');
		/* since 2.4 woocommers attributes */
		var woocommers = $("#section_block.builder-container").find(':input[name=woocommerce-active-builder]').val();
		var option = $("option:selected", this).val();
		if(option == "Testimonials"){
			$("#testimonials-" + id).css("display", "block");
		}else if(option == "Team"){
			$("#team-" + id ).css("display", "block");
		}else if(option == "Blog Posts"){
			$("#blog-post-" + id ).css("display", "block");
		}else if(option == "Page"){
			$("#page-source-" + id ).css("display", "block");
		}else if(option == "Text Box"){
			$("#text-box-" + id ).css("display", "block");
		}else if(option == "Social Media"){
			$("#socialMedia-" + id ).css("display", "block");
		}else if(option == "Works Gallery"){
			$("#works-post-" + id ).css("display", "block");
		}else if(option == "WooCommerce"){
			if(woocommers == "true"){
				$("#woocommerce-" + id ).css("display", "block");
			}
		}else if(option == "Woo Navigation Bar"){
			if(woocommers == "true"){
				$("#woocommerce-links-" + id ).css("display", "block");
			}
		}else if(option == "HTML Text"){
			$("#image-source-" + id ).css("display", "block");
		}else if(option == "Slideshow"){ // no subtitle
			$("#slideshow-bilder-" + id).css("display", "block");
		}
	});
	
	var woo = $("#section_block.builder-container").find(':input[name=woocommerce-active-builder]').val();
	if(woo == "true"){
		$('.wooSource').each(function(){
			var id = $(this).attr('id').replace(/wooSource-/, '');
			var option = $("option:selected", this).val();
			if(option == "Products"){
				$(this).closest('#woocommerce-'+ id).find('.product-source').css('display', 'block');
			}else if(option == "Categories"){
				$(this).closest('#woocommerce-'+ id).find('.categories-source').css('display', 'block');
			}
		});
		
		$(".wooSource").change(function(event){
			var e = $(this), id = e.attr('id').replace(/wooSource-/, '');
			$("option:selected", e).each(function(){
				var option = document.getElementById( 'wooSource-'+id ).value;
				if(option == "Products"){
					e.closest('#woocommerce-'+ id).find('.product-source').fadeIn(400);
				}else if(option == "Categories"){
					e.closest('#woocommerce-'+ id).find('.product-source').fadeOut(200);
				}
			});
		});
	}
	$(".unit-source-select").change(function(event){
		var id = $(this).attr('id').replace(/unit-source-/, '');
		/* since 2.4 woocommers attributes */
		var woocommers = $("#section_block.builder-container").find(':input[name=woocommerce-active-builder]').val(), wooId, wooLinks;
		if(woocommers == "true"){
			wooId = ", #woocommerce-" + id;
			wooLinks = ", #woocommerce-links-" + id;
		}else{
			wooId = "";
			wooLinks = "";
		}
		
		$("option:selected", $(this)).each(function(){
			var option = document.getElementById( 'unit-source-'+id ).value;
			if(option == "Testimonials"){
				$("#team-" + id + ", #blog-post-" + id + ", #page-source-" + id + ", #text-box-" + id + ", #socialMedia-" + id + ", #works-post-" + id + wooId + wooLinks + ", #image-source-" + id + ", #slideshow-bilder-" + id).slideUp(500, function(){
					$("#testimonials-" + id).slideDown(800);
				});	
			}else if(option == "Team"){
				$("#testimonials-" + id + ", #blog-post-" + id + ", #page-source-" + id + ", #text-box-" + id + ", #socialMedia-" + id + ", #works-post-" + id + wooId + wooLinks + ", #image-source-" + id + ", #slideshow-bilder-" + id).slideUp(500, function(){
					$("#team-" + id).slideDown(800);
				});
			}else if(option == "Blog Posts"){
				$("#testimonials-" + id + ", #team-" + id + ", #page-source-" + id + ", #text-box-" + id + ", #socialMedia-" + id + ", #works-post-" + id + wooId + wooLinks + ", #image-source-" + id + ", #slideshow-bilder-" + id).slideUp(400, function(){
					$("#blog-post-" + id).slideDown(400);
				});
			}else if(option == "Page"){
				$("#testimonials-" + id + ", #team-" + id + ", #blog-post-" + id + ", #text-box-" + id + ", #socialMedia-" + id + ", #works-post-" + id + wooId + wooLinks + ", #image-source-" + id + ", #slideshow-bilder-" + id).slideUp(500, function(){
					$("#page-source-" + id).slideDown(400);
				});
			}else if(option == "Text Box"){
				$("#testimonials-" + id + ", #team-" + id + ", #blog-post-" + id + ", #page-source-" + id + ", #socialMedia-" + id + ", #works-post-" + id + wooId + wooLinks + ", #image-source-" + id + ", #slideshow-bilder-" + id).slideUp(500, function(){
					$("#text-box-" + id).slideDown(400);
				});
			}else if(option == "Social Media"){
				$("#testimonials-" + id + ", #team-" + id + ", #blog-post-" + id + ", #page-source-" + id + ", #text-box-" + id + ", #works-post-" + id + wooId + wooLinks + ", #image-source-" + id + ", #slideshow-bilder-" + id).slideUp(500, function(){
					$("#socialMedia-" + id).slideDown(400);
				});
			}else if(option == "Works Gallery"){
				$("#testimonials-" + id + ", #team-" + id + ", #blog-post-" + id + ", #page-source-" + id + ", #text-box-" + id + ", #socialMedia-" + id + wooId + wooLinks + ", #image-source-" + id+ ", #slideshow-bilder-" + id).slideUp(500, function(){
					$("#works-post-" + id).slideDown(400);
				});
			}else if(option == "WooCommerce"){
				if(woocommers == "true"){
					$("#testimonials-" + id + ", #team-" + id + ", #blog-post-" + id + ", #page-source-" + id + ", #text-box-" + id + ", #socialMedia-" + id + ", #works-post-" + id+ ", #image-source-" + id + wooLinks + ", #slideshow-bilder-" + id).slideUp(500, function(){
						$("#woocommerce-" + id).slideDown(400);
					});
				}else{
					$("#woocommerce-" + id).css('display', 'none');
				}
			}else if(option == "Woo Navigation Bar"){
				if(woocommers == "true"){
					$("#testimonials-" + id + ", #team-" + id + ", #blog-post-" + id + ", #page-source-" + id + ", #text-box-" + id + ", #socialMedia-" + id + ", #works-post-" + id+ ", #image-source-" + id + wooId + ", #slideshow-bilder-" + id).slideUp(500, function(){
						$("#woocommerce-links-" + id).slideDown(400);
					});
				}else{
					$("#woocommerce-links-" + id).css('display', 'none');
				}
			}else if(option == "HTML Text"){
				$("#testimonials-" + id + ", #team-" + id + ", #blog-post-" + id + ", #page-source-" + id + ", #text-box-" + id + ", #socialMedia-" + id + ", #works-post-" + id + wooId + wooLinks + ", #slideshow-bilder-" + id).slideUp(500, function(){
					$("#image-source-" + id).slideDown(400);
				});
			}else if(option == "Slideshow"){
				$("#testimonials-" + id + ", #team-" + id + ", #blog-post-" + id + ", #page-source-" + id + ", #text-box-" + id + ", #socialMedia-" + id + ", #image-source-" + id +", #works-post-" + id + wooId + wooLinks ).slideUp(500, function(){
					$("#slideshow-bilder-" + id).slideDown(400);
				});
			} else {
				$("#testimonials-" + id + ", #team-" + id + ", #blog-post-" + id + ", #page-source-" + id + ", #text-box-" + id + ", #socialMedia-" + id + ", #works-post-" + id + wooId + wooLinks + ", #image-source-" + id + ", #slideshow-bilder-" + id).slideUp();
			}
		});
	});
	
	$(".add-element-input-2 input.itemInputText").each(function() {
		var label = $(this).parent().find(".item-desc");
		$(this).focus(function() {
			if( this.value != "" || this.value == "" ) {
				label.css("display", "none");
			}
		});
		$(this).blur(function() {
			if( this.value == "" ) {
				label.css("display", "block");
			}else{
				label.css("display", "none");
			}
		});
	});
	
	$(".add-element-input-2 input.itemInputText").each(function(){
		var content = $(this).val();
		if( content != "" ){
			$(this).parent().find(".item-desc").css("display", "none");
		}
	});
	
	$(".background-select-parallax").each(function(){
		var id = $(this).attr('id').replace(/parallax-effect-/, '');
		var option = $("option:selected", this).val();
		if(option == "1"){
			$("#background-setting-reapet-" + id).css("display", "block");
			$("#background-setting-speed-" + id).css("display", "block");
		}else{
			$("#background-setting-attach-" + id ).css("display", "block");
			$("#background-setting-reapet-" + id ).css("display", "block");
			$("#background-setting-position-" + id ).css("display", "block");
		}
	});
	
	$(".background-select-parallax").change(function(event){
		var id = $(this).attr('id').replace(/parallax-effect-/, '');
		$("option:selected", $(this)).each(function(){
			var option = document.getElementById( 'parallax-effect-'+id ).value;
			if(option == "1"){
				$("#background-setting-attach-" + id +", #background-setting-position-" + id).slideUp(300, function(){
					$("#background-setting-speed-" + id).slideDown(500);
				});
			} else {
				$("#background-setting-speed-" + id).slideUp(300, function(){
					$("#background-setting-attach-" + id +", #background-setting-position-" + id).slideDown(500);
				});
			}
		});
	});
	
});
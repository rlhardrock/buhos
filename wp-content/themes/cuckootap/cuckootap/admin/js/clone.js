(function(a)
{a.fn.relCopy=function(e){
var b=jQuery.extend({excludeSelector:".exclude",emptySelector:".empty",copyClass:"copy",append:"",clearInputs:!0,limit:0},e);
b.limit=parseInt(b.limit);
this.each(function(){
a(this).click(function(){
var f=a(this).attr("rel"),
d=a(f).length;
if(0!=b.limit&&d>=b.limit)return!1;
var c=a(f+":first"),
e=a(c).parent(),
c=a(c).clone(!0).addClass(b.copyClass+d).append(b.append);
b.excludeSelector&&a(c).find(b.excludeSelector).remove();
b.emptySelector&&a(c).find(b.emptySelector).empty();
a(c).attr('id', "item"+(d+1));
hid = a('#section_block').find(':input[type=hidden][name=items]').val();
valu = 'item'+(d+1);
a('#section_block').find(':input[type=hidden][name=items]').attr('value', hid+valu+',');
a(c).find('.section').attr('id', valu),
a(c).find('.remove_block').attr('id', 'removeId'+(d+1)),
a(c).find('.remove_sidebar').attr('id', 'removeId'+(d+1)),
a(c).find('.sidebar_names').attr('name', 'sidebar_name'+(d+1)).attr('value', '' ),
a(c).find('.img_input').attr('id', 'up_image'+(d+1)).attr('src', '' ),
a(c).find('.width_input_title').attr('name', 'img_title'+(d+1)).attr('value', '' ),
a(c).find('.width_input').attr('name', 'url_site'+(d+1)).attr('value', '' ),
a(c).find('label.up-img').attr('for', 'upload_image'+(d+1)),
a(c).find('#image_url_input').attr('class', 'upload_image'+(d+1)).attr('name', 'upload_image'+(d+1)).attr('value', '' ),
a(c).find('.upload_image_button').attr('id', 'uploadId'+(d+1));
a(c).find('.slide_title').attr('id', 'slide_title'+(d+1));
a(c).find('.slide_title').attr('name', 'slide_title'+(d+1)).attr('value',  '');
a(c).find('.slide_subtitle').attr('name', 'slide_subtitle'+(d+1)).attr('value',  '');
a(c).find('.slide_subtitle').attr('id', 'slide_subtitle'+(d+1));
a(c).find('.slide_button input.button-title-slide').attr('name', 'title_button_slides'+(d+1)).attr('value',  '');
a(c).find('.slide_button input.button-url-slide').attr('name', 'url_button_slides'+(d+1)).attr('value',  '');
a(c).find('.title-rad input').attr('name', 'radio_title'+(d+1));
a(c).find('.title-radio-value-Left input').attr('id', 'title-Left-'+(d+1));
a(c).find('.title-radio-value-Right input').attr('id', 'title-Right-'+(d+1));
a(c).find('.title-radio-value-Center input').attr('id', 'title-Center-'+(d+1));
a(c).find('label.title-radio-label-Left').attr('for', 'title-Left-'+(d+1));
a(c).find('label.title-radio-label-Right').attr('for', 'title-Right-'+(d+1));
a(c).find('label.title-radio-label-Center').attr('for', 'title-Center-'+(d+1));
b.clearInputs&&a(c).find(":input").each(function(){
switch(a(this).attr("type")){
case "button":break;
case "reset":break;
case "submit":break;
case "checkbox":a(this).attr("checked","");break;
case "radio":break;
default:a(this).val("")}});
a(e).find(f+":last").after(c);return!1})});
return this}})
(jQuery);

(function(a)
{a.fn.relCopyBuilder=function(e){
var b=jQuery.extend({excludeSelector:".exclude",emptySelector:".empty",copyClass:"copy",append:"",clearInputs:!0,limit:0},e);
b.limit=parseInt(b.limit);
this.each(function(){
a(this).click(function(){
var f=a(this).attr("rel"),
d=a(f).length;
if(0!=b.limit&&d>=b.limit)return!1;
var c=a(f+":first"),
e=a(c).parent(),
c=a(c).clone(!0).addClass(b.copyClass+d).append(b.append);
b.excludeSelector&&a(c).find(b.excludeSelector).remove();
b.emptySelector&&a(c).find(b.emptySelector).empty();
a(c).attr('id', "item-"+(d+1));
hid = a('#section_block').find(':input[type=hidden][name=items]').val();
valu = 'item-'+(d+1);
a('#section_block').find(':input[type=hidden][name=items]').attr('value', hid+valu+',');
a(c).find('.drag-container').css("display", "none");
a(c).find('.section').attr('id', valu),
a(c).find('.expand_button').attr('id', 'expand-item-'+(d+1)),
a(c).find('.expand_button').val('Expand'),
a(c).find('.remove_button').attr('id', 'remove-item-'+(d+1)),
a(c).find('.unit-title-input').attr('name', 'title-'+(d+1)),
a(c).find('.unit-title-input').attr('id', 'unit-title-id-'+(d+1)),
a(c).find('.unit-slug-input').attr('name', 'slug-'+(d+1)),
a(c).find('.unit-slug-input').attr('id', 'unit-slug-id-'+(d+1)),
a(c).find('.unit-source-select').attr('name', 'unit-source-'+(d+1)),
a(c).find('.unit-source-select').attr('id', 'unit-source-'+(d+1)),
a(c).find('.background-setting').attr('id', 'background-settings-'+(d+1)), // Background settings
a(c).find('.background-setting label').attr('for', 'upload_image'+(d+1)),
a(c).find('.upLaoding').attr('class', 'upload_image'+(d+1)+' upLaoding'),
a(c).find('.upLaoding').attr('name', 'upload_image'+(d+1)),
a(c).find('.upload_image_button').attr('id', 'uploadId'+(d+1)),
a(c).find('.radio-position-clone').attr('name', 'radio_position-'+(d+1)),
a(c).find('.radio-repeat-clone').attr('name', 'radio_repeat-'+(d+1)),
a(c).find('.radio-attachment-clone').attr('name', 'radio_attachment-'+(d+1)),
a(c).find('.colorInput').attr('id', 'color-'+(d+1)).css("background", "white"),
a(c).find('.colorInput').attr('name', 'color_picker_color-'+(d+1)),
a(c).find('.selectPicker').attr('id', 'colorPicker-'+(d+1)),
a(c).find('.colorPickerMain').attr('id', 'color_picker_color-'+(d+1)),
a(c).find('.testimonials-clone').attr('id','testimonials-'+(d+1)).css("display", "none"), // testimonials settings
a(c).find('.testimonials-clone .itemCountInput').attr('id','testimonialsCount-'+(d+1)),
a(c).find('.testimonials-clone .itemCountInput').attr('name','testimonialsCount-'+(d+1)),
a(c).find('.testimonials-clone .itemHiddenCelect').attr('name','testimonialsSorting-'+(d+1)),
a(c).find('.team-clone').attr('id','team-'+(d+1)).css("display", "none"), // team settings
a(c).find('.team-clone .itemCountInput').attr('id','teamCount-'+(d+1)),
a(c).find('.team-clone .itemCountInput').attr('name','teamCount-'+(d+1)),
a(c).find('.team-clone .itemHiddenCelect').attr('name','teamSorting-'+(d+1)),
a(c).find('.blog-clone').attr('id','blog-post-'+(d+1)).css("display", "none"), // blog settings 
a(c).find('.blog-clone .itemCountInput').attr('id','blogCount-'+(d+1)),
a(c).find('.blog-clone .itemCountInput').attr('name','blogCount-'+(d+1)),
a(c).find('.blog-clone .col-1.last .itemHiddenCelect').attr('name','blogSorting-'+(d+1)),
a(c).find('.blog-clone .col-1 .itemHiddenCelect').attr('name','postContent-'+(d+1)),
a(c).find('.blog-clone .col-1 .itemHiddenCelect').attr('id','postContent-'+(d+1)),
a(c).find('.blog-clone .itemInputText').attr('id','blogExclude-'+(d+1)),
a(c).find('.blog-clone .itemInputText').attr('name','blogExclude-'+(d+1)),
a(c).find('.slideshow-clone').attr('id','slideshow-bilder-'+(d+1)).css("display", "none"), // slideshow /* New elements Since 3.0  */
a(c).find('.slideshow-clone .slideShortcodeInput').attr('id','slideShortcode-'+(d+1)).attr('name','slideShortcode-'+(d+1)).attr('value', ''), /* New elements Since 3.0  */
a(c).find('.slideshow-clone .slideTopPadding').attr('id','slideTopPadding-'+(d+1)).attr('name','slideTopPadding-'+(d+1)).attr('value', ''), /* New elements Since 3.0  */
a(c).find('.slideshow-clone .slideBottomPadding').attr('id','slideBottomPadding-'+(d+1)).attr('name','slideBottomPadding-'+(d+1)).attr('value', ''), /* New elements Since 3.0  */
a(c).find('.page-clone').attr('id','page-source-'+(d+1)).css("display", "none"), // page settings
a(c).find('.page-clone .itemInputText').attr('id','pageUrl-'+(d+1)),
a(c).find('.page-clone .itemInputText').attr('name','pageUrl-'+(d+1)),
a(c).find('.text-box-clone').attr('id','text-box-'+(d+1)).css("display", "none"), //Text Box settings
a(c).find('.text-box-clone .itemTextarea').attr('id','textBox-text-'+(d+1)), 
a(c).find('.text-box-clone .itemTextarea').attr('name','textBox-text-'+(d+1)),
a(c).find('.text-box-clone .itemInputText.urlTitle').attr('name','textBoxUrlTitle-'+(d+1)),
a(c).find('.text-box-clone .itemInputText.urlTitle').attr('id','textBoxUrlTitle-'+(d+1)),
a(c).find('.text-box-clone .itemInputText.urlBox').attr('id','textBoxUrl-'+(d+1)),
a(c).find('.text-box-clone .itemInputText.urlBox').attr('name','textBoxUrl-'+(d+1)),
a(c).find('.socialMedia-clone').attr('id','socialMedia-'+(d+1)).css("display", "none"), //Social media
a(c).find('.socialMedia-clone .socialMediaLists.social-Facebook').attr('name','social-'+(d+1)+'-Facebook'),
a(c).find('.socialMedia-clone .socialMediaLists.social-Twitter').attr('name','social-'+(d+1)+'-Twitter'),
a(c).find('.socialMedia-clone .socialMediaLists.social-Google').attr('name','social-'+(d+1)+'-Google'),
a(c).find('.socialMedia-clone .socialMediaLists.social-Flickr').attr('name','social-'+(d+1)+'-Flickr'),
a(c).find('.socialMedia-clone .socialMediaLists.social-Pinterest').attr('name','social-'+(d+1)+'-Pinterest'),
a(c).find('.socialMedia-clone .socialMediaLists.social-Dribbble').attr('name','social-'+(d+1)+'-Dribbble'),
a(c).find('.socialMedia-clone .socialMediaLists.social-Behance').attr('name','social-'+(d+1)+'-Behance'),
a(c).find('.socialMedia-clone .socialMediaLists.social-Youtube').attr('name','social-'+(d+1)+'-Youtube'),
a(c).find('.socialMedia-clone .socialMediaLists.social-Vimeo').attr('name','social-'+(d+1)+'-Vimeo'),
a(c).find('.socialMedia-clone .socialMediaLists.social-Linkedin').attr('name','social-'+(d+1)+'-Linkedin'),
a(c).find('.socialMedia-clone .socialMediaLists.social-Email').attr('name','social-'+(d+1)+'-Email'),
a(c).find('.socialMedia-clone .socialMediaLists.social-RSS').attr('name','social-'+(d+1)+'-RSS'), 
a(c).find('.page-clone .titlecheck').attr('name','title-display-'+(d+1)),
a(c).find('.page-clone .titlecheck').attr('id','title-display-'+(d+1)),
a(c).find('.page-clone label').attr('for','title-display-'+(d+1)),
a(c).find('.title-item').attr('id', 'unit-title-item-'+(d+1)).html('Unit title'),
/* New elements Since 2.0  */
a(c).find('.background-setting').attr('id', 'background-settings-'+(d+1));
a(c).find('.back-posi').attr('id', 'background-setting-position-'+(d+1));
a(c).find('.back-repeat').attr('id', 'background-setting-reapet-'+(d+1));
a(c).find('.back-attach').attr('id', 'background-setting-attach-'+(d+1));
a(c).find('.back-speed').attr('id', 'background-setting-speed-'+(d+1));
a(c).find('.back-speed label').attr('for', 'parallax-speed-'+(d+1));
a(c).find('.back-speed input').attr('id', 'parallax-speed-'+(d+1)).attr('name', 'parallax-speed-'+(d+1)).attr('value', '');
a(c).find('.background-select-parallax').attr('id', 'parallax-effect-'+(d+1)).attr('name','parallax-effect-'+(d+1));
a(c).find('.works-unit-setings').attr('id', 'works-post-'+(d+1));
a(c).find('.works-unit-setings input.itemCountInput').attr('id', 'worksCount-'+(d+1)).attr('name', 'worksCount-'+(d+1)).attr('value', '');
a(c).find('.works-unit-setings select.sorting-select').attr('name', 'worksSorting-'+(d+1));
a(c).find('.works-unit-setings select.types-select').attr('name', 'worksContent-'+(d+1));
a(c).find('.works-unit-setings input.works-exclude').attr('name', 'worksExclude-'+(d+1)).attr('id', 'worksExclude-'+(d+1)).attr('value', '');
/* new elements since 2.4 for woocommerce */
var woo = jQuery("#section_block.builder-container").find(':input[name=woocommerce-active-builder]').val();
if(woo == "true"){
	a(c).find('.woocommerce-clone').attr('id', 'woocommerce-'+(d+1)).css("display", "none");
	a(c).find('.woocommerce-clone select.wooSource').attr('name', 'wooSource-'+(d+1)).attr('id', 'wooSource-'+(d+1));
	a(c).find('.woocommerce-clone select.product-source-select').attr('id', 'productContent-'+(d+1)).attr('name', 'productContent-'+(d+1));
	a(c).find('.woocommerce-clone input.itemCountInput').attr('name', 'productsCount-'+(d+1)).attr('id', 'productsCount-'+(d+1)).attr('value', '');
	a(c).find('.woocommerce-clone select.sorting-select').attr('name', 'wooSorting-'+(d+1));
	a(c).find('.woocommerce-clone select.order-select').attr('name', 'wooOrder-'+(d+1));
	a(c).find('.woocommerce-clone input.titlecheck').attr('id', 'cart_show-'+(d+1)).attr('name', 'cart_show-'+(d+1));
	a(c).find('.woocommerce-clone label').attr('for', 'cart_show-'+(d+1));
	a(c).find('.woo-links-clone').attr('id', 'woocommerce-links-'+(d+1));
	a(c).find('.woo-links-clone input.socialMediaLists').attr('id', 'linksWooTitle-'+(d+1)).attr('name', 'linksWooTitle-'+(d+1)).attr('value', '');
	a(c).find('.woo-links-clone input.itemCountInput').attr('id', 'linksWooFontSize-'+(d+1)).attr('name', 'linksWooFontSize-'+(d+1)).attr('value', '');
}
/* new elements since 2.7 HTML unit */
a(c).find('.image-clone').attr('id', 'image-source-'+(d+1)).css("display", "none");
a(c).find('.image-clone .topPaddingHTML').attr('name', 'imageTopPadding-'+(d+1)).attr('id', 'imageTopPadding-'+(d+1)).attr('value', '');;
a(c).find('.image-clone .bottomPaddingHTML').attr('name', 'imageBottomPadding-'+(d+1)).attr('id', 'imageBottomPadding-'+(d+1)).attr('value', '');;
a(c).find('.image-clone .HTMLuntitTextarea').attr('name', 'imageText-'+(d+1)).attr('id', 'imageText-'+(d+1));
b.clearInputs&&a(c).find(":input").each(function(){
switch(a(this).attr("type")){
case "button":break;
case "reset":break;
case "submit":break;
case "radio":break;
case "checkbox":a(this).removeAttr("checked");break;
default:a(this).val("")}});
a(e).find(f+":last").after(c);return!1})});
return this}})
(jQuery);
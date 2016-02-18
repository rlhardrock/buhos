/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
* URL http://cuckoothemes.com
*************
*/
jQuery(document).ready(function($) {
	var firstElent = $('ul#adminmenu').find('li#menu-posts-works');
	firstElent.before('<li class="wp-not-current-submenu wp-menu-separator"><div class="separator"></div></li>');
});
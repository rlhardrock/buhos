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
** Name: Not Found
*/
get_header(); ?>
<article id="error_page">
	<section id="error_main">
		<div class="error_page">
			<div class="error_page_title"><?php _e('404', THEMENAME); ?></div>
			<h1><?php _e('Page not Found.', THEMENAME); ?></h1>
			<span class="slide-title-line"></span>
			<p class="error-text"><?php _e( 'Apologies, but the page you requested could<br /> not be found. Perhaps searching will help.', THEMENAME ); ?></p>
			<?php echo cuckoo_search_form(); ?>
			<script type="text/javascript">
				// focus on search field after it has loaded
				document.getElementById('s') && document.getElementById('s').focus();
			</script>
		</div>
	</section>
</article>
<?php get_footer(); ?>
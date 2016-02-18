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
** Name : team single
*/
get_header(); ?>
	<section id="main-container">
		<?php if(have_posts()) :
			while(have_posts()) : the_post(); 
				
				/* Testimonial header block: Title, subtitle */
				get_template_part( 'loop/team/single-header' ); 
				
				/* Social Media Icones and Search */
				get_template_part( 'loop/total/socialmedia-search' ); 
				
				/* Testimonial content block: image, content, company */
				get_template_part( 'loop/team/content' ); 
				
			endwhile; 
		endif; ?>
	</section>
<?php get_map_landing(); ?>
<?php get_footer(); ?>
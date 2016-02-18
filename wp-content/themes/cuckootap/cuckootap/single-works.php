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
** Name: Single Work
*/

get_header(); ?>
	<section id="main-container">
		<?php if(have_posts()) :
			while(have_posts()) : the_post(); 
				
				/* Work header block: Title, Types, Next-Previuos */
				get_template_part( 'loop/work/single' , 'header' ); 
				
				if ( !post_password_required() ) : 
				
					/* Work gallery block: Nivo slideshow or video */
					get_template_part( 'loop/work/image', 'position' ); 
					
					/* Work content */
					get_template_part( 'loop/work/content' ); 
					
					comments_template("", true);
				
				else :
					
					/* If work have password need template */
					get_template_part( 'loop/alert/work-password' ); 
				
				endif;
			
				/* Work related block: Related works */
				get_template_part( 'loop/work/related' );
				
			endwhile; 
		endif; ?>
	</section>
<?php get_map_landing(); ?>
<?php get_footer(); ?>
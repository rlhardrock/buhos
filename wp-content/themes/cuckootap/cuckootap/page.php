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
** Name: Page
*/
get_header(); 
/* Page header block: Title, subtitle */
get_template_part( 'loop/total/template-header' ); 
				
/* Social Media Icones and Search */
get_template_part( 'loop/total/socialmedia-search' ); 
	
if ( have_posts() ) :
	while ( have_posts() ) : the_post(); 
		
	if ( !post_password_required() ) : 
		
		/* Content */
		?>
		<article id="content-main" role="main">
			<?php the_content(); ?>
		</article>
		<?php
		/* Comment template */
		comments_template("", true);
	
	else :
						
		/* If page have password need template */
		get_template_part( 'loop/alert/page-password' ); 
					
	endif;	
	
	endwhile;
endif;
get_map_landing();
get_footer(); 

?>
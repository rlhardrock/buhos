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
** Name: Single post
*/
get_header(); ?>
	<section id="main-container">
		<?php if(have_posts()) :
			while(have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php
					/* Work header block: Title, Types, Next-Previuos */
					get_template_part( 'loop/post/single' , 'header' ); 
					
					/* Social Media Icones and Search */
					get_template_part( 'loop/total/socialmedia-search' ); 
					
					if ( !post_password_required() ) :  
						
						/* Comments, Social template */
						get_template_part( 'loop/total/comments-social-block' );
						
						/* Post content */
						get_template_part( 'loop/post/content' ); 
						
						/* Work related block: Related works */
						get_template_part( 'loop/post/tags' );	
						
						/* Commentstemplate */
						comments_template("", true);
					
					else :
						
						/* If work have password need template */
						get_template_part( 'loop/alert/post-password' ); 
					
					endif;				
					
					/* Work related block: Related works */
					get_template_part( 'loop/post/related' );
				?>
				</article>
		<?php endwhile;  endif; ?>
	</section>
<?php get_map_landing(); ?>
<?php get_footer(); ?>
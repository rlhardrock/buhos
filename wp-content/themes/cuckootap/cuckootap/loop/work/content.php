<?php
/**************
* @package WordPress
* @subpackage Cuckoothemes
* @since Cuckoothemes 1.0
**************
*
*
*
** Template Name: Works main content
*/
?>

<?php
$content = get_the_content();
if( $content != '' ) :
?>
<article id="content-main" role="main">
		<?php the_content(); ?>
</article>
<?php endif; ?>
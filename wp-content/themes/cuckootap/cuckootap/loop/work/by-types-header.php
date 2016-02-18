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
** Name: Single Work Header
*/
$cuckoo_gallery = get_option( THEMEPREFIX . "_gallery_settings" );
$type_slug = get_post_meta(get_the_ID(), NOTCHANGEELEMENT.'-by-type-box');
$id = get_term_by('slug', $type_slug[0] ,'types');
	
$args =  array(
'types' 			=> $id->slug,
'orderby' 			=> $cuckoo_gallery['by_type_sort'],
'posts_per_page' 	=> '-1',
'post_type' 		=> 'works'
);
?>

<header id="item-header" class="portfolio-header">
	<div id="header-position" class="screen-large">
		<div class="title-block">
			<h1><?php the_title(); ?></h1>
		</div>
		
		<?php 
			$alone = "";
			if($cuckoo_gallery['portfolio'] != 0) :
				$alone = get_term( $cuckoo_gallery['portfolio'], 'types' );
			endif;
			query_posts( $args ); 
			if ( have_posts() ):
		//	if ($cuckoo_gallery['filter_settings'] == 'display' ) :
			?>
			<div class="item-info-block">
				<div class="item-info-line one">
					<div id="filters" class="item-info-list">
						<span class="type-list"><?php echo $id->name; ?></span>
					</div>
				</div>
			</div>
			<?php /* else : */ ?>
				<!-- <div class="no-filter"></div> -->
				<?php query_posts( $args );  ?>
			<?php // endif; ?>
		<?php endif; ?>
	</div>
</header>
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
	
$args =  array(
'types' 			=> cuckoo_list_taxha( 'types',  $cuckoo_gallery['exclude_portfilio'] ),
'orderby' 			=> $cuckoo_gallery['portfolio_sort'],
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
			?>
			<div class="item-info-block">
				<div class="item-info-line one">
					<ul id="filters" data-option-key="filter" class="item-info-list">
							<?php
									$terms = get_terms("types" , array( 'exclude' => $cuckoo_gallery['exclude_portfilio']));
									$count = count($terms);
									$names = "";
									$slug = "";
									if ( $count > 0 ) : ?>
											<li><a title="<?php _e('Show All', THEMENAME); ?>" class="type-list <?php echo ( $cuckoo_gallery['portfolio'] == 0 ) ?  "selected" :  "";  ?>" href="#" data-filter="*"><?php _e('Show All', THEMENAME); ?></a></li>
										<?php
										if ( have_posts() ):
											while ( have_posts() ) : the_post();
												$wo_id = get_the_ID();
												$work_cat = wp_get_object_terms( $wo_id, "types" );
													foreach($work_cat as $cat) :
													$names .= $cat->name.",";
													$slug .=  $cat->slug.",";
													endforeach;
											endwhile;
											$slug_array = array_unique(explode(",",$slug));
											$names_array = array_unique(explode(",",$names));
											foreach( $names_array as $k=>$v ) : 
												if( $v != null ) : 
												?>
												<li><a title="<?php echo $v; ?>" class="type-list <?php echo  ($alone != null) ? $alone->name == $v  ? "selected" : "" : ""; ?>" href="#" data-filter=".<?php echo $slug_array[$k]; ?>"><?php echo $v; ?></a></li>
												<?php 
												endif;
											endforeach;

										endif; ?>
							<?php endif; ?>
						</ul>
				</div>
			</div>
		<?php endif; ?>
	</div>
</header>
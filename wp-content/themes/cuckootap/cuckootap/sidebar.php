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
** Name: sidebars area
*/
?>
<div class="clear"></div>
<?php
	if (    is_active_sidebar( 'first-light-footer-widget-area'  )
		or  is_active_sidebar( 'second-light-footer-widget-area' )
		or  is_active_sidebar( 'third-light-footer-widget-area'  )
		or  is_active_sidebar( 'fourth-light-footer-widget-area' )
	) :
		 ?>
<div id="sidebars"> 
	<div class="sidebars_top"></div>
	<div id="sidebars_conteiner">
		<?php if ( is_active_sidebar( 'first-light-footer-widget-area' ) ) : ?>
							<ul class="bars">
								<?php dynamic_sidebar( 'first-light-footer-widget-area' ); ?>
							</ul>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'second-light-footer-widget-area' ) ) : ?>
							<ul class="bars">
								<?php dynamic_sidebar( 'second-light-footer-widget-area' ); ?>
							</ul>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'third-light-footer-widget-area' ) ) : ?>
							<ul class="bars">
								<?php dynamic_sidebar( 'third-light-footer-widget-area' ); ?>
							</ul>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'fourth-light-footer-widget-area' ) ) : ?>
							<ul class="bars">
								<?php dynamic_sidebar( 'fourth-light-footer-widget-area' ); ?>
							</ul>
		<?php endif; ?>

	</div>
	<div class="clear"></div>
</div>
<?php
endif;
	if (    is_active_sidebar( 'first-dark-footer-widget-area'  )
		or  is_active_sidebar( 'twoo-dark-footer-widget-area' )
		or  is_active_sidebar( 'three-dark-footer-widget-area'  )
		or  is_active_sidebar( 'foor-dark-footer-widget-area' )
	)
	:  ?>
<div id="sidebars_dark"> 
	<div id="sidebars_dark_conteiner">
		<?php if ( is_active_sidebar( 'first-dark-footer-widget-area' ) ) : ?>
							<ul class="dark_bars">
								<?php dynamic_sidebar( 'first-dark-footer-widget-area' ); ?>
							</ul>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'twoo-dark-footer-widget-area' ) ) : ?>
							<ul class="dark_bars">
								<?php dynamic_sidebar( 'twoo-dark-footer-widget-area' ); ?>
							</ul>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'three-dark-footer-widget-area' ) ) : ?>
							<ul class="dark_bars">
								<?php dynamic_sidebar( 'three-dark-footer-widget-area' ); ?>
							</ul>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'foor-dark-footer-widget-area' ) ) : ?>
							<ul class="dark_bars">
								<?php dynamic_sidebar( 'foor-dark-footer-widget-area' ); ?>
							</ul>
		<?php endif; ?>

	</div>
	<div class="clear"></div>
</div>
<?php endif; ?>
<?php
/**************
 * @package WordPress
 * @subpackage Cuckoothemes
 * @since Cuckoothemes 1.0
 * URL http://cuckoothemes.com
 **************/
 
$cuckoo_header = get_option( THEMEPREFIX . "_header_footer_settings");
$cuckoo_settings = get_option( THEMEPREFIX . "_general_settings" );
$_SESSION['n1'] = rand(1,20);
$_SESSION['n2'] = rand(1,20);
$_SESSION['expect'] = $_SESSION['n1']+$_SESSION['n2'];
$smooth = $cuckoo_settings['smooth'] ? 'smooth-effect' : '';
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Meta tags -->
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
	<?php if($cuckoo_settings['responsive'] == "Yes"){ ?>
	<meta name='viewport' content='width=device-width; initial-scale=1.0;' />
	<?php } ?>
	
	<!-- Title -->
	<title><?php bloginfo('name'); ?> <?php bloginfo('description') ?></title>
	
	<!-- Main stylesheet -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- RSS & Pingbacks -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<?php
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' ); 
	?>
	<?php get_template_part("templates/fonts"); /* Font templates */ ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class($smooth); ?>>
	<header id="<?php  echo $homeid = (is_home()) ? "home" : "top" ?>" class="main-header section">
		<div id="header_content">
			<?php if($cuckoo_header['logo_setting'] == "Plain Text Logo" or $cuckoo_header['logo_setting'] == "Image Logo" ) : ?>
			<div id="theme_logo">
				<div class="logo_content">
					<div class="logo">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<?php if(!empty($cuckoo_header['image_url']) && $cuckoo_header['logo_setting'] == "Image Logo") : ?>
								<img src="<?php echo $cuckoo_header['image_url']; ?>" alt="<?php echo $cuckoo_header['image_title']; ?>" title="<?php echo $cuckoo_header['image_title']; ?>" />
							<?php elseif(!empty($cuckoo_header['plain_text_header']) && $cuckoo_header['logo_setting'] == "Plain Text Logo") : ?>
								<?php cuckoo_echo_for_wpml(THEMENAME.' Header & Footer', 'Plain Text Logo Title', $cuckoo_header['plain_text_header']); ?>
							<?php endif; ?>
						</a>
					</div>
				</div>
				<div class="shadow"></div>
			</div>
			<?php endif; ?>
			<div class="nav-wrap-fixed <?php echo $pos = $cuckoo_header['header_type'] != 0 ? 'cuckoo-settings-header-full' : ''; ?>"></div>
			<div id="nav_wrap">
				<div id="header_nav">
					<div class="nav_start"></div>
					<nav>
						<div class="iphone-elements clearfix">
							<div class="nav-first-menu"><?php _e('Menu', THEMENAME) ?><span class="nav_arrow-top-menu"></span></div>
							<div class="nav-top">
								<div class="nav-prevous" title="<?php _e('Menu Up', THEMENAME); ?>"></div>
							</div>
							<div class="nav-close"></div>
						</div>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'top-menu', 'menu_id' => 'cuckoo-nav-top',  ) ); ?>
						<div class="nav-buttom">
							<div class="nav-next" title="<?php _e('Menu Down', THEMENAME); ?>"></div>
						</div>
					</nav>
					<div class="nav_end"></div>
				</div>
			</div>
		</div>
	</header>
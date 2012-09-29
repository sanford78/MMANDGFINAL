<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php the_title(); ?></title>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico"><!-- Needs to be 16 x 16 -->
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png"><!-- Needs to be 60 x 60 -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
  	<?php wp_enqueue_style('style', get_template_directory_uri() . '/style.css'); ?>
	<?php wp_enqueue_script('jquery'); ?>
	<?php wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/base.js', 'jquery' ); ?>
	<?php wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/modernizr.js', 'jquery' ); ?>
	<?php wp_enqueue_script( 'orbit', get_template_directory_uri() . '/orbit/jquery.orbit.js', 'jquery' ); ?>
	<?php wp_enqueue_style('orbit-style', get_template_directory_uri() . '/orbit/orbit.css'); ?>
	<link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_url'); ?>/style.less">
	<script src="<?php bloginfo('template_url'); ?>/js/less.js" type="text/javascript"></script>
	<?php wp_head(); ?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#navigation .sub-menu').parent().css(
				{'background-position': 'center 78px',
				'background-image': 'url(<?php bloginfo("template_url"); ?>/images/sub-arrow.png)})',
				'background-repeat': 'no-repeat'});
			jQuery('#navigation #menu-navigation > li').hover(function(){
				jQuery(this).find('a').stop().animate({'bottom':'-2px'},1);
			}, function(){
				jQuery(this).find('a').stop().animate({'bottom':'0px'},1);
			});
		});
	</script>
</head>
<body <?php body_class(); ?>>
<section id="attoreny_wrapper">
	<header id="header">
		<section id="header-main">
			<a href="/"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" id="logo" /></a>
			<nav id="navigation">
				<?php wp_nav_menu(array('menu' => 'Navigation')); ?>
			</nav>
		</section>
	</header>
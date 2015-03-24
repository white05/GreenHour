<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Une Boutique
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( !ot_get_option('custom_favicon') ) { ?>
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<?php } else { ?>
<link rel="shortcut icon" href="<?php echo ot_get_option('custom_favicon') ?>" />
<?php } ?>
<?php
if ( ot_get_option('main_container_max_width') ) {
$main_container_max_width = ot_get_option('main_container_max_width');
	if ( $main_container_max_width[0] && $main_container_max_width[1] ) {
		echo "<style>";
			echo ".row, .contain-to-grid .top-bar, .boxed-layout, .vc_row {";
				echo "max-width:" . $main_container_max_width[0] . $main_container_max_width[1] . "!important;";
			echo "}";
		echo "</style>";
	} 
} ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.foundation.js"></script>
<?php wp_head(); ?>
</head>

<body style="height:auto !important;" <?php body_class(); ?> data-scrolleffect="easeInOutExpo" data-scrollspeed="1250">
<a id="touch-trigger" href="javascript:void(0)" class="fixed"></a>
<?php if ( ot_get_option('default_layout') == 'boxed' ) {
	// if boxed layout is selected
	echo '<div class="boxed-layout">';
} ?>

<?php if ( ot_get_option('the_preloader') == 'on' ) { //Only loads this script if the preload is set to on ?>
<div id="my-qLoverlay" style="width: 100%; height: 100%; position: absolute; z-index: 1002; top: 0px; left: 0px; background-color: rgb(255, 255, 255);"></div>
<?php } ?>

<div id="page" class="hfeed site <?php echo ot_get_option( 'toolbar_color_preset'); ?> <?php echo ot_get_option( 'header_color_preset'); ?> <?php echo ot_get_option( 'header_layout'); ?>">
<?php do_action( 'before' ); ?>

<?php

require get_template_directory() . '/inc/header/off-canvas-main-nav.php';

if ( ot_get_option( 'header_layout') == 'header-corporate' || is_page_template( 'page-templates/transparent-menu-light-on-dark.php' ) || is_page_template( 'page-templates/transparent-menu-dark-on-light.php' ) ) {

	require get_template_directory() . '/inc/header/header-style-corporate.php';

} elseif (ot_get_option( 'header_layout') == 'header-v2' ) {

	require get_template_directory() . '/inc/header/header-style-v2.php';

	// side nav (left offcanvas) section
	if ( !ot_get_option('hide_start_here') ) {
		require get_template_directory() . '/inc/header/side_nav_section.php';
	}

} elseif (ot_get_option( 'header_layout') == 'header-v3' ) {

	require get_template_directory() . '/inc/header/header-style-v3.php';

	// side nav (left offcanvas) section
	if ( !ot_get_option('hide_start_here') ) {
		require get_template_directory() . '/inc/header/side_nav_section.php';
	}

} elseif (ot_get_option( 'header_layout') == 'header-v4' ) {

	require get_template_directory() . '/inc/header/header-style-v4.php';

} else {

	require get_template_directory() . '/inc/header/deafult-header-style.php';

	// side nav (left offcanvas) section
	if ( !ot_get_option('hide_start_here') ) {
		require get_template_directory() . '/inc/header/side_nav_section.php';
	}

} ?>

<section id="content" class="site-content">
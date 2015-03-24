<?php
/**
 * Enqueue scripts and styles
 */
function une_boutique_scripts() {

	$ub_user_agent = getenv("HTTP_USER_AGENT");

	if( strpos($ub_user_agent, "Win") !== FALSE ) {
		$ub_os_detect = "Windows";
	} elseif(strpos($ub_user_agent, "Mac") !== FALSE) {
		$ub_os_detect = "Mac";
	} else {
		$ub_os_detect = "other";
	}

	if ( ot_get_option('the_preloader') == 'on' || ( ot_get_option('one_pager_preloader') && is_page_template( 'page-templates/one-pager.php' ) ) ) { //Only loads this script if the preload is set to on
		wp_enqueue_script( 'jquery.queryloader2.min.js', get_template_directory_uri() . '/js/jquery.queryloader2.min.js', array('jquery'), '2.9.0', false );
		wp_enqueue_script( 'queryloader2.js', get_template_directory_uri() . '/js/queryloader2.js', array('jquery'), '2.9.0', false );
	}

	wp_register_style( 'ub-woocommerce', get_template_directory_uri() . '/layouts/css/woocommerce.min.css', null, '1.0', 'screen' );
	wp_enqueue_style( 'ub-woocommerce' );

	wp_enqueue_style( 'une_boutique-style', get_stylesheet_uri() );
	wp_register_style( 'ub_foundation', get_template_directory_uri() . '/layouts/css/foundation.min.css', null, '4.3.1', 'screen' );
	wp_enqueue_style( 'ub_foundation' );

	// enqueue color presets
	if ( ot_get_option('color_presets') == 'green-preset' ) {
		wp_register_style( 'green-preset', get_template_directory_uri() . '/layouts/css/color-presets/green.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'green-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'orange-preset' ) {
		wp_register_style( 'orange-preset', get_template_directory_uri() . '/layouts/css/color-presets/orange.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'orange-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'turquoise-preset' ) {
		wp_register_style( 'turquoise-preset', get_template_directory_uri() . '/layouts/css/color-presets/turquoise.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'turquoise-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'dark-grey-preset' ) {
		wp_register_style( 'dark-grey-preset', get_template_directory_uri() . '/layouts/css/color-presets/dark-grey.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'dark-grey-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'red-preset' ) {
		wp_register_style( 'red-preset', get_template_directory_uri() . '/layouts/css/color-presets/red.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'red-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'silver-preset' ) {
		wp_register_style( 'silver-preset', get_template_directory_uri() . '/layouts/css/color-presets/silver.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'silver-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'pink-preset' ) {
		wp_register_style( 'pink-preset', get_template_directory_uri() . '/layouts/css/color-presets/pink.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'pink-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'teal-preset' ) {
		wp_register_style( 'teal-preset', get_template_directory_uri() . '/layouts/css/color-presets/teal.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'teal-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'purple-preset' ) {
		wp_register_style( 'purple-preset', get_template_directory_uri() . '/layouts/css/color-presets/purple.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'purple-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'navy-preset' ) {
		wp_register_style( 'navy-preset', get_template_directory_uri() . '/layouts/css/color-presets/navy.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'navy-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'brown-preset' ) {
		wp_register_style( 'brown-preset', get_template_directory_uri() . '/layouts/css/color-presets/brown.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'brown-preset', 998 );
	}

	if ( ot_get_option('default_button_type') == 'flat-buttons' ) {
		wp_register_style( 'flat-buttons', get_template_directory_uri() . '/layouts/css/button-presets/flat-buttons-default.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'flat-buttons', 999 );
	}

	if ( ot_get_option('default_button_type') == '3d-buttons' ) {
		wp_register_style( '3d-buttons', get_template_directory_uri() . '/layouts/css/button-presets/3d-buttons-default.css', null, '1.0', 'screen' );
		wp_enqueue_style( '3d-buttons', 999 );
	}

	if ( ot_get_option('default_button_type') == 'flat-buttons' && ot_get_option('color_presets') == 'brown-preset' ) {
		wp_register_style( 'flat-buttons-brown', get_template_directory_uri() . '/layouts/css/button-presets/flat-buttons-brown.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'flat-buttons-brown', 999 );
	}

	if ( ot_get_option('default_button_type') == '3d-buttons' && ot_get_option('color_presets') == 'brown-preset' ) {
		wp_register_style( '3d-buttons-brown', get_template_directory_uri() . '/layouts/css/button-presets/3d-buttons-brown.css', null, '1.0', 'screen' );
		wp_enqueue_style( '3d-buttons-brown', 999 );
	}

	if ( ot_get_option('default_button_type') == 'flat-buttons' && ot_get_option('color_presets') == 'dark-grey-preset' ) {
		wp_register_style( 'flat-buttons-dark-grey', get_template_directory_uri() . '/layouts/css/button-presets/flat-buttons-dark-grey.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'flat-buttons-dark-grey', 999 );
	}

	if ( ot_get_option('default_button_type') == '3d-buttons' && ot_get_option('color_presets') == 'dark-grey-preset' ) {
		wp_register_style( '3d-buttons-dark-grey', get_template_directory_uri() . '/layouts/css/button-presets/3d-buttons-dark-grey.css', null, '1.0', 'screen' );
		wp_enqueue_style( '3d-buttons-dark-grey', 999 );
	}

	if ( ot_get_option('default_button_type') == 'flat-buttons' && ot_get_option('color_presets') == 'green-preset' ) {
		wp_register_style( 'flat-buttons-green', get_template_directory_uri() . '/layouts/css/button-presets/flat-buttons-green.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'flat-buttons-green', 999 );
	}

	if ( ot_get_option('default_button_type') == '3d-buttons' && ot_get_option('color_presets') == 'green-preset' ) {
		wp_register_style( '3d-buttons-green', get_template_directory_uri() . '/layouts/css/button-presets/3d-buttons-green.css', null, '1.0', 'screen' );
		wp_enqueue_style( '3d-buttons-green', 999 );
	}

	if ( ot_get_option('default_button_type') == 'flat-buttons' && ot_get_option('color_presets') == 'navy-preset' ) {
		wp_register_style( 'flat-buttons-navy', get_template_directory_uri() . '/layouts/css/button-presets/flat-buttons-navy.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'flat-buttons-navy', 999 );
	}

	if ( ot_get_option('default_button_type') == '3d-buttons' && ot_get_option('color_presets') == 'navy-preset' ) {
		wp_register_style( '3d-buttons-navy', get_template_directory_uri() . '/layouts/css/button-presets/3d-buttons-navy.css', null, '1.0', 'screen' );
		wp_enqueue_style( '3d-buttons-navy', 999 );
	}

	if ( ot_get_option('default_button_type') == 'flat-buttons' && ot_get_option('color_presets') == 'orange-preset' ) {
		wp_register_style( 'flat-buttons-orange', get_template_directory_uri() . '/layouts/css/button-presets/flat-buttons-orange.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'flat-buttons-orange', 999 );
	}

	if ( ot_get_option('default_button_type') == '3d-buttons' && ot_get_option('color_presets') == 'orange-preset' ) {
		wp_register_style( '3d-buttons-orange', get_template_directory_uri() . '/layouts/css/button-presets/3d-buttons-orange.css', null, '1.0', 'screen' );
		wp_enqueue_style( '3d-buttons-orange', 999 );
	}

	if ( ot_get_option('default_button_type') == 'flat-buttons' && ot_get_option('color_presets') == 'pink-preset' ) {
		wp_register_style( 'flat-buttons-pink', get_template_directory_uri() . '/layouts/css/button-presets/flat-buttons-pink.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'flat-buttons-pink', 999 );
	}

	if ( ot_get_option('default_button_type') == '3d-buttons' && ot_get_option('color_presets') == 'pink-preset' ) {
		wp_register_style( '3d-buttons-pink', get_template_directory_uri() . '/layouts/css/button-presets/3d-buttons-pink.css', null, '1.0', 'screen' );
		wp_enqueue_style( '3d-buttons-pink', 999 );
	}

	if ( ot_get_option('default_button_type') == 'flat-buttons' && ot_get_option('color_presets') == 'purple-preset' ) {
		wp_register_style( 'flat-buttons-purple', get_template_directory_uri() . '/layouts/css/button-presets/flat-buttons-purple.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'flat-buttons-purple', 999 );
	}

	if ( ot_get_option('default_button_type') == '3d-buttons' && ot_get_option('color_presets') == 'purple-preset' ) {
		wp_register_style( '3d-buttons-purple', get_template_directory_uri() . '/layouts/css/button-presets/3d-buttons-purple.css', null, '1.0', 'screen' );
		wp_enqueue_style( '3d-buttons-purple', 999 );
	}

	if ( ot_get_option('default_button_type') == 'flat-buttons' && ot_get_option('color_presets') == 'red-preset' ) {
		wp_register_style( 'flat-buttons-red', get_template_directory_uri() . '/layouts/css/button-presets/flat-buttons-red.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'flat-buttons-red', 999 );
	}

	if ( ot_get_option('default_button_type') == '3d-buttons' && ot_get_option('color_presets') == 'red-preset' ) {
		wp_register_style( '3d-buttons-red', get_template_directory_uri() . '/layouts/css/button-presets/3d-buttons-red.css', null, '1.0', 'screen' );
		wp_enqueue_style( '3d-buttons-red', 999 );
	}

	if ( ot_get_option('default_button_type') == 'flat-buttons' && ot_get_option('color_presets') == 'silver-preset' ) {
		wp_register_style( 'flat-buttons-silver', get_template_directory_uri() . '/layouts/css/button-presets/flat-buttons-silver.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'flat-buttons-silver', 999 );
	}

	if ( ot_get_option('default_button_type') == '3d-buttons' && ot_get_option('color_presets') == 'silver-preset' ) {
		wp_register_style( '3d-buttons-silver', get_template_directory_uri() . '/layouts/css/button-presets/3d-buttons-silver.css', null, '1.0', 'screen' );
		wp_enqueue_style( '3d-buttons-silver', 999 );
	}

	if ( ot_get_option('default_button_type') == 'flat-buttons' && ot_get_option('color_presets') == 'teal-preset' ) {
		wp_register_style( 'flat-buttons-teal', get_template_directory_uri() . '/layouts/css/button-presets/flat-buttons-teal.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'flat-buttons-teal', 999 );
	}

	if ( ot_get_option('default_button_type') == '3d-buttons' && ot_get_option('color_presets') == 'teal-preset' ) {
		wp_register_style( '3d-buttons-teal', get_template_directory_uri() . '/layouts/css/button-presets/3d-buttons-teal.css', null, '1.0', 'screen' );
		wp_enqueue_style( '3d-buttons-teal', 999 );
	}

	if ( ot_get_option('default_button_type') == 'flat-buttons' && ot_get_option('color_presets') == 'turquoise-preset' ) {
		wp_register_style( 'flat-buttons-turquoise', get_template_directory_uri() . '/layouts/css/button-presets/flat-buttons-turquoise.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'flat-buttons-turquoise', 999 );
	}

	if ( ot_get_option('default_button_type') == '3d-buttons' && ot_get_option('color_presets') == 'turquoise-preset' ) {
		wp_register_style( '3d-buttons-turquoise', get_template_directory_uri() . '/layouts/css/button-presets/3d-buttons-turquoise.css', null, '1.0', 'screen' );
		wp_enqueue_style( '3d-buttons-turquoise', 999 );
	}

	wp_enqueue_script( 'ilightbox.packed', get_template_directory_uri() . '/js/ilightbox.packed.js', array(), '2.1.4', true );

	wp_enqueue_script( 'owl-carousel.min', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.2.6', true );

	wp_enqueue_script( 'jquery.footable', get_template_directory_uri() . '/js/footable.js', array(), '1.0', true );

	wp_enqueue_script( 'une_boutique-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'une_boutique-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

	wp_enqueue_script( 'une_boutique-template.min.js', get_template_directory_uri() . '/js/template.min.js', array('jquery'), '2.0', true );

	// loads styles and scripts for all pages except one pager template

	if ( !is_page_template( 'page-templates/one-pager.php' ) ) {
		wp_enqueue_script( 'sticky-header', get_template_directory_uri() . '/js/sticky-header.js', array('jquery'), '1.0', true );
	}

	if ( $ub_os_detect !== "Mac" && ( strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome' ) !== false) && (!is_page_template( 'page-templates/one-pager.php' ) ) ) {
		wp_enqueue_script( 'SmoothScroll.js', get_template_directory_uri() . '/js/SmoothScroll.js', array('jquery'), '0.9.9', true );
	}

}
add_action( 'wp_enqueue_scripts', 'une_boutique_scripts' );

//make woocommerce price widget mobile touch ready
add_action( 'wp_enqueue_scripts', 'ub_load_touch_punch_js' , 35 );
function ub_load_touch_punch_js() {
	global $version;

	wp_enqueue_script( 'jquery-ui-widget','','','',true );
	wp_enqueue_script( 'jquery-ui-mouse','','','',true );
	wp_enqueue_script( 'jquery-ui-slider','','','',true );
	wp_register_script( 'woo-jquery-touch-punch', get_stylesheet_directory_uri() . "/js/jquery.ui.touch-punch.min.js", array('jquery'), $version, true );
	wp_enqueue_script( 'woo-jquery-touch-punch' );
}
<?php
/**
 * Une Boutique functions and definitions
 *
 * @package Une Boutique
 */

/*-----------------------------------------------------------------------------------*/
/*   Load Option Tree Theme Mode (theme options)
/*-----------------------------------------------------------------------------------*/

/**
 * Optional: set 'ot_show_options_ui' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_options_ui', '__return_false' );
add_filter( 'ot_show_docs', '__return_false' );

/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_false' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
load_template( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

/**
 * Theme Options
 */
load_template( trailingslashit( get_template_directory() ) . 'theme-options/theme-options.php' );

function ot_get_option( $option_id, $default = '' ) {
	/* get the saved options */ 
	$options = get_option( 'option_tree' );
	/* look for the saved value */
	if ( isset( $options[$option_id] ) && '' != $options[$option_id] ) {
	  return ot_wpml_filter( $options, $option_id );
	}
	return $default;
}

if ( ! function_exists( 'ot_wpml_filter' ) ) {
  function ot_wpml_filter( $options, $option_id ) {
	// Return translated strings using WMPL
	if ( function_exists('icl_t') ) {
	  $settings = get_option( 'option_tree_settings' );
	  if ( isset( $settings['settings'] ) ) {
		foreach( $settings['settings'] as $setting ) {
		  // List Item & Slider
		  if ( $option_id == $setting['id'] && in_array( $setting['type'], array( 'list-item', 'slider' ) ) ) {
			foreach( $options[$option_id] as $key => $value ) {
			  foreach( $value as $ckey => $cvalue ) {
				$id = $option_id . '_' . $ckey . '_' . $key;
				$_string = icl_t( 'Theme Options', $id, $cvalue );
				if ( ! empty( $_string ) ) {
				  $options[$option_id][$key][$ckey] = $_string;
				}
			  }
			}
		  // All other acceptable option types
		  } else if ( $option_id == $setting['id'] && in_array( $setting['type'], apply_filters( 'ot_wpml_option_types', array( 'text', 'textarea', 'textarea-simple' ) ) ) ) {
			$_string = icl_t( 'Theme Options', $option_id, $options[$option_id] );
			if ( ! empty( $_string ) ) {
			  $options[$option_id] = $_string; 
			}
		  }
		}
	  }
	}
	return $options[$option_id];
  }
}
// end of theme options

// adding fonts to the theme

load_template( trailingslashit( get_template_directory() ) . 'theme-options/theme-fonts.php' );


/*-----------------------------------------------------------------------------------*/
/*   Query whether WooCommerce is activated
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}


/*-------------------------------------------------------------------------------------------*/
/*    Auto Plugin Setup and Activation upon theme activation
/*-------------------------------------------------------------------------------------------*/

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'ub_register_required_plugins' );

function ub_register_required_plugins() {
	$plugins = array(
		array(
			'name'                => 'Capital Shortcodes',
			'slug'                => 'capital-shortcodes',
			'source'              => 'http://cdn.capital-themes.net/files/plugins/capital-shortcodes.zip',
			'required'            => true,
			'version'             => '2.0.1',
			'force_activation'    => false,
			'force_deactivation'  => false,
			'external_url'        => '',
		),

		array(
			'name'			      => 'WPBakery Visual Composer',
			'slug'                => 'js_composer',
			'source'              => 'http://cdn.capital-themes.net/files/plugins/js_composer.zip',
			'required'            => true,
			'version'             => '4.3.4',
			'force_activation'    => false,
			'force_deactivation'  => false,
			'external_url'        => '',
		),

		array(
			'name'                => 'Ultimate Addons For Visual Composer',
			'slug'                => 'Ultimate_VC_Addons',
			'source'              => 'http://cdn.capital-themes.net/files/plugins/Ultimate_VC_Addons.zip',
			'required'            => true,
			'version'             => '3.5.3',
			'force_activation'    => false,
			'force_deactivation'  => false,
			'external_url'        => '',
		),

		array(
			'name'                => 'Revolution Slider',
			'slug'                => 'revslider',
			'source'              => 'http://cdn.capital-themes.net/files/plugins/revslider.zip',
			'required'            => true,
			'version'             => '4.6.3',
			'force_activation'    => false,
			'force_deactivation'  => false,
			'external_url'        => '',
		),

		array(
			'name'                => 'Essential Grid',
			'slug'                => 'essential-grid',
			'source'              => 'http://cdn.capital-themes.net/files/plugins/essential-grid.zip',
			'required'            => true,
			'version'             => '1.2.0',
			'force_activation'    => false,
			'force_deactivation'  => false,
			'external_url'        => '',
		),

		array(
			'name'                => 'Master Slider',
			'slug'                => 'masterslider',
			'source'              => 'http://cdn.capital-themes.net/files/plugins/masterslider-installable.zip',
			'required'            => true,
			'version'             => '2.7.2',
			'force_activation'    => false,
			'force_deactivation'  => false,
			'external_url'        => '',
		),

		array(
			'name'                => 'Envato WordPress Toolkit',
			'slug'                => 'envato-wordpress-toolkit',
			'source'              => 'http://cdn.capital-themes.net/files/plugins/envato-wordpress-toolkit.zip',
			'required'            => false,
			'version'             => '1.6.3',
			'force_activation'    => false,
			'force_deactivation'  => false,
			'external_url'        => '',
		),

		array(
			'name'                => 'WooCommerce',
			'slug'                => 'woocommerce',
			'required'            => true,
			'version'             => '2.2.2',
			'force_activation'    => false,
		),

		array(
			'name'                => 'YITH WooCommerce Wishlist',
			'slug'                => 'yith-woocommerce-wishlist',
			'required'            => false,
			'version'             => '1.1.5',
			'force_activation'    => false,
		),

		array(
			'name'                => 'WordPress Importer',
			'slug'                => 'wordpress-importer',
			'required'            => true,
			'version'             => '0.6.1',
			'force_activation'    => false,
		),

		array(
			'name'                => 'Regenerate Thumbnails',
			'slug'                => 'regenerate-thumbnails',
			'required'            => false,
			'version'             => '2.2.4',
			'force_activation'    => false,
		),
		array(
			'name'                => 'Breadcrumb NavXT',
			'slug'                => 'breadcrumb-navxt',
			'required'            => true,
			'version'             => '5.1.0',
			'force_activation'    => false,
		),
		array(
			'name'                => 'bbPress',
			'slug'                => 'bbpress',
			'required'            => false,
			'version'             => '2.5.4',
		),
		array(
			'name'                => 'Limit Login Attempts',
			'slug'                => 'limit-login-attempts',
			'required'            => false,
			'version'             => '1.7.1',
		),
		array(
			'name'                => 'Contact Form 7',
			'slug'                => 'contact-form-7',
			'required'            => false,
			'version'             => '3.9',
		),
		array(
			'name'                => 'Black Studio TinyMCE Widget',
			'slug'                => 'black-studio-tinymce-widget',
			'required'            => false,
			'version'             => '1.4.6',
		),
		array(
			'name'                => 'WooSidebars',
			'slug'                => 'woosidebars',
			'required'            => false,
			'version'             => '1.3.1',
		),
	);

	$theme_text_domain = 'une_boutique';

	$config = array(
		'domain'            => $theme_text_domain,
		'default_path'      => '',
		'parent_menu_slug'  => 'themes.php',
		'parent_url_slug'   => 'themes.php',
		'menu'              => 'install-required-plugins',
		'has_notices'       => true,
		'is_automatic'      => false,
		'message'           => '',
		'strings'           => array(
			'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
			'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ),
			'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
			'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
			'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
			'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
			'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
			'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
			'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
			'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
			'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ),
			'nag_type'                                  => 'updated'
		)
	);

	tgmpa( $plugins, $config );
}


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 1140; /* pixels */

if ( ! function_exists( 'une_boutique_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function une_boutique_setup() {

	// CHANGE LOCAL LANGUAGE
	// must be called before load_theme_textdomain()
	add_filter( 'locale', 'ub_theme_localized' );
	function ub_theme_localized( $locale )
	{
		if ( isset( $_GET['l'] ) )
	{
		return esc_attr( $_GET['l'] );
	}
		return $locale;
	}

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Une Boutique, use a find and replace
	 * to change 'une_boutique' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'une_boutique', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in three locations.
	 */
	register_nav_menus( array(
		'primary'        => __( 'Primary Menu', 'une_boutique' ),
		'toolbar_right'  => __( 'Toolbar Right', 'une_boutique' ),
		'toolbar_left'   => __( 'Toolbar Left', 'une_boutique' ),
		'one_pager_menu' => __( 'One Pager Menu', 'une_boutique' ),
	) );

	if ( ot_get_option( 'header_layout') == 'header-v3' ) {
		register_nav_menu( 'secondary_nav', 'Secondary Nav' );
	}

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery', 'video', 'quote', 'link', 'audio', 'status' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'une_boutique_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // une_boutique_setup
add_action( 'after_setup_theme', 'une_boutique_setup' );


/**
 * enqueue styles and scripts
 */
require get_template_directory() . '/inc/styles-and-scripts.php';


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load widget positions
 */
require get_template_directory() . '/inc/widget-positions.php';

/**
 * Load custom widgets
 */
require get_template_directory() . '/inc/custom_widgets.php';

/*-----------------------------------------------------------------------------------*/
/*  Change bbPress bread crumb separator.
/*-----------------------------------------------------------------------------------*/

function ub_filter_bbPress_breadcrumb_separator() {
//$sep = ' &raquo; ';
$sep = is_rtl() ? __( ' / ', 'bbpress' ) : __( ' / ', 'bbpress' );
return $sep;
}

add_filter('bbp_breadcrumb_separator', 'ub_filter_bbPress_breadcrumb_separator');

/*-----------------------------------------------------------------------------------*/
/*   Disable admin bar for all
/*-----------------------------------------------------------------------------------*/

if ( ot_get_option('display_admin_bar') == 'off' ) {
	show_admin_bar(false);
}

/*-----------------------------------------------------------------------------------*/
/*   Remove Paranthese from categories widgets post count 
/*-----------------------------------------------------------------------------------*/
// categories widgets (wordpress and woocommerce)
function ub_categories_postcount_filter ($remove_parentheses) {
   $remove_parentheses = str_replace('(', '<span class="post-count">', $remove_parentheses);
   $remove_parentheses = str_replace(')', '</span>', $remove_parentheses);
   return $remove_parentheses;
}
add_filter('wp_list_categories','ub_categories_postcount_filter');

// archives (wordpress)
function ub_archive_postcount_filter ($remove_parentheses) {
   $remove_parentheses = str_replace('(', '<span class="post-count">', $remove_parentheses);
   $remove_parentheses = str_replace(')', '</span>', $remove_parentheses);
   return $remove_parentheses;
}
add_filter('get_archives_link', 'ub_archive_postcount_filter');

/*-----------------------------------------------------------------------------------*/
/*   adds css class to parent menu items
/*-----------------------------------------------------------------------------------*/

add_filter( 'wp_nav_menu_objects', 'ub_add_menu_parent_class' );
function ub_add_menu_parent_class( $items ) {
	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'menu-parent-item has-dropdown not-click';
		}
	}
	return $items;
}

/*-----------------------------------------------------------------------------------*/
/*   Add styles chooser to the visual editor
/*-----------------------------------------------------------------------------------*/

require get_template_directory() . '/inc/style-formats.php';


/*-----------------------------------------------------------------------------------*/
/* get featured image url function
/*-----------------------------------------------------------------------------------*/

function ub_featured_img_url( $ub_featured_img_size ) {
	$ub_image_id = get_post_thumbnail_id();
	$ub_image_url = wp_get_attachment_image_src( $ub_image_id, $ub_featured_img_size );
	$ub_image_url = $ub_image_url[0];
	return $ub_image_url;
}

/*-----------------------------------------------------------------------------------*/
/*   matches the CSS style of the text in the visual editor to the out put result
/*-----------------------------------------------------------------------------------*/

function ub_theme_add_editor_styles() {
	add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'ub_theme_add_editor_styles' );

/*-------------------------------------------------------------------------------------------*/
/*    Set Une Boutique theme image dimensions upon theme activation
/*-------------------------------------------------------------------------------------------*/

/**
 * Hook in on activation
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'une_boutique_theme_image_dimensions', 1 );

/**
 * Define image sizes
 */
function une_boutique_theme_image_dimensions() {
	$thumbnail = array(
		'width' 	=> '350',	// px
		'height'	=> '350',	// px
		'crop'		=> 1 		// true
	);
 
	$medium = array(
		'width' 	=> '640',	// px
		'height'	=> '480',	// px
		'crop'		=> 0 		// true
	);
 
	$large = array(
		'width' 	=> '1024',	// px
		'height'	=> '600',	// px
		'crop'		=> 0 		// true
	);
 
	// Image sizes
	update_option( 'thumbnail_size', $thumbnail );		// Product category thumbs
	update_option( 'medium_size', $medium );			// Single product image
	update_option( 'large_size', $large );	// Image gallery thumbs
}

add_filter( 'image_size_names_choose', 'ub_custom_image_choose' );
function ub_custom_image_choose( $args ) {

  global $_wp_additional_image_sizes;

  // make the names human friendly by removing dashes and capitalising
  foreach( $_wp_additional_image_sizes as $key => $value ) {
	$custom[ $key ] = ucwords( str_replace( '-', ' ', $key ) );
  }

  return array_merge( $args, $custom );
}

/*-----------------------------------------------------------------------------------*/
/* Hook in on activation */
/*-----------------------------------------------------------------------------------*/
 
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action('init', 'une_boutique_wp_image_dimensions', 1);

/* Define image sizes */
function une_boutique_wp_image_dimensions() {
	update_option('thumbnail_size_w', 350, true);
	update_option('thumbnail_size_h', 350, true);
	update_option('medium_size_w', 640);
	update_option('medium_size_h', 320);
	update_option('large_size_w', 1024);
	update_option('large_size_h', 600);
}

/*-------------------------------------------------------------------------------------------*/
/*    Set WooCommerce image dimensions upon theme activation
/*-------------------------------------------------------------------------------------------*/

/**
 * Hook in on activation
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'une_boutique_woocommerce_image_dimensions', 1 );
 
/**
 * Define image sizes
 */
function une_boutique_woocommerce_image_dimensions() {
	$catalog = array(
		'width' 	=> '350',	// px
		'height'	=> '350',	// px
		'crop'		=> 1 		// true
	);
 
	$single = array(
		'width' 	=> '600',	// px
		'height'	=> '600',	// px
		'crop'		=> 1 		// true
	);
 
	$thumbnail = array(
		'width' 	=> '72',	// px
		'height'	=> '72',	// px
		'crop'		=> 1 		// true
	);
 
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog );		// Product category thumbs
	update_option( 'shop_single_image_size', $single );			// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail );	// Image gallery thumbs
}

/*-----------------------------------------------------------------------------------*/
/*   woocommerce functions
/*-----------------------------------------------------------------------------------*/

// add theme support for woocommerce

if ( !function_exists('ub_woocommerce_support') ) {
	add_action( 'after_setup_theme', 'ub_woocommerce_support' );
	function ub_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
}


/*-----------------------------------------------------------------------------------*/
/*   Disable WooCommerce styles
/*-----------------------------------------------------------------------------------*/

if ( is_woocommerce_activated() ) {
	if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );
	} else {
		define( 'WOOCOMMERCE_USE_CSS', false );
	}
}

/*-------------------------------------------------------------------------------------------*/
/*    Unregister woocommerce default lightbox (pretty photo) to rplace it with iLightbox
/*-------------------------------------------------------------------------------------------*/

if ( is_woocommerce_activated() ) {
	//DISABLE WOOCOMMERCE PRETTY PHOTO SCRIPTS
	add_action( 'wp_print_scripts', 'ub_deregister_prettyphoto_scripts', 100 );

	function ub_deregister_prettyphoto_scripts() {
		wp_deregister_script( 'prettyPhoto' );
		wp_deregister_script( 'prettyPhoto-init' );
	}

	//DISABLE WOOCOMMERCE PRETTY PHOTO STYLE
	add_action( 'wp_print_styles', 'ub_deregister_prettyphoto_styles', 100 );

	function ub_deregister_prettyphoto_styles() {
		wp_deregister_style( 'woocommerce_prettyPhoto_css' );
	}
}

/*-----------------------------------------------------------------------------------*/
/*   Number of WooCommerce Products Per Page
/*-----------------------------------------------------------------------------------*/

if ( is_woocommerce_activated() ) {
	$products_per_mian_page = ot_get_option('products_per_page');

	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$products_per_mian_page.';' ), 20 );
}

/*-----------------------------------------------------------------------------------*/
/*   Change number or products per row based on the page template (with or without sidebar)
/*-----------------------------------------------------------------------------------*/

if ( is_woocommerce_activated() ) {
	if ( ot_get_option('shop_column_count') ) {
	  $ub_shop_columns = ot_get_option('shop_column_count');
	}

	if ( ot_get_option('shop_layout') == 'full-width' && !ot_get_option('shop_column_count') ) {
		$ub_shop_columns = "4";
	} elseif ( !ot_get_option('shop_layout') == 'full-width' && !ot_get_option('shop_column_count') ) {
		$ub_shop_columns = "2";
	}

	add_filter('loop_shop_columns', 'ub_loop_columns');
	if ( !function_exists('ub_loop_columns') ) {
		function ub_loop_columns() {
			global $ub_shop_columns;
			return $ub_shop_columns;
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/*   Add product category under product name
/*-----------------------------------------------------------------------------------*/

if ( is_woocommerce_activated() ) {
	function ub_wc_category_title_archive_products(){

		$product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

		if ( $product_cats && ! is_wp_error ( $product_cats ) ){

			$single_cat = array_shift( $product_cats ); ?>

			<a class="product_category_title" href="<?php echo get_term_link( $single_cat->slug, 'product_cat' ); ?>"><?php echo $single_cat->name; ?></a>

	<?php }
	}
	add_action( 'woocommerce_after_shop_loop_item_title', 'ub_wc_category_title_archive_products', 5 );
}

/*-------------------------------------------------------------------------------------------*/
/*    Renames default woocommerce tabs
/*-------------------------------------------------------------------------------------------*/

if ( is_woocommerce_activated() ) {
	add_filter( 'woocommerce_product_tabs', 'ub_rename_tabs', 98 );
	function ub_rename_tabs( $tabs ) {

	if ( isset($tabs['description']) ) {
	$tabs['description']['title'] = '<strong class="tab-name">'.__( 'More Information', 'une_boutique' ).'</strong><small>'.__( 'more about this product', 'une_boutique' ).'</small>';   // Rename the description tab
	}

	if ( isset($tabs['reviews']) ) {
	$tabs['reviews']['title'] = '<strong class="tab-name">'.__( 'Ratings', 'une_boutique' ).'</strong><small>'.__( 'rate and review it', 'une_boutique' ).'</small>';        // Rename the reviews tab
	}

	if ( isset($tabs['additional_information']) ) {
	$tabs['additional_information']['title'] = '<strong class="tab-name">'.__( 'Product Specifications', 'une_boutique' ).'</strong><small>'.__( 'product details table', 'une_boutique' ).'</small>';  // Rename the additional information tab
	}
	  return $tabs;
	}
}

/*-------------------------------------------------------------------------------------------*/
/*    Adds social sharing tab to products single pages
/*-------------------------------------------------------------------------------------------*/

if ( is_woocommerce_activated() ) {
	if ( ot_get_option('product_social_share') ) {
		add_filter( 'woocommerce_product_tabs', 'ub_woo_new_share_tab');
		function une_boutique_product_share_tab() {
		 echo '<h3 class="no-margin-top">'.__( 'Share this product', 'une_boutique' ).'</h3>';
		 echo '<div id="share-my-product"></div>
			<script>jQuery(document).ready(function(e){"use strict";e("#share-my-product").share({networks:["facebook","twitter","googleplus","linkedin","pinterest","tumblr","email","stumbleupon","digg","in1"]})});</script>';
		}

		function ub_woo_new_share_tab($tabs) {
		 $tabs['share_tab'] = array(
		 'title' => '<strong class="tab-name">'.__( 'Share this product', 'une_boutique' ).'</strong><small>'.__( 'tell others about it', 'une_boutique' ).'</small>',
		 'priority' => 50,
		 'callback' => 'une_boutique_product_share_tab'
		 );
		 return $tabs;
		}
	}
}

/*-------------------------------------------------------------------------------------------*/
/*    Reset VC default CSS classes
/*-------------------------------------------------------------------------------------------*/

function ub_custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
	if ( !is_page_template( 'page-templates/one-pager.php' ) ) {
		if ($tag=='vc_row') {
			$class_string = str_replace('vc_row-fluid', 'row', $class_string);
		}
		if ( $tag=='vc_row_inner' ) {
			$class_string = str_replace('vc_row-fluid', 'row', $class_string);
		}
		if ($tag=='vc_column' || $tag=='vc_column_inner') {
			$class_string = preg_replace('/vc_span(\d{1,2})/', 'columns large-$1', $class_string);
		}
		return $class_string;
	} else {
		if ($tag=='vc_row') {
			$class_string = str_replace('vc_row-fluid', 'row', $class_string);
		}
		if ( $tag=='vc_row_inner' ) {
			$class_string = str_replace('vc_row-fluid', 'row', $class_string);
		}
		if ($tag=='vc_column' || $tag=='vc_column_inner') {
			$class_string = preg_replace('/vc_span(\d{1,2})/', 'columns large-$1', $class_string);
		}
		return $class_string;
	}
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'ub_custom_css_classes_for_vc_row_and_vc_column', 10, 2);

/*-------------------------------------------------------------------------------------------*/
/*    shortcodes to extend visual composer
/*-------------------------------------------------------------------------------------------*/

if ( function_exists('vc_map') ) {
	require get_template_directory() . '/inc/vc_extend/shortcodes.php';
}

/*-------------------------------------------------------------------------------------------*/
/*    Adds custom css styles to wp admin
/*-------------------------------------------------------------------------------------------*/

function ub_admin_theme_style() {
	wp_enqueue_style('ub-admin-style', get_template_directory_uri() . '/layouts/admin/css/admin.css');
}
add_action('admin_enqueue_scripts', 'ub_admin_theme_style');


/*-------------------------------------------------------------------------------------------*/
/*   Capital Testimonials
/*-------------------------------------------------------------------------------------------*/

load_template( trailingslashit( get_template_directory() ) . 'inc/capital-testimonials.php' );

/*-------------------------------------------------------------------------------------------*/
/*   WooCommerce Video Tab
/*-------------------------------------------------------------------------------------------*/

load_template( trailingslashit( get_template_directory() ) . 'inc/wc-products-video-tab.php' );

/*-------------------------------------------------------------------------------------------*/
/*   set the shop to catalog mode 
/*-------------------------------------------------------------------------------------------*/

if ( ot_get_option('catalog_mode') ) {

  function remove_loop_button(){
  remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
  }
  add_action('init','remove_loop_button');

  add_filter('woocommerce_get_price_html','no_price');

  function no_price($price){

	  return null;

  }
}

/*-------------------------------------------------------------------------------------------*/
/*   Adding the custom NAV walker for mega menu
/*-------------------------------------------------------------------------------------------*/

function theme_is_menus() {
	if ('nav-menus.php' == basename($_SERVER['PHP_SELF'])) {
		return true;
	}
	// to be add some check code for validate only in theme options pages
	return false;
}

load_template( trailingslashit( get_template_directory() ) . 'inc/admin/wp-nav-custom-walker.php' );
load_template( trailingslashit( get_template_directory() ) . 'inc/admin/menu-icons.php' );

/*-------------------------------------------------------------------------------------------*/
/*   Social Icons Shortcode [csi][/csi]
/*-------------------------------------------------------------------------------------------*/

if (!function_exists('capital_social_icons')) {
	function capital_social_icons( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'url'       => '#',
			'target'    => '_self',
			'icon'      => 'twitter',
			'size'      => 'large',
			'bg_color'  => '',
			'color'     => '',
			'type'      => 'simple',
		), $atts));

		$style = '';
		if ( $bg_color || $color ) {
			$style .= 'style="';
				if ( $bg_color && ( $type == 'box' || $type == 'box round' ) ) {
					$style .= "background-color:$bg_color;";
				}
				if ( $color ) {
					$style .= "color:$color;";
				}
			$style .= '"';
		}

		$return = '<a title="'.$icon.'" '.$style.' href="'.$url.'" target="'.$target.'" class="ub-social-shortcode ub-icon-'.$icon.' '.$size.' '.$type.'">';
		if ( $type == 'box' || $type == 'box round' ) {
			$return .= '<i class="ub-icon-'.$icon.'"></i>';
		}
		if ( $content && $type == 'simple' ) {
			$return .= '<span>'.$content.'</span></a>';
		} else {
			$return .= '</a>';
		}
		

	   return $return;
	}
	add_shortcode('csi', 'capital_social_icons');
}

// *****For the end product only*****

add_action( 'vc_before_init', 'your_prefix_vcSetAsTheme' );
function your_prefix_vcSetAsTheme() {
	vc_set_as_theme($disable_updater = true);
}

add_filter( 'masterslider_disable_auto_update', '__return_true' );

if(function_exists( 'ub_rev_custom_function_name' )){
	add_action( 'init', 'ub_rev_custom_function_name' );
	function ub_rev_custom_function_name() {
		set_revslider_as_theme();
	}
}

//Disable update notifications Ultimate Addons plugin
define('ULTIMATE_USE_BUILTIN', true);

// Disable Update notif for Ess Grid
if(function_exists( 'ub_ess_custom_function_name' )){
	add_action( 'init', 'ub_ess_custom_function_name' );
	function ub_ess_custom_function_name() {
		set_ess_grid_as_theme();
	}
}


//---------------------------------------------------------

//remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);
//function woocommerce_pagination() {
//    wp_pagenavi();      
//}
//add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);

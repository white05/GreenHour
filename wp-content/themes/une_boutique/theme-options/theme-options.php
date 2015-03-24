<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
	/**
	 * Get a copy of the saved settings array. 
	 */
	$saved_settings = get_option( 'option_tree_settings', array() );
	
	/**
	 * Custom settings array that will eventually be 
	 * passes to the OptionTree Settings API Class.
	 */
	$custom_settings = array( 
		'contextual_help' => array( 
			'sidebar'       => ''
		),
		'sections'        => array( 
			array(
				'id'          => 'general',
				'title'       => 'General'
			),
			array(
				'id'          => 'shop_setting',
				'title'       => 'Shop Setting'
			),
			array(
				'id'          => 'blog_settings',
				'title'       => 'Blog Settings'
			),
			array(
				'id'          => 'forum_settings',
				'title'       => 'Forum Settings'
			),
			array(
				'id'          => 'color_and_styles',
				'title'       => 'Color/Type/Styles'
			),
			array(
				'id'          => 'buttons',
				'title'       => 'Buttons'
			),
		),
		'settings'        => array( 
			array(
				'id'          => 'color_presets',
				'label'       => 'Color Presets',
				'desc'        => 'Select a color peset for your theme, generally changes the primary button color and links color. You can customize your colors more using <strong>Color/Type/Styles</strong> panel.',
				'std'         => '',
				'type'        => 'radio-image',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'choices'     => array( 
					array(
						'value'       => 'default-preset',
						'label'       => 'Default',
						'src'         =>  get_template_directory_uri() . '/images/color-presets/default.png'
					),
					array(
						'value'       => 'green-preset',
						'label'       => 'Green',
						'src'         =>  get_template_directory_uri() . '/images/color-presets/green.png'
					),
					array(
						'value'       => 'orange-preset',
						'label'       => 'Orange',
						'src'         =>  get_template_directory_uri() . '/images/color-presets/orange.png'
					),
					array(
						'value'       => 'turquoise-preset',
						'label'       => 'Turquoise',
						'src'         =>  get_template_directory_uri() . '/images/color-presets/turquoise.png'
					),
					array(
						'value'       => 'dark-grey-preset',
						'label'       => 'Dark Grey',
						'src'         =>  get_template_directory_uri() . '/images/color-presets/dark-grey.png'
					),
					array(
						'value'       => 'red-preset',
						'label'       => 'Red',
						'src'         =>  get_template_directory_uri() . '/images/color-presets/red.png'
					),
					array(
						'value'       => 'silver-preset',
						'label'       => 'Silver',
						'src'         =>  get_template_directory_uri() . '/images/color-presets/silver.png'
					),
					array(
						'value'       => 'pink-preset',
						'label'       => 'Pink',
						'src'         =>  get_template_directory_uri() . '/images/color-presets/pink.png'
					),
					array(
						'value'       => 'teal-preset',
						'label'       => 'Teal',
						'src'         =>  get_template_directory_uri() . '/images/color-presets/teal.png'
					),
					array(
						'value'       => 'purple-preset',
						'label'       => 'Purple',
						'src'         =>  get_template_directory_uri() . '/images/color-presets/purple.png'
					),
					array(
						'value'       => 'navy-preset',
						'label'       => 'Navy',
						'src'         =>  get_template_directory_uri() . '/images/color-presets/navy.png'
					),
					array(
						'value'       => 'brown-preset',
						'label'       => 'Brown',
						'src'         =>  get_template_directory_uri() . '/images/color-presets/brown.png'
					),
				),
			),
			array(
				'id'          => 'default_layout',
				'label'       => 'Default Layout',
				'desc'        => 'select the default layout for the theme. (The default is stretched)',
				'std'         => '',
				'type'        => 'select',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'choices'     => array( 
					array(
						'value'       => 'stretched',
						'label'       => 'Streched',
						'src'         => ''
					),
					array(
						'value'       => 'boxed',
						'label'       => 'Boxed',
						'src'         => ''
					),
				),
			),
			array(
				'id'          => 'header_layout',
				'label'       => 'Header Layout',
				'desc'        => 'select the main header layout for the theme.',
				'std'         => 'header-corporate',
				'type'        => 'select',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'choices'     => array(
					array(
						'value'       => 'default-header',
						'label'       => 'Header V1',
						'src'         => ''
					),
					array(
						'value'       => 'header-v2',
						'label'       => 'Header V2',
						'src'         => ''
					),
					array(
						'value'       => 'header-v3',
						'label'       => 'Header V3',
						'src'         => ''
					),
					array(
						'value'       => 'header-v4',
						'label'       => 'Header V4',
						'src'         => ''
					),
					array(
						'value'       => 'header-corporate',
						'label'       => 'Corporate Style Header',
						'src'         => ''
					),
				),
			),
			array(
				'id'          => 'header_color_preset',
				'label'       => __( 'Header Color Presets', 'une_boutique' ),
				'desc'        => __( 'Select the color preset for your header, either dark or light header. You can then use the color/type/styles section to customize the coloring accordingly.', 'une_boutique' ),
				'std'         => '',
				'type'        => 'select',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and',
				'choices'     => array( 
					array(
						'value'       => 'light-header',
						'label'       => __( 'Light Header (white)', 'une_boutique' ),
						'src'         => '',
					),
					array(
						'value'       => 'dark-header',
						'label'       => __( 'Dark Header (black)', 'une_boutique' ),
						'src'         => '',
					),
				)
			),
			array(
				'id'          => 'toolbar_color_preset',
				'label'       => __( 'Toolbar Color Presets', 'une_boutique' ),
				'desc'        => __( 'Select the color preset for your Toolbar, either dark or light Toolbar. You can then use the color/type/styles section to customize the coloring accordingly.', 'une_boutique' ),
				'std'         => '',
				'type'        => 'select',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and',
				'choices'     => array( 
					array(
						'value'       => 'dark-toolbar',
						'label'       => __( 'Dark Toolbar (black)', 'une_boutique' ),
						'src'         => '',
					),
					array(
						'value'       => 'light-toolbar',
						'label'       => __( 'Light Toolbar (white)', 'une_boutique' ),
						'src'         => '',
					),
				)
			),
			array(
				'id'          => 'main_logo',
				'label'       => 'Main Logo',
				'desc'        => 'Upload your main logo here. This logo is displayed on top left of all pages.',
				'std'         => '',
				'type'        => 'upload',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'main_logo_retina',
				'label'       => 'Main Logo Retina (@2x)',
				'desc'        => 'Here goes the retina version of the main logo. It is optional.',
				'std'         => '',
				'type'        => 'upload',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'alt_logo_light',
				'label'       => 'Logo Light Version',
				'desc'        => 'If you have enabled the transprent header and you want to have an alternative coloring of your logo (eg. if your main logo is black and you are using the light on dark preset for your transparent header, so you will need a lighter version of your logo, so just upload it here. The main logo will be used as the darker version and this would be the light version.)',
				'std'         => '',
				'type'        => 'upload',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and',
			),
			array(
				'id'          => 'alt_logo_light_retina',
				'label'       => 'Logo Light Version Retina (@2x)',
				'desc'        => 'Here goes the retina version of the white (light) logo. It is optional.',
				'std'         => '',
				'type'        => 'upload',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and',
			),
			array(
				'id'          => 'custom_favicon',
				'label'       => 'Custom Favicon',
				'desc'        => 'upload your custom favicon to replace the default one.',
				'std'         => '',
				'type'        => 'upload',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'sticky_navigation_bar',
				'label'       => 'Sticky Navigation Bar',
				'desc'        => 'check this option to enable the sticky navigation bar.',
				'std'         => '',
				'type'        => 'on-off',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and'
			),
			array(
				'id'          => 'the_preloader',
				'label'       => 'Use Pre-Loader',
				'desc'        => 'Check this option to use preloader on all pages of your site.',
				'std'         => 'off',
				'type'        => 'on-off',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and'
			),
			array(
				'id'          => 'hide_start_here',
				'label'       => 'Hide Start Here SideNav',
				'desc'        => 'check this option to hide start here side nav section.',
				'std'         => '',
				'type'        => 'checkbox',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'choices'     => array( 
					array(
						'value'       => 'enable',
						'label'       => 'Hide',
						'src'         => ''
					)
				),
			),
			array(
				'label'       => 'Main Container Max Width',
				'id'          => 'main_container_max_width',
				'type'        => 'measurement',
				'desc'        => 'Change the default width of the theme container. <strong>The best measurement unit to use is <i>em</i> based, please note that making the max width too narrow might affect the layout in a bad way.</strong> The default width is 74em',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'general'
			),
			array(
				'id'          => 'google_analytics_code',
				'label'       => 'Google Analytics Code',
				'desc'        => 'paste your google analytics code here, this code will be added to the footer of every page in your site.',
				'std'         => '',
				'type'        => 'textarea-simple',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'display_admin_bar',
				'label'       => 'Display Admin Bar',
				'desc'        => 'select this option to display wordpress adminbar on the front end while user is logged in. It\'s turned off by default.',
				'std'         => '',
				'type'        => 'on-off',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and'
			),
			array(
				'id'          => 'custom_css',
				'label'       => 'Custom CSS',
				'desc'        => 'To make color and font styles work on your theme, you need this field. You also need a file named <strong>dynamic.css</strong> in the root folder of the theme, and it shoul be writable (CHOMD 777). In the Assets folder, there is a file named dynamic.css.txt, make sure you copy and paste all the codes in that file into this field, save the options and start customizing colors, fonts and backgrounds.',
				'type'        => 'css',
				'std'         => '',
				'section'     => 'general',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'shop_layout',
				'label'       => 'Shop Layout',
				'desc'        => 'Choose the shop layout that best suites you.',
				'std'         => '',
				'type'        => 'radio-image',
				'section'     => 'shop_setting',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'choices'     => array( 
					array(
						'value'       => 'right-sidebar',
						'label'       => 'Right Sidebar',
						'src'         => OT_URL . 'assets/images/layout/right-sidebar.png'
					),
					array(
						'value'       => 'left-sidebar',
						'label'       => 'Left Sidebar',
						'src'         => OT_URL . 'assets/images/layout/left-sidebar.png'
					),
					array(
						'value'       => 'full-width',
						'label'       => 'Full Width',
						'src'         => OT_URL . 'assets/images/layout/full-width.png'
					)
				),
			),
			array(
				'id'          => 'products_per_page',
				'label'       => 'Products Per Page',
				'desc'        => 'define the number of the products displayed per page (main shop page).',
				'std'         => '',
				'type'        => 'text',
				'section'     => 'shop_setting',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'shop_column_count',
				'label'       => 'Shop Column Count',
				'desc'        => 'Set the number of columns in your main shop page. Ranges from 2 to 4 columns. <strong>setting the number of columns to 4 while the shop page has sidebars in not recommended.</strong>',
				'std'         => '',
				'type'        => 'numeric-slider',
				'section'     => 'shop_setting',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '2,4,1',
				'class'       => ''
			),
			array(
				'id'          => 'product_archive_button_style',
				'label'       => __( 'Product Archive Button Style', 'une_boutique' ),
				'desc'        => __( 'Select the style for product archive page, whether to show add to cart icons (without text) or add to cart button (text and icon)', 'une_boutique' ),
				'std'         => 'icon-only',
				'type'        => 'select',
				'section'     => 'shop_setting',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and',
				'choices'     => array(
					array(
						'value'       => 'icon-only',
						'label'       => __( 'Icon Only', 'une_boutique' ),
						'src'         => '',
					),
					array(
						'value'       => 'text-and-icon',
						'label'       => __( 'Text and Icon', 'une_boutique' ),
						'src'         => '',
					)
				)
			),
			array(
				'id'          => 'added_to_cart_notif',
				'label'       => 'Added to cart notification',
				'desc'        => 'Turn on/off the added to cart notification.',
				'std'         => 'on',
				'type'        => 'on-off',
				'section'     => 'shop_setting',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and'
			),
			array(
				'id'          => 'product_social_share',
				'label'       => 'Product Social Share',
				'desc'        => 'enable or disable the social sharing tab for wc products.',
				'std'         => '',
				'type'        => 'checkbox',
				'section'     => 'shop_setting',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'choices'     => array( 
					array(
						'value'       => 'enable',
						'label'       => 'Enable',
						'src'         => ''
					)
				),
			),
			array(
				'id'          => 'product_hover_effect',
				'label'       => __( 'Product Images Hover Effect', 'une_boutique' ),
				'desc'        => __( 'Select the hover effect for product archive thumbnails', 'une_boutique' ),
				'std'         => '',
				'type'        => 'select',
				'section'     => 'shop_setting',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and',
				'choices'     => array( 
					array(
						'value'       => 'none',
						'label'       => __( 'none', 'une_boutique' ),
						'src'         => '',
					),
					array(
						'value'       => 'zoom',
						'label'       => __( 'Zoom Effetc With Single Image', 'une_boutique' ),
						'src'         => '',
					),
					array(
						'value'       => 'alt-image',
						'label'       => __( 'Alternate Image Scroll Up', 'une_boutique' ),
						'src'         => '',
					)
				)
			),
			array(
				'id'          => 'product_categories_style',
				'label'       => __( 'Product Categories Style', 'une_boutique' ),
				'desc'        => __( 'Select the style for the product categories listing in product archive page and also in product categories carousel', 'une_boutique' ),
				'std'         => '',
				'type'        => 'select',
				'section'     => 'shop_setting',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and',
				'choices'     => array( 
					array(
						'value'       => '',
						'label'       => __( 'Style 1', 'une_boutique' ),
						'src'         => '',
					),
					array(
						'value'       => 'style2',
						'label'       => __( 'Style 2', 'une_boutique' ),
						'src'         => '',
					)
				)
			),
			array(
				'id'          => 'catalog_mode',
				'label'       => 'Catalog Mode',
				'desc'        => 'If you plan to use woocommerce on catalog mode, which means no add to cart buttons, and no prices etc, then select this option. <b>Make sure disable WishList Plugin too.</b>',
				'std'         => '',
				'type'        => 'checkbox',
				'section'     => 'shop_setting',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'choices'     => array( 
					array(
						'value'       => 'enable',
						'label'       => 'Enable',
						'src'         => ''
					)
				),
			),
			array(
				'id'          => 'disable_dropdown_cart',
				'label'       => 'Disable Drop Down Cart',
				'desc'        => 'Check this option to completely disable dropdown cart on the header.',
				'std'         => '',
				'type'        => 'checkbox',
				'section'     => 'shop_setting',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'choices'     => array( 
					array(
						'value'       => 'disable',
						'label'       => 'Disable',
						'src'         => ''
					)
				),
			),
			array(
				'id'          => 'blog_layout',
				'label'       => 'Blog Layout',
				'desc'        => 'Customize the layout for the blog pages.',
				'std'         => '',
				'type'        => 'radio-image',
				'section'     => 'blog_settings',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'choices'     => array( 
					array(
						'value'       => 'right-sidebar',
						'label'       => 'Right Sidebar',
						'src'         => OT_URL . 'assets/images/layout/right-sidebar.png'
					),
					array(
						'value'       => 'left-sidebar',
						'label'       => 'Left Sidebar',
						'src'         => OT_URL . 'assets/images/layout/left-sidebar.png'
					),
					array(
						'value'       => 'full-width',
						'label'       => 'Full Width',
						'src'         => OT_URL . 'assets/images/layout/full-width.png'
					)
				),
			),
			array(
				'id'          => 'forum_layout',
				'label'       => 'Forum Layout',
				'desc'        => 'Customize the layout for the forum pages.',
				'std'         => '',
				'type'        => 'radio-image',
				'section'     => 'forum_settings',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'choices'     => array( 
					array(
						'value'       => 'right-sidebar',
						'label'       => 'Right Sidebar',
						'src'         => OT_URL . 'assets/images/layout/right-sidebar.png'
					),
					array(
						'value'       => 'left-sidebar',
						'label'       => 'Left Sidebar',
						'src'         => OT_URL . 'assets/images/layout/left-sidebar.png'
					),
					array(
						'value'       => 'full-width',
						'label'       => 'Full Width',
						'src'         => OT_URL . 'assets/images/layout/full-width.png'
					)
				),
			),
			array(
				'id'          => 'display_forum_search_form',
				'label'       => 'Display Forum Search Form',
				'desc'        => 'Choose whether to display the search form above the main forum page or not.',
				'std'         => '',
				'type'        => 'checkbox',
				'section'     => 'forum_settings',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'choices'     => array( 
					array(
						'value'       => 'display-search-form',
						'label'       => 'Display Search Form',
						'src'         => ''
					)
				),
			),
			array(
				'id'          => 'dynamic_css',
				'label'       => 'Dynamic CSS',
				'desc'        => 'To make color and font styles work on your theme, you need this field. You also need a file named <strong>dynamic.css</strong> in the root folder of the theme, and it shoul be writable (CHOMD 777). In the Assets folder, there is a file named dynamic.css.txt, make sure you copy and paste all the codes in that file into this field, save the options and start customizing colors, fonts and backgrounds.',
				'std'         => '#page,
				#page .vc_text_separator div {
				{{main_background}}
				}
				body {
				{{general_typography}}
				{{boxed_layout_body_background}}
				}
				h1,
				.wpb_row h1,
				body.blog article h1.entry-title a,
				body.archive article h1.entry-title a,
				body.search-results article h1.entry-title a {
				{{h1_typography}}
				}
				h2, .wpb_row h2 {
				{{h2_typography}}
				}
				h3, .wpb_row h3 {
				{{h3_typography}}
				}
				h4, .wpb_row h4 {
				{{h4_typography}}
				}
				h5, .wpb_row h5 {
				{{h5_typography}}
				}
				h6, .wpb_row h6 {
				{{h6_typography}}
				}
				b, strong {
				{{bold_typography}}
				}
				a {
				{{link_typography}}
				}
				section#toolbar {
				{{toolbar_background}}
				}
				#site-branding,
				.header-style-v2 #site-branding,
				.header-style-v3 #site-branding,
				.header-style-v2 .the-search-form .column,
				.dark-header #site-branding,
				.dark-header .header-style-v2 #site-branding,
				.dark-header .header-style-v3 #site-branding,
				.dark-header .header-style-v2 .the-search-form .column,
				#masthead #site-navigation .top-bar-section .menu-main-nav-container li.mega_parent > .wp_mega_menu {
				{{header_background}}
				}
				.default-header-style #site-navigation,
				.default-header-style .the-search-form .column,
				#site-navigation.stickUp.isStuck {
				{{site_navigation}}
				}
				#site-navigation .main-menu > li > a,
				.corporate-header-style #site-navigation .main-menu > li > a,
				.corporate-header-style .woo-mini-cart-container > a {
				{{navigation_typography}}
				}
				#site-navigation .main-menu .sub-menu li a,
				#masthead #site-navigation .top-bar-section .menu-main-nav-container li.mega_parent .wp_mega_menu > li a{
				{{navigation_submenu_typography}}
				}
				#masthead #site-navigation .top-bar-section .menu-main-nav-container li.mega_parent .wp_mega_menu .megamenu-title,
				#masthead #site-navigation .top-bar-section .menu-main-nav-container li.mega_parent .wp_mega_menu .megamenu-title a {
				{{mega_menu_titles}}
				}
				.page-info-wrapper {
				{{breadcrumbs_background}}
				}
				.woocommerce div.product div.single-product-entry-wrapper,
				.woocommerce-page div.product div.single-product-entry-wrapper,
				.woocommerce #content div.product div.single-product-entry-wrapper,
				.woocommerce-page #content div.product div.single-product-entry-wrapper {
				{{single_products_background}}
				}
				#footer-light {
				{{light_footer_background}}
				}
				#footer-dark {
				{{dark_footer_background}}
				}
				button,
				.button,
				html input[type="button"],
				input[type="reset"],
				input[type="submit"] {
				background:{{primary_button_background}};
				border-color:{{primary_button_background}};
				color:{{primary_button_text_color}};
				}
				button:hover,
				.button:hover,
				html input[type="button"]:hover,
				input[type="reset"]:hover,
				input[type="submit"]:hover {
				background:{{primary_button_background_hover}};
				border-color:{{primary_button_background_hover}};
				color:{{primary_button_text_color_hover}};
				}
				.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
				.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle {
				background: {{primary_button_background}};
				}
				.woocommerce .widget_price_filter .ui-slider .ui-slider-handle:hover,
				.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle:hover {
				background: {{primary_button_background_hover}};
				}
				button.secondary, 
				.button.secondary, 
				.wpb_button, 
				input[type="submit"].secondary,
				.woocommerce div.product div.summary .button-group .wish-list-button .add_to_wishlist,
				.woocommerce-page div.product div.summary .button-group .wish-list-button .add_to_wishlist,
				.woocommerce #content div.product div.summary .button-group .wish-list-button .add_to_wishlist,
				.woocommerce-page #content div.product div.summary .button-group .wish-list-button .add_to_wishlist,
				.woocommerce .page-options-container .widgets-container .widget_price_filter .price_slider_amount .button {
				background:{{secondary_button_background}};
				border-color:{{secondary_button_background}};
				color:{{secondary_button_text_color}};
				}
				button.secondary:hover, 
				.button.secondary:hover, 
				.wpb_button:hover, 
				input[type="submit"].secondary:hover,
				.woocommerce div.product div.summary .button-group .wish-list-button .add_to_wishlist:hover,
				.woocommerce-page div.product div.summary .button-group .wish-list-button .add_to_wishlist:hover,
				.woocommerce #content div.product div.summary .button-group .wish-list-button .add_to_wishlist:hover,
				.woocommerce-page #content div.product div.summary .button-group .wish-list-button .add_to_wishlist:hover,
				.woocommerce .page-options-container .widgets-container .widget_price_filter .price_slider_amount .button:hover {
				background:{{secondary_button_background_hover}};
				border-color:{{secondary_button_background_hover}};
				color:{{secondary_button_text_color_hover}};
				}
				button.secondary, 
				.button.secondary, 
				.wpb_button, 
				input[type="submit"].secondary,
				.woocommerce div.product div.summary .button-group .wish-list-button .add_to_wishlist,
				.woocommerce-page div.product div.summary .button-group .wish-list-button .add_to_wishlist,
				.woocommerce #content div.product div.summary .button-group .wish-list-button .add_to_wishlist,
				.woocommerce-page #content div.product div.summary .button-group .wish-list-button .add_to_wishlist,
				.woocommerce .page-options-container .widgets-container .widget_price_filter .price_slider_amount .button,
				button,
				.button,
				html input[type="button"],
				input[type="reset"],
				input[type="submit"],
				button.round,
				.button.round {
				border-radius:{{buttons_border_radius}};
				}',
				'type'        => 'css',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'boxed_layout_body_background',
				'label'       => 'Boxed Layout Body Background',
				'desc'        => 'change the main background color or even upload and use your own pattern to have a patterned or image background.',
				'std'         => '',
				'type'        => 'background',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'main_background',
				'label'       => 'Main Background',
				'desc'        => 'change the main background color or even upload and use your own pattern to have a patterned or image background.',
				'std'         => '',
				'type'        => 'background',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'general_typography',
				'label'       => 'General Typography',
				'desc'        => 'Change the general typography settings. You can enable google fonts (on top of this page) and use the extera google fonts.',
				'std'         => '',
				'type'        => 'typography',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'h1_typography',
				'label'       => 'H1 Typography',
				'desc'        => 'Change the Heading Level 1 typography settings. You can enable google fonts (on top of this page) and use the extera google fonts.',
				'std'         => '',
				'type'        => 'typography',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'h2_typography',
				'label'       => 'H2 Typography',
				'desc'        => 'Change the Heading Level 2 typography settings. You can enable google fonts (on top of this page) and use the extera google fonts.',
				'std'         => '',
				'type'        => 'typography',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'h3_typography',
				'label'       => 'H3 Typography',
				'desc'        => 'Change the Heading Level 3 typography settings. You can enable google fonts (on top of this page) and use the extera google fonts.',
				'std'         => '',
				'type'        => 'typography',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'h4_typography',
				'label'       => 'H4 Typography',
				'desc'        => 'Change the Heading Level 4 typography settings. You can enable google fonts (on top of this page) and use the extera google fonts.',
				'std'         => '',
				'type'        => 'typography',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'h5_typography',
				'label'       => 'H5 Typography',
				'desc'        => 'Change the Heading Level 5 typography settings. You can enable google fonts (on top of this page) and use the extera google fonts.',
				'std'         => '',
				'type'        => 'typography',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'h6_typography',
				'label'       => 'H6 Typography',
				'desc'        => 'Change the Heading Level 6 typography settings. You can enable google fonts (on top of this page) and use the extera google fonts.',
				'std'         => '',
				'type'        => 'typography',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'bold_typography',
				'label'       => 'Bold (Strong) Typography',
				'desc'        => 'Change the general typography for bolder words. You can enable google fonts (on top of this page) and use the extera google fonts.',
				'std'         => '',
				'type'        => 'typography',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'link_typography',
				'label'       => 'Links Typography',
				'desc'        => 'Change the links typography settings.',
				'std'         => '',
				'type'        => 'typography',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'toolbar_background',
				'label'       => 'Toolbar Section Background',
				'desc'        => 'Change the background of toolbar section (top menu with dark background).',
				'std'         => '',
				'type'        => 'background',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'header_background',
				'label'       => 'Main Header Background',
				'desc'        => 'Change the background of main header.',
				'std'         => '',
				'type'        => 'background',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'site_navigation',
				'label'       => 'Main Navigation Background',
				'desc'        => 'Change the background of main navigation. (works on header style v1 style)',
				'std'         => '',
				'type'        => 'background',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'navigation_typography',
				'label'       => 'Main Navigation Typography',
				'desc'        => 'Change the typography settings for your main navigation. You can enable google fonts (on top of this page) and use the extera google fonts.',
				'std'         => '',
				'type'        => 'typography',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'navigation_submenu_typography',
				'label'       => 'Main Navigation Submenu Typography',
				'desc'        => 'Change the typography settings for your main navigation submenu items. You can enable google fonts (on top of this page) and use the extera google fonts.',
				'std'         => '',
				'type'        => 'typography',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'mega_menu_titles',
				'label'       => 'Mega Dropdown Titles Typography',
				'desc'        => 'Change the typography settings for your mega dropown titles. You can enable google fonts (on top of this page) and use the extera google fonts.',
				'std'         => '',
				'type'        => 'typography',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'breadcrumbs_background',
				'label'       => 'Breadcrumbs Bar Background',
				'desc'        => 'Change the background the breadcrumbs bar (page info bar).',
				'std'         => '',
				'type'        => 'background',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'single_products_background',
				'label'       => 'Single Products Background',
				'desc'        => 'Change the background of the single products (where the short description and the images are displayed).',
				'std'         => '',
				'type'        => 'background',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'light_footer_background',
				'label'       => 'Light Footer Background',
				'desc'        => 'Change the background of light footer area.',
				'std'         => '',
				'type'        => 'background',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'dark_footer_background',
				'label'       => 'Dark Footer Background',
				'desc'        => 'Change the background of dark footer area.',
				'std'         => '',
				'type'        => 'background',
				'section'     => 'color_and_styles',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => ''
			),
			array(
				'id'          => 'default_button_type',
				'label'       => __( 'Default Button Type', 'une_boutique' ),
				'desc'        => __( 'Choose the default button type for your theme.', 'une_boutique' ),
				'std'         => '',
				'type'        => 'select',
				'section'     => 'buttons',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and',
				'choices'     => array( 
					array(
						'value'       => 'flat-buttons',
						'label'       => __( 'Flat Buttons', 'une_boutique' ),
						'src'         => '',
					),
					array(
						'value'       => '3d-buttons',
						'label'       => __( '3D Buttons', 'une_boutique' ),
						'src'         => '',
					),
					array(
						'value'       => 'gradients',
						'label'       => __( 'Classic (gradients)', 'une_boutique' ),
						'src'         => '',
					)
				)
			),
			array(
				'id'          => 'primary_button_background',
				'label'       => __( 'Primary Button Background', 'une_boutique' ),
				'desc'        => __( 'Choose a custom background for primary buttons <strong>(default is blue)</strong>', 'une_boutique' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'section'     => 'buttons',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => 'default_button_type:is(flat-buttons),default_button_type:is(3d-buttons),',
				'operator'    => 'or'
			),
			array(
				'id'          => 'primary_button_background_hover',
				'label'       => __( 'Primary Button Background Hover State', 'une_boutique' ),
				'desc'        => __( 'Choose a custom hover state background for primary buttons <strong>(default is blue)</strong>', 'une_boutique' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'section'     => 'buttons',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => 'default_button_type:is(flat-buttons),default_button_type:is(3d-buttons),',
				'operator'    => 'or'
			),
			array(
				'id'          => 'primary_button_text_color',
				'label'       => __( 'Primary Button Text Color', 'une_boutique' ),
				'desc'        => __( 'Choose a custom text color for Primary buttons <strong>(default button is blue)</strong>', 'une_boutique' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'section'     => 'buttons',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and'
			),
			array(
				'id'          => 'primary_button_text_color_hover',
				'label'       => __( 'Primary Button Text Color Hover', 'une_boutique' ),
				'desc'        => __( 'Choose a custom text color for Primary buttons hover state <strong>(default button is blue)</strong>', 'une_boutique' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'section'     => 'buttons',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and'
			),
			array(
				'id'          => 'secondary_button_background',
				'label'       => __( 'Secondary Button Background', 'une_boutique' ),
				'desc'        => __( 'Choose a custom text color for primary buttons <strong>(default is grey)</strong>', 'une_boutique' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'section'     => 'buttons',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => 'default_button_type:is(flat-buttons),default_button_type:is(3d-buttons),',
				'operator'    => 'or'
			),
			 array(
				'id'          => 'secondary_button_background_hover',
				'label'       => __( 'Secondary Button Background Hover State', 'une_boutique' ),
				'desc'        => __( 'Choose a custom hover state background for secondary buttons <strong>(default is grey)</strong>', 'une_boutique' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'section'     => 'buttons',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => 'default_button_type:is(flat-buttons),default_button_type:is(3d-buttons),',
				'operator'    => 'or'
			),
			array(
				'id'          => 'secondary_button_text_color',
				'label'       => __( 'Secondary Button Text Color', 'une_boutique' ),
				'desc'        => __( 'Choose a custom text color for Secondary buttons <strong>(default button is grey)</strong>', 'une_boutique' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'section'     => 'buttons',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and'
			),
			array(
				'id'          => 'secondary_button_text_color_hover',
				'label'       => __( 'Secondary Button Text Color Hover', 'une_boutique' ),
				'desc'        => __( 'Choose a custom text color for secondary buttons hover state <strong>(default button is blue)</strong>', 'une_boutique' ),
				'std'         => '',
				'type'        => 'colorpicker',
				'section'     => 'buttons',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and'
			),
			array(
				'label'       => 'Buttons Border Radius',
				'id'          => 'buttons_border_radius',
				'type'        => 'measurement',
				'desc'        => 'change the border radius for buttons. (for example 5px)',
				'std'         => '',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'class'       => '',
				'section'     => 'buttons'
			),
		)
	);
	
	/* allow settings to be filtered before saving */
	$custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
	
	/* settings are not the same update the DB */
	if ( $saved_settings !== $custom_settings ) {
		update_option( 'option_tree_settings', $custom_settings ); 
	}
	
}

// add styles to admin head
add_action( 'admin_head', 'cfw_admin_css' );
function cfw_admin_css(){
	$cfw_active_theme = wp_get_theme();
	$cfw_active_theme = strtoupper( $cfw_active_theme->get( 'Name' ) ) . " - Version " . $cfw_active_theme->get( 'Version' );
?>
	<style>
		#option-tree-header:before {
			content: "\f108";
			font-family: "dashicons";
			color: #FEFEFE;
			font-size: 40px;
			line-height: 30px;
			float: left;
			margin-right: 5px;
		}
		#option-tree-header:after {
			content: "<?php echo $cfw_active_theme; ?>";
			color: #fefefe;
			line-height: 30px;
		}
	</style>
<?php
}
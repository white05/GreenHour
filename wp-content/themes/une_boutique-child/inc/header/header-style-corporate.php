<?php
if( is_woocommerce_activated() ){
	global $woocommerce; 
	if ( sizeof( $woocommerce->cart->get_cart() ) == 0 ) { $ub_cart_class = "cart-empty empty"; } else $ub_cart_class ="";
} else {
	$ub_cart_class ="";
}

if ( is_page_template( 'page-templates/transparent-menu-light-on-dark.php' ) ) {
	$transparent_header = "transparent-header light-on-dark";
} elseif ( is_page_template( 'page-templates/transparent-menu-dark-on-light.php' ) ) {
	$transparent_header = "transparent-header dark-on-light";
} else {
	$transparent_header = "";
}

if ( ot_get_option('main_logo_retina') ) {
	$main_logo_retina = 'data-at2x="'.ot_get_option('main_logo_retina').'"';
} else {
	$main_logo_retina = '';
}

if ( ot_get_option('alt_logo_light_retina') ) {
	$alt_logo_light_retina = 'data-at2x="'.ot_get_option('alt_logo_light_retina').'"';
} else {
	$alt_logo_light_retina = '';
}

?>

<header id="masthead" class="<?php echo $transparent_header; ?> site-header corporate-header-style <?php echo $ub_cart_class; ?>" role="banner">

<section id="toolbar">
	<div id="stripes" class="show-for-small"></div>
	<div class="row">
		<div class="small-6 columns large-uncentered toolbar-left hide-for-small">
			<?php if ( is_active_sidebar( 'toolbar-left' ) ) { ?>

				<?php dynamic_sidebar( 'toolbar-left' ); ?>

			<?php } else { ?>

			<?php wp_nav_menu( array( 'theme_location' => 'toolbar_left', 'fallback_cb' => false, 'container' => 'nav', 'items_wrap' => '<ul id="%1$s" class="%2$s inline-list">%3$s</ul>', 'depth' => -1 ) ); ?>

			<?php } ?>
		</div>

		<div class="small-6 columns large-uncentered opposite text-right toolbar-right hide-for-small">
			<?php if ( is_active_sidebar( 'toolbar-right' ) ) { ?>

				<?php dynamic_sidebar( 'toolbar-right' ); ?>

			<?php } else { ?>

				<?php wp_nav_menu( array( 'theme_location' => 'toolbar_right', 'fallback_cb' => false, 'container' => 'nav', 'items_wrap' => '<ul id="%1$s" class="%2$s inline-list right">%3$s</ul>', 'depth' => -1 ) ); ?>

			<?php } ?>
		</div>
	</div>
</section>
<div class="nav-placeholder"></div>
<section id="site-branding" <?php if (ot_get_option('sticky_navigation_bar') == 'on' ){echo 'class="stickUp"';}?>>
	<div class="row">
		<div class="small-12 large-3 logo-column columns">
			<?php if ( !ot_get_option('main_logo') ) { ?>
			<div class="text-logo columns">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><small><?php bloginfo( 'description' ); ?></small></h2>
			</div>
				<?php } else { 

				if ( is_page_template( 'page-templates/transparent-menu-light-on-dark.php' ) && ot_get_option('alt_logo_light') ) { ?>
					
				<a id="logo" class="<?php if( is_active_sidebar('master_header_left') && !is_active_sidebar('master_header_right') ) { ?>alignright<?php } else{ ?>aligncenter<?php } ?>" title="<?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo ot_get_option('alt_logo_light'); ?>" alt="<?php bloginfo( 'name' ); ?>" <?php echo $alt_logo_light_retina; ?> ></a>

				<?php } else { ?>

				<a id="logo" class="<?php if( is_active_sidebar('master_header_left') && !is_active_sidebar('master_header_right') ) { ?>alignright<?php } else{ ?>aligncenter<?php } ?>" title="<?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo ot_get_option('main_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" <?php echo $main_logo_retina; ?> ></a>

				<?php } ?>
				
			<?php } ?>
		</div>
	
		<div class="small-12 large-9 menu-column columns">
			<nav id="site-navigation" class=""> <!-- main navigation section -->
				<div class="row">
					<div class="search-box-wrapper alignright no-margin-left"> 
						<?php if ( is_active_sidebar( 'search-widget' ) ) { ?>
						<div id="collapsable-search-form">
							<i class="search-toggle no-margin ub-icon-search"></i>
							<div class="the-search-form">
								<?php dynamic_sidebar( 'search-widget' ); ?>
							</div>
						</div>
						<?php } ?>
					</div>

					<?php if ( !ot_get_option('disable_dropdown_cart') ) {

					if( is_woocommerce_activated() ){

						if ( !ot_get_option('catalog_mode') ) {

					?>
					
					<div class="header-dropdown-cart-wrapper alignright no-margin-left">
						<div id="header-dropdown-cart" class="relative">
							<div class="woo-mini-cart-container <?php echo $ub_cart_class; ?>">
								<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>"><?php _e('Cart', 'une_boutique');?></a>
								<div class="cart-count"><?php echo $woocommerce->cart->cart_contents_count; ?></div>
								<!-- Insert cart widget placeholder - code in woocommerce.js will update this on page load -->

								<div class="cart_content_wrapper">
									<div class="widget_shopping_cart_content"></div>
								</div>
							</div>
						</div>
					</div>

					<?php } } } ?>

					<?php if ( ot_get_option('disable_dropdown_cart') ) {
						$ub_cart_class = 'empty';
					} ?>

					<div class="top-bar small-4 large-12 columns <?php if ( is_active_sidebar( 'search-widget' ) ) { ?>has-widget <?php } else { echo " no-padding-right "; } echo $ub_cart_class; ?>" role="navigation">
						<section class="top-bar-section hide-for-print">
							<ul class="title-area show-for-medium-down">
								<li class="menu-icon"><a href="javascript:void(0)"><span class="ub-icon-list2"></span><?php _e( 'MENU', 'une_boutique' ); ?></a></li>
							</ul>
							<div class="screen-reader-text skip-link hide">
								<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'une_boutique' ); ?>"><?php _e( 'Skip to content', 'une_boutique' ); ?></a>
							</div>

							<?php wp_nav_menu( array( 'container_class' => 'menu-main-nav-container', 'theme_location' => 'primary', 'fallback_cb' => true, 'menu_class' => 'main-menu right',  'walker' => new ub_mega_nav_walker ) ); ?>
						</section>
					</div><!-- #site-navigation -->
				</div>
			</nav> <!-- ./end of main navigation section -->
		</div>

	</div> <!-- end of row -->
</section>

</header><!-- #masthead -->
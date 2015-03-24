<?php

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
<header id="masthead" class="site-header header-style-v3" role="banner">

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

	<!-- main navigation & logo -->
	<div class="nav-placeholder"></div>
	<section id="site-branding" <?php if (ot_get_option('sticky_navigation_bar')  == 'on' ){echo 'class="stickUp"';} ?>>
		<div class="row">
			<div class="large-3 small-12 columns logo-column">
				<?php if ( !ot_get_option('main_logo') ) { ?>
				<div class="text-logo columns">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><small><?php bloginfo( 'description' ); ?></small></h2>
				</div>
				<?php } else { ?>
					<a id="logo" class="<?php if( is_active_sidebar('master_header_left') && !is_active_sidebar('master_header_right') ) { ?>alignright<?php } else{ ?>aligncenter<?php } ?>" title="<?php bloginfo( 'name' ); ?> | <?php bloginfo( 'description' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo ot_get_option('main_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" <?php echo $main_logo_retina; ?>></a>
				<?php } ?>
			</div>

			<div class="large-9 columns small-12 nav-column no-padding-right">
				<!-- side nav (left offcanvas) button -->
				<?php if ( !ot_get_option('hide_start_here') ) { ?>
					<aside class="side-panel hide-for-print">
					<a href="javascript:void(0)" title="<?php _e( 'Start Here', 'une_boutique' ); ?>" class="sidepanel-title alignleft relative clearfix">
						<p class="no-margin">
							<i class="ub-icon-pop-out"></i>
						</p>
					</a>
					</aside>
				<?php } ?>

				<?php if ( !ot_get_option('disable_dropdown_cart') ) {

				if( is_woocommerce_activated() ){

					if ( !ot_get_option('catalog_mode') ) {

				?>

				<div class="header-dropdown-cart-wrapper alignright">
					<div id="header-dropdown-cart" class="relative">
						<?php global $woocommerce; 
						if ( sizeof( $woocommerce->cart->get_cart() ) == 0 ) { $cart_class = "empty"; } else $cart_class =""; ?>
						<div class="woo-mini-cart-container <?php echo $cart_class; ?>">
							<div class="cart-count"><?php echo $woocommerce->cart->cart_contents_count; ?></div>
								<a title="<?php _e('Your Cart', 'une_boutique');?>" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
							<i class="ub-icon-bag-short"></i></a>
							<!-- Insert cart widget placeholder - code in woocommerce.js will update this on page load -->

							<div class="cart_content_wrapper">
								<div class="widget_shopping_cart_content"></div>
							</div>
						</div>
					</div>
				</div>

				<?php } } } ?>

				<nav id="site-navigation" class="site-navigation alignright"> <!-- main navigation section -->
					<div class="row">
						<div class="top-bar small-4 large-12 columns" role="navigation">
							<section class="top-bar-section">
								<ul class="title-area show-for-medium-down">
									<li class="menu-icon"><a href="javascript:void(0)"><span class="ub-icon-list2"></span><?php _e( 'MENU', 'une_boutique' ); ?></a></li>
								</ul>
								<div class="screen-reader-text skip-link hide">
									<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'une_boutique' ); ?>"><?php _e( 'Skip to content', 'une_boutique' ); ?></a>
								</div>

								<?php wp_nav_menu( array( 'container_class' => 'menu-main-nav-container', 'theme_location' => 'primary', 'fallback_cb' => true, 'menu_class' => 'main-menu right', /*'walker' => new ub_mega_nav_walker*/ ) ); ?>

								<!-- secondary navigation manu -->
								<?php wp_nav_menu( array( 'container_class' => 'menu-secondary-nav-container', 'theme_location' => 'secondary_nav', 'fallback_cb' => false, 'menu_class' => 'secondary-menu right', 'depth' => -1, ) ); ?>
							</section>
						</div><!-- #site-navigation -->
					</div>
				</nav> <!-- ./end of main navigation section -->
			</div>
	</section>

</header><!-- #masthead -->
<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Une Boutique
 */
?>

	</section><!-- #content -->

	<?php if ( is_active_sidebar( 'footer-light' ) ) { ?>

	<footer id="footer-light" style="padding:0px; background-color:#ffffff">
		<div class="row wpb_row full" style="margin:0px; left: 0px; background-image: url(http://localhost/GreenHour/wp-content/uploads/2015/03/back2-01.png); background-attachment: scroll; background-color: rgba(0, 0, 0, 0); background-size: cover; background-repeat: no-repeat;">
			<div class="row">
				<?php dynamic_sidebar( 'footer-light' ); ?>
			<div>
		</div>
	</footer>

	<?php } ?>

	<?php if ( is_active_sidebar( 'footer-dark' ) ) { ?>

	<footer id="footer-dark">
		<div class="row">
			<?php dynamic_sidebar( 'footer-dark' ); ?>
		</div>
	</footer>

	<?php } ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row">

			<?php if ( is_active_sidebar( 'colophone-l' ) || is_active_sidebar( 'colophone-r' ) ) { ?>

			<div class="small-12 large-5 columns colophon-l">
				<?php dynamic_sidebar( 'colophone-l' ); ?>
			</div>

			<div class="small-12 large-7 columns colophon-r hide-for-small">
				<?php dynamic_sidebar( 'colophone-r' ); ?>
			</div>

			<?php } else { ?>
			<div class="site-info">
				2015 GreenHour All rights Reserved.
			</div> <!--.site-info -->
			<?php } ?>

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php if ( ot_get_option('default_layout') == 'boxed' ) {
	// if boxed layout is selected
	echo '</div>';
} ?>

<p id="back-top"><a href="#top"><span class="ub-icon-arrow-up7"></span></a></p>

<?php if ( !current_user_can( 'manage_options' ) ) {
	echo ot_get_option('google_analytics_code');
} ?>

<?php if( is_woocommerce_activated() ){
	require get_template_directory() . '/inc/modals.php';
} ?>

<!-- add to cart notification -->
<?php
/**
 * Check if WooCommerce is active
 **/
if( is_woocommerce_activated() && ot_get_option('added_to_cart_notif') !== 'off' ){
	global $woocommerce;
	$cart_url = $woocommerce->cart->get_cart_url(); ?>

	<div class="product-added-notif hidden">
		<p class="no-margin"><?php _e('Product added to the cart. You can review you cart', 'une_boutique') ?> <a href="<?php echo $cart_url; ?>"><?php _e('here', 'une_boutique') ?></a></p>
	<span class="notif-close"></span>
	</div>

<?php } ?>

<?php wp_footer(); ?>
</body>
</html>
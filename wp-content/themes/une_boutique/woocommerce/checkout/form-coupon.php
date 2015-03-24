<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! WC()->cart->coupons_enabled() ) {
	return;
}

?>

<?php if ( is_user_logged_in() ) { ?>
	<div class="col2-set">
		<div class="col-1">
<?php } else { ?>
	<div class="col-2">
<?php } ?>
		<div id="checkout_coupon">
			<?php $info_message = apply_filters( 'woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'woocommerce' ) . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>' );
wc_print_notice( $info_message, 'notice' ); ?>
			<form class="checkout_coupon" method="post" style="display:none">

				<p class="form-row form-row-first">
					<input type="text" name="coupon_code" class="input-text" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
				</p>

				<p class="form-row form-row-last">
					<input type="submit" class="button round secondary no-margin-bottom" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />
				</p>

				<div class="clear"></div>
			</form>
		</div>

<?php if ( is_user_logged_in() ) { ?>
	</div></div>
<?php } else { ?>
	</div>
<?php } ?>
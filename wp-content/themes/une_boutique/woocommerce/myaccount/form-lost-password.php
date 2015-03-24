<?php
/**
 * Lost password form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $post;

?>

<?php wc_print_notices(); ?>

<form method="post" class="lost_reset_password">

	<?php if( 'lost_password' == $args['form'] ) : ?>
    <div class="col2-set" id="lost-password">
        <div class="col-1">
            
            <p class="form-row form-row-first"><input placeholder="<?php _e( 'Username or email', 'woocommerce' ); ?> *" class="input-text" type="text" name="user_login" id="user_login" /></p>

            <div class="clear"></div>
        </div>

        <div class="col-2 form-notes">
            <span class="arrow-shape-left"></span>
            <p><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p>
        </div>

    </div>

	<?php else : ?>

    <p><?php echo apply_filters( 'woocommerce_reset_password_message', __( 'Enter a new password below.', 'woocommerce') ); ?></p>

    <p class="form-row form-row-first">
        <input placeholder="<?php _e( 'New password', 'woocommerce' ); ?> *" type="password" class="input-text" name="password_1" id="password_1" autofocus required />
    </p>
    <p class="form-row form-row-last">
        <input placeholder="<?php _e( 'Re-enter new password', 'woocommerce' ); ?> *" type="password" class="input-text" name="password_2" id="password_2" required />
    </p>

    <input type="hidden" name="reset_key" value="<?php echo isset( $args['key'] ) ? $args['key'] : ''; ?>" />
    <input type="hidden" name="reset_login" value="<?php echo isset( $args['login'] ) ? $args['login'] : ''; ?>" />

    <div class="clear"></div>

	<?php endif; ?>

    <p class="form-row"><input type="submit" class="button" name="wc_reset_password" value="<?php echo 'lost_password' == $args['form'] ? __( 'Reset Password', 'woocommerce' ) : __( 'Save', 'woocommerce' ); ?>" /></p>
    <?php wp_nonce_field( $args['form'] ); ?>

</form>
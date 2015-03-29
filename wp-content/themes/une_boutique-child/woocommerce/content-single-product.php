<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $post, $product, $woocommerce;
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="single-product-entry-wrapper custom-single" style="padding:0px;">
	<div class="wpb_row row full" style="padding:0px; margin:0px;" data-row-effect-mobile-disable="true"> 
		<div class="relative columns vc_col-sm-6 wpb_column column_container">
		<div class="wpb_wrapper">
		<?php
			/**wpb_row full
			* woocommerce_before_single_product hook
			*
			* @hooked woocommerce_show_messages - 10
			*/
			//do_action( 'woocommerce_before_single_product' );
		?>
		<div class="wpb_single_image wpb_content_element vc_align_left custom-img">
			<div class="wpb_wrapper">
			
				
		<?php
			/**
			 * woocommerce_show_product_images hook
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			 $image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
			 $image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			 $image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
			 $attachment_count   = count( get_children( array( 'post_parent' => $post->ID, 'post_mime_type' => 'image', 'post_type' => 'attachment' ) ) );

			 echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom ilightbox" title="%s" rel="ilightbox' . $gallery . '">%s</a>', $image_link, $image_title, $image ), $post->ID );			//do_action( 'woocommerce_before_single_product_summary' );
		?>
			</div> 
		</div>
		</div>
		</div>
		<div class="relative columns vc_col-sm-6 wpb_column column_container" style="padding-top:120px;"> 
		<div class="wpb_wrapper">
		<div class="summary entry-summary">
			<h3 itemprop="name" class="product_title entry-title" style="color: #000000;"><?php the_title(); ?></h3>
			<?php the_content(); ?>

			
			
			
			<?php do_action( 'woocommerce_' . $product->product_type . '_add_to_cart'  ); ?>
			
			<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" style="display:inline-block;">
                
				<p itemprop="price" class="price"><?php echo $product->get_price_html(); ?></p>

				<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
				<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

			</div>
			<?php //wc_get_template( 'single-product/meta.php' ); ?>
			
			<?php 
			if ($post->post_excerpt ){ ?>
				<div itemprop="description">
					<?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
				</div>
			<?php } ?>
		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			//do_action( 'woocommerce_single_product_summary' );
			
		?>

			</div><!-- .summary -->
		</div>
		</div>
	</div>
</div>
	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		//do_action( 'woocommerce_after_single_product_summary' );
	?>
	<?php echo do_shortcode('[greenhour_menu]'); ?>
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>

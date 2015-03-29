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
			do_action( 'woocommerce_before_single_product' );
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
		<div class="relative columns vc_col-sm-6 page_column wpb_column column_container" style="padding-top:120px;">
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
<div class="wpb_row row page_row menu vc_custom_1427217854488 full" style="margin:0px" data-row-effect-mobile-disable="true" data-img-parallax-mobile-disable="false" style="background-image: none !important;"><div class="upb_row_bg vcpb-default" data-upb_br_animation="" data-parallax_sense="30" data-bg-override="0" data-bg-animation="left-animation" data-bg-animation-type="h" data-animation-repeat="repeat" style="min-height: 867px; min-width: 1358px; left: 0px; width: 1358px; background-image: url(http://localhost/GreenHour/wp-content/uploads/2015/03/wood_old_0048_02_preview.jpg); background-attachment: fixed; background-color: rgba(0, 0, 0, 0); background-size: contain; background-repeat: repeat;"></div>
	<div class="relative columns vc_col-sm-12 wpb_column column_container " >
		<div class="wpb_wrapper">
			<h5 style="text-align: center;  margin-bottom:35px;"><span style="border-bottom: 3px solid #000; color: #000000;">MENU</span></h5>
			<div class="wpb_tabs wpb_content_element" data-interval="0">
				<div class="wpb_wrapper wpb_tour_tabs_wrapper ui-tabs clearfix ui-widget ui-widget-content ui-corner-all">
					<ul class="wpb_tabs_nav ui-tabs-nav clearfix ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist"><li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tab-1427215865060-2-8" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true"><a href="#tab-1427215865060-2-8" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">Salad</a></li><li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tab-1427215036-2-37" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tab-1427215036-2-37" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">Drink</a></li><li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tab-1427215036-1-42" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="#tab-1427215036-1-42" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">Soup</a></li></ul>
						<div id="tab-1427215865060-2-8" class="wpb_tab ui-tabs-panel wpb_ui-tabs-hide clearfix ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-1" role="tabpanel" aria-hidden="false" style="display: block;">
							<?php echo do_shortcode( "[vc_row_inner][vc_column_inner width='1/1'][ultimate_carousel slider_type='horizontal' slide_to_scroll='single' slides_on_desk='1' slides_on_tabs='1' slides_on_mob='1' infinite_loop='on' speed='300' autoplay='off' autoplay_speed='5000' arrows='show' arrow_style='default' border_size='2' arrow_color='#333333' arrow_size='24' next_icon='ultsl-arrow-right4' prev_icon='ultsl-arrow-left4' dots='show' dots_color='#333333' dots_icon='ultsl-record' draggable='off' touch_move='off' item_space='15'][vc_column_text][product_category category='salad' per_page='6' columns='3' orderby='date' order='desc'][/vc_column_text][vc_column_text][products ids='25, 27, 80, 82, 83, 159' per_page='6' columns='3' orderby='date' order='desc' pagination='yes'][/vc_column_text][/ultimate_carousel][/vc_column_inner][/vc_row_inner]" ); ?>
						</div>
						<div id="tab-1427215036-2-37" class="wpb_tab ui-tabs-panel wpb_ui-tabs-hide clearfix ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-2" role="tabpanel" aria-hidden="true" style="display: none;">
							<?php echo do_shortcode("[vc_column_text][product_category category='drink' per_page='6' columns='3' orderby='date' order='desc' pagination='yes'][/vc_column_text]"); ?>
						</div>
						<div id="tab-1427215036-1-42" class="wpb_tab ui-tabs-panel wpb_ui-tabs-hide clearfix ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">
							<?php echo do_shortcode("[vc_column_text][product_category category='salad' per_page='6' columns='3' orderby='date' order='desc' pagination='yes'][/vc_column_text]"); ?>
						</div>
				</div> 
			</div> 
		</div> 
	</div> 
</div>
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>

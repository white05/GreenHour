<?php
/**
 * Shop breadcrumb
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $wp_query, $author; 

if ( is_product() ) return;?>

<div class="page-info-wrapper">
	<div class="row">
		<div class="small-12 column">

<?php if ( is_shop() ) { ?>

<h3 class="page-title alignleft"><?php woocommerce_page_title(); ?></h3>

<?php } elseif ( is_product() ) { ?>

<h3 itemprop="name" class="product_title entry-title alignleft"><?php the_title(); ?></h3>

<?php } elseif ( is_product_category() ) { ?>

	<h3 class="page-title alignleft"><?php woocommerce_page_title(); ?></h3>
	
<?php } ?>

<nav class="shop-items-nav alignright">
	<ul class="unstyled inline-list">
		<?php if ( is_product() ) { ?>
		<li class="next">
			<?php
				$nextPostLink = get_next_post_link('%link', '<i class="ub-icon-arrow-right7"></i>', false, '');
				if ($nextPostLink){
					echo $nextPostLink;
				}
				else{
					echo "<a class='last-item' href='javascript:void(0)' rel='next'><i class='ub-icon-arrow-right7'></i></a>";
				}
			?>
		</li>
		<li class="previous">
			<?php
				$previousPostLink = get_previous_post_link('%link', '<i class="ub-icon-arrow-left7"></i>', false, '');
				if ($previousPostLink){
					echo $previousPostLink;
				}
				else{
					echo "<a class='first-item' href='javascript:void(0)' rel='next'><i class='ub-icon-arrow-left7'></i></a>";
				}
			?>
		</li>
		<?php } ?>
		<?php if ( is_shop() || is_product_category() ) { ?>
		<li class="page-options"><a href="javascript:void(0)"><i class="ub-icon-grid"></i></a></li>
		<?php } ?>
	</ul>
</nav>

<?php
$prepend      = '';
$permalinks   = get_option( 'woocommerce_permalinks' );
$shop_page_id = woocommerce_get_page_id( 'shop' );
$shop_page    = get_post( $shop_page_id );
$delimiter    = ' / ';
$wrap_before  = '<nav class="woocommerce-breadcrumb alignright" itemprop="breadcrumb">';
$wrap_after   = '</nav>';

// If permalinks contain the shop page in the URI prepend the breadcrumb with shop
if ( $shop_page_id && strstr( $permalinks['product_base'], '/' . $shop_page->post_name ) && get_option( 'page_on_front' ) !== $shop_page_id ) {
	$prepend = $before . '<a href="' . get_permalink( $shop_page ) . '">' . $shop_page->post_title . '</a> ' . $after . $delimiter;
}

if ( ( ! is_home() && ! is_front_page() && ! ( is_post_type_archive() && get_option( 'page_on_front' ) == woocommerce_get_page_id( 'shop' ) ) ) || is_paged() ) {

	echo $wrap_before;

	if( is_product() && isset($_SERVER['HTTP_REFERER']) ) {
		echo "<a class=\"back-to-results-link\" href=".$_SERVER['HTTP_REFERER'].">
				<i class=\"ub-icon-arrow-left4\"></i> " .__( 'Back to results', 'une_boutique'). "</a> - ";
	}

	if ( ! empty( $home ) ) {
		echo $before . '<a class="home" href="' . apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) . '">' . $home . '</a>' . $after . $delimiter;
	}

	if ( is_category() ) {

		$cat_obj = $wp_query->get_queried_object();
		$this_category = get_category( $cat_obj->term_id );

		if ( 0 != $this_category->parent ) {
			$parent_category = get_category( $this_category->parent );
			if ( ( $parents = get_category_parents( $parent_category, TRUE, $after . $delimiter . $before ) ) && ! is_wp_error( $parents ) ) {
				echo $before . rtrim( $parents, $after . $delimiter . $before ) . $after . $delimiter;
			}
		}

		echo $before . single_cat_title( '', false ) . $after;

	} elseif ( is_tax('product_cat') ) {

		echo $prepend;
		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

		$parents = array();
		$parent = $term->parent;
		while ( $parent ) {
			$parents[] = $parent;
			$new_parent = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ) );
			$parent = $new_parent->parent;
		}

		if ( ! empty( $parents ) ) {
			$parents = array_reverse( $parents );
			foreach ( $parents as $parent ) {
				$item = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
				echo $before .  '<a href="' . get_term_link( $item->slug, 'product_cat' ) . '">' . esc_html( $item->name ) . '</a>' . $after . $delimiter;
			}
		}

		$queried_object = $wp_query->get_queried_object();
		echo $before . esc_html( $queried_object->name ) . $after;

	} elseif ( is_tax('product_tag') ) {

		$queried_object = $wp_query->get_queried_object();
		echo $prepend . $before . __( 'Products tagged (', 'woocommerce' ) . $queried_object->name . ')' . $after;

	} elseif ( is_day() ) {

		echo $before . '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $after . $delimiter;
		echo $before . '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $after . $delimiter;
		echo $before . get_the_time('d') . $after;

	} elseif ( is_month() ) {

		echo $before . '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $after . $delimiter;
		echo $before . get_the_time('F') . $after;

	} elseif ( is_year() ) {

		echo $before . get_the_time('Y') . $after;

	} elseif ( is_post_type_archive('product') && get_option('page_on_front') !== $shop_page_id ) {

		$_name = woocommerce_get_page_id( 'shop' ) ? get_the_title( woocommerce_get_page_id( 'shop' ) ) : '';

		if ( ! $_name ) {
			$product_post_type = get_post_type_object( 'product' );
			$_name = $product_post_type->labels->singular_name;
		}

		if ( is_search() ) {

			echo $before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $delimiter . __( 'Search results for &ldquo;', 'woocommerce' ) . get_search_query() . '&rdquo;' . $after;

		} elseif ( is_paged() ) {

			echo $before . '<a href="' . get_post_type_archive_link('product') . '">' . $_name . '</a>' . $after;

		} else {

			echo $before . $_name . $after;

		}

	} elseif ( is_single() && !is_attachment() ) {

		if ( get_post_type() == 'product' ) {

			echo $prepend;

			if ( $terms = wp_get_object_terms( $post->ID, 'product_cat' ) ) {
				$term = current( $terms );
				$parents = array();
				$parent = $term->parent;

				while ( $parent ) {
					$parents[] = $parent;
					$new_parent = get_term_by( 'id', $parent, 'product_cat' );
					$parent = $new_parent->parent;
				}

				if ( ! empty( $parents ) ) {
					$parents = array_reverse($parents);
					foreach ( $parents as $parent ) {
						$item = get_term_by( 'id', $parent, 'product_cat');
						echo $before . '<a href="' . get_term_link( $item->slug, 'product_cat' ) . '">' . $item->name . '</a>' . $after . $delimiter;
					}
				}

				echo $before . '<a href="' . get_term_link( $term->slug, 'product_cat' ) . '">' . $term->name . '</a>' . $after . $delimiter;

			}

			echo $before . get_the_title() . $after;

		} elseif ( get_post_type() != 'post' ) {

			$post_type = get_post_type_object( get_post_type() );
			$slug = $post_type->rewrite;
				echo $before . '<a href="' . get_post_type_archive_link( get_post_type() ) . '">' . $post_type->labels->singular_name . '</a>' . $after . $delimiter;
			echo $before . get_the_title() . $after;

		} else {

			$cat = current( get_the_category() );
			echo get_category_parents( $cat, true, $delimiter );
			echo $before . get_the_title() . $after;

		}

	} elseif ( is_404() ) {

		echo $before . __( 'Error 404', 'woocommerce' ) . $after;

	} elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' ) {

		$post_type = get_post_type_object( get_post_type() );

		if ( $post_type )
			echo $before . $post_type->labels->singular_name . $after;

	} elseif ( is_attachment() ) {

		$parent = get_post( $post->post_parent );
		$cat = get_the_category( $parent->ID );
		$cat = $cat[0];
		echo get_category_parents( $cat, true, '' . $delimiter );
		echo $before . '<a href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a>' . $after . $delimiter;
		echo $before . get_the_title() . $after;

	} elseif ( is_page() && !$post->post_parent ) {

		echo $before . get_the_title() . $after;

	} elseif ( is_page() && $post->post_parent ) {

		$parent_id  = $post->post_parent;
		$breadcrumbs = array();

		while ( $parent_id ) {
			$page = get_page( $parent_id );
			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title( $page->ID ) . '</a>';
			$parent_id  = $page->post_parent;
		}

		$breadcrumbs = array_reverse( $breadcrumbs );

		foreach ( $breadcrumbs as $crumb )
			echo $crumb . '' . $delimiter;

		echo $before . get_the_title() . $after;

	} elseif ( is_search() ) {

		echo $before . __( 'Search results for &ldquo;', 'woocommerce' ) . get_search_query() . '&rdquo;' . $after;

	} elseif ( is_tag() ) {

			echo $before . __( 'Posts tagged &ldquo;', 'woocommerce' ) . single_tag_title('', false) . '&rdquo;' . $after;

	} elseif ( is_author() ) {

		$userdata = get_userdata($author);
		echo $before . __( 'Author:', 'woocommerce' ) . ' ' . $userdata->display_name . $after;

	}

	if ( get_query_var( 'paged' ) )
		echo ' (' . __( 'Page', 'woocommerce' ) . ' ' . get_query_var( 'paged' ) . ')';

	echo $wrap_after;
}

echo '</div></div></div>'; ?>

<?php if ( is_shop() || is_product_category() ) {

//check if the filters are active

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

if ( strpos($url,'min_price') !== false || strpos($url,'max_price') !== false || strpos($url,'filter_') !== false || isset( $_GET['orderby'] ) ) {
	$has_filters = "";
} else {
	$has_filters = 'style="display:none;"';
}
?>

<div class="page-options-container" <?php echo $has_filters; ?> >
	<div class="row">
		<div class="small-12 large-9 columns widgets-container">
			<?php if ( is_active_sidebar( 'shop-page-widget' ) ) { ?>
				<?php dynamic_sidebar( 'shop-page-widget' ); ?>
			<?php } ?>
		</div>
		<div class="small-12 large-3 columns">
			
				<?php
				global $woocommerce, $wp_query;

				if ( 1 !== $wp_query->found_posts || woocommerce_products_will_display() ) { ?>

				<div class="shop-sort-filter">

				<?php
					$paged    = max( 1, $wp_query->get( 'paged' ) );
					$per_page = $wp_query->get( 'posts_per_page' );
					$total    = $wp_query->found_posts;
					$first    = ( $per_page * $paged ) - $per_page + 1;
					$last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

					if (isset($_GET['orderby'])) {
						$orderby = $_GET['orderby'];
					} else {
						$orderby = '';
					}
				?>
				

				<?php global $woocommerce, $wp_query; ?>

				<form class="woocommerce-ordering styled-select" method="get">
					<!-- <span class="orderby-title"><?php //_e('Order by:', 'une_boutique') ?></span> -->
					<select name="orderby" class="orderby">
						<?php
							$catalog_orderby = apply_filters( 'woocommerce_catalog_orderby', array(
								'menu_order' => __( 'Default sorting', 'woocommerce' ),
								'popularity' => __( 'Sort by popularity', 'woocommerce' ),
								'rating'     => __( 'Sort by average rating', 'woocommerce' ),
								'date'       => __( 'Sort by newness', 'woocommerce' ),
								'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
								'price-desc' => __( 'Sort by price: high to low', 'woocommerce' )
							) );

							if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' )
								unset( $catalog_orderby['rating'] );

							foreach ( $catalog_orderby as $id => $name )
								echo '<option value="' . esc_attr( $id ) . '" ' . selected( $orderby, $id, false ) . '>' . esc_attr( $name ) . '</option>';
						?>
					</select>
					<?php
						// Keep query string vars intact
						foreach ( $_GET as $key => $val ) {
							if ( 'orderby' == $key )
								continue;
							
							if (is_array($val)) {
								foreach($val as $innerVal) {
									echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
								}
							
							} else {
								echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
							}
						}
					?>
				</form>


				<p class="woocommerce-result-count no-margin-bottom">
					<?php if ( 1 == $total ) {
						_e( 'Showing the single result', 'woocommerce' );
					} elseif ( $total <= $per_page ) {
						printf( __( 'Showing all %d results', 'woocommerce' ), $total );
					} else {
						printf( _x( 'Showing %1$d–%2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'woocommerce' ), $first, $last, $total );
					}
					?>
				</p>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<?php } ?>
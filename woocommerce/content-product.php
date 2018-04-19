<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product, $woocommerce_loop, $yith_wcwl;

// Store loop count we're currently on
if (empty($woocommerce_loop['loop']))
    $woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if (empty($woocommerce_loop['columns']))
    $woocommerce_loop['columns'] = apply_filters('loop_shop_columns', 4);

// Ensure visibility
if (!$product || !$product->is_visible())
    return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if (is_cart()) {

    $classes[] = 'item col-lg-3 col-md-3 col-sm-4 col-xs-6 mb-20 minhp';

} else {

    $classes[] = 'item col-lg-4 col-md-3 col-sm-4 col-xs-6 mb-20 minhp';
}



?>

<li <?php post_class($classes); ?> >
    <div class="item-inner">
        <div class="item-img">
            <div class="item-img-info">
                <?php do_action('woocommerce_before_shop_loop_item'); ?>
                <a class="product-image" href="<?php the_permalink(); ?>">
                    <?php
                    /**
                     * woocommerce_before_shop_loop_item_title hook
                     *
                     * @hooked woocommerce_show_product_loop_sale_flash - 10
                     * @hooked woocommerce_template_loop_product_thumbnail - 10
                     */
                    do_action('woocommerce_before_shop_loop_item_title');
                    ?>
                </a>
                <?php if (class_exists('YITH_WCQV_Frontend')) { ?>
                    <a title="Quick View" class="yith-wcqv-button magik-btn-quickview" href="#"
                       data-product_id="<?php echo esc_attr($product->id); ?>"><span>
        <?php _e('Quick View', MGK_NAME); ?>
        </span></a>
                <?php } ?>
            </div>
        </div>
        <div class="item-info">
            <div class="info-inner">
                <div class="item-title"><a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a></div>
                <div class="item-content">
                    <div class="ratings">
                        <div class="rating-box">
                            <?php $average = $product->get_average_rating(); ?>
                            <div style="width:<?php echo(($average / 5) * 100); ?>%" class="rating"></div>
                        </div>
                    </div>
                   
                                    <?php
                                    /**
                                     * woocommerce_after_shop_loop_item_title hook
                                     *
                                     * @hooked woocommerce_template_loop_rating - 5
                                     * @hooked woocommerce_template_loop_price - 10
                                     */
                                    
                                    ?>


                                   </div>
            </div>
        </div>
    </div>
</li>

<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
'meta_query'=> array(
        array(
            'key' => 'meta-box-checkbox', // this key will change!
            'compare' => '=',
            'value' => 'true',
        )
    ),
'no_found_rows'        => 1,
	'posts_per_page'       => 3,
	'orderby'              => 'rand',
) );

$products                    = new WP_Query( $args );




if ( $products->have_posts()) : ?>

	<div class="related products col-md-12" style="clear:both;">

		<h2 class="relatedp">no se pierda estos <strong>Productos Destacados</strong></h2>

		<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();
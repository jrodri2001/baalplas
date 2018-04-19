	<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header('shop');

global $mgkOptions;
$plugin_url = plugins_url();
?>
<script type="text/javascript"><!--


    jQuery(function ($) {

        "use strict";


        jQuery.display = function (view) {

            view = jQuery.trim(view);

            if (view == 'list') {
                jQuery(".button-grid").removeClass("button-active");
                jQuery(".button-list").addClass("button-active");
                jQuery.getScript("<?php echo  site_url() ; ?>/wp-content/plugins/yith-woocommerce-quick-view/assets/js/frontend.js", function () {
                });
                jQuery('.products-grid').attr('class', 'products-list');


                jQuery('.products-list > ul > li').each(function (index, element) {

                    var htmls = '';
                    var element = jQuery(this);


                    element.attr('class', 'item ');


                    htmls += '<div class="item-inner"><div class="item-img"><div class="item-img-info">';

                    var element = jQuery(this);

                    var image = element.find('.item-img-info').html();

                    if (image != undefined) {
                        htmls += image;
                    }

                    htmls += '</div>';


                    htmls += '<div class="detailssection">';

                    htmls += '<div class="info"><div class="info-inner">';
                    if (element.find('.item-title').length > 0)
                        htmls += '<div class="item-title"> <a href="<?php the_permalink(); ?>">' + element.find('.item-title').html() + '</a></div>';

                    var ratings = element.find('.ratings').html();

                    htmls += ' <div class="rating"><div class="ratings">' + ratings + '</div></div>';

                    var descriptions = element.find('.desc').html();
                    htmls += '<div class="desc std">' + descriptions + '</div>';


                    var price = element.find('.price').html();

                    if (price != null) {
                        htmls += ' <div class="item-content"><div class="price-box"> <span class="regular-price"> <span class="price">' + price + '</span></span></div></div>';
                    }
                    htmls += '</div></div>';

                    htmls += '<div class="actions">' + element.find('.actions').html() + '</div>';
                  
                    htmls += '</div></div>';

                    element.html(htmls);
                });


                jQuery.cookie('display', 'list');

            } else {
                jQuery(".button-list").removeClass("button-active");
                jQuery(".button-grid").addClass("button-active");
                jQuery.getScript("<?php echo  site_url(); ?>/wp-content/plugins/yith-woocommerce-quick-view/assets/js/frontend.js", function () {
                });
                jQuery('.products-list').attr('class', 'products-grid');

                jQuery('.products-grid > ul > li').each(function (index, element) {
                    var html = '';

                    element = jQuery(this);

                    element.attr('class', 'item col-lg-4 col-md-4 col-sm-6 col-xs-6 mb-20 minhp');

                    html += ' <div class="item-inner"><div class="item-img"><div class="item-img-info">';

                    var element = jQuery(this);

                    var image = element.find('.item-img-info').html();

                    if (image != undefined) {

                        html += image;
                    }

                    html += '</div></div>';

                  

                    html += '<div class="item-info"><div class="info-inner">';
                    if (element.find('.item-title').length > 0)
                        html += '<div class="item-title"> <a href="<?php the_permalink(); ?>">' + element.find('.item-title').html() + '</a></div>';

                    var price = element.find('.price').html();


                    html += ' <div class="item-content">';
                    var ratings = element.find('.ratings').html();

                    html += ' <div class="rating"><div class="ratings">' + ratings + '</div></div>';

                    var descriptions = element.find('.desc').html();
                    html += '<div class="desc std">' + descriptions + '</div>';


                    if (price != null) {
                        html += '<div classs="item-price"><div class="price-box"> <span class="regular-price"> <span class="price">' + price + '</span></span></div></div>';
                    }
                    html += '';

                    html += '<div class="actions">' + element.find('.actions').html() + '</div>';
                   
                    html += '</div></div></div></div>';

                    element.html(html);
                });

                jQuery.cookie('display', 'grid');
            }
        }

        jQuery('a.list-trigger').click(function () {
            jQuery.display('list');

        });
        jQuery('a.grid-trigger').click(function () {
            jQuery.display('grid');
        });

        var view = 'grid';
        view = jQuery.cookie('display') !== undefined ? jQuery.cookie('display') : view;

        if (view) {
            jQuery.display(view);

        } else {
            jQuery.display('grid');
        }
        return false;


    });
    //--></script>
<?php
/**
 * woocommerce_before_main_content hook
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */

?>
<?php

$category_image_section = '';

switch ($mgkOptions['theme-layout']) {

    case 'default':
    case 'fabiaboxed':
    case 'fabiabrown':


        do_action('woocommerce_before_main_content');
        $category_image_section = "<div class=\"category-description std\">
                                                <div class=\"slider-items-products\">
                                                  <div id=\"category-desc-slider\" class=\"product-flexslider hidden-buttons\">
                                                    <div class=\"slider-items slider-width-col1\">                  
                                                    
                                                      <div class=\"item\">";
        ob_start();
        do_action('woocommerce_archive_description');
        $category_image_section .= ob_get_clean();
        $category_image_section .= "
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
											";


        break;

    case 'fabiafull':


        $category_image_section = '<div class="category-description std">
																<div class="container">
																<div id="category-desc-slider" class="product-flexslider hidden-buttons">
																<div class="slider-items slider-width-col1 owl-carousel owl-theme"> 
												
	                                                     <div class="item">';
        ob_start();
        do_action('woocommerce_archive_description');
        $category_image_section .= ob_get_clean();
        $category_image_section .= '
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
										
											';
        break;


    case 'fabiablack':
    case 'fabiaonepage':
    case 'fabialeft':
    case 'fabiaopen':

        do_action('woocommerce_before_main_content');


        $category_image_section = "<div class=\"category-description std\">
                                                <div class=\"slider-items-products\">
                                                  <div id=\"category-desc-slider\" class=\"product-flexslider hidden-buttons\">
                                                     <div class=\"slider-items slider-width-col1 owl-carousel owl-theme\">                  
                                                    
                                                      <div class=\"item\">";
        ob_start();
        do_action('woocommerce_archive_description');
        $category_image_section .= ob_get_clean();
        $category_image_section .= "
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
											";
        break;


    default:
        do_action('woocommerce_before_main_content');
        $category_image_section = "<div class=\"category-description std\">
                                                <div class=\"slider-items-products\">
                                                  <div id=\"category-desc-slider\" class=\"product-flexslider hidden-buttons\">
                                                    <div class=\"slider-items slider-width-col1\">                  
                                                    
                                                      <div class=\"item\">";
        ob_start();
        do_action('woocommerce_archive_description');
        $category_image_section .= ob_get_clean();
        $category_image_section .= "
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
											";


        break;

}

?>
<section class="main-container col2-left-layout bounceInUp animated">
    <?php


    if (($mgkOptions['theme-layout'] != 'fabiablack') && ($mgkOptions['theme-layout'] != 'fabiaonepage') && ($mgkOptions['theme-layout'] != 'fabialeft') && ($mgkOptions['theme-layout'] != 'fabiaopen')) {

        echo htmlspecialchars_decode($category_image_section);

    }

    ?>

    <div class="main container">
        <div class="row">
            <section class="col-main col-sm-9 col-sm-push-3 wow bounceInUp animated">
                <?php if (($mgkOptions['theme-layout'] == 'fabiablack') || ($mgkOptions['theme-layout'] == 'fabiaonepage') || ($mgkOptions['theme-layout'] == 'fabialeft') || ($mgkOptions['theme-layout'] == 'fabiaopen')) {

                    echo htmlspecialchars_decode($category_image_section);

                }

                ?>
                <?php if ( $mgkOptions['theme-layout'] != 'fabiaonepage') {
                    ?>
                    <div class="category-title">
                        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
                            <h1>
                                aaa<?php woocommerce_page_title(); ?>
                            </h1>
                        <?php endif; ?>
                    </div>
                <?php } ?>
                <?php if (have_posts()) : ?>
                <div class="toolbar">
                    <?php
                    /**
                     * woocommerce_before_shop_loop hook
                     *
                     * @hooked woocommerce_result_count - 20
                     * @hooked woocommerce_catalog_ordering - 30
                     */
                    do_action('woocommerce_before_shop_loop');
                    ?>
                </div>
                <div class="category-products">
                    <?php woocommerce_product_loop_start(); ?>
                    <?php woocommerce_product_subcategories(); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php wc_get_template_part('content', 'product'); ?>
                    <?php endwhile; // end of the loop. ?>
                    <?php woocommerce_product_loop_end(); ?>
                    <?php
                    /**
                     * woocommerce_after_shop_loop hook
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action('woocommerce_after_shop_loop');
                    ?>
                   
                </div>
                 <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>
                        <?php wc_get_template('loop/no-products-found.php'); ?>
                    <?php
                    endif;
                    ?>
            </section>
            <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow bounceInUp animated">
                <?php
                /**
                 * woocommerce_sidebar hook
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                do_action('woocommerce_sidebar');
                ?>
               
            </aside>
        </div>
    </div>
</section>
<?php
/**
 * woocommerce_after_main_content hook
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
?>

<?php get_footer('shop'); ?>

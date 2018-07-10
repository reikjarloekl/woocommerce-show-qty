<?php

/*
Plugin Name: Woocommerce - Show product quantity shortcode
Plugin URI: https://github.com/reikjarloekl/woocommerce-show-qty
Description: Wordpress plugin for Woocommerce adding a shortcode to show the remaining quantity for a single product
Version: 1.0
Author: Joern Bungartz
Author URI: http://bungartz.name
License: GPL v3
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Adds shortcode to show remaining product quantity for a single product.
// Code taken from http://hsrtech.com/snippets/product-quantity-shortcode-woocommerce/
// Example: [show_qty id="100"]
function show_qty_func( $atts ) {
    $p = shortcode_atts( array(
        'id' => 0
    ), $atts );
 
    $_pf = new WC_Product_Factory();
    $_product = $_pf->get_product($p['id']);
 
    // from here $_product will be a fully functional WC Product object,
    // you can use all functions as listed in their api: 
    // http://docs.woothemes.com/wc-apidocs/class-WC_Product.html
 
    return $_product->get_stock_quantity();
}

add_shortcode( 'show_qty', 'show_qty_func' );

?>
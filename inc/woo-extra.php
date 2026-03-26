<?php
// Remove 'product-category' from URLs
add_filter('term_link', function ($url, $term, $taxonomy) {
    if ($taxonomy === 'product_cat') {
        $url = str_replace('/product-category', '', $url);
    }
    return $url;
}, 10, 3);

// Remove default base
add_filter('woocommerce_register_taxonomy_product_cat', function($args){
    $args['rewrite']['slug'] = '';
    $args['rewrite']['with_front'] = false;
    return $args;
}, 10);

// Flush rewrite rules on activation
add_action('after_switch_theme', function () {
    flush_rewrite_rules();
});
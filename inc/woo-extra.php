<?php


add_filter('term_link', function($url, $term, $taxonomy){
    if ($taxonomy === 'product_cat') {
        // Remove 'product-category' from URL
        $url = str_replace('/product-category/', '/', $url);
    }
    return $url;
}, 10, 3);

// Add rewrite rules safely
add_action('init', function() {
    global $wp_rewrite;
    $wp_rewrite->extra_permastructs['product_cat']['struct'] = '/product-category/%product_cat%'; // Keep base internally
}, 20);
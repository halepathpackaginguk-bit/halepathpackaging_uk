<?php


add_action('init', 'remove_product_category_base');
function remove_product_category_base() {
    global $wp_rewrite;

    // Remove product-category base
    $wp_rewrite->extra_permastructs['product_cat']['struct'] = '/%product_cat%';

    // Flush rewrite rules (do once!)
    flush_rewrite_rules(); // Uncomment only once to flush
}
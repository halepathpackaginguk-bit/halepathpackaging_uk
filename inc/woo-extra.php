<?php

// Remove 'product-category' base from URLs
add_filter('term_link', function ($url, $term, $taxonomy) {
    if ($taxonomy === 'product_cat') {
        $url = str_replace('/product-category', '', $url);
    }
    return $url;
}, 10, 3);

// Add rewrite rules for all product categories recursively
add_action('init', function () {
    $terms = get_terms([
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
    ]);

    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $slug_path = get_term_parents_slug($term);

            // Only add rewrite if no page exists with same path
            if (!get_page_by_path($slug_path)) {
                add_rewrite_rule(
                    '^' . $slug_path . '/?$',
                    'index.php?product_cat=' . $term->slug,
                    'top'
                );
            }
        }
    }
}, 20);

// Helper: get parent slugs recursively
function get_term_parents_slug($term, $slug = '') {
    if ($term->parent) {
        $parent = get_term($term->parent, 'product_cat');
        $slug = get_term_parents_slug($parent, $slug);
    }
    if ($slug) {
        $slug .= '/' . $term->slug;
    } else {
        $slug = $term->slug;
    }
    return $slug;
}

// Flush rewrite rules on theme activation
add_action('after_switch_theme', function () {
    flush_rewrite_rules();
});
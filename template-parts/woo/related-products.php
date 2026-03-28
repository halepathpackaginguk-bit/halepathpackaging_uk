<?php
global $product;

if (!$product) return;

// Get current product categories
$terms = wp_get_post_terms($product->get_id(), 'product_cat');

if (!empty($terms)) {

    $term_ids = wp_list_pluck($terms, 'term_id');

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 4,
        'post__not_in'   => array($product->get_id()),
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'id',
                'terms'    => $term_ids,
            ),
        ),
    );

    $related_products = new WP_Query($args);

    if ($related_products->have_posts()) :

        echo '<div class="mt-10">';
        echo '<h2 class="text-xl font-bold mb-4">Related Products</h2>';
        echo '<div class="grid grid-cols-2 md:grid-cols-4 gap-4">';

        while ($related_products->have_posts()) : $related_products->the_post();

            // Pass product ID to template part
            set_query_var('product_id', get_the_ID());
            get_template_part('template-parts/product/card');

        endwhile;

        echo '</div>';
        echo '</div>';

    endif;

    wp_reset_postdata();
}
?>
<?php
global $product;

$terms = wp_get_post_terms($product->get_id(), 'product_cat');

if (!empty($terms)) {
    $term_ids = wp_list_pluck($terms, 'term_id');

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 4,
        'post__not_in' => array($product->get_id()),
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $term_ids,
            ),
        ),
    );

    $related_products = new WP_Query($args);

    if ($related_products->have_posts()) :
        echo '<div class="grid grid-cols-2 md:grid-cols-4 gap-4">';
        
        while ($related_products->have_posts()) : $related_products->the_post();
            global $product;
            ?>
            <div class="border p-3 rounded-lg">
                <a href="<?php the_permalink(); ?>">
                    <?php echo woocommerce_get_product_thumbnail(); ?>
                    <h3 class="text-sm font-semibold mt-2"><?php the_title(); ?></h3>
                    <span class="text-green-600"><?php echo $product->get_price_html(); ?></span>
                </a>
            </div>
            <?php
        endwhile;

        echo '</div>';
    endif;

    wp_reset_postdata();
}
?>
<?php
$slidesToShow = 4;
$direction = 'left';

// Get WooCommerce product category
$category = get_term_by(
    'slug',
    'gifts-celebrations',
    'product_cat'
);

// Get category title and description
$category_title = $category ? $category->name : 'Gifts & Celebrations';
$category_description = $category ? $category->description : '';

// Query products from this category
$args = [
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => 8,
    'tax_query' => [
        [
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => 'gifts-celebrations',
        ],
    ],
];

$products_query = new WP_Query($args);
?>

<section class="py-12">
    <div class="hale_container flex md:flex-row flex-col gap-5 justify-between items-center">
        <div>
            <h6 class="sub_title">
                Our Products
                <div class="sub_title_line"></div>
            </h6>

            <h2 class="h2 md:!text-left text-center !mb-2">
                <?php echo esc_html($category_title); ?>
            </h2>

            <?php if (!empty($category_description)): ?>
                <div class="mb-4 text-sm">
                    <?php
                    echo esc_html(
                        wp_strip_all_tags($category_description, true)
                    );
                    ?>
                </div>
            <?php endif; ?>
            <div>
                <a href="<?php echo esc_url(get_term_link('gifts-celebrations', 'product_cat')); ?>"
                    class="btn_secondry flex items-center gap-2 sm:mt-12 mt-6 w-fit mx-auto">
                    See All <?php echo esc_html($category_title); ?>
                </a>
            </div>
        </div>

        <?php if ($products_query->have_posts()): ?>
            <div class="product-slider" data-direction="<?php echo esc_attr($direction); ?>"
                data-slides="<?php echo esc_attr($slidesToShow); ?>">
                <?php while ($products_query->have_posts()):
                    $products_query->the_post();

                    $product = wc_get_product(get_the_ID());

                    if (!$product) {
                        continue;
                    }

                    $image_id = $product->get_image_id();
                    $image_url = $image_id
                        ? wp_get_attachment_image_url($image_id, 'large')
                        : wc_placeholder_img_src();
                    ?>

                    <div class="p-3">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
                                class="rounded-full img-full" loading="lazy" decoding="async">
                        </a>

                        <a href="<?php the_permalink(); ?>" class="box_link">
                            <?php the_title(); ?>
                        </a>
                    </div>

                <?php endwhile; ?>
            </div>

            <?php wp_reset_postdata(); ?>

        <?php else: ?>

            <p class="mt-6 text-center">
                No products found in this category.
            </p>

        <?php endif; ?>
</section>
<!-- Product Slider end -->
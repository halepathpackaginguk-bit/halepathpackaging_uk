<?php
$products = get_field('gift_products'); // relationship field -> array of posts/IDs

// Build a query from the relationship field
$products_query = new WP_Query([
    'post_type'      => 'product',
    'post__in'       => $products ? $products : [0], // force empty if none
    'posts_per_page' => -1,
    'orderby'        => 'post__in', // keep ACF relationship order
    'post_status'    => 'publish',
]);

$category_title = 'Gifts Celebrations';
?>

<section class="py-12">
    <div class="hale_container">
        <div class="flex md:flex-row flex-col gap-5 justify-between items-center">
            <div>
                <h2 class="h2 md:!text-left text-center !mb-2">
                    Gifts Celebrations Boxes
                </h2>
                <div class="mb-4 text-sm leading-6 text-txt_Clr md:text-base max-w-2xl">
                    Make Every Celebration Unforgettable
                    From Halloween and Black Friday to Christmas, Easter, and New Year, your customers deserve an
                    unboxing worth sharing. Get your seasonal boxes & bespoke packaging ready before the rush.
                </div>
            </div>
            <div>
                <a href="#"
                    class="btn_secondry flex items-center gap-2 sm:mt-12 mt-6 w-fit mx-auto">
                    See All 
                </a>
            </div>
        </div>

        <?php if ($products_query->have_posts()): ?>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 mt-8">
            <?php while ($products_query->have_posts()): $products_query->the_post();
                $product = wc_get_product(get_the_ID());
                if (!$product) continue;

                $image_id  = $product->get_image_id();
                $image_url = $image_id
                    ? wp_get_attachment_image_url($image_id, '')
                    : wc_placeholder_img_src();
            ?>
            <div class="p-3">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url($image_url); ?>"
                         alt="<?php echo esc_attr(get_the_title()); ?>"
                         class="rounded-full sm:h-[220px] lg:h-[250px]" loading="lazy" decoding="async">
                </a>
                <a href="<?php the_permalink(); ?>" class="box_link">
                    <?php the_title(); ?>
                </a>
            </div>
            <?php endwhile; ?>
        </div>

        <?php wp_reset_postdata(); ?>

        <?php else: ?>
            <p class="mt-6 text-center">No products found.</p>
        <?php endif; ?>
    </div>
</section>
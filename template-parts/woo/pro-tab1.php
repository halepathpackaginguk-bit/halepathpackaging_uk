<section class="my-10">
    <div class="hale_container md:flex items-center gap-5 md:gap-10 flex-row-reverse">

        <?php $product_extra_info = get_field('product_extra_info');

        $product_info_box1_title = $product_extra_info['info_box']['title'];
        $product_info_box1_description = $product_extra_info['info_box']['description'];
        $product_info_box1_image = $product_extra_info['info_box']['image'];

        $product_info_box2_title = $product_extra_info['info_box2']['title'];
        $product_info_box2_description = $product_extra_info['info_box2']['description'];
        $product_info_box2_image = $product_extra_info['info_box2']['image'];

      

       


        ?>

        <figure class="md:w-1/2">
            <img alt="Why Us Image" src="<?php echo esc_url($product_info_box1_image); ?>" height="auto" width="100%"
                class="rounded-2xl">
        </figure>
        <div class="flex md:w-1/2 justify-center md:justify-start items-center md:items-start flex-col">
            <h4 class="text-[#111827] mt-5 md:mt-0 font-bold text-3xl text-center md:text-left mb-4">
                <?php echo $product_info_box1_title; ?>
            </h4>
            <p class="mb-7 text-center md:text-left"><?php echo $product_info_box1_description; ?>
            </p>
            <a class="py-[9px] px-[41px] text-white bg-[#1C2E42] rounded-md" href="/get-quote-now">Get Custom Quote</a>
        </div>
    </div>
</section>

<section class="my-10">
    <div class="hale_container md:flex items-center gap-5 md:gap-10 flex-row">

        <figure class="md:w-1/2">
            <img alt="Why Us Image" src="<?php echo esc_url($product_info_box2_image); ?>" height="auto" width="100%"
                class="rounded-2xl">
        </figure>
        <div class="flex md:w-1/2 justify-center md:justify-start items-center md:items-start flex-col">
            <h4 class="text-[#111827] mt-5 md:mt-0 font-bold text-3xl text-center md:text-left mb-4">
                <?php echo $product_info_box2_title; ?>
            </h4>
            <p class="mb-7 text-center md:text-left"><?php echo $product_info_box2_description; ?>
            </p>
            <a class="py-[9px] px-[41px] text-white bg-[#1C2E42] rounded-md" href="/get-quote-now">Get Custom Quote</a>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/woo/pro-reviews'); ?>

<?php get_template_part('template-parts/woo/product-faq'); ?>

<section class="py-16 overflow-hidden">
    <div class="hale_container">
        <h2 class="md:text-[51px] md:leading-normal text-3xl font-bold text-title_Clr text-center mb-4">
            Related Products
        </h2>
    </div>

    <?php
    global $product;

    if (!$product)
        return;

    // Get related product IDs
    $related_ids = wc_get_related_products($product->get_id(), 10);

    if ($related_ids):

        $args = [
            'post_type' => 'product',
            'post__in' => $related_ids,
            'posts_per_page' => 10,
            'orderby' => 'post__in'
        ];

        $related_query = new WP_Query($args);
        ?>

    <div class="slider-center">
        <?php while ($related_query->have_posts()):
                $related_query->the_post();
                global $product; ?>

        <div>
            <a href="<?php the_permalink(); ?>" class="block">
                <div class="w-full ">
                    <?php echo woocommerce_get_product_thumbnail('medium', [
                                'class' => 'maskimage img-full'
                            ]); ?>
                </div>
            </a>

            <h4 class="text-xl text-center mt-6">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h4>
        </div>

        <?php endwhile;
            wp_reset_postdata(); ?>
    </div>

    <?php endif; ?>
</section>

<script>
jQuery(document).ready(function($) {
    $('.slider-center').slick({
        centerMode: true,
        slidesToShow: 5,
        speed: 500,
        infinite: true,
        arrows: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    infinite: false
                }
            },
            {
                breakpoint: 700,
                settings: {
                    slidesToShow: 2,
                    infinite: false
                }
            },
            {
                breakpoint: 400,
                settings: {
                    slidesToShow: 1,
                    infinite: false
                }
            }
        ]
    });
});
</script>
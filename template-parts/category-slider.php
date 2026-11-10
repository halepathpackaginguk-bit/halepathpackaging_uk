<?php
$categories = get_field('latest_categories');
$slidesToShow = 4;

if (!empty($categories) && is_array($categories)):

    // Display only 12 selected categories
    $categories = array_slice($categories, 0, 12);
    ?>

    <section class="py-10 sm:px-6 lg:py-14">
        <div class="container mx-auto px-4">

            <!-- Section Heading -->
            <div class="mb-7 text-center">
                <h2 class="text-2xl font-bold leading-tight text-title_Clr sm:text-3xl">
                    Your Entire Custom Packaging Solutions Under One Roof
                </h2>

                <p class="mt-2 text-sm leading-6 text-txt_Clr md:text-base">
                    Explore packaging options that suit your products and business needs. All our boxes are made in the UK
                    from certified eco materials. From design to delivery, we manufacture premium custom boxes, labels, and
                    eco-friendly packaging tailored to your brand. Get high-quality materials and fast packaging suppliers.
                </p>
            </div>

            <!-- Product Categories Slider -->
            <div class="px-8 sm:px-10">
                <div class="category-slider" data-slides="<?php echo esc_attr($slidesToShow); ?>">

                    <?php foreach ($categories as $category): ?>

                        <?php
                        // Support ACF fields returning either term objects or term IDs
                        if (is_numeric($category)) {
                            $category = get_term((int) $category, 'product_cat');
                        }

                        if (!$category || is_wp_error($category) || !isset($category->term_id)) {
                            continue;
                        }
                        $category_id = $category->term_id;
                        $category_title = $category->name;
                        // WooCommerce category image
                        $thumbnail_id = get_term_meta(
                            $category_id,
                            'thumbnail_id',
                            true
                        );
                        $category_image = $thumbnail_id
                            ? wp_get_attachment_image_url($thumbnail_id, 'large')
                            : get_template_directory_uri() . '/assets/images/category.jpg';

                        // Category URL
                        $category_url = get_term_link($category);
                        if (is_wp_error($category_url)) {
                            continue;
                        }
                        ?>
                        <div class="px-2">
                            <article
                                class="group h-full overflow-hidden rounded-xl border border-secondary/20 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md">
                                <!-- Product Image -->
                                <a href="<?php echo esc_url($category_url); ?>"
                                    class="relative block h-[125px] overflow-hidden bg-secondary/10 sm:h-[220px] lg:h-[250px]"
                                    aria-label="<?php echo esc_attr($category_title); ?>">
                                    <img src="<?php echo esc_url($category_image); ?>"
                                        alt="<?php echo esc_attr($category_title); ?>"
                                        loading="lazy"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                                </a>
                                <!-- Product Details -->
                                <div class="p-3 sm:p-4">
                                    <div class="text-sm text-amber-300">★★★★★ <span class="text-txt_Clr">4.8 (150)</span></div>
                                    <!-- Title -->
                                    <h3 class="my-1 text-base font-bold leading-snug text-title_Clr sm:text-lg">
                                        <a href="<?php echo esc_url($category_url); ?>" class="transition hover:text-primary">
                                            <?php echo esc_html($category_title); ?>
                                        </a>
                                    </h3>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <script>
        jQuery(document).ready(function ($) {
            $('.category-slider:not(.slick-initialized)').each(function () {
                const slides = $(this).data('slides') || 4;
                $(this).slick({
                    arrows: true,
                    dots: false,
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 4000,
                    speed: 600,
                    cssEase: 'ease',
                    pauseOnHover: true,
                    swipeToSlide: true,
                    draggable: true,
                    slidesToShow: slides,
                    slidesToScroll: 1,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1
                            }
                        }
                    ]
                });
            });
        });
    </script>
<?php endif; ?>

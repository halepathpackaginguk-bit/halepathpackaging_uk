<?php
$categories = get_field('latest_categories');

if (!empty($categories) && is_array($categories)):
    ?>
    <div class="slider-container category-slider">

        <?php foreach ($categories as $category):

            // Resolve category IDs into term objects.
            if (is_numeric($category)) {
                $category = get_term((int) $category, 'product_cat');
            }

            // Skip invalid terms.
            if (
                !($category instanceof WP_Term) ||
                is_wp_error($category)
            ) {
                continue;
            }

            // Get the category URL.
            $category_link = get_term_link($category);

            if (is_wp_error($category_link)) {
                continue;
            }

            // Remove this only if your custom permalink structure supports it.
            $category_link = str_replace(
                '/product-category/',
                '/',
                $category_link
            );

            // Get category thumbnail ID.
            $thumbnail_id = (int) get_term_meta(
                $category->term_id,
                'thumbnail_id',
                true
            );

            ?>
            <div class="w-full p-2 flex flex-col" style="min-height: clamp(220px, 30vw, 320px);">

                <a href="<?php echo esc_url($category_link); ?>" class="block overflow-hidden rounded-full shrink-0"
                    style="height: clamp(130px, 18vw, 250px);" aria-label="<?php echo esc_attr(
                        sprintf('View %s products', $category->name)
                    ); ?>">
                    <?php
                    if ($thumbnail_id) {
                        echo wp_get_attachment_image(
                            $thumbnail_id,
                            'woocommerce_thumbnail',
                            false,
                            [
                                'alt' => $category->name,
                                'class' => 'cat_image img-full block w-full h-full object-cover',
                                'loading' => 'lazy',
                                'decoding' => 'async',
                            ]
                        );
                    } else {
                        ?>
                        <img src="<?php echo esc_url(
                            get_template_directory_uri()
                            . '/assets/images/category.jpg'
                        ); ?>" alt="<?php echo esc_attr($category->name); ?>"
                            class="cat_image img-full block w-full h-full object-cover" loading="lazy" decoding="async">
                        <?php
                    }
                    ?>
                </a>

                <a href="<?php echo esc_url($category_link); ?>"
                    class="box_link block mt-auto pt-6 max-w-full overflow-hidden text-ellipsis whitespace-nowrap"
                    title="<?php echo esc_attr($category->name); ?>">
                    <?php echo esc_html($category->name); ?>
                </a>

            </div>
        <?php endforeach; ?>

    </div>
<?php endif; ?>


<script>

    jQuery(function ($) {
        $('.category-slider').each(function () {
            const $slider = $(this);

            // Avoid initializing Slick more than once.
            if ($slider.hasClass('slick-initialized')) {
                return;
            }

            $slider.slick({
                dots: false,
                arrows: false,
                infinite: true,

                slidesToShow: 4,
                slidesToScroll: 1,

                autoplay: true,
                autoplaySpeed: 0,
                speed: 12000,
                cssEase: 'linear',

                pauseOnHover: true,
                pauseOnFocus: true,
                swipeToSlide: true,
                draggable: true,
                accessibility: true,

                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    });

</script>
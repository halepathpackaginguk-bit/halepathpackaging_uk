<?php
$categories = get_field('latest_categories');
if (!empty($categories)):
    ?>
    <div class="slider-container category-slider">
        <?php foreach ($categories as $category):
            // If ACF returns ID convert it to term object
            if (is_numeric($category)) {
                $category = get_term($category, 'product_cat');
            }
            if (!$category || is_wp_error($category)) {
                continue;
            }

            // Get clean category link (without product-category)
            $category_link = get_term_link($category);
            if (!is_wp_error($category_link)) {
                // Force remove '/product-category/' from URL
                $category_link = str_replace('/product-category/', '/', $category_link);
            }

            // Get category image
            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
            $image_url = $thumbnail_id
                ? wp_get_attachment_url($thumbnail_id)
                : get_template_directory_uri() . '/assets/images/category.jpg';
            ?>
            <div class="w-full p-2">
                <a href="<?php echo esc_url($category_link); ?>">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>" width="363"
                        height="375" class="cat_image img-full" loading="lazy" />
                </a>
                <a href="<?php echo esc_url($category_link); ?>" class="box_link">
                    <?php echo esc_html($category->name); ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<script>
    jQuery(document).ready(function ($) {
        $('.category-slider').slick({
            dots: false,
            arrows: false,
            infinite: true,
            slidesToShow: 4,  // <-- Changed here
            autoplay: true,
            speed: 12000,
            cssEase: 'linear',
            pauseOnHover: true,
            swipeToSlide: true,
            draggable: true,

            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
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
</script>
<?php
$direction = $args['direction'] ?? 'ltr';
$slidesToShow = $args['slidesToShow'] ?? 5;
$products = $args['products'] ?? [];
?>

<?php if (!empty($products)): ?>
    <div class="product-slider" data-direction="<?php echo esc_attr($direction); ?>"
        data-slides="<?php echo esc_attr($slidesToShow); ?>">
        <?php foreach ($products as $post):
            setup_postdata($post);
            global $product;
            if (!$product)
                continue;
            $image_id = $product->get_image_id();
            $image_url = $image_id
                ? wp_get_attachment_image_url($image_id, 'large')
                : wc_placeholder_img_src();
            ?>
            <div class="p-3">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>"
                        class="maskimage img-full" loading="lazy" decoding="async">
                </a>
                <a href="<?php the_permalink(); ?>" class="box_link">
                    <?php the_title(); ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php wp_reset_postdata(); ?>

<?php endif; ?>

<script>
    jQuery(document).ready(function ($) {
        $('.product-slider').each(function () {
            const slides = $(this).data('slides') || 4;
            const direction = $(this).data('direction') || 'ltr';
            $(this).slick({
                arrows: false,
                dots: false,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 0,
                speed: 12000,
                cssEase: 'linear',
                pauseOnHover: true,
                swipeToSlide: true,
                draggable: true,
                slidesToShow: slides,
                slidesToScroll: 1,
                rtl: direction === 'rtl',
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
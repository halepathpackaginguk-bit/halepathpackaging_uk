<?php
$testimonials = new WP_Query([
    'post_type' => 'testimonial',
    'posts_per_page' => -1,
    'post_status' => 'publish'
]);
?>

<section class="pb-[60px]">
    <div class="hale_container flex md:flex-row flex-col gap-6">
        <!-- Rating Summary -->
        <div
            class="py-10 md:w-1/4 w-full bg-secondary text-center space-y-0.5 flex flex-col justify-center items-center">
            <h3 class="text-xl font-semibold text-white">Excellent</h3>
            <ul class="flex gap-1 justify-center items-center text-sm">
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <li class="text-[#FFAE00]"><i class="fa-solid fa-star"></i></li>
                <?php endfor; ?>
            </ul>
            <div class="flex md:flex-col flex-row justify-center sm:gap-0 gap-0.5">
                <p class="text-sm font-normal text-white">4.82 average </p>
                <p class="text-sm font-normal text-white">2,634 reviews</p>
            </div>
        </div>

        <!-- Testimonials Slider -->
        <div class="md:w-3/4 w-full relative px-5">
            <div class="testimonials-slider">
                <?php if ($testimonials->have_posts()): ?>
                    <?php while ($testimonials->have_posts()):
                        $testimonials->the_post();

                        $customer_type = get_field('customer_type');
                        $incentivized = get_field('incentivized');
                        $address = get_field('address');
                        $rating = get_field('rating');
                        ?>

                        <div class="px-2 w-full h-full">
                            <div class="w-full bg-white p-4 border shadow border-black/15 h-full flex flex-col justify-between">
                                <div class="w-full">
                                    <div class="flex items-center gap-2 mb-1">
                                        <h3 class="text-base font-normal text-title_Clr">
                                            <?php the_title(); ?>
                                        </h3>
                                        <ul class="flex gap-1 text-xs">
                                            <?php
                                            $fullStars = floor($rating);
                                            $halfStar = ($rating - $fullStars) >= 0.5;
                                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);

                                            for ($i = 0; $i < $fullStars; $i++) {
                                                echo '<li class="text-[#FFAE00]"><i class="fa-solid fa-star"></i></li>';
                                            }

                                            if ($halfStar) {
                                                echo '<li class="text-[#FFAE00]"><i class="fa-solid fa-star-half-stroke"></i></li>';
                                            }

                                            for ($i = 0; $i < $emptyStars; $i++) {
                                                echo '<li class="text-[#FFAE00]/50"><i class="fa-regular fa-star"></i></li>';
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                    <p class="text-base font-normal text-title_Clr mb-1">
                                        <i class="fa-solid fa-circle-check text-sm text-[#FFAE00]"></i>
                                        <?php echo esc_html($customer_type); ?>
                                    </p>
                                    <p class="text-base font-normal text-title_Clr italic mb-5">
                                        <?php the_content(); ?>
                                    </p>
                                    <p class="text-base font-normal text-title_Clr mb-5">
                                        <i class="fa-solid fa-circle-check text-sm text-[#FFAE00]"></i>
                                        <?php echo esc_html($incentivized); ?>
                                    </p>
                                    <p class="text-sm font-normal text-title_Clr">
                                        <?php echo esc_html($address); ?>
                                    </p>

                                </div>

                            </div>
                        </div>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
            <!-- arrows buttons -->
            <button class="prev hover:text-[#47AFC3] absolute top-1/2 -translate-y-1/2 left-0">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button class="next hover:text-[#47AFC3] absolute top-1/2 -translate-y-1/2 right-0">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function ($) {
        $('.testimonials-slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
            dots: false,
            infinite: true,
            adaptiveHeight: true,
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
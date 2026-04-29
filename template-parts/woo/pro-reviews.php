<?php 
$testimonials = new WP_Query([
    'post_type' => 'testimonial',
    'posts_per_page' => 10,
    'post_status' => 'publish'
]); 
?>

<section>
    <div>
        <div class="hale_container mx-auto flex md:flex-row flex-col gap-5 items-center">

            <div class="md:w-1/3 w-full">
                <h6 class="text-[#1C2E42] font-semibold flex gap-2 items-center">
                    Testimonials
                    <div class="sub_title_line"></div>
                </h6>
                <h2 class="h2 !text-left">
                    What Customers Says
                    <span class="text-[#47AFC3]">About Us</span>
                </h2>
            </div>

            <div class="md:w-2/3 w-full">
                <div class="pro_testi_slider">

                <?php if ($testimonials->have_posts()): ?>
                    <?php while ($testimonials->have_posts()): 
                        $testimonials->the_post();

                        $customer_type = get_field('customer_type');
                        $incentivized = get_field('incentivized');
                        $address = get_field('address');
                        $rating = get_field('rating') ?: 0; // fallback
                    ?>

                    <div>
                        <div class="testi_box">
                            <div class="testi_inner">

                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about-page/qoute-icon.png'); ?>" 
                                     alt="Quote Icon" class="w-[66px] h-[54px]">

                                <div class="mt-4 max-h-[150px] overflow-y-auto" >
                                    <?php the_content(); ?>
                                </div>

                                <!-- Stars -->
                                <div class="mt-2 flex gap-1">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <span class="<?php echo ($i <= $rating) ? 'text-[#FFAE00]' : 'text-gray-300'; ?>">
                                            ★
                                        </span>
                                    <?php endfor; ?>
                                </div>

                                <div class="mt-5 flex gap-2 items-center">
                                    <figure class="testi_img">
                                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about-page/user.jpg'); ?>" 
                                             alt="User" class="rounded-full w-[49px] h-[49px]">
                                    </figure>

                                    <div>
                                        <h6 class="testi_title">
                                            <?php the_title(); ?>
                                            <?php if ($customer_type): ?>
                                                <span class="text-sm text-gray-500">
                                                    (<?php echo esc_html($customer_type); ?>)
                                                </span>
                                            <?php endif; ?>
                                        </h6>

                                        <?php if ($address): ?>
                                            <p class="text-[#1C1C1CE8]">
                                                <?php echo esc_html($address); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

                </div>

                <!-- Arrows -->
                <div class="flex justify-center gap-4 text-3xl mt-4">
                    <button class="testi-prev hover:text-[#47AFC3]">&#8592;</button>
                    <button class="testi-next hover:text-[#47AFC3]">&#8594;</button>
                </div>

            </div>
        </div>
    </div>
</section>

<script>

    jQuery(document).ready(function ($) {
    $('.pro_testi_slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: $('.testi-prev'),
        nextArrow: $('.testi-next'),
        dots: false,
        infinite: true,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: { slidesToShow: 2 }
            },
            {
                breakpoint: 768,
                settings: { slidesToShow: 1 }
            },
            {
                breakpoint: 480,
                settings: { slidesToShow: 1 }
            }
        ]
    });
});
</script>
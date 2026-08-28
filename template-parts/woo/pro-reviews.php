<?php 
$testimonials = new WP_Query([
    'post_type' => 'testimonial',
    'posts_per_page' => 3,
    'post_status' => 'publish'
]); 
?>





<section class="py-16 bg-[#F8F5F0]">
    <div class="container mx-auto px-4">

        <div class="flex items-center justify-between mb-10">

            <div>
                <span class="text-secondary uppercase tracking-[4px] text-sm font-semibold">
                    Loved by 500+ brands worldwide
                </span>

                <h2 class="text-4xl font-bold text-coff_black mt-2">
                    Customer Stories
                </h2>
            </div>

            <a href="#"
                class="border border-secondary text-secondary hover:bg-secondary hover:text-white transition-all duration-300 rounded-full px-7 py-3 font-medium">
                View All Stories
            </a>

        </div>

        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">

            <?php if ($testimonials->have_posts()): ?>
            <?php while ($testimonials->have_posts()): 
                        $testimonials->the_post();

                        $customer_type = get_field('customer_type');
                        $incentivized = get_field('incentivized');
                        $address = get_field('address');
                        $rating = get_field('rating') ?: 0; // fallback
                    ?>



            <article class="group bg-white overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300">

                <div class="overflow-hidden">
                    <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full', array(
                            'class' => 'w-full h-60 object-cover group-hover:scale-110 transition duration-500',
                            'alt' => get_the_title()
                        )); ?>
                    <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about-page/qoute-icon.png'); ?>"
                        class="w-full h-60 object-cover group-hover:scale-110 transition duration-500"
                        alt="<?php esc_attr_e('Default Image', 'textdomain'); ?>">
                    <?php endif; ?>
                </div>

                <div class="p-6">
                    <ul class="flex gap-1 items-center text-sm">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                        <li class="text-[#FFAE00]"><i class="fa-solid fa-star"></i></li>
                        <?php endfor; ?>
                    </ul>


                    <h3 class="text-lg font-semibold text-coff_black mb-3 group-hover:text-secondary transition">

                        <?php the_title()?>

                    </h3>

                    <p class="text-gray-600 leading-7 mb-6">

                        <?php the_content()?>
                    </p>
                </div>

            </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>



        </div>

    </div>
</section>
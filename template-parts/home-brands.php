<section class="overflow-hidden py-5 bg-[#f5f5f5]">
    <div class="mx-auto w-full container px-4">
        <div class="brand-slider">
            <?php
            $brands_query = new WP_Query([
                'post_type'      => 'brands', // your CPT slug
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ]);

            if ($brands_query->have_posts()):
                while ($brands_query->have_posts()): $brands_query->the_post();
                    $image_id  = get_post_thumbnail_id(get_the_ID());
                    $image_url = $image_id
                        ? wp_get_attachment_image_url($image_id, 'medium')
                        : '';
                    ?>
            <div class="px-2.5">
                <div class="flex h-[66px] items-center justify-center">
                    <?php if ($image_url): ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
                            class="block max-h-[44px] w-full max-w-[150px] object-contain" loading="lazy"
                            decoding="async">
                    </a>
                    <?php else: ?>
                    <a href="<?php the_permalink(); ?>" class="text-sm font-semibold text-gray-600">
                        <?php the_title(); ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile;
                wp_reset_postdata();
            else: ?>
            <p class="text-center text-sm text-gray-500">No brands found.</p>
            <?php endif; ?>

        </div>
    </div>
</section>
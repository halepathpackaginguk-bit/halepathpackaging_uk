<?php
/** Template Name: All Categories */
get_header();

$category_id = get_field('productbycategory');




?>


<section class="">
    <section
        class="py-16 sm:h-[350px] h-[260px] flex items-center justify-center bg-cover bg-no-repeat bg-center bg-black/50 bg-blend-overlay"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/about-page/s2.webp'">
        <div class="hale_container">
            <h1 class="text-white font-bold text-3xl md:text-5xl lg:text-[51px]">
                <?php the_title(); ?>
            </h1>
        </div>
    </section>

    <section class="hale_container mt-14 mb-[100px]">
        <?php
            $terms = get_terms([
                'taxonomy'   => 'product_cat',
                'hide_empty' => false,
            ]);

            if (!empty($terms) && !is_wp_error($terms)) {

                // Sort alphabetically
                usort($terms, function($a, $b) {
                    return strcasecmp($a->name, $b->name);
                });

                // Group categories A-Z
                $grouped = [];

                foreach ($terms as $term) {
                    $first_letter = strtoupper(mb_substr($term->name, 0, 1));

                    if (!preg_match('/[A-Z]/', $first_letter)) {
                        $first_letter = '#';
                    }

                    $grouped[$first_letter][] = $term;
                }

                ksort($grouped);
            ?>

        <!-- 🔤 A-Z Navigation -->
        <div class="sticky top-0 z-10 bg-white py-3 mb-6 border-b">
            <div class="flex flex-wrap gap-2 justify-center">
                <?php foreach (range('A', 'Z') as $letter): ?>
                <?php if (isset($grouped[$letter])): ?>
                <a href="#group-<?php echo $letter; ?>"
                    class="px-3 py-1 text-sm font-medium rounded-lg bg-gray-100 hover:bg-black hover:text-white transition">
                    <?php echo $letter; ?>
                </a>
                <?php else: ?>
                <span class="px-3 py-1 text-sm text-gray-300">
                    <?php echo $letter; ?>
                </span>
                <?php endif; ?>
                <?php endforeach; ?>

                <?php if (isset($grouped['#'])): ?>
                <a href="#group-#"
                    class="px-3 py-1 text-sm font-medium rounded-lg bg-gray-100 hover:bg-black hover:text-white">#</a>
                <?php endif; ?>
            </div>
        </div>

        <!-- 📂 Category Sections -->
        <div class="space-y-12">

            <?php foreach ($grouped as $letter => $cats): ?>

            <section id="group-<?php echo $letter; ?>">
                <!-- Letter Heading -->
                <h2 class="text-3xl font-bold mb-6 border-b pb-2">
                    <?php echo $letter; ?>
                </h2>

                <!-- Categories Grid -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                    <?php foreach ($cats as $cat): ?>
                    <a href="<?php echo esc_url(get_term_link($cat)); ?>"
                        class="flex items-center justify-between p-4 rounded-xl border bg-white hover:shadow-md hover:border-black transition group">

                        <span class="text-sm font-medium group-hover:text-black">
                            <?php echo esc_html($cat->name); ?>
                        </span>

                        <span class="text-xs bg-gray-100 px-2 py-1 rounded-full">
                            <?php echo $cat->count; ?>
                        </span>

                    </a>
                    <?php endforeach; ?>

                </div>
            </section>

            <?php endforeach; ?>

        </div>

        <?php } else { ?>
        <p class="text-center text-gray-500">No categories found.</p>
        <?php } ?>

        </div>

    </section>




</section><!-- #primary -->



<?php get_footer(); ?>
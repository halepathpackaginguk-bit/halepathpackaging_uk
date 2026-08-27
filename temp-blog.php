<?php
/**
 * Template Name: Blog
 *
 * @package halepath_theme
 */

get_header();
?>

<!-- Blog Hero -->
<section class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">
                Packaging Insights & Industry News
            </h1>
            <p class="text-xl text-gray-300 mb-8">
                Expert advice on custom packaging, sustainable materials, design trends, and industry compliance to help your brand stand out.
            </p>

            <!-- Blog Search -->
            <div class="max-w-xl mx-auto">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="relative">
                    <input type="search" name="s" placeholder="Search articles..."
                        class="w-full px-6 py-4 rounded-full text-gray-900 bg-white border-2 border-transparent focus:border-primary focus:outline-none"
                        value="<?php echo get_search_query(); ?>">
                    <button type="submit" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Category Filter -->
<section class="py-8 bg-gray-50 border-b">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center gap-3">
            <a href="<?php echo esc_url(home_url('/blog/')); ?>"
                class="px-5 py-2 rounded-full text-sm font-semibold transition-all <?php echo !is_category() ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200'; ?>">
                All Posts
            </a>
            <?php
            $categories = get_categories(array(
                'orderby' => 'name',
                'order' => 'ASC',
                'number' => 8
            ));

            foreach ($categories as $category):
                ?>
                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"
                    class="px-5 py-2 rounded-full text-sm font-semibold transition-all <?php echo (is_category($category->term_id)) ? 'bg-primary text-white' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200'; ?>">
                    <?php echo esc_html($category->name); ?>
                    <span class="ml-1 text-xs opacity-70">(<?php echo $category->count; ?>)</span>
                </a>
                <?php
            endforeach;
            ?>
        </div>
    </div>
</section>

<!-- Blog Grid -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 9,
            'paged' => $paged
        );

        if (is_category()) {
            $args['cat'] = get_queried_object_id();
        }

        $query = new WP_Query($args);

        if ($query->have_posts()):
            ?>
            <div class="grid md:grid-cols-3 gap-8">
                <?php
                while ($query->have_posts()):
                    $query->the_post();
                    ?>
                    <article class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow group">
                        <a href="<?php the_permalink(); ?>">
                            <div class="h-52 overflow-hidden relative">
                                <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('medium_large', [
                                    'class' => 'w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500'
                                ]); ?>
                                <?php else: ?>
                                <div class="w-full h-full bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                </div>
                                <?php endif; ?>

                                <!-- Reading Time Badge -->
                                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-semibold text-gray-700">
                                    <?php
                                    $content = get_the_content();
                                    $word_count = str_word_count(strip_tags($content));
                                    $reading_time = ceil($word_count / 200);
                                    echo $reading_time . ' min read';
                                    ?>
                                </div>
                            </div>
                        </a>

                        <div class="p-6">
                            <!-- Category -->
                            <p class="text-sm font-semibold text-secondary/80 bg-[#F1F5F9] px-3 py-1 rounded-lg w-fit mb-3">
                                <?php
                                $cats = get_the_category();
                                if (!empty($cats)) {
                                    echo esc_html($cats[0]->name);
                                }
                                ?>
                            </p>

                            <!-- Title -->
                            <h2 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <!-- Excerpt -->
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                            </p>

                            <!-- Meta -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div class="flex items-center gap-3">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 32, '', '', array('class' => 'rounded-full')); ?>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900"><?php the_author(); ?></p>
                                        <time datetime="<?php echo get_the_date('c'); ?>" class="text-xs text-gray-500">
                                            <?php echo get_the_date('M j, Y'); ?>
                                        </time>
                                    </div>
                                </div>
                                <a href="<?php the_permalink(); ?>"
                                    class="text-primary font-semibold text-sm hover:text-primary/80 flex items-center gap-1">
                                    Read
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                <?php
                $big = 999999999;
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => $paged,
                    'total' => $query->max_num_pages,
                    'prev_text' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg> Previous',
                    'next_text' => 'Next <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>',
                    'class' => 'flex justify-center gap-2',
                ));
                ?>
            </div>

            <?php
            wp_reset_postdata();

        else:
            ?>
            <!-- No Posts Found -->
            <div class="text-center py-16">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">No Articles Found</h2>
                <p class="text-gray-600 mb-8">We're working on new content. Check back soon for the latest packaging insights.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="bg-primary text-white px-6 py-3 rounded-full font-semibold hover:bg-primary/90 transition-colors">
                    Back to Home
                </a>
            </div>
            <?php
        endif;
        ?>
    </div>
</section>

<!-- Newsletter CTA -->
<section class="py-16 bg-gray-900 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Stay Updated with Packaging Insights</h2>
        <p class="text-gray-300 mb-8 max-w-2xl mx-auto">
            Get the latest industry news, design tips, and exclusive offers delivered straight to your inbox.
        </p>
        <div class="max-w-md mx-auto">
            <form class="flex gap-2">
                <input type="email" placeholder="Enter your email" required
                    class="flex-1 px-6 py-3 rounded-full text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary">
                <button type="submit" class="bg-primary hover:bg-primary/90 px-8 py-3 rounded-full font-semibold transition-colors">
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</section>

<?php get_footer(); ?>

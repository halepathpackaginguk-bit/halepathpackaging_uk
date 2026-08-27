<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package halepath_theme
 */

get_header();
?>

<!-- Archive Hero -->
<section class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <?php the_archive_title('<h1 class="text-4xl md:text-5xl font-bold mb-4">', '</h1>'); ?>
            <?php the_archive_description('<div class="text-xl text-gray-300">', '</div>'); ?>
        </div>
    </div>
</section>

<!-- Archive Content -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <?php if (have_posts()): ?>
        <div class="grid md:grid-cols-3 gap-8">
            <?php
            while (have_posts()):
                the_post();
                ?>
                <article class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow">
                    <a href="<?php the_permalink(); ?>">
                        <div class="h-48 overflow-hidden">
                            <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('medium_large', [
                                'class' => 'w-full h-full object-cover object-center hover:scale-105 transition-transform duration-300'
                            ]); ?>
                            <?php else: ?>
                            <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                </svg>
                            </div>
                            <?php endif; ?>
                        </div>
                    </a>

                    <div class="p-6">
                        <!-- Category -->
                        <?php if (get_post_type() === 'post'): ?>
                        <p class="text-sm font-semibold text-secondary/80 bg-[#F1F5F9] px-3 py-1 rounded-lg w-fit mb-3">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                echo esc_html($categories[0]->name);
                            }
                            ?>
                        </p>
                        <?php endif; ?>

                        <!-- Title -->
                        <h2 class="text-xl font-bold text-gray-900 mb-3">
                            <a href="<?php the_permalink(); ?>" class="hover:text-primary transition-colors">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <!-- Excerpt -->
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </p>

                        <!-- Meta -->
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <time datetime="<?php echo get_the_date('c'); ?>">
                                <?php echo get_the_date(); ?>
                            </time>
                            <a href="<?php the_permalink(); ?>" class="text-primary font-semibold hover:text-primary/80">
                                Read More →
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
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>',
                'next_text' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>',
                'class' => 'flex justify-center gap-2',
            ));
            ?>
        </div>

        <?php else: ?>
        <!-- No Posts Found -->
        <div class="text-center py-16">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h2 class="text-2xl font-bold text-gray-900 mb-4">No Posts Found</h2>
            <p class="text-gray-600 mb-8">It seems we can't find what you're looking for. Try a search or browse our latest content.</p>
            <div class="flex justify-center gap-4">
                <a href="<?php echo esc_url(home_url('/blog/')); ?>" class="bg-primary text-white px-6 py-3 rounded-full font-semibold hover:bg-primary/90 transition-colors">
                    Browse Blog
                </a>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="border-2 border-gray-300 text-gray-700 px-6 py-3 rounded-full font-semibold hover:border-primary hover:text-primary transition-colors">
                    Back to Home
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();

<?php
/**
 * Single Post Template
 *
 * @package halepath_theme
 */

get_header();
?>

<!-- Article Schema (JSON-LD) -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "<?php echo esc_js(get_the_title()); ?>",
    "description": "<?php echo esc_js(wp_strip_all_tags(get_the_excerpt())); ?>",
    "image": "<?php echo esc_js(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>",
    "datePublished": "<?php echo get_the_date('c'); ?>",
    "dateModified": "<?php echo get_the_modified_date('c'); ?>",
    "author": {
        "@type": "Person",
        "name": "<?php echo esc_js(get_the_author()); ?>",
        "url": "<?php echo esc_js(get_author_posts_url(get_the_author_meta('ID'))); ?>"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Hale Path Packaging",
        "logo": {
            "@type": "ImageObject",
            "url": "<?php echo esc_js(get_template_directory_uri()); ?>/assets/images/logo.png"
        }
    },
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php echo esc_js(get_permalink()); ?>"
    }
}
</script>

<?php while (have_posts()):
    the_post();
?>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Category & Meta -->
            <div class="flex items-center gap-4 mb-6">
                <?php
                $categories = get_the_category();
                if (!empty($categories)):
                    foreach (array_slice($categories, 0, 2) as $cat):
                        ?>
                        <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"
                            class="bg-primary/20 text-primary px-4 py-1 rounded-full text-sm font-semibold hover:bg-primary hover:text-white transition-colors">
                            <?php echo esc_html($cat->name); ?>
                        </a>
                        <?php
                    endforeach;
                endif;
                ?>

                <span class="text-gray-400">•</span>

                <time datetime="<?php echo get_the_date('c'); ?>" class="text-gray-400 text-sm">
                    <?php echo get_the_date('F j, Y'); ?>
                </time>

                <span class="text-gray-400">•</span>

                <span class="text-gray-400 text-sm">
                    <?php
                    $content = get_the_content();
                    $word_count = str_word_count(strip_tags($content));
                    $reading_time = ceil($word_count / 200);
                    echo $reading_time . ' min read';
                    ?>
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-bold mb-8 leading-tight">
                <?php the_title(); ?>
            </h1>

            <!-- Author Info -->
            <div class="flex items-center gap-4">
                <?php echo get_avatar(get_the_author_meta('ID'), 48, '', '', array('class' => 'rounded-full')); ?>
                <div>
                    <p class="font-semibold"><?php the_author(); ?></p>
                    <p class="text-gray-400 text-sm">
                        <?php if (get_the_author_meta('description')): ?>
                        <?php echo wp_trim_words(get_the_author_meta('description'), 15); ?>
                        <?php else: ?>
                        Packaging Expert at Hale Path Packaging
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Image -->
<?php if (has_post_thumbnail()): ?>
<section class="bg-gray-900 pb-0">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <?php the_post_thumbnail('full', [
                'class' => 'w-full h-auto rounded-t-2xl shadow-2xl object-cover max-h-[500px]'
            ]); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Article Content -->
<main class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-3 gap-12 max-w-6xl mx-auto">

            <!-- Table of Contents (Sidebar) -->
            <aside class="hidden lg:block lg:col-span-1">
                <div class="sticky top-24">
                    <?php
                    $content = get_the_content();
                    $toc = '';

                    if (!empty($content)) {
                        preg_match_all('/<h([2-6])[^>]*>(.*?)<\/h\1>/is', $content, $matches, PREG_SET_ORDER);

                        if (!empty($matches) && count($matches) >= 3) {
                            $toc .= '<div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">';
                            $toc .= '<h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">';
                            $toc .= '<svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>';
                            $toc .= 'Table of Contents</h2>';
                            $toc .= '<ol class="space-y-3">';

                            foreach ($matches as $index => $match) {
                                $heading_text = wp_strip_all_tags($match[2]);
                                $heading_id = 'toc-' . $index;
                                $indent = $match[1] > 2 ? 'ml-4' : '';

                                $toc .= '<li class="' . $indent . '">';
                                $toc .= '<a href="#' . esc_attr($heading_id) . '" class="text-gray-600 hover:text-primary text-sm flex items-center gap-2 transition-colors">';
                                $toc .= '<span class="w-1.5 h-1.5 bg-primary/30 rounded-full flex-shrink-0"></span>';
                                $toc .= esc_html($heading_text);
                                $toc .= '</a></li>';

                                $content = str_replace(
                                    $match[0],
                                    '<h' . $match[1] . ' id="' . $heading_id . '">' . $match[2] . '</h' . $match[1] . '>',
                                    $content
                                );
                            }

                            $toc .= '</ol></div>';
                        }
                    }

                    if (!empty($toc)):
                        echo $toc;
                    endif;
                    ?>

                    <!-- Share Buttons -->
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 mt-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Share This Article</h3>
                        <div class="flex gap-3">
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"
                                target="_blank" rel="noopener"
                                class="w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
                                target="_blank" rel="noopener"
                                class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>"
                                target="_blank" rel="noopener"
                                class="w-10 h-10 bg-blue-700 text-white rounded-full flex items-center justify-center hover:bg-blue-800 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                            <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>"
                                target="_blank" rel="noopener"
                                class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Article Body -->
            <article class="lg:col-span-2">
                <div class="prose prose-lg prose-headings:text-gray-900 prose-a:text-primary prose-img:rounded-2xl max-w-none">
                    <?php
                    $content = get_the_content();
                    echo apply_filters('the_content', $content);
                    ?>
                </div>

                <!-- Tags -->
                <?php
                $tags = get_the_tags();
                if ($tags):
                    ?>
                    <div class="mt-12 pt-8 border-t border-gray-200">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($tags as $tag): ?>
                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"
                                class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm hover:bg-primary hover:text-white transition-colors">
                                <?php echo esc_html($tag->name); ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php
                endif;
                ?>

                <!-- Author Bio -->
                <div class="mt-12 bg-gray-50 rounded-2xl p-8">
                    <div class="flex items-start gap-6">
                        <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('class' => 'rounded-full')); ?>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2"><?php the_author(); ?></h3>
                            <p class="text-gray-600 mb-4">
                                <?php echo esc_html(get_the_author_meta('description') ?: 'Packaging expert at Hale Path Packaging, sharing insights on custom packaging solutions, sustainable materials, and industry trends.'); ?>
                            </p>
                            <div class="flex gap-4">
                                <?php if (get_the_author_meta('url')): ?>
                                <a href="<?php echo esc_url(get_the_author_meta('url')); ?>" target="_blank" rel="noopener" class="text-primary hover:text-primary/80 text-sm font-semibold">
                                    Visit Website →
                                </a>
                                <?php endif; ?>
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="text-primary hover:text-primary/80 text-sm font-semibold">
                                    View All Posts →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Post Navigation -->
                <div class="mt-12 grid md:grid-cols-2 gap-6">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>

                    <?php if ($prev_post): ?>
                    <a href="<?php echo get_permalink($prev_post->ID); ?>" class="group bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all">
                        <span class="text-sm text-gray-500 flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Previous Article
                        </span>
                        <h4 class="font-semibold text-gray-900 group-hover:text-primary transition-colors">
                            <?php echo esc_html($prev_post->post_title); ?>
                        </h4>
                    </a>
                    <?php endif; ?>

                    <?php if ($next_post): ?>
                    <a href="<?php echo get_permalink($next_post->ID); ?>" class="group bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all md:text-right md:col-start-2">
                        <span class="text-sm text-gray-500 flex items-center gap-2 mb-2 md:justify-end">
                            Next Article
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </span>
                        <h4 class="font-semibold text-gray-900 group-hover:text-primary transition-colors">
                            <?php echo esc_html($next_post->post_title); ?>
                        </h4>
                    </a>
                    <?php endif; ?>
                </div>

                <!-- Comments -->
                <?php if (comments_open() || get_comments_number()): ?>
                <div class="mt-12">
                    <?php comments_template(); ?>
                </div>
                <?php endif; ?>
            </article>

        </div>
    </div>
</main>

<!-- Related Posts -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Related Articles</h2>

        <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <?php
            $related_posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID()),
                'orderby' => 'rand'
            ));

            if ($related_posts->have_posts()):
                while ($related_posts->have_posts()):
                    $related_posts->the_post();
                    ?>
                    <article class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition-shadow group">
                        <a href="<?php the_permalink(); ?>">
                            <div class="h-48 overflow-hidden">
                                <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('medium_large', [
                                    'class' => 'w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500'
                                ]); ?>
                                <?php else: ?>
                                <div class="w-full h-full bg-gradient-to-br from-primary/10 to-secondary/10 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                </div>
                                <?php endif; ?>
                            </div>
                        </a>

                        <div class="p-6">
                            <p class="text-sm font-semibold text-secondary/80 bg-[#F1F5F9] px-3 py-1 rounded-lg w-fit mb-3">
                                <?php
                                $cats = get_the_category();
                                if (!empty($cats)) {
                                    echo esc_html($cats[0]->name);
                                }
                                ?>
                            </p>
                            <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-primary transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-gray-600 text-sm line-clamp-2 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            <a href="<?php the_permalink(); ?>" class="text-primary font-semibold text-sm hover:text-primary/80">
                                Read Article →
                            </a>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>

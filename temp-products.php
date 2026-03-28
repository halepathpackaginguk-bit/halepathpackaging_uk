<?php
/** Template Name: Products */
get_header();
?>


<section class="mb-[100px]">
    <section
        class="py-16 sm:h-[350px] h-[260px] flex items-center justify-center bg-cover bg-no-repeat bg-center bg-black/50 bg-blend-overlay"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/about-page/s2.webp'">
        <div class="hale_container">
            <h1 class="text-white font-bold text-3xl md:text-5xl lg:text-[51px]">
                <?php the_title(); ?>
            </h1>
        </div>
    </section>

    <div class="hale_container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        <?php
    $query_args = [
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ];

    $products = new WP_Query($query_args);
    ?>

        <?php if ( $products->have_posts() ) : ?>

        <?php while ( $products->have_posts() ) : $products->the_post(); ?>

        <?php
            set_query_var('product_id', get_the_ID());
            get_template_part('template-parts/product/card');
            ?>

        <?php endwhile; ?>

        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div>
</section><!-- #primary -->



<?php get_footer(); ?>
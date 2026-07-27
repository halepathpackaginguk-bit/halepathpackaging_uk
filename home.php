<?php /** Template Name: Home */ get_header();

?>
<?php get_template_part('template-parts/main-banner'); ?>
<?php get_template_part('template-parts/about-imgscroll'); ?>
<section class="bg-[#F5F5F5] py-10">
    <h2 class="h2">Our Latest Category</h2>
    <?php get_template_part('template-parts/category-slider'); ?>
</section>
<?php get_template_part('template-parts/home-cta'); ?>
<?php get_template_part('template-parts/home-offset'); ?>
<?php get_template_part('template-parts/home-trusted'); ?>
<?php get_template_part('template-parts/home-brands'); ?>
<?php get_template_part('template-parts/home-corrugated'); ?>
<?php get_template_part('template-parts/get-qoute', ); ?>
<?php get_template_part('template-parts/what-weoffer', ); ?>
<?php get_template_part('template-parts/home-flexible', ); ?>
<?php get_template_part('template-parts/home-cta'); ?>
<?php get_template_part('template-parts/home-services'); ?>
<?php get_template_part('template-parts/home-printadvertising'); ?>
<?php get_template_part('template-parts/availablein'); ?>
<?php get_template_part('template-parts/home-work'); ?>
<?php get_template_part('template-parts/home-reviews'); ?>
<?php get_template_part('template-parts/testimonial-and-faq'); ?>
<?php //get_template_part('template-parts/home-career'); ?>
<section class="px-4">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cta-ban1.jpeg" alt="about us" class="w-full">
</section>

<?php get_template_part('template-parts/temp-instagram'); ?>
<?php get_footer() ?>
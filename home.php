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
<?php get_template_part('template-parts/home-work'); ?>
<?php get_template_part('template-parts/home-reviews'); ?>
<?php get_template_part('template-parts/testimonial-and-faq'); ?>
<?php //get_template_part('template-parts/home-career'); ?>
<section class="px-4">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-banner.png" alt="about us"
        class="w-full">
</section>
<div id="quotePopup" class="fixed inset-0 w-full bg-transparent flex flex-col items-end justify-center z-50 
     translate-x-full opacity-0 pointer-events-none transition-all duration-500 ease-in-out">
    <?php get_template_part('template-parts/main-popup'); ?>
</div>
<?php get_template_part('template-parts/temp-instagram'); ?>
<?php get_footer() ?>
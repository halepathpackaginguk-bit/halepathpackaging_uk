<?php
$corrugated_products = get_field('corrugated_packaging');
$corrug = get_field('corrugated_section');
$title = $corrug['title'] ?? '';
$content = $corrug['content'] ?? '';
$btn_link = $corrug['aboutlink'] ?? '';
?>

<section class="bg-cover mt-10 bg-no-repeat about_bg"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/about-page/bg.png'">
    <div class="hale_container pt-[110px]!">
        <h2 class="text-white font-bold text-3xl md:text-5xl lg:text-[51px]">
           <?php echo esc_html($title); ?>
        </h2>
    </div>
    <div
        class="bg-secondary/20 backdrop-blur-[10px] py-10 pr-8 md:p-[46px] max-w-[90%] md:max-w-[80%] lg:max-w-[70%] rounded-tr-[140px] mt-[110px]">
        <div class="hale_container corru_content">
           <?php echo $content; ?>
        </div>
    </div>
</section>
<section class="pt-12">
    <div class="hale_container flex flex-col justify-center items-center">
        <h6 class="sub_title">
            Our Products
            <div class="sub_title_line"></div>
        </h6>
        <h2 class="h2">
            Corrugated Packaging
        </h2>
    </div>
</section>

<section class="pb-12">
    <?php
    get_template_part(
        'template-parts/product-slider',
        null,
        [
            'products' => $corrugated_products,
            'slidesToShow' => 4,
            'direction' => 'ltr'
        ]
    ); ?>

    <a href="<?php echo home_url('/all-corrugated-packaging'); ?>"
        class="btn_secondry flex items-center gap-2 sm:mt-12 mt-6 w-fit mx-auto">
        See All Corrugated Packaging
    </a>
</section>
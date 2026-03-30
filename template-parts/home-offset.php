<?php
$offset_products = get_field('offset_printing_products');


?>
<section class="py-12">
    <div class="hale_container flex flex-col justify-center items-center">
        <h6 class="sub_title">
            Our Products
            <div class="sub_title_line"></div>
        </h6>
        <h2 class="h2">
            Offset Printing
        </h2>
    </div>

    <?php
    get_template_part(
        'template-parts/product-slider',
        null,
        [
            'products' => $offset_products,
            'slidesToShow' => 4,
            'direction' => 'ltr'
        ]
    ); ?>
    <a href="<?php echo home_url('/all-offset-printing'); ?>"
        class="btn_secondry flex items-center gap-2 sm:mt-12 mt-6 w-fit mx-auto">
        See All Offset Printing
    </a>
</section>
<!-- Product Slider end -->
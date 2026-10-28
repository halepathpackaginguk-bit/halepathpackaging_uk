<?php
$offset_products = get_field('offset_printing_products');


?>
<section class="py-12">
    <div class="hale_container flex flex-col justify-center items-center">
       
        <h2 class="h2">
          Premium Offset Printing for Growing Brands
        </h2>
        <p class="mt-2 text-sm leading-6 text-txt_Clr md:text-base">Wanna grow your brand's presentation? Opting for offset printing is the best solution. Offset printing is typically used for mass production projects, such as printing large quantities of newspapers, brochures, stationery, magazines, and, of course, boxes.  It offers exceptional printing quality and color output for a range of different materials.</p>
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
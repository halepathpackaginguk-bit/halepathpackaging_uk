<?php
$advertising_products = get_field('print_advertising');
?>


<section class="py-16 bg-[#EAF6F9]">
    <div class="mb-16">
        <h2 class="h2 md:mb-5!">
            Print & Advertising & Office Supplies
        </h2>
        <p class="text-lg font-normal text-txt_Clr text-center md:w-5/6 mx-auto">
            Start designing unique boxes with different styles, sizes, and
            choices. Custom rigid boxes or Kraft boxes for retail products and
            many more?We can help, Custom printing and packaging services ideas
            abound.
        </p>
    </div>

    <?php
        get_template_part(
            'template-parts/product-slider',
            null,
            [
                'products'     => $advertising_products,
                'slidesToShow' => 4,
                'direction'    => 'ltr'
            ]
        );?>
    <a href="<?php echo home_url('/all-print-advertising'); ?>" class="btn_secondry flex items-center gap-2 sm:mt-12 mt-6 w-fit mx-auto">
        See All Print & Advertising & Office Supplies
    </a>
</section>
<!-- Category Slider end -->
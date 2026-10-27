<?php
$advertising_products = get_field('print_advertising');
?>


<section class="py-16 bg-[#EAF6F9]">
    <div class="mb-16">
        <h2 class="h2 md:mb-5!">
          Print, Advertising & Office Supplies
        </h2>
        <p class="sm:text-lg text-sm font-normal text-txt_Clr text-center md:w-5/6 mx-auto">
          At Hale Path Packaging, we provide print, advertising, and office supply solutions to help businesses maintain a professional image and promote their brand effectively. From custom packaging printing & materials to promotional products and everyday office essentials, we focus on delivering practical solutions that support your business needs and keep your brand looking consistent. 
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
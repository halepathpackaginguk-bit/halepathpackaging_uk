<?php
$flexible_products = get_field('flexible_packaging');
?>

<section class="py-12">
    <div class="hale_container flex flex-col justify-center items-center">


        <h2 class="mb-3 text-2xl font-bold leading-tight text-title_Clr sm:text-3xl">
            Flexible Packaging &amp; Custom Mylar Bags
        </h2>

        <p class="text-sm leading-6 text-txt_Clr md:text-base">
            Give your brand the exemplary presentation it deserves. From custom boxes to vibrant mylar bags, we
            create retail &amp; custom packaging bags that turn first-time buyers into lifetime fans.
        </p>
    </div>

    <?php
        get_template_part(
            'template-parts/product-slider',
            null,
            [
                'products'     => $flexible_products,
                'slidesToShow' => 4,
                'direction'    => 'ltr'
            ]
        );?>
    <a href="<?php echo home_url('/all-flexible-packaging'); ?>"
        class="btn_secondry flex items-center gap-2 sm:mt-12 mt-6 w-fit mx-auto">
        See All Flexible Packaging
    </a>
</section>
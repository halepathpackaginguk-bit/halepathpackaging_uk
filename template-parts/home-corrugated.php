<?php
$corrugated_products = get_field('corrugated_packaging');
$corrug = get_field('corrugated_section');
$title = $corrug['title'] ?? '';
$content = $corrug['content'] ?? '';
$btn_link = $corrug['aboutlink'] ?? '';
?>

<section class="relative overflow-hidden bg-gray-50">
    <div
        class="mx-auto flex min-h-[220px] container items-center px-5 py-8 sm:min-h-[280px] sm:px-10 lg:min-h-[340px] lg:px-16">

        <!-- Background Decorative Image -->
        <div class="absolute inset-0">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/packaging1.jpg'); ?>" alt=""
                aria-hidden="true" class="h-full w-full object-cover">
        </div>

        <!-- Content -->
        <div class="relative z-10 w-full md:grid md:grid-cols-2 md:items-center">

            <!-- Text Card -->
            <div class="relative z-20 mx-auto w-full max-w-[480px] rounded-lg bg-white p-5 shadow-sm md:mx-0 lg:p-7">
                <h2 class="mb-2 text-xl font-bold leading-tight text-title_Clr sm:text-2xl">
                    Better Packaging Choices for a Better Environment: Eco-friendly Packaging
                </h2>

                <p class="mb-4 text-sm leading-6 text-txt_Clr">
                    At Hale Path Packaging, we provide eco-friendly packaging made from recyclable and sustainable
                    materials to help businesses reduce waste. And best of all, we offer free design support, free
                    shipping, and 10% off on first and bulk orders. Contact us at <a
                        href="mailto:sales@halepathpackaging.co.uk">sales@halepathpackaging.co.uk</a> and get
                    a free quote!
                </p>

                <a href="<?php echo esc_url(home_url('/get-quote-now/')); ?>"
                    class="btn_secondry flex items-center gap-2 sm:mt-12 mt-6 w-fit">
                    Request a Quote
                    <span aria-hidden="true">→</span>
                </a>


            </div>

            <!-- Right-side space for packaging products in background image -->
            <div class="hidden md:block" aria-hidden="true"></div>

        </div>
    </div>
</section>
<section class="pt-12">
    <div class="hale_container flex flex-col justify-center items-center">

        <h2 class="h2">
            Get Our Custom Corrugated Packaging UK
        </h2>
        <p class="mt-2 text-sm leading-6 text-txt_Clr md:text-base">If you want to enhance brand value and deliver
            premium packaging, our custom corrugated packaging are tailored with durable materials, luxury printing, and
            reliable finishing.</p>
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
<section class="mt-20 max-w-[2200px] mx-auto px-3 lg:px-0">
    <h2 class="text-2xl text-center mb-8 sm:text-3xl md:text-5xl font-bold">
        <?php the_title(); ?> Gallery
    </h2>

    <?php
    $product_gallery = get_field('product_gallery');

    if (empty($product_gallery)) {
        return;
    }
    ?>

    <div class="relative w-full py-8">
        <div class="full_gallery">
            <?php foreach ($product_gallery as $image): ?>
                <div class="px-2">
                    <figure class="rounded-2xl h-[450px]">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                            loading="lazy" class="!h-full w-full object-cover rounded-2xl">
                    </figure>
                </div>
            <?php endforeach; ?>


        </div>
        <!-- Arrows -->
        <div class="flex justify-center gap-4 text-3xl mt-4">
            <button class="gallery-prev hover:text-[#47AFC3] cursor-pointer">&#8592;</button>
            <button class="gallery-next hover:text-[#47AFC3] cursor-pointer">&#8594;</button>
        </div>
    </div>

    <script>
        jQuery(document).ready(function ($) {
            $('.full_gallery').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                arrows: true,
                prevArrow: $('.gallery-prev'),
                nextArrow: $('.gallery-next'),
                dots: false,
                infinite: true,
                adaptiveHeight: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: { slidesToShow: 3 }
                    },
                    {
                        breakpoint: 768,
                        settings: { slidesToShow: 2 }
                    },
                    {
                        breakpoint: 480,
                        settings: { slidesToShow: 1 }
                    }
                ]
            });
        });
    </script>
</section>


<section id="product-tabs" class="mt-10">

    <!-- Tabs Buttons -->
    <div id="tabs-header" class="hale_container !px-0 flex border-b border-gray-300 bg-white z-40">
        <button class="tab-btn tab_active" data-tab="tab1">Details</button>
        <button class="tab-btn" data-tab="tab2">Available Options</button>
        <button class="tab-btn" data-tab="tab3">Order Process</button>
    </div>

    <!-- Tabs Content -->
    <div class="tab-content mt-6">
        <div class="tab-panel" id="tab1">
            <?php get_template_part('template-parts/woo/pro-tab1'); ?>
        </div>

        <div class="tab-panel hidden" id="tab2">
            <?php get_template_part('template-parts/woo/pro-tab2'); ?>
        </div>

        <div class="tab-panel hidden" id="tab3">
            <?php get_template_part('template-parts/woo/pro-tab3'); ?>
        </div>
    </div>
</section>
<style>
   #tabs-header.sticky-tabs {
    position: sticky;
    top: 0; /* will be updated dynamically via JS */
    background: white;
    z-index: 999;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // ======= TABS SWITCHING =======
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabPanels = document.querySelectorAll('.tab-panel');

    function openTab(tabId) {
        tabPanels.forEach(panel => panel.classList.add('hidden'));
        tabButtons.forEach(btn => btn.classList.remove('tab_active'));
        document.getElementById(tabId).classList.remove('hidden');
        document.querySelector(`.tab-btn[data-tab="${tabId}"]`).classList.add('tab_active');
    }

    if (tabButtons.length > 0) openTab(tabButtons[0].dataset.tab);

    tabButtons.forEach(button => {
        button.addEventListener('click', () => openTab(button.dataset.tab));
    });

    // ======= STICKY TABS =======
    const header = document.getElementById('tabs-header');
    const siteHeader = document.querySelector('header'); // main site header

    function handleSticky() {
        const siteHeaderHeight = siteHeader.offsetHeight; // dynamic header height
        header.style.top = siteHeaderHeight + "px"; // offset sticky tabs below header
        header.classList.add('sticky-tabs'); // sticky is always active
    }

    handleSticky(); // initial call
    window.addEventListener('resize', handleSticky); // recalc on resize
});
</script>



<section class="pt-14">
    <div class="hale_container">
      
            <?php get_template_part('template-parts/woo/related-products'); ?>
            </div>
</section>


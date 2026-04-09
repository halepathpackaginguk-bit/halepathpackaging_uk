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
            <?php foreach ($product_gallery as $index => $image): ?>
                <div class="px-2">
                    <figure class="rounded-2xl h-[450px]">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                            data-index="<?php echo $index; ?>"
                            class="gallery-img cursor-pointer !h-full w-full object-cover rounded-2xl">
                    </figure>
                </div>
            <?php endforeach; ?>


        </div>
        <!-- Arrows -->
        <button
            class="gallery-prev text-white text-2xl leading-[0] h-[60px] w-[60px] rounded-full bg-primary hover:bg-secondary flex items-center justify-center cursor-pointer scale-100 hover:scale-110 transition-all ease-in-out absolute left-5 top-1/2 -translate-y-1/2 z-50"><i
                class="fa-solid fa-arrow-left-long"></i></button>
        <button
            class="gallery-next text-white text-2xl leading-[0] h-[60px] w-[60px] rounded-full bg-primary hover:bg-secondary flex items-center justify-center cursor-pointer scale-100 hover:scale-110 transition-all ease-in-out absolute right-5 top-1/2 -translate-y-1/2 z-50"><i
                class="fa-solid fa-arrow-right-long"></i></button>
    </div>
    <!-- Lightbox -->
    <div id="lightbox" class="fixed inset-0 bg-black/90 hidden items-center justify-center z-[9999]">
        <button id="lightbox-close" class="absolute top-5 right-5 text-white text-3xl">&times;</button>
        <button id="lightbox-prev" class="absolute left-5 text-white text-3xl">&#10094;</button>
        <img id="lightbox-img" class="max-h-[90%] max-w-[90%] object-contain rounded-xl" />
        <button id="lightbox-next" class="absolute right-5 text-white text-3xl">&#10095;</button>
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
        top: 0;
        /* will be updated dynamically via JS */
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

<script>
document.addEventListener('DOMContentLoaded', function () {

    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');

    const btnClose = document.getElementById('lightbox-close');
    const btnNext = document.getElementById('lightbox-next');
    const btnPrev = document.getElementById('lightbox-prev');

    const images = document.querySelectorAll('.gallery-img');
    const imageArray = Array.from(images);

    let currentIndex = 0;

    function showImage(index) {
        if (!imageArray[index]) return;
        lightboxImg.src = imageArray[index].src;
        currentIndex = index;
    }

    // 🔥 IMPORTANT: use event delegation for slick
    document.querySelector('.full_gallery').addEventListener('click', function (e) {
        const img = e.target.closest('.gallery-img');
        if (!img) return;

        const index = parseInt(img.getAttribute('data-index'));
        if (isNaN(index)) return;

        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');

        showImage(index);
    });

    btnClose.addEventListener('click', () => {
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
    });

    btnNext.addEventListener('click', () => {
        let next = (currentIndex + 1) % imageArray.length;
        showImage(next);
    });

    btnPrev.addEventListener('click', () => {
        let prev = (currentIndex - 1 + imageArray.length) % imageArray.length;
        showImage(prev);
    });

    // outside click
    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) btnClose.click();
    });

    // keyboard
    document.addEventListener('keydown', (e) => {
        if (lightbox.classList.contains('hidden')) return;

        if (e.key === 'Escape') btnClose.click();
        if (e.key === 'ArrowRight') btnNext.click();
        if (e.key === 'ArrowLeft') btnPrev.click();
    });

});
</script>
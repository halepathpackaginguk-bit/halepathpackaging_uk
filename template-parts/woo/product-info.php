<?php get_template_part('template-parts/woo/product-brand_slider'); ?>
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
    jQuery(document).ready(function($) {
        $('.full_gallery').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: $('.gallery-prev'),
            nextArrow: $('.gallery-next'),
            dots: false,
            infinite: true,
            adaptiveHeight: false,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });

    jQuery(document).ready(function($) {

        const images = $('.gallery-img');
        let currentIndex = 0;

        function showImage(index) {
            const src = $(images[index]).attr('src');
            $('#lightbox-img').attr('src', src);
            currentIndex = index;
        }

        // Open Lightbox
        images.on('click', function() {
            currentIndex = parseInt($(this).data('index'));
            showImage(currentIndex);

            $('#lightbox')
                .removeClass('hidden')
                .addClass('flex');
        });

        // Close Lightbox
        $('#lightbox-close').on('click', function() {
            $('#lightbox')
                .removeClass('flex')
                .addClass('hidden');
        });

        // Previous Image
        $('#lightbox-prev').on('click', function() {
            currentIndex =
                (currentIndex - 1 + images.length) % images.length;
            showImage(currentIndex);
        });

        // Next Image
        $('#lightbox-next').on('click', function() {
            currentIndex =
                (currentIndex + 1) % images.length;
            showImage(currentIndex);
        });

        // Close on background click
        $('#lightbox').on('click', function(e) {
            if (e.target === this) {
                $(this)
                    .removeClass('flex')
                    .addClass('hidden');
            }
        });

    });
    </script>

</section>
<section id="product-tabs" class="mt-10">
    <div id="tabs-header" class="hale_container !px-0 flex border-b border-gray-300 bg-white z-40">

        <button class="tab-btn" data-tab="tab_details">Details</button>
        <button class="tab-btn" data-tab="tab_available_options">Available Options</button>
        <button class="tab-btn" data-tab="tab_order_process">Order Process</button>
    </div>
    <!-- Tabs Content -->
    <div class="tab-content mt-6">

        <div class="tab-panels " id="tab_details">
            <?php get_template_part('template-parts/woo/pro-tab1'); ?>
        </div>
        <div class="tab-panels hidden " id="tab_available_options">
            <?php get_template_part('template-parts/woo/pro-tab2'); ?>
        </div>
        <div class="tab-panels hidden" id="tab_order_process">
            <?php get_template_part('template-parts/woo/pro-tab3'); ?>
        </div>
    </div>
</section>
<?php get_template_part('template-parts/woo/product-videos'); ?>

<?php get_template_part('template-parts/woo/related-products'); ?>
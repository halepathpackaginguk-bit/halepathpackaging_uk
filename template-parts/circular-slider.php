<?php
$theme_uri = get_template_directory_uri();

$circular_slides = [
    [
        'title' => 'Forestry',
        'image' => $theme_uri . '/assets/images/design/1.png',
        'description' => [
            'Our virgin fiber raw material is renewable, recyclable and biodegradable. By practicing and supporting sustainable forestry, we help secure the future supply of virgin fiber while delivering a range of environmental and social benefits.',
            'We source fiber from small, private landowners as well as our own forests which are FSC and/or PEFC certified. All forests from which we source fiber are chain-of-custody certified.',
            'We are committed to maintaining biodiversity and natural habitats supporting reforestation, research, education and preservation efforts in the communities where we operate.'
        ],
        'link' => '#'
    ],
    [
        'title' => 'Paper',
        'image' => $theme_uri . '/assets/images/design/2.png',
        'description' => [
            'We manufacture a wide range of renewable, recyclable and recycled paper and board, helping create sustainable solutions for businesses and communities.',
            'Our global paper and board manufacturing capabilities provide the materials needed for innovative, high-performance paper-based packaging.',
            'We continue to focus on responsible resource use, efficient production and improving the circularity of paper products.'
        ],
        'link' => '#'
    ],
    [
        'title' => 'Recycling',
        'image' => $theme_uri . '/assets/images/design/3.png',
        'description' => [
            'We provide recycling solutions to support the responsible and efficient recycling of our customers’ packaging.',
            'We consume approximately 13.1 million tons of recovered fiber each year around the world, bringing valuable fiber back into the packaging production loop.',
            'By recovering and reusing paper fibers, we help keep valuable materials in circulation and reduce waste.'
        ],
        'link' => '#'
    ],
    [
        'title' => 'Packaging',
        'image' => $theme_uri . '/assets/images/design/4.png',
        'description' => [
            'We create, design and manufacture paper-based packaging made from renewable materials that protect and promote our customers’ products.',
            'Our packaging solutions combine intelligent design, renewable materials and innovation to help customers meet their sustainability goals.',
            'From corrugated boxes to consumer packaging, we develop solutions that support a more circular economy.'
        ],
        'link' => '#'
    ],
];
?>

<section class="circular-economy-section overflow-hidden bg-white pt-12 pb-24 sm:py-20">

    <div class="mx-auto container px-4">

        <!-- Section Heading -->
        <div class="mb-5">

            <h2 class="text-2xl font-bold leading-tight text-title_Clr sm:text-3xl">
                Circular economy is at the core of our business
            </h2>

            <p class="mt-2 text-sm leading-6 text-txt_Clr md:text-base">
                As a global leader in sustainable paper-based packaging, we're proud to create solutions from renewable,
                recyclable materials—helping deliver a better future for all.
            </p>

        </div>

        <!-- Slider Main Wrapper -->
        <div id="circularEconomySlider" class="grid grid-cols-1 items-center gap-8 lg:grid-cols-[40%_60%] lg:gap-5"
            data-slides='<?php echo esc_attr(wp_json_encode($circular_slides)); ?>'>

            <!-- LEFT CONTENT -->
            <div class="circular-content relative z-10">

                <h3 id="circularTitle" class="mb-5 text-xl font-bold leading-tight text-title_Clr sm:text-2xl">
                    <?php echo esc_html($circular_slides[0]['title']); ?>
                </h3>

                <!-- Description -->
                <div id="circularDescription" class="space-y-4 text-sm leading-6 text-txt_Clr md:text-base">

                    <?php foreach ($circular_slides[0]['description'] as $paragraph): ?>
                        <p><?php echo esc_html($paragraph); ?></p>
                    <?php endforeach; ?>

                </div>

                <!-- Learn More Button -->
                <a id="circularLearnMore" href="<?php echo esc_url($circular_slides[0]['link']); ?>"
                    class="btn_secondry flex items-center gap-2 sm:mt-12 mt-6 w-fit">

                    Learn more

                    <span class="flex h-7 w-7 items-center justify-center rounded-full bg-[#00baff]">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14m-7-7 7 7-7 7" />
                        </svg>

                    </span>

                </a>

            </div>

            <!-- RIGHT CIRCULAR SLIDER -->
            <div class="circular-visual relative mx-auto w-full">

                <!-- CSS Circle Outline -->
                <div class="circular-outline"></div>

                <!-- Main Circular Image -->
                <div class="circular-main-image">

                    <img id="circularMainImage" src="<?php echo esc_url($circular_slides[0]['image']); ?>"
                        alt="Forestry" width="1000" height="1000">

                </div>

                <!-- Navigation Arrows -->
                <div class="circular-navigation absolute right-[16%] top-[7%] z-30 flex items-center gap-2">

                    <button type="button" id="circularPrev" aria-label="Previous slide">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 12H5m7 7-7-7 7-7" />
                        </svg>

                    </button>

                    <button type="button" id="circularNext" aria-label="Next slide">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14m-7-7 7 7-7 7" />
                        </svg>

                    </button>

                </div>

                <!-- Small Circular Images -->
                <div id="circularTopics" class="absolute inset-0 z-20">

                    <?php
                    $positions = ['topic-one', 'topic-two', 'topic-three'];

                    for ($i = 1; $i <= 3; $i++):
                        $topic = $circular_slides[$i];
                        ?>

                        <button type="button" data-slide-index="<?php echo esc_attr($i); ?>"
                            class="circular-topic <?php echo esc_attr($positions[$i - 1]); ?>">

                            <span class="circular-topic-image">

                                <img src="<?php echo esc_url($topic['image']); ?>"
                                    alt="<?php echo esc_attr($topic['title']); ?>" width="300" height="300">

                            </span>
                        </button>

                    <?php endfor; ?>

                </div>

            </div>

        </div>

    </div>

</section>
<?php
$theme_uri = get_template_directory_uri();

$circular_slides = [
    [
        'title' => 'Custom Packaging',
        'image' => $theme_uri . '/assets/images/design/1.png',
        'description' => [
            'Hale Path Packaging delivers custom boxes and bespoke packaging solutions for small to large businesses across the UK. Every order is tailored to your brand, product and budget.',
            'From e-commerce mailers and shipping boxes to luxury retail packaging, we create packaging that protects your products while making your brand stand out.',
            'Our custom packaging solutions combine quality materials, creative designs and practical functionality to deliver packaging that makes a lasting impression.'
        ],
        'link' => '#'
    ],
    [
        'title' => 'Printing & Finishes',
        'image' => $theme_uri . '/assets/images/design/2.png',
        'description' => [
            'Bring your packaging designs to life with high-quality printing and premium finishing options from Hale Path Packaging.',
            'Choose from digital, offset, flexographic and screen printing, along with special finishes such as foil stamping, embossing, debossing and spot UV.',
            'We help businesses create visually appealing packaging that reflects their brand identity and delivers a memorable unboxing experience.'
        ],
        'link' => '#'
    ],
    [
        'title' => 'Sustainable Packaging',
        'image' => $theme_uri . '/assets/images/design/3.png',
        'description' => [
            'We offer packaging solutions using responsibly selected materials to help businesses make more environmentally conscious packaging choices.',
            'Explore recyclable paperboard, corrugated cardboard and other material options designed to balance product protection, durability and presentation.',
            'Our goal is to help UK businesses reduce unnecessary packaging waste while maintaining the quality and appearance their products deserve.'
        ],
        'link' => '#'
    ],
    [
        'title' => 'Packaging Solutions',
        'image' => $theme_uri . '/assets/images/design/4.png',
        'description' => [
            'From product packaging and retail boxes to flexible packaging and e-commerce mailers, Hale Path Packaging provides solutions for a wide range of industries.',
            'Whether you need packaging for cosmetics, food, gifts, electronics or everyday products, we customize every order around your specific requirements.',
            'From initial design to final production, we help turn your packaging ideas into practical, high-quality solutions that fit your brand and budget.'
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
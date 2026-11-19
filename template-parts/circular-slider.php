<?php
$theme_uri = get_template_directory_uri();

$circular_slides = [
    [
        'title' => 'Eco-Conscious Packaging Choices',
        'image' => $theme_uri . '/assets/images/circular/forestry.png',
        'description' => [
            "Better packaging choices don't have to cost the earth. We offer materials chosen with the environment in mind, including recyclable paperboard and corrugated cardboard, so you can go greener without losing strength or good looks.",
            "We want to help UK businesses cut down on packaging waste. That means the right amount of material, in the right size, doing its job properly.",
        ],
        'link' => '#'
    ],
    [
        'title' => 'Made-to-Order Boxes for Your Brand',
        'image' => $theme_uri . '/assets/images/circular/packaging.png',
        'description' => [
            "We make custom boxes for UK businesses, from small start-ups to large brands. Every order is built around your brand, your product, and your budget.",
            "That could be an e-commerce mailer, a shipping box, or a premium retail box. Whatever it is, it should protect what's inside and help your brand get noticed. We use good materials and practical designs, so the box works as well as it looks.",
        ],
        'link' => '#'
    ],
    [
        'title' => 'Recyclable Packaging for Every Industry',
        'image' => $theme_uri . '/assets/images/circular/recycling.png',
        'description' => [
            "We supply eco-friendly & recyclable packaging for many different industries, including product packaging, retail boxes, flexible packaging, and e-commerce mailers.",
            "Whether you sell cosmetics, food, gifts, electronics, or everyday goods, we tailor your order to what you need. We'll work with you from the first design idea to final production, so the result suits your brand and your budget.",
        ],
        'link' => '#'
    ],
    [
        'title' => 'Forestry and Renewable Paper Fibre',
        'image' => $theme_uri . '/assets/images/circular/paper.png',
        'description' => [
            "Paper and board start with wood fibre, and wood is a renewable raw material. It can be replanted and regrown. Packaging made from it can be recycled, and in the right conditions it breaks down naturally.",
            "Well-managed forestry matters because it keeps that supply going for the long term. It also protects wildlife habitats and supports the communities that depend on forests. That's one reason we favour paper-based packaging where it suits the product.",
            "If responsible sourcing matters to you, ask us about your options, and we'll talk you through them."
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
                Packaging Made to Be Recycled and Used Again
            </h2>

            <p class="mt-2 text-sm leading-6 text-txt_Clr md:text-base">
                Packaging shouldn't end up as waste after one use. Wherever the product allows, we choose renewable,
                recyclable materials, so more of what we make can be recycled and used again.
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
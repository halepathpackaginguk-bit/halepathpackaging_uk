<?php
// Get ACF Repeater
$material_tabs = get_field('material_tabs') ?: [];
?>

<section class="bg-gray-50 py-12 sm:px-6 lg:py-16">
    <div class="mx-auto container px-4">

        <!-- Section Heading -->
        <div class="mx-auto mb-7 max-w-2xl text-center">
            <h2 class="h2">
                Finishing & Material Options
            </h2>

            <p class="sm:text-lg text-sm font-normal text-txt_Clr text-center md:w-5/6 mx-auto">
                Choose from premium coating, board, printing and finishing options for your insert boxes.
            </p>
        </div>

        <?php if (!empty($material_tabs)): ?>

            <!-- Category Tabs -->
            <div class="finishing-tabs mb-8 flex flex-wrap items-center justify-center gap-2" role="tablist"
                aria-label="Finishing categories">

                <?php $first_category = true; ?>

                <?php foreach ($material_tabs as $tab):

                    $category_name = $tab['name'] ?? '';
                    $category_slug = sanitize_title($category_name);

                    if (empty($category_name)) {
                        continue;
                    }
                    ?>

                    <button type="button" role="tab" id="finishing-tab-<?php echo esc_attr($category_slug); ?>"
                        aria-controls="finishing-panel" aria-selected="<?php echo $first_category ? 'true' : 'false'; ?>"
                        data-category="<?php echo esc_attr($category_slug); ?>"
                        class="finishing-tab rounded-full border border-primary/20 px-3 py-2 text-xs font-semibold transition duration-200 sm:text-sm <?php echo $first_category ? 'is-active bg-secondary text-white' : 'bg-white text-secondary'; ?>">

                        <?php echo esc_html($category_name); ?>

                    </button>

                    <?php $first_category = false; ?>

                <?php endforeach; ?>

            </div>

            <!-- Finishing Cards -->
            <div id="finishing-panel" class="finishing-grid grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4"
                role="tabpanel" aria-live="polite">

                <?php foreach ($material_tabs as $tab):

                    $category_name = $tab['name'] ?? '';
                    $category_slug = sanitize_title($category_name);

                    // Get Relationship Products
                    // ACF Return Format: Post ID
                    $products = $tab['tabs_products'] ?? [];

                    if (empty($products)) {
                        continue;
                    }

                    // Reset card counter for every tab
                    $card_index = 0;

                    foreach ($products as $product):

                        // Support both Post ID and Post Object
                        $product_id = is_object($product)
                            ? $product->ID
                            : $product;

                        if (!$product_id || get_post_status($product_id) !== 'publish') {
                            continue;
                        }

                        // Product Information
                        $title = get_the_title($product_id);

                        // Product Featured Image
                        $image_url = get_the_post_thumbnail_url(
                            $product_id,
                            'large'
                        );

                        // Fallback Image
                        if (empty($image_url)) {
                            $image_url = get_template_directory_uri() . '/assets/images/tab1.webp';
                        }

                        // Product Description
                        $description = get_field('short_description', $product_id);

                        // Support your existing ACF field spelling too
                        if (empty($description)) {
                            $description = get_field('short_desription', $product_id);
                        }

                        // Fallback to Product Excerpt
                        if (empty($description)) {
                            $description = get_the_excerpt($product_id);
                        }

                        // Product URL
                        $product_link = get_permalink($product_id);

                        ?>

                        <?php if ($card_index < 2): ?>

                            <!-- Featured Cards -->
                            <article
                                class="finishing-card relative col-span-1 min-h-[390px] overflow-visible rounded-2xl bg-[#06245f] p-6 text-white sm:p-8 lg:col-span-2"
                                data-category="<?php echo esc_attr($category_slug); ?>">

                                <!-- Product Image -->
                                <div class="sm:absolute -mt-12 right-2 z-10 w-[35%] sm:right-5">

                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>"
                                        class="w-full rounded-2xl" width="175" height="175" loading="lazy">

                                </div>

                                <!-- Product Details -->
                                <div class="relative z-20 max-w-[65%] sm:max-w-[60%]">

                                    <span class="text-[11px] font-bold uppercase tracking-wide text-[#00c3ff]">
                                        <?php echo esc_html($category_name); ?>
                                    </span>

                                    <h3 class="mt-2 text-xl font-bold leading-tight sm:text-[22px]">
                                        <?php echo esc_html($title); ?>
                                    </h3>

                                    <a href="<?php echo esc_url($product_link); ?>"
                                        class="mt-3 flex h-8 w-8 items-center justify-center rounded-full bg-[#00baff] transition-all hover:bg-white hover:text-[#06245f]"
                                        aria-label="<?php echo esc_attr('View ' . $title); ?>">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">

                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 12h14m-7-7 7 7-7 7" />

                                        </svg>

                                    </a>

                                </div>

                                <!-- Description -->
                                <p class="relative z-20 mt-20 text-[15px] font-normal leading-6">
                                    <?php echo esc_html(wp_strip_all_tags($description)); ?>
                                </p>

                            </article>

                        <?php else: ?>

                            <!-- Normal Product Cards -->
                            <article
                                class="finishing-card col-span-1 rounded-xl border border-secondary/20 bg-white p-3 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md"
                                data-category="<?php echo esc_attr($category_slug); ?>">

                                <!-- Product Image -->
                                <div class="mb-3 flex h-[295px] items-center justify-center overflow-hidden rounded-lg bg-secondary/10">

                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>"
                                        class="h-full w-full object-cover" loading="lazy">

                                </div>

                                <!-- Product Title -->
                                <h3 class="mb-2 text-center text-base font-bold text-title_Clr sm:text-lg">
                                    <?php echo esc_html($title); ?>
                                </h3>

                                <!-- Product Description -->
                                <p class="text-center text-sm leading-6 text-txt_Clr">
                                  <?php echo esc_html(wp_strip_all_tags($description)); ?>
                                </p>

                            </article>

                        <?php endif; ?>

                        <?php
                        $card_index++;

                    endforeach;

                endforeach;
                ?>

            </div>

        <?php else: ?>

            <p class="text-center text-gray-500">
                No material tabs found. Please add them in ACF.
            </p>

        <?php endif; ?>

    </div>
</section>

<!-- Tabs JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const tabContainers = document.querySelectorAll('.finishing-tabs');

        tabContainers.forEach(function (tabContainer) {

            const section = tabContainer.closest('section');

            if (!section) return;

            const tabs = Array.from(
                tabContainer.querySelectorAll('.finishing-tab')
            );

            const cards = Array.from(
                section.querySelectorAll('.finishing-card')
            );

            function activateTab(activeTab) {

                const category = activeTab.dataset.category;

                tabs.forEach(function (tab) {

                    const isActive = tab === activeTab;

                    tab.classList.toggle('is-active', isActive);
                    tab.setAttribute('aria-selected', String(isActive));

                    tab.classList.toggle('bg-secondary', isActive);
                    tab.classList.toggle('text-white', isActive);

                    tab.classList.toggle('bg-white', !isActive);
                    tab.classList.toggle('text-secondary', !isActive);

                });

                cards.forEach(function (card) {

                    const matches = card.dataset.category === category;

                    card.hidden = !matches;

                });

            }

            tabs.forEach(function (tab, index) {

                tab.addEventListener('click', function () {
                    activateTab(tab);
                });

                tab.addEventListener('keydown', function (event) {

                    let nextIndex = index;

                    if (event.key === 'ArrowRight') {
                        nextIndex = (index + 1) % tabs.length;
                    } else if (event.key === 'ArrowLeft') {
                        nextIndex = (index - 1 + tabs.length) % tabs.length;
                    } else if (event.key === 'Home') {
                        nextIndex = 0;
                    } else if (event.key === 'End') {
                        nextIndex = tabs.length - 1;
                    } else {
                        return;
                    }

                    event.preventDefault();

                    tabs[nextIndex].focus();
                    activateTab(tabs[nextIndex]);

                });

            });

            if (tabs.length > 0) {
                activateTab(tabs[0]);
            }

        });

    });
</script>

<style>
    .finishing-card[hidden] {
        display: none !important;
    }
</style>
<?php
// Get the ACF Repeater field
$material_tabs = get_field('material_tabs');

// Default fallback in case there are no tabs
if (!$material_tabs) {
    $material_tabs = [];
}
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
    <div class="finishing-tabs mb-8 flex flex-wrap items-center justify-center gap-2"
        role="tablist"
        aria-label="Finishing categories">

        <?php $first_category = true; ?>

        <?php foreach ($material_tabs as $tab):
            $category_slug = sanitize_title($tab['name']);
        ?>

            <button
                type="button"
                role="tab"
                id="finishing-tab-<?php echo esc_attr($category_slug); ?>"
                aria-controls="finishing-panel"
                aria-selected="<?php echo $first_category ? 'true' : 'false'; ?>"
                data-category="<?php echo esc_attr($category_slug); ?>"
                class="finishing-tab rounded-full border border-primary/20 px-3 py-2 text-xs font-semibold transition duration-200 sm:text-sm <?php echo $first_category ? 'is-active bg-secondary text-white' : 'bg-white text-secondary'; ?>">

                <?php echo esc_html($tab['name']); ?>

            </button>

            <?php $first_category = false; ?>

        <?php endforeach; ?>

    </div>


    <!-- Finishing Cards -->
    <div id="finishing-panel"
        class="finishing-grid grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4"
        role="tabpanel"
        aria-live="polite">

        <?php
        foreach ($material_tabs as $tab):

            $category_slug = sanitize_title($tab['name']);
            $products_data = $tab['products_data'] ?? [];

            if (!empty($products_data)):

                // Reset the counter for every tab so each tab uses the
                // exact same card layout (2 featured + normal cards).
                $card_index = 0;

                foreach ($products_data as $option):

                    // Get Image URL
                    $image_url = '';

                    if (!empty($option['image'])) {

                        $image_url = is_array($option['image'])
                            ? ($option['image']['url'] ?? '')
                            : $option['image'];

                    }

                    // Fallback Image
                    if (empty($image_url)) {
                        $image_url = get_template_directory_uri() . '/assets/images/tab1.webp';
                    }

                    // Product Details
                    $title = $option['title'] ?? '';
                    $description = $option['short_desription'] ?? '';

                    ?>

                    <?php if ($card_index < 2): ?>

                        <!-- Featured Card 1 & 2 -->
                        <article
                            class="finishing-card relative col-span-1 min-h-[390px] overflow-visible rounded-2xl bg-[#06245f] p-6 text-white sm:p-8 lg:col-span-2"
                            data-category="<?php echo esc_attr($category_slug); ?>">

                            <!-- Product Image -->
                            <div class="sm:absolute -mt-12 right-2 z-10 w-[45%] sm:right-5">

                                <img
                                    src="<?php echo esc_url($image_url); ?>"
                                    alt="<?php echo esc_attr($title); ?>"
                                    class="w-full"
                                    width="175"
                                    height="175"
                                    loading="lazy">

                            </div>

                            <!-- Heading & Button -->
                            <div class="relative z-20 max-w-[65%] sm:max-w-[60%]">

                                <span class="text-[11px] font-bold uppercase tracking-wide text-[#00c3ff]">
                                    <?php echo esc_html($tab['name']); ?>
                                </span>

                                <h3 class="mt-2 text-xl font-bold leading-tight sm:text-[22px]">
                                    <?php echo esc_html($title); ?>
                                </h3>

                                <a
                                    href="#"
                                    class="mt-3 flex h-8 w-8 items-center justify-center rounded-full bg-[#00baff] transition-all hover:bg-white hover:text-[#06245f]"
                                    aria-label="<?php echo esc_attr('View ' . $title); ?>">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 12h14m-7-7 7 7-7 7" />

                                    </svg>

                                </a>

                            </div>

                            <!-- Description -->
                            <p class="relative z-20 mt-10 text-[15px] font-normal leading-6">

                                <?php echo esc_html($description); ?>

                            </p>

                        </article>

                    <?php else: ?>

                        <!-- Normal Cards (Remaining Products) -->
                        <article
                            class="finishing-card col-span-1 rounded-xl border border-secondary/20 bg-white p-3 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md"
                            data-category="<?php echo esc_attr($category_slug); ?>">

                            <!-- Product Image -->
                            <div class="mb-3 flex h-[295px] items-center justify-center overflow-hidden rounded-lg bg-secondary/10">

                                <img
                                    src="<?php echo esc_url($image_url); ?>"
                                    alt="<?php echo esc_attr($title); ?>"
                                    class="h-full w-full object-cover"
                                    loading="lazy">

                            </div>

                            <!-- Product Title -->
                            <h3 class="mb-2 text-center text-base font-bold text-title_Clr sm:text-lg">

                                <?php echo esc_html($title); ?>

                            </h3>

                            <!-- Product Description -->
                            <p class="text-center text-sm leading-6 text-txt_Clr">

                                <?php echo esc_html($description); ?>

                            </p>

                        </article>

                    <?php endif; ?>

                    <?php
                    $card_index++;

                endforeach;

            endif;

        endforeach;
        ?>

    </div>

<?php else: ?>

    <p class="text-center text-gray-500">
        No material tabs found. Please add them in the ACF options.
    </p>

<?php endif; ?>


    </div>
</section>

<!-- The JavaScript remains exactly the same as your original -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabContainers = document.querySelectorAll('.finishing-tabs');

        tabContainers.forEach(function (tabContainer) {
            const section = tabContainer.closest('section');

            if (!section) {
                return;
            }

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
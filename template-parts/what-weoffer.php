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
            <div class="finishing-tabs mb-8 flex flex-wrap items-center justify-center gap-2" role="tablist"
                aria-label="Finishing categories">
                <?php $first_category = true; ?>

                <?php foreach ($material_tabs as $tab): 
                    // Create a safe slug for the data-category attribute based on the tab name
                    $category_slug = sanitize_title($tab['name']);


                ?>
                    <button type="button" role="tab" id="finishing-tab-<?php echo esc_attr($category_slug); ?>"
                        aria-controls="finishing-panel" aria-selected="<?php echo $first_category ? 'true' : 'false'; ?>"
                        data-category="<?php echo esc_attr($category_slug); ?>"
                        class="finishing-tab rounded-full border border-primary/20 px-3 py-2 text-xs font-semibold transition duration-200 sm:text-sm <?php echo $first_category ? 'is-active bg-secondary text-white' : 'bg-white text-secondary'; ?>">
                        <?php echo esc_html($tab['name']); ?>
                    </button>

                    <?php $first_category = false; ?>
                <?php endforeach; ?>
            </div>

            <!-- Finishing Cards -->
            <div id="finishing-panel" class="finishing-grid grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4"
                role="tabpanel" aria-live="polite">
                
                <?php foreach ($material_tabs as $tab): 
                    $category_slug = sanitize_title($tab['name']);
                    $products_data = $tab['products_data'];

                  
                    
                    if ($products_data): 
                        foreach ($products_data as $option): 
                            // ACF Image Field returns an Array or URL depending on settings. 
                            // Array is assumed here.
                            $image_url = is_array($option['image']) ? $option['image']['url'] : $option['image'];
                            
                            // Fallback image if empty
                            if (!$image_url) {
                                $image_url = get_template_directory_uri() . '/assets/images/tab1.webp'; // Use a default placeholder
                            }
                ?>
                            <article
                                class="finishing-card rounded-xl border border-secondary/20 bg-white p-3 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md"
                                data-category="<?php echo esc_attr($category_slug); ?>">
                                <div class="mb-3 flex h-[295px] items-center justify-center overflow-hidden rounded-lg bg-secondary/10">
                                    <img src="<?php echo esc_url($image_url); ?>"
                                        alt="<?php echo esc_attr($option['title']); ?>" class="h-full w-full object-cover"
                                        loading="lazy">
                                </div>

                                <h3 class="mb-2 text-center text-base font-bold text-title_Clr sm:text-lg">
                                    <?php echo esc_html($option['title']); ?>
                                </h3>

                                <p class="text-center text-sm leading-6 text-txt_Clr">
                                    <?php //echo esc_html($option['short_description']); ?>
                                </p>
                            </article>
                        <?php 
                        endforeach; 
                    endif; 
                endforeach; ?>

            </div>

        <?php else: ?>
            <p class="text-center text-gray-500">No material tabs found. Please add them in the ACF options.</p>
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
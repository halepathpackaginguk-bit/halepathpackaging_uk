<?php
/**
 * Reusable FAQ section: searchable question list (left) + answer panel (right).
 *
 * Expected $args:
 * - faqs         (array)  List of ['question' => string, 'answer' => string].
 * - id           (string) Section id. Default 'faqs'.
 * - heading      (string) Plain heading text.
 * - heading_html (string) Optional heading HTML (overrides $heading).
 * - subheading   (string) Optional intro text.
 * - cta_text     (string) Optional bottom link text.
 * - cta_url      (string) Bottom link URL.
 * - class        (string) Extra classes for the <section>.
 */

$faqs = $args['faqs'] ?? [];

$faqs = array_values(array_filter($faqs, static function ($faq) {
    return !empty($faq['question']);
}));

if (empty($faqs)) {
    return;
}

$section_id = $args['id'] ?? 'faqs';
$heading = $args['heading'] ?? 'Frequently Asked Questions';
$heading_html = $args['heading_html'] ?? '';
$subheading = $args['subheading'] ?? '';
$cta_text = $args['cta_text'] ?? '';
$cta_url = $args['cta_url'] ?? '#custom-packaging-quote';
$extra_class = $args['class'] ?? '';

$uid = wp_unique_id('faq-');
?>

<section id="<?php echo esc_attr($section_id); ?>"
    class="bg-[#f5f5f5] py-16 sm:py-20 <?php echo esc_attr($extra_class); ?>"
    data-faq-root="<?php echo esc_attr($uid); ?>">
    <div class="container mx-auto px-4">

        <!-- Heading -->
        <div class="mb-7 text-center">
            <h2 class="md:text-5xl text-3xl text-title_Clr tracking-tight">
                <?php echo $heading_html ? wp_kses_post($heading_html) : esc_html($heading); ?>
            </h2>

            <?php if ($subheading): ?>
                <p class="mt-4 text-lg text-title_Clr leading-relaxed">
                    <?php echo esc_html($subheading); ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- FAQ Container -->
        <div class="mx-auto">

            <div class="grid gap-0 lg:grid-cols-5">

                <!-- LEFT -->
                <div class="relative z-10 lg:col-span-3">

                    <!-- Search -->
                    <div class="mb-3 flex h-[45px] items-center bg-white px-4">
                        <svg class="mr-3 h-[17px] w-[17px] shrink-0 text-[#333]" fill="none" stroke="currentColor"
                            stroke-width="1.5" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="m20 20-4-4"></path>
                        </svg>

                        <label for="<?php echo esc_attr($uid); ?>-search" class="sr-only">Search FAQs</label>
                        <input id="<?php echo esc_attr($uid); ?>-search" type="text"
                            placeholder="Search something you wonder"
                            class="faq-search w-full bg-transparent text-sm text-[#222] outline-none placeholder:text-[#b6b6b6]">
                    </div>

                    <!-- FAQ List -->
                    <div class="overflow-hidden rounded-b-[14px] bg-white">

                        <?php foreach ($faqs as $index => $faq): ?>
                            <button type="button"
                                class="faq-item group flex min-h-[57px] w-full items-center gap-3 px-3 text-left transition-colors duration-200 <?php echo $index === 0 ? 'bg-gray-200' : 'bg-white hover:bg-gray-200'; ?>"
                                data-index="<?php echo esc_attr($index); ?>"
                                data-question="<?php echo esc_attr(strtolower((string) $faq['question'])); ?>"
                                data-answer="<?php echo esc_attr((string) $faq['answer']); ?>">

                                <!-- Dot -->
                                <span
                                    class="faq-dot flex h-[18px] w-[18px] shrink-0 rounded-full <?php echo $index === 0 ? 'bg-gray-400' : 'bg-gray-300'; ?>"></span>

                                <!-- Question -->
                                <span class="faq-question flex-1 text-lg leading-5 text-[#171717]">
                                    <?php echo esc_html($faq['question']); ?>
                                </span>

                                <!-- Arrow -->
                                <svg class="faq-arrow h-5 w-5 shrink-0 text-primary transition-transform duration-200"
                                    fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path d="m9 18 6-6-6-6"></path>
                                </svg>

                            </button>
                        <?php endforeach; ?>

                        <!-- No results -->
                        <p class="faq-no-results hidden px-4 py-6 text-center text-sm text-txt_Clr">
                            No FAQs found. Try a different keyword.
                        </p>
                    </div>

                    <?php if ($cta_text): ?>
                        <!-- Bottom CTA -->
                        <div class="mt-3">
                            <a href="<?php echo esc_url($cta_url); ?>"
                                class="text-[13px] text-secondary transition hover:text-primary">
                                <?php echo esc_html($cta_text); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>

                <!-- RIGHT ANSWER -->
                <div
                    class="min-h-[490px] rounded-[14px] bg-gray-200 px-8 py-8 lg:col-span-2 lg:-ml-[34px] lg:pl-[72px]">

                    <div class="max-w-[310px]">

                        <h3 class="faq-answer-title text-lg text-title_Clr">
                            <?php echo esc_html($faqs[0]['question']); ?>
                        </h3>

                        <div class="faq-answer-text mt-5 md:text-xl text-lg leading-[21px] text-txt_Clr">
                            <?php echo wp_kses_post($faqs[0]['answer']); ?>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

<?php if (empty($GLOBALS['hale_faq_script_printed'])):
    $GLOBALS['hale_faq_script_printed'] = true; ?>
    <script>
        jQuery(document).ready(function ($) {
            $('[data-faq-root]').each(function () {
                var $root = $(this);
                var $items = $root.find('.faq-item');
                var $input = $root.find('.faq-search');
                var $title = $root.find('.faq-answer-title');
                var $text = $root.find('.faq-answer-text');
                var $noResults = $root.find('.faq-no-results');
                var activeIndex = 0;

                if (!$items.length) {
                    return;
                }

                function select($item) {
                    activeIndex = $items.index($item);

                    $items.each(function (i) {
                        var active = i === activeIndex;
                        $(this)
                            .toggleClass('bg-gray-200', active)
                            .toggleClass('bg-white', !active);
                        $(this).find('.faq-dot')
                            .toggleClass('bg-gray-400', active)
                            .toggleClass('bg-gray-300', !active);
                        $(this).find('.faq-arrow')
                            .toggleClass('rotate-90', active);
                    });

                    $title.html($item.find('.faq-question').html());
                    $text.html($item.attr('data-answer'));
                }

                $items.on('click', function () {
                    select($(this));
                });

                function search() {
                    var term = $.trim($input.val()).toLowerCase();
                    var $visible = $();

                    $items.each(function () {
                        var $item = $(this);
                        var question = String($item.attr('data-question') || '').toLowerCase();
                        var answer = String($item.attr('data-answer') || '').toLowerCase();
                        var match = term === '' || question.indexOf(term) !== -1 || answer.indexOf(term) !== -1;

                        $item.toggleClass('hidden', !match);
                        if (match) {
                            $visible = $visible.add($item);
                        }
                    });

                    // Keep the selected item visible; otherwise select the first match.
                    if ($visible.length && $items.eq(activeIndex).hasClass('hidden')) {
                        select($visible.first());
                    }

                    $noResults.toggleClass('hidden', term === '' || $visible.length > 0);
                }

                $input.on('input', search);
                $input.on('keydown', function (e) {
                    if (e.key === 'Escape') {
                        $(this).val('').trigger('input');
                    }
                });

                // Highlight the first item on load.
                select($items.first());
            });
        });
    </script>
<?php endif; ?>
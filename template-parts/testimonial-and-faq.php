<?php
$faqRes = [];

if (have_rows('faqs_sections')):
    while (have_rows('faqs_sections')):
        the_row();

        $faqRes[] = [
            'question' => get_sub_field('title'),
            'answer' => get_sub_field('description'),
        ];

    endwhile;
endif;

if (!empty($faqRes)):
    ?>

    <section id="faqs" class="bg-[#f5f5f5] py-16 sm:py-20">
        <div class="mx-auto max-w-[1240px] px-5">

            <!-- Heading -->
            <div class="mb-7 text-center">
                <h2 class="md:text-5xl text-3xl text-title_Clr tracking-tight">
                    Frequently Asked Questions
                </h2>

                <p class="mt-4 text-lg text-title_Clr leading-relaxed">
                    Looking for more information about Hale Path Packaging? You can find it here.
                </p>
            </div>

            <!-- FAQ Container -->
            <div class="mx-auto">

                <div class="grid gap-0 lg:grid-cols-[60%_40%]">

                    <!-- LEFT -->
                    <div class="relative z-10">

                        <!-- Search -->
                        <div class="mb-3 flex h-[45px] items-center bg-white px-4">
                            <svg class="mr-3 h-[17px] w-[17px] shrink-0 text-[#333]" fill="none"
                                stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="7"></circle>
                                <path d="m20 20-4-4"></path>
                            </svg>

                            <label for="faqSearch" class="sr-only">Search FAQs</label>
                            <input id="faqSearch" type="text" placeholder="Search something you wonder"
                                class="w-full bg-transparent text-sm text-[#222] outline-none placeholder:text-[#b6b6b6]">
                        </div>

                        <!-- FAQ List -->
                        <div id="faqList" class="overflow-hidden rounded-b-[14px] bg-white">

                            <?php foreach ($faqRes as $index => $faq): ?>
                                <button type="button"
                                    class="faq-item group flex min-h-[57px] w-full items-center gap-3 px-3 py-2 text-left transition-colors duration-200 <?php echo $index === 0 ? 'bg-gray-200' : 'bg-white hover:bg-gray-200'; ?>"
                                    data-index="<?php echo esc_attr($index); ?>"
                                    data-question="<?php echo esc_attr(strtolower((string) $faq['question'])); ?>"
                                    data-answer="<?php echo esc_attr((string) $faq['answer']); ?>">

                                    <!-- Dot -->
                                    <span
                                        class="faq-dot flex h-[18px] w-[18px] shrink-0 rounded-full <?php echo $index === 0 ? 'bg-gray-400' : 'bg-gray-300'; ?>"></span>

                                    <!-- Question -->
                                    <span class="faq-question flex-1 text-base leading-5 text-[#171717]">
                                        <?php echo esc_html($faq['question']); ?>
                                    </span>

                                    <!-- Arrow -->
                                    <svg
                                        class="faq-arrow h-5 w-5 shrink-0 text-primary transition-transform duration-200"
                                        fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>

                                </button>
                            <?php endforeach; ?>

                            <!-- No results -->
                            <p id="faqNoResults" class="hidden px-4 py-6 text-center text-sm text-txt_Clr">
                                No FAQs found. Try a different keyword.
                            </p>
                        </div>

                        <!-- Bottom CTA -->
                        <div class="mt-3">
                            <a href="#custom-packaging-quote"
                                class="text-[13px] text-secondary transition hover:text-primary">
                                Still deciding on your packaging? Get your free custom quote today!
                            </a>
                        </div>

                    </div>

                    <!-- RIGHT ANSWER -->
                    <div id="faqAnswer"
                        class="min-h-[490px] rounded-[14px] bg-gray-200 px-8 py-8 lg:-ml-[34px] lg:pl-[72px]">

                        <div class="max-w-[310px]">

                            <h3 id="answerTitle" class="text-lg text-title_Clr">
                                <?php echo esc_html($faqRes[0]['question']); ?>
                            </h3>

                            <div id="answerText" class="mt-5 md:text-xl text-lg leading-[21px] text-txt_Clr">
                                <?php echo wp_kses_post($faqRes[0]['answer']); ?>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

    <script>
        jQuery(document).ready(function ($) {
            var $items = $('#faqList').find('.faq-item');
            var $input = $('#faqSearch');
            var $title = $('#answerTitle');
            var $text = $('#answerText');
            var $noResults = $('#faqNoResults');
            var activeIndex = 0;

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
        });
    </script>
<?php endif; ?>

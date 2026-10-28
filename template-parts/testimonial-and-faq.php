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
?>

<section class="py-[60px] bg-[#F5F5F5]">
    <div class="hale_container grid md:grid-cols-1 gap-6">

        <div id="faqs" class="pt-8">
            <h2 class="h2">
                Frequently Asked <span class="text-[#47AFC3]">Questions</span>
            </h2>

            <div class="mt-10 grid gap-1 md:grid-cols-2 grid-cols-1">
                <?php foreach ($faqRes as $idx => $faq): ?>
                    <div>
                        <div class="faq-item">

                            <h3 class="faq-title">
                                <?php echo esc_html($faq['question']); ?>

                                <span class="text-xl">
                                    <i class="fa fa-chevron-down"></i>
                                </span>
                            </h3>

                            <div class="faq-content max-h-0 overflow-hidden transition-all duration-200">
                                <div>
                                    <?php echo wp_kses_post($faq['answer']); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>

<script>
    jQuery(document).ready(function ($) {
        $('.faq-title').on('click', function () {
            const parent = $(this).closest('.faq-item');
            const content = parent.find('.faq-content');

            // Close other FAQs
            $('.faq-item').not(parent)
                .find('.faq-content')
                .removeClass('max-h-[300px]')
                .addClass('max-h-0');

            // Toggle current FAQ
            if (content.hasClass('max-h-0')) {
                content.removeClass('max-h-0').addClass('max-h-[300px]');
            } else {
                content.removeClass('max-h-[300px]').addClass('max-h-0');
            }
        });
    });
</script>
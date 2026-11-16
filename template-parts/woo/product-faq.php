<?php
/**
 * Product page FAQs (ACF repeater: faqs_sections).
 */

$product_faqs = [];

if (have_rows('faqs_sections')):
    while (have_rows('faqs_sections')):
        the_row();

        $question = get_sub_field('title');
        $answer = get_sub_field('description');

        if (!$question) {
            continue;
        }

        $product_faqs[] = [
            'question' => $question,
            'answer' => $answer,
        ];

    endwhile;
endif;

if (!empty($product_faqs)):
    get_template_part('template-parts/faq-accordion', null, [
        'faqs' => $product_faqs,
        'id' => 'faqs-section',
        'heading_html' => 'Frequently Asked <span class="text-[#47AFC3]">Questions</span>',
        'class' => 'mt-28',
    ]);
endif;

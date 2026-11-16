<?php
/**
 * Homepage testimonials + FAQ section.
 */

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
    get_template_part('template-parts/faq-accordion', null, [
        'faqs' => $faqRes,
        'id' => 'faqs',
        'heading' => 'Frequently Asked Questions',
        'subheading' => 'Looking for more information about Hale Path Packaging? You can find it here.',
        'cta_text' => 'Still deciding on your packaging? Get your free custom quote today!',
        'cta_url' => '#custom-packaging-quote',
    ]);
endif;

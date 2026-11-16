<?php
/**
 * Category page FAQs (ACF repeater: faqs_sections on product_cat).
 */

$cat_faqs = $args['cat_faqs'] ?? [];

if (empty($cat_faqs)) {
    return;
}

$faqs = array();
$faq_schema = array(
    '@context'   => 'https://schema.org',
    '@type'      => 'FAQPage',
    'mainEntity' => array(),
);

foreach ($cat_faqs as $faq) {
    $question = $faq['title'] ?? '';
    $answer   = $faq['description'] ?? '';

    if (!$question) {
        continue;
    }

    $faqs[] = array(
        'question' => $question,
        'answer'   => $answer,
    );

    $faq_schema['mainEntity'][] = array(
        '@type'          => 'Question',
        'name'           => $question,
        'acceptedAnswer' => array(
            '@type' => 'Answer',
            'text'  => $answer,
        ),
    );
}

if (empty($faqs)) {
    return;
}
?>

<script type="application/ld+json">
<?php echo json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
</script>

<?php
get_template_part('template-parts/faq-accordion', null, [
    'faqs' => $faqs,
    'id' => 'faqs-section',
    'heading_html' => 'Frequently Asked <span class="text-[#47AFC3]">Questions</span>',
    'class' => 'mt-28',
]);

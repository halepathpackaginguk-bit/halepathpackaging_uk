<?php 

$cat_faqs = $args['cat_faqs'] ?? [];

if (!empty($cat_faqs)) :

    $faq_schema = array(
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => array()
    );

    foreach ($cat_faqs as $faq) {
        $question = $faq['title'] ?? '';
        $answer   = $faq['description'] ?? '';
        if (!$question) continue;

        $faq_schema['mainEntity'][] = array(
            '@type'          => 'Question',
            'name'           => $question,
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text'  => $answer
            )
        );
    }

    if (!empty($faq_schema['mainEntity'])) :
?>
<script type="application/ld+json">
<?php echo json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
</script>

<section class="bg-[#F5F5F5] py-20 mt-28" id="faqs-section">
    <div class="hale_container gap-6">

        <div id="faqs" class="pt-8">
            <h2 class="h2">
                Frequently Asked <span class="text-[#47AFC3]">Questions</span>
            </h2>

            <div class="mt-10 grid gap-1 grid-cols-2">

                <?php foreach ($cat_faqs as $faq) : 
                    
                    $question = $faq['title'] ?? '';
                    $answer   = $faq['description'] ?? '';

                    if (!$question) continue;
                ?>

                    <div>
                        <div class="faq-item">
                            <h3 class="faq-title">
                                <?php echo esc_html($question); ?>
                                <span class="text-2xl">
                                    <i class="fa fa-chevron-down"></i>
                                </span>
                            </h3>

                            <div class="faq-content max-h-0 overflow-hidden transition-all duration-200">
                                <p>
                                    <?php echo wp_kses_post($answer); ?>
                                </p>
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

    $('.faq-title').click(function () {

        var parent = $(this).closest('.faq-item');
        var content = parent.find('.faq-content');

        $('.faq-item').not(parent).find('.faq-content')
            .removeClass('max-h-[300px]')
            .addClass('max-h-0');

        if (content.hasClass('max-h-0')) {
            content.removeClass('max-h-0').addClass('max-h-[300px]');
        } else {
            content.removeClass('max-h-[300px]').addClass('max-h-0');
        }

    });

});
</script>

<?php else : ?>



<?php endif; ?>
<?php
/**
 * Template Name: Industry Page
 * Description: Comprehensive industry packaging page with FAQ schema
 *
 * @package halepath_theme
 */

get_header();
?>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <?php if (has_post_thumbnail()): ?>
            <div class="mb-8">
                <?php the_post_thumbnail('full', [
                    'class' => 'w-full h-64 object-cover rounded-2xl',
                    'alt' => get_the_title()
                ]); ?>
            </div>
            <?php endif; ?>

            <h1 class="text-4xl md:text-5xl font-bold mb-6">
                <?php the_title(); ?>
            </h1>

            <p class="text-xl text-gray-300 mb-8 max-w-3xl mx-auto">
                <?php echo esc_html(get_post_meta(get_the_ID(), 'industry_subtitle', true) ?: 'Premium custom packaging solutions tailored for your industry'); ?>
            </p>

            <div class="flex flex-wrap justify-center gap-4">
                <a href="<?php echo esc_url(home_url('/get-quote-now/')); ?>"
                    class="bg-primary hover:bg-primary/90 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300">
                    Get a Free Quote
                </a>
                <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                    class="border-2 border-white hover:bg-white hover:text-gray-900 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Trust Badges -->
<section class="py-8 bg-gray-50 border-b">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center items-center gap-8 text-gray-600">
            <div class="flex items-center gap-2">
                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span>FSC Certified</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span>Eco-Friendly Materials</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span>11-14 Day Production</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                <span>UK-Wide Delivery</span>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<main class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-3 gap-12">

            <!-- Main Content Column -->
            <div class="lg:col-span-2">
                <!-- Introduction -->
                <div class="prose prose-lg max-w-none mb-12">
                    <?php the_content(); ?>
                </div>

                <!-- Benefits Section -->
                <section class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Why Choose Hale Path Packaging for <?php echo esc_html(get_post_meta(get_the_ID(), 'industry_name', true) ?: 'Your Industry'); ?>?</h2>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
                            <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Custom Design</h3>
                            <p class="text-gray-600">Every package is designed to your exact specifications, ensuring perfect fit and stunning presentation for your products.</p>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
                            <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">UK-Wide Delivery</h3>
                            <p class="text-gray-600">We deliver across England, Scotland, Wales, and Northern Ireland with reliable logistics and tracking.</p>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
                            <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Sustainable Options</h3>
                            <p class="text-gray-600">FSC-certified, recyclable, biodegradable, and compostable materials available for environmentally conscious brands.</p>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
                            <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Fast Turnaround</h3>
                            <p class="text-gray-600">Standard production lead time of 11-14 business days with capacity for up to 500,000 units per day.</p>
                        </div>
                    </div>
                </section>

                <!-- Process Section -->
                <section class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Our Packaging Process</h2>

                    <div class="space-y-8">
                        <div class="flex gap-6">
                            <div class="flex-shrink-0 w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xl">1</div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Consultation & Design</h3>
                                <p class="text-gray-600">Our team works with you to understand your brand, products, and packaging needs. We create custom designs that align with your brand identity and functional requirements.</p>
                            </div>
                        </div>

                        <div class="flex gap-6">
                            <div class="flex-shrink-0 w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xl">2</div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Sampling & Prototyping</h3>
                                <p class="text-gray-600">Before full production, we provide samples so you can verify the fit, finish, and quality of your packaging. Revisions are included until you're completely satisfied.</p>
                            </div>
                        </div>

                        <div class="flex gap-6">
                            <div class="flex-shrink-0 w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xl">3</div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Production & Quality Control</h3>
                                <p class="text-gray-600">Using state-of-the-art printing and manufacturing equipment, we produce your packaging with strict quality control at every stage of the process.</p>
                            </div>
                        </div>

                        <div class="flex gap-6">
                            <div class="flex-shrink-0 w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center font-bold text-xl">4</div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Delivery & Support</h3>
                                <p class="text-gray-600">Your finished packaging is carefully packed and delivered to your door. We provide ongoing support for reorders and new designs as your business grows.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- FAQ Section -->
                <section class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-8">Frequently Asked Questions</h2>

                    <div class="space-y-4" id="faq-accordion">
                        <?php
                        $faq_data = get_post_meta(get_the_ID(), 'faq_items', true);
                        if (!empty($faq_data) && is_array($faq_data)):
                            foreach ($faq_data as $index => $faq):
                                ?>
                                <div class="border border-gray-200 rounded-lg overflow-hidden">
                                    <button class="w-full px-6 py-4 text-left bg-gray-50 hover:bg-gray-100 flex justify-between items-center faq-question" data-index="<?php echo $index; ?>">
                                        <span class="font-semibold text-gray-900 pr-4"><?php echo esc_html($faq['question']); ?></span>
                                        <svg class="w-5 h-5 text-gray-500 transform transition-transform faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div class="faq-answer px-6 pb-4 hidden">
                                        <p class="text-gray-600"><?php echo esc_html($faq['answer']); ?></p>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                        else:
                            // Default FAQs for the industry
                            $default_faqs = array(
                                array(
                                    'question' => 'What types of packaging do you offer for this industry?',
                                    'answer' => 'We offer a comprehensive range of packaging solutions including corrugated boxes, rigid gift boxes, mailer boxes, flexible packaging, stand-up pouches, and custom-printed cartons. All can be tailored to your specific product requirements.'
                                ),
                                array(
                                    'question' => 'What is the minimum order quantity?',
                                    'answer' => 'Our minimum order quantity varies by product type. For standard corrugated boxes, we offer MOQs as low as 100 units. For rigid boxes and specialty packaging, the minimum is typically 250 units. Contact us for specific requirements.'
                                ),
                                array(
                                    'question' => 'How long does production take?',
                                    'answer' => 'Standard production lead time is 11-14 business days from artwork approval. Rush orders may be available for an additional fee. We also offer expedited shipping options for urgent requirements.'
                                ),
                                array(
                                    'question' => 'Do you offer sustainable packaging options?',
                                    'answer' => 'Yes! We offer FSC-certified paper, recyclable materials, biodegradable options, and compostable packaging. Our team can help you choose the most sustainable solution that meets your brand and budget requirements.'
                                ),
                                array(
                                    'question' => 'Can I get a sample before placing a full order?',
                                    'answer' => 'Absolutely. We provide samples for all our packaging products. Sample costs are typically credited toward your first full order. Contact us to request samples of your chosen packaging style.'
                                ),
                                array(
                                    'question' => 'What printing options are available?',
                                    'answer' => 'We offer digital printing, offset printing, UV printing, foil stamping, embossing, debossing, and lamination. Our design team can help you choose the best printing method for your brand and budget.'
                                ),
                                array(
                                    'question' => 'Do you ship across the UK?',
                                    'answer' => 'Yes, we deliver across England, Scotland, Wales, and Northern Ireland. We also serve international customers in Europe, North America, Asia-Pacific, and the Middle East. Shipping costs vary by location and order size.'
                                ),
                                array(
                                    'question' => 'What file formats do you accept for artwork?',
                                    'answer' => 'We accept Adobe Illustrator (.ai), Adobe PDF (.pdf), and high-resolution PNG/JPEG files. For best results, we recommend vector files at 300 DPI with 3mm bleed. Our design team can assist with artwork preparation if needed.'
                                )
                            );
                            foreach ($default_faqs as $index => $faq):
                                ?>
                                <div class="border border-gray-200 rounded-lg overflow-hidden">
                                    <button class="w-full px-6 py-4 text-left bg-gray-50 hover:bg-gray-100 flex justify-between items-center faq-question" data-index="<?php echo $index; ?>">
                                        <span class="font-semibold text-gray-900 pr-4"><?php echo esc_html($faq['question']); ?></span>
                                        <svg class="w-5 h-5 text-gray-500 transform transition-transform faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div class="faq-answer px-6 pb-4 hidden">
                                        <p class="text-gray-600"><?php echo esc_html($faq['answer']); ?></p>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </section>
            </div>

            <!-- Sidebar -->
            <aside class="lg:col-span-1">
                <!-- Quote CTA -->
                <div class="bg-primary text-white rounded-2xl p-6 mb-8 sticky top-24">
                    <h3 class="text-xl font-bold mb-4">Get a Free Quote</h3>
                    <p class="text-white/90 mb-6">Tell us about your packaging needs and we'll provide a custom quote within 24 hours.</p>
                    <a href="<?php echo esc_url(home_url('/get-quote-now/')); ?>"
                        class="block w-full bg-white text-primary text-center py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                        Request Quote
                    </a>
                </div>

                <!-- Related Products -->
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100 mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Related Products</h3>
                    <?php
                    $related_products = wc_get_products(array(
                        'limit' => 4,
                        'category' => array('corrugated-boxes', 'mailer-boxes', 'rigid-boxes'),
                        'orderby' => 'popularity'
                    ));

                    if (!empty($related_products)):
                        foreach ($related_products as $product):
                            ?>
                            <div class="flex items-center gap-4 mb-4 last:mb-0">
                                <?php if ($product->get_image_id()): ?>
                                <img src="<?php echo wp_get_attachment_image_url($product->get_image_id(), 'thumbnail'); ?>"
                                    alt="<?php echo esc_attr($product->get_name()); ?>"
                                    class="w-16 h-16 object-cover rounded-lg">
                                <?php endif; ?>
                                <div>
                                    <a href="<?php echo esc_url($product->get_permalink()); ?>"
                                        class="font-semibold text-gray-900 hover:text-primary text-sm">
                                        <?php echo esc_html($product->get_name()); ?>
                                    </a>
                                    <p class="text-gray-500 text-sm">From £<?php echo esc_html($product->get_price()); ?></p>
                                </div>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <!-- Contact Info -->
                <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Contact Us</h3>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <a href="tel:+4401213186768" class="text-gray-600 hover:text-primary">+44 01213186768</a>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <a href="mailto:sales@halepathpackaging.co.uk" class="text-gray-600 hover:text-primary">sales@halepathpackaging.co.uk</a>
                        </div>
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-gray-600">Unit 229, 32A Birmingham Road, Bromsgrove, B61 0DD, UK</span>
                        </div>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</main>

<!-- CTA Section -->
<section class="py-16 bg-gray-900 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Elevate Your Packaging?</h2>
        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
            Join hundreds of brands across the UK who trust Hale Path Packaging for their custom packaging needs.
        </p>
        <a href="<?php echo esc_url(home_url('/get-quote-now/')); ?>"
            class="inline-block bg-primary hover:bg-primary/90 text-white px-10 py-4 rounded-full font-semibold text-lg transition-all duration-300">
            Get Started Today
        </a>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(function(question) {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const icon = this.querySelector('.faq-icon');

            // Close all other answers
            document.querySelectorAll('.faq-answer').forEach(function(a) {
                if (a !== answer) a.classList.add('hidden');
            });
            document.querySelectorAll('.faq-icon').forEach(function(i) {
                if (i !== icon) i.classList.remove('rotate-180');
            });

            // Toggle current answer
            answer.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });
});
</script>

<?php get_footer(); ?>

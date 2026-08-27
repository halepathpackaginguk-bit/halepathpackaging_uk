<?php
/**
 * Template Name: Comparison Page
 * Description: Compare two packaging types side-by-side
 *
 * @package halepath_theme
 */

get_header();

// Get comparison data from ACF or post meta
$product_a_name = get_post_meta(get_the_ID(), 'product_a_name', true) ?: 'Corrugated Boxes';
$product_b_name = get_post_meta(get_the_ID(), 'product_b_name', true) ?: 'Rigid Boxes';
$product_a_image = get_post_meta(get_the_ID(), 'product_a_image', true);
$product_b_image = get_post_meta(get_the_ID(), 'product_b_image', true);
$product_a_link = get_post_meta(get_the_ID(), 'product_a_link', true) ?: home_url('/corrugated-packaging/');
$product_b_link = get_post_meta(get_the_ID(), 'product_b_link', true) ?: home_url('/custom-rigid-boxes/');
?>

<!-- Hero Section -->
<section class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">
                <?php the_title(); ?>
            </h1>
            <p class="text-xl text-gray-300 mb-8 max-w-3xl mx-auto">
                <?php echo esc_html(get_post_meta(get_the_ID(), 'comparison_subtitle', true) ?: 'An in-depth comparison to help you choose the right packaging solution'); ?>
            </p>
        </div>
    </div>
</section>

<!-- Quick Comparison Table -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="grid md:grid-cols-3 bg-gray-900 text-white">
                    <div class="p-6 font-semibold text-lg">Feature</div>
                    <div class="p-6 font-semibold text-lg text-center border-l border-gray-700"><?php echo esc_html($product_a_name); ?></div>
                    <div class="p-6 font-semibold text-lg text-center border-l border-gray-700"><?php echo esc_html($product_b_name); ?></div>
                </div>

                <?php
                $comparison_rows = get_post_meta(get_the_ID(), 'comparison_rows', true);
                if (!empty($comparison_rows) && is_array($comparison_rows)):
                    foreach ($comparison_rows as $index => $row):
                        $bg_class = $index % 2 === 0 ? 'bg-white' : 'bg-gray-50';
                        ?>
                        <div class="grid md:grid-cols-3 <?php echo $bg_class; ?>">
                            <div class="p-6 font-medium text-gray-900 border-t border-gray-100"><?php echo esc_html($row['feature']); ?></div>
                            <div class="p-6 text-center border-t border-gray-100 border-l">
                                <?php if (!empty($row['product_a_check'])): ?>
                                    <svg class="w-6 h-6 text-green-500 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                <?php elseif (!empty($row['product_a_cross'])): ?>
                                    <svg class="w-6 h-6 text-red-400 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                <?php else: ?>
                                    <span class="text-gray-700"><?php echo esc_html($row['product_a_text']); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="p-6 text-center border-t border-gray-100 border-l">
                                <?php if (!empty($row['product_b_check'])): ?>
                                    <svg class="w-6 h-6 text-green-500 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                <?php elseif (!empty($row['product_b_cross'])): ?>
                                    <svg class="w-6 h-6 text-red-400 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                <?php else: ?>
                                    <span class="text-gray-700"><?php echo esc_html($row['product_b_text']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                    endforeach;
                else:
                    // Default comparison rows
                    $default_rows = array(
                        array('feature' => 'Cost per Unit', 'product_a_text' => 'Lower', 'product_b_text' => 'Higher'),
                        array('feature' => 'Durability', 'product_a_text' => 'Good', 'product_b_text' => 'Excellent'),
                        array('feature' => 'Custom Printing', 'product_a_check' => true, 'product_b_check' => true),
                        array('feature' => 'Premium Feel', 'product_a_text' => 'Standard', 'product_b_text' => 'Luxury'),
                        array('feature' => 'Eco-Friendly Options', 'product_a_check' => true, 'product_b_check' => true),
                        array('feature' => 'Minimum Order', 'product_a_text' => '100 units', 'product_b_text' => '250 units'),
                        array('feature' => 'Production Time', 'product_a_text' => '11-14 days', 'product_b_text' => '14-18 days'),
                        array('feature' => 'Best For', 'product_a_text' => 'Shipping & Retail', 'product_b_text' => 'Gifts & Premium Products'),
                    );
                    foreach ($default_rows as $index => $row):
                        $bg_class = $index % 2 === 0 ? 'bg-white' : 'bg-gray-50';
                        ?>
                        <div class="grid md:grid-cols-3 <?php echo $bg_class; ?>">
                            <div class="p-6 font-medium text-gray-900 border-t border-gray-100"><?php echo esc_html($row['feature']); ?></div>
                            <div class="p-6 text-center border-t border-gray-100 border-l">
                                <?php if (!empty($row['product_a_check'])): ?>
                                    <svg class="w-6 h-6 text-green-500 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                <?php else: ?>
                                    <span class="text-gray-700"><?php echo esc_html($row['product_a_text']); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="p-6 text-center border-t border-gray-100 border-l">
                                <?php if (!empty($row['product_b_check'])): ?>
                                    <svg class="w-6 h-6 text-green-500 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                <?php else: ?>
                                    <span class="text-gray-700"><?php echo esc_html($row['product_b_text']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<main class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Introduction -->
            <div class="prose prose-lg max-w-none mb-12">
                <?php the_content(); ?>
            </div>

            <!-- Product A Deep Dive -->
            <section class="mb-16">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center">
                        <span class="text-2xl font-bold text-primary">A</span>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900"><?php echo esc_html($product_a_name); ?>: A Closer Look</h2>
                </div>

                <?php if ($product_a_image): ?>
                <img src="<?php echo esc_url($product_a_image); ?>"
                    alt="<?php echo esc_attr($product_a_name); ?>"
                    class="w-full h-64 object-cover rounded-2xl mb-8">
                <?php endif; ?>

                <div class="prose prose-lg max-w-none">
                    <?php echo wp_kses_post(get_post_meta(get_the_ID(), 'product_a_description', true)); ?>
                </div>

                <div class="mt-8">
                    <a href="<?php echo esc_url($product_a_link); ?>"
                        class="inline-flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-full font-semibold hover:bg-primary/90 transition-colors">
                        View <?php echo esc_html($product_a_name); ?>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </section>

            <!-- Product B Deep Dive -->
            <section class="mb-16">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-16 h-16 bg-secondary/10 rounded-full flex items-center justify-center">
                        <span class="text-2xl font-bold text-secondary">B</span>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900"><?php echo esc_html($product_b_name); ?>: A Closer Look</h2>
                </div>

                <?php if ($product_b_image): ?>
                <img src="<?php echo esc_url($product_b_image); ?>"
                    alt="<?php echo esc_attr($product_b_name); ?>"
                    class="w-full h-64 object-cover rounded-2xl mb-8">
                <?php endif; ?>

                <div class="prose prose-lg max-w-none">
                    <?php echo wp_kses_post(get_post_meta(get_the_ID(), 'product_b_description', true)); ?>
                </div>

                <div class="mt-8">
                    <a href="<?php echo esc_url($product_b_link); ?>"
                        class="inline-flex items-center gap-2 bg-secondary text-white px-6 py-3 rounded-full font-semibold hover:bg-secondary/90 transition-colors">
                        View <?php echo esc_html($product_b_name); ?>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </section>

            <!-- Verdict Section -->
            <section class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">The Verdict: Which Should You Choose?</h2>

                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-gradient-to-br from-primary/5 to-primary/10 rounded-2xl p-8 border border-primary/20">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Choose <?php echo esc_html($product_a_name); ?> If...</h3>
                        <ul class="space-y-3">
                            <?php
                            $reasons_a = get_post_meta(get_the_ID(), 'choose_a_reasons', true);
                            if (!empty($reasons_a) && is_array($reasons_a)):
                                foreach ($reasons_a as $reason):
                                    ?>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-gray-700"><?php echo esc_html($reason); ?></span>
                                    </li>
                                    <?php
                                endforeach;
                            else:
                                ?>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-700">You need cost-effective shipping solutions</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-700">You're shipping high volumes</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-700">You want lightweight, recyclable options</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-700">Retail and e-commerce packaging is your priority</span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <div class="bg-gradient-to-br from-secondary/5 to-secondary/10 rounded-2xl p-8 border border-secondary/20">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Choose <?php echo esc_html($product_b_name); ?> If...</h3>
                        <ul class="space-y-3">
                            <?php
                            $reasons_b = get_post_meta(get_the_ID(), 'choose_b_reasons', true);
                            if (!empty($reasons_b) && is_array($reasons_b)):
                                foreach ($reasons_b as $reason):
                                    ?>
                                    <li class="flex items-start gap-3">
                                        <svg class="w-5 h-5 text-secondary mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-gray-700"><?php echo esc_html($reason); ?></span>
                                    </li>
                                    <?php
                                endforeach;
                            else:
                                ?>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-secondary mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-700">You're packaging luxury or premium products</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-secondary mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-700">Unboxing experience matters to your brand</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-secondary mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-700">You want maximum product protection</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-secondary mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-700">Gift and presentation packaging is your focus</span>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- FAQ Section -->
            <section class="mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Frequently Asked Questions</h2>

                <div class="space-y-4" id="comparison-faq">
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
                        // Default comparison FAQs
                        $default_faqs = array(
                            array(
                                'question' => "What's the main difference between {$product_a_name} and {$product_b_name}?",
                                'answer' => "{$product_a_name} are typically made from multiple layers of paperboard or kraft, offering excellent protection and a professional appearance. {$product_b_name} feature a rigid inner board wrapped in decorative paper, providing a premium, luxurious feel ideal for high-end products."
                            ),
                            array(
                                'question' => "Which is more expensive: {$product_a_name} or {$product_b_name}?",
                                'answer' => "{$product_b_name} generally cost more per unit due to the materials and construction process. However, they can command higher retail prices and enhance perceived product value. {$product_a_name} offer excellent value for high-volume orders."
                            ),
                            array(
                                'question' => "Can I get custom printing on both types?",
                                'answer' => "Yes! Both {$product_a_name} and {$product_b_name} can be fully customised with your branding. We offer digital printing, offset printing, foil stamping, embossing, and lamination for both options."
                            ),
                            array(
                                'question' => "What's the minimum order quantity for each?",
                                'answer' => "Our minimum order quantities vary: {$product_a_name} can be ordered from as few as 100 units, while {$product_b_name} typically require a minimum of 250 units. Contact us for specific pricing based on your quantities."
                            ),
                            array(
                                'question' => "Are both options eco-friendly?",
                                'answer' => "Yes, we offer sustainable options for both. {$product_a_name} are often made from recycled content and are fully recyclable. {$product_b_name} can be produced with FSC-certified materials and sustainable wrapping papers."
                            ),
                            array(
                                'question' => "How long does production take for each?",
                                'answer' => "Standard production time for {$product_a_name} is 11-14 business days. {$product_b_name} typically take 14-18 business days due to the additional construction steps. Rush orders may be available for both."
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

            <!-- CTA Section -->
            <section class="bg-gray-900 rounded-2xl p-8 text-center text-white">
                <h2 class="text-2xl font-bold mb-4">Still Not Sure Which to Choose?</h2>
                <p class="text-gray-300 mb-6 max-w-2xl mx-auto">
                    Our packaging experts can help you determine the best solution for your specific needs. Get a free consultation and quote today.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="<?php echo esc_url(home_url('/get-quote-now/')); ?>"
                        class="bg-primary hover:bg-primary/90 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300">
                        Get a Free Quote
                    </a>
                    <a href="<?php echo esc_url(home_url('/contact-us/')); ?>"
                        class="border-2 border-white hover:bg-white hover:text-gray-900 text-white px-8 py-3 rounded-full font-semibold transition-all duration-300">
                        Contact an Expert
                    </a>
                </div>
            </section>

            <!-- Related Comparisons -->
            <section class="mt-16">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Comparisons</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <?php
                    // Get other comparison pages
                    $comparisons = new WP_Query(array(
                        'post_type' => 'page',
                        'post_status' => 'publish',
                        'meta_query' => array(
                            array(
                                'key' => '_wp_page_template',
                                'value' => 'temp-comparison.php'
                            )
                        ),
                        'post__not_in' => array(get_the_ID()),
                        'posts_per_page' => 4
                    ));

                    if ($comparisons->have_posts()):
                        while ($comparisons->have_posts()):
                            $comparisons->the_post();
                            ?>
                            <a href="<?php the_permalink(); ?>"
                                class="block bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-shadow">
                                <h3 class="font-semibold text-gray-900 hover:text-primary"><?php the_title(); ?></h3>
                                <p class="text-gray-600 text-sm mt-2"><?php echo esc_html(get_post_meta(get_the_ID(), 'comparison_subtitle', true)); ?></p>
                            </a>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </section>

        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(function(question) {
        question.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            const icon = this.querySelector('.faq-icon');

            document.querySelectorAll('.faq-answer').forEach(function(a) {
                if (a !== answer) a.classList.add('hidden');
            });
            document.querySelectorAll('.faq-icon').forEach(function(i) {
                if (i !== icon) i.classList.remove('rotate-180');
            });

            answer.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        });
    });
});
</script>

<?php get_footer(); ?>

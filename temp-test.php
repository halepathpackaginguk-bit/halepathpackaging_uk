<?php /** Template Name: Test */ get_header();

?>
<section class="bg-gray-50 py-12 lg:py-16">
    <div class="mx-auto container px-4">
        <div class="grid grid-cols-1 items-start gap-8 md:grid-cols-[1fr_1.15fr] lg:gap-12">

            <!-- Left Content -->
            <div>
                <h2 class="mb-3 text-2xl font-bold leading-tight text-title_Clr sm:text-3xl">
                    What Sets Us Apart
                </h2>

                <p class="mb-6 text-sm leading-6 text-txt_Clr md:text-base">
                    With our track record of success and a simple customer-centric approach,
                    we have earned the trust of businesses worldwide. Our commitment to
                    excellence and innovation allows us to provide solutions that meet
                    your unique needs. From design to delivery, we make sure your
                    packaging stands out. We focus on quality, efficiency, and
                    exceptional service to help your business succeed.
                </p>

                <!-- Feature Cards -->
                <div class="grid grid-cols-2 gap-3">

                    <div
                        class="flex min-h-[105px] flex-col items-center justify-center rounded-lg border border-secondary/20 px-3 py-4 text-center">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/category/glob.png'); ?>" alt="" aria-hidden="true" class="mb-2 h-8 w-8 object-contain" loading="lazy">
                        <h3 class="text-sm font-semibold text-title_Clr">
                            No Plastic
                            <br>Options
                        </h3>
                    </div>

                    <div
                        class="flex min-h-[105px] flex-col items-center justify-center rounded-lg border border-secondary/20 px-3 py-4 text-center">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/category/studio.png'); ?>" alt="" aria-hidden="true" class="mb-2 h-8 w-8 object-contain" loading="lazy">
                        <h3 class="text-sm font-semibold text-title_Clr">
                            Customisation
                            <br>Solutions
                        </h3>
                    </div>

                    <div
                        class="flex min-h-[105px] flex-col items-center justify-center rounded-lg border border-secondary/20 px-3 py-4 text-center">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/category/price_icon.png'); ?>" alt="" aria-hidden="true" class="mb-2 h-8 w-8 object-contain" loading="lazy">
                        <h3 class="text-sm font-semibold text-title_Clr">
                            Low Minimum
                            <br>Order Qty
                        </h3>
                    </div>

                    <div
                        class="flex min-h-[105px] flex-col items-center justify-center rounded-lg border border-secondary/20 px-3 py-4 text-center">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/category/house.png'); ?>" alt="" aria-hidden="true" class="mb-2 h-8 w-8 object-contain" loading="lazy">
                        <h3 class="text-sm font-semibold text-title_Clr">
                            Free Shipping
                        </h3>
                    </div>

                    <div
                        class="flex min-h-[105px] flex-col items-center justify-center rounded-lg border border-secondary/20 px-3 py-4 text-center">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/category/agent.png'); ?>" alt="" aria-hidden="true" class="mb-2 h-8 w-8 object-contain" loading="lazy">
                        <h3 class="text-sm font-semibold text-title_Clr">
                            Free Graphic
                            <br>Designing
                        </h3>
                    </div>

                    <div
                        class="flex min-h-[105px] flex-col items-center justify-center rounded-lg border border-secondary/20 px-3 py-4 text-center">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/category/capacity.png'); ?>" alt="" aria-hidden="true" class="mb-2 h-8 w-8 object-contain" loading="lazy">
                        <h3 class="text-sm font-semibold text-title_Clr">
                            Quick
                            <br>Turnaround Time
                        </h3>
                    </div>

                </div>
            </div>

            <!-- Right Quote Form -->
            <div class="overflow-hidden rounded-lg border border-secondary/20 bg-white shadow-md">

                <!-- Form Header -->
                <div class="bg-secondary px-5 py-4">
                    <h2 class="text-xl font-bold text-white sm:text-2xl">
                        Get a Quote
                    </h2>
                    <p class="mt-1 text-sm text-white">
                        Let us help you find the perfect packaging needs.
                    </p>
                </div>

                <?php if (isset($_GET['quote_status'])): ?>
                    <?php if ('success' === $_GET['quote_status']): ?>
                        <div class="mx-5 mt-5 rounded border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                            Thank you! Your quote request has been sent successfully.
                        </div>
                    <?php else: ?>
                        <div class="mx-5 mt-5 rounded border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                            Sorry, your request could not be sent. Please check the required fields and try again.
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <form id="custom-packaging-quote" action="<?php echo esc_url(admin_url('admin-post.php')); ?>"
                    method="post" class="space-y-4 p-5">
                    <input type="hidden" name="action" value="custom_packaging_quote">
                    <?php wp_nonce_field('custom_packaging_quote_action', 'custom_packaging_quote_nonce'); ?>

                    <h3 class="border-b border-secondary/20 pb-2 text-base font-semibold text-title_Clr">
                        Contact Information
                    </h3>

                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">
                                Full Name *
                            </label>
                            <input type="text" name="full_name" placeholder="Enter full name" required
                                class="w-full rounded border border-secondary/20 px-3 py-2 text-sm outline-none focus:border-primary">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">
                                Phone Number *
                            </label>
                            <input type="tel" name="phone" placeholder="Enter phone number" required
                                class="w-full rounded border border-secondary/20 px-3 py-2 text-sm outline-none focus:border-primary">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">
                                Email *
                            </label>
                            <input type="email" name="email" placeholder="Enter email" required
                                class="w-full rounded border border-secondary/20 px-3 py-2 text-sm outline-none focus:border-primary">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">
                                Company
                            </label>
                            <input type="text" name="company" placeholder="Enter company"
                                class="w-full rounded border border-secondary/20 px-3 py-2 text-sm outline-none focus:border-primary">
                        </div>
                    </div>

                    <h3 class="border-b border-secondary/20 pb-2 text-base font-semibold text-title_Clr">
                        Box Specifications
                    </h3>

                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Length *</label>
                            <input type="number" name="length" min="0" step="any" placeholder="Length" required
                                class="w-full rounded border border-secondary/20 px-2 py-2 text-sm outline-none focus:border-primary">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Width *</label>
                            <input type="number" name="width" min="0" step="any" placeholder="Width" required
                                class="w-full rounded border border-secondary/20 px-2 py-2 text-sm outline-none focus:border-primary">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Height *</label>
                            <input type="number" name="height" min="0" step="any" placeholder="Height" required
                                class="w-full rounded border border-secondary/20 px-2 py-2 text-sm outline-none focus:border-primary">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Unit *</label>
                            <select name="unit" required
                                class="w-full rounded border border-secondary/20 bg-white px-2 py-2 text-sm outline-none focus:border-primary">
                                <option value="inches">Inches</option>
                                <option value="cm">CM</option>
                                <option value="mm">MM</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Material Type *</label>
                            <select name="material" required
                                class="w-full rounded border border-secondary/20 bg-white px-2 py-2 text-sm outline-none focus:border-primary">
                                <option value="">Select material</option>
                                <option value="cardboard">Cardboard</option>
                                <option value="corrugated">Corrugated</option>
                                <option value="kraft">Kraft</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Print Sides</label>
                            <select name="print_sides"
                                class="w-full rounded border border-secondary/20 bg-white px-2 py-2 text-sm outline-none focus:border-primary">
                                <option value="single">Single Side</option>
                                <option value="double">Double Side</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Quantity *</label>
                            <input type="number" name="quantity" min="1" placeholder="Quantity" required
                                class="w-full rounded border border-secondary/20 px-2 py-2 text-sm outline-none focus:border-primary">
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Coating</label>
                            <select name="coating"
                                class="w-full rounded border border-secondary/20 bg-white px-2 py-2 text-sm outline-none focus:border-primary">
                                <option value="none">No Coating</option>
                                <option value="matte">Matte</option>
                                <option value="gloss">Gloss</option>
                            </select>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-title_Clr">Product Style</label>
                            <select name="product_style"
                                class="w-full rounded border border-secondary/20 bg-white px-2 py-2 text-sm outline-none focus:border-primary">
                                <option value="">Select style</option>
                                <option value="mailer">Mailer Box</option>
                                <option value="folding">Folding Carton</option>
                                <option value="shipping">Shipping Box</option>
                                <option value="custom">Custom</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium text-title_Clr">
                            Describe your packaging requirements
                        </label>
                        <textarea name="requirements" rows="3" placeholder="Describe your product specifications..."
                            class="w-full resize-y rounded border border-secondary/20 px-3 py-2 text-sm outline-none focus:border-primary"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full rounded bg-secondary px-4 py-3 text-sm font-semibold text-white transition hover:bg-primary md:text-base">
                        ➤ Send Quote Request
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>





<?php
$finishing_categories = [
    'coating' => 'Coating',
    'paper-boards' => 'Paper Boards',
    'special-finishing' => 'Special Finishing',
    'printing' => 'Printing',
    'foiled-trade' => 'Foiled Trade',
    'corrugated' => 'Corrugated',
    'color-options' => 'Color Options',
];

$finishing_options = [

    // 1. Coating
    [
        'title' => 'Varnish',
        'category' => 'coating',
        'image' => 'varnish.webp',
        'description' => 'A transparent liquid finish that enhances gloss, satin, or matte effects while adding a protective layer to printed packaging.',
    ],
    [
        'title' => 'Spot UV',
        'category' => 'coating',
        'image' => 'spot-uv.webp',
        'description' => 'A specialized UV coating applied to selected areas to create contrast and draw attention to important design details.',
    ],
    [
        'title' => 'Soft Touch Coating',
        'category' => 'coating',
        'image' => 'soft-touch.webp',
        'description' => 'A premium coating with a smooth, velvety feel that gives packaging an elegant and luxurious finish.',
    ],
    [
        'title' => 'Silk Lamination',
        'category' => 'coating',
        'image' => 'silk-lamination.webp',
        'description' => 'A smooth satin-like finish that protects packaging and creates a refined, premium appearance.',
    ],
    [
        'title' => 'Spot Gloss UV',
        'category' => 'coating',
        'image' => 'spot-gloss-uv.webp',
        'description' => 'A high-gloss finish applied to selected areas for striking contrast against matte surfaces.',
    ],
    [
        'title' => 'Hexagonal Coating',
        'category' => 'coating',
        'image' => 'maqsoos-coating.webp',
        'description' => 'A distinctive textured finish that adds tactile detail and visual interest to premium packaging.',
    ],
    [
        'title' => 'Anti-Scratch',
        'category' => 'coating',
        'image' => 'anti-scratch.webp',
        'description' => 'A protective finish that helps reduce scratches, scuffs, and fingerprints to keep packaging looking its best.',
    ],

    // 2. Paper Boards
    [
        'title' => 'Kraft Paper Board',
        'category' => 'paper-boards',
        'image' => 'kraft-board.webp',
        'description' => 'Natural brown kraft board with a distinctive organic appearance, ideal for sustainable and minimalist packaging.',
    ],
    [
        'title' => 'White Cardboard',
        'category' => 'paper-boards',
        'image' => 'white-cardboard.webp',
        'description' => 'Smooth white cardboard that delivers clean printing, crisp colours, and a professional presentation.',
    ],
    [
        'title' => 'SBS Paperboard',
        'category' => 'paper-boards',
        'image' => 'sbs-board.webp',
        'description' => 'Premium solid bleached board with a bright white surface for high-quality printing and retail packaging.',
    ],
    [
        'title' => 'Recycled Paperboard',
        'category' => 'paper-boards',
        'image' => 'recycled-board.webp',
        'description' => 'Paperboard made with recycled fibre for brands looking for practical and environmentally conscious packaging.',
    ],

    // 3. Special Finishing
    [
        'title' => 'Gold Foil Stamping',
        'category' => 'special-finishing',
        'image' => 'gold-foil.webp',
        'description' => 'Metallic gold details create a premium appearance and help logos and design elements stand out.',
    ],
    [
        'title' => 'Silver Foil Stamping',
        'category' => 'special-finishing',
        'image' => 'silver-foil.webp',
        'description' => 'Reflective silver accents add a sophisticated metallic finish to luxury and promotional packaging.',
    ],
    [
        'title' => 'Embossing',
        'category' => 'special-finishing',
        'image' => 'embossing.webp',
        'description' => 'Raised design elements add depth and texture to logos, typography, and decorative packaging details.',
    ],
    [
        'title' => 'Debossing',
        'category' => 'special-finishing',
        'image' => 'debossing.webp',
        'description' => 'Pressed-in design details create a subtle tactile effect for a refined and understated finish.',
    ],

    // 4. Printing
    [
        'title' => 'CMYK Printing',
        'category' => 'printing',
        'image' => 'cmyk-printing.webp',
        'description' => 'Full-colour four-colour printing reproduces detailed artwork, photographs, and colourful brand designs.',
    ],
    [
        'title' => 'Pantone Printing',
        'category' => 'printing',
        'image' => 'pantone-printing.webp',
        'description' => 'Spot-colour printing helps maintain consistent brand colours across packaging and print runs.',
    ],
    [
        'title' => 'Inside Printing',
        'category' => 'printing',
        'image' => 'inside-printing.webp',
        'description' => 'Printed interior panels add branded messages, patterns, and delightful details to the unboxing experience.',
    ],
    [
        'title' => 'Outside Printing',
        'category' => 'printing',
        'image' => 'outside-printing.webp',
        'description' => 'Custom exterior artwork showcases your brand, product information, and packaging design.',
    ],

    // 5. Foiled Trade
    [
        'title' => 'Gold Foil',
        'category' => 'foiled-trade',
        'image' => 'gold-foil.webp',
        'description' => 'Add a metallic gold effect to logos, text, and decorative details for a premium presentation.',
    ],
    [
        'title' => 'Silver Foil',
        'category' => 'foiled-trade',
        'image' => 'silver-foil.webp',
        'description' => 'Create striking silver highlights that give your packaging a polished, contemporary look.',
    ],
    [
        'title' => 'Holographic Foil',
        'category' => 'foiled-trade',
        'image' => 'holographic-foil.webp',
        'description' => 'Colour-shifting reflective foil creates eye-catching accents for distinctive product packaging.',
    ],

    // 6. Corrugated
    [
        'title' => 'Single Wall Corrugated',
        'category' => 'corrugated',
        'image' => 'single-wall.webp',
        'description' => 'A versatile corrugated construction offering everyday cushioning and protection for shipping and storage.',
    ],
    [
        'title' => 'Double Wall Corrugated',
        'category' => 'corrugated',
        'image' => 'double-wall.webp',
        'description' => 'Two corrugated layers provide additional strength and protection for heavier products and demanding transit.',
    ],
    [
        'title' => 'E-Flute Board',
        'category' => 'corrugated',
        'image' => 'e-flute.webp',
        'description' => 'Fine corrugated fluting offers a smooth printable surface for retail-ready boxes and premium mailers.',
    ],
    [
        'title' => 'F-Flute Board',
        'category' => 'corrugated',
        'image' => 'f-flute.webp',
        'description' => 'Fine-flute corrugated board supports detailed printing and compact packaging designs.',
    ],

    // 7. Color Options
    [
        'title' => 'Full Colour',
        'category' => 'color-options',
        'image' => 'full-colour.webp',
        'description' => 'Bring packaging artwork to life with vibrant multi-colour printing and detailed graphics.',
    ],
    [
        'title' => 'Black & White',
        'category' => 'color-options',
        'image' => 'black-white.webp',
        'description' => 'A timeless monochrome palette for bold typography, minimal designs, and elegant packaging.',
    ],
    [
        'title' => 'Custom Brand Colours',
        'category' => 'color-options',
        'image' => 'brand-colours.webp',
        'description' => 'Coordinate packaging colours with your brand identity for a consistent and recognisable presentation.',
    ],
    [
        'title' => 'Natural Kraft',
        'category' => 'color-options',
        'image' => 'natural-kraft.webp',
        'description' => 'Natural kraft tones provide a warm, understated appearance for organic and minimalist brand styles.',
    ],
];

$finishing_image_sets = [
    'coating' => [
        'finishing/op009.jpg',
        'finishing/op010.jpg',
        'finishing/op011.jpg',
        'finishing/op012.jpg',
        'finishing/op013.jpg',
        'finishing/op014.jpg',
        'finishing/op015.jpg',
    ],
    'paper-boards' => [
        'material/op501.jpg',
        'material/op502.jpg',
        'material/op503.jpg',
        'material/op504.jpg',
    ],
    'special-finishing' => [
        'addition/op017.jpg',
        'addition/op018.jpg',
        'addition/op019.jpg',
        'addition/op020.jpg',
    ],
    'printing' => [
        'printing/op024.jpg',
        'printing/op027.jpg',
        'printing/op030.jpg',
        'addition/op021.jpg',
    ],
    'foiled-trade' => [
        'addition/op022.jpg',
        'addition/op023.jpg',
        'addon/ci006.jpg',
    ],
    'corrugated' => [
        'material/op505.jpg',
        'material/op506.jpg',
        'material/op507.jpg',
        'material/op509.jpg',
    ],
    'color-options' => [
        'finishing/op016.jpg',
        'finishing/op028.jpg',
        'material/op510.jpg',
        'material/op511.jpg',
    ],
];

$finishing_image_indexes = [];

foreach ($finishing_options as $index => $option) {
    $category = $option['category'];

    if (!isset($finishing_image_sets[$category])) {
        continue;
    }

    $position = isset($finishing_image_indexes[$category]) ? $finishing_image_indexes[$category] : 0;
    $images = $finishing_image_sets[$category];

    $finishing_options[$index]['image'] = $images[$position % count($images)];
    $finishing_image_indexes[$category] = $position + 1;
}
?>

<section class="bg-gray-50 py-12 sm:px-6 lg:py-16">
    <div class="mx-auto container px-4">

        <!-- Section Heading -->
        <div class="mx-auto mb-7 max-w-2xl text-center">
            <span
                class="mb-3 inline-flex rounded-full border border-secondary/20 bg-white px-3 py-1 text-xs font-medium text-secondary">
                ✦ Finishing Options
            </span>

            <h2 class="mb-3 text-2xl font-bold leading-tight text-title_Clr sm:text-3xl">
                Finishing &amp; Material Options
            </h2>

            <p class="text-sm leading-6 text-txt_Clr md:text-base">
                Choose from premium coating, board, printing and finishing options
                for your insert boxes.
            </p>
        </div>

        <!-- Category Tabs -->
        <div class="finishing-tabs mb-8 flex flex-wrap items-center justify-center gap-2" role="tablist"
            aria-label="Finishing categories">
            <?php $first_category = true; ?>

            <?php foreach ($finishing_categories as $slug => $label): ?>
                <button type="button" role="tab" aria-selected="<?php echo $first_category ? 'true' : 'false'; ?>"
                    data-category="<?php echo esc_attr($slug); ?>"
                    class="finishing-tab rounded-full border border-primary/20 px-3 py-2 text-xs font-semibold transition duration-200 sm:text-sm <?php echo $first_category ? 'is-active bg-secondary text-white' : 'bg-white text-secondary'; ?>">
                    <?php echo esc_html($label); ?>
                </button>

                <?php $first_category = false; ?>
            <?php endforeach; ?>
        </div>

        <!-- Finishing Cards -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <?php foreach ($finishing_options as $index => $option): ?>
                <article
                    class="finishing-card rounded-xl border border-secondary/20 bg-white p-3 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md"
                    data-category="<?php echo esc_attr($option['category']); ?>" role="tabpanel">
                    <div class="mb-3 flex h-[130px] items-center justify-center overflow-hidden rounded-lg bg-secondary/10">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/' . $option['image']); ?>"
                            alt="<?php echo esc_attr($option['title']); ?>" class="h-full w-full object-cover"
                            loading="lazy">
                    </div>

                    <h3 class="mb-2 text-center text-base font-bold text-title_Clr sm:text-lg">
                        <?php echo esc_html($option['title']); ?>
                    </h3>

                    <p class="text-center text-sm leading-6 text-txt_Clr">
                        <?php echo esc_html($option['description']); ?>
                    </p>
                </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>





<?php
$packaging_categories = [
    [
        'title' => 'Rigid Boxes',
        'image' => 'pack/1.png',
        'rating' => '4.8',
        'reviews' => '128',
        'description' => 'Create custom rigid boxes for luxury products and premium gifts.',
        'url' => '/rigid-boxes/',
    ],
    [
        'title' => 'Custom Mailer Boxes',
        'image' => 'product/gallery1.jpg',
        'rating' => '4.9',
        'reviews' => '96',
        'description' => 'Durable custom mailer boxes designed for a memorable unboxing.',
        'url' => '/custom-mailer-boxes/',
    ],
    [
        'title' => 'Apparel Boxes',
        'image' => 'pack/2.png',
        'rating' => '4.8',
        'reviews' => '82',
        'description' => 'Premium packaging solutions for clothing and fashion brands.',
        'url' => '/apparel-boxes/',
    ],
    [
        'title' => 'Round Boxes',
        'image' => 'product/gallery2.jpg',
        'rating' => '4.7',
        'reviews' => '65',
        'description' => 'Round boxes made to showcase your products in style.',
        'url' => '/round-boxes/',
    ],
    [
        'title' => 'Custom Food Boxes',
        'image' => 'pack/3.png',
        'rating' => '4.9',
        'reviews' => '114',
        'description' => 'Custom food boxes are specially designed for your food products.',
        'url' => '/custom-food-boxes/',
    ],
    [
        'title' => 'Custom Pizza Boxes',
        'image' => 'product/gallery3.jpg',
        'rating' => '4.8',
        'reviews' => '91',
        'description' => 'Custom pizza boxes designed to keep your pizzas protected.',
        'url' => '/custom-pizza-boxes/',
    ],
    [
        'title' => 'Custom Cake Boxes',
        'image' => 'pack/4.png',
        'rating' => '4.9',
        'reviews' => '76',
        'description' => 'Custom cake boxes are printed to showcase your baked treats.',
        'url' => '/custom-cake-boxes/',
    ],
    [
        'title' => 'Gift Boxes',
        'image' => 'product/gallery4.jpg',
        'rating' => '4.8',
        'reviews' => '103',
        'description' => 'Create custom gift boxes designed to make every gift special.',
        'url' => '/gift-boxes/',
    ],
];
?>

<section class="py-10 sm:px-6 lg:py-14">
    <div class="mx-auto container px-4">

        <!-- Section Heading -->
        <div class="mb-7 text-center">
            <h2 class="text-2xl font-bold leading-tight text-title_Clr sm:text-3xl">
                Packaging That Best Suits Your Products
            </h2>

            <p class="mt-2 text-sm leading-6 text-txt_Clr md:text-base">
                Choose the packaging of your choice that gives your items the perfect feel.
            </p>
        </div>

        <!-- Product Categories -->
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4 lg:gap-4">

            <?php foreach ($packaging_categories as $category): ?>

                <article
                    class="group overflow-hidden rounded-xl border border-secondary/20 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md">

                    <!-- Product Image -->
                    <a href="<?php echo esc_url(home_url($category['url'])); ?>"
                        class="relative block h-[125px] overflow-hidden bg-secondary/10 sm:h-[155px] lg:h-[170px]"
                        aria-label="<?php echo esc_attr($category['title']); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/' . $category['image']); ?>"
                            alt="<?php echo esc_attr($category['title']); ?>" loading="lazy"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105">

                        <!-- Optional Brand Mark -->
                        <span
                            class="absolute right-2 top-2 rounded-sm bg-white/90 px-1.5 py-1 text-xs font-bold tracking-wide text-secondary">
                            YOUR BRAND
                        </span>
                    </a>

                    <!-- Product Details -->
                    <div class="p-3 sm:p-4">

                        <!-- Rating -->
                        <div class="mb-2 flex flex-wrap items-center gap-1.5">
                            <span class="text-xs tracking-tight text-primary" aria-label="Star rating">
                                ★★★★★
                            </span>

                            <span class="text-xs text-txt_Clr">
                                (<?php echo esc_html($category['rating']); ?>)
                            </span>

                            <span class="text-xs text-txt_Clr">
                                <?php echo esc_html($category['reviews']); ?> Reviews
                            </span>
                        </div>

                        <!-- Title -->
                        <h3 class="mb-1 text-base font-bold leading-snug text-title_Clr sm:text-lg">
                            <a href="<?php echo esc_url(home_url($category['url'])); ?>"
                                class="transition hover:text-primary">
                                <?php echo esc_html($category['title']); ?>
                            </a>
                        </h3>

                        <!-- Description -->
                        <p class="mb-3 line-clamp-2 min-h-[32px] text-xs leading-5 text-txt_Clr sm:text-sm">
                            <?php echo esc_html($category['description']); ?>
                        </p>

                        <!-- Category Link -->
                        <a href="<?php echo esc_url(home_url($category['url'])); ?>"
                            class="inline-flex items-center gap-1 text-xs font-semibold text-primary transition hover:text-secondary">
                            View Category
                            <span aria-hidden="true">›</span>
                        </a>

                    </div>
                </article>

            <?php endforeach; ?>

        </div>
    </div>
</section>



<section class="relative overflow-hidden bg-gray-50">
    <div
        class="mx-auto flex min-h-[220px] container items-center px-5 py-8 sm:min-h-[280px] sm:px-10 lg:min-h-[340px] lg:px-16">

        <!-- Background Decorative Image -->
        <div class="absolute inset-0">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/about-page/offer-bg.png'); ?>"
                alt="" aria-hidden="true" class="h-full w-full object-cover">
        </div>

        <!-- Content -->
        <div class="relative z-10 w-full md:grid md:grid-cols-2 md:items-center">

            <!-- Text Card -->
            <div class="relative z-20 mx-auto w-full max-w-[380px] rounded-lg bg-white p-5 shadow-sm md:mx-0 lg:p-7">

                <span class="mb-2 block text-xs font-medium tracking-wide text-primary sm:text-sm">
                    Premium Packaging Solutions
                </span>

                <h1 class="mb-2 text-xl font-bold leading-tight text-title_Clr sm:text-2xl">
                    Premium Quality Packages You Can Trust
                </h1>

                <p class="mb-4 text-sm leading-6 text-txt_Clr">
                    We provide high-quality custom packaging solutions designed to
                    protect your products and elevate your brand. From premium
                    boxes to sustainable packaging, we bring your ideas to life
                    with quality and care.
                </p>

                <a href="<?php echo esc_url(home_url('/request-quote/')); ?>"
                    class="btn_secondry flex items-center gap-2 sm:mt-12 mt-6 w-fit">
                    Request a Quote
                    <span aria-hidden="true">→</span>
                </a>

            </div>

            <!-- Right-side space for packaging products in background image -->
            <div class="hidden md:block" aria-hidden="true"></div>

        </div>
    </div>
</section>


<?php get_footer() ?>
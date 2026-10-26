<?php
$services_sec = get_field('home_services');
$title = $services_sec['title'] ?? '';
$subtitle = $services_sec['subtitle'] ?? '';
$services = $services_sec['service'] ?? [];
?>


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
                Finishing & Material Options
            </span>

            <h2 class="mb-3 text-2xl font-bold leading-tight text-title_Clr sm:text-3xl">
                Flexible Packaging & Custom Mylar Bags’
            </h2>

            <p class="text-sm leading-6 text-txt_Clr md:text-base">
                Give your brand the exemplary presentation it deserves. From custom boxes to vibrant mylar bags, we
                create retail & custom packaging bags that turn first-time buyers into lifetime fans.

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
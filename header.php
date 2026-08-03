<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-NJ65R553');</script>
    <!-- End Google Tag Manager -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <?php if (is_search()) { ?>
    <meta name="robots" content="noindex, nofollow" />
    <?php } ?>
    <title>
        <?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged, $post;

        wp_title('|', true, 'right');

        // Add the blog name.
        bloginfo('name');

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            echo " | $site_description";

        // Add a page number if necessary:
        if ($paged >= 2 || $page >= 2)
            echo ' | ' . sprintf(__('Page %s', 'wpv'), max($paged, $page));
        ?>
    </title>
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php if (is_singular())
        wp_enqueue_script('comment-reply'); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/output.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/custom.css" />
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="<?php echo get_template_directory_uri(); ?>/assets/slick-theme.css" />
    <?php wp_head(); ?>
    <meta name="google-site-verification" content="vxJVqkHpw-YU0K97Hbs-wFEVtQhadmF2d19hVFWCuSU" />
    <meta name="trustpilot-one-time-domain-verification-id" content="ae39cbe4-c17f-458d-ad5d-f78d10d14bdd" />

</head>
<?php
$megaMenus = [
    "industries" => [
        "title" => "Industries",
        "link" => "https://halepathpackaging.co.uk/industries",
        "groups" => [
            "Beauty & Personal Care" => [
                "link" => "https://halepathpackaging.co.uk/beauty-care/",
                "image" => true,
                "items" => [
                    ["title" => "Cosmetics", "link" => "https://halepathpackaging.co.uk/cosmetic-boxes/"],
                    ["title" => "Fragrances & Perfumes", "link" => "https://halepathpackaging.co.uk/fragrances-perfumes/"],
                    ["title" => "Skincare", "link" => "https://halepathpackaging.co.uk/skincare/"],
                    ["title" => "Hair Care", "link" => "https://halepathpackaging.co.uk/hair-care/"],
                    ["title" => "Nail Care", "link" => "https://halepathpackaging.co.uk/nail-care/"],
                    ["title" => "Soap & Body Care", "link" => "https://halepathpackaging.co.uk/soap-body-care/"],
                    ["title" => "Bath Products", "link" => "https://halepathpackaging.co.uk/bath-products/"],
                    ["title" => "Mens Grooming", "link" => "https://halepathpackaging.co.uk/mens-grooming/"],
                    ["title" => "Spa & Wellness", "link" => "https://halepathpackaging.co.uk/spa-wellness/"],
                    ["title" => "Tissue & Hygiene", "link" => "https://halepathpackaging.co.uk/tissue-hygiene/"],
                ]
            ],

            "Food & Beverage" => [
                "link" => "https://halepathpackaging.co.uk/food-beverage-packaging/",
                "image" => true,
                "items" => [
                    ["title" => "Food & Restaurant", "link" => "https://halepathpackaging.co.uk/food-restaurant/"],
                    ["title" => "Bakery & Confectionery", "link" => "https://halepathpackaging.co.uk/bakery-confectionery"],
                    ["title" => "Chocolate", "link" => "https://halepathpackaging.co.uk/chocolate/"],
                    ["title" => "Candy & Sweets", "link" => "https://halepathpackaging.co.uk/candy-sweets"],
                    ["title" => "Coffee & Tea", "link" => "https://halepathpackaging.co.uk/coffee-tea/"],
                    ["title" => "Beverages & Drinks", "link" => "https://halepathpackaging.co.uk/beverages-drinks"],
                    ["title" => "Snacks & Chips", "link" => "https://halepathpackaging.co.uk/snacks-chips/"],
                    ["title" => "Frozen Foods", "link" => "https://halepathpackaging.co.uk/frozen-foods/"],
                    ["title" => "Dairy Products", "link" => "https://halepathpackaging.co.uk/dairy-products/"],
                    ["title" => "Wine & Spirits", "link" => "https://halepathpackaging.co.uk/wine-spirits/"],
                    ["title" => "Energy Drinks & Juice", "link" => "https://halepathpackaging.co.uk/energy-drinks-juice"],
                    ["title" => "Ice Cream & Desserts", "link" => "https://halepathpackaging.co.uk/ice-cream-desserts"],
                    ["title" => "Food Delivery Packaging", "link" => "https://halepathpackaging.co.uk/food-delivery-packaging"],
                    ["title" => "Meal Kits", "link" => "https://halepathpackaging.co.uk/meal-kits"],
                ]
            ],

            "Retail & E-commerce" => [
                "link" => "https://halepathpackaging.co.uk/retail-e-commerce/",
                "image" => true,
                "items" => [
                    ["title" => "E-commerce Packaging", "link" => "https://halepathpackaging.co.uk/e-commerce"],
                    ["title" => "Retail Boxes", "link" => "https://halepathpackaging.co.uk/retail-boxes/"],
                    ["title" => "Shopping Bags", "link" => "https://halepathpackaging.co.uk/shopping-bags-retail-e-commerce/"],
                    ["title" => "Point of Sale Display", "link" => "https://halepathpackaging.co.uk/point-of-sale-display/"],
                    ["title" => "Subscription Boxes", "link" => "https://halepathpackaging.co.uk/subscription-boxes/"],
                    ["title" => "Boutique & Specialty Shops", "link" => "https://halepathpackaging.co.uk/boutique-specialty-shops/"],
                ]
            ],

            "Cannabis & CBD" => [
                "link" => "https://halepathpackaging.co.uk/cannabis/",
                "image" => true,
                "items" => [
                    ["title" => "CBD Products", "link" => "https://halepathpackaging.co.uk/cbd-products/"],
                    ["title" => "Marijuana & Cannabis Packaging", "link" => "https://halepathpackaging.co.uk/marijuana-cannabis-packaging/"],
                    ["title" => "Vape & E-Cigarettes", "link" => "https://halepathpackaging.co.uk/vape-e-cigarettes/"],
                    ["title" => "Hemp Products", "link" => "https://halepathpackaging.co.uk/hemp-products/"],
                    ["title" => "Compliance Packaging", "link" => "https://halepathpackaging.co.uk/compliance-packaging/"],
                ]
            ],

            "Tobacco & Vaping" => [
                "link" => "https://halepathpackaging.co.uk/tobacco-products/",
                "image" => false,
                "items" => [
                    ["title" => "Tobacco Products", "link" => "https://halepathpackaging.co.uk/tobacco-products-tobacco-vaping/"],
                    ["title" => "Cigars", "link" => "https://halepathpackaging.co.uk/cigars/"],
                    ["title" => "Cigarettes", "link" => "https://halepathpackaging.co.uk/cigarettes/"],
                    ["title" => "Vape & E-cigarette", "link" => "https://halepathpackaging.co.uk/vape-e-cigarette/"],
                    ["title" => "Smoking Accessories", "link" => "https://halepathpackaging.co.uk/smoking-accessories/"],
                ]
            ],

            "Gifts & Celebrations" => [
                "link" => "https://halepathpackaging.co.uk/gifts-celebrations/",
                "image" => false,
                "items" => [
                    ["title" => "Candles", "link" => "https://halepathpackaging.co.uk/custom-candle-boxes/"],
                    ["title" => "Gift Boxes", "link" => "https://halepathpackaging.co.uk/gifts-celebrations/"],
                    ["title" => "Holiday Packaging", "link" => "https://halepathpackaging.co.uk/holiday-packaging/"],
                    ["title" => "Wedding & Events", "link" => "https://halepathpackaging.co.uk/wedding-events/"],
                    ["title" => "Party Supplies", "link" => "https://halepathpackaging.co.uk/party-supplies/"],
                    ["title" => "Home Decor", "link" => "https://halepathpackaging.co.uk/home-decor/"],
                    ["title" => "Aromatherapy", "link" => "https://halepathpackaging.co.uk/aromatherapy/"],
                    ["title" => "Crafts & Handmade", "link" => "https://halepathpackaging.co.uk/crafts-handmade/"],
                ]
            ],

            "Apparel & Fashion" => [
                "link" => "http://halepathpackaging.co.uk/apparel-fashion-packaging/",
                "image" => false,
                "items" => [
                    ["title" => "Garment Packaging", "link" => "https://halepathpackaging.co.uk/garment-packaging/"],
                    ["title" => "Jewelry Packaging", "link" => "https://halepathpackaging.co.uk/jewelry-packaging/"],
                    ["title" => "Gadgets & Accessories", "link" => "https://halepathpackaging.co.uk/gadgets-accessories/"],
                    ["title" => "Luxury Fashion", "link" => "https://halepathpackaging.co.uk/luxury-fashion/"],
                    ["title" => "Clothing & Hand Bags", "link" => "https://halepathpackaging.co.uk/clothing-hand-bags/"],
                    ["title" => "Footwear & Shoes", "link" => "https://halepathpackaging.co.uk/footwear-shoes/"],
                    ["title" => "Watches", "link" => "https://halepathpackaging.co.uk/watches/"],
                    ["title" => "Activewear & Sportswear", "link" => "https://halepathpackaging.co.uk/activewear-sportswear/"],
                ]
            ],

            "Pet Products" => [
                "link" => "https://halepathpackaging.co.uk/pet-products-packaging/",
                "image" => false,
                "items" => [
                    ["title" => "Pet Food", "link" => "https://halepathpackaging.co.uk/pet-food/"],
                    ["title" => "Pet Treats & Snacks", "link" => "https://halepathpackaging.co.uk/pet-treats-snacks/"],
                    ["title" => "Pet Accessories", "link" => "https://halepathpackaging.co.uk/pet-accessories/"],
                    ["title" => "Pet Healthcare", "link" => "https://halepathpackaging.co.uk/pet-healthcare/"],
                ]
            ],

            "Pharmaceuticals" => [
                "link" => "https://halepathpackaging.co.uk/pharmaceuticals/",
                "image" => false,
                "items" => [
                    ["title" => "Supplements & Vitamins", "link" => "https://halepathpackaging.co.uk/supplements-vitamins/"],
                    ["title" => "Prescription Medications", "link" => "https://halepathpackaging.co.uk/prescription-medications/"],
                    ["title" => "Healthcare Products", "link" => "https://halepathpackaging.co.uk/healthcare-products/"],
                    ["title" => "Diagnostic & Surgical Equipment", "link" => "https://halepathpackaging.co.uk/diagnostic-surgical-equipment/"],
                    ["title" => "Medical Kits", "link" => "https://halepathpackaging.co.uk/medical-kits/"],
                ]
            ],

            "Consumer Goods & Electronics" => [
                "link" => "https://halepathpackaging.co.uk/goods-electronics",
                "image" => false,
                "items" => [
                    ["title" => "Mobile Accessories", "link" => "https://halepathpackaging.co.uk/mobile-accessories/"],
                    ["title" => "Smart Home Devices", "link" => "https://halepathpackaging.co.uk/smart-home-devices/"],
                    ["title" => "Audio Equipment", "link" => "https://halepathpackaging.co.uk/audio-equipment/"],
                    ["title" => "Wearable Technology", "link" => "https://halepathpackaging.co.uk/wearable-technology/"],
                ]
            ],

            "Automotive Industry" => [
                "link" => "https://halepathpackaging.co.uk/automotive/",
                "image" => false,
                "items" => [
                    ["title" => "Auto Parts & Components", "link" => "https://halepathpackaging.co.uk/auto-parts-components/"],
                    ["title" => "Car Accessories", "link" => "https://halepathpackaging.co.uk/car-accessories/"],
                    ["title" => "Lubricants & Fluids", "link" => "https://halepathpackaging.co.uk/lubricants-fluids/"],
                    ["title" => "Automotive Tools", "link" => "https://halepathpackaging.co.uk/automotive-tools/"],
                ]
            ],

            "Industrial Products" => [
                "link" => "https://halepathpackaging.co.uk/industrial/",
                "image" => false,
                "items" => [
                    ["title" => "Manufacturing Components", "link" => "https://halepathpackaging.co.uk/manufacturing-components/"],
                    ["title" => "Industrial Tools", "link" => "https://halepathpackaging.co.uk/industrial-tools/"],
                    ["title" => "Safety Equipment", "link" => "https://halepathpackaging.co.uk/safety-equipment/"],
                    ["title" => "Chemicals & Raw Materials", "link" => "https://halepathpackaging.co.uk/chemicals-raw-materials/"],
                ]
            ],

            "Sports & Fitness" => [
                "link" => "https://halepathpackaging.co.uk/sports-fitness/",
                "image" => false,
                "items" => [
                    ["title" => "Fitness Accessories", "link" => "https://halepathpackaging.co.uk/fitness-accessories/"],
                    ["title" => "Sports Equipment", "link" => "https://halepathpackaging.co.uk/sports-equipment/"],
                    ["title" => "Athletic Footwear", "link" => "https://halepathpackaging.co.uk/athletic-footwear/"],
                    ["title" => "Sports Nutrition", "link" => "https://halepathpackaging.co.uk/sports-nutrition/"],
                ]
            ],

            "Toys & Games" => [
                "link" => "https://halepathpackaging.co.uk/toys-games-packaging/",
                "image" => false,
                "items" => [
                    ["title" => "Board Games & Puzzles", "link" => "https://halepathpackaging.co.uk/board-games-puzzles/"],
                    ["title" => "Electronic Games & Video Games", "link" => "https://halepathpackaging.co.uk/electronic-games-video-games/"],
                    ["title" => "Educational Toys", "link" => "https://halepathpackaging.co.uk/educational-toys/"],
                    ["title" => "Playing & Education Cards", "link" => "https://halepathpackaging.co.uk/playing-education-cards/"],
                ]
            ],

            "Stationery & Office Supplies" => [
                "link" => "https://halepathpackaging.co.uk/stationary-and-office-supply/",
                "image" => false,
                "items" => [
                    ["title" => "Paper Products", "link" => "https://halepathpackaging.co.uk/paper-products/"],
                    ["title" => "School Supplies", "link" => "https://halepathpackaging.co.uk/school-supplies/"],
                    ["title" => "Cards & Envelopes", "link" => "https://halepathpackaging.co.uk/cards-envelopes/"],
                    ["title" => "Labels & Tags", "link" => "https://halepathpackaging.co.uk/labels-tags/"],
                ]
            ],

            "Print, Advertising & Marketing" => [
                "link" => "https://halepathpackaging.co.uk/",
                "image" => false,
                "items" => [
                    ["title" => "Business Cards & Stationery", "link" => "https://halepathpackaging.co.uk/business-cards-printing/"],
                    ["title" => "Brochures & Catalogs", "link" => "https://halepathpackaging.co.uk/brochures-catalogs/"],
                    ["title" => "Promotional Materials", "link" => "https://halepathpackaging.co.uk/promotional-materials/"],
                    ["title" => "Clothing & Sports Teamwears", "link" => "https://halepathpackaging.co.uk/clothing-sports-teamwears/"],
                ]
            ],

            "Transport & Shipping Industry" => [
                "link" => "https://halepathpackaging.co.uk/transport-shipping/",
                "image" => false,
                "items" => [
                    ["title" => "Corrugated Boxes & Containers", "link" => "https://halepathpackaging.co.uk/corrugated-boxes-containers/"],
                    ["title" => "Shipping Carton", "link" => "https://halepathpackaging.co.uk/shipping-carton/"],
                    ["title" => "Hazardous Materials Packaging", "link" => "https://halepathpackaging.co.uk/hazardous-materials-packaging/"],
                    ["title" => "Industrial Packaging", "link" => "https://halepathpackaging.co.uk/industrial/"],
                    ["title" => "Pallets & Crates", "link" => "https://halepathpackaging.co.uk/pallets-crates/"],
                    ["title" => "Protective Packaging Materials", "link" => "https://halepathpackaging.co.uk/protective-packaging-materials/"],
                ]
            ],

            "Furniture Packaging" => [
                "link" => "https://halepathpackaging.co.uk/furniture-packaging/",
                "image" => false,
                "items" => [
                    ["title" => "Office & Home Furniture Packaging", "link" => "https://halepathpackaging.co.uk/office-home-furniture-packaging/"],
                    ["title" => "Sofas & Armchairs Packaging", "link" => "https://halepathpackaging.co.uk/sofas-armchairs-packaging/"],
                    ["title" => "Storage Solutions", "link" => "https://halepathpackaging.co.uk/storage-solutions/"],
                    ["title" => "Decorative Furniture", "link" => "https://halepathpackaging.co.uk/decorative-furniture/"],
                ]
            ],

            "Sustainable Solutions" => [
                "link" => "https://halepathpackaging.co.uk/sustainable-solutions/",
                "image" => false,
                "items" => [
                    ["title" => "Eco-Friendly Materials", "link" => "https://halepathpackaging.co.uk/eco-friendly-materials-sustainable-solutions/"],
                    ["title" => "Recyclable Packaging", "link" => "https://halepathpackaging.co.uk/recyclable-packaging/"],
                    ["title" => "Biodegradable Options", "link" => "https://halepathpackaging.co.uk/biodegradable-options/"],
                    ["title" => "Compostable Packaging", "link" => "https://halepathpackaging.co.uk/compostable-packaging/"],
                    ["title" => "Reusable Packaging", "link" => "https://halepathpackaging.co.uk/reusable-packaging/"],
                    ["title" => "Hemp Paper Packaging", "link" => "https://halepathpackaging.co.uk/hemp-paper-packaging/"],
                ]
            ],

        ]
    ],
    "custom_packaging" => [
        "title" => "Custom Packaging",
        "link" => "https://halepathpackaging.co.uk/custom-packaging/",
        "groups" => [
            "Box Styles" => [
                "link" => "https://halepathpackaging.co.uk/box-styles/",
                "image" => true,
                "items" => [
                    ["title" => "Folding Carton Boxes", "link" => "https://halepathpackaging.co.uk/folding-carton-boxes/"],
                    ["title" => "Tuck End", "link" => "https://halepathpackaging.co.uk/tuck-end/"],
                    ["title" => "Auto Lock Bottom", "link" => "https://halepathpackaging.co.uk/auto-lock-bottom/"],
                    ["title" => "Snap Lock Bottom", "link" => "https://halepathpackaging.co.uk/snap-lock-bottom/"],
                    ["title" => "Seal End", "link" => "https://halepathpackaging.co.uk/seal-end/"],
                    ["title" => "Double Wall Tuck", "link" => "https://halepathpackaging.co.uk/double-wall-tuck/"],
                    ["title" => "Lock Cap Bottom", "link" => "https://halepathpackaging.co.uk/lock-cap-bottom/"],
                    ["title" => "Rigid & Premium Boxes", "link" => "https://halepathpackaging.co.uk/custom-rigid-boxes/"],
                    ["title" => "Window Boxes", "link" => "https://halepathpackaging.co.uk/window-boxes/"],
                    ["title" => "Pillow Boxes", "link" => "https://halepathpackaging.co.uk/pillow-boxes"],
                    ["title" => "Gable Boxes", "link" => "https://halepathpackaging.co.uk/gable-boxes/"],
                    ["title" => "Die-Cut & Custom Shape Boxes", "link" => "https://halepathpackaging.co.uk/die-cut-custom-shape-boxes/"],
                    ["title" => "Hanger Boxes", "link" => "https://halepathpackaging.co.uk/hanger-boxes/"],
                    ["title" => "Tray, Sleeve & Lid Boxes", "link" => "https://halepathpackaging.co.uk/tray-sleeve-lid-boxes/"],
                    ["title" => "Lid Off Boxes", "link" => "https://halepathpackaging.co.uk/lid-off-boxes/"],
                    ["title" => "Foot Lock Tray", "link" => "https://halepathpackaging.co.uk/foot-lock-tray/"],
                    ["title" => "Mailer Boxes", "link" => "https://halepathpackaging.co.uk/mailer-boxes/"],
                    ["title" => "Display Boxes", "link" => "https://halepathpackaging.co.uk/display-boxes/"],
                    ["title" => "White Cardboard Boxes", "link" => "https://halepathpackaging.co.uk/cardboard-boxes/"],
                    ["title" => "Corrugated Boxes", "link" => "https://halepathpackaging.co.uk/corrugated-boxes-box-styles/"],
                    ["title" => "Holographic Boxes", "link" => "https://halepathpackaging.co.uk/holographic-boxes/"],
                    ["title" => "Paper / Kraft Bags", "link" => "https://halepathpackaging.co.uk/paper-kraft-bags/"],
                    ["title" => "Shopping Bags", "link" => "https://halepathpackaging.co.uk/shopping-bags/"],
                    ["title" => "Stand-Up Pouches", "link" => "https://halepathpackaging.co.uk/stand-up-pouches/"],
                ]
            ],

            "By Industry" => [
                "link" => "https://halepathpackaging.co.uk/by-industry/",
                "image" => false,
                "items" => [
                    ["title" => "Custom Cards", "link" => "https://halepathpackaging.co.uk/custom-game-cards/"],
                    ["title" => "CBD & Cannabis", "link" => "https://halepathpackaging.co.uk/cbd-cannabis/"],
                    ["title" => "Cosmetic Boxes", "link" => "https://halepathpackaging.co.uk/cosmetic-boxes/"],
                    ["title" => "Candle Boxes", "link" => "https://halepathpackaging.co.uk/custom-candle-boxes/"],
                    ["title" => "Food & Beverage", "link" => "https://halepathpackaging.co.uk/food-packaging/"],
                    ["title" => "Tobacco Products", "link" => "https://halepathpackaging.co.uk/tobacco-products/"],
                    ["title" => "Cigarette Boxes", "link" => "https://halepathpackaging.co.uk/cigarette-boxes/"],
                    ["title" => "Child Resistant Packaging", "link" => "https://halepathpackaging.co.uk/child-resistant-packaging/"],
                    ["title" => "Apparel & Fashion", "link" => "https://halepathpackaging.co.uk/apparel-fashion-packaging/"],
                    ["title" => "Pharmaceutical & Healthcare", "link" => "https://halepathpackaging.co.uk/pharmaceuticals/"],
                    ["title" => "Pet Products", "link" => "https://halepathpackaging.co.uk/pet-products-packaging/"],
                    ["title" => "Electronics & Gadgets", "link" => "https://halepathpackaging.co.uk/electronics-gadgets/"],
                    ["title" => "Toys & Games", "link" => "https://halepathpackaging.co.uk/toys-games-packaging/"],
                    ["title" => "Automotive & Office", "link" => "https://halepathpackaging.co.uk/automotive/"],
                    ["title" => "Stationery & Pen Boxes", "link" => "https://halepathpackaging.co.uk/stationary-and-office-supply/"],
                ]
            ],

            "By Purpose" => [
                "link" => "https://halepathpackaging.co.uk/by-purpose/",
                "image" => false,
                "items" => [
                    ["title" => "Retail & Display", "link" => "https://halepathpackaging.co.uk/retail-display/"],
                    ["title" => "Shipping & E-commerce", "link" => "https://halepathpackaging.co.uk/shipping-e-commerce/"],
                    ["title" => "Gift & Presentation", "link" => "https://halepathpackaging.co.uk/gift-presentation/"],
                    ["title" => "Product Protection", "link" => "https://halepathpackaging.co.uk/product-protection/"],
                    ["title" => "Food & Beverage", "link" => "https://halepathpackaging.co.uk/food-beverage-by-purpose/"],
                    ["title" => "Industrial & Bulk", "link" => "https://halepathpackaging.co.uk/bulk-industrial-solutions/"],
                    ["title" => "Promotional Packaging", "link" => "https://halepathpackaging.co.uk/promotional-packaging/"],
                    ["title" => "Seasonal & Event", "link" => "https://halepathpackaging.co.uk/seasonal-event/"],
                ]
            ],

            "Materials" => [
                "link" => "https://halepathpackaging.co.uk/materials/",
                "image" => false,
                "items" => [
                    ["title" => "Core Materials", "link" => "https://halepathpackaging.co.uk/core-materials/"],
                    ["title" => "Kraft Paper", "link" => "https://halepathpackaging.co.uk/kraft-paper/"],
                    ["title" => "Cardboard / Paperboard", "link" => "https://halepathpackaging.co.uk/cardboard-paperboard/"],
                    ["title" => "Corrugated Board", "link" => "https://halepathpackaging.co.uk/corrugated-board/"],
                    ["title" => "Rigid Board", "link" => "https://halepathpackaging.co.uk/rigid-board/"],
                    ["title" => "Bux Board", "link" => "https://halepathpackaging.co.uk/bux-board/"],
                    ["title" => "Eco-Friendly Materials", "link" => "https://halepathpackaging.co.uk/eco-friendly-materials/"],
                    ["title" => "Recyclable Materials", "link" => "https://halepathpackaging.co.uk/recyclable-materials/"],
                    ["title" => "Biodegradable Packaging", "link" => "https://halepathpackaging.co.uk/biodegradable-packaging/"],
                    ["title" => "FSC-Certified Paper", "link" => "https://halepathpackaging.co.uk/fsc-certified-paper/"],
                ]
            ],

            "Services" => [
                "link" => "https://halepathpackaging.co.uk/services/",
                "image" => false,
                "items" => [
                    ["title" => "Design & Sampling", "link" => "https://halepathpackaging.co.uk/design-sampling/"],
                    ["title" => "Production & Orders", "link" => "https://halepathpackaging.co.uk/production-orders/"],
                    ["title" => "Logistics & Support", "link" => "https://halepathpackaging.co.uk/logistics-support/"],
                    ["title" => "Printing & Finishing", "link" => "https://halepathpackaging.co.uk/printing-finishing/"],
                    ["title" => "Foil Stamping", "link" => "https://halepathpackaging.co.uk/foil-stamping/"],
                    ["title" => "Embossing / Debossing", "link" => "https://halepathpackaging.co.uk/embossing-debossing/"],
                    ["title" => "Lamination & Varnish", "link" => "https://halepathpackaging.co.uk/lamination-varnish/"],
                ]
            ],

        ]
    ],
    "corrugated_packaging" => [
        "title" => "Corrugated Packaging",
        "link" => "https://halepathpackaging.co.uk/corrugated-packaging",
        "groups" => [
            "Food & Beverage Packaging" => [
                "link" => "https://halepathpackaging.co.uk/food-beverage-packaging",
                "image" => true,
                "items" => [
                    ["title" => "Fresh Produce", "link" => "https://halepathpackaging.co.uk/fresh-produce/"],
                    ["title" => "Frozen & Chilled", "link" => "https://halepathpackaging.co.uk/frozen-chilled/"],
                    ["title" => "Bakery & Confectionery", "link" => "https://halepathpackaging.co.uk/bakery-confectionery/"],
                    ["title" => "Meat, Poultry & Seafood", "link" => "https://halepathpackaging.co.uk/meat-poultry-seafood/"],
                    ["title" => "Dairy Products", "link" => "https://halepathpackaging.co.uk/dairy-products/"],
                    ["title" => "Dry / Cupboard Foods", "link" => "https://halepathpackaging.co.uk/dry-cupboard-foods/"],
                ]
            ],

            "Beverage Multipacks & Systems" => [
                "link" => "https://halepathpackaging.co.uk/beverage-multipacks/",
                "image" => false,
                "items" => [
                    ["title" => "Bottle Carriers", "link" => "https://halepathpackaging.co.uk/bottle-carriers/"],
                    ["title" => "Can Multipacks", "link" => "https://halepathpackaging.co.uk/can-multipacks/"],
                    ["title" => "Bag-in-Box Outer Packaging", "link" => "https://halepathpackaging.co.uk/bag-in-box-outer-packaging/"],
                    ["title" => "Plastic-Free Carriers", "link" => "https://halepathpackaging.co.uk/plastic-free-carriers/"],
                ]
            ],

            "E-Commerce Packaging" => [
                "link" => "https://halepathpackaging.co.uk/e-commerce/",
                "image" => false,
                "items" => [
                    ["title" => "Standard Mailing Boxes", "link" => "https://halepathpackaging.co.uk/standard-mailing-boxes/"],
                    ["title" => "Crash-Lock Mailers", "link" => "https://halepathpackaging.co.uk/crash-lock-mailers/"],
                    ["title" => "Pizza-Style / Flat Postal Boxes", "link" => "https://halepathpackaging.co.uk/pizza-style-flat-postal-boxes/"],
                    ["title" => "Letterbox-Sized Packs", "link" => "https://halepathpackaging.co.uk/letterbox-sized-packs/"],
                    ["title" => "Returns & Resealable Packaging", "link" => "https://halepathpackaging.co.uk/returns-resealable-packaging/"],
                    ["title" => "Frustration-Free / Amazon-Compatible", "link" => "https://halepathpackaging.co.uk/frustration-free-amazon-compatible/"],
                ]
            ],

            "Shipping & Transport" => [
                "link" => "https://halepathpackaging.co.uk/shipping-transport/",
                "image" => false,
                "items" => [
                    ["title" => "Standard Shipping Boxes", "link" => "https://halepathpackaging.co.uk/standard-shipping-boxes/"],
                    ["title" => "Hazardous Goods / UN Certified", "link" => "https://halepathpackaging.co.uk/hazardous-goods-un-certified/"],
                    ["title" => "Pallet Boxes & Large Containers", "link" => "https://halepathpackaging.co.uk/pallet-boxes-large-containers/"],
                    ["title" => "Export / Moisture-Resistant", "link" => "https://halepathpackaging.co.uk/export-moisture-resistant/"],
                ]
            ],

            "Wall Constructions" => [
                "link" => "https://halepathpackaging.co.uk/wall-constructions/",
                "image" => false,
                "items" => [
                    ["title" => "Single Wall Boxes", "link" => "https://halepathpackaging.co.uk/single-wall-boxes/"],
                    ["title" => "Double Wall Boxes", "link" => "https://halepathpackaging.co.uk/double-wall-boxes/"],
                    ["title" => "Tri Wall Boxes", "link" => "https://halepathpackaging.co.uk/tri-wall-boxes/"],
                    ["title" => "Custom Multi-Wall Options", "link" => "https://halepathpackaging.co.uk/custom-multi-wall-options/"],
                ]
            ],

            "Slotted & Standard Boxes" => [
                "link" => "https://halepathpackaging.co.uk/slotted-standard-boxes/",
                "image" => false,
                "items" => [
                    ["title" => "Regular Slotted Containers", "link" => "https://halepathpackaging.co.uk/regular-slotted-containers/"],
                    ["title" => "Half Slotted Containers", "link" => "https://halepathpackaging.co.uk/half-slotted-containers/"],
                    ["title" => "Full Overlap Slotted", "link" => "https://halepathpackaging.co.uk/full-overlap-slotted/"],
                    ["title" => "Center Special Slotted", "link" => "https://halepathpackaging.co.uk/center-special-slotted/"],
                    ["title" => "Heavy-Duty Shipping Containers", "link" => "https://halepathpackaging.co.uk/heavy-duty-shipping-containers/"],
                ]
            ],

            "Functional & Automation-Friendly Boxes" => [
                "link" => "https://halepathpackaging.co.uk/functional-automation/",
                "image" => false,
                "items" => [
                    ["title" => "Crash Lock Boxes", "link" => "https://halepathpackaging.co.uk/crash-lock-boxes/"],
                    ["title" => "Wrap Around Boxes", "link" => "https://halepathpackaging.co.uk/wrap-around-boxes/"],
                    ["title" => "Load-Sharing Wraparounds", "link" => "https://halepathpackaging.co.uk/load-sharing-wraparounds/"],
                    ["title" => "Wrap 8 / Multi-Sided Wraparounds", "link" => "https://halepathpackaging.co.uk/wrap-8-multi-sided-wraparounds/"],
                    ["title" => "SRP Split Wrap", "link" => "https://halepathpackaging.co.uk/srp-split-wrap/"],
                ]
            ],

            "Trays & Retail Ready Solutions" => [
                "link" => "https://halepathpackaging.co.uk/trays-retail-ready-solutions/",
                "image" => false,
                "items" => [
                    ["title" => "Corrugated Trays", "link" => "https://halepathpackaging.co.uk/corrugated-trays/"],
                    ["title" => "Retail Ready Packaging", "link" => "https://halepathpackaging.co.uk/retail-ready-packaging/"],
                    ["title" => "Shelf-Ready Trays", "link" => "https://halepathpackaging.co.uk/shelf-ready-trays/"],
                    ["title" => "High-Graphic Retail Boxes", "link" => "https://halepathpackaging.co.uk/high-graphic-retail-boxes/"],
                ]
            ],

            "Bulk & Industrial Solutions" => [
                "link" => "https://halepathpackaging.co.uk/bulk-industrial-solutions/",
                "image" => false,
                "items" => [
                    ["title" => "Bulk Bins & Containers", "link" => "https://halepathpackaging.co.uk/bulk-bins-containers/"],
                    ["title" => "Laminated Bulk Bins", "link" => "https://halepathpackaging.co.uk/laminated-bulk-bins/"],
                    ["title" => "Heavy-Duty Industrial Boxes", "link" => "https://halepathpackaging.co.uk/heavy-duty-industrial-boxes/"],
                    ["title" => "Protective Inserts & Dividers", "link" => "https://halepathpackaging.co.uk/protective-inserts-dividers/"],
                ]
            ],

            "Specialty Corrugated Packaging" => [
                "link" => "https://halepathpackaging.co.uk/specialty-",
                "image" => false,
                "items" => [
                    ["title" => "eCommerce Mailer Boxes", "link" => "https://halepathpackaging.co.uk/ecommerce-mailer-boxes/"],
                    ["title" => "Bag-in-Box Outer Corrugated Boxes", "link" => "https://halepathpackaging.co.uk/bag-in-box-outer-corrugated-boxes/"],
                    ["title" => "Display & Point-of-Sale Units", "link" => "https://halepathpackaging.co.uk/display-point-of-sale-units/"],
                    ["title" => "Custom Die-Cut & Protective Packaging", "link" => "https://halepathpackaging.co.uk/custom-die-cut-protective-packaging/"],
                ]
            ],

        ]
    ],
    "flexible_packaging" => [
        "title" => "Flexible Packaging",
        "link" => "https://halepathpackaging.co.uk/flexible-packaging",
        "groups" => [
            "Flexible Flexible Packaging Bags" => [
                "link" => "https://halepathpackaging.co.uk/flexible-packaging-bags/",
                "image" => true,
                "items" => [
                    ["title" => "Stand Up Pouch", "link" => "https://halepathpackaging.co.uk/stand-up-pouch/"],
                    ["title" => "Flat Bottom Pouch", "link" => "https://halepathpackaging.co.uk/flat-bottom-pouch/"],
                    ["title" => "Mylar Bags", "link" => "https://halepathpackaging.co.uk/mylar-bags/"],
                    ["title" => "Child Resistant Bags", "link" => "https://halepathpackaging.co.uk/child-resistant-bags/"],
                    ["title" => "Shrink Sleeve Labels", "link" => "https://halepathpackaging.co.uk/shrink-sleeve-labels/"],
                    ["title" => "Spout Pouch", "link" => "https://halepathpackaging.co.uk/spout-pouch/"],
                    ["title" => "3 Side Seal Pouch", "link" => "https://halepathpackaging.co.uk/3-side-seal-pouch/"],
                    ["title" => "Side Gusset Bags", "link" => "https://halepathpackaging.co.uk/side-gusset-bags/"],
                    ["title" => "Shaped Pouch", "link" => "https://halepathpackaging.co.uk/shaped-pouch/"],
                    ["title" => "Packaging Film Roll", "link" => "https://halepathpackaging.co.uk/packaging-film-roll/"],
                    ["title" => "Kraft Paper Pouch", "link" => "https://halepathpackaging.co.uk/kraft-paper-pouch/"],
                    ["title" => "Recyclable Pouches", "link" => "https://halepathpackaging.co.uk/recyclable-pouches/"],
                    ["title" => "Biodegradable Pouches", "link" => "https://halepathpackaging.co.uk/biodegradable-pouches/"],
                ]
            ],

            "Food Packaging" => [
                "link" => "https://halepathpackaging.co.uk/food-packaging/",
                "image" => false,
                "items" => [
                    ["title" => "Coffee Packaging", "link" => "https://halepathpackaging.co.uk/coffee-packaging/"],
                    ["title" => "Bakery & Confectionery", "link" => "https://halepathpackaging.co.uk/bakery-confectionery-food-packaging/"],
                    ["title" => "Chocolate Bar Packaging", "link" => "https://halepathpackaging.co.uk/chocolate-bar-packaging/"],
                    ["title" => "Candy & Sweets", "link" => "https://halepathpackaging.co.uk/candy-sweets/"],
                    ["title" => "Coffee & Tea Packaging", "link" => "https://halepathpackaging.co.uk/coffee-tea-packaging/"],
                    ["title" => "Beverages & Drinks", "link" => "https://halepathpackaging.co.uk/beverages-drinks/"],
                    ["title" => "Snacks & Chips", "link" => "https://halepathpackaging.co.uk/snacks-chips/"],
                    ["title" => "Frozen Foods", "link" => "https://halepathpackaging.co.uk/frozen-foods/"],
                    ["title" => "Dairy Products", "link" => "https://halepathpackaging.co.uk/dairy-products-food-packaging/"],
                    ["title" => "Wine & Spirits Pouch", "link" => "https://halepathpackaging.co.uk/wine-spirits-pouch/"],
                    ["title" => "Energy Drinks & Juice", "link" => "https://halepathpackaging.co.uk/energy-drinks-juice/"],
                    ["title" => "Ice Cream & Desserts", "link" => "https://halepathpackaging.co.uk/ice-cream-desserts/"],
                    ["title" => "Food Delivery Packaging", "link" => "https://halepathpackaging.co.uk/food-delivery-packaging/"],
                    ["title" => "Meal Kits", "link" => "https://halepathpackaging.co.uk/meal-kits/"],
                    ["title" => "Cannabis Packaging", "link" => "https://halepathpackaging.co.uk/cannabis/"],
                    ["title" => "Pet Food Packaging", "link" => "https://halepathpackaging.co.uk/pet-food-packaging/"],
                    ["title" => "Protein Powder Packaging", "link" => "https://halepathpackaging.co.uk/protein-powder-packaging/"],
                    ["title" => "Nuts Packaging", "link" => "https://halepathpackaging.co.uk/nuts-packaging/"],
                    ["title" => "Retort Pouch", "link" => "https://halepathpackaging.co.uk/retort-pouch/"],
                    ["title" => "Condiment Packaging", "link" => "https://halepathpackaging.co.uk/condiment-packaging/"],
                    ["title" => "Rice Pouches", "link" => "https://halepathpackaging.co.uk/rice-pouches/"],
                    ["title" => "Fish, Meat & Jerky Packaging", "link" => "https://halepathpackaging.co.uk/fish-meat-jerky-packaging/"],
                    ["title" => "Supplement & Protein Packaging", "link" => "https://halepathpackaging.co.uk/supplement-protein-packaging/"],
                ]
            ],
            "Non Food Packaging" => [
                "link" => "https://halepathpackaging.co.uk/non-food-packaging/",
                "image" => false,
                "items" => [
                    ["title" => "Detergent Packaging", "link" => "https://halepathpackaging.co.uk/detergent-packaging/"],
                    ["title" => "Simple Sachet Packaging", "link" => "https://halepathpackaging.co.uk/simple-sachet-packaging/"],
                    ["title" => "Cat Litter Packaging", "link" => "https://halepathpackaging.co.uk/cat-litter-packaging/"],
                    ["title" => "Lawn & Garden Packaging", "link" => "https://halepathpackaging.co.uk/lawn-garden-packaging/"],
                    ["title" => "Construction & Hardware Packaging", "link" => "https://halepathpackaging.co.uk/construction-hardware-packaging/"],
                    ["title" => "Agriculture Packaging", "link" => "https://halepathpackaging.co.uk/agriculture-packaging/"],
                    ["title" => "Household Packaging", "link" => "https://halepathpackaging.co.uk/household-packaging/"],
                    ["title" => "Cleaning Product Packaging", "link" => "https://halepathpackaging.co.uk/cleaning-product-packaging/"]
                ]
            ],

        ]
    ],
    "commercial_printing" => [
    "title" => "Commercial Printing",
    "link" => "https://halepathpackaging.co.uk/commercial-printing/",
    "groups" => [
        "Offset Printing (Lithography)" => [
            "link" => "https://halepathpackaging.co.uk/offset-printing-lithography/",
            "image" => true,
            "items" => []
        ],
        "Digital Printing" => [
            "link" => "https://halepathpackaging.co.uk/digital-printing/",
            "image" => true,
            "items" => []
        ],
        "Flexographic Printing (Flexo)" => [
            "link" => "https://halepathpackaging.co.uk/flexographic-printing-flexo/",
            "items" => []
        ],
        "Gravure Printing (Flexible Packaging)" => [
            "link" => "https://halepathpackaging.co.uk/gravure-printing-flexible-packaging/",
            "items" => []
        ],
        "Spot UV" => [
            "link" => "https://halepathpackaging.co.uk/spot-uv-offset-printing-lithography/",
            "items" => []
        ],
        "Screen Printing" => [
            "link" => "https://halepathpackaging.co.uk/screen-printing/",
            "items" => []
        ],
        "Letterpress (Specialty)" => [
            "link" => "https://halepathpackaging.co.uk/letterpress-specialty/",
            "items" => []
        ],
        "UV Offset Printing" => [
            "link" => "https://halepathpackaging.co.uk/uv-offset-printing/",
            "items" => []
        ],
        "Foil Printing" => [
            "link" => "https://halepathpackaging.co.uk/foil-printing/",
            "items" => []
        ],
    ]
    ],
    "print_advertising" => [
        "title" => "Print & Advertising",
        "link" => "https://halepathpackaging.co.uk/print-advertising/",
        "groups" => [

            "Office Supplies" => [
                "link" => "https://halepathpackaging.co.uk/office-supplies/",
                "image" => true,
                "items" => [
                    ["title" => "Workspace Accessories", "link" => "https://halepathpackaging.co.uk/workspace-accessories/"],
                    ["title" => "Pens, Pencils & Markers", "link" => "https://halepathpackaging.co.uk/pens-pencils-markers/"],
                    ["title" => "Notes & Badge Holders", "link" => "https://halepathpackaging.co.uk/notes-badge-holders/"],
                ]
            ],

            "Business Cards" => [
                "link" => "https://halepathpackaging.co.uk/business-cards-printing/",
                "image" => false,
                "items" => [
                    ["title" => "Standard Card", "link" => "https://halepathpackaging.co.uk/standard-card/"],
                    ["title" => "Premium Card", "link" => "https://halepathpackaging.co.uk/premium-card/"],
                    ["title" => "Deluxe Card", "link" => "https://halepathpackaging.co.uk/deluxe-card/"],
                    ["title" => "Magnetic Business Card", "link" => "https://halepathpackaging.co.uk/magnetic-business-card/"],
                    ["title" => "Loyalty Card", "link" => "https://halepathpackaging.co.uk/loyalty-card/"],
                ]
            ],

            "Postcards" => [
                "link" => "https://halepathpackaging.co.uk/postcards/",
                "image" => false,
                "items" => [
                    ["title" => "Standard Postcard", "link" => "https://halepathpackaging.co.uk/standard-postcard/"],
                    ["title" => "Die Cut Postcard", "link" => "https://halepathpackaging.co.uk/die-cut-postcard/"],
                    ["title" => "Rounded Corner Postcard", "link" => "https://halepathpackaging.co.uk/rounded-corner-postcard/"],
                    ["title" => "Mailing Postcard", "link" => "https://halepathpackaging.co.uk/mailing-postcard/"],
                    ["title" => "EDDM Postcard", "link" => "https://halepathpackaging.co.uk/eddm-postcard/"],
                ]
            ],

            "Marketing Materials" => [
                "link" => "https://halepathpackaging.co.uk/marketing-materials/",
                "image" => false,
                "items" => [
                    ["title" => "Flyers", "link" => "https://halepathpackaging.co.uk/flyers/"],
                    ["title" => "Brochures", "link" => "https://halepathpackaging.co.uk/brochures/"],
                    ["title" => "Folders", "link" => "https://halepathpackaging.co.uk/folders/"],
                    ["title" => "Rack Cards", "link" => "https://halepathpackaging.co.uk/rack-cards/"],
                    ["title" => "Door Hangers", "link" => "https://halepathpackaging.co.uk/door-hangers/"],
                    ["title" => "Custom Tickets", "link" => "https://halepathpackaging.co.uk/custom-tickets/"],
                    ["title" => "Gift Certificates", "link" => "https://halepathpackaging.co.uk/gift-certificates/"],
                ]
            ],

            "Business Stationery" => [
                "link" => "https://halepathpackaging.co.uk/business-stationery/",
                "image" => false,
                "items" => [
                    ["title" => "Shipping Mailers & Envelopes", "link" => "https://halepathpackaging.co.uk/shipping-mailers-envelopes/"],
                    ["title" => "Letterheads", "link" => "https://halepathpackaging.co.uk/letterheads/"],
                    ["title" => "Business Invitations", "link" => "https://halepathpackaging.co.uk/business-invitations/"],
                    ["title" => "Calendars, Stamps & Ink", "link" => "https://halepathpackaging.co.uk/calendars-stamps-ink/"],
                ]
            ],

            "Banners & Displays" => [
                "link" => "https://halepathpackaging.co.uk/banners-displays/",
                "image" => false,
                "items" => [
                    ["title" => "Hanging Banner", "link" => "https://halepathpackaging.co.uk/hanging-banner/"],
                    ["title" => "Standing Banner", "link" => "https://halepathpackaging.co.uk/standing-banner/"],
                    ["title" => "Table Covers", "link" => "https://halepathpackaging.co.uk/table-covers/"],
                    ["title" => "Display & Tent", "link" => "https://halepathpackaging.co.uk/display-tent/"],
                    ["title" => "Portable Counter", "link" => "https://halepathpackaging.co.uk/portable-counter/"],
                ]
            ],

            "Decals & Signage" => [
                "link" => "https://halepathpackaging.co.uk/decals-signage/",
                "image" => false,
                "items" => [
                    ["title" => "Wall & Window Decals", "link" => "https://halepathpackaging.co.uk/wall-window-decals/"],
                    ["title" => "Car Decals & Magnets", "link" => "https://halepathpackaging.co.uk/car-decals-magnets/"],
                    ["title" => "Yard Signs", "link" => "https://halepathpackaging.co.uk/yard-signs/"],
                    ["title" => "Rigid Signs & Boards", "link" => "https://halepathpackaging.co.uk/rigid-signs-boards/"],
                    ["title" => "Canvas Prints & Wall Art", "link" => "https://halepathpackaging.co.uk/canvas-prints-wall-art/"],
                    ["title" => "A-Frame & Desk Signs", "link" => "https://halepathpackaging.co.uk/a-frame-desk-signs/"],
                ]
            ],

            "Labels & Stickers" => [
                "link" => "https://halepathpackaging.co.uk/labels-stickers/",
                "image" => false,
                "items" => [
                    ["title" => "Sticker Singles", "link" => "https://halepathpackaging.co.uk/sticker-singles/"],
                    ["title" => "Die-Cut Stickers", "link" => "https://halepathpackaging.co.uk/die-cut-stickers/"],
                    ["title" => "Kiss-Cut Stickers", "link" => "https://halepathpackaging.co.uk/kiss-cut-stickers/"],
                    ["title" => "Sheet Stickers", "link" => "https://halepathpackaging.co.uk/sheet-stickers/"],
                    ["title" => "Product Stickers on Sheet", "link" => "https://halepathpackaging.co.uk/product-stickers-on-sheet/"],
                    ["title" => "Return Address Labels", "link" => "https://halepathpackaging.co.uk/return-address-labels/"],
                    ["title" => "Roll Label Stickers", "link" => "https://halepathpackaging.co.uk/roll-label-stickers/"],
                    ["title" => "Die-Cut Sticker Rolls", "link" => "https://halepathpackaging.co.uk/die-cut-sticker-rolls/"],
                ]
            ],

            "Promotional Products" => [
                "link" => "https://halepathpackaging.co.uk/promotional-products/",
                "image" => false,
                "items" => [
                    ["title" => "Booklet Catalogs", "link" => "https://halepathpackaging.co.uk/booklet-catalogs/"],
                    ["title" => "Clothing", "link" => "https://halepathpackaging.co.uk/clothing/"],
                    ["title" => "Hats", "link" => "https://halepathpackaging.co.uk/hats/"],
                    ["title" => "Drinkware", "link" => "https://halepathpackaging.co.uk/drinkware/"],
                    ["title" => "Snacks & Candy", "link" => "https://halepathpackaging.co.uk/snacks-candy/"],
                    ["title" => "Lifestyle & Personal Items", "link" => "https://halepathpackaging.co.uk/lifestyle-personal-items/"],
                ]
            ],

            "Invitations, Cards & Gifts" => [
                "link" => "https://halepathpackaging.co.uk/invitations-cards-gifts/",
                "image" => false,
                "items" => [
                    ["title" => "Invitations & Announcements", "link" => "https://halepathpackaging.co.uk/invitations-announcements/"],
                    ["title" => "Party Invitations", "link" => "https://halepathpackaging.co.uk/party-invitations/"],
                    ["title" => "Thank You & Holiday Cards", "link" => "https://halepathpackaging.co.uk/thank-you-holiday-cards/"],
                    ["title" => "Corporate Gifts", "link" => "https://halepathpackaging.co.uk/corporate-gifts/"],
                ]
            ],

        ]
    ],
  "innovation" => [
    "title" => "Innovation",
    "link" => "https://halepathpackaging.co.uk/innovation/",
    "groups" => [
        "Branded Finishes" => [
            "link" => "https://halepathpackaging.co.uk/branded-finishes/",
            "image" => true,
            "items" => []
        ],
        "UV Printing Technology" => [
            "link" => "https://halepathpackaging.co.uk/uv-printing-technology/",
            "image" => true,
            "items" => []
        ],
        "Foil Printing Solutions" => [
            "link" => "https://halepathpackaging.co.uk/foil-printing-solutions/",
            "items" => []
        ],
        "Privacy Printing" => [
            "link" => "https://halepathpackaging.co.uk/privacy-printing/",
            "items" => []
        ],
        "Research & Development (R&D)" => [
            "link" => "https://halepathpackaging.co.uk/research-development-rd/",
            "items" => []
        ],
        "Sustainable Innovation" => [
            "link" => "https://halepathpackaging.co.uk/sustainable-innovation/",
            "items" => []
        ],
        "Material Innovation" => [
            "link" => "https://halepathpackaging.co.uk/material-innovation/",
            "items" => []
        ],
        "Structural Innovation" => [
            "link" => "https://halepathpackaging.co.uk/structural-innovation/",
            "items" => []
        ],
        "Smart Packaging Technology" => [
            "link" => "https://halepathpackaging.co.uk/smart-packaging-technology/",
            "items" => []
        ],
        "Digital Printing Advancement" => [
            "link" => "https://halepathpackaging.co.uk/digital-printing-advancement/",
            "items" => []
        ],
        "Surface Coating Technology" => [
            "link" => "https://halepathpackaging.co.uk/surface-coating-technology/",
            "items" => []
        ],
        "Security Printing Solutions" => [
            "link" => "https://halepathpackaging.co.uk/security-printing-solutions/",
            "items" => []
        ]
    ]
],
   
];
?>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NJ65R553" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <?php if (!wp_is_mobile()) : ?>
        <?php get_template_part('template-parts/theme/top-bar'); ?>
        <?php endif; ?>
        <!-- Header -->
        <header class="bg-[#f5f5f5] sticky top-0 z-50 sm:py-[15px]">
            <div class="hale_container py-1 flex lg:flex-col flex-row items-center justify-between gap-5">
                <!-- Logo -->
                <div class="lg:hidden w-1/2">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo"
                            height="60" width="60" />
                    </a>
                </div>
                <!-- Navigation -->
                <nav class="lg:w-full w-1/2 flex lg:justify-center justify-end items-center">
                    <button id="mobileMenuBtn" class="lg:hidden">
                        <svg id="mobileMenuIcon" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <!-- Hamburger -->
                            <path id="hamburgerIcon" stroke-linecap="round" stroke-linejoin="round"
                                d="M4 6h16M4 12h16M4 18h16" />

                            <!-- Close -->
                            <path id="closeIcon" class="hidden" stroke-linecap="round" stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <ul id="desktopNav" class="hidden lg:flex gap-1.5 justify-between w-full">
                        <?php foreach ($megaMenus as $key => $menu): ?>
                        <?php
                            $isMega = !empty($menu['groups']);
                            $isDropdown = empty($menu['groups']) && !empty($menu['items']);
                            ?>
                        <li class="relative cursor-pointer flex items-center" <?php if ($isMega): ?>
                            data-mega-target="megaMenu-<?php echo $key; ?>" <?php endif; ?> <?php if ($isDropdown): ?>
                            data-sub-target="subMenu-<?php echo $key; ?>" <?php endif; ?>>

                            <a href="<?php echo esc_url($menu['link']); ?>"
                                class="text-sm font-normal capitalize text-title_Clr hover:text-white hover:bg-secondary px-2 py-2 rounded-[30px] flex items-center">
                                <?php echo $menu['title']; ?>
                                <?php if ($isMega || $isDropdown): ?>
                                <i class="fa fa-chevron-down ml-1.5"></i>
                                <?php endif; ?>
                            </a>
                            <!-- subMenu Menus -->
                            <?php if ($isDropdown): ?>
                            <div id="subMenu-<?php echo $key; ?>"
                                class="subMenu hidden absolute right-0 top-full translate-y-5 pt-2 bg-black/20 backdrop-blur-[10px] shadow-xl rounded-lg p-4 min-w-[300px] space-y-2 z-50">
                                <ul>
                                    <?php foreach ($menu['items'] as $item): ?>
                                    <li>
                                        <a href="<?php echo esc_url($item['link']); ?>"
                                            class="block text-sm capitalize text-white hover:text-primary">
                                            <?php echo $item['title']; ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>




            <?php if (wp_is_mobile()) : ?>
            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden lg:hidden bg-white px-4 pt-5">
                <ul class="space-y-3 h-full overflow-y-scroll">
                    <?php foreach ($megaMenus as $key => $menu): ?>
                    <li class="flex flex-col">
                        <span class="flex">
                            <a href="<?php echo esc_url($menu['link']); ?>"
                                class="text-[15px] font-medium uppercase text-title_Clr hover:text-primary flex items-center justify-between">
                                <?php echo $menu['title']; ?>

                            </a>
                            <?php if (!empty($menu['groups'])): ?>
                            <i class="fa fa-chevron-down ml-2"></i>
                            <?php endif; ?>
                        </span>
                        <?php if (!empty($menu['groups'])): ?>
                        <div class="mobileMegaContent hidden px-2 pt-2 space-y-2">
                            <?php foreach ($menu['groups'] as $groupName => $groupData): ?>
                            <div>
                                <ul class="space-y-2 list-none">
                                    <li>
                                        <a href="<?php echo esc_url($groupData['link']); ?>"
                                            class="text-[15px] font-medium uppercase text-title_Clr hover:text-primary">
                                            <?php echo $groupName; ?>
                                        </a>
                                        <?php if (!empty($groupData['items'])): ?>
                                        <ul class="pt-2 px-2 space-y-2 list-none">
                                            <?php foreach ($groupData['items'] as $item): ?>
                                            <li>
                                                <a href="<?php echo esc_url($item['link']); ?>"
                                                    class="text-[15px] font-medium uppercase text-title_Clr hover:text-primary">
                                                    <?php echo $item['title']; ?>
                                                </a>
                                            </li>

                                            <?php endforeach; ?>
                                        </ul>
                                        <?php endif; ?>
                                    </li>

                                </ul>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <?php else : ?>
            <!-- Desktop Mega Menus -->
            <?php foreach ($megaMenus as $key => $menu): ?>
            <?php if (!empty($menu['groups'])): ?>
            <div id="megaMenu-<?php echo $key; ?>"
                class="megaMenu hidden lg:absolute left-1/2 -translate-x-1/2 2xl:top-[74px]  top-[94px] hale_container mx-auto  z-50 overflow-y-auto min-h-fit h-full">
                <?php
                        $hasImage = false;

                        foreach ($menu['groups'] as $groupName => $items) {
                            if (!empty($items['image']) && $items['image'] === true) {
                                $hasImage = true;
                                break;
                            }
                        }
                        ?>
                <div
                    class="mx-auto !px-0 grid <?php echo $hasImage ? 'grid-cols-4 hale_container' : 'grid-cols-4 hale_container'; ?> gap-0 rounded-b-2xl shadow-xl bg-black/20 backdrop-blur-[10px]">
                    <!-- Column 1: Parent Groups -->
                    <div class="rounded-bl-2xl ">
                        <ul class="space-y-0">
                            <?php $i = 0; ?>
                            <?php foreach ($menu['groups'] as $groupName => $items): ?>
                            <li class="mainCat flex items-center gap-2 py-2 px-5 " data-index="<?php echo $i; ?>">
                                <a href="<?php echo esc_url($items['link']); ?>"
                                    class="text-xs capitalize text-white cursor-pointer flex items-center gap-2">
                                    <?php echo $groupName; ?>
                                </a>
                            </li>
                            <?php $i++; endforeach; ?>
                        </ul>
                    </div>
                    <!-- Column 2: Child Items -->
                    <div class="col-span-1 bg-secondary/30 backdrop-blur-[10px]">
                        <?php $i = 0;
                                foreach ($menu['groups'] as $groupName => $groupData): ?>
                        <div class="hidden childGroups" data-group="<?php echo $i; ?>">
                            <ul class="space-y-0">
                                <?php foreach ($groupData['items'] as $item): ?>
                                <li class="py-1 px-5">
                                    <a href="<?php echo esc_url($item['link']); ?>"
                                        class="text-xs capitalize text-white hover:text-primary">
                                        <?php echo $item['title']; ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php $i++; endforeach; ?>
                    </div>
                    <!-- Column 3: Images -->
                    <?php if ($hasImage): ?>
                    <div class="col-span-2 py-4 px-6">
                        <?php $i = 0; ?>
                        <?php foreach ($menu['groups'] as $groupName => $items): ?>
                        <?php if (!empty($items['image']) && $items['image'] === true): ?>
                        <div class="hidden menuImage rounded-lg grid grid-cols-5 gap-4" data-image="<?php echo $i; ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product/boxgal4.png"
                                class="rounded-2xl !h-full w-full object-cover col-span-2">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product/boxgal5.png"
                                class="rounded-2xl h-full w-full object-cover col-span-3">
                        </div>
                        <?php endif; ?>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endif; ?>
        </header>

        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const desktopNav = document.getElementById('desktopNav');
            const allNavItems = desktopNav.querySelectorAll('li');
            const allMegaMenus = document.querySelectorAll('.megaMenu');
            const allSubMenus = document.querySelectorAll('.subMenu');

            function closeAllMenus() {
                allMegaMenus.forEach(menu => menu.classList.add('hidden'));
                allSubMenus.forEach(menu => menu.classList.add('hidden'));
                allNavItems.forEach(nav => {
                    nav.querySelector('a')?.classList.remove('main_active');
                });
            }
            allNavItems.forEach(item => {

                const megaTarget = item.dataset.megaTarget;
                const subTarget = item.dataset.subTarget;

                const megaMenu = megaTarget ? document.getElementById(megaTarget) : null;
                const subMenu = subTarget ? document.getElementById(subTarget) : null;

                const link = item.querySelector('a');

                item.addEventListener('mouseenter', () => {

                    closeAllMenus();

                    if (megaMenu) megaMenu.classList.remove('hidden');
                    if (subMenu) subMenu.classList.remove('hidden');

                    link?.classList.add('main_active');
                });
            });
            allSubMenus.forEach(menu => {
                menu.addEventListener('mouseleave', () => {

                    menu.classList.add('hidden');

                    allNavItems.forEach(nav => {
                        nav.querySelector('a')?.classList.remove('main_active');
                    });
                });
            });
            allMegaMenus.forEach(menu => {
                menu.addEventListener('mouseleave', () => {

                    menu.classList.add('hidden');

                    allNavItems.forEach(nav => {
                        nav.querySelector('a')?.classList.remove('main_active');
                    });
                });
            });
            allMegaMenus.forEach(menu => {
                const parents = menu.querySelectorAll('.mainCat');
                const groups = menu.querySelectorAll('.childGroups');
                const images = menu.querySelectorAll('.menuImage');
                const arrow = document.createElement('i');
                arrow.className = 'fa-solid fa-arrow-up-right-from-square ml-2';

                // Default first active
                if (parents.length > 0) {

                    parents[0].classList.add('active');
                    parents[0].querySelector('a')?.appendChild(arrow);

                    groups[0]?.classList.remove('hidden');
                    images[0]?.classList.remove('hidden');
                }

                parents.forEach(p => {

                    p.addEventListener('mouseenter', () => {

                        const index = p.dataset.index;

                        // Hide all
                        groups.forEach(g => g.classList.add('hidden'));
                        images.forEach(img => img.classList.add('hidden'));
                        parents.forEach(pr => pr.classList.remove('active'));

                        // Show selected
                        menu.querySelector(`[data-group="${index}"]`)?.classList.remove(
                            'hidden');
                        menu.querySelector(`[data-image="${index}"]`)?.classList.remove(
                            'hidden');

                        p.classList.add('active');
                        p.querySelector('a')?.appendChild(arrow);
                    });

                });

            });

        });

        
        document.addEventListener('DOMContentLoaded', () => {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            const hamburgerIcon = document.getElementById('hamburgerIcon');
            const closeIcon = document.getElementById('closeIcon');
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                    hamburgerIcon.classList.toggle('hidden');
                    closeIcon.classList.toggle('hidden');
                });
            }
            // Mobile Mega Toggle
            const mobileMenuItems = document.querySelectorAll('#mobileMenu > ul > li');
            mobileMenuItems.forEach(li => {
                const toggleIcon = li.querySelector('i.fa-chevron-down');
                const content = li.querySelector('.mobileMegaContent');

                if (toggleIcon && content) {
                    toggleIcon.addEventListener('click', () => {

                        // Close others
                        mobileMenuItems.forEach(otherLi => {
                            const otherContent = otherLi.querySelector(
                                '.mobileMegaContent');
                            if (otherContent && otherContent !== content) {
                                otherContent.classList.add('hidden');
                            }
                        });

                        content.classList.toggle('hidden');
                    });
                }

            });

        });
        jQuery(document).ready(function($) {
            $('#live-search').on('keyup', function() {
                var keyword = $(this).val();
                if (keyword.length < 2) {
                    $('#live-search-results').addClass('hidden').html('');
                    return;
                }
                $.ajax({
                    url: '<?php echo admin_url("admin-ajax.php"); ?>',
                    type: 'POST',
                    data: {
                        action: 'live_search_products',
                        keyword: keyword
                    },
                    success: function(res) {
                        $('#live-search-results').removeClass('hidden').html(res);
                    }
                });
            });
        });
        </script>
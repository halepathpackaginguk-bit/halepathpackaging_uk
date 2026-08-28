<?php
/**
 * halepath_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package halepath_theme
 */


include_once get_template_directory() . '/inc/extra.php';
include_once get_template_directory() . '/inc/ajax.php';
include_once get_template_directory() . '/inc/woo-extra.php';
include_once get_template_directory() . '/inc/email.php';

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function halepath_theme_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on halepath_theme, use a find and replace
	 * to change 'halepath_theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('halepath_theme', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary_menu' => esc_html__('Primary', 'halepath_theme'),
			'company' => esc_html__('Company', 'halepath_theme'),
			'innovation' => esc_html__('Innovation', 'halepath_theme'),
			'packaging' => esc_html__('Packaging Product', 'halepath_theme'),
			'services' => esc_html__('Services', 'halepath_theme'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');


}
add_action('after_setup_theme', 'halepath_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function halepath_theme_content_width()
{
	$GLOBALS['content_width'] = apply_filters('halepath_theme_content_width', 640);
}
add_action('after_setup_theme', 'halepath_theme_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function halepath_theme_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'halepath_theme'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'halepath_theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'halepath_theme_widgets_init');

function theme_assets()
{
	// Tailwind
	wp_enqueue_style('tailwind', get_template_directory_uri() . '/assets/css/style.css', [], filemtime(get_template_directory() . '/assets/css/style.css'));


	wp_enqueue_style(
		'font-awesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'
	);
	// Slick CSS
	 wp_enqueue_style(
        'slick-css',
        get_template_directory_uri() . '/assets/css/slick.css',
        [],
        '1.8.1'
    );

    wp_enqueue_style(
        'slick-theme-css',
        get_template_directory_uri() . '/assets/css/slick-theme.css',
        ['slick-css'],
        '1.8.1'
    );
	// Swiper CSS
	wp_enqueue_style(
		'swiper-css',
		'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css',
		array(),
		'10.0.0'
	);

	// jQuery (WordPress includes it)
	wp_enqueue_script('jquery');

	// Slick JS
	wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], '1.8.1', true);

	 // Swiper JS
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js',
        array(), // dependencies
        '10.0.0',
        true // load in footer
    );

     wp_enqueue_script(
        'hale-sliders',
        get_template_directory_uri() . '/assets/js/sliders.js',
        ['jquery', 'slick-js'],
        wp_get_theme()->get('Version'),
        true
    );

	 wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js', array(), null, true);

    wp_localize_script('custom-js', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));

	// Slick Init JS
//    wp_enqueue_script('slick-init', get_template_directory_uri() . '/assets/js/slick-init.js', ['jquery', 'slick-js'], filemtime(get_template_directory() . '/assets/js/slick-init.js'), true);
}
add_action('wp_enqueue_scripts', 'theme_assets');



function mytheme_add_woocommerce_support()
{
	add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


// Add custom image sizes
add_action( 'after_setup_theme', 'custom_woocommerce_image_sizes', 20 );
function custom_woocommerce_image_sizes() {    
    add_image_size( 'hale_product', 1000, 1000, true );
    add_image_size( 'hale_product_thumbs', 150, 150, true );
}








/**
 * Add Organization & LocalBusiness JSON-LD Schema Markup
 */
add_action('wp_head', 'halepath_add_schema_markup', 1);
function halepath_add_schema_markup() {
    if (is_admin()) return;

    $site_url = home_url('/');
    $site_name = get_bloginfo('name');
    $site_desc = get_bloginfo('description');
    $logo_url = get_template_directory_uri() . '/assets/images/logo.png';
    $phone = '+44 01213186768';
    $email = 'sales@halepathpackaging.co.uk';
    $address = array(
        '@type' => 'PostalAddress',
        'streetAddress' => 'Unit 229, 32A Birmingham Road',
        'addressLocality' => 'Bromsgrove',
        'addressRegion' => 'West Midlands',
        'postalCode' => 'B61 0DD',
        'addressCountry' => 'GB'
    );
    $geo = array(
        '@type' => 'GeoCoordinates',
        'latitude' => '52.3182',
        'longitude' => '-2.0575'
    );
    $opening_hours = 'Mo-Fr 09:00-17:00';

    // Organization Schema
    $org_schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        '@id' => $site_url . '#organization',
        'name' => $site_name,
        'alternateName' => 'Hale Path Packaging',
        'url' => $site_url,
        'logo' => array(
            '@type' => 'ImageObject',
            'url' => $logo_url,
            'width' => 60,
            'height' => 60
        ),
        'description' => $site_desc,
        'foundingDate' => '2015',
        'address' => $address,
        'contactPoint' => array(
            '@type' => 'ContactPoint',
            'telephone' => $phone,
            'contactType' => 'sales',
            'email' => $email,
            'availableLanguage' => 'English'
        ),
        'sameAs' => array(
            'https://www.facebook.com/halepathpackaging',
            'https://www.linkedin.com/company/halepathpackaging',
            'https://www.instagram.com/halepathpackaging'
        )
    );

    // LocalBusiness Schema (extends Organization)
    $local_schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'Manufacturer',
        '@id' => $site_url . '#localbusiness',
        'name' => $site_name,
        'image' => $logo_url,
        'url' => $site_url,
        'telephone' => $phone,
        'email' => $email,
        'description' => $site_desc,
        'address' => $address,
        'geo' => $geo,
        'openingHoursSpecification' => array(
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'),
            'opens' => '09:00',
            'closes' => '17:00'
        ),
        'priceRange' => '££',
        'areaServed' => array(
            '@type' => 'Country',
            'name' => 'United Kingdom'
        ),
        'hasOfferCatalog' => array(
            '@type' => 'OfferCatalog',
            'name' => 'Custom Packaging Solutions',
            'itemListElement' => array(
                array(
                    '@type' => 'OfferCatalog',
                    'name' => 'Corrugated Packaging',
                    'itemListElement' => array(
                        array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Product', 'name' => 'Custom Corrugated Boxes')),
                        array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Product', 'name' => 'Mailer Boxes')),
                        array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Product', 'name' => 'Shipping Cartons'))
                    )
                ),
                array(
                    '@type' => 'OfferCatalog',
                    'name' => 'Rigid & Premium Boxes',
                    'itemListElement' => array(
                        array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Product', 'name' => 'Rigid Gift Boxes')),
                        array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Product', 'name' => 'Luxury Presentation Boxes'))
                    )
                ),
                array(
                    '@type' => 'OfferCatalog',
                    'name' => 'Flexible Packaging',
                    'itemListElement' => array(
                        array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Product', 'name' => 'Stand-Up Pouches')),
                        array('@type' => 'Offer', 'itemOffered' => array('@type' => 'Product', 'name' => 'Mylar Bags'))
                    )
                )
            )
        )
    );

    // WebSite Schema with SearchAction
    $website_schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        '@id' => $site_url . '#website',
        'name' => $site_name,
        'url' => $site_url,
        'potentialAction' => array(
            '@type' => 'SearchAction',
            'target' => array(
                '@type' => 'EntryPoint',
                'urlTemplate' => $site_url . '?s={search_term_string}'
            ),
            'query-input' => 'required name=search_term_string'
        )
    );

    // BreadcrumbList Schema (dynamic based on current page)
    $breadcrumb_items = array();
    $breadcrumb_items[] = array(
        '@type' => 'ListItem',
        'position' => 1,
        'name' => 'Home',
        'item' => $site_url
    );

    if (is_singular('post')) {
        $breadcrumb_items[] = array(
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Blog',
            'item' => get_permalink(get_option('page_for_posts'))
        );
        $breadcrumb_items[] = array(
            '@type' => 'ListItem',
            'position' => 3,
            'name' => get_the_title()
        );
    } elseif (is_singular('product')) {
        $breadcrumb_items[] = array(
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Products',
            'item' => wc_get_page_permalink('shop')
        );
        $breadcrumb_items[] = array(
            '@type' => 'ListItem',
            'position' => 3,
            'name' => get_the_title()
        );
    } elseif (is_page()) {
        $breadcrumb_items[] = array(
            '@type' => 'ListItem',
            'position' => 2,
            'name' => get_the_title()
        );
    } elseif (is_archive()) {
        $breadcrumb_items[] = array(
            '@type' => 'ListItem',
            'position' => 2,
            'name' => get_the_archive_title()
        );
    }

    if (count($breadcrumb_items) > 1) {
        $breadcrumb_schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $breadcrumb_items
        );
        echo '<script type="application/ld+json">' . wp_json_encode($breadcrumb_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    }

    echo '<script type="application/ld+json">' . wp_json_encode($org_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    echo '<script type="application/ld+json">' . wp_json_encode($local_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
    echo '<script type="application/ld+json">' . wp_json_encode($website_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}

/**
 * Add FAQ Schema to pages with FAQ content
 */
add_action('wp_head', 'halepath_add_faq_schema', 2);
function halepath_add_faq_schema() {
    if (is_admin() || !is_singular()) return;

    global $post;
    $content = $post->post_content;

    if (preg_match_all('/<h[2-6][^>]*>(.*?)<\/h[2-6]>/is', $content, $headings)) {
        $faq_items = array();
        foreach ($headings[1] as $index => $heading) {
            $question = wp_strip_all_tags($heading);
            if (strpos(strtolower($question), '?') !== false || strpos(strtolower($question), 'how') === 0 || strpos(strtolower($question), 'what') === 0 || strpos(strtolower($question), 'why') === 0) {
                // Find the next paragraph after this heading
                $pattern = '/<h[2-6][^>]*>' . preg_quote($heading, '/') . '<\/h[2-6]>\s*(?:<[^>]*>)*\s*<p>(.*?)<\/p>/is';
                if (preg_match($pattern, $content, $match)) {
                    $faq_items[] = array(
                        '@type' => 'Question',
                        'name' => $question,
                        'acceptedAnswer' => array(
                            '@type' => 'Answer',
                            'text' => wp_strip_all_tags($match[1])
                        )
                    );
                }
            }
        }

        if (!empty($faq_items)) {
            $faq_schema = array(
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => array_slice($faq_items, 0, 10)
            );
            echo '<script type="application/ld+json">' . wp_json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
        }
    }
}

/**
 * Add custom meta descriptions for all pages
 */
add_action('wp_head', 'halepath_add_meta_descriptions', 5);
function halepath_add_meta_descriptions() {
    if (is_admin()) return;

    $meta_description = '';
    $current_url = home_url(add_query_arg(array(), $_SERVER['REQUEST_URI']));

    if (is_front_page()) {
        $meta_description = 'Hale Path Packaging - UK\'s leading custom packaging manufacturer. Corrugated boxes, rigid boxes, mailer boxes, and flexible packaging. FSC certified, eco-friendly. 11-14 day production. Free quotes.';
    } elseif (is_home()) {
        $meta_description = 'Packaging industry insights, tips, and news from Hale Path Packaging. Learn about custom packaging solutions, sustainable materials, and branding strategies.';
    } elseif (is_single()) {
        $meta_description = wp_strip_all_tags(get_the_excerpt());
        $meta_description = substr($meta_description, 0, 160);
        if (strlen($meta_description) >= 157) {
            $meta_description = substr($meta_description, 0, 157) . '...';
        }
    } elseif (is_page()) {
        $meta_description = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);
        if (empty($meta_description)) {
            $meta_description = get_post_meta(get_the_ID(), 'rank_math_description', true);
        }
        if (empty($meta_description)) {
            $meta_description = wp_strip_all_tags(get_the_excerpt());
        }
        if (empty($meta_description)) {
            $meta_description = wp_strip_all_tags(get_the_content());
        }
        $meta_description = substr($meta_description, 0, 160);
        if (strlen($meta_description) >= 157) {
            $meta_description = substr($meta_description, 0, 157) . '...';
        }
    } elseif (is_archive()) {
        $meta_description = 'Browse our collection of ' . get_the_archive_title() . ' at Hale Path Packaging. Custom packaging solutions for every industry.';
    } elseif (is_search()) {
        $meta_description = 'Search results for "' . get_search_query() . '" on Hale Path Packaging. Find custom packaging solutions.';
    } elseif (is_404()) {
        $meta_description = 'Page not found. Browse Hale Path Packaging for custom corrugated boxes, rigid boxes, mailer boxes, and flexible packaging solutions.';
    }

    if (!empty($meta_description)) {
        echo '<meta name="description" content="' . esc_attr($meta_description) . '" />' . "\n";
    }

    // Open Graph tags
    echo '<meta property="og:title" content="' . esc_attr(get_the_title()) . '" />' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($meta_description) . '" />' . "\n";
    echo '<meta property="og:url" content="' . esc_url($current_url) . '" />' . "\n";
    echo '<meta property="og:type" content="' . (is_singular('post') ? 'article' : 'website') . '" />' . "\n";
    echo '<meta property="og:site_name" content="Hale Path Packaging" />' . "\n";
    echo '<meta property="og:locale" content="en_GB" />' . "\n";

    if (has_post_thumbnail()) {
        $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
        if ($thumb_url) {
            echo '<meta property="og:image" content="' . esc_url($thumb_url) . '" />' . "\n";
        }
    }

    // Twitter Card
    echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr(get_the_title()) . '" />' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($meta_description) . '" />' . "\n";

    if (has_post_thumbnail()) {
        $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
        if ($thumb_url) {
            echo '<meta name="twitter:image" content="' . esc_url($thumb_url) . '" />' . "\n";
        }
    }
}

/**
 * Add Product schema for WooCommerce products
 */
add_action('wp_head', 'halepath_add_product_schema', 3);
function halepath_add_product_schema() {
    if (is_admin() || !is_singular('product')) return;

    global $post;
    $product = wc_get_product($post->ID);
    if (!$product) return;

    $image_url = '';
    if (has_post_thumbnail($post->ID)) {
        $image_url = get_the_post_thumbnail_url($post->ID, 'full');
    }

    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        'name' => $product->get_name(),
        'description' => wp_strip_all_tags($post->post_content),
        'image' => $image_url,
        'sku' => $product->get_sku(),
        'brand' => array(
            '@type' => 'Brand',
            'name' => 'Hale Path Packaging'
        ),
        'manufacturer' => array(
            '@type' => 'Organization',
            'name' => 'Hale Path Packaging'
        ),
        'url' => get_permalink($post->ID),
        'offers' => array(
            '@type' => 'Offer',
            'url' => get_permalink($post->ID),
            'priceCurrency' => 'GBP',
            'price' => $product->get_price() ? $product->get_price() : '0.69',
            'priceValidUntil' => gmdate('Y-12-31', strtotime('+1 year')),
            'availability' => $product->is_in_stock() ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
            'itemCondition' => 'https://schema.org/NewCondition',
            'seller' => array(
                '@type' => 'Organization',
                'name' => 'Hale Path Packaging'
            )
        )
    );

    $aggregate_rating = $product->get_average_rating();
    if ($aggregate_rating > 0) {
        $schema['aggregateRating'] = array(
            '@type' => 'AggregateRating',
            'ratingValue' => $aggregate_rating,
            'reviewCount' => $product->get_review_count()
        );
    }

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>' . "\n";
}

add_action('admin_footer', function () {
    ?>
    <script>
    jQuery(function($) {

        function addCategorySearch(context) {
            const $panel = $(context).find('#product_cat-all');
            const $list  = $(context).find('#product_catchecklist');

            if (!$panel.length || !$list.length || $panel.find('.wc-cat-search').length) {
                return;
            }

            const $search = $(
                '<input type="text" class="widefat wc-cat-search" placeholder="Search product categories..." style="margin:0 0 8px;">'
            );

            $panel.prepend($search);

            $search.on('input', function () {
                const keyword = $.trim($(this).val()).toLowerCase();

                if (!keyword) {
                    $list.find('li').show();
                    return;
                }

                $list.find('li').each(function () {
                    const $li = $(this);
                    const labelText = $li.children('label').text().toLowerCase();
                    $li.toggle(labelText.indexOf(keyword) !== -1);
                });
            });
        }

        // ✅ Single product edit
        const screen = typeof wp !== 'undefined' && wp.data ? wp.data.select('core/editor') : null;
        addCategorySearch(document);

        // ✅ Bulk edit (AJAX loaded)
        $(document).on('click', '#bulk_edit', function () {
            setTimeout(function () {
                $('#bulk-edit').each(function () {
                    addCategorySearch(this);
                });
            }, 300);
        });

    });
    </script>
    <?php
});




//


add_filter('preprocess_comment', function($commentdata) {

    if (is_admin() && isset($_POST['comment_post_ID'])) {
        $post_type = get_post_type($_POST['comment_post_ID']);

        if ($post_type === 'product') {
            $commentdata['comment_type'] = 'review';
        }
    }

    return $commentdata;
});

add_action('admin_footer', function () {
    global $pagenow;

    if ($pagenow !== 'post.php') return;

    $screen = get_current_screen();
    if ($screen->post_type !== 'product') return;
    ?>

    <script>
    jQuery(document).ready(function($){

        function addFields() {
            let container = $('#post').find('.commentsdiv');

            if (!container.length) return;

            if ($('#custom-rating-field').length) return;

            let field = `
                <div id="custom-rating-field" style="margin:10px 0;">
                    <label><strong>Rating:</strong></label>
                    <select name="rating">
                        <option value="">Select Rating</option>
                        <option value="5">5 ⭐</option>
                        <option value="4">4 ⭐</option>
                        <option value="3">3 ⭐</option>
                        <option value="2">2 ⭐</option>
                        <option value="1">1 ⭐</option>
                    </select>
                </div>
            `;

            container.append(field);
        }

        // Run on load
        addFields();

        // Run again after clicking "Add Comment"
        $(document).on('click', '#add-new-comment', function(){
            setTimeout(addFields, 300);
        });

    });
    </script>

    <?php
});

add_action('comment_post', function($comment_id) {

    if (isset($_POST['rating']) && $_POST['rating'] != '') {
        add_comment_meta($comment_id, 'rating', intval($_POST['rating']));
    }

});

add_filter('get_comment_author', function($author, $comment_id) {
    $comment = get_comment($comment_id);

    if ($comment->comment_type === 'review') {
        return $comment->comment_author;
    }

    return $author;
}, 10, 2);



// Add admin menu page for manual reviews
add_action('admin_menu', 'add_manual_review_page');
function add_manual_review_page() {
    add_submenu_page(
        'edit.php?post_type=product',
        'Add Manual Review',
        'Add Review',
        'manage_options',
        'manual-product-review',
        'manual_review_page_callback'
    );
}

// Display the manual review form
function manual_review_page_callback() {
    ?>
    <div class="wrap">
        <h1>Add Product Review Manually</h1>
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th><label for="product_id">Select Product</label></th>
                    <td>
                        <select name="product_id" id="product_id" required>
                            <option value="">Select a product...</option>
                            <?php
                            $products = wc_get_products(array('limit' => -1));
                            foreach ($products as $product) {
                                echo '<option value="' . $product->get_id() . '">' . $product->get_name() . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="reviewer_name">Reviewer Name</label></th>
                    <td><input type="text" name="reviewer_name" id="reviewer_name" required class="regular-text"></td>
                </tr>
                <tr>
                    <th><label for="reviewer_email">Reviewer Email</label></th>
                    <td><input type="email" name="reviewer_email" id="reviewer_email" required class="regular-text"></td>
                </tr>
                <tr>
                    <th><label for="rating">Rating</label></th>
                    <td>
                        <select name="rating" id="rating" required>
                            <option value="5">★★★★★ (5)</option>
                            <option value="4">★★★★☆ (4)</option>
                            <option value="3">★★★☆☆ (3)</option>
                            <option value="2">★★☆☆☆ (2)</option>
                            <option value="1">★☆☆☆☆ (1)</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="review_content">Review Content</label></th>
                    <td>
                        <textarea name="review_content" id="review_content" rows="5" class="large-text" required></textarea>
                    </td>
                </tr>
            </table>
            <?php wp_nonce_field('manual_review_action', 'manual_review_nonce'); ?>
            <p class="submit">
                <input type="submit" name="submit_manual_review" class="button-primary" value="Add Review">
            </p>
        </form>
    </div>
    <?php

    // Handle form submission
    if (isset($_POST['submit_manual_review']) && wp_verify_nonce($_POST['manual_review_nonce'], 'manual_review_action')) {
        $product_id = intval($_POST['product_id']);
        $reviewer_name = sanitize_text_field($_POST['reviewer_name']);
        $reviewer_email = sanitize_email($_POST['reviewer_email']);
        $rating = intval($_POST['rating']);
        $review_content = sanitize_textarea_field($_POST['review_content']);

        $review_data = array(
            'comment_post_ID' => $product_id,
            'comment_author' => $reviewer_name,
            'comment_author_email' => $reviewer_email,
            'comment_content' => $review_content,
            'comment_type' => 'review',
            'comment_approved' => 1,
        );

        $review_id = wp_insert_comment($review_data);

        if ($review_id) {
            update_comment_meta($review_id, 'rating', $rating);
            echo '<div class="notice notice-success"><p>Review added successfully!</p></div>';
        } else {
            echo '<div class="notice notice-error"><p>Error adding review. Please try again.</p></div>';
        }
    }
}
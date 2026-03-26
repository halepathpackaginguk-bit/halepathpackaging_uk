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
	wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', [], '1.8.1');
	wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', ['slick-css'], '1.8.1');
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
 * WooCommerce: remove /product-category/ from category URLs
 * while keeping pages/posts/products working first.
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * 1) Output clean product category links
 */
add_filter('term_link', function ($url, $term, $taxonomy) {
	if ($taxonomy !== 'product_cat' || empty($url)) {
		return $url;
	}

	$home_path = trim((string) wp_parse_url(home_url('/'), PHP_URL_PATH), '/');
	$path      = trim((string) wp_parse_url($url, PHP_URL_PATH), '/');

	if ($home_path && strpos($path, $home_path . '/') === 0) {
		$path = substr($path, strlen($home_path) + 1);
	}

	$path = preg_replace('#^product-category/#', '', $path);

	return home_url(user_trailingslashit($path));
}, 10, 3);

/**
 * 2) If WP thinks the request is a page/post/etc, convert it to product_cat
 * ONLY when there is no real page/post/product using that path.
 */
add_filter('request', function ($vars) {
	if (is_admin()) {
		return $vars;
	}

	$candidate = '';

	if (!empty($vars['pagename'])) {
		$candidate = $vars['pagename'];
	} elseif (!empty($vars['category_name'])) {
		$candidate = $vars['category_name'];
	} elseif (!empty($vars['attachment'])) {
		$candidate = $vars['attachment'];
	} elseif (!empty($vars['name'])) {
		$candidate = $vars['name'];
	}

	if ($candidate === '') {
		return $vars;
	}

	$candidate = trim($candidate, '/');

	// Respect real hierarchical pages first.
	$page_path = get_page_by_path($candidate, OBJECT, 'page');
	if ($page_path) {
		return $vars;
	}

	// Respect real posts/products/attachments by last slug segment.
	$parts     = explode('/', $candidate);
	$last_slug = end($parts);

	$post_types_to_protect = ['post', 'product', 'attachment'];
	foreach ($post_types_to_protect as $pt) {
		$existing = get_page_by_path($last_slug, OBJECT, $pt);
		if ($existing) {
			return $vars;
		}
	}

	// Match full hierarchical product_cat path.
	$term = get_term_by('slug', $last_slug, 'product_cat');
	if (!$term || is_wp_error($term)) {
		return $vars;
	}

	$term_link = get_term_link($term, 'product_cat');
	if (is_wp_error($term_link)) {
		return $vars;
	}

	$term_path = trim((string) wp_parse_url($term_link, PHP_URL_PATH), '/');
	$home_path = trim((string) wp_parse_url(home_url('/'), PHP_URL_PATH), '/');

	if ($home_path && strpos($term_path, $home_path . '/') === 0) {
		$term_path = substr($term_path, strlen($home_path) + 1);
	}

	$term_path = preg_replace('#^product-category/#', '', $term_path);
	$term_path = trim($term_path, '/');

	if ($term_path !== $candidate) {
		return $vars;
	}

	$new_vars = ['product_cat' => $last_slug];

	// Preserve paging/sorting.
	foreach (['paged', 'page', 'orderby', 'order'] as $key) {
		if (!empty($vars[$key])) {
			$new_vars[$key] = $vars[$key];
		}
	}

	return $new_vars;
}, 99);

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
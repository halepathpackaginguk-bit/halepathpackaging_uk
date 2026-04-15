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
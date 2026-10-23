<?php
class Tailwind_Nav_Walker extends Walker_Nav_Menu
{

	// Submenu wrapper
	public function start_lvl(&$output, $depth = 0, $args = null)
	{
		$indent = str_repeat("\t", $depth);

		$submenu_classes = $depth === 0
			? 'sub-menu absolute lg:absolute left-0 top-full hidden bg-white md:shadow-lg md:py-5 pl-4 min-w-[220px] w-full z-50'
			: 'sub-menu hidden  lg:absolute left-full top-0 bg-white md:shadow-lg md:py-5 pl-4 min-w-[220px] w-full z-50';

		$output .= "\n$indent<ul class=\"$submenu_classes\">\n";
	}

	// Menu item
	public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{

		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$has_children = in_array('menu-item-has-children', $item->classes);

		$output .= $indent . '<li class="relative group">';

		// Link
		$output .= '<div class="flex items-center justify-between">';

		$output .= '<a href="' . esc_url($item->url) . '"
            class="header_link">
            ' . esc_html($item->title) . '
        </a>';

		// Mobile toggle button (ONLY arrow)  
		if ($has_children) {
			$output .= '
            <button type="button"
                class="submenu-toggle ml-2 mr-2  text-xs"
                aria-expanded="false">
                <i class="fa fa-chevron-down"></i>
            </button>';
		}

		$output .= '</div>';
	}

	// Close item
	public function end_el(&$output, $item, $depth = 0, $args = null)
	{
		$output .= "</li>\n";
	}
}



/* Filters and Hooks  */

// Remove breadcrumb only
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
// Remove page title
add_filter('woocommerce_show_page_title', '__return_false');

function mytheme_remove_add_to_cart_buttons()
{
	if (is_shop() || is_product_category() || is_product_tag()) {
		remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
	}
}
add_action('wp', 'mytheme_remove_add_to_cart_buttons');


function cptui_register_my_cpts()
{

	/**
	 * Post Type: Options.
	 */

	$labels = [
		"name" => esc_html__("Options", "halepathic"),
		"singular_name" => esc_html__("Options", "halepathic"),
	];

	$args = [
		"label" => esc_html__("Options", "halepathic"),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => ["slug" => "product_options", "with_front" => true],
		"query_var" => true,
		"supports" => ["title", "editor", "thumbnail"],
		"show_in_graphql" => false,
	];

	register_post_type("product_options", $args);
}

add_action('init', 'cptui_register_my_cpts');


function cptui_register_my_taxes()
{

	/**
	 * Taxonomy: Types.
	 */

	$labels = [
		"name" => esc_html__("Types", "halepathic"),
		"singular_name" => esc_html__("Types", "halepathic"),
	];


	$args = [
		"label" => esc_html__("Types", "halepathic"),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => ['slug' => 'options_types', 'with_front' => true, 'hierarchical' => true,],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "options_types",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => true,
		"show_in_graphql" => false,
	];
	register_taxonomy("options_types", ["product_options"], $args);
}
add_action('init', 'cptui_register_my_taxes');


function theme_finishing_options_script()
{
	wp_register_script(
		'finishing-options-tabs',
		'',
		[],
		'1.0.0',
		true
	);

	wp_enqueue_script('finishing-options-tabs');

	$script = <<<'JS'
		document.addEventListener('DOMContentLoaded', function () {
			document.querySelectorAll('.finishing-tabs').forEach(function (tabGroup) {
				const section = tabGroup.closest('section');

				if (!section) return;

				const tabs = tabGroup.querySelectorAll('.finishing-tab');
				const cards = section.querySelectorAll('.finishing-card');

				tabs.forEach(function (tab) {
					tab.addEventListener('click', function () {
						const category = tab.dataset.category;

						tabs.forEach(function (item) {
							const active = item === tab;

							item.classList.toggle('is-active', active);
							item.classList.toggle('bg-secondary', active);
							item.classList.toggle('text-white', active);
							item.classList.toggle('bg-white', !active);
							item.classList.toggle('text-secondary', !active);

							item.setAttribute('aria-selected', active ? 'true' : 'false');
						});

						cards.forEach(function (card) {
							card.hidden = card.dataset.category !== category;
						});
					});
				});
			});
		});
		JS;

	wp_add_inline_script('finishing-options-tabs', $script);
}
add_action('wp_enqueue_scripts', 'theme_finishing_options_script');


<?php
/**
 * Breadcrumbs (shown on every page except the home page).
 *
 * @package halepath_theme
 */

$crumbs = array(
	array(
		'label' => 'Home',
		'url'   => home_url('/'),
	),
);

$add_crumb = function ($label, $url = '') use (&$crumbs) {
	$crumbs[] = array(
		'label' => $label,
		'url'   => $url,
	);
};

/**
 * Add a term plus its parent terms, in root-to-current order.
 */
$add_term_chain = function ($term) use ($add_crumb) {
	if (!$term || is_wp_error($term)) {
		return;
	}

	$taxonomy  = $term->taxonomy;
	$ancestors = array_reverse(get_ancestors($term->term_id, $taxonomy, 'taxonomy'));

	foreach ($ancestors as $ancestor_id) {
		$ancestor = get_term($ancestor_id, $taxonomy);

		if ($ancestor && !is_wp_error($ancestor)) {
			$link = get_term_link($ancestor);
			$add_crumb($ancestor->name, is_wp_error($link) ? '' : $link);
		}
	}

	$link = get_term_link($term);
	$add_crumb($term->name, is_wp_error($link) ? '' : $link);
};

if (is_singular('product')) {

	$add_crumb('Products', home_url('/products/'));

	$terms = get_the_terms(get_the_ID(), 'product_cat');

	if ($terms && !is_wp_error($terms)) {
		// Use the most specific category when a product has several.
		$chosen = $terms[0];

		foreach ($terms as $term) {
			if (count(get_ancestors($term->term_id, 'product_cat', 'taxonomy')) > count(get_ancestors($chosen->term_id, 'product_cat', 'taxonomy'))) {
				$chosen = $term;
			}
		}

		$add_term_chain($chosen);
	}

	$add_crumb(get_the_title());

} elseif (is_tax('product_cat')) {

	$add_crumb('Products', home_url('/products/'));
	$add_term_chain(get_queried_object());

} elseif (is_singular('post')) {

	$add_crumb('Blog', home_url('/blog/'));
	$add_crumb(get_the_title());

} elseif (is_singular()) {

	$post = get_queried_object();

	if ($post) {
		$ancestors = array_reverse(get_post_ancestors($post));

		foreach ($ancestors as $ancestor_id) {
			$add_crumb(get_the_title($ancestor_id), get_permalink($ancestor_id));
		}

		$add_crumb(get_the_title($post));
	}

} elseif (is_search()) {

	$add_crumb('Search results for: ' . get_search_query());

} elseif (is_404()) {

	$add_crumb('Page not found');

} elseif (is_category() || is_tag() || is_tax()) {

	$add_term_chain(get_queried_object());

} elseif (is_post_type_archive()) {

	$add_crumb(post_type_archive_title('', false));

} elseif (is_archive()) {

	$add_crumb(get_the_archive_title());

} elseif (is_home()) {

	$add_crumb('Blog');

} else {

	$add_crumb(get_the_title());
}

$crumb_count = count($crumbs);
?>
<nav class="border-b border-gray-200 bg-white" aria-label="Breadcrumb">
    <div class="hale_container py-3">
        <ol class="flex flex-wrap items-center gap-1.5 text-xs text-[#7C7C7C] sm:text-sm">
            <?php foreach ($crumbs as $index => $crumb): ?>
                <?php $is_last = ($index === $crumb_count - 1); ?>
                <li class="flex items-center gap-1.5">

                    <?php if ($index > 0): ?>
                        <span aria-hidden="true" class="text-secondary/40">/</span>
                    <?php endif; ?>

                    <?php if ($is_last || empty($crumb['url'])): ?>
                        <span <?php echo $is_last ? 'aria-current="page"' : ''; ?>><?php echo esc_html($crumb['label']); ?></span>
                    <?php else: ?>
                        <a href="<?php echo esc_url($crumb['url']); ?>" class="hover:text-secondary">
                            <?php echo esc_html($crumb['label']); ?>
                        </a>
                    <?php endif; ?>

                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</nav>

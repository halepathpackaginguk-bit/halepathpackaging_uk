<?php
/**
 * Rank Math SEO customizations.
 *
 * @package halepath_theme
 */

/**
 * Add a minimal offers property to product schema when price is not set.
 * Google requires 'offers', 'review', or 'aggregateRating' on Product schema.
 *
 * @param array $entity The product schema entity.
 * @return array
 */
add_filter( 'rank_math/snippet/rich_snippet_product_entity', function ( $entity ) {
	if ( isset( $entity['offers'] ) || isset( $entity['review'] ) || isset( $entity['aggregateRating'] ) ) {
		return $entity;
	}

	$product = wc_get_product( get_the_ID() );
	if ( ! $product ) {
		return $entity;
	}

	$entity['offers'] = array(
		array(
			'@type'         => 'Offer',
			'price'         => '0',
			'priceCurrency' => 'GBP',
			'availability'  => $product->is_in_stock() ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
			'url'           => get_permalink(),
			'seller'        => array(
				'@type' => 'Organization',
				'name'  => get_bloginfo( 'name' ),
			),
			'priceValidUntil' => gmdate( 'Y-12-31', strtotime( '+1 year' ) ),
		),
	);

	return $entity;
}, 999 );

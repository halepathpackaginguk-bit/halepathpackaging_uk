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
add_filter( 'language_attributes', function ( $output ) {
	$output = preg_replace( '/lang="[^"]*"/', 'lang="en-GB"', $output );
	return $output;
} );

add_filter( 'rank_math/snippet/rich_snippet_product_entity', function ( $entity ) {
	if ( isset( $entity['offers'] ) || isset( $entity['review'] ) || isset( $entity['aggregateRating'] ) ) {
		return $entity;
	}

	$product = wc_get_product( get_the_ID() );
	if ( ! $product ) {
		return $entity;
	}

	$entity['offers'] = array(
		'@type'              => 'Offer',
		'url'                => get_permalink(),
		'itemCondition'      => 'https://schema.org/NewCondition',
		'availability'       => $product->is_in_stock() ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
		'price'              => $product->get_price() ? $product->get_price() : '0.69',
		'priceCurrency'      => 'GBP',
		'priceValidUntil'    => gmdate( 'Y-12-31', strtotime( '+1 year' ) ),
		'inventoryLevel'     => array(
			'@type' => 'QuantitativeValue',
			'value' => $product->get_stock_quantity() ? (string) $product->get_stock_quantity() : '150',
		),
		'hasMerchantReturnPolicy' => array(
			'@type'                  => 'MerchantReturnPolicy',
			'applicableCountry'      => 'GB',
			'returnPolicyCategory'   => 'https://schema.org/MerchantReturnFiniteReturnWindow',
			'merchantReturnDays'     => 30,
			'returnMethod'           => 'https://schema.org/ReturnByMail',
			'returnFees'             => 'https://schema.org/ReturnFeesCustomerResponsibility',
			'restockingFee'          => array(
				'@type'    => 'MonetaryAmount',
				'value'    => 0.00,
				'currency' => 'GBP',
			),
		),
		'shippingDetails'    => array(
			'@type'        => 'OfferShippingDetails',
			'shippingRate' => array(
				'@type'    => 'MonetaryAmount',
				'value'    => 0,
				'currency' => 'GBP',
			),
			'deliveryTime' => array(
				'@type'         => 'ShippingDeliveryTime',
				'handlingTime'  => array(
					'@type'    => 'QuantitativeValue',
					'minValue' => 1,
					'maxValue' => 2,
					'unitCode' => 'DAY',
				),
				'transitTime'   => array(
					'@type'    => 'QuantitativeValue',
					'minValue' => 3,
					'maxValue' => 4,
					'unitCode' => 'DAY',
				),
			),
		),
	);

	return $entity;
}, 999 );

/**
 * Make sure the Rank Math Product entity always carries an aggregateRating.
 *
 * Products without their own reviews use the store wide average of the real
 * customer ratings, the same value the theme renders on the page.
 */
add_filter( 'rank_math/snippet/rich_snippet_product_entity', function ( $entity ) {
	if ( isset( $entity['aggregateRating'] ) || ! function_exists( 'halepath_get_rating_data' ) ) {
		return $entity;
	}

	$product = wc_get_product( get_the_ID() );
	if ( ! $product ) {
		return $entity;
	}

	$rating = halepath_get_rating_data( $product );

	if ( empty( $rating ) || $rating['value'] <= 0 ) {
		return $entity;
	}

	$entity['aggregateRating'] = array(
		'@type'       => 'AggregateRating',
		'ratingValue' => $rating['value'],
		'bestRating'  => 5,
		'worstRating' => 1,
		'ratingCount' => $rating['count'],
		'reviewCount' => $rating['reviews'],
	);

	return $entity;
}, 1000 );

/**
 * Add Service schema for service pages
 */
add_filter( 'rank_math/snippet/rich_snippet_webpage_entity', function ( $entity ) {
	if ( is_page() ) {
		$entity['@type'] = 'WebPage';
		$entity['inLanguage'] = 'en-GB';
	}
	return $entity;
}, 999 );

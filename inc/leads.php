<?php
/**
 * Lead capture.
 *
 * Every form on the site (get quote, contact us, checkout) is stored as a post
 * of the "leads" post type. The kind of lead is kept in the category column
 * ("Get quote", "Contact us", "Checkout") and every submitted field is kept as
 * post meta so the leads can be filtered, searched and exported later.
 *
 * @package halepath_theme
 */

/**
 * Register the post type used to store the leads.
 */
function halepath_register_lead_post_type() {
	$labels = array(
		'name'               => __( 'Leads', 'halepath' ),
		'singular_name'      => __( 'Lead', 'halepath' ),
		'menu_name'          => __( 'Leads', 'halepath' ),
		'add_new'            => __( 'Add Lead', 'halepath' ),
		'add_new_item'       => __( 'Add New Lead', 'halepath' ),
		'edit_item'          => __( 'Edit Lead', 'halepath' ),
		'new_item'           => __( 'New Lead', 'halepath' ),
		'view_item'          => __( 'View Lead', 'halepath' ),
		'search_items'       => __( 'Search Leads', 'halepath' ),
		'not_found'          => __( 'No leads found.', 'halepath' ),
		'not_found_in_trash' => __( 'No leads found in Trash.', 'halepath' ),
		'all_items'          => __( 'All Leads', 'halepath' ),
	);

	register_post_type(
		'leads',
		array(
			'labels'              => $labels,
			'public'              => false,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => false,
			'show_in_rest'        => false,
			'menu_icon'           => 'dashicons-email-alt',
			'menu_position'       => 26,
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
			'has_archive'         => false,
			'rewrite'             => false,
			'query_var'           => false,
			'taxonomies'          => array( 'category' ),
			'supports'            => array( 'title', 'editor', 'author' ),
		)
	);
}
add_action( 'init', 'halepath_register_lead_post_type' );

/**
 * The kind of leads the site collects.
 *
 * The label is used as the category name of the lead.
 *
 * @return array
 */
function halepath_lead_types() {
	return array(
		'get-quote'  => __( 'Get quote', 'halepath' ),
		'contact-us' => __( 'Contact us', 'halepath' ),
		'checkout'   => __( 'Checkout', 'halepath' ),
	);
}

/**
 * Human label of a lead type.
 *
 * @param string $type Lead type slug.
 * @return string
 */
function halepath_lead_type_label( $type ) {
	$types = halepath_lead_types();

	return isset( $types[ $type ] ) ? $types[ $type ] : ucwords( str_replace( '-', ' ', $type ) );
}

/**
 * Clean a set of submitted fields.
 *
 * Every value is unslashed, flattened and sanitized so it is safe to store
 * and to print in the admin.
 *
 * @param array $data Raw fields.
 * @return array
 */
function halepath_normalize_lead_fields( $data ) {
	$clean = array();

	foreach ( (array) $data as $key => $value ) {
		$key = sanitize_key( str_replace( array( '[', ']' ), '_', (string) $key ) );

		if ( '' === $key || 'action' === $key ) {
			continue;
		}

		if ( is_array( $value ) ) {
			$value = implode( ', ', array_map( 'strval', $value ) );
		}

		if ( is_bool( $value ) ) {
			$value = $value ? __( 'Yes', 'halepath' ) : __( 'No', 'halepath' );
		}

		if ( ! is_scalar( $value ) ) {
			continue;
		}

		$clean[ $key ] = sanitize_textarea_field( wp_unslash( (string) $value ) );
	}

	return $clean;
}

/**
 * Label of a field for the readable body of the lead.
 *
 * @param string $key Field key.
 * @return string
 */
function halepath_lead_field_label( $key ) {
	return ucwords( str_replace( array( '_', '-' ), ' ', $key ) );
}

/**
 * Build the readable body of a lead.
 *
 * @param array $fields Cleaned fields.
 * @return string
 */
function halepath_lead_fields_to_text( $fields ) {
	$lines = array();

	foreach ( $fields as $key => $value ) {
		if ( '' === $value ) {
			continue;
		}

		$lines[] = halepath_lead_field_label( $key ) . ': ' . $value;
	}

	return implode( "\n", $lines );
}

/**
 * Request details of the current submission.
 *
 * @return array
 */
function halepath_lead_request_context() {
	$referer = wp_get_referer();

	if ( ! $referer && ! empty( $_SERVER['HTTP_REFERER'] ) ) {
		$referer = esc_url_raw( wp_unslash( $_SERVER['HTTP_REFERER'] ) );
	}

	return array(
		'source_url' => $referer ? $referer : '',
		'ip'         => isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '',
		'user_agent' => isset( $_SERVER['HTTP_USER_AGENT'] ) ? sanitize_text_field( wp_unslash( $_SERVER['HTTP_USER_AGENT'] ) ) : '',
		'status'     => 'new',
	);
}

/**
 * Store a lead.
 *
 * @param string $type  Lead type (get-quote, contact-us, checkout).
 * @param array  $data  Submitted fields.
 * @param array  $args  Optional. Extra fields such as the request context.
 * @return int The lead id, 0 on failure.
 */
function halepath_save_lead( $type, $data = array(), $args = array() ) {
	$type = sanitize_key( $type );

	if ( '' === $type ) {
		return 0;
	}

	$fields = halepath_normalize_lead_fields( $data );
	$label  = halepath_lead_type_label( $type );

	$name = '';

	foreach ( array( 'name', 'fullname', 'customer_name', 'first_name' ) as $key ) {
		if ( ! empty( $fields[ $key ] ) ) {
			$name = $fields[ $key ];
			break;
		}
	}

	$email = '';

	foreach ( array( 'email', 'billing_email' ) as $key ) {
		if ( ! empty( $fields[ $key ] ) ) {
			$email = $fields[ $key ];
			break;
		}
	}

	$phone = '';

	foreach ( array( 'phone', 'telephone', 'billing_phone' ) as $key ) {
		if ( ! empty( $fields[ $key ] ) ) {
			$phone = $fields[ $key ];
			break;
		}
	}

	$product = '';

	foreach ( array( 'product', 'product_name' ) as $key ) {
		if ( ! empty( $fields[ $key ] ) ) {
			$product = $fields[ $key ];
			break;
		}
	}

	$title = $label;

	if ( $name ) {
		$title .= ' - ' . $name;
	} elseif ( $email ) {
		$title .= ' - ' . $email;
	}

	$post_id = wp_insert_post(
		array(
			'post_type'    => 'leads',
			'post_status'  => 'publish',
			'post_title'   => wp_strip_all_tags( $title ),
			'post_content' => halepath_lead_fields_to_text( $fields ),
		),
		true
	);

	if ( is_wp_error( $post_id ) || ! $post_id ) {
		return 0;
	}

	$context = wp_parse_args( $args, halepath_lead_request_context() );

	update_post_meta( $post_id, '_lead_type', $type );
	update_post_meta( $post_id, '_lead_fields', $fields );
	update_post_meta( $post_id, '_lead_name', $name );
	update_post_meta( $post_id, '_lead_email', $email );
	update_post_meta( $post_id, '_lead_phone', $phone );
	update_post_meta( $post_id, '_lead_product', $product );

	foreach ( $fields as $key => $value ) {
		update_post_meta( $post_id, '_lead_' . $key, $value );
	}

	foreach ( $context as $key => $value ) {
		update_post_meta( $post_id, '_lead_' . sanitize_key( $key ), $value );
	}

	$term = term_exists( $label, 'category' );

	if ( ! $term ) {
		$created = wp_insert_term( $label, 'category' );

		if ( ! is_wp_error( $created ) ) {
			$term = $created;
		}
	}

	if ( $term && ! is_wp_error( $term ) ) {
		wp_set_post_terms( $post_id, array( (int) $term['term_id'] ), 'category' );
	}

	/**
	 * Fires after a lead has been stored.
	 *
	 * @param int    $post_id Lead id.
	 * @param string $type    Lead type.
	 * @param array  $fields  Submitted fields.
	 */
	do_action( 'halepath_lead_saved', $post_id, $type, $fields );

	return $post_id;
}

/**
 * Store a lead and remember that this request already produced one.
 *
 * @param string $type Lead type.
 * @param array  $data Submitted fields.
 * @return int
 */
function halepath_capture_lead( $type, $data = array() ) {
	$post_id = halepath_save_lead( $type, $data );

	if ( $post_id ) {
		$GLOBALS['halepath_lead_id'] = $post_id;
	}

	return $post_id;
}

/**
 * The submitted fields of the current request, cleaned up.
 *
 * @return array
 */
function halepath_lead_request_fields() {
	if ( empty( $_POST ) ) {
		return array();
	}

	return halepath_normalize_lead_fields( $_POST );
}

/**
 * Check whether the submitted fields look like a lead.
 *
 * @param array $fields Cleaned fields.
 * @return bool
 */
function halepath_looks_like_lead( $fields ) {
	$has_email = ! empty( $fields['email'] ) || ! empty( $fields['billing_email'] );
	$has_name  = ! empty( $fields['name'] ) || ! empty( $fields['fullname'] );
	$has_more  = ! empty( $fields['message'] ) || ! empty( $fields['subject'] ) || ! empty( $fields['product'] )
		|| ! empty( $fields['dimension'] ) || ! empty( $fields['quantity'] ) || ! empty( $fields['quote_price'] )
		|| ! empty( $fields['total_price'] ) || ! empty( $fields['colors'] ) || ! empty( $fields['length'] );

	return $has_email || ( $has_name && $has_more );
}

/**
 * Guess the kind of lead from the submitted fields.
 *
 * @param array $fields Cleaned fields.
 * @return string
 */
function halepath_detect_lead_type( $fields ) {
	if ( ! empty( $fields['quote_price'] ) || ( ! empty( $fields['length'] ) && ! empty( $fields['width'] ) ) ) {
		return 'get-quote';
	}

	if ( ! empty( $fields['fullname'] ) ) {
		return 'contact-us';
	}

	if ( ! empty( $fields['total_price'] ) || ! empty( $fields['dimension'] ) || ! empty( $fields['box_stock'] ) ) {
		return 'checkout';
	}

	if ( ! empty( $fields['message'] ) ) {
		return 'contact-us';
	}

	return 'get-quote';
}

/**
 * Catch submissions that were not saved by one of the theme handlers.
 *
 * Keeps the lead storage working even when a form posts to an action that the
 * theme does not know about.
 */
function halepath_capture_unhandled_lead() {
	if ( ! empty( $GLOBALS['halepath_lead_id'] ) ) {
		return;
	}

	if ( ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
		return;
	}

	if ( ! isset( $_SERVER['REQUEST_METHOD'] ) || 'POST' !== strtoupper( $_SERVER['REQUEST_METHOD'] ) ) {
		return;
	}

	$fields = halepath_lead_request_fields();

	if ( ! halepath_looks_like_lead( $fields ) ) {
		return;
	}

	halepath_capture_lead( halepath_detect_lead_type( $fields ), $fields );
}
add_action( 'shutdown', 'halepath_capture_unhandled_lead' );

/**
 * Store a WooCommerce order as a lead.
 *
 * @param int $order_id Order id.
 */
function halepath_save_order_lead( $order_id ) {
	if ( ! function_exists( 'wc_get_order' ) ) {
		return;
	}

	$order = wc_get_order( $order_id );

	if ( ! $order ) {
		return;
	}

	$data = array(
		'order_number'   => $order->get_order_number(),
		'order_status'   => $order->get_status(),
		'order_total'    => $order->get_total(),
		'order_currency' => $order->get_currency(),
		'payment_method' => $order->get_payment_method_title(),
		'customer_note'  => $order->get_customer_note(),
	);

	foreach ( (array) $order->get_address( 'billing' ) as $key => $value ) {
		$data[ 'billing_' . $key ] = $value;
	}

	foreach ( (array) $order->get_address( 'shipping' ) as $key => $value ) {
		$data[ 'shipping_' . $key ] = $value;
	}

	$items = array();

	foreach ( $order->get_items() as $item ) {
		$items[] = $item->get_name() . ' x ' . $item->get_quantity();
	}

	if ( $items ) {
		$data['order_items'] = implode( ', ', $items );
	}

	halepath_capture_lead( 'checkout', $data );
}
add_action( 'woocommerce_checkout_order_processed', 'halepath_save_order_lead' );
add_action( 'woocommerce_store_api_checkout_order_processed', 'halepath_save_order_lead' );

/**
 * Columns of the leads list table.
 *
 * @param array $columns Columns.
 * @return array
 */
function halepath_leads_columns( $columns ) {
	$new = array();

	foreach ( $columns as $key => $label ) {
		$new[ $key ] = $label;

		if ( 'title' === $key ) {
			$new['lead_type']    = __( 'Type', 'halepath' );
			$new['lead_email']   = __( 'Email', 'halepath' );
			$new['lead_phone']   = __( 'Phone', 'halepath' );
			$new['lead_product'] = __( 'Product', 'halepath' );
		}
	}

	return $new;
}
add_filter( 'manage_leads_posts_columns', 'halepath_leads_columns' );

/**
 * Content of the leads list table columns.
 *
 * @param string $column  Column key.
 * @param int    $post_id Lead id.
 */
function halepath_leads_column_content( $column, $post_id ) {
	$keys = array(
		'lead_type'    => '_lead_type',
		'lead_email'   => '_lead_email',
		'lead_phone'   => '_lead_phone',
		'lead_product' => '_lead_product',
	);

	if ( ! isset( $keys[ $column ] ) ) {
		return;
	}

	$value = get_post_meta( $post_id, $keys[ $column ], true );

	if ( 'lead_type' === $column ) {
		$value = halepath_lead_type_label( $value );
	}

	echo esc_html( $value );
}
add_action( 'manage_leads_posts_custom_column', 'halepath_leads_column_content', 10, 2 );

/**
 * Make the type column sortable.
 *
 * @param array $columns Sortable columns.
 * @return array
 */
function halepath_leads_sortable_columns( $columns ) {
	$columns['lead_type'] = 'lead_type';

	return $columns;
}
add_filter( 'manage_edit-leads_sortable_columns', 'halepath_leads_sortable_columns' );

/**
 * Sort the leads by type when the column is used.
 *
 * @param WP_Query $query Current query.
 */
function halepath_leads_sort_by_type( $query ) {
	if ( ! is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( 'lead_type' !== $query->get( 'orderby' ) ) {
		return;
	}

	$query->set( 'meta_key', '_lead_type' );
	$query->set( 'orderby', 'meta_value' );
}
add_action( 'pre_get_posts', 'halepath_leads_sort_by_type' );

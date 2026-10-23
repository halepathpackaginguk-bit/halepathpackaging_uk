<?php




add_action('wp_ajax_send_quote_form', 'handle_quote_form');
add_action('wp_ajax_nopriv_send_quote_form', 'handle_quote_form');

function handle_quote_form() {

    // Sanitize fields
    $name   = sanitize_text_field($_POST['name']);
    $phone  = sanitize_text_field($_POST['phone']);
    $email  = sanitize_email($_POST['email']);
    $product = sanitize_text_field($_POST['product']);
    $colors = sanitize_text_field($_POST['colors']);
    $length = sanitize_text_field($_POST['length']);
    $width  = sanitize_text_field($_POST['width']);
    $depth  = sanitize_text_field($_POST['depth']);
    $unit   = sanitize_text_field($_POST['unit']);
    $message = sanitize_textarea_field($_POST['message']);

   $attachments = array();

    if (!empty($_FILES['file']['name']) && $_FILES['file']['error'] === 0) {

        if (!function_exists('wp_handle_upload')) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
        }

        $uploaded = wp_handle_upload($_FILES['file'], array(
            'test_form' => false
        ));

        if (isset($uploaded['file'])) {
            $attachments[] = $uploaded['file'];
        } else {
            wp_send_json_error($uploaded['error']);
        }
    }

    $to = 'enquiry@halepathpackaging.co.uk';
    $subject = "New Quote Request";

    $lead_fields = array(
        'name'    => $name,
        'phone'   => $phone,
        'email'   => $email,
        'product' => $product,
        'colors'  => $colors,
        'length'  => $length,
        'width'   => $width,
        'depth'   => $depth,
        'unit'    => $unit,
        'message' => $message,
    );

    if ( isset( $uploaded['file'] ) ) {
        $lead_fields['file']     = wp_basename( $uploaded['file'] );
        $lead_fields['file_url'] = wp_get_upload_url() . '/' . basename( $uploaded['file'] );
    }

    halepath_capture_lead( 'get-quote', array_merge( halepath_lead_request_fields(), $lead_fields ) );

    $body = "
    Name: $name
    Phone: $phone
    Email: $email
    Product: $product
    Colors: $colors
    Dimensions: $length x $width x $depth ($unit)

    Message:
    $message
    ";

    $headers = array('Content-Type: text/plain; charset=UTF-8');

    // Handle file upload
    if (!empty($_FILES['file']['name'])) {

        require_once(ABSPATH . 'wp-admin/includes/file.php');

        $uploaded = wp_handle_upload($_FILES['file'], array('test_form' => false));

        if (!isset($uploaded['error'])) {
            $attachments = array($uploaded['file']);
        } else {
            wp_send_json_error($uploaded['error']);
        }

        $sent = wp_mail($to, $subject, $body, $headers, $attachments);

    } else {
        $sent = wp_mail($to, $subject, $body, $headers);
    }

    if ($sent) {
        wp_send_json_success("Email sent");
    } else {
        wp_send_json_error("Mail failed");
    }

    wp_die();
}


// AJAX hooks
add_action('wp_ajax_contact_form_submit', 'handle_contact_form');
add_action('wp_ajax_nopriv_contact_form_submit', 'handle_contact_form');

function handle_contact_form() {

    $name    = sanitize_text_field($_POST['fullname']);
    $phone   = sanitize_text_field($_POST['phone']);
    $email   = sanitize_email($_POST['email']);
    $product = sanitize_text_field($_POST['product']);
    $message = sanitize_textarea_field($_POST['message']);

    if (empty($name) || empty($email)) {
        wp_send_json_error('Required fields missing');
    }

    $to = 'enquiry@halepathpackaging.co.uk';
    $subject = "New Contact Message";

    halepath_capture_lead( 'contact-us', array_merge(
        halepath_lead_request_fields(),
        array(
            'name'    => $name,
            'phone'   => $phone,
            'email'   => $email,
            'product' => $product,
            'message' => $message,
        )
    ) );

    $body = "
    Name: $name
    Phone: $phone
    Email: $email
    Product: $product

    Message:
    $message
    ";

    $headers = array('Content-Type: text/plain; charset=UTF-8');

    if (wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_success("Sent");
    } else {
        wp_send_json_error("Mail failed");
    }

    wp_die();
}



add_action('wp_ajax_submit_box_form', 'submit_box_form');
add_action('wp_ajax_nopriv_submit_box_form', 'submit_box_form');

function submit_box_form() {

    $form_type = sanitize_text_field($_POST['form_type']);

    // =========================
    // SIZES FORM
    // =========================
    if ($form_type === 'sizes') {

        $dimension = sanitize_text_field($_POST['dimension']);
        $box_stock = sanitize_text_field($_POST['box_stock']);
        $quantity  = sanitize_text_field($_POST['quantity']);
        $printing  = sanitize_text_field($_POST['printing']);
        $price     = sanitize_text_field($_POST['total_price']);

        halepath_capture_lead( 'checkout', array_merge(
            halepath_lead_request_fields(),
            array(
                'dimension' => $dimension,
                'box_stock' => $box_stock,
                'quantity'  => $quantity,
                'printing'  => $printing,
                'total_price' => $price,
            )
        ) );

        $body = "
        NEW SIZES ORDER

        Dimension: $dimension
        Box Stock: $box_stock
        Quantity: $quantity
        Printing: $printing
        Total Price: £$price
        ";

        $sent = wp_mail(get_option('admin_email'), 'Sizes Form Order', $body);

        if ($sent) {
            wp_send_json_success('Sizes form sent');
        } else {
            wp_send_json_error('Mail failed');
        }
    }

    // =========================
    // QUOTE FORM
    // =========================
    if ($form_type === 'quote') {

        $name    = sanitize_text_field($_POST['name']);
        $phone   = sanitize_text_field($_POST['phone']);
        $email   = sanitize_email($_POST['email']);
        $product = sanitize_text_field($_POST['product']);
        $length  = sanitize_text_field($_POST['length']);
        $width   = sanitize_text_field($_POST['width']);
        $depth   = sanitize_text_field($_POST['depth']);
        $colors  = sanitize_text_field($_POST['colors']);
        $unit    = sanitize_text_field($_POST['unit']);
        $stock   = sanitize_text_field($_POST['stock']);
        $message = sanitize_textarea_field($_POST['message']);
        $price   = sanitize_text_field($_POST['quote_price']);

        halepath_capture_lead( 'get-quote', array_merge(
            halepath_lead_request_fields(),
            array(
                'name'       => $name,
                'phone'      => $phone,
                'email'      => $email,
                'product'    => $product,
                'length'     => $length,
                'width'      => $width,
                'depth'      => $depth,
                'colors'     => $colors,
                'unit'       => $unit,
                'stock'      => $stock,
                'message'    => $message,
                'quote_price' => $price,
            )
        ) );

        $body = "
        NEW QUOTE REQUEST

        Name: $name
        Phone: $phone
        Email: $email
        Product: $product

        Dimensions: $length x $width x $depth ($unit)
        Colors: $colors
        Stock: $stock

        Message:
        $message

        Estimated Price: £$price
        ";

        $sent = wp_mail(get_option('admin_email'), 'Quote Form', $body);

        if ($sent) {
            wp_send_json_success('Quote sent');
        } else {
            wp_send_json_error('Mail failed');
        }
    }

    wp_die();
}


/**
 * Handle the custom packaging quote form posted to admin-post.php.
 *
 * This form is the only one that sends to mufaqar@gmail.com.
 */
add_action('admin_post_custom_packaging_quote', 'halepath_handle_custom_packaging_quote');
add_action('admin_post_nopriv_custom_packaging_quote', 'halepath_handle_custom_packaging_quote');

function halepath_handle_custom_packaging_quote() {
    $redirect = wp_get_referer() ? wp_get_referer() : home_url('/');
    $redirect = remove_query_arg('quote_status', $redirect);

    $fail = function () use ($redirect) {
        wp_safe_redirect(add_query_arg('quote_status', 'error', $redirect) . '#custom-packaging-quote');
        exit;
    };

    if (
        ! isset($_POST['custom_packaging_quote_nonce']) ||
        ! wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['custom_packaging_quote_nonce'])),
            'custom_packaging_quote_action'
        )
    ) {
        $fail();
    }

    $fields = array(
        'full_name'     => sanitize_text_field(wp_unslash($_POST['full_name'] ?? '')),
        'phone'         => sanitize_text_field(wp_unslash($_POST['phone'] ?? '')),
        'email'         => sanitize_email(wp_unslash($_POST['email'] ?? '')),
        'company'       => sanitize_text_field(wp_unslash($_POST['company'] ?? '')),
        'length'        => sanitize_text_field(wp_unslash($_POST['length'] ?? '')),
        'width'         => sanitize_text_field(wp_unslash($_POST['width'] ?? '')),
        'height'        => sanitize_text_field(wp_unslash($_POST['height'] ?? '')),
        'unit'          => sanitize_text_field(wp_unslash($_POST['unit'] ?? '')),
        'material'      => sanitize_text_field(wp_unslash($_POST['material'] ?? '')),
        'print_sides'   => sanitize_text_field(wp_unslash($_POST['print_sides'] ?? '')),
        'quantity'      => sanitize_text_field(wp_unslash($_POST['quantity'] ?? '')),
        'coating'       => sanitize_text_field(wp_unslash($_POST['coating'] ?? '')),
        'product_style' => sanitize_text_field(wp_unslash($_POST['product_style'] ?? '')),
        'requirements'  => sanitize_textarea_field(wp_unslash($_POST['requirements'] ?? '')),
    );

    foreach (array('full_name', 'phone', 'email', 'length', 'width', 'height', 'unit', 'material', 'quantity') as $required) {
        if ('' === $fields[$required]) {
            $fail();
        }
    }

    if (! is_email($fields['email'])) {
        $fail();
    }

    $labels = array(
        'full_name'     => 'Full Name',
        'phone'         => 'Phone Number',
        'email'         => 'Email',
        'company'       => 'Company',
        'length'        => 'Length',
        'width'         => 'Width',
        'height'        => 'Height',
        'unit'          => 'Unit',
        'material'      => 'Material Type',
        'print_sides'   => 'Print Sides',
        'quantity'      => 'Quantity',
        'coating'       => 'Coating',
        'product_style' => 'Product Style',
        'requirements'  => 'Requirements',
    );

    $lines = array();

    foreach ($fields as $key => $value) {
        if ('' === $value) {
            continue;
        }

        $label   = isset($labels[$key]) ? $labels[$key] : ucwords(str_replace('_', ' ', $key));
        $lines[] = $label . ': ' . $value;
    }

    $to      = 'mufaqar@gmail.com';
    $subject = 'New Custom Packaging Quote Request';

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $fields['full_name'] . ' <' . $fields['email'] . '>',
    );

    halepath_capture_lead('get-quote', array_merge(
        $fields,
        array('name' => $fields['full_name'])
    ));

    $sent = wp_mail($to, $subject, implode("\n", $lines), $headers);

    wp_safe_redirect(add_query_arg('quote_status', $sent ? 'success' : 'error', $redirect) . '#custom-packaging-quote');
    exit;
}


add_action('wp_ajax_submit_final_order', 'submit_final_order');
add_action('wp_ajax_nopriv_submit_final_order', 'submit_final_order');

function submit_final_order() {

    $name  = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);

    $dimension = sanitize_text_field($_POST['dimension']);
    $box_stock = sanitize_text_field($_POST['box_stock']);
    $quantity  = sanitize_text_field($_POST['quantity']);
    $printing  = sanitize_text_field($_POST['printing']);
    $price     = sanitize_text_field($_POST['total_price']);

    halepath_capture_lead( 'checkout', array_merge(
        halepath_lead_request_fields(),
        array(
            'name'       => $name,
            'email'      => $email,
            'phone'      => $phone,
            'address'    => isset( $_POST['address'] ) ? sanitize_textarea_field( wp_unslash( $_POST['address'] ) ) : '',
            'product'    => isset( $_POST['product'] ) ? sanitize_text_field( wp_unslash( $_POST['product'] ) ) : '',
            'dimension'  => $dimension,
            'box_stock'  => $box_stock,
            'quantity'   => $quantity,
            'printing'   => $printing,
            'total_price' => $price,
        )
    ) );

    $body = "
    NEW ORDER

    Name: $name
    Email: $email
    Phone: $phone

    Dimension: $dimension
    Stock: $box_stock
    Quantity: $quantity
    Printing: $printing

    Total Price: £$price
    ";

    $sent = wp_mail(get_option('admin_email'), 'New Checkout Order', $body);

    if ($sent) {
        wp_send_json_success('Order sent');
    } else {
        wp_send_json_error('Mail failed');
    }

    wp_die();
}
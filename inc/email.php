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
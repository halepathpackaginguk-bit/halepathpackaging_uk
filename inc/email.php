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

    $to = 'mufaqar@gmail.com';
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

    $to = 'mufaqar@gmail.com';
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
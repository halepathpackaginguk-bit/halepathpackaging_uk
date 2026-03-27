<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $to = "mufaqar@gmail.com";
    $subject = "New Quote Request";

    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $product = $_POST['product'] ?? '';
    $colors = $_POST['colors'] ?? '';
    $length = $_POST['length'] ?? '';
    $width = $_POST['width'] ?? '';
    $depth = $_POST['depth'] ?? '';
    $unit = $_POST['unit'] ?? '';
    $message = $_POST['message'] ?? '';

    $body = "
    Name: $name
    Phone: $phone
    Email: $email
    Product: $product
    Colors: $colors
    Size: $length x $width x $depth ($unit)

    Message:
    $message
    ";

    $headers = "From: $email";

    // Handle file upload
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];

        $fileContent = chunk_split(base64_encode(file_get_contents($fileTmpPath)));

        $boundary = md5(time());

        $headers = "From: $email\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";

        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=UTF-8\r\n\r\n";
        $body .= "$body\r\n";

        $body .= "--$boundary\r\n";
        $body .= "Content-Type: application/octet-stream; name=\"$fileName\"\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n";
        $body .= "Content-Disposition: attachment; filename=\"$fileName\"\r\n\r\n";
        $body .= "$fileContent\r\n";
        $body .= "--$boundary--";
    }

    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
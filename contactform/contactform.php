<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Set the recipient email address
    $to = "recipient@example.com"; // Replace with your email address

    // Create the email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Compose the email message
    $email_message = "
    <html>
    <head>
        <title>Contact Form Submission</title>
    </head>
    <body>
        <h2>Contact Form Submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong></p>
        <p>$message</p>
    </body>
    </html>
    ";

    // Send the email
    if (mail($to, $subject, $email_message, $headers)) {
        echo "OK"; // Return "OK" to indicate successful email sending
    } else {
        echo "Something went wrong. Please try again later."; // Return an error message
    }
} else {
    // If the request method is not POST, return an error message
    echo "Invalid request method.";
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace with your actual email address
    $to = "saransh.bhrgv@gmail.com"; 
    
    // Collect form data
    $name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $message = isset($_POST["message"]) ? trim($_POST["message"]) : "";

    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Email subject
    $subject = "New Contact Form Message from $name";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Error sending message. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
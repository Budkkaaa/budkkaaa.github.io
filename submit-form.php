<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $updates = isset($_POST['updates']) ? 'Yes' : 'No';
    $cookies = htmlspecialchars($_POST['cookies']);

    // Set the recipient email address
    $to = "budborgio@gmail.com"; // Replace with your email address

    // Set the email subject
    $subject = "New Contact Form Submission";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Message:\n$message\n\n";
    $email_content .= "Updates: $updates\n";
    $email_content .= "Cookies: $cookies\n";

    // Set the email headers
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirect to a thank you page (or display a success message)
        echo "Thank you for your message. It has been sent.";
    } else {
        // Display an error message
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>

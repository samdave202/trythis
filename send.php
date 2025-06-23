<?php
// Replace with your email address
$to = "jc4717287@gmail.com";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email from POST data
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Extract domain from email
        $domain = substr(strrchr($email, "@"), 1);

        // Prepare email content
        $subject = "New Email Submission";
        $message = "Email: $email\nDomain: $domain";
        $headers = "From: noreply@" . $_SERVER['SERVER_NAME'];

        // Send email
        mail($to, $subject, $message, $headers);

        // Optional: Redirect or show success message
        echo "Thank you! Your email has been submitted.";
    } else {
        echo "Invalid email address.";
    }
} else {
    // Show HTML form if not submitted
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Send Email</title>
    </head>
    <body>
        <form method="post" action="send.php">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <button type="submit">Send</button>
        </form>
    </body>
    </html>
    <?php
}
?>
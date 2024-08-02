<?php
// Check for empty fields
if(empty($_POST['name']) ||
   empty($_POST['email']) ||
   empty($_POST['phone']) ||
   empty($_POST['message']) ||
   !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "No arguments Provided!";
    exit;
}

$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Create the email and send the message
$to = 'me.personal.games@gmail.com'; // Your email address where you want to receive emails
$email_subject = "Website Contact Form: $name";
$email_body = "You have received a new message from your website contact form.\n\n".
              "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";

$headers = "From: noreply@yourdomain.com\n"; // Replace with a valid sender email address
$headers .= "Reply-To: $email_address";

if(mail($to, $email_subject, $email_body, $headers)) {
    echo "Message sent successfully.";
} else {
    echo "Failed to send message. Please try again later.";
}
?>

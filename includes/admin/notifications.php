<?php
// includes/notifications.php

// Process form submission
if (isset($_POST['submit'])) {
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);

    // Perform additional processing or save data as needed

    // Example: Send email notification
    $to = 'admin@example.com'; // Replace with the email address where you want to receive notifications
    $subject = 'New Booking Notification';
    $message = "A new booking has been made.\n\nName: $name\nEmail: $email";

    if (wp_mail($to, $subject, $message)) {
        echo 'Booking submitted successfully!';
    } else {
        echo 'Failed to submit the booking. Please try again later.';
    }
}

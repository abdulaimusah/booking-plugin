<?php
// booking_process.php

// Include WordPress core files
require_once(ABSPATH . 'wp-load.php');


add_action('wp_ajax_nopriv_booking_process', 'booking_process_callback');


// Get the action parameter
$action = $_POST['action'];

// Handle different actions
if ($action === 'booking_process') {

    // Check if the request is an AJAX request
    if (defined('DOING_AJAX') && DOING_AJAX) {
        // Check if the form data was submitted
        if (isset($_POST['name'])) {
            // Retrieve the form data
            $name = sanitize_text_field($_POST['name']);
            $email = sanitize_email($_POST['email']);
            $booking_date = sanitize_text_field($_POST['booking_date']);
            $booking_time = sanitize_text_field($_POST['booking_time']);

            // Perform necessary form validation and processing
            // Insert the data into the database or perform any other operations as needed

            global $wpdb;
            $table_name = $wpdb->prefix . 'bookings';

            $data = array(
                'name' => $name,
                'email' => $email,
                'booking_date' => $booking_date,
                'booking_time' => $booking_time,
            );
            $wpdb->insert($table_name, $data);
            // For demonstration purposes, let's assume the data was successfully processed
            $response = array(
                'success' => true,
                'message' => 'Booking submitted successfully!',
                'data' => 'data', /* array(
                   'name' => $name,
                   'email' => $email,
                   'booking_date' => $booking_date,
                   'booking_time' => $booking_time
                   ) */
            );

            // Return the response as JSON
            wp_send_json($response);
        }
    } else {
        // If it's not an AJAX request, handle it accordingly
        // Redirect, display an error message, etc.
        // This part depends on your specific requirements
        // You can customize it based on how you want to handle non-AJAX requests
    }
}
?>
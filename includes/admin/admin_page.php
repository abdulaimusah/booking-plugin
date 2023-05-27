<?php
// admin-page.php

// Get bookings from the database
// $bookings = your_custom_get_bookings_function();


?>

<div class="wrap">
    <h1>Booking Plugin Admin Page</h1>

    <?php
    global $wpdb;

    $table_name = $wpdb->prefix . 'bookings';

    // Retrieve the data from the table
    $bookings = $wpdb->get_results("SELECT * FROM $table_name");

    // Include the booking-list template
    include BOOKING_PLUGIN_DIR . 'templates/booking_list.php';
    ?>
</div>
<?php
/**
 * Template for displaying booking confirmation.
 *
 * Available variables:
 * - $booking_id: The ID of the booking.
 * - $name: The name of the person who made the booking.
 * - $email: The email address of the person who made the booking.
 * - $booking_date: The date of the booking.
 * - $booking_time: The time of the booking.
 */
?>

<h2>Booking Confirmation</h2>

<p>Thank you, <?php echo esc_html($name); ?>, for your booking.</p>

<p>Booking details:</p>

<ul>
    <li><strong>Booking ID:</strong> <?php echo esc_html($booking_id); ?></li>
    <li><strong>Name:</strong> <?php echo esc_html($name); ?></li>
    <li><strong>Email:</strong> <?php echo esc_html($email); ?></li>
    <li><strong>Date:</strong> <?php echo esc_html($booking_date); ?></li>
    <li><strong>Time:</strong> <?php echo esc_html($booking_time); ?></li>
</ul>

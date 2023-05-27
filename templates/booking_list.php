<?php
/**
 * Template for displaying the list of bookings in the admin area.
 *
 * Available variables:
 * - $bookings: An array of booking objects containing booking details.
 */
?>

<div class="wrap">
    <h1>Booking List</h1>

    <?php if (empty($bookings)) : ?>
        <p>No bookings found.</p>
    <?php else : ?>
        <table class="wp-list-table widefat striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking) : ?>
                    <tr>
                        <td><?php echo esc_html($booking->id); ?></td>
                        <td><?php echo esc_html($booking->name); ?></td>
                        <td><?php echo esc_html($booking->email); ?></td>
                        <td><?php echo esc_html($booking->booking_date); ?></td>
                        <td><?php echo esc_html($booking->booking_time); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

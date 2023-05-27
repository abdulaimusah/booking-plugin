<?php
// booking_form.php
?>

<form method="post" action="" id="booking-form">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="booking-date">Date:</label>
    <input type="date" name="booking_date" id="booking-date" required>

    <label for="booking-time">Time:</label>
    <input type="time" name="booking_time" id="booking-time" required>

    <input type="submit" name="submit_booking" value="Submit">
</form>

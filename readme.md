# WordPress Booking Plugin

Booking Plugin is a simple WordPress plugin that allows users to make bookings on your website.

## Description

Booking Plugin provides a user-friendly booking form that allows visitors to submit their name, email, date, and time for a booking. The plugin stores the booking information in a custom database table and provides an admin page to manage and view the bookings. It also displays a confirmation modal when a booking is successfully submitted, showing the booking information.

## Features

- Easy to use booking form with validation
- Secure storage of booking information in a custom database table
- Admin page to view and manage bookings
- Shortcode support to display the booking form on any page or post
- Customizable styling through CSS
- Confirmation modal to display booking information after successful submission

## Installation

1. Download the Booking Plugin ZIP file.
2. Log in to your WordPress admin panel.
3. Go to 'Plugins' > 'Add New'.
4. Click on the 'Upload Plugin' button.
5. Choose the ZIP file you downloaded and click 'Install Now'.
6. After installation, click on the 'Activate' button to activate the plugin.

## Usage

To add the booking form to a page or post, use the `[booking_form]` shortcode. You can place this shortcode in the content area of any page or post where you want the booking form to appear.

You can also customize the appearance of the booking form by modifying the CSS styles in the plugin files. The CSS script is located at `booking-plugin/includes/public/booking-form.php`.

## Confirmation Modal

When a booking is submitted successfully, a confirmation modal will appear to show the booking information. The modal will display the following details:

- Name
- Email
- Date
- Time

The confirmation modal provides a visually appealing and informative way to acknowledge the successful booking submission.

## Admin Page

The plugin adds a new menu item called 'Booking Plugin' in the WordPress admin menu. Clicking on this menu item will take you to the admin page where you can view and manage the bookings. You need to have the 'manage_options' capability to access the admin page.

## Database

The plugin creates a custom database table to store the bookings. The table name is prefixed with the WordPress database prefix followed by 'bookings'. For example, if the WordPress database prefix is 'wp_', the table name will be 'wp_bookings'.

## Support

If you have any questions or need support regarding the Booking Plugin, please contact me at abdulaimusah31@gmail.com
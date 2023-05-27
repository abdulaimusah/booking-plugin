<?php
// settings.php

// Register plugin settings
function booking_plugin_register_settings() {
    add_option('booking_plugin_email_notification', '1');
    register_setting('booking_plugin_settings_group', 'booking_plugin_email_notification');
}
add_action('admin_init', 'booking_plugin_register_settings');

// Add settings page to the admin menu
function booking_plugin_add_settings_page() {
    add_submenu_page(
        'booking-plugin',                              // Parent menu slug
        'Booking Plugin Settings',                     // Page title
        'Settings',                                    // Menu title
        'manage_options',                              // Capability required to access the page
        'booking-plugin-settings',                      // Menu slug
        'booking_plugin_settings_page_callback'        // Callback function to render the settings page
    );
}
add_action('admin_menu', 'booking_plugin_add_settings_page');

// Settings page callback function
function booking_plugin_settings_page_callback() {
    ?>
    <div class="wrap">
        <h1>Booking Plugin Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields('booking_plugin_settings_group'); ?>
            <?php do_settings_sections('booking_plugin_settings_group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Email Notifications</th>
                    <td>
                        <label>
                            <input type="checkbox" name="booking_plugin_email_notification" value="1" <?php checked(get_option('booking_plugin_email_notification'), '1'); ?>>
                            Send email notifications for new bookings
                        </label>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

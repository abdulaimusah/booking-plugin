<?php
/*
Plugin Name: Booking Plugin
Description: A simple booking plugin for WordPress.
Version: 1.0
Author: Abdulai Musah
*/

// Define plugin constants
define('BOOKING_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('BOOKING_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include necessary files
require_once BOOKING_PLUGIN_DIR . 'helpers/helper_functions.php';
require_once BOOKING_PLUGIN_DIR . 'includes/admin/booking_process.php';

// Register activation and deactivation hooks
register_activation_hook(__FILE__, 'booking_plugin_activate');
register_deactivation_hook(__FILE__, 'booking_plugin_deactivate');

// Activation hook callback
function booking_plugin_activate()
{
    // Create bookings database

    global $wpdb;
    $table_name = $wpdb->prefix . 'bookings';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id INT(11) NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        booking_date DATE NOT NULL,
        booking_time TIME NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    // Insert sample data into the table
    $data = array(
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
        'booking_date' => '2023-05-21',
        'booking_time' => '14:30:00',
    );
    $wpdb->insert($table_name, $data);

    // Example: Set default plugin options
    update_option('booking_plugin_option', 'default_value');
}

function booking_plugin_deactivate()
{
    // Perform any necessary cleanup tasks on plugin deactivation

    // Drop custom database tables
    global $wpdb;
    $table_name = $wpdb->prefix . 'bookings';
    $dropsql = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query($dropsql);
}

// Enqueue styles and scripts
function booking_plugin_enqueue_scripts()
{
    wp_enqueue_style('booking-plugin-style', BOOKING_PLUGIN_URL . 'assets/css/style.css', array(), '1.0.0');
    wp_enqueue_style('booking-plugin-style', BOOKING_PLUGIN_URL . 'assets/css/booking-plugin.css', array(), '1.0.0');
    wp_enqueue_script('booking-plugin-script', BOOKING_PLUGIN_URL . 'assets/js/script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'booking_plugin_enqueue_scripts');

// Register shortcode for the booking form
function booking_form_shortcode()
{
    ob_start();
    include BOOKING_PLUGIN_DIR . 'includes/public/booking_form.php';
    
    
    return ob_get_clean();
}
add_shortcode('booking_form', 'booking_form_shortcode');

// Register admin menu page
function booking_plugin_add_menu_page()
{
    add_menu_page(
        'Booking Plugin',
        'Booking Plugin',
        'manage_options',
        'booking-plugin',
        'booking_plugin_admin_page',
        'dashicons-calendar-alt',
        20
    );
}
add_action('admin_menu', 'booking_plugin_add_menu_page');

// Admin page callback
function booking_plugin_admin_page()
{
    require_once BOOKING_PLUGIN_DIR . 'includes/admin/admin_page.php';
}
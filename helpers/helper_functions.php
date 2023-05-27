<?php
// Helper function to sanitize text input
function sanitize_text_input($text) {
    return sanitize_text_field($text);
}

// Helper function to sanitize email input
function sanitize_email_input($email) {
    return sanitize_email($email);
}

// Other helper functions...

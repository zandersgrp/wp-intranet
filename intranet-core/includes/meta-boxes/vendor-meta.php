<?php
/**
 * Adds a meta box for the 'Vendors' post type.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Add meta box for Vendors.
function intranet_core_add_vendor_meta_box() {
    add_meta_box('vendor_details', 'Vendor Details', 'intranet_core_render_vendor_meta_box', 'vendor', 'normal', 'high');
}
add_action('add_meta_boxes', 'intranet_core_add_vendor_meta_box');

// Render the meta box.
function intranet_core_render_vendor_meta_box($post) {
    $email = get_post_meta($post->ID, 'vendor_email', true);
    $phone = get_post_meta($post->ID, 'vendor_phone', true);
    echo '<label for="vendor_email">Email:</label>';
    echo '<input type="email" id="vendor_email" name="vendor_email" value="' . esc_attr($email) . '" />';
    echo '<br><br>';
    echo '<label for="vendor_phone">Phone:</label>';
    echo '<input type="text" id="vendor_phone" name="vendor_phone" value="' . esc_attr($phone) . '" />';
}

// Save meta box data.
function intranet_core_save_vendor_meta_box($post_id) {
    if (array_key_exists('vendor_email', $_POST)) {
        update_post_meta($post_id, 'vendor_email', sanitize_email($_POST['vendor_email']));
    }
    if (array_key_exists('vendor_phone', $_POST)) {
        update_post_meta($post_id, 'vendor_phone', sanitize_text_field($_POST['vendor_phone']));
    }
}
add_action('save_post', 'intranet_core_save_vendor_meta_box');

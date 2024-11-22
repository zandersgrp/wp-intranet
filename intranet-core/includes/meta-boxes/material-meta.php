<?php
/**
 * Adds a meta box for the 'Materials' post type.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Add meta box for Materials.
function intranet_core_add_material_meta_box() {
    add_meta_box('material_details', 'Material Details', 'intranet_core_render_material_meta_box', 'material', 'normal', 'high');
}
add_action('add_meta_boxes', 'intranet_core_add_material_meta_box');

// Render the meta box.
function intranet_core_render_material_meta_box($post) {
    $status = get_post_meta($post->ID, 'material_status', true);
    $delivery_date = get_post_meta($post->ID, 'material_delivery_date', true);

    echo '<label for="material_status">Status:</label>';
    echo '<select id="material_status" name="material_status">
            <option value="awaiting" ' . selected($status, 'awaiting', false) . '>Awaiting Delivery</option>
            <option value="delivered" ' . selected($status, 'delivered', false) . '>Delivered</option>
          </select>';
    echo '<br><br>';
    echo '<label for="material_delivery_date">Expected Delivery Date:</label>';
    echo '<input type="date" id="material_delivery_date" name="material_delivery_date" value="' . esc_attr($delivery_date) . '" />';
}

// Save meta box data.
function intranet_core_save_material_meta_box($post_id) {
    if (array_key_exists('material_status', $_POST)) {
        update_post_meta($post_id, 'material_status', sanitize_text_field($_POST['material_status']));
    }
    if (array_key_exists('material_delivery_date', $_POST)) {
        update_post_meta($post_id, 'material_delivery_date', sanitize_text_field($_POST['material_delivery_date']));
    }
}
add_action('save_post', 'intranet_core_save_material_meta_box');

<?php
/**
 * Adds a meta box for the 'Laborers' post type.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Add meta box for Laborers.
function intranet_core_add_laborer_meta_box() {
    add_meta_box('laborer_details', 'Laborer Details', 'intranet_core_render_laborer_meta_box', 'laborer', 'normal', 'high');
}
add_action('add_meta_boxes', 'intranet_core_add_laborer_meta_box');

// Render the meta box.
function intranet_core_render_laborer_meta_box($post) {
    $phone = get_post_meta($post->ID, 'laborer_phone', true);
    echo '<label for="laborer_phone">Phone:</label>';
    echo '<input type="text" id="laborer_phone" name="laborer_phone" value="' . esc_attr($phone) . '" />';
}

// Save meta box data.
function intranet_core_save_laborer_meta_box($post_id) {
    if (array_key_exists('laborer_phone', $_POST)) {
        update_post_meta($post_id, 'laborer_phone', sanitize_text_field($_POST['laborer_phone']));
    }
}
add_action('save_post', 'intranet_core_save_laborer_meta_box');

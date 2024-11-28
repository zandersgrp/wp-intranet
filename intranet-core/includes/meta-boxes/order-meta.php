<?php
/**
 * Add meta box for "Orders" custom post type.
 */

function add_order_meta_box() {
    add_meta_box('order_meta', 'Order Details', 'render_order_meta_box', 'order', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_order_meta_box');

function render_order_meta_box($post) {
    $order_number = get_post_meta($post->ID, '_order_number', true);
    $order_date = get_post_meta($post->ID, '_order_date', true);
    $order_status = get_post_meta($post->ID, '_order_status', true);

    // Order Number
    echo '<label for="order_number">Order Number:</label>';
    echo '<input type="text" id="order_number" name="order_number" value="' . esc_attr($order_number) . '" style="width:100%;" /><br><br>';

    // Order Date
    echo '<label for="order_date">Order Date:</label>';
    echo '<input type="date" id="order_date" name="order_date" value="' . esc_attr($order_date) . '" style="width:100%;" /><br><br>';

    // Order Status Dropdown
    echo '<label for="order_status">Order Status:</label>';
    echo '<select id="order_status" name="order_status" style="width:100%;">';
    echo '<option value="pending"' . selected($order_status, 'pending', false) . '>Pending</option>';
    echo '<option value="completed"' . selected($order_status, 'completed', false) . '>Completed</option>';
    echo '<option value="canceled"' . selected($order_status, 'canceled', false) . '>Canceled</option>';
    echo '</select><br><br>';
}

function save_order_meta_box($post_id) {
    if (array_key_exists('order_number', $_POST)) {
        update_post_meta($post_id, '_order_number', sanitize_text_field($_POST['order_number']));
    }
    if (array_key_exists('order_date', $_POST)) {
        update_post_meta($post_id, '_order_date', sanitize_text_field($_POST['order_date']));
    }
    if (array_key_exists('order_status', $_POST)) {
        update_post_meta($post_id, '_order_status', sanitize_text_field($_POST['order_status']));
    }
}
add_action('save_post', 'save_order_meta_box');
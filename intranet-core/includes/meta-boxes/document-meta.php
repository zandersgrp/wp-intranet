<?php
/**
 * Add meta box for "Documents" custom post type.
 */

function add_document_meta_box() {
    add_meta_box('document_meta', 'Document Details', 'render_document_meta_box', 'document', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_document_meta_box');

function render_document_meta_box($post) {
    $category = get_post_meta($post->ID, '_document_category', true);
    $file_url = get_post_meta($post->ID, '_document_file_url', true);

    // Category Dropdown
    echo '<label for="document_category">Category:</label>';
    echo '<select id="document_category" name="document_category" style="width:100%;">';
    echo '<option value="invoice"' . selected($category, 'invoice', false) . '>Invoice</option>';
    echo '<option value="work-order"' . selected($category, 'work-order', false) . '>Work Order</option>';
    echo '<option value="statement"' . selected($category, 'statement', false) . '>Statement</option>';
    echo '<option value="site-video"' . selected($category, 'site-video', false) . '>Site Video</option>';
    echo '</select>';
    echo '<hr>';

    // File Upload
    echo '<label for="document_file_url">Upload File:</label>';
    echo '<input type="text" id="document_file_url" name="document_file_url" value="' . esc_attr($file_url) . '" style="width:100%;" />';
    echo '<button id="upload_button" class="button">Upload</button>';
}

function save_document_meta_box($post_id) {
    if (array_key_exists('document_category', $_POST)) {
        update_post_meta($post_id, '_document_category', sanitize_text_field($_POST['document_category']));
    }
    if (array_key_exists('document_file_url', $_POST)) {
        update_post_meta($post_id, '_document_file_url', esc_url_raw($_POST['document_file_url']));
    }
}
add_action('save_post', 'save_document_meta_box');
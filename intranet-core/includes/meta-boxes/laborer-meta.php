<?php
/**
 * Add and manage meta box fields for "Laborers" post type.
 */

function add_laborer_meta_box() {
    add_meta_box(
        'laborer_meta',        // ID of the meta box
        'Laborer Details',     // Title
        'render_laborer_meta_box', // Callback function
        'laborer',             // Post type
        'normal',              // Context
        'high'                 // Priority
    );
}
add_action('add_meta_boxes', 'add_laborer_meta_box');

function render_laborer_meta_box($post) {
    // Retrieve existing values
    $first_name = get_post_meta($post->ID, '_laborer_first_name', true);
    $last_name = get_post_meta($post->ID, '_laborer_last_name', true);
    $locale = get_post_meta($post->ID, '_laborer_locale', true);
    $hourly_wage = get_post_meta($post->ID, '_laborer_hourly_wage', true);
    $emergency_contact = get_post_meta($post->ID, '_laborer_emergency_contact', true);
    $address = get_post_meta($post->ID, '_laborer_address', true);
    $phone_number = get_post_meta($post->ID, '_laborer_phone_number', true);
    $email_address = get_post_meta($post->ID, '_laborer_email_address', true);
    $speciality = get_post_meta($post->ID, '_laborer_speciality', true);

    // Render fields
    echo '<label for="laborer_first_name">First Name:</label>';
    echo '<input type="text" id="laborer_first_name" name="laborer_first_name" value="' . esc_attr($first_name) . '" style="width:100%;"><br><br>';

    echo '<label for="laborer_last_name">Last Name:</label>';
    echo '<input type="text" id="laborer_last_name" name="laborer_last_name" value="' . esc_attr($last_name) . '" style="width:100%;"><br><br>';

    echo '<label for="laborer_locale">Primary Working Locale:</label>';
    echo '<input type="text" id="laborer_locale" name="laborer_locale" value="' . esc_attr($locale) . '" style="width:100%;"><br><br>';

    echo '<label for="laborer_hourly_wage">Hourly Wage (£):</label>';
    echo '<input type="number" id="laborer_hourly_wage" name="laborer_hourly_wage" value="' . esc_attr($hourly_wage) . '" style="width:100%;"><br><br>';

    echo '<label for="laborer_emergency_contact">Emergency Contact Details:</label>';
    echo '<input type="text" id="laborer_emergency_contact" name="laborer_emergency_contact" value="' . esc_attr($emergency_contact) . '" style="width:100%;"><br><br>';

    echo '<label for="laborer_address">Address:</label>';
    echo '<textarea id="laborer_address" name="laborer_address" style="width:100%;">' . esc_textarea($address) . '</textarea><br><br>';

    echo '<label for="laborer_phone_number">Phone Number:</label>';
    echo '<input type="text" id="laborer_phone_number" name="laborer_phone_number" value="' . esc_attr($phone_number) . '" style="width:100%;"><br><br>';

    echo '<label for="laborer_email_address">Email Address:</label>';
    echo '<input type="email" id="laborer_email_address" name="laborer_email_address" value="' . esc_attr($email_address) . '" style="width:100%;"><br><br>';

    echo '<label for="laborer_speciality">Speciality:</label>';
    echo '<select id="laborer_speciality" name="laborer_speciality" style="width:100%;">';
    echo '<option value="painter"' . selected($speciality, 'painter', false) . '>Painter</option>';
    echo '<option value="plumber"' . selected($speciality, 'plumber', false) . '>Plumber</option>';
    echo '<option value="electrician"' . selected($speciality, 'electrician', false) . '>Electrician</option>';
    echo '<option value="other"' . selected($speciality, 'other', false) . '>Other</option>';
    echo '</select><br><br>';
}

function save_laborer_meta_box($post_id) {
    // Save meta box data
    if (array_key_exists('laborer_first_name', $_POST)) {
        update_post_meta($post_id, '_laborer_first_name', sanitize_text_field($_POST['laborer_first_name']));
    }
    if (array_key_exists('laborer_last_name', $_POST)) {
        update_post_meta($post_id, '_laborer_last_name', sanitize_text_field($_POST['laborer_last_name']));
    }
    if (array_key_exists('laborer_locale', $_POST)) {
        update_post_meta($post_id, '_laborer_locale', sanitize_text_field($_POST['laborer_locale']));
    }
    if (array_key_exists('laborer_hourly_wage', $_POST)) {
        update_post_meta($post_id, '_laborer_hourly_wage', sanitize_text_field($_POST['laborer_hourly_wage']));
    }
    if (array_key_exists('laborer_emergency_contact', $_POST)) {
        update_post_meta($post_id, '_laborer_emergency_contact', sanitize_text_field($_POST['laborer_emergency_contact']));
    }
    if (array_key_exists('laborer_address', $_POST)) {
        update_post_meta($post_id, '_laborer_address', sanitize_textarea_field($_POST['laborer_address']));
    }
    if (array_key_exists('laborer_phone_number', $_POST)) {
        update_post_meta($post_id, '_laborer_phone_number', sanitize_text_field($_POST['laborer_phone_number']));
    }
    if (array_key_exists('laborer_email_address', $_POST)) {
        update_post_meta($post_id, '_laborer_email_address', sanitize_email($_POST['laborer_email_address']));
    }
    if (array_key_exists('laborer_speciality', $_POST)) {
        update_post_meta($post_id, '_laborer_speciality', sanitize_text_field($_POST['laborer_speciality']));
    }
}
add_action('save_post', 'save_laborer_meta_box');
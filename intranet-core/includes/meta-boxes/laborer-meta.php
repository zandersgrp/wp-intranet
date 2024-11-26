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
    $phone_number = get_post_meta($pos
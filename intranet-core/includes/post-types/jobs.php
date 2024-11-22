<?php
/**
 * Registers the 'Jobs' custom post type.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Register the 'Jobs' post type.
function intranet_core_register_jobs() {
    register_post_type('job', [
        'label' => 'Jobs',
        'public' => true,
        'supports' => ['title', 'editor', 'custom-fields'],
        'menu_icon' => 'dashicons-clipboard',
        'rewrite' => ['slug' => 'jobs'],
        // Revert to default capabilities
        'capability_type' => 'post', 
        'map_meta_cap' => false,    
    ]);
}
add_action('init', 'intranet_core_register_jobs');

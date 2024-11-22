<?php
/**
 * Registers the 'Tasks' custom post type.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Register the 'Tasks' post type.
function intranet_core_register_tasks() {
    register_post_type('task', [
        'label' => 'Tasks',
        'public' => true,
        'supports' => ['title', 'custom-fields'],
        'menu_icon' => 'dashicons-list-view',
        'rewrite' => ['slug' => 'tasks'],
        // Revert to default capabilities
        'capability_type' => 'post', 
        'map_meta_cap' => false,    
    ]);
}
add_action('init', 'intranet_core_register_tasks');

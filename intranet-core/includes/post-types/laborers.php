<?php
/**
 * Registers the 'Laborers' custom post type.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Register the 'Laborers' post type.
function intranet_core_register_laborers() {
    register_post_type('laborer', [
        'label' => 'Laborers',
        'public' => true,
        'supports' => ['title', 'editor', 'custom-fields'],
        'menu_icon' => 'dashicons-groups',
        'rewrite' => ['slug' => 'laborers'],
        // Revert to default capabilities
        'capability_type' => 'post', 
        'map_meta_cap' => false,    
    ]);
}
add_action('init', 'intranet_core_register_laborers');

<?php
/**
 * Registers the 'Materials' custom post type.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Register the 'Materials' post type.
function intranet_core_register_materials() {
    register_post_type('material', [
        'label' => 'Materials',
        'public' => true,
        'supports' => ['title', 'editor', 'custom-fields'],
        'menu_icon' => 'dashicons-hammer',
        'rewrite' => ['slug' => 'materials'],
        // Revert to default capabilities
        'capability_type' => 'post', 
        'map_meta_cap' => false,    
    ]);
}
add_action('init', 'intranet_core_register_materials');

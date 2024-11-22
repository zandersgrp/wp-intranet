<?php
/**
 * Registers the 'Vendors' custom post type.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Register the 'Vendors' post type.
function intranet_core_register_vendors() {
    register_post_type('vendor', [
        'label' => 'Vendors',
        'public' => true,
        'supports' => ['title', 'editor', 'custom-fields'],
        'menu_icon' => 'dashicons-store',
        'rewrite' => ['slug' => 'vendors'],
        // Revert to default capabilities
        'capability_type' => 'post', 
        'map_meta_cap' => false,    
    ]);
}
add_action('init', 'intranet_core_register_vendors');

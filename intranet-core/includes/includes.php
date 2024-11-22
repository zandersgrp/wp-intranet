<?php
/**
 * Includes file for the Intranet Core plugin.
 * This file loads all plugin functionality, split into modular files for clarity.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Load custom post types.
require_once INTRANET_CORE_PATH . 'includes/post-types/laborers.php'; // Handles the 'Laborers' post type.
require_once INTRANET_CORE_PATH . 'includes/post-types/vendors.php';  // Handles the 'Vendors' post type.
require_once INTRANET_CORE_PATH . 'includes/post-types/materials.php'; // Handles the 'Materials' post type.
require_once INTRANET_CORE_PATH . 'includes/post-types/jobs.php';     // Handles the 'Jobs' post type.
require_once INTRANET_CORE_PATH . 'includes/post-types/tasks.php'; // Handles the 'Tasks' post type.


// Load meta boxes.
require_once INTRANET_CORE_PATH . 'includes/meta-boxes/laborer-meta.php'; // Meta box for Laborers.
require_once INTRANET_CORE_PATH . 'includes/meta-boxes/vendor-meta.php';  // Meta box for Vendors.
require_once INTRANET_CORE_PATH . 'includes/meta-boxes/material-meta.php'; // Meta box for Materials.
require_once INTRANET_CORE_PATH . 'includes/meta-boxes/job-meta.php';     // Meta box for Jobs.

// Load AJAX handlers.
require_once INTRANET_CORE_PATH . 'includes/ajax/search-posts.php'; // AJAX search handler.

// Enqueue scripts and styles.
function intranet_core_enqueue_scripts($hook) {
    if ('post.php' === $hook || 'post-new.php' === $hook) {
        wp_enqueue_script('job-search', INTRANET_CORE_URL . 'assets/js/job-search.js', ['jquery'], null, true);
        wp_localize_script('job-search', 'ajax_object', ['ajax_url' => admin_url('admin-ajax.php')]);
    }
}
add_action('admin_enqueue_scripts', 'intranet_core_enqueue_scripts');

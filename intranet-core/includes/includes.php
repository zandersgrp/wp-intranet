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
require_once INTRANET_CORE_PATH . 'includes/post-types/tasks.php';    // Handles the 'Tasks' post type.
require_once INTRANET_CORE_PATH . 'includes/post-types/documents.php'; // Load the "Documents" post type.

// Load meta boxes.
require_once INTRANET_CORE_PATH . 'includes/meta-boxes/laborer-meta.php'; // Meta box for Laborers.
require_once INTRANET_CORE_PATH . 'includes/meta-boxes/vendor-meta.php';  // Meta box for Vendors.
require_once INTRANET_CORE_PATH . 'includes/meta-boxes/material-meta.php'; // Meta box for Materials.
require_once INTRANET_CORE_PATH . 'includes/meta-boxes/job-meta.php';     // Meta box for Jobs.
require_once INTRANET_CORE_PATH . 'includes/meta-boxes/document-meta.php'; // Load the "Documents" meta box.
require_once INTRANET_CORE_PATH . 'includes/meta-boxes/auto-title.php'; // Load the Auto Title file.

// Load AJAX handlers.
require_once INTRANET_CORE_PATH . 'includes/ajax/search-posts.php'; // AJAX search handler.

// Enqueue scripts and styles.
function intranet_core_enqueue_scripts($hook) {
    global $post_type;

    // Loa
<?php
/**
 * Restrict the admin menu for the 'job-admin' role.
 */

function restrict_admin_menu_items() {
    if (!current_user_can('job-admin')) {
        return; // Exit if not 'job-admin'
    }

    // Remove default WordPress menu items
    remove_menu_page('index.php');                  // Dashboard
    remove_menu_page('edit.php');                   // Posts
    remove_menu_page('upload.php');                 // Media
    remove_menu_page('edit-comments.php');          // Comments
    remove_menu_page('themes.php');                 // Appearance
    remove_menu_page('plugins.php');                // Plugins
    remove_menu_page('users.php');                  // Users
    remove_menu_page('tools.php');                  // Tools
    remove_menu_page('options-general.php');        // Settings
    remove_menu_page('edit.php?post_type=page');    // Pages
}
add_action('admin_menu', 'restrict_admin_menu_items', 100);

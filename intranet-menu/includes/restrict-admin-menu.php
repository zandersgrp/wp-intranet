<?php
/**
 * Restrict the admin menu for the 'job-admin' role only.
 */

function restrict_admin_menu_items() {
    // Skip restrictions entirely for administrators.
    if (current_user_can('manage_options')) {
        return; // Administrators retain all menus.
    }

    // Restrict menus for the 'job-admin' role.
    if (current_user_can('edit_jobs')) {
        // Default WordPress menu items to remove.
        $default_menus = [
            'index.php',               // Dashboard
            'upload.php',              // Media
            'edit-comments.php',       // Comments
            'edit.php',                // Posts
            'edit.php?post_type=page', // Pages
            'themes.php',              // Appearance
            'plugins.php',             // Plugins
            'users.php',               // Users
            'tools.php',               // Tools
            'options-general.php',     // Settings
        ];

        foreach ($default_menus as $menu) {
            remove_menu_page($menu);
        }
    }
}

<?php
/**
 * Assign custom post type capabilities to the administrator role.
 */

function override_admin_capabilities() {
    //error_log('override_admin_capabilities function triggered.');

    $admin_role = get_role('administrator');

    if ($admin_role) {
        // List of custom post types
        $custom_post_types = ['job', 'material', 'laborer', 'vendor', 'task', 'document','order'];

        // Add custom capabilities to the admin role
        foreach ($custom_post_types as $cpt) {
            $admin_role->add_cap("edit_{$cpt}");
            $admin_role->add_cap("read_{$cpt}");
            $admin_role->add_cap("delete_{$cpt}");
            $admin_role->add_cap("edit_{$cpt}s");
            $admin_role->add_cap("edit_others_{$cpt}s");
            $admin_role->add_cap("publish_{$cpt}s");
            $admin_role->add_cap("read_private_{$cpt}s");
            $admin_role->add_cap("delete_others_{$cpt}s");
            $admin_role->add_cap("delete_private_{$cpt}s");
            $admin_role->add_cap("edit_private_{$cpt}s");
            $admin_role->add_cap("edit_published_{$cpt}s");
            $admin_role->add_cap("delete_published_{$cpt}s");
        }

        //error_log('Administrator capabilities reassigned successfully.');
    } else {
        //error_log('Failed to retrieve Administrator role.');
    }
}
add_action('init', 'override_admin_capabilities');
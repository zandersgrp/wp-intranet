<?php
/**
 * Assign custom post type capabilities to the administrator role.
 */

function override_admin_capabilities() {
    $admin_role = get_role('administrator');

    if ($admin_role) {
        // List of custom post types
        $custom_post_types = ['job', 'material', 'laborer', 'vendor', 'task'];

        // Add custom capabilities to the admin role
        foreach ($custom_post_types as $cpt) {
            $admin_role->add_cap("edit_{$cpt}");
            $admin_role->add_cap("read_{$cpt}");
            $admin_role->add_cap("delete_{$cpt}");
            $admin_role->add_cap("edit_{$cpt}s");
      
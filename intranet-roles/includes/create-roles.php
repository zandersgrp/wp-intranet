<?php
/**
 * Create and manage custom roles like 'job-admin'.
 */
add_action('init', function () {
    $role = get_role('job-admin');
    if ($role) {
        error_log('Job Admin Role exists: ' . print_r($role, true));
    } else {
        error_log('Job Admin Role does not exist.');
    }
});

function intranet_create_roles() {
    // Add the 'job-admin' role if it doesn't exist
    if (!get_role('job-admin')) {
        add_role('job-admin', 'Job Admin', [
            'read' => true, // Basic read access
        ]);
    }

    // Define and assign capabilities for 'job-admin'
    $role = get_role('job-admin');
    if ($role) {
        // General admin permissions
        $role->add_cap('read');           // Basic read access
        $role->add_cap('edit_posts');    // Required to access admin
        $role->add_cap('upload_files');  // Allow media uploads (if needed)

        // Capabilities for custom post types
        $custom_post_types = ['material', 'job', 'laborer', 'vendor', 'task'];

        foreach ($custom_post_types as $cpt) {
            $role->add_cap("edit_{$cpt}");
            $role->add_cap("read_{$cpt}");
            $role->add_cap("delete_{$cpt}");
            $role->add_cap("edit_{$cpt}s");
            $role->add_cap("edit_others_{$cpt}s");
            $role->add_cap("publish_{$cpt}s");
            $role->add_cap("read_private_{$cpt}s");
        }
    }
}
add_action('init', 'intranet_create_roles');

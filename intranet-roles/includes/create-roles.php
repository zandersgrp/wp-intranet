<?php
/**
 * Create and manage custom roles like 'job-admin' and assign capabilities.
 */

function intranet_create_roles() {
    error_log('intranet_create_roles function triggered.');

    // Add 'job-admin' role if it doesn't exist
    if (!get_role('job-admin')) {
        $result = add_role('job-admin', 'Job Admin', [
            'read'          => true,
            'edit_posts'    => true,
            'upload_files'  => true,
        ]);

        /**if ($result) {
            error_log('Job Admin Role successfully added.');
        } else {
            error_log('Failed to add Job Admin Role.');
        }
    } else {
        error_log('Job Admin Role already exists.');
    }*/
    } // <-- remove this when activating logging!

    // Add custom post type capabilities to roles
    $roles = ['job-admin', 'administrator']; // Roles to update
    $custom_post_types = ['job', 'material', 'laborer', 'vendor', 'task', 'document', 'order'];

    foreach ($roles as $role_name) {
        $role = get_role($role_name);

        if ($role) {
            foreach ($custom_post_types as $cpt) {
                $role->add_cap("edit_{$cpt}");
                $role->add_cap("read_{$cpt}");
                $role->add_cap("delete_{$cpt}");
                $role->add_cap("edit_{$cpt}s");
                $role->add_cap("edit_others_{$cpt}s");
                $role->add_cap("publish_{$cpt}s");
                $role->add_cap("read_private_{$cpt}s");
                $role->add_cap("delete_others_{$cpt}s");
                $role->add_cap("delete_private_{$cpt}s");
                $role->add_cap("edit_private_{$cpt}s");
                $role->add_cap("edit_published_{$cpt}s");
                $role->add_cap("delete_published_{$cpt}s");
            }

           // error_log("Capabilities successfully added to {$role_name} Role.");
        } else {
           // error_log("Failed to retrieve {$role_name} Role.");
        }
    }
}
add_action('init', 'intranet_create_roles');
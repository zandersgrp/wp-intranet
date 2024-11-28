<?php
function register_jobs_post_type() {
    $labels = [
        'name'               => 'Jobs',
        'singular_name'      => 'Job',
        'add_new'            => 'Add New Job',
        'add_new_item'       => 'Add New Job',
        'edit_item'          => 'Edit Job',
        'new_item'           => 'New Job',
        'view_item'          => 'View Job',
        'search_items'       => 'Search Jobs',
        'not_found'          => 'No jobs found',
        'not_found_in_trash' => 'No jobs found in Trash',
        'all_items'          => 'All Jobs',
        'archives'           => 'Job Archives',
        'attributes'         => 'Job Attributes',
        'menu_name'          => 'Jobs',

    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'capability_type'    => 'job',
        'capabilities'       => [
            'edit_post'          => 'edit_job',
            'read_post'          => 'read_job',
            'delete_post'        => 'delete_job',
            'edit_posts'         => 'edit_jobs',
            'edit_others_posts'  => 'edit_others_jobs',
            'publish_posts'      => 'publish_jobs',
            'read_private_posts' => 'read_private_jobs',
            'delete_others_posts'=> 'delete_others_jobs',
            'delete_private_posts'=> 'delete_private_jobs',
            'edit_private_posts' => 'edit_private_jobs',
            'edit_published_posts'=> 'edit_published_jobs',
            'delete_published_posts'=> 'delete_published_jobs',
        ],
        'map_meta_cap'       => true,
        'supports'           => ['title'],
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-hammer',
    ];

    register_post_type('job', $args);
}
add_action('init', 'register_jobs_post_type');
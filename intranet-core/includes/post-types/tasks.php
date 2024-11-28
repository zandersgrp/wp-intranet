<?php
function register_tasks_post_type() {
    $labels = [
        'name'               => 'Tasks',
        'singular_name'      => 'Task',
        'add_new'            => 'Add New Task',
        'add_new_item'       => 'Add New Task',
        'edit_item'          => 'Edit Task',
        'new_item'           => 'New Task',
        'view_item'          => 'View Task',
        'search_items'       => 'Search Tasks',
        'not_found'          => 'No tasks found',
        'not_found_in_trash' => 'No tasks found in Trash',
        'all_items'          => 'All Tasks',
        'archives'           => 'Task Archives',
        'attributes'         => 'Task Attributes',
        'menu_name'          => 'Tasks',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'capability_type'    => 'task',
        'capabilities'       => [
            'edit_post'          => 'edit_task',
            'read_post'          => 'read_task',
            'delete_post'        => 'delete_task',
            'edit_posts'         => 'edit_tasks',
            'edit_others_posts'  => 'edit_others_tasks',
            'publish_posts'      => 'publish_tasks',
            'read_private_posts' => 'read_private_tasks',
            'delete_others_posts'=> 'delete_others_tasks',
            'delete_private_posts'=> 'delete_private_tasks',
            'edit_private_posts' => 'edit_private_tasks',
            'edit_published_posts'=> 'edit_published_tasks',
            'delete_published_posts'=> 'delete_published_tasks',
        ],
        'map_meta_cap'       => true,
        'supports'           => ['title'],
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-clipboard',
    ];

    register_post_type('task', $args);
}
add_action('init', 'register_tasks_post_type');
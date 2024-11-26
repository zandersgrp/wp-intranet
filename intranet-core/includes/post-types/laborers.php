<?php
function register_laborers_post_type() {
    $labels = [
        'name'               => 'Laborers',
        'singular_name'      => 'Laborer',
        'add_new'            => 'Add New Laborer',
        'add_new_item'       => 'Add New Laborer',
        'edit_item'          => 'Edit Laborer',
        'new_item'           => 'New Laborer',
        'view_item'          => 'View Laborer',
        'search_items'       => 'Search Laborers',
        'not_found'          => 'No laborers found',
        'not_found_in_trash' => 'No laborers found in Trash',
        'all_items'          => 'All Laborers',
        'archives'           => 'Laborer Archives',
        'attributes'         => 'Laborer Attributes',
        'menu_name'          => 'Laborers',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'capability_type'    => 'laborer',
        'capabilities'       => [
            'edit_post'          => 'edit_laborer',
            'read_post'          => 'read_laborer',
            'delete_post'        => 'delete_laborer',
            'edit_posts'         => 'edit_laborers',
            'edit_others_posts'  => 'edit_others_laborers',
            'publish_posts'      => 'publish_laborers',
            'read_private_posts' => 'read_private_laborers',
            'delete_others_posts'=> 'delete_others_laborers',
            'delete_private_posts'=> 'delete_private_laborers',
            'edit_private_posts' => 'edit_private_laborers',
            'edit_published_posts'=> 'edit_published_laborers',
            'delete_published_posts'=> 'delete_published_laborers',
        ],
        'map_meta_cap'       => true,
        'supports'           => ['title', 'editor', 'thumbnail'],
        'show_in_menu'       => true,
    ];

    register_post_type('laborer', $args);
}
add_action('init', 'register_laborers_post_type');
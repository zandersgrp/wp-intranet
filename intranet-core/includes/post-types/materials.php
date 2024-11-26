<?php
function register_materials_post_type() {
    $labels = [
        'name'               => 'Materials',
        'singular_name'      => 'Material',
        'add_new'            => 'Add New Material',
        'add_new_item'       => 'Add New Material',
        'edit_item'          => 'Edit Material',
        'new_item'           => 'New Material',
        'view_item'          => 'View Material',
        'search_items'       => 'Search Materials',
        'not_found'          => 'No materials found',
        'not_found_in_trash' => 'No materials found in Trash',
        'all_items'          => 'All Materials',
        'archives'           => 'Material Archives',
        'attributes'         => 'Material Attributes',
        'menu_name'          => 'Materials',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'capability_type'    => 'material',
        'capabilities'       => [
            'edit_post'          => 'edit_material',
            'read_post'          => 'read_material',
            'delete_post'        => 'delete_material',
            'edit_posts'         => 'edit_materials',
            'edit_others_posts'  => 'edit_others_materials',
            'publish_posts'      => 'publish_materials',
            'read_private_posts' => 'read_private_materials',
            'delete_others_posts'=> 'delete_others_materials',
            'delete_private_posts'=> 'delete_private_materials',
            'edit_private_posts' => 'edit_private_materials',
            'edit_published_posts'=> 'edit_published_materials',
            'delete_published_posts'=> 'delete_published_materials',
        ],
        'map_meta_cap'       => true,
        'supports'           => ['title', 'editor', 'thumbnail'],
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-cart',
    ];

    register_post_type('material', $args);
}
add_action('init', 'register_materials_post_type');
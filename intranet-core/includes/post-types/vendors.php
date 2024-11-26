<?php
function register_vendors_post_type() {
    $labels = [
        'name'               => 'Vendors',
        'singular_name'      => 'Vendor',
        'add_new'            => 'Add New Vendor',
        'add_new_item'       => 'Add New Vendor',
        'edit_item'          => 'Edit Vendor',
        'new_item'           => 'New Vendor',
        'view_item'          => 'View Vendor',
        'search_items'       => 'Search Vendors',
        'not_found'          => 'No vendors found',
        'not_found_in_trash' => 'No vendors found in Trash',
        'all_items'          => 'All Vendors',
        'archives'           => 'Vendor Archives',
        'attributes'         => 'Vendor Attributes',
        'menu_name'          => 'Vendors',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'capability_type'    => 'vendor',
        'capabilities'       => [
            'edit_post'          => 'edit_vendor',
            'read_post'          => 'read_vendor',
            'delete_post'        => 'delete_vendor',
            'edit_posts'         => 'edit_vendors',
            'edit_others_posts'  => 'edit_others_vendors',
            'publish_posts'      => 'publish_vendors',
            'read_private_posts' => 'read_private_vendors',
            'delete_others_posts'=> 'delete_others_vendors',
            'delete_private_posts'=> 'delete_private_vendors',
            'edit_private_posts' => 'edit_private_vendors',
            'edit_published_posts'=> 'edit_published_vendors',
            'delete_published_posts'=> 'delete_published_vendors',
        ],
        'map_meta_cap'       => true,
        'supports'           => ['title', 'editor', 'thumbnail'],
        'show_in_menu'       => true,
    ];

    register_post_type('vendor', $args);
}
add_action('init', 'register_vendors_post_type');
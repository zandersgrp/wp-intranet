<?php
/**
 * Register the "Orders" custom post type.
 */

function register_orders_post_type() {
    $labels = [
        'name'               => 'Orders',
        'singular_name'      => 'Order',
        'add_new'            => 'Add New Order',
        'add_new_item'       => 'Add New Order',
        'edit_item'          => 'Edit Order',
        'new_item'           => 'New Order',
        'view_item'          => 'View Order',
        'search_items'       => 'Search Orders',
        'not_found'          => 'No orders found',
        'not_found_in_trash' => 'No orders found in Trash',
        'all_items'          => 'All Orders',
        'archives'           => 'Order Archives',
        'attributes'         => 'Order Attributes',
        'menu_name'          => 'Orders',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'capability_type'    => 'order',
        'capabilities'       => [
            'edit_post'          => 'edit_order',
            'read_post'          => 'read_order',
            'delete_post'        => 'delete_order',
            'edit_posts'         => 'edit_orders',
            'edit_others_posts'  => 'edit_others_orders',
            'publish_posts'      => 'publish_orders',
            'read_private_posts' => 'read_private_orders',
        ],
        'map_meta_cap'       => true,
        'supports'           => ['title'], // Supports only title
        'menu_icon'          => 'dashicons-cart',
    ];

    register_post_type('order', $args);
}
add_action('init', 'register_orders_post_type');
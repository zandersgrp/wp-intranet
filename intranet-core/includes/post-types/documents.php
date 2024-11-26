<?php
/**
 * Register the "Documents" custom post type.
 */

function register_documents_post_type() {
    $labels = [
        'name'               => 'Documents',
        'singular_name'      => 'Document',
        'add_new'            => 'Add New Document',
        'add_new_item'       => 'Add New Document',
        'edit_item'          => 'Edit Document',
        'new_item'           => 'New Document',
        'view_item'          => 'View Document',
        'search_items'       => 'Search Documents',
        'not_found'          => 'No documents found',
        'not_found_in_trash' => 'No documents found in Trash',
        'all_items'          => 'All Documents',
        'archives'           => 'Document Archives',
        'attributes'         => 'Document Attributes',
        'menu_name'          => 'Documents',
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'capability_type'    => 'document',
        'capabilities'       => [
            'edit_post'          => 'edit_document',
            'read_post'          => 'read_document',
            'delete_post'        => 'delete_document',
            'edit_posts'         => 'edit_documents',
            'edit_others_posts'  => 'edit_others_documents',
            'publish_posts'      => 'publish_documents',
            'read_private_posts' => 'read_private_documents',
        ],
        'map_meta_cap'       => true,
        'supports'           => ['title'],
        'menu_icon'          => 'dashicons-media-document', // Icon for "Documents".
    ];

    register_post_type('document', $args);
}
add_action('init', 'register_documents_post_type');
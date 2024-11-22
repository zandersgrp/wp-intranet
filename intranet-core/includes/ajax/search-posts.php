<?php
/**
 * AJAX handler for searching posts by term and post type.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// AJAX handler for searching posts.
function intranet_core_search_posts() {
    $term = sanitize_text_field($_GET['term']);
    $post_type = sanitize_text_field($_GET['post_type']);
    $results = [];

    // Validate the post type.
    $allowed_post_types = ['material', 'laborer']; // Add valid post types here.
    if (!in_array($post_type, $allowed_post_types, true)) {
        wp_send_json_error(['message' => 'Invalid post type']);
    }

    // Query the database for matching posts.
    $query = new WP_Query([
        'post_type' => $post_type,
        's' => $term,
        'posts_per_page' => 10,
    ]);

    // Prepare the response data.
    foreach ($query->posts as $post) {
        $results[] = [
            'id' => $post->ID,
            'title' => $post->post_title,
        ];
    }

    wp_send_json($results);
}
add_action('wp_ajax_search_posts', 'intranet_core_search_posts');
add_action('wp_ajax_nopriv_search_posts', 'intranet_core_search_posts');

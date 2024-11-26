<?php
add_filter('wp_insert_post_data', function ($data, $postarr) {
    if ($data['post_type'] === 'laborer' && empty($data['post_title'])) {
        $first_name = sanitize_text_field($_POST['laborer_first_name'] ?? '');
        $last_name = sanitize_text_field($_POST['laborer_last_name'] ?? '');
        $data['post_title'] = trim("$first_name $last_name");
    }
    return $data;
}, 10, 2);
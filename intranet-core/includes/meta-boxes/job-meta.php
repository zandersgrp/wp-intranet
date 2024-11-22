<?php
/**
 * Adds and saves the meta box for the 'Jobs' post type.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Add the meta box.
function intranet_core_add_job_meta_box() {
    add_meta_box('job_details', 'Job Details', 'intranet_core_render_job_meta_box', 'job', 'normal', 'high');
}
add_action('add_meta_boxes', 'intranet_core_add_job_meta_box');

// Render the meta box.
function intranet_core_render_job_meta_box($post) {
    // Retrieve existing meta values.
    $address = get_post_meta($post->ID, 'job_address', true);
    $linked_materials = get_post_meta($post->ID, 'linked_materials', true) ?: [];
    $linked_laborers = get_post_meta($post->ID, 'linked_laborers', true) ?: [];
    $tasks = get_post_meta($post->ID, 'job_tasks', true) ?: [];

    // Address field.
    echo '<label for="job_address">Address:</label>';
    echo '<input type="text" id="job_address" name="job_address" value="' . esc_attr($address) . '" style="width:100%;" />';
    echo '<hr>';

    // Linked Materials Section.
    echo '<label for="search_material">Search Material:</label>';
    echo '<input type="text" id="search_material" class="search-input" placeholder="Type to search..." />';
    echo '<ul id="selected_materials">';
    foreach ($linked_materials as $material_id) {
        echo '<li data-id="' . $material_id . '">' . get_the_title($material_id) . '<button class="remove-item">Remove</button></li>';
    }
    echo '</ul>';
    echo '<input type="hidden" id="hidden_materials" name="linked_materials[]" value="' . esc_attr(json_encode($linked_materials)) . '" />';
    echo '<hr>';

    // Linked Laborers Section.
    echo '<label for="search_laborer">Search Laborer:</label>';
    echo '<input type="text" id="search_laborer" class="search-input" placeholder="Type to search..." />';
    echo '<ul id="selected_laborers">';
    foreach ($linked_laborers as $laborer_id) {
        echo '<li data-id="' . $laborer_id . '">' . get_the_title($laborer_id) . '<button class="remove-item">Remove</button></li>';
    }
    echo '</ul>';
    echo '<input type="hidden" id="hidden_laborers" name="linked_laborers[]" value="' . esc_attr(json_encode($linked_laborers)) . '" />';
    echo '<hr>';

    // Tasks Section.
    echo '<h4>Tasks</h4>';
    echo '<div id="task_list">';
    foreach ($tasks as $index => $task) {
        echo '<div class="task-item">';
        echo '<label>Task Name:</label>';
        echo '<input type="text" name="job_tasks[' . $index . '][name]" value="' . esc_attr($task['name']) . '" />';
        echo '<label>Assigned Laborers (IDs):</label>';
        echo '<input type="text" name="job_tasks[' . $index . '][laborers]" value="' . esc_attr(implode(',', $task['laborers'])) . '" />';
        echo '<label>Priority:</label>';
        echo '<select name="job_tasks[' . $index . '][priority]">';
        echo '<option value="low" ' . selected($task['priority'], 'low', false) . '>Low</option>';
        echo '<option value="medium" ' . selected($task['priority'], 'medium', false) . '>Medium</option>';
        echo '<option value="high" ' . selected($task['priority'], 'high', false) . '>High</option>';
        echo '</select>';
        echo '<br><br>';
        echo '</div>';
    }
    echo '</div>';
    echo '<button type="button" id="add_task_button">Add Task</button>';
}

// Save the meta box data.
function intranet_core_save_job_meta_box($post_id) {
    // Save the Address field.
    if (array_key_exists('job_address', $_POST)) {
        update_post_meta($post_id, 'job_address', sanitize_text_field($_POST['job_address']));
    }

    // Save linked materials.
    if (isset($_POST['linked_materials']) && is_array($_POST['linked_materials'])) {
        $materials = array_filter(array_map('intval', $_POST['linked_materials'])); // Sanitize and filter empty values.
        if (!empty($materials)) {
            update_post_meta($post_id, 'linked_materials', $materials);
        } else {
            delete_post_meta($post_id, 'linked_materials'); // Clear if no materials linked.
        }
    } else {
        delete_post_meta($post_id, 'linked_materials'); // Ensure no empty values are saved.
    }

    // Save linked laborers.
    if (isset($_POST['linked_laborers']) && is_array($_POST['linked_laborers'])) {
        $laborers = array_filter(array_map('intval', $_POST['linked_laborers'])); // Sanitize and filter empty values.
        if (!empty($laborers)) {
            update_post_meta($post_id, 'linked_laborers', $laborers);
        } else {
            delete_post_meta($post_id, 'linked_laborers'); // Clear if no laborers linked.
        }
    } else {
        delete_post_meta($post_id, 'linked_laborers'); // Ensure no empty values are saved.
    }

    // Save tasks.
    if (isset($_POST['job_tasks']) && is_array($_POST['job_tasks'])) {
        $tasks = array_map(function ($task) {
            return [
                'name' => sanitize_text_field($task['name']),
                'laborers' => array_map('intval', explode(',', $task['laborers'])),
                'priority' => sanitize_text_field($task['priority']),
            ];
        }, $_POST['job_tasks']);
        update_post_meta($post_id, 'job_tasks', $tasks);
    } else {
        delete_post_meta($post_id, 'job_tasks');
    }
}
add_action('save_post', 'intranet_core_save_job_meta_box');

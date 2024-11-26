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
        'archives'           => 'Tas
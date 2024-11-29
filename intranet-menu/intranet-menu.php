<?php
/**
 * Plugin Name: Intranet Menu
 * Description: Plugin to manage menu restrictions for the intranet system.
 * Version: 1.0
 * Author: Your Name
 */

// Log that the plugin is loaded.
//error_log('Intranet Menu plugin loaded.');

// Include functionality for restricting menu items.
require_once __DIR__ . '/includes/restrict-admin-menu.php';

// Include functionality for unrestricting menu items for admins.
require_once plugin_dir_path(__FILE__) . '/includes/admin-override.php';
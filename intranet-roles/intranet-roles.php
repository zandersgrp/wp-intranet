<?php
/**
 * Plugin Name: Intranet Roles
 * Description: Role functionality for the CPC intranet system.
 * Version: 1.0
 * Author: Zanders Group 
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin paths.
define('INTRANET_MENU_PATH', plugin_dir_path(__FILE__));
define('INTRANET_MENU_URL', plugin_dir_url(__FILE__));

// Include core functionality.
require_once INTRANET_CORE_PATH . 'includes/includes.php';

// Debug to confirm plugin is loaded
error_log('Intranet Roles plugin loaded');

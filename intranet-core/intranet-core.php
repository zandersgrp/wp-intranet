<?php
/**
 * Plugin Name: Intranet Core
 * Description: Core functionality for the CPC intranet system.
 * Version: 1.0
 * Author: Zanders Group
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin paths.
define('INTRANET_CORE_PATH', plugin_dir_path(__FILE__));
define('INTRANET_CORE_URL', plugin_dir_url(__FILE__));

// Include core functionality.
require_once INTRANET_CORE_PATH . 'includes/includes.php';
